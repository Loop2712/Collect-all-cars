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
                            <button class="btn btn-info text-white" style="float:right;" onclick="gen_qr_code();">
                                สร้าง QR-Code
                            </button>
                        </div>
                        <div class="col-6 visible-print text-center">
                            <div id="div_qr_code" class="d-">
                                <img src="data:image/png;base64,{{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->format('png')->generate('Make me into a QrCode!') ) }}">
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
            div_qr_code.innerText = {!! QrCode::size(100)->generate(  name_new_check_in.value  ); !!} ;

            document.querySelector('#div_qr_code').classList.remove('d-none');
    }
</script>

@endsection