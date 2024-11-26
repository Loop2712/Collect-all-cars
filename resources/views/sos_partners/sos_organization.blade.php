@extends('layouts.viicheck')

@section('content')
<br><br><br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- btn Modal pls input phone -->
            <button type="button" id="btn_open_pls_input_phone" class="btn btn-primary d-none" data-toggle="modal" data-target="#pls_input_phone"></button>

            <!-- Modal pls input phone -->
            <div class="modal fade" id="pls_input_phone" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 20px;width: 90%;max-width: 90%;margin: auto;">
                        <div class="modal-header d-none">
                            <button id="btn_close_pls_input_phone" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="far fa-times-circle"></i>
                                </span>
                            </button>
                        </div>
                        @if(!empty($user))
                            <form id="form_sos_map" method="POST" action="{{ url('api/sos_input_input_phone') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body text-center">
                                    <div>
                                        <br>
                                        <img width="50%" src="{{ asset('/img/stickerline/PNG/10.png') }}">
                                        <br><br>
                                        <span class="text-secondary" style="font-family: 'Kanit', sans-serif;">
                                            โปรดระบุหมายเลขโทรศัพท์ของคุณ<br>เพื่อให้เจ้าหน้าที่สามารถติดต่อกลับได้<br>
                                            <span class="text-danger">(ครั้งแรกเท่านั้น)</span>
                                        </span>
                                        <br>
                                        <input class="form-control d-none" type="text" name="id_of_user" value="{{ Auth::user()->id }}">
                                        <input style="margin-top:15px;font-family: 'Kanit', sans-serif;" class="form-control text-center" type="tel" pattern="[0-9]{10}" name="input_pls_input_phone" id="input_pls_input_phone" value="" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="check_input_pls_input_phone();">
                                        <hr>

                                        <input id="cf_input_pls_input_phone" style="width:50%;font-family: 'Kanit', sans-serif;" class="btn btn-success d-none" type="submit" value="ยืนยัน">

                                        <!-- onclick="click_cf_input_pls_input_phone();" -->
                                        <br>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end pls input phone -->


            <form method="POST" action="{{ url('/sos_map') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('sos_partners.form_sos_organization', ['formMode' => 'create'])
            </form>
        </div>
    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {

        document.querySelector('#btn_sos_on_navbar').classList.add('d-none');
        
        let phone = "{{ Auth::user()->phone }}" ;
        console.log(phone);
        if (phone === "") {
            // click modal pls input phone
            document.querySelector('#btn_open_pls_input_phone').click();
            // end click modal pls input phone
            let input_phone_url = document.querySelector('#input_phone_url').value ;
            let phone_url_sp = input_phone_url.split("=");

                if (phone_url_sp[1]) {
                    document.querySelector('#phone').value = phone_url_sp[1] ;
                    document.querySelector('#text_phone').innerHTML = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').value = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').classList.add('d-none') ;
                } 
        }
    });

    function check_input_pls_input_phone(){

        let input_pls_input_phone = document.querySelector('#input_pls_input_phone').value;

        if (input_pls_input_phone) {
            document.querySelector('#cf_input_pls_input_phone').classList.remove('d-none');
        }else{
            document.querySelector('#cf_input_pls_input_phone').classList.add('d-none');
        }
    }
</script>
@endsection
