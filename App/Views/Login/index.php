<?php

use Core\Session;

$session = new Session();
$session->setup( 'start' );

use App\Models\PageBuilder\LoginPageBuilder;

$html = new LoginPageBuilder();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
{

	header('location: /account');
}
else
{
	if (isset($_SESSION['loginError']) && $_SESSION['loginError'] == true)
	{
		echo "<div class='error'>The username or password is incorrect</div>";
	}

	$html->loginContainer();
}