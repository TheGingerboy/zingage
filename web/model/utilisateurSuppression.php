<?php if($_SESSION['admin'] == '1') {?>

<?php 
	$id_user = htmlspecialchars($_POST['id_user']);

	
	$sql_verifid = "SELECT count(*) FROM scan WHERE id_user_depart = ? OR id_user_retour = ?";
	$verifid = $pdo->prepare($sql_verifid);
	$verifid->execute([$id_user, $id_user]);
	$nbr_occu = $verifid->fetchColumn();

	//Verification de l'existence de l'ID dans la table scan pour eviter la suppression d'historique
	if ($nbr_occu > 0) {
		echo "<h3>L'utilisateur n'a pas pu être supprimer, il a déja scanné des articles et est maintenant présent dans l'historique des mouvements.</h3>";
		echo "<h3>Supprimer d'abord les mouvements d'articles effectués par cet utilisateur (historique du zingage) pour le supprimer.</h3>";
	}
	else {
		$sql = "DELETE FROM utilisateur WHERE id_user = ? ";
		$pdo->prepare($sql)->execute([$id_user]);
		echo '<h3 class="center">L\'utilisateur à été supprimer</h3>';
	}

?> 

<?php }