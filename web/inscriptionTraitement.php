<?php
  require_once("header.php");
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $identifiant = $_POST['identifiant'];
  $email = $_POST['email'];
  $mdp = $_POST['mdp'];
  $mdp2 = $_POST['mdp2'];
  $adresse = $_POST['adresse'];
  $cpt_adresse = $_POST['cpt_adresse'];
  $cp = $_POST['cp'];
  $ville = $_POST['ville'];
  $tel = $_POST['tel'];

  //normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts
  $identifiant = mysql_real_escape_string(htmlspecialchars($identifiant));
  $email = mysql_real_escape_string(htmlspecialchars($email));
  $mdp = mysql_real_escape_string(htmlspecialchars($mdp));
  $mdp2 = mysql_real_escape_string(htmlspecialchars($mdp2));
  $nom = mysql_real_escape_string(htmlspecialchars($nom));
  $prenom = mysql_real_escape_string(htmlspecialchars($prenom));
  $adresse = mysql_real_escape_string(htmlspecialchars($adresse));
  $cpt_adresse = mysql_real_escape_string(htmlspecialchars($cpt_adresse));
  $cp = mysql_real_escape_string(htmlspecialchars($cp));
  $tel = mysql_real_escape_string(htmlspecialchars($tel));
  $ville = mysql_real_escape_string(htmlspecialchars($ville));

  //connexion à la BDD
  require_once("connexionBD.php");

  //Vérifie la présence d'un doublon
  $verifid = mysql_query("SELECT identifiant_user FROM gt_user WHERE identifiant_user='$identifiant'");
  $verifmail = mysql_query("SELECT mail_user FROM gt_user WHERE mail_user='$email'");

  if ($verifid && mysql_num_rows($verifid) > 0) {
    echo "<h2>L'identifiant est déja utilisé, veuillez en choisir un autre<br></h2>";
    $err = 1;
  }


  if ($verifmail && mysql_num_rows($verifmail) > 0) {
    echo "<h2>L'adresse mail est déja utilisé, veuillez en choisir une autre<br></h2>";
    $err = 1;
  }
  


  //Verification de l'entrée de toutes les valeurs
  if(empty($nom)){ 
    echo "<h2>Veuillez noter votre nom<br></h2>";
    $err = 1;
  }

  if(empty($prenom)){
    echo "<h2>Veuillez noter votre prenom <br></h2>";
    $err = 1;
  }

  if(empty($identifiant)){
    echo "<h2>Veuillez choisir votre identifiant<br></h2>";
    $err = 1;
  }

  if(empty($email)){
    echo "<h2>Veuillez noter votre email<br></h2>";
    $err = 1;
  }

  if(empty($mdp)){
    echo "<h2>Le mot de passe n'a pas été remplie<br></h2>";
    $err = 1;
  }

  if(empty($mdp2)){
    echo "<h2>Veuillez confirmer votre mot de passe<br></h2>";
    $err = 1;
  }

  if(empty($adresse)){
    echo "<h2>Veuillez noter votre adresse<br></h2>";
    $err = 1;
  }

  if(empty($cp)){
    echo "<h2>Veuillez noter votre code postal<br></h2>";
    $err = 1;
  }

  if(empty($tel)){
    echo "<h2>Veuillez noter votre numéro de téléphone<br></h2>";
    $err = 1;
  }

  if(empty($ville)){
    echo "<h2>Veuillez noter votre ville<br></h2>";
    $err = 1;
  }



  if($mdp == $mdp2)
  {

    //Gestion des erreurs 0 = ok, 1 = ko
    if ($err == 0)
    {

      //Cryptage du mot de passe
      sha1($mdp);

      //Insertion des valeurs dans la table
      mysql_query("INSERT INTO gt_user VALUES('', '$nom', '$prenom', '$email', '$adresse', '$cpt_adresse', '$ville', '$cp', '$identifiant', '$mdp', '$tel', '0')");
      echo "<h2>Votre inscription à bien été prise en compte !</h2>";
    }

    else
    {
      echo "<h2>Votre inscription n'a pas été prise en compte, veuillez corriger les erreurs ci-dessus !</h2>";
    }

  }

  else
  {
    echo "<h2>Les mots de passe ne correspondent pas</h2>";
  }

?>

<?php
  require_once("footer.php");
?>
