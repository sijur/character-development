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

session_start();
$_SESSION['loggedin'] = true;
if ( !isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true )
{
	header( 'location: /login' );
}
else
{
	$debug = isset($_REQUEST['debug']);

//	var_dump($_SERVER['QUERY_STRING']);

	$router = new Dispatch($_SERVER['QUERY_STRING']);
	$router->setup();
}