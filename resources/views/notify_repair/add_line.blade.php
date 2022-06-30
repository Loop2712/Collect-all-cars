
@extends('layouts.viicheck')
@section('content')
<!-- Button trigger modal -->
<button id="btn_modal" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" style="margin:-16.5px;">
        <center>
          <br>
          <h5 class="modal-title text-danger text-center" id="staticBackdropLabel"> <b>ระบบได้ส่งข้อมูลของท่านแล้ว</b> <br><span style="font-size:15px;"> <b> โปรดรอเจ้าหน้าที่ยืนยันการนัดสักครู่</b></span></h5>
          <br>
          <img width="80%" src="{{ asset('/img/stickerline/PNG/22.png') }}">
          <br><br>
          <a id="btn_add_line_condo" href="" style="width:90%;"  class="btn btn-success">เสร็จสิ้น</a>
          <br><br>
        </center>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
        document.getElementById("btn_add_line_condo").href = "{{ $link_line_oa }}";
        document.getElementById("btn_modal").click();

        setTimeout(function(){ 
          // document.getElementById("btn_add_line_condo").click(); 
        }, 4000);

    });
</script>
@endsection