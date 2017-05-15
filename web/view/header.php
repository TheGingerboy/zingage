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
            <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . $logo_page ?>">
                <img class="img-responsive" src="<?= "/zingage/web/images/" . $logo_img ?>" alt="AEML"/>
            </a>
            <li>
                <a href="/zingage/depart">Zingage Départ</a>
            </li>
            <li>
                <a href="/zingage/retour">Zingage Retour</a>
            </li>
            <li>
              <?php
                //si une session existe, afficher ce bandeau
                if (isset($_SESSION['identifiant']))
                  echo '<a href="/zingage/profil">Profil (' . $_SESSION['identifiant'] . ')</a>';
                else
                  echo '<a href="/zingage/connexion">Connexion</a>';
              ?>
            </li>
            <li>
                <a href="/zingage/inscription">A venir</a>
            </li>
            <li>
                <a href="/zingage/inscription">A venir</a>
            </li>
            <li>
                <a href="/zingage/inscription">A venir</a>
            </li>
        </ul>
    </nav>

    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>

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

          <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . $logo_page ?>">
            <img id="logo" class="img-responsive" src="<?= "/zingage/web/images/" . $logo_img ?>" alt="AEML"/>
          </a>

        </h1>

        <?php if ( ($_SERVER['REQUEST_URI']!="/zingage/") && ($_SERVER['REQUEST_URI']!="/zingage") ) { ?>
          <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . $page_return ?>">
            <div id="bandeau-retour" style="background-color: <?= $page_color ?>;">
              <img class="img-responsive" src="<?= "/zingage/web/images/arrow.png" ?>" alt="AEML"/>
              <div class="txt">Retour</div>
            </div>
          </a>
        <?php } ?>

        </header>