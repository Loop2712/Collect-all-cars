@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
    
    .loader {
        display: flex;
        /* align-items: center;*/
        /* justify-content: center;*/
        flex-direction: row;
    }

    .slider {
        overflow: hidden;
        background-color: white;
        margin: 0 15px;
        height: 40px;
        width: 20px;
        border-radius: 30px;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.1), -15px -15px 30px #fff,
        inset -5px -5px 10px rgba(0, 0, 255, 0.1),
        inset 5px 5px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .slider::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        border-radius: 100%;
        box-shadow: inset 0px 0px 0px rgba(0, 0, 0, 0.3), 0px 420px 0 400px #2697f3,
        inset 0px 0px 0px rgba(0, 0, 0, 0.1);
        animation: animate_2 2.5s ease-in-out infinite;
        animation-delay: calc(-0.5s * var(--i));
    }

    @keyframes animate_2 {
        0% {
            transform: translateY(250px);
            filter: hue-rotate(0deg);
        }

        50% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(250px);
            filter: hue-rotate(180deg);
        }
    }

    .loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        -webkit-border-radius: 20px;    
        border-radius: 20px; 
        -moz-border-radius:20px;
        -khtml-border-radius:20px;
    }


.div_alert {
    position: fixed;
    top: -100px;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px;
    text-align: center;
    font-family: 'Kanit', sans-serif;
    z-index: 9999;
    font-size: 18px;

}

.div_alert span {
    background-color: #2DD284;
    border-radius: 10px;
    color: white;
    padding: 15px;
    font-family: 'Kanit', sans-serif;
    z-index: 9999;
    font-size: 1em;
}

.up_down {
    animation-name: slideDownAndUp;
    animation-duration:3s;
}

@keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(120px);
        }
        90% {
            transform: translateY(120px);
        }
        100% {
            transform: translateY(0);
        }
    }

</style>

<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="row mt-2">
            <div class="col-12">
                <h3 class="">เปิดสถานะโรงพยาบาล</h3>
                <hr>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-12 mt-2">
                <h4><b>{{ $data->name }}</b></h4>
            </div>
            <div class="col-12 mt-2">
                <h6><b>ประเภทหน่วยบริการสุขภาพ : {{ $data->health_type }}</b></h6>
            </div>

            <div class="col-2 mt-2">
                <span><b>ประเภทองค์กร</b> <br> {{ $data->organization_type }}</span>
            </div>
            <div class="col-2 mt-2">
                <span><b>สังกัด</b> <br> {{ $data->affiliation }}</span>
            </div>
            <div class="col-2 mt-2">
                <span><b>รหัส 9 หลัก</b> <br> {{ $data->code_9_digit }}</span>
            </div>
            <div class="col-2 mt-2">
                <span><b>รหัส 5 หลัก</b> <br> {{ $data->code_5_digit }}</span>
            </div>
            <div class="col-4 mt-2">
                <span><b>เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก</b> <br> {{ $data->code_11_digit }}</span>
            </div>

            <div class="col-2 mt-2">
                <span><b>เขตบริการ</b> <br> {{ $data->service_area }}</span>
            </div>
            <div class="col-2 mt-2">
                <span><b>อำเภอ/เขต</b> <br> {{ $data->district }}</span>
            </div>
            <div class="col-2 mt-2">
                <span><b>ตำบล/แขวง</b> <br> {{ $data->sub_district }}</span>
            </div>

            @if( !empty($data->lat) )
                <div class="col-6 mt-2">
                    <span><b>ที่อยู่</b> <br> {{ $data->address }}</span>
                </div>

                <div class="col-12 mt-2">
                    <span><b>Lat :</b> {{ $data->lat }} <b>LONG :</b> {{ $data->lng }}</span>
                </div>
            @else
                <div class="col-6 mt-2"></div>
                <hr class="mt-4">
                <div class="col-12 mt-2">
                    <span class="text-danger">
                        กรุณาเพิ่มข้อมูลที่อยู่, Lat, Long
                    </span>
                </div>
                <div class="col-6 mt-2">
                    <label for="address"><b>ที่อยู่</b></label>
                    <textarea class="form-control" id="address" name="address" rows="4" onchange="check_input_lat_lng();"></textarea>
                </div>
                <div class="col-3 mt-2">
                    <label for="lat"><b>Lat</b></label>
                    <input type="text" name="lat" id="lat" class="form-control" onchange="check_input_lat_lng();">
                </div>
                <div class="col-3 mt-2">
                    <label for="lng"><b>Long</b></label>
                    <input type="text" name="lng" id="lng" class="form-control" onchange="check_input_lat_lng();">
                </div>
            @endif
            


            <div class="col-6 mt-4">
                <div id="div_loader_Excel" class="d-none">
                    <section class="loader">
                        <div class="slider" style="--i:0"></div>
                        <div class="slider" style="--i:1"></div>
                        <div class="slider" style="--i:2"></div>
                        <div class="slider" style="--i:3"></div>
                        <div class="slider" style="--i:4"></div>
                        <span class="text-success" style="margin-top: 25px;">กำลังประมวลผล..</span>
                    </section>
                </div>
                <div  class="loading-container" class="mt-5">
                    <div id="div_success_Excel" class="contrainerCheckmark d-none">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <center>
                            <h5 class="mt-3">เสร็จสิ้น</h5>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-4">
                <button id="btn_cf" class="btn btn-success float-end" disabled onclick="create_account();">
                    สร้างรหัสเข้าใช้งาน
                </button>   
            </div>

            <hr class="mt-4">

            <div id="div_show_Account" class="card border-top border-0 border-4 border-primary d-none">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Account สำหรับเข้าใช้งาน</h5>
                    </div>
                    <hr>
                    <form class="row g-3">
                        <div class="col-12 mt-3">
                            <h4><b>{{ $data->name }}</b></h4>
                        </div>
                        <div class="col-12 mt-2">
                            <h6><b>ประเภทหน่วยบริการสุขภาพ : {{ $data->health_type }}</b></h6>
                        </div>

                        <div class="col-12">
                            <span class="text-danger">*กรุณาคัดลอก Account ด้านล่างนี้ เมื่อคุณออกจากหน้านี้ข้อมูลจะหายไป</span>
                            <textarea class="form-control" id="Account" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                            <span type="submit" class="btn btn-primary px-5" onclick="CopyToClipboard('Account');">
                                copy
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        check_lat_lng();

    });

    function check_lat_lng(){

        let lat = "{{ $data->lat }}";
        let lng = "{{ $data->lng }}";
        let address = "{{ $data->address }}";

        if(lat && lng && address){
            document.querySelector('#btn_cf').disabled = false;
        }else{
            document.querySelector('#btn_cf').disabled = true;
        }

    }

    function check_input_lat_lng(){

        let lat = document.querySelector('#lat').value;
        let lng = document.querySelector('#lng').value;
        let address = document.querySelector('#address').value;

        // console.log(lat);
        // console.log(lng);
        // console.log(address);

        if(lat && lng && address){
            document.querySelector('#btn_cf').disabled = false;
        }else{
            document.querySelector('#btn_cf').disabled = true;
        }

    }

    function create_account(){

        document.querySelector('#div_loader_Excel').classList.remove('d-none');

        fetch("{{ url('/') }}/api/create_account_hospital/" + "{{ Auth::user()->sub_organization }}" + "/" + "{{ $data->id }}" + "/" + "{{ Auth::user()->id }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let account = document.querySelector('#Account');

                if(result){
                    account.value = "Username : " + result['username'] + "\n" + "Password : " + result['username'];
                    document.querySelector('#div_loader_Excel').classList.add('d-none');
                    document.querySelector('#div_success_Excel').classList.remove('d-none');
                    document.querySelector('#div_show_Account').classList.remove('d-none');

                    document.querySelector('#btn_cf').remove();

                }

        });

    }

    function CopyToClipboard(containerid) {

        window.getSelection().removeAllRanges();

        let range ;
        if (document.selection) {
            range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");
        } else if (window.getSelection) {
            range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");

            document.querySelector('#alert_text').innerHTML = "คัดลอกเรียบร้อย";
            document.querySelector('#alert_copy').classList.add('up_down');

            const animated = document.querySelector('.up_down');
            animated.onanimationend = () => {
                document.querySelector('#alert_copy').classList.remove('up_down');
            };
        }

    }


</script>
@endsection
