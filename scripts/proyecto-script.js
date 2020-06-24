
var modalBtn = document.querySelector('.modal-login'); // LOGIN
var modalBg = document.querySelector('.modal-bg-login');
var modalClose = document.querySelector('.modal-close-login');
modalBtn.addEventListener('click',function(){
    modalBg.classList.add('bg-active');
});
modalClose.addEventListener('click',function(){
    modalBg.classList.remove('bg-active');
});

var regBtn = document.querySelector('.modal-reg'); // REGISTRO
var regBg = document.querySelector('.modal-bg-reg');
var regClose = document.querySelector('.modal-close-reg');
regBtn.addEventListener('click',function(){
    regBg.classList.add('bg-active');
});
regClose.addEventListener('click',function(){
    regBg.classList.remove('bg-active');
});
