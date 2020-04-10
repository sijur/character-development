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
		$content = $this->raceElementContainers();
		$msg = $html->fieldset('characterSection', 'Race', $content);

		$content = $this->dwarfSubRaceContainer();
		$msg .= $html->fieldset('dwarfSubRaceSection', 'Dwarf Sub Race', $content);

		$content = $this->elfSubRaceContainers();
		$msg .= $html->fieldset('elfSubRaceSection', 'Elf Sub Race', $content);

		$content = $this->halflingSubRaceContainers();
		$msg .= $html->fieldset('halflingSubRaceSection', 'Halfling Sub Race', $content);

		$content = $this->humanSubRaceContainers();
		$msg .= $html->fieldset('humanSubRaceSection', 'Human Sub Race', $content);

		$content = $this->dragonBornSubRaceContainers();
		$msg .= $html->fieldset('dragonbornSubRaceSection', 'Dragonborn Sub Race', $content);

		$content = $this->gnomeSubRaceContainers();
		$msg .= $html->fieldset('gnomeSubRaceSection', 'Gnome Sub Race', $content);

		return $msg;
	}

	protected function raceElementContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('dwarf');
		$msg .= $html->radioButtonDiv('elf');
		$msg .= $html->radioButtonDiv('halfling');
		$msg .= $html->radioButtonDiv('human');
		$msg .= $html->radioButtonDiv('dragonborn');
		$msg .= $html->radioButtonDiv('gnome');
		$msg .= $html->radioButtonDiv('half-elf');
		$msg .= $html->radioButtonDiv('half-orc');
		$msg .= $html->radioButtonDiv('tiefling');

		return $msg;
	}

	protected function dwarfSubRaceContainer()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('hill dwarf');
		$msg .= $html->radioButtonDiv('mountain dwarf');

		return $msg;
	}

	protected function elfSubRaceContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('high-elf');
		$msg .= $html->radioButtonDiv('wood-elf');
		$msg .= $html->radioButtonDiv('dark-elf');

		return $msg;
	}

	protected function halflingSubRaceContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('lightfoot');
		$msg .= $html->radioButtonDiv('stout');

		return $msg;
	}

	protected function humanSubRaceContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('standard');
		$msg .= $html->radioButtonDiv('variant');

		return $msg;
	}

	protected function dragonbornSubRaceContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('black');
		$msg .= $html->radioButtonDiv('blue');
		$msg .= $html->radioButtonDiv('brass');
		$msg .= $html->radioButtonDiv('bronze');
		$msg .= $html->radioButtonDiv('copper');
		$msg .= $html->radioButtonDiv('gold');
		$msg .= $html->radioButtonDiv('green');
		$msg .= $html->radioButtonDiv('red');
		$msg .= $html->radioButtonDiv('silver');
		$msg .= $html->radioButtonDiv('white');

		return $msg;
	}

	protected function gnomeSubRaceContainers()
	{
		$html = new HtmlElementCreator();
		$msg = $html->radioButtonDiv('forst-gnome');
		$msg .= $html->radioButtonDiv('rock-gnome');

		return $msg;
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}