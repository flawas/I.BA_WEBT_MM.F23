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

/*
 * ---- ACCORDION ---
 */
function accordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
}

/*
 * ---- FORM VALIDATION ---
 */
function isOK(){
  let vorname = document.getElementById('vorname');
  let nachname = document.getElementById('nachname');
  let geburtstag = document.getElementById('geburtstag');
  let telefon = document.getElementById('telefon');
  let email = document.getElementById('email');
  let mannschaft = document.getElementById('mannschaft');
  if(vorname.value == '') {
    document.getElementById('divvorname').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelvorname').setAttribute("class", "w3-red");
    document.getElementById('labelvorname').innerHTML = "Vorname (wird benötigt)";
    return false;
  }

  if(vorname.value != '') {
    document.getElementById('divvorname').setAttribute("class", "w3-half");
    document.getElementById('labelvorname').setAttribute("class", "");
    document.getElementById('labelvorname').innerHTML = "Vorname";
    document.getElementById('floorball').setAttribute("margin-left", "10px");
  }

  if(nachname.value == '') {
    document.getElementById('divnachname').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelnachname').setAttribute("class", "w3-red");
    document.getElementById('labelnachname').innerHTML = "Nachname (wird benötigt)";
    return false;
  }

  if(nachname.value != '') {
    document.getElementById('divnachname').setAttribute("class", "w3-half");
    document.getElementById('labelnachname').setAttribute("class", "");
    document.getElementById('labelnachname').innerHTML = "Nachname";
  }

  if(telefon.value == '') {
    document.getElementById('divtelefon').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labeltelefon').setAttribute("class", "w3-red");
    document.getElementById('labeltelefon').innerHTML = "Telefon (wird benötigt)";
    return false;
  }

  if(telefon.value != '') {
    document.getElementById('divtelefon').setAttribute("class", "w3-half");
    document.getElementById('labeltelefon').setAttribute("class", "");
    document.getElementById('labeltelefon').innerHTML = "Telefon";
  }

  if(mannschaft.value == '') {
    document.getElementById('divmannschaft').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelmannschaft').setAttribute("class", "w3-red");
    document.getElementById('labelmannschaft').innerHTML = "Mannschaft (wird benötigt)";
    return false;
  }

  if(mannschaft.value != '') {
    document.getElementById('divmannschaft').setAttribute("class", "w3-half");
    document.getElementById('labelmannschaft').setAttribute("class", "");
    document.getElementById('labelmannschaft').innerHTML = "Mannschaft";
  }

  if(geburtstag.value == '') {
    document.getElementById('divgeburtstag').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelgeburtstag').setAttribute("class", "w3-red");
    document.getElementById('labelgeburtstag').innerHTML = "Geburstag (wird benötigt)";
    return false;
  }

  if(geburtstag.value != '') {
    document.getElementById('divgeburtstag').setAttribute("class", "w3-half");
    document.getElementById('labelgeburtstag').setAttribute("class", "");
    document.getElementById('labelgeburtstag').innerHTML = "Geburstag";
  }

  if(email.value == '') {
    document.getElementById('divemail').setAttribute("class", "w3-half w3-border w3-border-red");
    document.getElementById('labelemail').setAttribute("class", "w3-red");
    document.getElementById('labelemail').innerHTML = "E-Mail (wird benötigt)";
    return false;
  }

  if(email.value != '') {
    document.getElementById('divemail').setAttribute("class", "w3-half");
    document.getElementById('labelemail').setAttribute("class", "");
    document.getElementById('labelemail').innerHTML = "E-Mail";
  }

  return true;
}

/*
 * ---- CANVAS ---
 */
async function draw() {

  let canvas = document.getElementById("floorball");
  let c = canvas.getContext('2d');
  c.strokeStyle = "#111111"; 
  c.lineWidth = "8";
  c.arc(75, 75, 50, 0, 2 * Math.PI, true);
  c.moveTo(110, 60)
  c.arc(100, 60, 10, 0, 2 * Math.PI, true);
  c.moveTo(50, 65);
  c.arc(45, 60, 10, 0, 2 * Math.PI, true);
  c.moveTo(106, 95);
  c.arc(100, 95, 10, 0, 2 * Math.PI, true);
  c.moveTo(70, 30);
  c.arc(65, 30, 10, 0, Math.PI, false);
  c.moveTo(65, 120);
  c.arc(60, 120, 10, 0, Math.PI, true);
  c.moveTo(70, 95);
  c.arc(65, 85, 10, 0, 2 * Math.PI, true);
  c.stroke();

  while(true) {
    await sleep(5000);
    
    var color = Math.floor(Math.random() * 16777216).toString(16);
    var newcolor = '#00000'.slice(0, -color.length) + color;
    document.getElementById('floorball').setAttribute("style", "background-color: #" + newcolor + ";");

  }
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}