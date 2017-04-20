<?php
  require_once("header.php");
  if ((isset($_SESSION['identifiant']))) {
?>

  <div id="formulaire">
    <h2>Ajouter un article</h2>
    <form id="ajout-zing-form" action="zingageAjoutTraitement" method="post">

      <div class="form-group">
        <label for="ref_article">Référence : </label>
        <input type="" name="ref_article" class="form-control">
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
  require_once("footer.php");
?>

<script type="text/javascript">

$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
            $next = $('[tabIndex=1]');
        }
        $next.focus();
    }
});

</script>