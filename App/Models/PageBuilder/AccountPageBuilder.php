<?php


namespace App\Models\PageBuilder;

use App\Models\HtmlElementCreator;
use \App\Models\PageBuilder;


class AccountPageBuilder extends PageBuilder
{
	public function __construct()
	{
		parent::__construct();
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

	protected function userSectionRow($text, $value, $num = 1)
	{
		$html = new HtmlElementCreator();
		$msg = $html->row();
		$msg .= $html->column('first', $text);
		$msg .= $html->column('second', $value);
		$msg .= $html->closingDiv($num);

		return $msg;
	}

}