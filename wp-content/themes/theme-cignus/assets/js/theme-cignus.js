
jQuery(document).ready(function ($) {
  //$ = jQuery.noConflict(false);
  $(".carousel").carousel({
    interval: 2000,
  });
  //fin script carousels
  $(document).ready(function () {
    var $navbar = $("#menu-theme");
    var $dataresponsive = $(".home-link-fix");
    var $logoresponsive = $(".home-link-xs");

    AdjustHeader(); // Incase the user loads the page from halfway down (or something);
    $(window).scroll(function () {
      AdjustHeader();
    });

    function AdjustHeader() {
      if ($(window).scrollTop() > 160) {
        if (!$navbar.hasClass("fixed-top")) {
          $navbar.addClass("fixed-top animated fadeInDown");
          $dataresponsive.removeClass("d-none");
          $dataresponsive.addClass("d-block");
          $logoresponsive.removeClass("d-block");
          $logoresponsive.addClass("d-none");
        }
      } else {
        $navbar.removeClass("fixed-top animated fadeInDown");
        $dataresponsive.removeClass("d-block");
        $dataresponsive.addClass("d-none");
        $logoresponsive.removeClass("d-none");
        $logoresponsive.addClass("d-block");
      }
    }
  });
 
 
  $(".desarro-btn").bind("mouseover", function () {
    if ($(".juampas").hasClass("historieta")) {
      $(".juampas").removeClass("historieta");
    }
      $(".desarro-btn").removeClass("chiquito");
      $(".comics-btn").removeClass("elegido");
      $(".desarro-btn").addClass("elegido");
      $(".comics-btn").addClass("chiquito");
    
  });  
  $(".comics-btn").bind("mouseover", function () {
    $(".juampas").addClass("historieta");
    $(".desarro-btn").removeClass("elegido");
    $(".comics-btn").removeClass("chiquito");
    $(".comics-btn").addClass("elegido");
    $(".desarro-btn").addClass("chiquito");
  });
  $(".modal .close").on('clik', function(event){
    $(".modal").modal('hide');
  })
  // Code that uses jQuery's $ can follow here.
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
  $('.owl-carousel').owlCarousel({
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    loop: true,
    margin: 10,
    //nav: true,
    animateOut: 'slideOutLeft',
    animateIn: 'fadeInUp',
    responsive: {
      0: {
        items: 1
      }
    }
  })

  });


