@extends('layouts.viicheck')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif !important;
    }

    div.image {
        height: auto;
        width: 100%;
    }

    div.image img {
        height: inherit;
        width: inherit;
    }
</style>
@section('content')
<div class="container notranslate" style="padding-top: 150px;">
    <div class="row">
        <div class="col-md-3">
            <div class="w-100 image" style="position: relative;">
                <img src="{{ url('storage')}}/{{ $privilege->img_cover }}" class="img-cover" alt="">
            </div>
        </div>

        <div class="col-md-9">
            <div class="">
                <div class="card-body px-0">
                    <div class="mb-3">
                        <p class="mb-0"><b>โปรโมชั่น</b></p>
                        <h4 class="m-0">{{$privilege->titel}}</h4>
                    </div>

                    @if(!empty($privilege->start_privilege) or !empty($privilege->expire_privilege))
                    <div class="mb-3">
                        <p class="mb-0"><b>ระยะเวลา</b></p>
                        <p class="m-0">
                            @if(!empty($privilege->start_privilege) and !empty($privilege->expire_privilege))
                            {{ thaidate("j F Y" , strtotime($privilege->start_privilege)) }} - {{ thaidate("j F Y" , strtotime($privilege->expire_privilege)) }}
                            @elseif(empty($privilege->start_privilege) and !empty($privilege->expire_privilege))
                            ตั้งแต่วันนี้ถึง วันที่ {{ thaidate("j F Y" , strtotime($privilege->expire_privilege)) }}
                            @elseif(!empty($privilege->start_privilege) and empty($privilege->expire_privilege))
                            ตั้งแต่วันวันที่ {{ thaidate("j F Y" , strtotime($privilege->start_privilege)) }} เป็นต้นไป
                            @endif
                        </p>
                    </div>
                    @endif

                    <div class="mb-3">
                        <p class="mb-0"><b>ข้อกำหนดและเงื่อนไข</b></p>
                        <p class="m-0">{!! $privilege->detail !!}</p>
                    </div>

                    <style>
                        @media (max-width: 767px) {
                            .btn-redeem {
                                position: fixed;
                                bottom: 12px;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                z-index: 995;
                                width: 100%;
                                padding: 0 20px;
                            }

                            .btn-redeem .btn {
                                background-color: #db2d2e;
                                color: #fff;
                                width: 100%;
                                border-radius: 50px;
                                -webkit-border-radius: 50px;
                                -moz-border-radius: 50px;
                                -ms-border-radius: 50px;
                                -o-border-radius: 50px;
                                animation: myAnim 1s ease 0s 1 normal forwards;
                            }

                        }

                        @media (min-width: 767px) {
                            .btn-redeem .btn {
                                background-color: #db2d2e;
                                color: #fff;
                                border-radius: 50px;
                                -webkit-border-radius: 50px;
                                -moz-border-radius: 50px;
                                -ms-border-radius: 50px;
                                -o-border-radius: 50px;
                                padding: 5px 30px;
                            }
                        }

                        @keyframes myAnim {
                            0% {
                                opacity: 0;
                                transform: translateY(50px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        #pills-code.active {
                            background-color: #DDD9D9;
                            display: flex;
                            justify-content: space-between;
                            color: #000;
                            margin-bottom: 0;
                            padding: 2px;
                            text-align: center;
                            border-radius: 50px;
                            align-items: center;
                            margin: 0;
                        }

                        .btn-copy-code {
                            min-width: 40px;
                            min-height: 40px;
                            max-width: 40px;
                            max-height: 40px;
                            cursor: pointer;
                            background-color: #fff;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            border-radius: 50%;
                        }

                        .copied {
                            width: fit-content;
                            opacity: 0;
                            position: fixed;
                            bottom: 20px;
                            left: 0;
                            right: 0;
                            margin: auto;
                            color: #fff;
                            padding: 5px 15px;
                            background-color: #66ab45;
                            border-radius: 50px;
                            transition: .4s opacity;
                        }
                    </style>
                    <div class="btn-redeem">
                        <button class="btn" onclick="getcodeRedeem('{{$privilege->id}}')">Redeem</button>
                    </div>

                    <!-- onclick="getcodeRedeem('{{$privilege->id}}')" -->
                    <style>
                        hr {
                            border: 3px dashed #ff0000;
                            border-style: none none dashed;
                            color: #fff;
                            background-color: #fff;
                        }
                    </style>
                    <!-- Modal -->
                    <div class="modal fade" id="redeem_code" tabindex="-1" role="dialog" aria-labelledby="redeem_code" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center">
                                    <div class="w-100">
                                        <center>

                                            <img id="img_logo_partner_redeem" src="" alt="" width="70">
                                        </center>
                                        <h4 class="text-denger text-center my-3" style="color: #db2d2e;" id="title_redeem"></h4>
                                        <p class="text-center">โปรดแสดงหน้านี้ <br> กับพนักงานเพื่อรับสิทธิ</p>
                                        <hr>
                                        <div>
                                            <ul class="nav nav-pills mb-3 d-flex w-100 justify-content-center" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-code-tab" data-toggle="pill" href="#pills-code" role="tab" aria-controls="pills-code" aria-selected="true">Code</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-qr_code-tab" data-toggle="pill" href="#pills-qr_code" role="tab" aria-controls="pills-qr_code" aria-selected="false">Qr-Code</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-barcode-tab" data-toggle="pill" href="#pills-barcode" role="tab" aria-controls="pills-barcode" aria-selected="false">Barcode</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active text-center" id="pills-code" role="tabpanel" aria-labelledby="pills-code-tab">
                                                    <p id="privilege_code" class="m-0 w-100"></p>
                                                    <a class="btn-copy-code" onclick="copyCode()"><i class="fa-solid fa-copy"></i></a>

                                                </div>

                                                <div class="tab-pane fade text-center" id="pills-qr_code" role="tabpanel" aria-labelledby="pills-qr_code-tab">
                                                    <p id="privilege_qr_code"></p>
                                                    <qr-code id="qr_code_redeem" module-color="#b42424" position-ring-color="#8e1d1d" position-center-color="#db2d2e" mask-x-to-y-ratio="1.2" style="
                                                        width: 200px;
                                                        height: 200px;
                                                        margin:auto;
                                                        background-color: #fff;
                                                    ">
                                                        <img src="{{url('img/logo/logo_x-icon.png')}}" width="40" height="40" slot="icon" />
                                                    </qr-code>
                                                </div>
                                                <div class="tab-pane fade text-center" id="pills-barcode" role="tabpanel" aria-labelledby="pills-barcode-tab">
                                                    <p id="privilege_barcode"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="{{ url('/privilege') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/privilege/' . $privilege->id . '/edit') }}" title="Edit Privilege"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('privilege' . '/' . $privilege->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Privilege" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $privilege->id }}</td>
                                    </tr>
                                    <tr><th> Partner Id </th><td> {{ $privilege->partner_id }} </td></tr><tr><th> Titel </th><td> {{ $privilege->titel }} </td></tr><tr><th> Detail </th><td> {{ $privilege->detail }} </td></tr>
                                </tbody>
                            </table>
                        </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_sorry_redeem" tabindex="-1" role="dialog" aria-labelledby="modal_sorry_redeem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
            <div class="modal-body text-center">
                <img id="img_logo_partner_sorry" src="" alt="" width="50"> <br>
                <img src="{{url('img/stickerline/PNG/5.png')}}" alt="" width="150" class="mt-4">
                <hr>
                <h3 class="text-danger"><b>ขออภัย</b></h3>
                <p id="text_redeem_sorry" class="text-denger"></p>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>
<div id="copied-success" class="copied">
    <span>คัดลอกเรียบร้อย</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://unpkg.com/@bitjson/qr-code@1.0.2/dist/qr-code.js"></script>
<script>
    function getcodeRedeem() {
        fetch("{{ url('/') }}/api/get_code_redeem?privilege_id=" + '{{$privilege->id}}' + "&user_id=" + '{{ Auth::user()->id }}')
            .then(response => response.json())
            .then(result => {

                console.log(result);

                const currentDate = new Date();
                const expireDate = new Date(result.expire_privilege);

                if(result.redeem_type == 'member'){
                    document.querySelector('#img_logo_partner_sorry').src = '{{ url("/storage") }}' + '/' + result.logo
                    document.querySelector('#text_redeem_sorry').innerText = 'เยี่ยม';
                    $('#modal_sorry_redeem').modal('show')
                }
                else if (!result.redeem_code) {
                    document.querySelector('#img_logo_partner_sorry').src = '{{ url("/storage") }}' + '/' + result.logo
                    document.querySelector('#text_redeem_sorry').innerText = 'โปรโมชั่นนี้มีผู้ใช้สิทธิเต็มแล้ว';
                    $('#modal_sorry_redeem').modal('show')
                }
                else if (currentDate > expireDate) {
                    console.log(result.expire_privilege);

                    document.querySelector('#img_logo_partner_sorry').src = '{{ url("/storage") }}' + '/' + result.logo
                    document.querySelector('#text_redeem_sorry').innerText = 'โปรโมชั่นนี้หมดอายุแล้ว';
                    $('#modal_sorry_redeem').modal('show')
                }
                else if (result.status == 'pending') {
                    document.querySelector('#img_logo_partner_redeem').src = '{{ url("/storage") }}' + '/' + result.logo;
                    document.querySelector('#title_redeem').innerHTML = result.titel;
                    document.querySelector('#privilege_code').innerHTML = result.redeem_code;
                    document.querySelector('#pills-barcode').innerHTML = '';

                    //barcode
                    const barcodeCanvas = generateBarcode(result.redeem_code, {
                        format: "CODE128",
                        width: 1,
                        height: 60,
                        displayValue: false
                    });

                    let pills_bar_code = document.querySelector('#pills-barcode');
                    pills_bar_code.appendChild(barcodeCanvas);

                    //qr code
                    const qrCode = document.getElementById('qr_code_redeem');
                    qrCode.setAttribute('contents', result.redeem_code);

                    $('#redeem_code').modal('show')

                }
                else if (result.status == 'success') {
                    console.log(result.expire_privilege);

                    document.querySelector('#img_logo_partner_sorry').src = '{{ url("/storage") }}' + '/' + result.logo
                    document.querySelector('#text_redeem_sorry').innerText = 'คุณรับสิทธิแล้ว';
                    $('#modal_sorry_redeem').modal('show')
                }



            });


    }

    function generateBarcode(text, options) {
        const canvas = document.createElement('canvas');
        JsBarcode(canvas, text, options);
        return canvas;
    }
</script>
<script>
    let copySuccess = document.getElementById("copied-success");

    function copyCode() {
        const privilegeCode = document.getElementById('privilege_code').textContent;

        if (navigator.clipboard) {
            navigator.clipboard.writeText(privilegeCode).then(() => {
                copySuccess.style.opacity = "1";
                setTimeout(function() {
                    copySuccess.style.opacity = "0"
                }, 500);
            }).catch(err => {
                console.error('Could not copy text: ', err);
            });
        } else {
            // Fallback to execCommand('copy') for older browsers
            const tempTextArea = document.createElement('textarea');
            tempTextArea.value = privilegeCode;
            document.body.appendChild(tempTextArea);
            tempTextArea.select();
            tempTextArea.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');
            document.body.removeChild(tempTextArea);
            copySuccess.style.opacity = "1";
            setTimeout(function() {
                copySuccess.style.opacity = "0"
            }, 500);
        }
    }
</script>

@endsection