console.log("ok");
function hideNav() {
    var nav = document.querySelector("#navbar");
    if (nav.style.display == "none") {
        nav.style.display = "block";
    } else nav.style.display = "none";
}

var modalBtn = document.querySelector('.modal-login');
var modalBg = document.querySelector('.modal-bg-login');
var modalClose = document.querySelector('.modal-close');
modalBtn.addEventListener('click',function(){
    modalBg.classList.add('bg-active');
});
modalClose.addEventListener('click',function(){
    modalBg.classList.remove('bg-active');
});
