//Copy-pasta
(function(){

  var todo = document.querySelector( '#todolist' ),
      form = document.querySelector( 'form.scan' ),
      field = document.querySelector( '#newitem' );
      data = document.querySelector( '#data' )
    
  form.addEventListener( 'submit', function( ev ) {
    todo.innerHTML += '<li>' + field.value + '</li>';
    field.value = '';
    field.focus();
    storestate();
    ev.preventDefault();
  }, false);

  todo.addEventListener( 'click', function( ev ) {
    var t = ev.target;
    if ( t.tagName === 'LI' ) {
        t.parentNode.removeChild( t );
        storestate();
    };
    ev.preventDefault();
  }, false);

  document.addEventListener( 'DOMContentLoaded', retrievestate, false );
  
  function storestate() {
    localStorage.todolist = todo.innerHTML;
    data.value = localStorage.todolist;
  };

  function retrievestate() {
    if ( localStorage.todolist ) {
      todo.innerHTML = localStorage.todolist;
      document.getElementById("newitem").value = "";
      data.value = localStorage.todolist;
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
  localStorage.removeItem("todolist");
  document.getElementById("todolist").innerHTML = "";
}

function showMeState(){
  alert(localStorage.todolist);
}