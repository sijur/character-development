<?php

if (session_status() == 'PHP_SESSION_NONE')
{
	session_start();
}

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
{
	header('location: /account');
}
else
{
	header('location: /login');
}