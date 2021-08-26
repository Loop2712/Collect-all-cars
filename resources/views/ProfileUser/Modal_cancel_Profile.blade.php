<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->
<!-- Modal -->
<div class="modal fade" style="font-family: 'Mitr', sans-serif;" id="cancel_Profile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"style="background: transparent; border:transparent; " >
      <div class="row">
        <div class="modal-body gradient col-5 col-md-5 col-lg-5 shadow" style="border-radius: 30px 30px 30px 30px ; z-index: 5;">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
                <img width="90%" src="{{ url('/') }}/img/stickerline/PNG/5.png">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body col-7 col-md-7 col-lg-7 bg-white" style="border-radius: 0px 30px 30px 0px ; z-index: 2; margin-left:-50px">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="containers d-flex align-items-center">
                <div class="col-md-1"></div>
                <div class="col-11 ">
                  <center>
                  <h4 style="color:black; font-family: 'Mitr', sans-serif;">แน่ใจหรอว่าจะไม่เป็นครอบครัวเดียวกัน</h4>
                  <h3 class="color-black" style="font-family: 'Mitr', sans-serif;">วีเสียใจน๊า..</h3><br>
                  <button type="button" style="border-radius: 18px;" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile2" >ยืนยัน</button>
                  <button type="button" style="border-radius: 18px;" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" style="font-family: 'Mitr', sans-serif;" id="cancel_Profile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"style="background: transparent; border:transparent; " >
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body gradient "style="border-radius: 10% 10% 10% 10% ;">
        <br>
        <center>
          <img src="{{ url('/') }}/img/stickerline/PNG/5.png">
          <br><br>
          <h4 style="color:white; font-family: 'Mitr', sans-serif;">แน่ใจหรอว่าจะไม่เป็นครอบครัวเดียวกัน</h4>
          <h3 class="text-white" style="font-family: 'Mitr', sans-serif;">วีเสียใจน๊า..</h3><br>
          <button type="button" style="border-radius: 18px;" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile2" >ยืนยัน</button>
          <button type="button" style="border-radius: 18px;" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
        </center>
      </div>
      <div class="modal-footer gradient" style="border-radius: 0px 0px 50px 50px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile2" >ยืนยัน</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div> -->

<div id="cancel_Profile2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="background: transparent; border:transparent; ">
      <div class="row">
        <div class="modal-body gradient col-5 col-md-5 col-lg-5 shadow" style="border-radius: 30px 30px 30px 30px ; z-index: 5;">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
                <img style="width:50%;" src="{{ url('/') }}/img/stickerline/PNG/7.png">
              </div>
              <div class="col-12">
                <br>
                <center>
                  <h3 style="color:white; font-family: 'Mitr', sans-serif;">บอกวีได้มั้ย ?</h3>
                  <h5 style="color:white; font-family: 'Mitr', sans-serif;">ทำไมยกเลิกการเป็นสมาชิก</h5>
                </center>
              </div>
              
            </div>
          </div>
        </div>
        <div class="modal-body col-7 col-md-7 col-lg-7 bg-white" style="border-radius: 0px 30px 30px 0px ; z-index: 2; margin-left:-50px">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="containers d-flex align-items-center">
                <div class="col-md-1"></div>
                <div class="col-11 ">
                    <input type="hidden" id="reason" name="" value="">
                    <input type="hidden" id="id_user" name="" value="{{ Auth::user()->id }}">
                    <input type="radio" id="reason_1" name="reason" value="1" onclick="
                        document.querySelector('#btn_next_1').classList.remove('d-none'),
                        document.querySelector('#reason_other').classList.add('d-none'),
                        document.querySelector('#reason').value = '1';">
                    <label for="1" style="font-family: 'Mitr', sans-serif;font-size:18px">&nbsp;&nbsp;ไม่ต้องการใช้บริการอีกต่อไป</label><br>

                    <input type="radio" id="reason_2" name="reason" value="2" onclick="
                        document.querySelector('#btn_next_1').classList.remove('d-none'),
                        document.querySelector('#reason_other').classList.add('d-none'),
                        document.querySelector('#reason').value = '2';">
                    <label for="2" style="font-family: 'Mitr', sans-serif;font-size:18px">&nbsp;&nbsp;ไม่ได้รับความสะดวกสบายการการใช้บริการ</label><br>

                    <input type="radio" id="reason_3" name="reason" value="3" onclick="
                        document.querySelector('#btn_next_1').classList.remove('d-none'),
                        document.querySelector('#reason_other').classList.add('d-none'),
                        document.querySelector('#reason').value = '3';">
                    <label for="3" style="font-family: 'Mitr', sans-serif;font-size:18px">&nbsp;&nbsp;ไม่ได้รับประโยชน์จากการใช้บริการ</label><br>

                    <input type="radio" id="reason_4" name="reason" value="4" onclick="
                        document.querySelector('#btn_next_1').classList.add('d-none'),
                        document.querySelector('#reason_other').classList.remove('d-none'),
                        document.querySelector('#reason').value = '4',
                        document.querySelector('#reason_other').focus();">
                    <label for="4" style="font-family: 'Mitr', sans-serif;font-size:18px">&nbsp;&nbsp;อื่นๆ</label><br>
                    
                    <input class="form-control d-none" type="text" name="reason_other" id="reason_other" value="" onkeydown="document.querySelector('#btn_next_1').classList.remove('d-none');">
                    <div id="btn_next_1" class="modal-footer d-none" style="margin-bottom:-30px">
                    <button type="button" style="border-radius: 18px;" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile3" >ตกลง</button>
                      <button type="button" class="btn btn-primary text-white col-md-3" style="border-radius: 18px;border:transparent;font-family: 'Mitr', sans-serif;padding:6px" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <div id="cancel_Profile2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-6 col-md-6 col-lg-6">
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
</div> -->

<div id="cancel_Profile3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="background: transparent; border:transparent; ">
      <div class="row">
        <div class="modal-body gradient col-5 col-md-5 col-lg-5 shadow" style="border-radius: 30px 30px 30px 30px ; z-index: 5;">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
                <img style="width:50%;" src="{{ url('/') }}/img/stickerline/PNG/10.png">
              </div>
              <div class="col-12">
                <br>
                <center>
                  <h3 style="color:white; font-family: 'Mitr', sans-serif;">แนะนำวีหน่อย</h3>
                  <h5 style="color:white; font-family: 'Mitr', sans-serif;">วีควรปรับปรุงแก้ไขอะไร ?</h5>
                </center>
              </div>
              
            </div>
          </div>
        </div>
        <div class="modal-body col-7 col-md-7 col-lg-7 bg-white" style="border-radius: 0px 30px 30px 0px ; z-index: 2; margin-left:-50px">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="containers d-flex align-items-center">
                <div class="col-md-1"></div>
                <div class="col-11 ">
                  <label for="amend"style="font-family: 'Mitr', sans-serif; font-size:18px">ข้อควรปรับปรุงแก้ไข</label>
                  <textarea  class="form-control" rows="4" cols="50" name="amend" id="amend"></textarea><br>
                  <div class=" float-right">
                    <button type="button" style="border-radius: 18px;" class="btn btn-secondary " data-dismiss="modal" data-toggle="modal" data-target="#cancel_Profile4" >ตกลง</button> 
                    <button class="btn btn-primary text-white" type="button" style="border-radius: 18px;border:transparent;font-family: 'Mitr', sans-serif;padding:7px" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 
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
</div> -->

<div id="cancel_Profile4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="background: transparent; border:transparent; ">
      <div class="row">
        <div class="modal-body gradient col-5 col-md-5 col-lg-5 shadow" style="border-radius: 30px 30px 30px 30px ; z-index: 5;">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12 d-flex justify-content-center">
                <img style="width:100%;" src="{{ url('/') }}/img/stickerline/PNG/11.png">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body col-7 col-md-7 col-lg-7 bg-white" style="border-radius: 0px 30px 30px 0px ; z-index: 2; margin-left:-50px">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="containers d-flex align-items-center">
                <div class="col-md-1"></div>
                <div class="col-11 ">
                  <center>                                            
                    <h3 style=" font-family: 'Mitr', sans-serif;">ถ้าคุณไปวีคงคิดถึงคุณมากๆ</h3>
                    <h5 style=" font-family: 'Mitr', sans-serif;">วีหวังว่าคุณจะกลับมาเร็วๆนี้นะ</h5><br>
                    <button type="button" style="border-radius: 18px;" class="btn btn-secondary " onclick="confirm_cancel();" >ยกเลิกเป็นสมาชิก</button> 
                    <button class="btn btn-primary text-white" type="button" style="border-radius: 18px;border:transparent;font-family: 'Mitr', sans-serif;padding:7px" data-dismiss="modal">ยกเลิก</button>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 
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
</div> -->

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