<?php

use Core\IsVerified;
use App\Models\AccountInformation;
use App\Models\PageBuilder\AccountPageBuilder;

$verify = new IsVerified();
$verify->verify();

$accountInfo = new AccountInformation($_SESSION['userID']);
$userInfo = $accountInfo->setup();

$firstName = $userInfo['first_name'];
$fullName = $userInfo['full_name'];

$html = new AccountPageBuilder();
$html->mainContainerAccountCreation( $userInfo );

?>


<script>
	var title = document.getElementById('loginTitle');

	setTimeout(goAway, 3000, title);

	function goAway(ele)
	{
		ele.style.display = 'none';
	}
</script>