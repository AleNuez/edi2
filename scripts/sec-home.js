var secupBtn = document.querySelector('#sec-upload-btn'); // VIEW
var secupBg = document.querySelector('.sec-upload-modal');
var secupClose = document.querySelector('.sec-upload-close');



secupBtn.addEventListener('click',function(){
    secupBg.classList.add('bg-active');
});
secupClose.addEventListener('click',function(){
    secupBg.classList.remove('bg-active');
});