@extends('layouts.viicheck')

@section('content')

  <!-- ======= Hero Section ======= -->
<!-- End Hero -->

  <main id="main">
    @if(Auth::check())
      <!-- MODAL ยินดีต้อนรับกลับมา -->
      <button  id="btn_welcome_home" class="d-none" data-toggle="modal" data-target="#welcome_home">
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

    <!-- ======= Why Us Section ======= -->
    <div class="d-none d-lg-block">
    <section id="hero" class="d-flex align-items-center">
    <div class="container">
    <div class="row">
    <div class="col-sm-6">  <img width="70%" src="{{ asset('Medilab/img/icon.png') }}" alt=""> </div>
    <div class="col-sm-6" style="margin-top:60px;"> <h1 style="text-align: right;">ยินดีต้อนรับสู่ ViiCHECK</h1>
      <h2 style="text-align: right;">ร่วมกันสร้างสังคมแห่งการช่วยเหลือ <br>แบ่งปันความสุขและมิตรภาพที่ดีกับ "วีเช็ค"</h2>
      <a style="font-size: 18px; float: right;" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
    </div>

  </section>
    
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="content">
              <img style="z-index: 2;"  width="100%" src="{{ asset('/img/more/poster-v4-good-Vii-NO-TEXT.jpeg') }}">
              <div class="text-center">
                <h4 style="margin-top: -230px;"><b id="reg_num"></b>ให้เราได้ช่วยเหลือคุณ</h4>
              </div>
              <center>
                  <div style="position: absolute;top: 309px;left: 31%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>ลงทะเบียนแล้วใช้ได้ทันที!</b></p>
                  </div>
                  <div style="position: absolute;top: 467px;left: 25%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>จอดรถขวาง</b></p>
                  </div>
                  <div style="position: absolute;top: 467px;left: 50%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>รถเกิดอุบัติเหตุ</b></p>
                  </div>
                  <div style="position: absolute;top: 467px;left: 75%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>ไฟรถเปิดอยู่</b></p>
                  </div>
                  <div style="position: absolute;top: 548px;left: 25%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>ปัญหาการขับขี่</b></p>
                  </div>
                  <div style="position: absolute;top: 548px;left: 50%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>เด็กอยู่ในรถ</b></p>
                  </div>
                  <div style="position: absolute;top: 548px;left: 75%;transform: translate(-50%, -50%); z-index: 5; color: #ffff;font-family: 'Prompt', sans-serif;">
                    <p style="font-size:5px;line-height: 20pt; width:250px; overflow: visible;"><b>ปัญหาอื่นๆ</b></p>
                  </div>
              </center>
            </div>
          </div>
          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">

                <div class="icon-box d-flex"  style="padding: 33px; margin: 10px;">
                  <div class="row">
                      <div class="col-4">
                          <i style="margin: 12px;" class="fas fa-car-crash"></i>
                          <h4>เหตุฉุกเฉิน</h4>
                      </div>
                      <div class="col-8" >
                          <br>
                          <p style="text-align: left; text-indent:1.5em;">เมื่อเกิดเหตุฉุกเฉินไม่ต้องกังวลใจ
                          แค่เพียงคุณกดปุ่ม <b class="text-dark">"SOS"</b> เพียงเท่านี้จะมีเบอร์ที่จำเป็นแสดงขึ้นมา ไม่ว่าจะเป็น
                          <b class="text-dark">จส.100 ไฟไหม้รถ เหตุด่วนเหตุร้าย</b>
                          หรือแม้กระทั่ง <b class="text-dark">ตำรวจท่องเที่ยว</b></p>
                      </div>
                  </div>
                </div>

                <div class="icon-box d-flex" style="padding: 33px; margin: 10px;">
                  <div class="row">
                      <div class="col-4">
                          <i style="margin: 12px;" class="fas fa-id-card-alt"></i>
                          <h4>ติดต่อเจ้าของรถ</h4>
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

                <div class="icon-box d-flex" style="padding: 33px; margin: 10px;">
                  <div class="row">
                      <div class="col-4">
                          <i style="margin: 12px;" class="fas fa-user-lock"></i>
                          <h4>เก็บรวบรวมข้อมูล</h4>
                      </div>
                      <div class="col-8">
                          <br>
                          <p style="text-align: left; text-indent:1.5em;">
                          เก็บรวบรวมข้อมูลของคุณไว้ที่เดียว 
                          มีการแจ้งเตือนวันหมดอายุของ <b class="text-dark">พรบ. / ประกัน</b>
                          เมื่อใกล้วันครบกำหนดระบบจะทำการแจ้งเตือน 
                          และคุณหายห่วงได้เลย เรื่อง 
                          <b class="text-dark">รักษาความเป็นส่วนตัว ของผู้ใช้บริการ</b> ในระบบของเรา
                      </div>
                  </div>
                </div>
                
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-5" style="padding:20px;">
                <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                  <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-4"></a>
                </div>
              </div>
              <div class="col-6" style="padding:20px;">
                <br>
                <div  class="icon-boxes d-flex flex-column align-items-stretch justify-content-center ">
                  <h3>Top4 ปัญหาเกี่ยวกับการใช้รถใช้ถนนที่ทุกคนมักเจอ</h3>
                  <p>เชื่อว่า ใครๆที่เดินทางไปไหนมาไหนบ่อยๆ และสันจรโดยรถ โดยเฉพาะอย่างยิ่งในเขตเมืองหรือเขตชุมชน มั่นใจมากว่า คุณต้องเคยเจอปัญหาต่อไปนี้มาแล้วกันทั้งนั้น...</p>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-house-damage"></i></div>
                    <h4 class="title"><a href="">รถจอดขวางหน้าบ้าน</a></h4>
                    <p class="description">ใครที่อาศัยอยู่ในเขตชุมชน เช่น ตลาด ย่านการค้า หรือบ้านที่รั้วบ้านติดๆกันและมีบ้านทั้งสองฝั่ง
                      ต้องเคยมีประสบการณ์แบบนี้มาแล้วแน่นอน ถ้าเกิดมีคนแปลกหน้ามาจอดรถขวางหน้าบ้าน แล้วหายไปโดยไม่สามารถติดต่อได้ 
                      ปัญหาที่ตามมาคือเจ้าของบ้านจะไม่สามารถเอารถออกจากบ้านไปไหนได้ เจ้าของบ้านคงต้องโมโหฉุนเฉียวแน่นอน  
                      เหตุการณ์แบบนี้ที่ตามหรือติดต่อเจ้าของรถไม่ได้  เป็นประเด็นที่เห็นทางโซเชียลบ่อยครั้ง
                    </p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-road"></i></div>
                    <h4 class="title"><a href="">ถนนแคบ วิ่งได้แค่สองเลน แต่คนก็ยังจอดรถขวางเลน</a></h4>
                    <p class="description">ปัญหาที่พบได้บ่อยในย่านชุมชนเล็กๆที่ถนนเป็นแค่ 2 เลน รถวิ่งสวนทางกัน หลายคนมักจอดรถขวางเลนเพื่อลงไปซื้อของริมทาง  รถคันอื่นๆต้องคอยหักหลบ จนทำให้การจราจรติดขัด</p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-ban"></i></div>
                    <h4 class="title"><a href="">จอดรถซ้อนคันแต่ลืมปลดเกียร์ว่างและเอาเบรกมือลง</a></h4>
                    <p class="description">เคยไหม? เวลาไปห้าง ซื้อของเสร็จและอยากลับกลับบ้าน แต่มีรถมาจอดซ้อนคัน คุณจะเข็นก็เข็นไม่ได้เพราะใส่เกียร์ P กับเบรคมือเอาไว้ ห้างก็ตั้งใหญ่ ลูกค้ามีเยอะมาก แต่คุณไม่รู้จะไปตามหาเจ้าของรถได้ที่ไหน ถึงแม้ว่าจะประกาศประชาสัมพันธ์ แต่ก็ไม่สามารถตามตัวเจ้าของรถได้สำเร็จ  เพราะบางครั้งเจ้าของรถก็แค่มาจอดรถทิ้งไว้แล้วไปทำธุระที่อื่น บางคนหายไปเป็นชั่วโมง ซึ่งเสียเวลา</p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-car-crash"></i></div>
                    <h4 class="title"><a href="">รถโดนกรีด ขูด หรือเสียหาย</a></h4>
                    <p class="description">มักเกิดขึ้นในที่จอดรถที่มีรถจำนวนมาก หรือที่จอดรถที่จอดซ้อนคันได้ เมื่อคุณกลับมาที่รถอีกที รถของคุณก็มีรอยซะแล้ว ถ้าบริเวณนั้นไม่มีกล้องวงจรปิด คุณก็ไม่รู้จะไปตามตัวคนที่เป็นสาเหตุความเสียหายของรถคุณได้จากที่ไหน หรือบางครั้ง คุณอยากเป็นพลเมืองดี ต้องการแจ้งอุบัติเหตุที่เกิดกับรถของคนอื่น แต่ก็ไม่รู้จะไปติดต่อเจ้าของรถให้มารับรู้เรื่องยังไงดี</p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="section-title">
          <h2>วีเช็ค (ประเทศไทย)</h2>
          <p>เราภูมิใจที่ได้ให้บริการและช่วยให้คนไทยมีความปลอดภัยหายห่วงกับทุกสถานการณ์</p>
          <br>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-car-alt"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_car * 2 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ลงทะเบียนแล้ว</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-motorcycle"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_motorcycle * 2 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ลงทะเบียนแล้ว</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fas fa-car-crash"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_guest }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ให้การช่วยเหลือ</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-map-marked-alt"></i>
              <span data-purecounter-start="0" data-purecounter-end="77" data-purecounter-duration="1" class="purecounter"></span>
              <p>จังหวัดที่ครอบคลุม</p>
            </div>
          </div>

        </div>


      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Doctors Section ======= -->
    <!-- <section id="doctors" class="doctors">
      <div class="container">

        <div class="row">
          <div style="margin-left: 50px;" class="col-md-5 main-shadow main-radius">
            <div class="member d-flex align-items-start">
              <div style="border-radius:120px;"><img src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt=""></div>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 main-shadow main-radius">
            <div class="member d-flex align-items-start">
              <div style="border-radius:120px;"><img src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt=""></div>
            </div>
          </div>

        </div>

      </div>

      <center>
          <a style="font-size: 18px" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
      </center>
    </section> -->
    <!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>ขั้นตอนการลงทะเบียน</h2>
        </div>
      </div>

      <!-- <div class="container-fluid">
        <div class="row no-gutters">

          
          <div class="col-lg-4 col-md-4 d-none">
            <div class="gallery-item">
              <a href="{{ asset('/img/more/Advantages.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/more/Advantages.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
         
          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/2 how to ลงทะเบียน 1920x1080-01.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/2 how to ลงทะเบียน 1920x1080-01.jpg') }}" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/3 how to ลงทะเบียน 1920x1080-02.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/3 how to ลงทะเบียน 1920x1080-02.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/4 how to ลงทะเบียน 1920x1080-04.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/4 how to ลงทะเบียน 1920x1080-04.jpg') }}" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/5 how to ลงทะเบียน 1920x1080-05.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/5 how to ลงทะเบียน 1920x1080-05.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/6-how-to-ลงทะเบียน-1920x1080-06-v3.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/6-how-to-ลงทะเบียน-1920x1080-06-v3.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/ขั้นตอนการลงทะเบียน/7 how to ลงทะเบียน 1920x1080 cre v2-06.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/7 how to ลงทะเบียน 1920x1080 cre v2-06.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>   -->

      <div class="container-fluid">
        <div class="row no-gutters">

          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
          <div class="col-lg-4 col-md-4 d-none">
            <div class="gallery-item">
                <img src="{{ asset('/img/more/Advantages.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-01.jpg') }}" class="img-fluid">
                <img style="position: absolute;top:30px; left: 45%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/39.png') }}">
            </div> 
            <div style="position: absolute;top: 60%;left: 70%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:30px;line-height: 20pt; width:250px; overflow: visible;"><b>สแกน <span style="color: #EB2424;">QR CODE</span></b></p>
              <p style="font-size:15px;line-height: 15pt; width:250px; overflow: visible;">เพื่อเข้าสู่ Line Official ของ <span style="color: #EB2424;">Viicheck</span></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-02.jpg') }}" alt="" class="img-fluid">
                <img style="position: absolute;top:170px; left: 0%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/10.png') }}">
            </div>
            <div style="position: absolute;top: 44%;left: 75%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:30px;line-height: 20pt; width:200px; overflow: visible;"><b>ลง<span style="color: #EB2424;">ทะเบียน</span></b></p>
              <p style="font-size:15px;line-height: 15pt; width:200px; overflow: visible;">ในการใช้งาน <span style="color: #EB2424;">Viicheck</span></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-04.jpg') }}" class="img-fluid">
                <img style="position: absolute;top:25px; left: 75%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/18.png') }}">
            </div>
            <div style="position: absolute;top: 60%;left: 70%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:30px;line-height: 20pt; width:250px; overflow: visible;"><b>กรอก<span style="color: #EB2424;">ข้อมูล</span></b></p>
              <p style="font-size:15px;line-height: 15pt; width:250px; overflow: visible;">รถของคุณเพื่อใช้บริการ <span style="color: #EB2424;">Viicheck</span></p>
              
            </div>  
          </div>
      
          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-07.jpg') }}" alt="" class="img-fluid">
                <img style="position: absolute;top:30px; left: 75%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/15.png') }}">
            </div>
            <div style="position: absolute;top: 60%;left: 73%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:25px;line-height: 20pt; width:250px; overflow: visible;"><b>ยืนยันการลงทะเบียน</b></p>
              <p style="font-size:15px;line-height: 15pt; width:250px; overflow: visible;">กด"<span style="color: #EB2424;">ยืนยัน</span>"เมื่อข้อมูลถูกต้อง</p>
            </div> 
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-05.jpg') }}" alt="" class="img-fluid">
                <img style="position: absolute;top:50px; left: 50%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/43.png') }}">
                <img style="position: absolute;top:50px; left: 70%;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/20.png') }}">
            </div>
            <div style="position: absolute;top: 70%;left: 70%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:25px;line-height: 20pt; width:250px; overflow: visible;"><b><span style="color: #EB2424;">Download</span> and Print</b></p>
              <p style="font-size:15px;line-height: 15pt; width:250px; overflow: visible;">สติ๊กเกอร์<span style="color: #EB2424;">ViiCHECK</span>ได้เลย!</p>
            </div> 
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/how to ลงทะเบียน 1920x1080 V2 no text-06.jpg') }}" alt="" class="img-fluid">
                <img style="position: absolute;top:40px; left: 67%;z-index: 1;transform:rotate(360deg);" width="130" src="{{ asset('/img/stickerline/PNG/24.png') }}">
            </div>
            <div style="position: absolute;top: 70%;left: 70%;transform: translate(-50%, -50%); z-index: 5; color: #000000;font-family: 'Prompt', sans-serif;">
              <p style="font-size:2px;line-height: 10pt; width:200px; overflow: visible;margin-left:10px;"><b>ร่วมกันสร้างสังคมแห่งการช่วยแบ่งปันความสุข</b></p>
              <p style="font-size:15px;line-height: 15pt; width:200px; overflow: visible;">และมิตรภาพที่ดีกับ"<span style="color: #EB2424;">ViiCHECK</span>"</p>
            </div> 
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>บริการของเรา</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 align-items-stretch">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-id-card-alt"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">ติดต่อเจ้าของรถ</a></h4>
                <p>ติดต่อเจ้าของรถได้ง่ายๆ โดยผ่าน <b>Line Official: @Viicheck</b> เพียงแค่สแกน <b>QR-CODE</b> บนสติ๊กเกอร์</p>
                
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4 mt-md-0">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-car-crash"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">เหตุฉุกเฉิน</a></h4>
                <p>ติดต่อแจ้งเหตุฉุกเฉิน 24 ชั่วโมง</p>
                <p>เพียงแค่กดปุ่มก็จะมีเบอร์ที่จำเป็นแสดงขึ้นมา</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4 mt-lg-0">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">แจ้งเตือน พรบ./ประกัน</a></h4>
                <p>หายห่วงเรื่องลืมต่ออายุ พรบ./ประกัน</p>
                <p>ระบบจะแจ้งเตือนเมื่อใกล้วันครบกำหนด</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 align-items-stretch mt-4">
            <a href="{{ url('/middle_price_car') }}">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                <h4><a href="{{ url('/middle_price_car') }}">ตรวจสอบราคาจากกรมขนส่ง</a></h4>
                <p>เมื่อคิดจะขายหรือขอสินเชื่อก็สามารถตรวจสอบประมาณราคามาตรฐานได้ตลอด</p>
                
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ url('/promotion') }}">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h4><a href="{{ url('/promotion') }}">โปรโมชั่นเกี่ยวกับยานพาหนะ</a></h4>
                <p>โปรโมชั่นมากมายที่รอเสนอให้คุณใช้บริการรีบเลยก่อนหมดเวลา !</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-user-lock"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">เก็บรวบรวมข้อมูล</a></h4>
                <p>รวบรวมข้อมูลไว้ที่เดียว สะดวก รวดเร็ว ง่ายต่อการใช้งาน</p>
                <p>และปลอดภัยด้วยการรักษาความเป็นส่วนตัวของผู้ใช้งาน</p>
              </div>
            </a>
          </div>
          <!-- สติกเกอร์ -->
          @include('home_page/download_sticker')
          </div>

          <!-- <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
              <div class="icon-box">
                <img width="72%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt="">
                <br>
                <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
              </div>
            </a>
          </div>

          <!-- <div class="col-lg-4 col-md-4  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
              <div class="icon-box">
                <br><br><br><br><br><br><br><br><br><br>
                <div style="position: absolute;right: 40px;top: 5%;z-index: 2;margin-left: 40px;">
                  <br>
                    <img width="75%" src="{{ asset('/img/more/sticker-VII-v-nonetext.png') }}" class="img-fluid" alt="">
                    <br>
                    <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
                </div>
                <div style="position: relative;top: -120px;left: -18px; z-index: 5; color: #fff;">
                    <p style="font-size:39px;line-height: 30pt"><b>ติดต่อ</b></p>
                    <p style="font-size:25px;line-height: 30pt">เจ้าของรถ</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
              <div class="icon-box">
                <br><br><br><br><br><br><br><br>
                <div style="position: absolute;right: 40px;top: 5%;z-index: 2;margin-left: 40px;">
                  <br>
                    <img width="75%" src="{{ asset('/img/more/sticker-VII-v-nonetext.png') }}" class="img-fluid" alt="">
                    <br>
                    <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
                </div>
                <div style="position: relative;top: -120px;left: -18px; z-index: 5; color: #fff;">
                    <p style="font-size:39px;line-height: 30pt"><b>ติดต่อ</b></p>
                    <p style="font-size:25px;line-height: 30pt">เจ้าของรถ</p>
                </div>
              </div>
            </a>
          </div> -->

          

          <!-- <div class="col-lg-6 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download >
              <div class="icon-box">
                <div class="circle">Hello I am A Circle</div>
                <style type="text/css">
                  .circle {
                          width: 500px;
                          height: 500px;
                          border-radius: 50%;
                          font-size: 26px;
                          color: #fff;
                          line-height: 500px;
                          text-align: center;
                          background: #000
                        }
                </style>
              </div>
            </a>
          </div> -->

        </div>

      </div>
    </section><!-- End Services Section -->
</div>


<!-------------------------------------------------มือถือ-------------------------------------------------->

<div class="d-block d-lg-none">
<section id="hero2" class="d-flex align-items-center">
    <div class="container">
      <h1>ยินดีต้อนรับสู่ ViiCHECK</h1>
      <h2>ร่วมกันสร้างสังคมแห่งการช่วยเหลือ แบ่งปันความสุขและมิตรภาพที่ดีกับ "วีเช็ค"</h2>
      <a style="font-size: 18px" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
    </div>
    
  </section>
  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
            <img width="100%" src="{{ asset('/img/more/poster-v4-good-Vii-v4.jpg') }}" alt="">
              <div class="text-center">
                <br>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
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
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="fas fa-id-card-alt"></i>
                    <br>
                    <h4 style="margin:-10px 0px 15px 0px">ติดต่อเจ้าของรถ</h4>
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
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="fas fa-user-lock"></i>
                    <h4 style="margin:-10px 0px 15px 0px">เก็บรวบรวมข้อมูล</h4>

                    <p>เก็บรวบรวมข้อมูลของคุณไว้ที่เดียว </p>
                    <p>มีการแจ้งเตือนวันหมดอายุของ </p>
                    <p><b class="text-dark">พรบ. / ประกัน</b> เมื่อใกล้วันครบกำหนด</p>
                    <p>ระบบจะทำการแจ้งเตือน และคุณ  </p>
                     <p>หายห่วงได้เลยเรื่อง  <b class="text-dark">รักษาความเป็นส่วนตัว</b></p>
                    <p><b class="text-dark">ของผู้ใช้บริการ</b> ในระบบของเรา</p>
                  
                    
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
    <!-- ======= About Section ======= -->
    <section id="about1" class="about1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12" style="padding:0px 20px 20px 20px;margin-top:-50px ">
                <div style="border: 1px solid red; border-radius: 10px; min-height: 317px;" class=" video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-4"></a>
                </div>
              </div> <h5  class="text-center"><b>Top4 ปัญหาเกี่ยวกับการใช้รถใช้ถนนที่ทุกคนมักเจอ</b></h5>
                  <p style="text-indent: 50px; ">ใครที่เดินทางไปไหนมาไหนบ่อยๆ โดยเฉพาะอย่างยิ่งในเขตเมืองหรือเขตชุมชน เชื่อว่าต้องเคยเจอปัญหาต่อไปนี้มาแล้วกันทั้งนั้น...</p>
              <div class="col-12" ><br>
                <div  class="icon-boxes d-flex flex-column align-items-stretch justify-content-center ">
                    <div class="icon-box">
                    <center><div class="icon"><i class="fas fa-house-damage"></i></div>
                    <h4 class="title"><a href="">รถจอดขวางหน้าบ้าน</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                      ใครที่อาศัยอยู่ในเขตชุมชน เช่น ตลาด ย่านการค้า หรือบ้านที่รั้วบ้านติดๆกันและมีบ้านทั้งสองฝั่ง
                      ต้องเคยมีประสบการณ์แบบนี้มาแล้วแน่นอน ถ้าเกิดมีคนแปลกหน้ามาจอดรถขวางหน้าบ้าน แล้วหายไปโดยไม่สามารถติดต่อได้ ปัญหาที่ตามมาคือเจ้าของบ้านจะไม่สามารถเอารถออกจากบ้านไปไหนได้ เจ้าของบ้านคงต้องโมโหฉุนเฉียวแน่นอน  เหตุการณ์แบบนี้ที่ตามหรือติดต่อเจ้าของรถไม่ได้  เป็นประเด็นที่เห็นทางโซเชียลบ่อยครั้ง
                    </p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-road"></i></div>
                    <h4 class="title"><a href="">ถนนแคบ วิ่งได้แค่สองเลน แต่คนก็ยังจอดรถขวางเลน</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                      ปัญหาที่พบได้บ่อยในย่านชุมชนเล็กๆที่ถนนเป็นแค่ 2 เลน รถวิ่งสวนทางกัน หลายคนมักจอดรถขวางเลนเพื่อลงไปซื้อของริมทาง  รถคันอื่นๆต้องคอยหักหลบ จนทำให้การจราจรติดขัด 
                    </p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-ban"></i></div>
                    <h4 class="title"><a href="">จอดรถซ้อนคันแต่ลืมปลดเกียร์ว่างและเอาเบรกมือลง</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                      เคยไหม? เวลาไปห้าง ซื้อของเสร็จและอยากลับกลับบ้าน แต่มีรถมาจอดซ้อนคัน คุณจะเข็นก็เข็นไม่ได้เพราะใส่เกียร์ P กับเบรคมือเอาไว้ ห้างก็ตั้งใหญ่ ลูกค้ามีเยอะมาก แต่คุณไม่รู้จะไปตามหาเจ้าของรถได้ที่ไหน ถึงแม้ว่าจะประกาศประชาสัมพันธ์ แต่ก็ไม่สามารถตามตัวเจ้าของรถได้สำเร็จ  เพราะบางครั้งเจ้าของรถก็แค่มาจอดรถทิ้งไว้แล้วไปทำธุระที่อื่น บางคนหายไปเป็นชั่วโมง ซึ่งเสียเวลา
                    </p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-car-crash"></i></div>
                    <h4 class="title"><a href="">รถโดนกรีด ขูด หรือเสียหาย</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                      มักเกิดขึ้นในที่จอดรถที่มีรถจำนวนมาก หรือที่จอดรถที่จอดซ้อนคันได้ เมื่อคุณกลับมาที่รถอีกที รถของคุณก็มีรอยซะแล้ว ถ้าบริเวณนั้นไม่มีกล้องวงจรปิด คุณก็ไม่รู้จะไปตามตัวคนที่เป็นสาเหตุความเสียหายของรถคุณได้จากที่ไหน หรือบางครั้ง คุณอยากเป็นพลเมืองดี ต้องการแจ้งอุบัติเหตุที่เกิดกับรถของคนอื่น แต่ก็ไม่รู้จะไปติดต่อเจ้าของรถให้มารับรู้เรื่องยังไงดี
                    </p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts d-block d-lg-none">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 ">
            <div class="count-box">
              <i class="fas fa-car-alt"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_car * 2 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ลงทะเบียนแล้ว</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-block d-md-none mt-5" >
            <div class="count-box">
              <i class="fas fa-motorcycle"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_motorcycle * 2 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ลงทะเบียนแล้ว</p>
            </div>
          </div>

        

          <div class="col-lg-3 col-md-6 d-sm-block d-none" >
            <div class="count-box">
              <i class="fas fa-motorcycle"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_motorcycle * 2 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ลงทะเบียนแล้ว</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6  mt-5">
            <div class="count-box">
              <i class="fas fa-car-crash"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $count_guest }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>ให้การช่วยเหลือ</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6  mt-5">
            <div class="count-box">
              <i class="fas fa-map-marked-alt"></i>
              <span data-purecounter-start="0" data-purecounter-end="77" data-purecounter-duration="1" class="purecounter"></span>
              <p>จังหวัดที่ครอบคลุม</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Doctors Section ======= -->
    <!-- <section id="doctors" class="doctors">
      <div class="container">

        <div class="row">
          <div class="col-12 main-shadow main-radius">
            <div class="member d-flex align-items-start">
              <div style="border-radius:120px;"><img src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt=""></div>
            </div>
          </div>
          <div class="col-12 main-shadow main-radius">
            <div class="member d-flex align-items-start">
              <div style="border-radius:120px;"><img src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt=""></div>
            </div>
          </div>

        </div>

      </div>

      <center>
          <a style="font-size: 18px" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
      </center>
    </section> -->
    <!-- End Doctors Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery d-block d-lg-none">
      <div class="container">

        <div class="section-title">
          <h2>ขั้นตอนการลงทะเบียน</h2>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
          <div class="col-lg-4 col-md-4 d-none">
            <div class="gallery-item">
              <img src="{{ asset('/img/more/Advantages.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/2 how to ลงทะเบียน 1920x1080-01.jpg') }}" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/3 how to ลงทะเบียน 1920x1080-02.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/4 how to ลงทะเบียน 1920x1080-04.jpg') }}" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/5 how to ลงทะเบียน 1920x1080-05.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
              <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/6-how-to-ลงทะเบียน-1920x1080-06-v3.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item">
                <img src="{{ asset('/img/ขั้นตอนการลงทะเบียน/7 how to ลงทะเบียน 1920x1080 cre v2-06.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>  
    </section><!-- End Gallery Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services d-block d-lg-none">
      <div class="container">

        <div class="section-title">
          <h2>บริการของเรา</h2>
          
        </div>

        <div class="row" >
          <div class="col-lg-4 col-md-6 align-items-stretch" >
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-id-card-alt"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">ติดต่อเจ้าของรถ</a></h4>
                <p>ติดต่อเจ้าของรถได้ง่ายๆ โดยผ่าน <b class="text:dark;">Line Official: @Viicheck</b> เพียงแค่สแกน <b class="text:dark;">QR-CODE</b> บนสติ๊กเกอร์</p>
              
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4 mt-md-0">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-car-crash"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">เหตุฉุกเฉิน</a></h4>
                <p>ติดต่อแจ้งเหตุฉุกเฉิน 24 ชั่วโมง</p>
                <p>เพียงแค่กดปุ่มก็จะมีเบอร์ที่จำเป็นแสดงขึ้นมา</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4 mt-lg-0">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">แจ้งเตือน พรบ./ประกัน</a></h4>
                <p>หายห่วงเรื่องลืมต่ออายุ พรบ./ประกัน</p>
                <p>ระบบจะแจ้งเตือนเมื่อใกล้วันครบกำหนด</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 align-items-stretch mt-4">
            <a href="{{ url('/middle_price_car') }}">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                <h4><a href="{{ url('/middle_price_car') }}">ตรวจสอบประมาณราคามาตรฐาน จากกรมขนส่ง</a></h4>
                <p>เมื่อคิดจะขายหรือขอสินเชื่อ</p>
                <p>ก็สามารถตรวจสอบประมาณราคามาตรฐานได้ตลอด</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ url('/promotion') }}">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h4><a href="{{ url('/promotion') }}">โปรโมชั่นเกี่ยวกับยานพาหนะ</a></h4>
                <p>โปรโมชั่นมากมายที่รอเสนอให้คุณใช้บริการ</p>
                <p>รีบเลยก่อนหมดเวลา !</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="https://line.me/R/ti/p/%40702ytkls">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-user-lock"></i></div>
                <h4><a href="https://line.me/R/ti/p/%40702ytkls">เก็บรวบรวมข้อมูล</a></h4>
                <p>รวบรวมข้อมูลของคุณไว้ที่เดียว สะดวก รวดเร็ว ง่ายต่อการใช้งาน
                ที่สำคัญปลอดภัยด้วยการรักษาความเป็นส่วนตัวของผู้ใช้บริการ</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download>
              <div class="icon-box" style="padding: 40px 15px;">
                <img width="80%" src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt="">
                <br>
                <button type="button" class="btn btn-danger">Download</button>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
              <div class="icon-box" style="padding: 40px 15px;">
                <img width="80%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt="">
                <br>
                <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
              </div>
            </a>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
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
  </main><!-- End #main -->
  <script>
document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    check_user();

    var delayInMilliseconds = 2500; //1 second

    setTimeout(function() {
      check_language();
    }, delayInMilliseconds);
});
function check_language() {
    let language = document.querySelector(".goog-te-combo");
      // console.log(language.value);
      // console.log(language);

    let link_url = ("{{ url('/') }}/img/sticker_qr/sticker_qr_" + language.value +".png");
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

                    for(let item of result){
                        let name_user = document.querySelector("#name_user");
                            name_user.innerHTML = item.name;

                    }
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

        fetch("{{ url('/') }}/api/put_email/" + put_email.value + "/" + id_user.value + "/" + put_username.value )
            .then(response => response.json())
            .then(result => {
                console.log(result);
                document.getElementById("reset").click();
            });
}

function check_username() {

    let put_username = document.querySelector("#put_username");
    let id_user = document.querySelector("#id_user");

        fetch("{{ url('/') }}/api/check_username/"  + put_username.value +"/" + id_user.value )
            .then(response => response.json())
            .then(result => {
                // console.log(result.length);
                
                if (result.length == 0){
                    document.querySelector('#check').classList.remove('d-none');
                    document.querySelector('#times').classList.add('d-none');
                    document.querySelector('#div_email').classList.remove('d-none');
                } else{
                    document.querySelector('#check').classList.add('d-none');
                    document.querySelector('#times').classList.remove('d-none');
                    document.querySelector('#div_email').classList.add('d-none');
                }

            });
}

function check_email() {

    let put_email = document.querySelector("#put_email");

        fetch("{{ url('/') }}/api/check_email/"  + put_email.value )
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                
                if (result.length == 0){
                    document.querySelector('#email_check').classList.remove('d-none');
                    document.querySelector('#email_times').classList.add('d-none');
                    document.querySelector('#btn_ok').classList.remove('d-none');
                } else{
                    document.querySelector('#email_check').classList.add('d-none');
                    document.querySelector('#email_times').classList.remove('d-none');
                    document.querySelector('#btn_ok').classList.add('d-none');
                }

            });
}


</script>


@endsection