<?php
  if (isset($_SESSION['identifiant'])) {
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/nom" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Scannez le code barre</h3>
        <h3 class="center">Validez ensuite en cliquant "Valider"</h3>
        <label for="ref_article">Référence <span class="asterix">*</span> : </label>
        <input id="ref-input" name="ref_article" class="form-control" autocomplete="off" required="required">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('ref-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<script type="text/javascript">

  document.getElementById("ref-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>