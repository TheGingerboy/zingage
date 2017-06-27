<?php
	//Récupération des valeurs
	$id_zingeur = htmlspecialchars($_POST['id_zingeur']);
	$nom_zingeur = htmlspecialchars($_POST['nom_zingeur']);
	$num_zingeur = htmlspecialchars($_POST['num_zingeur']);
	$rue_zingeur = htmlspecialchars($_POST['rue_zingeur']);
	$compl_zingeur = htmlspecialchars($_POST['compl_zingeur']);
	$ville_zingeur = htmlspecialchars($_POST['ville_zingeur']);
	$cp_zingeur = htmlspecialchars($_POST['cp_zingeur']);
	$pays_zingeur = htmlspecialchars($_POST['pays_zingeur']);

    $sql_verif_if_zingeur = "SELECT * FROM zingeur WHERE id_zingeur = ? ";
    $verif_if_zingeur = $pdo->prepare($sql_verif_if_zingeur);
    $verif_if_zingeur->execute([$id_zingeur]);
    $nb_row_zingeur = $verif_if_zingeur->fetch();

    $sql = $pdo->query("SELECT * FROM zingeur WHERE id_zingeur='$id_zingeur'");

    if( !$nb_row_zingeur )
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
		while ($row = $sql->fetch())
		{
        $nom_zingeur_current  	= htmlspecialchars_decode($row['nom_zingeur']);
        $num_zingeur_current  	= htmlspecialchars_decode($row['num_adr_zingeur']);
        $rue_zingeur_current   	= htmlspecialchars_decode($row['rue_adr_zingeur']);
        $compl_zingeur_current 	= htmlspecialchars_decode($row['compl_adr_zingeur']);
        $ville_zingeur_current  = htmlspecialchars_decode($row['ville_adr_zingeur']);
        $cp_zingeur_current 	= htmlspecialchars_decode($row['cp_adr_zingeur']);
        $pays_zingeur_current 	= htmlspecialchars_decode($row['pays_adr_zingeur']);
		}
    	if ((!empty($nom_zingeur)) && ($nom_zingeur != $nom_zingeur_current)) {
			$sql ="UPDATE zingeur SET nom_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$nom_zingeur, $id_zingeur]);
			echo '<h3 class="center">Le nom du zingeur à été modifié</h3>';
		}
    	if ((!empty($num_zingeur)) && ($num_zingeur != $num_zingeur_current)) {
			$sql ="UPDATE zingeur SET num_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$num_zingeur, $id_zingeur]);
			echo '<h3 class="center">Le numéro de rue du zingeur été modifié</h3>';
		}
    	if ((!empty($rue_zingeur)) && ($rue_zingeur != $rue_zingeur_current)) {
			$sql ="UPDATE zingeur SET rue_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$rue_zingeur, $id_zingeur]);
			echo '<h3 class="center">La rue du zingeur à été modifié</h3>';
		}
    	if ($compl_zingeur != $compl_zingeur_current) {
			$sql ="UPDATE zingeur SET compl_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$compl_zingeur, $id_zingeur]);
			echo '<h3 class="center">Le complément d\'adresse du zingeur à été modifié</h3>';
		}
    	if ((!empty($ville_zingeur)) && ($ville_zingeur != $ville_zingeur_current)) {
			$sql ="UPDATE zingeur SET ville_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$ville_zingeur, $id_zingeur]);
			echo '<h3 class="center">La ville du zingeur à été modifié</h3>';
		}
    	if ($cp_zingeur != $cp_zingeur_current) {
			$sql ="UPDATE zingeur SET cp_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$cp_zingeur, $id_zingeur]);
			echo '<h3 class="center">Le code postal du zingeur à été modifié</h3>';
		}
    	if ($pays_zingeur != $pays_zingeur_current) {
			$sql ="UPDATE zingeur SET pays_adr_zingeur = ? WHERE id_zingeur = ?";
			$pdo->prepare($sql)->execute([$pays_zingeur, $id_zingeur]);
			echo '<h3 class="center">Le pays du zingeur à été modifié</h3>';
		}
    }
?>