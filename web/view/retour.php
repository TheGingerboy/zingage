<div class="btn">
	<a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article/ajout" ?>">Ajouter un article</a>
</div>

<div class="btn">
	<a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/article" ?>">Liste des articles</a>
</div>

<div class="btn">
	<a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/scan" ?>">Articles scannés</a>
</div>

<div id="body-scan">

	<div id="zingage-result">

			<form class="scan">

				<div id="retour-form">
					<label id="label-zing" for="newitem">Retour</label>
					<div class="match-size">    
						<input type="text" autofocus="autofocus" name="newitem" id="newitem" placeholder="En attente de scan..." autocomplete="off" required>
						<input id="btn-zingage" class="btn btn-primary" type="submit" value="Ajouter">
					</div>
				</div>
				
			</form>

			<form action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/retour/recap" ?>" method="post">

				<!-- Permet de contenir les valeurs du scan pour les envoyer au serveur -->
	      	    <input id="data" name="data" style="display: none;" type="hidden" class="hidden" required>				
				<input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
				<input id="btn-clear" class="btn btn-warning" type="reset" value="Remettre à 0" onclick="clearstate()">

			</form>

			<ul id="toPrintList">

			</ul>

		<script type="text/javascript" src="/zingage/web/js/toPrintList.js"></script>

	  </div>
</div>