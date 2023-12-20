<link href="{{ asset('css/video_call_4/before_video_call_4.css') }}" rel="stylesheet">
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<style>

    .col-sm-12.col-md-8.col-lg-8.bg-secondary {
        flex: 0 0 calc(66.666% - 10px); /* 66.666% is 2/3 of the row width */
        margin-right: 10px; /* Adjust this value as needed for spacing */
    }

    .col-sm-12.col-md-4.col-lg-4.bg-secondary {
        flex: 0 0 calc(33.333% - 10px); /* 33.333% is 1/3 of the row width */
    }

    @media screen and (min-width: 1024px) /* โหมดคอมพิวเตอร์ */
    {
        .text_for_device{
            font-size: 1em;
        }
        .toggleCameraButton{
            border-radius: 50%;
            width: 60px !important;
            height: 60px !important;
            border: 1px solid rgb(4, 80, 20);
            background-color: rgba(68, 230, 116, 0.6);
            color: #ffffff;
        }
        .toggleMicrophoneButton{
            border-radius: 50%;
            width: 60px !important;
            height: 60px !important;
            border: 1px solid rgb(4, 80, 20);
            background-color: rgba(68, 230, 116, 0.6);
            color: #ffffff;
        }

        .toggleCameraButton i{
           font-size: 25px;
        }
        .toggleMicrophoneButton i{
            font-size: 25px;
        }

        .avatar {
            display: inline-block;
            border-radius: 50%;
            overflow: hidden;
            width: 50px; /* ลดขนาดลง 1 เท่า */
            height: 50px;
        }

        .avatar:not(:first-child) {
            margin-left: -30px; /* ลดขนาด margin ลง 1 เท่า */
            -webkit-mask: radial-gradient(circle 27.5px at 2.5px 50%, transparent 99%, #fff 100%); /* ลดขนาด radial-gradient ลง 1 เท่า */
            mask: radial-gradient(circle 27.5px at 2.5px 50%, transparent 99%, #fff 100%); /* ลดขนาด radial-gradient ลง 1 เท่า */
        }

        .avatar img {
            width: 100%; /* ขนาดเต็มของพื้นที่ */
            height: 100%;
            object-fit: cover; /* แสดงภาพโดยคงสัดส่วนและไม่ตัดขอบ */
        }
    }

    @media screen and (max-width: 1024px) /* โหมดมือถือ */
    {
        .text_for_device{
            font-size: 2em;
        }
        .toggleCameraButton{
            border-radius: 50%;
            width: 120px !important;
            height: 120px !important;
            border: 1px solid rgb(4, 80, 20);
            background-color: rgba(68, 230, 116, 0.6);
            color: #ffffff;
        }
        .toggleMicrophoneButton{
            border-radius: 50%;
            width: 120px !important;
            height: 120px !important;
            border: 1px solid rgb(4, 80, 20);
            background-color: rgba(68, 230, 116, 0.6);
            color: #ffffff;
        }

        .toggleCameraButton i{
           font-size: 50px;
        }
        .toggleMicrophoneButton i{
            font-size: 50px;
        }

        .avatar {
            display: inline-block;
            border-radius: 50%; /* ให้ครึ่งขนาดของ width */
            overflow: hidden;
            width: 75px; /* กำหนด width เป็น 75px */
            height: 75px; /* กำหนด width เป็น 75px */
        }

        .avatar:not(:first-child) {
            margin-left: -37.5px; /* ให้ครึ่งขนาดของ width */
            -webkit-mask: radial-gradient(circle 33.75px at 3.75px 50%, transparent 99%, #fff 100%); /* ให้ครึ่งขนาดของ width */
            mask: radial-gradient(circle 33.75px at 3.75px 50%, transparent 99%, #fff 100%); /* ให้ครึ่งขนาดของ width */
        }


        .avatar img {
            width: 100%; /* ขนาดเต็มของพื้นที่ */
            height: 100%;
            object-fit: cover; /* แสดงภาพโดยคงสัดส่วนและไม่ตัดขอบ */
        }

    }


    .toggleCameraButton.active,
    .toggleMicrophoneButton.active {
        border: 1px solid rgb(185, 7, 7);
        background-color: rgb(226, 73, 73); /* เปลี่ยนสีเป็นแดงเมื่อถูกกด */
    }

    .container-before-video-call{
        width: 100%;
        height: 100%;
    }
    .nav-bar-video-call{
        padding: 1rem;
    }
    .nav-bar-video-call img{
        max-width: 180px;
    }
    .main-content-video-call{
        width: 100%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
    }.video_preview{
        min-height: 20vh;
        height: 100%;
        max-height: 40vh;
        width: 100%;
        object-fit: cover;
        border-radius: 15px;
        background-color: #000000;
    }.btn-join-room{
        border-radius: 50px;
        font-weight: bold;
    }
    .selectDivice select{
        width:40%;
        padding: 5px 10px;
        border-radius: 50px;
        margin-right: 5px;
        transition: all .15s ease-in-out;

    }

    .div-video{
        position: relative;
        display: flex;
        justify-content: center;
        width: calc(100% - 10%);
    }
    .div-video .soundTest{
        position: absolute;
        top: 5%;
        left: 5%;
        transform: translate(-5%, -5%);
    }
    .div-video .user-img{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }.div-video .user-img img{
        width: clamp(150px, 2vw, 250px);
        height: clamp(150px, 2vw, 250px);
        border-radius: 50%;
    }

    .buttonDiv{
        position: absolute;
        bottom: 15px;
    }

    /*==============  เสียง ลำโพลง CSS ==================*/
    .soundTest {
        width: 100px;
        height: 15px;
        border: 1px solid #525252;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    .soundMeter {
        width: 0;
        height: 100%;
        background-color: rgb(92, 228, 99);
        transition: width 0.1s ease-in-out;
    }


    @keyframes soundAnimation {
        0% {
            transform: scaleX(0);
            opacity: 0;
        }
        100% {
            transform: scaleX(1);
            opacity: 0;
        }
    }

    .font-weight-bold{
        font-weight: bold !important;
    }

</style>

<div class="container-before-video-call">
    <div class="nav-bar-video-call">
        <img src="{{ asset('/img/logo/logo-viicheck-outline.png') }}" alt="">
        <div id="myAlert" class="alert alert-warning alert-dismissible fade" role="alert" style="display: none;">
            <strong>จำนวนคนในห้องสูงสุดแล้ว
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="main-content-video-call">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8 p-2">
                @if ($type_brand == "pc")
                    <div class="div-video">
                        <video id="videoDiv" style="background-color: #000000;" class="video_preview" autoplay playsinline></video>
                        <div id="soundTest" class="soundTest">
                            <div class="soundMeter"></div>
                        </div>
                        <div class="buttonDiv d-none">
                            <button id="toggleCameraButton" class="toggleCameraButton mr-3 btn"></button>
                            <button id="toggleMicrophoneButton" class="toggleMicrophoneButton btn"></button>
                        </div>
                    </div>
                @else
                    <div class="div-video m-5">
                        <video id="videoDiv" style="background-color: #000000;" class="video_preview" autoplay playsinline></video>
                        <div id="soundTest" class="soundTest">
                            <div class="soundMeter"></div>
                        </div>
                        <div class="buttonDiv d-none">
                            <button id="toggleCameraButton" class="toggleCameraButton mr-3 btn"></button>
                            <button id="toggleMicrophoneButton" class="toggleMicrophoneButton btn"></button>
                        </div>
                    </div>
                @endif


                <div class=" d-nne">
                    @if ($type_brand == "pc")
                        <div class="selectDivice mt-2 p-2 row">
                            <select id="microphoneList"></select>
                            <select id="cameraList"></select>
                            {{-- <select id="speakerList"></select> --}}
                            {{-- <label>
                                <div id="audioElement" controls>
                                    <button id="audioElement_btn" class="btn">
                                        <i class="fa-regular fa-circle-play font-30"></i>
                                    </button>
                                </div>
                            </label> --}}
                        </div>
                    @else
                        <div class="selectDivice mt-2 p-2 row d-none">
                            <select id="microphoneList"></select>
                            <select id="cameraList"></select>
                            {{-- <select id="speakerList"></select> --}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4  d-flex justify-content-center p-3 align-items-center">
                <div id="before_join_message" class="text-center w-100">
                    @if ($type_brand == "pc")
                        @if($type == "sos_1669")
                            @php
                                $data_sos_1669 = App\Models\Sos_help_center::where('id' , $sos_id)->first();
                            @endphp
                            <h4 class="w-100">ห้องสนทนา : {{ $data_sos_1669->operating_code }}</h4>
                        @else
                            <h4 class="w-100">ห้องสนทนา : {{$sos_id ? $sos_id : "--"}}</h4>
                        @endif
                        <div id="avatars" class="avatars">
                            {{-- <span class="avatar">
                                <img src="https://picsum.photos/70">
                            </span>
                            <span class="avatar">
                                <img src="https://picsum.photos/80">
                            </span>
                            <span class="avatar">
                                <img src="https://picsum.photos/90">
                            </span> --}}
                        </div>
                        <div id="text_user_in_room" class="mt-2">
                            <!-- สำหรับใส่ text ที่บอกคนในห้อง-->
                        </div>

                        <a id="btnJoinRoom" class="btn btn-success d-none" href="{{ url('/'. $type_device .'/'. $type . '/' . $sos_id ) }}?videoTrack=open&audioTrack=open&appId={{$appId}}&appCertificate={{$appCertificate}}&consult_doctor_id={{$consult_doctor_id}}&useMicrophone=&useCamera=&useSpeaker=">
                            เข้าร่วมห้องสนทนา
                        </a>
                        <a id="full_room" class="btn btn-secondary d-none" onclick="AlertPeopleInRoom()">ห้องนี้ถึงจำนวนผู้ใช้สูงสุดแล้ว</a>
                    @else
                        @if($type == "sos_1669")
                            @php
                                $data_sos_1669 = App\Models\Sos_help_center::where('id' , $sos_id)->first();
                            @endphp
                            <h1 class="w-100 font-weight-bold">ห้องสนทนา : {{ $data_sos_1669->operating_code }}</h1>
                        @else
                            <h1 class="w-100 font-weight-bold">ห้องสนทนา : {{$sos_id ? $sos_id : "--"}}</h1>
                        @endif
                        <div id="avatars" class="avatars">
                            {{-- <span class="avatar">
                                <img src="https://picsum.photos/70">
                            </span>
                            <span class="avatar">
                                <img src="https://picsum.photos/80">
                            </span>
                            <span class="avatar">
                                <img src="https://picsum.photos/90">
                            </span> --}}
                        </div>
                        <div id="text_user_in_room" class="mt-2">
                            <!-- สำหรับใส่ text ที่บอกคนในห้อง-->
                        </div>

                        <a style="font-size: 40px; border-radius: 10px;" id="btnJoinRoom" class="btn btn-success d-none" href="{{ url('/'. $type_device .'/'. $type . '/' . $sos_id ) }}?videoTrack=open&audioTrack=open&appId={{$appId}}&appCertificate={{$appCertificate}}&consult_doctor_id={{$consult_doctor_id}}&useMicrophone=&useCamera=&useSpeaker=">
                            เข้าร่วมห้องสนทนา
                        </a>
                        <a style="font-size: 40px; border-radius: 10px;" id="full_room" class="btn btn-secondary d-none" onclick="AlertPeopleInRoom()">ห้องนี้ถึงจำนวนผู้ใช้สูงสุดแล้ว</a>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('js/for_video_call_4/before_video_call_4.js') }}"></script> --}}

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<!-- <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script>
    var statusCamera = "open";
    var statusMicrophone = "open";
    var useMicrophone = '';
    var useSpeaker = '';
    var useCamera = '';

    var audioTracks = ''; // สำหรับเก็บ tag เสียงแบบ global

    // var appId = localStorage.getItem('appId');
    // var appCertificate = localStorage.getItem('appCertificate');

    var appId = '{{ env("AGORA_APP_ID") }}';
    var appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';

    var sos_id = '{{ $sos_id }}';
    var type_sos = '{{ $type }}';
    var consult_doctor_id = '{{ $consult_doctor_id }}';

    var selectedMicrophone = null;
    var selectedCamera = null;
    var selectedSpeaker = null;
    var microphoneStream = null;
    var cameraStream = null;
    var speakerStream = null;
</script>

<script>

    document.addEventListener("DOMContentLoaded", async () => {
        // เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลด
        function retrieveAgoraKeys() {
            let agoraAppId = appId;
            let agoraAppCertificate = appCertificate;
            // ตรวจสอบว่าคีย์และรหัสลับมีค่าความยาวมากกว่า 0 หรือไม่
            if (!agoraAppId || !agoraAppCertificate) {
                agoraAppId = '{{ env("AGORA_APP_ID") }}';
                agoraAppCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
                // ตรวจสอบอีกครั้งหลังจากกำหนดค่าจาก environment variables
                if (!agoraAppId || !agoraAppCertificate) {
                    alert("โหลดข้อมูล video_call ล้มเหลว กำลังรีเฟรชหน้าจอ");
                    // Reload the page
                    window.location.reload();
                }
            }

            return { agoraAppId, agoraAppCertificate };
        }

        // สลับตำแหน่ง agoraAppId และ agoraAppCertificate
        function swapValues(keys) {
            const { agoraAppId, agoraAppCertificate } = keys;
            return {
                agoraAppId: agoraAppId.split('').reverse().join(''),
                agoraAppCertificate: agoraAppCertificate.split('').reverse().join('')
            };
        }

        // สร้างฟังก์ชันสำหรับบันทึกคีย์และรหัสลับลงใน sessionStorage
        function saveAgoraKeys() {
            const keys = retrieveAgoraKeys();
            // สลับตำแหน่ง agoraAppId และ agoraAppCertificate
            const swappedKeys = swapValues(keys);
            sessionStorage.setItem('a', swappedKeys.agoraAppId);
            sessionStorage.setItem('b', swappedKeys.agoraAppCertificate);
        }

        saveAgoraKeys();

        // ============   เช็คคนในห้องสนทนาก่อนเข้าร่วม   ================
        Check_video_call_room();
        // ============  จบส่วน เช็คคนในห้องสนทนาก่อนเข้าร่วม   ================


        const microphoneList = document.getElementById("microphoneList");
        const cameraList = document.getElementById("cameraList");

        startMicrophone();

        // เรียกฟังก์ชันเพื่อรับรายการอุปกรณ์
        await getDeviceList();

        // รับรายการอุปกรณ์และแสดงใน dropdown
        async function getDeviceList() {
            try {
                const devices = await navigator.mediaDevices.enumerateDevices();
                devices.forEach((device) => {
                    const option = document.createElement("option");
                    option.value = device.deviceId;
                    // option.text = device.label || `อุปกรณ์ ${device.deviceId}`;

                    if (device.kind === "audioinput") {
                            let labelText = document.createTextNode(`🎙️ ${device.label || `อุปกรณ์ ${device.deviceId}`}`);
                            option.appendChild(labelText);

                            microphoneList.appendChild(option);

                    } else if (device.kind === "videoinput") {

                            let labelText = document.createTextNode(`📷 ${device.label || `อุปกรณ์ ${device.deviceId}`}`);
                            option.appendChild(labelText);

                            cameraList.appendChild(option);
                    }
                    // else if (device.kind === "audiooutput") {
                    //     speakerList.appendChild(option);
                    // }
                });

                // เมื่อเลือกไมโครโฟนใน dropdown
                microphoneList.addEventListener("change", () => {
                    selectedMicrophone = devices.find((device) => device.deviceId === microphoneList.value);
                    console.log(selectedMicrophone);

                    updateMicrophone(selectedMicrophone); // เรียกใช้ฟังก์ชันเพื่ออัปเดตไมโครโฟน

                });
                // เมื่อเลือกกล้องใน dropdown
                cameraList.addEventListener("change", () => {
                    selectedCamera = devices.find((device) => device.deviceId === cameraList.value);
                    updateCamera(selectedCamera); // เรียกใช้ฟังก์ชันเพื่ออัปเดตกล้อง
                });
                // เมื่อเลือกลำโพงใน dropdown
                // speakerList.addEventListener("change", () => {
                //     selectedSpeaker = devices.find((device) => device.deviceId === speakerList.value);
                //     console.log(selectedSpeaker);
                //     updateSpeaker(selectedSpeaker); // เรียกใช้ฟังก์ชันเพื่ออัปเดตลำโพง
                // });

            } catch (error) {
                console.error("เกิดข้อผิดพลาดในการรับรายการอุปกรณ์:", error);
            }
        }

        function updateCamera(selectedCamera) {
            if(selectedCamera){
                useCamera = selectedCamera.deviceId;
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }else{
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }

            let videoElement = document.getElementById('videoDiv');
            let selectedDeviceId = cameraList.value; // รับค่า ID ของอุปกรณ์ที่เลือกใน dropdown
            let constraints = { video: { deviceId: selectedDeviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก

            navigator.mediaDevices.getUserMedia(constraints)
            .then(function(videoStream) {
                if(statusCamera == "open"){
                    videoElement.srcObject = videoStream; // กำหนดกล้องใหม่ให้แสดงบนอิลิเมนต์ video
                    // localStorage.setItem('selectedCameraId', selectedDeviceId); // บันทึกอุปกรณ์ที่เลือกลงใน localStorage
                }else{
                    videoElement.srcObject = videoStream; // กำหนดกล้องใหม่ให้แสดงบนอิลิเมนต์ video

                    let videoTracks = videoElement.srcObject.getVideoTracks();
                    videoTracks[0].stop();

                    // statusCamera = "open";
                    // document.querySelector('#toggleCameraButton').classList.add('active');
                    // document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera-slash"></i>'

                    // localStorage.setItem('selectedCameraId', selectedDeviceId); // บันทึกอุปกรณ์ที่เลือกลงใน localStorage
                }
            })
            .catch(function(error) {
                console.error('เกิดข้อผิดพลาดในการอัปเดตกล้อง:', error);
            });
        }

        // อัปเดตไมโครโฟนที่ใช้งาน
        function updateMicrophone(selectedMicrophone) {
            console.log("เข้า updateMicrophone");
            if(selectedMicrophone){
                useMicrophone = selectedMicrophone.deviceId;
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }else{
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }
            console.log("เข้า updateMicrophone");

            // ใช้ getMediaUser() เพื่อกำหนดไมโครโฟนที่ถูกเลือก
            navigator.mediaDevices.getUserMedia({ audio: { deviceId: selectedMicrophone.deviceId } })
                .then(function (stream) {
                    // ตั้งค่าการใช้งานไมโครโฟนใน element audio
                    audioTracks = stream;
                    console.log('ไมโครโฟนถูกอัปเดตเป็น: ' + selectedMicrophone.label);

                })
                .catch(function (error) {
                    console.error('เกิดข้อผิดพลาดในการอัปเดตไมโครโฟน:', error);
                });

                if(statusMicrophone == "open"){
                    startMicrophone(selectedMicrophone);
                }

        }

        // อัปเดตลำโพงที่ใช้งาน
        function updateSpeaker(selectedSpeaker) {
            if(selectedSpeaker){
                useSpeaker = selectedSpeaker.deviceId;
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }else{
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);
            }
            console.log(useSpeaker);

            let audioElement = document.createElement('audio');
                audioElement.id = 'audioElement';

            audioElement.setSinkId(selectedSpeaker.deviceId)
                .then(function () {
                    console.log('ลำโพงถูกอัปเดตเป็น: ' + selectedSpeaker.label);
                })
                .catch(function (error) {
                    console.error('เกิดข้อผิดพลาดในการอัปเดตลำโพง:', error);
                });
        }


    });

    // function checkSelectedDevices() {
    //     const selectedCameraId = localStorage.getItem('selectedCameraId');
    //     const selectedMicrophoneId = localStorage.getItem('selectedMicrophoneId');
    //     const selectedSpeakerId = localStorage.getItem('selectedSpeakerId');

    //     if (selectedCameraId) {
    //         // ถ้ามีการเลือกกล้องใน storage ให้กำหนดค่าให้กับ dropdown ของกล้อง
    //         cameraList.value = selectedCameraId;
    //         // และเรียกใช้ฟังก์ชัน updateCamera เพื่อแสดงกล้อง
    //         updateCamera();
    //     }

    //     if (selectedMicrophoneId) {
    //         // ถ้ามีการเลือกไมโครโฟนใน storage ให้กำหนดค่าให้กับ dropdown ของไมโครโฟน
    //         microphoneList.value = selectedMicrophoneId;
    //         // และเรียกใช้ฟังก์ชัน updateMicrophone เพื่อแสดงไมโครโฟน
    //         updateMicrophone();
    //     }

    //     // if (selectedSpeakerId) {
    //     //     // ถ้ามีการเลือกลำโพงใน storage ให้กำหนดค่าให้กับ dropdown ของลำโพง
    //     //     speakerList.value = selectedSpeakerId;
    //     //     // และเรียกใช้ฟังก์ชัน updateSpeaker เพื่อแสดงลำโพง
    //     //     updateSpeaker();
    //     // }
    // }

    // // เมื่อหน้าเว็บโหลดเสร็จให้เรียกใช้ฟังก์ชัน checkSelectedDevices
    // window.addEventListener('load', checkSelectedDevices);

    // เมื่อเลือกอุปกรณ์ใน dropdown ให้บันทึกค่าลงใน localStorage
    cameraList.addEventListener('change', () => {
        localStorage.setItem('selectedCameraId', cameraList.value);
        // alert(cameraList.value)
    });

    microphoneList.addEventListener('change', () => {
        localStorage.setItem('selectedMicrophoneId', microphoneList.value);
    });

    // speakerList.addEventListener('change', () => {
    //     localStorage.setItem('selectedSpeakerId', speakerList.value);
    // });


    //=============================================================================================

</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        var CameraRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานกล้อง
        var MicrophoneRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานไมค์videoDiv

        //======================
        // เปิดกล้องตอนโหลดหน้านี้
        //======================

        function openCamera() {

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // รองรับการเข้าถึงกล้อง
                // let constraints = { video: { facingMode: 'user' } }; // เพิ่มออปชัน facingMode เพื่อเลือกกล้องหน้า
                // let constraints = { video: { facingMode: 'environment' } }; // เพิ่มออปชัน facingMode เพื่อเลือกกล้องหน้า
                let selectedDeviceId = cameraList.value; // รับค่า ID ของอุปกรณ์ที่เลือกใน dropdown
                let constraints = { video: { deviceId: selectedDeviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก

                navigator.mediaDevices.getUserMedia(constraints)
                .then(function(videoStream) {
                    // ได้รับสตรีมวิดีโอสำเร็จ
                    document.querySelector('.buttonDiv').classList.remove('d-none');
                    document.querySelector('#toggleCameraButton').innerHTML = '<i class="fa-regular fa-camera"></i>';
                    var videoElement = document.getElementById('videoDiv');
                    videoElement.srcObject = videoStream;

                })
                .catch(function(error) {
                    // ไม่สามารถเข้าถึงกล้องได้ หรือผู้ใช้ไม่อนุญาต
                    console.error('เกิดข้อผิดพลาดในการเข้าถึงกล้อง:', error);
                    CameraRetries++;

                    if(CameraRetries < 7){
                        setTimeout(openCamera, 1000);
                    }

                });
            } else {
                console.log('ไม่สนับสนุนการเข้าถึงกล้องในเบราว์เซอร์นี้');
            }
        }
        openCamera(); //เรียกฟังก์ชันเปิดกล้อง

        //======================
        // เปิดไมค์ตอนโหลดหน้านี้
        //======================

        // เพิ่มส่วนนี้เพื่อเรียกใช้ getUserMedia สำหรับไมโครโฟน
        function openMicrophone() {

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ audio: true })
                .then(function(newAudioStream) {
                    audioStream = newAudioStream;
                    document.querySelector('#toggleMicrophoneButton').innerHTML = '<i class="fa-regular fa-microphone"></i>'

                })
                .catch(function(error) {
                    console.error('เกิดข้อผิดพลาดในการเข้าถึงไมโครโฟน:', error);
                    MicrophoneRetries++;
                    //เรียกฟังก์ชันเปิดไมค์ใหม่ 5 ครั้ง
                    if(MicrophoneRetries < 5) {
                        setTimeout(openMicrophone, 500);
                    }
                });
            }
        }
        openMicrophone(); //เรียกฟังก์ชันเปิดไมค์

        // navigator.mediaDevices.enumerateDevices()
        // .then(function(devices) {
        //     var microphones = devices.filter(function(device) {
        //     return device.kind === 'audioinput';
        //     });
        //     console.log('จำนวนไมโครโฟนที่พบ:', microphones.length);
        //     console.log(microphones);
        // })
        // .catch(function(error) {
        //     console.error('เกิดข้อผิดพลาดในการตรวจสอบอุปกรณ์:', error);
        // });

    });
</script>

<script>
    //======================
    //   เปิด - ปิด กล้อง
    //======================
    let toggleCameraButton = document.getElementById('toggleCameraButton');
        toggleCameraButton.addEventListener('click', toggleCamera);
    function toggleCamera() {
        if (statusCamera == "open") {
            statusCamera = "close"; //เซ็ต statusCamera เป็น close
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            // ตรวจสอบว่ากล้องถูกเปิดหรือไม่

            let selectedDeviceId = cameraList.value; // รับค่า ID ของอุปกรณ์ที่เลือกใน dropdown
            let constraints = { video: { deviceId: selectedDeviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก

            let videoElement = document.getElementById('videoDiv');
            let stramViddeo = videoElement.srcObject;

            let videoTracks = stramViddeo.getVideoTracks();

            videoTracks[0].stop();

            document.querySelector('#toggleCameraButton').classList.add('active');
            document.querySelector('#toggleCameraButton').innerHTML = '<i class="fa-regular fa-camera-slash"></i>'

            // navigator.mediaDevices.getUserMedia(constraints)
            // .then(function(videoStream) {

            //     // ปิดกล้อง
            //     let videoElement = document.getElementById('videoDiv');
            //     let stramViddeo = videoElement.srcObject;

            //     // let videoTracks = stramVideo.getVideoTracks();
            //     //     videoTracks.forEach((track) => {
            //     //         track.stop();
            //     //     });

            //     // ตัดการทำงานกล้องออกจากองค์ประกอบวิดีโอ
            //     // videoElement.srcObject = null;

            //     let videoTracks = stramViddeo.getVideoTracks();
            //     videoTracks[0].stop();

            //     document.querySelector('#toggleCameraButton').classList.add('active');
            //     document.querySelector('#toggleCameraButton').innerHTML = '<i class="fa-regular fa-camera-slash"></i>'
            //     // console.log('ปิดกล้อง');
            // })

        }else{
            statusCamera = "open"; // เซ็ต statusCamera เป็น open
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            // เปิดกล้อง
            let videoElement = document.getElementById('videoDiv');
            let selectedDeviceId = cameraList.value; // รับค่า ID ของอุปกรณ์ที่เลือกใน dropdown
            let constraints = { video: { deviceId: selectedDeviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก

            navigator.mediaDevices.getUserMedia(constraints)
            .then(function(newVideoStream) {
                // ได้รับสตรีมวิดีโอใหม่สำเร็จ
                videoStream = newVideoStream;
                let videoElement = document.getElementById('videoDiv');
                videoElement.srcObject = videoStream;

                document.querySelector('#toggleCameraButton').classList.remove('active');
                document.querySelector('#toggleCameraButton').innerHTML = '<i class="fa-regular fa-camera"></i>'
                // console.log('เปิดกล้อง');

                // console.log(videoStream);
            })
            .catch(function(error) {
                // ไม่สามารถเข้าถึงกล้องได้ หรือผู้ใช้ไม่อนุญาต
                console.error('เกิดข้อผิดพลาดในการเข้าถึงกล้อง:', error);
            });
        }
        setTimeout(() => {
            console.log(statusCamera);


        }, 1000);

    }

</script>

<script>
    //======================
    //   เปิด - ปิด ไมโครโฟน
    //======================
    var toggleMicrophoneButton = document.getElementById('toggleMicrophoneButton');
    toggleMicrophoneButton.addEventListener('click', toggleMicrophone);

    function toggleMicrophone() {
        if (statusMicrophone == 'open') {
            statusMicrophone = "close"; // เซ็ต statusMicrophone เป็น close
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            navigator.mediaDevices.getUserMedia({ audio: true })
            .then(function(audioStream) {

                // ปิดไมค์
                audioTracks = audioStream.getAudioTracks();
                // console.log("audioStream");
                // console.log(audioStream);

                // ปิดทุก audio track ใน audioStream
                for (const track of audioTracks) {
                    track.stop();
                }

                document.querySelector('#toggleMicrophoneButton').classList.add('active');
                document.querySelector('#toggleMicrophoneButton').innerHTML = '<i class="fa-regular fa-microphone-slash"></i>'
                // console.log('ปิดไมค์');

            })

            //ปิดตัวทดสอบเสียง
            stopMicrophone();
        }else{
            statusMicrophone = "open"; // เซ็ต statusMicrophone เป็น open
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            let constraints = selectedMicrophone;
            let audioSelect;
            if(constraints){
                audioSelect = { video: { deviceId: constraints.deviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก
            }else{
                audioSelect = { video: true, }; // เลือกอุปกรณ์ที่ถูกเลือก
            }


            navigator.mediaDevices.getUserMedia(audioSelect)
            .then(function(newAudioStream) {
                audioTracks = newAudioStream;
                document.querySelector('#toggleMicrophoneButton').classList.remove('active');
                document.querySelector('#toggleMicrophoneButton').innerHTML = '<i class="fa-regular fa-microphone"></i>'
                console.log('เปิดสตรีมไมโครโฟน');
                console.log(audioTracks);

            })
            .catch(function(error) {
                console.error('เกิดข้อผิดพลาดในการเข้าถึงไมโครโฟน:', error);
            });

            //ปิดตัวทดสอบเสียง
            startMicrophone(constraints);
        }
        setTimeout(() => {
            console.log(statusMicrophone);
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);


        }, 1000);
    }

</script>

<script>
    const soundTest = document.getElementById("soundTest");
    const soundMeter = document.querySelector('.soundMeter');

    let mediaStream;
    // เริ่มการเข้าถึงไมโครโฟน
    async function startMicrophone(selectedMicrophone) {
        try {
            let constraints;
            if(selectedMicrophone){
                constraints = {
                    audio: { deviceId: selectedMicrophone.deviceId },
                };
            }else{
                constraints = {
                    audio: true, // ใช้อุปกรณ์เสียงปัจจุบันของผู้ใช้
                };
            }

            mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
            let audioContext = new AudioContext();
            let microphone = audioContext.createMediaStreamSource(mediaStream);
            let analyser = audioContext.createAnalyser();
            microphone.connect(analyser);

            // ตั้งค่า AnalyserNode เพื่อวัดความดัง
            analyser.fftSize = 256;
            let bufferLength = analyser.frequencyBinCount;
            let dataArray = new Uint8Array(bufferLength);

            // อัปเดต animation บนหน้าเว็บด้วยค่าความดัง
            function updateAnimation() {
                analyser.getByteFrequencyData(dataArray);
                let averageVolume = dataArray.reduce((a, b) => a + b, 0) / bufferLength;
                updateSoundMeter(averageVolume);
                requestAnimationFrame(updateAnimation);
            }

            updateAnimation();
        } catch (error) {
            console.error('เกิดข้อผิดพลาดในการเริ่มต้นไมโครโฟน:', error);
        }
    }

    // const soundMeter = document.querySelector('.soundMeter');

        // หยุดการเข้าถึงไมโครโฟน
    function stopMicrophone(selectedMicrophone) {
        console.log("เข้า stopMicrophone มาแล้ว");
        if (mediaStream) {
            mediaStream.getTracks().forEach(track => track.stop());
        }
        soundMeter.style.width = '0';
    }

    // หยุดการเข้าถึงไมโครโฟนเมื่อหน้าเว็บปิด
    window.addEventListener('beforeunload', stopMicrophone);

    // Function to update the sound meter animation based on microphone input
    function updateSoundMeter(volume) {
        const maxWidth = soundTest.clientWidth;
        const newWidth = (volume / 100) * maxWidth;
        soundMeter.style.width = `${newWidth}px`;
    }

</script>

{{-- <script>
    // ตรวจสอบอุปกรณ์ที่ใช้งาน
    function checkDeviceType() {
        const userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // ตรวจสอบชนิดของอุปกรณ์
        if (/android/i.test(userAgent)) {
            return "Mobile (Android)";
        }

        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "Mobile (iOS)";
        }

        return "PC";
    }
</script> --}}

<script>
    let beforeJoinMessage = document.getElementById('before_join_message');
    function AlertPeopleInRoom() {
        let type_device = '{{ $type_device }}';

        if (!document.querySelector('.text_warning_fade_out')) {
            // ถ้าไม่มีให้สร้าง element ใหม่
            let aElement = document.createElement('a');
                aElement.textContent = 'ห้องสนทนานี้มีผู้ใช้สูงสุดแล้ว';
            if (type_device == "pc_video_call") {
                aElement.setAttribute('class', 'text-danger text_warning_fade_out d-block');
            } else {
                aElement.setAttribute('class', 'text-danger text_warning_fade_out d-block');
                aElement.setAttribute('style', 'font-size: 35px;');
            }

            beforeJoinMessage.insertAdjacentElement('beforeend', aElement);

            setTimeout(() => {
                aElement.remove(); // ลบ element ที่ถูกสร้างขึ้น
            }, 3000);
        }
    }

    function Check_video_call_room(){

        fetch("{{ url('/') }}/api/check_user_in_room_4" + "?sos_id=" + sos_id + "&type=" + type_sos)
        .then(response => response.json())
        .then(result => {
            if(result['status'] === "ok"){
                // console.log("user_in_room");
                // console.log(result);

                document.querySelector('#btnJoinRoom').classList.remove('d-none');
                document.querySelector('#full_room').classList.add('d-none');

                if (result['data'] != "ไม่มีข้อมูล") {
                    let avatar_div = document.querySelector('#avatars');
                    avatar_div.innerHTML = '';
                    result['data'].forEach(element => {
                        let profile_user;
                        if (element.photo) {
                            profile_user = "{{ url('/storage') }}" + "/" + element.photo;
                        } else if (!element.photo && element.avatar) {
                            profile_user = element.avatar;
                        } else {
                            profile_user = "https://www.viicheck.com/Medilab/img/icon.png";
                        }

                        let html = `<span class="avatar">
                                        <img src="` + profile_user + `">
                                    </span>`;

                        avatar_div.insertAdjacentHTML('beforeend', html);
                    });

                    let html_2;
                    if (result['data'].length > 1) {
                        html_2 = `<h6 class="w-100 text_for_device">${result['data'][0].name} และอีก ${result['data'].length - 1} คนในห้องสนทนา</h6>`;
                    } else if (result['data'].length === 1) {
                        html_2 = `<h6 class="w-100 text_for_device">${result['data'][0].name} อยู่ในห้องสนทนา</h6>`;
                    } else {
                        // Handle the case where there are no users
                        html_2 = `<h6 class="w-100 text_for_device">ไม่มีคนอยู่ในห้องสนทนา</h6>`;
                    }

                    let text_user_in_room = document.querySelector('#text_user_in_room');
                    text_user_in_room.innerHTML = '';
                    // Handle the case where there are no users
                    text_user_in_room.insertAdjacentHTML('beforeend', html_2);

                }else{
                    let avatar_div = document.querySelector('#avatars');
                    avatar_div.innerHTML = '';

                    let text_user_in_room = document.querySelector('#text_user_in_room');
                    text_user_in_room.innerHTML = '';
                    // Handle the case where there are no users
                    let html_2 = `<h6 class="w-100 text_for_device">ไม่มีคนอยู่ในห้องสนทนา</h6>`;
                    text_user_in_room.insertAdjacentHTML('beforeend', html_2);
                }

            }else{
                document.querySelector('#btnJoinRoom').classList.add('d-none');
                document.querySelector('#full_room').classList.remove('d-none');

                if (result['data'] != "ไม่มีข้อมูล") {
                    let avatar_div = document.querySelector('#avatars');
                    avatar_div.innerHTML = '';
                    result['data'].forEach(element => {
                        let profile_user;
                        if (element.photo) {
                            profile_user = "{{ url('/storage') }}" + "/" + element.photo;
                        } else if (!element.photo && element.avatar) {
                            profile_user = element.avatar;
                        } else {
                            profile_user = "https://www.viicheck.com/Medilab/img/icon.png";
                        }

                        let html = `<span class="avatar">
                                        <img src="` + profile_user + `">
                                    </span>`;

                        avatar_div.insertAdjacentHTML('beforeend', html);
                    });

                    let html_2;
                    if (result['data'].length > 1) {
                        html_2 = `<span class="w-100 text_for_device">${result['data'][0].name} และอีก ${result['data'].length - 1} คนในห้องสนทนา</span>`;
                    } else if (result['data'].length === 1) {
                        html_2 = `<span class="w-100 text_for_device">${result['data'][0].name} อยู่ในห้องสนทนา</span>`;
                    } else {
                        // Handle the case where there are no users
                        html_2 = `<span class="w-100 text_for_device">ไม่มีคนอยู่ในห้องสนทนา</span>`;
                    }

                    let text_user_in_room = document.querySelector('#text_user_in_room');
                    text_user_in_room.innerHTML = '';
                    // Handle the case where there are no users
                    text_user_in_room.insertAdjacentHTML('beforeend', html_2);

                }else{
                    let avatar_div = document.querySelector('#avatars');
                    avatar_div.innerHTML = '';

                    let text_user_in_room = document.querySelector('#text_user_in_room');
                    text_user_in_room.innerHTML = '';
                    // Handle the case where there are no users
                    let html_2 = `<span class="w-100 text_for_device">ไม่มีคนอยู่ในห้องสนทนา</span>`;
                    text_user_in_room.insertAdjacentHTML('beforeend', html_2);
                }


                // if (document.querySelector('#btnJoinRoom')) {
                //     document.querySelector('#btnJoinRoom').remove();
                // }

                // if(!document.querySelector('#full_room')){
                //     document.querySelector('#full_room').innerHTML = '<a id="full_room" class="btn btn-secondary" onclick="AlertPeopleInRoom()">ห้องนี้ถึงจำนวนผู้ใช้สูงสุดแล้ว</a>';
                // }
            }

        });
    }

    window.addEventListener('load', () => {
        // เรียกฟังก์ชัน check_status_sos() ทุก 10 วินาที
        setInterval(() => {
            Check_video_call_room();
        }, 5000);
    });

</script>






