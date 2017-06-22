<div id="accueil">

	<div class="menu">

		<?php 
		if (isset($_SESSION['identifiant'])) 
			{ echo '<h3 class="center padding-top-large">Bonjour ' . $_SESSION['identifiant'] . '</h3>' ;	}
		//Initialisation de la variable admin si la personne n'est pas connecté
		else 
			{ $_SESSION['admin'] = '0';	}
		?>

		<a class="menu-block blue" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/depart" ?>">
			<img class="img-responsive" src="/zingage/web/images/plane-blue-min.png" alt=""/>
			<span>Zingage Départ</span>
		</a>
		<a class="menu-block yellow" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour" ?>">
			<img class="img-responsive" src="/zingage/web/images/yellow-boat-min.png" alt=""/>
			<span>Zingage Retour</span>
		</a>

		<a class="menu-block orange" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/scan" ?>">
			<img class="img-responsive" src="/zingage/web/images/fox-min.png" alt=""/>
			<span>Historique</span>
		</a>

		<a class="menu-block red" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article" ?>">
			<img class="img-responsive" src="/zingage/web/images/fish-min.png" alt=""/>
			<span>Article</span>
		</a>

		<a class="menu-block green" href="
		<?php 
			if (isset($_SESSION['identifiant']))
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil";}
			else
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion";} 
		?>">
			<img class="img-responsive" src="/zingage/web/images/arbre-min.png" alt=""/>
			<span>
				<?php
					if (isset($_SESSION['identifiant']))
						echo "Profil";
					else
						echo "Connexion";
				?> 
			</span>
		</a>

		<?php 
		//L'utilisateur est admin
		if($_SESSION['admin'] == '1'){ ?>

			<a class="menu-block darkgreen" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration" ?>">
				<img class="img-responsive" src="/zingage/web/images/foret-min.png" alt=""/>
				<span>Administration</span>
			</a>

		<?php }
		//L'utilisateur n'est pas admin
		else { ?>
			<a class="menu-block disabgreen" href="#">
				<img class="img-responsive" src="/zingage/web/images/foret-min.png" alt=""/>
				<span>Administration</span>
			</a>

		<?php } ?>
	</div>

</div>