<?php
  if (!(isset($_SESSION['identifiant']))) {
?>

  <div id="formulaire">
    <h2>Connexion</h2>
    <form id="connexion-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion/traitement" ?>" method="post">
      <div class="form-group">
        <label for="identifiant">Identifiant : </label>
        <input type="text" id="identifiant" name="identifiant" class="form-control" id="identifiant" required="required">
      </div>
      <div class="form-group">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" class="form-control" id="mdp" required="required">
      </div>
      <button type="submit" class="btn btn-success full-width">Valider</button>
      <p class="center">
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>
  </div>

<?php
  }
  require_once("footer.php");