
<button class="btn btn-warning btn-sm" onclick="runLoop();">
	test_distance
</button>

<script>
	var i = 0;
	var distance  = 800 ;

	let worked_100 = false;
	let worked_300 = false;
	let worked_500 = false;

	let arr = ["เลี้ยวซ้าย","กลับรถ","เลี้ยวขวา"] ;

	function runLoop() {
	  	let random = Math.floor(Math.random() * 50);

	  	console.log("random => " + random);
	  	console.log("ระยะทางที่เหลือ => " + distance);

	  	if (distance <= 50) {
		    console.log(">>>>>>>>> --------------------------- <<<<<<<<<");
		    console.log(">>>>>>>>>  แจ้งผู้ใช้ให้เปลี่ยนเส้นทาง " + arr[i] + "  <<<<<<<<<");
		    viicheck_speech("เปลี่ยนเส้นทาง " + arr[i] );
		    console.log(">>>>>>>>> --------------------------- <<<<<<<<<");
	    	i++;

	    	distance = 80 * random;

		    if (arr[i]) {
		      	console.log("หัวข้อการนำทางต่อไป = " + arr[i] + "  ระยะใหม่ : " + distance);
		    } else {
		      	console.log("ถึงปลายทางของท่านแล้ว");
		      	viicheck_speech("ถึงปลายทางของท่านแล้ว");
		    }

	    	worked_100 = false;
	    	worked_300 = false;
	    	worked_500 = false;
	  	} else {
		    if (distance <= 100 && !worked_100 && worked_500 && worked_300) {
		      	console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);
		      	viicheck_speech(" อีก 100 เมตร " + arr[i]);

		     	worked_100 = true;
		      	worked_300 = true;
		      	worked_500 = true;
		    }
		    if (distance <= 300 && !worked_300 && !worked_100) {
		      	console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);
		      	viicheck_speech(" อีก 300 เมตร " + arr[i]);

		      	worked_300 = true;
		      	worked_500 = true;
		    }
		    if (distance <= 500 && !worked_500) {
		      	console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);
		      	viicheck_speech(" อีก 500 เมตร " + arr[i]);
		      	worked_500 = true;
		    }

		    distance -= random;
	  	}

	  	if (i < 3) {
	    	setTimeout(runLoop, 500);
	  	}
	}

	// runLoop();

	
	function old_test_distance(distance){

		let worked_100 = false;
		let worked_300 = false;
		let worked_500 = false;

		let arr = ["เลี้ยวซ้าย","กลับรถ","เลี้ยวขวา"] ;

		for (var i = 0; i < 3;) {

			let random = Math.floor(Math.random() * 50);

			console.log("random => " + random);

			console.log("ระยะทางที่เหลือ => " + distance);

		  	if (distance <= 50) {

			    console.log(">>>>>>>>> --------------------------- <<<<<<<<<");
			    console.log(">>>>>>>>>  แจ้งผู้ใช้ให้เปลี่ยนเส้นทาง " + arr[i] + "  <<<<<<<<<");
			    console.log(">>>>>>>>> --------------------------- <<<<<<<<<");
				i++ ;

		  		distance = 100 * random;

			    if (arr[i]) {
					console.log("หัวข้อการนำทางต่อไป = " + arr[i] + "  ระยะใหม่ : " + distance);
				}else{
					console.log("ถึงปลายทางของท่านแล้ว");
					viicheck_speech("ถึงปลายทางของท่านแล้ว");
				}

			    worked_100 = false;
			    worked_300 = false;
			    worked_500 = false;
			    
		  	} else {
		  		if (distance <= 100 && !worked_100 && worked_100 && worked_300) {
		      		console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);

		      		worked_100 = true;
			    	worked_300 = true;
			    	worked_500 = true;
		    	}
		    	if (distance <= 300 && !worked_300 && !worked_100) {
		      		console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);

			    	worked_300 = true;
			    	worked_500 = true;
		    	}
		    	if (distance <= 500 && !worked_500) {
			      	console.log("------------- >>>>> Speak อีก " + distance + " " + arr[i]);
			      	worked_500 = true;
		    	}
		    	
		    	
		    		distance -= random;
		  	}

		}

	}

	function viicheck_speech(message_speech){

		// console.log("viicheck_speech >> " + message_speech)

		// check if the browser supports the Web Speech API
		if ('speechSynthesis' in window) {

		  	// create a new SpeechSynthesisUtterance object
		  	const message = new SpeechSynthesisUtterance();

		  	// set the text that you want to convert to audio in Thai
		  	message.text = message_speech;

		  	// set the language to use (in this case, Thai)
		  	message.lang = 'th-TH';

		  	// get the Thai voice from the available voices
		 	 const voices = window.speechSynthesis.getVoices();
		  	// filter for a female voice
		  	const femaleVoice = voices.find(voice => voice.lang === 'th-TH' && voice.name.includes('Female'));
		  	message.voice = femaleVoice;

		  	// set the volume, pitch, and rate
		  	message.volume = 1;
		 	message.pitch = 0.75;
		  	message.rate = 0.75;

		  	// play the audio
		  	window.speechSynthesis.speak(message);

		}

	}

</script>