<?php
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {

  /****************** Déclaration et récupération de variable ***********/
  $err = false;
  $identifiant_user = htmlspecialchars($_SESSION['identifiant']);
  $id_article = json_decode($_POST['ref_article']);

  /******************************* Déclaration SQL ************************************/
  // insere la requête dans la base de données, si une erreur se produit, n'imprime pas les étiquettes
  $insert_sql = "INSERT INTO scan (id_article, id_user_depart, id_entreprise, date_scan_depart, is_in_zingage) 
                 VALUES(?, ?, ?, now(), ?)";

  //Récupère l'ID de l'utilisateur
  $get_id = $pdo->query("SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant_user'");
  while ($row = $get_id->fetch()){
    $id_user  = $row['id_user'];
  }
  //Récupère les infos de l'articles
  $get_article =  $pdo->prepare("SELECT * FROM article WHERE id_article= ? ");

  //Temporaire, todo : Faire la list deroulante table d'entreprise et recuperer l'ID
  $id_entreprise = "1";
  $nom_entreprise = "Honda France Manufacturing";

  //Temporaire, todo : voir pour un routage des etiquettes en fonction de la ref
  $labelname = "test.lab";

  //Contiendra tous les arguments nécessaire pour l'impression CodeSoft
  $codesoftArgs = "";

  //Si tout s'est bien passé, préparation de la récupération des attributs des items
  foreach ($id_article as $article) {
    //Normalise le numéro pour éviter un défaut
    $article = htmlspecialchars($article);
    //Requête et récupération de l'ID
    $get_article->execute([$article]);

    //Récupération des valeurs pour l'impression sous CodeSoft
    while ($row = $get_article->fetch()){
      $args = 
      'LABELNAME = "' . dirname(dirname(__FILE__)) . "\labelDirectory\\" . $labelname . '"' . PHP_EOL .
      'NBR_ARTICLE = "' . $row['nb_article'] . '"' . PHP_EOL .
      'NOM_ARTICLE = "' . $row['nom_article'] . '"' . PHP_EOL .
      'NOM_ENTREPRISE = "' . $nom_entreprise . '"' . PHP_EOL .
      'NUM_OF = "' . $row['of_article'] . '"' . PHP_EOL .
      'REF_ARTICLE = "' . $row['ref_article'] . '"' . PHP_EOL .
      'LABELQUANTITY = "1"' . PHP_EOL;
      //  D'autres infos potentiellement nécessaire
      // 'DIMENSIONS_ARTICLE = "' . $row[dim_article] . '"' .  PHP_EOL .
      // 'TYPE_BAC_ARTICLE = "' . $row[bac_article]  . '"' .  PHP_EOL .
      // 'POIDS_ARTICLE = "' . $row[poid_article]  . '"' .  PHP_EOL .

      $codesoftArgs .= $args;
    }
    
    try{
      $prepare_insert_sql = $pdo->prepare($insert_sql);
      $prepare_insert_sql->execute([$article, $id_user, $id_entreprise, '1']);
    }
    catch (PDOException $ex) {
        echo  $ex->getMessage();
    }
  }

  //Des vérification ont déja été effectué, en conséquence, je ne vérifie pas la validité des arguments précédents
  //Je vais créer le fichier qui sera à éxécuter par CodeSoft
  $name_file = dirname(__FILE__) . "\..\watchDirectory\\" . 'print.cmd';
  $print_file = fopen($name_file, 'a+') 
    or die('L\'impression n\'a pas pu se faire, si l\'erreur persiste, contactez votre administratuer réseau');
  fwrite($print_file, $codesoftArgs);
  fclose($print_file);
  echo "<h3>Article(s) ajouté(s) avec succès, les étiquettes devraient maintenant sortir.</h3>";
  echo "<h3>Si vos étiquettes ne sont pas sortis, vérifiez l'imprimante et le lancement du logiciel d'impression (CodeSoft).</h3>";

?>

  <script type="text/javascript">
      
    (function() {
     localStorage.todolist = "";
    })();

  </script>

<?php
  } else {echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
