<?php $title = 'Les partenaires'; ?>

<?php ob_start(); ?>

<h1>Les partenaires</h1>


<div class="partnersList">

	<?php
	foreach ($partnersList as $partner) {
	?>
		<h3> <?= htmlspecialchars($partner['acteur']) ?></h3>
		<em> <?= htmlspecialchars($partner['description']) ?></em>

	<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>