<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use Core\IsVerified;
use App\Models\PageBuilder;

$verify = new IsVerified();
$verify->verify();

$html = new PageBuilder();
?>

<div class="mainContainer">
	<?php
		$html->mainCharacterCreationForm();
	?>
</div>
