<?php
	if ($_SESSION['admin'] == '1') {
	    $nom_zingeur =         htmlspecialchars($_POST['nom_zingeur']);
	    $num_zingeur =         htmlspecialchars($_POST['num_zingeur']);
	    $adresse_zingeur =     htmlspecialchars($_POST['adresse_zingeur']);
	    $complement_zingeur =  htmlspecialchars($_POST['complement_zingeur']);
	    $ville_zingeur =  	   htmlspecialchars($_POST['ville_zingeur']);
	    $cp_zingeur =          htmlspecialchars($_POST['cp_zingeur']);
	    $pays_zingeur = 	   htmlspecialchars($_POST['pays_zingeur']);

	    $sql_insert_zingeur = "INSERT INTO zingeur VALUES ('', ?, ?, ?, ?, ?, ?, ?)";

	    $pdo->prepare($sql_insert_zingeur)->execute
	    			([$nom_zingeur, $num_zingeur, $adresse_zingeur, $complement_zingeur, $ville_zingeur, $cp_zingeur , $pays_zingeur]);

?>

	<h2 class="center">Le nouveau zingeur à été ajouté avec succès dans la base de données</h2>
	<h3 class="center">Vous pouvez dès à présent lié des articles à ce zingeur</h3>
		
<?php
	}
?>