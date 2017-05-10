<?php

  if ($_SESSION['identifiant']){

  	$identifiant = $_SESSION['identifiant'];
  	$verif_id = $pdo->query("SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'");

  	//Verification de l'existence de l'utilisateur
  	if ($verif_id && $verif_id->rowCount() != 0) {

  		$sql = $pdo->query("SELECT * FROM utilisateur WHERE identifiant_user='$identifiant'");

  		while ($row = $sql->fetch()) {
  			$nom = htmlspecialchars_decode($row['nom_user']);
  			$prenom = htmlspecialchars_decode($row['prenom_user']);
  		}

?>

  <div id="formulaire">
    <h2 class="center">Profil de <?php echo $_SESSION['identifiant'] ?></h2>
    <form id="profil-form" action="profilTraitement" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="nom" class="col-sm-3 control-label">Nom : </label>
        <div class="col-sm-9">
          <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>" id="nom">
        </div>
      </div>
      <div class="form-group">
        <label for="prenom" class="col-sm-3 control-label">Prénom : </label>
        <div class="col-sm-9">
          <input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>" id="prenom">
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
      </div>
      <p>
        N'oubliez pas de valider vos choix :)
      </p>
    </form>
  </div>

<?php 

		}	
	} else { echo "<h2>Oups, vous n'auriez pas du arriver ici !</h2>"; }
