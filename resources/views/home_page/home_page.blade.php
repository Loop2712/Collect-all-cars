@extends('layouts.viicheck')

@section('content')

  <!-- ======= Hero Section ======= -->
<!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <div class="d-none d-lg-block">
    <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>ยินดีต้อนรับสู่ ViiCHECK</h1>
      <h2>ร่วมกันสร้างสังคมแห่งการช่วยเหลือ แบ่งปันความสุขและมิตรภาพที่ดีกับ "วีเช็ค"</h2>
      <a style="font-size: 18px" href="{{ url('/register_car/create') }}" class="btn-get-started scrollto">เริ่มกันเลย &nbsp;<i class="far fa-smile-wink"></i></a>
    </div>
  </section>
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="content">
              <a href="{{ asset('/img/more/poster-v4-good-Vii-v4.jpg') }}" class="galelry-lightbox">
                <img width="100%" src="{{ asset('/img/more/poster-v4-good-Vii-v4.jpg') }}" alt="">
              </a>
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
                          <p style="text-align: left; text-indent:1.5em;">เมื่อการ<b class="text-dark">จอดซ้อนคัน</b>ทำให้คุณไม่สบายใจ
                          เพียงแค่ลงทะเบียนกับเราแล้วนำ
                          สติ๊กเกอร์ไปติดที่ของรถเพียงเท่านี้
                          คุณก็สามารถเดินเที่ยวได้อย่างสบายใจ</p>
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
                          <p style="text-align: left; text-indent:1.5em;">เก็บรวบรวมข้อมูลของคุณไว้ที่เดียว
                          วันหมดอายุ <b class="text-dark">พรบ. / ประกัน</b>
                          เมื่อใกล้วันครบกำหนดระบบจะ
                          ทำการแจ้งเตือนและหายห่วงได้เลย
                          เรื่อง <b class="text-dark">รักษาความเป็นส่วนตัว</b>
                          <b class="text-dark">ของผู้ใช้บริการ</b> ในระบบของเรา</p>
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
                  <a href="https://youtu.be/eHT1gJ0-FQg" class="glightbox play-btn mb-4"></a>
                </div>
              </div>
              <div class="col-6" style="padding:20px;">
                <br>
                <div  class="icon-boxes d-flex flex-column align-items-stretch justify-content-center ">
                  <h3>Top4 ปัญหาโลกแตกเกี่ยวกับการใช้รถใช้ถนน</h3>
                  <p>ใครที่เดินทางไปไหนมาไหนบ่อยๆ โดยเฉพาะอย่างยิ่งในเขตเมืองหรือเขตชุมชน เชื่อว่าต้องเคยเจอปัญหาต่อไปนี้มาแล้วกันทั้งนั้น...</p>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-house-damage"></i></div>
                    <h4 class="title"><a href="">รถจอดขวางหน้าบ้าน</a></h4>
                    <p class="description">ใครที่อาศัยอยู่ในเขตชุมชน เช่น ตลาด ย่านการค้า หรือบ้านที่รั้วบ้านติดๆกันและมีบ้านทั้งสองฝั่งจะต้องเคยเจอมาแล้วแน่นอน วันดีคืนดีมีใครก็ไม่รู้มาจอดรถขวางหน้าบ้าน จะเอารถออกก็ไม่ได้ จะไปไหนก็ไม่ได้ จะตามตัวเจ้าของรถก็ไม่รู้จะไปตามที่ไหน ซึ่งกรณีเช่นนี้ก็เป็นประเด็นให้เห็นทางโซเชียลบ่อยครั้ง</p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-road"></i></div>
                    <h4 class="title"><a href="">ถนนแคบ วิ่งได้แค่สองเลน แต่ดันจอดรถขวางเลน</a></h4>
                    <p class="description">ปัญหาที่พบได้บ่อยในย่านชุมชนเล็กๆที่ถนนเป็นแบบเลนสวน หลายคนมักจอดรถขวางเลนเพื่อลงไปซื้อของ ทำให้คันอื่นๆต้องคอยหักหลบ จนทำให้รถติด รถวิ่งลำบาก </p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-ban"></i></div>
                    <h4 class="title"><a href="">จอดซ้อนคันแต่ลืมปลดเกียร์ว่างและเอาเบรคมือลง</a></h4>
                    <p class="description">เคยไหม? เวลาไปห้าง ซื้อของเสร็จกำลังจะกลับ แต่ดันมีรถมาจอดซ้อนคันข้างหน้า จะเข็นก็เข็นไม่ได้เพราะใส่เกียร์ P กับเบรคมือเอาไว้ ห้างก็ตั้งใหญ่ ลูกค้ามีไม่รู้กี่คน ไม่รู้จะไปตามได้ที่ไหน หรือบางทีถึงให้ประชาสัมพันธ์ประกาศตามตัวให้ก็ใช่ว่าจะเจอ เพราะบางครั้งเจ้าของรถก็แค่มาจอดรถทิ้งไว้แล้วไปทำธุระที่อื่น บางคนหายไปเป็นชั่วโมง ก็ต้องเสียเวลารอ</p>
                  </div>

                  <div class="icon-box">
                    <div class="icon"><i class="fas fa-car-crash"></i></div>
                    <h4 class="title"><a href="">รถโดนกรีด ขูด หรือทุบกระจก</a></h4>
                    <p class="description">มักเกิดขึ้นในที่ที่มีรถจอดเยอะๆ หรือที่ที่จอดซ้อนคันได้ จอดรถทิ้งไว้ กลับมาอีกทีรถก็มีริ้วรอยซะแล้ว ถ้าบริเวณนั้นไม่มีกล้องวงจรปิดก็ไม่รู้จะไปตามตัวคนทำได้จากที่ไหน หรือบางครั้งเราไม่ใช่เจ้าของรถ แต่ผ่านไปเห็นรถคนอื่นโดน ก็ไม่รู้จะไปตามเจ้าของรถให้มารับทราบเรื่องยังไงดี</p>
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

      <div class="container-fluid">
        <div class="row no-gutters">

          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
          <div class="col-lg-4 col-md-4 d-none">
            <div class="gallery-item">
              <a href="{{ asset('/img/more/Advantages.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/more/Advantages.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
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
                <p>ติดต่อเจ้าของรถได้ง่ายผ่าน Line</p>
                <p>เพียงแค่สแกน QR-CODE บนสติ๊กเกอร์</p>
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
                <h4><a href="{{ url('/middle_price_car') }}">เช็คราคากลางกรมขนส่ง</a></h4>
                <p>เมื่อคิดจะขายหรือขอสินเชื่อ</p>
                <p>ก็สามารถเช็คราคากลางได้ตลอด</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ url('/promotion') }}">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h4><a href="{{ url('/promotion') }}">โปรโมชั่นเกี่ยวกับยานพาหนะ</a></h4>
                <p>โปรโมชั่นมากมายที่รอให้คุณใช้บริการ</p>
                <p>รีบเลยก่อนหมดเวลา !</p>
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

          <div class="col-lg-6 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v1.png') }}" download >
              <div class="icon-box">
                <img width="60%" src="{{ asset('/img/more/sticker-VII-v1.png') }}" class="img-fluid" alt="">
                <br>
                <button type="button" class="btn btn-danger">Download</button>
              </div>
            </a>
          </div>

          <div class="col-lg-6 col-md-6  align-items-stretch mt-4">
            <a href="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" download>
              <div class="icon-box">
                <img width="60%" src="{{ asset('/img/more/sticker-VII-v2-9x9-10.png') }}" class="img-fluid" alt="">
                <br>
                <button type="button" class="btn btn-danger">ดาวน์โหลด</button>
              </div>
            </a>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
</div>

<!-------------------------------------------------มือถือ-------------------------------------------------->

<div class="d-block d-md-none">
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
                <a href="{{ asset('/img/more/poster-v4-good-Vii-v4.jpg') }}" class="more-btn galelry-lightbox">ดูเพิ่มเติม <i class="bx bx-chevron-right"></i></a>
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
                    <p>แค่เพียงกดปุ่ม <b>"SOS"</b> จะมีเบอร์</p>
                    <p>ที่จำเป็นแสดงขึ้นมา ไม่ว่าจะเป็น</p>
                    <p><b>จส.100 เหตุด่วนเหตุร้าย ไฟไหม้รถ</b></p>
                    <p>หรือแม้กระทั่ง <b>ตำรวจท่องเที่ยว</b></p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="fas fa-id-card-alt"></i>
                    <br>
                    <h4 style="margin:-10px 0px 15px 0px">ติดต่อเจ้าของรถ</h4>
                    <p>เมื่อการ<b>จอดซ้อนคัน</b>ทำให้คุณไม่สบายใจ</p>
                    <p>เพียงแค่ลงทะเบียนกับเราแล้วนำ</p>
                    <p>สติ๊กเกอร์ไปติดที่ของรถเพียงเท่านี้</p>
                    <p>คุณก็สามารถเดินเที่ยวได้อย่างสบายใจ</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="fas fa-user-lock"></i>
                    <h4 style="margin:-10px 0px 15px 0px">เก็บรวบรวมข้อมูล</h4>
                    <p>เก็บรวบรวมข้อมูลของคุณไว้ที่เดียว</p>
                    <p>วันหมดอายุ <b>พรบ. / ประกัน</b></p>
                    <p>เมื่อใกล้วันครบกำหนดระบบจะ</p>
                    <p>ทำการแจ้งเตือนและหายห่วงได้เลย</p>
                    <p>เรื่อง <b>รักษาความเป็นส่วนตัว</b></p>
                    <p><b>ของผู้ใช้บริการ</b> ในระบบของเรา</p>
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
                  <a href="https://youtu.be/eHT1gJ0-FQg" class="glightbox play-btn mb-12"></a>
                </div>
              </div> <h5  class="text-center"><b>Top4 ปัญหาโลกแตกเกี่ยวกับการใช้รถใช้ถนน</b></h5>
                  <p style="text-indent: 50px; ">ใครที่เดินทางไปไหนมาไหนบ่อยๆ โดยเฉพาะอย่างยิ่งในเขตเมืองหรือเขตชุมชน เชื่อว่าต้องเคยเจอปัญหาต่อไปนี้มาแล้วกันทั้งนั้น...</p>
              <div class="col-12" ><br>
                <div  class="icon-boxes d-flex flex-column align-items-stretch justify-content-center ">
                    <div class="icon-box">
                    <center><div class="icon"><i class="fas fa-house-damage"></i></div>
                    <h4 class="title"><a href="">รถจอดขวางหน้าบ้าน</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                    ใครที่อาศัยอยู่ในเขตชุมชน เช่น ตลาด ย่านการค้า หรือบ้านที่รั้วบ้านติดๆกันและมีบ้านทั้งสองฝั่งจะต้องเคยเจอมาแล้วแน่นอน วันดีคืนดีมีใครก็ไม่รู้มาจอดรถขวางหน้าบ้าน จะเอารถออกก็ไม่ได้ จะไปไหนก็ไม่ได้ จะตามตัวเจ้าของรถก็ไม่รู้จะไปตามที่ไหน ซึ่งกรณีเช่นนี้ก็เป็นประเด็นให้เห็นทางโซเชียลบ่อยครั้ง</p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-road"></i></div>
                    <h4 class="title"><a href="">ถนนแคบ วิ่งได้แค่สองเลน แต่ดันจอดรถขวางเลน</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                    ปัญหาที่พบได้บ่อยในย่านชุมชนเล็กๆที่ถนนเป็นแบบเลนสวน หลายคนมักจอดรถขวางเลนเพื่อลงไปซื้อของ ทำให้คันอื่นๆต้องคอยหักหลบ จนทำให้รถติด รถวิ่งลำบาก </p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-ban"></i></div>
                    <h4 class="title"><a href="">จอดซ้อนคันแต่ลืมปลดเกียร์ว่างและเอาเบรคมือลง</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                    เคยไหม? เวลาไปห้าง ซื้อของเสร็จกำลังจะกลับ แต่ดันมีรถมาจอดซ้อนคันข้างหน้า จะเข็นก็เข็นไม่ได้เพราะใส่เกียร์ P กับเบรคมือเอาไว้ ห้างก็ตั้งใหญ่ ลูกค้ามีไม่รู้กี่คน ไม่รู้จะไปตามได้ที่ไหน หรือบางทีถึงให้ประชาสัมพันธ์ประกาศตามตัวให้ก็ใช่ว่าจะเจอ เพราะบางครั้งเจ้าของรถก็แค่มาจอดรถทิ้งไว้แล้วไปทำธุระที่อื่น บางคนหายไปเป็นชั่วโมง ก็ต้องเสียเวลารอ</p>
                    <br></div>

                  <div class="icon-box">
                  <center><div class="icon"><i class="fas fa-car-crash"></i></div>
                    <h4 class="title"><a href="">รถโดนกรีด ขูด หรือทุบกระจก</a></h4></center>
                    <p class="description" style="text-indent: 30px;">
                    มักเกิดขึ้นในที่ที่มีรถจอดเยอะๆ หรือที่ที่จอดซ้อนคันได้ จอดรถทิ้งไว้ กลับมาอีกทีรถก็มีริ้วรอยซะแล้ว ถ้าบริเวณนั้นไม่มีกล้องวงจรปิดก็ไม่รู้จะไปตามตัวคนทำได้จากที่ไหน หรือบางครั้งเราไม่ใช่เจ้าของรถ แต่ผ่านไปเห็นรถคนอื่นโดน ก็ไม่รู้จะไปตามเจ้าของรถให้มารับทราบเรื่องยังไงดี</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts d-block d-md-none">
      <div class="container">

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
    <section id="gallery" class="gallery d-block d-md-none">
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
              <a href="{{ asset('/img/more/Advantages.jpg') }}" class="galelry-lightbox">
                <img src="{{ asset('/img/more/Advantages.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- ข้อดีของ VMOVE ซ่อนไว้ -->
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

      </div>  
    </section><!-- End Gallery Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services d-block d-md-none">
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
                <p>ติดต่อเจ้าของรถได้ง่ายผ่าน Line</p>
                <p>เพียงแค่สแกน QR-CODE บนสติ๊กเกอร์</p>
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
                <h4><a href="{{ url('/middle_price_car') }}">เช็คราคากลางกรมขนส่ง</a></h4>
                <p>เมื่อคิดจะขายหรือขอสินเชื่อ</p>
                <p>ก็สามารถเช็คราคากลางได้ตลอด</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6  align-items-stretch mt-4">
            <a href="{{ url('/promotion') }}">
              <div class="icon-box" style="padding: 40px 15px;">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h4><a href="{{ url('/promotion') }}">โปรโมชั่นเกี่ยวกับยานพาหนะ</a></h4>
                <p>โปรโมชั่นมากมายที่รอให้คุณใช้บริการ</p>
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
  </main><!-- End #main -->
@endsection