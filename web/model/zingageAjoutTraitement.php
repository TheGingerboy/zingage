<?php
  if ((isset($_SESSION['identifiant']))) {
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = false;

  //récupération des valeurs passé
  $ref_article = $_POST['ref_article'];
  $nom_article = $_POST['nom_article'];
  $nb_article = $_POST['nb_article'];
  $dim_article = $_POST['dim_article'];
  $bac_article = $_POST['bac_article'];
  $poid_article = $_POST['poid_article'];

  //normalisation des valeurs pour empécher les injections SQL et retirer les caractères pouvant causer des défauts
  $ref_article = mysqli_real_escape_string($conn, htmlspecialchars($ref_article));
  $nom_article = mysqli_real_escape_string($conn, htmlspecialchars($nom_article));
  $nb_article = mysqli_real_escape_string($conn, htmlspecialchars($nb_article));
  $dim_article = mysqli_real_escape_string($conn, htmlspecialchars($dim_article));
  $bac_article = mysqli_real_escape_string($conn, htmlspecialchars($bac_article));
  $poid_article = mysqli_real_escape_string($conn, htmlspecialchars($poid_article));

  //Vérifie la présence d'un doublon
  $verif_ref = mysqli_query($conn, "SELECT ref_article FROM article WHERE ref_article='$ref_article'");

  if ($verif_ref && mysqli_num_rows($verif_ref) > 0) {
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
    $zingAjout = mysqli_query( $conn ,"INSERT INTO article VALUES('', '$ref_article', '$nom_article', '$nb_article', '$dim_article', '$bac_article', '$poid_article')" ) or trigger_error("L'accès SQL à échouer, veuillez communiquer cette erreur à votre administrateur réseau : ".mysqli_error(), E_USER_ERROR);
    echo "<h3>Votre article est maintenant ajouté dans la base !</h3>";
    $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
    $ajout = dirname(dirname(__FILE__)) . "\\view\\zingageAjout.php";
    $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
    require_once($header);
    require_once($ajout);
    require_once($footer);
  }

  else
  {
    echo "<h3>Votre article n'a pas été ajouté, veuillez corriger les erreurs ci-dessus !</h3>";
    $header = dirname(dirname(__FILE__)) . "\\view\\header.php";
    $ajout = dirname(dirname(__FILE__)) . "\\view\\zingageAjout.php";
    $footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";
    require_once($header);
    require_once($ajout);
    require_once($footer);
  }

?>

<?php
  }
  else { echo "<h3> Vous devez être connecté pour effectuer cette action <h3>"; }
?>
