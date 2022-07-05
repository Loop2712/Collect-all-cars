
@extends('layouts.viicheck')
@section('content')

<br><br><br><br><br>

<div class="row" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="font-weight-bold mb-0">
                                    <b>โปรดระบุเหตุผลการยกเลิก</b>
                                </h4>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="margin-top:-25px;">
                <div class="row">
                    <div class="col-12">
                      หัวข้อ : {{ $notify_repair->title }}
                      <br>
                      หมวดหมู่ : {{ $notify_repair->category }}
                      <br>
                      จาก : อาคาร {{ $notify_repair->building }} ห้อง {{ $notify_repair->user_condo->room_number }}
                      <br>
                      <hr>
                      <label for="annotation" class="control-label">{{ 'โปรดระบุเหตุผล' }}</label>
                      <textarea class="form-control" id="annotation" name="annotation" rows="4" placeholder="ระบุเหตุผลการยกเลิก"></textarea>
                      <br>
                      <center>
                        <button id="btn_send_annotation" class="btn btn-success main-shadow main-radius" style="width:90%;" onclick="check_input();">ยืนยัน</button>
                      </center>
                      <input class="d-none" type="text" name="notify_repair_id" id="notify_repair_id" value="{{ $notify_repair->id }}">
                      <input class="d-none" type="text" name="old_annotation" id="old_annotation" value="{{ $notify_repair->annotation }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
          <h5 class="modal-title text-danger text-center" id="staticBackdropLabel"> <b>ขออภัยค่ะมีการดำเนินการแล้ว</b>
          <br><br>
          <img width="70%" src="{{ asset('/img/stickerline/PNG/17.png') }}">
          <br><br>
          <a href="{{ $data_condos->link_line_oa }}" style="width:90%;"  class="btn btn-success">ปิด</a>
          <br><br>
        </center>
      </div>
    </div>
  </div>
</div>

<a id="btn_add_line_condo" href="{{ $data_condos->link_line_oa }}" style="width:90%;"  class="btn btn-success d-none"></a>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
        let old_annotation = document.querySelector('#old_annotation');

        if (old_annotation.value) {
          document.querySelector('#btn_modal').click();
          document.querySelector('#btn_send_annotation').classList.add('d-none');
        }

    });

    function check_input()
    {
      let notify_repair_id = document.querySelector('#notify_repair_id').value;
      let annotation = document.querySelector('#annotation');
        // console.log(annotation.value);

        if (annotation.value) {
          console.log(annotation.value);
          fetch("{{ url('/') }}/api/notify_repair_annotation" + "/" + notify_repair_id + "/" + annotation.value)
                .then(response => response.text())
                .then(result => {
                    // console.log(result); 
                    document.querySelector('#btn_add_line_condo').click();
            });
        }else{
          alert('โปรดระบุเหตุผล');
        }
    }
</script>
@endsection