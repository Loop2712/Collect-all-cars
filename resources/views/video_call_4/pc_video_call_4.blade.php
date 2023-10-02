
{{-- <link href="{{ asset('css/video_call_4/video_call_4.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('css/video_call_4/layout_video_call_4.css') }}" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">

{{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet"> --}}


<style>
/* @media screen and (min-width: 1024px)
{ */
    html,
	body,
	.full-height,
	.page-content,
	.wrapper {
		height: calc(100%);
		min-height: calc(100% ) !important;
		padding-bottom: 0;
		/* padding-top: 0; */
		/* margin-top: 0; */
		margin-bottom: 0;
	}

	.data-sos {
		outline: 1px solid #000;
		border-radius: 5px;
		min-height: 100%;
		background-color: #2b2d31;
		color: #fff !important;
	}
	.data-sos *{
		color: #fff;
	}

	.item-video-call {
		aspect-ratio: 16/9;
		/* outline: #000 1px solid; */
		cursor: pointer;
		/* เพิ่มคอร์เซอร์แสดงถึงว่าองค์ประกอบนี้สามารถคลิกได้ */
		transition: all 0.3s ease-in-out;
	}

	.user-video-call-bar {
		overflow: auto;
	}

	.user-video-call-bar .custom-div {
		width: 200px;
		margin: 0 5px;
		aspect-ratio: 16/9;
		height: 100px !important;
		background: red;
		/* padding-top: calc(9 / 16 * 100%); */
		outline: #000 1px solid;
		position: relative;
	}

	.btn-show-hide-user-video-call {
		position: absolute;
		color: #fff;
		background-color: #2c2e31;
        border-color: #fff;
		border-radius: 50px;
		opacity: 0;
		top: 5%;
		left: 50%;
		transform: translate(-50%, -5%);
		padding: 5px 25px;
		transition: all .15s ease-in-out;
	}

    #icon_show_hide{
        transition: all .15s ease-in-out;
    }

	.btn-show-hide-user-video-call:hover {
		color: #fff;
	}

	.video-call:hover .btn-show-hide-user-video-call {
		opacity: 1;
	}

	.video-call:hover {
		/* box-shadow: inset 0px 0px 100px 0px rgba(0,0,0,0.1); */

		transition: all .15s ease-in-out;
		/* box-shadow: 0px 20px 42px -20px rgba(0, 0, 0, 0.45) inset,
			0px -20px 42px -20px rgba(0, 0, 0, 0.45) inset; */
	}

	.video-call {
		/* outline: #000 1px solid; */
		margin: 0;
		background-color: #ffffff;
	}

	.user-video-call-contrainer {
		/* display: flex;
  		justify-content: center; */
		position: relative;

	}

    .user-video-call-bar div div { /* ของ bar ล่าง  */
        border-radius: 10px;
    }

    .user-video-call-bar div div .profile_image{ /* ของ bar ล่าง  */
        width: 50px;
        height: 50px;
        border-radius: 50%; /* คงรูปร่างวงกลม */
        object-fit: cover;
        pointer-events: none;
    }

    #container_user_video_call div div .profile_image{ /* ของ container ใหญ่ */
        width: 150px;
        height: 150px;
        border-radius: 50%; /* คงรูปร่างวงกลม */
        object-fit: cover;
        pointer-events: none;
    }

	#container_user_video_call {
		width: 100%;
		height: 100%;
		overflow: auto;
		padding: 1px 2rem;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	#container_user_video_call .custom-div {
		aspect-ratio: 16/9;
		width: 100%;
		outline: #000 1px solid;
		border-radius: 5px;
		position: relative;
        background-color: #4d4d4d;
        margin: 5px;
	}

	#container_user_video_call  .custom-div:only-child{
		flex: 0 0 calc(100% - 40px);
	}
	#container_user_video_call  .custom-div:not(:only-child) {
		flex: 0 0 calc(50% - 40px);
	}

    .transparent-div {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 3;
        background: rgba(255, 255, 255, 0);
    }


    .custom-div .status-sound-output{
		position: absolute;
		top: 0;
		left: 0;
		display: flex;
	}

	.custom-div .status-input-output{
		position: absolute;
		top: 0;
		right: 0;
		display: flex;
	}

	.custom-div .infomation-user{
		position: absolute;
		bottom: 0;
		right: 0;
		background-color: rgba(132, 136, 140 , 0.8);
		padding: .5rem 1rem;
		border-radius: 10px;
		margin: 1rem;
		color: #ffffff !important;
	}

	.infomation-user .role-user-video-call ,.infomation-user .name-user-video-call{
		display: block;
	}
	.status-input-output .mic ,.status-input-output .camera,.status-sound-output .sound{
		margin: 5px;
		background-color: rgba(132, 136, 140 , 0.8);
		padding: .5rem 1rem;
		border-radius: 10px;
		color: #ffffff;
	}

    .user-video-call-bar .custom-div {
		border-radius: 10px;
	}

	.user-video-call-bar .custom-div .infomation-user{
		transform: scale(0.5);
		margin: 0;
		bottom: -10px;
		right: -10px;
	}

	.user-video-call-bar .custom-div .status-input-output{
		transform: scale(0.7);
		margin: 0;
		top: -3px;
		right: -10px;
	}

    .video-call-contrainer {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
	}

    .grid-template {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

/* } */
</style>

<!-- ========================================== layout video call ========================================== -->
<div class="d-flex justify-content-center align-items-center">
    <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>

<div class="row full-height">
    <!-- สำหรับ loading ก่อนเข้า videocall -> จะลบออกหลังจากโหลดเสร็จ -->

	<div class="Scenary"></div>
	<div class="col-12 col-lg-2">
		<div class="data-sos text-center p-3 d-flex row">
			<h4 class="mt-3 col-12 ">รหัสเคส: {{$sos_id}}
                <button id="join" class="btn btn-success d-none" >เข้าร่วม</button>
                <button id="leave" class="btn btn-danger " >ออกห้อง</button>
                {{-- <button id="addButton" style="position: absolute;top:10%;right: 0;">เพิ่ม div</button> --}}
            </h4>
			<div class="d-flex">
				<div id="divForVideoButton" class="align-self-end w-100">

                    <button class="btn btn-primary " id="btn_switchCamera" onclick="switchCamera();">
                        <i class="fa-solid fa-camera-rotate"></i>
                    </button>
                    <!-- เปลี่ยนไมค์ ให้กดได้แค่ในคอม -->
                    <button class="btn btn-primary" id="btn_switchMicrophone" onclick="switchMicrophone();">
                        <i class="fa-solid fa-microphone-stand"></i>
                    </button>

                    <button class="btnDevice  btn dropdown-toggle btn_for_select_video_device d-none" type="button" data-toggle="modal" data-target="#video_device" style=" width: 20px !important;height: 20px !important; padding: 0 !important; ">
                        <i class="fa-solid fa-chevron-down fa-2xs"></i>
                    </button>
                    <button class="btnDevice  btn dropdown-toggle btn_for_select_audio_device d-none" type="button" data-toggle="modal" data-target="#audio_device" style=" width: 20px !important;height: 20px !important; padding: 0 !important; ">
                        <i class="fa-solid fa-chevron-down fa-2xs"></i>
                    </button>


					{{-- <button class="btn btn-success">asd</button>
					<button class="btn btn-success">asd</button>
					<button class="btn btn-success">asd</button> --}}
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-lg-10 full-height d-flex row">
		<div class="video-call">
			<div class=" d-flex align-item-center justify-content-center h-100 row">
                <!-- Modal -->
                <div class="modal fade" id="video_device" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <button id="ปุ่มนี้สำหรับปิด_modal" type="button" class="btn m-2" data-dismiss="modal" aria-label="Close" style="position: relative; top:10;right: 10px;color:#4d4d4d;z-index: 9999999999;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <div class="modal-body">
                                <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                                <div id="video-device-list"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="audio_device" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <button id="ปุ่มนี้สำหรับปิด_modal" type="button" class="btn m-2" data-dismiss="modal" aria-label="Close" style="position: relative; top:10;right: 10px;color:#4d4d4d;z-index: 9999999999;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <div class="modal-body">
                                <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                                <div id="audio-device-list"></div>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="d-flex align-self-center">
					<div class="row" id="container_user_video_call">
                        <!--  วิดีโอคอล tag ถูกสร้างในนี้-->
					</div>
				</div>

				<!-- <div class="bg-success test col">user4</div> -->
				<div class="w-100 user-video-call-contrainer d-none">
					<div class="d-flex justify-content-center align-self-end d-non user-video-call-bar">
						<!--  วิดีโอคอล tag ถูกสร้างในนี้-->
					</div>
                    <button class="btn-show-hide-user-video-call btn" style="z-index: 25 " onclick="toggleUserVideoCallBar();">
                        <i id="icon_show_hide" class="fa-duotone fa-chevrons-down"></i>
                        <span id="text_show_hide"> ซ่อน</span>
                    </button>

					{{-- <button class="btn-show-hide-user-video-call btn" style="z-index: 2" onclick="document.querySelector('.user-video-call-bar').classList.toggle('d-none');">ซ่อน</button> --}}
				</div>
			</div>
		</div>
	</div>

</div>

<!-- ========================================== javascript ========================================== -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

{{-- <script src="{{ asset('js/for_video_call_4/resize_div_video_call.js') }}"></script> --}}
<script src="{{ asset('js/for_video_call_4/video_call_4.js') }}"></script>

<script>

</script>

<script>
    var options;
    // ใช้สำหรับ เช็คสถานะของปุ่มเปิด-ปิด วิดีโอและเสียง
    var isVideo = true;
    var isAudio = true;

    // ใช้สำหรับ เช็คสถานะของปุ่มเปิด-ปิด วิดีโอและเสียง ตอนเริ่มเข้าวิดีโอคอล
    var videoTrack = '{{$videoTrack}}';
    var audioTrack = '{{$audioTrack}}';

    var useSpeaker = '{{$useSpeaker}}';
    var useMicrophone = '{{$useMicrophone}}';
    var useCamera = '{{$useCamera}}';

    //สำหรับกำหนดสี background localPlayerContainer
    var bg_local;

    // เรียกสองอันเพราะไม่อยากไปยุ่งกับโค้ดเก่า
    var user_id = '{{ Auth::user()->id }}';
    var user_data = @json(Auth::user());

    var appId = '{{ env("AGORA_APP_ID") }}';
    var appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
    var sos_1669_id = '{{ $sos_id }}';

    var remote_in_room = [];

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

        role: '',
    };

    document.addEventListener('DOMContentLoaded', (event) => {

        function LoadingVideoCall() {
            const loadingAnime = document.getElementById('lds-ring');

            setTimeout(() => {
                //หลังจากสร้าง localPlayerContainer เสร็จให้เอา animation loading ออก
                if(loadingAnime){
                    loadingAnime.classList.remove('d-none');
                }
                fetch("{{ url('/') }}/api/video_call_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId)
                    .then(response => response.json())
                    .then(result => {
                        console.log("GET Token success");
                        // console.log(result);
                        // console.log(result['privilegeExpiredTs']);

                        options['token'] = result['token'];

                        // ตั้งค่าเวลาที่ต้องการให้แจ้งเตือน
                        const expirationTimestamp = result['privilegeExpiredTs']; // เปลี่ยนเป็นเวลาที่คุณต้องการ
                        // เริ่มตรวจสอบเวลาและแจ้งเตือนในระยะเวลาที่กำหนด
                                        // ห้องหมดเวลา
                        function checkAndNotifyExpiration(expirationTimestamp) {
                            const currentTimestamp = Math.floor(Date.now() / 1000); // แปลงเป็น timestamp ในรูปแบบวินาที

                            if (currentTimestamp >= expirationTimestamp) {
                                // เวลาหมดแล้ว ให้แสดงข้อความแจ้งเตือนหรือทำการแจ้งเตือนผ่านทาง UI ตามที่คุณต้องการ
                                document.getElementById('leave').click();
                            }
                        }

                        setInterval(() => {
                            checkAndNotifyExpiration(expirationTimestamp);
                        }, 1000);

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

        /////////////////////// ปุ่มสลับ กล้อง /////////////////////
        const btn_switchCamera = document.querySelector('#btn_switchCamera');
        /////////////////////// ปุ่มสลับ ไมค์ /////////////////////
        const btn_switchMicrophone = document.querySelector('#btn_switchMicrophone');

        let remotePlayerContainer = [];

        let localPlayerContainer = document.createElement('div');
        // Specify the ID of the DIV container. You can use the uid of the local user.
        localPlayerContainer.id = options.uid;

        // Set the local video container size.
        localPlayerContainer.style.backgroundColor = "gray";
        localPlayerContainer.style.width = "100%";
        localPlayerContainer.style.height = "100%";
        localPlayerContainer.style.position = "absolute";
        localPlayerContainer.style.left = "0";
        localPlayerContainer.style.top = "0";
        localPlayerContainer.classList.add('agora_create_local');

        //======== ทุก 20 วิ ให้เช็คว่า div .custom-div ที่มี id ของคนที่ไม่ได้อยู่ในห้องนี้แล้ว --> ถ้าเจอให้ลบ div ทิ้ง =========
        setInterval(() => {
            let customDivAll = document.querySelectorAll(".custom-div");
            let remoteUsers = agoraEngine['remoteUsers'];
            console.log('remoteUsers :' + remoteUsers);
            customDivAll.forEach(element => {
                let id = element.id;

                // ตรวจสอบว่า id ของ element เริ่มต้นด้วย "videoDiv"
                if (id.startsWith("videoDiv")) {
                    // แยก UID จาก id โดยตัด "videoDiv" ออก
                    let uid = id.replace("videoDiv", "");

                    // ตรวจสอบว่า UID นี้อยู่ใน remoteUsers หรือไม่
                    if (!remoteUsers[uid]) {
                        if(!localPlayerContainer.id){
                            // ถ้าไม่มีให้ลบ element ออก
                            element.remove();
                        }
                    }
                }
            });
        }, 20000);
        //=====================================================================================================

        // ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
        agoraEngine.enableAudioVolumeIndicator();

        agoraEngine.on("volume-indicator", volumes => {
            volumes.forEach((volume) => {
                // console.log("in to SoundCheck Local");
                let localAudioTrackCheck = channelParameters.localAudioTrack;

                if (localPlayerContainer.id == volume.uid && volume.level >= 50) {
                    //ถ้า localAudioTrackCheck เป็นค่าเก่า ให้แทนที่ด้วยค่าใหม่
                    if (localAudioTrackCheck !== channelParameters.localAudioTrack) {
                        localAudioTrackCheck = channelParameters.localAudioTrack;
                    }
                    //แสดงชื่ออุปกรณ์ที่ใช้และระดับเสียง
                    if (localAudioTrackCheck) {
                        if (localAudioTrackCheck['enabled'] === true) {
                            console.log('Enabled Device: ' + localAudioTrackCheck['_deviceName']);
                            console.log(`UID ${volume.uid} Level ${volume.level}`);
                        }
                    } else {
                        console.log('channelParameters.localAudioTrack is null');
                    }

                    // แสดงปุ่มเสียงพูด"
                    if (document.querySelector('#statusMicrophoneOutput_local').classList.contains('d-none')) {
                        document.querySelector('#statusMicrophoneOutput_local').classList.remove('d-none');
                    }

                } else {
                    //ถ้า localAudioTrackCheck เป็นค่าเก่า ให้แทนที่ด้วยค่าใหม่
                    if (localAudioTrackCheck !== channelParameters.localAudioTrack) {
                        localAudioTrackCheck = channelParameters.localAudioTrack;
                    }
                    //แสดงชื่ออุปกรณ์ที่ใช้และระดับเสียง
                    if (localAudioTrackCheck) {
                        if (localAudioTrackCheck['enabled'] === true) {
                            console.log('Enabled Device: ' + localAudioTrackCheck['_deviceName']);
                            console.log(`UID ${volume.uid} Level ${volume.level}`);
                        }
                    } else {
                        console.log('channelParameters.localAudioTrack is null');
                    }

                    // ซ่อนปุ่มเสียงพูด"
                    if (!document.querySelector('#statusMicrophoneOutput_local').classList.contains('d-none')) {
                        document.querySelector('#statusMicrophoneOutput_local').classList.add('d-none');
                    }
                }
            });
        })
        // Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
        agoraEngine.on("user-published", async (user, mediaType) =>
        {
            await agoraEngine.subscribe(user, mediaType);
            console.log("subscribe success");
            console.log("user");
            console.log(user);

            // Set the remote video container size.
            remotePlayerContainer[user.uid] = document.createElement("div");
            remotePlayerContainer[user.uid].style.backgroundColor = "black";
            remotePlayerContainer[user.uid].style.width = "100%";
            remotePlayerContainer[user.uid].style.height = "100%";
            remotePlayerContainer[user.uid].style.position = "absolute";
            remotePlayerContainer[user.uid].style.left = "0";
            remotePlayerContainer[user.uid].style.top = "0";

            // ตรวจสอบว่า user.uid เป็นไอดีของ remote user ที่คุณเลือก
            if (mediaType == "video" && user.videoTrack)
            {
                channelParameters.remoteVideoTrack = user.videoTrack;
                channelParameters.remoteAudioTrack = user.audioTrack;

                console.log("============== channelParameters.remoteVideoTrack ใน published  ==================");
                console.log(channelParameters.remoteVideoTrack);

                channelParameters.remoteUid = user.uid.toString();
                remotePlayerContainer[user.uid].id = user.uid.toString();

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                var name_remote;
                fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid)
                    .then(response => response.json())
                    .then(result => {
                        console.log("result published");
                        console.log(result);

                        bg_remote = result.hexcolor;
                        name_remote = result.name;

                        console.log("โหลดข้อมูล RemoteUser สำเร็จ published");
                        console.log(name_remote);
                        console.log(bg_remote);
                        // สำหรับ สร้าง divVideo ตอนผู้ใช้เปิดกล้อง
                        create_element_remotevideo_call(remotePlayerContainer[user.uid], name_remote , bg_remote ,user);

                        channelParameters.remoteVideoTrack.play(remotePlayerContainer[user.uid]);
                        // Set a stream fallback option to automatically switch remote video quality when network conditions degrade.
                        agoraEngine.setStreamFallbackOption(channelParameters.remoteUid, 1);
                })
                .catch(error => {
                    console.log("โหลดข้อมูล RemoteUser ล้มเหลว published");
                });

                if(user.hasVideo == false){
                    // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                    document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    // เปลี่ยน ไอคอนวิดีโอเป็น เปิด
                    document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-video"></i>';
                }

                // if(user.hasAudio == false){
                //     // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                //     document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                // }else{
                //     // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                //     document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                // }

                // channelParameters.remoteVideoTrack.play(remotePlayerContainer);

                // Set a stream fallback option to automatically switch remote video quality when network conditions degrade.
                agoraEngine.setStreamFallbackOption(channelParameters.remoteUid, 1);

            }

            if (mediaType == "audio")
            {
                channelParameters.remoteAudioTrack = user.audioTrack;
                channelParameters.remoteAudioTrack.play();

                // if(user.hasVideo == false){
                //     // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                //     document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                // }else{
                //     // เปลี่ยน ไอคอนวิดีโอเป็น เปิด
                //     document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-video"></i>';
                // }

                if(user.hasAudio == false){
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

                //ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
                agoraEngine.on("volume-indicator", volumes => {
                    volumes.forEach((volume, index) => {

                        if (channelParameters.remoteUid == volume.uid && volume.level >= 50) {
                            console.log(`${index} UID ${volume.uid} Level ${volume.level}`);
                            // console.log("Remote พูดแล้ว");

                            if (document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.contains('d-none')) {
                                document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.remove('d-none');
                            }

                        } else if (channelParameters.remoteUid == volume.uid && volume.level < 50) {
                            console.log(`${index} UID ${volume.uid} Level ${volume.level}`);
                             // เลือก element ที่มี ID "statusMicrophoneOutput_remote_"
                            if (!document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.contains('d-none')) {
                                document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.add('d-none');
                            }
                        }
                    });
                })
            }

        });

        // Listen for the "user-unpublished" event.
        agoraEngine.on("user-unpublished", async (user, mediaType) =>
        {
            console.log("เข้าสู่ user-unpublished");
            console.log("agoraEngine");
            console.log(agoraEngine);

            if(mediaType == "video"){
                if (user.hasVideo == false) {

                    console.log("สร้าง Div_Dummy ของ" + user.uid);
                    console.log(user);

                    let name_remote_user_unpublished;
                    let profile_remote_user_unpublished;
                    let hexcolor;
                    fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid)
                        .then(response => response.json())
                        .then(result => {
                            // console.log("result");
                            // console.log(result);
                            name_remote_user_unpublished = result.name;
                            hexcolor = result.hexcolor;

                            if(result.photo){
                                profile_remote_user_unpublished = "{{ url('/storage') }}" + "/" + result.photo;
                            }else if(!result.photo && result.avatar){
                                profile_remote_user_unpublished = result.avatar;
                            }else{
                                profile_remote_user_unpublished = "https://www.viicheck.com/Medilab/img/icon.png";
                            }
                            // สำหรับ สร้าง div_dummy ตอนผู้ใช้ไม่ได้เปิดกล้อง
                            create_dummy_videoTrack(user,name_remote_user_unpublished,profile_remote_user_unpublished,hexcolor);

                            // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                            if(user.hasVideo == false){
                                // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                                document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                            }else{
                                // เปลี่ยน ไอคอนวิดีโอเป็น เปิด
                                document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-video"></i>';
                            }

                            // if(user.hasAudio == false){
                            //     // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                            //     document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                            // }else{
                            //     // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                            //     document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                            // }

                    })
                    .catch(error => {
                        console.log("โหลดข้อมูล RemoteUser ล้มเหลว");
                    });

                }
            }

            if(mediaType == "audio"){
                // ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
                console.log('unpublished AudioTrack:');
                // console.log(channelParameters.localAudioTrack);

                // ถ้าไมค์ทำงานใน unpublished จะพบเมื่อผู้ใช้เข้ามาครั้งแรกแล้ว ปิดกล้อง แต่ เปิดไมค์
                if(user.hasAudio == true){
                    agoraEngine.on("volume-indicator", volumes => {
                        volumes.forEach((volume, index) => {
                            if (user['uid'] == volume.uid && volume.level > 50) {
                                console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                if (document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.contains('d-none')) {
                                    document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.remove('d-none');
                                }
                            } else if (user['uid'] == volume.uid && volume.level < 50) {
                                console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                if (!document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.contains('d-none')) {
                                    document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.add('d-none');
                                }

                            }
                        });
                    })
                }

                if(user.hasAudio == false){
                    console.log("if unpublished");
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    console.log("else unpublished");
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

            }


        });

        // เมื่อมีคนเข้าห้อง
        agoraEngine.on("user-joined", function (evt) {

            console.log("agoraEngine มีคนเข้าห้องมา");
            console.log(agoraEngine);

            // เสียงแจ้งเตือน เวลาคนเข้า
            let audio_ringtone_join = new Audio("{{ asset('sound/join_room_1.mp3') }}");
                audio_ringtone_join.play();

            // หยุดการเล่นเสียงหลังจาก 1 วินาที
            setTimeout(function() {
                audio_ringtone_join.pause();
                audio_ringtone_join.currentTime = 0; // เริ่มเสียงใหม่เมื่อต้องการเล่นอีกครั้ง
            }, 1000);

            //=================     สำหรับ Senior Benze  =========================
            // fetch("{{ url('/') }}/api/join_room_4" + "?user_id=" + evt.uid)
            //     .then(response => response.json())
            //     .then(result => {

            // })
            // .catch(error => {
            //     console.log("โหลด เมื่อมีคนเข้าห้อง ล้มเหลว");
            // });
            //=================     จบ สำหรับ Senior Benze  =========================

            if(agoraEngine['remoteUsers'][0]){
                if( agoraEngine['remoteUsers']['length'] != 0 ){
                    for(let c_uid = 0; c_uid < agoraEngine['remoteUsers']['length']; c_uid++){

                        const dummy_remote = agoraEngine['remoteUsers'][c_uid];
                        console.log(dummy_remote);

                        if(dummy_remote['hasVideo'] == false){ //ถ้า remote คนนี้ ไม่ได้เปิดกล้องไว้ --> ไปสร้าง div_dummy
                            let name_remote_user_joined;
                            let profile_remote_user_joined;
                            let hexcolor;
                            fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + dummy_remote.uid)
                                .then(response => response.json())
                                .then(result => {
                                    // console.log("result");
                                    // console.log(result);
                                    name_remote_user_joined = result.name;
                                    hexcolor = result.hexcolor;
                                    if(result.photo){
                                        profile_remote_user_joined = "{{ url('/storage') }}" + "/" + result.photo;
                                    }else if(!result.photo && result.avatar){
                                        profile_remote_user_joined = result.avatar;
                                    }else{
                                        profile_remote_user_joined = "https://www.viicheck.com/Medilab/img/icon.png";
                                    }

                                    create_dummy_videoTrack(dummy_remote,name_remote_user_joined,profile_remote_user_joined,hexcolor);
                                    console.log("Dummy Created !!!");

                                    // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                                    document.querySelector('#camera_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

                                    //เช็คว่าไมค์ของเขาเปิดหรือไม่
                                    if(dummy_remote['hasAudio'] == false){ //ถ้า remote คนนี้ ไม่ได้เปิดไมไว้ --> ไปสร้าง div_dummy
                                        // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                                        document.querySelector('#mic_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                                    }else{
                                        // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                                        document.querySelector('#mic_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';

                                        agoraEngine.on("volume-indicator", volumes => {

                                            volumes.forEach((volume, index) => {
                                                if (dummy_remote['uid'] == volume.uid && volume.level > 50) {
                                                    console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                                    if (document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.contains('d-none')) {
                                                        document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.remove('d-none');
                                                    }
                                                } else if (dummy_remote['uid'] == volume.uid && volume.level < 50) {
                                                    console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                                    if (!document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.contains('d-none')) {
                                                        document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.add('d-none');
                                                    }

                                                }
                                            });
                                        })
                                    }
                            })
                            .catch(error => {
                                console.log("โหลด เมื่อมีคนเข้าห้อง ล้มเหลว");
                            });

                        }

                    }
                }
            }

            // // เช็คว่ามี div อยู่ใน divใหญ่
            // let userVideoCallBar = document.querySelector(".user-video-call-bar");
            // let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

            // if (customDivsInUserVideoCallBar.length > 0) {
            //     moveAllDivsToContainer();
            // }
            // อัพเดต Div ตามจำนวนคนในห้อง ให้รูปแบบเหมาะสม
        });

        // ออกจากห้อง
        agoraEngine.on("user-left", function (evt) {

            console.log("ไอดี : " + evt.uid + " ออกจากห้อง");

            if(document.getElementById('videoDiv_' + evt.uid)) {
                document.getElementById('videoDiv_' + evt.uid).remove();
            }

            // เช็คว่ามี div .custom-div อยู่ใน div container_user_video_call
            let container = document.getElementById("container_user_video_call");
            let customDivs = container.querySelectorAll(".custom-div");
            //ถ้าไม่มีให้ ย้าย div ใน bar ข้างล่าง ขึ้นมาทั้งหมด
            if (customDivs.length == 0) {
                moveAllDivsToContainer();
            }

            // เสียงแจ้งเตือน เวลาคนเข้า
            let audio_ringtone_left = new Audio("{{ asset('sound/left_room_1.mp3') }}");
            audio_ringtone_left.play();

            // หยุดการเล่นเสียงหลังจาก 1 วินาที
            setTimeout(function() {
                audio_ringtone_left.pause();
                audio_ringtone_left.currentTime = 0; // เริ่มเสียงใหม่เมื่อต้องการเล่นอีกครั้ง
            }, 1000);

            // ถ้าผู้ใช้ เหลือ 0 คน ให้ทำลายห้องทิ้ง
            if(rtcStats.UserCount < 1){
                agoraEngine.destroy();
            }

            console.log("agoraEngine ของ user-left");
            console.log(agoraEngine);

        });


        // local_join
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

                    console.log('หาไมโครโฟน สำเร็จ');
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
                        isAudio = false;
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

                    setTimeout(() => {
                        alert('ไม่สามารถโหลดข้อมูลกล้องได้ กรุณารีเฟรชหน้าจอ');
                    }, 2000);

                }

                //ดึงข้อมูลผู้ใช้งานจาก auth
                let name_local = user_data.name;
                console.log("name_local");
                console.log(name_local);
                let profile_local;

                if(user_data.photo){
                    profile_local = "{{ url('/storage') }}" + "/" + user_data.photo;
                }else if(!user_data.photo && user_data.avatar){
                    profile_local = user_data.avatar;
                }else{
                    profile_local = "https://www.viicheck.com/Medilab/img/icon.png";
                }

                //===== สุ่มสีพื้นหลังของ localPlayerContainer=====
                fetch("{{ url('/') }}/api/get_local_data_4" + "?user_id=" + options.uid)
                    .then(response => response.json())
                    .then(result => {
                        console.log("result local_data_4");
                        console.log(result);

                        bg_local = result.hexcolor;

                        changeBgColor(bg_local);
                })
                .catch(error => {
                    console.log("โหลดข้อมูล LocalUser ล้มเหลว ใน get_local_data_4");
                });
                //===== จบส่วน สุ่มสีพื้นหลังของ localPlayerContainer =====

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                create_element_localvideo_call(localPlayerContainer,name_local,profile_local);
                // Play the local video track.
                channelParameters.localVideoTrack.play(localPlayerContainer);

                // เอาหน้าโหลดออก
                document.querySelector('#lds-ring').remove();

                //======= สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน ==========//
                btn_toggle_mic_camera(videoTrack,audioTrack);

                document.querySelector('#muteVideo').addEventListener("click", function(e) {
                    if (isVideo == false) {
                        console.log(bg_local);
                        changeBgColor(bg_local);
                    }
                });

                if(isAudio == true){
                    agoraEngine.publish([channelParameters.localAudioTrack]);
                }

                try { // เช็คสถานะจากห้องทางเข้า แล้วเลือกกดเปิด-ปิด ตามสถานะ
                    if(videoTrack == "open"){
                        // เข้าห้องด้วย->สถานะเปิดกล้อง
                        isVideo = false;
                        document.querySelector('#muteVideo').click();
                        console.log("Click open video ===================");
                    }else{
                        // เข้าห้องด้วย->สถานะปิดกล้อง
                        isVideo = true;
                        document.querySelector('#muteVideo').click();
                        console.log("Click close video ===================");
                    }

                    if(audioTrack == "open"){
                        // เข้าห้องด้วย->สถานะเปิดไมค์
                        isAudio = false;
                        document.querySelector('#muteAudio').click();
                        console.log("Click open audio ===================");
                    }else{
                        // เข้าห้องด้วย->สถานะปิดไมค์
                        isAudio = true;
                        document.querySelector('#muteAudio').click();
                        console.log("Click close audio ===================");
                    }
                }
                catch (error) {
                    console.log('ส่งตัวแปร videoTrack audioTrack ไม่สำเร็จ');
                }

                // console.log('AudioTrack:');
                // console.log(channelParameters.localAudioTrack);
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

                // function goBack() {
                //     window.location.href = '{{ url('/video_call_4/before_video_call_4' . '/' . $sos_id , ['refresh' => true]) }}';
                //     // location.reload();
                // }

                function goBack(){
                    window.history.back();
                }
                goBack();
            }
        }

        //=============================================================================//
        //                               สลับอุปกรณ์                                     //
        //=============================================================================//

        var activeVideoDeviceId
        var activeAudioDeviceId

        window.addEventListener('DOMContentLoaded', async () => {
            try {
                // เรียกดูอุปกรณ์ทั้งหมด
                const devices = await navigator.mediaDevices.enumerateDevices();

                // เรียกดูอุปกรณ์ที่ใช้อยู่
                const stream = await navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: true
                });

                if(useMicrophone){
                    activeAudioDeviceId = useMicrophone;
                }else{
                    activeAudioDeviceId = stream.getAudioTracks()[0].getSettings().deviceId;
                }

                if(useCamera){
                    activeVideoDeviceId = useCamera;
                }else{
                    activeVideoDeviceId = stream.getVideoTracks()[0].getSettings().deviceId;
                }


            } catch (error) {
                console.error('เกิดข้อผิดพลาดในการเรียกดูอุปกรณ์:', error);
            }

        });

        var old_activeAudioDeviceId ;

        // เรียกใช้งานเมื่อต้องการเปลี่ยนอุปกรณ์เสียง
        function onChangeAudioDevice() {

            old_activeAudioDeviceId = activeAudioDeviceId;

            const selectedAudioDeviceId = getCurrentAudioDeviceId();
            // console.log('อุปกรณ์เสียงเดิม:', activeAudioDeviceId);
            // console.log('เปลี่ยนอุปกรณ์เสียงเป็น:', selectedAudioDeviceId);

            activeAudioDeviceId = selectedAudioDeviceId ;

            // สร้าง local audio track ใหม่โดยใช้อุปกรณ์ที่คุณต้องการ
            AgoraRTC.createMicrophoneAudioTrack({
                encoderConfig: "high_quality_stereo",
                microphoneId: selectedAudioDeviceId
            })
            .then(newAudioTrack => {

                // หยุดการส่งเสียงจากอุปกรณ์ปัจจุบัน
                channelParameters.localAudioTrack.setEnabled(false);

                agoraEngine.unpublish([channelParameters.localAudioTrack]);

                // ปิดการเล่นเสียงเดิม
                // channelParameters.localAudioTrack.stop();
                // channelParameters.localAudioTrack.close();

                // เปลี่ยน local audio track เป็นอุปกรณ์ใหม่
                channelParameters.localAudioTrack = newAudioTrack;

                channelParameters.localAudioTrack.play();

                if(isAudio == true){
                    // เริ่มส่งเสียงจากอุปกรณ์ใหม่
                    channelParameters.localAudioTrack.setEnabled(true);
                    channelParameters.localAudioTrack.play();

                    agoraEngine.publish([channelParameters.localAudioTrack]);

                    // isAudio = true;
                    console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
                    console.log('เข้า if => isAudio == true');
                    console.log(channelParameters.localAudioTrack);
                }
                else {
                    channelParameters.localAudioTrack.setEnabled(false);
                    // channelParameters.localAudioTrack.play();
                    // isAudio = false;
                    console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
                    console.log('เข้า else => isAudio == false');
                    console.log(channelParameters.localAudioTrack);
                }

            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการสร้าง local audio track:', error);

                selectedAudioDeviceId = old_activeAudioDeviceId;
            });
        }

        var old_activeVideoDeviceId ;

        function onChangeVideoDevice() {

            old_activeVideoDeviceId = activeVideoDeviceId ;

            const selectedVideoDeviceId = getCurrentVideoDeviceId();
            console.log('เปลี่ยนอุปกรณ์กล้องเป็น:', selectedVideoDeviceId);

            activeVideoDeviceId = selectedVideoDeviceId ;

            // สร้าง local video track ใหม่โดยใช้กล้องที่คุณต้องการ
            AgoraRTC.createCameraVideoTrack({ cameraId: selectedVideoDeviceId })
            .then(newVideoTrack => {

                // console.log('------------ newVideoTrack ------------');
                // console.log(newVideoTrack);
                // console.log('------------ channelParameters.localVideoTrack ------------');
                // console.log(channelParameters.localVideoTrack);
                // console.log('------------ localPlayerContainer ------------');
                // console.log(localPlayerContainer);

                // // หยุดการส่งภาพจากอุปกรณ์ปัจจุบัน
                channelParameters.localVideoTrack.setEnabled(false);

                agoraEngine.unpublish([channelParameters.localVideoTrack]);
                // console.log('------------unpublish localVideoTrack ------------');

                // ปิดการเล่นภาพวิดีโอกล้องเดิม
                channelParameters.localVideoTrack.stop();
                channelParameters.localVideoTrack.close();
                // console.log('------------stop localVideoTrack ------------');
                // console.log('------------close localVideoTrack ------------');
                // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
                channelParameters.localVideoTrack = newVideoTrack;
                // console.log('------------ channelParameters.localVideoTrack = newVideoTrack ------------');
                // console.log(channelParameters.localVideoTrack);

                channelParameters.localVideoTrack.play(localPlayerContainer);

                if (isVideo == true) {

                    // เริ่มส่งภาพจากอุปกรณ์ใหม่
                    channelParameters.localVideoTrack.setEnabled(true);
                    // แสดงภาพวิดีโอใน <div>

                    channelParameters.localVideoTrack.play(localPlayerContainer);
                    channelParameters.remoteVideoTrack.play(remotePlayerContainer);

                    // ส่ง local video track ใหม่ไปยังผู้ใช้คนที่สอง
                    agoraEngine.publish([channelParameters.localVideoTrack]);
                    // alert('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
                    // console.log('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
                }
                else {
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

        var now_Mobile_Devices = 1;

        btn_switchCamera.onclick = async function()
        {
            console.log('btn_switchCamera');

            console.log('activeVideoDeviceId');
            console.log(activeVideoDeviceId);

            // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
            let deviceType = checkDeviceType();
            console.log("Device Type:", deviceType);

            // เรียกดูอุปกรณ์ทั้งหมด
            let devices = await navigator.mediaDevices.enumerateDevices();

            // เรียกดูอุปกรณ์ที่ใช้อยู่
            let stream = await navigator.mediaDevices.getUserMedia({
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
            radio.addEventListener('change', onChangeVideoDevice);

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

            }

        }

        btn_switchMicrophone.onclick = async function()
        {
            console.log('btn_switchMicrophone');

            console.log('activeAudioDeviceId');
            console.log(activeAudioDeviceId);

            // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
            let deviceType = checkDeviceType();
            console.log("Device Type:", deviceType);

            // เรียกดูอุปกรณ์ทั้งหมด
            let devices = await navigator.mediaDevices.enumerateDevices();

            // เรียกดูอุปกรณ์ที่ใช้อยู่
            let stream = await navigator.mediaDevices.getUserMedia({
                audio: true,
                video: true
            });

            // แยกอุปกรณ์ตามประเภท
            let audioDevices = devices.filter(device => device.kind === 'audioinput');

            console.log('------- audioDevices -------');
            console.log(audioDevices);
            console.log('length ==>> ' + audioDevices.length);
            console.log('------- ------- -------');

            // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
            let audioDeviceList = document.getElementById('audio-device-list');
                audioDeviceList.innerHTML = '';

            let count_i = 1 ;

            audioDevices.forEach(device => {
            const radio2 = document.createElement('input');
                radio2.type = 'radio';
                radio2.id = 'audio-device-' + count_i;
                radio2.name = 'audio-device';
                radio2.value = device.deviceId;

            if (deviceType == 'PC'){
                radio2.checked = device.deviceId === activeAudioDeviceId;
            }

            let label = document.createElement('label');
                label.classList.add('dropdown-item');
                label.appendChild(radio2);
                label.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${audioDeviceList.children.length + 1}`));

            audioDeviceList.appendChild(label);
            radio2.addEventListener('change', onChangeAudioDevice);

            count_i = count_i + 1 ;
            });


            // ---------------------------

            if (deviceType == 'PC'){
                document.querySelector('.btn_for_select_audio_device').click();
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

        //=============================================================================//
        //                              จบ -- สลับอุปกรณ์                                //
        //=============================================================================//

    }

    //============ โยกย้าย Div   =================//

    // ตรวจสอบว่า div อยู่ใน .user-video-call-bar หรือไม่
    function isInUserVideoCallBar(div) {
        return div.parentElement === document.querySelector(".user-video-call-bar");
    }

    // ย้าย div ไปยัง .user-video-call-bar หากไม่อยู่ในนั้นและสลับ div
    function moveDivsToUserVideoCallBar(clickedDiv) {
        let container = document.getElementById("container_user_video_call");
        let customDivs = container.querySelectorAll(".custom-div");
        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        document.querySelector(".user-video-call-contrainer").classList.remove("d-none");

        customDivs.forEach(function(div) {
            if (div !== clickedDiv) { //ถ้า div ไม่ใช่ div ที่ถูกคลิก
                if (!isInUserVideoCallBar(div)) { //ถ้า div ไม่ได้อยู่ใน div .user-video-call-bar
                    userVideoCallBar.appendChild(div);
                }
            }
        });

        // ย้าย div ที่ถูกคลิกไปยังตำแหน่งที่ถูกคลิก
        if (!isInUserVideoCallBar(clickedDiv)) {
            container.appendChild(clickedDiv);
        }


    }

    // ย้ายทุก div ใน .user-video-call-bar ไปยัง #container_user_video_call
    function moveAllDivsToContainer() {
        let container = document.getElementById("container_user_video_call");
        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
        document.querySelector(".user-video-call-contrainer").classList.add("d-none");

        customDivsInUserVideoCallBar.forEach(function(div) {
            container.appendChild(div);
        });

    }

    // จัดเรียกใช้งานเมื่อคลิกที่ div
    function handleClick(clickedDiv) {
        let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

        if (customDivsInUserVideoCallBar.length > 0) {
            moveAllDivsToContainer();
        } else {
            moveDivsToUserVideoCallBar(clickedDiv);
        }
    }

    // เพิ่ม event listener บน .user-video-call-bar สำหรับสลับ div
    document.querySelector(".user-video-call-bar").addEventListener("click", function(e) {
        if (e.target.classList.contains("custom-div")) {
            handleClick(e.target);
        }
    });

    // สร้างฟังก์ชันสำหรับการสลับข้อความของปุ่ม
    function toggleUserVideoCallBar() {
        var button = document.querySelector('.btn-show-hide-user-video-call');
        var videoCallBar = document.querySelector('.user-video-call-bar');

        if (videoCallBar.classList.contains('d-none')) {
            videoCallBar.classList.remove('d-none');
            document.getElementById("icon_show_hide").style.transform = "rotate(0deg)";
            // document.querySelector('#text_show_hide').innerHTML = '👇 ซ่อน';
        } else {
            videoCallBar.classList.add('d-none');
            document.getElementById("icon_show_hide").style.transform = "rotate(180deg)";
            // document.querySelector('#text_show_hide').innerHTML = '👆 แสดง';
        }
    }

    //============ จบโยกย้าย Div   =================//

    function removeVideoDiv(elementId)
    {
        console.log("Removing "+ elementId+"Div");
        let Div = document.getElementById(elementId);
        if (Div)
        {
            Div.remove();
        }
    };

    function changeBgColor(bg_local){
        // เซ็ท bg-local เป็นสีที่ดูด
        console.log("ทำงาน "+bg_local)
        let agoraCreateLocalDiv = document.querySelector(".agora_create_local");
        let divsInsideAgoraCreateLocal = agoraCreateLocalDiv.querySelectorAll("div");
            divsInsideAgoraCreateLocal.forEach(function(div) {
            div.style.backgroundColor = bg_local;
        });
    }


    // เมื่อออกจากห้องโดยไม่ได้กดที่ปุ่ม
    // window.addEventListener('beforeunload', function(event) {
    //     document.getElementById('leave').click();
    // });

</script>

