<?php


namespace App\Models\NameGenerator;

use \App\Models\NameGenerator;


class HumanName extends NameGenerator
{
	public function __construct()
	{
		parent::__construct();
		// make sure that the session is active

	}

	public function getSessionVariables()
	{
		foreach ($_SESSION as $key => $val)
		{
			echo $key . " " . $val . "<br>";
		}
	}


}