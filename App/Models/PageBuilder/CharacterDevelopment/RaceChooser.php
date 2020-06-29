<?php


namespace App\Models\PageBuilder\CharacterDevelopment;

use App\Models\HtmlElementCreator;
use \App\Models\PageBuilder;


class RaceChooser extends PageBuilder implements SectionInterface
{
	protected $currentRace;

	public function __construct()
	{
		parent::__construct();
		$this->currentRace = $_SESSION[ 'race' ] ?? '';
	}

	public function setup()
	{
		return $this->characterFormContainerSection();
	}

	public function getCharacterSheetLine()
	{
		$html = new HtmlElementCreator();

		$currRace = $this->currentRace ?? '';

		$content = 'Race: ';

		$col = $html->column( 'title', '', $content );
		$col .= $html->column( 'content', 'raceContent', $currRace );

		return $html->row( $col );
	}

	protected function characterFormContainerSection()
	{
		$html = new HtmlElementCreator();

		$content = $this->radioButtonContainers( [ 'dwarf', 'elf', 'halfling', 'human', 'dragonborn', 'gnome', 'half-elf', 'half-orc', 'tiefling' ], 'race' );
		$msg = $html->fieldset( 'race-section', 'characterSection', 'Race', $content );

//		$content = $this->radioButtonContainers( [ 'hill dwarf', 'mountain dwarf' ], 'dwarf-subrace' );
//		$msg .= $html->fieldset( 'dwarf-sub-race-section', 'dwarfSubRaceSection', 'Dwarf Sub Race', $content);
//
//		$content = $this->radioButtonContainers( [ 'high-elf', 'wood-elf', 'dark-elf' ], 'elf-subrace' );
//		$msg .= $html->fieldset( 'elf-sub-race-section', 'elfSubRaceSection', 'Elf Sub Race', $content );
//
//		$content = $this->radioButtonContainers( [ 'lightfoot', 'stout' ], 'halfling-subrace' );
//		$msg .= $html->fieldset( 'halfling-sub-race-section', 'halflingSubRaceSection', 'Halfling Sub Race', $content );
//
//		$content = $this->radioButtonContainers( [ 'standard', 'variant' ], 'human-subrace' );
//		$msg .= $html->fieldset( 'human-sub-race-section', 'humanSubRaceSection', 'HumanName Sub Race', $content );
//
//		$content = $this->radioButtonContainers( [ 'black', 'blue', 'brass', 'bronze', 'copper', 'gold', 'green', 'red', 'silver', 'white' ], 'dragonborn-subrace' );
//		$msg .= $html->fieldset( 'dragon-sub-race-section', 'dragonbornSubRaceSection', 'Dragonborn Sub Race', $content );
//
//		$content = $this->radioButtonContainers( [ 'forest-gnome', 'rock-gnome' ], 'gnome-subrace' );
//		$msg .= $html->fieldset( 'gnome-sub-race-section', 'gnomeSubRaceSection', 'Gnome Sub Race', $content );

		return $msg;
	}
}