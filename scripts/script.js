var divejercicios = document.querySelector(".ejercicios");
var divejerciciosdos = document.querySelector(".ejerciciosdos");
var divproyectos = document.querySelector(".proyectos");
var divejphp = document.querySelector(".ejphp");
var btnejercicios = document.querySelector(".btn-ejercicios");
var btnejerciciosdos = document.querySelector(".btn-ejerciciosdos");
var btnproyectos = document.querySelector(".btn-proyectos");
var btnejphp = document.querySelector(".btn-ejphp");

var btnHome = document.querySelector("#h-home");

divejercicios.style.display = "none";
divproyectos.style.display = "block";
divejphp.style.display = "none";

function hideEjercicios(divejercicios,divproyectos,divejerciciosdos,divejphp) {
    divejercicios.style.display = "block";
    divproyectos.style.display = "none";
    divejerciciosdos.style.display = "none";
    divejphp.style.display = "none";
}
function hideEjerciciosdos(divejercicios,divproyectos,divejerciciosdos,divejphp) {
    divejerciciosdos.style.display = "block";
    divproyectos.style.display = "none";
    divejercicios.style.display ="none";
    divejphp.style.display = "none";
}
function hideProyectos(divproyectos,divejercicios,divejerciciosdos,divejphp) {
    divproyectos.style.display = "block";
    divejercicios.style.display = "none";
    divejerciciosdos.style.display = "none";
    divejphp.style.display = "none"; 
}
function hideEjphp(divproyectos,divejercicios,divejerciciosdos,divejphp) {
    divejercicios.style.display = "none";
    divejerciciosdos.style.display = "none";
    divproyectos.style.display = "none";
    divejphp.style.display = "block";
}
