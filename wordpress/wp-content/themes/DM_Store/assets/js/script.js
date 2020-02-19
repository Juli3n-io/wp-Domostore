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

window.sr = ScrollReveal();
sr.reveal('.title_404',{
    duration : 3000,
    origin : 'bottom',
    distance : '50px'
})
sr.reveal('.text_404',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.ligne_404',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.back_to_home_404',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})




