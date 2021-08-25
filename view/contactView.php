 <?php $title = 'Ajouter un commentaire'; ?>

<?php ob_start(); ?>
	<div class="message">
	<img class="logoForm" src="./public/images/logoGbaf.png" alt="Logo de l'acteur" />
	<h1>Contact</h1>
		<p>Cette page est en cours de construction.</p>
		<p>Merci pour votre compréhension.</p>
		<a href="./index.php" class="button" >Retour</a></div>

<?php $content = ob_get_clean(); ?>

<?php require('headerView.php');
require ('template.php'); ?>