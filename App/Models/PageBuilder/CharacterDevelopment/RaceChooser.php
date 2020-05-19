<?php


namespace App\Models\PageBuilder\CharacterDevelopment;

use App\Models\HtmlElementCreator;
use \App\Models\PageBuilder;


class RaceChooser extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setup()
	{
		return $this->characterFormContainerSection();
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
}