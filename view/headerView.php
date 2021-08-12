<?php
session_start();
$firstName=$_SESSION['firstName'];
$name=$_SESSION['name'];?>

<?php
if (!empty($_SESSION['id'])){
	ob_start();?>
	<img id="logoSite" src="./public/images/logoGbaf.png" alt="Logo du Gbaf"/>
	<div id="userLog">
		<p id="userName"><?=$firstName ?> <?=$name ?></p>
		<img src="./public/images/logged.png" alt="logged"/>
	</div>
 	<ul id="userMenu"> <img src="./public/images/flecheMenu.png" alt="fleche menu"/>
		<li><a href="./index.php?action=userModifyForm">Paramètres du compte</a></li>
		<li><a href="./index.php?action=logOut">Se déconnecter</a></li>
	</ul>
<?php $headerContent = ob_get_clean();}

else{
	ob_start();?>
	<img id="logoSite" src="./public/images/logoGbaf.png" alt="Logo du Gbaf"/>
	<div id="userLog">
		<p id="userName"><?=$firstName ?> <?=$name ?></p>
		<img src="./public/images/unlogged.png" alt="logged"/>
	</div>
<?php $headerContent = ob_get_clean();}
?>