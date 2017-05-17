<?php
  if (isset($_SESSION['identifiant'])) {
?>

  <div id="formulaire">
    <h2 class="center">Ajouter un article</h2>
    <form id="ajout-zing-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout/traitement" ?>" method="post">

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
         <select class="form-control" name="bac_article">
            <option selected="selected" value="Aucun">Aucun</option>
            <option value="Carton">Carton</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
          </select> 
      </div>

      <div class="form-group">
        <label for="poid_article">Poid Total (Kilos) : </label>
        <input type="" name="poid_article" class="form-control">
      </div>

      <div class="form-group">
        <label for="poid_article">Numéro d'OF : </label>
        <input type="" name="of_article" class="form-control" id="of" pattern="[0-9]{6,8}" title="Numéro d'OF (6 à 8 chiffres)" required> 
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
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
