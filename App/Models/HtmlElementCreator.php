<?php


namespace App\Models;

use Core\Strings\Strings;


class HtmlElementCreator
{
	public function __construct() {}

	// forms
	public function basicForm( $name, $class, $action, $content )
	{
		return "<form class='$class' name='$name' id='$name' action='$action' method='post'>$content</form>";
	}

	// containers


	public function headerEle( $level, $text, $id = '', $class = '' )
	{
		$lvl = '';
		switch ($level)
		{
			case '1':
				$lvl = 'h1';
				break;
			case '2':
				$lvl = 'h2';
				break;
			case '3':
				$lvl = 'h3';
				break;
			case '4':
				$lvl = 'h4';
				break;
		}

		$msg = "<$lvl";
		$msg .= ($id !== '')? " id='$id'" : '';
		$msg .= ($class !== '')? " class='$class'" : '';
		$msg .= ">$text</$lvl>";
		
		return $msg;
	}

	public function h4Ele( $text, $id, $echo = true )
	{
		$html = "<h4 id='$id'>$text</h4>";

		if ( $echo )
		{
			self::render( $html );
		}
		return $html;
	}

	public function basicDiv( $class, $text )
	{
		return "<div class='$class'>$text</div>";
	}

	public function radioButtonDiv( $radioName, $group, $num )
	{
		$id = str_ireplace( ' ', '_', strtolower( $radioName ) );
		$class = ( $id === 'empty' )? 'emptyS' : 's';
		$class .= 'electorContainer';
		$name = $group;
		$selected = ( $id === 'empty' )? 'checked': '';

		$content = $this->radioInput( $radioName, $id, $name, $selected, $num );
		$divId = $id . '-selector';
		return "<div id='$divId' class='$class'>$content</div>";
	}

	public function spanButtons( $id, $text )
	{
		$id = str_ireplace( ' ', '_', strtolower( $id ) );
		$text = ucfirst( $text );
		return "<span class='spanButton' id='$id'>$text</span>";
	}

	public function input( $type, $id, $labelClass, $inputClass, $labelText )
	{
		$msg = "<label for='$id' class='$labelClass'>$labelText</label>";
		$msg .= "<input type='$type' class='$inputClass' id='$id' name='$id'>";

		return $msg;
	}

	protected function radioInput( $radioName, $id, $name, $selected, $num )
	{
		$labelText = ucfirst($radioName);
		$msg = "<input type='radio' id='$id' name='$name' value='$id'";
		if ($selected === 'checked')
		{
			$msg .= 'checked';
		}

		$msg .= " class='radioButton ";

		$newClass = Strings::convertToPascalCase( $name );
		$newClass = Strings::convertToCamelCase( $newClass );
		$msg .= "$newClass " . $newClass.$num . "'>";
		$msg .= "<label for='$id'>$labelText</label>";

		return $msg;
	}

	public function basicLink( $href, $class, $msg, $target = '' )
	{
		$href = "<a href='$href' class='$class'";
		$href .= ( $target )? " target='$target'>" : ">";
		$href .= "$msg</a>";

		return $href;
	}

	public function button( $id, $class, $text, $data = '' )
	{
		$button = "<button id='$id' class='$class'";
		$button .= ( $data )? " data-group='$data'>" : ">";
		$button .= $text . "</button>";

		return $button;
	}

	public function section( $text, $type = '', $attributes = [] )
	{
		if ( $type == 'div' )
		{
			return "<div class='section'>$text</div>";
		}

		$html = "<section ";

		if ( sizeof( $attributes ) > 0 )
		{
			foreach ( $attributes as $key => $value )
			{
				$html .= $key . "='" . $value . "'";
			}
		}

		$html .= ">$text</section>";

		return $html;
	}

	public function table( $html )
	{
		return "<div class='table'>$html</div>";
	}

	public function row( $html )
	{
		return "<div class='row'>$html</div>";
	}

	public function column( $class, $id = null, $text = '' )
	{
		$html = "<div class='col $class'";
		$html .= ( $id )? " id='$id'>" : ">";
		$html .= ( $text )? "$text</div>" : "</div>";
		return $html;
	}

	public function closingDiv( $num )
	{
		$msg = '';
		while ( $num > 0 )
		{
			$msg .= '</div>';
			$num--;
		}
		return $msg;
	}

	public function fieldset( $class, $legend, $html )
	{
		$msg = "<fieldset class='$class'>";
		$msg .= "<legend>$legend</legend>";
		$msg .= $html;
		$msg .= "</fieldset>";
		return $msg;
	}

	public function unorderedList( $class, $html )
	{
		return "<ul class='$class'>$html</ul>";
	}

	public function listLinkItem( $href, $class, $html )
	{
		return "<li><a href='$href' class='$class'>$html</a></li>";
	}

	protected static function render( $msg )
	{
		echo $msg;
	}
}