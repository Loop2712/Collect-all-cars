@extends('layouts.viicheck')

@section('content')
<style>
  body,
  html {
    height: 100%;
    width: 100%;
    font-family: 'Kanit', sans-serif !important;
  }



  #map_officers_switch {
    position: relative;
    width: 100% !important;
    height: 100% !important;

  }

  #topbar {
    display: none !important;
  }

  header {
    display: none !important;
  }

  footer {
    display: none !important;

  }






  @media screen and (min-width: 768px) and (max-width: 1023px) {

    .hrNew,
    #join {
      display: none;
    }
    .video-detail-officer-box{
      display: flex;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;  
    }
    .video-detail-officer-box *{
      margin: 0;
      color: #fff;
    }
    .video-detail-box{
      display: none !important;
    }
    .video-officer-detail{
      width: 90%;
    }
    .video-officer-detail p{
      white-space: nowrap; 
      width:100%;
      overflow: hidden;
      text-overflow: ellipsis;  
    } 
    /* CSS สำหรับหน้าจอแท็บเล็ต */
    .video-call {
      outline: .5rem solid #000;
      height: 100%;
      width: 100%;
      padding: 1rem;

    }

    .video-header {
      /* outline: .5rem solid #db2d2e; */
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 1rem;
      background-color: #000;
      width: calc(100% - 30%);
      margin: 0 auto;
    }

    .video-header div img {
      width: 3rem;
      height: 3rem;
      object-fit: cover;
      outline: #000 1px solid;
      display: inline-block;
    }

    .video-user-detail {
      display: inline-block;
      margin-left: 1rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 13rem;
      color: #fff;
    }

    .video-user-detail p {
      margin: 0;
      padding: 0;
      font-weight: bold;

    }

    .video-detail-box {
      display: flex;
      align-items: center;
    }

    .video-body {
      position: relative;
      width: calc(100% - 30%);
      margin: 0 auto;
    }

    .video-local {
      display: flex;
      margin-top: 1.5rem;
      height: calc(100% - 30%);
      outline: #000 .3rem solid;
      border-radius: 1rem;
      background-color: #D3D3D3;
      background-attachment: fixed;
      background-size: cover;
    }

    .video-local div,
    .video-remote div {
      border-radius: 1rem !important;
    }

    .video-remote {
      width: 8rem;
      height: 8rem;
      background-color: #009e6b;
      outline: #009e6b .3rem solid;
      border-radius: 1rem;
      position: absolute;
      top: 5%;
      right: calc(100% - 95%);
    }

    .video-menu {
      display: flex;
      width: calc(100% - 30%);
      /* outline: #000 1rem solid; */
      border-radius: 1rem;
      position: absolute;
      bottom: 2%;
      left: 15%;
      justify-content: space-around;
      background-color: #000;
      height: 5rem !important;
      align-items: center;
    }


    .video-menu button {
      padding: 1rem;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.4);
      color: #fff;
      width: 4rem !important;
      height: 4rem !important;
      font-size: 1.2rem;
    }

    .btn-exit {
      background-color: #db2d2e !important;
      color: #fff !important;
    }


    .btnGroup {
      position: relative;
    }

    .dropdown-toggle::after {
      display: none;
    }

    .dropdown-menu {
      width: 300px;
    }

    .dropdown-menu .dropdown-item {
      font-size: .8rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
    }

    .dropdown-menu .dropdown-item input {
      margin-right: .5rem;
    }

    .dropdown-header {
      font-family: 'Mitr', sans-serif;
    }

  }

  @media screen and (max-width: 768px) {
    
    /* CSS สำหรับหน้าจอมือถือ */
    .hrNew,
    #join {
      display: none;
    }
    .video-detail-officer-box{
      display: flex;
      width: 100%;
    }
    .video-detail-officer-box *{
      margin: 0;
      color: #fff;
    }

    /*.video-detail-officer-box div p {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
    }*/

    .video-detail-box{
      display: none !important;
    }

    .video-call {
      height: 100%;
      width: 100%;
      padding: 1rem;
      position: relative !important;
    }
    .video-officer-detail{
      width: 85%;
    }
    .video-officer-detail p{
      white-space: nowrap; 
      width:100%;
      overflow: hidden;
      text-overflow: ellipsis;  
    } 
    .video-header {
      /* outline: .5rem solid #db2d2e; */
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 1rem;
      background-color: #000;
      width: calc(100%);
    }

    .video-header div img {
      width: 3rem;
      height: 3rem;
      object-fit: cover;
      outline: #000 1px solid;
      display: inline-block;
    }

    .video-user-detail {
      display: inline-block;
      margin-left: 1rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100% !important;
      color: #fff;
    }

    .video-user-detail p {
      margin: 0;
      padding: 0;
      font-weight: bold;

    }

    .video-detail-box {
      display: flex;
      align-items: center;
      width: 300px !important;
    }

    .video-body {
      position: relative;
      width: calc(100%);
    }

    .video-local {
      display: flex;
      margin-top: 1.5rem;
      height: calc(100% - 30%);
      outline: #000 .3rem solid;
      border-radius: 1rem;
      width: 100%;
      background-color: #D3D3D3;
      background-attachment: fixed;
      background-size: cover;
    }

    .video-local div,
    .video-remote div {
      border-radius: 1rem !important;
    }

    .video-remote {
      width: 7rem;
      height: 7rem;
      background-color: #009e6b;
      outline: #009e6b .3rem solid;
      border-radius: 1rem;
      position: absolute;
      top: 5%;
      right: calc(100% - 95%);
    }

    .video-menu {
      display: flex;
      width: 95%;
      /* outline: #000 1rem solid; */
      border-radius: 1rem;
      position: absolute;
      bottom: 2%;
      left: 2.5%;
      justify-content: space-around;
      background-color: #000;
      height: 5rem !important;
      align-items: center;
    }


    .video-menu button {
      padding: .2rem;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.4);
      color: #fff;
      width: 3rem !important;
      height: 3rem !important;
      font-size: 1.2rem;
    }

    .btn-exit {
      background-color: #db2d2e !important;
      color: #fff !important;
    }

    .video-user-location {

      display: none;


      position: absolute;
      top: 1rem;
      background-color: #000;
      right: 1rem;
      width: calc(100% - 73%);
      border-radius: 1rem;
      padding: 1rem;
      color: #fff;
    }

    .video-user-location p {
      font-size: .5rem;
      display: -webkit-box;
      /* กำหนดให้แสดงผลเป็น block-level element */
      -webkit-box-orient: vertical;
      /* กำหนดว่าเนื้อหาจะแสดงผลในทิศทางแนวตั้ง */
      overflow: hidden;
      /* กำหนดให้ข้อความที่เกินหน้าจอถูกตัดทิ้ง */
      -webkit-line-clamp: 2;
      /* กำหนดให้แสดงได้สูงสุด 3 บรรทัด */
      text-overflow: ellipsis;
      /* กำหนดเครื่องหมาย ellipsis เมื่อเกิน 3 บรรทัด */
    }



    .divRadio {
      margin-top: 1rem;
      display: flex;
      justify-content: space-between;
      justify-content: center;
    }

    .btn-location {
      display: none;
      background-color: #4d4d4d !important;
      color: #fff !important;
      padding: .2rem 1rem !important;
    }

    .btn-location:hover {
      background-color: #fff !important;
      color: #000 !important;
      padding: .2rem 1rem !important;
    }

    #divLocation {
      display: none;
      position: fixed;
      top: 28%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 93%;
      background-color: #fff;
      border-radius: 1rem;
      text-align: center;
      padding: 20px 20px 40px 20px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
      background: #000;
      touch-action: none;
      /* ป้องกันการลาก div แล้วขยับหน้าเว็บ */
      z-index: 99999999;
    }

    #divLocation p,
    #divForm p {
      margin-bottom: .2rem;
      color: #fff;
    }

    #closeBtn,
    #closeBtnForm {
      position: absolute;
      top: .5rem;
      right: .5rem;
    }

    .drag {
      position: absolute;
      width: 50px !important;
      height: 8px !important;
      border-radius: 25px !important;
      background-color: rgba(255, 255, 255, 0.3) !important;
      padding: 0 !important;
      bottom: 5px !important;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .dragForm {
      position: absolute;
      width: 50px !important;
      height: 8px !important;
      border-radius: 25px !important;
      background-color: rgba(255, 255, 255, 0.3) !important;
      padding: 0 !important;
      top: 10px !important;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 999999999;
    }

    #divForm {
      display: none;
      position: fixed;
      bottom: -4%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 93%;
      background-color: #fff;
      border-radius: 1rem;
      text-align: center;
      padding: 40px 20px 20px 20px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
      background: #000;
      touch-action: none;
      /* ป้องกันการลาก div แล้วขยับหน้าเว็บ */
      z-index: 999999999;
    }

    #divForm textarea {
      height: 6rem;
    }

    .btnGroup {
      position: relative;
    }

    .dropdown-toggle::after {
      display: none;
    }

    .dropdown-menu {
      width: 300px;
    }

    .dropdown-menu .dropdown-item {
      font-size: .8rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
    }

    .dropdown-menu .dropdown-item input {
      margin-right: .5rem;
    }

    .dropdown-header {
      font-family: 'Mitr', sans-serif;
    }
  }



  /* * {
        outline: #881212 1px solid;
    } */

  @keyframes move {
    from {
      transform: translateX(-100%);
    }

    to {
      transform: translateX(0);
    }
  }

  .btn-submit-officer {
    border-radius: .5rem !important;
    float: right !important;
  }

  .fade-in {
    animation: fadeIn 1s ease 0s 1 normal forwards;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: scale(0.6);
    }

    100% {
      opacity: 1;
      transform: scale(1);
    }
  }

  .fade-out {
    animation: fadeOut 1s ease 0s 1 normal forwards;
  }

  @keyframes fadeOut {
    0% {
      opacity: 1;
      transform: scale(1);
    }

    100% {
      opacity: 0;
      transform: scale(0.6);
    }
  }

  .btn-disabled {
    background-color: #db2d2e !important;
    color: #fff !important;
  }

.btn-active {
    background-color: green !important;
    color: #fff !important;
  }

  .scaleUpDown {
    animation-name: sacleupanddown;
    animation-duration: 3s;
    transform: scale(0);
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
    top: 185px;
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
    bottom: 10px;
    right: 10px;
    z-index: 999999999;
  }

  .containerbtnDevice {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 2px !important;
    height: 2px !important;
    padding: 0 !important;
  }

  .btnDevice {
    font-size: 12px !important;
    position: absolute;
    bottom: 15;
    right: 20;
    padding: 0 !important;
    /* outline: #000 5px solid; */
    background-color: #fff !important;
    border-radius: 50%;
    color: #000 !important;
  }

  .card_show_h6_wait_command{
      height: 3.5rem!important;
      width: 100%!important;
      position: absolute;
      top: 0px;
      z-index: 99999;
    }

  .btn_switchScreen{
    position: absolute;
    bottom: 3px;
    left: 3px;
    border-radius: 30%;
    z-index: 99999;
  }

</style>


<div class="containerAlert">
  <div class="alertStatus">
    <span id="iconAlert">
    </span>
    <span id="detailAlert">
    </span>
  </div>

</div>


<style>
  @media screen and (min-width: 1024px) {
    /* CSS สำหรับหน้าจอคอมพิวเตอร์ */
    .video-call {
      outline: .5rem solid #000;
      height: 100%;
      width: 100%;
      /* padding: 1rem; */
      display: flex;
    }

    .video-header {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      background-color: #000;
      width: calc(100% - 80%);
      justify-content: space-between;
      /* เพิ่มคุณสมบัตินี้เพื่อให้ส่วนย่อยอยู่ด้านบนและด้านล่าง */
      /* เพิ่มส่วนที่ปรับเพิ่ม */
      align-items: flex-start;
      /* ให้ส่วนย่อยชิดซ้ายของพื้นที่ */
    }

    .video-header div img {
      width: 3rem;
      height: 3rem;
      object-fit: cover;
      outline: #000 1px solid;
      display: inline-block;
    }

    .video-user-detail {
      display: inline-block;
      margin-left: 1rem;

      color: #fff;
    }

    .video-user-detail p {
      margin: 0;
      padding: 0;
      font-weight: bold;

    }

    

    .video-detail-box {
      display: flex;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
      align-items: center;
    }

    .btn-location {
      display: none !important;
    }



    .video-body {
      position: relative;
      width: 100%;
    }

    .video-local {
      display: flex;
      height: calc(100% - 0%);
      width: 100%;
      /* outline: #000 .3rem solid; */
      border-radius: 0rem;
      background-color: #D3D3D3;
      background-attachment: fixed;
      background-size: cover;
    }


    .video-remote div {
      border-radius: 1rem !important;
    }

    .video-remote {
      width: 8rem;
      height: 8rem;
      background-color: #009e6b;
      outline: #009e6b .3rem solid;
      border-radius: 1rem;
      position: absolute;
      top: 10%;
      right: calc(100% - 95%);
    }

    .video-menu {
      display: flex;
      width: 100%;
      position: relative;
      /* outline: #000 1rem solid; */
      border-radius: 1rem;
      /* bottom: 5%; */
      /* left: calc(100% - 75%); */
      justify-content: space-around;
    }


    .video-menu button {
      margin-top: 1rem;
      display: flex;
      align-items: center;
      justify-content: center !important;
      border-radius: 5px;
      background-color: rgba(250, 250, 250, 0.4);
      color: #fff;
      width: 4rem !important;
      height: 2rem !important;
      font-size: 1rem;
    }

    .btn-exit {
      background-color: #db2d2e !important;
      color: #fff !important;
    }



    .divRadio {
      margin-top: 1rem;
      display: flex;
      justify-content: space-between;
      justify-content: center;
    }

    .detail-sos {
      height: 9rem !important;
    }

    #divLocation,
    #closeBtnForm {
      display: none;
    }

    .box-pc-user {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
    }


    .containerbtnDevice {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 2px !important;
      height: 2px !important;
      padding: 0 !important;
    }

    .btnDevice {
      font-size: 12px !important;
      position: absolute;
      bottom: 15;
      right: 20;
      padding: 0 !important;
      /* outline: #000 5px solid; */
      background-color: #fff !important;
      border-radius: 50%;
      color: #000 !important;
    }

    .btnGroup {
      position: relative;
    }

    .hrNew {
      margin: 0;
      border-top: 1px solid white;
    }

    .btnGroup {
      position: relative;
    }

    .dropdown-toggle::after {
      display: none;
    }

    .dropdown-menu {
      width: 300px;
    }

    .dropdown-menu .dropdown-item {
      font-size: .8rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
    }

    .dropdown-menu .dropdown-item input {
      margin-right: .5rem;
    }

    .dropdown-header {
      font-family: 'Mitr', sans-serif;
    }

    .video-detail-officer-box {
      display: flex;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 100%;
      flex-direction: column;
      justify-content: center !important;
    }
    .imgOfficer {
      margin-top: .8rem;
      width: 7rem !important;
      height: 7rem !important;
      outline: #fff 3px solid !important;
      border-radius: 50%;
      object-fit: cover;
    }
    .video-officer-detail{
      margin-top: 1rem;      
      text-align: center;
      color:#fff;
      width: 100%;

    }
    .video-officer-detail p{
      margin: 0;
      font-weight: bold;
      white-space: nowrap; 
      width:100%;
      overflow: hidden;
      text-overflow: ellipsis; 
    }
  }
.imgBox{
  display: flex;
  align-items: center;
  justify-content: center ;
}

.scaleX-1{
 transform: scaleX(-1);
}

  /* .hrNew ,.video-detail-officer-box{
    display: none;
  } */
</style>
<div class="video-call">
  <div class="video-header">
    <div class="video-detail-officer-box">
      <div class="imgBox">
        @if(!empty($data_officer_command->user->photo))
          <img class="imgOfficer" width="500" height="500" src="{{ url('storage')}}/{{ $data_officer_command->user->photo }}" />
        @else
          <img class="imgOfficer" width="500" height="500" src="{{ url('/img/stickerline/Flex/12.png') }}" />
        @endif
      </div>
      &nbsp;&nbsp;&nbsp;

      <span class="video-officer-detail">
        <p>เจ้าหน้าที่ : {{ $data_officer_command->name_officer_command }}</p>
        <p>ศูนย์สั่งการ : {{ $data_officer_command->area }} </p>
        <small class="mt-3">{{ $data_officer_command->user->phone }}</small>
      </span>
      
      <button class="btn btn-success d-none" id="join">join</button>
      
    </div>
    <div class="box-pc-user">
      <div class="video-detail-box">
        @if(!empty($user->photo))
          <img src="{{ url('/storage') }}/{{ $user->photo }}" />
        @else
          <img src="{{ url('/img/stickerline/flex/12.png') }}" />
        @endif
        <span class="video-user-detail">
          <p>{{ $user->name }}</p>
          <small>{{ $user->phone }}</small>
          
        </span>
      </div>
      <hr class="hrNew">
      <div class="video-menu">

        <a id="go_to_show_user" class="d-none" href="">
            Go To SHOW USER
        </a>

        <div class="btnGroup">

          <button class="btn btn-secondary" id="btn_switchCamera" onclick="switchCamera();">
            <i class="fa-solid fa-camera-rotate"></i>
          </button>

          <span class="containerbtnDevice d-">
            <div class="btn-group btnGroupVideoCall">
              <button class="btnDevice btn dropdown-toggle btn_for_select_video_device d-" type="button" data-bs-toggle='dropdown' aria-expanded="false" style=" width: 20px !important;height: 20px !important; padding: 0 !important;">
                <i class="fa-solid fa-chevron-down fa-2xs"></i>
              </button>

              <div class="dropdown-menu">
                <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                <div id="video-device-list"></div>
              </div>

            </div>
          </span>
        </div>

        <div class="btnGroup">

          <button class="btn btn-active" id="btnMic">
            <i class="fa-solid fa-microphone"></i>
          </button>

          <span class="containerbtnDevice d-none">
            <div class="btn-group btnGroupVideoCall">
              <button class="btnDevice btn dropdown-toggle" type="button" data-bs-toggle='dropdown' aria-expanded="false" style=" width: 20px !important;height: 20px !important; padding: 0 !important;"><i class="fa-solid fa-chevron-down fa-2xs"></i></button>

              <div class="dropdown-menu">
                <h6 class="dropdown-header">อุปกรณ์รับข้อมูล</h6>
                <div id="audio-device-list"></div>
                <!-- <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                <div id="video-device-list"></div> -->
              </div>
            </div>
          </span>

        </div>
       
        <button class="btn btn-active" id="btnVideo">
          <i class="fas fa-video"></i>
        </button>

        <button class="btn btn-active" id="" onclick="advdvsv();">
          <i class="fa-solid fa-pen-nib"></i>
        </button>

        <button class="btn btn-exit" id="leave">
            <i class="fa-solid fa-phone-xmark"></i>
        </button>
      </div>
    </div>

    <script>
      function advdvsv(){
        let video_local = document.querySelector('.video-local');
        let mkl = video_local.querySelector('[style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: black;"]');
          mkl.classList.add('scaleX-1');

        console.log(mkl);
      }
    </script>

  </div>

  <div class="video-body">

    <span id="btn_switchScreen" class="btn btn-secondary btn_switchScreen d-none">
      <i class="fa-duotone fa-repeat"></i>
    </span>

    <div class="video-local">

      <i id="video_local_slash" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;font-size: 50px;z-index:99999;" class="fa-solid fa-video-slash d-none"></i>

      <div id="card_show_h6_wait_command" class="card card_show_h6_wait_command d-none">
        <div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
          <div class="d-flex align-items-center">
            <div class="font-35 text-warning" id="show_icon_h6_wait_command">
               <i class="fa-duotone fa-loader fa-spin-pulse"></i>
            </div>
            <div class="ms-3">
              <h6 class="mt-2 d-" id="show_h6_wait_command">
                กรุณารอเจ้าหน้าที่สักครู่..
              </h6>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.querySelector('#card_show_h6_wait_command').classList.add('d-none');"></button>
        </div>
      </div>

      <div id="show_whene_video_no_active" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;">
          <!-- แสดงผลต่างๆ เมื่ออีกฝั่งอยู่ในสายแต่ ปิด กล้อง -->
          <div class="text-center">
              <h1>
                <i class="fa-duotone fa-spinner fa-spin-pulse" style="--fa-primary-color: #1cc41f; --fa-secondary-color: #55d357;"></i>
              </h1>
              <br>
              <span id="show_text_noti"></span>
          </div>

      </div>


      <div class="containerbtnRemote">
        <button id="btnVideoRemote" class="btnRemote-close d-none"><i class="fas fa-video-slash"></i></button>
        <button id="btnMicRemote" class="btnRemote-close d-none"><i class="fa-solid fa-microphone-slash"></i></button>
      </div>

    </div>


    <div class="video-remote d-none">
      <i id="video_remote_slash" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;font-size: 25px;z-index:99999;" class="fa-solid fa-video-slash d-none"></i>
    </div>

    <!-- <div class="video-menu">

      <div class="btnGroup">
        <button class="btn" id="btnMic">
          <i class="fa-duotone fa-microphone"></i>


        </button>
        <span class="containerbtnDevice d-none">

          <div class="btn-group btnGroupVideoCall">
            <button class="btnDevice btn dropdown-toggle" type="button" data-bs-toggle='dropdown' aria-expanded="false" style=" width: 20px !important;height: 20px !important; padding: 0 !important;"><i class="fa-solid fa-chevron-down fa-2xs"></i></button>

            <div class="dropdown-menu">
              <h6 class="dropdown-header">อุปกรณ์รับข้อมูล</h6>
              <div id="audio-device-list"></div>
              <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
                            <div id="video-device-list"></div>
            </div>

          </div>
        </span>
      </div>

      <div class="btnGroup">
        <button class="btn" id="btnVideo">
          <i class="fas fa-video"></i>
        </button>
        <span class="containerbtnDevice d-none">

          <div class="btn-group btnGroupVideoCall">
            <button class="btnDevice btn dropdown-toggle" type="button" data-bs-toggle='dropdown' aria-expanded="false" style=" width: 20px !important;height: 20px !important; padding: 0 !important;"><i class="fa-solid fa-chevron-down fa-2xs"></i></button>

            <div class="dropdown-menu">
              <h6 class="dropdown-header">อุปกรณ์ส่งข้อมูล</h6>
              <div id="video-device-list"></div>
            </div>

          </div>
        </span>
      </div>


      <button class="btn btn-exit" id="leave">
        <i class="fa-solid fa-x"></i>
      </button>
    </div> -->
  </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

<script>

var option;
let sos_1669_id = '{{ $sos_id }}';

let appId = '{{ env("AGORA_APP_ID") }}';
let appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';

option = {
    // Pass your App ID here.
    appId: appId,
    appCertificate: appCertificate,
    // channel: 'sos_1669_id_' + sos_1669_id,
    channel: 'sos_1669_id',
    uid: '{{ Auth::user()->id }}',
    uname: '{{ Auth::user()->name }}',

    token: "",
  };

document.addEventListener('DOMContentLoaded', (event) => {

  fetch("{{ url('/') }}/api/video_call" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&appCertificate=' + appCertificate  + '&appId=' + appId)
    .then(response => response.text())
    .then(result => {
        // console.log("GET Token success");
        // console.log(result);

        option['token'] = result;

        setTimeout(() => {
            document.getElementById("join").click();
        }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน

    });

    startBasicCall();
});

  
const channelName = "Viicheck";

let channelParameters = {
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


var check_command_in_room ;
var audio_in_room = new Audio("{{ asset('sound/announcement-sound-21466.mp3') }}");
var check_play_audio_in_room = 'ห้ามเล่น' ;
var command_entered_room = 'no' ;
var check_start_countdown_user_out_room = 'no' ;

function loop_check_command_in_room() {

  check_command_in_room = setInterval(function() {

    fetch("{{ url('/') }}/api/check_command_in_room" + "?sos_1669_id=" + sos_1669_id)
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if (result['data'] != 'ไม่มีข้อมูล'){

            myStop_countdown_user_out_room();

            command_entered_room = 'yes' ;
            document.querySelector('#show_h6_wait_command').classList.add('d-none');
            document.querySelector('#card_show_h6_wait_command').classList.add('d-none');

            if (check_play_audio_in_room == 'เล่น'){
              audio_in_room.play();
              check_play_audio_in_room = 'ห้ามเล่น';
            }

          }else{

            document.querySelector('#show_h6_wait_command').classList.remove('d-none');
            document.querySelector('#card_show_h6_wait_command').classList.remove('d-none');
            check_play_audio_in_room = 'เล่น';

            // ถ้าเจ้าหน้าที่เข้ามาแล้วออก
            if (command_entered_room == 'yes'){
              command_entered_room = 'no' ;
              document.querySelector('#show_h6_wait_command').innerHTML = 
                ` เจ้าหน้าที่ออกจากการสนทนาแล้ว
                  <br>
                  กำลังนำคุณออกจากการสนทนา <b class="text-danger">(<span id="countdown_user_out_room"></span>)</b>
                `;
              document.querySelector('#card_show_h6_wait_command').setAttribute('style','height: 4.5rem!important;')
              document.querySelector('#show_icon_h6_wait_command').innerHTML = 
                `<i class="fa-solid fa-arrow-right-from-bracket"></i>`;

              if(check_start_countdown_user_out_room == 'no'){
                check_start_countdown_user_out_room = 'yes';
                start_countdown_user_out_room();
              }
            }

          }

      });

  }, 5000);

}

function myStop_check_command_in_room() {
    clearInterval(check_command_in_room);
}

function myStop_countdown_user_out_room() {
    clearInterval(check_countdown_user_out_room);
    start_countdown = 10 ;
    check_start_countdown_user_out_room = 'no';
}

var check_countdown_user_out_room ;
var start_countdown = 10 ;

function start_countdown_user_out_room(){

  let countdown_user_out_room = document.querySelector('#countdown_user_out_room');

  check_countdown_user_out_room = setInterval(function() {

      // console.log(start_countdown);
      countdown_user_out_room.innerHTML = start_countdown.toString() ;
      start_countdown = start_countdown - 1 ;

      if (start_countdown < 0){
        myStop_countdown_user_out_room();
        document.querySelector('#leave').click();
      }

  }, 1000);

}

  async function startBasicCall() {
    // Create an instance of the Agora Engine

    // console.log(option);

    const agoraEngine = AgoraRTC.createClient({
      mode: "rtc",
      codec: "vp8"
    });

    /////////////////////// จอคนเข้าร่วม//////////////////
    const remotePlayerContainer = document.querySelector('.video-remote');
    /////////////////////// จอตัวเอง/////////////////////
    const localPlayerContainer = document.querySelector('.video-local');

    /////////////////////// ปุ่มสลับ กล้อง/////////////////////
    const btn_switchCamera = document.querySelector('#btn_switchCamera');

    /////////////////////// ปุ่มสลับ จอ/////////////////////
    const btn_switchScreen = document.querySelector('#btn_switchScreen');

    ///////////////////////// btn local user/////////////////////
    const btnMic = document.querySelector('#btnMic');
    const btnVideo = document.querySelector('#btnVideo');

    //////////////////////// btn remote User//////////////////////
    const btnMicRemote = document.querySelector('#btnMicRemote');
    const btnVideoRemote = document.querySelector('#btnVideoRemote');



    var isMuteVideo = false;
    var isMuteAudio = false;

    var userJoinRoom = false;

    // var agoraDevices = AgoraRTC.getDevices(function(devices) {
    //     var audioDevices = devices.filter(function(device) {
    //         return device.kind === 'audioinput'; // กรองอุปกรณ์เสียง
    //     });

    //     var videoDevices = devices.filter(function(device) {
    //         return device.kind === 'videoinput'; // กรองอุปกรณ์วิดีโอ
    //     });

    //     // แสดงรายการอุปกรณ์เสียงที่พบ
    //     console.log('อุปกรณ์เสียง:', audioDevices);

    //     // แสดงรายการอุปกรณ์วิดีโอที่พบ
    //     console.log('อุปกรณ์วิดีโอ:', videoDevices);

    //     // เลือกใช้อุปกรณ์เสียงและวิดีโอ
    //     var selectedAudioDevice = audioDevices[0]; // เลือกอุปกรณ์เสียงที่ 1
    //     var selectedVideoDevice = videoDevices[0]; // เลือกอุปกรณ์วิดีโอที่ 1

    // });

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


    function onChangeVideoDevice() {
      const selectedVideoDeviceId = getCurrentVideoDeviceId();
      // console.log('เปลี่ยนอุปกรณ์กล้องเป็น:', selectedVideoDeviceId);

      // สร้าง local video track ใหม่โดยใช้กล้องที่คุณต้องการ
      AgoraRTC.createCameraVideoTrack({ cameraId: selectedVideoDeviceId })
        .then(newVideoTrack => {

          // console.log('------------ newVideoTrack ------------');
          // console.log(newVideoTrack);

          // // หยุดการส่งภาพจากอุปกรณ์ปัจจุบัน
          // channelParameters.localVideoTrack.setEnabled(false);
          agoraEngine.unpublish([channelParameters.localVideoTrack]);

          // ปิดการเล่นภาพวิดีโอกล้องเดิม
          channelParameters.localVideoTrack.stop();
          channelParameters.localVideoTrack.close();

          // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
          channelParameters.localVideoTrack = newVideoTrack;

          if (isMuteVideo == false) {

            // เริ่มส่งภาพจากอุปกรณ์ใหม่
            channelParameters.localVideoTrack.setEnabled(true);
            // แสดงภาพวิดีโอใน <div>

            try{
              if (Screen_current == 'first'){
                channelParameters.localVideoTrack.play(localPlayerContainer);
                channelParameters.remoteVideoTrack.play(remotePlayerContainer);
              }else{
                channelParameters.localVideoTrack.play(remotePlayerContainer);
                channelParameters.remoteVideoTrack.play(localPlayerContainer);
              }
            }catch{
              if (Screen_current == 'first'){
                channelParameters.localVideoTrack.play(localPlayerContainer);
                // channelParameters.remoteVideoTrack.play(remotePlayerContainer);
              }else{
                // channelParameters.localVideoTrack.play(remotePlayerContainer);
                channelParameters.remoteVideoTrack.play(localPlayerContainer);
              }
            }
            
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
          alertNoti('<i class="fa-solid fa-triangle-exclamation fa-shake"></i>', 'ไม่สามารถเปลี่ยนกล้องได้');

          setTimeout(function() {
            document.querySelector('#btn_switchCamera').click();
          }, 2000);

          console.error('เกิดข้อผิดพลาดในการสร้าง local video track:', error);
        });
    }

    // async function onChangeVideoDevice() {
    //     const selectedVideoDeviceId = getCurrentVideoDeviceId();
    //     console.log('เปลี่ยนอุปกรณ์วิดีโอเป็น:', selectedVideoDeviceId);

    //     // หยุดการส่งวิดีโอจากอุปกรณ์ปัจจุบัน
    //     channelParameters.localVideoTrack.setEnabled(false);

    //     // สร้าง local video track ใหม่โดยใช้อุปกรณ์ที่คุณต้องการ
    //     const newVideoTrack = await AgoraRTC.createCameraVideoTrack({
    //         deviceId: selectedVideoDeviceId
    //     });

    //     // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
    //     channelParameters.localVideoTrack = newVideoTrack;

    //     // เริ่มส่งวิดีโอจากอุปกรณ์ใหม่
    //     channelParameters.localVideoTrack.setEnabled(true);

    //     console.log('เปลี่ยนอุปกรณ์วิดีโอสำเร็จ');
    // }




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
    // Specify the ID of the DIV container. You can use the uid of the local user.
    localPlayerContainer.id = option.uid;
    // Set the remote video container size.

    // --------------------------------------------------------- //
    // --------------------------------------------------------- //
    // -------------------- User Published --------------------- //
    // --------------------------------------------------------- //
    // --------------------------------------------------------- //

    var first_Published = true ;
    var Remote_MuteVideo = false ;

    // Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
    agoraEngine.on("user-published", async (user, mediaType) => {
      console.log('========================================');
      console.log('>>>>>> User Published <<<<<<');
      console.log('========================================');
      // Subscribe to the remote user when the SDK triggers the "user-published" event.
      await agoraEngine.subscribe(user, mediaType);
      // console.log("subscribe success");
      document.querySelector('#btn_switchScreen').classList.remove('d-none');

      command_entered_room = 'in_room' ;
      document.querySelector('#card_show_h6_wait_command').classList.add('d-none');
      document.querySelector('#show_h6_wait_command').classList.add('d-none');

      remotePlayerContainer.classList.remove('d-none');
      btnVideoRemote.classList.remove('d-none');
      btnMicRemote.classList.remove('d-none');

      if (first_Published){
        Screen_current = 'second' ; // first second
        first_Published = false ;
      }

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
        // channelParameters.remoteVideoTrack.play(localPlayerContainer);
        // channelParameters.localVideoTrack.play(remotePlayerContainer);

        // remote Usre เปิดกล้อง //////
        if (user.videoTrack) {
          // btnVideoRemote.classList.add('d-none');
          Remote_MuteVideo = false ;
          btnVideoRemote.classList.remove('btnRemote-close');
          btnVideoRemote.classList.add('btnRemote-open');
          btnVideoRemote.innerHTML = `<i class="fas fa-video"></i>`;

          console.log('===============================');
          console.log('Screen_current >> : ' + Screen_current);
          console.log('===============================');

          if (Screen_current == 'first'){
            document.querySelector('#video_remote_slash').classList.add('d-none');
          }else{
            document.querySelector('#video_local_slash').classList.add('d-none');
          }

          try{
            if (Screen_current == 'first'){
              channelParameters.localVideoTrack.play(localPlayerContainer);
              channelParameters.remoteVideoTrack.play(remotePlayerContainer);
            }else{
              channelParameters.localVideoTrack.play(remotePlayerContainer);
              channelParameters.remoteVideoTrack.play(localPlayerContainer);
            }
          }catch{
            console.log('เห้ออ..');

            setTimeout(function() {
              if (Screen_current == 'first'){
                channelParameters.localVideoTrack.play(localPlayerContainer);
                channelParameters.remoteVideoTrack.play(remotePlayerContainer);
              }else{
                channelParameters.localVideoTrack.play(remotePlayerContainer);
                channelParameters.remoteVideoTrack.play(localPlayerContainer);
              }
            }, 2000);

          }
          
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
    // --------------------------------------------------------- //
    // ------------------ User Unpublished --------------------- //
    // --------------------------------------------------------- //
    // --------------------------------------------------------- //

    // Listen for the "user-unpublished" event.
    agoraEngine.on("user-unpublished", async (user, mediaType) => {

      console.log('========================================');
      console.log('>>>>>> User UN Published <<<<<<');
      console.log('========================================');

      // remote Usre ปิดกล้อง //////
      if (mediaType == "video") {
        if (!user.remoteVideoTrack) {
          Remote_MuteVideo = true ;
          btnVideoRemote.classList.add('btnRemote-close');
          btnVideoRemote.classList.remove('btnRemote-open');
          btnVideoRemote.innerHTML = `<i class="fas fa-video-slash"></i>`;

          //// get_data_command เพื่อสร้าง div ปิดกล้อง ////

          if (Screen_current == 'first'){
            document.querySelector('#video_remote_slash').classList.remove('d-none');
            document.querySelector('#video_local_slash').classList.add('d-none');
          }else{
            let show_whene_video_no_active = document.querySelector('#show_whene_video_no_active');

            fetch("{{ url('/') }}/api/get_data_command_adn_user" + "?sos_1669_id=" + sos_1669_id)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    
                    show_whene_video_no_active.innerHTML = '' ;

                    let data_command = result['data_command'];
                    let img_command = '{{ url("storage")}}/' + data_command['photo'] ;

                    let html_command_video_close = `
                    <div class="text-center">
                        <img src="`+img_command+`" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">
                        <br><br>
                        <h5>เจ้าหน้าที่ปิดกล้อง</h5>
                    </div>`;

                    show_whene_video_no_active.insertAdjacentHTML('beforeend', html_command_video_close); // แทรกล่างสุด
                    console.log('สร้าง DIV ปิดกล้อง');
            });
          }
          
          //// จบ get_data_command เพื่อสร้าง div ปิดกล้อง ////
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
    // --------------------------------------------------------- //
    // -------------------- User Left -------------------------- //
    // --------------------------------------------------------- //
    // --------------------------------------------------------- //

    agoraEngine.on("user-left", function(evt) {
      remotePlayerContainer.classList.add('d-none');
      channelParameters.localVideoTrack.play(localPlayerContainer);
      userJoinRoom = false;
      // alert('มีคนออก');
      command_entered_room = 'yes' ;

      document.querySelector('#btn_switchScreen').classList.add('d-none');

      btnVideoRemote.classList.add('d-none');
      btnMicRemote.classList.add('d-none');
      remotePlayerContainer.classList.remove('d-none')
      document.querySelector('.video-remote').innerHTML = '' ;
      document.querySelector('.video-remote').classList.add('d-none') ;

      Screen_current = 'first' ; // first second

    });

    // --------------------------------------------------------- //
    // --------------------------------------------------------- //

    var Screen_current = 'first' ; // first second

    btn_switchScreen.onclick = async function() {

      console.log(Screen_current);
      console.log(agoraEngine['remoteUsers'][0]);

      if (Screen_current == 'first'){
        channelParameters.localVideoTrack.play(remotePlayerContainer);
        channelParameters.remoteVideoTrack.play(localPlayerContainer);
        Screen_current = 'second' ; // first second
        document.querySelector('#video_local_slash').classList.add('d-none');
      }else{
        channelParameters.localVideoTrack.play(localPlayerContainer);
        channelParameters.remoteVideoTrack.play(remotePlayerContainer);
        Screen_current = 'first' ; // first second
        document.querySelector('#video_remote_slash').classList.add('d-none');
      }

      if (isMuteVideo) {
        if (Screen_current == 'first'){
          document.querySelector('#video_local_slash').classList.remove('d-none');
        }else{
          document.querySelector('#video_remote_slash').classList.remove('d-none');
        }
      }

      if (Remote_MuteVideo){
        if (Screen_current == 'first'){
          channelParameters.remoteVideoTrack.stop(remotePlayerContainer);
          document.querySelector('#video_local_slash').classList.add('d-none');
          document.querySelector('#video_remote_slash').classList.remove('d-none');
        }else{
          // document.querySelector('#video_local_slash').classList.remove('d-none');
          channelParameters.remoteVideoTrack.stop(remotePlayerContainer);
          document.querySelector('#video_remote_slash').classList.add('d-none');
        }
      }

      if (Remote_MuteVideo && isMuteVideo){
          // document.querySelector('#video_local_slash').classList.remove('d-none');

          if (Screen_current == 'first'){
            channelParameters.remoteVideoTrack.stop(remotePlayerContainer);
            document.querySelector('#video_remote_slash').classList.remove('d-none');
            // document.querySelector('#video_local_slash').classList.add('d-none');
          }else{

          }
      }

    }


    btn_switchCamera.onclick = async function() {
      
      console.log('btn_switchCamera');

      console.log('activeVideoDeviceId');
      console.log(activeVideoDeviceId);

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
        // radio.checked = device.deviceId === activeVideoDeviceId;

        let label = document.createElement('label');
        label.classList.add('dropdown-item');
        label.appendChild(radio);
        label.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${videoDeviceList.children.length + 1}`));

        videoDeviceList.appendChild(label);
        radio.addEventListener('change', onChangeVideoDevice);

        count_i = count_i + 1 ;
      });

      // ---------------------------

      if (videoDevices.length > 2){
        document.querySelector('.btn_for_select_video_device').click();
      }else{

        let check_videoDevices = document.getElementsByName('video-device');
        for (let i = 0; i < check_videoDevices.length; i++) {
          if (check_videoDevices[i].value != activeVideoDeviceId) {

            console.log('********************');
            console.log('value');
            console.log(check_videoDevices[i].value);
            console.log('id');
            console.log(check_videoDevices[i].id);
            console.log('********************');

            activeVideoDeviceId = check_videoDevices[i].value ;
            document.querySelector('#'+check_videoDevices[i].id).click();
            break;
          }
        }

      }

    }

    btnVideo.onclick = async function() {
      if (isMuteVideo == false) {
        // Mute the local video.
        channelParameters.localVideoTrack.setEnabled(false);
        // Update the button text.
        btnVideo.innerHTML = '<i class="fa-solid fa-video-slash"></i>';
        btnVideo.classList.add('btn-disabled');
        btnVideo.classList.remove('btn-active');
        isMuteVideo = true;

        if (Screen_current == 'first'){
          document.querySelector('#video_local_slash').classList.remove('d-none');
        }else{
          document.querySelector('#video_remote_slash').classList.remove('d-none');
        }

        alertNoti('<i class="fa-solid fa-video-slash"></i>', 'กล้องปิดอยู่');

      } else {
        channelParameters.localVideoTrack.setEnabled(true);
        // channelParameters.localVideoTrack.play(localPlayerContainer);

        // if (userJoinRoom == false) {
        //   channelParameters.localVideoTrack.play(localPlayerContainer);
        // } else {
        //   channelParameters.localVideoTrack.play(remotePlayerContainer);
        // }

        if (Screen_current == 'first'){
          channelParameters.localVideoTrack.play(localPlayerContainer);
          channelParameters.remoteVideoTrack.play(remotePlayerContainer);
          document.querySelector('#video_local_slash').classList.add('d-none');
        }else{
          channelParameters.localVideoTrack.play(remotePlayerContainer);
          channelParameters.remoteVideoTrack.play(localPlayerContainer);
          document.querySelector('#video_remote_slash').classList.add('d-none');
        }

        btnVideo.innerHTML = '<i class="fa-solid fa-video"></i>';
        btnVideo.classList.remove('btn-disabled');
        btnVideo.classList.add('btn-active');
        isMuteVideo = false;

        alertNoti('<i class="fa-solid fa-video"></i>', 'กล้องเปิดอยู่');

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
        alertNoti('<i class="fa-solid fa-microphone-slash"></i>', 'ไมโครโฟนปิดอยู่');
      } else {
        // Unmute the local video.
        channelParameters.localAudioTrack.setEnabled(true);
        // Update the button text.
        btnMic.innerHTML = '<i class="fa-solid fa-microphone"></i>';
        btnMic.classList.remove('btn-disabled');
        btnMic.classList.add('btn-active');
        isMuteAudio = false;
        alertNoti('<i class="fa-solid fa-microphone"></i>', 'ไมโครโฟนเปิดอยู่');
      }
    }

    window.onload = function() {
      // Listen to the Join button click event.
      document.getElementById("join").onclick = async function() {
        // console.log("--- Onclick >> JOIN ---");
        // console.log(option.channel);
        // Join a channel.
        try{
          await agoraEngine.join(option.appId, option.channel, option.token, option.uid);
        }catch{
          console.log('========================================');
          console.log('>>>>>> เชื่อมต่อล้มเหลว กำลังเชื่อต่อใหม่ <<<<<<');
          console.log('========================================');
          document.querySelector('#show_text_noti').innerHTML = 'เชื่อมต่อล้มเหลว กำลังเชื่อต่อใหม่..' ;
          setTimeout(function() {
            window.location.reload(true);
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

        // console.log("publish success!");

        // >>> UPDATE Member in room agora chat <<< //
        fetch("{{ url('/') }}/api/join_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=user_join')
          .then(response => response.json())
          .then(result => {
              // console.log(result);

              let data_command = result['data_command'];

              setTimeout(function() {
                  // console.log('========================================');
                  // console.log('>>>>>> Get User <<<<<<');
                  // console.log('========================================');

                  let show_whene_video_no_active = document.querySelector('#show_whene_video_no_active');

                  if( agoraEngine['remoteUsers'][0] ){
                    document.querySelector('#btn_switchScreen').classList.remove('d-none');

                    if( agoraEngine['remoteUsers']['length'] != 0 ){

                      for(let c_uid = 0; c_uid < agoraEngine['remoteUsers']['length']; c_uid++){
                        if(!agoraEngine['remoteUsers'][c_uid]['_video_added_']){
                          // กล้องปิด
                          Remote_MuteVideo = true ;
                          // channelParameters.localVideoTrack.setEnabled(true);
                          channelParameters.localVideoTrack.play(remotePlayerContainer);
                          btnVideoRemote.classList.remove('d-none');
                          btnMicRemote.classList.remove('d-none');
                          document.querySelector('.video-remote').classList.remove('d-none');
                        }
                      }
                      create_html_no_video();
                    }

                  }else{
                    setTimeout(function() {
                      if( agoraEngine['remoteUsers']['length'] != 0 ){
                        document.querySelector('#btn_switchScreen').classList.remove('d-none');

                        for(let c_uid = 0; c_uid < agoraEngine['remoteUsers']['length']; c_uid++){
                          if(!agoraEngine['remoteUsers'][c_uid]['_video_added_']){
                            // กล้องปิด
                            Remote_MuteVideo = true ;
                            // channelParameters.localVideoTrack.setEnabled(true);
                            channelParameters.localVideoTrack.play(remotePlayerContainer);
                            btnVideoRemote.classList.remove('d-none');
                            btnMicRemote.classList.remove('d-none');
                            document.querySelector('.video-remote').classList.remove('d-none');
                          }
                        }
                        create_html_no_video();
                      }else{
                        channelParameters.localVideoTrack.play(localPlayerContainer);
                        create_html_no_video();
                      }
                    }, 1000);
                  }
              }, 2000);

              function create_html_no_video(){

                show_whene_video_no_active.innerHTML = '' ;
                let img_command = '{{ url("storage")}}/' + data_command['photo'] ;

                let html_command_video_close = `
                <div class="text-center">
                    <img src="`+img_command+`" style="width: 10rem!important;height: 10rem!important;border-radius: 50%;object-fit: cover;background-color: #ffffff;border: solid 1px #000;" class="main-shadow main-radius">
                    <br><br>
                    <h5>เจ้าหน้าที่ปิดกล้อง</h5>
                </div>`;

                show_whene_video_no_active.insertAdjacentHTML('beforeend', html_command_video_close); // แทรกล่างสุด

              }

              // ตรวจสอบ เจ้าหน้าที่ อยู่ในห้อง
              setTimeout(function() {
                loop_check_command_in_room();
              }, 1000);
          });
              
      }

      // Listen to the Leave button click event.
      document.getElementById('leave').onclick = async function() {

        btnVideoRemote.classList.add('d-none');
        btnMicRemote.classList.add('d-none');
        document.querySelector('.video-remote').classList.add('d-none');

        // Destroy the local audio and video tracks.
        channelParameters.localAudioTrack.close();
        channelParameters.localVideoTrack.close();
        // Remove the containers you created for the local video and remote video.
        removeVideoDiv(remotePlayerContainer.id);
        removeVideoDiv(localPlayerContainer.id);

        // Leave the channel
        await agoraEngine.leave();
        // console.log("You left the channel");
        let go_to_show_user = document.querySelector('#go_to_show_user');
        let go_to_show_user_href = document.createAttribute("href");
            go_to_show_user_href.value = '{{ url("/") }}/sos_help_center/'+'{{ $sos_id }}'+'/show_user' ;
            go_to_show_user.setAttributeNode(go_to_show_user_href);

        fetch("{{ url('/') }}/api/left_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=user_left')
          .then(response => response.json())
          .then(result => {
              // console.log(result);
          });

          setTimeout(function() {
              document.querySelector('#go_to_show_user').click();
          }, 1000);
        // Refresh the page for reuse
        // window.location.reload();
      }
    }
  }


  // Remove the video stream from the container.
  function removeVideoDiv(elementId) {
    // console.log("Removing " + elementId + "Div");
    let Div = document.getElementById(elementId);
    if (Div) {
      Div.remove();
    }
  };

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

    document.body.appendChild(newAlertElement);

  }
</script>




 
<script>
  // Find necessary elements
  const videoBody = document.querySelector(".video-body");
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
@endsection