<?php
/**
 * Created by PhpStorm.
 * User: Steven O'Driscoll
 * Date: 9/30/2019
 * Time: 4:00 PM
 */

namespace Core;


class IsVerified
{
	public function __construct()
	{
		$session = new Session();
		$session->setup( 'start' );
	}

	public function setup() {}

	public function verify($page = 'home')
	{
		$loginError = $this->getLoginError();
		$this->setSessionError($loginError);
		if ($loginError == true)
		{
			$this->redirectPage('login');
		}
		elseif ($loginError == false && $page == 'login')
		{
			$this->redirectPage('account');
		}

	}

    protected function getLoginError()
    {
        return ($this->loggedIn() || isset($_SESSION['userName']))? false : true;
    }

	protected function loggedIn()
	{
		return (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true);
	}

	protected function setSessionError($error)
	{
		$_SESSION['loginError'] = $error;
	}

	protected function redirectPage($location)
	{
		header('location: /' . $location);
		exit();
	}
}