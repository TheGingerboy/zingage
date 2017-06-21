<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
    $dim_article = htmlspecialchars($_POST['dim_article']);
    $bac_article = htmlspecialchars($_POST['bac_article']);
    $poid_article = htmlspecialchars($_POST['numpad_input']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/traitement" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <label for="of_article">Numéro d'OF <span class="asterix">*</span> : </label>
        <?php
        // Import du numpad dans le form
          $numpad_type = "text"; //Permet de définir le type de champ
          $numpad_maxlength = "8";
          $numpad_required = true;
          $numpad = "/../ressources/numpad/numpad.php";
          require_once($numpad)
        //Import des fichiers necessaire pour le bon fonctionnement du NumPad
        ?>
      </div>


      <input type="hidden" value="<?= $poid_article ?>" name="poid_article" class="hidden">
      <input type="hidden" value="<?= $bac_article ?>" name="bac_article" class="hidden">
      <input type="hidden" value="<?= $dim_article ?>" name="dim_article" class="hidden">
      <input type="hidden" value="<?= $nb_article ?>" name="nb_article" class="hidden">
      <input type="hidden" value="<?= $nom_article ?>" name="nom_article" class="hidden">
      <input type="hidden" value="<?= $ref_article ?>" name="ref_article" class="hidden">

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
  <p class="center">Poids (Kilo) : <?= $poid_article ?> </p>
</div>

<script type="text/javascript">

  document.getElementById("of-input").focus();

</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>
