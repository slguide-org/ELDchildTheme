/**
 * Here goes all the JS Code you need in your child theme buddy!
 */
(function($) {

    var trigger = jQuery('#hamburger'),
        isClosed = false;

    $('a.right-off-canvas-toggle').click(function () {
      burgerTime();
    });
    $('a.exit-off-canvas').click(function() {
      burgerTime();
    });
    $('nav.side-bar a').click(function(e) {
      burgerTime();
    });
    function burgerTime() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
    }


	//SmoothState (Should this be moved to a separate file, or committed to the main theme?)
    var jumpLinks = function() {
          $('a[href*=\\#]:not([href=\\#]):not(.accordion dd>a)').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    }
    var accordions = function() {
            $('.accordion dd>a').first().addClass('active');
                        $('.accordion dd>a').on('click', function(e) {
                            e.preventDefault();
                            if(! $(this).hasClass('active') ) {
                                $(this).parent().siblings().children().each(function() {
                                    if($(this).hasClass('active')) {
                                        $(this).next().slideToggle('slow');
                                        $(this).toggleClass('active');
                                    }
                                });
                            }
                            $(this).toggleClass('active');
                            $(this).parents('.navCol').css('height', 'auto');
                            $(this).next().slideToggle('slow');


                        })
    }
accordions();
jumpLinks();



var moreText = "Read more",
    lessText = "Read less",
    moreButton = $("a.readmorebtn");

$(window).load( function() {
  $('.hiddentext').each(function() {
    $(this).slideToggle('fast');
  })
});
moreButton.click(function () {
    var $this = $(this);
    console.log('working');
    $this.text($this.text() == moreText ? lessText : moreText).parent().next(".hiddentext").slideToggle("fast");
});
   $('.parallax-window').each(function() {
      iw = $(this).data('natural-width'),
        ww = $(window).width();
        ratio =  ww / iw;
        $(this).css('minHeight', ratio * $(this).data('natural-height'));
    })



   var modals = $('.moveme').detach();
   $('body').append(modals);
}(jQuery));