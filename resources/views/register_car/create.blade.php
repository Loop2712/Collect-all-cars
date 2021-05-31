@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <div id="row_general" class="row">
                                <div class="col-6">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนใหม่</span><br>
                                    <span style="font-size: 18px;" class="control-label">Register</span>
                                </div>
                                <div id="div_btn_rg_organization" class="col-6">
                                    <a id="btn_rg_organization" class="float-right btn btn-outline-primary main-shadow main-radius" onclick="show_organization();">
                                       <i class="fas fa-building"></i> สำหรับองค์กร
                                    </a>
                                </div>
                            </div>
                            <div id="row_organization" class="row d-none">
                                <!-- มือถือ -->
                                <div class="col-12 d-block d-md-none">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
                                    <span style="font-size: 18px;" class="control-label">Register for company</span>
                                </div>
                                <div class="col-12 d-block d-md-none">
                                    <br>
                                    <a id="btn_back" class="btn btn-outline-success d-none" href="{{ url('/register_car/create') }}">สำหรับบุคคลทั่วไป</a>
                                </div>
                                <!-- คอม -->
                                <div class="col-6 d-none d-lg-block">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
                                    <span style="font-size: 18px;" class="control-label">Register for company</span>
                                </div>
                                <div class="col-6 d-none d-lg-block">
                                    <a id="btn_back_pc" class="btn btn-outline-success d-none float-right" href="{{ url('/register_car/create') }}">สำหรับบุคคลทั่วไป</a>
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

                        </form>
                    </div>
                    @if(!empty(Auth::user()->organization))
                        <a id="click_organization" type="hidden" onclick="show_organization();"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        document.getElementById("click_organization").click();
    });
    function show_organization(){
        document.querySelector('#row_general').classList.add('d-none');
        document.querySelector('#div_general').classList.add('d-none');
        document.querySelector('#div_information').classList.add('d-none');
        document.querySelector('#information').classList.add('d-none');
        document.querySelector('#btn_rg_organization').classList.add('d-none');

        document.querySelector('#row_organization').classList.remove('d-none');
        document.querySelector('#div_organization').classList.remove('d-none');
        document.querySelector('#btn_back').classList.remove('d-none');
        document.querySelector('#btn_back_pc').classList.remove('d-none');

        add_required();
        select_location();
        document.getElementById("check_branch_not_empty").click();
    }
    function select_location(){

        var location = document.querySelector('#location');
        var location_P_2 = document.querySelector('#location_P_2');

        location.value = location_P_2.value;

        var phone = document.querySelector('#phone');
        var phone_2 = document.querySelector('#phone_2');

        phone.value = phone_2.value;
    }

    function add_required(){ 

        // ทั่วไป
        var location_P = document.querySelector('#location_P');
        var location_A = document.querySelector('#location_A');
        var phone = document.querySelector('#phone');

        location_P.removeAttribute('required');
        location_A.removeAttribute('required');
        phone.removeAttribute('required');

        // องค์กร
        var juristicID = document.querySelector('#juristicID');
        var organization_mail = document.querySelector('#organization_mail');
        var location_P_2 = document.querySelector('#location_P_2');
        var location_A_2 = document.querySelector('#location_A_2');
        var phone_2 = document.querySelector('#phone_2');
        var juristicNameTH = document.querySelector('#juristicNameTH');

        juristicID.setAttributeNode(document.createAttribute('required'));
        organization_mail.setAttributeNode(document.createAttribute('required'));
        location_P_2.setAttributeNode(document.createAttribute('required'));
        location_A_2.setAttributeNode(document.createAttribute('required'));
        phone_2.setAttributeNode(document.createAttribute('required'));
        juristicNameTH.setAttributeNode(document.createAttribute('required'));


    }

</script>
@endsection
