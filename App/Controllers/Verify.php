<?php


namespace App\Controllers;


use App\Models\LoginScript;
use Core\Controller;
use Core\Session;

class Verify extends Controller
{
    public function displayHeader()
    {
        return false;
    }

    public function displayHeaderInformation()
    {
        return false;
    }

    public function indexAction()
    {
        $user = $_POST['userName'];
        $pass = $_POST['password'];

        $login = new LoginScript($user, $pass);
        $userInformation = $login->setup();

        $count = $userInformation['id'];

        if ($count)
        {
            $session = new Session();

            self::setCookie( session_id() );

            $session->setup( 'set', 'loginError', false );
            $session->setup(  'set', 'loggedIn', true );
            $session->setup( 'set', 'userName', $user );
            $session->setup( 'set', 'loggedOut', false );

            $this->setUserInformation( $userInformation );

            header( 'location: /account' );
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

    protected function setUserInformation( $user )
    {
        $session = new Session();
        $session->setup( 'set', 'userID', $user[ 'id' ] );
    }
}