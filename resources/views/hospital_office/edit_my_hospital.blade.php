@extends('layouts.partners.theme_hospital')

@section('content')

<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div>
                <i class="fa-solid fa-pen-to-square me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">แก้ไขข้อมูล <b>{{ $hospital_offices->name }}</b></h5>
        </div>
        <hr>
        <form method="POST" action="{{ url('/hospital_office/' . $hospital_offices->id) }}" accept-charset="UTF-8" class="form-horizontal row g-3" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $hospital_offices->name }}">
            </div>
            <div class="col-md-6">
                <label for="health_type" class="form-label">ประเภทหน่วยบริการสุขภาพ</label>
                <input type="text" class="form-control" id="health_type" name="health_type" value="{{ $hospital_offices->health_type }}">
            </div>

            <div class="col-md-3">
                <label for="organization_type" class="form-label">ประเภทองค์กร</label>
                <input type="text" class="form-control" id="organization_type" name="organization_type" value="{{ $hospital_offices->organization_type }}">
            </div>
            <div class="col-md-3">
                <label for="affiliation" class="form-label">สังกัด</label>
                <input type="text" class="form-control" id="affiliation" name="affiliation" value="{{ $hospital_offices->affiliation }}">
            </div>
            <div class="col-md-3">
                <label for="code_9_digit" class="form-label">รหัส 9 หลัก</label>
                <input type="text" class="form-control" id="code_9_digit" name="code_9_digit" value="{{ $hospital_offices->code_9_digit }}">
            </div>
            <div class="col-md-3">
                <label for="code_5_digit" class="form-label">รหัส 5 หลัก</label>
                <input type="text" class="form-control" id="code_5_digit" name="code_5_digit" value="{{ $hospital_offices->code_5_digit }}">
            </div>

            <div class="col-md-3">
                <label for="code_11_digit" class="form-label">เลขอนุญาตให้ประกอบสถานบริการสุขภาพ 11 หลัก</label>
                <input type="text" class="form-control" id="code_11_digit" name="code_11_digit" value="{{ $hospital_offices->code_11_digit }}">
            </div>
            <div class="col-md-3">
                <label for="service_area" class="form-label">เขตบริการ</label>
                <input type="text" class="form-control" id="service_area" name="service_area" value="{{ $hospital_offices->service_area }}">
            </div>
            <div class="col-md-3">
                <label for="district" class="form-label">อำเภอ/เขต</label>
                <input type="text" class="form-control" id="district" name="district" value="{{ $hospital_offices->district }}">
            </div>
            <div class="col-md-3">
                <label for="sub_district" class="form-label">ตำบล/แขวง</label>
                <input type="text" class="form-control" id="sub_district" name="sub_district" value="{{ $hospital_offices->sub_district }}">
            </div>

            <div class="col-md-6">
                <label for="address"><b>ที่อยู่</b></label>
                <textarea class="form-control" id="address" name="address" rows="4">{{ $hospital_offices->address }}</textarea>
            </div>
            <div class="col-md-3">
                <label for="lat" class="form-label">Lat</label>
                <input type="text" class="form-control" id="lat" name="lat" value="{{ $hospital_offices->lat }}">
            </div>
            <div class="col-md-3">
                <label for="lng" class="form-label">Long</label>
                <input type="text" class="form-control" id="lng" name="lng" value="{{ $hospital_offices->lng }}">
            </div>
            
            <div class="form-group">
                <input id="btn_submit_form" class="btn btn-info d-none" type="submit" value="{{ 'ยืนยันแก้ไขข้อมูล' }}">
                <span id="span_on_submit" class="btn btn-info float-end px-5" onclick="on_submit();">
                    ยืนยันแก้ไขข้อมูล
                </span>
            </div>
        </form>
    </div>
</div>

<style>
    .loading-container {
        display: flex;
        align-items: center;
        justify-content: center;
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
        border-radius: 20px;
    }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="saveDataSuccess" tabindex="-1" role="dialog" aria-labelledby="saveDataSuccessTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content radius-20">
            <div class="modal-body p-5">
                <div class="loading-container">
                    <div class="loading-spinner"></div>

                    <div class="contrainerCheckmark d-none">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <center>
                            <h5 class="mt-5">เสร็จสิ้น</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function on_submit() {
        $('#saveDataSuccess').modal('show');

        setTimeout(function() {
            document.querySelector(".loading-spinner").style.display = "none";
            document.querySelector(".contrainerCheckmark").classList.remove('d-none');
        }, 1000);

        setTimeout(function() {
            document.querySelector('#btn_submit_form').click();
            // window.location.reload();
        }, 3000);
    }
</script>

@endsection
