
<style>
  
  #map_show_hospital {
      height: calc(86vh);
    }

</style>

<!-- Button trigger modal -->
<button id="btn_open_modal_cf_select_hospital" type="button" class="d-none" data-toggle="modal" data-target="#modal_cf_select_hospital"></button>

<!-- Modal -->
<div class="modal fade" id="modal_cf_select_hospital" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:999999!important;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label_cf_select_hospital">โปรดยืนยัน</h5>
      </div>
      <div id="content_modal_cf_hospital" class="modal-body">
        <!--  -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="show_hospital" tabindex="-1" aria-labelledby="show_hospitalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen p-5" style="position: relative;">
    <div class="modal-content">
      <div class="modal-body">

          <div class="col-12 row">
              <div class="col-9"></div>
              <div class="col-3 card border-top border-0 border-4 border-primary" style="position: absolute;top: 1%;right: 2%;z-index: 999999!important;">
                <div class="card-body p-3">
                  <div class="card-title d-flex align-items-center">
                    <div>
                      <i class="fa-solid fa-hospital me-1 font-22 text-primary"></i>
                    </div>
                    <h4 class="mb-0 text-primary">รายชื่อโรงพยาบาล</h4>
                  </div>
                  <hr>

                  <div id="no_to_hospital_id" class="row g-3">
                    <div class="col-12">
                      <label for="inputCity" class="form-label">ประเภทหน่วยบริการสุขภาพ</label>
                      <select class="form-control" name="select_hospital" id="select_hospital" onchange="change_select_hospital();">
                        <option selected value="all">เลือกประเภท</option>
                        <option value="คลินิกเอกชน">คลินิกเอกชน</option>
                        <option value="ศูนย์บริการสาธารณสุข">ศูนย์บริการสาธารณสุข</option>
                        <option value="ศูนย์บริการสาธารณสุข อปท.">ศูนย์บริการสาธารณสุข อปท.</option>
                        <option value="ศูนย์สุขภาพชุมชน ของ รพ. / เมือง (ศสม.)">ศูนย์สุขภาพชุมชน ของ รพ. / เมือง (ศสม.)</option>
                        <option value="สำนักงานสาธารณสุขจังหวัด">สำนักงานสาธารณสุขจังหวัด</option>
                        <option value="สำนักงานสาธารณสุขอำเภอ">สำนักงานสาธารณสุขอำเภอ</option>
                        <option value="โรงพยาบาลชุมชน">โรงพยาบาลชุมชน</option>
                        <option value="โรงพยาบาลทั่วไป">โรงพยาบาลทั่วไป</option>
                        <option value="โรงพยาบาลเอกชน">โรงพยาบาลเอกชน</option>
                      </select>
                    </div>

                    <hr>

                    <!-- content name hospital -->
                    <div id="content_name_hospital" class="col-12">
                      <!-- <div class="d-flex align-items-top">
                        <div class="ps-2">
                          <h6 class="mb-1 font-weight-bold">Jordan Ntolo
                            <span class="text-primary float-end font-13"></span>
                          </h6>
                          <p class="mb-0 font-13 text-secondary">
                            My item doesn't ship to correct address. Please check It Proper
                          </p>
                        </div>
                      </div> -->
                    </div>

                  </div>

                  <div id="have_to_hospital_id" class="row g-3 d-none">
                    <div class="col-12">
                        <h5><b>คุณส่งต่อข้อมูลแล้ว</b></h5>
                        <p><b>ส่งข้อมูลยังไป..</b></p>
                        <hr>
                    </div>
                    <div id="content_have_to_hospital_id" class="col-12">
                      <!--  -->
                    </div>
                  </div>

                </div>
              </div>
          </div>

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

            let content_name_hospital = document.querySelector('#content_name_hospital');
                content_name_hospital.innerHTML = '';
            let content_have_to_hospital_id = document.querySelector('#content_have_to_hospital_id');
                content_have_to_hospital_id.innerHTML = '';

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

              let html ;

              if("{{ $sos_help_center->hospital_office_id }}"){

                if("{{ $sos_help_center->hospital_office_id }}" == result[i].id){

                  html = `
                      <div class="have_data_hospital_id">
                      <div class="d-flex align-items-top mb-2">
                        <div class="ps-2">
                          <h5 class="mb-1 font-weight-bold">
                            `+result[i].name+`
                          </h5>
                          <p class="font-14">
                            <span class="text-primary"><b>`+result[i].health_type+`</b></span>
                            <br>
                            <span class="mb-2">
                              <b>อำเภอ</b> : `+result[i].district+` <b>ตำบล</b> : `+result[i].sub_district+`
                            </span>
                            <br>
                            <span><b>ที่อยู่</b> : `+result[i].address+`</span>
                            <br>
                            <div class="col-12 row mt-2">
                              <span class="col-6 text-primary float-start font-13">.. กม.</span>
                              <span class="col-6 text-primary float-end font-13"></span>
                            </div>
                          </p>
                        </div>
                      </div>
                      <hr>
                      </div>
                  `;

                  content_have_to_hospital_id.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                  document.querySelector('#no_to_hospital_id').classList.add('d-none');
                  document.querySelector('#have_to_hospital_id').classList.remove('d-none');
                }

              }
              else{

                html = `
                    <div health_type="`+result[i].health_type+`" class="div_health_type">
                    <div class="d-flex align-items-top mb-2">
                      <div class="ps-2">
                          <h5 class="mb-1 font-weight-bold">
                            `+result[i].name+`
                          </h5>
                          <p class="font-14">
                            <span class="text-primary"><b>`+result[i].health_type+`</b></span>
                            <br>
                            <span class="mb-2">
                              <b>อำเภอ</b> : `+result[i].district+` <b>ตำบล</b> : `+result[i].sub_district+`
                            </span>
                            <br>
                            <span><b>ที่อยู่</b> : `+result[i].address+`</span>
                            <br>
                          <div class="col-12 row mt-2">
                            <span class="col-6 text-primary float-start font-13">.. กม.</span>
                            <span class="col-6 float-end btn btn-sm btn-info" onclick="click_select_hospital('`+result[i].id+`','`+result[i].name+`');">
                              เลือก
                            </span>
                          </div>
                        </p>
                      </div>
                    </div>
                    <hr>
                    </div>
                `;

                content_name_hospital.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                document.querySelector('#no_to_hospital_id').classList.remove('d-none');
                document.querySelector('#have_to_hospital_id').classList.add('d-none');

              }


            }
      });
  }

  function change_select_hospital(){

    let count = 0 ;
    let select_hospital = document.querySelector('#select_hospital');

    let div_health_type = document.querySelectorAll('.div_health_type');

    if(select_hospital.value == 'all'){
      div_health_type.forEach(item => {
          // console.log(item);
          item.classList.remove('d-none');
          count = count + 1 ;
      })
    }
    else{
      div_health_type.forEach(item => {
          // console.log(item);
          item.classList.add('d-none');
      })

      let health_type = document.querySelectorAll('div[health_type="'+select_hospital.value+'"]');
      health_type.forEach(type => {
          type.classList.remove('d-none');
          count = count + 1 ;
      });
    }

    // console.log(select_hospital.value);
    // console.log("count >> " + count);


  }

  function click_select_hospital(hospital_id , hospital_name){
    console.log(hospital_id);

    let content_modal_cf_hospital = document.querySelector('#content_modal_cf_hospital')
        content_modal_cf_hospital.innerHTML = '';

    let html = `
      <div class="text-center">
        <center>
        <img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/7.png" width="150">
        </center>
        <br>
        <br>
        <h5 class="text-danger">ยืนยันการเลือก</h5>
        <h3 class="mt-2 mb-2"><b>`+hospital_name+`</b></h3>
      </div>
      <div class="float-end mt-3">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="cf_select_hospital('`+hospital_id+`')">ยืนยัน</button>
      </div>
    `;

    content_modal_cf_hospital.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
    
    document.querySelector('#btn_open_modal_cf_select_hospital').click();

  }

  function cf_select_hospital(hospital_id){

    let sos_1669_id = "{{ $sos_help_center->id }}";

    fetch("{{ url('/') }}/api/create_1669_to_hospitals/" + hospital_id + "/" + sos_1669_id + "/{{ Auth::user()->id }}")
        .then(response => response.text())
        .then(result => {
            console.log(result);

    });

  }

</script>
