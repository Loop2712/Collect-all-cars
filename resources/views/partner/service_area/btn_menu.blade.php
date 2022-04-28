<div class="col-12">
    <h3>
        พื้นที่บริการ <b class="text-info">{{ $name_area }}</b>
        <a style="float: right;" type="button" data-toggle="modal" data-target="#Partner_map">
            <button class="btn btn-primary btn-sm">
                <i class="fas fa-info-circle"></i>วิธีใช้
            </button>
        </a>
    </h3>
    <br>
    <a id="btn_service_current" href="{{ url('/service_current?name_area=' . $name_area) }}" class="btn btn-primary text-white">พื้นที่ปัจจุบัน</a>
    <a id="btn_service_pending" href="{{ url('/service_pending?name_area=' . $name_area) }}" class="btn btn-warning text-white">รอการตรวจสอบ</a>
    <a id="btn_service_area" href="{{ url('/service_area?name_area=' . $name_area) }}"class="btn btn-secondary text-white">ปรับพื้นที่บริการ</a>
   
</div>
 <br>
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