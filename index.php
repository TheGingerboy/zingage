<?php
require_once __DIR__.'/vendor/autoload.php';

global $obj;

$app = new Silex\Application();
$app['debug']=true;

/****************************** INFO *********************************************/
/*
    Ce site utilise Silex php framework (dérivé de symfony)
    Pour une liste de toutes les dépendances, merci de consulter le fichier composer.json

    $logo_page = lien vers lequel le logo redirigera l'utilisateur lors d'un click
    $logo_image = nom du fichier image qui sera appeler pour l'affichage du logo
    $page_color = défini la couleur de la page (présent dans la page en question) // necessaire affichage bandeau retour
    $arrow_return = spécifie le chemin vers lequel le bandeau de retour renvoie // necessaire affichage bandeau retour
    $arrow_color = nom du fichier image qui sera appeler pour faire la fleche du bandeau retour // necessaire affichage bandeau retour
    $stop enter = permet d'empecher la touche 'enter' de valider un formulaire (via javascript), elle agira comme un touche 'tab'

    -- C'est quoi la valeur $content ?
    La valeur content billy, elle contient ce qui sera affiché. En conséquence elle est formé de require de page web
    Elle est ensuite retourné pour s'afficher

    -- Pourquoi le $content subit la fonction substr ?
    La valeur $content renvoie un '1' pour chaque require_once effectué, il s'agit d'une solution temporaire lié à un bug non compris

    -- Pourquoi c'est moche ?
    Hé oh, hein !
*/

$app->register(new Silex\Provider\SessionServiceProvider());

/****************************** Accueil ******************************************/

$app->get('/', function (){
    $hide_logo_page =  true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/****************************** Depart *******************************************/

$app->get('/depart', function (){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap', function(){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart/departRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap/impression', function(){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/departScanImpression.php'), 0, -1);
    // $content .= substr((require_once '/web/view/depart/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/****************************** Retour *******************************************/

$app->get('/retour', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = true;
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/retour/recap', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = true;
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour/retourRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/retour/recap/insert', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = true;
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/retourInsert.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/****************************** Article *******************************************/

$app->get('/article', function(){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/article/ajout', function(){
    $hide_logo_page =  true;
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $stop_enter = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleAjout.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/*
    info lié à la structure de l'ajout article
    Permet de traiter l'ajout d'article
    Décomposition effectué de la sorte de façon à éviter un bug du PDA/Douchette 
    Le bug fait cliquer sur des éléments interactif du site et valide ou renvoie sur une page lors d'un changement de focus
    En conséquence, tout élément interactif à été supprimer ET une décomposition du formulaire à été effectué
*/

$app->get('/article/ajout/ref', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutRef.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/nom', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutNom.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/nbr', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutNbr.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/dim', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutDim.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/bac', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutBac.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/poid', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutPoid.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/of', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = true;
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/articleAjout/articleAjoutOf.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});


$app->post('/article/ajout/traitement', function(){
    $hide_logo_page =  true;
    $hide_conect_btn = true;
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleAjoutTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/*
    Edition de l'article une fois créé
*/

$app->get('/article/edition/{id_article}', function($id_article) use($app){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow-blue.png";
    $stop_enter = true;
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/edition/traitement/{id_article}', function($id_article) use($app){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow-blue.png";
    $stop_enter = true;
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleEditionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/suppression', function(){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/************************* Scan de l'article ************************************/

$app->get('/scan', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan/details', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScanDetail.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/scan/article', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScanDetail.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan/details/{annee}/{mois}', function($annee, $mois) use($app){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScanMoisAnnee.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/scan/suppression', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-blue.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/scanSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/*********************************** Profil ************************************/

$app->get('/inscription', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-green.png";
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/inscription.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/inscription/traitement', function(){
    //Arguments de la page non présent car spécifiés lors de l'acceptation / refus de la page qui redirige en fonction de la reussite
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/inscriptionTraitement.php'), 0, -1);
    return $content;
});

$app->get('/connexion', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-green.png";
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/connexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/connexion/traitement', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-green.png";
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/profil', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = 'true';
    $arrow_color = "arrow-green.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/profil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/profil/traitement', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/profilTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/deconnexion', function(){
    $logo_page =  "/zingage";
    $hide_logo_page =  true;
    $page_color = '#009fe3';
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/model/deconnexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/************************* Administration ************************************/

$app->get('/administration', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-dark-green.png";
    $page_color = '#1fb316';
    $arrow_color = "arrow-dark-green.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/accueilAdmin.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/*********** Utilisateurs ***************/

$app->get('/administration/utilisateurs', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateur.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/administration/utilisateurs/ajout/identifiant', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurAjout/utilisateurAjoutIdentifiant.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/ajout/nom', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    // Utilisation de la BDD pour verifier que l'utilisateur n'existe déja pas
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurAjout/utilisateurAjoutNom.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/ajout/prenom', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurAjout/utilisateurAjoutPrenom.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/ajout/mdp1', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurAjout/utilisateurAjoutMdp1.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/ajout/mdp2', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurAjout/utilisateurAjoutMdp2.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/ajout/traitement', function(){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration";
    $logo_img = "logo-purple.png";
    $page_color = '#9f038f';
    $arrow_color = "arrow-purple.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/inscriptionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/administration/utilisateurs/edition/{id_user}', function($id_user) use($app){
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/utilisateurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $app->escape($id_user);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/edition/traitement/{id_user}', function($id_user) use($app){
    $arrow_return = true;
    $stop_enter = true;
    $logo_page =  "/zingage/administration/utilisateurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $app->escape($id_user);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/utilisateurEditionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateurEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/utilisateurs/suppression', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/utilisateurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/utilisateurSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/utilisateur.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});


/************** Zingeurs ***************/
$app->get('/administration/zingeurs', function(){
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/zingeur.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/administration/zingeurs/ajout/nom', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutNom.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/num', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutNumero.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/adresse', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutAdresse.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/complement', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutComplement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/ville', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutVille.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/cp', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutCP.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/pays', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content =  substr((require_once '/web/view/administration/zingeurAjout/zingeurAjoutPays.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/ajout/traitement', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingeurAjoutTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/zingeur.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/administration/zingeurs/edition/{id_zingeur}', function($id_zingeur) use($app){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $app->escape($id_zingeur);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/zingeurEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/edition/traitement/{id_article}', function($id_article) use($app){
    $arrow_return = true;
    $stop_enter = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingeurEditionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingeurEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/administration/zingeurs/suppression', function(){
    $hide_logo_page  = true;
    $hide_conect_btn = true;
    $arrow_return    = true;
    $logo_page =  "/zingage/administration/zingeurs";
    $logo_img = "logo-cyan.png";
    $page_color = '#008290';
    $arrow_color = "arrow-cyan.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingeurSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/administration/zingeur.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

/******************** Todo or not todo ***************************/

/* $app->get('/scan/edition/{id_scan}', function($id_scan) use($app){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/scan';
    $arrow_color = "arrow-blue.png";
    $stop_enter = true;
    $app->escape($id_scan);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
}); */

// Permet d'éditer les scans, projet à l'étude : est-il normal de pouvoir editer librement des dates sur un suivi ?

/* $app->get('/scan/edition/traitement/{id_scan}', function($id_scan) use($app){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/scan';
    $arrow_color = "arrow-blue.png";
    $stop_enter = true;
    $app->escape($id_scan);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
}); */

/*************************** This the end ****************************/
/********************** My only friend, the end **********************/
/* Lance le content obtenu préalablement par la détéction du routage */

$app->run();