<?php
  require_once("header.php");
?>

  <div id="accueil">

    <section>
      <div class="row margin">
        <div class="col-sm-1"></div>
<!-- SELECT le dernier article mis dans la base -->
        <section class="col-sm-2 section">
          <h2>Nouveauté</h2>
            <?php $article = get_id_new_article(); ?>
                <a href='/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>'>
                    <div class='blanc'>
                        <img src='/GreenTeuf/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/>
                        <p><?php echo $article['nom_article']?> : <?php echo $article['prix_article']?>€/j</p>
                    </div>
                </a>
        </section>

        <div class="col-sm-1"></div>
        <section class="col-sm-4 section saison">
          <h2>Produits de saison</h2>
          <div class="row">
            <div class="col-sm-1"></div>
              <?php
                $deSaison = get_de_saison();
                foreach ($deSaison as $article){?>
                    <a href='/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>'>
                        <div class='col-sm-5 blanc border'>
                            <img src='/GreenTeuf/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/>
                            <p><?php echo $article['nom_article']?> : <?php echo $article['prix_article']?>€/j</p>
                        </div>
                    </a>
                <?php }?>
            <div class="col-sm-1"></div>
          </div>
        </section>

        <div class="col-sm-1"></div>

        <section class="col-sm-2 section">
          <h2>Innovation</h2>
            <a href='/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>'>
              <div class="blanc">
                  <?php $article = get_innovation();?>
                    <img src='/GreenTeuf/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/>
                    <p><?php echo $article['nom_article']?></p>
              </div>
            </a>
        </section>

        <div class="col-sm-1"></div>
      </div>

      <section class="section jardin margin">
          <a href='/GreenTeuf/entretien'><h2>Entretien jardin</h2></a>
        <div class="row">
          <div class="col-sm-1"></div>
          <?php $artEntretien = get_five_entretien();
                foreach ($artEntretien as $article){?>
                    <a href='/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>'>
                        <div class='col-sm-2 blanc border'>
                            <img src='/GreenTeuf/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/>
                            <p><?php echo $article['nom_article']?> : <?php echo $article['prix_article']?>€/j</p>
                        </div>
                    </a>
                <?php }?>
          <div class="col-sm-1"></div>
        </div>
      </section>

      <section class="section loisirs margin">
          <a href='/GreenTeuf/detente'><h2>Détente et loisirs</h2></a>
        <div class="row">
          <div class="col-sm-1"></div>
            <?php $artDetente = get_five_detente();
                foreach ($artDetente as $article){?>
                    <a href='/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>'>
                        <div class='col-sm-2 blanc border'>
                            <img src='/GreenTeuf/web/images/article/<?php echo $article['img_article']?>' alt='<?php echo $article['nom_article']?>'/>
                            <p><?php echo $article['nom_article']?> : <?php echo $article['prix_article']?>€/j</p>
                        </div>
                    </a>
                <?php }?>
          <div class="col-sm-1"></div>
        </div>
      </section>
    </section>

  </div>

<?php
  require_once("footer.php");
?>
