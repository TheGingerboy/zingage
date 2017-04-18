<?php
  require_once("header.php");
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $list = $_POST['data'];
  $list = htmlspecialchars($list);
  $list = substr($list, 10, -11); 
  echo $list;

  $data = explode( '</li><li>' , $offset );

  print_r(array_values ( $data ));

?>

    <script>
      
    (function() {
      localStorage.todolist = "";
    })();

    </script>



<?php
  require_once("footer.php");
?>
