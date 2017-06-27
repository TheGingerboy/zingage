<?php
  if ((isset($_SESSION['identifiant']))) {
    
    //initialisation de la valeur d'erreur 0 = ok
    $err = false;

    //récupération et normalisation des valeurs passé
    $ref_article = htmlspecialchars($_POST['ref_article']);
    $nom_article = htmlspecialchars($_POST['nom_article']);
    $nb_article = htmlspecialchars($_POST['nb_article']);
    $dim_article = htmlspecialchars($_POST['dim_article']);
    $bac_article = htmlspecialchars($_POST['bac_article']);
    $poid_article = htmlspecialchars($_POST['poid_article']);
    $of_article = htmlspecialchars($_POST['numpad_input']);

    //Vérifie la présence d'un doublon
    $verif_ref = $pdo->query("SELECT ref_article FROM article WHERE ref_article='$ref_article'");

    if ($verif_ref && $verif_ref->rowCount() != 0) {
      echo '<h3 class="center">La référence est déja entrée dans le système<br></h3>';
      $err = true;
    }

    //Verification de la présence de toutes les valeurs
    if(empty($ref_article)){ 
      echo '<h3 class="center">Référence de l\'article absente<br></h3>';
      $err = true;
    }
    if(empty($nom_article)){ 
      echo '<h3 class="center">Désignation de l\'article absente<br></h3>';
      $err = true;
    }
    if(empty($nb_article)){ 
      echo '<h3 class="center">Quantité par bac absente<br></h3>';
      $err = true;
    }
    if(empty($bac_article)){ 
      echo '<h3 class="center">Type de bac absent<br></h3>';
      $err = true;
    }
    if(empty($poid_article)){ 
      echo '<h3 class="center">Poid du bac absent<br></h3>';
      $err = true;
    }

    //Gestion des erreurs false = ok (pas d'erreur), true = ko (erreur présente)
    if ($err == false)
    {  //Insertion des valeurs dans la table
      $zingAjout = "INSERT INTO article VALUES('', ?, ?, ?, ?, ?, ?, ?)";
      $pdo->prepare($zingAjout)->execute(
        [$ref_article, $nom_article, $nb_article, $dim_article, $bac_article, $poid_article, $of_article]
      );

      echo '<h3 class="center">Votre article est maintenant ajouté dans la base !</h3>';
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $ajout = dirname(dirname(__FILE__)) . "\\view\\articleAjout\\articleAjoutRef.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($ajout);
      require_once($footer);
    }

    else
    {
      echo '<h4 class="center">Veuillez corriger les erreurs ci-dessus !</h4>';
      echo '<h4 class="center">Votre article n\'a pas été ajouté</h4>';
      $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
      $ajout = dirname(dirname(__FILE__)) . "\\view\\articleAjout\\articleAjoutRef.php";
      $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
      require_once($header);
      require_once($ajout);
      require_once($footer);
    }
  } else { echo "<h3> Vous devez être connecté pour effectuer cette action <h3>"; }

