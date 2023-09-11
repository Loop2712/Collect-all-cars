@extends('layouts.partners.theme_partner_new')

<link href="{{ asset('css/video_call_4/before_video_call_4.css') }}" rel="stylesheet">

<style>
    .video_preview{
        min-height: 20vh;
        height: 100%;
        max-height: 50vh;
        width: 100%;
        object-fit: cover;
    }

    .row {
        display: flex;
        flex-wrap: nowrap;
    }

    .col-sm-12.col-md-8.col-lg-8.bg-secondary {
        flex: 0 0 calc(66.666% - 10px); /* 66.666% is 2/3 of the row width */
        margin-right: 10px; /* Adjust this value as needed for spacing */
    }

    .col-sm-12.col-md-4.col-lg-4.bg-secondary {
        flex: 0 0 calc(33.333% - 10px); /* 33.333% is 1/3 of the row width */
    }

    .buttonDiv {
        position: absolute;
        left: 40%; /* ตั้งค่า left เป็น 0 เพื่อให้อยู่ที่ด้านซ้ายของ parent */
        bottom: 1rem;
    }

    .toggleCameraButton{
        border-radius: 50%;
        width: 60px !important;
        height: 60px !important;
        border: 1px solid black;
        background-color: rgba(0,0,0,0.6);
        color: #ffffff;
    }
    .toggleMicrophoneButton{
        border-radius: 50%;
        width: 60px !important;
        height: 60px !important;
        border: 1px solid black;
        background-color: rgba(0,0,0,0.6);
        color: #ffffff;
    }


</style>

@section('content')

<!-- เปลี่ยนคลาสของ .video-container เพื่อแสดงตามจำนวนคนที่คุณมี -->
<div id="container" class="container ">
    <div class="col-12 bg-secondary p-2 d-flex justify-content-center">
        <span class="font-30 font-weight-bold align-middle ">ห้องสนทนาของ {{$user->name}}</span>
    </div>
    <div class="row mt-2 p-2 d-flex justify-content-center">
        <div class="row mt-2 p-2">
            <div class="col-sm-12 col-md-8 col-lg-8 ">
                <video id="videoDiv" class="video_preview" autoplay></video>
                {{-- <div id="video_preview" class="bg-secondary video_preview"></div> --}}
                <div class="buttonDiv ">
                    <button id="toggleCameraButton" class="toggleCameraButton mr-3"></button>
                    <button id="toggleMicrophoneButton" class="toggleMicrophoneButton"></button>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 ">
                <a id="btnJoinRoom" href="{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack=open&audioTrack=open&appId={{$appId}}&appCertificate={{$appCertificate}}&sos_id={{$sos_id}}&consult_doctor_id={{$consult_doctor_id}}"
                class="col-12 btn btn-info " style="font-size: 1rem;">เข้าร่วมห้องสนทนา</a>
            </div>
        </div>
    </div>

</div>



<script src="{{ asset('js/for_video_call_4/before_video_call_4.js') }}"></script>


<script>
    var toggleCameraButton = document.getElementById('toggleCameraButton');
        toggleCameraButton.addEventListener('click', toggleCamera);



</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        var CameraRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานกล้อง
        var MicrophoneRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานไมค์

        //======================
        // เปิดกล้องตอนโหลดหน้านี้
        //======================

        function openCamera() {

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // รองรับการเข้าถึงกล้อง
                // var constraints = { video: { facingMode: 'user' } }; // เพิ่มออปชัน facingMode เพื่อเลือกกล้องหน้า
                var constraints = { video: { facingMode: 'environment' } }; // เพิ่มออปชัน facingMode เพื่อเลือกกล้องหน้า
                navigator.mediaDevices.getUserMedia(constraints)
                .then(function(videoStream) {
                    // ได้รับสตรีมวิดีโอสำเร็จ
                    document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera"></i>'
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
                    document.querySelector('#toggleMicrophoneButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-microphone"></i>'

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
    var toggleCameraButton = document.getElementById('toggleCameraButton');
        toggleCameraButton.addEventListener('click', toggleCamera);

    var statusCamera = "open";
    var statusMicrophone = "open";

    var appId = '{{ $appId }}';
    var appCertificate = '{{ $appCertificate }}';
    var sos_id = '{{ $sos_id }}'
    var consult_doctor_id = '{{ $consult_doctor_id }}'



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
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&appId="+appId+"&appCertificate="+appCertificate+"&sos_id="+sos_id+"&consult_doctor_id="+consult_doctor_id);
            navigator.mediaDevices.getUserMedia({ audio: true })
            .then(function(audioStream) {

                // ปิดไมค์
                let audioTracks = audioStream.getAudioTracks();
                console.log("audioStream");
                console.log(audioStream);

                audioTracks[0].stop();
                document.querySelector('#toggleMicrophoneButton').classList.add('background-Red');
                document.querySelector('#toggleMicrophoneButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-microphone-slash"></i>'
                // console.log('ปิดไมค์');

            })
        }else{
            statusMicrophone = "open"; // เซ็ต statusMicrophone เป็น open
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&appId="+appId+"&appCertificate="+appCertificate+"&sos_id="+sos_id+"&consult_doctor_id="+consult_doctor_id);
            navigator.mediaDevices.getUserMedia({ audio: true })
            .then(function(newAudioStream) {
                audioStream = newAudioStream;
                document.querySelector('#toggleMicrophoneButton').classList.remove('background-Red');
                document.querySelector('#toggleMicrophoneButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-microphone"></i>'
                // console.log('เปิดสตรีมไมโครโฟน');
                console.log(audioStream);
            })
            .catch(function(error) {
                console.error('เกิดข้อผิดพลาดในการเข้าถึงไมโครโฟน:', error);
            });
        }
        setTimeout(() => {
            console.log(statusMicrophone);
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/before_video_call_4' . '/' ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&appId="+appId+"&appCertificate="+appCertificate+"&sos_id="+sos_id+"&consult_doctor_id="+consult_doctor_id);
        }, 1000);
    }



</script>


@endsection
