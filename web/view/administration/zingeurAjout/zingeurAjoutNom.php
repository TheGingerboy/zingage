<?php
  if ( $_SESSION['admin'] == '1' ) {
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un zingeur</h2>
    <form id="ajout-zinger-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/ajout/num" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Entrez le nom</h3>
        <h3 class="center">Appuyez sur la touche "accès" du clavier pour valider</h3>
        <label for="nom_zingeur">Nom du zingeur <span class="asterix">*</span> : </label>
        <input id="nom-input" name="nom_zingeur" class="form-control" autocomplete="off" required="required">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('nom-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<script type="text/javascript">

  document.getElementById("nom-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>