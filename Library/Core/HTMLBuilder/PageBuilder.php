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
		$this->button('button', 'mainBtn', 'characterName', 'Character Name Generator');
		$this->input( 'text', 'mainInput', 'characterNameInput' );
	}
}