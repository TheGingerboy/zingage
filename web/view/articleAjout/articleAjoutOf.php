<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
    $dim_article = htmlspecialchars($_POST['dim_article']);
    $bac_article = htmlspecialchars($_POST['bac_article']);
    $poid_article = htmlspecialchars($_POST['poid_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/traitement" ?>" method="post">

      <div class="form-group">
        <label for="of_article">Numéro d'OF : </label>
        <input type="" name="of_article" class="form-control" id="of" pattern="[0-9]{6,8}" title="Numéro d'OF (6 à 8 chiffres)" required="required"> 
      </div>

      <div class="hidden">
        <label for="poid_article">Poid Total (Kilos) : </label>
        <input type="hidden" value="<?= $poid_article ?>" name="poid_article" class="hidden">
      </div>

      <div class="hidden">
        <label for="bac_article">Type de bac : </label>
        <input type="hidden" value="<?= $bac_article ?>" name="bac_article" class="hidden">
      </div>

      <div class="hidden">
        <label for="dim_article">Dimensions : </label>
        <input type="hidden" value="<?= $dim_article ?>" name="dim_article" class="hidden">
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

$("#ref-imput").focus();

</script>