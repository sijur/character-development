<?php


namespace App\Controllers;


use Core\Controller;
use Core\View;

class CharacterDevelopment extends Controller
{
	public function getTitle()
	{
		return 'Character Development';
	}

	public function indexAction()
	{
		View::render('CharacterDevelopment/index.php');
	}
}