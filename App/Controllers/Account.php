<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Account extends Controller implements PageInterface
{
	public function getTitle()
	{
		return 'Account';
	}

	public function displayHeader()
	{
		return true;
	}

	public function indexAction()
	{
		View::render('Account/index');
	}
}