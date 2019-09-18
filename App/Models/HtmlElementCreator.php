<?php


namespace App\Models;


class HtmlElementCreator
{
	public function __construct() {}

	public function h4Ele($text, $id)
	{
		self::render("<h4 id='$id'>$text</h4>");
	}

	public function basicDiv($class, $text)
	{
		return "<div class='$class'>$text</div>";
	}

	public function section()
	{
		return "<div class='section'>";
	}

	public function table()
	{
		return "<div class='table'>";
	}

	public function row()
	{
		return "<div class='row'>";
	}

	public function column($class, $text)
	{
		return "<div class='col $class'>$text</div>";
	}

	public function closingDiv($num)
	{
		$msg = '';
		while ($num > 0)
		{
			$msg .= '</div>';
			$num--;
		}
		return $msg;
	}

	protected static function render($msg)
	{
			echo $msg;
	}
}