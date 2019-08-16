<?php
require_once 'inc/autoload.php';

$data = json_decode( $_POST[ 'data' ] );

use Library\Core\NameGenerator;

if ( isset( $data->className ) )
{
	$className = $data->className;
	$methodName = $data->methodName;

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
					$class->saveName( $data->value );
					break;
			}
			break;
	}
}