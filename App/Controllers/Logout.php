<?php


namespace App\Controllers;


use Core\Controller;
use Core\Session;

class Logout extends Controller
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