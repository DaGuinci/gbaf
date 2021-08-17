<?php $title = $partner['acteur']; ?>
<?php ob_start(); ?>
<div class="partnerSection">
	<div class="present">
	<a href="./index.php">Retour à la liste</a>
	<img src="<?= htmlspecialchars($partner['logo']) ?>" alt="Logo partenaire"/>
	<h2><?=htmlspecialchars($partner['acteur'])?></h2>
	<p><?=nl2br(htmlspecialchars($partner['description']))?></p>
	<hr>
	</div>

	<div id="commentsListBox">
	<div id="commentsBanner">
	<h1><p><?=$commentsNbr?> Commentaires</h1>
	<div id="commentBoxMenu">
	<div class="commentBoxEntry">
	<a href="./index.php?action=comment&amp;id=<?=$partner['id_acteur']?>">Ajouter un commentaire</a>
	<a href="./index.php?action=comment&amp;id=<?=$partner['id_acteur']?>"><img src="./public/images/comment.png" alt="like"></a>
	</div>
	<div class="commentBoxEntry"><p><?=$likesNbr?></p>
	<img src="./public/images/like.png" alt="like"></div>
	<div class="commentBoxEntry">
	<img src="./public/images/dislike.png" alt="like"><p><p><?=$disLikesNbr?></p></div>
	</div>
	</div>
	
	<?php
	foreach ($comments as $comment) {
		?>
		<div id=oneCommentBox>
		<p>Auteur : <em><?=$comment['author']?></em></p>
		<p>Date : <em><?=$comment['date_add']?></em></p>
		<p>Commentaire : <em><?=$comment['post']?></em></p>
		</div>
		<?php
		}
		?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('headerView.php');
require ('template.php'); ?>