<?php
  require_once("header.php");
  if ((isset($_SESSION['identifiant']))) {
?>

  <div id="formulaire">
    <h2>Ajouter un article</h2>
    <form id="ajout-zing-form" action="zingageAjoutTraitement" method="post">

      <div class="form-group">
        <label for="ref_article">Référence : </label>
        <input id="ref-imput" type="" name="ref_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="nom_article">Désignation : </label>
        <input type="" name="nom_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="nb_article">Nombre par bac : </label>
        <input type="" name="nb_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="dim_article">Dimensions : </label>
        <input type="" name="dim_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="bac_article">Type de bac : </label>
        <input type="" name="bac_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="poid_article">Poid Total : </label>
        <input type="" name="poid_article" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
  require_once("footer.php");
?>

<script type="text/javascript">

//Permet de de changer de champs en appuyant sur la touche "Entrée"
$('body').on('keydown', 'input, select', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

$("#ref-imput").focus();

</script>
