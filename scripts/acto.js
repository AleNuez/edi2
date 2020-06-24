
var apSearchBtn = document.querySelector('.modal-ap-search');
var apSearchBg = document.querySelector('.modal-bg-ap-search');
var apSearchClose = document.querySelector('.modal-close-ap-search');
apSearchBtn.addEventListener('click',function(){
    apSearchBg.classList.add('bg-active');
});
apSearchClose.addEventListener('click',function(){
    apSearchBg.classList.remove('bg-active');
});