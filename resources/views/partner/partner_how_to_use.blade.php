@extends('layouts.viicheck')

@section('content')
<!-- <div class="card col-12" style="width: 18rem;top:150px;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->

<center>
  
  <div class="card-deck col-11" style="margin-top:150px;" >
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/9.png') }}" style="background-color: #F9E79F ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถลงทะเบียน</h5>
          <p class="card-text">วิธีใช้งานระบบ รถลงทะเบียน</p>
          <a href="#" data-toggle="modal" data-target="#Viicheck">
              รายละเอียดเพิ่มเติม »
          </a>
          </div>
      </div>
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/6.png') }}" style="background-color: #E59866 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงาน</h5>
          <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงาน</p>
          <a href="#" data-toggle="modal" data-target="#Vmove">รายละเอียดเพิ่มเติม »</a>
          </div>
      </div>
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/1.png') }}" style="background-color: #76D7C4 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงานล่าสุด</h5>
          <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงานล่าสุด</p>
          <a href="#" data-toggle="modal" data-target="#sos">รายละเอียดเพิ่มเติม »</a>
          </div>
      </div>
  </div>
  <div class="card-deck col-11" style="margin-top:20px;" >
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/9.png') }}" style="background-color: #F9E79F ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">ให้ความช่วยเหลือ</h5>
          <p class="card-text">วิธีใช้งานระบบ ให้ความช่วยเหลือ</p>
          <a href="#" data-toggle="modal" data-target="#gsos">
              รายละเอียดเพิ่มเติม »
          </a>
          </div>
      </div>
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/6.png') }}" style="background-color: #E59866 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงาน</h5>
          <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงาน</p>
          <a href="#" data-toggle="modal" data-target="#Vmove">รายละเอียดเพิ่มเติม »</a>
          </div>
      </div>
      <div class="card" style="font-family: 'Prompt', sans-serif;">
          <br>
          <center><img src="{{ asset('/img/stickerline/Flex/1.png') }}" style="background-color: #76D7C4 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
          <div class="card-body">
          <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงานล่าสุด</h5>
          <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงานล่าสุด</p>
          <a href="#" data-toggle="modal" data-target="#sos">รายละเอียดเพิ่มเติม »</a>
          </div>
      </div><br>
  </div>
</center> 
<!------------------------------------------- Modal ลงทะเบียน Viicheck ------------------------------------------->
<div class="modal fade"  id="Viicheck" tabindex="-1" role="dialog" aria-labelledby="ViicheckTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="ViicheckTitle">รถลงทะเบียน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- <br>
        <section id="about2" class="about2" style="padding:0px;">
            <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-12"></a>
            </div>
        </section>
        <br>
        <hr>
        <br> -->
        <center><img src="{{ asset('/img/วิธีใช้งาน_p/1.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ตารางรายการ รถลงทะเบียน</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col-12 collapse" id="login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/2.png') }}"  width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.คันที่ : แสดงลำดับที่อ้างอิงของรถที่ลงทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ยี่ห้อ : ชื่อยี่ห้อรถที่ลงทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.รุ่น : ชื่อรุ่นรถที่ลงทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ประเภท : ประเภทรถมีรูปแบบ ดังต่อไปนี้ <br>
                        <h5 style="text-indent:35px;font-family: 'Prompt', sans-serif;">-" <img width="5%" src="https://www.viicheck.com/img/icon/motorcycle.png"> " หมายถึง รถจักรยานยนต์ </h5> 
                        <h5 style="text-indent:35px;font-family: 'Prompt', sans-serif;">-" <img width="5%" src="https://www.viicheck.com/img/icon/car.png"> " หมายถึง รถยนต์</h5>
                    </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.ผู้ลงทะเบียน : คลิกที่ "<i class="far fa-eye text-info"></i> " เพื่อแสดงรายละเอียนผู้ลงทะเบียนรถ</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.การค้นหา</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="Social_login">
                            <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">ค้นหารายการจากหมายเลขทะเบียนรถตามคำระบุ</h5>
                    
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal ลงทะเบียน Viicheck ------------------------------------------->
<!------------------------------------------- Modal Vmove ------------------------------------------->
<div class="modal fade"  id="Vmove" tabindex="-1" role="dialog" aria-labelledby="VmoveTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="VmoveTitle">รถที่ถูกรายงาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- <br>
        <section id="about2" class="about2" style="padding:0px;">
            <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-12"></a>
            </div>
        </section>
        <br>
        <hr>
        <br> -->
        <center><img src="{{ asset('/img/วิธีใช้งาน_p/3.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.การค้นหารรายการรถที่ถูกรายงาน รายเดือน/ปี</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col-12 collapse" id="register">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/4.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกปี : เลือกปีที่ต้องการค้นหารายการรถที่ถูกแจ้งปัญหาการขับขี่</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เลือกเดือน : สามารถระบุช่วงเดือนที่ถูกแจ้งปัญหาการขับขี่ได้ โดยเลือกช่วงเดือนจาก Dropdown List เพื่อเลือกเดือนที่ที่ต้องการค้นหา</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มค้นหาเพื่อทำการค้นหาข้อมูล</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.ล้างการค้นหา : หากต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา เพื่อยกเลิกการค้นหา</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px"  data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.รายการรถที่ถูกแจ้งปัญหาการขับขี่</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="registerline">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/5.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ยี่ห้อรถ/รุ่น : แสดงยี่ห้อรถและรุ่นรถที่ถูกรายงาน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.รายงานทั้งหมด : แสดงจำนวนครั้งที่ถูกรายงานทั้งหมด</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รายงานต่อเดือน : แสดงจำนวนครั้งที่ถูกรายงานตามเดือนที่ทำการค้นหา</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ผู้ลงทะเบียน : แสดงชื่อผู้ลงทะเบียนรถ</h5>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal VMove ------------------------------------------->
<!------------------------------------------- Modal sos ------------------------------------------->
<div class="modal fade"  id="sos" tabindex="-1" role="dialog" aria-labelledby="sosTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="sosTitle">รถที่ถูกรายงานล่าสุด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- <br>
        <section id="about2" class="about2" style="padding:0px;">
            <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-12"></a>
            </div>
        </section>
        <br>
        <hr>
        <br> -->
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos1" aria-expanded="false" aria-controls="sos1">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.รถที่ถูกรายงานล่าสุด</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;"data-toggle="collapse" data-target="#sos1" aria-expanded="false" aria-controls="sos1">
                    <i class="fas fa-angle-down"  ></i>
                </div>
                <div class="col-12 collapse" id="sos1">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/6.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.คันที่ : แสดงลำดับที่อ้างอิงของรถที่ถูกรายงาน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ยี่ห้อ/รุ่น : แสดงยี่ห้อรถและรุ่นรถที่ถูกรายงาน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.เหตุผล : แสดงเหตุผลที่ถูกรายงาน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.วันที่ : แสดงวันที่ถูกรายงาน</h5>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal sos ------------------------------------------->
<!------------------------------------------- Modal ให้ความช่วยเหลือ ------------------------------------------->
<div class="modal fade"  id="gsos" tabindex="-1" role="dialog" aria-labelledby="gsosTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="gsosTitle">ให้ความช่วยเหลือ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- <br>
        <section id="about2" class="about2" style="padding:0px;">
            <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-12"></a>
            </div>
        </section>
        <br>
        <hr>
        <br> -->
        <center><img src="{{ asset('/img/วิธีใช้งาน_p/7.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.แผนที่</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col-12 collapse" id="login">
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สำหรับแสดงตำแหน่งของผู้ขอความช่วยเหลือ</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางขอความช่วยเหลือ</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="Social_login">
                  <br>
                  <center><img src="{{ asset('/img/วิธีใช้งาน_p/8.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                  <br>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อผู้ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เบอร์ : แสดงเบอร์ผู้ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เวลา : แสดงแวลาที่ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รูปภาพ : </h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ตำแหน่ง : ตำแหน่งขอความช่วยเหลือ มีดังนี้
                    <h5 style="font-family: 'Prompt', sans-serif;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-map-marker-alt text-danger text-center"> <br> <span style="font-size:15px;">ดูหมุด</span> </i>  " แสดงตำแหน่งผู้ขอความช่วยเหลือบนแผนที่ด้านข้าง </h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-location-arrow text-info text-center"><br> <span style="font-size:15px;">นำทาง</span></i>  " เปิดตำแหน่งผู้ขอความช่วยเหลือบน Google Map</h5>
                  </h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.จำนวนทั้งหมด : แสดงจำนวนผู้ขอความช่วยเหลือบนพื้นที่บริการของท่านทั้งหมด</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ดูช่วงเวลา</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="sos_detail">
                  <br>
                  <center><img src="{{ asset('/img/วิธีใช้งาน_p/8.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                  <br>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อผู้ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เบอร์ : แสดงเบอร์ผู้ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เวลา : แสดงแวลาที่ขอความช่วยเหลือ</h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รูปภาพ : </h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ตำแหน่ง : ตำแหน่งขอความช่วยเหลือ มีดังนี้
                    <h5 style="font-family: 'Prompt', sans-serif;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-map-marker-alt text-danger text-center"> <br> <span style="font-size:15px;">ดูหมุด</span> </i>  " แสดงตำแหน่งผู้ขอความช่วยเหลือบนแผนที่ด้านข้าง </h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-location-arrow text-info text-center"><br> <span style="font-size:15px;">นำทาง</span></i>  " เปิดตำแหน่งผู้ขอความช่วยเหลือบน Google Map</h5>
                  </h5>
                  <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.จำนวนทั้งหมด : แสดงจำนวนผู้ขอความช่วยเหลือบนพื้นที่บริการของท่านทั้งหมด</h5>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal ให้ความช่วยเหลือ------------------------------------------->
@endsection
