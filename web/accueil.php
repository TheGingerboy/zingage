<?php
  require_once("header.php");
?>
<div id="accueil">

<div id="zingage-result">

		<form action="#" method="post">

			<div id="zingage-form">
				<label id="label-zing" for="newitem">Zingage</label>
				<div class="match-size">    
					<input type="text" autofocus="autofocus" name="newitem" id="newitem" placeholder="Ajouter une référence" autocomplete="off" required>
					<input id="btn-zingage" type="submit" value="Ajouter">
				</div>
			</div>
			
			<input id="btn-valide" type="submit" value="Imprimer">
			<input id="btn-clear" type="reset" value="Remettre à 0" onclick="clearstate()">
			<input id="btn-clear" type="reset" value="Montre moi le storage" onclick="showMeState()">

		</form>

		<ul id="todolist">

		</ul>

  
	<script type="text/javascript" src="/zingage/web/js/todolist.js"></script>
  </div>
</div>

<?php
  require_once("footer.php");
?>

