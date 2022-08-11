@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <div id="row_general" class="row">
                                <div class="col-6" style="margin-top:5px;">
                                    <span style="font-size: 22px; " class="control-label">ลงทะเบียนใหม่</span>
                                </div>
                                <div id="div_btn_rg_organization" class="col-6">
                                    <a id="btn_rg_organization" class="float-right btn btn-outline-primary main-shadow main-radius" onclick="show_organization();">
                                       <i class="fas fa-building"></i> สำหรับองค์กร
                                    </a>
                                </div>
                            </div>
                            <div id="row_organization" class="row d-none">
                                <!-- มือถือ -->
                                <div class="col-12 d-block d-lg-none">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
                                    <span style="font-size: 18px;" class="control-label">Register for company</span>
                                </div>
                                <div class="col-12 d-block d-lg-none">
                                    <br>
                                    <a id="btn_back" class="btn btn-outline-success" href="{{ url('/register_car/create') }}">สำหรับบุคคลทั่วไป</a>
                                </div>
                                <!-- คอม -->
                                <div class="col-6 d-none d-lg-block" style="margin-top:5px;">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
                                </div>
                                <div class="col-6 d-none d-lg-block">
                                    <a id="btn_back_pc" class="btn btn-outline-success float-right" href="{{ url('/register_car/create') }}">สำหรับบุคคลทั่วไป</a>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/register_car') }}" title="Back"><button class="d-none btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/register_car') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('register_car.form', ['formMode' => 'create'])
                            <input class="d-none" type="text" name="check_reg" id="check_reg" value="1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

    <!-- Button trigger modal -->
    <button id="btn_modal_addline" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_addline">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal_addline" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <br>
            <h4 class="text-center text-back">
                <b><span class="text-danger">กรุณา</span>เพิ่มเพื่อนไลน์เพื่อรับข้อความการติดต่อ</b>
            </h4>
            <br>
            <center>
              <a href="https://lin.ee/xnFKMfc">
                <img width="100%" src="{{ asset('/img/more/poster add line 2.png') }}">
              </a>
            </center>
            <br>
            <a id="btn_add_line" href="https://lin.ee/xnFKMfc">
              <button  style="width:100% ;font-size: 22px; background-color: #28A745;" type="button" class="btn btn-lg btn-success text-white" ><b>
                <i class="fab fa-line "></i> เพิ่มเพื่อน</b>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("");
        let user_id = document.querySelector('#user_id');

        fetch("{{ url('/') }}/api/check_add_line/" + user_id.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result[0]['add_line']);
                if (result[0]['add_line'] != "Yes") {
                    document.querySelector('#btn_modal_addline').click();
                }
        });
    });

    function show_organization(){

        document.querySelector('#row_general').classList.add('d-none');
        document.querySelector('#btn_rg_organization').classList.add('d-none');

        document.querySelector('#blade_organization').classList.remove('d-none');

        document.querySelector('#row_organization').classList.remove('d-none');

        document.querySelector('#check_reg').value = '2';
        add_required();
    }
    
    

</script>
@endsection
