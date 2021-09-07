<?php
$firstName=$_SESSION['firstName'];
$name=$_SESSION['name'];?>

<?php
if (!empty($_SESSION['id'])){
	ob_start();?>
	<a href="./index.php">
	<img id="logoSite" src="./public/images/logoGbaf.png" alt="Logo du Gbaf"/></a>
	<nav>
	<div class="userLog">
		<p id="userName"><?=htmlspecialchars($firstName) ?> <?=htmlspecialchars($name) ?></p>
		<img src="./public/images/logged.png" alt="logged"/>
	</div>
 	<ul id="userMenu"> <img src="./public/images/flecheMenu.png" alt="fleche menu"/>
		<li><a href="./index.php?action=userModifyForm">Paramètres du compte</a></li>
		<li><a href="./index.php?action=logOut">Se déconnecter</a></li>
	</ul>
	</nav>
<?php $headerContent = ob_get_clean();}

else{
	ob_start();?>
	<a href="./index.php">
	<img id="logoSite" src="./public/images/logoGbaf.png" alt="Logo du Gbaf"/></a>
	<div class="userLog">
		<img src="./public/images/unlogged.png" alt="unLogged"/>
	</div>
<?php $headerContent = ob_get_clean();}?>
