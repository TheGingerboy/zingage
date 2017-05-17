<?php
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = true;
  $ref_article =  array();

  //récupération des valeurs passé
  $data = $_POST['data'];

  //Permet de retrouver les valeurs contenu entre <li> et </li>
  preg_match_all ( '#<li>(.*?)</li>#', $data, $ref_list );



  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table class=\"table table-bordered table-striped table-responsive\">";

  echo "<tr><th>REFERENCE</th>";
  echo "<th>NOM</th>";
  echo "<th>NOMBRE</th>";
  echo "<th>DIMENSION</th>";
  echo "<th>BAC ARTICLE</th>";
  echo "<th>POIDS TOTAL</th></tr>";

  foreach($ref_list[1] as $ref){
    $verif_ref = $pdo->query("SELECT * FROM article WHERE ref_article='$ref'");

    if($verif_ref->rowCount() == 0){
      if($err){

        echo '<h2 class="center text-danger">Attention</h2>';
        echo '<h2 class="center">Un ou plusieurs articles scannés n\'ont pas été enregistré</h2>';
        echo '<h3 class="text-warning">Voici la liste des référence de ces articles :</h3>';
        $err = false;
      }
    echo "<h3>" . $ref . "</h3><br>";
    }

    else {
      //affichage d'une ligne de tableau sur l'article
      while ($row = $verif_ref->fetch()){
        $ref_article[] = $row['id_article'];
        echo "<tr>"; 
        echo "<td>{$row['ref_article']}</td>";
        echo "<td>{$row['nom_article']}</td>";
        echo "<td>{$row['nb_article']}</td>";
        echo "<td>{$row['dim_article']}</td>";
        echo "<td>{$row['bac_article']}</td>";
        echo "<td>{$row['poid_article']}</td>";
        echo "</tr>";
      }
    }
  }
  echo '<h2 class="center text-success">Récapitualtif de l\'impression</h2>';
  echo "</table>";


  ?>

  <div id="formulaire">
    <h3>Vérifiez bien vos scan puis valider vos opérations avec le bouton "envoyer"</h3>
    <form action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/depart/recap/impression" ?>" method="post">
      <div>
        <input type="hidden" name="ref_article" class="form-control" value="<?php echo json_encode($ref_article) ?>">
        <input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
      </div>
    </form>
  </div>

  <?php
  }
  //Si utilisateur non connecté
  else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
