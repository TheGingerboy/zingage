<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération et normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causer des défauts
  $identifiant = htmlspecialchars($_POST['identifiant']);
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $mdp = htmlspecialchars($_POST['mdp']);
  $mdp2 = htmlspecialchars($_POST['mdp2']);

  //Vérifie la présence d'un doublon
  $verifid = $pdo->query("SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'");

  if ($verifid && $verifid->rowCount() > 0) {
    echo "<h2>L'identifiant est déja utilisé, veuillez en choisir un autre<br></h2>";
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
      $mdp = crypt($key, $mdp);

      //Insertion des valeurs dans la table
      $insertUser = "INSERT INTO utilisateur VALUES('', ?, ?, ?, ?, ?)";
      $pdo->prepare($insertUser)->execute([$identifiant, $nom, $prenom, $mdp, '0']);


      echo "<h2>Votre inscription à bien été prise en compte !</h2>";
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $accueil = dirname(dirname(__FILE__)) . "\\view\\zingage.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($accueil);
      require_once($footer);
    }

    else
    {
      echo "<h2>Votre inscription n'a pas été prise en compte, veuillez corriger les erreurs ci-dessus !</h2>";
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $inscription = dirname(dirname(__FILE__)) . "\\view\\inscription.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($inscription);
      require_once($footer);
    }

  }

  else
  {
    echo "<h2>Les mots de passe ne correspondent pas</h2>";
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $inscription = dirname(dirname(__FILE__)) . "\\view\\inscription.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($inscription);
      require_once($footer);
  }