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

                    <div class="row col-12">
                        <div id="div_create_qr" class="col-6">
                            <input type="text" class="form-control d-none" id="name_partner" name="name_partner" value="{{ Auth::user()->organization }}">

                            <label class="control-label" for="name_new_check_in">ชื่อจุด Check in</label>
                            <input type="text" class="form-control" id="name_new_check_in" name="name_new_check_in" placeholder="กรอกชื่อจุด Check in" onchange="document.querySelector('#tag_a_qr').classList.remove('d-none');">

                            <br>
                            <div id="select_color">
                                <label class="control-label" for="name_new_check_in">เลือกสีรูปภาพ</label>
                                <input type="text" class="form-control d-" id="color_theme" name="color_theme" value="" placeholder="กรอกสีรูปภาพ" >
                                <br>
                                <div class="row text-center">
                                    <div class="col-1">
                                        <i class="fas fa-circle" style="font-size: 45px;color:#FF66FF;" onclick="document.querySelector('#color_theme').value = '#FF66FF' "></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-circle" style="font-size: 45px;color:#FF0000;" onclick="document.querySelector('#color_theme').value = '#FF0000' "></i>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success main-shadow main-radius" style="width: 100%;margin-top: 5px;">
                                            สุ่มสี
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button id="tag_a_qr" class="btn btn-info text-white d-none" style="float:right;" onclick="gen_qr_code();">
                                สร้าง QR-Code
                            </button>

                            <div id="div_qr_code" class="row col-12 text-center">
                                <br>
                                <div class="col-4">
                                    <img class="d-none" id="img_qr_code" src="" width="250" height="250">
                                    <a id="download_img_qr_code" href="" class="btn btn-danger text-white d-none" download="">
                                        ดาวน์โหลด
                                    </a>
                                </div>
                                <div class="col-8">
                                   
                                </div>
                            </div>

                        </div>

                        <div class="col-6">
                            <center>
                                <img class="main-shadow main-radius" src="{{ url('/img/check_in/theme/artwork_check_in.png') }}" width="80%">
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

    function gen_qr_code(){
        
        let result = document.querySelector('#name_new_check_in') ;
        let name_new_check_in = result.value.replace(' ' , '_');

        let name_partner = document.querySelector('#name_partner') ;

        let url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=" + name_new_check_in + "&chs=250x250&choe=UTF-8"

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
            let url_img = "{{ url('/storage') }}" + "/check_in/" + text;

            let img_qr_code = document.querySelector('#img_qr_code') ;
                img_qr_code.src = url_img;
                img_qr_code.classList.remove('d-none');

            let download_img_qr_code = document.querySelector('#download_img_qr_code') ;
                download_img_qr_code.href = url_img;
                download_img_qr_code.classList.remove('d-none');

        }).catch(function(error){
            // console.error(error);
        });

        change_color_theme();
    }

    function change_color_theme()
    {
        // console.log('change_color_theme');

        let color_theme = document.querySelector('#color_theme') ;
        let name_partner = document.querySelector('#name_partner') ;
        let name_new_check_in = document.querySelector('#name_new_check_in') ;

    }

</script>

@endsection