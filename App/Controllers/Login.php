<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\LoginScript;
use Core\Session;


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
			$session = new Session();

			self::setCookie( session_id() );

			$session->setup( 'set', 'loginError', false);
			$session->setup( 'set', 'loggedIn', true );
			$session->setup( 'set', 'userName', $user );
			$session->setup( 'set', 'loggedOut', false );

			$this->setUserInformation($userInformation);

			header('location: /account');
		}
		else
		{
			$session = new Session();
			$session->setup( 'set', 'loginError', true );
			$session->setup( 'set', 'loggedIn', false );

			header('location: /login');
		}
	}

	protected static function setCookie( $id )
	{
		setcookie( 'PHPSESSID', $id, time() + (86400 * 30), '/' );
	}

	protected function setUserInformation($user)
	{
		while ($row = mysqli_fetch_array($user))
		{
			$session = new Session();
			$session->setup( 'set', 'userID', $row[ 'id' ] );
		}
	}

	public function logOutAction()
	{
		$session = new Session();
		$session->setup('start');
		$session->setup( 'unset', 'loggedIn');
		$session->setup( 'unset', 'loginError');
		$session->setup( 'unset', 'loggedOut');
		$session->setup( 'unset', 'userName');
		$session->setup( 'unset', 'firstName');
		$session->setup( 'unset', 'lastName');
		$session->setup( 'unset', 'email');
		$session->setup( 'unset', 'gender');
		$session->setup( 'unset', 'userID');

		$session->setup( 'destroy' );

		setcookie( 'PHPSESSID', '', time() - 3600 );

		header('location: /login');
	}
}