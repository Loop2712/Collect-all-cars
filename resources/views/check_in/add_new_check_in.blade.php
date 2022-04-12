@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="row col-12">
                <div class="col-12">
                    <div class="row col-12">
                        <div class="col-12">
                            <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                                สร้าง QR-Code
                            </h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row col-12">
                        <div class="col-6">
                            <label class="control-label" for="name_new_check_in">ชื่อจุด Check in</label>
                            <input type="text" class="form-control" id="name_new_check_in" name="name_new_check_in" placeholder="กรอกชื่อจุด Check in">
                            <br>
                            <a href="{{ url('/check_in/add_new_check_in?name_new_location=ทดสอบ') }}" class="btn btn-info text-white" style="float:right;" onclick="gen_qr_code();">
                                สร้าง QR-Code
                            </a>
                        </div>
                        <div class="col-6 visible-print text-center">
                            <div id="div_qr_code" class="d-">
                                {!! QrCode::size(100)->generate('https://www.viicheck.com/check_in/create?location={{ $name_new_location }}'); !!} 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
    function gen_qr_code()
    {
        let name_new_check_in = document.querySelector('#name_new_check_in') ;
        let div_qr_code = document.querySelector('#div_qr_code');

            document.querySelector('#div_qr_code').classList.remove('d-none');
    }
</script>

@endsection