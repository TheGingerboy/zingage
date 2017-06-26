<?php
  if ($_SESSION['admin'] == '1') {
    $nom_zingeur =         htmlspecialchars($_POST['nom_zingeur']);
    $num_zingeur =         htmlspecialchars($_POST['num_zingeur']);
    $adresse_zingeur =     htmlspecialchars($_POST['adresse_zingeur']);
    $complement_zingeur =  htmlspecialchars($_POST['complement_zingeur']);
    $ville_zingeur =       htmlspecialchars($_POST['ville_zingeur']);
    $cp_zingeur =          htmlspecialchars($_POST['numpad_input']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zinger-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/ajout/traitement" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Entrez votre pays</h3>
        <label for="pays_zingeur">Pays <span class="asterix">*</span> : </label>
        <input id="pays-input" name="pays_zingeur" class="form-control" autocomplete="off" required="required">
      </div>

      <input type="hidden" value="<?= $nom_zingeur ?>" name="nom_zingeur">
      <input type="hidden" value="<?= $num_zingeur ?>" name="num_zingeur">
      <input type="hidden" value="<?= $adresse_zingeur ?>" name="adresse_zingeur">
      <input type="hidden" value="<?= $complement_zingeur ?>" name="complement_zingeur">
      <input type="hidden" value="<?= $ville_zingeur ?>" name="ville_zingeur">
      <input type="hidden" value="<?= $cp_zingeur ?>" name="cp_zingeur">

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('pays-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Nom : <?= $nom_zingeur ?> </p>
  <p class="center">N° : <?= $num_zingeur ?> </p>
  <p class="center">Rue : <?= $adresse_zingeur ?> </p>
  <p class="center">Complément : <?= $complement_zingeur ?> </p>
  <p class="center">Ville : <?= $ville_zingeur ?> </p>
  <p class="center">CodePostal : <?= $cp_zingeur ?> </p>
</div>

<script type="text/javascript">

  document.getElementById("pays-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>