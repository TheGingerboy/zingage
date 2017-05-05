<?php
  //permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  //Préparation de la requête
  $sql = $pdo->query("SELECT id_scan, ref_article, nom_article, nom_entreprise, date_scan_depart, date_scan_retour, identifiant_user FROM scan INNER JOIN article, utilisateur, entreprise WHERE scan.id_article = article.id_article AND scan.id_user = utilisateur.id_user AND scan.id_entreprise = entreprise.id_entreprise");

  echo '<h2 class="center">Liste des articles</h2>';
  //Déclaration du tableau et de son header
  echo "<table id=\"tab-list-article\" class=\"table table-bordered table-striped table-responsive\">";
  echo "<tr>";
  echo "<th>REFERENCE</th>";
  echo "<th>NOM</th>";
  echo "<th>ENTREPRISE</th>";
  echo "<th>DATE DEPART</th>";
  echo "<th>DATE RETOUR</th>";
  echo "<th>UTILISATEUR</th>";
  echo "<th>EDITION</th>";
  echo "<th>SUPPRESSION</th>";
  echo "</tr>";

  //Si pas de résultat
  if($sql->rowCount() <= 0){  echo '<h3 class="center">Il n\'y a pas d\'article enregistré pour le moment</h3>';  }
  //Sinon
  else {
    while ($row = $sql->fetch()){
      echo "<tr>";
      echo "<td>". htmlspecialchars_decode($row['ref_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['nom_article']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['nom_entreprise']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['date_scan_depart']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['date_scan_retour']) . "</td>";
      echo "<td>". htmlspecialchars_decode($row['identifiant_user']) . "</td>";
      //Edition, amène sur la page /zingage/zingageArticleEdition/{id_article}
      echo ' <td class="center"> ';
        echo ' <a href = http://' . $_SERVER['SERVER_NAME'] . "/zingage/zingageScanEdition/" . $row['id_scan'] . ">";
        echo ' <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>';
      echo '</td>';
      //Supression
      echo '<td class="center">';
        echo '<form action="/zingage/zingageScanSuppression/" method="post" id="form-suppr-article">';
          echo '<input type="hidden" name="id_article" value="' . $row['id_scan'] . '" style="display:none;" class="hidden">';
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
