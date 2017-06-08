//Copy-pasta
(function(){

  list = document.querySelector( '#toPrintList' );
  form = document.querySelector( 'form.scan' );
  field = document.querySelector( '#newitem' );
  data = document.querySelector( '#data' );
  hamburger = document.querySelector( '#hamburger' );
  close_btn = document.querySelector( '#sidebar-close' );
  sendDataButton = document.querySelector( '#btn-valide' );

  //Maintient le zone de texte vide
  list.value = "";

  // Permet d'éviter l'erreur "undifined" en initialisant la valeur 
  if ( ( localStorage.todolist === 'undefined' ) || ( localStorage.todolist === null ) )
    {  localStorage.todolist = "" ;  }
    
  form.addEventListener( 'submit', function( ev ) {
    enableButton (sendDataButton);
    list.innerHTML = '<li>' + field.value + '</li>' + list.innerHTML;
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
    if ( list.innerHTML === "" ) 
      { disableButton (sendDataButton); }
  };
})();

//Permet de garder le focus (selection) sur le champs à compléter SI la sidebarre n'est pas dérouler
document.getElementById('newitem').onblur = function (event) { 
  if(hamburger.className === 'hamburger is-closed'){
    var blurEl = document.getElementById('newitem');
    setTimeout(function() {
        blurEl.focus()
    }, 10);
  }
}

//Si le menu est ouvert, déplacer le focus vert un élément inutile (ici le bouton hamburger)
hamburger.addEventListener( 'click', function(){
  click();
}, false);

close_btn.addEventListener( 'click', function(){
  click();
}, false);

function click(){
    if(hamburger.className === 'hamburger is-open'){
    var blurEl = document.getElementById('newitem');
    setTimeout(function() {
    blurEl.focus()
    }, 10);
  }
  else {
    var blurEl = document.getElementById('hamburger');
    setTimeout(function() {
    blurEl.focus()
    }, 10);
  }
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