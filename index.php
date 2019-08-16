<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Character Development</title>
	<?php
		require_once 'Library/inc/autoload.php';
		use Library\Core\HTMLBuilder\PageBuilder;
		use Library\Core\CharacterSettings;
	?>

	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
</head>
<body>
	<div class="mainContainer">
		<?php
		$siteBuilder = new PageBuilder();
		$siteBuilder->pageTitle( 'Character Development' );

//		$siteBuilder->nameCreator();
		?>

	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="Library/js/sapphire.js" defer></script>
	<script src="Library/js/main.js" defer></script>
</body>
</html>
