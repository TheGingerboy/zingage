<?php 

  //récupération des valeurs passé
  $identifiant = $_SESSION['identifiant'];
  //et normalisation des valeurs pour empécher les injections SQL et retirer les caractère pouvant causé des défauts
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);

  //Préparation requête
  $sql = $pdo->query("SELECT nom_user, prenom_user FROM utilisateur WHERE identifiant_user='$identifiant'");

  //Stockage des infos user
  while ($row =  $sql->fetch()) {
    $nom_user = $row['nom_user'];
    $prenom_user = $row['prenom_user'];
  }

  //Si vide ou nom identique, ne rien faire
  if( (!empty($nom)) && ($nom != $nom_user) ){ 
    $sql_nom = "UPDATE utilisateur SET nom_user = ? WHERE identifiant_user = ? ";
    $pdo->prepare($sql_nom)->execute([$nom, $identifiant]);
    echo '<h3 class="center">Changement de nom effectué</h3>';
  }

  //Si vide ou prénom identique, ne rien faire 
  if( (!empty($prenom)) && ($prenom != $prenom_user) ){ 
    $sql_prenom = "UPDATE utilisateur SET prenom_user = ? WHERE identifiant_user = ? ";
    $pdo->prepare($sql_prenom)->execute([$prenom, $identifiant]);
    echo '<h3 class="center">Changement de prénom effectué</h3>';
  }

  // Retour sur la page profil
  require_once (dirname(dirname(__FILE__)) . "\\view\\header.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\profil.php");
  require_once (dirname(dirname(__FILE__)) . "\\view\\footer.php");