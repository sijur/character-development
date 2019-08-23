<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	header('location: /character-development');
}
else
{
	if (isset($_SESSION['loginError']) && $_SESSION['loginError'] == true) { ?>
		<div class="error">The username or password is incorrect</div>
	<?php } ?>
<div class="loginContainer">
	<h2>Login</h2>
	<form name="loginForm" id="loginForm" action="/login/verify" method="POST">
		<label for="userName" class="mainLabel">Username:</label>
		<input type="text" class="mainInput" id="userName" name="userName">
		<label for="password" class="mainLabel">Password:</label>
		<input type="password" class="mainInput" id="password" name="password">
		<button class="mainBtn" id="loginButton">Login</button>
	</form>
	<a href="#" class="bottom-link left">Sign up</a>
	<a href="#" class="bottom-link right">Forgot Password</a>


</div>
<?php } ?>