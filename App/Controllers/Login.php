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
			$_SESSION['loggedIn'] = true;
			$_SESSION['userName'] = $user;
			$_SESSION['loggedOut'] = false;
			$this->setUserInformation($userInformation);

			header('location: /account');
		}
		else
		{
			$_SESSION['loginError'] = true;
			$_SESSION['loggedIn'] = false;
			header('location: /login');
		}
	}

	protected function setUserInformation($user)
	{
		while ($row = mysqli_fetch_array($user))
		{
			$_SESSION['userID'] = $row['id'];
		}
	}

	public function logOutAction()
	{
		if (session_status() == 'PHP_SESSION_NONE')
		{
			session_start();
		}
		unset($_SESSION['loggedIn']);
		unset($_SESSION['loginError']);
		unset($_SESSION['loggedOut']);
		unset($_SESSION['userName']);
		unset($_SESSION['firstName']);
		unset($_SESSION['lastName']);
		unset($_SESSION['email']);

		header('location: /login');
	}
}