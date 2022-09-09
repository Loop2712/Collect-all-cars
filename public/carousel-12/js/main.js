$(function () {
  if ($('.owl-1').length > 0) {
    $('.owl-1').owlCarousel({
      loop:true,
      margin:10,
      smartSpeed: 1000,
      autoplay: true,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:true
          },
          600:{
              items:4,
              nav:false
          },
          1000:{
              items:6,
              nav:true
          }
      }
    });
  }


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
          items: 1
        },
        700: {
          margin: 20,
          stagePadding: 0,
          nav: true,
          items: 2
        },
        600: {
          margin: 20,
          nav: true,
          items: 6
        },
        1000: {
          margin: 0,
          stagePadding: 0,
          nav: true,
          items: 6
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

  if ($('.owl-4').length > 0) {
    $('.owl-4').owlCarousel({
      loop:true,
      margin:10,
      smartSpeed: 1000,
      autoplay: true,
      responsiveClass:true,
      responsive:{
          0:{
              items:6,
              nav:true
          },
          600:{
              items:6,
              nav:false
          },
          1000:{
              items:6,
              nav:true
          }
      }
    });
  }
  if ($('.owl-5').length > 0) {
    $('.owl-5').owlCarousel({
      loop:true,
      margin:10,
      smartSpeed: 1000,
      autoplay: true,
      responsiveClass:true,
      responsive:{
          0:{
              items:11,
              nav:true
          },
          600:{
              items:11,
              nav:false
          },
          1000:{
              items:11,
              nav:true
          }
      }
    });
  }
  if ($('.owl-4').length > 0) {
    $('.owl-4').owlCarousel({
      loop:true,
      margin:10,
      smartSpeed: 1000,
      autoplay: true,
      responsiveClass:true,
      responsive:{
          0:{
              items:6,
              nav:true
          },
          600:{
              items:6,
              nav:false
          },
          1000:{
              items:1,
              nav:true
          }
      }
    });
  }
  
  if ($('.owl-5').length > 0) {
    $('.owl-5').owlCarousel({
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
  

})