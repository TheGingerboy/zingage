<div id="accueil">
	<?php 
		if (isset($_SESSION['identifiant'])) 
			echo '<h3 class="center">Bonjour ' . $_SESSION['identifiant'] . '</h3>' 
	?>

	<div class="menu">
		<a class="menu-block blue" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/depart" ?>">
			<img class="img-responsive" src="/zingage/web/images/plane-blue-min.png" alt="Départ"/>
			Zingage Départ
		</a>
		<a class="menu-block yellow" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour" ?>">
			<img class="img-responsive" src="/zingage/web/images/yellow-boat-min.png" alt="Retour"/>
			Zingage Retour
		</a>

		<a class="menu-block green" href="
		<?php 
			if (isset($_SESSION['identifiant']))
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/profil";}
			else
				{echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/connexion";} 
		?>">
		<img class="img-responsive" src="/zingage/web/images/human-green-min.png" alt="Connexion"/>
			<?php
				if (isset($_SESSION['identifiant']))
					echo "Profil";
				else
					echo "Connexion";
			?> 
		</a>
		<a class="menu-block pink" href="#">
			A venir
		</a>
		<a class="menu-block purple" href="#">
			A venir
		</a>
		<a class="menu-block orange" href="#">
			A venir
		</a>
	</div>

</div>