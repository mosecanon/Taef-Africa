<?php
namespace App;

use Predis\Client as PredisClient;
use Exception;

class Cache
{
    private static ?Cache $instance = null;
    private ?PredisClient $redis = null;
    private bool $isRedisActive = false;
    private string $fallbackPath;
    private array $config;

    private function __construct()
    {
        $this->config = require __DIR__ . '/../config/cache.php';
        $this->fallbackPath = $this->config['fallback_path'];

        if (!is_dir($this->fallbackPath)) {
            mkdir($this->fallbackPath, 0755, true);
        }

        if (!empty($this->config['enabled'])) {
            $this->initRedis();
        }
    }

    public static function getInstance(): Cache
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function initRedis(): void
    {
        if (!class_exists(PredisClient::class)) {
            $this->isRedisActive = false;
            $this->redis = null;
            return;
        }

        try {
            $redisConfig = $this->config['redis'];
            $parameters = [
                'scheme'   => $redisConfig['scheme'],
                'host'     => $redisConfig['host'],
                'port'     => $redisConfig['port'],
                'timeout'  => $redisConfig['timeout'],
                'database' => $redisConfig['database'],
            ];

            if (!empty($redisConfig['password'])) {
                $parameters['password'] = $redisConfig['password'];
            }

            $options = [
                'prefix' => $redisConfig['prefix'],
                'exceptions' => true,
            ];

            $client = new PredisClient($parameters, $options);
            // Quick test ping
            $client->ping();

            $this->redis = $client;
            $this->isRedisActive = true;
        } catch (\Throwable $e) {
            // Predis connection failed or Redis server not running, fall back gracefully
            $this->isRedisActive = false;
            $this->redis = null;
            error_log("Predis cache notice: Redis not available (" . $e->getMessage() . "). Falling back to file cache.");
        }
    }

    public function isRedisConnected(): bool
    {
        return $this->isRedisActive;
    }

    public function getDriverName(): string
    {
        return $this->isRedisActive ? 'Predis (Redis v3.8)' : 'High-Speed File Cache (Predis Fallback)';
    }

    public function get(string $key)
    {
        if (!$this->config['enabled']) {
            return null;
        }

        if ($this->isRedisActive) {
            try {
                $val = $this->redis->get($key);
                if ($val !== null) {
                    return unserialize($val);
                }
                return null;
            } catch (Exception $e) {
                $this->isRedisActive = false;
            }
        }

        // Fallback file cache
        $file = $this->getFilePath($key);
        if (file_exists($file)) {
            $data = @file_get_contents($file);
            if ($data) {
                $cached = @unserialize($data);
                if (is_array($cached) && isset($cached['expires_at'], $cached['value'])) {
                    if ($cached['expires_at'] > time()) {
                        return $cached['value'];
                    }
                    @unlink($file); // Expired
                }
            }
        }

        return null;
    }

    public function set(string $key, $value, ?int $ttl = null): bool
    {
        if (!$this->config['enabled']) {
            return false;
        }

        $ttl = $ttl ?? $this->config['default_ttl'];

        if ($this->isRedisActive) {
            try {
                $this->redis->setex($key, $ttl, serialize($value));
                return true;
            } catch (Exception $e) {
                $this->isRedisActive = false;
            }
        }

        // Fallback file cache
        $file = $this->getFilePath($key);
        $payload = serialize([
            'expires_at' => time() + $ttl,
            'value' => $value
        ]);

        return (bool)@file_put_contents($file, $payload, LOCK_EX);
    }

    public function remember(string $key, int $ttl, callable $callback)
    {
        $cached = $this->get($key);
        if ($cached !== null) {
            return $cached;
        }

        $fresh = $callback();
        $this->set($key, $fresh, $ttl);
        return $fresh;
    }

    public function forget(string $key): bool
    {
        if ($this->isRedisActive) {
            try {
                $this->redis->del([$key]);
            } catch (Exception $e) {
                $this->isRedisActive = false;
            }
        }

        $file = $this->getFilePath($key);
        if (file_exists($file)) {
            @unlink($file);
        }

        return true;
    }

    public function flush(): bool
    {
        if ($this->isRedisActive) {
            try {
                $this->redis->flushdb();
            } catch (Exception $e) {
                $this->isRedisActive = false;
            }
        }

        $files = glob($this->fallbackPath . '/*.cache');
        if ($files) {
            foreach ($files as $file) {
                @unlink($file);
            }
        }

        return true;
    }

    private function getFilePath(string $key): string
    {
        return $this->fallbackPath . '/' . md5($key) . '.cache';
    }
}
