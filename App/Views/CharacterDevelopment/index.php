<?php
session_start();

use Core\IsVerified;

$verify = new IsVerified();
$verify->verify();

//if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['userName']))
//{
//	$_SESSION['loginError'] = false;
//}
//else
//{
//	$_SESSION['loginError'] = true;
//	header('location: /login');
//}
?>

<div class="mainContainer">

</div>
