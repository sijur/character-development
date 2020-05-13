<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use App\Models\PageBuilder;
use App\Models\PageBuilder\CharacterDevelopment\RaceChooser;
use App\Models\PageBuilder\CharacterDevelopment\ClassChooser;
use App\Models\PageBuilder\CharacterDevelopment\PersonalTraits;


class CharacterDevelopmentPageBuilder extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
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
		$race = new RaceChooser();
		$class = new ClassChooser();
		$traits = new PersonalTraits();

		$content = $race->setup();
		$content .= $class->setup();
		$content .= $traits->setup();

		return $html->basicForm('characterForm', '', $content);
	}
}