<?php


namespace Library\Core\HTMLBuilder;


class PageBuilder extends HTMLBuilder
{
	public function __construct()
	{
		parent::__construct();
	}

	public function pageTitle($text)
	{
		$this->h1('pageTitle', '', $text);
	}

	public function nameCreator()
	{
		echo "<div class='nameGenerator'>";
		$this->button('button', 'mainBtn', 'characterName', 'Character Name Generator');
		$this->input( 'text', 'mainInput', 'characterNameInput' );
		echo "<div class='clearLinkContainer'>";
		$this->a('#', 'clearLink', 'characterNameClearText', 'clear', '');
		echo "</div>";
		echo "</div>";
	}

	public function raceSelector()
	{
		$races = ['Dwarf', 'Elf', 'Gnome', 'Half-Elves', 'Half-Orcs', 'Halflings', 'Human'];

		echo "<div class='raceSelector'>";
		$this->selector( 'raceTypes', 'mainSelector', 'characterRaceSelector', $races );
		$this->button( 'button', 'mainBtn characterRaceSelectorButton', 'raceSelectorBtn', 'Choose Race' );
		echo "</div>";
	}
}