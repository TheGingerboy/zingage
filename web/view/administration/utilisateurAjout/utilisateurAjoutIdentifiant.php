<?php
  if ( $_SESSION['admin'] == '1' ) {
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un utilisateur</h2>
    <form id="ajout-user-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/ajout/nom" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Entrez l'identifiant</h3>
        <h3 class="center">Appuyez sur la touche "accès" du clavier pour valider</h3>
        <h3 class="center">Exemple : prenom.nom</h3>
        <label for="identifiant_utilisateur">Identifiant <span class="asterix">*</span> : </label>
        <input id="identifiant-input" name="identifiant_utilisateur" class="form-control" autocomplete="off" required="required">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('identifiant-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<script type="text/javascript">

  document.getElementById("identifiant-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>