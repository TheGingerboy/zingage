<?php
  require_once("header.php");
  require("connexionBD.php");
  //permet de vérifier la bonne connexion de l'utilisateur
  if (isset($_SESSION['identifiant'])) {
?>

<?php 
  
  //initialisation de la valeur d'erreur 0 = ok
  $err = true;
  $ref_article =  array();

  //récupération des valeurs passé
  $data = $_POST['data'];

  //Permet de retrouver les valeurs contenu entre <li> et </li>
  preg_match_all ( '#<li>(.*?)</li>#', $data, $ref_list );

?>
<h2>Récapitualtif de l'impression</h2>
<?php

  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table class=\"table table-bordered table-striped table-responsive\">";

  echo "<tr><th>REFERENCE</th>";
  echo "<th>NOM</th>";
  echo "<th>NOMBRE</th>";
  echo "<th>DIMENSION</th>";
  echo "<th>BAC ARTICLE</th>";
  echo "<th>POIDS TOTAL</th></tr>";

  foreach($ref_list[1] as $ref){
    $sql = "SELECT * FROM article WHERE ref_article='$ref'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
      if($err){
        echo "<div>Attention, un ou plusieurs articles scannés n'ont pas d'étiquette</div>";
        echo "<div>Voici la liste de ces articles (avec leur référence code-barre) :</div>";
        $err = false;
      }
              echo $ref . "<br>";
    }

    else {
      //affichage d'une ligne de tableau sur l'article
      while ($row = mysqli_fetch_array($result)){
        $ref_article[] = $row[0];
        echo "<tr><td>{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "<td>{$row[3]}</td>";
        echo "<td>{$row[4]}</td>";
        echo "<td>{$row[5]}</td>";
        echo "<td>{$row[6]}</td></tr>";
      }
    }
  }
    echo "</table>";
  ?>

  <div id="formulaire">
    <h2>Numéro d'OF</h2>
    <form action="zingageImpression" method="post">
      <div>
        <input style="display: none;" type="" name="ref_article" class="form-control" value="<?php echo htmlspecialchars(json_encode($ref_article)) ?>">
        <input type="" name="of" class="form-control" id="of" pattern="[0-9]{6,8}" title="saisissez votre numéro d'OF (entre 6 et 8 chiffres)" required>
        <input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
      </div>
    </form>
  </div>

<?php
  }
  //Si utilisateur non connecté
  else {
    echo "<h2> Vous devez être connecté pour effectuer cette action <h2>";
  }
  require_once("footer.php");
?>
