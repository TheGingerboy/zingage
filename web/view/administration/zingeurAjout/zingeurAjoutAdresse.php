<?php
  if ($_SESSION['admin'] == '1') {
    $nom_zingeur = htmlspecialchars($_POST['nom_zingeur']);
    $num_zingeur = htmlspecialchars($_POST['num_zingeur']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un zingeur</h2>
    <form id="ajout-zinger-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/ajout/complement" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Exemple : Avenue du Lila</h3>
        <label for="adresse_zingeur">Nom de voie <span class="asterix">*</span> : </label>
        <input id="adresse-input" name="adresse_zingeur" class="form-control" autocomplete="off" required="required">
      </div>

      <input type="hidden" value="<?= $nom_zingeur ?>" name="nom_zingeur">
      <input type="hidden" value="<?= $num_zingeur ?>" name="num_zingeur">

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('adresse-input'))" value="Effacer" class="btn btn-danger"></input> 
      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Nom : <?= $nom_zingeur ?> </p>
  <p class="center">N° : <?= $num_zingeur ?> </p>
</div>

<script type="text/javascript">

  document.getElementById("adresse-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>