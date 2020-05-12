<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use Core\IsVerified;
use App\Models\AccountInformation;
use App\Models\PageBuilder\AccountPageBuilder;

$verify = new IsVerified();
$verify->verify();

$accountInfo = new AccountInformation($_SESSION['userID']);
$userInfo = $accountInfo->setup();
$row = mysqli_fetch_array($userInfo);

$firstName = $row['first_name'];
$fullName = $row['fullName'];

$html = new AccountPageBuilder();

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