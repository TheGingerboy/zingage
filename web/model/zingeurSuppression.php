<?php if($_SESSION['admin'] == '1') {?>


<?php 
	$id_zingeur = htmlspecialchars($_POST['id_zingeur']);

	
	$sql_verifid = "SELECT count(*) FROM scan WHERE id_zingeur = ? ";
	$verifid = $pdo->prepare($sql_verifid);
	$verifid->execute([$id_zingeur]);
	$nbr_occu = $verifid->fetchColumn();

	//Verification de l'existence de l'ID dans la table scan pour eviter la suppression d'historique
	if ($nbr_occu > 0) {
		echo "<h3>Le zingeur n'a pas pu être supprimer, il a déja été scanné et est maintenant présent dans l'historique des mouvements.</h3>";
		echo "<h3>Supprimer d'abord les pièces de tous l'historique des mouvements du zingeur pour le supprimer.</h3>";
	}
	else {
		$sql = "DELETE FROM zingeur WHERE id_zingeur = ? ";
		$pdo->prepare($sql)->execute([$id_zingeur]);
		echo '<h3 class="center">Le zingeur à été supprimer</h3>';
	}

?> 

<?php }