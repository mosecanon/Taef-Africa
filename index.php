<?php
/**
 * The African Executive Feature Summit 2027
 * Front Controller & Clean URL Entry Point
 */

declare(strict_types=1);

// Error handling in development
ini_set('display_errors', '0');
error_reporting(E_ALL);

// Autoload dependencies (Composer & Predis)
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Simple PSR-4 Autoloader for App namespace
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Router;
use App\Controllers\PageController;
use App\Controllers\ApiController;
use App\Controllers\AdminController;

// Global helper for clean URLs across all views
if (!function_exists('url')) {
    function url(string $path = '/'): string {
        return Router::url($path);
    }
}

$router = new Router();

// Public Summit Page Routes
$router->get('/', [PageController::class, 'home']);
$router->get('/home', [PageController::class, 'home']);
$router->get('/about', [PageController::class, 'about']);
$router->get('/speakers', [PageController::class, 'speakers']);
$router->get('/partnerships', [PageController::class, 'partnerships']);
$router->get('/register', [PageController::class, 'register']);
$router->post('/register', [ApiController::class, 'register']); // Graceful fallback for form action
$router->get('/contact', [PageController::class, 'contact']);

// Public API Routes
$router->post('/api/register', [ApiController::class, 'register']);
$router->post('/api/partner', [ApiController::class, 'partnerInquiry']);
$router->post('/api/speaker-pitch', [ApiController::class, 'speakerApplication']);
$router->post('/api/contact', [ApiController::class, 'contactMessage']);
$router->get('/api/speakers', [ApiController::class, 'getSpeakers']);
$router->get('/api/system-status', [ApiController::class, 'systemStatus']);

// Executive Admin Console Routes
$router->get('/admin', [AdminController::class, 'dashboard']);
$router->get('/admin/login', [AdminController::class, 'login']);
$router->post('/admin/login', [AdminController::class, 'authenticate']);
$router->get('/admin/logout', [AdminController::class, 'logout']);
$router->get('/admin/speakers', [AdminController::class, 'speakers']);
$router->post('/admin/speakers/approve', [AdminController::class, 'approveSpeaker']);
$router->get('/admin/registrations', [AdminController::class, 'registrations']);
$router->get('/admin/registrations/export', [AdminController::class, 'exportRegistrationsCsv']);
$router->get('/admin/partners', [AdminController::class, 'partners']);
$router->post('/admin/cache/purge', [AdminController::class, 'purgeCache']);

// Dispatch Request
$router->dispatch();
