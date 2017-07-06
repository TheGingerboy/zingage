<?php

if (isset($_SESSION['identifiant'])){

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
  <form id="profil-info-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil/info/traitement" ?>" method="post" class="form-horizontal" autocomplete="off">
    <h2 class="center"> Changement d'information</h2>
    <div class="form-group">
      <label for="nom" class="col-sm-3 control-label">Nom : </label>
      <div class="col-sm-6">
        <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>" id="nom" autocomplete="off">
      </div>
    </div>
    <div class="form-group">
      <label for="prenom" class="col-sm-3 control-label">Prénom : </label>
      <div class="col-sm-6">
        <input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>" id="prenom" autocomplete="off">
      </div>
    </div>
    <div class="center">
      <input type="submit" class="btn btn-success" value="Valider">
    </div>
    <p>N'oubliez pas de valider vos choix :)<p>
    </form>
    <form id="profil-mdp-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil/mdp1" ?>" method="post" class="form-horizontal" autocomplete="off">
      <div class="block center">
        <h2 class="center full-width"> Changement de mot de passe</h2>
      </div>

      <div class="form-group">
        <div class="center">
          <label for="mdp">Mot de passe actuel : </label>
        </div>
        <?php
          // Import du numpad dans le form
            $numpad_type = "password"; //Permet de définir le type de champ
            $numpad_maxlength = "8";
            $numpad_required = true;
            $numpad = "/ressources/numpad/numpad.php";
            require_once($numpad)
          //Import des fichiers necessaire pour le bon fonctionnement du NumPad
            ?>
          </div>
        </form>
      </div>

      <?php 

    }	
  } 
  else { 
    //Redirige vers la page de connexion via du javascript
    $connect_page = "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion";

    echo '<script type="text/javascript">';
    echo 'window.location = "' .  $connect_page . '"';
    echo '</script>';
    echo "<h2>Oups, vous n'auriez pas du arriver ici !</h2>";
  }
