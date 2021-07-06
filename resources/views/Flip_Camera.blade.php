<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- import the webpage's stylesheet -->
    <style type="text/css">
      body {
  font-family: "Benton Sans", "Helvetica Neue", helvetica, arial, sans-serif;
  padding: 0;
  margin: 0;
  background: #000;
}

#camera-stream {
  position: absolute;
  width: 100%;
  height: 100%;
}

#flip-btn {
  position: absolute;
  bottom: 10px;
  right: 10px;
  padding: 10px 20px;
  
}
    </style>
    
    <!-- import the webpage's javascript file -->
    <!-- <script src="/script.js" defer></script> -->
    <script type="text/javascript">
      // camera stream video element
let videoElm = document.querySelector('#camera-stream');
// flip button element
let flipBtn = document.querySelector('#flip-btn');

// default user media options
let defaultsOpts = { audio: false, video: true }
let shouldFaceUser = true;

// check whether we can use facingMode
let supports = navigator.mediaDevices.getSupportedConstraints();
if( supports['facingMode'] === true ) {
  flipBtn.disabled = false;
}

let stream = null;

function capture() {
  defaultsOpts.video = { facingMode: shouldFaceUser ? 'user' : 'environment' }
  navigator.mediaDevices.getUserMedia(defaultsOpts)
    .then(function(_stream) {
      stream  = _stream;
      videoElm.srcObject = stream;
      videoElm.play();
    })
    .catch(function(err) {
      console.log(err)
    });
}

flipBtn.addEventListener('click', function(){
  if( stream == null ) return
  // we need to flip, stop everything
  stream.getTracks().forEach(t => {
    t.stop();
  });
  // toggle / flip
  shouldFaceUser = !shouldFaceUser;
  capture();
})

capture();
    </script>
  </head>  
  <body>
    <video id="camera-stream"></video>
    <button disabled id="flip-btn">
      Flip Camera
    </button>
  </body>
</html>
