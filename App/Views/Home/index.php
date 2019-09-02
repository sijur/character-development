<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
	header('location: /account');
}
else
{
	header('location: /login');
}