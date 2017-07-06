<?php if($_SESSION['admin'] == '1') {?>

<?php
  //id_zingeur est passé par l'URL, récupération depuis l'index

    $sql_verif_if_user = "SELECT * FROM utilisateur WHERE id_user = ? ";
    $verif_if_user = $pdo->prepare($sql_verif_if_user);
    $verif_if_user->execute([$id_user]);
    $nb_row_user = $verif_if_user->fetch();

    $id_user = htmlspecialchars($id_user);
    $sql = $pdo->query("SELECT * FROM utilisateur WHERE id_user = '$id_user'");

    if(!$nb_row_user)
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
      while ($row = $sql->fetch()){
        $id_user  = htmlspecialchars_decode($row['id_user']);
        $identifiant_user   = htmlspecialchars_decode($row['identifiant_user']);
        $nom_user  = htmlspecialchars_decode($row['nom_user']);
        $prenom_user  = htmlspecialchars_decode($row['prenom_user']);
        $role_user = htmlspecialchars_decode($row['role_user']);
      }

?>

  <div id="formulaire-user">
    <h2 class="center">Modifier le zingeur :</h2>
    <form id="ajout-user-form" action=" <?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/edition/traitement/" . $id_user; ?>" method="post">
      <!-- Caché pour permettre un passage de l'ID article -->
      <input type="hidden" name="id_user" value="<?= $id_user; ?>">

      <div class="form-group">
        <label for="identifiant_user">Identifiant : </label>
        <input type="" name="identifiant_user" value="<?=  $identifiant_user; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="nom_user">Nom : </label>
        <input type="" name="nom_user" value="<?=  $nom_user; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="prenom_user">Prenom : </label>
        <input type="" name="prenom_user" value="<?= $prenom_user; ?>" class="form-control">
      </div>

      <div class="form-group">
          <label for="prenom_user">Rôle : </label>
          <div class="btn-group" data-toggle="buttons">

          <?php if ($role_user) { ?>

              <label class="btn btn-radio">
                  <input type="radio" name="role_user" value="0">
                  Utilisateur
              </label>
              <label class="btn btn-radio active">
                  <input type="radio" name="role_user" value="1" checked="checked">
                  Administrateur
              </label>

          <?php  } else { ?>

              <label class="btn btn-radio active">
                  <input type="radio" name="role_user" value="0" checked="checked">
                  Utilisateur
              </label>
              <label class="btn btn-radio">
                  <input type="radio" name="role_user" value="1">
                  Administrateur
              </label>

          <?php  }  ?> 


          </div> 
      </div>

      <div class="form-group center">
          <label class="center block" for="reset_user">Réinitialise le mot de passe utilisateur (0000 à la connexion) : </label>
          <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-radio no-float block">
                  <input type="checkbox" name="reset_user" value="1">
                  Si activé : Réinitialisation
              </label>
          </div> 
      </div>

      <hr/>
      <div class="center block">
        <input type="submit" class="btn btn-success center" value="Valider">
      </div>


    </form>
  </div>

  <?php
    }
  }
  else{ echo "<h2>Vous devez être connecté pour effectuer cette action<h2>"; }