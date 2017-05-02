<?php 

  //récupération des valeurs passé
  $identifiant = $_SESSION['identifiant'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mdp_verif = $_POST['mdp_verif'];
  $new_mdp = $_POST['new_mdp'];
  $new_mdp2 = $_POST['new_mdp2'];

  //normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts
  $nom = mysql_real_escape_string(htmlspecialchars($nom));
  $prenom = mysql_real_escape_string(htmlspecialchars($prenom));
  $mdp_verif = mysql_real_escape_string(htmlspecialchars($mdp_verif));
  $new_mdp = mysql_real_escape_string(htmlspecialchars($new_mdp));
  $new_mdp2 = mysql_real_escape_string(htmlspecialchars($new_mdp2));

  //Préparation requête
  $sql = mysqli_query($conn, "SELECT * FROM utilisateur WHERE identifiant_user='$identifiant'") or die(mysql_error());

  //Stockage des infos user
  while ($row = mysqli_fetch_assoc($sql)) {
    $nom_user = $row['nom_user'];
    $prenom_user = $row['prenom_user'];
    $mdp_user = $row['mdp_user'];
  }

  //Si vide ou nom identique, ne rien faire
  if( (!empty($nom)) && ($nom != $nom_user) ){ 
    mysqli_query($conn, "UPDATE utilisateur SET nom_user='$nom' WHERE identifiant_user='$identifiant'");
    echo '<h2 class="center">Votre nom à été modifié</h2>';
  }

  //Si vide ou prénom identique, ne rien faire 
  if( (!empty($prenom)) && ($prenom != $prenom_user) ){ 
    mysqli_query($conn, "UPDATE utilisateur SET prenom_user='$prenom' WHERE identifiant_user='$identifiant'");
    echo '<h2 class="center">Votre prénom à été modifié</h2>';
  }

  //Cryptage du mot de passe


  //Si vide ou mdp non identique, ne rien faire
  if ( !empty($mdp_verif) ) 
  {
    $mdp_verif = sha1($mdp_verif);
    if ($mdp_verif == $mdp_user) 
    {  
      if($new_mdp == $new_mdp2)
      {
        $new_mdp = sha1($new_mdp);
        //Insertion des valeurs dans la table
        mysqli_query($conn, "UPDATE utilisateur SET mdp_user='$new_mdp' WHERE identifiant_user='$identifiant'");
        echo '<h2 class="center">Changement de mot de passe effectué</h2>';
        // Retour sur la page profil
      }
      else { echo '<h2 class="center">Mot de passe inchangé, les deux mots de passe ne correspondent pas</h2>'; }
    }
    else { echo '<h2 class="center">Mot de passe inchangé, mot de passe actuel incorrect</h2>'; }
  }

  // Retour sur la page profil
  $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
  $profil = dirname(dirname(__FILE__)) . "\\view\\profil.php";
  $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
  require_once ($header);
  require_once ($profil);
  require_once ($footer);

?>