<?php

namespace Library;

use Library\Core\NameGenerator;

class Humanoid
{
	// character name
	protected $characterName;

	// attributes
	protected $strength;
	protected $dexterity;
	protected $constitution;
	protected $intelligence;
	protected $wisdom;
	protected $charisma;

	// character information
	protected $class;
	protected $level;
	protected $background;
	protected $playerName;
	protected $faction;
	protected $race;
	protected $alignment;
	protected $experiencePoints;
	protected $dciNumber;

	// character back story
	protected $backStory;

	protected $inspiration;
	protected $proficiencyBonus;

	// skills
	protected $acrobatics;      // dexterity
	protected $animalHandling;  // wisdom
	protected $arcana;          // intelligence
	protected $athletics;       // strength
	protected $deception;       // charisma
	protected $history;         // intelligence
	protected $insight;         // wisdom
	protected $intimidation;    // charisma
	protected $investigation;   // intelligence
	protected $medicine;        // wisdom
	protected $nature;          // intelligence
	protected $perception;      // wisdom
	protected $performance;     // charisma
	protected $persuasion;      // charisma
	protected $religion;        // intelligence
	protected $sleightOfHand;   // dexterity
	protected $stealth;         // dexterity
	protected $survival;        // wisdom

	protected $passiveWisdom;
	protected $otherProficienciesAndLanguages;  // array
	protected $attacksAndSpellCasting; // array
	protected $equipment; // array

	protected $personalityTraits;
	protected $ideals;
	protected $bonds;
	protected $flaws;
	protected $featuresAndTraits;

	public function __construct()
	{

	}

	public function setup()
	{

	}

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