<?php
require_once __DIR__.'/vendor/autoload.php';

global $obj;

$app = new Silex\Application();
$app['debug']=true;

/****************************** INFO *********************************************/
//
// Ce site utilise Silex php framework (dérivé de symfony)
// Pour une liste de toutes les dépendances, merci de consulter le fichier composer.json
//
// $logo_page = lien vers lequel le logo redirigera l'utilisateur lors d'un click
// $logo_image = nom du fichier image qui sera appeler pour l'affichage du logo
// $page_color = défini la couleur de la page (présent dans la page en question) // necessaire affichage bandeau retour
// $arrow_return = spécifie le chemin vers lequel le bandeau de retour renvoie // necessaire affichage bandeau retour
// $arrow_color = nom du fichier image qui sera appeler pour faire la fleche du bandeau retour // necessaire affichage bandeau retour
// $stop enter = permet d'empecher la touche 'enter' de valider un formulaire (via javascript), elle agira comme un touche 'tab'

// -- C'est quoi la valeur $content ?
// La valeur content billy, elle contient ce qui sera affiché. En conséquence elle est formé de require de page web
// Elle est ensuite retourné pour s'afficher

// -- Pourquoi le $content subit la fonction substr ?
// La valeur $content renvoie un '1' pour chaque require_once effectué, il s'agit d'une solution temporaire lié à un bug non compris

// -- Pourquoi c'est moche ?
// Hé oh, hein !



$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function (){
    $logo_page =  "/zingage";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/depart', function (){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap', function(){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/depart';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/departRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap/impression', function(){
    $logo_page =  "/zingage/depart";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/departScanImpression.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/retour', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/retour/recap', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = '/zingage/retour';
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/retourRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

    $app->post('/retour/recap/insert', function (){
    $logo_page =  "/zingage/retour";
    $logo_img = "logo-gold.png";
    $page_color = '#fdd22a';
    $arrow_return = '/zingage';
    $arrow_color = "arrow-gold.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/retourInsert.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/article', function(){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/article/ajout', function(){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow.png";
    $stop_enter = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleAjout.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/traitement', function(){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow.png";
    $stop_enter = true;
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleAjoutTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});


$app->get('/article/edition/{id_article}', function($id_article) use($app){
    $logo_page =  "/zingage/article";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/article';
    $arrow_color = "arrow.png";
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
    $arrow_color = "arrow.png";
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
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan/edition/{id_scan}', function($id_scan) use($app){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage/scan';
    $arrow_color = "arrow.png";
    $stop_enter = true;
    $app->escape($id_scan);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

// Permet d'éditer les scans, projet à l'étude : est-il normal de pouvoir editer librement des dates sur un suivi ?

// $app->get('/scan/edition/traitement/{id_scan}', function($id_scan) use($app){
//     $logo_page =  "/zingage/scan";
//     $logo_img = "logo.png";
//     $page_color = '#009fe3';
//     $arrow_return = '/zingage/scan';
//     $arrow_color = "arrow.png";
//     $stop_enter = true;
//     $app->escape($id_scan);
//     $content =  substr((require_once '/web/view/header.php'), 0, -1);
//     $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
//     $content .= substr((require_once '/web/view/footer.php'), 0, -1);
//     return $content;
// });

$app->post('/scan/suppression', function(){
    $logo_page =  "/zingage/scan";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $arrow_return = '/zingage';
    $arrow_color = "arrow.png";
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/scanSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
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

$app->get('/deconnexion', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo.png";
    $page_color = '#009fe3';
    $hide_conect_btn = true;
    $content =  substr((require_once '/web/model/deconnexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

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


$app->get('/profil', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
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

$app->get('/test', function(){
    $logo_page =  "/zingage";
    $logo_img = "logo-green.png";
    $page_color = '#96c11f';
    $arrow_return = '/zingage';
    $content =  substr((require_once '/web/view/fancy-sidebar.php'), 0, -1);
    return $content;
});

$app->run();
?>
