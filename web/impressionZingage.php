<?php
  require_once("header.php");
  require("connexionBD.php");
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

  echo "<pre>";
  foreach($matches[1] as $teto){
    echo "<div>";
    echo $teto;
    echo "</div>";
  }
  echo "</pre>";

?>

<div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:teal;">   
  </div>
</div>
<div>
  <input type="button" value="print" onclick="PrintDiv();" />
</div>



<script type="text/javascript">
    
  (function() {
   localStorage.todolist = "";
  })();

  function PrintDiv() {    
    var divToPrint = document.getElementById('divToPrint');
    var popupWin = window.open('', '_blank', 'width=300,height=300');
    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
  }

</script>


<?php
  require_once("footer.php");
?>
