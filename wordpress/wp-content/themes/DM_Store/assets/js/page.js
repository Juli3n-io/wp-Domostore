document.querySelector('.menu_filter_open').addEventListener('click',()=>{
    document.querySelector('.responsive_sidebar').classList.add('active');
 });

 document.querySelector('.responsive_close').addEventListener('click',()=>{
  document.querySelector('.responsive_sidebar').classList.remove('active');
 });