//Copy-pasta
(function(){

  var todo = document.querySelector( '#todolist' ),
      form = document.querySelector( 'form' ),
      field = document.querySelector( '#newitem' );
    
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
  };

  function retrievestate() {
    if ( localStorage.todolist ) {
      todo.innerHTML = localStorage.todolist;
      document.getElementById("newitem").value = "";
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
  location.reload(); 
}

function showMeState(){
  alert(localStorage.todolist);
}