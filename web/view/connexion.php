<?php
  if (!(isset($_SESSION['identifiant']))) {

  $get_user_id =  $pdo->query("SELECT identifiant_user FROM utilisateur");

?>

  <div id="formulaire">
    <h2>Connexion</h2>
    <form id="connexion-form" autocomplete="off" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion/traitement" ?>" method="post">
      <div class="form-group center">
        <label for="identifiant" class="center full-width">Identifiant : </label>
        <div class="btn-group" data-toggle="buttons">
        <?php
          while ($row = $get_user_id->fetch()){
            echo '<label class="btn btn-success margin-all-medium center full-width">';
              echo '<input type="radio" name="identifiant" value="' . $row['identifiant_user'] . '" required="required">';
              echo $row['identifiant_user'];
            echo '</label>';          
          }
        ?>
        </div> 
      </div>
      <h4 class="full-width center">Mot de passe : </h4>


      <?php
      // Import du numpad dans le form
        $numpad_type = "password"; //Permet de définir le type de champ
        $numpad_pattern = "[0-9]*"; //Permet de définir le paterne
        $numpad_maxlength = "8";
        $numpad_required = true;
        $numpad = "http://".$_SERVER['SERVER_NAME']."/zingage/web/view/ressources/numpad/numpad.php";
        require_once("ressources/numpad/numpad.php")
      //Import des fichiers necessaire pour le bon fonctionnement du NumPad
      ?>

      <p class="center">
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>
  </div>

<?php
  }
  require_once("footer.php");