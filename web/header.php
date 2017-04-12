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
    <title>GreenTeuf</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/GreenTeuf/web/css/style.css"/>
	<link rel="stylesheet" href="/GreenTeuf/web/css/calendrier.css" />
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
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/GreenTeuf/"><img src="/GreenTeuf/web/images/<?php echo $logoSite ?>" alt="logo GreenTeuf" width="125px"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse col-sm-6 col-md-6">
              <ul class="nav navbar-nav">
                <li><a href="/GreenTeuf/">Accueil</a></li>
                <li><a href="/GreenTeuf/produits">Nos produits</a></li>
                <li><a href="/GreenTeuf/philosophie">Notre Philosophie</a></li>
                <li><a href="/GreenTeuf/contact">Contact</a></li>
                <!-- Affichage dans le menu du lien "Administration" si admin est connecté => Back-Office -->
                <?php if($_SESSION['admin'] == 1){  ?>
                  <li><a href="/GreenTeuf/adm/admin">Administration</a></li>
                <?php } ?>  
              </ul>
            </div>
              <!-- !!!!!!!! Profil déconnexion !!!!!!!! -->
            <p id="connect" class="pull-right text-right col-xs-6 col-sm-3 col-md-3">
              <?php
                //si une session existe, afficher ce bandeau
                if ($_SESSION['identifiant']) {?> <a href="/GreenTeuf/profil">Profil (<?php echo $_SESSION['identifiant']; ?>)</a> | <a href="/GreenTeuf/deconnexion">déconnexion</a><?php ;}

                //sinon le bandeau de connexion
                else {?> <a href="/GreenTeuf/connexion">Connexion</a> | <a href="/GreenTeuf/inscription">Inscription</a><?php ;}
               ?>  
             </p>
            <p id="pannier" class="pull-right text-right col-xs-6 col-sm-3 col-md-3">
              <a href="/GreenTeuf/panier"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Panier</a>
            </p>
          </div>
        </div>
      </nav>
      <div class="row">
        <div class="col-xs-1"></div>
        <h1 class="col-xs-11">GreenTeuf, la nature fait la fête !</h1>
      </div>
    </header>
