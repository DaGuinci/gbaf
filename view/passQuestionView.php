<?php $title = 'Récupération de mot de passe'; ?>

<?php ob_start(); ?>

	<div>
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf" class="logoForm">
	<h1>Reinitialisation de votre mot de passe</h1>
	<form action="./index.php?action=passAnswer" method="post">
	<p>Question secrète :</p>
	<p><?=$question?></p>
		<input type="hidden" name="userName" value="<?= $userName ?>"/>
		<p>Votre réponse :</p>
		<input type="text" name="answer"/>
		<input class="button" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
