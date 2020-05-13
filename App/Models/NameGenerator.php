<?php


namespace App\Models;


abstract class NameGenerator
{

	public function __construct()
	{

		// is the character male or female
		$gender = $this->whatIsGender();
	}

	protected function whatIsGender()
	{
		return;
	}

	protected static function render($name)
	{
		if (!$name)
		{
			echo 'You don\'t have a name yet!';
			die;
		}

		echo $name;
	}
}