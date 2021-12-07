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
            <h5 class="modal-title text-danger text-center" id="staticBackdropLabel"> <b>เจ้าหน้าที่กำลังเดินทางไปหาคุณ</b> <br><span style="font-size:18px;"> <b>โปรดรอสักครู่</b> </span></h5>
            <div id="sos_TH" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/th.png') }}">
            </div>
        </center>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button> -->
        <a id="a_line" href="https://lin.ee/xnFKMfc">
            <button type="button" class="btn btn-success">เสร็จสิ้น</button>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let user_id = document.querySelector('#user_id').value;

        fetch("{{ url('/') }}/api/check_sos_country/" + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let countryCode = document.querySelector('#CountryCode');
                    countryCode.value = result['countryCode'];

                if (result['countryCode']) {

                    if (result['countryCode'] !== 'TH') {
                    document.querySelector('#btn_quick_help').classList.add('d-none');
                    }

                    document.querySelector('#sos_'+result['countryCode']).classList.remove('d-none');
                }

            });

    });
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 
        document.getElementById("btn_modal").click();

        var delayInMilliseconds = 3000; 

        setTimeout(function() {
          // document.getElementById("a_line").click();
        }, delayInMilliseconds);

    });
</script>
@endsection