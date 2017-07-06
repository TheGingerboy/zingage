<?php
if ($_SESSION['identifiant']) {

  $mdp_verif = htmlspecialchars($_POST['numpad_input']);
  $mdp_verif_crypt = crypt($mdp_verif, $key);
  $identifiant = $_SESSION['identifiant'];

  $sql_get_current_pass = $pdo->query("SELECT mdp_user FROM utilisateur WHERE identifiant_user = '$identifiant'");

    //Récupération du mdp dans la BDD
  while ($row = $sql_get_current_pass->fetch())
    { $current_pass   = $row['mdp_user'];  }

  if (hash_equals($current_pass, $mdp_verif_crypt)) {

    ?>
    <div id="formulaire">
      <h2 class="center">Ajouter un zingeur</h2>
      <form id="profil-info-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil/mdp2" ?>" method="post" autocomplete="off">

        <div class="form-group">
          <label for="numpad_input" class="labelCenter">Nouveau mot de passe <span class="asterix">*</span> : </label>
          <?php
            // Import du numpad dans le form
              $numpad_type = "password"; //Permet de définir le type de champ
              $numpad_maxlength = "8";
              $numpad_required = true;
              $numpad = "/../ressources/numpad/numpad.php";
              require_once($numpad)
            //Import des fichiers necessaire pour le bon fonctionnement du NumPad
              ?>
            </div>

            <input type="hidden" name="mdp_verif" value="<?= $mdp_verif ?>">

          </form>

        </div>

        <script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

        <?php
      }
      else{
        echo("Mot de passe incorrect, veuillez réessayer");
        $location_folder = dirname(dirname(dirname(__FILE__)));
        require_once($location_folder . "\\view\\header.php");
        require_once($location_folder . "\\view\\profil.php");
        require_once($location_folder . "\\view\\footer.php");
      }
    }
    else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
    ?>
