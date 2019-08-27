<?php
/**
 * Character Development
 * Authors: Steven O'Driscoll
 *          Matthew Brown
 *
 * Version: 0.0.1
 */

require_once '../Core/inc/autoload.php';

use Core\Log;
use App\Config;
use Core\Router\Dispatch;

$debug = isset($_REQUEST['debug']);

error_reporting(E_ALL & ~E_WARNING);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

Log::setLogLevelFilter(Config::LOG_LEVEL);
Log::debug("Attempting to route page \"" . $_SERVER['QUERY_STRING'] . "\"");

if (!isset($_REQUEST['ajax']))
{
	$router = new Dispatch($_SERVER['QUERY_STRING']);
	$router->setup();
}