    $(document).ready(function () {
    var trigger   = $('.hamburger'),
        trigger2  = $( '#sidebar-close' ),
        connexion = $(".connexion"),
        bandeau   = $("#bandeau-retour"),
        body      = $("body"),
        isClosed  = true;


    trigger.click(function () {
      show_sidebar();      
    });

    trigger2.click(function () {
      show_sidebar();      
    });


//is-open : ouvre le menu via CSS
//is-closed, contraire de is-open
//hidden, cache ou non le menu
//fixed, désactive la navigation tant qu'aucune séléction n'a été faite

    function show_sidebar() {

      if (isClosed == false) {          
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        bandeau.removeClass('hidden');
        connexion.removeClass('hidden');
        body.removeClass('fixed');
        isClosed = true;
      } else {   
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        bandeau.addClass('hidden');
        connexion.addClass('hidden');
        body.addClass('fixed');
        isClosed = false;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
      $('#wrapper').toggleClass('toggled');
});
  
});
