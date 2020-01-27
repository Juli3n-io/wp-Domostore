$(document).ready(function(){
  $('.menu-btn').click(function(){
    $('.navbar').slideToggle(500);
  })
  $('.menu-btn').click(function(){
    $('.header').toggleClass('white');
    $('#responsive_cart').toggleClass('black');
  })
});


// $(document).ready(function(){
//   $('#menu-icon').click(function(){
//     $('#menu').toggleClass('none'); 
//     $('#menu').classList.add('block')
//   })
// })
 

const fname = document.getElementById('f-name');
const pname = document.getElementById('p-name');
const r_cart = document.getElementById('responsive_cart');

// window.addEventListener('scroll',() => {
//  if(window.scrollY == 200){
//   fname.classList.remove('none');
//   fname.classList.add('block');
//   pname.classList.remove('block');
//   pname.classList.add('none');
//  }
// });

const header = document.querySelector('.header');
const responsive_bar = document.querySelector('responsive-bar');
const hname = document.querySelector('.h-name');
const cart = document.querySelector('.fas');
const menu_cat = document.querySelector('.menu-item a');

window.addEventListener('scroll', () => {
  if(window.scrollY > 100){
    header.classList.add('block');
    
  }else{
    header.classList.remove('block');
    
  }
});