var sadupapBtn = document.querySelector('#sad-upap-btn'); // ACTO PUBLICO
var sadupapBg = document.querySelector('.sad-upap-modal');
var sadupapClose = document.querySelector('.sad-upap-close');

var sadupescBtn = document.querySelector('#sad-upesc-btn'); // ESCUELA
var sadupescBg = document.querySelector('.sad-upesc-modal');
var sadupescClose = document.querySelector('.sad-upesc-close');


sadupapBtn.addEventListener('click',function(){
    sadupapBg.classList.add('bg-active');
});
sadupapClose.addEventListener('click',function(){
    sadupapBg.classList.remove('bg-active');
});

sadupescBtn.addEventListener('click',function(){
    sadupescBg.classList.add('bg-active');
});
sadupescClose.addEventListener('click',function(){
    sadupescBg.classList.remove('bg-active');
});