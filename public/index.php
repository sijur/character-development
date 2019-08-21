<?php
/**
 * Character Development
 * Authors: Steven O'Driscoll
 *          Matthew Brown
 *
 * Version: 0.0.1
 */

require_once '../Core/inc/autoload.php';

use Core\Router\Dispatch;

$debug = isset($_REQUEST['debug']);

//date_default_timezone_set('America/Denver');
error_reporting(E_ALL & ~E_WARNING);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Dispatch($_SERVER['QUERY_STRING']);
$router->setup();