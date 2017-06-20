<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
    $dim_article = htmlspecialchars($_POST['dim_article']);
    $bac_article = htmlspecialchars($_POST['bac_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/of" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <label for="poid_article">Poids Total (Kilo) <span class="asterix">*</span> : </label>
        <input type="number" id="poid-input" type="" name="poid_article" class="form-control">
      </div>

      <input type="hidden" value="<?= $bac_article ?>" name="bac_article" class="hidden">
      <input type="hidden" value="<?= $dim_article ?>" name="dim_article" class="hidden">
      <input type="hidden" value="<?= $nb_article  ?>" name="nb_article"  class="hidden">
      <input type="hidden" value="<?= $nom_article ?>" name="nom_article" class="hidden">
      <input type="hidden" value="<?= $ref_article ?>" name="ref_article" class="hidden">


      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('poid-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input>

    </form>

  </div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Référence : <?= $ref_article ?> </p>
  <p class="center">Désignation : <?= $nom_article ?> </p>
  <p class="center">Nombre par bac : <?= $nb_article ?> </p>
  <p class="center">Dimensions : <?= $dim_article ?> </p>
  <p class="center">Type de bac : <?= $bac_article ?> </p>
</div>

<script type="text/javascript">

  document.getElementById("poid-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>