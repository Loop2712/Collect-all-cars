@extends('layouts.partners.theme_partner_new')


@section('content')
    <input type="text" class="d-none" name="media_menu" id="media_menu" value="{{ $media_menu }}">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 col-12">
                        <a href="{{ url('/partner_media?menu=all') }}" id="btn_menu_all" style="width:100%;" type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/1.png') }}">
                            All
                        </a>
                    </div>
                    <div class="col-md-2 col-12">
                        <a href="{{ url('/partner_media?menu=viimove') }}" id="btn_menu_viimove" style="width:100%;" type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/35.2.png') }}">
                            ViiMOVE
                        </a>
                    </div>
                    <div class="col-md-2 col-12">
                        <a href="{{ url('/partner_media?menu=viisos') }}" id="btn_menu_viisos" style="width:100%;"  type="button" class="btn btn-outline-danger main-shadow main-radius">
                            <img width="50" src="{{ asset('/img/stickerline/PNG/21.png') }}">
                            ViiSOS
                        </a>
                    </div>
                    <div class="col-md-2 col-12">
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
                            <br>
                            <h3 style="margin-left: 20px;" class="text-danger">QR-Code and Logo</h3>
                            <br>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                                
                                <!-- ------------- แถวที่ 1 ------------- -->
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/poster add line 2.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Poster QR-Code LINE OA</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/poster add line 2.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/line_oa.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Poster QR-Code LINE OA</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/line_oa.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_line.png') }}">
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
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_message.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">QR-Code Facebook Messenger</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_message.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_whatsapp.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">QR-Code Whatsapp</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/qrcode_whatsapp.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ------------- แถวที่ 2 ------------- -->
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/Service-Viicheck ver2.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Service Viicheck</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/Service-Viicheck ver2.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;background-color: #000000cc;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo-flex-line.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Logo 1</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo-flex-line.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/VII-check-LOGO-W-v1.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Logo 2</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/VII-check-LOGO-W-v1.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;background-color: #000000cc;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo v.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Logo 3</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo v.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card main-shadow main-radius">
                                        <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo_x-icon.png') }}">
                                        <div class="card-body">
                                            <h6 class="card-title cursor-pointer">Logo 4</h6>
                                            <div class="d-flex align-items-center mt-3 fs-6">
                                                <a class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/logo_x-icon.png') }}" download >
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ------------- สตก. ไลน์ ------------- -->
                            <br>
                            <hr class="text-danger">
                            <br>
                            <h3 style="margin-left: 20px;" class="text-danger">LINE Stickers</h3>
                            <br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/1.png') }}">
                                        </div>
                                        <div class="col-3">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/10.png') }}">
                                        </div>
                                        <div class="col-3">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/12.png') }}">
                                        </div>
                                        <div class="col-3">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/21.png') }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/4.png') }}">
                                        </div>
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/17.png') }}">
                                        </div>
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/20.png') }}">
                                        </div>
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/24.png') }}">
                                        </div>
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/34.png') }}">
                                        </div>
                                        <div class="col-2">
                                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/6.png') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <br>
                                    <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/25.png') }}">
                                    <br><br>
                                    <a style="width:100%;" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/stk_line/stk_line.rar') }}" download >
                                        ดาวน์โหลด
                                    </a>
                                </div>
                            </div>
                            <!-- -------------------- Presentation ------------------- -->
                            <br>
                            <hr class="text-danger">
                            <br>
                            <h3 style="margin-left: 20px;" class="text-danger">Presentation</h3>
                            <br>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/ViiCHECK.jpg') }}">
                                    <br><br>
                                    <h5>
                                        สไลด์การนำเสนอ ViiCHECK (ภาพรวม)
                                        <a style="float:right;" target="bank" class="btn btn-danger notranslate main-shadow main-radius" href="https://docs.google.com/presentation/d/19DyFZgwG5d3tRlLztAbdbfXfSaoR8Lk5z13_YJnwT4Q/edit?usp=sharing" >
                                            ดูสไลด์
                                        </a>
                                    </h5>
                                </div>
                                <!-- <div class="col-5">
                                    <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/ViiCHECK Check in.jpg') }}">
                                    <br><br>
                                    <h5>
                                        สไลด์การนำเสนอ ViiCHECK ระบบ Check in/out
                                        <a style="float:right;" target="bank" class="btn btn-danger notranslate main-shadow main-radius" href="https://docs.google.com/presentation/d/1fc6tME-T_B73ErsGzvFB_IlKzOVpp9z29RGRiK343X4/edit?usp=sharing" >
                                            ดูสไลด์
                                        </a>
                                    </h5>
                                </div> -->
                                <div class="col-2"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- ------------------- ALL ----------------------- -->


                <!-- ------------------- Vii MOVE ----------------------- -->
                <div class="card" id="div_viimove">
                    <br>
                    <h3 style="margin-left: 20px;" class="text-danger">ขั้นตอนและวิธีการใช้งาน ViiMOVE</h3>
                    <br>
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

                    <!-- -------------------- วิดีโอ ------------------- -->
                    <br>
                    <hr class="text-danger">
                    <br>
                    <h3 style="margin-left: 20px;" class="text-danger">Video ViiMOVE</h3>
                    <br>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 main-shadow main-radius">
                                <iframe width="100%" height="600" src="https://www.youtube.com/embed/kb9UjWQCltg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- ------------------- Vii MOVE ----------------------- -->

                <!-- ------------------- Vii sos ----------------------- -->
                <div class="card" id="div_viisos">

                    <div class="row">
                        <div class="col-8">
                            <br>
                            <br>
                            <div class=" main-shadow main-radius">
                                <iframe style="width: 100%;height: 675px;object-fit: contain;" src="https://www.youtube.com/embed/fH_cpKG-YCQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-4">
                            <img style="width: 100%;height: 675;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/viisos/SOS-Viicheck.png') }}">
                            <br>
                            <a style="width: 100%" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/viisos/SOS-Viicheck.png') }}" download >
                                ดาวน์โหลด
                            </a>
                        </div>
                    </div>
                    <!-- -------------------- Presentation ------------------- -->
                    <br>
                    <hr class="text-danger">
                    <br>
                    <h3 style="margin-left: 20px;" class="text-danger">Presentation</h3>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/viisos/ViiCHECK SOS.jpg') }}">
                            <br><br>
                            <h5>
                                สไลด์การนำเสนอ ViiCHECK SOS
                                <a style="float:right;" target="bank" class="btn btn-danger notranslate main-shadow main-radius" href="https://docs.google.com/presentation/d/1GaYkgApP_B4b13IpoS0A1ULOFeluXE_TFZoYvzCtt_I/edit?usp=sharing" >
                                    ดูสไลด์
                                </a>
                            </h5>
                        </div>
                        <div class="col-5">
                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/viisos/ตัวอย่างการแจ้งเตือนSOS.jpg') }}">
                            <br><br>
                            <h5>
                                สไลด์การนำเสนอ ตัวอย่างการแจ้งเตือน SOS (สำหรับเจ้าหน้าที่)
                                <a style="float:right;" target="bank" class="btn btn-danger notranslate main-shadow main-radius" href="https://docs.google.com/presentation/d/1wp95Eav537LULr7PRSYefPqpysZPIF5SUcSczT3wBTw/edit?usp=sharing" >
                                    ดูสไลด์
                                </a>
                            </h5>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <br>
                </div>
                <!-- ------------------- Vii sos ----------------------- -->

                <!-- ------------------- Check in ----------------------- -->
                <div class="card" id="div_check_in">
                <br>
                <h3 style="margin-left: 20px;" class="text-danger">รูปภาพตัวอย่าง</h3>
                <br>
                    <div class="row">
                        <div class="col-6">
                            <img style="width: 100%;height: 500px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/check_in/artwork_check_in.png') }}">
                            <br><br>
                            <center>
                                <a style="width: 60%;" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/check_in/artwork_check_in.png') }}" download >
                                    ดาวน์โหลด
                                </a>
                            </center>
                        </div>

                        <div class="col-6">
                            <img style="width: 100%;height: 500px;object-fit: contain;" src="{{ asset('/img/สื่อประชมสัมพันธ์/check_in/howtouse.png') }}">
                            <br><br>
                            <center>
                                <a style="width: 60%;" class="btn btn-danger notranslate main-shadow main-radius" href="{{ asset('/img/สื่อประชมสัมพันธ์/check_in/howtouse.png') }}" download >
                                    ดาวน์โหลด
                                </a>
                            </center>
                        </div>
                    </div>
                    <!-- -------------------- Presentation ------------------- -->
                    <br>
                    <hr class="text-danger">
                    <br>
                    <h3 style="margin-left: 20px;" class="text-danger">Presentation</h3>
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <img class="card-img-top main-shadow main-radius" src="{{ asset('/img/สื่อประชมสัมพันธ์/รวม/ViiCHECK Check in.jpg') }}">
                            <br><br>
                            <h5>
                                สไลด์การนำเสนอ ViiCHECK ระบบ Check in/out
                                <a style="float:right;" target="bank" class="btn btn-danger notranslate main-shadow main-radius" href="https://docs.google.com/presentation/d/1fc6tME-T_B73ErsGzvFB_IlKzOVpp9z29RGRiK343X4/edit?usp=sharing" >
                                    ดูสไลด์
                                </a>
                            </h5>
                        </div>
                        <div class="col-1"></div>
                    </div>
                <br>
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
