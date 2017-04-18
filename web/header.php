<?php 
    require('configSite.php');
?> 

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zingage | Scan</title>

    <!-- Bootstrap latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/css/style.css"/>

  </head>
  <body>

    <header>

    <p class="connexion">
    <?php
    //si une session existe, afficher ce bandeau
    if ($_SESSION['identifiant']) {?> <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>profil">Profil (<?php echo $_SESSION['identifiant']; ?>)</a> | <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>deconnexion">déconnexion</a>
          <?php
          //si une session existe, afficher ce bandeau
          if ($_SESSION['identifiant'] == "Admin") {?> 
            | <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>inscription">Inscription</a>
          <?php ;} ?>
    <?php ;}

    //sinon le bandeau de connexion
    else {?> <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>connexion"><button class="btn-connexion btn btn-success">Connexion</button></a> <?php ;}
    ?>  
    </p>

    <h1 class="text-center">
      <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>"><img id="logo" class="img-responsive" src="/zingage/web/images/logo.png" alt="AEML"/></a>
      
    </h1>

    </header>
