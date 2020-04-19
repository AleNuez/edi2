var divejercicios = document.querySelector(".ejercicios");
var divproyectos = document.querySelector(".proyectos");
var btnejercicios = document.querySelector(".btn-ejercicios");
var btnproyectos = document.querySelector(".btn-proyectos");

divejercicios.style.display = "block";
divproyectos.style.display = "none";

function hideEjercicios(divejercicios,divproyectos) {
    divejercicios.style.display = "block";
    divproyectos.style.display = "none";
}
function hideProyectos(divproyectos,divejercicios) {
    divproyectos.style.display = "block";
    divejercicios.style.display = "none"; 
}