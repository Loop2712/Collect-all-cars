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
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">ขั้นตอนลงทะเบียน Viicheck</h5>
            <p class="card-text">วิธีใช้งานระบบ สมัครสมาชิก เข้าสู่ระบบ เข้าสู่ระบบด้วย Social</p>
            <a href="#" data-toggle="modal" data-target="#Viicheck">
                รายละเอียดเพิ่มเติม »
            </a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><img src="{{ asset('/img/stickerline/Flex/6.png') }}" style="background-color: #E59866 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">วิธีใช้งาน ViiMove</h5>
            <p class="card-text">วิธีใช้งานระบบ ลงทะเบียนรถ แจ้งเตือนเจ้าของรถ</p>
            <a href="#" data-toggle="modal" data-target="#Vmove">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><img src="{{ asset('/img/stickerline/Flex/1.png') }}" style="background-color: #76D7C4 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">วิธีใช้งาน ViiSOS</h5>
            <p class="card-text">วิธีใช้งานระบบ ค้นหาตำแหน่งของฉัน ขอความช่วยเหลือด่วน</p>
            <a href="#" data-toggle="modal" data-target="#sos">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
    </div>
</center> 
<!------------------------------------------- Modal ลงทะเบียน Viicheck ------------------------------------------->
<div class="modal fade"  id="Viicheck" tabindex="-1" role="dialog" aria-labelledby="ViicheckTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="ViicheckTitle">ขั้นตอนลงทะเบียน Viicheck</h5>
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
        <center><img src="{{ asset('/img/วิธีใช้งาน/2.jpg') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.เข้าสู่ระบบ</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col-12 collapse" id="login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/3.jpg') }}"  width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อผู้ใช้ : สำหรับกรอกชื่อผู้ใช้ที่สมัครด้วยE-mail</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.รหัสผ่าน : สำหรับกรอกรหัสผ่านที่สมัครด้วยE-mail</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เข้าสู่ระบบ : เมื่อกรอกชื่อผู้ใช้และรหัสผ่านแล้วให้คลิกที่ปุ่มเข้าสู่ระบบเพื่อทำการเข้าสู่ระบบ</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.เข้าสู่ระบบด้วย Social</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/4.jpg') }}"  width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.Login With LINE : ใช้สำหรับเข้าสู่ระบบด้วยบัญชีไลน์</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.Login FACEBOOK : ใช้สำหรับเข้าสู่ระบบด้วยบัญชีเฟสบุ๊ค</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.Login GOOGLE : ใช้สำหรับเข้าสู่ระบบด้วยบัญชีกูเกิ้ล</h5>
                    
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.สมัครสมาชิกด้วย Email</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register" >
                    <i class="fas fa-angle-down" ></i>
                </div>
                <div class="col-12 collapse" id="register">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/re-1.jpg') }}" style="border: 2px solid #555;"  width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : สำหรับกรอกชื่อที่ต้องการให้ระบบแสดง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ชื่อผู้ใช้ : สำหรับกรอกชื่อผู้ใช้ที่ใช้ในการเข้าสู่ระบบ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.อีเมล : สำหรับกรอกอีเมลที่เชื่อมต่อกับบัญชีนี้</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รหัสผ่าน : สำหรับกรอกรหัสผ่านที่ใช้ในการเข้าสู่ระบบ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ยืนยันรหัสผ่าน : สำหรับกรอกรหัสผ่านอีกครั้ง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.ฉันยอมรับ : กดคลิกที่ช่องสี่เหลี่ยมเพื่อเป็นการยอมรับนโยบายเกี่ยวกับข้อมูลส่วนบุคคลและข้อกำหนดและเงื่อนไขการใช้บริการ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.สมัครสมาชิก : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มสมัครสมาชิกเพื่อทำการสมัครสมาชิก</h5>
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
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="VmoveTitle">วิธีใช้งาน VMove</h5>
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
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ลงทะเบียนรถผ่านเว็บ</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col-12 collapse" id="register">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/movew-2.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ยี่ห้อรถ : ต้องเลือกยี่ห้อรถใดยี่ห้อรถหนึ่งสำหรับรถคันนั้น</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.รุ่นรถ : ต้องเลือกรุ่นรถใดรุ่นรถหนึ่งสำหรับรถคันนั้น</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ทะเบียนรถ : สำหรับกรอกหมายเลขของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.จังหวัดของทะเบียนรถ : ต้องเลือกจังหวัดใดจังหวัดหนึ่งสำหรับป้ายทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.บันทึก : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มบันทึกเพื่อลงทะเบียนรถ</h5>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px"  data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ลงทะเบียนรถผ่านไลน์</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#registerline" aria-expanded="false" aria-controls="registerline" >
                    <i class="fas fa-angle-down" ></i>
                    </div>
                <div class="col-12 collapse" id="registerline">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/movel-2.jpg') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ข้อมูลรถ : สำหรับเลือกประเภทรถที่ต้องการลงทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ยี่ห้อรถ : ต้องเลือกยี่ห้อรถใดยี่ห้อรถหนึ่งสำหรับรถคันนั้น</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.รุ่นรถ : ต้องเลือกรุ่นรถใดรุ่นรถหนึ่งสำหรับรถคันนั้น</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.ทะเบียนรถ : สำหรับกรอกหมายเลขของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.จังหวัดของทะเบียนรถ : ต้องเลือกจังหวัดใดจังหวัดหนึ่งสำหรับป้ายทะเบียน</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.บันทึก : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มบันทึกเพื่อลงทะเบียนรถ</h5>
                    <div class="alert alert-danger" role="alert">
                        <h6 style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;"><i class="fas fa-exclamation-circle"></i>
                            หมายเหตุ <br><br>
                            &nbsp;&nbsp;&nbsp;ต้องทำการเพิ่มเพื่อนในบัญชีไลน์เพื่อใช้งานระบบนี้ เพิ่มเพื่อน<a href="https://page.line.me/702ytkls?openQrModal=true" class="alert-link">คลิก</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#move" aria-expanded="false" aria-controls="move">
                        <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.แจ้งเตือนเจ้าของรถ</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#move" aria-expanded="false" aria-controls="move">
                    <i class="fas fa-angle-down"  ></i>
                    </div>
                <div class="col-12 collapse" id="move">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/movel-3.jpg') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ข้อความ : สำหรับเลือกข้อความที่ต้องการแจ้งไปยังเจ้าของรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ทะเบียนรถ : สำหรับกรอกหมายเลขของทะเบียนรถ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.จังหวัดของทะเบียนรถ : ต้องเลือกจังหวัดใดจังหวัดหนึ่ง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.เบอร์โทร : สำหรับกรอกหมายเลขโทรศัพท์เพื่อให้เจ้าของรถติดต่อมา หากไม่ต้องการแสดงหมายเลขโทรศัพท์ให้เจ้าของรถเห็นให้กดคลิกที่ช่องสี่เหลี่ยมด้านล่าง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ส่งข้อมูล : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มส่งข้อมูล เพื่อทำการแจ้งเจ้าของรถ</h5>
                    <div class="alert alert-danger" role="alert">
                        <h6 style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;"><i class="fas fa-exclamation-circle"></i>
                            หมายเหตุ <br><br>
                            &nbsp;&nbsp;&nbsp;ต้องทำการเพิ่มเพื่อนในบัญชีไลน์เพื่อใช้งานระบบนี้ เพิ่มเพื่อน<a href="https://page.line.me/702ytkls?openQrModal=true" class="alert-link">คลิก</a>
                        </h6>
                    </div>
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
        <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="sosTitle">วิธีใช้งาน ViiSOS</h5>
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
                    <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ระบบ ViiSOS</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;"data-toggle="collapse" data-target="#sos1" aria-expanded="false" aria-controls="sos1">
                    <i class="fas fa-angle-down"  ></i>
                </div>
                <div class="col-12 collapse" id="sos1">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน/sos-1.png') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ตำแหน่งของฉัน : สำหรับค้นหาตำแหน่งปัจจุบันของคุณ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ขอความช่วยเหลือด่วน : สำหรับโทรหาผู้ดูแลในพื้นที่ปัจจุบันที่คุณอยู่</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เบอร์โทรฉุกเฉิน : เบอร์โทรสำหรับหน่วยงานเหตุฉุกเฉินด้านต่างๆ</h5>
                    <div class="alert alert-danger" role="alert">
                        <h6 style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;"><i class="fas fa-exclamation-circle"></i>
                            หมายเหตุ <br><br>
                            &nbsp;&nbsp;&nbsp;1.ต้องทำการเพิ่มเพื่อนในบัญชีไลน์เพื่อใช้งานระบบนี้ เพิ่มเพื่อน<a href="https://page.line.me/702ytkls?openQrModal=true" class="alert-link">คลิก</a><br>
                            &nbsp;&nbsp;&nbsp;2.สำหรับบริการตำแหน่งของฉัน จำเป็นต้องเปิดตำแหน่งที่ตั้งเพื่อใช้บริการ
                        </h6>
                    </div>
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
@endsection
