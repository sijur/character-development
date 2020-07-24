<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 7/28/2018
 * Time: 6:01 PM
 */

namespace Core;


class View
{
	public static function render($view, $args = [])
	{
		extract($args, EXTR_SKIP);

		// todo: add .php to the end of the file so you don't have to add the .php to the end of every view::render call
		$file = "../App/Views/$view.php";

		if (is_readable($file))
		{
			require $file;
		}
		else
		{
			echo "$file not found.";
		}
	}
}