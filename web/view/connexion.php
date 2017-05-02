<?php
  if (!(isset($_SESSION['identifiant']))) {
?>

  <div id="formulaire">
    <h2>Connexion</h2>
    <form id="connexion-form" action="connexionTraitement" method="post">
      <div class="form-group">
        <label for="identifiant">Identifiant : </label>
        <input type="text" id="identifiant" name="identifiant" class="form-control" id="identifiant">
      </div>
      <div class="form-group">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" class="form-control" id="mdp">
      </div>
      <button type="submit" class="btn btn-success">Valider</button>
      <button type="button" class="btn btn-danger" onclick="window.location.replace('/zingage/')">Annuler</button>
      <p>
        <a href="/zingage/inscription">Vous n'avez pas de compte ?</a>
      </p>
    </form>

  </div>

<?php
  }
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

$("#identifiant").focus();

</script>
