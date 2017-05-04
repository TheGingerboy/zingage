<?php
  //id_article est passé par l'URL, récupération depuis l'index
  if (isset($_SESSION['identifiant'])) {

    $id_article = mysqli_real_escape_string($conn, htmlspecialchars($id_article));
    $sql = "SELECT * FROM article WHERE id_article='$id_article'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
      while ($row = mysqli_fetch_array($result)){
        $ref_article  = htmlspecialchars_decode($row[1]);
        $nom_article  = htmlspecialchars_decode($row[2]);
        $nb_article   = htmlspecialchars_decode($row[3]);
        $dim_article  = htmlspecialchars_decode($row[4]);
        $bac_article  = htmlspecialchars_decode($row[5]);
        $poid_article = htmlspecialchars_decode($row[6]);
      }

?>

  <div id="formulaire">
    <h2 class="center">Modifier l'article :</h2>
    <form id="ajout-zing-form" action="/zingage/zingageArticleEditionTraitement/ <?php echo $id_article; ?>" method="post">
    <!-- Caché pour permettre un passage de l'ID article -->
    <input style="display: none" type="hidden" name="id_article" value="<?php echo $id_article; ?>" class="form-control hidden">

      <div class="form-group">
        <label for="ref_article">Référence : </label>
        <input id="ref-imput" type="" name="ref_article" value="<?php echo $ref_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="nom_article">Désignation : </label>
        <input type="" name="nom_article" value="<?php echo $nom_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="nb_article">Nombre par bac : </label>
        <input type="" name="nb_article" value="<?php echo $nb_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="dim_article">Dimensions : </label>
        <input type="" name="dim_article" value="<?php echo $dim_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="bac_article">Type de bac : </label>
        <input type="" name="bac_article" value="<?php echo $bac_article; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="poid_article">Poids Total (Kilos) : </label>
        <input type="" name="poid_article" value="<?php echo $poid_article; ?>" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
    </form>

  </div>

  <?php
    }
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