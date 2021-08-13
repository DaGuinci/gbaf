<?php $title = 'Les partenaires'; ?>
<?php ob_start(); ?>
<div class="partnerSection">
<div class="present">
	<h1>Le GBAF, un créateur de lien</h1>
	<p>Né D'une volonté de mutualiser les ressources de nos différents membres, 
	Le Groupement Banque Assurance Français​ (GBAF) est une fédération	représentant 
	6 grands groupes français.</p>
	<p>Afin de mieux accompagner les salariés des 340 agences au sein du GBAF, 
	nous proposons ici un point d’entrée unique, répertoriant un grand nombre 
	d’informations sur les partenaires et acteurs du groupe ainsi quesur les produits 
	et services bancaires et financiers.</p>
	<p>Vous pouvez également commenter les pages de chaque acteur en leur apportant une 
	appréciation chiffrée.</p>
	<p>Espérant que cet outil sera utile à votre mission de conseil et d'accompagnement, 
	nous vous souhaitons une bonne navigation.</p>
	<img src="./public/images/partnership.jpg" alt="Photo a la une"/>
	<hr>
</div>
<div id="partnersList">
	<h1>Les partenaires du GBAF</h1>
		<?php
		foreach ($partnersList as $partner) {
			$partnerId=$partner['id_acteur'];
		?>
		<div id="partnerBox">
		<img src="<?= htmlspecialchars($partner['logo']) ?>" alt="Logo partenaire"/>
			<div id="partnerDescription">
			<h2> <?= htmlspecialchars($partner['acteur']) ?></h2>
			<p id="description"> <?= htmlspecialchars($partner['firstLine']) ?></p>
			</div>
		<a href="./index.php?action=partnerPage&amp;id=<?=$partner['id_acteur']?>"><button class="button" type="button"> Lire la suite </button></a>
		</div>
		<?php
		}
		?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('headerView.php');
require ('template.php'); ?>