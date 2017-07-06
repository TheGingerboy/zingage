<?php 

  //récupération des valeurs passé
  $identifiant = $_SESSION['identifiant'];
  //et normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts
  $mdp_verif = htmlspecialchars($_POST['mdp_verif']);
  $new_mdp = htmlspecialchars($_POST['new_mdp']);
  $new_mdp2 = htmlspecialchars($_POST['numpad_input']);

  //Préparation requête
  $sql = $pdo->query("SELECT mdp_user FROM utilisateur WHERE identifiant_user='$identifiant'");

  //Stockage des infos user
  while ($row =  $sql->fetch()) {
    $mdp_user = $row['mdp_user'];
  }

  //Cryptage du mot de passe

  //Si vide ou mdp non identique, ne rien faire
  if ( !empty($mdp_verif) ) 
  {
    $mdp_verif = crypt($mdp_verif, $key);

    if (hash_equals($mdp_verif, $mdp_user)) 
    {  
      if((!empty($new_mdp)) && (!empty($new_mdp2)) && ($new_mdp == $new_mdp2))
      {
        $new_mdp = crypt($new_mdp, $key);
        //Insertion des valeurs dans la table
        $sql_pass = "UPDATE utilisateur SET mdp_user = ? WHERE identifiant_user = ? ";
        $pdo->prepare($sql_pass)->execute([$new_mdp, $identifiant]);
        echo '<h3 class="center">Changement de mot de passe effectué</h3>';
        // Retour sur la page profil
      }
      else { echo '<h3 class="center">Mot de passe inchangé, les deux mots de passe ne correspondent pas</h3>'; }
    }
    else { echo '<h3 class="center">Mot de passe inchangé, mot de passe actuel incorrect</h3>'; }
  }

  // Retour sur la page profil
  require_once (dirname(dirname(__FILE__)) . "\\view\\header.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\profil.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\footer.php");