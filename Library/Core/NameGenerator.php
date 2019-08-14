<?php

namespace Library\Core;



class NameGenerator
{
	// roll the dice 3 times.
	private $roll1;
	private $roll2;
	private $roll3;

	// portions of the name.
	private $part1;
	private $part2;
	private $part3;

	// the name
	protected $name;

	public function __construct()
	{
		$this->getDiceRolls();
	}

	public function setup()
	{
		$this->getName();
	}

	private function getDiceRolls()
	{
		$this->roll1 = $this->randomNum();
		$this->roll2 = $this->randomNum();
		$this->roll3 = $this->randomNum();
	}

	private function randomNum()
	{
		return rand(1, 20);
	}

	protected function getName()
	{
		$this->getNameParts();

		echo $this->part1 . $this->part2 . $this->part3;
	}

	private function getNameParts()
	{
		$this->part1 = $this->getFirstPart();
		$this->part2 = $this->getSecondPart();
		$this->part3 = $this->getThirdPart();
	}

	private function getFirstPart()
	{
		switch ($this->roll1) {
			case 5:
				return 'A';
			case 6:
				return 'Be';
			case 7:
				return 'De';
			case 8:
				return 'Ef';
			case 9:
				return 'Fa';
			case 10:
				return 'Jo';
			case 11:
				return 'Ki';
			case 12:
				return 'La';
			case 13:
				return 'Ma';
			case 14:
				return 'Na';
			case 15:
				return 'O';
			case 16:
				return 'Pa';
			case 17:
				return 'Re';
			case 18:
				return 'Si';
			case 19:
				return 'Ta';
			case 20:
				return 'Va';
			default:
				return '';
		}
	}

	private function getSecondPart()
	{
		switch($this->roll2)
		{
			case 1:
				return 'bar';
			case 2:
				return 'ched';
			case 3:
				return 'dell';
			case 4:
				return 'far';
			case 5:
				return 'gran';
			case 6:
				return 'hal';
			case 7:
				return 'jen';
			case 8:
				return 'kel';
			case 9:
				return 'lim';
			case 10:
				return 'mor';
			case 11:
				return 'net';
			case 12:
				return 'penn';
			case 13:
				return 'quil';
			case 14:
				return 'rond';
			case 15:
				return 'sark';
			case 16:
				return 'shen';
			case 17:
				return 'tur';
			case 18:
				return 'vash';
			case 19:
				return 'yor';
			case 20:
				return 'yen';
		}
	}

	private function getThirdPart()
	{
		switch($this->roll3)
		{
			case 2:
				return 'a';
			case 3:
				return 'ac';
			case 4:
				return 'ai';
			case 5:
				return 'af';
			case 6:
				return 'am';
			case 7:
				return 'an';
			case 8:
				return 'ar';
			case 9:
				return 'ea';
			case 10:
				return 'al';
			case 11:
				return 'ef';
			case 12:
				return 'ess';
			case 13:
				return 'ett';
			case 14:
				return 'ei';
			case 15:
				return 'ic';
			case 16:
				return 'id';
			case 17:
				return 'il';
			case 18:
				return 'in';
			case 19:
				return 'of';
			case 20:
				return 'us';
			default:
				return '';
		}
	}


}