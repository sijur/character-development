<?php

namespace App\Models;

use Core\Strings\Strings;


class Navigation
{
	public function __construct() {}

	public function setup()
	{
		$navigation = $this->navigationArray();
		$this->setupNavigation($navigation);
	}

	protected function navigationArray()
	{
		return [
			[
				'name' => 'Home',
				'route' => '/'
			],
			[
				'name' => 'Character Development',
				'route' => '/character-development'
			],
			[
				'name' => 'Log out',
				'route' => '/login/log-out'
			]
		];
	}

	protected function setupNavigation($nav)
	{

		$msg = '<ul>';
		foreach ($nav as $n)
		{
			$msg .= "<li class='navigation'><a href='" . $n['route'] . "' title='Go to " . $n['name'] . "'>" . $n['name'] . "</a></li>";
		}
		$msg .= '</ul>';

		self::render($msg);
	}

	private static function render($msg)
	{
		$str = new Strings();
		$str::render($msg);
	}
}