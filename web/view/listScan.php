<?php
//permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  /************Variables**********/

  $cur_week_date = date('Ymd', strtotime('-'. date('w') .' days'));

  $cur_month_date = date("Ym01") ;

  $cur_year_date = date("Y0101") ;

  /**************SQL**************/
  //Permet de récupérer les articles dans une liste déroulante pour afficher des infos sur un article particulier
  $sql_all_ref = $pdo->query("SELECT id_article, ref_article FROM article");
  //Recupère les articles actuellement au zingage

  $sql_in_zingage = $pdo->query("
    SELECT 
      COUNT(scan.id_article) AS nb_article_is_zing,
      ref_article,
      nom_article,
      SUM(article.poid_article) AS poids_cumule,
      SUM(article.nb_article) AS quantite_cumule
    FROM 
      article 
    LEFT JOIN 
      scan ON article.id_article = scan.id_article
    WHERE 
      is_in_zingage = '1' 
    GROUP BY
      ref_article
    ORDER BY
      nb_article_is_zing
    ");

  //Récupère l'article le plus ancien actuellement au zingage
  $sql_oldest_in_zingage = $pdo->query("
    SELECT 
      ref_article,
      MIN(scan.date_scan_depart) AS oldest_depart
    FROM 
      article 
    LEFT JOIN 
      scan ON article.id_article = scan.id_article
    WHERE
      scan.is_in_zingage = 1
    LIMIT 1
    ");

  $sql_date_return = $pdo->prepare("
    SELECT 
      COUNT(scan.id_article) AS nb_article_is_zing,
      ref_article,
      nom_article,
      SUM(article.poid_article) AS poids_cumule,
      SUM(article.nb_article) AS quantite_cumule
    FROM 
      article 
    LEFT JOIN 
      scan ON article.id_article = scan.id_article
    WHERE 
      is_in_zingage = 0
    AND
      date(scan.date_scan_retour) > date(?)
    GROUP BY
      ref_article
    ORDER BY
      nb_article_is_zing
    ");

?>
  <div>

    <h2 class="center">Historique</h2>

      <div class="center">

        <h4>Afficher l'historique d'un article</h4>
        <form method="get" action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>">
          <select name="article" class="selectpicker" data-style="btn-primary" style="color: white;" data-live-search="true" multiple="multiple">
            <?php
            //Permet d'afficher la liste des refs dans un dropdown
              while ($row = $sql_all_ref->fetch()) {
                echo '<option value="' . $row['id_article'] . '">' . $row['ref_article'] . '</option>';
              }
            ?>
          </select>
          <input type="submit" value="Afficher">
        </form>

      </div>

      <div>

          <h2 class="center">Au zingage</h2>
          <table id="tab-list-article" class="table table-bordered table-striped table-responsive">
            <tr>
              <th>NOMBRE</th>
              <th>REFERENCE</th>
              <th>DESIGNATION</th>
              <th>POIDS CUMULE</th>
              <th>QUANTITE CUMULE</th>
            </tr>
            <?php
            //Récupère les articles encore au zingage
              while ($row = $sql_in_zingage->fetch()) 
              {
                echo "<tr>";
                echo '<td>' . $row['nb_article_is_zing'] . '</td>';
                echo '<td>' . $row['ref_article'] . '</td>';
                echo '<td>' . $row['nom_article'] . '</td>';
                echo '<td>' . $row['poids_cumule'] . '</td>';
                echo '<td>' . $row['quantite_cumule'] . '</td>';
                echo "</tr>";
              } 
            ?>
          </table>
            <?php
            //Récupère l'article le plus ancien (individuel) dans la BDD
            if ($sql_oldest_in_zingage->rowCount() != 0 ) {

              while ($row = $sql_oldest_in_zingage->fetch()) 
              {
                $oldest_ref = $row['ref_article'];
                $oldest_depart = $row['oldest_depart'];
              } 
            ?>
          <div class="bg-info padding-all-small">  
            <h3 class="center">L'article le plus ancien envoyé au zingage posséde la référence : </h3>
            <h3 class="center"><b>"<?= $oldest_ref ?>"</b></h3>
            <h3 class="center"> Il a été envoyé le </h3>
            <h3 class="center"><b><?= date( "d/m/Y H\h i:s", strtotime($oldest_depart) ) ?></b> </h3>
          </div>
          <?php } ?>



      </div>

      <div>

          <h2 class="center">Revenu récement</h2>
          <div>
            <table id="tab-list-article" class="table table-bordered table-striped table-responsive">
            <h4 class="center">Semaine</h4>
              <tr>
                <th>NOMBRE</th>
                <th>REFERENCE</th>
                <th>DESIGNATION</th>
                <th>POIDS CUMULE</th>
                <th>QUANTITE CUMULE</th>
              </tr>

              <?php
                //Passage du paramètre de temps
                $sql_date_return->execute([$cur_week_date]);
                //Récupère les articles encore au zingage
                while ($row = $sql_date_return->fetch()) 
                {
                  echo "<tr>";
                  echo '<td>' . $row['nb_article_is_zing'] . '</td>';
                  echo '<td>' . $row['ref_article'] . '</td>';
                  echo '<td>' . $row['nom_article'] . '</td>';
                  echo '<td>' . $row['poids_cumule'] . '</td>';
                  echo '<td>' . $row['quantite_cumule'] . '</td>';
                  echo "</tr>";
                } 
              ?>

            </table>
          </div>

          <div>
            <table id="tab-list-article" class="table table-bordered table-striped table-responsive">
            <h4 class="center">Mois</h4>
              <tr>
                <th>NOMBRE</th>
                <th>REFERENCE</th>
                <th>DESIGNATION</th>
                <th>POIDS CUMULE</th>
                <th>QUANTITE CUMULE</th>
              </tr>

              <?php
                //Passage du paramètre de temps
                $sql_date_return->execute([$cur_month_date]);
                //Récupère les articles encore au zingage
                while ($row = $sql_date_return->fetch()) 
                {
                  echo "<tr>";
                  echo '<td>' . $row['nb_article_is_zing'] . '</td>';
                  echo '<td>' . $row['ref_article'] . '</td>';
                  echo '<td>' . $row['nom_article'] . '</td>';
                  echo '<td>' . $row['poids_cumule'] . '</td>';
                  echo '<td>' . $row['quantite_cumule'] . '</td>';
                  echo "</tr>";
                } 
              ?>

            </table>
          </div>

          <div>
            <table id="tab-list-article" class="table table-bordered table-striped table-responsive">
            <h4 class="center">Année <?= date("Y") ?></h4>
              <tr>
                <th>NOMBRE</th>
                <th>REFERENCE</th>
                <th>DESIGNATION</th>
                <th>POIDS CUMULE</th>
                <th>QUANTITE CUMULE</th>
              </tr>

              <?php
                //Passage du paramètre de temps
                $sql_date_return->execute([$cur_year_date]);
                //Récupère les articles encore au zingage
                while ($row = $sql_date_return->fetch()) 
                {
                  echo "<tr>";
                  echo '<td>' . $row['nb_article_is_zing'] . '</td>';
                  echo '<td>' . $row['ref_article'] . '</td>';
                  echo '<td>' . $row['nom_article'] . '</td>';
                  echo '<td>' . $row['poids_cumule'] . '</td>';
                  echo '<td>' . $row['quantite_cumule'] . '</td>';
                  echo "</tr>";
                } 
              ?>

            </table>
          </div>

      </div>

  </div>
<?php
}
//Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
