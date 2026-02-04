(function($) {
  "use strict"; 

  // SMOOTH SCROLLING USEING JQUERY EASING
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 56)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // CLOSES RESPOSIVE MENU WHEN A SCROLL TRIGGER LINK IS CLICKED
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // ACTIVATE SCROLLSPY TO ADD ACTIVE CLASS TO NAVBAR ITEMS ON SCROLL
  $('body').scrollspy({
    target: '#mainNav',
    offset: 56
  });

})(jQuery);
