<?php


namespace App\Models\PageBuilder\CharacterDevelopment;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;
use App\Models\NameGenerator\HumanName;


class NameChooser extends PageBuilder implements SectionInterface
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCharacterSheetLine()
	{
		$html = new HtmlElementCreator();

		$content = $html->column( 'title', 'Name: ' );
		$content .= $html->column( 'content', '' );

		return $html->row( $content );
	}

	public function setup()
	{
		return $this->displayNames();
	}

	protected function displayNames()
	{
		$name = new HumanName();
		$nameArray = $name->setup();
		$html = new HtmlElementCreator();

		$content = $this->radioButtonContainers($nameArray, 'names');
		return $html->fieldset('namesSelection', 'Name Selection', $content);
	}


}