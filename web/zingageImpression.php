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
  $identifiant = $_SESSION['identifiant'];
  $of = $_POST['of'];
  $id_article = json_decode($_POST['ref_article']);

  //Récupère l'ID de l'utilisateur
  $sql_userid = "SELECT id_user FROM utilisateur WHERE identifiant_user='$identifiant'";
  $getID_user = mysqli_fetch_assoc(mysqli_query($conn, $sql_userid));
  $id_user = $getID_user['id_user'];

  //Temporaire, todo : Faire la list deroulante table d'entreprise et recuperer l'ID
  $id_entreprise = "1";

  //Pour Id récupéré, faire : 
  foreach($id_article as $article){
    $sql_insertTable = "INSERT INTO scan VALUES ('$article', '$id_user', '$id_entreprise', CURRENT_TIMESTAMP, '$of')";
    //si echec de l'execution SQL, passer l'erreur à true
    if((mysqli_query($conn, $sql_insertTable)) == false){ $err = true; }
  }

  if($err) { echo "<h2>Une erreur s'est produite, recommencer l'opération, si l'erreur persiste, contactez votre administrateur réseau</h2>"; }
  else { echo "<h2>Vos valeurs ont bien été ajoutées</h2>"; }

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
