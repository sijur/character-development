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

$debug = isset( $_REQUEST[ 'debug' ] );
$ajax = isset( $_REQUEST[ 'ajax' ] );
$queryString = $_SERVER[ 'QUERY_STRING' ];

error_reporting( E_ALL & ~E_WARNING );
set_error_handler( 'Core\Error::errorHandler' );
set_exception_handler( 'Core\Error::exceptionHandler' );

Log::setLogLevelFilter( Config::LOG_LEVEL );
Log::debug( "Attempting to route page \"" . $_SERVER[ 'QUERY_STRING' ] . "\"" );

if ( !$ajax )
{
	$router = new Dispatch( $queryString );
	$router->setup();
}
else
{
	$ajaxString = '&ajax=true';
	$newQueryString = str_ireplace( $ajaxString, '', $queryString );

	echo '<pre>';
	var_dump(print_r($newQueryString, true));
	echo '</pre>';


}