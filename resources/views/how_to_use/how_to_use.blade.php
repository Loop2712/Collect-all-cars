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

<div class="row" style="margin-top:150px;">
    <div class="col-md-5"><hr></div>
    <div class="col-md-2 text-center">วิธีใช้งานสำหรับผู้ใช้ทั่วไป</div>
    <div class="col-md-5"><hr></div>
</div>
<center>
    <div class="card-deck col-11" style="margin-top:50px;" >
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
<!-------------------------------------------end Modal sos ------------------------------------------->

<!------------------------------------------------- partner ------------------------------------------------->
@if(Auth::check())
  @if (Auth::user()->role  == "admin-partner" )
      <div class="row" style="margin-top:50px;">
          <div class="col-md-5"><hr></div>
          <div class="col-md-2 text-center">วิธีใช้งานสำหรับ Partner</div>
          <div class="col-md-5"><hr></div>
      </div>
      <center>

    <div class="card-deck col-11" style="margin-top:50px;" >
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fas fa-car" style="background-color: #F9E79F ;border-radius: 50%;font-size:600%;padding:15px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถลงทะเบียน</h5>
            <p class="card-text">วิธีใช้งานระบบ รถลงทะเบียน</p>
            <a href="#" data-toggle="modal" data-target="#Partner_register_p">
                รายละเอียดเพิ่มเติม »
            </a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fas fa-car-crash" style="background-color: #E59866;border-radius: 50%;font-size:600%;padding:15px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงาน</h5>
            <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงาน</p>
            <a href="#" data-toggle="modal" data-target="#Partner_report">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fad fa-car-crash" style="background-color: #AEB6BF;border-radius: 50%;font-size:600%;padding:15px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">รถที่ถูกรายงานล่าสุด</h5>
            <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงานล่าสุด</p>
            <a href="#" data-toggle="modal" data-target="#Partner_reportnew">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fas fa-hands-helping" style="background-color: #AED6F1;border-radius: 50%;font-size:550%;padding:25px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">ให้ความช่วยเหลือ</h5>
            <p class="card-text">วิธีใช้งานระบบ ให้ความช่วยเหลือ</p>
            <a href="#" data-toggle="modal" data-target="#Partner_gsos">
                รายละเอียดเพิ่มเติม »
            </a>
            </div>
        </div>
    </div>
    <div class="card-deck col-11" style="margin-top:20px;" >
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fa-solid fa-location-plus" style="background-color: #AED6F1;border-radius: 100%;font-size:550%;padding:30px 40px 30px 40px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">วิธีเพิ่มพื้นที่บริการ</h5>
            <p class="card-text">ขั้นตอนการเพิ่มพื้นที่บริการ</p>
            <a href="#" data-toggle="modal" data-target="#Partner_add_area">
                รายละเอียดเพิ่มเติม »
            </a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="far fa-map" style="background-color: #D7BDE2;border-radius: 50%;font-size:550%;padding:25px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">พื้นที่บริการ</h5>
            <p class="card-text">วิธีใช้งานระบบ พื้นที่บริการ</p>
            <a href="#" data-toggle="modal" data-target="#Partner_map">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><i class="fas fa-users-cog" style="background-color: #76D7C4;border-radius: 50%;font-size:550%;padding:25px" width="35%" alt="Card image cap"></i></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">จัดการผู้ใช้</h5>
            <p class="card-text">วิธีใช้งานระบบ รถที่ถูกรายงานล่าสุด</p>
            <a href="#" data-toggle="modal" data-target="#Partner_user">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div><br>
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center>
              <i class="fad fa-search-location" style="background-color: #C1A3A3;border-radius: 50%;font-size:550%;padding:25px" width="35%" alt="Card image cap"></i>
            </center>
            <div class="card-body">
            <h5 class="card-title notranslate" style="font-family: 'Prompt', sans-serif;">Chack In/Out</h5>
            <p class="card-text">วิธีใช้งานระบบ ข้อมูลการเข้าออก</p>
            <a href="#" data-toggle="modal" data-target="#Partner_checkin">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div><br>
    </div>
  </center> <br><br><br>
  <!------------------------------------------- Modal ลงทะเบียน ------------------------------------------->
  <div class="modal fade"  id="Partner_register_p" tabindex="-1" role="dialog" aria-labelledby="registerTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="registerTitle">รถลงทะเบียน</h5>
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
  <!------------------------------------------- Modal ลงทะเบียน  ------------------------------------------->
  <!------------------------------------------- Modal รถที่ถูกรายงาน ------------------------------------------->
  <div class="modal fade"  id="Partner_report" tabindex="-1" role="dialog" aria-labelledby="Partner_reportTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_reportTitle">รถที่ถูกรายงาน</h5>
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
  <!------------------------------------------- Modal รถที่ถูกรายงาน ------------------------------------------->
  <!------------------------------------------- Modal รถที่ถูกรายงานล่าสุด------------------------------------------->
  <div class="modal fade"  id="Partner_reportnew" tabindex="-1" role="dialog" aria-labelledby="Partner_reportnewTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_reportnewTitle">รถที่ถูกรายงานล่าสุด</h5>
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
  <!------------------------------------------- Modal รถที่ถูกรายงานล่าสุด ------------------------------------------->
  <!------------------------------------------- Modal ให้ความช่วยเหลือ ------------------------------------------->
<div class="modal fade"  id="Partner_gsos" tabindex="-1" role="dialog" aria-labelledby="Partner_gsosTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_gsosTitle">ให้ความช่วยเหลือ</h5>
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
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อและเบอร์ผู้ขอความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เวลา : แสดงแวลาที่ขอความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.สถานะ : แสดงสถานะการช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รูปภาพ : แสดงรูปภาพ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ตำแหน่ง : แสดงตำแหน่งผู้ขอความช่วยเหลือบนแผนที่ด้านข้าง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.คะแนนความช่วยเหลือ : แสดงคะแนนที่ผู้ขอความช่วยเหลือประเมิน ผู้ให้ความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.จำนวนทั้งหมด : แสดงจำนวนผู้ขอความช่วยเหลือบนพื้นที่บริการของท่านทั้งหมด</h5>

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
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/9.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.การค้นหา
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1.เลือกปี : เลือกปีที่ต้องการค้นหารายการขอความช่วยเหลือ</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2.เลือกเดือน : เลือกเดือนที่ต้องการค้นหารายการขอความช่วยเหลือ</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.3.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มค้นหา</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.4.ล้างการค้นหา : เมื่อต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา</h5>
                    </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ตารางขอความช่วยเหลือสำหรับกลางวัน : แสดงจำนวนจำนวนที่ถูกขอความช่วยเหลือ ตั้งแต่เวลา 1 A.M. - 12 A.M.</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ตารางขอความช่วยเหลือสำหรับกลางคืน : แสดงจำนวนจำนวนที่ถูกขอความช่วยเหลือ ตั้งแต่เวลา 1 P.M. - 12 P.M.</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.ขอความช่วยเหลือที่ค้นหาทั้งหมด : แสดงจำนวนการขอความช่วยเหลือตามช่วงเวลาที่ค้นหา </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ขอความช่วยเหลือทั้งหมด : แสดงจำนวนการขอความช่วยเหลือทั้งหมด</h5>
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
  
  
  
  
  <!------------------------------------------- Modal เพิ่มพื้นที่บริการ ------------------------------------------->
  <div class="modal fade"  id="Partner_add_area" tabindex="-1" role="dialog" aria-labelledby="Partner_add_area" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_add_area">เพิ่มพื้นที่บริการ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#create_line" aria-expanded="false" aria-controls="create_line">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.สร้างไลน์กลุ่มและเพิ่มเจ้าหน้าที่เข้าภายในกลุ่ม</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#create_line" aria-expanded="false" aria-controls="register">
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="create_line">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/add_area_1.png') }}" style="border: 2px solid #555;" width="50%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สร้างไลน์กลุ่มและทำการเพิ่มเจ้าหน้าที่ ที่รับผิดชอบภายในพื้นที่เข้าภายในไลน์กลุ่มนี้</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px"  data-toggle="collapse" data-target="#add_line_bot" aria-expanded="false" aria-controls="add_line_bot" >
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.เพิ่มแชทบอทไลน์ ViiCHECK เข้าภายในกลุ่มไลน์</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#add_line_bot" aria-expanded="false" aria-controls="registerline" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="add_line_bot">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/add_area_2.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                              
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#manage_area" aria-expanded="false" aria-controls="manage_area">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.เข้าสู่หน้าจัดการพื้นที่บริการ</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#manage_area" aria-expanded="false" aria-controls="manage_area">
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="manage_area">
                      <br>
                        <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.1</h5>
                        <center>
                        <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_3.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
                      </center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).คลิกที่เมนูโปรไฟล์</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).เลือกเมนู admin-partner </h5>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.2</h5>
                      <center>
                        <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_4.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
                      </center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).เลือกเมนูพื้นที่บริการ</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).คลิกที่ปุ่ม เพิ่มพื้นที่บริการใหม่ </h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#add_area" aria-expanded="false" aria-controls="add_area">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">4.เพิ่มพื้นที่บริการใหม่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#add_area" aria-expanded="false" aria-controls="manage_area">
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="add_area">
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.1</h5>
                      <center>
                        <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_5.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
                      </center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).กรอกชื่อพื้นที่</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).เลือกกลุ่มไลน์ที่จะใช้ในพื้นที่นี้ </h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).ส่งรหัสยืนยันไปยังกลุ่มไลน์ที่เลือก </h5>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.2ระบบจะทำการส่งรหัสยืนยันไปยังกลุ่มไลน์</h5>
                      <center>
                        <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_6.png') }}" style="border: 2px solid #555;margin-left:15px;" width="40%" alt="Card image cap"><br>
                      </center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.3</h5>
                      <center>
                        <img src="{{ asset('/img/วิธีใช้งาน_p/add_area_7.png') }}" style="border: 2px solid #555;margin-left:15px;" width="80%" alt="Card image cap"><br>
                      </center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1).นำรหัสที่ได้จากกลุ่มไลน์มากรอก</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2).คลิกที่ปุ่มยืนยันการเพิ่มพื้นที่ใหม่ </h5>
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
  <!------------------------------------------- Modal เพิ่มพื้นที่บริการ ------------------------------------------->
  
  
  
  
  <!------------------------------------------- Modal พื้นที่บริการ ------------------------------------------->
  <div class="modal fade"  id="Partner_map" tabindex="-1" role="dialog" aria-labelledby="Partner_mapTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_mapTitle">พื้นที่บริการ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/10.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.พื้นที่ปัจจุบัน</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สำหรับแสดงพื้นที่ ที่ท่านดูแลอยู่ในปัจจุบัน</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.รอการตรวจสอบ</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login"><br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สำหรับแสดงพื้นที่ รอการตวจสอบจากแอดมิน ที่ท่านทำการเพิ่มหรือแก้ไข </h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ปรับพื้นที่บริการ</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/11.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.การค้นหา
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1.จังหวัด : เลือกจังหวัดที่ต้องการค้นหา</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2.อำเภอ : เลือกอำเภอที่ต้องการค้นหา</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.3.ตำบล : เลือกตำบลที่ต้องการค้นหา</h5> 
                    </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.แผนที่ : สำหรับกำหนดขนาดพื้นที่บริการ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ตำแหน่งของฉัน : สำหรับค้นหาตำแหน่งปัจจุบันของคุณ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.แก้ไขจุดก่อนหน้า : สำหรับลบจุดที่ทำการเพิ่มไปล่าสุด</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.แผนที่พื้นที่บริการ : สำหรับแสดงพื้นที่บริการทั้งหมด</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.ยืนยัน : เมื่อกำหนดพื้นที่เรียบร้อยแล้วให้คลิกที่ปุ่มส่งข้อมูล</h5>
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
  <!------------------------------------------- Modal พื้นที่บริการ------------------------------------------->
  <!------------------------------------------- Modal จัดการผู้ใช้ ------------------------------------------->
  <div class="modal fade"  id="Partner_user" tabindex="-1" role="dialog" aria-labelledby="Partner_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_userTitle">จัดการผู้ใช้</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/12.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.สร้างบัญชีผู้ใช้ใหม่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/13.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.สถานะสมาชิก
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1 Admin : สามารถใช้ระบบ ViiCHECK PARTNER และมีสิทธิ์จัดการข้อมูลภายในองค์กรได้</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2 Member : สามารถใช้ระบบ ViiCHECK PARTNER แต่ไม่มีสิทธิ์ในการจัดการข้อมูลภายในองค์กร</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  2.ปิด : หากไม่ต้องการเพิ่มสมาชิกให้คลิกที่ปุ่มปิด</h5> 
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  3.ยืนยัน : เมื่อกำหนดสถานะสมาชิกแล้วให้คลิกที่ปุ่มยืนยัน</h5> 
                      
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางสมาชิก</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/14.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ :  แสดงชื่อผู้ใช้</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.ประเภท : แสดงประเภทการเข้าสู้ระบบ มีดังนี้ 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-line text-success"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี LINE </h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-facebook-square text-primary"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Facebook</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-google text-danger"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Google </h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-globe" style="color: #5F9EA0"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชีที่สมัครสมาชิกผ่านหน้าเว็บ</h5>
                    </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.การจัดอันดับ มีดังนี้
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/gold.png') }}"> " หมายถึง ระดับ Gold </h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/silver.png') }}"> " หมายถึง ระดับ Silver</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <img width="20" src="{{ url('/img/ranking/bronze.png') }}"> " หมายถึง ระดับ Bronze </h5> 
                    </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 4.เบอร์ : แสดงเบอร์ผู้ใช้</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 5.สถานะ : แสดงสถานะบทบาทของบัญชี</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 6.สถานะการใช้งาน : แสดงสถานะการใช้งานของบัญชี</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 7.ผู้สร้าง : แสดงชื่อผู้สร้างบัญชี</h5> 
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ค้นหาผู้ใช้</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">ค้นหารายการจากชื่อผู้ใช้ตามคำที่กำหนด </h5>
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
  <!------------------------------------------- Modal จัดการผู้ใช้------------------------------------------->
  <!------------------------------------------- Modal Check in ------------------------------------------->
  <div class="modal fade"  id="Partner_checkin" tabindex="-1" role="dialog" aria-labelledby="Partner_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_userTitle">ข้อมูลการเข้าออก</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/checkin1.PNG') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ค้นหา</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/checkin2.PNG') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกวัน : เลือกวันที่ต้องการค้นหารายการบุคคลเข้าออก
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  2.เลือกช่วงเวลา : สามารถระบุช่วงเวลาที่บุคคลเข้าออกได้ โดยระบุในช่องค้นหา เพื่อเลือกเวลาที่ที่ต้องการค้นหา</h5> 
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  3.รหัสนักศึกษา : ค้นหารายการจากรหัสนักศึกษาตามคำที่กำหนด</h5> 
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  4.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนแล้วให้คลิกที่ปุ่มค้นหาเพื่อทำการค้นหาข้อมูล</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  5.ล้างการค้นหา : หากต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา เพื่อยกเลิกการค้นหา</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.รายชื่อ Check In/Out</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/checkin3.PNG') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ :  แสดงชื่อผู้ใช้</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.เวลาเข้าออก : แสดงวันที่และเวลาที่เข้าออก </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.เบอร์ : แสดงเบอร์ผุู้ใช้บริการ</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 4.สถานที่ : แสดงแสดงสถานที่ ที่ผู้ใช้ทำการ Check in/out</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 5.รหัสนักศึกษา : แสดงรหัสนักศึกษา </h5> 
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.แจ้งติดโควิด</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/checkin4.PNG') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ค้นหาผู้ใช้ติดโควิด :  พิมพ์ชื่อหรือรหัสนักศึกษาเพื่อค้นหา</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.ติดโควิด : เมื่อเจอนักศึกษาที่ติดโควิดแล้วให้กดปุ่มติดโควิด </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.1 รายชื่อกลุ่มเสี่ยง : ระบบจะแสดงรายชื่อกลุ่มเสี่ยงขึ้นมา ให้ทำการกดปุ่ม ส่งข้อความเตือน เพื่อแจ้งไปยังกลุ่มเสี่ยงทั้งหมด</h5> 
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/checkin5.PNG') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>

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
  <!------------------------------------------- Modal Checkin------------------------------------------->
  @endif
@endif
<!-- ---------------------------------------------End partner ----------------------------------------------->

<!-- admin -->
@if(Auth::check())
  @if (Auth::user()->role  == "admin" )
      <div class="row" style="margin-top:50px;margin-bottom:50px;">
          <div class="col-md-5"><hr></div>
          <div class="col-md-2 text-center">วิธีใช้งานสำหรับ Admin</div>
          <div class="col-md-5"><hr></div>
      </div>
  @endif
@endif
<!-- End Ademin -->

@endsection
