<?php if(isset($_SESSION['identifiant'])) {

  $cur_month = date("m") ;
  $cur_year = date("Y") ;

  ?>
	<div id="accueilHistorique">

			<div class="menu">

				<?php 
				if (isset($_SESSION['identifiant'])) 
					echo '<h3 class="center padding-top-large">Historique</h3>'
				?>

				<a class="menu-block orange" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/control" ?>">
					<img class="img-responsive"/>
					<span>Tableau de bord</span>
				</a>
				<a class="menu-block yellow" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/details" ?>">
					<img class="img-responsive"/>
					<span>Tous les envois</span>
				</a>

				<a class="menu-block red" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/details/" . $cur_year ."/" . $cur_month ?>">
					<img class="img-responsive"/>
					<span>Calendrier</span>
				</a>

			</div>

	</div>

<?php 	

}

//Si utilisateur non connecté
else { echo "<h2> Vous devez être connecté pour effectuer cette action <h2>"; }