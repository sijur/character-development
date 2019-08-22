<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\LoginScript;

class Login extends Controller
{
	protected function getTitle()
	{
		return 'Login';
	}

	protected function displayHeader()
	{
		return false;
	}

	public function indexAction()
	{
		View::render( 'Login/index.php' );
	}

	public function verifyAction()
	{
		$user = $_POST['userName'];
		$pass = $_POST['password'];

		$login = new LoginScript($user, $pass);
		$count = $login->setup();

		if ($count == 1)
		{
			$_SESSION['loginError'] = false;
			$_SESSION['loggedin'] = true;
			$_SESSION['userName'] = $user;
			$_SESSION['loggedOut'] = false;

			header('location: /character-development');
		}
		else
		{
			$_SESSION['loginError'] = true;
			$_SESSION['loggedin'] = false;
			header('location: /login');
		}
	}

	public function logOutAction()
	{
		session_start();
		$_SESSION['loggedin'] = false;
		$_SESSION['loginError'] = false;
		$_SESSION['loggedOut'] = true;
		$_SESSION['userName'] = '';

		header('location: /');
	}
}