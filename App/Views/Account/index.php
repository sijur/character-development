<?php
session_start();

use App\Models\AccountInformation;
use App\Models\PageBuilder;

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

$html = new PageBuilder();

?>

<div class="mainContainer">
	<?php
		$html->h4('loginTitle', $firstName);
		$html->userSection($fullName, $row['user'], $row['email_address'], $row['bio']);
	?>

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