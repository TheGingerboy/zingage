<?php if($_SESSION['admin'] == '1') {?>

<?php
  //id_zingeur est passé par l'URL, récupération depuis l'index

    $id_zingeur = htmlspecialchars($id_zingeur);
    $sql = $pdo->query("SELECT * FROM zingeur WHERE id_zingeur = '$id_zingeur'");

    if($sql->rowCount() < 0)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
      while ($row = $sql->fetch()){
        $nom_zingeur  = htmlspecialchars_decode($row['nom_zingeur']);
        $num_zingeur   = htmlspecialchars_decode($row['num_adr_zingeur']);
        $rue_zingeur  = htmlspecialchars_decode($row['rue_adr_zingeur']);
        $compl_zingeur  = htmlspecialchars_decode($row['compl_adr_zingeur']);
        $ville_zingeur = htmlspecialchars_decode($row['ville_adr_zingeur']);
        $cp_zingeur   = htmlspecialchars_decode($row['cp_adr_zingeur']);
        $pays_zingeur   = htmlspecialchars_decode($row['pays_adr_zingeur']);
      }

?>

  <div id="formulaire">
    <h2 class="center">Modifier le zingeur :</h2>
    <form id="ajout-zinger-form" action=" <?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/edition/traitement/" . $id_zingeur; ?>" method="post">
      <!-- Caché pour permettre un passage de l'ID article -->
      <input type="hidden" name="id_zingeur" value="<?= $id_zingeur; ?>">

      <div class="form-group">
        <label for="nom_zingeur">Nom du zingeur : </label>
        <input type="" name="nom_zingeur" value="<?=  $nom_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="num_zingeur">N° et complément de n° : </label>
        <input type="" name="num_zingeur" value="<?=  $num_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="rue_zingeur">Nom de la voie : </label>
        <input type="" name="rue_zingeur" value="<?= $rue_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="compl_zingeur">Complément d'adresse : </label>
        <input type="" name="compl_zingeur" value="<?= $compl_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="ville_zingeur">Ville : </label>
        <input type="" name="ville_zingeur" value="<?= $ville_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="ville_zingeur">Code Postal : </label>
        <input type="" name="cp_zingeur" value="<?= $cp_zingeur; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="pays_zingeur">Pays : </label>
        <input type="" name="pays_zingeur" value="<?= $pays_zingeur; ?>" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>


  <?php
    }
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }