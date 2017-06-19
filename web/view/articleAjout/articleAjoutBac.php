<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
    $dim_article = htmlspecialchars($_POST['dim_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/poid" ?>" method="post">

      <div class="form-group">
        <label for="bac_article">Type de bac : </label>
         <select class="form-control" name="bac_article">
            <option selected="selected" value="Aucun">Aucun</option>
            <option value="Carton">Carton</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
          </select> 
      </div>

      <div class="hidden">
        <label for="dim_article">Dimensions : </label>
        <input type="hidden" value="<?= $dim_article ?>" name="dim_article" class="form-control">
      </div>

      <div class="hidden">
        <label for="nb_article">Nombre par bac : </label>
        <input type="hidden" value="<?= $nb_article ?>" name="nb_article" class="form-control">
      </div>

      <div class="hidden">
        <label for="nom_article">Désignation : </label>
        <input type="hidden" value="<?= $nom_article ?>" name="nom_article" class="form-control">
      </div>

      <div class="hidden">
        <label for="ref_article">Référence : </label>
        <input type="hidden" value="<?= $ref_article ?>" name="ref_article" class="form-control">
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