    $(document).ready(function () {
    var trigger = $('.hamburger'),
      bandeau = $("#bandeau-retour"),
      isClosed = true;

    trigger.click(function () {
      hamburger_cross();      
    });


    function hamburger_cross() {

      if (isClosed == false) {          
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        bandeau.removeClass('hidden');
        isClosed = true;
      } else {   
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        bandeau.addClass('hidden');
        isClosed = false;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
      $('#wrapper').toggleClass('toggled');
});
  
});
