<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use Core\IsVerified;
use App\Models\PageBuilder\CharacterDevelopmentPageBuilder;

$verify = new IsVerified();
$verify->verify();

$html = new CharacterDevelopmentPageBuilder();
$html->mainContainerCharacterCreation();
?>
