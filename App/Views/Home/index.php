<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
	header('location: /character-development');
}
else
{
	header('location: /login');
}