
<style>

  #map_show_hospital {
      height: calc(86vh);
    }
    .switcher-data-sos {
        position: absolute;
        z-index: 999;
        right: 1%;
        margin-top: 25%;
        opacity: 1;

    }
    .switcher-btn-sos {
        opacity: 1 !important;
        border-radius: 10px 0 0 10px;
        color: #000;
        background-color: #fff;
        margin-left: -56px;
        height: 110px;
        background-color: #fff;
        position: absolute;
    }
    .hospital-open {
      animation: slide-hospital-open 1s ease 0s 1 normal forwards;
    }
    @keyframes slide-hospital-open {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(0px);
        }
    }

    .hospital-close {
        animation: slide-hospital-close 1s ease 0s 1 normal forwards;
    }

    @keyframes slide-hospital-close {
        0% {
            transform: translateX(0px);
        }

        100% {
            transform: translateX(111%);
        }
    }
    #content_name_hospital .div_health_type:hover{
      background-color: #f7f8f8;

    }.btn-hospital{
      padding: 5px 5px;
      border: 1px solid #8833ff!important;
      color: #8833ff;
      transition: all .15s ease-in-out;
    }.btn-hospital:hover{
      background-color: #8833ff;
      color: #fff;
    }.loading-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark__circle_modal {
				    stroke-dasharray: 166;
				    stroke-dashoffset: 166;
				    stroke-width: 2;
				    stroke-miterlimit: 10;
				    stroke: #29cc39;
				    fill: none;
				    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
				}

				.checkmark_modal {
				    width: 80px;
				    height: 80px;
				    border-radius: 50%;
				    display: block;
				    stroke-width: 2;
				    stroke: #29cc39;
				    stroke-miterlimit: 10;
				    margin: 10% auto;
				    box-shadow: inset 0px 0px 0px #29cc39;
				    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
				}

				.checkmark__check_modal {
				    transform-origin: 50% 50%;
				    stroke-dasharray: 48;
				    stroke-dashoffset: 48;
				    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
				}

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }
</style>

<!-- Button trigger modal -->
<button id="btn_open_modal_cf_select_hospital" type="button" class="d-none" data-toggle="modal" data-target="#modal_cf_select_hospital"></button>

<!-- Modal -->
<div class="modal fade" id="modal_cf_select_hospital" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:999999!important;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 15px;">
        <button id="close_modal_cf_select_hospital" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="Label_cf_select_hospital">โปรดยืนยัน</h5>
        </div> -->
      <div id="content_modal_cf_hospital" class="modal-body">
        <!--  -->
      </div>

      <div id="success_modal_cf_hospital" class="modal-body d-none">
        <div class="loading-container">
            <div class="loading-spinner"></div>

            <div class="contrainerCheckmark d-none my-5">
                <svg class="checkmark_modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle_modal" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check_modal" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
                <center>
                    <h5 class="mt-5 mb-5">เสร็จสิ้น</h5>
                </center>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="show_hospital" tabindex="-1" aria-labelledby="show_hospitalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen p-5" style="position: relative;">
    <div class="modal-content" >
        <button id="close_modal_show_hospital" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body"style="overflow: hidden;">

          <div class="col-12 row">
              <div class="col-9"></div>
              <div id="testt" class="card border-top border-0 border-4 border-primary hospital-open" style="width: 380px;position: absolute;top: 1%;right: 2%;z-index: 999999!important;height: calc(86vh);">
                <button class="btn switcher-btn-sos mt-2 ml-2" onclick="hide_data_hospital()">
                  <i class="fa-solid fa-chevron-right hide-data-sos"></i>
                </button>

                <div class="card-body p-3" style="overflow: auto;">
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
                      <!-- <input class="form-control" name="select_hospital" id="select_hospital"  list="datalist_select_hospital" placeholder="กรอกประเภท" onchange="change_select_hospital();">
                      <datalist id="datalist_select_hospital">
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
                      </datalist> -->
                    </div>

                    <hr>

                    <!-- content name hospital -->
                    <div id="content_name_hospital" class="col-12 px-0">
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
                  <div>
                  </div>
                  <div id="have_to_hospital_id" class="row g-3 d-none">
                    <div class="col-12">
                        <h5><b>คุณส่งต่อข้อมูลแล้ว</b></h5>
                        <p><b>ส่งข้อมูลไปยัง..</b></p>
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
      function hide_data_hospital() {
          document.querySelector('#testt').classList.toggle('hospital-close');
          document.querySelector('.hide-data-sos').classList.toggle('rotate');
      }

  </script>
<script>
    var sos_marker_hospital;
    var sos_hospital_id = "{{ $sos_help_center->hospital_office_id }}";
  function open_map_show_hospital(){

      let sos_lat = document.querySelector('#lat');
      let sos_lng = document.querySelector('#lng');
      console.log(parseFloat(sos_lat.value));
      console.log(parseFloat(sos_lng.value));

      let m_lat = parseFloat(sos_lat.value);
      let m_lng = parseFloat(sos_lng.value);
      let m_numZoom = parseFloat('14');

      map_show_hospital = new google.maps.Map(document.getElementById("map_show_hospital"), {
          center: {lat: m_lat, lng: parseFloat(m_lng + 0.002) },
          zoom: m_numZoom,
      });

      if (sos_lat.value && sos_lng.value) {
          if (sos_marker_hospital) {
              sos_marker_hospital.setMap(null);
          }

          sos_marker_hospital = new google.maps.Marker({
              position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
              map: map_show_hospital,
              icon: image_sos,
          });
      }

      console.log("{{ Auth::user()->sub_organization }}");

      fetch("{{ url('/') }}/api/get_hospital_offices" + "/" + m_lat + "/" + m_lng + "/" + "{{ Auth::user()->sub_organization }}")
        .then(response => response.json())
        .then(result => {
            console.log("result get_hospital_offices");
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

                if(sos_hospital_id){

                    if(sos_hospital_id == result[i].id){

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
                        <div class="d-flex align-items-top py-2">
                        <div class="ps-2">
                            <h6 class="mb-1 font-weight-bold">
                                `+result[i].name+`
                            </h6>
                            <p class="font-14">
                                <span class="text-primary"><b>`+result[i].health_type+`</b></span>
                                <span>·</span>

                                <span>`+result[i].address+`</span>
                                <br>
                                <div class="d-flex justify-content-between align-items-center  mt-2">
                                <span class="col-6 text-primary" style="font-size:18px">`+result[i].distance.toFixed(2)+` กม.</span>

                                <span class="col-6 float-end btn btn-hospital" onclick="click_select_hospital('`+result[i].id+`','`+result[i].name+`');">
                                เลือก
                                </span>
                            </div>
                            </p>
                        </div>
                        </div>
                        <hr class="m-0">
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
    console.log("click_select_hospital hospital_id");
    console.log(hospital_id);

    let content_modal_cf_hospital = document.querySelector('#content_modal_cf_hospital')
        content_modal_cf_hospital.innerHTML = '';

    let html = `
      <div class="text-center p-3">
        <center>
        <img src="{{ url('/img/stickerline/PNG/7.png') }}"  width="150">
        </center>
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
    console.log("cf_select_hospital");
    let sos_1669_id = "{{ $sos_help_center->id }}";

    document.querySelector('#content_modal_cf_hospital').classList.toggle('d-none');
    document.querySelector('#success_modal_cf_hospital').classList.toggle('d-none');

    fetch("{{ url('/') }}/api/create_1669_to_hospitals/" + hospital_id + "/" + sos_1669_id + "/{{ Auth::user()->id }}")
        .then(response => response.json())
        .then(result => {
            console.log("result create_1669_to_hospitals");
            console.log(result);

            setTimeout(() => {
                console.log("result setTimeout");

                document.querySelector('#content_name_hospital').innerHTML = '';
                document.querySelector('#content_have_to_hospital_id').innerHTML = '';

                let html_success = `
                    <div class="have_data_hospital_id">
                        <div class="d-flex align-items-top mb-2">
                            <div class="ps-2">
                                <h5 class="mb-1 font-weight-bold">
                                    `+result.name+`
                                </h5>
                                <p class="font-14">
                                    <span class="text-primary"><b>`+result.health_type+`</b></span>
                                    <br>
                                    <span class="mb-2">
                                        <b>อำเภอ</b> : `+result.district+` <b>ตำบล</b> : `+result.sub_district+`
                                    </span>
                                    <br>
                                    <span><b>ที่อยู่</b> : `+result.address+`</span>
                                    <br>

                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                  `;

                console.log("html_success :"+html_success);
                content_have_to_hospital_id.insertAdjacentHTML('beforeend', html_success); // แทรกล่างสุด
                console.log("html_success created");

                document.querySelector('#no_to_hospital_id').classList.add('d-none');
                document.querySelector('#have_to_hospital_id').classList.remove('d-none');

                let show_status_header = document.querySelector('#show_status_header');
                let result_name_html = `<span class="d-block h6" id="name_referral_hospital" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            ส่งต่อไปยัง : <b>`+result.name+`</b>
                                        </span>`;
                if (show_status_header) {
                    show_status_header.insertAdjacentHTML('beforeend', result_name_html); // แทรกล่างสุด
                } else {
                    console.error("Element with id 'show_status_header' not found.");
                }

                document.querySelector('#close_modal_cf_select_hospital').click();
                document.querySelector('#close_modal_show_hospital').click();

                document.querySelector('.loading-spinner').classList.toggle('d-none');
                document.querySelector('.contrainerCheckmark').classList.toggle('d-none');

                sos_hospital_id = result.id;
            }, 2000)

        }).catch(function(error){
            console.error("error cf_select_hospital");
            console.error(error);
        });

    }


</script>
