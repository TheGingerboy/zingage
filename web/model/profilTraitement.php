<?php 

  //récupération des valeurs passé
  $identifiant = $_SESSION['identifiant'];
  //et normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $mdp_verif = htmlspecialchars($_POST['mdp_verif']);
  $new_mdp = htmlspecialchars($_POST['new_mdp']);
  $new_mdp2 = htmlspecialchars($_POST['new_mdp2']);

  //Préparation requête
  $sql = $pdo->query("SELECT * FROM utilisateur WHERE identifiant_user='$identifiant'") or die(mysql_error());

  //Stockage des infos user
  while ($row =  $sql->fetch()) {
    $nom_user = $row['nom_user'];
    $prenom_user = $row['prenom_user'];
    $mdp_user = $row['mdp_user'];
  }

  //Si vide ou nom identique, ne rien faire
  if( (!empty($nom)) && ($nom != $nom_user) ){ 
    $sql_nom = "UPDATE utilisateur SET nom_user = ? WHERE identifiant_user = ? ";
    $pdo->prepare($sql_nom)->execute([$nom, $identifiant]);
    echo '<h2 class="center">Changement de nom effectué</h2>';
  }

  //Si vide ou prénom identique, ne rien faire 
  if( (!empty($prenom)) && ($prenom != $prenom_user) ){ 
    $sql_prenom = "UPDATE utilisateur SET prenom_user = ? WHERE identifiant_user = ? ";
    $pdo->prepare($sql_prenom)->execute([$prenom, $identifiant]);
    echo '<h2 class="center">Changement de prénom effectué</h2>';
  }

  //Cryptage du mot de passe


  //Si vide ou mdp non identique, ne rien faire
  if ( !empty($mdp_verif) ) 
  {
    $mdp_verif = crypt($key, $mdp_verif);
    if (hash_equals($mdp_verif, $mdp_user)) 
    {  
      if((!empty($new_mdp)) && (!empty($new_mdp2)) && ($new_mdp == $new_mdp2))
      {
        $new_mdp = crypt($key, $new_mdp);
        //Insertion des valeurs dans la table
        $sql_pass = "UPDATE utilisateur SET mdp_user = ? WHERE identifiant_user = ? ";
        $pdo->prepare($sql_pass)->execute([$new_mdp, $identifiant]);
        echo '<h2 class="center">Changement de mot de passe effectué</h2>';
        // Retour sur la page profil
      }
      else { echo '<h2 class="center">Mot de passe inchangé, les deux mots de passe ne correspondent pas</h2>'; }
    }
    else { echo '<h2 class="center">Mot de passe inchangé, mot de passe actuel incorrect</h2>'; }
  }

  // Retour sur la page profil
  require_once (dirname(dirname(__FILE__)) . "\\view\\header.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\profil.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\footer.php");

?>