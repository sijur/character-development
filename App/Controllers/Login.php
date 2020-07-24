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

	public function displayHeaderInformation()
    {
        $session = new Session();
        $session->setup( 'start' );

        if ( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true )
        {
            return false;
        }

        return true;
    }

    public function indexAction()
	{
		View::render( 'Login/index' );
	}
}