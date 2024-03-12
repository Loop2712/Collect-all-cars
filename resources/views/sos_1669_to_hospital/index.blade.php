@extends('layouts.partners.theme_hospital')

@section('content')

<div class="row row-cols-1">

    <div class="col">
        <div class="row">
            <div class="col-3">
                <h4 id="title_select_view" class="mb-0 text-uppercase">
                    เคสทั้งหมด (<span id="count_case_select"></span>)
                </h4>
            </div>
            <div class="col-9">
                <div class="col float-end">
                    <button id="btn_select_all" type="button" class="btn btn-info" onclick="change_select_view('all');">
                        ทั้งหมด
                    </button>
                    <button id="btn_select_wait" type="button" class="btn btn-outline-danger" onclick="change_select_view('wait');">
                        รอดำเนินการ
                    </button>
                    <button id="btn_select_progress" type="button" class="btn btn-outline-warning" onclick="change_select_view('progress');">
                        กำลังดำเนินการ
                    </button>
                    <button id="btn_select_success" type="button" class="btn btn-outline-success" onclick="change_select_view('success');">
                        เสร็จสิ้น
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div id="div_content">
            <!-- Content -->
        </div>
    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        start_get_data_sos_hospital();
    });

    function start_get_data_sos_hospital() {
        fetch("{{ url('/') }}/api/start_get_data_sos_hospital" + "/" + '{{ Auth::user()->id }}')
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(result){

                    document.querySelector('#count_case_select').innerHTML = result.length ;

                    let div_content = document.querySelector('#div_content');
                        div_content.innerHTML = '' ;

                    for (let i = 0; i < result.length; i++) {

                        let centers_status = `` ;
                        let class_centers_status ;
                        if(result[i].centers_status){
                            centers_status = result[i].centers_status ;
                            if(centers_status == "รับแจ้งเหตุ"){
                                class_centers_status = `text-danger`;
                            }
                            else if(centers_status == "รอการยืนยัน"){
                                class_centers_status = `text-warning`;
                            }
                            else if(centers_status == "ปฏิเสธ"){
                                class_centers_status = `text-danger`;
                            }
                            else if(centers_status == "เสร็จสิ้น"){
                                class_centers_status = `text-success`;
                            }
                            else if(centers_status == "ออกจากฐาน"){
                                class_centers_status = `text-warning`;
                            }
                            else if(centers_status == "ถึงที่เกิดเหตุ"){
                                class_centers_status = `text-warning`;
                            }
                            else if(centers_status == "ออกจากที่เกิดเหตุ"){
                                class_centers_status = `text-warning`;
                            }
                        }

                        let centers_time_create_sos = result[i].centers_time_create_sos;
                        // สร้างวัตถุ Date จากสตริง centers_time_create_sos
                        let dateObj = new Date(centers_time_create_sos);
                        let days = ['วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์'];
                        let months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                        // ดึงข้อมูลวันในสัปดาห์
                        let dayOfWeek = days[dateObj.getDay()];
                        // ดึงวันที่
                        let dayOfMonth = dateObj.getDate();
                        // ดึงเดือน
                        let month = months[dateObj.getMonth()];
                        // ดึงปี
                        let year = dateObj.getFullYear() + 543; // ปี พ.ศ.
                        // ดึงชั่วโมง
                        let hour = dateObj.getHours();
                        // ดึงนาที
                        let minute = dateObj.getMinutes();
                        // ดึงวินาที
                        let second = dateObj.getSeconds();
                        // สร้างสตริงที่แสดงข้อมูลวันที่และเวลาตามที่ต้องการ
                        let formattedDate = `${dayOfWeek} ที่ ${dayOfMonth} ${month} พ.ศ. ${year} เวลา ${hour}:${minute}:${second} น.`;

                        let yellows_name_user = `ไม่ได้ระบุ`;
                        if(result[i].yellows_name_user){
                            yellows_name_user = result[i].yellows_name_user;
                        }

                        let yellows_phone_user = `ไม่ได้ระบุ`;
                        if(result[i].yellows_phone_user){
                            yellows_phone_user = result[i].yellows_phone_user;
                        }

                        let photo_sos = `<img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/37.2.png" style="width: 80%;">`;
                        if(result[i].photo_sos){
                            photo_sos = `<img src="{{ url('/storage') }}/`+result[i].photo_sos+`" style="width: 80%;">`; 
                        }

                        let btn_idc = `
                            <button style="width: 120px;" class="btn btn-sm btn-outline-dark px-3">
                                IDC
                                <br>
                                (ไม่ได้ระบุ)
                            </button>
                        `;
                        let class_idc = ``;
                        let text_idc = ``;
                        if(result[i].yellows_idc){

                            text_idc = result[i].yellows_idc;
                            if(text_idc == "แดง(วิกฤติ)"){
                                class_idc = `btn-danger`;
                            }
                            else if(text_idc == "เหลือง(เร่งด่วน)"){
                                class_idc = `btn-warning`;
                            }
                            else if(text_idc == "เขียว(ไม่รุนแรง)"){
                                class_idc = `btn-success`;
                            }
                            else if(text_idc == "ขาว(ทั่วไป)"){
                                class_idc = `btn-outline-info`;
                            }
                            else if(text_idc == "ดำ(รับบริการสาธารณสุขอื่น)"){
                                text_idc = `ดำ`;
                                class_idc = `btn-dark`;
                            }

                            btn_idc = `
                                <button style="width: 120px;" class="btn btn-sm `+class_idc+` px-3">
                                    IDC
                                    <br>
                                    `+text_idc+`
                                </button>
                            `;
                        }

                        let btn_rc = `
                            <button style="width: 120px;" class="btn btn-sm btn-outline-dark px-3">
                                RC
                                <br>
                                (ไม่ได้ระบุ)
                            </button>
                        `;
                        let class_rc = ``;
                        let text_rc = ``;
                        if(result[i].yellows_rc){

                            text_rc = result[i].yellows_rc;
                            if(text_rc == "แดง(วิกฤติ)"){
                                class_rc = `btn-danger`;
                            }
                            else if(text_rc == "เหลือง(เร่งด่วน)"){
                                class_rc = `btn-warning`;
                            }
                            else if(text_rc == "เขียว(ไม่รุนแรง)"){
                                class_rc = `btn-success`;
                            }
                            else if(text_rc == "ขาว(ทั่วไป)"){
                                class_rc = `btn-outline-info`;
                            }
                            else if(text_rc == "ดำ"){
                                class_rc = `btn-dark`;
                            }

                            btn_rc = `
                                <button style="width: 120px;" class="btn btn-sm `+class_rc+` px-3">
                                    RC
                                    <br>
                                    `+text_rc+`
                                </button>
                            `;
                        }

                        let class_status = ``;
                        if (result[i].status) {
                            if(result[i].status == "รอดำเนินการ"){
                                class_status = `danger`;
                            }
                            else if(result[i].status == "กำลังดำเนินการ"){
                                class_status = `warning`;
                            }
                            else if(result[i].status == "เสร็จสิ้น"){
                                class_status = `success`;
                            }
                        }


                        let html = `
                            <div div_data_case="div_data_case" div_id="`+result[i].id+`" div_status="`+result[i].status+`" class="card border-top border-0 border-4 border-`+class_status+` main-shadow main-radius">
                                <div class="card-body px-5 py-3">
                                    <div class="card-title ">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="float-start">
                                                    <h4 class="mb-0 text-`+class_status+`">
                                                        <i class="fa-sharp fa-solid fa-hashtag me-1 font-22 text-`+class_status+`"></i> รหัสเคส : `+result[i].centers_operating_code+`
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="float-end">
                                                    <div class="col">
                                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                            <button type="button" class="btn btn-sm btn-`+class_status+`">
                                                                <span class="mx-4">`+result[i].status+`</span> 
                                                            </button>
                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-duotone fa-repeat"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" style="margin: 0px;">
                                                                    <li>
                                                                        <a class="text-danger dropdown-item" href="#">รอดำเนินการ
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-warning dropdown-item" href="#">กำลังดำเนินการ
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-success dropdown-item" href="#">เสร็จสิ้น
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row g-3">
                                        <!-- img -->
                                        <div class="col-md-2">
                                            <center>
                                                `+photo_sos+`
                                            </center>
                                        </div>
                                        <!-- ข้อมูล -->
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6>
                                                        <b>สถานะการช่วยเหลือ : <span class="`+class_centers_status+`">`+centers_status+`</span></b>
                                                        </h6>
                                                    <span>
                                                        `+formattedDate+`
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <div class="float-end">
                                                        `+btn_idc+`
                                                        `+btn_rc+`
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-3">
                                                <div class="col-12">
                                                    <h6><b>ข้อมูลทั่วไป</b></h6>
                                                    <span>
                                                        <b>ชื่อ/รหัสผู้แจ้งเหตุ : </b>`+yellows_name_user+`
                                                        <br>
                                                        <b>โทรศัพท์ผู้แจ้ง : </b>`+yellows_phone_user+`
                                                    </span>
                                                    <h5 class="mt-3"><b>อาการนำสำคัญของผู้ป่วยฉุกเฉินที่ได้จากการรับแจ้ง</b></h5>
                                                    <span class="font-18 text-danger">
                                                        `+result[i].yellows_symptom+`
                                                    </span>
                                                    <h5 class="mt-2"><b>อาการ/เหตุการณ์/รายละเอียดอื่นๆ</b></h5>
                                                    <span class="font-18 text-danger">
                                                        `+result[i].yellows_symptom_other+`
                                                    </span>
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <button class="btn btn-info px-5 radius-10">
                                                        <i class="fa-sharp fa-solid fa-eye mr-1"></i> ดูข้อมูล
                                                    </button>
                                                    <button class="btn btn-success px-5 radius-10">
                                                        <i class="fa-solid fa-video mr-1"></i> สนทนาทางวิดีโอ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        div_content.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

                    }

                }

            });
    }

    function change_select_view(type){

        let div_data_case = document.querySelectorAll('[div_data_case="div_data_case"]');
        div_data_case.forEach(div_data_case => {
            div_data_case.classList.add('d-none');
        });

        document.querySelector('#btn_select_all').classList.remove('btn-info');
        document.querySelector('#btn_select_wait').classList.remove('btn-danger');
        document.querySelector('#btn_select_progress').classList.remove('btn-warning');
        document.querySelector('#btn_select_success').classList.remove('btn-success');

        document.querySelector('#btn_select_all').classList.add('btn-outline-info');
        document.querySelector('#btn_select_wait').classList.add('btn-outline-danger');
        document.querySelector('#btn_select_progress').classList.add('btn-outline-warning');
        document.querySelector('#btn_select_success').classList.add('btn-outline-success');

        let count = 0 ;

        if(type == "all"){
            document.querySelector('#btn_select_all').classList.remove('btn-outline-info');
            document.querySelector('#btn_select_all').classList.add('btn-info');

            let div_item = document.querySelectorAll('[div_data_case="div_data_case"]');
            div_item.forEach(div_item => {
                div_item.classList.remove('d-none');
                count = count + 1 ;
            });
        }
        else if(type == "wait"){
            document.querySelector('#btn_select_wait').classList.remove('btn-outline-danger');
            document.querySelector('#btn_select_wait').classList.add('btn-danger');

            let div_item = document.querySelectorAll('[div_status="รอดำเนินการ"]');
            div_item.forEach(div_item => {
                div_item.classList.remove('d-none');
                count = count + 1 ;
            });
        }
        else if(type == "progress"){
            document.querySelector('#btn_select_progress').classList.remove('btn-outline-warning');
            document.querySelector('#btn_select_progress').classList.add('btn-warning');

            let div_item = document.querySelectorAll('[div_status="กำลังดำเนินการ"]');
            div_item.forEach(div_item => {
                div_item.classList.remove('d-none');
                count = count + 1 ;
            });
        }
        else if(type == "success"){
            document.querySelector('#btn_select_success').classList.remove('btn-outline-success');
            document.querySelector('#btn_select_success').classList.add('btn-success');

            let div_item = document.querySelectorAll('[div_status="เสร็จสิ้น"]');
            div_item.forEach(div_item => {
                div_item.classList.remove('d-none');
                count = count + 1 ;
            });
        }

        document.querySelector('#count_case_select').innerHTML = count ;
    }
</script>

@endsection
