<?php 
if(!isset($_SESSION))
  session_start();

$serverName = $_SERVER['SERVER_NAME'];

?> 


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Zingage | AEML</title>
  <!-- Font awesome and minified CSS -->
  <link rel="stylesheet" href="<?= "http://" . $serverName . "/zingage/" ?>vendor/components/font-awesome/css/font-awesome.min.css"/>
  <!-- Bootstrap latest compiled and minified CSS -->
  <link rel="stylesheet" href="<?= "http://" . $serverName . "/zingage/" ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
  <!-- Fancy Sidebar -->
  <link rel="stylesheet" href="<?= "http://" . $serverName . "/zingage/" ?>web/css/fancy-sidebar.css"/>
  <!-- DataTables -->
  <link rel="stylesheet"  type="text/css" href="<?= "http://" . $serverName . "/zingage/" ?>web/css/datatables.css"/>
  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="<?= "http://" . $serverName . "/zingage/" ?>vendor/bootstrap-select/bootstrap-select/dist/css/bootstrap-select.min.css"/>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= "http://" . $serverName . "/zingage/" ?>web/css/style.css"/>
  <!-- jQuery - Why on head ? Because it's a mess otherwise -->
  <script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/components/jquery/jquery.min.js"></script>


</head>
<!-- body fermé dans le footer -->
<div id="wrapper">
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <a href="<?= 'http://' . $serverName . '/zingage/' ?>">
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
        <div class="small-rectangle red"></div>
        <a href="/zingage/article">Article</a>
      </li>
      <li>
        <div class="small-rectangle orange"></div>
        <a href="/zingage/historique">Historique</a>
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

        <?php

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1 ){
          echo '<div class="small-rectangle darkgreen"></div>';
          echo '<a href="/zingage/administration">Administration</a>';
        }

          ?>

      </li>
      <div class="center">
        <button id="sidebar-close" class="button" type="button" data-toggle="offcanvas">
          <img class="img-responsive center" src="/zingage/web/images/close-sidebar.png"  alt="AEML"/>
        </button>
      </div>

    </ul>
  </nav>

  <!-- Bandeau de retour, permet de renvoyer à une page spécifié dans l'index -->
  <?php 
  if ( isset($arrow_return) && isset($arrow_color) && isset($page_color) ) 
  {
    echo '<header>';
    echo '<div class="padding-bottom-bigger"></div>';
    echo '<button id="bandeau-retour" onclick="goBack()">';
    echo '<img class="img-responsive" src="/zingage/web/images/' . $arrow_color . '" alt="AEML">';
    echo '<div class="txt-container" style="background-color : ' . $page_color . ' ; ">';
    echo '<div class="txt" style="background-color : ' . $page_color . ' ;" > Retour </div>';
    echo '</div>';
    echo '</button>';
    echo '</header>';
  }
  ?>

  <!-- Affichage du 'bouton hamburger' -->
  <div id="page-content-wrapper">

    <button type="button" id="hamburger" class="hamburger is-closed" data-toggle="offcanvas">
      <span class="hamb-top"    style="background-color: <?= $page_color ?>;"></span>
      <span class="hamb-middle" style="background-color: <?= $page_color ?>;"></span>
      <span class="hamb-bottom" style="background-color: <?= $page_color ?>;"></span>
    </button>

    <body>
      <?php
            //Affichage de la situation de connexion 
      if( !isset($hide_conect_btn) ){
              //si une session existe, afficher ce bandeau
        if ( isset($_SESSION['identifiant']) ){
          echo '<p class="connexion center">';
          echo '<a href="http://' . $serverName . '/zingage/profil"> Profil (' . $_SESSION['identifiant'] . ')'.
          ' </a> | ' . '<a href="http://' . $serverName . '/zingage/deconnexion">déconnexion</a>' ;
        }
              //sinon le bandeau de connexion
        else {
          echo '<p class="connexion center">';
          echo '<a href="http://' . $serverName . '/zingage/connexion"><button class="connexion btn-connexion btn btn-success">Connexion</button></a>' ;
        }
        echo '</p>';  
      }
      if ( !isset($hide_logo_page) ) 
      {
        //Affichage du logo, dépendant des paramètres dans index.php 
        echo '<h1 class="text-center">';
        echo '<a href="http://' . $serverName . $logo_page . '">';
        echo '<img id="logo" class="img-responsive" src="' . "/zingage/web/images/" . $logo_img . '" alt="AEML">';
        echo '</a>';
        echo '</h1>';
      }

