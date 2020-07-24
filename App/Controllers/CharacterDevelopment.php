<?php


namespace App\Controllers;


use Core\Controller;
use Core\View;

class CharacterDevelopment extends Controller implements PageInterface
{
	public function getTitle()
	{
		return 'Character Development';
	}

	public function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('CharacterDevelopment/index');
	}
}