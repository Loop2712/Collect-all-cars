@extends('layouts.partners.theme_partner_new')

<link href="{{ asset('css/video_call_4/video_call_4.css') }}" rel="stylesheet">

@section('content')

<!-- ========================================== html ========================================== -->

 <!-- เปลี่ยนคลาสของ .video-container เพื่อแสดงตามจำนวนคนที่คุณมี -->
<div id="divVideo_Parent" class="video-container ">
    {{-- <div id="divVideo1" style="background-color: rgb(236, 116, 116)" class="video-box">
        <!-- ใส่วิดีโอของคนที่ 1 ที่นี่ -->

    </div>
    <div id="divVideo2" style="background-color: rgb(120, 235, 91)" class="video-box">
        <!-- ใส่วิดีโอของคนที่ 2 ที่นี่ -->

    </div> --}}
    {{-- <div id="divVideo3" style="background-color: rgb(27, 129, 143)" class="video-box">
        <!-- ใส่วิดีโอของคนที่ 3 ที่นี่ -->

    </div> --}}
    {{-- <div id="divVideo4" style="background-color: rgb(224, 236, 116)" class="video-box">
        <!-- ใส่วิดีโอของคนที่ 4 ที่นี่ -->

    </div> --}}
</div>

<div id="footer_div" class="footer p-2">
        <!-- ใส่วิดีโอของคนที่ 4 ที่นี่ -->
        <button id="join" class="btn btn-success add-button ms-1 w-auto" >เข้าร่วม</button>
        <button id="leave" class="btn btn-danger add-button ms-1 w-auto" >ออกห้อง</button>
        {{-- <button class="btn btn-success add-button" onclick="createVideoBox()">เพิ่ม</button>
        <button class="btn btn-danger delete-button"  onclick="removeVideoBox()">ลบ</button> --}}
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

    var userDivVideoMap = {}; // ใช้เก็บข้อมูลผู้ใช้และ divVideo ที่ถูกใช้

    let user_id = '{{ Auth::user()->id }}';
    let appId = '{{ env("AGORA_APP_ID") }}';
    let appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';

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

    fetch("{{ url('/') }}/api/video_call_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId)
        .then(response => response.text())
        .then(result => {
            console.log("GET Token success");
            console.log(result);

            options['token'] = result;

            setTimeout(() => {
                // document.getElementById("join").click();
            }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน

        });
        startBasicCall();
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

            if (mediaType == "video")
            {
                // Retrieve the remote video track.
                channelParameters.remoteVideoTrack = user.videoTrack;
                // Retrieve the remote audio track.
                channelParameters.remoteAudioTrack = user.audioTrack;
                // Save the remote user id for reuse.
                channelParameters.remoteUid = user.uid.toString();
                // Specify the ID of the DIV container. You can use the uid of the remote user.
                remotePlayerContainer.id = user.uid.toString();
                channelParameters.remoteUid = user.uid.toString();

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                create_element_video_call(user_id, remotePlayerContainer);

                // Play the remote video track.
                channelParameters.remoteVideoTrack.play(remotePlayerContainer);
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
        agoraEngine.on("user-unpublished", user =>
        {
            console.log("เข้าสู่ user-unpublished");
            if (!user.remoteVideoTrack) {
            console.log("ไม่พบ remoteVideoTrack");
            console.log("สร้าง Div_Dummy");
            // สำหรับ สร้าง div_dummy ตอนผู้ใช้ไม่ได้เปิดกล้อง
            create_dummy_videoTrack(user);

            }


            console.log(user.uid + "has left the channel");
        });


        window.onload = function ()
        {
            // Listen to the Join button click event.
            document.getElementById("join").onclick = async function (user_id)
            {

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
                    channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
                    // Publish the local audio tracks in the channel.
                     await agoraEngine.publish([channelParameters.localAudioTrack]);
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างไมโครโฟน
                    console.error('ไม่สามารถสร้างไมโครโฟนหรือไม่พบไมโครโฟน', error);

                    try { // เข้าใหม่ในสถานะปิดไมโครโฟนแทน
                        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
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
                    channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
                    // Publish the local audio and video tracks in the channel.
                    await agoraEngine.publish([channelParameters.localVideoTrack]);
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างกล้อง
                    console.error('ไม่สามารถสร้างกล้องหรือไม่พบกล้อง', error);

                    try { // เข้าใหม่ในสถานะปิดกล้องแทน
                        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
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
                btn_toggle_mic_camera();

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                create_element_video_call(user_id, localPlayerContainer);
                // console.log(userDivVideoMap[user_id]);

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
                window.location.reload();
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
