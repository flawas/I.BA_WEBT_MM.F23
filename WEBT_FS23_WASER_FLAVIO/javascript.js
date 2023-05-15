/*
 * ---- SLIDER ---
*/
function carousel() {
    var i;
    var x = document.getElementsByClassName("myclass-slider");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    index++;
    if (index > x.length) {
        index = 1;
    }    
    x[index-1].style.display = "block";  
    setTimeout(carousel, 3000); 
}

function accordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
}

function isOK(){
  let vorname = document.getElementById('vorname');
  let nachname = document.getElementById('nachname');
  let geburtstag = document.getElementById('geburtstag');
  let telefon = document.getElementById('telefon');
  let email = document.getElementById('email');
  let mannschaft = document.getElementById('mannschaft');
  if(vorname.value == '') {
    document.getElementById('divvorname').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelvorname').setAttribute("class", "w3-red")
    return false;
  }

  if(vorname.value != '') {
    document.getElementById('divvorname').setAttribute("class", "w3-half");
    document.getElementById('labelvorname').setAttribute("class", "")
  }

  if(nachname.value == '') {
    document.getElementById('divnachname').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelnachname').setAttribute("class", "w3-red")
    return false;
  }

  if(nachname.value != '') {
    document.getElementById('divnachname').setAttribute("class", "w3-half");
    document.getElementById('labelnachname').setAttribute("class", "")
  }

  if(telefon.value == '') {
    document.getElementById('divtelefon').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labeltelefon').setAttribute("class", "w3-red")
    return false;
  }

  if(telefon.value != '') {
    document.getElementById('divtelefon').setAttribute("class", "w3-half");
    document.getElementById('labeltelefon').setAttribute("class", "")
  }

  if(mannschaft.value == '') {
    document.getElementById('divmannschaft').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelmannschaft').setAttribute("class", "w3-red")
    return false;
  }

  if(mannschaft.value != '') {
    document.getElementById('divmannschaft').setAttribute("class", "w3-half");
    document.getElementById('labelmannschaft').setAttribute("class", "")
  }

  if(geburtstag.value == '') {
    document.getElementById('divgeburtstag').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelgeburtstag').setAttribute("class", "w3-red")
    return false;
  }

  if(geburtstag.value != '') {
    document.getElementById('divgeburtstag').setAttribute("class", "w3-half");
    document.getElementById('labelgeburtstag').setAttribute("class", "")
  }

  if(email.value == '') {
    document.getElementById('divemail').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelemail').setAttribute("class", "w3-red")
    return false;
  }

  if(email.value != '') {
    document.getElementById('divemail').setAttribute("class", "w3-half");
    document.getElementById('labelemail').setAttribute("class", "")
  }

  return true;
}