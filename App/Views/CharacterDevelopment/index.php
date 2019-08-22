<?php
session_start();
if ($_SESSION['loggedin'] == true)
{
	$_SESSION['loginError'] = false;
//	$_SESSION['loggedin'] = false;
//	header('location: /');
}
elseif ($_SESSION['loggedin'] == false)
{
	$_SESSION['loginError'] = true;
	header('location: /login');
}