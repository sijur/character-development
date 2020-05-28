<?php


namespace App\Models\PageBuilder\CharacterDevelopment;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;


class ClassChooser extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCharacterSheetLine()
	{
		$html = new HtmlElementCreator();

		$content = $html->column( 'title', 'Class: ' );
		$content .= $html->column( 'content', '' );

		return $html->row( $content );
	}

	public function setup()
	{
		return $this->classFormContainerSection();
	}

	protected function classFormContainerSection()
	{
		$html = new HtmlElementCreator();
		$content = $this->radioButtonContainers(['barbarian', 'bard', 'cleric', 'druid', 'fighter', 'monk', 'paladin', 'ranger', 'rogue', 'sorcerer', 'warlock', 'wizard'], 'class');
		$msg = $html->fieldset('classMainSelection', 'Main Class Selection', $content);

		$content = $this->radioButtonContainers(['berserker', 'totem warrior'], 'barbarian-path');
		$msg .= $html->fieldset('barbarian-path', 'Barbarian Primal Path', $content);

		$content = $this->radioButtonContainers(['lore', 'valor'], 'bard-colleges');
		$msg .= $html->fieldset('bard-colleges', 'Bard Colleges', $content);

		$content = $this->radioButtonContainers(['knowledge', 'life', 'light', 'nature', 'tempest', 'trickery', 'war'], 'cleric-domain');
		$msg .= $html->fieldset('cleric-domain', 'Cleric Divine Domain', $content);

		//need to differentiate between circle of land and it's sub-selections, and circle of the moon.
		$content = $this->radioButtonContainers(['arctic land', 'coast land', 'desert land', 'forest land', 'grassland land', 'mountain land', 'swamp land', 'underdark land', 'moon'], 'druid-circles');
		$msg .= $html->fieldset('druid_circles', 'Druidic Circle', $content);

		$content = $this->radioButtonContainers(['champion', 'battlemaster', 'eldritch knight'], 'fighter archetypes');
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
}