<?php
  require_once("header.php");
  require_once("adminMenu.php");
?>

  <div id="entretien_detente">

    <section>
      <h2>Entretien jardin</h2>

      <div class="table-responsive">
        <table class="table">
          <?php
          $articles = get_all_articles_entretien();
          foreach ($articles as $article){
              $com = get_nb_comment($article['id_article']);
          echo
          "<tr>
            <td>
              <a href='/zingage/ficheProduit/".$article['id_article']."'><img src='/zingage/web/images/article/".$article['img_article']."' alt='".$article['nom_article']."'/></a>
            </td>
            <td>
              <a href='/zingage/ficheProduit/".$article['id_article']."'>".$article['nom_article']."</a></br>"
              .$article['description_article']."
            </td>
            <td>
              ".$com." commentaire(s)
            </td>
            <td>
              Disponible maintenant
            </td>
            <td>
              ".$article['prix_article']."€/j
            </td>
            <td>
              <div class='col-sm-12'>
                <button type='button' data-toggle='modal' href='#infos' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></button>
                  <div class='modal' id='infos'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'><span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span></button>
                          <h4 class='modal-title'>".$article['nom_article']."</h4>
                        </div>
                        <div class='modal-body'>";
                            include_once("calendrier.php");
                  echo "</div>
                      </div>
                    </div>
                  </div>
              </div>
            </td>
          </tr>";
        }?>
        </table>
      </div>

    </section>

  </div>

<?php
  require_once("footer.php");
?>
