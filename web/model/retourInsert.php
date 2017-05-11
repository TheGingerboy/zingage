<?php

//permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  //récupération des valeurs passé
  $identifiant_user = $_SESSION['identifiant'];
  $id_list = json_decode($_POST['ref_article']);
  //Création de tableau de sauvegarde des données
  $list_data = array();//Contient le nombre de scan
  $id_ref = array();//Contient le nombre de champs vide qui peuvent être rempli potentiellement

/**************************     SQL       *****************************/

  /********** Permet de récupérer l'ID de l'utilisateur ***************/
  $get_id_user = $pdo->query("SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant_user'");
  while ($row = $get_id_user->fetch())
    { $id_user  = $row['id_user']; }

  /** Permet de s'assurer de la présence d'une ref et d'avoir son id **/
  $verif_id = $pdo->prepare("SELECT id_article FROM article WHERE id_article = ?");


  /*************** Permet d'insérer la ref dans la BDD ****************/
  $insert_ref = $pdo->prepare(" 
    UPDATE scan 
    SET 
      date_scan_retour = now(),
      id_user_retour = ? 
    WHERE id_article = ?
    AND id_user_retour IS NULL
    LIMIT ?");

  echo "<h2>Récapitualtif du scan</h2>";

  //Permet de compter le nombre d'occurence d'une variable
  foreach($id_list as $id){
    if (isset($list_data[$id])) { $list_data[$id]++ ; }
    else{ $list_data[$id] = 1 ; }
  }

  /************ Permet de s'assurer de la présence d'une ref ************/
  //Si la ref n'est pas présente, la valeur d'occurence dans le tableau est mise à 0
  foreach($list_data as $key)
  {
    $verif_id->execute([$key]);
    if(!($verif_id->rowCount()))
    { 
      $list_data[$key] = 0; 
      echo '<h3>La référence <span style="font-weight:bold">' .$key. "</span> n'a pas été trouvé dans la base de données</h3>";
    }
  }

  /************ Permet de s'assurer du bon nombre de ref dispo dans la BDD ************/
  var_dump($id_list);
  foreach($id_list as $id)
  {
    if ( ($id != 0 ) )
    { $insert_ref->execute([$id_user, $id, $list_data[$id]]); }
  }
?>
<script type="text/javascript">
  (function() {
  localStorage.todolist = "";
  })();
</script>
<?php
//Si utilisateur non connecté
} else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
