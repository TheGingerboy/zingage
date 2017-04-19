<?php
  require_once("header.php");
  if (!(isset($_SESSION['identifiant']))) {
?>

  <div id="formulaire">
    <h2>Connexion</h2>
    <form id="connexion-form" action="connexionTraitement" method="post">
      <div class="form-group">
        <label for="identifiant">Identifiant : </label>
        <input type="" name="identifiant" class="form-control" id="identifiant">
      </div>
      <div class="form-group">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" class="form-control" id="mdp">
      </div>
      <button type="submit" class="btn btn-success">Valider</button>
      <button type="button" class="btn btn-danger" onclick="window.location.replace('/zingage/')">Annuler</button>
      <p>
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>

  </div>

<?php
  }
  require_once("footer.php");
?>
