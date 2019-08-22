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
		$userInformation = $login->setup();

		$count = mysqli_num_rows($userInformation);

		if ($count == 1)
		{
			$_SESSION['loginError'] = false;
			$_SESSION['loggedin'] = true;
			$_SESSION['userName'] = $user;
			$_SESSION['loggedOut'] = false;
			$this->setUserName($userInformation);

			header('location: /character-development');
		}
		else
		{
			$_SESSION['loginError'] = true;
			$_SESSION['loggedin'] = false;
			header('location: /login');
		}
	}

	protected function setUserName($user)
	{
		while ($row = mysqli_fetch_array($user))
		{
			$_SESSION['firstName'] = $row['first_name'];
			$_SESSION['lastName'] = $row['last_name'];
		}
	}

	public function logOutAction()
	{
		session_start();
		unset($_SESSION['loggedin']);
		unset($_SESSION['loginError']);
		unset($_SESSION['loggedOut']);
		unset($_SESSION['userName']);
		unset($_SESSION['firstName']);
		unset($_SESSION['lastName']);

		header('location: /');
	}
}