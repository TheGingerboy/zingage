<?php
	//Récupération des valeurs
	$id_article = htmlspecialchars($_POST['id_article']);
	$ref_article = htmlspecialchars($_POST['ref_article']);
	$nom_article = htmlspecialchars($_POST['nom_article']);
	$nb_article = htmlspecialchars($_POST['nb_article']);
	$dim_article = htmlspecialchars($_POST['dim_article']);
	$bac_article = htmlspecialchars($_POST['bac_article']);
	$poid_article = htmlspecialchars($_POST['poid_article']);

    $sql = $pdo->query("SELECT * FROM article WHERE id_article='$id_article'");

    if($sql->rowCount() == 0)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
		while ($row = $sql->fetch())
		{
        $ref_article_current  = htmlspecialchars_decode($row['ref_article']);
        $nom_article_current  = htmlspecialchars_decode($row['nom_article']);
        $nb_article_current   = htmlspecialchars_decode($row['nb_article']);
        $dim_article_current = htmlspecialchars_decode($row['dim_article']);
        $bac_article_current  = htmlspecialchars_decode($row['bac_article']);
        $poid_article_current = htmlspecialchars_decode($row['poid_article']);
		}
    	if ((!empty($ref_article)) && ($ref_article != $ref_article_current)) {
			$sql ="UPDATE article SET ref_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$ref_article, $id_article]);
			echo '<h3 class="center">La référence de l\'article à été modifié</h3>';
		}
    	if ((!empty($nom_article)) && ($nom_article != $nom_article_current)) {
			$sql ="UPDATE article SET nom_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$nom_article, $id_article]);
			echo '<h3 class="center">Le nom de l\'article été modifié</h3>';
		}
    	if ((!empty($nb_article)) && ($nb_article != $nb_article_current)) {
			$sql ="UPDATE article SET nb_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$nb_article, $id_article]);
			echo '<h3 class="center">La quantité de l\'article à été modifié</h3>';
		}
    	if ($dim_article != $dim_article_current) {
			$sql ="UPDATE article SET dim_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$dim_article, $id_article]);
			echo '<h3 class="center">La dimension de l\'article à été modifié</h3>';
		}
    	if ((!empty($bac_article)) && ($bac_article != $bac_article_current)) {
			$sql ="UPDATE article SET bac_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$bac_article, $id_article]);
			echo '<h3 class="center">Le contenant de l\'article à été modifié</h3>';
		}
    	if ($poid_article != $poid_article_current) {
			$sql ="UPDATE article SET poid_article = ? WHERE id_article = ?";
			$pdo->prepare($sql)->execute([$poid_article, $id_article]);
			echo '<h3 class="center">Le poids de l\'article à été modifié</h3>';
		}
    }
?>