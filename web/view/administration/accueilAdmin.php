<?php 
if(isset($_SESSION['admin'])) {

	if($_SESSION['admin'] == '1'){ ?>

	<div id="accueilAdmin">

		<div class="menu">

			<?php 
			if (isset($_SESSION['identifiant'])) 
				echo '<h3 class="center padding-top-large">Administration et Gestion</h3>'
			?>

			<a class="menu-block purple" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs" ?>">
				<img class="img-responsive" src="" alt=""/>
				<span>Utilisateurs</span>
			</a>
			<a class="menu-block cyan" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs" ?>">
				<img class="img-responsive" src="" alt=""/>
				<span>Zingeurs</span>
			</a>

			<a class="menu-block darkblue" href="#">
				<img class="img-responsive" src="" alt=""/>
				<span>Clients</span>
			</a>

		</div>

	</div>

	<?php 	}	}
	
	else { echo "<h2> Vous devez être connecté et Administrateur pour effectuer cette action <h2>";	}



