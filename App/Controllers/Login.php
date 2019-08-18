<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Login extends Controller
{
	protected function getTitle()
	{
		return 'Login';
	}

	public function indexAction()
	{
		View::render('Login/index.php');
	}
}