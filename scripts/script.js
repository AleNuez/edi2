hideEjercicios();
hideProyectos();

function hideEjercicios() {
    var section = document.querySelector(".ejercicios");
    var othersection = document.querySelector(".proyectos");
    if (section.style.display == "none") {
        section.style.display = "block";
        section.classList.toggle("active");
        othersection.style.display = "none";
    } else section.style.display = "none";
}
function hideProyectos() {
    var section = document.querySelector(".proyectos");
    var othersection = document.querySelector(".ejercicios");
    if (section.style.display == "none") {
        section.style.display = "block";
        section.classList.toggle("active");
        othersection.style.display = "none";
    } else section.style.display = "none";
}