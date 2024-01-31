
<style>
  
  #map_show_hospital {
      height: calc(80vh);
    }

</style>

<!-- Modal -->
<div class="modal fade" id="show_hospital" tabindex="-1" aria-labelledby="show_hospitalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body">
          <div id="map_show_hospital"></div>
      </div>
    </div>
  </div>
</div>

<script>
  
  function open_map_show_hospital(){

      let sos_lat = document.querySelector('#lat');
      let sos_lng = document.querySelector('#lng');
      console.log(parseFloat(sos_lat.value));
      console.log(parseFloat(sos_lng.value));

      let m_lat = parseFloat(sos_lat.value);
      let m_lng = parseFloat(sos_lng.value);
      let m_numZoom = parseFloat('17');

      map_show_hospital = new google.maps.Map(document.getElementById("map_show_hospital"), {
          center: {lat: m_lat, lng: parseFloat(m_lng + 0.002) },
          zoom: m_numZoom,
      });

      if (sos_lat.value && sos_lng.value) {
          if (sos_go_to_help_marker) {
              sos_go_to_help_marker.setMap(null);
          }

          sos_go_to_help_marker = new google.maps.Marker({
              position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
              map: map_show_hospital,
              icon: image_sos,
          });
      }

      console.log("{{ Auth::user()->sub_organization }}");

      fetch("{{ url('/') }}/api/get_hospital_offices/"+ "{{ Auth::user()->sub_organization }}")
        .then(response => response.json())
        .then(result => {
            console.log(result);

            for (var i = 0; i < result.length; i++) {

              let icon_marker ;

              if(result[i].health_type == "คลินิกเอกชน"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/คลินิกเอกชน.png') }}";
              }
              else if(result[i].health_type == "ศูนย์บริการสาธารณสุข"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/ศูนย์บริการสาธารณสุข.png') }}";
              }
              else if(result[i].health_type == "ศูนย์บริการสาธารณสุข อปท."){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/ศูนย์บริการสาธารณสุข อปท.png') }}";
              }
              else if(result[i].health_type == "ศูนย์สุขภาพชุมชน ของ รพ. / เมือง (ศสม.)"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/ศูนย์สุขภาพชุมชน ของ รพ.  เมือง (ศสม.).png') }}";
              }
              else if(result[i].health_type == "สำนักงานสาธารณสุขจังหวัด"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/สำนักงานสาธารณสุขจังหวัด.png') }}";
              }
              else if(result[i].health_type == "สำนักงานสาธารณสุขอำเภอ"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/สำนักงานสาธารณสุขอำเภอ.png') }}";
              }
              else if(result[i].health_type == "โรงพยาบาลชุมชน"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/โรงพยาบาลชุมชน.png') }}";
              }
              else if(result[i].health_type == "โรงพยาบาลทั่วไป"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/โรงพยาบาลทั่วไป.png') }}";
              }
              else if(result[i].health_type == "โรงพยาบาลเอกชน"){
                icon_marker = "{{ url('/img/icon/operating_unit/หมุดโรงพยาบาล/โรงพยาบาลเอกชน.png') }}";
              }

              marker = new google.maps.Marker({
                  position: {lat: parseFloat(result[i].lat) , lng: parseFloat(result[i].lng) },
                  map: map_show_hospital,
                  icon: icon_marker,
              });

            }
      });
  }

</script>
