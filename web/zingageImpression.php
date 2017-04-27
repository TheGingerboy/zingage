<?php
  require_once("header.php");
  require("connexionBD.php");
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {
?>

<?php 
  //Déclaration variable
  $err = false;

  //récupération des valeurs passé
  $identifiant = mysql_real_escape_string($_SESSION['identifiant']);
  $of = mysql_real_escape_string($_POST['of']);
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

  if($err) { echo "<h2>Une erreur s'est produite, recommencer l'opération, si l'erreur persiste, contactez votre administrateur réseau</h2>"; }

  else 
  { 
    //Si tout c'est bien passé
    foreach ($id_article as $article) {
      $article = mysql_real_escape_string($article);
      $sql = "SELECT * FROM article WHERE id_article='$article'";
      $result = mysqli_query($conn, $sql);

      //Récupération des arguments pour l'impression sous CodeSoft
      while ($row = mysqli_fetch_array($result)){
        echo "<div>";
        echo 'LABELNAME = "' . dirname(__FILE__) . "\labelDirectory\\" . $labelname . '"' . "<br>" ;
        echo 'NBR_ARTICLE = "' . $row[3] . '"  <br>';
        echo 'NOM_ARTICLE = "' . $row[2] . '"  <br>';
        echo 'NOM_ENTREPRISE = "' . $nom_entreprise . '"  <br>';
        echo 'NUM_OF = "' . $of . '"  <br>';
        echo 'REF_ARTICLE = "' . $row[1] . '"<br>';
        echo 'LABELQUANTITY = "1"' . '<br>';
        // echo 'DIMENSIONS_ARTICLE = "' . $row[4] . '"  <br>';
        // echo 'TYPE_BAC_ARTICLE = "' . $row[5] . '"  <br>';
        // echo 'POIDS_ARTICLE = "' . $row[6] . '"  <br>';
        echo "</div> ";
        echo "<br>";
      }
    }

    //Des vérification ont déja été effectué, en conséquence, je ne vérifie pas la validité des arguments précédents
    //Je vais créer le fichier qui sera à éxécuter par CodeSoft

    $my_file = 'file.txt';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

  }

?>

<script type="text/javascript">
    
  (function() {
   localStorage.todolist = "";
  })();

</script>

<?php
  } else {echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
  require_once("footer.php");
?>
