<?php
  require_once("header.php");
?>

  <div id="inscription-form">
    <h2>Inscription</h2>
    <form class="form-horizontal" action="inscriptionTraitement" method="post">
      <div class="form-group">
        <label for="identifiant" class="col-sm-3 control-label">Identifiant : </label>
        <div class="col-sm-9">
          <input type="text" name="identifiant" class="form-control" id="identifiant" required>
        </div>
      </div>
      <div class="form-group">
        <label for="nom" class="col-sm-3 control-label">Nom : </label>
        <div class="col-sm-9">
          <input type="text" name="nom" class="form-control" id="nom" required>
        </div>
      </div>
      <div class="form-group">
        <label for="prenom" class="col-sm-3 control-label">Prénom : </label>
        <div class="col-sm-9">
          <input type="text" name="prenom" class="form-control" id="prenom" required>
        </div>
      </div>
      <div class="form-group">
        <label for="mdp" class="col-sm-3 control-label">Mot de passe : </label>
        <div class="col-sm-9">
          <input type="password" name="mdp" class="form-control" id="mdp" required>
        </div>
      </div>
      <div class="form-group">
        <label for="mdp" class="col-sm-3 control-label">Confirmer le mot de passe : </label>
        <div class="col-sm-9">
          <input type="password" name="mdp2" class="form-control" id="mdp2" required>
        </div>
      </div>
      <input type="submit" value="Valider">
    </form>

  </div>

<?php
  require_once("footer.php");
?>
