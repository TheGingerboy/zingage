<?php
  require_once("header.php");
  require_once("adminMenu.php");
  require("connexionBD.php");
?>

<?php

if ($_SESSION['identifiant']){

	$identifiant = $_SESSION['identifiant'];
	$mdp = $_SESSION['mdp'];

	$verifid = mysql_query("SELECT identifiant_user FROM gt_user WHERE identifiant_user='$identifiant'");

	  //Verification de l'existence de l'utilisateur
	  if ($verifid && mysql_num_rows($verifid) > 0) {

	  	  //Verification du mot de passe
	  	  $verifpasswd = mysql_query("SELECT mdp_user FROM gt_user WHERE identifiant_user='$identifiant'");
	  	  $mdp2 = mysql_fetch_assoc($verifpasswd);

			if ($mdp == $mdp2['mdp_user']){

				$sql = mysql_query("SELECT * FROM gt_user WHERE identifiant_user='$identifiant'") or die(mysql_error());;

				while ($row = mysql_fetch_assoc($sql)) {

						$nom = $row['nom_user'];
						$prenom = $row['prenom_user'];
						$email = $row['mail_user'];
						$adresse = $row['rue_user'];
						$cpt_adresse = $row['complement_user'];
						$ville = $row['ville_user'];
						$cp = $row['cp_user'];
						$tel =$row['tel_user'];
				}




	  	  	?>

			  <div id="formulaire">
			    <h2>Profil de <?php echo $_SESSION['identifiant'] ?></h2>
			    <form action="profilTraitement" method="post" class="form-horizontal">
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
			      <div class="form-group">
			        <label for="email1" class="col-sm-3 control-label">Email : </label>
			        <div class="col-sm-9">
			          <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars_decode($email); ?>" id="email" pattern="[0-9a-z-_+.]+@[0-9a-z-_+]+.[a-z]{2,4}">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="mdp" class="col-sm-3 control-label">Nouveau mot de passe : </label>
			        <div class="col-sm-9">
			          <input type="password" name="mdp" class="form-control" id="mdp">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="mdp" class="col-sm-3 control-label">Confirmer le mot de passe : </label>
			        <div class="col-sm-9">
			          <input type="password" name="mdp2" class="form-control" id="mdp2">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="adresse" class="col-sm-3 control-label">Adresse : </label>
			        <div class="col-sm-9">
			          <input type="text" name="adresse" class="form-control" value="<?php echo htmlspecialchars_decode($adresse); ?>" id="adresse">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="cpt_adresse" class="col-sm-3 control-label">Complément d'adresse : </label>
			        <div class="col-sm-9">
			          <input type="text" name="cpt_adresse" class="form-control" value="<?php echo htmlspecialchars_decode($cpt_adresse); ?>" id="cpt_adresse">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="cp" class="col-sm-3 control-label">Code postal : </label>
			        <div class="col-sm-9">
			          <input type="text" name="cp" class="form-control" value="<?php echo htmlspecialchars_decode($cp); ?>" id="cp">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="ville" class="col-sm-3 control-label">Ville : </label>
			        <div class="col-sm-9">
			          <input type="text" name="ville" class="form-control" value="<?php echo htmlspecialchars_decode($ville); ?>" id="ville">
			        </div>
			      </div>
			      <div class="form-group">
			        <label for="tel" class="col-sm-3 control-label">Téléphone : </label>
			        <div class="col-sm-9">
			          <input type="tel" name="tel" class="form-control" value="0<?php echo htmlspecialchars_decode($tel); ?>" id="tel" pattern="[0-9]{10,14}" title="saisissez votre numéro de téléphone (entre 10 et 14 chiffres)">
			        </div>
			      </div>
			      <div class="col-sm-offset-6 col-sm-6">
			        <input type="submit" class="btn btn-success" value="Valider"></button>
			        <button type="text" class="btn btn-danger" value="Annuler"onclick="window.location='/greenteuf'">Annuler</button>
			      </div>
			      <p>
			        N'oubliez pas de valider vos choix :)
			      </p>
			    </form>
			  </div>


				<?php 
			}
		}



	
}

else {
	echo "<h2>Oups, vous n'auriez pas du arriver ici !</h2>";
}
require_once("footer.php");
?>
