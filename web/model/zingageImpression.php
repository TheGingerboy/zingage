<?php
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {

?>

<?php 
  //Déclaration variable
  $err = false;

  //récupération des valeurs passé
  $identifiant = mysqli_real_escape_string($conn, $_SESSION['identifiant']);
  $of = mysqli_real_escape_string($conn, $_POST['of']);
  $id_article = json_decode($_POST['ref_article']);

  //Récupère l'ID de l'utilisateur
  $sql_userid = "SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant'";
  $getID_user = mysqli_fetch_assoc(mysqli_query($conn, $sql_userid));
  $id_user = $getID_user['id_user'];

  //Temporaire, todo : Faire la list deroulante table d'entreprise et recuperer l'ID
  $id_entreprise = "1";
  $nom_entreprise = "Honda France Manufacturing";

  //Temporaire, todo : voir pour un routage des etiquettes en fonction de la ref
  $labelname = "test.lab";

  //Contiendra tous les arguments nécessaire pour l'impression CodeSoft
  $codesoftArgs = "";

  //Si tout c'est bien passé, récupération préparation de la récupération des attributs des items
  foreach ($id_article as $article) {
    //Empêche les injections SQL
    $article = mysqli_real_escape_string($conn, htmlspecialchars($article));
    //Requête et récupération de l'ID
    $sql = "SELECT * FROM article WHERE id_article='$article'";
    $result = mysqli_query($conn, $sql);

    //Récupération des arguments pour l'impression sous CodeSoft
    while ($row = mysqli_fetch_array($result)){
      $args = 
      'LABELNAME = "' . dirname(dirname(__FILE__)) . "\labelDirectory\\" . $labelname . '"' . PHP_EOL .
      'NBR_ARTICLE = "' . $row[3] . '"' . PHP_EOL .
      'NOM_ARTICLE = "' . $row[2] . '"' . PHP_EOL .
      'NOM_ENTREPRISE = "' . $nom_entreprise . '"' . PHP_EOL .
      'NUM_OF = "' . $of . '"' . PHP_EOL .
      'REF_ARTICLE = "' . $row[1] . '"' . PHP_EOL .
      'LABELQUANTITY = "1"' . PHP_EOL;
      //  D'autres infos potentiellement nécessaire
      // 'DIMENSIONS_ARTICLE = "' . $row[4] . '"' .  PHP_EOL .
      // 'TYPE_BAC_ARTICLE = "' . $row[5]  . '"' .  PHP_EOL .
      // 'POIDS_ARTICLE = "' . $row[6]  . '"' .  PHP_EOL .

      $codesoftArgs .= $args;
    }
    
    // insere la requête dans la base de données, si une erreur se produit, n'imprime pas les étiquettes
    $insert_sql = mysqli_query( $conn ,"INSERT INTO scan VALUES('$article', '$id_user', '$id_entreprise', now(), '$of', '1')" ) or trigger_error("L'accès à la base de données à échouer, veuillez communiquer cette erreur à votre administrateur réseau : ". mysqli_error(), E_USER_ERROR);  
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
  } 
  else {echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
?>
