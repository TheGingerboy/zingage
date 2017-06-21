<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['numpad_input']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/bac" ?>" method="post" autocomplete="off">
      <div class="form-group">
        <h4 class="center">Information non obligatoire mais completez là au plus tôt</h4>
        <h4 class="center">Cliquez sur valider tout de suite ou sur "Accès" une fois l'info entrée</h4>
        <h4 class="center">(L)ongueur × (l)argeur × (h)auteur</h4>
        <label for="dim_article">Dimensions : </label>
        <input id="dim-input" name="dim_article" class="form-control" autocomplete="off">
      </div>


      <input type="hidden" value="<?= $nb_article ?>" name="nb_article" class="hidden">
      <input type="hidden" value="<?= $nom_article ?>" name="nom_article" class="hidden">
      <input value="<?= $ref_article ?>" name="ref_article" class="hidden">

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('dim-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input> 

    </form>

  </div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Référence : <?= $ref_article ?> </p>
  <p class="center">Désignation : <?= $nom_article ?> </p>
  <p class="center">Nombre par bac : <?= $nb_article ?> </p>
</div>

<script type="text/javascript">

  document.getElementById("dim-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>