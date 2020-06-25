
var picBtn = document.querySelector("#profile-pic-btn"); // PICTURE
var picBg = document.querySelector('.profile-pic-modal');
var picClose = document.querySelector('.profile-pic-close');
 var viewBtn = document.querySelector('#profile-view-btn'); // EDIT
 var viewBg = document.querySelector('.profile-view-modal');
 var viewClose = document.querySelector('.profile-view-close');
 var editBtn = document.querySelector('#profile-edit-btn'); // VIEW
 var editBg = document.querySelector('.profile-edit-modal');
 var editClose = document.querySelector('.profile-edit-close');


picBtn.addEventListener('click',function(){
    picBg.classList.add('bg-active');
});
picClose.addEventListener('click',function(){
    picBg.classList.remove('bg-active');
});


viewBtn.addEventListener('click',function(){
     viewBg.classList.add('bg-active');
 });
 viewClose.addEventListener('click',function(){
     viewBg.classList.remove('bg-active');
 });


 editBtn.addEventListener('click',function(){
     editBg.classList.add('bg-active');
 });
 editClose.addEventListener('click',function(){
     editBg.classList.remove('bg-active');
 });



// boton
// #profile-pic-btn 
// #profile-view-btn
// #profile-edit-btn 

// modal 
// .profile-pic-modal
// .profile-view-modal
// .profile-edit-modal 

// close
// .profile-pic-close
// .profile-view-close
// .profile-edit-close
