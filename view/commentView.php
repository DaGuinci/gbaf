 <?php $title = 'Ajouter un commentaire'; ?>

<?php ob_start(); ?>
	<img class="logoForm" src="<?= $partner['logo']?>" alt="Logo de l'acteur" />
	<h1>Ajouter un commentaire</h1>
	<form action="./index.php?action=sendNewComment" method="post">
		<input type="hidden" name="partnerId" value="<?= $partner['id_acteur']?>" />
	<?php if($votedYet==0){?>
	<div id="likeDislike">
		<img src="./public/images/like.png" alt="J'aime" /><input type="radio" name="vote" value="like"/>
		<input type="radio" name="vote" value="dislike"/><img src="./public/images/dislike.png" alt="Je n'aime pas" /></div>
		<?php }?>
		<p>Votre commentaire :</p>
		<textarea name="comment" required></textarea><br />
		<input class="button" type="submit" value="Valider" />
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('headerView.php');
require ('template.php'); ?>