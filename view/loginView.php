<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf" class="logoForm"/>
	<h1>Se connecter</h1>
	<form action="./index.php?action=logUser" method="post">
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName"/>
		<p>Mot de passe :</p>
		<input type="password" name="pass"/>
		<div id="stayLogged">
		<input type="checkbox" name="stayLogged" value="checked"/>
		<label>Rester connecté</label>
		</div>
		<input class="button" type="submit" value="Valider" />
	</form>
	<div id="connectOptions">
	<a href="./index.php?action=forgotPass">Mot de passe oublié</a>
	<em>Pas encore membre ?</em>
	<a href="./index.php?action=subscribe">Cliquez ici pour vous inscrire.</a>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
