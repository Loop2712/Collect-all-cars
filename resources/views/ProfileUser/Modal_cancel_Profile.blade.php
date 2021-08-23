<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="cancel_Profile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <br>
        <center>
          <img src="{{ url('/') }}/img/stickerline/PNG/5.png">
          <br><br>
          <h4>แน่ใจหรอว่าจะไม่เป็นครอบครัวเดียวกัน</h4>
          <h3 class="text-primary">วีเสียใจน้า..</h3>
          
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile2" >ยืนยัน</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<div id="cancel_Profile2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-5">
              <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/7.png">
            </div>
            <div class="col-7">
              <br><br>
              <center>
                <h3>บอกวีได้มั้ย ?</h3>
                <h5>ทำไมยกเลิกการเป็นสมาชิก</h5>
              </center>
            </div>
            
            <div class="col-12">
              <input type="hidden" id="reason" name="" value="">
              <input type="hidden" id="id_user" name="" value="{{ Auth::user()->id }}">
              <hr>
              <input type="radio" id="reason_1" name="reason" value="1" onclick="
                  document.querySelector('#btn_next_1').classList.remove('d-none'),
                  document.querySelector('#reason_other').classList.add('d-none'),
                  document.querySelector('#reason').value = '1';">
              <label for="1">&nbsp;&nbsp;ไม่ต้องการใช้บริการอีกต่อไป</label><br>

              <input type="radio" id="reason_2" name="reason" value="2" onclick="
                  document.querySelector('#btn_next_1').classList.remove('d-none'),
                  document.querySelector('#reason_other').classList.add('d-none'),
                  document.querySelector('#reason').value = '2';">
              <label for="2">&nbsp;&nbsp;ไม่ได้รับความสะดวกสบายการการใช้บริการ</label><br>

              <input type="radio" id="reason_3" name="reason" value="3" onclick="
                  document.querySelector('#btn_next_1').classList.remove('d-none'),
                  document.querySelector('#reason_other').classList.add('d-none'),
                  document.querySelector('#reason').value = '3';">
              <label for="3">&nbsp;&nbsp;ไม่ได้รับประโยชน์จากการใช้บริการ</label><br>

              <input type="radio" id="reason_4" name="reason" value="4" onclick="
                  document.querySelector('#btn_next_1').classList.add('d-none'),
                  document.querySelector('#reason_other').classList.remove('d-none'),
                  document.querySelector('#reason').value = '4',
                  document.querySelector('#reason_other').focus();">
              <label for="4">&nbsp;&nbsp;อื่นๆ</label><br>

              <input class="form-control d-none" type="text" name="reason_other" id="reason_other" value="" onkeydown="document.querySelector('#btn_next_1').classList.remove('d-none');">
            </div>
          </div>
        </div>
      </div>
      <div id="btn_next_1" class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile3">ต่อไป</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
        
      </div>
    </div>
  </div>
</div>

<div id="cancel_Profile3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-7">
              <br><br>
                <center>
                  <h3>แนะนำวีหน่อย</h3>
                  <h5>วีควรปรับปรุงแก้ไขอะไร ?</h5>
                </center>
              
            </div>
            <div class="col-5">
              <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/10.png">
            </div>
            
            <div class="col-12">
              <hr>
              <label for="amend">ข้อควรปรับปรุงแก้ไข</label>
              <textarea  class="form-control" rows="4" cols="50" name="amend" id="amend"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile4">ต่อไป</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<div id="cancel_Profile4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-12">
          <div class="row">
            <div class="col-7">
              <br><br>
                <center>
                  <h3>ถ้าคุณไปวีคงคิดถึงคุณมากๆ</h3>
                  <br>
                  <h5>วีหวังว่าคุณจะกลับมาเร็วๆนี้นะ</h5>
                </center>
            </div>
            <div class="col-5">
              <br>
              <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/11.png">
            </div>
            <br>
        </div>
      </div>
      <div id="div_submit_cancel" class="modal-footer ">
        <button type="button" class="btn btn-secondary" onclick="confirm_cancel();">ยกเลิกการเป็นสมาชิก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ออก</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
    function confirm_cancel(){
      var id_user = document.querySelector('#id_user').value;
      var reason = document.querySelector('#reason').value;

      var reason_other = document.querySelector('#reason_other').value;
      var amend = document.querySelector('#amend').value;

      if (reason_other === "") {
        reason_other = null;
      }

      if (amend === "") {
        amend = null;
      }

      fetch("{{ url('/') }}/api/confirm_cancel/"+id_user+"/"+reason+"/"+reason_other+"/"+amend+"/profile");
      
      document.querySelector('#btn_logout').click();
    }
</script>