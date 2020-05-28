<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder\CharacterDevelopment\RaceChooser;
use App\Models\PageBuilder\CharacterDevelopment\ClassChooser;
use App\Models\PageBuilder\CharacterDevelopment\PersonalTraits;
use App\Models\PageBuilder\CharacterDevelopment\NameChooser;


class CharacterDevelopmentPageBuilder
{
	public function __construct()
	{
	}

	public function mainContainerCharacterCreation()
	{
		$html = new HtmlElementCreator();
		$content = $this->breadCrumbContainer();
		$content .= $this->characterCreationContainer();
		$content .= $this->characterQuickView();
		$msg = $html->basicDiv( 'mainContainer', $content );

		self::render($msg);
	}

	protected function breadCrumbContainer()
	{
		$html = new HtmlElementCreator();

		$msg = $this->unorderedListCreator();

		$class = 'sideBar sideBarLeft breadCrumbContainer';
		return $html->basicDiv( $class, $msg );
	}

	protected function characterCreationContainer()
	{
		$html = new HtmlElementCreator();

		$content = $this->characterCreationForm();

		$class = 'characterFormContainer margin5PercentSide';
		return $html->basicDiv( $class, $content );
	}

	protected function characterCreationForm()
	{
		$html = new HtmlElementCreator();
		$race = new RaceChooser();
//		$class = new ClassChooser();
//		$traits = new PersonalTraits();
//		$names = new NameChooser();

		$msg = $race->setup();
//		$msg .= $class->setup();
//		$msg .= $traits->setup();
//		$msg .= $names->setup();

		return $html->basicForm('characterForm', 'mainForm', '', $msg);
	}

	protected function characterQuickView()
	{
		$html = new HtmlElementCreator();

		$race = new RaceChooser();
//		$class = new ClassChooser();
//		$traits = new PersonalTraits();
//		$names = new NameChooser();

		$msg = $html->h4Ele( 'Character quick view', 'character-sheet', false );
		$msg .= $race->getCharacterSheetLine();
//		$msg .= $class->getCharacterSheetLine();
//		$msg .= $traits->getCharacterSheetLine();
//		$msg .= $names->getCharacterSheetLine();

		$content = $html->table( $msg );

		$class = 'sideBar sideBarRight characterQuickView';
		return $html->basicDiv( $class, $content );
	}

	protected function unorderedListCreator()
	{
		$html = new HtmlElementCreator();

		$content = '';

		$sectionList = [ 'Race', 'Personal traits', 'Name' ];

		foreach ( $sectionList as $listItem )
		{
			$content .= $html->listLinkItem( '#', 'sectionListItem', $listItem );
		}

		return $html->unorderedList( 'sectionList', $content );
	}

	private function render( $msg )
	{
		if ( $msg )
		{
			echo $msg;
		}
	}
}