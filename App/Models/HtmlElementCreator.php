<?php


namespace App\Models;


class HtmlElementCreator
{
	public function __construct() {}

	public function headerEle($level, $text, $id = '', $class = '')
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

	public function h4Ele($text, $id)
	{
		self::render("<h4 id='$id'>$text</h4>");
	}

	public function basicDiv($class, $text)
	{
		return "<div class='$class'>$text</div>";
	}

	public function radioButtonDiv($id, $group)
	{
		$class = ($id === 'empty')? 'emptyS' : 's';
		$class .= 'electorContainer';
		$name = $group;
		$selected = ($id === 'empty')? 'checked': '';

		$content = $this->reverseInput('radio', $id, $name, $selected);
		$divId = $id . '-selector';
		return "<div id='$divId' class='$class'>$content</div>";
	}

	public function basicForm($id, $action, $content)
	{
		return "<form name='$id' id='$id' action='$action' method='post'>$content</form>";
	}

	public function input($type, $id, $labelClass, $inputClass, $labelText)
	{
		$msg = "<label for='$id' class='$labelClass'>$labelText</label>";
		$msg .= "<input type='$type' class='$inputClass' id='$id' name='$id'>";

		return $msg;
	}

	protected function reverseInput($type, $id, $name, $selected)
	{
		$labelText = ucfirst($id);
		$msg = "<input type='$type' id='$id' name='$name' value='$id'";
		if ($selected === 'checked')
		{
			$msg .= 'checked';
		}
		$msg .= ">";
		$msg .= "<label for='$id'>$labelText</label>";

		return $msg;
	}

	public function basicLink($href, $class, $text)
	{
		return "<a href='$href' class='$class'>$text</a>";
	}

	public function button($id, $class, $text)
	{
		return "<button id='$id' class='$class'>$text</button>";
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

	public function fieldset($class, $legend, $html)
	{
		$msg = "<fieldset class='$class'>";
		$msg .= "<legend>$legend</legend>";
		$msg .= $html;
		$msg .= "</fieldset>";
		return $msg;
	}

	protected static function render($msg)
	{
			echo $msg;
	}
}