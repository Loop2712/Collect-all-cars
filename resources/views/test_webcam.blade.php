<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display Webcam Stream</title>
 
<style>
#container {
	margin: 0px auto;
	width: 500px;
	height: 350px;
	border: 5px #333 solid;
}
#videoElement {
	width: 500px;
	height: 350px;
	background-color: #666;
}
#canvas {
	width: 500px;
	height: 375px;
	background-color: #666;
}
#photo {
	width: 800px;
	height: 375px;
	background-color: #666;
}
</style>
</head>
 
<body>
<div id="container" style="position: absolute;right: 40px;top: 5%;z-index: 2;margin-left: 40px;">
	<video autoplay="true" id="videoElement">
	
	</video>
	<img style="position: relative;top: -300px;left: 10px; z-index: 5; color: #fff;" width="100%" src="{{ asset('/img/more/testtest.png') }}">
</div>
<canvas style="display:none" id="canvas"></canvas>
	<img src="" id="photo">
	<button onclick="stop();">STOP</button>
	<button onclick="capture();">capture</button>
	<input type="text" name="" id="text_img" readonly>
<script>
	var video = document.querySelector("#videoElement");
	var photo = document.querySelector("#photo");
	var canvas = document.querySelector("#canvas");
	var text_img = document.querySelector("#text_img");
	var context = canvas.getContext('2d');

	if (navigator.mediaDevices.getUserMedia) {
	  navigator.mediaDevices.getUserMedia({ video: true })
	    .then(function (stream) {
	      video.srcObject = stream;
	    })
	    .catch(function (err0r) {
	      console.log("Something went wrong!");
	    });
	}

	function stop(e) {
	  var stream = video.srcObject;
	  var tracks = stream.getTracks();

	  for (var i = 0; i < tracks.length; i++) {
	    var track = tracks[i];
	    track.stop();
	  }

	  video.srcObject = null;
	}

	function capture() {
	   	context.drawImage(video, 90, 130, 1000, 450, 0, 0, 500, 250);
	   	photo.setAttribute('src',canvas.toDataURL('image/png'));
	   	text_img.value = canvas.toDataURL('image/png');
	}
</script>
</body>
</html>