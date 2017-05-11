<?php 
	$id_scan = htmlspecialchars($_POST['id_scan']);

	$verifscan = $pdo->query("SELECT id_scan FROM scan WHERE id_scan='$id_scan'" );

	//Verification de l'existence de l'ID dans la table scan
	if ($verifscan->rowCount() < 0) {
		echo "<h3>Une erreur est survenu, si elle persiste contactez votre administrateur réseau.</h3>";
	}
	else {
		$sql = "DELETE FROM scan WHERE id_scan = ? ";
		$pdo->prepare($sql)->execute([$id_scan]);
		echo "<h3 class=\"center\">Le mouvement d'article à été supprimer</h3>";
	}
