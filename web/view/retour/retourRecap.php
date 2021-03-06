<?php
  //permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {
  
  /**************************     SQL       *****************************/

  /** Permet de s'assurer de la présence d'une ref et d'avoir son id **/
  $verif_ref = $pdo->prepare("SELECT id_article FROM article WHERE ref_article = ?");

  /***** Permet de s'assurer du bon nombre de ref dispo dans la BDD ***/
  $dispo_ref = $pdo->prepare("
    SELECT id_scan FROM scan
    JOIN article ON article.id_article = scan.id_article
    WHERE scan.id_user_retour IS NULL
    AND ref_article = ?
    GROUP BY id_scan
    ");

  /***** Permet d'obtenir l'ID de l'article en fonction de sa ref ***/
  $show_ref = $pdo->prepare("
    SELECT * FROM scan
    JOIN article ON article.id_article = scan.id_article
    WHERE scan.id_user_retour IS NULL
    AND ref_article = ?
    GROUP BY id_scan
    ");

  /**************************     VAR       *****************************/
  $data = $_POST['data'];
  $nb_occu = array();
  $id_list_article = array();
  $err = false;

  //Permet de retrouver les valeurs contenu entre <li> et </li> dans $ref_list[]
  preg_match_all ( '#<li>(.*?)</li>#', $data, $ref_list );

  /************ Permet de s'assurer de la présence d'une ref ************/
  //Si la ref n'est pas présente, la valeur d'occurence dans le tableau est mise à 0

  foreach($ref_list[1] as $ref){

    //Permet de compter le nombre d'occurence d'une variable
    if (isset($nb_occu[$ref])) { $nb_occu[$ref]++ ; }
    else{ $nb_occu[$ref] = 1 ; }

    $verif_ref->execute([$ref]);
    if(!($verif_ref->rowCount()))
    { 
      echo '<div class="recap-alert">';
      if (!$err) {
        $err = true;
        echo '<h2 class="center text-danger">ATTENTION</h2>';
        echo '<h2 class="center">Un ou plusieurs articles scannés n\'ont pas été enregistré</h2>';
        echo '<h2 class="center text-warning">Veuillez corriger les erreurs ci-dessous :</h3>';

      }
      $nb_occu[$ref] = 0; 
      echo '<h3 class="center">La référence <span style="font-weight:bold">' .$ref. "</span> n'a pas été trouvé dans la base de données</h3>";
      echo "</div>";
    }
  }

  /************ Permet de s'assurer du bon nombre de ref dispo dans la BDD ************/
  //Si la ref est présente mais qu'elle n'est pas au zingage en ce moment, afficher une erreur

  foreach($nb_occu as $ref => $value)
  {
    $dispo_ref->execute([$ref]);
    $nb_dispo = $dispo_ref->rowCount();
    if ( $nb_occu[$ref] > $nb_dispo )
    {
      echo '<div class="recap-alert">';
      if (!$err) {
        $err = true;
        echo '<h2 class="center text-danger">ATTENTION<h2>';
      }      
      echo '<h3>La référence <span style="font-weight:bold">' .$ref. "</span> a été scanné ". $nb_occu[$ref] . " fois alors qu'il n'y a que ". $nb_dispo ." bac actuellement indiqué comme étant au zingage</h3>";
      $nb_occu[$ref] = 0;
      echo '</div>';
    }
  }


  echo '<h2 class="center">Récapitualtif de l\'impression</h2>';

  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table class=\"table table-bordered table-striped table-responsive\">";

  echo "<tr>";
  echo "<th>NOMBRE</th>";
  echo "<th>REFERENCE</th>";
  echo "<th>DESIGNATION</th>";
  echo "<th>BAC</th>";
  echo "</tr>";

  //Pour chaque ref entrée dans le système
  foreach($ref_list[1] as $ref)
  { //Si la ref n'apparait pas 0 fois (mis à 0 si condition non respecté)
    if ($nb_occu[$ref] > 0) {
      $show_ref->execute([$ref]);
      $row = $show_ref->fetch();
      $id_list_article[] = $row['id_article'];
    }
  }

  foreach($nb_occu as $ref => $value)
  {
    if ($nb_occu[$ref] > 0) {
          $show_ref->execute([$ref]);
          $row = $show_ref->fetch();
          echo "<tr>"; 
          echo "<td>{$nb_occu[$ref]}</td>";
          echo "<td>{$row['ref_article']}</td>";
          echo "<td>{$row['nom_article']}</td>";
          echo "<td>{$row['bac_article']}</td>";
          echo "</tr>"; 
    }
  }

  echo "</table>";
  //Si la liste est vide, retirer le bouton de validation
  if (!empty($id_list_article)) {
    ?>

      <div id="formulaire" class="center">
        <h3>Vérifiez bien vos scans puis validez vos opérations avec le bouton "envoyer"</h3>
        <form action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour/recap/insert" ?>" method="post">
            <input type="hidden" name="ref_article" class="form-control" value=" <?= json_encode($id_list_article) ?> ">
            <input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
        </form>
      </div>

    <?php
  }
  else{
    echo '<h3 class="center">Vous ne pouvez pas envoyer une liste d\'article vide</h3>';
  }
//Si utilisateur non connecté
}
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
