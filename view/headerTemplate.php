<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title><?= $title ?></title>
		<link href="./public/CSS/styles.css" rel="stylesheet" />
	</head>

		<header>

			<img id="logoSite" src="./public/images/logoGbaf.png" alt="Logo du Gbaf"/>
			
			<div id="userLog">
				<div id="userLogged">
					<img src="./public/images/logged.png" alt="logged"/>
					<p id="userName"><?=$name?> <?=$firstName?></p>
				</div>
				<a  href="./index.php?action=logOut">
				<img src="./public/images/logOut.png" alt="logOut"/></a>
			</div>

		</header>

</html>
