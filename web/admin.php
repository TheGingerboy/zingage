<?php
  require_once("header.php");
  if($_SESSION['admin']){
?>

  <div id="admin">

    <ul class="nav nav-pills">
      <li role="presentation" class="active"><a href="/zingage/adm/admin">Produits</a></li>
      <li role="presentation"><a href="/zingage/adm/adminUsr">Utilisateurs</a></li>
      <li role="presentation"><a href="/zingage/adm/adminCustom">Personnalisation</a></li>
      <li role="presentation"><a href="/zingage/adm/adminCommande">Commande</a></li>
    </ul>

    <section id="sectionAdmin">
      <div class="row">
        <h2 class="col-sm-6">Gestion des produits</h2>
		<?php
			// Message de succes ou d'erreur lors de la modif d'article
			// if($_GET['update']=="ok"){
			// 	echo '<div class="alert alert-success col-lg-10" role="alert" style="width:100%;text-align:center;">
			// 		Votre modification a bien été enregistrée.
			// 	</div>';
			// }
			// else{
			// 	echo '<div class="alert alert-success col-lg-10" role="alert" style="width:100%;text-align:center;">
			// 		Veuillez remplir tous les champs !
			// 	</div>';
			// }
		?>
        <div class="col-sm-6">
          <!-- Fenêtre modale pour ajouter un article -->
          <button type='button' data-toggle='modal' href='#infos' class='btn btn-default btn-lg'>Ajouter un article <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></button>
            <div class='modal' id='infos'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'><span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span></button>
                    <h4 class='modal-title'>Ajouter un article</h4>
                  </div>
                  <div class='modal-body'>
                  <form action='/zingage/adm/addProduit' method='post' class='form-horizontal'>
                    <div class='form-group'>
                      <label for='nom' class='col-sm-3 control-label'>Nom : </label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='nom' name="nom" required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='desc' class='col-sm-3 control-label'>Description : </label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='desc' name='desc' required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='prix' class='col-sm-3 control-label'>Prix : </label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='prix' name='prix' required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='categ' class='col-sm-3 control-label'>Catégorie : </label>
                      <div class='col-sm-2'>
                        <select required name="categ">
                          <option></option>
                          <option value='detente'>Détente</option>
                          <option value='entretien'>Entretien</option>
                        </select>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='dimension' class='col-sm-3 control-label'>Dimension (cm) : </label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='dimension' placeholder='50x50' name="dimension" required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='poids' class='col-sm-3 control-label'>Poids (kg) : </label>
                      <div class='col-sm-9'>
                        <input type='text' class='form-control' id='poids' placeholder='15' name="poids" required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='mis_avant' class='col-sm-3 control-label'>Article mis en avant : </label>
                      <div class='col-sm-3'>
                        <input type='radio' name='mis_avant' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                        <input type='radio' name='mis_avant' value='non' id='non' checked/><label for='non'>Non</label>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='saison' class='col-sm-3 control-label'>Produit de saison : </label>
                      <div class='col-sm-3'>
                        <input type='radio' name='saison' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                        <input type='radio' name='saison' value='non' id='non' checked/><label for='non'>Non</label>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='innov' class='col-sm-3 control-label'>Produit d'innovation : </label>
                      <div class='col-sm-3'>
                        <input type='radio' name='innov' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                        <input type='radio' name='innov' value='non' id='non' checked/><label for='non'>Non</label>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='image' class='col-sm-3 control-label'>Image :</label>
                      <div class='col-sm-9'>
                        <input type='file' id='img' required>
                        <p class='help-block'>Grande image carrée.</p>
                      </div>
                    </div>
                    <button type='submit' class='btn btn-success'>Valider</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <td>Aperçu</td>
            <td>Nom - Description</td>
            <td>Catégorie</td>
            <td>Mis en avant (2max)</td>
            <td>Modifier</td>
            <td>Supprimer</td>
          </tr>
          <?php
          $articles = get_all_articles();
          foreach ($articles as $article){
            $categ = ucfirst(get_categ_par_article($article['id_article']));
            $avant = $article['en_avant_article'];
            if ($avant == 1)
              $st = 'Oui';
            else $st = 'Non';?>
            <tr>
              <td>
                <a href='/zingage/ficheProduit/id=<?php echo $article['id_article']?>'><img src='/zingage/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/></a>
              </td>
              <td>
                <a href='/zingage/ficheProduit/<?php echo $article['id_article']?>'><?php echo $article['nom_article']?></a></br>
                <p>
                  <?php echo $article['description_article']?>
                </p>
              </td>
              <td>
                <?php echo $categ?>
              </td>
              <td>
                <?php echo $st?>
              </td>
              <td>
                <!-- Fenêtre modale pour formulaire de modif d'article -->
                <!-- Récupérer les informations de l'article à mettre dans les input etc -->
                <button type='button' id='<?php echo $article["id_article"]; ?>' nom='<?php echo $article["nom_article"]; ?>' desc='<?php echo $article["description_article"]; ?>' prix='<?php echo $article["prix_article"]; ?>' dim='<?php echo $article["dimension_article"]; ?>' poids='<?php echo $article["poids_article"]; ?>' categorie='<?php echo $categ ?>'  data-toggle='modal' href='#updateArticle' class='btn btn-default btn-lg btn-updateArt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
                  <div class='modal' id='updateArticle'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'><span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span></button>
                          <h4 class='modal-title'>Modifier l'article</h4>
                        </div>
                        <div class='modal-body'>
                        <form action='/zingage/adm/admin/modifierArticle/id=<?php echo $article['id_article'] ?>' method='post' class='form-horizontal'>
							            <input type='hidden' id='id' name='id' >
                          <div class='form-group'>
                            <label for='nom' class='col-sm-3 control-label'>Nom : </label>
                            <div class='col-sm-9'>
                              <input type='text' class='form-control' name='nom' id='nom' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='desc' class='col-sm-3 control-label'>Description : </label>
                            <div class='col-sm-9'>
                              <input type='text' class='form-control' id='desc' name='desc' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='prix' class='col-sm-3 control-label'>Prix : </label>
                            <div class='col-sm-9'>
                              <input type='text' class='form-control' id='prix' name='prix' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='categorie' class='col-sm-3 control-label'>Catégorie : </label>
                            <div class='col-sm-2'>
                              <select required name='categorie'>
                                <option></option>
                                <option value='detente'>Détente</option>
                                <option value='entretien'>Entretien</option>
                              </select>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='dimension' class='col-sm-3 control-label'>Dimension (cm) : </label>
                            <div class='col-sm-9'>
                              <input type='text' class='form-control' id='dimension' name='dimension' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='poids' class='col-sm-3 control-label'>Poids (kg) : </label>
                            <div class='col-sm-9'>
                              <input type='text' class='form-control' id='poids' name='poids' required>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='mis_avant' class='col-sm-3 control-label'>Article mis en avant : </label>
                            <div class='col-sm-3'>
                              <input type='radio' name='mis_avant' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                              <input type='radio' name='mis_avant' value='non' id='non' checked/><label for='non'>Non</label>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='ville' class='col-sm-3 control-label'>Produit de saison : </label>
                            <div class='col-sm-3'>
                              <input type='radio' name='saison' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                              <input type='radio' name='saison' value='non' id='non' checked/><label for='non'>Non</label>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='ville' class='col-sm-3 control-label'>Produit d'innovation : </label>
                            <div class='col-sm-3'>
                              <input type='radio' name='innov' value='oui' id='oui'/><label for='oui' style='margin-right:10px'>Oui</label>
                              <input type='radio' name='innov' value='non' id='non' checked/><label for='non'>Non</label>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='image' class='col-sm-3 control-label'>Image :</label>
                            <div class='col-sm-9'>
                              <input type='file' id='img' name='img' required>
                              <p class='help-block'>Grande image carrée.</p>
                            </div>
                          </div>
                          <button type='submit' class='btn btn-success'>Valider</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>
              <td>
                <!-- fait le traitement pour supprimer l'article -->
                <form action='/zingage/adm/suppadminProduit/id=<?php echo $article['id_article'] ?>' method="delete">
                    <button type='submit' class='btn btn-default btn-lg'>
                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                </form>
              </td>
            </tr>
           <?php }?>
        </table>
      </div>
      </section>

  </div>

<?php
}
require_once("footer.php");
?>
