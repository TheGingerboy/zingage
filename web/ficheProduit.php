<?php
  require_once("header.php");
  require_once("adminMenu.php");
?>
  <div id="fiche_produit">

    <section class="row">
      <div class="col-xs-12 col-sm-offset-1 col-sm-5">
            <img src="/zingage/web/images/article/<?php echo $produit['img_article']?>" alt="<?php echo $produit['nom_article']?>"/>
      </div>
      <div class="col-sm-5">
        <h2><?php echo $produit['nom_article']?></h2>
        <p class="texte_produit">
          <?php echo $produit['description_article']?>
          </br></br>
          <span>Dimension : <?php echo $produit['dimension_article']?></span></br></br>
          <span>Poids : <?php echo $produit['poids_article']?>kg</span>
        </p>
        <div class="row">
          <p class="col-sm-5">
              <?php 
                $com = get_nb_comment(intval($produit['id_article']));
                echo $com;
              ?> commentaire(s)
          </p>
          <p class="col-sm-5">
            Disponible maintenant
          </p>
          <p class="col-sm-2">
            <?php echo $produit['prix_article']?>€/j
          </p>
        </div>
        <div class="col-sm-12">
          <?php //affiche le bouton ou non si l'utilisateur n'est pas connecté
        if($_SESSION['identifiant']) { ?>
        <button type="button" data-toggle="modal" href="#infos" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ajouter au panier</button> <?php }
        else  { ?> 
        <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" disabled></span> Vous devez être connecté</button>
          <?php } ?>
            <div class="modal" id="infos">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title"><?php echo $produit['nom_article'] ?></h4>
                  </div>
                  <div class="modal-body">
                    <?php
                      include_once("calendrier.php");
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section id="comm">
      <p>
        <span>Commentaire(s) :</span></br>
      </p>

        <div>
          <p>
              <?php if ($com == 0) echo " Il n'y a pas encore de commentaire, donnez votre avis ! ";
                    else {
                        $comments = get_all_comment_article(intval($produit['id_article']));
                        foreach ($comments as $comment){
                            echo "<span>".$comment['identifiant_user']." : </span></br>"
                            .$comment['text_comment']."</br>";
                        }
                    }
              
              ?>
          </p>
        </div>


        <div>
          <?php 
          // if(connecté)
          if ($_SESSION['identifiant'])
          { ?>

              <form action="/zingage/addcom/<?php echo intval($produit['id_article'])?>" method="post">
                <div class="form-group">
                  <label for="commentaire">Ajoutez ici votre commentaire : </label>
                  <textarea class="form-control" name="commentaire" id="commentaire" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
              </form>
            </div>

          <?php }  
          // if(non connecté)
          else {echo "Vous devez être connecté pour poster un commentaire";} ?>

    </section>

  </div>


<?php
  require_once("footer.php");
?>
