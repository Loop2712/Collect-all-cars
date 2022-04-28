@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูล</div>
                    <div class="card-body">
                        <a href="{{ url('/register_car') }}" title="Back"><button class="d-none btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/register_car/' . $register_car->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('register_car.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                    @if(!empty($juristicNameTH))
                        <a id="click_organization_edit" class="btn" onclick="show_organization_edit();">click_organization_edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
            let car_type_old = document.querySelector('#car_type_old').value;
                if (car_type_old === 'car') {
                    document.getElementById("btn_type_car").click();
                }
                if (car_type_old === 'motorcycle') {
                    document.getElementById("btn_type_motor_mobile").click();
                    document.getElementById("btn_type_motor_pc").click();
                }

            document.getElementById("click_organization_edit").click();
        });

    function show_organization_edit(){

        document.querySelector('#blade_organization').classList.remove('d-none');

        add_required_edit();
    }
    
    function add_required_edit(){ 

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

        juristicNameTH.value = "{{ isset($register_car->juristicNameTH) ? $register_car->juristicNameTH : $juristicNameTH}}";
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
