@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="row col-12">
                <div class="col-12">
                    <div class="row col-12">
                        <div class="col-12">
                            <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                                สร้าง QR-Code
                            </h3>
                        </div>
                    </div>
                    <hr>

                    <div id="div_select_theme_qr" class="row">
                        <div class="col-12">
                            <br>
                            <h4>เลือกรูปแบบที่ต้องการ</h4>
                            <br>
                        </div>
                        <div class="col-6 text-center">
                            <img class="main-shadow main-radius" src="{{ url('/img/check_in/theme/artwork_check_in_EX.png') }}" width="80%">
                            <br><br><br>
                            <p style="width:30%;" class="btn btn-danger main-shadow main-radius" onclick="select_theme_qr('1')">
                                เลือก
                            </p>
                        </div>
                        <div class="col-6 text-center">
                            <img class="main-shadow main-radius" src="{{ url('/img/check_in/theme/art_work_check_in_EX_V3000.png') }}" width="80%">
                            <br><br><br>
                            <p style="width:30%;" class="btn btn-danger main-shadow main-radius" onclick="select_theme_qr('2')">
                                เลือก
                            </p>
                        </div>
                    </div>

                    <div id="add_area_ok" class="col-12 d-none">
                        <div class="row">
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="d-none" id="img_str_load" src="{{ url('/img/stickerline/PNG/25.png') }}" width="100%">
                                    </div>
                                    <div class="col-10">
                                        <h3 class="text-success" style="margin-top:20px;">
                                            เพิ่มจุด Check in/out เรียบร้อยแล้ว
                                        </h3>
                                        <p>คุณสามารถดาวน์โหลดรูปภาพและเริ่มใช้งานได้ทันที</p>
                                    </div>
                                    <!-- รูป QR theme -->
                                    <div class="col-3">
                                        <center>
                                            <br><br><br><br><br><br><br>
                                            <img class="d-none" id="img_qr_code" src="" width="100%">
                                            <br>
                                            <a id="download_img_qr_code" href="" class="btn btn-danger text-white d-none" download="">
                                                ดาวน์โหลด
                                            </a>
                                        </center>
                                    </div>
                                    <div class="col-9">
                                        <center>
                                            <br><br>
                                            <img id="img_theme_new" class="d-none main-shadow main-radius"  src="" width="80%">
                                            <br><br>
                                            <a id="download_img_theme_new" href="" class="btn btn-danger text-white d-none" download="">
                                                ดาวน์โหลด
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!-- รูปธง -->
                            <div class="col-3">
                                <center>
                                    <br><br>
                                    <img id="img_flag_theme_new" class="d-none main-shadow main-radius"  src="" width="80%">
                                    <br><br>
                                    <a id="download_img_flag_theme_new" href="" class="btn btn-danger text-white d-none" download="">
                                        ดาวน์โหลด
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div id="div_data_qr" class="row col-12 d-none">
                        <div id="div_create_qr" class="col-6">
                            <div id="have_area" class="d-none">
                                <h3 class="text-danger" style="margin-top:20px;">มีพื้นที่นี้แล้ว</h3>
                                <p>หากมีข้อสงสัยกรุณาติดต่อทีมงาน ViiCHECK</p>
                            </div>

                            <div id="div_input_data_qr" class="">
                                <input type="text" class="form-control d-none" id="name_partner" name="name_partner" value="{{ Auth::user()->organization }}">

                                <input type="text" class="form-control d-none" id="type_partner" name="type_partner" value="{{ $type_partner }}">

                                <label class="control-label" for="name_new_check_in">พื้นที่ Check in</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="name_new_check_in" name="name_new_check_in" placeholder="กรอกชื่อจุด Check in เช่น ชื่ออาคารหรือพื้นที่ย่อย" onchange="document.querySelector('#tag_a_qr').classList.remove('d-none');">

                                <br>
                                <div id="select_color">
                                    <label class="control-label" for="name_new_check_in">เลือกสีรูปภาพ</label>
                                    <input type="text" class="form-control d-" id="color_theme" name="color_theme" value="" placeholder="กรอกโค้ดสี เช่น #F15423" >
                                    <br>
                                </div>

                                <div>
                                    <label class="control-label">รูปแบบที่เลือก</label>
                                    <input class="form-control" type="text" name="num_theme_qr" id="num_theme_qr" value="" readonly>
                                    <br>
                                </div>

                                <button id="tag_a_qr" class="btn btn-info text-white d-none" style="float:right;" onclick="gen_qr_code();">
                                    สร้าง QR-Code
                                </button>
                            </div>
                        </div>

                        <div class="col-6">
                            <center>
                                <img id="img_theme_old" class="main-shadow main-radius" src="" width="80%">
                            </center>
                        </div>
                    </div>
                    <br>
                 </div>
            </div>
        </div>
    </div>
</div>
    <br>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

<script>

    function select_theme_qr(num_of_theme){
        let num_theme_qr = document.querySelector('#num_theme_qr') ;
            num_theme_qr.value = num_of_theme ;

        let img_theme_old = document.querySelector('#img_theme_old') ;

            if (num_of_theme === '1') {
                img_theme_old.src = "{{ url('/img/check_in/theme/artwork_check_in_EX.png') }}" ;
            }
            if (num_of_theme === '2'){
                img_theme_old.src = "{{ url('/img/check_in/theme/art_work_check_in_EX_V3000.png') }}" ;
            }

        document.querySelector('#div_select_theme_qr').classList.add('d-none');
        document.querySelector('#div_data_qr').classList.remove('d-none');
    }


    function gen_qr_code(){
        
        let result = document.querySelector('#name_new_check_in') ;
        let name_new_check_in = result.value.replaceAll(' ' , '_');

        let name_partner = document.querySelector('#name_partner') ;
        let name_partner_re = name_partner.value.replaceAll(' ' , '_');

        let type_partner = document.querySelector('#type_partner') ;

        let url = "" ;

        if (type_partner.value === "university") {

            url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=University:" + name_partner_re + "-" +name_new_check_in + "&chs=500x500&choe=UTF-8" ;
        }else{

            url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=" + name_partner_re + "-" +name_new_check_in + "&chs=500x500&choe=UTF-8" ;
        }

            // console.log(url);

        let data = {
            'url' : url,
            'name_partner' : name_partner.value,
            'name_new_check_in' : name_new_check_in,
        };

        fetch("{{ url('/') }}/api/save_img_url", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            let url_img = "{{ url('storage') }}/" + "check_in/" + text;
            // console.log(url_img);

            let img_qr_code = document.querySelector('#img_qr_code') ;
                img_qr_code.src = url_img;
                // img_qr_code.classList.remove('d-none');

            let download_img_qr_code = document.querySelector('#download_img_qr_code') ;
                download_img_qr_code.href = url_img;
                // download_img_qr_code.classList.remove('d-none');

            change_color_theme("check_in/" + text);


        }).catch(function(error){
            // console.error(error);
        });

    }

    function change_color_theme(url_img)
    {
        // console.log('change_color_theme');

        let num_theme_qr = document.querySelector('#num_theme_qr') ;

        let img_theme_new = document.querySelector('#img_theme_new') ;

        let color_theme = document.querySelector('#color_theme') ;

        let name_partner = document.querySelector('#name_partner') ;
        let name_new_check_in = document.querySelector('#name_new_check_in') ;

        let type_partner = document.querySelector('#type_partner') ;

        let data = {
            'color_theme' : color_theme.value,
            'name_partner' : name_partner.value,
            'name_new_check_in' : name_new_check_in.value,
            'url_img' : url_img,
            'type_of' : "check_in",
            'num_theme_qr' : num_theme_qr.value,
            'type_partner' : type_partner.value,
        };

        fetch("{{ url('/') }}/api/create_img_check_in", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            console.log(text);

            if (text === "already have this area") {
                document.querySelector('#div_input_data_qr').classList.add('d-none');
                document.querySelector('#have_area').classList.remove('d-none');
            }else{

                document.querySelector('#div_input_data_qr').classList.add('d-none');
                document.querySelector('#add_area_ok').classList.remove('d-none');

                document.querySelector('#img_theme_old').classList.add('d-none');

                // let url_img_theme_new = "{{ url('/') }}/img/check_in/theme/test_1.png" ;
                let url_img_theme_new = "{{ url('storage') }}/" + "check_in"+ "/" + "artwork_" +  name_partner.value + '_' + name_new_check_in.value + '.png';

                let url_img_theme_new_flag = "{{ url('storage') }}/" + "check_in"+ "/" + "artwork_flag" +  name_partner.value + '_' + name_new_check_in.value + '.png';

                let img_theme_new = document.querySelector('#img_theme_new');
                    img_theme_new.src = url_img_theme_new ;

                let download_img_theme_new = document.querySelector('#download_img_theme_new');
                    download_img_theme_new.href = url_img_theme_new ;

                let img_flag_theme_new = document.querySelector('#img_flag_theme_new');
                    img_flag_theme_new.src = url_img_theme_new_flag ;

                let download_img_flag_theme_new = document.querySelector('#download_img_flag_theme_new');
                    download_img_flag_theme_new.href = url_img_theme_new_flag ;
                
                img_qr_code.classList.remove('d-none');
                img_theme_new.classList.remove('d-none');
                img_flag_theme_new.classList.remove('d-none');
                download_img_theme_new.classList.remove('d-none');
                document.querySelector('#img_str_load').classList.remove('d-none');
                document.querySelector('#download_img_qr_code').classList.remove('d-none');
                document.querySelector('#download_img_flag_theme_new').classList.remove('d-none');
            }


        }).catch(function(error){
            console.error(error);
        });

    }

</script>

@endsection