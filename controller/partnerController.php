<?php
require('./model/partnerModel.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/partnersListView.php');
}

function partnerInfo($id) {
	$partner=getPartnerInfo($id);
	$comments=getComments($id);
	if (!empty($comments)){
	$commentsNbr=count($comments);}
	$likesNbr=votesCount($id,'like');
	$disLikesNbr=votesCount($id, 'disLike');
	require('./view/partnerView.php');
}

function commentForm($id) {
	$commentedYet=commented($id,$_SESSION['id']);
	if ($commentedYet==0){
	$partner=getPartnerInfo($id);
	require('./view/commentView.php');
	}
	
	else{
		ob_start(); ?>
			<div class="message">Vous avez déjà commenté cet acteur. Vous ne pouvez ajouter un commentaire.
			<a href="./index.php?action=partnerPage&amp;id=<?=$id?>" class="retryButton" >Retour</a>
			</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function addNewComment($partnerId, $vote, $comment) {
	$commentedYet=commented($partnerId,$_SESSION['id']);
	if ($commentedYet==0){
		createComment($_SESSION['id'], $partnerId, $comment);
		createVote($_SESSION['id'],$partnerId,$vote);
		ob_start(); ?>
			<div class="message">Votre avis a bien été enregistré. 
			Merci pour votre participation
			<a href="./index.php?action=partnerPage&amp;id=<?=$partnerId?>" class="retryButton" >Retour</a>
			</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
	
	else{
		ob_start(); ?>
			<div class="message">Vous avez déjà commenté cet acteur. Vous ne pouvez pas ajouter de commentaire.
			<a href="./index.php?action=partnerPage&amp;id=<?=$partnerId?>" class="retryButton" >Retour</a>
			</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function addVote($partnerId, $userId, $vote){
	$votedYet=voted($partnerId, $userId);
	if ($votedYet==0){
		createVote($userId,$partnerId,$vote);
		ob_start(); ?>
			<div class="message">Votre vote a bien été enregistré. 
			Merci pour votre participation
			<a href="./index.php?action=partnerPage&amp;id=<?=$partnerId?>" class="retryButton" >Retour</a>
			</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
	
	else{
		ob_start(); ?>
			<div class="message">Vous avez déjà voté pour cet acteur. Vous ne pouvez pas voter plusieurs fois.
			<a href="./index.php?action=partnerPage&amp;id=<?=$partnerId?>" class="retryButton" >Retour</a>
			</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}


