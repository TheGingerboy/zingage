<?php 
  if(!isset($_SESSION))
    session_start();
?> 

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zingage | AEML</title>
    <!-- Font awesome and minified CSS -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/components/font-awesome/css/font-awesome.min.css"/>
    <!-- Bootstrap latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Fancy Sidebar -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/css/fancy-sidebar.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/css/style.css"/>

  </head>
  <!-- body fermé dans le footer -->

    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
          <ul class="nav sidebar-nav">
              <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . '/zingage/' ?>">
                  <img class="img-responsive" src="<?= "/zingage/web/images/" . $logo_img ?>" alt="AEML"/>
              </a>
              <li>
                  <div class="small-rectangle blue"></div>
                  <a class="title" href="/zingage/depart">Zingage Départ</a>
              </li>
              <li>
                  <div class="small-rectangle yellow"></div>
                  <a href="/zingage/retour">Zingage Retour</a>
              </li>
              <li>
                  <div class="small-rectangle green"></div>
                <?php
                  //si une session existe, afficher ce bandeau
                  if (isset($_SESSION['identifiant']))
                    echo '<a href="/zingage/profil">Votre profil </a>';
                  else
                    echo '<a href="/zingage/connexion">Connexion</a>';
                ?>
              </li>
              <li>
                  <div class="small-rectangle rose"></div>
                  <a href="#">A venir</a>
              </li>
              <li>
                  <div class="small-rectangle purple"></div>
                  <a href="#">A venir</a>
              </li>
              <li>
                  <div class="small-rectangle idk"></div>
                  <a href="#">A venir</a>
              </li>
          </ul>
      </nav>

    <!-- Bandeau de retour, permet de renvoyer à une page spécifié dans l'index -->
      <?php 
      if ( isset($arrow_return) && isset($arrow_color) && isset($page_color) ) 
      {
      echo '<header>';
        echo '<a id="bandeau-retour" href="http://' . $_SERVER['SERVER_NAME'] . $arrow_return . '">';
        echo '<img class="img-responsive" src="/zingage/web/images/' . $arrow_color . '" alt="AEML">';
          echo '<div class="txt-container" style="background-color : ' . $page_color . ' ; ">';
            echo '<div class="txt">Retour</div>';
          echo '</div>';
        echo '</a>';
      echo '</header>';
      }
      ?>

      <!-- Affichage du 'bouton hamburger' -->
      <div id="page-content-wrapper">

          <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
              <span class="hamb-top"    style="background-color: <?= $page_color ?>;"></span>
              <span class="hamb-middle" style="background-color: <?= $page_color ?>;"></span>
              <span class="hamb-bottom" style="background-color: <?= $page_color ?>;"></span>
          </button>

        <body>
          <?php
            //Affichage de la situation de connexion 
            echo '<p class="connexion center">';
            //si une session existe, afficher ce bandeau
            if ( isset($_SESSION['identifiant']) ){
              echo '<a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/profil"> Profil (' . $_SESSION['identifiant'] . ') </a> | ' .
                   '<a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/deconnexion">déconnexion</a>' ;
            }
            //sinon le bandeau de connexion
            else
              if( !isset($hide_conect_btn) ){
                echo '<a href="http://' . $_SERVER['SERVER_NAME'] . '/zingage/connexion"><button class="btn-connexion btn btn-success">Connexion</button></a>' ;
                echo '</p>';     
              }

            //Affichage du logo, dépendant des paramètres dans index.php 
            echo '<h1 class="text-center">';
              echo '<a href="http://' . $_SERVER['SERVER_NAME'] . $logo_page . '">';
                echo '<img id="logo" class="img-responsive" src="' . "/zingage/web/images/" . $logo_img . '" alt="AEML">';
              echo '</a>';
            echo '</h1>';