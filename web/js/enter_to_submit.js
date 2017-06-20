form = document.getElementById('ajout-zing-form');

form.onkeydown = function(e){
   if(e.keyCode == 13){
     form.submit();
   }
};

function clearField (e){
	e.value = "";
	e.focus();
}