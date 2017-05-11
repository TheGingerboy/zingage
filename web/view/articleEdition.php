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
      }

?>

  <div id="formulaire">
    <h2 class="center">Modifier l'article :</h2>
    <form id="ajout-zing-form" action=" <?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/edition/traitement/" . $id_article; ?>" method="post">
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