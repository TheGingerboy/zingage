<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/nbr" ?>" method="post">

      <div class="form-group">
        <label for="nom_article">Désignation : </label>
        <input id="nom-imput" name="nom_article" class="form-control">
      </div>

      <div class="form-group hidden">
        <label for="ref_article">Référence : </label>
        <input type="hidden" value="<?= $ref_article ?>" name="ref_article" class="hidden">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>

<script type="text/javascript">

$("#nom-imput").focus();

</script>