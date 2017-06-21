//Contient les informations permettant de taper son mot de passe 
//Il s'agit de la dynamique du clavier numérique :)

btn_one = document.getElementById('numpad_one');
btn_two = document.getElementById('numpad_two');
btn_three = document.getElementById('numpad_three');
btn_four = document.getElementById('numpad_four');
btn_five = document.getElementById('numpad_five');
btn_six = document.getElementById('numpad_six');
btn_seven = document.getElementById('numpad_seven');
btn_eight = document.getElementById('numpad_eight');
btn_nine = document.getElementById('numpad_nine');
btn_zero = document.getElementById('numpad_zero');
btn_erease = document.getElementById('numpad_erease');
btn_dot = document.getElementById('numpad_dot');
btn_submit = document.getElementById('numpad_submit');
input_to_fill = document.getElementById('numpad_input');

btn_one.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '1';
	}
}, false);

btn_two.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '2';
	}
}, false);

btn_three.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '3';
	}
}, false);

btn_four.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '4';
	}
}, false);

btn_five.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '5';
	}
}, false);

btn_six.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '6';
	}
}, false);

btn_seven.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '7';
	}
}, false);

btn_eight.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '8';
	}
}, false);

btn_nine.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '9';
	}
}, false);

btn_zero.addEventListener("click", function (event){
	if(input_to_fill.maxLength > input_to_fill.value.length){
		input_to_fill.value = input_to_fill.value + '0';
	}
}, false);

btn_erease.addEventListener("click", function (event){
	input_to_fill.value = '';
}, false);

btn_dot.addEventListener("click", function (event){
	input_to_fill = '.';
}, false);

btn_submit.addEventListener("click", function (event){
	//Permet de réactiver les champs input (désactiver par défaut)
	input_to_fill.disabled = false;
	document.getElementById("connexion-form").submit();
}, false);