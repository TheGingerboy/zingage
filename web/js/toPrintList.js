//Copy-pasta
(function(){

  list = document.querySelector( '#toPrintList' );
  form = document.querySelector( 'form.scan' );
  field = document.querySelector( '#newitem' );
  data = document.querySelector( '#data' );
  sendDataButton = document.querySelector( '#btn-valide' );

  //Maintient le zone de texte vide
  list.value = "";
    
  form.addEventListener( 'submit', function( ev ) {
    enableButton (sendDataButton);
    list.innerHTML += '<li>' + field.value + '</li>';
    field.value = '';
    storestate();
    ev.preventDefault();
  }, false);

  list.addEventListener( 'click', function( ev ) {
    var t = ev.target;
    if ( t.tagName === 'LI' ) {
        t.parentNode.removeChild( t );
        storestate();
        if ( list.innerHTML === "" ) {
            disableButton (sendDataButton);
        }
    };
    ev.preventDefault();
  }, false);

  document.addEventListener( 'DOMContentLoaded', retrievestate, false );
  
  function storestate() {
    localStorage.todolist = list.innerHTML;
    data.value = localStorage.todolist;
  };

  function retrievestate() {
    list.innerHTML = localStorage.todolist;
    data.value = localStorage.todolist;
            if ( list.innerHTML === "" ) {
            disableButton (sendDataButton);
        }
  };
})();

//Permet de garder le focus (selection) sur le champs à compléter
document.getElementById('newitem').onblur = function (event) { 
    var blurEl = this;
    setTimeout(function() {
        blurEl.focus()
    }, 10);
}

function clearstate() {
  localStorage.todolist = "";
  disableButton (sendDataButton);
  list.innerHTML = "";
}

function disableButton(e){
  e.disabled = true;
}

function enableButton(e){
  e.disabled = false;
}