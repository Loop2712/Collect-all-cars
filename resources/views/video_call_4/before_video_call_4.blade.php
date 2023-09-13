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

    .toggleCameraButton.active,
    .toggleMicrophoneButton.active {
        border: 1px solid rgb(185, 7, 7);
        background-color: rgb(226, 73, 73); /* เปลี่ยนสีเป็นแดงเมื่อถูกกด */
    }


</style>

@section('content')

<!-- เปลี่ยนคลาสของ .video-container เพื่อแสดงตามจำนวนคนที่คุณมี -->
<div id="container" class="container ">
    <div class="col-12 p-2 d-flex justify-content-center">
        <span class="font-30 font-weight-bold align-middle ">ห้องสนทนาของเคส : {{$sos_id ? $sos_id : "--"}}</span>
    </div>
    <div class="row mt-2 p-2 d-flex justify-content-center">
        <div class="row mt-2 p-2">
            <div class="col-sm-12 col-md-8 col-lg-8" style="position: relative;">
                <video id="videoDiv" class="video_preview" autoplay></video>
                {{-- <div id="video_preview" class="bg-secondary video_preview"></div> --}}
                <div class="buttonDiv d-none">
                    <button id="toggleCameraButton" class="toggleCameraButton mr-3"></button>
                    <button id="toggleMicrophoneButton" class="toggleMicrophoneButton"></button>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="d-flex justify-content-end">
                    <a id="btnJoinRoom" href="{{ url('/video_call_4/video_call_4' . '/' . $sos_id ) }}?videoTrack=open&audioTrack=open&appId={{$appId}}&appCertificate={{$appCertificate}}&consult_doctor_id={{$consult_doctor_id}}"
                        class="col-12 btn btn-info" style="font-size: 1rem;">เข้าร่วมห้องสนทนา</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none">
        <div class="selectDivice mt-2 p-2 ">
            <div>
                <label for="microphoneList">เลือกไมโครโฟน:</label>
                <select id="microphoneList"></select>
            </div>
            <div>
                <label for="cameraList">เลือกกล้อง:</label>
                <select id="cameraList"></select>
            </div>
            <div>
                <label for="speakerList">เลือกลำโพง:</label>
                <select id="speakerList"></select>
            </div>

            <div>
                <div id="microphoneMeter" class="meter"></div>
                <label for="microphoneMeter">ไมค์:</label>
            </div>
            <div>
                <div id="speakerMeter" class="meter"></div>
                <label for="speakerMeter">ลำโพง:</label>
            </div>

            <button id="startButton">เริ่มใช้งาน</button>
            <button id="stopButton" style="display: none;">หยุดใช้งาน</button>
        </div>
    </div>

</div>



<script src="{{ asset('js/for_video_call_4/before_video_call_4.js') }}"></script>

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
                        document.querySelector('.buttonDiv').classList.remove('d-none');
                        document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera"></i>';
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

        function toggleCamera() {
            if (statusCamera == "open") {
                statusCamera = "close"; //เซ็ต statusCamera เป็น close
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/video_call_4' . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id);
                // ตรวจสอบว่ากล้องถูกเปิดหรือไม่
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(videoStream) {

                    // ปิดกล้อง
                    var videoElement = document.getElementById('videoDiv');
                    var stramVideo = videoElement.srcObject;
                    var videoTracks = stramVideo.getVideoTracks();

                    // console.log(videoTracks);

                    videoTracks[0].stop();
                    document.querySelector('#toggleCameraButton').classList.add('active');
                    document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera-slash"></i>'
                    // console.log('ปิดกล้อง');
                })

            }else{
                statusCamera = "open"; // เซ็ต statusCamera เป็น open
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/video_call_4' . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id);
                // เปิดกล้อง
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(newVideoStream) {
                    // ได้รับสตรีมวิดีโอใหม่สำเร็จ
                    videoStream = newVideoStream;
                    var videoElement = document.getElementById('videoDiv');
                    videoElement.srcObject = videoStream;

                    document.querySelector('#toggleCameraButton').classList.remove('active');
                    document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera"></i>'
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
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/video_call_4' . '/' . $sos_id ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id);
                navigator.mediaDevices.getUserMedia({ audio: true })
                .then(function(audioStream) {

                    // ปิดไมค์
                    let audioTracks = audioStream.getAudioTracks();
                    console.log("audioStream");
                    console.log(audioStream);

                    audioTracks[0].stop();

                    document.querySelector('#toggleMicrophoneButton').classList.add('active');
                    document.querySelector('#toggleMicrophoneButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-microphone-slash"></i>'
                    // console.log('ปิดไมค์');

                })
            }else{
                statusMicrophone = "open"; // เซ็ต statusMicrophone เป็น open
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/video_call_4' . '/' . $sos_id ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id);
                navigator.mediaDevices.getUserMedia({ audio: true })
                .then(function(newAudioStream) {
                    audioStream = newAudioStream;
                    document.querySelector('#toggleMicrophoneButton').classList.remove('active');
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
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/video_call_4/video_call_4' . '/' . $sos_id ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id);
            }, 1000);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const microphoneList = document.getElementById("microphoneList");
            const cameraList = document.getElementById("cameraList");
            const speakerList = document.getElementById("speakerList");
            const startButton = document.getElementById("startButton");
            const stopButton = document.getElementById("stopButton");
            let selectedMicrophone = null;
            let selectedCamera = null;
            let selectedSpeaker = null;
            let microphoneStream = null;
            let cameraStream = null;
            let speakerStream = null;

            // เรียกฟังก์ชันเพื่อรับรายการอุปกรณ์
            await getDeviceList();

            // // เมื่อคลิกที่ปุ่ม "เริ่มใช้งาน"
            // startButton.addEventListener("click", async () => {
            //     if (selectedMicrophone || selectedCamera || selectedSpeaker) {
            //         try {
            //             if (selectedMicrophone) {
            //                 microphoneStream = await navigator.mediaDevices.getUserMedia({
            //                     audio: { deviceId: selectedMicrophone.deviceId },
            //                 });
            //             }

            //             if (selectedCamera) {
            //                 cameraStream = await navigator.mediaDevices.getUserMedia({
            //                     video: { deviceId: selectedCamera.deviceId },
            //                 });
            //             }

            //             if (selectedSpeaker) {
            //                 const audioContext = new AudioContext();
            //                 const destination = audioContext.createMediaStreamDestination();
            //                 const audioTracks = destination.stream.getAudioTracks();
            //                 audioTracks[0].stop();

            //                 speakerStream = destination.stream;
            //             }

            //             // ปิดปุ่มเริ่มใช้งานและเปิดปุ่มหยุดใช้งาน
            //             startButton.style.display = "none";
            //             stopButton.style.display = "inline-block";
            //         } catch (error) {
            //             console.error("เกิดข้อผิดพลาดในการเปิดอุปกรณ์:", error);
            //         }
            //     }
            // });

             // เมื่อคลิกที่ปุ่ม "เริ่มใช้งาน"
            startButton.addEventListener("click", async () => {
                if (selectedMicrophone || selectedSpeaker) {
                    try {
                        if (selectedMicrophone) {
                            microphoneStream = await navigator.mediaDevices.getUserMedia({
                                audio: { deviceId: selectedMicrophone.deviceId },
                            });
                            setupAudioMeter(microphoneStream, microphoneMeter);
                        }

                        if (selectedSpeaker) {
                            const audioContext = new AudioContext();
                            const destination = audioContext.createMediaStreamDestination();
                            const audioTracks = destination.stream.getAudioTracks();
                            audioTracks[0].stop();

                            speakerStream = destination.stream;
                            setupAudioMeter(speakerStream, speakerMeter);
                        }

                        // ปิดปุ่มเริ่มใช้งานและเปิดปุ่มหยุดใช้งาน
                        startButton.style.display = "none";
                        stopButton.style.display = "inline-block";
                    } catch (error) {
                        console.error("เกิดข้อผิดพลาดในการเปิดอุปกรณ์:", error);
                    }
                }
            });

            // เมื่อคลิกที่ปุ่ม "หยุดใช้งาน"
            stopButton.addEventListener("click", () => {
                if (microphoneStream) {
                    microphoneStream.getTracks().forEach((track) => {
                        track.stop();
                    });
                }

                if (cameraStream) {
                    cameraStream.getTracks().forEach((track) => {
                        track.stop();
                    });
                }

                if (speakerStream) {
                    speakerStream.getTracks().forEach((track) => {
                        track.stop();
                    });
                }

                // ปิดปุ่มหยุดใช้งานและเปิดปุ่มเริ่มใช้งาน
                startButton.style.display = "inline-block";
                stopButton.style.display = "none";
            });

            // รับรายการอุปกรณ์และแสดงใน dropdown
            async function getDeviceList() {
                try {
                    const devices = await navigator.mediaDevices.enumerateDevices();
                    devices.forEach((device) => {
                        const option = document.createElement("option");
                        option.value = device.deviceId;
                        option.text = device.label || `อุปกรณ์ ${device.deviceId}`;

                        if (device.kind === "audioinput") {
                            microphoneList.appendChild(option);
                        } else if (device.kind === "videoinput") {
                            cameraList.appendChild(option);
                        } else if (device.kind === "audiooutput") {
                            speakerList.appendChild(option);
                        }
                    });

                    // เมื่อเลือกไมโครโฟนใน dropdown
                    microphoneList.addEventListener("change", () => {
                        selectedMicrophone = devices.find((device) => device.deviceId === microphoneList.value);
                    });

                    // เมื่อเลือกกล้องใน dropdown
                    cameraList.addEventListener("change", () => {
                        selectedCamera = devices.find((device) => device.deviceId === cameraList.value);
                    });

                    // เมื่อเลือกลำโพงใน dropdown
                    speakerList.addEventListener("change", () => {
                        selectedSpeaker = devices.find((device) => device.deviceId === speakerList.value);
                    });
                } catch (error) {
                    console.error("เกิดข้อผิดพลาดในการรับรายการอุปกรณ์:", error);
                }
            }

            // กำหนดตัววัดเสียง
            function setupAudioMeter(stream, meter) {
                const audioContext = new AudioContext();
                const analyser = audioContext.createAnalyser();
                const source = audioContext.createMediaStreamSource(stream);
                source.connect(analyser);

                analyser.fftSize = 256;
                const bufferLength = analyser.frequencyBinCount;
                const dataArray = new Uint8Array(bufferLength);

                function updateMeter() {
                    analyser.getByteFrequencyData(dataArray);
                    const volume = dataArray.reduce((acc, val) => acc + val, 0) / bufferLength;
                    const percentage = Math.min(100, volume * 2); // การแปลงค่าให้อยู่ในช่วง 0-100
                    meter.style.width = `${percentage}%`;
                    requestAnimationFrame(updateMeter);
                }

                updateMeter();
            }

        });
    </script>


@endsection
