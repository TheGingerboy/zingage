<?php
  require_once("header.php");
  require_once("adminMenu.php");
?>

  <div id="produits">

    <section>

      <div class="row margin">
        <div class="col-sm-1"></div>

        <div class="col-sm-4">

          <section class="section col-sm-12">
            <h2>Nouveautés</h2>
              <?php $new1 = get_id_new_article();?>
            <a href="/GreenTeuf/ficheProduit/<?php echo $new1['id_article'] ?>">
              <div class="blanc">
                <img src="/GreenTeuf/web/images/article/<?php echo $new1['img_article'] ?>" alt="<?php echo $new1['nom_article']?>">
                <p><?php echo $new1['nom_article']?> : <?php echo $new1['prix_article']?>€/j</p>
              </div>
            </a>
          </section>
            
          <section class="section col-sm-12">
              <?php $id = intval($new1['id_article'])-1;
                $new2 = get_article_by_id($id);?>
            <a href="/GreenTeuf/ficheProduit/<?php echo $new2['id_article'] ?>">
              <div class="blanc">
                <img src="/GreenTeuf/web/images/article/<?php echo $new2['img_article'] ?>" alt="<?php echo $new2['nom_article']?>">
                <p><?php echo $new2['nom_article']?> : <?php echo $new2['prix_article']?>€/j</p>
              </div>
            </a>
          </section>

        </div>

        <div class="col-sm-1"></div>

        <section class="section innovation col-sm-5">
          <h2>Notre dernière innovation</h2>
          <div class ="blanc">
            <?php
                $article = get_innovation();?>
                <a href="/GreenTeuf/ficheProduit/<?php echo $article['id_article'] ?>">
                    <img src="/GreenTeuf/web/images/article/<?php echo $article['img_article'] ?>" alt="<?php echo $article['nom_article'] ?>"/>
                    <p><?php echo $article['nom_article']?> : <?php echo $article['prix_article']?>€/j</p>
                </a>
          </div>
          <p>
            Nos prototypes sont des avancées technologiques que nous proposons gratuitement. Fruit d'un long travail de recherche par l'initiateur de ce nouveau matériel développé par nos soins. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur.
          </p>
        </section>

        <div class="col-sm-1"></div>

      </div>

      <div class="row categories">

        <div class="col-sm-1"></div>

        <section class="col-sm-5">
          <a href="/GreenTeuf/entretien">
            <h2>Entretien jardin</h2>
            <img src="/GreenTeuf/web/images/entretienJardin.jpg" alt="illustration entretien jardin">
          </a>
        </section>

        <section class="col-sm-5">
          <a href="/GreenTeuf/detente">
            <h2>Détente et loisirs</h2>
            <img src="/GreenTeuf/web/images/detenteJardin.jpg" alt="illustration detente et loisirs">
          </a>
        </section>

        <div class="col-sm-1"></div>

      </div>

    </section>


  </div>

<?php
  require_once("footer.php");
?>
