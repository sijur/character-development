<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 4:41 PM
 */

/**
 * This is an auto-loader.  This will load the classes without having to include
 * or require the classes.
 *
 * @param $class
 */
function autoload($class)
{
	$root = dirname(__DIR__, 2);   // get the parent directory
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_readable($file))
	{
		require $root . '/' . str_replace('\\', '/', $class) . '.php';
	}
}

spl_autoload_register('autoload');