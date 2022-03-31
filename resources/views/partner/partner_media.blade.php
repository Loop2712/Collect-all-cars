@extends('layouts.partners.theme_partner_new')


@section('content')
    <input type="text" class="d-none" name="media_menu" id="media_menu" value="{{ $media_menu }}">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-2">
                        <a href="{{ url('/partner_media?menu=all') }}" id="btn_menu_all" style="width:100%;" type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/1.png') }}">
                            All
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/partner_media?menu=viimove') }}" id="btn_menu_viimove" style="width:100%;" type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/35.2.png') }}">
                            ViiMOVE
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/partner_media?menu=viisos') }}" id="btn_menu_viisos" style="width:100%;"  type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/21.png') }}">
                            ViiSOS
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/partner_media?menu=check_in') }}" id="btn_menu_check_in" style="width:100%;"  type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="65" src="{{ asset('/img/stickerline/PNG/26.1.png') }}">
                            Check in
                        </a>
                    </div>
                </div>
                <hr class="text-danger">

                <!-- ------------------- ALL ----------------------- -->
                <div class="card" id="div_all">

                    <div class="row">
                        <div class="col-12">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/line_oa.png') }}">
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">QR-Code LINE OA</h6>
                                <div class="d-flex align-items-center mt-3 fs-6">
                                    <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/line_oa.png') }}" download >
                                        ดาวน์โหลด
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_line.png') }}">
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">QR-Code LINE OA</h6>
                                <div class="d-flex align-items-center mt-3 fs-6">
                                    <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_line.png') }}" download >
                                        ดาวน์โหลด
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
                        </div>
                    </div>
                </div>
                <!-- ------------------- ALL ----------------------- -->


                <!-- ------------------- Vii MOVE ----------------------- -->
                <div class="card" id="div_viimove">

                    <div class="row">
                        <div class="col-9">
                            <div id="carouselExampleCaptions" class="carousel slide main-shadow main-radius" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner main-shadow main-radius">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/1 how to ลงทะเบียน 1920x1080-03.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/2 how to ลงทะเบียน 1920x1080-01.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/3 how to ลงทะเบียน 1920x1080-02.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/4 how to ลงทะเบียน 1920x1080-04.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/5 how to ลงทะเบียน 1920x1080-05.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/6-how-to-ลงทะเบียน-1920x1080-06-v3.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/7 how to ลงทะเบียน 1920x1080 cre v2-06.jpg') }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/ขั้นตอนการลงทะเบียน/all how to.rar') }}" download >
                                                ดาวน์โหลด
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-12">
                                <div class="icon-box">
                                    <div class="text-center">
                                        <img width="75%" src="{{ asset('/img/sticker_qr/sticker_qr_en.png') }}">
                                    </div>
                                    <a style="float:right;margin-right: 10px;" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/sticker_qr/sticker_qr_en.png') }}" download >
                                        Download
                                    </a>
                                    <br><br>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="icon-box">
                                    <div class="text-center">
                                        <img width="75%" src="{{ asset('/img/sticker_qr/sticker_qr_th.png') }}">
                                    </div>
                                    <a style="float:right;margin-right: 10px;" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/sticker_qr/sticker_qr_en.png') }}" download >
                                        ดาวน์โหลด
                                    </a>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ------------------- Vii MOVE ----------------------- -->

                <!-- ------------------- Vii sos ----------------------- -->
                <div class="card" id="div_viisos">

                    <div class="row">
                        <div class="col-9">
                            div_viisos
                        </div>
                    </div>
                </div>
                <!-- ------------------- Vii sos ----------------------- -->

                <!-- ------------------- Check in ----------------------- -->
                <div class="card" id="div_check_in">

                    <div class="row">
                        <div class="col-9">
                            div_check_in
                        </div>
                    </div>
                </div>
                <!-- ------------------- Check in ----------------------- -->

            </div>
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            let media_menu = document.querySelector('#media_menu').value;
            add_color_btn_menu(media_menu);
        });

        function add_color_btn_menu(media_menu){

            switch(media_menu) {
                case 'all':
                    document.querySelector('#btn_menu_all').classList.add('btn-danger');
                    document.querySelector('#btn_menu_all').classList.remove('btn-outline-danger');

                    document.querySelector('#div_all').classList.remove('d-none');

                    document.querySelector('#div_viimove').classList.add('d-none');
                    document.querySelector('#div_viisos').classList.add('d-none');
                    document.querySelector('#div_check_in').classList.add('d-none');


                break;
                case 'viimove':
                    document.querySelector('#btn_menu_viimove').classList.add('btn-danger');
                    document.querySelector('#btn_menu_viimove').classList.remove('btn-outline-danger');

                    document.querySelector('#div_viimove').classList.remove('d-none');

                    document.querySelector('#div_all').classList.add('d-none');
                    document.querySelector('#div_viisos').classList.add('d-none');
                    document.querySelector('#div_check_in').classList.add('d-none');

                break;
                case 'viisos':
                    document.querySelector('#btn_menu_viisos').classList.add('btn-danger');
                    document.querySelector('#btn_menu_viisos').classList.remove('btn-outline-danger');

                    document.querySelector('#div_viisos').classList.remove('d-none');

                    document.querySelector('#div_all').classList.add('d-none');
                    document.querySelector('#div_viimove').classList.add('d-none');
                    document.querySelector('#div_check_in').classList.add('d-none');

                break;
                case 'check_in':
                    document.querySelector('#btn_menu_check_in').classList.add('btn-danger');
                    document.querySelector('#btn_menu_check_in').classList.remove('btn-outline-danger');

                    document.querySelector('#div_check_in').classList.remove('d-none');

                    document.querySelector('#div_all').classList.add('d-none');
                    document.querySelector('#div_viimove').classList.add('d-none');
                    document.querySelector('#div_viisos').classList.add('d-none');

                break;
            }
            
        }

    </script>
@endsection
