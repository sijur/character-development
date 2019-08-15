<?php
require_once 'inc/autoload.php';

$data = json_decode($_POST['data']);

use Library\Humanoid;

if ( isset( $data->className ) )
{
	$className = $data->className;
	$methodName = $data->methodName;

	switch($className)
	{
		case 'Humanoid':
			$class = new Humanoid();
			switch($methodName)
			{
				case 'createCharacterName':
					$class->createCharacterName();
					break;
			}
			break;

	}
}