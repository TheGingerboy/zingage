<?php

//permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  $identifiant_user = $_SESSION['identifiant'];

/**************************     SQL       *****************************/

  /********** Permet de récupérer l'ID de l'utilisateur ***************/
  $get_id_user = $pdo->query("SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant_user'");
  while ($row = $get_id_user->fetch())
    { $id_user  = $row['id_user']; }

  /** Permet de s'assurer de la présence d'une ref et d'avoir son id **/
  $verif_ref = $pdo->prepare("SELECT id_article FROM article WHERE ref_article = ?");

  /***** Permet de s'assurer du bon nombre de ref dispo dans la BDD ***/
  $dispo_ref = $pdo->prepare("
    SELECT
      id_scan,
      ref_article,
      nom_article
    FROM scan
    JOIN article ON article.id_article = scan.id_article
    WHERE scan.id_user_retour IS NULL
    AND ref_article = ?
    GROUP BY id_scan
    ");

  /*************** Permet d'insérer la ref dans la BDD ****************/
  $insert_ref = $pdo->prepare(" 
    UPDATE scan 
    SET 
      date_scan_retour = now(),
      id_user_retour = ? 
    WHERE id_article = ?
    AND id_user_retour IS NULL
    LIMIT ?");
  
  //récupération des valeurs passé
  $data = $_POST['data'];
  //Création d'un tableau de sauvegarde des données
  $list_data = array();//Contient le nombre de scan
  $id_ref = array();//Contient le nombre de champs vide qui peuvent être rempli potentiellement

  //Permet de retrouver les valeurs contenu entre <li> et </li>
  preg_match_all ( '#<li>(.*?)</li>#', $data, $ref_list );

  echo "<h2>Récapitualtif du scan</h2>";

  //Permet de compter le nombre d'occurence d'une variable
  foreach($ref_list[1] as $ref){
    if (isset($list_data[$ref])) { $list_data[$ref]++ ; }
    else{ $list_data[$ref] = 1 ; }
  }

  /************ Permet de s'assurer de la présence d'une ref ************/
  //Si la ref n'est pas présente, la valeur d'occurence dans le tableau est mise à 0
  foreach($list_data as $key => $value)
  {
    $verif_ref->execute([$key]);
    if(!($verif_ref->rowCount()))
    { 
      $list_data[$key] = 0; 
      echo '<div>La référence <span style="font-weight:bold">' .$key. "</span> n'a pas été trouvé dans la base de données</div>";
    }
    else{
      $id_ref[$key] = $verif_ref->fetchColumn();
    }
  }

  /************ Permet de s'assurer du bon nombre de ref dispo dans la BDD ************/

  foreach($list_data as $key => $value)
  {
    $dispo_ref->execute([$key]);
    $nb_dispo = $dispo_ref->rowCount();

    echo '$key : ' . $key . '<br>';
    echo '$nb_dispo : ' . $nb_dispo . '<br>';
    echo '$list_data[$key] : ' . $list_data[$key] . '<br>';

    if ( ($nb_dispo != 0 ) && ($nb_dispo >= $list_data[$key]) )
    {
      $insert_ref->execute([$id_user, $id_ref[$key], $list_data[$key]]);
      ?>
        <script type="text/javascript">
          (function() {
          localStorage.todolist = "";
          })();
        </script>
      <?php
    }
    else
    {
      echo '<div>La référence <span style="font-weight:bold">' .$key. "</span> a été scanné ". $list_data[$key] . " fois alors qu'il n'y a que ". $nb_dispo ." bac actuellement indiqué comme étant au zingage</div>";
    }
  }



  echo '<pre>';
  var_dump($list_data);
  echo '</pre>';

//Si utilisateur non connecté
} else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
