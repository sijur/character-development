<?php


namespace App\Models;

use App\Models\HtmlElementCreator;

class PageBuilder
{
	public function __construct() {}

	public function h4($id, $name)
	{
		$html = new HtmlElementCreator();
		$h4Text = "Thank you for logging in $name";

		$html->h4Ele( $h4Text, $id );
	}

	protected function radioButtonContainers( $radioButtons, $group )
	{
		if ( gettype( $radioButtons ) !== 'array' )
		{
			return 'Error: Not an array.';
		}

		$html = new HtmlElementCreator();
		$radioOptions = $html->radioButtonDiv( 'empty', $group, 0 );
		$spanButtons = '';
		$num = 1;

		foreach ( $radioButtons as $button )
		{
			$html = new HtmlElementCreator();

			$id = 'span_' . $button;
			$spanButtons .= $html->spanButtons( $id, $button );
			$radioOptions .= $html->radioButtonDiv( $button, $group, $num );
			$num++;
		}

		$msg = $spanButtons . $radioOptions;


		$msg .= $html->button( 'next_button', 'sectionButton', 'Next', $group );

		return $msg;
	}

	protected static function render( $msg )
	{
		if ( $msg )
		{
			echo $msg;
		}
	}
}