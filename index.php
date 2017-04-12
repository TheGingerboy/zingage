<?php
require_once __DIR__.'/vendor/autoload.php';
require_once '/web/module.config.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

global $obj;

$app = new Silex\Application();
$app['debug']=true;

$app->register(new Silex\Provider\SessionServiceProvider());

$app->get('/', function (){
    $content = require_once '/web/accueil.php';
    return $content;
});

$app->get('/produits', function(){
    $content = require_once '/web/produits.php';
	return $content;
});

$app->get('/philosophie', function(){
    $content = require_once '/web/philosophie.php';
	return $content;
});

$app->get('/contact', function(){
    $content = require_once '/web/contact.php';
	return $content;
});

$app->get('/connexion', function(){
    $content = require_once '/web/connexion.php';
	return $content;
});

$app->post('/connexionTraitement', function(){
    $content = require_once '/web/connexionTraitement.php';
    return $content;
});

$app->get('/deconnexion', function(){
    $content = require_once '/web/deconnexion.php';
    return $content;
});

$app->get('/inscription', function(){
    $content = require_once '/web/inscription.php';
	return $content;
});

$app->post('/inscriptionTraitement', function(){
    $content = require_once '/web/inscriptionTraitement.php';
    return $content;
});

$app->get('/panier', function(){
    $content = require_once '/web/panier.php';
	return $content;
});

$app->post('/panierSupprimer', function(){
    $content = require_once '/web/panierSupprimer.php';
	return $content;
});

$app->get('/profil', function(){
    $content = require_once '/web/profil.php';
    return $content;
});

$app->post('/profilTraitement', function(){
    $content = require_once '/web/profilTraitement.php';
    return $content;
});

$app->get('/mentionsLegales', function(){
    $content = require_once '/web/mentionsLegales.php';
	return $content;
});

$app->get('/entretien', function(){
    $content = require_once '/web/entretien.php';
	return $content;
});

$app->get('/detente', function(){
    $content = require_once '/web/detente.php';
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
    return $content;
});

$app->get('/ficheProduit/panierAjout', function(){
  //TODO
    $content = require_once '/web/ficheProduit/panierAjout.php';
    return $content;
});

$app->get('/adm/admin', function(){
    $content = require_once '/web/admin.php';
	return $content;
});

$app->get('/adm/suppadminProduit/id={id}', function($id) use ($app){
    $user = get_article_by_id($id);
    if (!$user)
    	$app->abort(404, "Utilisateur inexistant");
    else {
        delete_article_by_id($id);
        header('Location: /GreenTeuf/adm/admin');
    	return require '/web/admin.php';
    }
});

$app->post('/adm/admin/modifierArticle/id={id}', function($id,Request $request) use ($app){
    $data = $request->request->all();
    modif_article($id, $data);
    header('Location: /GreenTeuf/adm/admin');
    return require '/web/admin.php';
});

$app->post('/adm/addProduit', function(Request $request) use ($app){
    $data = $request->request->all();
    add_article($data);
    header('Location: /GreenTeuf/adm/admin');
    return require '/web/admin.php';
});

$app->post('/addcom/{id}', function($id, Request $request) use ($app){
    $data = $request->request->all();
    add_commentaire($id, $data);
    header('Location: /GreenTeuf/ficheProduit/'.$id);
    return require '/web/ficheProduit.php';
});

$app->get('/adm/adminUsr', function(){
    $content = require_once '/web/adminUsers.php';
	  return $content;
});

$app->post('/GreenTeuf/adm/addUsr', function(Request $request) use ($app){
    $data = $request->request->all();
    add_user($data);
    header('Location: /GreenTeuf/adm/adminUsr');
    return require '/web/adminUsers.php';
});

$app->get('/adm/suppadminUsr/id={id}', function($id) use ($app){
    $user = get_user_by_id($id);
    if (!$user)
    	$app->abort(404, "Utilisateur inexistant");
    else {
        delete_user_by_id($id);
        header('Location: /GreenTeuf/adm/adminUsr');
    	return require '/web/adminUsers.php';
    }
});

$app->get('/adm/adminCustom', function(){
    $content = require_once '/web/adminCustom.php';
	return $content;
});

$app->post('/adm/traitementCustom', function(Request $request) use ($app){
    $data = $request->request->all();
    modif_gt($data);
    header('Location: /GreenTeuf/adm/admin');
    return require '/web/admin.php';
    
});

$app->get('/adm/adminCommande', function(){
    $content = require_once '/web/adminCommande.php';
	return $content;
});


$app->run();
?>
