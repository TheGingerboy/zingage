<?php
require_once __DIR__.'/vendor/autoload.php';

global $obj;

$app = new Silex\Application();
$app['debug']=true;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/depart', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/departRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/depart/recap/impression', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/departScanImpression.php'), 0, -1);
    $content .= substr((require_once '/web/view/depart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/retour', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/retour/recap', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/retourRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

    $app->post('/retour/recap/insert', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/retourInsert.php'), 0, -1);
    $content .= substr((require_once '/web/view/retour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});


$app->get('/article/ajout', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleAjout.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/ajout/traitement', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleAjoutTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/article', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/article/edition/{id_article}', function($id_article) use($app){
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/edition/traitement/{id_article}', function($id_article) use($app){
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleEditionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/articleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/article/suppression', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/articleSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan/edition/{id_scan}', function($id_scan) use($app){
    $app->escape($id_scan);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/scan/edition/traitement/{id_scan}', function($id_scan) use($app){
    $app->escape($id_scan);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/scan/suppression', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/scanSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScan.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/connexion', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/connexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/connexion/traitement', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/deconnexion', function(){
    $content =  substr((require_once '/web/model/deconnexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/accueil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/inscription', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/inscription.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/inscription/traitement', function(){
    $content =  substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/inscriptionTraitement.php'), 0, -1);
    return $content;
});


$app->get('/profil', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/profil.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/profilTraitement', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/profilTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->run();
?>
