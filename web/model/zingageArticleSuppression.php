<?php 
	$id_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['id_article']));
	$exist = false;

	$verifid = mysqli_query( $conn, "SELECT id_article FROM scan WHERE id_article='$id_article'" );

	//Verification de l'existence de l'ID dans la table scan
	if ($verifid && mysqli_num_rows($verifid) > 0) {
		echo "<h3>L'article n'a pas pu être supprimer, il a déja été scanné et est maintenant présent dans l'historique des mouvements.</h3>";
		echo "<h3>Supprimer d'abord la pièce de tous l'historique des mouvements pour la supprimer.</h3>";
	}
	else {
		$sql = "DELETE FROM article WHERE id_article='$id_article'";
		$result = mysqli_query($conn, $sql) or trigger_error("Une erreur s'est produite, si l'erreur persiste veuillez contacter votre administrateur réseau en retenant la façon dont vous avez produit l'erreur et en leur donnant l'erreur suivante : ");
	}

?>
