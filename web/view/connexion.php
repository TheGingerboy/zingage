<?php
  if (!(isset($_SESSION['identifiant']))) {

  $get_user_id =  $pdo->query("SELECT identifiant_user FROM utilisateur");

?>

  <div id="formulaire">
    <h2>Connexion</h2>
    <form id="connexion-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion/traitement" ?>" method="post">
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
        <input type="password" name="mdp" class="form-control center" id="mdp" required="required">
      </div>
      <div class="container">
        <ul class="btn-group" data-toggle="buttons">
            <button class="one btn btn-primary center">1</li>
            <button class="two btn btn-primary center">2</li>
            <button class="three btn btn-primary center">3</li>
            <button class="four btn btn-primary center">4</li>
            <button class="five btn btn-primary center">5</li>
            <button class="six btn btn-primary center">6</li>
            <button class="seven btn btn-primary center">7</li>
            <button class="eight btn btn-primary center">8</li>
            <button class="nine btn btn-primary center">9</li>
            <button class="erease btn btn-danger center">Effacer</li>
            <button class="zero btn btn-primary center">0</li>
            <button type="submit" class="btn btn-success center">Valider</button>
        </ul>
      </div>      
      <p class="center">
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>
  </div>

<?php
  }
  require_once("footer.php");