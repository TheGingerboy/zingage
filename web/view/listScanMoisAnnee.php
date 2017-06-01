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
		$url = "http://" . $_SERVER['SERVER_NAME'] . "/zingage/scan/details/" . $year . "/" . $monthnb;
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
		$url = "http://" . $_SERVER['SERVER_NAME'] . "/zingage/scan/details/" . $year . "/" . $monthnb;
		return $url;
	}

if (!$erreur) { ?>
	<div class="center nav-date">
		<a href="<?= getPreviousDateURL($annee, $mois) ?>">
			<img src="/zingage/web/images/arrow-blue.png">
		</a>
			<?= showMonthName($mois) . " " . $annee ?>
		<a href="<?= getNextDateURL($annee, $mois) ?>">
			<img src="/zingage/web/images/arrow-blue-reverse.png">
		</a>
	</div>

<?php }
else {
	echo '<div class="center">';
		echo '<h2>Les dates entrées provoquent une erreur</h2>';
		echo '<h3>Année séléctionnée : ' . $annee . ' <h3>';
		echo '<h3>Mois séléctionné : ' . showMonthName($mois) . ' (' . $mois . ')' . ' <h3>';
	echo '</div>';
}


