<?php
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