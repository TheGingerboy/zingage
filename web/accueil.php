<?php
  require_once("header.php");
?>
<div id="accueil">

<div id="zingage-form">

<!-- 		<div id="zingage-scan" class="header">
		  <h2>Zingage</h2>
		  <input type="text" autofocus="autofocus" id="myInput" placeholder="Votre référence">
		  <span onclick="newElement()" class="addBtn">Ajout</span>
		  <span onclick="showElement()" class="addBtn">Montre-moi</span>
		</div>

		<ul id="myUL">

		</ul>	 -->	

	<section>

	<form action="#" method="post">
	  <div>
	    <label id="label-zing" for="newitem">Zingage</label>
			<div class="match-size">    
			    <input type="text" autofocus="autofocus" name="newitem" id="newitem" placeholder="Ajouter une référence" autocomplete="off" required="">
			    <input id="btn-zingage" type="submit" value="Ajouter">
			</div>
	  </div>

	</form>

	<ul id="todolist">
		<li>

		</li>
	</ul>

	</section>
  
	<script type="text/javascript" src="/zingage/web/js/todolist.js"></script>
  </div>
</div>
<?php
  require_once("footer.php");
?>

