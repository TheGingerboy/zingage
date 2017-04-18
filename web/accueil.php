<?php
  require_once("header.php");
?>
<div id="accueil">

<div id="zingage-result">

		<form class="scan">

			<div id="zingage-form">
				<label id="label-zing" for="newitem">Zingage</label>
				<div class="match-size">    
					<input type="text" autofocus="autofocus" name="newitem" id="newitem" placeholder="En attente de scan..." autocomplete="off" required>
					<input id="btn-zingage" type="submit" value="Ajouter">
				</div>
			</div>
			
		</form>

		<form action="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/web/" ?>impressionZingage.php" method="post">
			
      	    <input id="data" name="data" required>				

			<input id="btn-valide" type="submit" value="Envoyer">
			<input id="btn-clear" type="reset" value="Remettre à 0" onclick="clearstate()">
			<input id="btn-show" type="button" value="Montre moi le storage" onclick="showMeState()">

		</form>

		<ul id="todolist">

		</ul>

	<script type="text/javascript" src="/zingage/web/js/todolist.js"></script>

  </div>
</div>

<?php
  require_once("footer.php");
?>

