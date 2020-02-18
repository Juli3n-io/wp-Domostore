$(document).ready(function(){
  $('.menu-btn').click(function(){
    $('.navbar').slideToggle(500);
  })
  // $('.menu-btn').click(function(){
  //   $('.header').toggleClass('white');
  //   $('#responsive_cart').toggleClass('black');
  // })
});

$(document).ready(function(){
  $('.search_click').click(function(){
    $('.search_container').slideToggle(500);
  })
});

$('.menu-icon').click(function(){
  $('.nav-icon-1').toggleClass('active')
  $('.nav-icon-2').toggleClass('active')
  $('.nav-icon-3').toggleClass('active')
});

const nav_icon = document.querySelector('.nav-icon');
const nav_icon_2 = document.querySelector('.nav-icon:after')



