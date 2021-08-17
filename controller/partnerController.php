<?php
require('./model/partnerModel.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/partnersListView.php');
}

function partnerInfo($id) {
	$partner=getPartnerInfo($id);
	$comments=getComments($id);
	$commentsNbr=count($comments);
	$likesNbr=votesCount($id,'like');
	$disLikesNbr=votesCount($id, 'disLike');
	require('./view/partnerView.php');
}

function commentForm($id) {
	$partner=getPartnerInfo($id);
	require('./view/commentView.php');
}

function addNewComment($partnerId, $likeDislike, $comment) {
	createComment($_SESSION['id'], $partnerId, $comment);
	createVote($_SESSION['id'],$partnerId,$likeDislike);
			ob_start(); ?>
		<div id="message">Votre avis a bien été enregistré. Merci pour votre participation;
			<a href="./index.php?action=partnerPage&amp;id=<?=$partnerId?>" class="retryButton" >Retour</a>
		</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
}


