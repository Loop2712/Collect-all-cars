@extends('layouts.partners.theme_partner_new')

<link href="{{ asset('css/video_call_4/video_call_4.css') }}" rel="stylesheet">

@section('content')

<!-- ========================================== html ========================================== -->

<!-- สำหรับ loading ก่อนเข้า videocall -->
<div class="d-flex justify-content-center align-items-center">
    <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<!-- เปลี่ยนคลาสของ .video-container เพื่อแสดงตามจำนวนคนที่คุณมี -->
<div id="divVideo_Parent" class="video-container ">
   <!-- ไว้ใส่ div ของ video -->
</div>

<div id="footer_div" class="footer p-2">
        <!-- ใส่วิดีโอของคนที่ 4 ที่นี่ -->
        <button id="join" class="btn btn-success add-button ms-1 w-auto d-none" >เข้าร่วม</button>
        <button id="leave" class="btn btn-danger add-button ms-1 w-auto" >ออกห้อง</button>

        <button class="btn btn-secondary ms-1" id="btn_switchCamera" onclick="switchCamera();">
            <i class="fa-solid fa-camera-rotate"></i>
        </button>

        <button class="btnDevice  btn dropdown-toggle btn_for_select_video_device d-none" type="button" data-toggle="modal" data-target="#test" style=" width: 20px !important;height: 20px !important; padding: 0 !important; ">
            <i class="fa-solid fa-chevron-down fa-2xs"></i>
          </button>

        <!-- Modal -->
        <div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button id="ปุ่มนี้สำหรับปิด_modal" type="button" class="btn m-2" data-dismiss="modal" aria-label="Close" style="position: absolute; top:10;right: 10px;color:#4d4d4d;z-index: 9999999999;">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="modal-body">
                        <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                        <div id="video-device-list"></div>
                    </div>
                </div>
            </div>
        </div>

</div>

<!-- ========================================== javascript ========================================== -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<script src="{{ asset('js/for_video_call_4/resize_div_video_call.js') }}"></script>
<script src="{{ asset('js/for_video_call_4/video_call_4.js') }}"></script>

<script>

</script>

<script>
    var options;
    // ใช้สำหรับ เช็คสถานะของปุ่มเปิด-ปิด วิดีโอและเสียง
    var isMuteVideo = true;
    var isMuteAudio = true;

    // ใช้สำหรับ เช็คสถานะของปุ่มเปิด-ปิด วิดีโอและเสียง ตอนเริ่มเข้าวิดีโอคอล
    var videoTrack = '{{$videoTrack}}';
    var audioTrack = '{{$audioTrack}}';

    console.log(videoTrack);
    console.log(audioTrack);
    // var userDivVideoMap = {}; // ใช้เก็บข้อมูลผู้ใช้และ divVideo ที่ถูกใช้

    var user_id = '{{ Auth::user()->id }}';
    var appId = '{{ env("AGORA_APP_ID") }}';
    var appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
    var sos_1669_id = '{{ $sos_id }}';

    var activeVideoDeviceId

    window.addEventListener('DOMContentLoaded', async () => {
      try {
        // เรียกดูอุปกรณ์ทั้งหมด
        const devices = await navigator.mediaDevices.enumerateDevices();

        // เรียกดูอุปกรณ์ที่ใช้อยู่
        const stream = await navigator.mediaDevices.getUserMedia({
          audio: true,
          video: true
        });

        const activeAudioDeviceId = stream.getAudioTracks()[0].getSettings().deviceId;
              activeVideoDeviceId = stream.getVideoTracks()[0].getSettings().deviceId;

        // แยกอุปกรณ์ตามประเภท
        const audioDevices = devices.filter(device => device.kind === 'audioinput');

        // สร้างรายการอุปกรณ์รับข้อมูลและเพิ่มลงในรายการ
        const audioDeviceList = document.getElementById('audio-device-list');
        audioDevices.forEach(device => {
          const radio = document.createElement('input');
          radio.type = 'radio';
          radio.name = 'audio-device';
          radio.value = device.deviceId;
          radio.checked = device.deviceId === activeAudioDeviceId;

          const label = document.createElement('label');
          label.classList.add('dropdown-item');
          label.appendChild(radio);
          label.appendChild(document.createTextNode(device.label || `อุปกรณ์รับข้อมูล ${audioDeviceList.children.length + 1}`));

          audioDeviceList.appendChild(label);
          radio.addEventListener('change', onChangeAudioDevice);
        });

      } catch (error) {
        console.error('เกิดข้อผิดพลาดในการเรียกดูอุปกรณ์:', error);
      }
    });

    // เรียกใช้งานเมื่อต้องการเปลี่ยนอุปกรณ์เสียง
    function onChangeAudioDevice() {
        const selectedAudioDeviceId = getCurrentAudioDeviceId();
        // console.log('เปลี่ยนอุปกรณ์เสียงเป็น:', selectedAudioDeviceId);

        // หยุดการส่งเสียงจากอุปกรณ์ปัจจุบัน
        channelParameters.localAudioTrack.setEnabled(false);

        // สร้าง local audio track ใหม่โดยใช้อุปกรณ์ที่คุณต้องการ
        AgoraRTC.createMicrophoneAudioTrack({
            microphoneId: selectedAudioDeviceId
        })
        .then(newAudioTrack => {
            // เปลี่ยน local audio track เป็นอุปกรณ์ใหม่
            channelParameters.localAudioTrack = newAudioTrack;

            // เริ่มส่งเสียงจากอุปกรณ์ใหม่
            channelParameters.localAudioTrack.setEnabled(true);

            // console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
        })
        .catch(error => {
            console.error('เกิดข้อผิดพลาดในการสร้าง local audio track:', error);
        });
    }

    var old_activeVideoDeviceId ;

    function onChangeVideoDevice() {

        old_activeVideoDeviceId = activeVideoDeviceId ;

        const selectedVideoDeviceId = getCurrentVideoDeviceId();
        // console.log('เปลี่ยนอุปกรณ์กล้องเป็น:', selectedVideoDeviceId);

        activeVideoDeviceId = selectedVideoDeviceId ;

        // สร้าง local video track ใหม่โดยใช้กล้องที่คุณต้องการ
        AgoraRTC.createCameraVideoTrack({ cameraId: selectedVideoDeviceId })
        .then(newVideoTrack => {

            console.log('------------ newVideoTrack ------------');
            console.log(newVideoTrack);
            console.log('------------ channelParameters.localVideoTrack ------------');
            console.log(channelParameters.localVideoTrack);
            console.log('------------ cameraId ------------');
            console.log(cameraId);
            console.log('------------ selectedVideoDeviceId ------------');
            console.log(selectedVideoDeviceId);

            // // หยุดการส่งภาพจากอุปกรณ์ปัจจุบัน
            // channelParameters.localVideoTrack.setEnabled(false);

            agoraEngine.unpublish([channelParameters.localVideoTrack]);
            console.log('------------unpublish localVideoTrack ------------');

            // ปิดการเล่นภาพวิดีโอกล้องเดิม
            channelParameters.localVideoTrack.stop();
            channelParameters.localVideoTrack.close();
            console.log('------------stop localVideoTrack ------------');
            console.log('------------close localVideoTrack ------------');
            // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
            channelParameters.localVideoTrack = newVideoTrack;
            console.log('------------ channelParameters.localVideoTrack = newVideoTrack ------------');
            console.log(channelParameters.localVideoTrack);



            if (isMuteVideo == false) {

                // เริ่มส่งภาพจากอุปกรณ์ใหม่
                channelParameters.localVideoTrack.setEnabled(true);
                // แสดงภาพวิดีโอใน <div>

                // try{
                // // if (Screen_current == 'first'){
                // //         channelParameters.localVideoTrack.play(localPlayerContainer);
                // //         channelParameters.remoteVideoTrack.play(remotePlayerContainer);
                // //     }else{
                // //         channelParameters.localVideoTrack.play(remotePlayerContainer);
                // //         channelParameters.remoteVideoTrack.play(localPlayerContainer);
                // //     }
                // // }catch{
                // //     if (Screen_current == 'first'){
                // //         channelParameters.localVideoTrack.play(localPlayerContainer);
                // //         // channelParameters.remoteVideoTrack.play(remotePlayerContainer);
                // //     }else{
                // //         // channelParameters.localVideoTrack.play(remotePlayerContainer);
                // //         channelParameters.remoteVideoTrack.play(localPlayerContainer);
                // //     }
                // }

                channelParameters.localVideoTrack.play(localPlayerContainer);
                // channelParameters.remoteVideoTrack.play(remotePlayerContainer);
                // ส่ง local video track ใหม่ไปยังผู้ใช้คนที่สอง
                agoraEngine.publish([channelParameters.localVideoTrack]);

                // alert('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
                // console.log('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
            } else {
                // alert('ปิด');
                channelParameters.localVideoTrack.setEnabled(false);
            }

        })
        .catch(error => {
            // alert('ไม่สามารถเปลี่ยนกล้องได้');
            // alertNoti('<i class="fa-solid fa-triangle-exclamation fa-shake"></i>', 'ไม่สามารถเปลี่ยนกล้องได้');
            console.log('ไม่สามารถเปลี่ยนกล้องได้');

            activeVideoDeviceId = old_activeVideoDeviceId ;

            // setTimeout(function() {
            //     document.querySelector('#btn_switchCamera').click();
            // }, 2000);

            console.error('เกิดข้อผิดพลาดในการสร้าง local video track:', error);
        });

        document.querySelector('#ปุ่มนี้สำหรับปิด_modal').click();
    }

    function getCurrentAudioDeviceId() {
        const audioDevices = document.getElementsByName('audio-device');
        for (let i = 0; i < audioDevices.length; i++) {
            if (audioDevices[i].checked) {
                return audioDevices[i].value;
            }
        }
        return null;
    }

    function getCurrentVideoDeviceId() {
        const videoDevices = document.getElementsByName('video-device');
        for (let i = 0; i < videoDevices.length; i++) {
            if (videoDevices[i].checked) {
                return videoDevices[i].value;
            }
        }
        return null;
    }

    btn_switchCamera.onclick = async function()
    {
        console.log('btn_switchCamera');

        console.log('activeVideoDeviceId');
        console.log(activeVideoDeviceId);

        // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
        const deviceType = checkDeviceType();
        console.log("Device Type:", deviceType);

        // เรียกดูอุปกรณ์ทั้งหมด
        const devices = await navigator.mediaDevices.enumerateDevices();

        // เรียกดูอุปกรณ์ที่ใช้อยู่
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: true,
            video: true
        });

        // แยกอุปกรณ์ตามประเภท
        let videoDevices = devices.filter(device => device.kind === 'videoinput');

        console.log('------- videoDevices -------');
        console.log(videoDevices);
        console.log('length ==>> ' + videoDevices.length);
        console.log('------- ------- -------');

        // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
        let videoDeviceList = document.getElementById('video-device-list');
            videoDeviceList.innerHTML = '';

        let count_i = 1 ;

        videoDevices.forEach(device => {
        let radio = document.createElement('input');
            radio.type = 'radio';
            radio.id = 'video-device-' + count_i;
            radio.name = 'video-device';
            radio.value = device.deviceId;

        if (deviceType == 'PC'){
            radio.checked = device.deviceId === activeVideoDeviceId;
        }

        let label = document.createElement('label');
            label.classList.add('dropdown-item');
            label.appendChild(radio);
            label.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${videoDeviceList.children.length + 1}`));

        videoDeviceList.appendChild(label);
        radio.addEventListener('change', onChangeVideoDevice());

        count_i = count_i + 1 ;
        });

        // ---------------------------

        if (deviceType == 'PC'){
            document.querySelector('.btn_for_select_video_device').click();
        }else{

        let check_videoDevices = document.getElementsByName('video-device');

        if (now_Mobile_Devices == 1){
            // console.log("now_Mobile_Devices == 1 // ให้คลิก ");
            // console.log(check_videoDevices[1].id);
            document.querySelector('#'+check_videoDevices[1].id).click();
            now_Mobile_Devices = 2 ;
        }else{
            // console.log("now_Mobile_Devices == 2 // ให้คลิก ");
            // console.log(check_videoDevices[0].id);
            document.querySelector('#'+check_videoDevices[0].id).click();
            now_Mobile_Devices = 1 ;
        }

        // for (let i = 0; i < check_videoDevices.length; i++) {
        //   if (check_videoDevices[i].value != activeVideoDeviceId) {

        //     console.log('********************');
        //     console.log('value');
        //     console.log(check_videoDevices[i].value);
        //     console.log('id');
        //     console.log(check_videoDevices[i].id);
        //     console.log('********************');

        //     activeVideoDeviceId = check_videoDevices[i].value ;
        //     document.querySelector('#'+check_videoDevices[i].id).click();
        //     break;
        //   }
        // }

        }

    }

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

    options =
    {
        // Pass your App ID here.
        appId: appId,
        // Set the channel name.
        channel: 'sos_4',
        // Pass your temp token here.
        token: '',
        // Set the user ID.
        uid: user_id,
    };

    document.addEventListener('DOMContentLoaded', (event) => {

        function LoadingVideoCall() {
            const loadingAnime = document.getElementById('lds-ring');

            setTimeout(() => {
                if(loadingAnime){
                    loadingAnime.classList.remove('d-none');
                }
                fetch("{{ url('/') }}/api/video_call_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId)
                    .then(response => response.text())
                    .then(result => {
                        console.log("GET Token success");
                        console.log(result);

                        options['token'] = result;

                        // เอาหน้าโหลดออก
                        loadingAnime.remove();

                        setTimeout(() => {
                            document.getElementById("join").click();
                        }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน
                })
                .catch(error => {
                    if(loadingAnime){
                        loadingAnime.classList.remove('d-none');
                    }

                    // เรียกใช้งานฟังก์ชัน retryFunction() อีกครั้งหลังจากเวลาหน่วงให้ผ่านไป
                    setTimeout(() => {
                        LoadingVideoCall();
                    }, 2000);
                });

            }, 500);
        }


        LoadingVideoCall();
        startBasicCall();

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
    });

    let channelParameters =
    {
        // A variable to hold a local audio track.
        localAudioTrack: null,
        // A variable to hold a local video track.
        localVideoTrack: null,
        // A variable to hold a remote audio track.
        remoteAudioTrack: null,
        // A variable to hold a remote video track.
        remoteVideoTrack: null,
        // A variable to hold the remote user id.s
        remoteUid: null,
    };

    async function startBasicCall()
    {
    // Create an instance of the Agora Engine

        const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp9" });
        console.log("agoraEngine");
        console.log(agoraEngine);
        var rtcStats = agoraEngine.getRTCStats();
        console.log("rtcStats");
        console.log(rtcStats);
        // console.log("getLocalVideoStats");
        // console.log(getLocalVideoStats);
        const remotePlayerContainer = document.createElement("div");
        const localPlayerContainer = document.createElement('div');
        // Specify the ID of the DIV container. You can use the uid of the local user.
        localPlayerContainer.id = options.uid;
        // Set the textContent property of the local video container to the local user id.
        // localPlayerContainer.textContent = "Local user " + options.uid;
        // Set the local video container size.
        localPlayerContainer.style.width = "100%";
        localPlayerContainer.style.height = "100%";
        // Set the remote video container size.
        remotePlayerContainer.style.width = "100%";
        remotePlayerContainer.style.height = "100%";

        // Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
        agoraEngine.on("user-published", async (user, mediaType) =>
        {
            await agoraEngine.subscribe(user, mediaType);
            console.log("subscribe success");
            console.log("user");
            console.log(user);

            const remotePlayer_check_arr = {}; // ใช้เก็บ remotePlayerContainer ของแต่ละ remote user

            // ตรวจสอบว่า user.uid เป็นไอดีของ remote user ที่คุณเลือก
            if (mediaType == "video" && user.videoTrack)
            {
                // สร้างหรืออัปเดต remotePlayerContainer ของ remote user
                remotePlayer_check_arr[user.uid.toString()] = remotePlayer_check_arr[user.uid.toString()];
                // Retrieve the remote video track.
                channelParameters.remoteVideoTrack = user.videoTrack;
                // Retrieve the remote audio track.
                channelParameters.remoteAudioTrack = user.audioTrack;
                // Save the remote user id for reuse.
                channelParameters.remoteUid = user.uid.toString();
                // Specify the ID of the DIV container. You can use the uid of the remote user.
                remotePlayerContainer.id = user.uid.toString();

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//

                // create_element_remotevideo_call(remotePlayerContainer);

                console.log("remotePlayerContainer");
                console.log(remotePlayerContainer);
                console.log("remotePlayerContainer.id");
                console.log(remotePlayerContainer.id);
                console.log("channelParameters.remoteUid");
                console.log(channelParameters.remoteUid);
                console.log("channelParameters.remoteVideoTrack");
                console.log(channelParameters.remoteVideoTrack);

                // const containerId = 'videoDiv_' + remotePlayerContainer.id;

                // ตรวจสอบว่า div มีอยู่แล้วหรือไม่
                if (document.getElementById("videoDiv_"+ user.uid.toString())) {
                    document.getElementById("videoDiv_"+ user.uid.toString()).remove();
                }

                // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
                const divVideo = document.createElement('div');
                    divVideo.setAttribute('id','videoDiv_' + user.uid.toString());
                    divVideo.setAttribute('class','video-box');
                    divVideo.setAttribute('style','background-color: grey');


                // if (remotePlayer_check_arr[user.uid.toString()]) {
                //     console.log("เข้า if play");
                //
                // }else{
                //     console.log("เข้า else play");
                // }

                divVideo.append(remotePlayerContainer);

                channelParameters.remoteVideoTrack.play(remotePlayerContainer);
                // เพิ่ม div ใหม่ลงใน div หลัก
                document.querySelector('#divVideo_Parent').append(divVideo);
                // Set a stream fallback option to automatically switch remote video quality when network conditions degrade.
                agoraEngine.setStreamFallbackOption(channelParameters.remoteUid, 1);

            }

            // Subscribe and play the remote audio track If the remote user publishes the audio track only.
            if (mediaType == "audio")
            {
                // Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
                channelParameters.remoteAudioTrack = user.audioTrack;
                // Play the remote audio track. No need to pass any DOM element.
                channelParameters.remoteAudioTrack.play();
            }

        });

        // Listen for the "user-unpublished" event.
        agoraEngine.on("user-unpublished", async (user, mediaType) =>
        {
            console.log("เข้าสู่ user-unpublished");
            console.log("agoraEngine");
            console.log(agoraEngine);

            if(mediaType == "video"){
                if (!user.remoteVideoTrack) {
                    console.log("ไม่พบ remoteVideoTrack");
                    console.log("สร้าง Div_Dummy ของ" + user.uid);
                    console.log(user);
                    // สำหรับ สร้าง div_dummy ตอนผู้ใช้ไม่ได้เปิดกล้อง
                    create_dummy_videoTrack(user);
                }
            }

            if(mediaType == "audio"){
                if (!user.remoteAudioTrack) {
                    console.log("ไมโครโฟนปิดอยู่");
                }
            }


        });

        // เมื่อมีคนเข้าห้อง
        agoraEngine.on("user-joined", function (evt) {

            console.log("agoraEngine มีคนเข้าห้องมา");
            console.log(agoraEngine);

            fetch("{{ url('/') }}/api/join_room_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId)
                .then(response => response.text())
                .then(result => {

                console.log("บันทึกข้อมูล เมื่มีคนเข้าห้อง สำเร็จ");
                console.log(result);
            })
            .catch(error => {
                console.log("บันทึกข้อมูล เมื่มีคนเข้าห้อง ล้มเหลว");
            });

            if(agoraEngine['remoteUsers'][0]){
                if( agoraEngine['remoteUsers']['length'] != 0 ){
                    for(let c_uid = 0; c_uid < agoraEngine['remoteUsers']['length']; c_uid++){

                        const dummy_remote = agoraEngine['remoteUsers'][c_uid];
                        console.log(dummy_remote);

                        if(agoraEngine['remoteUsers'][c_uid]['hasVideo'] == false){ //ถ้าผ remote คนนี้ ไม่ได้เปิดกล้องไว้ --> ไปสร้าง div_dummy
                            create_dummy_videoTrack(dummy_remote);
                            console.log("agoraEngine User-Joined")
                            console.log("Dummy Created !!!")
                        }
                    }
                }
            }

        });

        // ออกจากห้อง
        agoraEngine.on("user-left", function (evt) {

            console.log("ไอดี : " + evt.uid + " ออกจากห้อง");

            if(document.getElementById('videoDiv_' + evt.uid)) {
                document.getElementById('videoDiv_' + evt.uid).remove();
            }

            // ถ้าผู้ใช้ เหลือ 0 คน ให้ทำลายห้องทิ้ง
            if(rtcStats.UserCount < 1){
                await agoraEngine.destroy();
            }

            console.log("agoraEngine ของ user-left");
            console.log(agoraEngine);

        });

        window.onload = function ()
        {
            // Listen to the Join button click event.
            document.getElementById("join").onclick = async function (user_id)
            {
                // Enable dual-stream mode.
                agoraEngine.enableDualStream();
                // Join a channel.
                await agoraEngine.join(options.appId, options.channel, options.token, options.uid);
                // Create a local audio track from the audio sampled by a microphone.

                // ปิดกล้องเดิม (หากมีการสร้างไว้ก่อนหน้านี้)
                if (channelParameters.localVideoTrack) {
                    channelParameters.localVideoTrack.close();
                    channelParameters.localVideoTrack = null;
                }

                // ปิดไมโครโฟนเดิม (หากมีการสร้างไว้ก่อนหน้านี้)
                if (channelParameters.localAudioTrack) {
                    channelParameters.localAudioTrack.close();
                    channelParameters.localAudioTrack = null;
                }

                //หาไมโครโฟน
                try {
                    channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                        {encoderConfig: "high_quality_stereo",}
                    );
                    // Publish the local audio tracks in the channel.
                     await agoraEngine.publish([channelParameters.localAudioTrack]);
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างไมโครโฟน
                    console.error('ไม่สามารถสร้างไมโครโฟนหรือไม่พบไมโครโฟน', error);

                    try { // เข้าใหม่ในสถานะปิดไมโครโฟนแทน
                        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                            {encoderConfig: "high_quality_stereo",}
                        );
                        // ปิดไมโครโฟนใหม่ทันที
                        await channelParameters.localAudioTrack.setEnabled(false);
                        //เปลี่ยนสถานะไมโครโฟน เป็น false
                        isMuteAudio = false;
                        await agoraEngine.publish([channelParameters.localAudioTrack]);
                    } catch (newError) {
                        console.error('ไม่สามารถสร้างไมโครโฟนใหม่หรือปิดไมโครโฟนใหม่', newError);
                        // ทำการปิดแบบถาวรหรือจัดการข้อผิดพลาดอื่นๆ ตามที่คุณต้องการ
                    }
                }

                // หากล้อง
                try {
                    channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack({
                        optimizationMode: "detail",
                        encoderConfig:
                        {
                            width: 640,
                            // Specify a value range and an ideal value
                            height: { ideal: 480, min: 400, max: 500 },
                            frameRate: 15,
                            bitrateMin: 600, bitrateMax: 1000,
                        },
                    });
                    // Publish the local audio and video tracks in the channel.
                    await agoraEngine.publish([channelParameters.localVideoTrack]);
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างกล้อง
                    console.error('ไม่สามารถสร้างกล้องหรือไม่พบกล้อง', error);

                    try { // เข้าใหม่ในสถานะปิดกล้องแทน
                        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack({
                            optimizationMode: "detail",
                            encoderConfig:
                            {
                                width: 640,
                                // Specify a value range and an ideal value
                                height: { ideal: 480, min: 400, max: 500 },
                                frameRate: 15,
                                bitrateMin: 600, bitrateMax: 1000,
                            },
                        });
                        // ปิดกล้องใหม่ทันที
                        await channelParameters.localVideoTrack.setEnabled(false);
                        //เปลี่ยนสถานะกล้อง เป็น false
                        isMuteVideo = false;
                        await agoraEngine.publish([channelParameters.localVideoTrack]);
                    } catch (newError) {
                        console.error('ไม่สามารถสร้างกล้องใหม่หรือปิดกล้องใหม่', newError);
                        // ทำการปิดแบบถาวรหรือจัดการข้อผิดพลาดอื่นๆ ตามที่คุณต้องการ
                    }
                }

                //======= สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน ==========//
                btn_toggle_mic_camera(videoTrack,audioTrack);

                try { // เช็คสถานะจากห้องทางเข้า แล้วเลือกกดเปิด-ปิด ตามสถานะ
                    if(videoTrack == "open"){
                        // เข้าห้องด้วย->สถานะเปิดกล้อง
                        isMuteVideo = false;
                        document.querySelector('#muteVideo').click();
                        console.log("Click open video ===================");
                    }else{
                        // เข้าห้องด้วย->สถานะปิดกล้อง
                        isMuteVideo = true;
                        document.querySelector('#muteVideo').click();
                        console.log("Click close video ===================");
                    }

                    if(audioTrack == "open"){
                        // เข้าห้องด้วย->สถานะเปิดไมค์
                        isMuteAudio = false;
                        document.querySelector('#muteAudio').click();
                        console.log("Click open audio ===================");
                    }else{
                        // เข้าห้องด้วย->สถานะปิดไมค์
                        isMuteAudio = true;
                        document.querySelector('#muteAudio').click();
                        console.log("Click close audio ===================");
                    }
                }
                catch (error) {
                    console.log('ส่งตัวแปร videoTrack audioTrack ไม่สำเร็จ');
                }

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                create_element_localvideo_call(localPlayerContainer);


                // Play the local video track.
                channelParameters.localVideoTrack.play(localPlayerContainer);

            }
            // Listen to the Leave button click event.
            document.getElementById('leave').onclick = async function ()
            {
                // Destroy the local audio and video tracks.
                if(channelParameters.localAudioTrack){
                    channelParameters.localAudioTrack.close();
                }
                if(channelParameters.localVideoTrack){
                    channelParameters.localVideoTrack.close();
                }

                // Remove the containers you created for the local video and remote video.
                removeVideoDiv(remotePlayerContainer.id);
                removeVideoDiv(localPlayerContainer.id);
                // Leave the channel
                await agoraEngine.leave();
                console.log("You left the channel");
                // Refresh the page for reuse
                // window.location.reload();

                // fetch("{{ url('/') }}/api/left_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=user_left')
                //     .then(response => response.json())
                //     .then(result => {
                //         // console.log(result);
                // });

                function goBack(){
                    window.history.back();
                }
                goBack();
            }
        }
    }

    console.log();
    // Remove the video stream from the container.
    function removeVideoDiv(elementId)
    {
        console.log("Removing "+ elementId+"Div");
        let Div = document.getElementById(elementId);
        if (Div)
        {
            Div.remove();
        }
    };

</script>

@endsection
