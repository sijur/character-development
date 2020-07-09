<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller implements PageInterface
{
	public function getTitle()
	{
		return 'Home';
	}

	public function displayHeaderInformation()
    {
        return false;
    }

	public function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('Home/index.php');
	}
}