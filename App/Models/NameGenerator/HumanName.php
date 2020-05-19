<?php


namespace App\Models\NameGenerator;

use \App\Models\NameGenerator;


class HumanName extends NameGenerator
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setup()
	{
//		return $this->addNamesToArray($this->numNames);
	}
}