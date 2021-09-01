 <?php $title = 'Déconnexion'; ?>

<?php ob_start(); ?>
	<div class="message">
	<img class="logoForm" src="./public/images/logoGbaf.png" alt="Logo de l'acteur" />
	<h1>Déconnexion</h1>
		<p>Vous avez été déconnecté</p>
		<a href="./index.php" class="button" >Retour</a></div>

<?php $content = ob_get_clean(); ?>

<?php require('headerView.php');
require ('template.php'); ?>