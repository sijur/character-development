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

	protected function userSectionRow($text, $value, $num = 1)
	{
		$html = new HtmlElementCreator();
		$msg = '';
		$msg .= $html->row();
		$msg .= $html->column('first', $text);
		$msg .= $html->column('second', $value);
		$msg .= $html->closingDiv($num);

		return $msg;
	}

	protected static function render($msg)
	{
		echo $msg;
	}


}