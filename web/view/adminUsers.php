<?php
  require_once("header.php");
  if($_SESSION['admin']){
?>

  <div id="admin">

    <ul class="nav nav-pills">
      <li role="presentation"><a href="/zingage/adm/admin">Produits</a></li>
      <li role="presentation" class="active"><a href="/zingage/adm/adminUsr">Utilisateurs</a></li>
      <li role="presentation"><a href="/zingage/adm/adminCustom">Personnalisation</a></li>
      <li role="presentation"><a href="/zingage/adm/adminCommande">Commande</a></li>
    </ul>


    <section id="user">
      <h2>Gestion des utilisateurs</h2>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Identifiant</td>
            <td>Mail</td>
            <td>Complément d'adresse</td>
            <td>Code postal</td>
            <td>Ville</td>
            <td>Téléphone</td>
            <td>Supprimer</td>
          </tr>
          <?php
          $users = get_all_users();
          // var_dump($users);
          foreach ($users as $user){ ?>
            <tr>
                <td>
                    <?php echo $user['nom_user'] ?>
                </td>
                <td>
                    <?php echo $user['prenom_user'] ?>
                </td>
                <td>
                    <?php echo $user['identifiant_user'] ?>
                </td>
                <td>
                    <?php echo $user["mail_user"]; ?>
                </td>
                <td>
                    <?php echo $user["complement_user"]; ?>
                </td>
                <td>
                    <?php echo $user["cp_user"]; ?>
                </td>
                <td>
                    <?php echo $user["ville_user"]; ?>
                </td>
                <td>
                    <?php echo $user["tel_user"]; ?>
                </td>
                <td>
                <form action='/zingage/adm/suppadminUsr/id=<?php echo $user['id_user'] ?>' method="delete">
                    <button type='submit' class='btn btn-default btn-lg'>
                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                </form>
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
