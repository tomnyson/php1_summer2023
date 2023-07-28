<?php
define('APP_ROOT', __DIR__);
require_once('../../provider.php');
require_once('../app.php');
require_once('../controllers/productController.php');
require_once('../controllers/CategoryController.php');

$controllerName = $_GET['route'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controller = new $controllerName();
if (method_exists($controller, $action)) {
    $controller->{$action}();
} else {
    echo 'Method does not exist';
}