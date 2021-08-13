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
	<h1>23 Commentaires</h1>
	<a href="#"><button class="button" type="button"> Ajouter commentaire </button></a>
	</div>
	<!--<h1>Les partenaires du GBAF</h1>
		<?php
		foreach ($partnersList as $partner) {
			//$cutLine=explode("\n",$partner['description']);
		?>
		<div id="partnerBox">
		<img src="<?= htmlspecialchars($partner['logo']) ?>" alt="Logo partenaire"/>
			<div id="partnerDescription">
			<h2> <?= htmlspecialchars($partner['acteur']) ?></h2>
			<p id="description"> <?= htmlspecialchars($partner['firstLine']) ?></p>
			</div>
		<button class="button" type="button"> Lire la suite </button>
		</div>-->
		<?php
		}
		?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('headerView.php');
require ('template.php'); ?>