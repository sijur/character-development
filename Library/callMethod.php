<?php
require_once 'inc/autoload.php';

$data = json_decode( $_POST[ 'data' ] );

use Library\Core\NameGenerator;
use Library\Core\CharacterSettings;

if ( isset( $data->className ) )
{
	$className = $data->className;
	$methodName = $data->methodName;
	$value = $data->value;

	var_dump($className);
	var_dump($methodName);
	var_dump($value);

	switch( $className )
	{
		case 'NameGenerator':
			$class = new NameGenerator();
			switch( $methodName )
			{
				case 'getName':
					$class->getName();
					break;
				case 'saveName':
					$class->saveName( $value );
					break;
			}
			break;
		case 'RaceSelector':
			$class = new CharacterSettings();
			switch( $methodName )
			{
				default:
					$class->setSetting( 'race', $value );
					var_dump($class->getAllSettings());
					break;
			}
	}
}