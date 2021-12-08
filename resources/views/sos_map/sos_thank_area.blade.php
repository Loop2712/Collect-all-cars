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
            <input class="d-none" type="text" id="CountryCode" name="CountryCode" value="">
            <div id="sos_TH" class="">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_th.png') }}">
            </div>
            <div id="sos_JP" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_jp.png') }}">
            </div>
            <div id="sos_MM" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_mr.png') }}">
            </div>
            <div id="sos_BN" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_bn.png') }}">
            </div>
            <div id="sos_CN" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_cn.png') }}">
            </div>
            <div id="sos_ID" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_id.png') }}">
            </div>
            <div id="sos_KH" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_kh.png') }}">
            </div>
            <div id="sos_KR" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_kr.png') }}">
            </div>
            <div id="sos_LA" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_la.png') }}">
            </div>
            <div id="sos_MY" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_MY.png') }}">
            </div>
            <div id="sos_PH" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_ph.png') }}">
            </div>
            <div id="sos_SG" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_sg.png') }}">
            </div>
            <div id="sos_VN" class="d-none">
              <img width="100%" src="{{ asset('/img/more/sos_thx/thx_vn.png') }}">
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

        document.getElementById("btn_modal").click();

        var delayInMilliseconds = 3000; 

        setTimeout(function() {
          // document.getElementById("a_line").click();
        }, delayInMilliseconds);
        // console.log("START");
        let user_id = document.querySelector('#user_id').value;

        fetch("{{ url('/') }}/api/check_sos_country/" + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let countryCode = document.querySelector('#CountryCode');
                    countryCode.value = result['countryCode'];

                if (result['countryCode']) {
                    document.querySelector('#sos_'+result['countryCode']).classList.remove('d-none');
                }

            });

    });
</script>
@endsection