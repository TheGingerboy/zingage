<?php
  require_once("header.php");
?>

  <div id="formulaire">
    <h2>Inscription</h2>
    <form action="inscriptionTraitement" method="post" class="form-horizontal">
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
        <label for="identifiant" class="col-sm-3 control-label">Identifiant : </label>
        <div class="col-sm-9">
          <input type="text" name="identifiant" class="form-control" id="identifiant" required>
        </div>
      </div>
      <div class="form-group">
        <label for="email1" class="col-sm-3 control-label">Email : </label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" id="email" pattern="[0-9a-z-_+.]+@[0-9a-z-_+]+.[a-z]{2,4}" required>
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
      <div class="form-group">
        <label for="adresse" class="col-sm-3 control-label">Adresse : </label>
        <div class="col-sm-9">
          <input type="text" name="adresse" class="form-control" id="adresse" required>
        </div>
      </div>
      <div class="form-group">
        <label for="cpt_adresse" class="col-sm-3 control-label">Complément d'adresse : </label>
        <div class="col-sm-9">
          <input type="text" name="cpt_adresse" class="form-control" id="cpt_adresse">
        </div>
      </div>
      <div class="form-group">
        <label for="cp" class="col-sm-3 control-label">Code postal : </label>
        <div class="col-sm-9">
          <input type="text" name="cp" class="form-control" id="cp" required>
        </div>
      </div>
      <div class="form-group">
        <label for="ville" class="col-sm-3 control-label">Ville : </label>
        <div class="col-sm-9">
          <input type="text" name="ville" class="form-control" id="ville" required>
        </div>
      </div>
      <div class="form-group">
        <label for="tel" class="col-sm-3 control-label">Téléphone : </label>
        <div class="col-sm-9">
          <input type="tel" name="tel" class="form-control" id="tel" pattern="[0-9]{10,14}" title="saisissez votre numéro de téléphone (entre 10 et 14 chiffres)">
        </div>
      </div>
      <div class="col-sm-offset-6 col-sm-6">
        <input type="submit" class="btn btn-success" value="Valider"></button>
        <button type="text" class="btn btn-danger" value="Annuler"onclick="window.location='/greenteuf'">Annuler</button>
      </div>
      <p>
        <a href="/GreenTeuf/connexion">Vous avez déjà un compte ?</a>
      </p>
    </form>

  </div>

<?php
  require_once("footer.php");
?>
