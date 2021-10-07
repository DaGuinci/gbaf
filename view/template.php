<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8"/>
		<title><?= $title ?></title>
		<link href="./public/CSS/styles.css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="./public/images/logoGbaf.png" />
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
