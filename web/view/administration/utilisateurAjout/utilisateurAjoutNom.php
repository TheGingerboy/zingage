<?php
if ( $_SESSION['admin'] == '1' ) {
  	$identifiant_utilisateur = htmlspecialchars($_POST['identifiant_utilisateur']);

  	$sql_verif_if_user = "SELECT identifiant_user FROM utilisateur WHERE identifiant_user = ?";
  	$verif_if_user = $pdo->prepare($sql_verif_if_user);
  	$verif_if_user->execute([$identifiant_utilisateur]);
  	$nb_row_user = $verif_if_user->fetch();

  	//Si identifiant déjà présent dans la BDD
  	if ( $nb_row_user ){
  		echo '<h3 class="center">L\'identifiant est déjà présent dans la base de données</h3>';
  		echo '<h3 class="center">Veuillez en choisir un autre</h3>';
  		require_once '/utilisateurAjoutIdentifiant.php';
  	}
  	else{ ?>

<div id="formulaire">
    <h2 class="center">Ajouter un utilisateur</h2>
    <form id="ajout-user-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/ajout/prenom" ?>" method="post" autocomplete="off">

		<div class="form-group">
			<h3 class="center">Entrez le nom</h3>
	        <label for="nom_utilisateur">Nom <span class="asterix">*</span> : </label>
	        <input id="nom-input" name="nom_utilisateur" class="form-control" autocomplete="off" required="required">
    </div>

    <input type="hidden" name="identifiant_utilisateur" value="<?= $identifiant_utilisateur ?>">

		<button type="submit" class="btn btn-success">Valider</button>

		<input type="button" onclick="clearField(document.getElementById('nom-input'))" value="Effacer" class="btn btn-danger"></input> 

		<input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
		</input>

    </form>

</div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Identifiant : <?= $identifiant_utilisateur ?> </p>
</div>


<script type="text/javascript">

  document.getElementById("nom-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php } ?>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>