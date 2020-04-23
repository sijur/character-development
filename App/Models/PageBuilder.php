<?php


namespace App\Models;

use App\Models\HtmlElementCreator;


class PageBuilder
{
	public function __construct() {}

	public function h4($id, $name)
	{
		$h4Text = "Thank you for logging in $name";

		$html = new HtmlElementCreator();
		$html->h4Ele($h4Text, $id);
	}

	public function userSection($fullName, $userName, $emailAddress, $bio)
	{
		$html = new HtmlElementCreator();
		$msg = $html->section();
		$msg .= $html->basicDiv('section-title', 'User Information');
		$msg .= $html->table();
		$msg .= $this->userSectionRow('Name:', $fullName);
		$msg .= $this->userSectionRow('User Name:', $userName);
		$msg .= $this->userSectionRow('Email:', $emailAddress);
		$msg .= $this->userSectionRow('Bio:', $bio, 3);

		self::render($msg);
	}

	public function loginContainer()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerContent();
		$msg = $html->basicDiv('loginContainer', $content);

		self::render($msg);
	}

	protected function loginContainerContent()
	{
		$html = new HtmlElementCreator();
		$msg = $html->headerEle('2', 'Login');
		$msg .= $this->loginContainerForm();
		$msg .= $html->basicLink('#', 'bottom-link left', 'Sign up');
		$msg .= $html->basicLink('#', 'bottom-link right', 'Forgot Password');

		return $msg;
	}

	protected function loginContainerForm()
	{
		$html = new HtmlElementCreator();
		$content = $this->loginContainerFormContent();
		$msg = $html->basicForm('loginForm', '/login/verify', $content);
		return $msg;
	}

	protected function loginContainerFormContent()
	{
		$html = new HtmlElementCreator();

		$msg = $html->input('text', 'userName', 'mainLabel', 'mainInput', 'UserName:');
		$msg .= $html->input('password', 'password', 'mainLabel', 'mainInput', 'Password:');
		$msg .= $html->button('loginButton', 'mainBtn', 'Login');

		return $msg;
	}

	protected function userSectionRow($text, $value, $num = 1)
	{
		$html = new HtmlElementCreator();
		$msg = $html->row();
		$msg .= $html->column('first', $text);
		$msg .= $html->column('second', $value);
		$msg .= $html->closingDiv($num);

		return $msg;
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
		$content = $this->characterFormContainerSection();
		return $html->basicForm('characterForm', '', $content);
	}

	protected function characterFormContainerSection()
	{
		$html = new HtmlElementCreator();

		// first section RACE
		$content = $this->radioButtonContainers(['dwarf', 'elf', 'halfling', 'human', 'dragonborn', 'gnome', 'half-elf', 'half-orc', 'tiefling']);
		$msg = $html->fieldset('characterSection', 'Race', $content);

		$content = $this->radioButtonContainers(['hill dwarf', 'mountain dwarf']);
		$msg .= $html->fieldset('dwarfSubRaceSection', 'Dwarf Sub Race', $content);

		$content = $this->radioButtonContainers(['high-elf', 'wood-elf', 'dark-elf']);
		$msg .= $html->fieldset('elfSubRaceSection', 'Elf Sub Race', $content);

		$content = $this->radioButtonContainers(['lightfoot', 'stout']);
		$msg .= $html->fieldset('halflingSubRaceSection', 'Halfling Sub Race', $content);

		$content = $this->radioButtonContainers(['standard', 'variant']);
		$msg .= $html->fieldset('humanSubRaceSection', 'Human Sub Race', $content);

		$content = $this->radioButtonContainers(['black', 'blue', 'brass', 'bronze', 'copper', 'gold', 'green', 'red', 'silver', 'white']);
		$msg .= $html->fieldset('dragonbornSubRaceSection', 'Dragonborn Sub Race', $content);

		$content = $this->radioButtonContainers(['forest-gnome', 'rock-gnome']);
		$msg .= $html->fieldset('gnomeSubRaceSection', 'Gnome Sub Race', $content);

		return $msg;
	}

	protected function radioButtonContainers($radioButtons)
	{
		if (gettype($radioButtons) !== 'array')
		{
			return 'Error: Not an array.';
		}

		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('empty');

		foreach ($radioButtons as $button)
		{
			$msg .= $html->radioButtonDiv($button);
		}

		return $msg;
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}