<?php

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
{
	header('location: /account');
}
else
{
	header('location: /login');
}