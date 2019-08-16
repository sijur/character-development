<?php

namespace Library;

use Library\Core\NameGenerator;

abstract class Character
{
	public function __construct() {}

	public function setup() {}

	public function createCharacterName()
	{
		$name = new NameGenerator();
		$characterName = $this->characterName = $name->getName();

		self::render($characterName);
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}