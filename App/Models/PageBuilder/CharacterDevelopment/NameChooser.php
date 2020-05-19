<?php


namespace App\Models\PageBuilder\CharacterDevelopment;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;
use App\Models\NameGenerator\HumanName;
use App\Models\NameGenerator\DwarfName;


class NameChooser extends PageBuilder
{
	protected $race;

	public function __construct()
	{
		parent::__construct();
		$this->race = 'human';
	}

	public function setup()
	{
		return $this->displayNames();
	}

	protected function displayNames()
	{
//		$name = new DwarfName();
		$name = new HumanName();
		$nameArray = $name->setup();
		$html = new HtmlElementCreator();

		$content = $this->getNameInputs();
//		$content = $this->radioButtonContainers($nameArray, 'names');
		return $html->fieldset('namesSelection', 'Name Selection', $content);
	}

	protected function getNameInputs()
	{
		$content = null;
		$html = new HtmlElementCreator();
		if ($this->race === 'human')
		{
			$content = $html->input('text', 'character-first-name', 'mainLabel', 'mainInput half-width', 'First name', 'ex: John');
			$content .= $html->button('generateFirstName', 'mainButton', 'Generate');
			$content .= $html->input('text', 'character-last-name', 'mainLabel', 'mainInput half-width', 'Last name', 'ex: Doe');
			$content .= $html->button('generateLastName', 'mainButton', 'Generate');
		}

		return $content;
	}


}