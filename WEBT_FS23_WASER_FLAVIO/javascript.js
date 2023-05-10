/*
 * ---- SLIDER ---
*/

// Slider script
var index = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("myclass-slider");
    for (i = 0; i < x.length; i++) {
        //x[i].style.display = "none";
        x[i].style.display = "none"; 
    }
    index++;
    if (index > x.length) {
        index = 1;
    }    
    x[index-1].style.display = "block";  
    setTimeout(carousel, 3000); 
}

// Get actual year
document.getElementById("year").innerHTML = new Date().getFullYear();