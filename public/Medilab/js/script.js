(function ($) {

    // Owl Carousel

    var owl = $('.owl-carousel-new .owl-carousel');
    owl.owlCarousel({
        center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: false,
      dots: false,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          items: 5
        },
        700: {
          margin: 20,
          stagePadding: 0,
          items: 7
        },
        600: {
          margin: 20,
          items: 10
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          items: 9
        }
      }
    });

    var owl = $('.owl-carousel-two .owl-carousel');
    owl.owlCarousel({
        center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: false,
      dots: false,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          items: 5
        },
        700: {
          margin: 20,
          stagePadding: 0,
          items: 5
        },
        600: {
          margin: 20,
          items: 5
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          items: 5
        }
      }
    });

    var owl = $('.owl-carousel-pet-card .owl-carousel');
    owl.owlCarousel({
        center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: false,
      dots: false,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          items: 7
        },
        700: {
          margin: 20,
          stagePadding: 0,
          items: 7
        },
        600: {
          margin: 20,
          items: 7
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          items: 7
        }
      }
    });
    
    var owl = $('.owl-carousel-lostpet .owl-carousel');
    owl.owlCarousel({
        center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: false,
      dots: false,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          items: 2
        },
        700: {
          margin: 20,
          stagePadding: 0,
          items: 2
        },
        600: {
          margin: 20,
          items: 2
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          items: 2
        }
      }
    });

    var owl = $('.owl-carousel-3 .owl-carousel');
    owl.owlCarousel({
        center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: false,
      dots: false,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          items: 1
        },
        700: {
          margin: 20,
          stagePadding: 0,
          items: 1
        },
        600: {
          margin: 20,
          items: 3
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          items: 4
        }
      }
    });


    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        autoHeight: false,
        dots: false,
        nav: true,
        navText: ["<i class='fas fa-paw'>", "<i class='fas fa-paw'>"],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            768: {
                items: 1,
            }
        }
    });



    "use strict";
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }
    new WOW().init();
})(window.jQuery);