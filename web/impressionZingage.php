<?php
  require_once("header.php");
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = 0;

  //récupération des valeurs passé
  $list = $_POST['data'];

    //Permet de retrouver les valeurs contenu entre <li> et </li>
    preg_match_all ( '#<li>(.*?)</li>#', $list, $matches );

    //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
    print_r($matches[1]);

    foreach($matches[1] as $teto){
      echo $teto;
    }

?>

    <script>
      
    (function() {
      localStorage.todolist = "";
    })();

    </script>



<?php
  require_once("footer.php");
?>
