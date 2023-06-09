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
      width: 80%;
    }
    .video-detail-officer-box *{
      margin: 0;
      color: #fff;
    }
    .video-detail-box{
      display: none !important;
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
      background-color: #ff0000;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
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
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      width: 80%;
    }
    .video-detail-officer-box *{
      margin: 0;
      color: #fff;
    }
    .video-detail-box{
      display: none !important;
    }

    .video-call {
      height: 100%;
      width: 100%;
      padding: 1rem;
      position: relative !important;
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
      background-color: #ff0000;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
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
    top: 10px;
    /* เปลี่ยนจาก top: 10px; เป็น top: 50%; */
    /* outline: #000 1px solid; */
    width: 100%;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    color: #fff !important;
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

  .btnRemote {
    padding: 0 !important;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 13px !important;
    background-color: #db2d2e;
    color: #fff;

  }

  .btnRemote:hover {

    background-color: #db2d2e;
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
      background-color: #ff0000;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='600' y1='25' x2='600' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0000'/%3E%3Cstop offset='1' stop-color='%23E0F'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='650' y1='25' x2='650' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0019'/%3E%3Cstop offset='1' stop-color='%23ce00f3'/%3E%3C/linearGradient%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='700' y1='25' x2='700' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0031'/%3E%3Cstop offset='1' stop-color='%23b000e6'/%3E%3C/linearGradient%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='750' y1='25' x2='750' y2='777'%3E%3Cstop offset='0' stop-color='%23ff004a'/%3E%3Cstop offset='1' stop-color='%239400da'/%3E%3C/linearGradient%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='800' y1='25' x2='800' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0063'/%3E%3Cstop offset='1' stop-color='%237a00ce'/%3E%3C/linearGradient%3E%3ClinearGradient id='f' gradientUnits='userSpaceOnUse' x1='850' y1='25' x2='850' y2='777'%3E%3Cstop offset='0' stop-color='%23ff007c'/%3E%3Cstop offset='1' stop-color='%236200c1'/%3E%3C/linearGradient%3E%3ClinearGradient id='g' gradientUnits='userSpaceOnUse' x1='900' y1='25' x2='900' y2='777'%3E%3Cstop offset='0' stop-color='%23ff0094'/%3E%3Cstop offset='1' stop-color='%234d00b5'/%3E%3C/linearGradient%3E%3ClinearGradient id='h' gradientUnits='userSpaceOnUse' x1='950' y1='25' x2='950' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00ad'/%3E%3Cstop offset='1' stop-color='%233900a8'/%3E%3C/linearGradient%3E%3ClinearGradient id='i' gradientUnits='userSpaceOnUse' x1='1000' y1='25' x2='1000' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00c6'/%3E%3Cstop offset='1' stop-color='%2328009c'/%3E%3C/linearGradient%3E%3ClinearGradient id='j' gradientUnits='userSpaceOnUse' x1='1050' y1='25' x2='1050' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00df'/%3E%3Cstop offset='1' stop-color='%23180090'/%3E%3C/linearGradient%3E%3ClinearGradient id='k' gradientUnits='userSpaceOnUse' x1='1100' y1='25' x2='1100' y2='777'%3E%3Cstop offset='0' stop-color='%23ff00f7'/%3E%3Cstop offset='1' stop-color='%230b0083'/%3E%3C/linearGradient%3E%3ClinearGradient id='l' gradientUnits='userSpaceOnUse' x1='1150' y1='25' x2='1150' y2='777'%3E%3Cstop offset='0' stop-color='%23E0F'/%3E%3Cstop offset='1' stop-color='%23007'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg %3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' x='100' width='1100' height='800'/%3E%3Crect fill='url(%23c)' x='200' width='1000' height='800'/%3E%3Crect fill='url(%23d)' x='300' width='900' height='800'/%3E%3Crect fill='url(%23e)' x='400' width='800' height='800'/%3E%3Crect fill='url(%23f)' x='500' width='700' height='800'/%3E%3Crect fill='url(%23g)' x='600' width='600' height='800'/%3E%3Crect fill='url(%23h)' x='700' width='500' height='800'/%3E%3Crect fill='url(%23i)' x='800' width='400' height='800'/%3E%3Crect fill='url(%23j)' x='900' width='300' height='800'/%3E%3Crect fill='url(%23k)' x='1000' width='200' height='800'/%3E%3Crect fill='url(%23l)' x='1100' width='100' height='800'/%3E%3C/g%3E%3C/svg%3E");
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

    }
    .video-officer-detail p{
      margin: 0;
      font-weight: bold;
    }
  }

  /* .hrNew ,.video-detail-officer-box{
    display: none;
  } */
</style>
<div class="video-call">
  <div class="video-header">
    <div class="video-detail-officer-box">
      <div class="d-flex justify-content-center">
        @if(!empty($data_officer_command->user->photo))
          <img class="imgOfficer" width="500" height="500" src="{{ url('storage')}}/{{ $data_officer_command->user->photo }}" />
        @else
          <img class="imgOfficer" width="500" height="500" src="{{ url('/img/stickerline/flex/12.png') }}" />
        @endif
      </div>
      <span class="video-officer-detail">
        <p>เจ้าหน้าที่ : {{ $data_officer_command->name_officer_command }}</p>
        <small>{{ $data_officer_command->user->phone }}</small>
      </span>
      <span class="video-officer-detail">
        เจ้าหน้าที่ศูนย์สั่งการ {{ $data_officer_command->area }}
      </span>
      
      <button class="btn btn-success" id="join">join</button>
      
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
          <button class="btn" id="btnMic">
            <i class="fa-duotone fa-microphone"></i>


          </button>
          <span class="containerbtnDevice d-non">

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
       
        <div class="btnGroup">
          <button class="btn" id="btnVideo">
            <i class="fas fa-video"></i>
          </button>
          <span class="containerbtnDevice d-non">

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
      </div>
    </div>


  </div>

  <div class="video-body">
    <div class="video-local">
      <div class="containerbtnRemote">
        <button id="btnVideoRemote" class="btn btnRemote d-none"><i class="fas fa-video-slash"></i></button>
        <button id="btnMicRemote" class="btn btnRemote d-none"><i class="fa-duotone fa-microphone-slash"></i></button>
      </div>
    </div>

    <div class="video-remote d-none"></div>

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
    // uname: '{{ Auth::user()->name }}',

    token: "",
  };

document.addEventListener('DOMContentLoaded', (event) => {

  fetch("{{ url('/') }}/api/video_call" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&appCertificate=' + appCertificate  + '&appId=' + appId)
    .then(response => response.text())
    .then(result => {
        console.log("GET Token success");
        console.log(result);

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


  async function startBasicCall() {
    // Create an instance of the Agora Engine

    console.log(option);

    const agoraEngine = AgoraRTC.createClient({
      mode: "rtc",
      codec: "vp8"
    });
    /////////////////////// จอคนเข้าร่วม//////////////////
    const remotePlayerContainer = document.querySelector('.video-remote');
    /////////////////////// จอตัวเอง/////////////////////
    const localPlayerContainer = document.querySelector('.video-local');

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
        const activeVideoDeviceId = stream.getVideoTracks()[0].getSettings().deviceId;

        // แยกอุปกรณ์ตามประเภท
        const audioDevices = devices.filter(device => device.kind === 'audioinput');
        const videoDevices = devices.filter(device => device.kind === 'videoinput');

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

        // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
        const videoDeviceList = document.getElementById('video-device-list');
        videoDevices.forEach(device => {
          const radio = document.createElement('input');
          radio.type = 'radio';
          radio.name = 'video-device';
          radio.value = device.deviceId;
          radio.checked = device.deviceId === activeVideoDeviceId;

          const label = document.createElement('label');
          label.classList.add('dropdown-item');
          label.appendChild(radio);
          label.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${videoDeviceList.children.length + 1}`));

          videoDeviceList.appendChild(label);
          radio.addEventListener('change', onChangeVideoDevice);
        });
      } catch (error) {
        console.error('เกิดข้อผิดพลาดในการเรียกดูอุปกรณ์:', error);
      }
    });

    // เรียกใช้งานเมื่อต้องการเปลี่ยนอุปกรณ์เสียง
    function onChangeAudioDevice() {
      const selectedAudioDeviceId = getCurrentAudioDeviceId();
      console.log('เปลี่ยนอุปกรณ์เสียงเป็น:', selectedAudioDeviceId);

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

          console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
        })
        .catch(error => {
          console.error('เกิดข้อผิดพลาดในการสร้าง local audio track:', error);
        });
    }


    function onChangeVideoDevice() {
      const selectedVideoDeviceId = getCurrentVideoDeviceId();
      console.log('เปลี่ยนอุปกรณ์กล้องเป็น:', selectedVideoDeviceId);

      // // หยุดการส่งภาพจากอุปกรณ์ปัจจุบัน
      // channelParameters.localVideoTrack.setEnabled(false);

      // สร้าง local video track ใหม่โดยใช้กล้องที่คุณต้องการ
      AgoraRTC.createCameraVideoTrack({
          cameraId: selectedVideoDeviceId
        }).then(newVideoTrack => {

          // ปิดการเล่นภาพวิดีโอกล้องเดิม
          channelParameters.localVideoTrack.stop();
          channelParameters.localVideoTrack.close();


          // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
          channelParameters.localVideoTrack = newVideoTrack;
          if (isMuteVideo == false) {
            // เริ่มส่งภาพจากอุปกรณ์ใหม่
            channelParameters.localVideoTrack.setEnabled(true);
            // แสดงภาพวิดีโอใน <div>

            if (userJoinRoom == false) {
              channelParameters.localVideoTrack.play(localPlayerContainer);
            } else {
              channelParameters.localVideoTrack.play(remotePlayerContainer);
            }

            channelParameters.localVideoTrack.open();
            // ส่ง local video track ใหม่ไปยังผู้ใช้คนที่สอง
            agoraEngine.publish([channelParameters.localVideoTrack]);

            // alert('เปิด')
            console.log('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
          } else {
            // alert('ปิด')
            channelParameters.localVideoTrack.setEnabled(false);
          }

        })
        .catch(error => {
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
    // Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
    agoraEngine.on("user-published", async (user, mediaType) => {
      // Subscribe to the remote user when the SDK triggers the "user-published" event.
      await agoraEngine.subscribe(user, mediaType);
      console.log("subscribe success");

      remotePlayerContainer.classList.remove('d-none');

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
        channelParameters.localVideoTrack.play(remotePlayerContainer);

        // remote Usre เปิดกล้อง //////
        if (user.videoTrack) {
          btnVideoRemote.classList.add('d-none');
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
          btnMicRemote.classList.add('d-none');
        }
      }
      // Listen for the "user-unpublished" event.
      agoraEngine.on("user-unpublished", async (user, mediaType) => {

        // remote Usre ปิดไมค์ //////
        if (mediaType === "audio") {
          if (!user.audioTrack) {
            btnMicRemote.classList.remove('d-none');
          }
        }

        // remote Usre ปิดกล้อง //////
        if (mediaType == "video") {
          if (!user.remoteVideoTrack) {
            btnVideoRemote.classList.remove('d-none');
          }
        }

      });

      agoraEngine.on("user-left", function(evt) {
        remotePlayerContainer.classList.add('d-none');
        channelParameters.localVideoTrack.play(localPlayerContainer);
        userJoinRoom = false;
        // alert('มีคนออก');
      });


    });

    btnVideo.onclick = async function() {
      if (isMuteVideo == false) {
        // Mute the local video.
        channelParameters.localVideoTrack.setEnabled(false);
        // Update the button text.
        btnVideo.innerHTML = '<i class="fa-solid fa-video-slash"></i>';
        btnVideo.classList.add('btn-disabled');
        isMuteVideo = true;

        alertNoti('<i class="fa-solid fa-video-slash"></i>', 'กล้องปิดอยู่');

      } else {
        channelParameters.localVideoTrack.setEnabled(true);
        // channelParameters.localVideoTrack.play(localPlayerContainer);

        if (userJoinRoom == false) {
          channelParameters.localVideoTrack.play(localPlayerContainer);
        } else {
          channelParameters.localVideoTrack.play(remotePlayerContainer);
        }
        btnVideo.innerHTML = '<i class="fa-solid fa-video"></i>';
        btnVideo.classList.remove('btn-disabled');
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
        isMuteAudio = true;
        alertNoti('<i class="fa-solid fa-microphone-slash"></i>', 'ไมโครโฟนปิดอยู่');
      } else {
        // Unmute the local video.
        channelParameters.localAudioTrack.setEnabled(true);
        // Update the button text.
        btnMic.innerHTML = '<i class="fa-solid fa-microphone"></i>';
        btnMic.classList.remove('btn-disabled');
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
        await agoraEngine.join(option.appId, option.channel, option.token, option.uid);
        // Create a local audio track from the audio sampled by a microphone.
        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
        // Create a local video track from the video captured by a camera.
        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
        // Append the local video container to the page body.
        // document.body.append(localPlayerContainer);
        // Publish the local audio and video tracks in the channel.
        await agoraEngine.publish([channelParameters.localAudioTrack, channelParameters.localVideoTrack]);
        // Play the local video track.
        channelParameters.localVideoTrack.play(localPlayerContainer);
        // console.log("publish success!");

        // >>> UPDATE Member in room agora chat <<< //
        fetch("{{ url('/') }}/api/join_room" + "?sos_1669_id=" + sos_1669_id + "&user_id=" + '{{ Auth::user()->id }}' + '&type=user_join')
          .then(response => response.json())
          .then(result => {
              // console.log(result);
          });

      }


      // Listen to the Leave button click event.
      document.getElementById('leave').onclick = async function() {
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
    console.log("Removing " + elementId + "Div");
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