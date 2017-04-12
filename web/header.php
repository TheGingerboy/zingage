<?php 
    session_start();
    require('configSite.php');
?> 

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AEML</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>web/css/style.css"/>
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>web/css/calendrier.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="row">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
              </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse col-sm-6 col-md-6">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">Accueil</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

    <p  class=" text-right col-xs-6 col-sm-3 col-md-3">
    <?php
    //si une session existe, afficher ce bandeau
    if ($_SESSION['identifiant']) {?> <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>profil">Profil (<?php echo $_SESSION['identifiant']; ?>)</a> | <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>deconnexion">déconnexion</a>
          <?php
          //si une session existe, afficher ce bandeau
          if ($_SESSION['identifiant'] == "Admin") {?> 
            | <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>inscription">Inscription</a>
          <?php ;} ?>
    <?php ;}

    //sinon le bandeau de connexion
    else {?> <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>connexion">Connexion</a> <?php ;}
    ?>  
    </p>

      <div class="row">
        <div class="col-xs-1"></div>
        <h1 class="col-xs-11">AEML</h1>
      </div>
    </header>
