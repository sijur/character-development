<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;
use App\Models\PageBuilder\CharacterDevelopment\RaceChooser;
use App\Models\PageBuilder\CharacterDevelopment\ClassChooser;
use App\Models\PageBuilder\CharacterDevelopment\PersonalTraits;
use App\Models\PageBuilder\CharacterDevelopment\NameChooser;


class CharacterDevelopmentPageBuilder extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
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

		$class = 'characterFormContainer middleContainer margin5PercentSide';
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

		return $html->basicForm( 'characterForm', 'mainForm', '', $msg );
	}

	protected function characterQuickView()
	{
		$html = new HtmlElementCreator();

		$race = new RaceChooser();
//		$class = new ClassChooser();
//		$traits = new PersonalTraits();
//		$names = new NameChooser();

		$msg = $html->caption( 'Character quick view' );

		$row = $race->getCharacterSheetLine();
//		$row .= $class->getCharacterSheetLine();
//		$row .= $traits->getCharacterSheetLine();
//		$row .= $names->getCharacterSheetLine();

		$msg .= $html->rowGroup( $row );

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
}