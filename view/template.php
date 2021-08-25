<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=yes />
		<title><?= $title ?></title>
		<link href="./public/CSS/styles.css" rel="stylesheet" />
	</head>
	
	<body>

		<header>
			<?= $headerContent ?>
		</header>

		<div class="content">
			<?= $content ?>
		</div>

		<footer>
		<a href="./index.php?action=termsConditions">Mentions légales</a>
		<a href="./index.php?action=contact">Contact</a>
		</footer>
	</body>
</html>
