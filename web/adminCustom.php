<?php
  require_once("header.php");
  if($_SESSION['admin']){
?>

  <div id="admin">

    <ul class="nav nav-pills">
      <li role="presentation"><a href="/GreenTeuf/adm/admin">Produits</a></li>
      <li role="presentation"><a href="/GreenTeuf/adm/adminUsr">Utilisateurs</a></li>
      <li role="presentation" class="active"><a href="/GreenTeuf/adm/adminCustom">Personnalisation</a></li>
      <li role="presentation"><a href="/GreenTeuf/adm/adminCommande">Commande</a></li>
    </ul>

    <section id="custom">

      <h2>Personnalisation</h2>

      <!-- Penser à faire des contrôles pour les fichiers joints :
           s'il n'y en a pas (champs non obligatoires car pas de required),
           ne rien importer  -->
      <form action="/GreenTeuf/adm/traitementCustom" method="post">
        <div class="form-group">
          <label for="img">Logo :</label>
          <input type="file" name='img' id="img">
          <p class="help-block">Format png.</p>
        </div>
        <div class="form-group">
          <label for="tva">TVA : </label>
          <input type="text" class="form-control" id="tva" name='tva' placeholder="<?php echo $tvaSite ?>">
        </div>
        <strong>CONTACT :</strong></br>
        <div class="form-group">
          <label for="tel">Téléphone : </label>
          <input type="tel" class="form-control" id="tel" name='tel' pattern="[0-9]{10,14}" title="saisissez votre numéro de téléphone (entre 10 et 14 chiffres)" placeholder="<?php echo $telSite ?>">
        </div>
        <div class="form-group">
          <label for="email">Mail : </label>
          <input type="email" class="form-control" id="email" name='email' pattern="[0-9a-z-_+.]+@[0-9a-z-_+]+.[a-z]{2,4}" placeholder="<?php echo $mailSite ?>">
        </div>
        <!--<div class="form-group">
          <label for="cp">Code postal : </label>
          <input type="text" class="form-control" id="cp" pattern="[0-9]*" maxlength="5" placeholder="<?php //récupérer les informations ?>" required>
        </div>-->
        <strong>PARTENAIRES :</strong></br>
        <div class="form-group">
          <input type="file" id="imgPart1" name="imgPart1">
        </div>
        <div class="form-group">
          <input type="file" id="imgPart2" name="imgPart2">
        </div>
        <div class="form-group">
          <input type="file" id="imgPart3" name="imgPart3">
        </div>
        <div class="col-sm-offset-6 col-sm-6">
          <button type="submit" class="btn btn-success">Valider</button>
        </div>
        <div class="clear"></div>
      </form>

    </section>

  </div>

<?php
}
require_once("footer.php");
?>
