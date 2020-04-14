hideEjercicios();
hideProyectos();

function hideEjercicios() {
    var section = document.querySelector(".ejercicios");
    var othersection = document.querySelector(".proyectos");
    var btnSection = document.querySelector(".btn-ejercicios");
    if (section.style.display == "none") {
        section.style.display = "block";
        btnSection.classList.toggle("active");
        othersection.style.display = "none";
    } else section.style.display = "none";
}
function hideProyectos() {
    var section = document.querySelector(".proyectos");
    var othersection = document.querySelector(".ejercicios");
    var btnSection = document.querySelector(".btn-proyectos");
    if (section.style.display == "none") {
        section.style.display = "block";
        btnSection.classList.toggle("active");
        othersection.style.display = "none";
    } else section.style.display = "none";
}