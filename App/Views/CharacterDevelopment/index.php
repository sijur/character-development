<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['userName']))
{
	$_SESSION['loginError'] = false;
	$firstName = (isset($_SESSION['firstName'])) ? $_SESSION['firstName'] : '';
}
else
{
	$_SESSION['loginError'] = true;
	header('location: /login');
}
?>

<div class="mainContainer">
	<h2>Thank you for logging in <?=$firstName; ?></h2>
</div>
