<?php
require_once 'inc/autoload.php';

use Library\Core\NameGenerator;

if ( isset( $_POST['className'] ) )
{
	$className = $_POST['className'];
	$methodName = $_POST['methodName'];

	switch($className)
	{
		case 'NameGenerator':
			$class = new NameGenerator();
			switch($methodName)
			{
				case 'setup':
					$class->setup();
					break;
			}
			break;

	}
}