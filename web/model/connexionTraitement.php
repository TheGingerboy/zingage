<?php
	//Si session inactive, lancer la session
	if(!(isset($_SESSION)))
		session_start();

	//Renvoie vers la page de connexion : stockage des fichiers de dépendance
	$header = dirname(dirname(__FILE__)) . "\\view\\header.php";
	$accueil = dirname(dirname(__FILE__)) . "\\view\\zingage.php";
	$footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";


	//récupération des variables
	$identifiant = htmlspecialchars($_POST['identifiant']);
	$mdp = htmlspecialchars($_POST['mdp']);

 	$mdp = crypt($key, $mdp);

	if ($identifiant) {
	  $verifid = $pdo->query( "SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'" );

		//Verification de l'existence de l'utilisateur
		if ($verifid && $verifid->rowCount() > 0) {
			//Récupération du mot de passe
			$sql_passwd = $pdo->query("SELECT mdp_user FROM utilisateur WHERE identifiant_user='$identifiant'" );
			while ($row = $sql_passwd->fetch()){
				$verifpasswd  = $row['mdp_user'];
			}
			//Vérification du mot de passe
			if (hash_equals($mdp, $verifpasswd))
			{
				//Mise en session du compte
				$sql_admin = $pdo->query("SELECT role_user FROM utilisateur WHERE identifiant_user='$identifiant'" );
				while ($row = $sql_admin->fetch()){
					$verifpasswd  = $row['role_user'];
				}
				$_SESSION['role_user'] = intval($admin);
				$_SESSION['identifiant'] = $identifiant;
				header( "Location: /zingage/" );
				exit;
			}

			else
			{
			echo("Mot de passe incorrect, veuillez réessayer");
			require_once(dirname(dirname(__FILE__)) . "\\view\\header.php");
			require_once(dirname(dirname(__FILE__)) . "\\view\\connexion.php");
			require_once(dirname(dirname(__FILE__)) . "\\view\\footer.php");
			}
		}

	  else
	  {
	  	echo("Identifiant introuvable, veuillez réessayer");
		require_once(dirname(dirname(__FILE__)) . "\\view\\header.php");
		require_once(dirname(dirname(__FILE__)) . "\\view\\connexion.php");
		require_once(dirname(dirname(__FILE__)) . "\\view\\footer.php");
	  }
	}


?>