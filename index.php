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
    $content .= substr((require_once '/web/view/zingageDepart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageRecap', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageImpression', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageImpression.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageDepart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/retour', function (){
    $content =  substr((require_once '/web/view/headerRetour.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageRetour.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/retourRecap', function (){
    $content =  substr((require_once '/web/view/headerRetour.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageRetourRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});


$app->get('/zingageAjout', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageAjout.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageAjoutTraitement', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageAjoutTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/zingageArticle', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/zingageArticleEdition/{id_article}', function($id_article) use($app){
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageArticleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageArticleEditionTraitement/{id_article}', function($id_article) use($app){
    $app->escape($id_article);
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageArticleEditionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageArticleEdition.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageArticleSuppression/', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageArticleSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingageArticle.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/listScanDepart/', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScanDepart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageScanSuppression/', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageScanSuppression.php'), 0, -1);
    $content .= substr((require_once '/web/view/listScanDepart.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

// $app->get('/listScanRetour/', function(){
//     $content =  substr((require_once '/web/view/header.php'), 0, -1);
//     $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
//     $content .= substr((require_once '/web/view/listScanRetour.php'), 0, -1);
//     $content .= substr((require_once '/web/view/footer.php'), 0, -1);
//     return $content;
// });


$app->get('/connexion', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/connexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/connexionTraitement', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionTraitement.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/deconnexion', function(){
    $content =  substr((require_once '/web/model/deconnexion.php'), 0, -1);
    $content .= substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingage.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->get('/inscription', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/inscription.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/inscriptionTraitement', function(){
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
