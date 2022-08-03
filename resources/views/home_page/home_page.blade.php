@extends('layouts.viicheck')

@section('content')

<!-- ======= Hero Section ======= -->
<!-- End Hero -->

</div>
<main id="main">
  @if(Auth::check())
  <!-- MODAL ยินดีต้อนรับกลับมา -->
  <button id="btn_welcome_home" class="d-none" data-toggle="modal" data-target="#welcome_home">
  </button>
  <div id="welcome_home" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-12">
            <center>
              <img style="width:100%;position:absolute;" src="{{ url('/') }}/img/more/giphy.gif">
              <img style="width:80%;position:absolute;right: 50px;" src="{{ url('/') }}/img/more/1360.gif">
              <img style="width:100%;position: relative;" src="{{ url('/') }}/img/stickerline/PNG/3.png">
              <br><br>
              <h2>ยินดีต้อนรับกลับมา</h2>
              <h1 class="text-primary"><b>คุณ {{ Auth::user()->name }}</b></h1>
              <p>วีคิดถึงคุณที่สุด คุณหายไปตั้ง {{ $cancel_ago }}</p>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- สิ้นสุด MODAL ยินดีต้อนรับกลับมา -->
  @endif

  <!-- Button trigger modal -->
  <button id="btn_modal_addline" type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal_addline">
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal_addline" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <p class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </p>
        </div>
        <div class="modal-body">
          <center>
            <a href="https://lin.ee/xnFKMfc">
              <img width="100%" src="{{ asset('/img/more/poster add line 2.png') }}">
            </a>
          </center>
        </div>
        <div class="modal-footer">
          <a href="https://lin.ee/xnFKMfc">
            <button type="button" class="btn btn-success">เพิ่มเพื่อน</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Why Us Section ======= -->
  <div class="d-none d-lg-block" style="font-family: 'Kanit', sans-serif;">
    <section id="hero" class="d-flex align-items-center ">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 wow  fadeInLeft"> <img width="70%" src="{{ asset('Medilab/img/icon.png') }}" alt=""> </div>
          <div class="col-sm-6  wow  fadeInRight" style="margin-top:60px;">
            <h1 style="text-align: right;font-family: 'Kanit', sans-serif;">ยินดีต้อนรับสู่ ViiCHECK</h1>
            <h2 class="wow  fadeInRight" style="text-align: right;font-family: 'Kanit', sans-serif;">ร่วมกันสร้างสังคมแห่งการช่วยเหลือ <br>แบ่งปันความสุขและมิตรภาพที่ดีกับ "วีเช็ค"</h2>
            <a style="font-size: 18px; float: right;font-family: 'Kanit', sans-serif;" href="https://line.me/R/ti/p/%40702ytkls" class=" fadeInRight btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
          </div>

    </section>

    <section id="why-us" class="why-us" style="font-family: 'Kanit', sans-serif;">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch wow fadeInRight">
            <div class="content d-flex align-items-center">
              <img style="z-index: 2;" width="100%" src="{{ asset('/img/more/Service-Viicheck ver3.png') }}">
            </div>
          </div>
          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">

                <div class="icon-box d-flex wow  fadeInDown" style="padding: 10px 33px 10px 33px; margin: 10px;">
                  <div class="row">
                    <div class="col-4 ">
                      <i style="margin: 12px;" class="fas fa-car-crash"></i>
                      <h4 style="font-family: 'Kanit', sans-serif;">เหตุฉุกเฉิน</h4>
                    </div>
                    <div class="col-8">
                      <br>
                      <p style="text-align: left; text-indent:1.5em;">เมื่อเกิดเหตุฉุกเฉินไม่ต้องกังวลใจ
                        แค่เพียงคุณกดปุ่ม <b class="text-dark">"SOS"</b> เพียงเท่านี้จะมีเบอร์ที่จำเป็นแสดงขึ้นมา ไม่ว่าจะเป็น
                        <b class="text-dark">จส.100 ไฟไหม้รถ เหตุด่วนเหตุร้าย</b>
                        หรือแม้กระทั่ง <b class="text-dark">ตำรวจท่องเที่ยว</b>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="icon-box d-flex wow  fadeInDown" style="padding: 10px 33px 10px 33px; margin: 10px;">
                  <div class="row">
                    <div class="col-4 ">
                      <i style="margin: 12px;" class="fas fa-id-card-alt"></i>
                      <h4 style="font-family: 'Kanit', sans-serif;">ติดต่อเจ้าของรถ</h4>
                    </div>
                    <div class="col-8">
                      <br>
                      <p style="text-align: left; text-indent:1.5em;">
                        เมื่อการ<b class="text-dark">จอดซ้อนคัน</b>ทำให้คุณเป็นกังวล
                        คุณเพียงแค่ลงทะเบียนกับ ViiCHECK
                        แล้วนำสติ๊กเกอร์ไปติดที่ของรถ
                        เพียงเท่านี้คุณก็สามารถเดินเที่ยวได้อย่างสบายใจ
                      </p>
                    </div>
                  </div>
                </div>

                <div class="icon-box d-flex wow  fadeInDown" style="padding: 20px 33px 20px 33px; margin: 10px;">
                  <div class="row">
                    <div class="col-4 d-flex align-items-center">
                      <div class="row">
                        <div class="col-12">
                          <i style="margin: 12px;" class="fas fa-virus"></i>
                        </div>
                        <div class="col-12">
                          <h4 class="text-center" style="font-family: 'Kanit', sans-serif;">แจ้งเตือนโรคติดต่อ</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-8">
                      <br>
                      <p style="text-align: left; text-indent:1.5em;">
                        หายห่วงเรื่องการเข้าสถานที่ต่างๆด้วยระบบจะ <b class="text-dark">แจ้งเตือนทันทีเมื่อมีกลุ่มเสี่ยง</b>
                    </div>
                  </div>
                </div>

                <div class="col-6">
                  <div class="icon-box d-flex wow  fadeInDown" style="padding: 10px 33px 10px 33px; margin-top: 10px;">
                    <div class="row">
                      <div class="col-12  text-center">
                        <i style="margin: 12px;" class="fas fa-exclamation-triangle"></i>
                        <h4 style="font-family: 'Kanit', sans-serif;">แจ้งเตือน พรบ./ประกัน</h4>
                      </div>
                      <div class="col-12 text-center" style="padding: 0px;">
                        <p style="text-indent:1.5em;">
                          หายห่วงเรื่องลืมต่ออายุ <b class="text-dark">พรบ./ประกัน</b>ระบบจะ<b class="text-dark">แจ้งเตือนเมื่อใกล้วันครบกำหนด</b>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6" style="padding-right: 0px;">
                  <div class="icon-box d-flex wow  fadeInDown" style="padding: 10px 33px 10px 33px; margin: 10px;">
                    <div class="row">
                      <div class="col-12 ">
                        <i style="margin: 12px;" class="fas fa-bullhorn"></i>
                        <h4 style="font-family: 'Kanit', sans-serif;">โปรโมชั่นยานพาหนะ</h4>
                      </div>
                      <div class="col-12 text-center" style="padding: 0px;">
                        <p style=" text-indent:1.5em;">
                          <b class="text-dark">โปรโมชั่นมากมาย</b>ที่รอเสนอให้คุณใช้บริการรีบเลยก่อนหมดเวลา !
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts wow fadeInRight">
      <div class="container">

        <div class="section-title">
          <h2 style="font-family: 'Kanit', sans-serif;">วีเช็ค (ประเทศไทย)</h2>
          <p>เราภูมิใจที่ได้ให้บริการและช่วยให้คนไทยมีความปลอดภัยหายห่วงกับทุกสถานการณ์</p>
          <br>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box cout-box-shadow">
              <i style="margin-top:-10px;">
                <img width="200%" src="{{ asset('/img/stickerline/PNG/tab.png') }}" alt="">
              </i>
              <span data-purecounter-start="7000" data-purecounter-end="{{ $count_user }}" data-purecounter-duration="1" class="purecounter"></span>
              <p style="font-family: 'Kanit', sans-serif;"><b>สมาชิก</b></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box cout-box-shadow">
              <i style="margin-top:-10px;">
                <img width="200%" src="{{ asset('/img/stickerline/PNG/24.png') }}" alt="">
              </i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_vehicle * 3 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p style="font-family: 'Kanit', sans-serif;"><b>ยานพาหนะ</b></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box cout-box-shadow">
              <i style="margin-top:-10px;">
                <img width="200%" src="{{ asset('/img/stickerline/PNG/21.png') }}" alt="">
              </i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_help }}" data-purecounter-duration="1" class="purecounter"></span>
              <p style="font-family: 'Kanit', sans-serif;"><b>ให้การช่วยเหลือ</b></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box cout-box-shadow">
              <i style="margin-top:-10px;">
                <img width="200%" src="{{ asset('/img/stickerline/PNG/18.png') }}" alt="">
              </i>
              <span data-purecounter-start="0" data-purecounter-end="77" data-purecounter-duration="1" class="purecounter"></span>
              <p style="font-family: 'Kanit', sans-serif;"><b>จังหวัดที่ครอบคลุม</b></p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Counts Section -->
    
    <div class="containersystem">
      <div class="item mysystem col-2" style=" top: 5rem;">
        <ul class="nav flex-column">
          <li class="nav-item ">
            <a class="nav-link  notranslate" href="#tab-1" style="font-size: 20px;">
              <i class="fa-duotone fa-bullhorn"></i> ViiSOS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link notranslate" href="#tab-2" style="font-size: 20px;">
              <i class="fa-duotone fa-cars"></i> ViiMOVE
            </a>
          </li>
          <li class="nav-item" style="border:0px solid">
            <a class="nav-link notranslate" href="#tab-3" style="font-size: 20px;">
              <i class="fa-duotone fa-virus-covid"></i> ViiCARE
            </a>
          </li>
        </ul>
      </div>
      <div class="item">
        <div class="tab-content">
          <span id="tab-1" style="position: absolute;margin-top:-130px"></span>
          <div style="margin-bottom: 25px;">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3 style="font-family: 'Kanit', sans-serif;" class="text-center"> <b>ระบบช่วยเหลือเหตุฉุกเฉิน ViiSOS</b> </h3>
                <p style="text-indent: 15px;font-size:20px;">สามารถขอความช่วยเหลือจากเจ้าหน้าที่ในพื้นที่เพื่อรับการช่วยเหลือที่รวดเร็วมากยิ่งขึ้น และระบบยังแสดงเบอร์ที่จำเป็นต่างๆตามประเทศที่ท่านอยู่ นอกจากนี้ระบบยังรองรับหลากหลายภาษาทั่วโลก </span>
                <p style="font-size:20px;"><b>ขั้นตอนการใช้งาน</b></p>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>สแกน <span style="color: #EB2424;">QR CODE</span>เพื่อเข้าสู่ Line Official ของ <span style="color: #EB2424;">Viicheck</b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="img-fluid">
                  </a>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>เลือกเมนู <span style="color: #EB2424;">SOS</span></b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos2.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos2.png') }}" class="img-fluid">
                  </a>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>กดขอความช่วยเหลือจากเจ้าหน้าที่ได้เลย!!</b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos3.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos3.png') }}" class="img-fluid">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2 about">
                <div class="item mysystem-video">
                  <div style="border: 1px solid red; border-radius: 10px;" class="video-box2 d-flex justify-content-center align-items-stretch position-relative">
                    <a href="{{ asset('Medilab/video/ViiCheck_Compress1.mp4') }}" class="glightbox play-btn mb-4"></a>
                    <img width="100%" style="border: 1px solid red; border-radius: 10px;" src="{{ asset('/img/stickerline/PNG/21.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <hr style="border:#EB2424 0.1px solid"> 
          <br><br>
          <span id="tab-2" style="position: absolute;margin-top:-130px"></span>
          <div style="margin-bottom: 25px;">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-2">
                <h3 style="font-family: 'Kanit', sans-serif;" class="text-center"> <b>ระบบติดต่อเจ้าของรถ ViiMOVE</b> </h3>
                <p style="text-indent: 15px;font-size:18px;">หมดปัญหาเรื่องการจอดรถซ้อนคัน เพียงลงทะเบียนรถกับ ViiCHECK และดาวน์โหลดแล้วนำไปติดที่รถของคุณ นอกจากนี้ระบบจะแจ้งเตือนไปยังคุณเมื่อใกล้ถึงวันหมด ประกัน/พรบ. </p>
                <p style="font-size:20px;"><b>ขั้นตอนการใช้งาน</b></p>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head">
                    <b>
                      สแกน<span style="color: #EB2424;">QR CODE</span>เพื่อเข้าสู่ Line Official<span style="color: #EB2424;">Viicheck</span>
                    </b>
                  </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="img-fluid">
                  </a>               
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">ลงทะเบียน</span>ในการใช้งาน <span style="color: #EB2424;">Viicheck</span></b></span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove1.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove1.png') }}" class="img-fluid">
                  </a>                
                </div>

                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">กรอกข้อมูล</span>รถของคุณเพื่อใช้บริการ<span style="color: #EB2424;">Viicheck</b> </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove2.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove2.png') }}" class="img-fluid">
                  </a>               
                </div>

                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">ดาวน์โหลด</span>และ<span style="color: #EB2424;">ติดสติ๊กเกอร์</b> </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove3.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove3.png') }}" class="img-fluid">
                  </a>               
                </div>
                <div class="timeline_content">
                  <div class="col-lg-6 col-md-6  text-center">
                    <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download>
                      <div class="icon-box" style="padding: 0px;">
                        <img width="80%" src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt="">
                        <br>
                        <button type="button" class="btn btn-danger">Download</button>
                      </div>
                    </a>
                  </div>
                  <div class="col-lg-6 col-md-6  text-center">
                    <a id="sticker_qr_1" href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
                      <div class="icon-box" style="padding: 0px;">
                        <img id="sticker_qr_2" width="80%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt="">
                        <br>
                        <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 text-center order-1 order-lg-1 about">
                <div class="item mysystem-video">
                  <div style="border: 1px solid red; border-radius: 10px;" class="video-box2 d-flex justify-content-center align-items-stretch position-relative">
                    <a href="{{ asset('Medilab/video/ViiMOVE.mp4') }}" class="glightbox play-btn mb-4"></a>
                    <img width="100%" style="border: 1px solid red; border-radius: 10px;" src="{{ asset('/img/stickerline/PNG/24.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <span id="tab-3" style="position: absolute;margin-top:-130px"></span>
          <div>
            <div class="row">
              <div class="col-12 details ">
                <h3 style="font-family: 'Kanit', sans-serif;"> <b>แจ้งเตือนโรคติดต่อ</b> </h3>
                <span style="text-indent: 5px;font-size:18px;" class="timeline_head">เข้าสถานที่ต่างๆได้อย่างหายห่วง ด้วยระบบ<span style="color: #EB2424;"> ViiCARE </span>เพียงแสกน<span style="color: #EB2424;"> QR-Code </span>ก่อนเข้าพื้นที่ หากเกิดโรคติดต่อขึ้นในพื้นที่ ระบบจะแจ้งเตือนไปยังกลุ่มเสี่ยงพร้อมทั้งระบุแนวทางการปฎิบัติเบื้องต้น </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- End Services Section -->

    <section id="gallery" class="gallery">
      <div class="container">
        <div class="section-title">
          <h2 style="font-family: 'Kanit', sans-serif;">ขอขอบคุณความไว้วางใจในการใช้ระบบ <span style="color: #EB2424;">ViiCHECK</span></h2>
        </div>
      </div>

      <div class="container">
        <div class="row no-gutters">
          <div class=" owl-4-style">
              <div class="owl-carousel owl-4 ">

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/2.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/2.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/3.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/3.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/1.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/1.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/4.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/4.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/6.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: cover;height: 290px;" src="{{ asset('/img/review/6.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/7.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: cover;height: 290px;" src="{{ asset('/img/review/7.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

              </div>
            </div>
        </div>
      </div>
    </section>
<br><br>
<!-- thx_partner -->
@include('home_page/thx_partner')
  <!-- section บริการ peddyhub -->
  <section id="peddyhub" class="doctors d-none d-lg-block">
    <div class="container">

      <div class="section-title">
        <h2>บริการดีๆจาก PEDDyHUB</h2>
        <p>PeddyHub ศูนย์รวมบริการ ข้อมูล และ community สำหรับคนรักสัตว์ peddy hub ครบจบในที่เดียว !!</p>
      </div>

      <div class="row">

        <div class="col-lg-6 ">
          <a class="peddyhub" href="https://lin.ee/QRPGdf7">
            <div class="d-flex align-items-start member">
              <div class="row">
                <div class="col-2 text-center align-self-center p-0">
                  <img width="100%" src="{{ asset('/img/sticker_ph/1.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-10">
                  <h4>ตามหาเจ้าตัวแสบ</h4>
                  <p>ตามหาเจ้าตัวแสบได้ง่ายๆ เพียงลงทะเบียนสัตว์เลี้ยงกับระบบ ของเรา เพียงเท่านี้ ผู้คนที่อยู่ในบริเวณใกล้เคียงก็พร้อมช่วยเหลือท่านทันที</p>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-6 ">
          <a class="peddyhub" href="https://lin.ee/QRPGdf7">
            <div class="d-flex align-items-start member">
              <div class="row">
                <div class="col-2 text-center align-self-center p-0">
                  <img width="85%" src="{{ asset('/img/sticker_ph/5.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-10">
                  <h4>บัตรประจำตัวสัตว์เลี้ยง</h4>
                  <p>เมื่อลงทะเบียนสัตว์ เรามีบัตรประจำตัวสัตว์เลี้ยงให้ ภายในบัตรมีรายละเอียดสัตว์เลี้ยงอย่าครบถ้วนรวมไปถึงข้อมูลติดต่อเจ้าของอีกด้วย </p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <!-- <div class="col-lg-6 ">
            <a class="peddyhub" href="https://lin.ee/QRPGdf7">
              <div class="d-flex align-items-start member">
                <div class="row">
                  <div class="col-2 text-center align-self-center p-0" >
                    <img width="90%" src="{{ asset('/img/sticker_ph/3.png') }}" class="img-fluid" alt="">
                  </div>
                  <div class="col-10">
                    <h4>อาหารและอุปกรณ์</h4>
                    <p>อาหารและอุปกรณ์สัตว์เลี้ยง มีคุณภาพและได้มาตรฐาน พร้อมบริการส่ง 24 ชม. และโปรโมชั่นลดราคาสุดพิเศษเตรียมไว้เพื่อคุณแล้ว</p>
                  </div>
                </div>
              </div>
            </a>
          </div> -->

        <div class="col-12"><br></div>

        <div class="col-lg-6 ">
          <a class="peddyhub" href="https://lin.ee/QRPGdf7">
            <div class="d-flex align-items-start member">
              <div class="row">
                <div class="col-2 text-center align-self-center p-0">
                  <img width="100%" src="{{ asset('/img/sticker_ph/2.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-10">
                  <h4>โรงพยาบาลสัตว์ </h4>
                  <p>เมื่อต้องการหาโรงพยาบาลสัตว์ ก็สามารถค้นหาโรงพยาบาลสัตว์ใกล้คุณได้ทันที</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 ">
          <a class="peddyhub" href="https://lin.ee/QRPGdf7">
            <div class="d-flex align-items-start member">
              <div class="row">
                <div class="col-2 text-center align-self-center p-0">
                  <img width="100%" src="{{ asset('/img/sticker_ph/4.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-10">
                  <h4>ชุมชนคนรักสัตว์ </h4>
                  <p>เรามีชุมชนสำหรับคนรักสัตว์ สามารถชมหรือมาแชร์ความน่ารักของสัตว์เลี้ยงของทุกๆคนได้เลย!!</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12"><br></div>
        <div class="col-12"><br></div>
      </div>
    </div>
  </section>
  <!-- section บริการ peddyhub -->
  </div>


  <!-------------------------------------------------มือถือ-------------------------------------------------->

  <div class="d-block d-lg-none">
    <section id="hero2" class="d-flex align-items-center">
      <div class="container wow  fadeInLeft">
        <h1 style="font-family: 'Kanit', sans-serif;">ยินดีต้อนรับสู่ ViiCHECK</h1>
        <h2 style="font-family: 'Kanit', sans-serif;">ร่วมกันสร้างสังคมแห่งการช่วยเหลือ แบ่งปันความสุขและมิตรภาพที่ดีกับ "วีเช็ค"</h2>
        <a style="font-size: 18px ;font-family: 'Kanit', sans-serif;" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
      </div>

    </section>
    <main id="main">

      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us" style="font-family: 'Kanit', sans-serif;">
        <div class="container">

          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="content">
                <img class="wow  fadeInUp" width="100%" src="{{ asset('/img/more/Service-Viicheck ver3.png') }}" alt="">
                <div class="text-center">
                  <br>
                </div>
              </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-xl-4 d-flex align-items-stretch wow  fadeInDown">
                    <div style="font-family: 'Kanit', sans-serif;" class="icon-box mt-4 mt-xl-0">
                      <i class="fas fa-car-crash"></i>
                      <br>
                      <h4 style="margin:-10px 0px 15px 0px">เหตุฉุกเฉิน</h4>
                      <p>เมื่อเกิดเหตุฉุกเฉินไม่ต้องกังวลใจ</p>
                      <p>แค่เพียงกดปุ่ม <b class="text-dark">"SOS"</b> จะมีเบอร์</p>
                      <p>ที่จำเป็นแสดงขึ้นมา ไม่ว่าจะเป็น</p>
                      <p><b class="text-dark">จส.100 เหตุด่วนเหตุร้าย ไฟไหม้รถ</b></p>
                      <p>หรือแม้กระทั่ง <b class="text-dark">ตำรวจท่องเที่ยว</b></p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch wow  fadeInDown">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="fas fa-id-card-alt"></i>
                      <br>
                      <h4 style="margin:-10px 0px 15px 0px;font-family: 'Kanit', sans-serif;">ติดต่อเจ้าของรถ</h4>
                      <!-- <p>เมื่อการ<b class="text-dark">จอดซ้อนคัน</b>ทำให้คุณไม่สบายใจ</p>
                    <p>เพียงแค่ลงทะเบียนกับเราแล้วนำ</p>
                    <p>สติ๊กเกอร์ไปติดที่ของรถเพียงเท่านี้</p>
                    <p>คุณก็สามารถเดินเที่ยวได้อย่างสบายใจ</p> -->

                      <p>เมื่อการ<b class="text-dark">จอดซ้อนคัน</b>คันทำให้คุณเป็นกังวล </p>
                      <p>คุณเพียงแค่ลงทะเบียนกับ <b class="text-dark">ViiCHECK</b></p>
                      <p>แล้วนำสติ๊กเกอร์ไปติดที่ของรถ </p>
                      <p>เพียงเท่านี้คุณก็สามารถเดินเที่ยวได้อย่างสบายใจ</p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch wow  fadeInDown">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="fas fa-virus"></i>
                      <h4 style="margin:-10px 0px 15px 0px;font-family: 'Kanit', sans-serif;">แจ้งเตือนโรคติดต่อ</h4>
                      <p>หายห่วงเรื่องการเข้าสถานที่ต่างๆ </p>
                      <p>ด้วยระบบจะ <b class="text-dark">แจ้งเตือนทันทีเมื่อมีกลุ่มเสี่ยง</b> </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch wow  fadeInDown">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="fas fa-exclamation-triangle"></i>
                      <h4 style="margin:-10px 0px 15px 0px;font-family: 'Kanit', sans-serif;">แจ้งเตือน พรบ./ประกัน</h4>
                      <p>หายห่วงเรื่องลืมต่ออายุ พรบ./ประกัน </p>
                      <p>ระบบจะ <b class="text-dark">แจ้งเตือนเมื่อใกล้วันครบกำหนด</b> </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch wow  fadeInDown">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="fas fa-bullhorn"></i>
                      <h4 style="margin:-10px 0px 15px 0px;font-family: 'Kanit', sans-serif;">โปรโมชั่นยานพาหนะ</h4>
                      <p> <b class="text-dark">โปรโมชั่นมากมาย</b>ที่รอเสนอให้คุณใช้บริการ </p>
                      <p>รีบเลยก่อนหมดเวลา !</p>
                    </div>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
          </div>

        </div>
      </section><!-- End Why Us Section -->

      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts d-block d-lg-none">
        <div class="container">

          <div class="row">

            <div class="col-lg-3 col-md-6 ">
              <div class="count-box cout-box-shadow">
                <i>
                  <img width="150%" src="{{ asset('/img/stickerline/PNG/tab.png') }}" alt="">
                </i>
                <span data-purecounter-start="7000" data-purecounter-end="{{ $count_user }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>สมาชิก</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-block d-md-none mt-5 wow  fadeInDown">
              <div class="count-box cout-box-shadow">
                <i>
                  <img width="150%" src="{{ asset('/img/stickerline/PNG/24.png') }}" alt="">
                </i>
                <span data-purecounter-start="0" data-purecounter-end="{{ $count_vehicle * 3 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>ยานพาหนะ</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-sm-block mt-5 wow  fadeInDown">
              <div class="count-box cout-box-shadow">
                <i>
                  <img width="150%" src="{{ asset('/img/stickerline/PNG/21.png') }}" alt="">
                </i>
                <span data-purecounter-start="0" data-purecounter-end="{{ $count_help }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>ให้การช่วยเหลือ</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6  mt-5 wow  fadeInDown">
              <div class="count-box cout-box-shadow">
                <i>
                  <img width="150%" src="{{ asset('/img/stickerline/PNG/18.png') }}" alt="">
                </i>
                <span data-purecounter-start="0" data-purecounter-end="77" data-purecounter-duration="1" class="purecounter"></span>
                <p>จังหวัดที่ครอบคลุม</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Counts Section -->

      <!-- ======= Gallery Section ======= -->
    <div class="container  mt-5" style="font-family: 'Kanit', sans-serif;">
      <div class="item">
        <div class="tab-content">
          <span id="tab-1" style="position: absolute;margin-top:-130px"></span>
          <div style="margin-bottom: 25px;">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h4 style="font-family: 'Kanit', sans-serif;" class="text-center mt-3"> <b>ระบบช่วยเหลือเหตุฉุกเฉิน ViiSOS</b> </h4>
                <p style="text-indent: 15px;font-size:16px;font-family: 'Kanit', sans-serif;">สามารถขอความช่วยเหลือจากเจ้าหน้าที่ในพื้นที่เพื่อรับการช่วยเหลือที่รวดเร็วมากยิ่งขึ้น และระบบยังแสดงเบอร์ที่จำเป็นต่างๆตามประเทศที่ท่านอยู่ นอกจากนี้ระบบยังรองรับหลากหลายภาษาทั่วโลก </span>
                <p style="font-size:20px;"><b>ขั้นตอนการใช้งาน</b></p>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>สแกน <span style="color: #EB2424;">QR CODE</span>เพื่อเข้าสู่ Line Official ของ <span style="color: #EB2424;">Viicheck</b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="img-fluid">
                  </a>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>เลือกเมนู <span style="color: #EB2424;">SOS</span></b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos2.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos2.png') }}" class="img-fluid">
                  </a>
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"><span style="text-indent: 25px;font-size:22px;" class="timeline_head"></i><b>กดขอความช่วยเหลือจากเจ้าหน้าที่ได้เลย!!</b></p>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos3.png') }}" class="galelry-lightbox-1">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos3.png') }}" class="img-fluid">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2 about">
                <div class="item mysystem-video">
                  <div style="border: 1px solid red; border-radius: 10px;" class="video-box2 d-flex justify-content-center align-items-stretch position-relative">
                    <a href="{{ asset('Medilab/video/ViiCheck_Compress1.mp4') }}" class="glightbox play-btn mb-4"></a>
                    <img width="100%" style="border: 1px solid red; border-radius: 10px;" src="{{ asset('/img/stickerline/PNG/21.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <hr style="border:#EB2424 0.1px solid"> 
          <br><br>
          <span id="tab-2" style="position: absolute;margin-top:-130px"></span>
          <div style="margin-bottom: 25px;">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-2">
                <h4 style="font-family: 'Kanit', sans-serif;" class="text-center mt-3"> <b>ระบบติดต่อเจ้าของรถ ViiMOVE</b> </h4>
                <p style="text-indent: 15px;font-size:16px;">หมดปัญหาเรื่องการจอดรถซ้อนคัน เพียงลงทะเบียนรถกับ ViiCHECK และดาวน์โหลดแล้วนำไปติดที่รถของคุณ นอกจากนี้ระบบจะแจ้งเตือนไปยังคุณเมื่อใกล้ถึงวันหมด ประกัน/พรบ. </p>
                <p style="font-size:20px;"><b>ขั้นตอนการใช้งาน</b></p>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head">
                    <b>
                      สแกน<span style="color: #EB2424;">QR CODE</span>เพื่อเข้าสู่ Line Official<span style="color: #EB2424;">Viicheck</span>
                    </b>
                  </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viisos1.png') }}" class="img-fluid">
                  </a>               
                </div>
                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">ลงทะเบียน</span>ในการใช้งาน <span style="color: #EB2424;">Viicheck</span></b></span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove1.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove1.png') }}" class="img-fluid">
                  </a>                
                </div>

                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">กรอกข้อมูล</span>รถของคุณเพื่อใช้บริการ<span style="color: #EB2424;">Viicheck</b> </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove2.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove2.png') }}" class="img-fluid">
                  </a>               
                </div>

                <div class="d-flex align-items-center">
                  <i class="fa-solid fa-circle timeline_icon"></i>
                  <span style="text-indent: 5px;font-size:18px;" class="timeline_head"> <b><span style="color: #EB2424;">ดาวน์โหลด</span>และ<span style="color: #EB2424;">ติดสติ๊กเกอร์</b> </span>
                </div>
                <div class="timeline_content">
                  <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove3.png') }}" class="galelry-lightbox-2">
                    <img style="border-radius: 20px;" src="{{ asset('/img/ขั้นตอนการลงทะเบียน/viimove3.png') }}" class="img-fluid">
                  </a>               
                </div>
                <div class="row">
                  <div class="col-6  text-center">
                    <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download>
                      <div class="icon-box" style="padding: 0px;">
                        <img width="100%" src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt="">
                        <br>
                        <button type="button" class="btn btn-danger">Download</button>
                      </div>
                    </a>
                  </div>
                  <div class="col-6 text-center">
                    <a id="sticker_qr_1" href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
                      <div class="icon-box" style="padding: 0px;">
                        <img id="sticker_qr_2" width="100%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt="">
                        <br>
                        <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 text-center order-1 order-lg-1 about">
                <div class="item mysystem-video">
                  <div style="border: 1px solid red; border-radius: 10px;" class="video-box2 d-flex justify-content-center align-items-stretch position-relative">
                    <a href="{{ asset('Medilab/video/ViiMOVE.mp4') }}" class="glightbox play-btn mb-4"></a>
                    <img width="100%" style="border: 1px solid red; border-radius: 10px;" src="{{ asset('/img/stickerline/PNG/24.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <span id="tab-3" style="position: absolute;margin-top:-130px"></span>
          <div>
            <div class="row">
              <div class="col-12 details ">
                <h4 style="font-family: 'Kanit', sans-serif;"> <b>แจ้งเตือนโรคติดต่อ</b> </h4>
                <span style="text-indent: 5px;font-size:16px;" class="timeline_head">เข้าสถานที่ต่างๆได้อย่างหายห่วง ด้วยระบบ<span style="color: #EB2424;"> ViiCARE </span>เพียงแสกน<span style="color: #EB2424;"> QR-Code </span>ก่อนเข้าพื้นที่ หากเกิดโรคติดต่อขึ้นในพื้นที่ ระบบจะแจ้งเตือนไปยังกลุ่มเสี่ยงพร้อมทั้งระบุแนวทางการปฎิบัติเบื้องต้น </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- End Services Section -->

  <section id="gallery" class="gallery">
      <div class="container">
        <div class="section-title">
          <h4 style="font-family: 'Kanit', sans-serif;"> <b> ขอขอบคุณความไว้วางใจในการใช้ระบบ <span style="color: #EB2424;">ViiCHECK</span></b></h4>
        </div>
      </div>

      <div class="container">
        <div class="row no-gutters">
          <div class=" owl-4-style">
              <div class="owl-carousel owl-4 ">

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/2.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/2.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/3.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/3.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/1.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/1.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/4.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: contain;max-height: 290px;" src="{{ asset('/img/review/4.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/6.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: cover;height: 290px;" src="{{ asset('/img/review/6.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

                <div class="gallery-item item">
                  <a href="{{ asset('/img/review/7.jpg') }}" class="galelry-lightbox">
                    <img style="object-fit: cover;height: 290px;" src="{{ asset('/img/review/7.jpg') }}" alt="" class="img-fluid">
                  </a>
                </div>

              </div>
            </div>
        </div>
      </div>
    </section>

      <!-- thx_partner -->
      @include('home_page/thx_partner')

      <!-- section บริการ peddyhub -->
      <section id="peddyhub" class="doctors" style="padding-bottom:5px;">
        <div class="container">

          <div class="section-title">
            <h2>บริการดีๆจาก PEDDyHUB</h2>
            <p>PeddyHub ศูนย์รวมบริการ ข้อมูล และ community สำหรับคนรักสัตว์ peddy hub ครบจบในที่เดียว !!</p>
          </div>

          <div class="row">

            <div class="col-12 ">
              <a class="peddyhub" href="https://lin.ee/QRPGdf7">
                <div class="d-flex align-items-start member">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="text-center">ตามหาเจ้าตัวแสบ</h4>
                    </div>
                    <div class="col-3 text-center align-self-center p-0">
                      <img width="100%" src="{{ asset('/img/sticker_ph/1.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9">
                      <p>ตามหาเจ้าตัวแสบได้ง่ายๆ เพียงลงทะเบียนสัตว์เลี้ยงกับระบบ ของเรา เพียงเท่านี้ ผู้คนที่อยู่ในบริเวณใกล้เคียงก็พร้อมช่วยเหลือท่านทันที</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-12"><br></div>
            <div class="col-12 ">
              <a class="peddyhub" href="https://lin.ee/QRPGdf7">
                <div class="d-flex align-items-start member">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="text-center">บัตรประจำตัวสัตว์เลี้ยง</h4>
                    </div>
                    <div class="col-3 text-center align-self-center p-0">
                      <img width="100%" src="{{ asset('/img/sticker_ph/5.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9">
                      <p>เมื่อลงทะเบียนสัตว์ เรามีบัตรประจำตัวสัตว์เลี้ยงให้ ภายในบัตรมีรายละเอียดสัตว์เลี้ยงอย่าครบถ้วนรวมไปถึงข้อมูลติดต่อเจ้าของอีกด้วย </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-12"><br></div>

            <div class="col-12 ">
              <a class="peddyhub" href="https://lin.ee/QRPGdf7">
                <div class="d-flex align-items-start member">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="text-center">โรงพยาบาลสัตว์ </h4>
                    </div>
                    <div class="col-3 text-center align-self-center p-0">
                      <img width="100%" src="{{ asset('/img/sticker_ph/2.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9">
                      <p>เมื่อต้องการหาโรงพยาบาลสัตว์ ก็สามารถค้นหาโรงพยาบาลสัตว์ใกล้คุณได้ทันที</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-12"><br></div>
            <div class="col-12 ">
              <a class="peddyhub" href="https://lin.ee/QRPGdf7">
                <div class="d-flex align-items-start member">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="text-center">ชุมชนคนรักสัตว์ </h4>
                    </div>
                    <div class="col-3 text-center align-self-center p-0">
                      <img width="100%" src="{{ asset('/img/sticker_ph/4.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-9">
                      <p>เรามีชุมชนสำหรับคนรักสัตว์ สามารถชมหรือมาแชร์ความน่ารักของสัตว์เลี้ยงของทุกๆคนได้เลย!!</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- section บริการ peddyhub -->
  </div>
  @if(Auth::check())
  <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">

  <!-- Button trigger modal -->
  <button id="btn_check_user_Modal" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#check_user_Modal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="check_user_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ยินดีต้อนรับคุณ <span id="name_user" class="text-primary"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b>คุณต้องการเปลี่ยนชื่อผู้ใช้และรหัสผ่านหรือไม่</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่ใช่</button>
          <button type="button" class="btn btn-primary" onclick="open_put_email();">ใช่ ฉันต้องการเปลี่ยน</button>
        </div>
      </div>
    </div>
  </div>

  <!-- email -->
  <!-- Button trigger modal -->
  <button id="btn_email_Modal" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#email_Modal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="email_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">กรุณากรอกอีเมล</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="put_username" class="control-label"><b>{{ 'ชื่อผู้ใช้' }}</b></label>
          <span><a id="text_check" href="#" class="text-success" onclick="check_username();">&nbsp;ตรวจสอบ</a></span>
          <input class="form-control" type="text" name="put_username" id="put_username" value="{{ Auth::user()->username }}">
          <span id="check" class="d-none text-success"><i class="fas fa-check-circle text-success"></i>&nbsp;ชื่อผู้ใช้นี้ใช้งานได้</span>
          <span id="times" class="d-none text-danger"><i class="fas fa-times-circle text-danger"></i>&nbsp;ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว</span>
          <br><br>
          <div id="div_email" class="d-none">
            <p><b>คุณจำเป็นต้องกรอกอีเมลเพื่อเปลี่ยนรหัสผ่าน</b></p>
            <span><a id="text_check" href="#" class="text-success" onclick="check_email();">&nbsp;ตรวจสอบ</a></span>

            <input class="form-control" type="email" name="put_email" id="put_email" value="{{ Auth::user()->email }}">
            <span id="email_check" class="d-none text-success"><i class="fas fa-check-circle text-success"></i>&nbsp;อีเมลนี้ใช้งานได้</span>
            <span id="email_times" class="d-none text-danger"><i class="fas fa-times-circle text-danger"></i>&nbsp;อีเมลนี้ไม่สามารถใช้งานได้</span>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่ใช่</button> -->
          <button id="btn_ok" type="button" class="btn btn-primary d-none" onclick="put_email();">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  @if (Route::has('password.request'))
  <a id="reset" class="text-dark d-none" href="{{ route('password.request') }}">
    <b>{{ __('เปลี่ยนรหัสผ่าน') }}</b>
  </a>
  @endif
  @endif

  <!-- Messenger ปลั๊กอินแชท Code -->
  <div id="fb-root"></div>

  <!-- Your ปลั๊กอินแชท code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "107783134685421");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v12.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

</main><!-- End #main -->
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    check_user();
    check_add_line();

    var delayInMilliseconds = 2500; //1 second

    setTimeout(function() {
      check_language();
    }, delayInMilliseconds);
  });

  function check_language() {
    let language = document.querySelector(".goog-te-combo");
    // console.log(language.value);
    // console.log(language);

    let link_url = ("{{ url('/') }}/img/sticker_qr/sticker_qr_" + language.value + ".png");
    // console.log(link_url);

    var sticker_qr_1 = document.getElementById("sticker_qr_1");
    var sticker_qr_2 = document.getElementById("sticker_qr_2");

    var att_1 = document.createAttribute("href");
    att_1.value = link_url;
    var att_2 = document.createAttribute("src");
    att_2.value = link_url;

    sticker_qr_1.setAttributeNode(att_1);
    sticker_qr_2.setAttributeNode(att_2);
  }

  function check_user() {
    let id_user = document.querySelector("#id_user");
    // console.log(id_user.value);

    fetch("{{ url('/') }}/api/check_user/" + id_user.value)
      .then(response => response.json())
      .then(result => {
        // console.log(result);
        if (result) {
          document.getElementById("btn_check_user_Modal").click();

          for (let item of result) {
            let name_user = document.querySelector("#name_user");
            name_user.innerHTML = item.name;

          }
        }


      });
  }

  function check_add_line() {
    let id_user = document.querySelector("#id_user");
    // console.log(id_user.value);

    fetch("{{ url('/') }}/api/check_add_line/" + id_user.value)
      .then(response => response.json())
      .then(result => {
        // console.log(result[0]['add_line']);

        if (result[0]['type'] === 'line' && result[0]['add_line'] !== 'Yes') {
          document.getElementById("btn_modal_addline").click();
        }

      });
  }

  function open_put_email() {
    document.getElementById("btn_email_Modal").click();
  }

  function put_email() {

    let put_email = document.querySelector("#put_email");
    let put_username = document.querySelector("#put_username");
    let id_user = document.querySelector("#id_user");
    // console.log(put_email.value);
    // console.log(id_user.value);

    fetch("{{ url('/') }}/api/put_email/" + put_email.value + "/" + id_user.value + "/" + put_username.value)
      .then(response => response.json())
      .then(result => {
        console.log(result);
        document.getElementById("reset").click();
      });
  }

  function check_username() {

    let put_username = document.querySelector("#put_username");
    let id_user = document.querySelector("#id_user");

    fetch("{{ url('/') }}/api/check_username/" + put_username.value + "/" + id_user.value)
      .then(response => response.json())
      .then(result => {
        // console.log(result.length);

        if (result.length == 0) {
          document.querySelector('#check').classList.remove('d-none');
          document.querySelector('#times').classList.add('d-none');
          document.querySelector('#div_email').classList.remove('d-none');
        } else {
          document.querySelector('#check').classList.add('d-none');
          document.querySelector('#times').classList.remove('d-none');
          document.querySelector('#div_email').classList.add('d-none');
        }

      });
  }

  function check_email() {

    let put_email = document.querySelector("#put_email");

    fetch("{{ url('/') }}/api/check_email/" + put_email.value)
      .then(response => response.json())
      .then(result => {
        // console.log(result);

        if (result.length == 0) {
          document.querySelector('#email_check').classList.remove('d-none');
          document.querySelector('#email_times').classList.add('d-none');
          document.querySelector('#btn_ok').classList.remove('d-none');
        } else {
          document.querySelector('#email_check').classList.add('d-none');
          document.querySelector('#email_times').classList.remove('d-none');
          document.querySelector('#btn_ok').classList.add('d-none');
        }

      });
  }
</script>

@endsection