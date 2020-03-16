const header = document.querySelector('.header');
const hname = document.querySelector('.h-name');
const hlinks = document.querySelector('.header-links');
const hcard = document.querySelector('.navbar-nav a');
const part2 = document.querySelector('.party_2');
const part2_link = document.querySelector('.navbar .nav-link')
const part2_a = document.querySelector('.navbar a');

window.addEventListener('scroll', () => {
  if(window.scrollY > 100){
    header.classList.remove('none');
    // part2.classList.remove('transparent');
    // hname.classList.add('black');
    // hlinks.classList.add('black');
    // hcard.classList.add('black');
    // part2_link.classList.add('black');
    // part2_a.classList.add('black');
    
  }else{
    header.classList.add('none');
    // part2.classList.add('transparent');
    // hname.classList.remove('black');
    // hlinks.classList.remove('black');
    // hcard.classList.remove('black');
    // part2_link.classList.remove('black');
    // part2_a.classList.remove('black');
    
  }
});

window.sr = ScrollReveal();
sr.reveal('.f-name',{
    duration : 3000,
    origin : 'bottom',
    distance : '50px'
})

sr.reveal('.page_title',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})

sr.reveal('.front_titre',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})

sr.reveal('.front_cat_product',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.wc-block-grid',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.wc-block-featured-category-block-grid',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.wc-block-featured-category',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.has-background-dim',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})
sr.reveal('.blog-post',{
  duration : 3000,
  origin : 'bottom',
  distance : '50px'
})