<?php
require_once __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

global $obj;

$app = new Silex\Application();
$app['debug']=true;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function (){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/view/zingage.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageRecap', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageRecap.php'), 0, -1);
    $content .= substr((require_once '/web/view/footer.php'), 0, -1);
    return $content;
});

$app->post('/zingageImpression', function(){
    $content =  substr((require_once '/web/view/header.php'), 0, -1);
    $content .= substr((require_once '/web/model/connexionBD.php'), 0, -1);
    $content .= substr((require_once '/web/model/zingageImpression.php'), 0, -1);
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
    // Traitement
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

$app->get('/ficheProduit/{id}', function($id) use ($app){
    $produit = get_article_by_id($id);
    if (!$produit) $app->abort(404, "Produit inexistant");
    else{
        $content = require_once '/web/view/ficheProduit.php';
        return json_encode($content);
    }
});

$app->get('/adm/admin', function(){
    $content = require_once '/web/view/admin.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/adm/suppadminProduit/id={id}', function($id) use ($app){
    $user = get_article_by_id($id);
    if (!$user)
    	$app->abort(404, "Utilisateur inexistant");
    else {
        delete_article_by_id($id);
        header('Location: /zingage/adm/admin');
    	return require '/web/view/admin.php';
    }
});

$app->post('/adm/admin/modifierArticle/id={id}', function($id,Request $request) use ($app){
    $data = $request->request->all();
    modif_article($id, $data);
    header('Location: /zingage/adm/admin');
    return require '/web/view/admin.php';
});

$app->post('/adm/addProduit', function(Request $request) use ($app){
    $data = $request->request->all();
    add_article($data);
    header('Location: /zingage/adm/admin');
    return require '/web/view/admin.php';
});

$app->post('/addcom/{id}', function($id, Request $request) use ($app){
    $data = $request->request->all();
    add_commentaire($id, $data);
    header('Location: /zingage/ficheProduit/'.$id);
    return require '/web/view/ficheProduit.php';
});

$app->get('/adm/adminUsr', function(){
    $content = require_once '/web/view/adminUsers.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->run();
?>
