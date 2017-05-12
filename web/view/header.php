<?php 
  if(!(isset($_SESSION)))
    session_start();
?> 

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zingage | Scan</title>
    <!-- Font awesome and minified CSS -->
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/components/font-awesome/css/font-awesome.min.css"/>
    <!-- Bootstrap latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/css/style.css"/>

  </head>
  <!-- body fermé dans le footer -->
  <body>

    <header>

    <p class="connexion">
    <?php
      //si une session existe, afficher ce bandeau
      if (isset($_SESSION['identifiant']))
        echo '<a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/profil"> Profil (' . $_SESSION['identifiant'] . ') </a> | <a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/deconnexion">déconnexion</a>' ;
      //sinon le bandeau de connexion
      else
        echo '<a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/connexion"><button class="btn-connexion btn btn-success">Connexion</button></a>' ;
    ?>
    </p>
    <h1 class="text-center">

      <?php
        $host = $_SERVER['REQUEST_URI'];
        //GOLD
        if  ( ($host == "/zingage/retour") || ($host == "/zingage/retour/recap") || ($host == "/zingage/retour/insert") ){
          $home_page =  "/zingage/retour";
          $logo_page = "logo-gold.png";
        }
        //GREEN
        elseif ( ($host == "/zingage/profil") || ($host == "/zingage/connexion") ||($host == "/zingage/profilTraitement") ){
          $home_page =  "/zingage";
          $logo_page = "logo-green.png";
        }
        //BLUE
        elseif ( ($host == "/zingage/depart") || ($host == "/zingage/depart/recap") ||($host == "/zingage/depart/recap/impression") ){
          $home_page =  "/zingage/depart";
          $logo_page = "logo.png";
        }
        else{
          $home_page =  "/zingage";
          $logo_page = "logo.png";
        }
      ?>

      <a href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $home_page ?>">
        <img id="logo" class="img-responsive" src="<?php echo "/zingage/web/images/" . $logo_page ?>" alt="AEML"/>
      </a>
    </h1>
    </header>


