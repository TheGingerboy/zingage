<?php
  require_once("header.php");
?>

<?php 

  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $identifiant = $_SESSION['identifiant'];
  $email = $_POST['email'];
  $mdp = $_POST['mdp'];
  $mdp2 = $_POST['mdp2'];
  $adresse = $_POST['adresse'];
  $cpt_adresse = $_POST['cpt_adresse'];
  $cp = $_POST['cp'];
  $ville = $_POST['ville'];
  $tel = $_POST['tel'];

  //normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts

  $mdp = mysql_real_escape_string(htmlspecialchars($mdp));
  $mdp2 = mysql_real_escape_string(htmlspecialchars($mdp2));
  $nom = mysql_real_escape_string(htmlspecialchars($nom));
  $prenom = mysql_real_escape_string(htmlspecialchars($prenom));
  $email = mysql_real_escape_string(htmlspecialchars($email));
  $adresse = mysql_real_escape_string(htmlspecialchars($adresse));
  $cpt_adresse = mysql_real_escape_string(htmlspecialchars($cpt_adresse));
  $cp = mysql_real_escape_string(htmlspecialchars($cp));
  $tel = mysql_real_escape_string(htmlspecialchars($tel));
  $ville = mysql_real_escape_string(htmlspecialchars($ville));

  //connexion à la BDD
  require_once("connexionBD.php");


  //Verification de l'entrée de toutes les valeurs
  if(!empty($nom)){  mysql_query("UPDATE gt_user SET nom_user='$nom' WHERE identifiant_user='$identifiant'"); }

  if(!empty($prenom)){ mysql_query("UPDATE gt_user SET prenom_user='$prenom' WHERE identifiant_user='$identifiant'"); }

  if(!empty($email)){ mysql_query("UPDATE gt_user SET mail_user='$email' WHERE identifiant_user='$identifiant'"); }

  if(!empty($adresse)){ mysql_query("UPDATE gt_user SET rue_user='$adresse' WHERE identifiant_user='$identifiant'"); }

  if(!empty($cpt_adresse)){ mysql_query("UPDATE gt_user SET complement_user='$cpt_adresse' WHERE identifiant_user='$identifiant'"); }

  if(!empty($cp)){ mysql_query("UPDATE gt_user SET cp_user='$cp' WHERE identifiant_user='$identifiant'"); }

  if(!empty($tel)){ mysql_query("UPDATE gt_user SET tel_user='$tel' WHERE identifiant_user='$identifiant'"); }

  if(!empty($ville)){ mysql_query("UPDATE gt_user SET ville_user='$ville' WHERE identifiant_user='$identifiant'"); }



  if($mdp == $mdp2)
  {

    //Gestion des erreurs 0 = ok, 1 = ko
    if ($err == 0)
    {

      //Cryptage du mot de passe
      sha1($mdp);

      //Insertion des valeurs dans la table

      echo "<h2>Vos changement on bien été pris en compte !</h2>";
    }

    else
    {
      echo "<h2>Vos changement n'ont pas été pris en compte, veuillez corriger les erreurs ci-dessus !</h2>";
    }

  }

  else
  {
    echo "<h2>Les mots de passe ne correspondent pas, modification annulé</h2>";
  }

  require_once("profil.php");

?>

<?php
  require_once("footer.php");
?>
