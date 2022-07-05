
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
                        <button class="btn btn-success main-shadow main-radius" style="width:90%;" onclick="check_input();">ยืนยัน</button>
                      </center>
                      <input class="d-none" type="text" name="notify_repair_id" id="notify_repair_id" value="{{ $notify_repair->id }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a id="btn_add_line_condo" href="{{ $data_condos->link_line_oa }}" style="width:90%;"  class="btn btn-success d-none"></a>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
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