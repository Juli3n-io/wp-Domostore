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

window.sr = ScrollReveal();
sr.reveal('.f-name',{
    duration : 3000,
    origin : 'bottom',
    distance : '50px'
})