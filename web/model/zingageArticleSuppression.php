<?php 
	$id_article = htmlspecialchars($_POST['id_article']);
	$exist = false;

	$verifid = $pdo->query("SELECT id_article FROM scan WHERE id_article='$id_article'" );

	//Verification de l'existence de l'ID dans la table scan
	if ($verifid->rowCount() > 0) {
		echo "<h3>L'article n'a pas pu être supprimer, il a déja été scanné et est maintenant présent dans l'historique des mouvements.</h3>";
		echo "<h3>Supprimer d'abord la pièce de tous l'historique des mouvements pour la supprimer.</h3>";
	}
	else {
		$sql = "DELETE FROM article WHERE id_article = ? ";
		$pdo->prepare($sql)->execute([$id_article]);
		echo '<h3 class="center">L\'article à été supprimer</h3>';
	}
