<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{
	protected function getTitle()
	{
		return 'Home';
	}

	protected function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('Home/index.php');
	}
}