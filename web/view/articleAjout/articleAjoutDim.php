<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/bac" ?>" method="post">

      <div class="form-group">
        <label for="dim_article">Dimensions : </label>
        <input name="dim_article" class="form-control">
      </div>

      <div class="hidden">
        <label for="nb_article">Nombre par bac : </label>
        <input type="hidden" value="<?= $nb_article ?>" name="nb_article" class="hidden">
      </div>

      <div class="hidden">
        <label for="nom_article">Désignation : </label>
        <input type="hidden" value="<?= $nom_article ?>" name="nom_article" class="hidden">
      </div>

      <div class="hidden">
        <label for="ref_article">Référence : </label>
        <input value="<?= $ref_article ?>" name="ref_article" class="hidden">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>

<script type="text/javascript">

$("#ref-imput").focus();

</script>