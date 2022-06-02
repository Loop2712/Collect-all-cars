@extends('layouts.admin')

@section('content')
<style>
    .lightbox {
        /* Default to hidden */
        display: none;

        /* Overlay entire screen */
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        /* A bit of padding around image */
        padding: 1em;

        /* Translucent background */
        background: rgba(0, 0, 0, 0.8);
    }

    /* Unhide the lightbox when it's the target */
    .lightbox:target {
        display: block;
    }

    .lightbox span {
        /* Full width and height */
        display: block;
        width: 100%;
        height: 100%;

        /* Size and position background image */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
<br>
<div class="container-fluid">
    <!-- กรุณาเลือกพาร์เนอร์ -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h3 style="margin-top: 10px;">กรุณาเลือกพาร์เนอร์</h3>
                    </div>
                    <form class="col-12" style="float: left;" method="GET" action="{{ url('/check_in/admin_gallery') }}" accept-charset="UTF-8" role="search">
                        <div class="row">
                            <div class="col-5">
                                <select style="margin-left: 10px;margin-top: 10px;" class="form-control" name="name_partner" id="name_partner" value="{{ request('name_partner') }}" onchange="document.querySelector('#submit_name_partner').click();">
                                    @if(!empty($name_partner))
                                        <option value="{{ request('name_partner') }}" selected>{{ $name_partner }}</option>
                                    @else
                                        <option value="" selected>- กรุณาเลือกพาร์เนอร์ -</option>
                                    @endif
                                    <option value="all"> ทั้งหมด </option>
                                    @foreach($all_partners as $name_partner)
                                        <option value="{{ $name_partner->id }}">{{ $name_partner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button id="submit_name_partner" class="d-none" type="submit">
                                    ยืนยัน
                                </button>
                            </div>
                            <div class="col-5">
                                <a style="float: right;margin-top: 12px;" class="btn btn-success text-white main-shadow main-radius">
                                    สร้าง QR-CODE ใหม่
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <!-- QR-Code -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
        @foreach($all_areas as $all_area)
        @php
            $img_name_area = str_replace(" ","_" ,$all_area->name_area) ;

            if(empty($all_area->name_area)){
                $text_name_area = 'รวม' ;
            }else{
                $text_name_area = $all_area->name_area ;
            }
        @endphp
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-9">
                                    <h3>พาร์ทเนอร์ : <b class="text-success">{{ $all_area->name }}</b></h3>
                                </div>
                                <div class="col-3">
                                    <span class="btn btn-sm btn-primary main-shadow main-radius" style="float: right;width: 100%;" data-toggle="collapse" href="#coll_gen_qr_{{ $all_area->id }}" role="button" aria-expanded="false" aria-controls="coll_gen_qr_{{ $all_area->id }}">
                                        สร้าง QR-Code
                                    </span>
                                </div>
                                <div class="col-12">
                                    <div class="collapse" id="coll_gen_qr_{{ $all_area->id }}">
                                        <div class="row">
                                            <div class="col-4">
                                                <!--  -->
                                            </div>
                                            <div class="col-6">
                                                <div class="">
                                                    <input type="text" class="form-control" id="color_theme_{{ $all_area->id }}" name="color_theme_{{ $all_area->id }}" value="" placeholder="กรอกโค้ดสี เช่น #F15423" style="float: right;">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="btn btn-sm btn-success main-shadow main-radius" style="float: right;width: 100%;margin-top: 5px;" onclick="gen_qr_code('{{ $all_area->name_area }}' , '{{ $all_area->name }}' , '{{ $all_area->type_partner }}' ,'{{ $all_area->id }}');">
                                                    ยืนยัน
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if(!empty($all_area->name_area))
                                        <h5>พื้นที่ : <b class="text-info">{{ $all_area->name_area }}</b></h5>
                                    @else
                                        <h5>พื้นที่ : <b class="text-info">รวม</b></h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                        <div class="col-6">
                            
                           <!-- link to light box -->
                           <a href="#artwork_{{ $loop->iteration }}" class="btn-outline-dark">
                                <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png" style="background-color: red;width: 100%;">
                            </a>

                            <!-- light box -->
                            <a href="##" class="lightbox" id="artwork_{{ $loop->iteration }}">
                                <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png')"></span>
                            </a>
                            <br>
                            <!-- download btn -->
                            <a class="btn btn-outline-danger px-3 radius-30 mt-3" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                            <a class="btn btn-outline-warning px-3 radius-30 mt-3" href="#artwork_{{ $loop->iteration }}" ><img  src="{{ asset('/img/icon/zoom-in.png') }}" width="18px" alt=""></a>
                            
                        </div>
                        <div class="col-6 ">
                            <!-- link to light box -->
                            <a href="#flag{{ $loop->iteration }}">
                                <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $text_name_area }}.png" style="background-color: red;width: 33%;">
                            </a>

                            <!-- light box -->
                            <a href="##" class="lightbox" id="flag{{ $loop->iteration }}">
                                <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $text_name_area }}.png')"></span>
                            </a>
                            <br>
                            <!-- download btn -->
                            <a class="btn btn-outline-danger px-3 radius-30 mt-3" href="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $text_name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                            <a class="btn btn-outline-warning px-3 radius-30 mt-3" href="#flag{{ $loop->iteration }}" ><img  src="{{ asset('/img/icon/zoom-in.png') }}" width="18px" alt=""></a>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<script>
    
    function gen_qr_code(name_area, name, type_partner , id){
        
        let url = "" ;

        let name_partner = name ;
        let name_partner_re = name_partner.replaceAll(' ' , '_');

        let result = name_area ;
        let name_new_check_in = result.replaceAll(' ' , '_');

        if (name_new_check_in) {
            name_new_check_in = name_new_check_in ;
        }else{
            name_new_check_in = null ;
        }
        // console.log(name_new_check_in);
        // console.log(type_partner);

        if (name_new_check_in != null) {
            if (type_partner === "university") {

                url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=University:" + name_partner_re + "-" +name_new_check_in + "&chs=500x500&choe=UTF-8" ;
            }else{

                url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=" + name_partner_re + "-" +name_new_check_in + "&chs=500x500&choe=UTF-8" ;
            }
        }

        if (name_new_check_in === null) {
            if (type_partner === "university") {

                url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=University:" + name_partner_re + "&chs=500x500&choe=UTF-8" ;
            }else{

                url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/check_in/create?location=" + name_partner_re + "&chs=500x500&choe=UTF-8" ;
            }
        }

        // console.log(url);

        let data = {
            'url' : url,
            'name_partner' : name_partner,
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

            change_color_theme("check_in/" + text, name_area, name, type_partner , id);

        }).catch(function(error){
            // console.error(error);
        });

    }

    function change_color_theme(url_img, name_area, name, type_partner, id)
    {
        // console.log('change_color_theme');
        let color_theme = document.querySelector('#color_theme_'+id) ;

        let name_partner = name ;
        let name_new_check_in = name_area ;

        if (name_new_check_in) {
            name_new_check_in = name_new_check_in ;
        }else{
            name_new_check_in = null ;
        }


        let data = {
            'color_theme' : color_theme.value,
            'name_partner' : name_partner,
            'name_new_check_in' : name_new_check_in,
            'url_img' : url_img,
            'type_partner' : type_partner,
        };

        fetch("{{ url('/') }}/api/admin_create_img_check_in", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            window.location.reload(true);

        }).catch(function(error){
            console.error(error);
        });

    }

</script>


@endsection