<?php
  if ((isset($_SESSION['identifiant']))) {
    
    //initialisation de la valeur d'erreur 0 = ok
    $err = false;

    //récupération des valeurs passé
    $ref_article = $_POST['ref_article'];
    $nom_article = $_POST['nom_article'];
    $nb_article = $_POST['nb_article'];
    $dim_article = $_POST['dim_article'];
    $bac_article = $_POST['bac_article'];
    $poid_article = $_POST['poid_article'];
    $of_article = $_POST['of_article'];

    //normalisation des valeurs pour empécher les injections SQL et retirer les caractères pouvant causer des défauts
    $ref_article = htmlspecialchars($ref_article);
    $nom_article = htmlspecialchars($nom_article);
    $nb_article = htmlspecialchars($nb_article);
    $dim_article = htmlspecialchars($dim_article);
    $bac_article = htmlspecialchars($bac_article);
    $poid_article = htmlspecialchars($poid_article);

    //Vérifie la présence d'un doublon
    $verif_ref = $pdo->query("SELECT ref_article FROM article WHERE ref_article='$ref_article'");

    if ($verif_ref && $verif_ref->rowCount() != 0) {
      echo "<h3>La référence est déja entrée dans le système<br></h3>";
      $err = true;
    }

    //Verification de la présence de toutes les valeurs
    if(empty($ref_article)){ 
      echo "<h3>Référence de l'article absente<br></h3>";
      $err = true;
    }
    if(empty($nom_article)){ 
      echo "<h3>Désignation de l'article absente<br></h3>";
      $err = true;
    }
    if(empty($nb_article)){ 
      echo "<h3>Quantité par bac absente<br></h3>";
      $err = true;
    }
    if(empty($bac_article)){ 
      echo "<h3>Type de bac absent<br></h3>";
      $err = true;
    }
    if(empty($poid_article)){ 
      echo "<h3>Poid du bac absent<br></h3>";
      $err = true;
    }

    //Gestion des erreurs false = ok (pas d'erreur), true = ko (erreur présente)
    if ($err == false)
    {  //Insertion des valeurs dans la table
      $zingAjout = "INSERT INTO article VALUES('', ?, ?, ?, ?, ?, ?, ?)";
      $pdo->prepare($zingAjout)->execute(
        [$ref_article, $nom_article, $nb_article, $dim_article, $bac_article, $poid_article, $of_article]
      );

      echo "<h3>Votre article est maintenant ajouté dans la base !</h3>";
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $ajout = dirname(dirname(__FILE__)) . "\\view\\articleAjout.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($ajout);
      require_once($footer);
    }

    else
    {
      echo "<h3>Votre article n'a pas été ajouté, veuillez corriger les erreurs ci-dessus !</h3>";
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $ajout = dirname(dirname(__FILE__)) . "\\view\\articleAjout.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($ajout);
      require_once($footer);
    }
  } else { echo "<h3> Vous devez être connecté pour effectuer cette action <h3>"; }

