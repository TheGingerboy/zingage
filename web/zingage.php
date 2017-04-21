<?php
  require_once("header.php");
?>

<a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/zingageAjout" ?>">Ajouter un article</a>

<div id="accueil">

	<div id="zingage-result">

			<form class="scan">

				<div id="zingage-form">
					<label id="label-zing" for="newitem">Zingage</label>
					<div class="match-size">    
						<input type="text" autofocus="autofocus" name="newitem" id="newitem" placeholder="En attente de scan..." autocomplete="off" required>
						<input id="btn-zingage" class="btn btn-primary" type="submit" value="Ajouter">
					</div>
				</div>
				
			</form>

			<form action="zingageRecap" method="post">

				<!-- Permet de contenir les valeurs du scan pour les envoyer au serveur -->
	      	    <input id="data" name="data" style="display: none;" required>				

				<input id="btn-valide" class="btn btn-success" type="submit" value="Envoyer">
				<input id="btn-clear" class="btn btn-warning" type="reset" value="Remettre à 0" onclick="clearstate()">

			</form>

			<ul id="toPrintList">

			</ul>

		<script type="text/javascript" src="/zingage/web/js/toPrintList.js"></script>

	  </div>
</div>

<?php
	require_once("footer.php");
?>

<div id="printThis">
	<div>
	      <img id="logo" class="img-responsive" src="/zingage/web/images/logo.png" alt="AEML"/>
	      <h3> Honda France Manufacturing </h3>
	</div>
	<h2>183338-ZT5-0100</h2>
	<div>
		<h3>Qté : 80</h3>
		<h3>OF : 232287</h3>
	</div>
	<h4>mercredi 19 avril 2017<h4>
</div>

<button id="btnPrint">Print</button>

<script type="text/javascript" src="/zingage/web/js/print.js"></script>


