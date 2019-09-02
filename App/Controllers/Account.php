<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Account extends Controller
{
	protected function getTitle()
	{
		return 'Account';
	}

	protected function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('Account/index.php');
	}
}