@extends('layouts.mail_to')
@section('content')
<a id="tel1669" class="d-none" href="tel:1669"></a>

<!-- Button trigger modal -->
<button id="btn_1669" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_1669">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal_1669" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" style="margin:-16.5px;">
        <center>
            <img width="100%" src="{{ asset('/img/more/ขอบคุณที่ไว้ใจให้เราดูแล-02.jpg') }}">
        </center>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button> -->
        <a href="https://lin.ee/xnFKMfc">
            <button type="button" class="btn btn-success">เสร็จสิ้น</button>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
        setTimeout(function(){ 
          document.getElementById("tel1669").click(); 
        }, 100);
        document.getElementById("btn_1669").click();

    });
    function btn_add_line(){
        document.getElementById("btn_add_line").click();
    }
</script>
@endsection