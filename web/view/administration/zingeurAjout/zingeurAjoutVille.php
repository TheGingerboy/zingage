<?php
  if ($_SESSION['admin'] == '1') {
    $nom_zingeur =         htmlspecialchars($_POST['nom_zingeur']);
    $num_zingeur =         htmlspecialchars($_POST['num_zingeur']);
    $adresse_zingeur =     htmlspecialchars($_POST['adresse_zingeur']);
    $complement_zingeur =  htmlspecialchars($_POST['complement_zingeur']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zinger-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/ajout/cp" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Entrez la ville du zingeur</h3>
        <label for="ville_zingeur">Ville <span class="asterix">*</span> : </label>
        <input id="ville-input" name="ville_zingeur" class="form-control" autocomplete="off" required="required">
      </div>

      <input type="hidden" value="<?= $nom_zingeur ?>" name="nom_zingeur">
      <input type="hidden" value="<?= $num_zingeur ?>" name="num_zingeur">
      <input type="hidden" value="<?= $adresse_zingeur ?>" name="adresse_zingeur">
      <input type="hidden" value="<?= $complement_zingeur ?>" name="complement_zingeur">
      <input type="hidden" value="<?= $cp_zingeur ?>" name="cp_zingeur">

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('ville-input'))" value="Effacer" class="btn btn-danger"></input> 

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
</div>

<script type="text/javascript">

  document.getElementById("ville-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>