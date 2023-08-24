<style>
	#map_show_officer_all {
      height: calc(100%);
    }

    .card{
    	background-color: white;
    	padding: 20px;
    	border-radius: 15px;
    	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }
</style>

<div class="card" style="position:absolute;z-index: 99999;top: 10%;left: 1%;">
	<div class="card-body">
		<div>
			<h3 class="card-title">ข้อมูลหน่วยปฏิบัติการ</h3>
		</div>
		<p class="card-text" style="line-height: 25px;">
			จำนวนทั้งหมดหน่วยปฏิบัติการทั้งหมด : <b>{{ count($data_officer_all) }}</b> <br>
			พร้อมช่วยเหลือ : <b>{{ count($data_officer_ready) }}</b> <br>
			กำลังช่วยเหลือ : <b>{{ count($data_officer_helping) }}</b> <br>
			ไม่อยู่ : <b>{{ count($data_officer_Not_ready) }}</b> <br>
		</p>
	</div>
</div>

<div id="map_show_officer_all">
	
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        open_map_show_data_officer_all();

    });

    let map_show_data_officer_all ;
    let marker ;
    let markers = [] ;

    let image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    let image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    let image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
    let image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	function open_map_show_data_officer_all() {

        let m_lat = parseFloat('12.870032');
        let m_lng = parseFloat('100.992541');
        let m_numZoom = parseFloat('6.5');

        map_show_data_officer_all = new google.maps.Map(document.getElementById("map_show_officer_all"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        let icon_level ;

        @foreach($data_officer_ready as $item)

        	if( "{{ $item->level }}" === "FR" ){
        		icon_level = image_operating_unit_green ;
        	}else if( "{{ $item->level }}" === "BLS" ){
        		icon_level = image_operating_unit_yellow ;
        	}else{
        		icon_level = image_operating_unit_red ;
        	}

	        marker = new google.maps.Marker({
	            position: {lat: parseFloat({{ $item->lat }}) , lng: parseFloat({{ $item->lng }}) },
	            map: map_show_data_officer_all,
	            icon: icon_level,
	        });
	        markers.push(marker);
	    @endforeach
      
    }

</script>