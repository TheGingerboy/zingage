<?php
  require_once("header.php");
  require("connexionBD.php");
?>

  <div id="panier">

<?php 

if (isset($_SESSION['nb_produit'])) {

  if (max($_SESSION['nb_produit'])) {

  $t = max($_SESSION['nb_produit']) + 1;

     ?>
      <section>
        <h2>Panier</h2>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <td>Aperçu</td>
              <td>Nom</td>
              <td>Jour(s)</td>
              <td>Prix/Jours</td>
              <td>Prix total</td>
              <td>Supprimer</td>
            </tr>

          <?php 
            for ($g=1; $g < $t  ; $g++) {

              $nb_produit = $_SESSION['nb_produit']["$g"];

                if ($_SESSION['nb_produit']["$g"] != 0){


                  $id_produit = $_SESSION['id_produit']["$g"];
                  $date_pris = $_SESSION['date_pris']["$g"];
                  $date_retour = $_SESSION['date_retour']["$g"]; 
                  
                  $sql = mysql_query("SELECT * FROM gt_article WHERE id_article='$id_produit'") or die(mysql_error());;

                  while ($row = mysql_fetch_assoc($sql)) {
                      $nom_article = $row['nom_article'];
                      $prix_article = $row['prix_article'];
                      $img_article = $row['img_article'];
                  }

                  ?>
                  <tr>
                    <td>
                      <img src="web/images/article/<?php echo $img_article ?>" alt="<?php echo $nom_article ?>"/>
                    </td>
                    <td>
                      <?php echo $nom_article ?></br>
                    </td>
                    <td>
                    <?php
                      //Définition des date au format jour-mois-année
                      $date1 = $_SESSION['date_pris']["$g"];
                      $date2 = $_SESSION['date_retour']["$g"];
                        
                      //Extraction des données
                      list($jour1, $mois1, $annee1) = explode('/', $date1);
                      list($jour2, $mois2, $annee2) = explode('/', $date2);
                       
                      //Calcul des timestamp
                      $timestamp1 = mktime(0,0,0,$mois1,$jour1,$annee1);
                      $timestamp2 = mktime(0,0,0,$mois2,$jour2,$annee2);
                      $nbJours = abs($timestamp2 - $timestamp1)/86400 + 1; //On utilise abs afin d'obtenir toujours une valeur positive, donc les dates peuvent être mises dans n'importe quel ordre.
                      echo "<h4>Nombre de jours : ".$nbJours."<br></h4>";//Affichage du nombre de jour : 27
                      ?>
                      <?php echo "jour de prise : $date_pris <br> jour de retour : $date_retour <br>";  ?>

                    </td>
                    <td>
                      <?php echo $prix_article."€/j" ?>
                    </td>
                    <td>
                      <?php  
                      $prix_total = ($prix_article*$nbJours);
                      $prix_total_commande["$g"] = $prix_total;
                      echo $prix_total."€/j"?>

                    </td>
                    <td>
                      <!-- supprimerPanier.php : fait le traitement pour supprimer l'article du panier -->
                      <form action="panierSupprimer" method="post">
                          <input type="text" name="numero_produit"  value="<?php echo $g ?>" hidden/>
                          <button type="submit" class="btn btn-default btn-lg">
                      </form>

                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </td>
                  </tr>

          <?php }
          }
  }
      else {
        echo "<p style='padding-top:50px' style='padding-bottom:50px'>Vous n'avez pas d'article dans votre panier<br>Vous devez être connecter pour pouvoir passer commande.<br></p>";
      }
}

else {
  echo "<p style='padding-top:50px' style='padding-bottom:50px'>Vous n'avez pas d'article dans votre panier<br>Vous devez être connecter pour pouvoir passer commande.<br></p>";
}


        ?>

        </table>
      </div>
      </section>

      <section>

        <?php

          if (isset($prix_total_commande)) {
            if($_SESSION['nb_produit'] != 0) { 
              echo "<p>Total :";
              if(array_sum($prix_total_commande))
                {echo array_sum($prix_total_commande)."€</p>";}
              else{echo "0€</p>";}
        }
          else {echo "0€</p>";}


        ?>

          <button type="button" class="btn btn-default btn-lg" style="margin-left: 45%" onclick="location.href='#';">
          Je valide ma commande <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
        <?php }
        else { ?>
          <button type="button" class="btn btn-default btn-lg" style="margin-left: 45%" onclick="location.href='/zingage/connexion';">
          Connectez-vous <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
          <?php } ?>


        </button>
      </section>

  </div>

<?php
  require_once("footer.php");
?>
