<?php
  //permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  //Préparation de la requête
  $sql =  $pdo->query("SELECT * FROM article");
  //Préparation de la direction des chemins
  $edition = (dirname(dirname(__FILE__)) . "\\view\\footer.php") ;
  $suppression = (dirname(dirname(__FILE__)) . "\\view\\footer.php");

  echo '<h2 class="center">Liste des articles</h2>';
  //Tableau à deux dimension matches[0] renvoie le résultat avec les li et matches[1] sans
  echo "<table id=\"tab-list-article\" class=\"table table-bordered table-striped table-responsive\">";

  //Déclaration du header tableau
  echo "<tr>";
  echo "<th>REFERENCE</th>";
  echo "<th>NOM</th>";
  echo "<th>NOMBRE</th>";
  echo "<th>DIMENSION</th>";
  echo "<th>BAC ARTICLE</th>";
  echo "<th>POIDS TOTAL</th>";
  echo "<th>EDITION</th>";
  echo "<th>SUPPRESSION</th>";
  echo "</tr>";

  //Si pas de résultat
  if($sql->rowCount() < 0){  echo '<h3 class="center">Il n\'y a pas d\'article enregistré pour le moment</h3>';  }
  //Sinon
  else {
    while ($row = $sql->fetch()){
      echo "<tr>";
      echo "<td>". htmlspecialchars_decode($row['ref_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['nom_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['nb_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['dim_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['bac_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['poid_article']) . "</td>";
      //Edition, amène sur la page /zingage/zingageArticleEdition/{id_article}
      echo '<td class="center"> <a href =' . "http://" . $_SERVER['SERVER_NAME'] . "/zingage/zingageArticleEdition/" . $row['id_article'] . ">"
      . '<i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>' ."</td>";
      //Supression
      echo '<td class="center">';
        echo '<form action="/zingage/zingageArticleSuppression/" method="post" id="form-suppr-article">';
          echo '<input type="hidden" name="id_article" value="' . $row['id_article'] . '" style="display:none;" class="hidden">';
          echo '<button type="submit"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i></button>' ;
        echo '</form>';
      echo  "</td>";
      echo "</tr>";
    }
  }
  echo "</table>";
}
//Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }

?>
