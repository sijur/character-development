<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 8/19/2018
 * Time: 9:38 PM
 */

namespace App;


class DatabaseSettings
{
	public function __construct()
	{
	}

	public static function setup($localhost = 'localhost')
	{
		return self::settings($localhost);
	}

	private static function settings($host)
	{
		$server = ($host == 'server') ? '' : 'localhost';

		switch ($host)
		{
			case 'server':
				$settings = (object)[
					'host' => $server,
					'dbUser' => '[db user]',
					'dbName' => '[db name]',
					'password' => '[db password]'
				];
				break;
			case 'localhost':
			default:
				$settings = (object)[
					'host' => $server,
					'dbUser' => 'root',
					'dbName' => '[enter db name]',
					'password' => ''
				];
				break;
		}

		return $settings;
	}
}