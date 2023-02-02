@extends('layouts.viicheck')

@section('content')

<div class="row notranslate" style="margin-top:200px;">
	<div class="col-12 text-center">
		<h1>HELP</h1>
		<p>SOS ID : {{ $data_sos->id }}</p>

		<p>LAT : <span id="text_officers_lat">{ $data_sos->lat }</span></p>
		<p>LONG : <span id="text_officers_lng">{ $data_sos->lng }</span></p>

		<span class="btn btn-primary main-shadow main-radius" style="width:20%;" onclick="update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}');">
			ถึงที่เกิดเหตุ
		</span>

	</div>
</div>
	

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
		reface_getLocation = setInterval(function() {

            getLocation();

        }, 15000);

    });

    function myStop_reface_getLocation() {
        clearInterval(reface_getLocation);
    }

	function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(showPosition);
	  	} else {
	    	// x.innerHTML = "Geolocation is not supported by this browser.";
	  	}
	}

	function showPosition(position) {

		let lat = position.coords.latitude ;
		let lng = position.coords.longitude ;

		console.log(lat);
		console.log(lng);

		document.querySelector('#text_officers_lat').innerHTML = lat ;
        document.querySelector('#text_officers_lng').innerHTML = lng ;

        fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat + "/" + lng)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                // if (result['status_sos'] === 'ถึงที่เกิดเหตุ') {
                //     myStop_reface_getLocation();
                // }

        });

	}

	function update_status(status , sos_id){

		fetch("{{ url('/') }}/api/update_status_officer" + "/" + status + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                console.log(result);

        });
	}

</script>
@endsection
