// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("li");
var i;
var refTable = [];

for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
  alert(i);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Create a new list item when clicking on the "Add" button
function newElement() {

  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("Vous devez noter une reférence");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";

    }
  }  
}

// Create a new list item when clicking on the "Add" button
function currentElement() {

  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("Vous devez noter une reférence");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
      alert(i);
    }
  }  
}


//Permet l'ajout de la ref quand la touche entré est utilisé (prérequis scan)
var validScan = document.getElementById("myInput");
validScan.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        newElement(e);
    }
});

//Permet de garder le focus (selection) sur le champs à compléter
document.getElementById('myUL').onblur = function (event) { 
    var blurEl = this; 
    setTimeout(function() {
        blurEl.focus()
    }, 10);
}


function showElement() {
  alert(document.getElementById("zingage-form").getElementsByTagName("li")[0].innerHTML);
}

function addToSession(e){
  if (isset($_SESSION['nb_produit'])) {


  }
}
