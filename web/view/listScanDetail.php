<?php
  //permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  //Préparation de la requête
  $sql = $pdo->query("
    SELECT 
      id_scan, 
      ref_article, 
      nom_article, 
      nom_entreprise,
      nom_zingeur,
      date_scan_depart, 
      date_scan_retour, 
      depart.identifiant_user user_depart, 
      retour.identifiant_user user_retour
    FROM scan
    JOIN article ON scan.id_article = article.id_article
    JOIN entreprise
    JOIN zingeur
    JOIN utilisateur depart ON depart.id_user = scan.id_user_depart
    LEFT JOIN utilisateur retour ON retour.id_user = scan.id_user_retour
    GROUP BY id_scan
    ORDER BY id_scan DESC
    ");

  echo '<h2 class="center">Historique des scans</h2>';
  //Déclaration du tableau et de son header
  echo "<table id=\"tab-list-article\" class=\"table table-bordered table-striped table-responsive\">";
    echo "<thead>";
      echo "<tr>";
        echo "<th>ZINGEUR</th>";
        echo "<th>NOM</th>";
        echo "<th>CLIENT</th>";
        echo "<th>OPE DEPART</th>";
        echo "<th>DATE DEPART</th>";
        echo "<th>OPE RETOUR</th>";
        echo "<th>DATE RETOUR</th>";
        echo "<th>SUPPRESSION</th>";
      echo "</tr>";
    echo "</thead>";

  //Si pas de résultat
  if($sql->rowCount() <= 0){  echo '<h3 class="center">Aucun article n\'à encore été scanné</h3>';  }
  //Sinon
  else {
    echo "<tbody>";
    while ($row = $sql->fetch()){
      echo "<tr>";
        echo "<td>". htmlspecialchars_decode($row['nom_zingeur']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['nom_article']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['nom_entreprise']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['user_depart']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['date_scan_depart']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['user_retour']) . "</td>";
        echo "<td>". htmlspecialchars_decode($row['date_scan_retour']) . "</td>";
        //Supression
        echo '<td class="center">';
          echo '<form action="'. "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/scan/suppression" .'" method="post" id="form-suppr-article">';
            echo '<input type="hidden" name="id_scan" value="' . $row['id_scan'] . '" style="display:none;" class="hidden">';
            echo '<button type="submit"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i></button>' ;
          echo '</form>';
        echo  "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
  }
  echo "</table>";

  ?>
  
  <script type="text/javascript">
    $(document).ready(function(){
        $('#tab-list-article').DataTable( {
            colReorder: true,
            keys: true,
            responsive: true,
            "language": {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });    
  </script>

  <?php
}
//Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
