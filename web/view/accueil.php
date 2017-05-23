<div id="accueil">
	<?php 
		if (isset($_SESSION['identifiant'])) 
			echo '<h3 class="center">Bonjour ' . $_SESSION['identifiant'] . '</h3>' 
	?>

	<div class="menu">
		<a class="menu-block blue" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/depart" ?>">
			<img class="img-responsive" src="/zingage/web/images/plane-blue-min.png" alt=""/>
			Zingage Départ
		</a>
		<a class="menu-block yellow" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour" ?>">
			<img class="img-responsive" src="/zingage/web/images/yellow-boat-min.png" alt=""/>
			Zingage Retour
		</a>

		<a class="menu-block orange" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/scan" ?>">
			<img src="/zingage/web/images/fox.png" alt=""/>
			Historique
		</a>

		<a class="menu-block red" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article" ?>">
			<img src="/zingage/web/images/fish-min.png" alt=""/>
			Article
		</a>

		<a class="menu-block green" href="
		<?php 
			if (isset($_SESSION['identifiant']))
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil";}
			else
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion";} 
		?>">
		<img class="img-responsive" src="/zingage/web/images/arbre-min.png" alt=""/>
			<?php
				if (isset($_SESSION['identifiant']))
					echo "Profil";
				else
					echo "Connexion";
			?> 
		</a>
		<a class="menu-block darkgreen" href="#">
			<img class="img-responsive" src="/zingage/web/images/foret-min.png" alt=""/>
			A venir
		</a>
	</div>

</div>