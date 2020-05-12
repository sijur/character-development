<?php


namespace App\Models;

use App\Models\HtmlElementCreator;


class PageBuilder
{
	public function __construct() {}

	public function h4($id, $name)
	{
		$h4Text = "Thank you for logging in $name";

		$html = new HtmlElementCreator();
		$html->h4Ele($h4Text, $id);
	}

	public function userSection($fullName, $userName, $emailAddress, $bio)
	{
		$html = new HtmlElementCreator();
		$msg = $html->section();
		$msg .= $html->basicDiv('section-title', 'User Information');
		$msg .= $html->table();
		$msg .= $this->userSectionRow('Name:', $fullName);
		$msg .= $this->userSectionRow('User Name:', $userName);
		$msg .= $this->userSectionRow('Email:', $emailAddress);
		$msg .= $this->userSectionRow('Bio:', $bio, 3);

		self::render($msg);
	}

	public function loginContainer()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerContent();
		$msg = $html->basicDiv('loginContainer', $content);

		self::render($msg);
	}

	protected function loginContainerContent()
	{
		$html = new HtmlElementCreator();
		$msg = $html->headerEle('2', 'Login');
		$msg .= $this->loginContainerForm();
		$msg .= $html->basicLink('#', 'bottom-link left', 'Sign up');
		$msg .= $html->basicLink('#', 'bottom-link right', 'Forgot Password');

		return $msg;
	}

	protected function loginContainerForm()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerFormContent();
		$msg = $html->basicForm('loginForm', '/login/verify', $content);
		return $msg;
	}

	protected function loginContainerFormContent()
	{
		$html = new HtmlElementCreator();

		$msg = $html->input('text', 'userName', 'mainLabel', 'mainInput', 'UserName:');
		$msg .= $html->input('password', 'password', 'mainLabel', 'mainInput', 'Password:');
		$msg .= $html->button('loginButton', 'mainBtn', 'Login');

		return $msg;
	}

	protected function userSectionRow($text, $value, $num = 1)
	{
		$html = new HtmlElementCreator();
		$msg = $html->row();
		$msg .= $html->column('first', $text);
		$msg .= $html->column('second', $value);
		$msg .= $html->closingDiv($num);

		return $msg;
	}

	public function mainContainerCharacterCreation()
	{
		$html = new HtmlElementCreator();
		$content = $this->characterCreationForm();
		$msg = $html->basicDiv('mainContainer', $content);

		self::render($msg);
	}

	protected function characterCreationForm()
	{
		$html = new HtmlElementCreator();
		$content = $this->characterFormContainerSection();
		$content .= $this->classFormContainerSection();
        $content .= $this->backgroundFormContainerSection();
		return $html->basicForm('characterForm', '', $content);
	}

	protected function characterFormContainerSection()
	{
		$html = new HtmlElementCreator();

		$content = $this->radioButtonContainers(['dwarf', 'elf', 'halfling', 'human', 'dragonborn', 'gnome', 'half-elf', 'half-orc', 'tiefling'], 'race');
		$msg = $html->fieldset('characterSection', 'Race', $content);

		$content = $this->radioButtonContainers(['hill dwarf', 'mountain dwarf'], 'dwarf-subrace');
		$msg .= $html->fieldset('dwarfSubRaceSection', 'Dwarf Sub Race', $content);

		$content = $this->radioButtonContainers(['high-elf', 'wood-elf', 'dark-elf'], 'elf-subrace');
		$msg .= $html->fieldset('elfSubRaceSection', 'Elf Sub Race', $content);

		$content = $this->radioButtonContainers(['lightfoot', 'stout'], 'halfling-subrace');
		$msg .= $html->fieldset('halflingSubRaceSection', 'Halfling Sub Race', $content);

		$content = $this->radioButtonContainers(['standard', 'variant'], 'human-subrace');
		$msg .= $html->fieldset('humanSubRaceSection', 'Human Sub Race', $content);

		$content = $this->radioButtonContainers(['black', 'blue', 'brass', 'bronze', 'copper', 'gold', 'green', 'red', 'silver', 'white'], 'dragonborn-subrace');
		$msg .= $html->fieldset('dragonbornSubRaceSection', 'Dragonborn Sub Race', $content);

		$content = $this->radioButtonContainers(['forest-gnome', 'rock-gnome'], 'gnome-subrace');
		$msg .= $html->fieldset('gnomeSubRaceSection', 'Gnome Sub Race', $content);

		return $msg;
	}

	protected function classFormContainerSection()
	{
		$html = new HtmlElementCreator();
		$content = $this->radioButtonContainers(['barbarian', 'bard', 'cleric', 'druid', 'fighter', 'monk', 'paladin', 'ranger', 'rogue', 'sorcerer', 'warlock', 'wizard'], 'class');
		$msg = $html->fieldset('classMainSelection', 'Main Class Selection', $content);

		$content = $this->radioButtonContainers(['berserker', 'totem-warrior'], 'barbarian-path');
		$msg .= $html->fieldset('barbarian-path', 'Barbarian Primal Path', $content);

		$content = $this->radioButtonContainers(['lore', 'valor'], 'bard-colleges');
		$msg .= $html->fieldset('bard-colleges', 'Bard Colleges', $content);
        
        $content = $this->radioButtonContainers(['knowledge', 'life', 'light', 'nature', 'tempest', 'trickery', 'war'], 'cleric-domain');
		$msg .= $html->fieldset('cleric-domain', 'Cleric Divine Domain', $content);
        
        //need to differentiate between circle of land and it's subselections, and circle of the moon.
        $content = $this->radioButtonContainers(['arctic land', 'coast land', 'desert land', 'forest land', 'grassland land', 'mountain land', 'swamp land', 'underdark land', 'moon'], 'druid-circles');
		$msg .= $html->fieldset('druid-circles', 'Druidic Circle', $content);
        
        $content = $this->radioButtonContainers(['champion', 'battlemaster', 'eldritch knight'], 'fighter-archetypes');
		$msg .= $html->fieldset('fighter-archetypes', 'Fighter Archetype', $content);
        
        $content = $this->radioButtonContainers(['way of the open hand', 'way of shadow', 'way of the four elements'], 'monk-traditions');
		$msg .= $html->fieldset('monk-traditions', 'Monastic Tradition', $content);
        
        $content = $this->radioButtonContainers(['oath of devotion', 'oath of the ancients', 'oath of vengence'], 'paladin-oaths');
		$msg .= $html->fieldset('paladin-oaths', 'Paladin Sacred Oaths', $content);
        
        $content = $this->radioButtonContainers(['hunter', 'beast master'], 'ranger-archetypes');
		$msg .= $html->fieldset('ranger-archetypes', 'Ranger Archetype', $content);
        
        $content = $this->radioButtonContainers(['thief', 'assassin', 'arcane trickster'], 'rogue-archetypes');
		$msg .= $html->fieldset('rogue-archetypes', 'Roguish Archetypes', $content);
        
        $content = $this->radioButtonContainers(['draconic bloodline', 'wild magic'], 'sorcerer-origins');
		$msg .= $html->fieldset('sorcerer-origins', 'Sorcerous Origin', $content);
        
        $content = $this->radioButtonContainers(['archfey', 'fiend', 'great old one'], 'warlock-patrons');
		$msg .= $html->fieldset('warlock-patrons', 'Otherworldly Patron', $content);
        
        $content = $this->radioButtonContainers(['abjuration', 'conjuration', 'divination', 'enchantment', 'evocation', 'illusion', 'necromancy', 'transmutation'], 'wizard-schools');
		$msg .= $html->fieldset('wizard-schools', 'Arcane Traditions', $content);

		return $msg;
	}
    
    protected function backgroundFormContainerSection()
	{
		$html = new HtmlElementCreator();
        
		$content = $this->radioButtonContainers(['acolyte', 'charlatan', 'criminal', 'entertainer', 'folk hero', 'guild artisan', 'hermit', 'noble', 'outlander', 'sage', 'sailor', 'soldier', 'urchin'], 'background');
		$msg = $html->fieldset('backgroundMainSelection', 'Main Background Selection', $content);

		return $msg;
	}

	protected function radioButtonContainers($radioButtons, $group)
	{
		if (gettype($radioButtons) !== 'array')
		{
			return 'Error: Not an array.';
		}

		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('empty', $group);

		foreach ($radioButtons as $button)
		{
			$msg .= $html->radioButtonDiv($button, $group);
		}

		return $msg;
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}