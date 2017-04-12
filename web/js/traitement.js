	/**
	* Script modale edition article
	**/
	var btnEditArt = document.querySelectorAll('.btn-updateArt');
	var modal = $(this);
	$(btnEditArt).click(function() {
		var id = $(this).attr('id'),
			nom = $(this).attr('nom'),
			desc = $(this).attr('desc'),
			prix = $(this).attr('prix'),
			dim = $(this).attr('dim'),
			poids = $(this).attr('poids');
			//categorie = $(this).attr('categorie');
		$('#updateArticle').on('show.bs.modal', function(event) {
			modal = $(this);
			var allInput = modal.find('input');
			allInput[0].value = id;
			allInput[1].value = nom;
			allInput[2].value = desc;
			allInput[3].value = prix;
			allInput[4].value = dim;
			allInput[5].value = poids;
		});
	});


	


	// Exemples pour textarea et select

	// var allArea = modal.find('textarea');
	// allArea[0].textContent  = com;
	// allSelect = modal.find('select'),
	// allOption1 = modal.find($("#"+allSelect[0].id+" option")),
	// allOption2 = modal.find($("#"+allSelect[1].id+" option"));

	// for(var i=0; i<allOption1.length;i++){
		// if(allOption1[i].value == appreciation){
			// $(allOption1[i]).attr('selected', 'selected');
		// }
	// }
	// for(var j=0; j<allOption2.length;j++){
		// if(allOption2[j].value == tendance){
			// $(allOption2[j]).attr('selected', 'selected');
		// }
	// }
