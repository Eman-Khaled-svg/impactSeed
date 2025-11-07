//  nav
const hamburger = document.querySelector('.hamburger');
const menubar = document.querySelector('.menubar');


hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('hamburger-active');
    menubar.classList.toggle('active');
    document.body.style.overflow = menubar.classList.contains('active') ? 'hidden' : 'auto';
});


document.addEventListener('click', function(event) {
    if (!menubar.contains(event.target) && !hamburger.contains(event.target) && menubar.classList.contains('active')) {
        hamburger.classList.remove('hamburger-active');
        menubar.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});

window.addEventListener('resize', function() {
    if (window.innerWidth > 768 && menubar.classList.contains('active')) {
        hamburger.classList.remove('hamburger-active');
        menubar.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});




    (function(){
      const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      const saveData = navigator.connection && navigator.connection.saveData;
      const lowMem = navigator.deviceMemory && navigator.deviceMemory < 1.5;
      if (prefersReduced || saveData || lowMem) {
        const b = document.querySelector('.bubbles');
        if (b) b.remove();
      }
    })();
