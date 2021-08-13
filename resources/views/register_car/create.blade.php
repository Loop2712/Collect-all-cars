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
                                <div class="col-12 d-block d-md-none">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
                                    <span style="font-size: 18px;" class="control-label">Register for company</span>
                                </div>
                                <div class="col-12 d-block d-md-none">
                                    <br>
                                    <a id="btn_back" class="btn btn-outline-success d-none" href="{{ url('/register_car/create') }}">สำหรับบุคคลทั่วไป</a>
                                </div>
                                <!-- คอม -->
                                <div class="col-6 d-none d-lg-block" style="margin-top:5px;">
                                    <span style="font-size: 22px;" class="control-label">ลงทะเบียนสำหรับองค์กร</span><br>
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
                </div>
            </div>
        </div>
    </div>
    <br>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("");
    });
    function show_organization(){

        document.querySelector('#row_general').classList.add('d-none');
        document.querySelector('#btn_rg_organization').classList.add('d-none');

        document.querySelector('#blade_organization').classList.remove('d-none');

        document.querySelector('#row_organization').classList.remove('d-none');
        document.querySelector('#btn_back').classList.remove('d-none');
        document.querySelector('#btn_back_pc').classList.remove('d-none');

        add_required();
    }
    
    function add_required(){ 

        // องค์กร
        var juristicID = document.querySelector('#juristicID');
        var organization_mail = document.querySelector('#organization_mail');
        var location_P_2 = document.querySelector('#location_P_2');
        var location_A_2 = document.querySelector('#location_A_2');
        var phone_2 = document.querySelector('#phone_2');
        var juristicNameTH = document.querySelector('#juristicNameTH');
        var branch = document.querySelector('#branch');
        var branch_province = document.querySelector('#branch_province');
        var branch_district = document.querySelector('#branch_district');

        // juristicID.setAttributeNode(document.createAttribute('required'));
        organization_mail.setAttributeNode(document.createAttribute('required'));
        location_P_2.setAttributeNode(document.createAttribute('required'));
        location_A_2.setAttributeNode(document.createAttribute('required'));
        phone_2.setAttributeNode(document.createAttribute('required'));
        juristicNameTH.setAttributeNode(document.createAttribute('required'));

        juristicNameTH.value = "{{ isset($not_comfor->juristicNameTH) ? $not_comfor->juristicNameTH : $juristicNameTH}}";
        location_A_2.value = "{{ isset($register_car->location_A_2) ? $register_car->location_A_2 :  $juristicDistrict }}";
        location_P_2.value = "{{ isset($register_car->location_P_2) ? $register_car->location_P_2 :  $juristicProvince }}";
        organization_mail.value = "{{ isset($register_car->organization_mail) ? $register_car->organization_mail :  $juristicMail }}";
        phone_2.value = "{{ $juristicPhone }}";
        juristicID.value = "{{ isset($register_car->juristicID) ? $register_car->juristicID :  $juristicID }}";

        branch.value = "{{ isset($register_car->branch) ? $register_car->branch :  Auth::user()->branch }}";
        branch_province.value = "{{ isset($register_car->branch_province) ? $register_car->branch_province :  Auth::user()->branch_province }}";
        branch_district.value = "{{ isset($register_car->branch_district) ? $register_car->branch_district :  Auth::user()->branch_district }}";
    }

</script>
@endsection
