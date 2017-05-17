
			<footer>

			</footer>
		</div>
    </div>
	<!-- jQuery  -->
	<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/components/jquery/jquery.min.js"></script>
	<!-- Bootstrap, doit être chargé après JQuery -->
	<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Permet l'affichage de la side barre avec menu -->
	<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/fancy-sidebar.js"></script>

	<?php if(isset($stop_enter)) { ?>
		<!-- Permet d'empécher la touche entré de valider le fomulaire, présence défini dans index.php -->
		<script type="text/javascript" src="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/enter_to_tab.js"></script>
	<?php }	?>



</body>
</html>
