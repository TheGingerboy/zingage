<?php
//permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = true;
  $id_list =  array();
  $nb_occu = array();

  //récupération des valeurs passé
  $data = $_POST['data'];

  //Permet de retrouver les valeurs contenu entre <li> et </li>
  preg_match_all ( '#<li>(.*?)</li>#', $data, $ref_list );

  // SQL

  $verif_ref = $pdo->prepare("SELECT id_article, ref_article, nom_article, bac_article FROM article WHERE ref_article= ? ");

  foreach ($ref_list[1] as $ref) {
    //Permet de compter le nombre d'occurence d'une variable
    if (isset($nb_occu[$ref])) { $nb_occu[$ref]++ ; }
    else{ $nb_occu[$ref] = 1 ; }
  }


  foreach ($ref_list[1] as $ref) {
    if($nb_occu[$ref] != 0 ){
      $verif_ref->execute([$ref]);
      if($verif_ref->rowCount() <= 0){
        echo '<div class="recap-alert">';
        if($err){
          echo '<h2 class="center text-danger">Attention</h2>';
          echo '<h2 class="center">Un ou plusieurs articles scannés n\'ont pas été enregistré</h2>';
          echo '<h3 class="center text-warning">Les références suivantes n\'existent pas dans la base de données :</h3>';
          $err = false;
        }
      echo "<h3>\"" .  $ref . "\" scanné "  . $nb_occu[$ref]  . " fois</h3>";
      $nb_occu[$ref] = 0;
      echo '</div>';
      }
      else{
        while ($row = $verif_ref->fetch()){
          $id_list[] = $row['id_article'];
        }
      }
    }
  }
  echo '</div>';

  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table class=\"table table-bordered table-striped table-responsive\">";

  echo "<tr>";
  echo "<th>NOMBRE</th>";
  echo "<th>REFERENCE</th>";
  echo "<th>DESIGNATION</th>";
  echo "<th>BAC</th>";
  echo "</tr>";

  foreach($nb_occu as $ref => $value){

    if ($nb_occu[$ref] != 0) {
      //affichage d'une ligne de tableau sur l'article
      $verif_ref->execute([$ref]);
      while ($row = $verif_ref->fetch()){
        echo "<tr>"; 
        echo "<td>{$nb_occu[$ref]}</td>";
        echo "<td>{$row['ref_article']}</td>";
        echo "<td>{$row['nom_article']}</td>";
        echo "<td>{$row['bac_article']}</td>";
        echo "</tr>";
      }
    }
  }
  echo '<h2 class="center text-success">Récapitualtif de l\'impression</h2>';
  echo "</table>";

  if ( !empty($id_list) ) { 
    ?>
    <div id="formulaire" class="center">
      <h3>Vérifiez bien vos scans puis validez vos opérations avec le bouton "envoyer"</h3>
      <form action="<?=  "http://" . $_SERVER['SERVER_NAME'] . "/zingage/depart/recap/impression" ?>" method="post">
        <div>
          <input type="hidden" name="ref_article" class="form-control" value="<?= json_encode($id_list) ?>">
          <input id="btn-valide" class="btn btn-success center" type="submit" value="Envoyer">
        </div>
      </form>
    </div>
    <?php
  }
  else{
    echo '<h3 class="center">Vous ne pouvez pas envoyer une liste d\'article vide</h3>';
  }
}
  //Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
