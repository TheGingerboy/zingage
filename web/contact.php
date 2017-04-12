<?php
  require_once("header.php");
  require_once("adminMenu.php");
?>

  <div id="contact">
    <h2>Contact</h2>
    <form action="traitementContact.php" method="post">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" required>
      </div>
      <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" class="form-control" id="email" pattern="[0-9a-z-_+.]+@[0-9a-z-_+]+.[a-z]{2,4}" required>
      </div>
      <div class="form-group">
        <label for="identifiant">Sujet : </label>
        <input type="text" class="form-control" id="sujet" required>
      </div>
      <div class="form-group">
        <label for="message">Message : </label>
        <textarea class="form-control" name="message" id="message" required></textarea>
      </div>
      <div class="form-group">
        <label for="fichier">Joindre un fichier</label>
        <input type="file" id="fichier">
        <p class="help-block">Image de votre proposition.</p>
      </div>
      <button type="submit" class="btn btn-success">Valider</button>
      <button type="button" class="btn btn-danger" onclick="window.location.replace('/GreenTeuf/')">Annuler</button>
    </form>

  </div>

<?php
  require_once("footer.php");
?>
