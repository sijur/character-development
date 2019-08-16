<?php


namespace Library\Core\HTMLBuilder;


class HTMLBuilder
{
	public function __construct() {}

	public function h1( $class = '', $id = '', $text = '' )
	{
		self::render( "<h1 class='$class' id='$id'>$text</h1>" );
	}

	public function button( $type, $class, $id, $text )
	{
		self::render( "<button type='$type' class='$class' id='$id'>$text</button>" );
	}

	public function span( $class, $id, $text = '' )
	{
		self::render( "<span class='$class' id='$id'>$text</span>" );
	}

	public function input( $type, $class, $id )
	{
		self::render( "<input type='$type' class='$class' id='$id' />" );
	}

	protected static function render($msg)
	{
		echo $msg;
	}
}