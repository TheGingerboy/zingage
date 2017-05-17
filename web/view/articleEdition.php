<?php
  //id_article est passé par l'URL, récupération depuis l'index
  if (isset($_SESSION['identifiant'])) {

    $id_article = htmlspecialchars($id_article);
    $sql = $pdo->query("SELECT * FROM article WHERE id_article='$id_article'");

    if($sql->rowCount() < 0)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
      while ($row = $sql->fetch()){
        $ref_article  = htmlspecialchars_decode($row['ref_article']);
        $nom_article  = htmlspecialchars_decode($row['nom_article']);
        $nb_article   = htmlspecialchars_decode($row['nb_article']);
        $dim_article  = htmlspecialchars_decode($row['dim_article']);
        $bac_article  = htmlspecialchars_decode($row['bac_article']);
        $poid_article = htmlspecialchars_decode($row['poid_article']);
        $of_article = htmlspecialchars_decode($row['of_article']);
      }

?>

  <div id="formulaire">
    <h2 class="center">Modifier l'article :</h2>
    <form id="ajout-zing-form" action=" <?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/edition/traitement/" . $id_article; ?>" method="post">
    <!-- Caché pour permettre un passage de l'ID article -->
    <input style="display: none" type="hidden" name="id_article" value="<?= $id_article; ?>" class="form-control hidden">

      <div class="form-group">
        <label for="ref_article">Référence : </label>
        <input id="ref-imput" type="" name="ref_article" value="<?=  $ref_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="nom_article">Désignation : </label>
        <input type="" name="nom_article" value="<?=  $nom_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="nb_article">Nombre par bac : </label>
        <input type="" name="nb_article" value="<?=  $nb_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="dim_article">Dimensions : </label>
        <input type="" name="dim_article" value="<?= $dim_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="bac_article">Type de bac : </label>
        <input type="" name="bac_article" value="<?= $bac_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="poid_article">Poids Total (Kilos) : </label>
        <input type="" name="poid_article" value="<?= $poid_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="poid_article">Numéro d'OF : </label>
        <input type="" name="of_article" value="<?= $of_article; ?>" class="form-control" id="of" pattern="[0-9]{6,8}" title="Numéro d'OF (6 à 8 chiffres)" required>
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
    }
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>