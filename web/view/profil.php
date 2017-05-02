<?php

if ($_SESSION['identifiant']){

	$identifiant = $_SESSION['identifiant'];
	$verif_id = mysqli_query($conn, "SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'");

	//Verification de l'existence de l'utilisateur
	if ($verif_id && mysqli_num_rows($verif_id) > 0) {

		$sql = mysqli_query($conn, "SELECT * FROM utilisateur WHERE identifiant_user='$identifiant'") or die(mysql_error());;

		while ($row = mysqli_fetch_assoc($sql)) {
			$nom = $row['nom_user'];
			$prenom = $row['prenom_user'];
		}

?>

<div id="formulaire">
  <h2 class="center">Profil de <?php echo $_SESSION['identifiant'] ?></h2>
  <form id="profil-form" action="profilTraitement" method="post" class="form-horizontal">
    <div class="form-group">
      <label for="nom" class="col-sm-3 control-label">Nom : </label>
      <div class="col-sm-9">
        <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars_decode($nom); ?>" id="nom">
      </div>
    </div>
    <div class="form-group">
      <label for="prenom" class="col-sm-3 control-label">Prénom : </label>
      <div class="col-sm-9">
        <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars_decode($prenom); ?>" id="prenom">
      </div>
    </div>
    <h2 class="center"> Changement de mot de passe</h2>
    <div class="form-group">
      <label for="mdp" class="col-sm-3 control-label">Mot de passe actuel : </label>
      <div class="col-sm-9">
        <input type="password" name="mdp_verif" class="form-control" id="mdp">
      </div>
    </div>
    <div class="form-group">
      <label for="mdp" class="col-sm-3 control-label">Nouveau mot de passe : </label>
      <div class="col-sm-9">
        <input type="password" name="new_mdp" class="form-control" id="mdp">
      </div>
    </div>
    <div class="form-group">
      <label for="mdp" class="col-sm-3 control-label">Confirmer le mot de passe : </label>
      <div class="col-sm-9">
        <input type="password" name="new_mdp2" class="form-control" id="mdp2">
      </div>
    </div>
    <div class="col-sm-offset-6 col-sm-6">
      <input type="submit" class="btn btn-success" value="Valider"></button>
      <button type="text" class="btn btn-danger" value="Annuler"onclick="window.location='/zingage'">Annuler</button>
    </div>
    <p>
      N'oubliez pas de valider vos choix :)
    </p>
  </form>
</div>

<?php 

		}	
	}

else {
	echo "<h2>Oups, vous n'auriez pas du arriver ici !</h2>";
}
?>
