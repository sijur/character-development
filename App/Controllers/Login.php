<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\LoginScript;
use Core\Session;


class Login extends Controller implements PageInterface
{
    public function getTitle()
	{
		return 'Login';
	}

	public function displayHeader()
	{
		return false;
	}

	public function indexAction()
	{
		View::render( 'Login/index.php' );
	}
}