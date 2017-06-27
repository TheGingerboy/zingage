<?php if(isset($_SESSION['admin'])) {?>

<?php

	// SQL DEFINITION

	$sql_show_zingeur = $pdo->query("SELECT id_zingeur, nom_zingeur, ville_adr_zingeur, pays_adr_zingeur FROM zingeur");

?>
<div class="center margin-all-large">
	<a class="btn btn-primary cyan" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/ajout/nom" ?>">Ajouter un zingeur</a>
</div>


<table id="tab-list-article" class="table table-bordered table-striped table-responsive">
	<tr>
		<th class="center">NOM DU ZINGEUR</th>
		<th class="center">VILLE</th>
		<th class="center">PAYS</th>
		<th class="center">EDITION</th>
		<th class="center">SUPPRESSION</th>
	</tr>

	<?php

		while ($row = $sql_show_zingeur->fetch())
		{
		    echo "<tr>";
		    echo '<td class="center">' . $row['nom_zingeur'] . '</td>';
		    echo '<td class="center">' . $row['ville_adr_zingeur'] . '</td>';
		    echo '<td class="center">' . $row['pays_adr_zingeur'] . '</td>';
		    //Edition
			echo '<td class="center"> <a href =' . "http://" . $_SERVER['SERVER_NAME'] . 
			"/zingage/administration/zingeurs/edition/" . $row['id_zingeur'] . 
			'> <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i> </td>';
			//Suppression
			echo '<td class="center">';
				echo '<form action="'. "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/zingeurs/suppression" . 
				'" method="post" id="form-suppr-article">';
					echo '<input type="hidden" name="id_zingeur" value="' .$row['id_zingeur'] .'" style="display:none;" class="hidden">';
					echo '<button type="submit"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i></button>' ;
				echo '</form>';
			echo  "</td>";
		    echo "</tr>";
		}

	?>
</table>

<?php }