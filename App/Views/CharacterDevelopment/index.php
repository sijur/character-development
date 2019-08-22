<?php
session_start();
if ($_SESSION['loggedin'] == true)
{
	$_SESSION['loginError'] = false;
}
elseif ($_SESSION['loggedin'] == false)
{
	$_SESSION['loginError'] = true;
	header('location: /login');
}
?>

<h2><?='Thank you for logging in ' . $_SESSION['firstName']; ?></h2>
