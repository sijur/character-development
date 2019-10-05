<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use Core\IsVerified;

$verify = new IsVerified();
$verify->verify();
?>

<div class="mainContainer">
	<form action=""></form>
</div>
