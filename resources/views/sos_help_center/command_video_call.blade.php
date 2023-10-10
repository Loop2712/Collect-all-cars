
<style>

@keyframes border-flash-danger {
  0% {
    box-shadow: 0 0 0 5px #B22222;
  }
  50% {
    box-shadow: 0 0 0 5px #ffffff;
  }
  100% {
    box-shadow: 0 0 0 5px #B22222;
  }
}

.video-call-in-room{
  background-color: #ffffff;
  color: green;
  animation: border-flash-danger 1.5s infinite;
}

.video-body {
    position: relative;
    width: calc(100%);
}

.video-body-local {
    position: relative;
    width: calc(100%);
}

.btn-disabled {
    background-color: #db2d2e !important;
    color: #fff !important;
  }

.btn-active {
    background-color: green !important;
    color: #fff !important;
  }

.video-local div {
  border-radius:1rem !important;
}
.video-local {
    display: flex;
    margin-top: 1.5rem;
    height: 24rem;
    outline: #000 .1rem solid;
    border-radius: 1rem;
    width: 98%;
    background-color: #D3D3D3;
    background-attachment: fixed;
    background-size: cover;
    margin-left: 1%;
}

.video-remote div {
  border-radius:0.5rem !important;
}

.video-remote {
    width: 4rem;
    height: 4rem;
    background-color: #009e6b;
    outline: #009e6b .3rem solid;
    border-radius: .5rem;
    position: absolute;
    top: 5%;
    right: calc(100% - 95%);
}
.video-menu {
    display: flex;
    width: calc(100%);
    /* outline: #000 1rem solid; */
    border-radius: 1rem;
    position: absolute;
    /* bottom: -20%; */
    margin-top: 1rem;
    justify-content: space-around;
    background-color: #000;
    height: 4rem !important;
    align-items: center;
}

.video-menu button {
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.4);
    color: #fff;
    width: 3rem !important;
    height: 3rem !important;
    /* outline:#fff 1px solid; */
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
}
.video-menu button i{
    font-size: 1rem !important;
}

.video-head {
    display: flex;
    width: calc(100%);
    /* outline: #000 1rem solid; */
    border-radius: 1rem;
    /*position: absolute;*/
    /* bottom: -20%; */
    margin-top: 1rem;
    justify-content: space-around;
    background-color: #BEBEBE;
    height: 4rem !important;
    align-items: center;
}

.video-head button {
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.4);
    color: #fff;
    width: 3rem !important;
    height: 3rem !important;
    /* outline:#fff 1px solid; */
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
}
.video-head button i{
    font-size: 1rem !important;
}

.btn-exit{
    background-color: #db2d2e !important;
}

.btnRemote-open {
  padding: 0 !important;
  font-size: 12px !important;
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
  z-index: 99999;
  background-color: green;
  color: #fff;
}

.btnRemote-close {
  padding: 0 !important;
  font-size: 12px !important;
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
  z-index: 99999;
  background-color: red;
  color: #fff;
}

.containerbtnRemote {
  position: absolute;
  z-index: 999999999;
  bottom: 10px;
  right: 10px;
  position: absolute;
}

  @keyframes sacleupanddown {
    0% {
      transform: scale(0);
    }

    /* Change the percentage here to make it faster */
    10% {
      transform: scale(1);
    }

    /* Change the percentage here to make it stay down for longer */
    90% {
      transform: scale(1);
    }

    /* Keep this at the end */
    100% {
      transform: scale(0);
    }
  }
  
.containerAlert {
  transform: scale(0);
  position: absolute;
  bottom: 150px;
  /* เปลี่ยนจาก top: 10px; เป็น top: 50%; */
  /* outline: #000 1px solid; */
  width: 100%;
  display: flex !important;
  justify-content: center !important;
  align-items: center !important;
  color: #fff !important;
  z-index: 999999;
}

.alertStatus {
  /* transform: scale(0); */
  background-color: rgba(0, 0, 0, 0.3) !important;
  color: #fff !important;
  padding: 3px 10px !important;
  border-radius: 1rem !important;
}

#iconAlert {
  margin-right: .5rem;
}

/* *{
    outline: #000 1px solid;
} */
    </style>

    @php
      $user_in_room = '';

      if(!empty($agora_chat->member_in_room)){

        $data_member_in_room = $agora_chat->member_in_room;

        $data_array = json_decode($data_member_in_room, true);
        $check_user = $data_array['user'];

        if( !empty($check_user) ){
          $user_in_room = App\User::where('id' , $check_user)->first();
        }

      }

    @endphp

    <div id="divVideoCall" class="video-body fade-slide" style="display: none;margin-bottom: 120px;">

      <div id="div_for_alertTime">
        <div class="containerAlert">
          <div class="alertStatus">
            <span id="iconAlert">
            </span>
            <span id="detailAlert">
            </span>
          </div>
        </div>
      </div>
        
        <div class="video-head">

          <span id="span_timer_video_call" class="d-none">
              <span id="icon_timer_video_call" class="">
                <i class="fa-duotone fa-record-vinyl fa-beat-fade" style="--fa-secondary-color: #6e89b4;"></i> 
                &nbsp;&nbsp;เวลาสนทนา : 
              </span>
              <span id="timer_video_call">เริ่มนับเมื่อมีผู้ใช้ 2 คน</span>
          </span>

          <span class="btn btn-success" style="width: 90%;" id="command_join">
            <i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; เริ่มต้นการสนทนา
          </span>

          <span id="btn_close_audio_ringtone" class="btn btn-secondary d-none" onclick="mute_ringtone();">
              <i class="fa-solid fa-volume-slash"></i>
          </span>

        </div>

        <!-- แสดงผลวิดีโอ -->
        <div class="video-body-local">

          <div class="video-local">

            <i id="video_local_slash_screen_1" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;font-size: 50px;z-index:99999;" class="fa-solid fa-video-slash d-none"></i>

            <div id="show_whene_video_no_active" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;">

                @if( empty($user_in_room) )
                <!-- ไม่มีผู้ใช้อยู่ในการสนทนา -->
                <div class="text-center">
                    <img src="{{ url('/img/stickerline/PNG/7.png') }}" style="width: 12rem!important;">
                    <br><br>
                    <h5>ไม่มีผู้ใช้อยู่ในการสนทนา</h5>
                </div>
                @else
                <!-- ผู้ใช้ กำลังรอ -->
                <div class="text-center">
                    @if(!empty($user_in_room->photo))
                      <img src="{{ url('storage')}}/{{ $user_in_room->photo }}" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">
                    @else
                      <img src="{{ url('/img/stickerline/flex/12.png') }}" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">
                    @endif
                    <br><br>
                    <h5>คุณ : {{ $user_in_room->name }}</h5>
                    <h5 class="mt-3 text-danger">ผู้ใช้ กำลังรอ..</h5>
                </div>
                @endif

            </div>

            <div class="containerbtnRemote">
              <button id="btnVideoRemote" class="btnRemote-close d-none"></button>
              <button id="btnMicRemote" class="btnRemote-close d-none"></button>
            </div>
          </div>

          <div class="video-remote d-none">
            <i id="video_local_slash_screen_2" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;font-size: 25px;z-index:99999;" class="fa-solid fa-video-slash d-none"></i>
          </div>

        </div>
        <!-- จบ แสดงผลวิดีโอ -->

        <div class="video-menu d-none">

              <button id="btnMic" class="btn-active d-none">
                  <i class="fa-duotone fa-microphone"></i>
              </button>
              <button id="btnVideo" class="btn-active d-none">
                  <i class="fa-duotone fa-video"></i>
              </button>
            <!-- <button class=" ">
                <i class="fa-solid fa-chevron-up" id="btnShowForm"></i>
            </button> -->
            <button id="leave" class="btn-exit d-none" >
                <i class="fa-solid fa-phone-xmark"></i>
            </button>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<script>

var option;
var sos_1669_id = '{{ $sos_id }}';

var appId = '{{ $app_id }}';
var appCertificate = '{{ $appCertificate }}';

const channelName = "Viicheck";

var channelParameters = {
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


var audio_in_room = new Audio("{{ asset('sound/announcement-sound-21466.mp3') }}");
var audio_ringtone = new Audio("{{ asset('sound/ringtone-126505.mp3') }}");
var isPlaying_ringtone = false;

function play_ringtone() {
  if (!isPlaying_ringtone) {
    audio_ringtone.loop = true;
    audio_ringtone.play();
    isPlaying_ringtone = true;

    check_first_play_ringtone = 1 ;

  }
}

function stop_ringtone() {
  audio_ringtone.pause();
  audio_ringtone.currentTime = 0;
  isPlaying_ringtone = false;

  // อาจจะกระทบกับส่วนอื่น เช็คดีๆนะครับ
  check_first_play_ringtone = 0 ;
}

function mute_ringtone(){
  audio_ringtone.pause();
  audio_ringtone.currentTime = 0;
}

function runLoop_check_appId() {

  let user_in_room = '{{ $user_in_room }}';

  setTimeout(() => {

    fetch("{{ url('/') }}/api/get_appId")
        .then(response => response.json())
        .then(result => {
          // console.log(result);
          appId = result['appId'];
          appCertificate = result['appCertificate'];

          // console.log('ไม่มี ข้อมูลตั้งแต่แรก');
          // console.log(appId);
          // console.log(appCertificate);

          if (!appId && !appCertificate) {
            runLoop_check_appId();
          }else{
            setTimeout(() => {
              document.querySelector('#btnVideoCall').disabled = false;

              if(user_in_room){
                document.querySelector('#command_join').innerHTML = 
                `<i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; สนทนา`;
                document.querySelector('#command_join').classList.add('video-call-in-room');
                document.querySelector('#command_join').classList.remove('btn-success');
                document.querySelector('#command_join').setAttribute('style' , 'width: 60%;');
                document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');

                document.querySelector('#btnVideoCall').click();

                play_ringtone();
                loop_check_user_in_room();

              }else{
                loop_check_user_in_room();
              }

            }, 1000);
          }
    });

  }, 1000);
}

document.addEventListener('DOMContentLoaded', (event) => {

  let user_in_room = '{{ $user_in_room }}';

  if(!appId || !appCertificate){
    runLoop_check_appId();
  }else{
    // console.log('มี ข้อมูลตั้งแต่แรก');
    // console.log(appId);
    // console.log(appCertificate);

    setTimeout(() => {
      document.querySelector('#btnVideoCall').disabled = false;

      if(user_in_room){
        document.querySelector('#command_join').innerHTML = 
        `<i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; สนทนา`;
        document.querySelector('#command_join').classList.add('video-call-in-room');
        document.querySelector('#command_join').classList.remove('btn-success');
        document.querySelector('#command_join').setAttribute('style' , 'width: 60%;');
        document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');

        document.querySelector('#btnVideoCall').click();

        play_ringtone();
        loop_check_user_in_room();

      }else{
        loop_check_user_in_room();
      }

    }, 1000);
  }
  
});

// ตัวแปรสำหรับกำหนดการเล่นเสียง ringtone
var check_command_in_room = false ;
var check_first_play_ringtone = 0 ;
var check_first_play_audio_in_room = 0 ;

// ตัวแปรสำหรับกำหนดการแสดงผลวิดีโอ เริ่มแรกเป็นจอใหญ่เสมอ
var command_screen_current = 1 ;
var video_success ;

function loop_check_user_in_room() {

    check_user_in_room = setInterval(function() {

      // console.log('loop_check_user_in_room');
      // console.log("แจ้งเตือนคนเข้าห้อง >> " + check_command_in_room);

      fetch("{{ url('/') }}/api/check_user_in_room" + "?sos_1669_id=" + sos_1669_id)
        .then(response => response.json())
        .then(result => {
            // console.log('check_user_in_room');
            // console.log(result);
            // console.log('-------------------------------------');

            if(result['data'] != 'ไม่มีข้อมูล'){
              document.querySelector('#command_join').innerHTML = 
              `<i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; สนทนา`;
              document.querySelector('#command_join').classList.add('video-call-in-room');
              document.querySelector('#command_join').classList.remove('btn-success');
              document.querySelector('#command_join').setAttribute('style' , 'width: 60%;');

              let btnVideoCall_sty = document.querySelector('#divVideoCall').getAttribute('style');
                // console.log(btnVideoCall_sty);

              if(btnVideoCall_sty == "display: none;" && video_success != 'OK'){
                document.querySelector('#btnVideoCall').click();
              }

              userJoinRoom = true;

              // กำหนดจอของเจ้าหน้าที่ให้แสดงที่จอ เล็ก
              command_screen_current = 2 ;

              // if(!check_start_timer_video_call){
              //   start_timer_video_call(result['data_agora']['time_start']);
              // }
      
              if( check_command_in_room ){

                if(userJoinRoom == true){
                  // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                  create_html_user_in_room(result['data'] , 'in_room');

                  if(!check_start_timer_video_call){
                    start_timer_video_call(result['data_agora']['time_start']);
                  }

                }else{
                  if(check_start_timer_video_call){
                    myStop_timer_video_call();
                  }
                }

                if( check_first_play_audio_in_room == 0 ){
                  audio_in_room.play();
                  check_first_play_audio_in_room = 1 ;
                }

              }else{

                if(video_success == 'OK'){
                  // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                  create_html_user_in_room(result['data'] , 'end but in_room');
                }else{
                  // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                  create_html_user_in_room(result['data'] , 'wait');
                }

                if( check_first_play_ringtone == 0 && video_success != 'OK'){
                  play_ringtone();
                  document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');
                }

                if(check_start_timer_video_call){
                  myStop_timer_video_call();
                }

              }

              // myStop_check_user_in_room();
            }else{

              video_success = '';

              if(check_start_timer_video_call){
                myStop_timer_video_call();
              }

              userJoinRoom = false;
              // กำหนดจอของเจ้าหน้าที่ให้แสดงที่จอ ใหญ่
              command_screen_current = 1 ;

              stop_ringtone();
              document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');

              document.querySelector('#command_join').innerHTML = 
              `<i class="fa-solid fa-phone-volume"></i> เริ่มต้นการสนทนา`;
              document.querySelector('#command_join').classList.remove('video-call-in-room');
              document.querySelector('#command_join').classList.add('btn-success');
              document.querySelector('#command_join').setAttribute('style' , 'width: 90%;');

              // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
              create_html_user_in_room(result['data'] , 'out');

            }

        });
      
    }, 4000);
}

function myStop_check_user_in_room() {
    clearInterval(check_user_in_room);
}

function create_html_user_in_room(data , type){

  // console.log('create_html_user_in_room');
  // console.log(data);
  // console.log('type >> ' + type);

  // document.querySelector('#show_whene_video_no_active').innerHTML = '';

  let html_img ;
  if (data['photo']){
      html_img = `<img src="{{ url('storage')}}/`+data['photo']+`" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">`;
  }else{
      html_img = `<img src="{{ url('/img/stickerline/flex/12.png') }}" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">`;
  }

  let html_show_status ;
  let class_h5 ;
  if (type == 'wait'){

      class_h5 = '' ;
      class_show_status = 'text-danger' ;
      html_show_status = 'ผู้ใช้ กำลังรอ..' ;

  }else if(type == 'in_room'){

      class_h5 = '' ;
      class_show_status = '' ;
      html_show_status = 'ผู้ใช้ ปิดกล้อง' ;

  }else if(type == 'out'){

    class_h5 = 'd-none' ;
    class_show_status = '' ;
    html_show_status = 'ไม่มีผู้ใช้อยู่ในการสนทนา' ;
    html_img = `<img src="{{ url('/img/stickerline/PNG/7.png') }}" style="width: 12rem!important;">`;

  }else if(type == 'end but in_room'){

    class_h5 = '' ;
    html_show_status = 'ผู้ใช้ อยู่ในสาย..' ;

  }

  let html = `
      <div class="text-center">
          `+html_img+`
          <br><br>
          <h5 class="`+class_h5+`">คุณ : `+data['name']+`</h5>
          <h5 class="mt-3 `+class_show_status+`">`+html_show_status+`</h5>
      </div>
    `;
  
  document.querySelector('#show_whene_video_no_active').innerHTML = '' ;
  document.querySelector('#show_whene_video_no_active').insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

}

function start_video_call_command(){

    // console.log('CLICK start_video_call_command');

    option = {
      // Pass your App ID here.
      appId: appId,
      appCertificate: appCertificate,
      channel: 'sos_1669_id_' + sos_1669_id,
      // channel: 'sos_1669_id',
      uid: '{{ Auth::user()->id }}',
      // uname: '{{ Auth::user()->name }}',

      token: "",
    };

    fetch("{{ url('/') }}/api/video_call" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}')
      .then(response => response.text())
      .then(result => {
          // console.log("GET Token success");
          // console.log(result);

          option['token'] = result;

          setTimeout(() => {
              // document.getElementById("command_join").click();
          }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน

      });

    startBasicCall();
}

/////////////////////// จอ เล็ก //////////////////
const remotePlayerContainer = document.querySelector('.video-remote');
/////////////////////// จอ ใหญ่ /////////////////////
const localPlayerContainer = document.querySelector('.video-local');

async function startBasicCall() {

  // console.log(option);

  const agoraEngine = AgoraRTC.createClient({
    mode: "rtc",
    codec: "vp8"
  });

  ///////////////////////// btn local user/////////////////////
  const btnMic = document.querySelector('#btnMic');
  const btnVideo = document.querySelector('#btnVideo');

  //////////////////////// btn remote User//////////////////////
  const btnMicRemote = document.querySelector('#btnMicRemote');
  const btnVideoRemote = document.querySelector('#btnVideoRemote');

  var isMuteVideo = false;
  var isMuteAudio = false;

  var userJoinRoom = false;

  // Specify the ID of the DIV container. You can use the uid of the local user.
  localPlayerContainer.id = option.uid;

  // --------------------------------------------------------- //
  // -------------------- User Published --------------------- //
  // --------------------------------------------------------- //
  agoraEngine.on("user-published", async (user, mediaType) => {
    // Subscribe to the remote user when the SDK triggers the "user-published" event.
    await agoraEngine.subscribe(user, mediaType);
    console.log("+++++++++++===========+++++++++++");
    console.log("+++++++++++===========+++++++++++");
    console.log("+++++++++++===========+++++++++++");
    console.log(user.uid);
    console.log("subscribe success");
    console.log("+++++++++++===========+++++++++++");
    console.log("+++++++++++===========+++++++++++");
    console.log("+++++++++++===========+++++++++++");
    console.log(user);
    console.log(mediaType);

    remotePlayerContainer.classList.remove('d-none');
    btnVideoRemote.classList.remove('d-none');
    btnMicRemote.classList.remove('d-none');

    /////////////////////////////////////////////////
    //// หาข้อมูล เปิด/ปิด กล้อง ไมค์ เมื่อเจ้าหน้าที่เข้ามาทีหลัง ////
    /////////////////////////////////////////////////
    if(user['_audio_added_']){
      // remote Usre เปิดไมค์ //////
      btnMicRemote.classList.remove('btnRemote-close');
      btnMicRemote.classList.add('btnRemote-open');
      btnMicRemote.innerHTML = `<i class="fa-solid fa-microphone"></i>`;
    }else{
      // remote Usre ปิดไมค์ //////
      btnMicRemote.classList.add('btnRemote-close');
      btnMicRemote.classList.remove('btnRemote-open');
      btnMicRemote.innerHTML = `<i class="fa-solid fa-microphone-slash"></i>`;
    }

    if(user['_video_added_']){
      // remote Usre เปิดกล้อง //////
      btnVideoRemote.classList.remove('btnRemote-close');
      btnVideoRemote.classList.add('btnRemote-open');
      btnVideoRemote.innerHTML = `<i class="fas fa-video"></i>`;
    }else{
      btnVideoRemote.classList.add('btnRemote-close');
      btnVideoRemote.classList.remove('btnRemote-open');
      btnVideoRemote.innerHTML = `<i class="fas fa-video-slash"></i>`;
    }
    /////////////////////////////////////////////////////
    //// จบ หาข้อมูล เปิด/ปิด กล้อง ไมค์ เมื่อเจ้าหน้าที่เข้ามาทีหลัง ////
    ///////////////////////////////////////////////////


    // Subscribe and play the remote video in the container If the remote user publishes a video track.
    if (mediaType == "video") {
      // Retrieve the remote video track.
      channelParameters.remoteVideoTrack = user.videoTrack;
      // Retrieve the remote audio track.
      channelParameters.remoteAudioTrack = user.audioTrack;
      // Save the remote user id for reuse.
      channelParameters.remoteUid = user.uid.toString();
      // Specify the ID of the DIV container. You can use the uid of the remote user.
      remotePlayerContainer.id = user.uid.toString();
      channelParameters.remoteUid = user.uid.toString();
      // remotePlayerContainer.textContent = "Remote user " + user.uid.toString();
      // Append the remote container to the page body.
      // document.body.append(remotePlayerContainer);
      
      // Play the remote video track.
      channelParameters.remoteVideoTrack.play(localPlayerContainer);

      // กำหนดจอของเจ้าหน้าที่ให้แสดงที่จอ เล็ก
      command_screen_current = 2 ;
      // ตัวเลือกแสดงผลวิดีโอของเจ้าหน้าที่
      select_show_localVideoTrack();

      // remote Usre เปิดกล้อง //////
      if (user.videoTrack) {
        btnVideoRemote.classList.remove('btnRemote-close');
        btnVideoRemote.classList.add('btnRemote-open');
        btnVideoRemote.innerHTML = `<i class="fas fa-video"></i>`;
      }
      // alert('มีคนเข้ามา');
      userJoinRoom = true;

    }

    // Subscribe and play the remote audio track If the remote user publishes the audio track only.
    if (mediaType == "audio") {
      // Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
      channelParameters.remoteAudioTrack = user.audioTrack;
      // Play the remote audio track. No need to pass any DOM element.
      channelParameters.remoteAudioTrack.play();

      // remote Usre เปิดไมค์ //////
      if (user.audioTrack) {
        btnMicRemote.classList.remove('btnRemote-close');
        btnMicRemote.classList.add('btnRemote-open');
        btnMicRemote.innerHTML = `<i class="fa-solid fa-microphone"></i>`;
      }
    }

  });

  // --------------------------------------------------------- //
  // ------------------ User Un published --------------------- //
  // --------------------------------------------------------- //
  // Listen for the "user-unpublished" event.
  agoraEngine.on("user-unpublished", async (user, mediaType) => {

    // remote Usre ปิดกล้อง //////
    if (mediaType == "video") {
      if (!user.remoteVideoTrack) {
        btnVideoRemote.classList.add('btnRemote-close');
        btnVideoRemote.classList.remove('btnRemote-open');
        btnVideoRemote.innerHTML = `<i class="fas fa-video-slash"></i>`;
      }
    }

    // remote Usre ปิดไมค์ //////
    if (mediaType === "audio") {
      if (!user.audioTrack) {
        btnMicRemote.classList.add('btnRemote-close');
        btnMicRemote.classList.remove('btnRemote-open');
        btnMicRemote.innerHTML = `<i class="fa-solid fa-microphone-slash"></i>`;
      }
    }

  });

  // --------------------------------------------------------- //
  // -------------------- User Left -------------------------- //
  // --------------------------------------------------------- //
  agoraEngine.on("user-left", function(evt) {

    video_success = 'OK' ;
    remotePlayerContainer.classList.add('d-none');
    // channelParameters.localVideoTrack.play(localPlayerContainer);
    userJoinRoom = false;
    // alert('มีคนออก');
    btnVideoRemote.classList.add('d-none');
    btnMicRemote.classList.add('d-none');

    document.querySelector('.video-remote').innerHTML = '' ;
    check_first_play_ringtone = 0 ;
    // loop_check_user_in_room();

    // กำหนดจอของเจ้าหน้าที่ให้แสดงที่จอ ใหญ่
    command_screen_current = 1 ;
    // ตัวเลือกแสดงผลวิดีโอของเจ้าหน้าที่
    select_show_localVideoTrack();

    if(check_start_timer_video_call){
      myStop_timer_video_call();
    }

  });

  // --------------------------------------------------------- //
  // --------------------------------------------------------- //

  btnVideo.onclick = async function() {
    if (isMuteVideo == false) {
      // Mute the local video.
      channelParameters.localVideoTrack.setEnabled(false);
      // Update the button text.
      btnVideo.innerHTML = '<i class="fa-solid fa-video-slash"></i>';
      btnVideo.classList.add('btn-disabled');
      btnVideo.classList.remove('btn-active');
      isMuteVideo = true;

      // alertNoti('<i class="fa-solid fa-video-slash"></i>', 'กล้องปิดอยู่');

      if(command_screen_current == 1){
        document.querySelector('#video_local_slash_screen_1').classList.remove('d-none');
        document.querySelector('#video_local_slash_screen_2').classList.add('d-none');
      }else{
        document.querySelector('#video_local_slash_screen_1').classList.add('d-none');
        document.querySelector('#video_local_slash_screen_2').classList.remove('d-none');
      }

    } else {
      channelParameters.localVideoTrack.setEnabled(true);
      // channelParameters.localVideoTrack.play(localPlayerContainer);

      // ตัวเลือกแสดงผลวิดีโอของเจ้าหน้าที่
      select_show_localVideoTrack();

      btnVideo.innerHTML = '<i class="fa-solid fa-video"></i>';
      btnVideo.classList.remove('btn-disabled');
      btnVideo.classList.add('btn-active');
      isMuteVideo = false;

      // alertNoti('<i class="fa-solid fa-video"></i>', 'กล้องเปิดอยู่');
      document.querySelector('#video_local_slash_screen_1').classList.add('d-none');
      document.querySelector('#video_local_slash_screen_2').classList.add('d-none');

    }
  }

  btnMic.onclick = async function() {
    if (isMuteAudio == false) {
      // Mute the local video.
      channelParameters.localAudioTrack.setEnabled(false);
      // Update the button text.
      btnMic.innerHTML = '<i class="fa-solid fa-microphone-slash"></i>';
      btnMic.classList.add('btn-disabled');
      btnMic.classList.remove('btn-active');
      isMuteAudio = true;
    } else {
      // Unmute the local video.
      channelParameters.localAudioTrack.setEnabled(true);
      // Update the button text.
      btnMic.innerHTML = '<i class="fa-solid fa-microphone"></i>';
      btnMic.classList.remove('btn-disabled');
      btnMic.classList.add('btn-active');
      isMuteAudio = false;
    }
  }

  // Listen to the Join button click event.
  document.getElementById("command_join").onclick = async function() {
    // console.log("--- Onclick >> JOIN ---");
    // console.log(option.channel);
    stop_ringtone();
    check_command_in_room = true ;
    check_first_play_ringtone = 1 ;
    // Join a channel.

    try{
        await agoraEngine.join(option.appId, option.channel, option.token, option.uid);
    }catch{

      console.log('========================================');
      console.log('>>>>>> เชื่อมต่อล้มเหลว กำลังเชื่อต่อใหม่ <<<<<<');
      console.log('========================================');

      setTimeout(function() {
        document.querySelector('#command_join').click();
      }, 2500);

    }

    // Create a local audio track from the audio sampled by a microphone.
    channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
    // Create a local video track from the video captured by a camera.
    channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
    // Append the local video container to the page body.
    // document.body.append(localPlayerContainer);
    // Publish the local audio and video tracks in the channel.
    await agoraEngine.publish([channelParameters.localAudioTrack, channelParameters.localVideoTrack]);
    // Play the local video track.
    
    document.querySelector('.video-menu').classList.remove('d-none');
    document.querySelector('#span_timer_video_call').classList.remove('d-none');

    // update status command => "Helping"
    document.querySelector('#officerHelping').click();

    fetch("{{ url('/') }}/api/join_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=command_join')
      .then(response => response.json())
      .then(result => {
          console.log(result);

          if(result['data']['user']){
            create_html_user_in_room(result['data_user'] , 'in_room');
            if(!check_start_timer_video_call){
              start_timer_video_call(result['data_agora']['time_start']);
            }
          }else{
            if(check_start_timer_video_call){
              myStop_timer_video_call();
            }
          }

          // ตัวเลือกแสดงผลวิดีโอของเจ้าหน้าที่
          select_show_localVideoTrack();

          if(userJoinRoom == true){
            // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
            create_html_user_in_room(result['data'] , 'in_room');
          }

      });

    btnMic.innerHTML = '<i class="fa-solid fa-microphone"></i>';
    btnVideo.innerHTML = '<i class="fa-solid fa-video"></i>';

    document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');
    document.querySelector('#command_join').classList.add('btn-success');
    document.querySelector('#command_join').classList.add('d-none');
    document.querySelector('#command_join').classList.remove('video-call-in-room');
    document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');
    document.querySelector('#btnMic').classList.remove('d-none');
    document.querySelector('#btnVideo').classList.remove('d-none');
    document.querySelector('#leave').classList.remove('d-none');

    // let html_icon_video_slash = `
    //     <i id="video_local_slash_screen_2" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;font-size: 25px;z-index:99999;" class="fa-solid fa-video-slash d-none"></i>
    //   `;

    //   document.querySelector('.video-remote').innerHTML = '' ;
    //   document.querySelector('.video-remote').insertAdjacentHTML('afterbegin', html_icon_video_slash); // แทรกล่างสุด

  }

  // Listen to the Leave button click event.
  document.getElementById('leave').onclick = async function() {

    check_command_in_room = false ;

    let meet_2_people = 'No' ;

    if(check_start_timer_video_call){
      myStop_timer_video_call();
      meet_2_people = 'Yes' ;
    }

    if(meet_2_people == 'Yes'){
      console.log('hours >> ' + hours);
      console.log('minutes >> ' + minutes);
      console.log('seconds >> ' + seconds);
    }

    // Destroy the local audio and video tracks.
    channelParameters.localAudioTrack.close();
    channelParameters.localVideoTrack.close();
    // Remove the containers you created for the local video and remote video.
    // removeVideoDiv(remotePlayerContainer.id);
    // removeVideoDiv(localPlayerContainer.id);
    // Leave the channel
    await agoraEngine.leave();
    // console.log("You left the channel");
    document.querySelector('#btnMic').setAttribute('class', 'btn-active');
    document.querySelector('#btnVideo').setAttribute('class', 'btn-active');

    document.querySelector('#leave').classList.add('d-none');
    document.querySelector('#command_join').classList.remove('d-none');
    document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');
    document.querySelector('#btnMic').classList.add('d-none');
    document.querySelector('#btnVideo').classList.add('d-none');
    document.querySelector('#btnVideoCall').click();
    btnVideoRemote.classList.add('d-none');
    btnMicRemote.classList.add('d-none');
    document.querySelector('.video-remote').classList.add('d-none');
    document.querySelector('.video-menu').classList.add('d-none');

    document.querySelector('#span_timer_video_call').classList.add('d-none');
    document.querySelector('#icon_timer_video_call').classList.remove('d-none');
    document.querySelector('#timer_video_call').innerHTML = 'เริ่มนับเมื่อมีผู้ใช้ 2 คน';



    // update status command => "Standby"
    document.querySelector('#officerStandby').click();
    // window.location.reload();

    fetch("{{ url('/') }}/api/left_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=command_left'+"&meet_2_people="+meet_2_people+"&hours="+hours+"&minutes="+minutes+"&seconds="+seconds)
      .then(response => response.json())
      .then(result => {
          // console.log(result);
          
          video_success = 'OK' ;

          if(result['data']['user']){
            create_html_user_in_room(result['data_user'] , 'end but in_room');
          }else{
            create_html_user_in_room(result['data'] , 'out');
          }

      });
  }

}

// ///////////////////////////////////////////// //
// /////// select_show_localVideoTrack //////// //
// /////////////////////////////////////////// //

function select_show_localVideoTrack(){

  setTimeout(function() {

    if(command_screen_current === 1){
      // แสดงวิดีโอใน div local
      channelParameters.localVideoTrack.play(localPlayerContainer);
    }else{
      // แสดงวิดีโอใน div remote
      channelParameters.localVideoTrack.play(remotePlayerContainer);
    }

  }, 1000);


}

// /////////////////////////////////// //
// /////// Timer Video Call ///////// //
// ///////////////////////////////// //
var check_start_timer_video_call = false ;

function myStop_timer_video_call() {
    clearInterval(loop_timer_video_call);
    check_start_timer_video_call = false;
    document.querySelector('#timer_video_call').innerHTML = 'ผู้ใช้ออกจากการสนทนา' ;
    document.querySelector('#icon_timer_video_call').classList.add('d-none');
}

var hours = 0;
var minutes = 0;
var seconds = 0;

function start_timer_video_call(time_start){

  console.log('start_timer_video_call');
  console.log(time_start);

  document.querySelector('#icon_timer_video_call').classList.remove('d-none');

  check_start_timer_video_call = true ;

  var timeCountVideo = document.getElementById("timer_video_call");

  // วันที่และเวลาที่กำหนด
  var targetDate = new Date();
  var targetTime = targetDate.getTime();

  loop_timer_video_call = setInterval(function() {

    // วันที่และเวลาปัจจุบัน
    var currentDate = new Date();
    var currentTime = currentDate.getTime();

    // คำนวณเวลาที่ผ่านไปในมิลลิวินาที
    var elapsedTime = currentTime - targetTime;
    var elapsedMinutes = Math.floor(elapsedTime / (1000 * 60));

    // แปลงเวลาที่ผ่านไปให้เป็นรูปแบบชั่วโมง:นาที:วินาที
    hours = Math.floor(elapsedMinutes / 60);
    minutes = elapsedMinutes % 60;
    seconds = Math.floor((elapsedTime / 1000) % 60);

    let showTimeCountVideo;
    // แสดงผลลัพธ์
    if (hours > 0) {
        if (minutes < 10) {  // ใส่ 0 ข้างหน้า นาที กรณีเลขยังไม่ถึง 10
            showTimeCountVideo = hours + ':' + '0' + minutes + ':' + seconds + "&nbsp;/ 10 นาที";
        }else{
            showTimeCountVideo = hours + ':' + minutes + ':' + seconds + "&nbsp;/ 10 นาที";
        }
    } else {
        if(seconds < 10){  // ใส่ 0 ข้างหน้า วินาที กรณีเลขยังไม่ถึง 10
            showTimeCountVideo =  minutes + ':' + '0' + seconds + "&nbsp;/ 10 นาที";
        }else{
            showTimeCountVideo = minutes + ':' + seconds + "&nbsp;/ 10 นาที";
        }
    }

    let check_time = minutes + '.' + seconds ;
        console.log(check_time);

    if(check_time == '1.0'){
        console.log('เหลือเวลาอีก '+check_time+' นาที');
        // alertNoti('<i class="fa-solid fa-video-slash"></i>', 'กล้องปิดอยู่');
    }

    timeCountVideo.innerHTML = showTimeCountVideo ;

  }, 1000);

}

function alertNoti(Icon, Detail) {
  const alertElement = document.querySelector('.containerAlert');
  const iconElement = document.querySelector('#iconAlert');
  const detailElement = document.querySelector('#detailAlert');

  if (alertElement) {
    alertElement.classList.remove('scaleUpDown');
    alertElement.remove();
  }

  const newAlertElement = document.createElement('div');
  newAlertElement.classList.add('containerAlert');
  newAlertElement.classList.add('scaleUpDown');

  newAlertElement.classList.add('scaleUpDown');

  const alertStatus = document.createElement('span');
  alertStatus.classList.add('alertStatus');


  const newIconElement = document.createElement('span');
  newIconElement.id = 'iconAlert';
  newIconElement.innerHTML = Icon;

  const newDetailElement = document.createElement('span');
  newDetailElement.id = 'detailAlert';
  newDetailElement.innerHTML = Detail;

  alertStatus.appendChild(newIconElement);
  alertStatus.appendChild(newDetailElement);

  newAlertElement.appendChild(alertStatus);

  let div_for_alertTime = document.querySelector('#div_for_alertTime');
      div_for_alertTime.appendChild(newAlertElement);

}

// // Remove the video stream from the container.
// function removeVideoDiv(elementId) {
//   console.log("Removing " + elementId + "Div");
//   let Div = document.getElementById(elementId);
//   if (Div) {
//     Div.remove();
//   }
// }

</script>


    <script>
        // Find necessary elements
        const videoBody = document.querySelector(".video-body-local");
        const videoRemote = document.querySelector(".video-remote");

        // Adjust style of video-remote to make it draggable
        videoRemote.style.position = "absolute";
        videoRemote.style.cursor = "move";
        videoRemote.style.transition = "transform 0.3s ease-in-out";

        // Set initial position of videoRemote
        let pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;

        // Add event listeners for both mouse and touch events
        videoRemote.addEventListener('mousedown', dragMouseDown);
        videoRemote.addEventListener('touchstart', dragMouseDown);

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();

            // Get initial position
            pos3 = e.clientX || e.touches[0].clientX;
            pos4 = e.clientY || e.touches[0].clientY;

            document.addEventListener('mouseup', closeDragElement);
            document.addEventListener('touchend', closeDragElement);
            document.addEventListener('mousemove', elementDrag);
            document.addEventListener('touchmove', elementDrag);
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();

            // Calculate new position of videoRemote
            pos1 = pos3 - (e.clientX || e.touches[0].clientX);
            pos2 = pos4 - (e.clientY || e.touches[0].clientY);
            pos3 = e.clientX || e.touches[0].clientX;
            pos4 = e.clientY || e.touches[0].clientY;
            videoRemote.style.top = (videoRemote.offsetTop - pos2) + "px";
            videoRemote.style.left = (videoRemote.offsetLeft - pos1) + "px";

            // Add animation
            videoRemote.style.transition = "transform 4s ease-out";
            videoRemote.style.transform = "translate3d(0, 0, 0)";
        }

        function closeDragElement() {
            // Calculate final position of videoRemote
            const videoBodyRect = videoBody.getBoundingClientRect();
            const videoRemoteRect = videoRemote.getBoundingClientRect();
            const videoBodyTop = videoBodyRect.top;
            const videoBodyLeft = videoBodyRect.left;
            const videoBodyRight = videoBodyRect.right;
            const videoBodyBottom = videoBodyRect.bottom;
            const videoRemoteTop = videoRemoteRect.top;
            const videoRemoteLeft = videoRemoteRect.left;
            const videoRemoteRight = videoRemoteRect.right;
            const videoRemoteBottom = videoRemoteRect.bottom;

            const offset = 15; // Distance from edge 5px

            if (videoRemoteRight + offset > videoBodyRight) {
                videoRemote.style.left =
                    videoBody.offsetWidth - videoRemote.offsetWidth - offset + "px";
            }

            if (videoRemoteLeft - offset < videoBodyLeft) {
                videoRemote.style.left = offset + "px";
            }

            if (videoRemoteTop - offset < videoBodyTop) {
                videoRemote.style.top = offset + "px";
            }

            if (videoRemoteBottom + offset > videoBodyBottom) {
                videoRemote.style.top =
                    videoBody.offsetHeight - videoRemote.offsetHeight - offset + "px";
            }

            // Check if the position of the remote is within the boundaries of the body and move it to the closest edge in the direction it is being dragged
            if (
                (videoRemoteRight <= (videoBodyRight + offset)) &&
                (videoRemoteLeft >= (videoBodyLeft - offset)) &&
                (videoRemoteTop >= (videoBodyTop - offset)) &&
                (videoRemoteBottom <= (videoBodyBottom + offset))
            ) {
                // Check if the remote is on the left or right side of the body and move it to the closest edge in that direction
                if ((videoRemoteLeft - videoBodyLeft) < (videoBodyRight - videoRemoteRight)) {
                    // Remote is on left side of body
                    // Move remote to left edge of body
                    videoRemote.style.left = offset + 'px';
                } else {
                    // Remote is on right side of body
                    // Move remote to right edge of body
                    let rightEdgePosition =
                        (videoBody.offsetWidth -
                            (videoRemote.offsetWidth + offset));
                    rightEdgePosition += 'px';

                    let leftEdgePosition =
                        (offset);

                    leftEdgePosition += ' px';

                }
            }

            if ((videoRemoteTop - videoBodyTop) < (videoBodyBottom - videoRemoteBottom)) {
                // Remote is on top side of body
                // Move remote to top edge of body
                videoRemote.style.top = offset + 'px';
            } else {
                // Remote is on bottom side of body
                // Move remote to bottom edge of body
                let bottomEdgePosition =
                    (videoBody.offsetHeight -
                        (videoRemote.offsetHeight + offset));
                bottomEdgePosition += 'px';
                videoRemote.style.top = bottomEdgePosition;
            }


            document.removeEventListener('mouseup', closeDragElement);
            document.removeEventListener('touchend', closeDragElement);
            document.removeEventListener('mousemove', elementDrag);
            document.removeEventListener('touchmove', elementDrag);

            // Reset animation time to 0s
            videoRemote.style.transition = "transform 0s";
        }

        // Calculate closest position to edge of div.video-body
        const videoBodyRect = videoBody.getBoundingClientRect();
        const minOffsetX = videoBodyRect.left + window.pageXOffset;
        const maxOffsetX =
            videoBodyRect.right - videoRemote.offsetWidth + window.pageXOffset;
        const minOffsetY = videoBodyRect.top + window.pageYOffset;
        const maxOffsetY =
            videoBodyRect.bottom - videoRemote.offsetHeight + window.pageYOffset;

        // Move div.video-remote to closest position to edge of div.video-body
        let newOffsetX = parseInt(videoRemote.style.left);
        let newOffsetY = parseInt(videoRemote.style.top);
        if (newOffsetX < minOffsetX) {
            newOffsetX = minOffsetX;
        }
        if (newOffsetX > maxOffsetX) {
            newOffsetX = maxOffsetX;
        }
        if (newOffsetY < minOffsetY) {
            newOffsetY = minOffsetY;
        }
        if (newOffsetY > maxOffsetY) {
            newOffsetY = maxOffsetY;
        }
        videoRemote.style.left = newOffsetX + "px";
        videoRemote.style.top = newOffsetY + "px";
    </script>

    <script>
    let btnVideoCall = document.getElementById('btnVideoCall');
    let divSosMap = document.getElementById('div_detail_sos');
    let divVideoCall = document.getElementById('divVideoCall');

    btnVideoCall.addEventListener('click', function() {
    if (divSosMap.style.display === 'none') {
        divSosMap.classList.remove('fade-out');
        divSosMap.classList.add('fade-in');
        divSosMap.style.display = 'block';

        divVideoCall.classList.remove('fade-in');
        divVideoCall.classList.add('fade-out');
        divVideoCall.style.display = 'none';
    } else {
        divSosMap.classList.remove('fade-in');
        divSosMap.classList.add('fade-out');
        divSosMap.style.display = 'none';

        divVideoCall.classList.remove('fade-out');
        divVideoCall.classList.add('fade-in');
        divVideoCall.style.display = 'block';
    }
    });
</script>