@extends('layouts.viicheck')

@section('content')

    <div class="card border-top border-0 border-4 border-primary notranslate" style="margin-top:100px;">
        <div class="card-body p-5">
            <div class="card-title">
                <center>
                    {{-- <p class="mb-0 text-dark">
                        ชื่อกลุ่มไลน์ : {{ $data_group_line->groupName }}
                    </p> --}}
                    <br>
                    <h5 class="mb-0 text-primary">
                        <b>QR Code ลงทะเบียนเจ้าหน้าที่</b>
                    </h5>
                </center>
            </div>
            <hr>
            <div class="row g-3">
                <div class="col-md-6 ">
                    <div id="content_qr_code" class="">
                        <center>
                            <img id="img_qr_code" width="250px" style="border:2px #000 solid; border-radius:10px;" src="{{ asset('img/logo/logo_x-icon_2.png') }}">
                            <br><br>
                            <a id="img_qr_code_download" href="" download="qr_code.png">
                                <span class="btn btn-success"><i class="fa-solid fa-download"></i> ดาวน์โหลด QR-CODE</span>
                            </a>
                            <br>
                            <br>
                            {{-- <div class="input-group">
                                <input type="text" class="form-control" name="copy_link_add_officer" id="copy_link_add_officer" value="{{ url('/add_new_officers' . '/' .  $data_1669_operating_unit->id  ) }}" >
                                <!-- <span class="input-group-text"></span> -->
                                <span class="input-group-text btn" onclick="CopyToClipboard('copy_link_add_officer')">Copy</span>
                            </div> --}}
                            <div class="mt-3 d-none">
                                <button id="share-line-btn" onclick="shareOnLine();">Share on Line</button>
                                <button id="share-fb-btn" onclick="shareOnFacebook();">Share on Facebook</button>
                            </div>
                        </center>
                        <script>

                            function shareOnFacebook() {
                                let shareUrl = document.getElementById("copy_link_add_officer").value;
                                let fbUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(shareUrl);
                                window.open(fbUrl);
                            }

                            function shareOnLine() {
                                let shareUrl = document.getElementById("copy_link_add_officer").value;
                                let lineUrl = "https://line.me/R/msg/text/" + encodeURIComponent(shareUrl);
                                window.open(lineUrl);
                            }


                        </script>
                      </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            download_qr_code();
        });

        function download_qr_code() {
            const imgElement = document.querySelector('#img_qr_code');
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            // ตั้งค่าขนาดของ canvas ให้เท่ากับรูปภาพ
            canvas.width = imgElement.naturalWidth;
            canvas.height = imgElement.naturalHeight;

            ctx.drawImage(imgElement, 0, 0);
            const dataURL = canvas.toDataURL('image/png');

            const downloadLink = document.querySelector('#img_qr_code_download');
            downloadLink.setAttribute('href', dataURL);

            downloadLink.click();
        }
    </script>
@endsection
