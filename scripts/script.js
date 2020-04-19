var divejercicios = document.querySelector(".ejercicios");
var divejerciciosdos = document.querySelector(".ejerciciosdos");
var divproyectos = document.querySelector(".proyectos");
var btnejercicios = document.querySelector(".btn-ejercicios");
var btnejerciciosdos = document.querySelector(".btn-ejerciciosdos");
var btnproyectos = document.querySelector(".btn-proyectos");


divejercicios.style.display = "block";
divproyectos.style.display = "none";

function hideEjercicios(divejercicios,divproyectos,divejerciciosdos) {
    divejercicios.style.display = "block";
    divproyectos.style.display = "none";
    divejerciciosdos.style.display = "none";
}
function hideEjerciciosdos(divejercicios,divproyectos,divejerciciosdos) {
    divejerciciosdos.style.display = "block";
    divproyectos.style.display = "none";
    divejercicios.style.display ="none";
}
function hideProyectos(divproyectos,divejercicios,divejerciciosdos) {
    divproyectos.style.display = "block";
    divejercicios.style.display = "none";
    divejerciciosdos.style.display = "none"; 
}