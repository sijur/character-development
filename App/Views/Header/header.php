<?php

use Core\Session;
use App\Models\Navigation;


$session = new Session();
$session->setup( 'start' );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Character Development || <?php if (isset($title)) { echo htmlspecialchars($title); } ?></title>

	<link rel="stylesheet" href="/css/main.css">
	<base href="./">
</head>
<body>
<?php if( isset($header) && ($header) ) { ?>
	<div class="header-area">
		<div class="header-container">
			<div class="logo-container">
				<a href="/" title="Go to the home page">Character Development</a>
			</div>
		</div>
	</div>

	<div class="menu-area">
		<div class="menu-container">
			<?php
			$nav = new Navigation();
			$nav->setup();
			?>
		</div>
	</div>
<?php } ?>