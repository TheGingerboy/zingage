<?php
require_once __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

global $obj;

$app = new Silex\Application();
$app['debug']=true;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function () use($app){
    $content = require_once '/web/accueil.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/produits', function(){
    $content = require_once '/web/produits.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/philosophie', function(){
    $content = require_once '/web/philosophie.php';
    $content = substr($content, 0, -1);
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/contact', function(){
    $content = require_once '/web/contact.php';
    $content = substr($content, 0, -1);
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/connexion', function(){
    $content = require_once '/web/connexion.php';
    $content = substr($content, 0, -1);
	$content = substr($content, 0, -1); 
    return $content;
});

$app->post('/connexionTraitement', function(){
    $content = require_once '/web/connexionTraitement.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/deconnexion', function(){
    $content = require_once '/web/deconnexion.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/inscription', function(){
    $content = require_once '/web/inscription.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->post('/inscriptionTraitement', function(){
    $content = require_once '/web/inscriptionTraitement.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/panier', function(){
    $content = require_once '/web/panier.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->post('/panierSupprimer', function(){
    $content = require_once '/web/panierSupprimer.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/profil', function(){
    $content = require_once '/web/profil.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->post('/profilTraitement', function(){
    $content = require_once '/web/profilTraitement.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/mentionsLegales', function(){
    $content = require_once '/web/mentionsLegales.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/entretien', function(){
    $content = require_once '/web/entretien.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/detente', function(){
    $content = require_once '/web/detente.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->get('/ficheProduit/{id}', function($id) use ($app){
    $produit = get_article_by_id($id);
    if (!$produit) $app->abort(404, "Produit inexistant");
    else{
        $content = require_once '/web/ficheProduit.php';
        return json_encode($content);
    }
});

$app->post('/ficheProduit/panierAjout', function($id) use ($app){
    $content = require_once '/web/panierAjout.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/ficheProduit/panierAjout', function(){
  //TODO
    $content = require_once '/web/ficheProduit/panierAjout.php';
    $content = substr($content, 0, -1); 
    return $content;
});

$app->get('/adm/admin', function(){
    $content = require_once '/web/admin.php';
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
    	return require '/web/admin.php';
    }
});

$app->post('/adm/admin/modifierArticle/id={id}', function($id,Request $request) use ($app){
    $data = $request->request->all();
    modif_article($id, $data);
    header('Location: /zingage/adm/admin');
    return require '/web/admin.php';
});

$app->post('/adm/addProduit', function(Request $request) use ($app){
    $data = $request->request->all();
    add_article($data);
    header('Location: /zingage/adm/admin');
    return require '/web/admin.php';
});

$app->post('/addcom/{id}', function($id, Request $request) use ($app){
    $data = $request->request->all();
    add_commentaire($id, $data);
    header('Location: /zingage/ficheProduit/'.$id);
    return require '/web/ficheProduit.php';
});

$app->get('/adm/adminUsr', function(){
    $content = require_once '/web/adminUsers.php';
	$content = substr($content, 0, -1); 
    return $content;
});

$app->post('/zingage/adm/addUsr', function(Request $request) use ($app){
    $data = $request->request->all();
    add_user($data);
    header('Location: /zingage/adm/adminUsr');
    return require '/web/adminUsers.php';
});

$app->get('/adm/suppadminUsr/id={id}', function($id) use ($app){
    $user = get_user_by_id($id);
    if (!$user)
    	$app->abort(404, "Utilisateur inexistant");
    else {
        delete_user_by_id($id);
        header('Location: /zingage/adm/adminUsr');
    	return require '/web/adminUsers.php';
    }
});

$app->get('/adm/adminCustom', function(){
    $content = require_once '/web/adminCustom.php';
	$content = substr($content, 0, -1); return $content;
});

$app->post('/adm/traitementCustom', function(Request $request) use ($app){
    $data = $request->request->all();
    modif_gt($data);
    header('Location: /zingage/adm/admin');
    return require '/web/admin.php';
    
});

$app->get('/adm/adminCommande', function(){
    $content = require_once '/web/adminCommande.php';
	$content = substr($content, 0, -1); 
    return $content;
});


$app->run();
?>
