<?php
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {

  //Déclaration variable
  $err = false;

  //récupération des valeurs passé
  $identifiant_user = htmlspecialchars($_SESSION['identifiant']);
  $of = htmlspecialchars($_POST['of']);
  $id_article = json_decode($_POST['ref_article']);

  //Récupère l'ID de l'utilisateur
  $sql = $pdo->query("SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant_user'");
  while ($row = $sql->fetch()){
    $id_user  = $row['id_user'];
  }

  //Temporaire, todo : Faire la list deroulante table d'entreprise et recuperer l'ID
  $id_entreprise = "1";
  $nom_entreprise = "Honda France Manufacturing";

  //Temporaire, todo : voir pour un routage des etiquettes en fonction de la ref
  $labelname = "test.lab";

  //Contiendra tous les arguments nécessaire pour l'impression CodeSoft
  $codesoftArgs = "";

  //Si tout c'est bien passé, préparation de la récupération des attributs des items
  foreach ($id_article as $article) {
    //Normalise le numéro pour éviter un défaut
    $article = htmlspecialchars($article);
    //Requête et récupération de l'ID
    $sql =  $pdo->query("SELECT * FROM article WHERE id_article='$article'");

    //Récupération des valeurs pour l'impression sous CodeSoft
    while ($row = $sql->fetch()){
      $args = 
      'LABELNAME = "' . dirname(dirname(__FILE__)) . "\labelDirectory\\" . $labelname . '"' . PHP_EOL .
      'NBR_ARTICLE = "' . $row['nb_article'] . '"' . PHP_EOL .
      'NOM_ARTICLE = "' . $row['nom_article'] . '"' . PHP_EOL .
      'NOM_ENTREPRISE = "' . $nom_entreprise . '"' . PHP_EOL .
      'NUM_OF = "' . $of . '"' . PHP_EOL .
      'REF_ARTICLE = "' . $row['ref_article'] . '"' . PHP_EOL .
      'LABELQUANTITY = "1"' . PHP_EOL;
      //  D'autres infos potentiellement nécessaire
      // 'DIMENSIONS_ARTICLE = "' . $row[dim_article] . '"' .  PHP_EOL .
      // 'TYPE_BAC_ARTICLE = "' . $row[bac_article]  . '"' .  PHP_EOL .
      // 'POIDS_ARTICLE = "' . $row[poid_article]  . '"' .  PHP_EOL .

      $codesoftArgs .= $args;
    }
    
    // insere la requête dans la base de données, si une erreur se produit, n'imprime pas les étiquettes
    $insert_sql = "INSERT INTO scan (id_article, id_user_depart, id_entreprise, date_scan_depart, of_scan, is_in_zingage) 
                   VALUES(?, ?, ?, now(), ?, ?)";
    $pdo->prepare($insert_sql)->execute([$article, $id_user, $id_entreprise, $of, '1']);  
  }

  //Des vérification ont déja été effectué, en conséquence, je ne vérifie pas la validité des arguments précédents
  //Je vais créer le fichier qui sera à éxécuter par CodeSoft
  $name_file = dirname(__FILE__) . "\..\watchDirectory\\" . 'print.cmd';
  $print_file = fopen($name_file, 'a+') or die('Cannot open file:  ' . $print_file);
  fwrite($print_file, $codesoftArgs);
  fclose($print_file);

?>

  <script type="text/javascript">
      
    (function() {
     localStorage.todolist = "";
    })();

  </script>

<?php
  } else {echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
