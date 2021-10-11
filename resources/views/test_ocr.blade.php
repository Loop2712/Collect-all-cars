<!DOCTYPE html>
<html>
  <head>
    <title>Event Click LatLng</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
    <style>
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }



    </style>
    <link rel="stylesheet" href="{{ asset('/partner/css/menu_color.css') }}">

  </head>
  <body>
    <div class='selector'>
  <ul>
    <li>
      <input id='c1' type='checkbox'>
      <label for='c1'>Option 1</label>
    </li>
    <li>
      <input id='c2' type='checkbox'>
      <label for='c2'>Option 2</label>
    </li>
    <li>
      <input id='c3' type='checkbox'>
      <label for='c3'>Option 3</label>
    </li>
    <li>
      <input id='c4' type='checkbox'>
      <label for='c4'>Option 4</label>
    </li>
    <li>
      <input id='c5' type='checkbox'>
      <label for='c5'>Option 5</label>
    </li>
    <li>
      <input id='c6' type='checkbox'>
      <label for='c6'>Option 6</label>
    </li>
    <li>
      <input id='c7' type='checkbox'>
      <label for='c7'>Option 7</label>
    </li>
    <li>
      <input id='c8' type='checkbox'>
      <label for='c8'>Option 8</label>
    </li>
  </ul>
  <button>Click here</button>
</div>
<script>
  var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }
}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 100);
</script>


    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"
      async
    ></script>

    
  </body>
</html>