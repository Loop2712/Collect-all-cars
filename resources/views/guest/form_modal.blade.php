<!-- ไม่มีในระบบ -->
<!-- Button trigger modal -->
<a id="btn_not_system" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#not_system">
  Launch static backdrop modal
</a>

<!-- Modal -->
<div class="modal fade" id="not_system" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/cry.png') }}">
            <br><br>
            <h5 class="text-danger">รถหมายเลขทะเบียนนี้ไม่มีในระบบค่ะ</h5>
            <p style="line-height: 2;">กรุณาตรวจสอบใหม่อีกครั้งค่ะ</p>
            <h5 class="text-danger">This car registration number is not in the system.</h5>
            <p style="line-height: 2;">Please check and try again.</p>
            <br>
        </center>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- ซ้ำ -->
<!-- Button trigger modal -->
<a id="btn_repeatedly" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#repeatedly">
  Launch static backdrop modal
</a>

<!-- Modal -->
<div class="modal fade" id="repeatedly" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/nono.png') }}">
            <br><br>
            <h5 class="text-danger">ท่านแจ้งเตือนไปยังเจ้าของรถคันนี้แล้ว</h5>
            <p style="line-height: 2;">โปรดรออย่างน้อย 5 นาทีค่ะ</p>
            <h5 class="text-danger">You have already sent the message to the car owner.</h5>
            <p style="line-height: 2;">Please wait at least 5 mins Thank you.</p>
        </center>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- รถยกเลิกไปแล้ว -->
<!-- Button trigger modal -->
<a id="btn_car_cancel"  class="d-none" data-toggle="modal" data-target="#car_cancel"></a>

<!-- Modal -->
<div class="modal fade" id="car_cancel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/cry.png') }}">
            <br><br>
            <h5 class="text-danger">
                ขออภัยค่ะ รถคันนี้เจ้าของรถ<br>
                ได้ทำการยกเลิกแล้ว
            </h5>
            <br>
        </center>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- เลือกป้ายทะเบียนรถ -->
<!-- Button trigger modal -->
<a id="btn_select_registration"  class="d-none" data-toggle="modal" data-target="#select_registration"></a>

<!-- Modal -->
<div class="modal fade" id="select_registration" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Please select <i class="fas fa-clipboard-check text-success"></i></h5>
        <button id="btn_close_select_registration" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 text-center" >
            <div class="row">
              <br>
              <div class="col-12" id="div_content" style="position: relative;top: -70px;">
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<!-- ระบบไม่สามารถดำเนินการต่อได้ -->
<!-- Button trigger modal -->
<a id="btn_not_continue" type="button" class="d-none" data-toggle="modal" data-target="#not_continue">
  Launch static backdrop modal
</a>

<!-- Modal -->
<div class="modal fade" id="not_continue" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ระบบไม่สามารถดำเนินการต่อได้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
          <center>
            <img width="80%" src="{{ asset('/img/stickerline/PNG/17.png') }}">
          </center>
          <br>
          <h5>โปรดตรวจสอบภาพถ่ายของคุณ</h5>
          <ul>
              <li>ไม่มืดหรือสว่างเกินไป</li>
              <li>รูปไม่เบลอ เห็นตัวอักษรชัดเจน</li>
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>