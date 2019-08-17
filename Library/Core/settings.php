<?php

// TODO: Need to find a way to make these persist throughout the app.
//  Currently the app forgets the settings from field to field. so we
//  either need to pass them to everything, or write them somewhere,
//  or do a session, and save them to a session variable.

return [
	// character name
	'characterName' => '',

	// attributes
	'strength' => '',
	'dexterity' => '',
	'constitution' => '',
	'intelligence' => '',
	'wisdom' => '',
	'charisma' => '',

	// character information
	'class' => '',
	'level' => '',
	'background' => '',
	'playerName' => '',
	'faction' => '',
	'race' => '',
	'alignment' => '',
	'experiencePoints' => '',
//	'dciNumber' => '',

	// character back story
	'backStory' => '',

	'inspiration' => '',
	'proficiencyBonus' => '',

	// skills
	'acrobatics' => '', // dexterity
	'animalHandling' => '', // wisdom
	'arcana' => '', // intelligence
	'athletics' => '', // strength
	'deception' => '', // charisma
	'history' => '', // intelligence
	'insight' => '', // wisdom
	'intimidation' => '', // charisma
	'investigation' => '', // intelligence
	'medicine' => '', // wisdom
	'nature' => '', // intelligence
	'perception' => '', // wisdom
	'performance' => '', // charisma
	'persuasion' => '', // charisma
	'religion' => '', // intelligence
	'slightOfHands' => '', // dexterity
	'stealth' => '', // dexterity
	'survival' => '', // wisdom

	'passiveWisdom' => '',
	'otherProficienciesAndLanguages' => '',
	'attacksAndSpellCasting' => '', // array
	'equipment' => '', // array

	'personalityTraits' => '',
	'ideals' => '',
	'bonds' => '',
	'flaws' => '',
	'featuresAndTraits' => ''
];