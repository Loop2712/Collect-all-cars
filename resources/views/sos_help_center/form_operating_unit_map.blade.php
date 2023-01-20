<div class="container">
	<div class="row">
        <div id="map_operating_unit"></div>
	</div>
</div>

<script>

function map_operating_unit() {
    let sos_lat = document.querySelector('#lat'); 
    let sos_lng = document.querySelector('#lng'); 
        // console.log(parseFloat(lat.value));
        // console.log(parseFloat(lng.value));

    let m_lat = "";
    let m_lng = "";
    let m_numZoom = "";

    if (sos_lat.value && sos_lng.value) {
        m_lat = parseFloat(sos_lat.value);
        m_lng = parseFloat(sos_lng.value);
        m_numZoom = parseFloat('14');
    }else{
        m_lat = parseFloat('12.870032');
        m_lng = parseFloat('100.992541');
        m_numZoom = parseFloat('6');
    }
    
    map_operating_unit = new google.maps.Map(document.getElementById("map_operating_unit"), {
        center: {lat: m_lat, lng: m_lng },
        zoom: m_numZoom,
    });

    if (sos_lat.value && sos_lng.value) {
        if (operating_marker) {
            operating_marker.setMap(null);
        }

        operating_marker = new google.maps.Marker({
            position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
            map: map_operating_unit,
            icon: image,
        });
        operating_markers.push(operating_marker);
    }

}

</script>