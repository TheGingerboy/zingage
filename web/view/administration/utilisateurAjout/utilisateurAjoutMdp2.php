<?php
if ( $_SESSION['admin'] == '1' ) {
    $identifiant_utilisateur = htmlspecialchars($_POST['identifiant_utilisateur']);
    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $mdp1_utilisateur = htmlspecialchars($_POST['numpad_input']);

?>

<div id="formulaire">
    <h2 class="center">Ajouter un utilisateur</h2>
    <form id="ajout-user-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/ajout/traitement" ?>" method="post" autocomplete="off">

    <div class="form-group">
      <h3 class="center">Entrez le mot de passe</h3>
            <label for="prenom_utilisateur">Mot de passe <span class="asterix">*</span> : </label>
            <?php
            // Import du numpad dans le form
              $numpad_type = "password"; //Permet de définir le type de champ
              $numpad_maxlength = "8";
              $numpad_required = true;
              $numpad = "/../../ressources/numpad/numpad.php";
              require_once($numpad)
            //Import des fichiers necessaire pour le bon fonctionnement du NumPad
            ?>
    </div>

    <input type="hidden" name="identifiant_utilisateur" value="<?= $identifiant_utilisateur ?>">
    <input type="hidden" name="nom_utilisateur" value="<?= $nom_utilisateur ?>">
    <input type="hidden" name="prenom_utilisateur" value="<?= $prenom_utilisateur ?>">
    <input type="hidden" name="mdp1_utilisateur" value="<?= $mdp1_utilisateur ?>">

    <button type="submit" class="btn btn-success">Valider</button>

    <input type="button" onclick="clearField(document.getElementById('nom-input'))" value="Effacer" class="btn btn-danger"></input> 

    <input type="button" onclick="location.href='<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>';" value="Accueil" class="btn btn-warning">
    </input>

    </form>

</div>

<div id="add-recap">
  <h3 class="center">Récapitulatif</h3>
  <p class="center">Identifiant : <?= $identifiant_utilisateur ?> </p>
  <p class="center">Nom : <?= $nom_utilisateur ?> </p>
  <p class="center">Prénom : <?= $prenom_utilisateur ?> </p>
</div>

  <?php
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>