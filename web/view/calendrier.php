<!-- ajoutPanier.php : fait le tdraitement pour ajouter l'article au panier -->
<!-- onclick déclenche le script -->

<form action="panierAjout" method="post">
	<div class="float">
		<div class="form-group">
			<label for="date_pris">Date de location : </label>
			<input type="text" class="form-control" id="date_pris" name="date_pris" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="JJ/MM/AAAA" required onclick="ds_sh(this);" />
		</div>
		<div class="form-group">
			<label for="date_retour">Date de retour : </label>
			<input type="text" class="form-control" id="date_retour" name="date_retour" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="JJ/MM/AAAA" required onclick="ds_sh(this);" />
			<input type="hidden" name="id_produit" value="<?php echo $id ?>" hidden/>
		</div>

	</div>

	<!-- Affiche le calendrier lorsqu'on clique sur l'input -->
	<table class="ds_box" id="ds_conclass" style="display: none;">
		<tr>
			<td id="ds_calclass"></td>
		</tr>
	</table>

	<div class="clear"></div>

	<button type="submit" class="btn btn-success">Valider</button>
</form>
