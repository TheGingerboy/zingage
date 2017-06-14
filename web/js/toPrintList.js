(function(){

  list = document.querySelector( '#toPrintList' );
  form = document.querySelector( 'form.scan' );
  field = document.querySelector( '#newitem' );
  data = document.querySelector( '#data' );
  hamburger = document.querySelector( '#hamburger' );
  close_btn = document.querySelector( '#sidebar-close' );
  addDataButton = document.querySelector (' #btn-zingage');
  sendDataButton = document.querySelector( '#btn-valide' );

  //Maintient le zone de texte vide
  list.value = "";

  //
  var auto_refresh =  setInterval(function() { addDataList(); }, 100);

  // Permet d'éviter l'erreur "undifined" en initialisant la valeur 
  if ( ( localStorage.todolist === 'undefined' ) || ( localStorage.todolist === null ) )
    {  localStorage.todolist = "" ;  }
    
  form.addEventListener( 'submit', function( ev ) {
    addDataList();
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
  
})();

//Permet de garder le focus (selection) sur le champs à compléter SI la sidebarre n'est pas dérouler
document.getElementById('newitem').onblur = function (event) { 
  if(hamburger.className === 'hamburger is-closed'){
    var blurEl = document.getElementById('newitem');
    setTimeout(function() {
        blurEl.focus();
    }, 10);
  }
}

//Si le menu est ouvert, déplacer le focus vers un élément inutile (ici le bouton hamburger)
hamburger.addEventListener( 'click', function(){
  on_burger_click();
}, false);

close_btn.addEventListener( 'click', function(){
  on_burger_click();
}, false);

//lors d'un clique pour l'affichage menu

function on_burger_click(){
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

//sauvegarde des données

function storestate() {
  localStorage.todolist = list.innerHTML;
  data.value = localStorage.todolist;
};

//récupération des données

function retrievestate() {
  list.innerHTML = localStorage.todolist;
  data.value = localStorage.todolist;
  if ( list.innerHTML === "" ) 
    { disableButton (sendDataButton); }
};

//nettoyage des données

 function clearstate() {
   localStorage.todolist = "";
   disableButton (sendDataButton);
   list.innerHTML = "";
}

//désactive le bouton

function disableButton(e){
  e.disabled = true;
}

//active le bouton

function enableButton(e){
  e.disabled = false;
}

//valide le formulaire

function addDataList(){
  if (field.value !== ""){
    data.focus();
    list.innerHTML = '<li>' + field.value + '</li>' + list.innerHTML;
    field.value = '';
    storestate();
  }
}
