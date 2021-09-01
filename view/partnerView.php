<?php $title = $partner['acteur']; ?>
<?php ob_start(); ?>
<div class="partnerSection">
	<div class="partnerPresentation">
	<a href="./index.php">Retour à la liste</a>
	<img src="<?= htmlspecialchars($partner['logo']) ?>" alt="Logo partenaire"/>
	<h2><?=htmlspecialchars($partner['acteur'])?></h2>
	<p><?=nl2br(htmlspecialchars($partner['description']))?></p>
	<hr>
	</div>

	<div id="commentsListBox">
	<div id="commentsBanner">
	<?php if($commentsNbr>1){
		echo "<h1>$commentsNbr Commentaires</h1>";}
	else{
		echo "<h1>$commentsNbr Commentaire</h1>";}?>
	<div id="commentBoxMenu">
	<div class="commentBoxEntry">
	<a href="./index.php?action=comment&amp;id=<?=$partner['id_acteur']?>">Ajouter un commentaire</a>
	<a href="./index.php?action=comment&amp;id=<?=$partner['id_acteur']?>"><img src="./public/images/comment.png" alt="like"></a>
	</div>
	<div class="commentBoxEntry"><p><?=$likesNbr?></p>
	<a href="./index.php?action=vote&amp;partnerId=<?=$partner['id_acteur']?>&amp;vote=like"><img src="./public/images/like.png" alt="like"></a></div>
	<div class="commentBoxEntry">
	<a href="./index.php?action=vote&amp;partnerId=<?=$partner['id_acteur']?>&amp;vote=dislike"><img src="./public/images/dislike.png" alt="like"></a><p><?=$disLikesNbr?></p></div>
	</div>
	</div>
	
	<?php
	if (!empty($comments)){
	foreach ($comments as $comment) {
		?>
		<div id=oneCommentBox>
		<p>Auteur : <em><?= htmlspecialchars($comment['prenom'])?></em></p>
		<p>Date : <em><?= htmlspecialchars($comment['date_add'])?></em></p>
		<p>Commentaire : <em><?= htmlspecialchars($comment['post'])?></em></p>
		</div>
		<?php
		}}
	else {
		echo '<p>Aucun commentaire à afficher</p>';
	}?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('headerView.php');
require ('template.php'); ?>