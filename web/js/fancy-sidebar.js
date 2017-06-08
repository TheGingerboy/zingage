    $(document).ready(function () {
    var trigger = $('.hamburger'),
            connexion = $(".connexion"),
            bandeau = $("#bandeau-retour"),
            body = $("body"),
            isClosed = true;

    trigger.click(function () {
      hamburger_cross();      
    });


//is-open : ouvre le menu via CSS
//is-closed, contraire de is-open
//hidden, cache ou non le menu
//fixed, désactive la navigation tant qu'aucune séléction n'a été faite

    function hamburger_cross() {

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
