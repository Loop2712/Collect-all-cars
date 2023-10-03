<link href="{{ asset('css/video_call_4/before_video_call_4.css') }}" rel="stylesheet">
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<style>
    /* .video_preview{
        min-height: 20vh;
        height: 100%;
        max-height: 50vh;
        width: 100%;
        object-fit: cover;
    } */

    /* .row {
        display: flex;
        flex-wrap: nowrap;
    } */

    .col-sm-12.col-md-8.col-lg-8.bg-secondary {
        flex: 0 0 calc(66.666% - 10px); /* 66.666% is 2/3 of the row width */
        margin-right: 10px; /* Adjust this value as needed for spacing */
    }

    .col-sm-12.col-md-4.col-lg-4.bg-secondary {
        flex: 0 0 calc(33.333% - 10px); /* 33.333% is 1/3 of the row width */
    }

    /* .buttonDiv {
        position: absolute;
        left: 40%;
        bottom: 1rem;
    } */

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
        max-height: 50vh;
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

    /* เส้นของหลอดเสียง */
    .sound-indicator {
        width: 100px;
        height: 10px;
        background-color: #ccc;
        position: relative;
    }

    /* หลอดเสียง */
    .sound-bar {
        width: 100%;
        height: 100%;
        background-color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    /* อนิเมชันเสียง */
    .sound-animation {
        width: 0;
        height: 100%;
        background-color: #2ca2da;
        position: absolute;
        animation: soundAnimation 0.2s linear infinite;
        transform-origin: left center; /* ตั้งค่าจุดเริ่มต้นของการขยับ */
        opacity: 0.8;
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



</style>
<div class="container-before-video-call">
    <div class="nav-bar-video-call">
        <img src="{{ asset('/img/logo/logo-viicheck-outline.png') }}" alt="">
    </div>
    <div class="main-content-video-call">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 ">
                <div class="div-video">
                    <video id="videoDiv" class="video_preview" autoplay></video>
                    <div class="soundTest">
                        Sound Test
                    </div>
                    <div class="buttonDiv d-none">
                        <button id="toggleCameraButton" class="toggleCameraButton mr-3 btn"></button>
                        <button id="toggleMicrophoneButton" class="toggleMicrophoneButton btn"></button>
                    </div>
                </div>

                <div class=" d-nne">
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
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4  d-flex justify-content-center p-3 align-items-center">
                <div class="text-center w-100">
                    <h4 class="w-100">ห้องสนทนาของเคส : {{$sos_id ? $sos_id : "--"}}</h4>
                     <h5 class="w-100">{{Auth::user()->name}}</h5>
                     <a id="btnJoinRoom" class="btn btn-success" href="{{ url('/'. $type_device .'/'. $type . '/' . $sos_id ) }}?videoTrack=open&audioTrack=open&appId={{$appId}}&appCertificate={{$appCertificate}}&consult_doctor_id={{$consult_doctor_id}}">
                        เข้าร่วมห้องสนทนา
                     </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- เปลี่ยนคลาสของ .video-container เพื่อแสดงตามจำนวนคนที่คุณมี -->
<!-- <div id="container" class="container ">
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

</div> -->


<script src="{{ asset('js/for_video_call_4/before_video_call_4.js') }}"></script>
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

    var appId = '{{ $appId }}';
    var appCertificate = '{{ $appCertificate }}';
    var sos_id = '{{ $sos_id }}'
    var consult_doctor_id = '{{ $consult_doctor_id }}'
</script>

<script>
    document.addEventListener("DOMContentLoaded", async () => {
        const microphoneList = document.getElementById("microphoneList");
        const cameraList = document.getElementById("cameraList");
        // const speakerList = document.getElementById("speakerList");
        // const startButton = document.getElementById("startButton");
        const soundTest = document.getElementById("soundTest");
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
        // startButton.addEventListener("click", async () => {
        //     if (selectedMicrophone || selectedSpeaker) {
        //         try {
        //             if (selectedMicrophone) {
        //                 microphoneStream = await navigator.mediaDevices.getUserMedia({
        //                     audio: { deviceId: selectedMicrophone.deviceId },
        //                 });
        //                 setupAudioMeter(microphoneStream, microphoneMeter);
        //             }

        //             if (selectedSpeaker) {
        //                 const audioContext = new AudioContext();
        //                 const destination = audioContext.createMediaStreamDestination();
        //                 const audioTracks = destination.stream.getAudioTracks();
        //                 audioTracks[0].stop();

        //                 speakerStream = destination.stream;
        //                 setupAudioMeter(speakerStream, speakerMeter);
        //             }

        //             // ปิดปุ่มเริ่มใช้งานและเปิดปุ่มหยุดใช้งาน
        //             startButton.style.display = "none";
        //             stopButton.style.display = "inline-block";
        //         } catch (error) {
        //             console.error("เกิดข้อผิดพลาดในการเปิดอุปกรณ์:", error);
        //         }
        //     }
        // });

        // // เมื่อคลิกที่ปุ่ม "หยุดใช้งาน"
        // stopButton.addEventListener("click", () => {
        //     if (microphoneStream) {
        //         microphoneStream.getTracks().forEach((track) => {
        //             track.stop();
        //         });
        //     }

        //     if (cameraStream) {
        //         cameraStream.getTracks().forEach((track) => {
        //             track.stop();
        //         });
        //     }

        //     if (speakerStream) {
        //         speakerStream.getTracks().forEach((track) => {
        //             track.stop();
        //         });
        //     }

        //     // ปิดปุ่มหยุดใช้งานและเปิดปุ่มเริ่มใช้งาน
        //     startButton.style.display = "inline-block";
        //     stopButton.style.display = "none";
        // });

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

            console.log(selectedCamera.label);

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
            if(selectedMicrophone){
                useMicrophone = selectedMicrophone.deviceId;
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            }else{
                document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            }
            console.log(useMicrophone);

            let microphoneElement = document.createElement('audio');
                microphoneElement.id = 'microphoneElement';

            microphoneElement.setSinkId(selectedMicrophone.deviceId)
                .then(function () {
                    console.log('ไมโครโฟนถูกอัปเดตเป็น: ' + selectedMicrophone.label);
                })
                .catch(function (error) {
                    console.error('เกิดข้อผิดพลาดในการอัปเดตไมโครโฟน:', error);
                });
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

        // // กำหนดตัววัดเสียง
        // function setupAudioMeter(stream, meter) {
        //     const audioContext = new AudioContext();
        //     const analyser = audioContext.createAnalyser();
        //     const source = audioContext.createMediaStreamSource(stream);
        //     source.connect(analyser);

        //     analyser.fftSize = 256;
        //     const bufferLength = analyser.frequencyBinCount;
        //     const dataArray = new Uint8Array(bufferLength);

        //     function updateMeter() {
        //         analyser.getByteFrequencyData(dataArray);
        //         const volume = dataArray.reduce((acc, val) => acc + val, 0) / bufferLength;
        //         const percentage = Math.min(100, volume * 2); // การแปลงค่าให้อยู่ในช่วง 0-100
        //         meter.style.width = `${percentage}%`;
        //         requestAnimationFrame(updateMeter);
        //     }

        //     updateMeter();
        // }

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

    // ฟังก์ชันสำหรับอัปเดตอนิเมชันของหลอดเสียง
    function updateSoundAnimation() {
        const audioElement = document.getElementById('audioElement');
        const soundAnimation = document.querySelector('.sound-animation');

        // คำนวณความดังเสียงของลำโพง (ระหว่าง 0 ถึง 1)
        const volume = audioElement.volume;
        console.log(volume);
        // ปรับขนาดอนิเมชันตามความดังของเสียง
        soundAnimation.style.transform = `scaleX(${volume})`;
    }

    // เมื่อเริ่มเล่นเสียง
    // document.getElementById('audioElement').addEventListener('click', function () {
    //     // อัปเดตอนิเมชันของหลอดเสียงเมื่อมีการเปิดเสียง
    //     document.querySelector('#audioElement_btn').innerHTML = '<i class="fa-regular fa-circle-stop"></i>';

    //     let audio_ringtone_join = new Audio("{{ asset('sound/join_room_1.mp3') }}");
    //     audio_ringtone_join.play();

    //     audio_ringtone_join.onended = function() {
    //         document.querySelector('#audioElement_btn').innerHTML = '<i class="fa-regular fa-circle-play"></i>';
    //     }

    //     // updateSoundAnimation();
    // });

    // // เมื่อเปลี่ยนระดับเสียง
    // document.getElementById('audioElement').addEventListener('volumechange', function () {
    //     // อัปเดตอนิเมชันของหลอดเสียงเมื่อมีการเปลี่ยนระดับเสียง
    //     updateSoundAnimation();
    // });

    // // โหลดค่าเริ่มต้น
    // updateSoundAnimation();


</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        // fetch("{{ url('/') }}/api/check_user_in_room_4" + "?sos_1669_id=" + sos_1669_id)
        // .then(response => response.json())
        // .then(result => {
        //     // console.log('check_user_in_room');
        //     // console.log(result);
        //     // console.log('-------------------------------------');

        //     if(result['data'] != 'ไม่มีข้อมูล'){
        //         console.log(result['data']);
        //     }else{
        //         console.log(result['data_agora']);
        //     }

        // });

        var CameraRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานกล้อง
        var MicrophoneRetries = 0; // ตัวแปรเก็บจำนวนครั้งที่เรียกใช้งานไมค์videoDiv

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
    let toggleCameraButton = document.getElementById('toggleCameraButton');
        toggleCameraButton.addEventListener('click', toggleCamera);
    function toggleCamera() {
        if (statusCamera == "open") {
            statusCamera = "close"; //เซ็ต statusCamera เป็น close
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);

            // ตรวจสอบว่ากล้องถูกเปิดหรือไม่
            let videoElement = document.getElementById('videoDiv');
            let selectedDeviceId = cameraList.value; // รับค่า ID ของอุปกรณ์ที่เลือกใน dropdown
            let constraints = { video: { deviceId: selectedDeviceId } }; // เลือกอุปกรณ์ที่ถูกเลือก

            navigator.mediaDevices.getUserMedia(constraints)
            .then(function(videoStream) {

                // ปิดกล้อง
                let videoElement = document.getElementById('videoDiv');
                let stramVideo = videoElement.srcObject;
                let videoTracks = stramVideo.getVideoTracks();

                videoTracks[0].stop();
                document.querySelector('#toggleCameraButton').classList.add('active');
                document.querySelector('#toggleCameraButton').innerHTML = '<i style="font-size: 25px;" class="fa-regular fa-camera-slash"></i>'
                // console.log('ปิดกล้อง');
            })

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
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);


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
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);


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
            document.querySelector('#btnJoinRoom').setAttribute('href',"{{ url('/'. $type_device .'/'. $type . '/' . $sos_id  ) }}?videoTrack="+statusCamera+"&audioTrack="+statusMicrophone+"&consult_doctor_id="+consult_doctor_id+"&useMicrophone="+useMicrophone+"&useSpeaker="+useSpeaker+"&useCamera="+useCamera);


        }, 1000);
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




