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
      $nb_occu[$ref] = 0; 
      echo '<h3>La référence <span style="font-weight:bold">' .$ref. "</span> n'a pas été trouvé dans la base de données</h3>";
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
      echo '<h3>La référence <span style="font-weight:bold">' .$ref. "</span> a été scanné ". $nb_occu[$ref] . " fois alors qu'il n'y a que ". $nb_dispo ." bac actuellement indiqué comme étant au zingage</h3>";
      $nb_occu[$ref] = 0;
    }
  }

  echo "<h2>Récapitualtif de l'impression</h2>";

  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table class=\"table table-bordered table-striped table-responsive\">";

  echo "<tr><th>REFERENCE</th>";
  echo "<th>NOM</th>";
  echo "<th>NOMBRE</th>";
  echo "<th>DIMENSION</th>";
  echo "<th>BAC ARTICLE</th>";
  echo "<th>POIDS TOTAL</th></tr>";

  //Pour chaque ref entrée dans le système
  foreach($ref_list[1] as $ref)
  { //Si la ref n'apparait pas 0 fois (mis à 0 si condition non respecté)
    if ($nb_occu[$ref] > 0) {
      $show_ref->execute([$ref]);
      $row = $show_ref->fetch();
      $id_list_article[] = $row['id_article'];
      echo "<tr>"; 
      echo "<td>{$row['ref_article']}</td>";
      echo "<td>{$row['nom_article']}</td>";
      echo "<td>{$row['nb_article']}</td>";
      echo "<td>{$row['dim_article']}</td>";
      echo "<td>{$row['bac_article']}</td>";
      echo "<td>{$row['poid_article']}</td>";
    }
  }
  echo "</table>";
  ?>

  <div id="formulaire">
    <h2>Numéro d'OF</h2>
    <form action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour/recap/insert" ?>" method="post">
      <div>
        <input type="" name="ref_article" class="form-control" value=" <?php echo json_encode($id_list_article) ?> ">
        <input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
      </div>
    </form>
  </div>

  <?php
  }
  //Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
