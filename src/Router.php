<?php
namespace App;

use Exception;

class Router
{
    private static string $basePath = '';
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct()
    {
        self::detectBasePath();
    }

    public static function detectBasePath(): string
    {
        if (self::$basePath !== '') {
            return self::$basePath;
        }

        // Detect script path relative to document root
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $dir = dirname($scriptName);

        if ($dir === '/' || $dir === '.' || $dir === '\\') {
            self::$basePath = '';
        } else {
            self::$basePath = rtrim($dir, '/');
        }

        return self::$basePath;
    }

    public static function getBasePath(): string
    {
        return self::detectBasePath();
    }

    public static function url(string $path = '/'): string
    {
        $base = self::getBasePath();
        $cleanPath = '/' . ltrim($path, '/');
        
        // If path already contains base path, don't duplicate
        if ($base !== '' && strpos($cleanPath, $base . '/') === 0) {
            return $cleanPath;
        }
        
        return $base . $cleanPath;
    }

    public function get(string $path, $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    public function post(string $path, $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        return $path === '' ? '/' : '/' . $path;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        // Priority 1: Check query string fallback ?p=about or ?route=about
        if (!empty($_GET['p'])) {
            $uri = '/' . ltrim($_GET['p'], '/');
        } elseif (!empty($_GET['route'])) {
            $uri = '/' . ltrim($_GET['route'], '/');
        } elseif (!empty($_SERVER['PATH_INFO'])) {
            // Priority 2: PATH_INFO
            $uri = $_SERVER['PATH_INFO'];
        } else {
            // Priority 3: REQUEST_URI with base path stripping
            $uri = $_SERVER['REQUEST_URI'] ?? '/';

            // Remove query string
            if (($pos = strpos($uri, '?')) !== false) {
                $uri = substr($uri, 0, $pos);
            }

            // Remove base path from current URI
            $base = self::getBasePath();
            if ($base !== '' && strpos($uri, $base) === 0) {
                $uri = substr($uri, strlen($base));
            }

            // Remove /index.php if present
            if (strpos($uri, '/index.php') === 0) {
                $uri = substr($uri, strlen('/index.php'));
            }
        }

        $normalizedUri = $this->normalizePath($uri);

        // Check if route exists
        if (isset($this->routes[$method][$normalizedUri])) {
            $handler = $this->routes[$method][$normalizedUri];
            $this->executeHandler($handler);
            return;
        }

        // Try without trailing slash
        $altUri = rtrim($normalizedUri, '/');
        if ($altUri !== '' && isset($this->routes[$method][$altUri])) {
            $handler = $this->routes[$method][$altUri];
            $this->executeHandler($handler);
            return;
        }

        // 404 Not Found
        http_response_code(404);
        $this->render404($normalizedUri);
    }

    private function executeHandler($handler): void
    {
        if (is_callable($handler)) {
            call_user_func($handler);
        } elseif (is_array($handler) && count($handler) === 2) {
            [$class, $method] = $handler;
            $controller = new $class();
            $controller->$method();
        } else {
            throw new Exception("Invalid route handler format.");
        }
    }

    private function render404(string $uri): void
    {
        $title = "Page Not Found | The African Executive Feature Summit 2027";
        $config = require __DIR__ . '/../config/app.php';
        
        include __DIR__ . '/../views/layout/header.php';
        ?>
        <main class="min-h-[70vh] flex items-center justify-center relative overflow-hidden py-24 px-6">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-emerald-950/20 via-black to-black -z-10"></div>
            <div class="max-w-xl mx-auto text-center space-y-6">
                <span class="inline-block px-4 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-lime-400 font-mono text-xs uppercase tracking-widest">
                    Error 404 // Protocol Deviation
                </span>
                <h1 class="text-4xl md:text-5xl font-serif text-white tracking-tight">Executive Dossier Not Found</h1>
                <p class="text-slate-400 text-sm md:text-base leading-relaxed">
                    The requested route <code class="text-lime-300 font-mono px-2 py-0.5 rounded bg-emerald-950/60"><?= htmlspecialchars($uri) ?></code> does not exist within the 2027 Summit directory.
                </p>
                <div class="pt-4 flex flex-wrap justify-center gap-4">
                    <a href="<?= self::url('/') ?>" class="px-6 py-3 rounded-full bg-lime-400 text-black font-semibold hover:bg-lime-300 transition-all text-sm tracking-wide">
                        Return to Plenary
                    </a>
                    <a href="<?= self::url('/contact') ?>" class="px-6 py-3 rounded-full border border-emerald-500/30 text-white hover:bg-emerald-950/40 transition-all text-sm">
                        Contact Summit Concierge
                    </a>
                </div>
            </div>
        </main>
        <?php
        include __DIR__ . '/../views/layout/footer.php';
    }
}
