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
                        <a id="click_organization_edit" type="hidden" onclick="add_required();"></a>
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
        function add_required(){ 

        // ทั่วไป
        var location_P = document.querySelector('#location_P');
        var location_A = document.querySelector('#location_A');
        var phone = document.querySelector('#phone');

        location_P.removeAttribute('required');
        location_A.removeAttribute('required');
        phone.removeAttribute('required');

        document.querySelector('#div_general').classList.add('d-none');
        document.querySelector('#div_information').classList.add('d-none');
        document.querySelector('#information').classList.add('d-none');
        document.querySelector('#btn_rg_organization').classList.add('d-none');

        document.querySelector('#row_organization').classList.remove('d-none');
        document.querySelector('#div_organization').classList.remove('d-none');

    }
    </script>
@endsection
