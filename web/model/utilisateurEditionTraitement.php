<?php
	if ($_SESSION['admin'] == '1') {
	//Récupération des valeurs
	$id_user = 			htmlspecialchars($_POST['id_user']);
	$identifiant_user = htmlspecialchars($_POST['identifiant_user']);
	$nom_user =			htmlspecialchars($_POST['nom_user']);
	$prenom_user = 		htmlspecialchars($_POST['prenom_user']);
	$role_user = 		htmlspecialchars($_POST['role_user']);

	if (isset($_POST['reset_user']))
		$reset_user = 		htmlspecialchars($_POST['reset_user']);	

    $sql_verif_if_user = "SELECT * FROM utilisateur WHERE id_user = ? ";
    $verif_if_user = $pdo->prepare($sql_verif_if_user);
    $verif_if_user->execute([$id_user]);
    $nb_row_user = $verif_if_user->fetch();

    $sql = $pdo->query("SELECT * FROM utilisateur WHERE id_user='$id_user'");

    if( !$nb_row_user )
    {
      echo '<h3 class="center">Une erreur s\'est produite, si l\'erreur persiste,
      veuillez contacter votre administrateur réseau</h3>';
    }
    else{
		while ($row = $sql->fetch())
		{
	        $identifiant_user_current  	= htmlspecialchars_decode($row['identifiant_user']);
	        $nom_user_current  			= htmlspecialchars_decode($row['nom_user']);
	        $prenom_user_current   		= htmlspecialchars_decode($row['prenom_user']);
	        $role_user_current 			= htmlspecialchars_decode($row['role_user']);
		}
    	if ((!empty($identifiant_user)) && ($identifiant_user != $identifiant_user_current)) {
				$sql ="UPDATE utilisateur SET identifiant_user = ? WHERE id_user = ?";
				$pdo->prepare($sql)->execute([$identifiant_user, $id_user]);
				echo '<h3 class="center">L\'identifiant de l\'utilisateur à été modifié</h3>';
			}
    	if ((!empty($nom_user)) && ($nom_user != $nom_user_current)) {
				$sql ="UPDATE utilisateur SET nom_user = ? WHERE id_user = ?";
				$pdo->prepare($sql)->execute([$nom_user, $id_user]);
				echo '<h3 class="center">Le nom de l\'utilisateur été modifié</h3>';
			}
    	if ((!empty($prenom_user)) && ($prenom_user != $prenom_user_current)) {
				$sql ="UPDATE utilisateur SET prenom_user = ? WHERE id_user = ?";
				$pdo->prepare($sql)->execute([$prenom_user, $id_user]);
				echo '<h3 class="center">Le prénom de l\'utilisateur à été modifié</h3>';
			}
    	if (($role_user != $role_user_current)) {
				$sql ="UPDATE utilisateur SET role_user = ? WHERE id_user = ?";
				$pdo->prepare($sql)->execute([$role_user, $id_user]);
				echo '<h3 class="center">Le rôle de l\'utilisateur à été modifié</h3>';
			}
    	if (isset($reset_user)) {
				$sql ="UPDATE utilisateur SET mdp_user = ? WHERE id_user = ?";
		      	$mdp = crypt('0000', $key);
				$pdo->prepare($sql)->execute([$mdp, $id_user]);
				echo '<h3 class="center">Le mot de passe de l\'utilisateur à été réintialisé</h3>';
			}
		}
	}
?>