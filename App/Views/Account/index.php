<?php
session_start();

use App\Models\AccountInformation;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['userName']))
{
	$_SESSION['loginError'] = false;
}
else
{
	$_SESSION['loginError'] = true;
	header('location: /login');
}
$id = $_SESSION['userID'];
$accountInfo = new AccountInformation($id);
$userInfo = $accountInfo->setup();

$row = mysqli_fetch_array($userInfo);

$firstName = $row['first_name'];
$fullName = $row['fullName'];

?>

<div class="mainContainer">
	<h4 id="loginTitle">Thank you for logging in <?=$firstName; ?></h4>
	<div class="section">
		<div class="section-title">User Information</div>
		<div class="table">
			<div class="row">
				<div class="col">Name:</div>
				<div class="col"><?=$fullName; ?></div>
			</div>
			<div class="row">
				<div class="col">User Name:</div>
				<div class="col"><?=$row['user']; ?></div>
			</div>
			<div class="row">
				<div class="col">Email:</div>
				<div class="col"><?=$row['email_address']; ?></div>
			</div>
			<div class="row">
				<div class="col">Bio:</div>
				<div class="col"><?=$row['bio']; ?></div>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="section-title">Games</div>
	</div>
</div>


<script>
	var title = document.getElementById('loginTitle');

	setTimeout(goAway, 3000, title);

	function goAway(ele)
	{
		ele.style.display = 'none';
	}
</script>