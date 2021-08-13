<?php $title = 'Récupération de mot de passe'; ?>

<?php ob_start(); ?>

	<div class="connectForm">
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Reinitialisation de votre mot de passe</h1>
	<p>Question secrète :</p>
	<p><?=$question?></p>
	<form action="./index.php?action=passAnswer" method="post">
		<input type="hidden" name="userName" value="<?= $userName ?>"/>
		<p>Votre réponse :</p>
		<input type="text" name="answer"/>
		<input id="connectButton" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
