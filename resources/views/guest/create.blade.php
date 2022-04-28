@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="btn_register" class="row">
                    <div class="col-12">
                        <div id="div_rgc" class="main-shadow main-radius float-right " style="padding-bottom: 5px">
                            <a class="btn btn-danger btn_register" href="{{ url('/register_car/create') }}" role="button">ลงทะเบียนรถใหม่ <span class="text_click">คลิก</span></a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">ข้อมูลรถที่ต้องการติดต่อ
                        
                        <span class="float-right">
                            <a id="guest_TH" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/th1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_ID" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/ID.png') }}" style= "border-radius: 5px; border: 1px solid; color:#8C8C8C;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_LA" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/la1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_PH" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/ph1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_MM" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/my1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_SG" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/sg1.png') }}" style= "border-radius: 5px;border: 1px solid; color:#8C8C8C;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_KR" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/kr1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_BN" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/bn1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_VN" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/vn1.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_MY" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/ml1.jpg') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_JP" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/jp.png') }}" style= "border-radius: 5px; border: 1px solid; color:#8C8C8C;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_KO" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/ko1.png') }}" style= "border-radius: 5px;border: 1px solid; color:#8C8C8C;"> 
                            </a>
                        </span>
                        <span>
                            <a id="guest_CN" href="#" class="d-none"  style="padding:0px">
                                <img width="40px" src="{{ asset('/img/national-flag/cn.png') }}" style= "border-radius: 5px;"> 
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/guest') }}" title="Back"><button class="d-none btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/guest') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('guest.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        let user_id = document.querySelector('#user_id').value;

        fetch("{{ url('/') }}/api/check_sos_country/" + user_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let countryCode = document.querySelector('#CountryCode');
                    countryCode.value = result['countryCode'];

                if (result['countryCode']) {
                    document.querySelector('#guest_'+result['countryCode']).classList.remove('d-none');
                }

            });
    });
</script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log("START"); 
            setTimeout(function(){ 
              document.getElementById("btn_register").classList.add('d-none');; 
            }, 6500);
        });
    </script> -->
    <br>
@endsection
