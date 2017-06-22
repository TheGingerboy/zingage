<?php
  if (isset($_SESSION['identifiant'])) {
    $ref_article = htmlspecialchars($_POST['ref_article']);
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/nbr" ?>" method="post" autocomplete="off">

      <div class="form-group">
        <h3 class="center">Entrez la nomination de votre article</h3>
        <h3 class="center">Validez en appuyant sur le bouton "Accés" du clavier</h3>
        <label for="nom_article">Désignation <span class="asterix">*</span> : </label>
        <input id="nom-input" name="nom_article" class="form-control" autocomplete="off" required="required">
      </div>

      <input type="hidden" value="<?= $ref_article ?>" name="ref_article" class="hidden">

      <button type="submit" class="btn btn-success">Valider</button>

      <input type="button" onclick="clearField(document.getElementById('nom-input'))" value="Effacer" class="btn btn-danger"></input> 

      <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
      </input> 

    </form>

  </div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Référence : <?= $ref_article ?> </p>
</div>

<script type="text/javascript">

input = document.getElementById("nom-input");

window.addEventListener('load', 
  function() { 
    showKeyboard(input);
  }, false);


function showKeyboard(e){
  e.focus();
}


</script>

<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_submit.js"></script>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>
