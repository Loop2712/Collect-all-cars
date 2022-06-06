$(function () {
  if ($('.owl-3').length > 0) {
    $('.owl-3').owlCarousel({
      center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: true,
      dots: true,
      pauseOnHover: false,
      responsive: {
        0: {
          margin: 20,
          nav: true,
          items: 5
        },
        700: {
          margin: 20,
          stagePadding: 0,
          nav: true,
          items: 7
        },
        600: {
          margin: 20,
          nav: true,
          items: 10
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          nav: true,
          items: 11
        }
      }
    });
  }
  
  if ($('.owl-2').length > 0) {
    $('.owl-2').owlCarousel({
      center: false,
      items: 1,
      loop: true,
      stagePadding: 0,
      margin: 20,
      smartSpeed: 1000,
      autoplay: true,
      nav: true,
      dots: true,
      pauseOnHover: false,
      responsive: {
        600: {
          margin: 20,
          nav: true,
          items: 2
        },
        700: {
          margin: 20,
          stagePadding: 0,
          nav: true,
          items: 3
        },
        800: {
          margin: 20,
          nav: true,
          items: 4
        },
        1000: {
          margin: 20,
          stagePadding: 0,
          nav: true,
          items: 5
        }
      }
    });
  }


  

})