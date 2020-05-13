<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

use Core\IsVerified;
use App\Models\PageBuilder\CharacterDevelopmentPageBuilder;
use App\Models\NameGenerator\HumanName;

$verify = new IsVerified();
$verify->verify();

$html = new CharacterDevelopmentPageBuilder();
$html->mainContainerCharacterCreation();
?>
