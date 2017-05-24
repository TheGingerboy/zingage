<?php
  //permet de vérifier la bonne connexion de l'utilisateur
if (isset($_SESSION['identifiant'])) {

  $get_all_ref = $pdo->query("SELECT id_article, ref_article FROM article");
?>
  <div>

    <h2 class="center">Historique</h2>

      <div class="center">

        <h4>Afficher l'historique d'un article</h4>
        <form method="get" action="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>">
          <select class="selectpicker" data-style="btn-danger" data-live-search="true" multiple="multiple">
            <?php
            //Permet d'afficher la liste des refs dans un dropdown
              while ($row = $get_all_ref->fetch()) {
                echo '<option value="' . $row['id_article'] . '">' . $row['ref_article'] . '</option>';
              }
            ?>
          </select>
          <input type="submit" name="Envoyer">
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
              <th>QUANTITE UNITAIRE</th>
            </tr>
          </table>
          <h3>L'envoie le plus vieux est la ref ... envoyé le ...</h3>

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
                <th>QUANTITE UNITAIRE</th>
              </tr>
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
                <th>QUANTITE UNITAIRE</th>
              </tr>
            </table>
          </div>

          <div>
            <table id="tab-list-article" class="table table-bordered table-striped table-responsive">
            <h4 class="center">Année 2017</h4>
              <tr>
                <th>NOMBRE</th>
                <th>REFERENCE</th>
                <th>DESIGNATION</th>
                <th>POIDS CUMULE</th>
                <th>QUANTITE UNITAIRE</th>
              </tr>
            </table>
          </div>

      </div>

  </div>
<?php
}
//Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }
