<?php
	//Récupération des valeurs
	$id_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['id_article']));
	$ref_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['ref_article']));
	$nom_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nom_article']));
	$nb_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nb_article']));
	$dim_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dim_article']));
	$bac_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['bac_article']));
	$poid_article = mysqli_real_escape_string($conn, htmlspecialchars($_POST['poid_article']));

    $sql = "SELECT * FROM article WHERE id_article='$id_article'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
		while ($row = mysqli_fetch_array($result))
		{
			$ref_article_current  = $row[1];
			$nom_article_current  = $row[2];
			$nb_article_current   = $row[3];
			$dim_article_current  = $row[4];
			$bac_article_current  = $row[5];
			$poid_article_current = $row[6];
		}
    	if ((!empty($ref_article)) && ($ref_article != $ref_article_current)) {
			mysqli_query($conn, "UPDATE article SET ref_article='$ref_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">La référence de l\'article à été modifié</h3>';
		}
    	if ((!empty($nom_article)) && ($nom_article != $nom_article_current)) {
			mysqli_query($conn, "UPDATE article SET nom_article='$nom_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">Le nom de l\'article été modifié</h3>';
		}
    	if ((!empty($nb_article)) && ($nb_article != $nb_article_current)) {
			mysqli_query($conn, "UPDATE article SET nb_article='$nb_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">La quantité de l\'article à été modifié</h3>';
		}
    	if ($dim_article != $dim_article_current) {
			mysqli_query($conn, "UPDATE article SET dim_article='$dim_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">La dimension de l\'article à été modifié</h3>';
		}
    	if ((!empty($bac_article)) && ($bac_article != $bac_article_current)) {
			mysqli_query($conn, "UPDATE article SET bac_article='$bac_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">Le contenant de l\'article à été modifié</h3>';
		}
    	if ($poid_article != $poid_article_current) {
			mysqli_query($conn, "UPDATE article SET poid_article='$poid_article' WHERE id_article='$id_article'");
			echo '<h3 class="center">Le poids de l\'article à été modifié</h3>';
		}
    }


?>