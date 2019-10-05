<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use App\Models\PageBuilder;

$html = new PageBuilder();

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