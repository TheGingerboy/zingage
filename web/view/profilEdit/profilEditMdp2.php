<?php
if ($_SESSION['identifiant']) {
	$mdp_verif = $_POST['mdp_verif'];
	$new_mdp = $_POST['numpad_input'];

	?>
	<div id="formulaire">
		<h2 class="center">Ajouter un zingeur</h2>
		<form id="profil-info-form" action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil/mdp/traitement" ?>" method="post" autocomplete="off">

			<div class="form-group">
				<label for="numpad_input" class="labelCenter">Nouveau mot de passe <span class="asterix">*</span> : </label>
				<?php
            // Import du numpad dans le form
              $numpad_type = "password"; //Permet de définir le type de champ
              $numpad_maxlength = "8";
              $numpad_required = true;
              $numpad = "/../ressources/numpad/numpad.php";
              require_once($numpad)
            //Import des fichiers necessaire pour le bon fonctionnement du NumPad
              ?>
          </div>

          <input type="hidden" name="mdp_verif" value="<?= $mdp_verif ?>">
          <input type="hidden" name="new_mdp" value="<?= $new_mdp ?>">

      </form>

  </div>

  <?php
}

else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }
?>
