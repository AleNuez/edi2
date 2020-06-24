
var apSearchBtn = document.querySelector('.modal-ap-search');
var apSearchBg = document.querySelector('.modal-bg-ap-search');
var apSearchClose = document.querySelector('.modal-close-ap-search');
var moreBtn1 = document.querySelector('#more-1');
var moreBtn2 = document.querySelector('#more-2');
var moreBtn3 = document.querySelector('#more-3');
var moreBtn4 = document.querySelector('#more-4');
var moreBtn5 = document.querySelector('#more-5');
var moreBtn6 = document.querySelector('#more-6');
var moreBtn7 = document.querySelector('#more-7');
var moreBtn8 = document.querySelector('#more-8');
var moreBtn9 = document.querySelector('#more-9');
var moreBtn10 = document.querySelector('#more-10');
var postulaBg = document.querySelector('.modal-bg-postula');
var postulaClose = document.querySelector('.modal-close-postula');



apSearchBtn.addEventListener('click',function(){
    apSearchBg.classList.add('bg-active');
});
apSearchClose.addEventListener('click',function(){
    apSearchBg.classList.remove('bg-active');
});

moreBtn1.addEventListener('click',function(){
    postulaBg.classList.add('bg-active');
});
// moreBtn2.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn3.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn4.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn5.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn6.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn7.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn8.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn9.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });
// moreBtn10.addEventListener('click',function(){
//     postulaBg.classList.add('bg-active');
// });

postulaClose.addEventListener('click',function(){
    postulaBg.classList.remove('bg-active');
});