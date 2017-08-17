<?php

/****************** Variables **********************/
	//FROM URL // ... / details / {annee} / {mois}
	//$annee = 4 chiffres min - max
	//$mois = 2 chiffres min - max / compris entre 1 - 12
$erreur = false;


	//Si valeur passé par URL est différente d'une unité numérique, de la bonne taille et dans les bonnes valeurs
if( !( is_numeric($annee) 
	&& is_numeric($mois) 
	&& strlen($annee) == 4 
	&& ( strlen($mois) == 1 || strlen($mois) == 2 ) 
	&& $mois <= 12
	&& $mois >= 1
	) )
{
	$erreur = true;
}


/********************* SQL ************************/

$limite_basse = $annee . '/' . $mois . '/' . '01' . '<br>';
$limite_haute = $annee . '/' . $mois . '/' . '31' . '<br>';



echo $limite_basse;
echo $limite_haute;

$sql_between_date = "SELECT ref_article FROM article WHERE ";

/****************** Fonction **********************/

	// renvoie nom du mois sur nombre données // renvoie une erreur autrement
function showMonthName ($nb){
	if 	  ( $nb == 1 ) { $mois_name = "Janvier" 	;}
	elseif( $nb == 2 ) { $mois_name = "Février" 	;}
	elseif( $nb == 3 ) { $mois_name = "Mars" 		;}
	elseif( $nb == 4 ) { $mois_name = "Avril" 		;}
	elseif( $nb == 5 ) { $mois_name = "Mai" 		;}
	elseif( $nb == 6 ) { $mois_name = "Juin" 		;}
	elseif( $nb == 7 ) { $mois_name = "Juillet" 	;}
	elseif( $nb == 8 ) { $mois_name = "Août" 		;}
	elseif( $nb == 9 ) { $mois_name = "Septembre" 	;}
	elseif( $nb == 10) { $mois_name = "Octobre" 	;}
	elseif( $nb == 11) { $mois_name = "Novembre" 	;}
	elseif( $nb == 12) { $mois_name = "Décembre" 	;}
	else 			   { $mois_name = "Erreur" 		;}
	return $mois_name;
}

function getPreviousDateURL ($year, $monthnb){
	if( $monthnb <= 1 ) {
		$monthnb = 12;
		$year--;
	}
	else{
		$monthnb--;
	}
	$url = "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/details/" . $year . "/" . $monthnb;
	return $url;
}

function getNextDateURL ($year, $monthnb){
	if( $monthnb >= 12 ) {
		$monthnb = 1;
		$year++;
	}
	else{
		$monthnb++;
	}
	$url = "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/details/" . $year . "/" . $monthnb;
	return $url;
}

if ($erreur) {
	//Sinon, affiche le pourquoi de l'erreur
	echo '<div class="center">';
	echo '<h2>Les dates entrées provoquent une erreur</h2>';
	echo '<h3>Année séléctionnée : ' . $annee . ' <h3>';
	echo '<h3>Mois séléctionné : ' . showMonthName($mois) . ' (' . $mois . ')' . ' <h3>';
	echo '</div>';
}


else { ?>
<div>

	<select id="histo-mois">
		<option value="1">	Janvier		</option>
		<option value="2">	Février		</option>
		<option value="3">	Mars		</option>
		<option value="4">	Avril		</option>
		<option value="5">	Mai			</option>
		<option value="6">	Juin		</option>
		<option value="7">	Juillet		</option>
		<option value="8">	Août		</option>
		<option value="9">	Septembre	</option>
		<option value="10">	Octobre		</option>
		<option value="11">	Novembre	</option>
		<option value="12">	Décembre	</option>
	</select> 

	<select id="histo-annee">

		<?php

		for ($i=2017; $i < (date("Y") + 1) ; $i++) { 
			echo '<option value="' . $i . '">' . $i . '</option>';
		}

		?>
		
	</select>
</div>

<?php
	// Si tout ok
echo '<div class="center nav-date">';
echo '<a href="' . getPreviousDateURL($annee, $mois) . '">' ;
echo '<img src="/zingage/web/images/arrow-blue.png">';
echo '</a>';
echo showMonthName($mois) . " " . $annee;
echo '<a href="' . getNextDateURL($annee, $mois) . '">';
echo '<img src="/zingage/web/images/arrow-blue-reverse.png">';
echo '</a>';
echo '</div>';
}

?>

<script type="text/javascript">
	annee = document.getElementById('histo-annee');
	mois =  document.getElementById('histo-mois');

	annee.value = "<?= $annee ?>";
	mois.value = "<?= $mois ?>"

	//Permet de changer l'URL lors d'un changement de la liste déroulante
	function onchange() {
		url = '<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/historique/details/" ?>' + annee.value + '/' + mois.value;
		window.location.href = url;
	}

	annee.addEventListener('change', onchange);
	mois.addEventListener('change', onchange);

</script>
