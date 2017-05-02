<?php
    require_once("header.php");
    if($_SESSION['admin']){


?>

<div id="admin">
    <ul class="nav nav-pills">
        <li role="presentation"><a href="/zingage/adm/admin">Produits</a></li>
        <li role="presentation"><a href="/zingage/adm/adminUsr">Utilisateurs</a></li>
        <li role="presentation"><a href="/zingage/adm/adminCustom">Personnalisation</a></li>
        <li role="presentation" class="active"><a href="/zingage/adm/adminCommande">Commande</a></li>
    </ul>
    <section id="commande">
            <h2>Historique des commandes</h2>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Identifiant</td>
                        <td>Date</td>
                        <td>Montant(HT)</td>
                        <td>Informations</td>
                    </tr>
                    <?php $commandes =  get_all_commandes();
                        foreach ($commandes as $commande){
                            $articles=get_articles_from_commande(intval($commande['id_commande']));
                            $total = 0;
                            foreach($articles as $article){
                                $nb = get_article_nb_jours(intval($article['id_article']));
                                $total+=$article['prix_article']*$nb;
                            }?>
                    <tr>
                        <td>
                            <?php echo $commande['nom_user']?>
                        </td>
                        <td>
                            <?php echo $commande['prenom_user']?>
                        </td>
                        <td>
                            <?php echo $commande['identifiant_user']?>
                        </td>
                        <td>
                            <?php echo $commande['date_commande']?>
                        </td>
                        <td>
                           <?php echo $total?>€
                        </td>
                        <td>
                            <!-- Fenêtre modale pour les informations de facture -->
                            <button type="button" data-toggle="modal" href="#infos" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <div class="modal" id="infos">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            <button type="button" class="btn btn-default btn-lg" onclick="javascript:window.print()"/>Imprimer 
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <section class="row">
                                                <div class=" col-sm-offset-2 col-sm-5">
                                                    <h3>Société zingage</h3>
                                                    <p>36 rue des près</br>
                                                        45100 Orléans </br>
                                                        France
                                                    </p>
                                                    <h3>Client</h3>
                                                    <p>
                                                        <?php echo $commande['prenom_user']?></br>
                                                        <?php echo $commande['nom_user']?></br>
                                                        <?php echo $commande['rue_user']?></br>
                                                        <?php echo $commande['ville_user']?></br>
                                                        <?php echo $commande['cp_user']?>
                                                    </p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h3>Facture n°<?php echo $commande['id_commande']?></h3>
                                                    <p>
                                                        Date de facture : <span class="date"><?php echo $commande['date_commande']?></span></br>
                                                        Référence de la facture : <span class="ref">XXXXXXX</span></br>
                                                        Identifiant du client : <span class="id"><?php echo $commande['id_user']?></span></br>
                                                        <?php if ($commande['date_rendu_prevu_commande']!=null){
                                                                    echo " Paiement du : <span class='paie'>".$commande['date_rendu_prevu_commande']."</span></br>";
                                                                }?>
                                                        Emis par : <span class="emis">Société zingage</span></br>
                                                        Contact client :
                                                        <span class="contact1">zingage</br></span>
                                                        <span class="contact"><?php echo $mailSite ?></br></span>
                                                        <span class="contact"><?php echo $telSite ?></span>
                                                    </p>
                                                </div>
                                            </section>
                                            <div class="table-responsive">
                                                    <table class="table table-bordered">      
                                                        <tr>
                                                            <td>Nom</td>
                                                            <td>Jour(s)</td>
                                                            <td>Prix unitaire HT / j</td>
                                                            <td>Prix total</td>
                                                        </tr>
                                                        <?php 
                                                        foreach($articles as $article){
                                                            $nb = get_article_nb_jours(intval($article['id_article']));
                                                            echo 
                                                            "<tr>
                                                                <td>".$article['nom_article']."</td>
                                                                <td>$nb</td>
                                                                <td>".$article['prix_article']."€</td>
                                                                <td>".$article['prix_article']*$nb."€</td>
                                                            </tr>";}?>
                                                    </table>
                                            </div>
                                            <section>
                                                Total HT : <?php echo $total ?>€ </br>
                                                TVA : <?php echo $tvaSite ?>% </br>
                                                <div class="border"></div>
                                                Total TTC : <?php echo $total+($total*$tvaSite/100) ?>€
                                            </section>
                                            <div class="clear"></div>
                                            <section class="row">
                                                <div class="col-sm-4">
                                                    <h4>zingage</h4>
                                                    <p>
                                                    36 rue des près</br>
                                                    45100 Orléans </br>
                                                    France</br>
                                                    N° de Siren : XXXXXXXX </br>
                                                    N° TVA Intra : FRXX 999999
                                                    </p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4>Contact</h4>
                                                    <p>
                                                    <?php echo $mailSite ?></br>
                                                    <?php echo $telSite ?>
                                                    </p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4>Références bancaires</h4>
                                                    <p>
                                                    Banque : Caisse d'épargne</br>
                                                    IBAN : FRXX XXXX XXXX XXXX XXXX XXXX XXXX</br>
                                                    A l'ordre de : zingage
                                                    </p>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
</div>
<?php
    }
    require_once("footer.php");
?>
