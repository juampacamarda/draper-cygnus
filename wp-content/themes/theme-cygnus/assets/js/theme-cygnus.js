
jQuery(document).ready(function ($) {
  //$ = jQuery.noConflict(false);
  $(".carousel").carousel({
    interval: 2000,
  });
  //fin script carousels
  $(document).ready(function () {
    var $navbar = $("header");
    var $logo = $(".home-link-light");
    var $logofix = $(".home-link-fix");


    AdjustHeader(); // Incase the user loads the page from halfway down (or something);
    $(window).scroll(function () {
      AdjustHeader();
    });

    function AdjustHeader() {
      if ($(window).scrollTop() > 150) {
        if (!$navbar.hasClass("fixed-top")) {
          $navbar.addClass("fixed-top animated fadeInDown");
          $logo.removeClass("d-block");
          $logo.addClass("d-none");
          $logofix.removeClass("d-none");
          $logofix.addClass("d-block");
        }
      } else {
        $navbar.removeClass("fixed-top animated fadeInDown");
        $logo.removeClass("d-none");
        $logo.addClass("d-block");
        $logofix.removeClass("d-block");
        $logofix.addClass("d-none");
      }
    }
  });

  jQuery(document).ready(function ($) { 
    $("a").on('click', function (event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function () {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });

    
  });

  jQuery(document).ready(function ($) { 
    $('#portfolio').owlCarousel({
      autoplay:true,
      autoplayTimeout:10000,
      autoplayHoverPause:true,
      loop: true,
      margin: 10,
      //nav: true,
      animateOut: 'fadeOut',
      animateIn: 'slideInLeft',
      responsive: {
        0: {
          items: 1
        }
      }
    });
    $('#partners-carousel').owlCarousel({

        margin:20,
        nav:false,
        responsive:{
            0:{
                items:1,
                autoplay:true,
                autoplayTimeout:10000,
                autoplayHoverPause:true,
                loop: true,
            },
            1000:{
                items:5,
                autoplay:false,
                loop: false,
            }
        }
    })

    });

})
