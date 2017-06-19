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
              echo '<input type="radio" name="identifiant" value="' . $row['identifiant_user'] . '">';
              echo $row['identifiant_user'];
            echo '</label>';          
          }

        ?>
        </div> 
      </div>
      <div class="form-group center">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" class="form-control center" id="mdp" pattern="[0-9]*" inputmode="numeric" maxlength="8" required="required" autocomplete="off">
      </div>
      <div class="container">
        <ul class="btn-group" data-toggle="buttons">
            <button id="numpad_one"    class="btn btn-primary center">1</button>
            <button id="numpad_two"    class="btn btn-primary center">2</button>
            <button id="numpad_three"  class="btn btn-primary center">3</button>
            <button id="numpad_four"   class="btn btn-primary center">4</button>
            <button id="numpad_five"   class="btn btn-primary center">5</button>
            <button id="numpad_six"    class="btn btn-primary center">6</button>
            <button id="numpad_seven"  class="btn btn-primary center">7</button>
            <button id="numpad_eight"  class="btn btn-primary center">8</button>
            <button id="numpad_nine"   class="btn btn-primary center">9</button>
            <button id="numpad_erease" class="btn btn-danger  center">Effacer</button>
            <button id="numpad_zero"   class="btn btn-primary center">0</button>
            <button id="numpad_submit" class="btn btn-success center">Valider</button>
        </ul>
      </div>      
      <p class="center">
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>
  </div>

  <script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/numpad.js"></script>

<?php
  }
  require_once("footer.php");