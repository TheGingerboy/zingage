<?php
  require_once("header.php");
  require_once("connexionBD.php");
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $ref_article = $_POST['ref_article'];
  $nom_article = $_POST['nom_article'];
  $nb_article = $_POST['nb_article'];
  $dim_article = $_POST['dim_article'];
  $bac_article = $_POST['bac_article'];
  $poid_article = $_POST['poid_article'];



  //normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causer des défauts
  $ref_article = mysql_real_escape_string(htmlspecialchars($ref_article));
  $nom_article = mysql_real_escape_string(htmlspecialchars($nom_article));
  $nb_article = mysql_real_escape_string(htmlspecialchars($nb_article));
  $dim_article = mysql_real_escape_string(htmlspecialchars($dim_article));
  $bac_article = mysql_real_escape_string(htmlspecialchars($bac_article));
  $poid_article = mysql_real_escape_string(htmlspecialchars($poid_article));

  echo $dim_article;

  //Vérifie la présence d'un doublon
  $verif_ref = mysqli_query($conn, "SELECT ref_article FROM article WHERE ref_article='$ref_article'");

  if ($verif_ref && mysqli_num_rows($verif_ref) > 0) {
    echo "<h2>La référence est déja entrée dans le système<br></h2>";
    $err = 1;
  }

  //Verification de la présence de toutes les valeurs
  if(empty($ref_article)){ 
    echo "<h2>Référence de l'article absente<br></h2>";
    $err = 1;
  }

  if(empty($nom_article)){ 
    echo "<h2>Désignation de l'article absente<br></h2>";
    $err = 1;
  }

  if(empty($nb_article)){ 
    echo "<h2>Quantité par bac absente<br></h2>";
    $err = 1;
  }

  if(empty($bac_article)){ 
    echo "<h2>Type de bac absent<br></h2>";
    $err = 1;
  }

  if(empty($poid_article)){ 
    echo "<h2>Poid du bac absent<br></h2>";
    $err = 1;
  }

  //Gestion des erreurs 0 = ok, 1 = ko
  if ($err == 0)
  {  //Insertion des valeurs dans la table
    $zingAjout = mysqli_query( $conn ,"INSERT INTO article VALUES('', '$ref_article', '$nom_article', '$nb_article', '$dim_article', '$bac_article', '$poid_article')" ) or trigger_error("L'accès SQL à échouer, veuillez communiquer cette erreur à votre administrateur réseau : ".mysqli_error(), E_USER_ERROR);
    echo "<h2>Votre article est maintenant ajouté dans la base !</h2>";
    require_once("zingageAjout.php");
  }

  else
  {
    echo "<h2>Votre article n'a pas été ajouté, veuillez corriger les erreurs ci-dessus !</h2>";
      require_once("zingageAjout.php");
  }

?>

<?php
  require_once("footer.php");
?>
