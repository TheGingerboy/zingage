<?php

//permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  //récupération des valeurs passé
  $identifiant_user = $_SESSION['identifiant'];
  $id_list = json_decode($_POST['ref_article']);
  //Création de tableau de sauvegarde des données
  $list_data = array();//Contient le nombre de scan

/**************************     SQL       *****************************/

  /********** Permet de récupérer l'ID de l'utilisateur ***************/
  $get_id_user = $pdo->query("SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant_user'");
  while ($row = $get_id_user->fetch())
    { $id_user  = $row['id_user']; }

  /*************** Permet d'insérer la ref dans la BDD ****************/
  $insert_ref = $pdo->prepare(" 
    UPDATE scan 
    SET 
      date_scan_retour = now(),
      id_user_retour = ? 
    WHERE id_article = ?
    AND id_user_retour IS NULL
    LIMIT 1");

  echo "<h2>Récapitualtif du scan</h2>";

  //Permet de compter le nombre d'occurence d'une variable
  foreach($id_list as $id)
    { $insert_ref->execute([$id_user, $id]); }
?>
<script type="text/javascript">
  (function() {
  localStorage.todolist = "";
  })();
</script>
<?php
//Si utilisateur non connecté
} else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
