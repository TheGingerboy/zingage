<?php
  require_once("header.php");
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $list = $_POST['data'];

  echo $list;

?>

<?php
  require_once("footer.php");
?>
