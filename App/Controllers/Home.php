<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller implements PageInterface
{
	public function getTitle()
	{
		return 'Home';
	}

	public function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('Home/index.php');
	}
}