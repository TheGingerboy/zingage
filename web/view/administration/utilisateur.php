<?php if(isset($_SESSION['admin'])) {?>

<?php

	// SQL DEFINITION

	$sql_show_user = $pdo->query("SELECT id_user, identifiant_user, nom_user, prenom_user, role_user FROM utilisateur");

?>
<div class="center margin-all-large">
	<a class="btn btn-primary purple" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/ajout/identifiant" ?>">Ajouter un utilisateur</a>
</div>


<table id="tab-list-article" class="table table-bordered table-striped table-responsive">
	<tr>
		<th class="center">IDENTIFIANT</th>
		<th class="center">PRENOM</th>
		<th class="center">NOM</th>
		<th class="center">ADMIN</th>
		<th class="center">EDITION</th>
		<th class="center">SUPPRESSION</th>
	</tr>

	<?php

		while ($row = $sql_show_user->fetch())
		{
		    echo "<tr>";
		    echo '<td class="center">' . $row['identifiant_user'] . '</td>';
		    echo '<td class="center">' . $row['nom_user'] . '</td>';
		    echo '<td class="center">' . $row['prenom_user'] . '</td>';
		    echo '<td class="center">' ;
		    	if ($row['role_user'])
		    		echo "oui";
		    	else
		    		echo "non";
		    echo '</td>';
		    //Edition
			echo '<td class="center"> <a href =' . "http://" . $_SERVER['SERVER_NAME'] . 
			"/zingage/administration/utilisateurs/edition/" . $row['id_user'] . 
			'> <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i> </td>';
			//Suppression
			echo '<td class="center">';
				echo '<form action="'. "http://" . $_SERVER['SERVER_NAME'] . "/zingage/administration/utilisateurs/suppression" . 
				'" method="post" id="form-suppr-article">';
					echo '<input type="hidden" name="id_user" value="' .$row['id_user'] .'" style="display:none;" class="hidden">';
					echo '<button type="submit"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i></button>' ;
				echo '</form>';
			echo  "</td>";
		    echo "</tr>";
		}

	?>
</table>

<?php }