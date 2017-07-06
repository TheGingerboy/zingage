<?php 
if($_SESSION['admin'] == '1') {
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération et normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causer des défauts
  $identifiant = htmlspecialchars($_POST['identifiant_utilisateur']);
  $nom = htmlspecialchars($_POST['nom_utilisateur']);
  $prenom = htmlspecialchars($_POST['prenom_utilisateur']);
  $mdp = htmlspecialchars($_POST['mdp1_utilisateur']);
  $mdp2 = htmlspecialchars($_POST['numpad_input']);

  //fichier pour rediriger sur la page suivante
  $file_to_inscription = dirname(dirname(__FILE__)) . "\\view\\administration\\utilisateurAjout\\utilisateurAjoutIdentifiant.php";
  $file_to_mdp = dirname(dirname(__FILE__)) . "\\view\\administration\\utilisateurAjout\\utilisateurAjoutMdp1.php";
  $file_to_user =  dirname(dirname(__FILE__)) . "\\view\\administration\\utilisateur.php";


  //Verification de l'entrée de toutes les valeurs
  if(empty($nom)){ 
    echo "<h2>Veuillez noter votre nom<br></h2>";
    $err = 1;
  }

  if(empty($prenom)){
    echo "<h2>Veuillez noter votre prenom <br></h2>";
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


  if(hash_equals($mdp, $mdp2))
  {
    //Gestion des erreurs 0 = ok, 1 = ko
    if ($err == 0)
    {
      //Cryptage du mot de passe
      $mdp = crypt($mdp, $key);

      //Insertion des valeurs dans la table
      $insertUser = "INSERT INTO utilisateur VALUES('', ?, ?, ?, ?, ?)";
      $pdo->prepare($insertUser)->execute([$identifiant, $nom, $prenom, $mdp, '0']);
      echo "<h2>Votre inscription à bien été prise en compte !</h2>";

      //Reussite
      require_once($file_to_user);
    }

    else
    {

      //mot de passe ne correspondent pas
      echo "<h2>Votre inscription n'a pas été prise en compte, veuillez corriger les erreurs ci-dessus !</h2>";
      require_once($file_to_inscription);
    }
  }

  else
  {

      //Des champs n'ont pas correctement été rempli
      echo "<h2>Les mots de passe ne correspondent pas</h2>";
      require_once($file_to_mdp);
  }
}