@extends('layouts.viicheck_for_officer')

@section('content')
<style>
    body,
    html {
        height: 100%;
        width: 100%;
    }

    body,
    div,
    span,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Kanit', sans-serif !important;
    }

    #map_show_user {
        position: relative;
        width: 100% !important;
        height: 70% !important;

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

    .gmnoprint {
        display: none;

    }

    .gm-style-cc {
        display: none;
    }

    .gm-fullscreen-control {
        display: none;
    }

    .gm-svpc {
        display: none;
    }

    .sry-open-location-text {
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        color: black;
        width: 80%;
    }

    .sry-open-location img {
        margin-top: 30%;
        width: 100%;
        object-fit: cover;
        height: 100%;
    }

    .sry-open-location p {
        font-size: clamp(12px, 5vw, 20px) !important;
    }

    [alt="google"] {
        display: none !important;
    }

    .bordertest {
        position: absolute;
        top: 63.3%;
        height: 60px;
        width: 100%;
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#000000+28,000000+38,000000+49,000000+49&0+0,0.65+53,0.65+61,0.65+76,0.65+91 */
        /* IE9 SVG, needs conditional override of 'filter' to 'none' */
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ffffff+0,ffffff+41&0+4,1+55 */
        /* IE9 SVG, needs conditional override of 'filter' to 'none' */
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQlIiBzdG9wLWNvbG9yPSIjZmZmZmZmIiBzdG9wLW9wYWNpdHk9IjAiLz4KICAgIDxzdG9wIG9mZnNldD0iNDElIiBzdG9wLWNvbG9yPSIjZmZmZmZmIiBzdG9wLW9wYWNpdHk9IjAuNzMiLz4KICAgIDxzdG9wIG9mZnNldD0iNTUlIiBzdG9wLWNvbG9yPSIjZmZmZmZmIiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
        background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, 0.73) 41%, rgba(255, 255, 255, 1) 55%);
        /* FF3.6-15 */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(4%, rgba(255, 255, 255, 0)), color-stop(41%, rgba(255, 255, 255, 0.73)), color-stop(55%, rgba(255, 255, 255, 1)));
        /* Chrome4-9,Safari4-5 */
        background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, 0.73) 41%, rgba(255, 255, 255, 1) 55%);
        /* Chrome10-25,Safari5.1-6 */
        background: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, 0.73) 41%, rgba(255, 255, 255, 1) 55%);
        /* Opera 11.10-11.50 */
        background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, 0.73) 41%, rgba(255, 255, 255, 1) 55%);
        /* IE10 preview */
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, 0.73) 41%, rgba(255, 255, 255, 1) 55%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ffffff', endColorstr='#ffffff', GradientType=0);
        /* IE6-8 */

    }

    .logo-viichek {
        position: absolute;
        z-index: 99;
        top: 1%;
        left: 3%;
        width: 80px;
    }

    .distanceOfficer {
        font-size: 3rem;
        font-weight: bolder;
        color: #808080;
        margin: 5px 0 0 10px;
    }

    .distanceKmOfficer {
        font-size: 1em;
        color: #808080;
    }

    .durationOfficer {
        font-size: 1.4rem;
        font-weight: bolder;
        color: #808080;
        margin: -5px 0 0 10px;
    }

    hr {
        margin: 15px 0 15px 10px;
        width: 70px;
    }

    .box-organization_helper {
        margin: 0 0 0 10px;
        width: 100%;
    }

    .box-organization_helper p {
        color: #808080;
        font-size: 1.3rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 90%;
    }

    .box-data-helper {
        /* position: absolute; */
        display: flex;
        align-items: center;
        width: 100%;
        height: 35%;
        bottom: 0;
    }

    .box-data-helper div {
        width: 100%;
    }



    .centered {
        width: 70px !important;
    }

    .open-location-pls {
        position: absolute;
        display: flex;
        align-items: center;
        justify-items: center;
        width: 100%;
        height: 35%;
        bottom: 0;
        margin: auto;
        padding: auto;
    }

    .close-data {
        animation: slide-hide 1s ease 0s 1 normal forwards;
    }

    @keyframes slide-hide {
        0% {
            opacity: 1;
            transform: translateX(0);
        }

        100% {
            opacity: 0;
            transform: translateX(-100px);
        }
    }

    .show-data {
        animation: show-data 1s ease 0s 1 normal forwards;
    }

    @keyframes show-data {
        0% {
            opacity: 0;
            transform: translateX(100px);
        }

        100% {
            opacity: 1 !important;
            transform: translateX(0);
        }
    }

    .officer-arrive {
        z-index: 999999;
    }
</style>

<style>
    .pl {
        display: block;
        width: 5.375em;
        height: 5.375em;
    }

    .pl__arrows,
    .pl__ring-rotate,
    .pl__ring-stroke,
    .pl__tick {
        animation-duration: 2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    .pl__arrows {
        animation-name: arrows42;
        transform: rotate(45deg);
        transform-origin: 16px 52px;
    }

    .pl__ring-rotate,
    .pl__ring-stroke {
        transform-origin: 80px 80px;
    }

    .pl__ring-rotate {
        animation-name: ringRotate42;
    }

    .pl__ring-stroke {
        animation-name: ringStroke42;
        transform: rotate(-45deg);
    }

    .pl__tick {
        animation-name: tick42;
    }

    .pl__tick:nth-child(2) {
        animation-delay: -1.75s;
    }

    .pl__tick:nth-child(3) {
        animation-delay: -1.5s;
    }

    .pl__tick:nth-child(4) {
        animation-delay: -1.25s;
    }

    .pl__tick:nth-child(5) {
        animation-delay: -1s;
    }

    .pl__tick:nth-child(6) {
        animation-delay: -0.75s;
    }

    .pl__tick:nth-child(7) {
        animation-delay: -0.5s;
    }

    .pl__tick:nth-child(8) {
        animation-delay: -0.25s;
    }

    /* Animations */
    @keyframes arrows42 {
        from {
            transform: rotate(45deg);
        }

        to {
            transform: rotate(405deg);
        }
    }

    @keyframes ringRotate42 {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(720deg);
        }
    }

    @keyframes ringStroke42 {

        from,
        to {
            stroke-dashoffset: 452;
            transform: rotate(-45deg);
        }

        50% {
            stroke-dashoffset: 169.5;
            transform: rotate(-180deg);
        }
    }

    @keyframes tick42 {

        from,
        3%,
        47%,
        to {
            stroke-dashoffset: -12;
        }

        14%,
        36% {
            stroke-dashoffset: 0;
        }
    }

    .text-organization {
        font-size: 1rem !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<img class="logo-viichek" src="{{ asset('/img/logo/logo-viicheck-outline.png') }}" />
<div id="map_show_user">
    <div class="sry-open-location">
        <img src="{{ asset('/img/more/sorry-no-text.png') }}" />
        <center>
            <p class="sry-open-location-text h4" style="top: 45%;">ขออภัยค่ะ</p>
            <p class="sry-open-location-text h5" style="top: 55%;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</p>
        </center>
    </div>
</div>

<div class="bordertest"></div>


<style>
    .home-demo .item {
        background: #ff3f4d;
    }

    .home-demo h2 {
        color: #FFF;
        text-align: center;
        padding: 5rem 0;
        margin: 0;
        font-style: italic;
        font-weight: 300;
    }

    .owl-next,
    .owl-prev {
        position: absolute;
        top: 45%;
    }

    .owl-next span {
        padding: 10;

    }

    .owl-prev span {
        padding: 10;

    }

    .owl-prev {
        padding: 15px;
        left: 0;
    }

    .owl-next {
        right: 0;
    }

    /* .owl-nav {
		

	} */

    .owl-dots {
        position: absolute;
        bottom: 0px;
        width: 100%;
        display: flex;
        justify-content: center;

    }

    .owl-dot span {
        width: 7px !important;
        height: 7px !important;
    }

    .carousalOfficerSOS {
        position: absolute;
        bottom: 5px;
    }

    .badge-wrap {
        min-width: 70px !important;
    }
</style>

<!-- Div กำลังค้นหาตำแหน่งที่ตั้ง -->
<div id="open_location_pls" class="container bg-white open-location-pls w-100" style="bottom: 5%;height:25% !important;">
    <div class="w-100 text-center" style="margin-top: -25%;">
        <div class="d-flex justify-content-center">
            <svg class="pl" viewBox="0 0 160 160" width="160px" height="160px" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="grad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#000"></stop>
                        <stop offset="100%" stop-color="#fff"></stop>
                    </linearGradient>
                    <mask id="mask1">
                        <rect x="0" y="0" width="160" height="160" fill="url(#grad)"></rect>
                    </mask>
                    <mask id="mask2">
                        <rect x="28" y="28" width="104" height="104" fill="url(#grad)"></rect>
                    </mask>
                </defs>

                <g>
                    <g class="pl__ring-rotate">
                        <circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none" stroke="hsl(223,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39" stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)"></circle>
                    </g>
                </g>
                <g mask="url(#mask1)">
                    <g class="pl__ring-rotate">
                        <circle class="pl__ring-stroke" cx="80" cy="80" r="72" fill="none" stroke="hsl(193,90%,55%)" stroke-width="16" stroke-dasharray="452.39 452.39" stroke-dashoffset="452" stroke-linecap="round" transform="rotate(-45,80,80)"></circle>
                    </g>
                </g>

                <g>
                    <g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round" transform="translate(80,80)">
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-135,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-90,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(-45,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(0,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(45,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(90,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(135,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,10%,90%)" points="0,2 0,14" transform="rotate(180,0,0) translate(0,40)"></polyline>
                    </g>
                </g>
                <g mask="url(#mask1)">
                    <g stroke-width="4" stroke-dasharray="12 12" stroke-dashoffset="12" stroke-linecap="round" transform="translate(80,80)">
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-135,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-90,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(-45,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(0,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(45,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(90,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(135,0,0) translate(0,40)"></polyline>
                        <polyline class="pl__tick" stroke="hsl(223,90%,80%)" points="0,2 0,14" transform="rotate(180,0,0) translate(0,40)"></polyline>
                    </g>
                </g>

                <g>
                    <g transform="translate(64,28)">
                        <g class="pl__arrows" transform="rotate(45,16,52)">
                            <path fill="hsl(3,90%,55%)" d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z"></path>
                            <path fill="hsl(223,10%,90%)" d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z"></path>
                        </g>
                    </g>
                </g>
                <g mask="url(#mask2)">
                    <g transform="translate(64,28)">
                        <g class="pl__arrows" transform="rotate(45,16,52)">
                            <path fill="hsl(333,90%,55%)" d="M17.998,1.506l13.892,43.594c.455,1.426-.56,2.899-1.998,2.899H2.108c-1.437,0-2.452-1.473-1.998-2.899L14.002,1.506c.64-2.008,3.356-2.008,3.996,0Z"></path>
                            <path fill="hsl(223,90%,80%)" d="M14.009,102.499L.109,58.889c-.453-1.421,.559-2.889,1.991-2.889H29.899c1.433,0,2.444,1.468,1.991,2.889l-13.899,43.61c-.638,2.001-3.345,2.001-3.983,0Z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <br>
        <h5 style="margin-top: -45%;" class="font-weight-bold mb-0 notranslate">กำลังค้นหาตำแหน่งที่ตั้ง</h5>
        <span style="bottom: -20%;border-radius:10px" class="sry-open-location-text btn btn-md btn-warning main-shadow main-radius p-2" onclick="window.location.reload(true);">
            <i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
        </span>
    </div>
</div>

<!-- กำลังค้นหาเจ้าหน้าที่ -->
<div id="Searching_officer" class="owl-carousel owl-theme carousalOfficerSOS d-none">
    <div class="item">
        <div class="container bg-white officer-arrive w-100" style="bottom: -4.5%;">
            <div class="w-100 text-center">
                <img src="{{ asset('/img/stickerline/PNG/34.png') }}" style="object-fit: contain;" width="80" height="80" alt="">
                <br>
                <h5 class="font-weight-bold mb-0 notranslate mt-2" style="color: #000;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">
                    <b>สวัสดีคุณ </b>
                </h5>
                <h5 class="mb-0 mt-2 notranslate mt-1" style="color: #808080;">กำลังค้นหาหน่วยปฏิบัติการที่ใกล้คุณ</h5>
                <h6 class="mb-0 mt-2 notranslate mt-1" style="color: #808080;">กรุณารอสักครู่..</h6>
                <a href="{{ url('/') }}/user_video_call/sos_help_center?sos_id={{ $data_sos->id }}" class="btn-outline-primary btn btn-block w-100 p-2 mt-3" style="border-radius: 10px;">ติดต่อเจ้าหน้าที่</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        // Owl Carousel
        var owl = $(".carousalOfficerSOS");
        owl.owlCarousel({
            items: 1,
            margin: 10,
            loop: false,
            nav: false,
            dots: false,
        });
    });
</script>

<!-- เจ้าหน้าที่เดินทางมาถึงแล้ว -->
<div id="div_officer_to_the_scene" class="container bg-white officer-arrive w-100 d-none" style="bottom: -4.5%;">
    <div class="w-100 text-center">
        <img src="{{ asset('/img/stickerline/PNG/34.png') }}" width="80" alt="">
        <br>
        <h5 class="font-weight-bold mb-0 notranslate mt-2" style="color: #808080;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">
            สวัสดีคุณ <span id="name_user_in_to_the_scene">16516</span>
        </h5>
        <h6 class="mb-0 notranslate mt-1" style="color: #808080;">เจ้าหน้าที่มาถึงแล้ว</h6>
        <a href="https://lin.ee/y3gA8A3" class="btn-outline-success btn btn-block w-100 p-2 mt-3" style="border-radius: 10px;">เสร็จสิ้น</a>
    </div>
</div>

<!-- แสดงข้อมูลเจ้าหน้าที่ -->
<div id="div_data_officer_help" class="container bg-white officer-arrive w-100 d-none" style="bottom: -4.5%;">
    <div class="container box-data-helper d-">
        <div>
            <span class="d-block">
                <span class="distanceOfficer" id="text_distance">11</span>
                <span class="distanceKmOfficer" id="text_distance_km">11</span>
                <a href="{{ url('/video_call_4/before_video_call_4?type=sos_map&sos_id=') . $data_sos->id }}" class="distanceKmOfficer float-end btn btn-info" style="color:#ffffff;margin-top:25px;">
                    <i class="fa-solid fa-video"></i>
                </a>
            </span>
            <div class="d-block">
                <span class="durationOfficer" id="text_duration">22</span>
                <span class="durationOfficer" id="time_duration">22</span>
            </div>
            <hr>
            <div class="d-flex align-items-center ml-2">
                <div class="centered">
                    <div class="badge-wrap">
                        <img id="img_profile" src="" width="70" height="70" class="rounded-circle" alt="">
                    </div>
                </div>
                <div class="flex-grow-1 ms-3 box-organization_helper">
                    <p class="font-weight-bold mb-0 notranslate" id="name_helper">aaaa</p>
                    <p class="font-weight-bold mb-0 notranslate text-organization" id="organization_helper">bbbb</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>
    var officer_lng
    var officer_lat
    var officer_id
    var loop_officer_id;

    document.addEventListener('DOMContentLoaded', (event) => {

        // console.log("START");
        initMap(); //เปิดด้วย

        let check_status = "{{ $data_sos->status }}";
            // console.log(check_status);

        if(check_status == "รับแจ้งเหตุ"){
            document.querySelector("#Searching_officer").classList.remove('d-none');
        }else if(check_status == "กำลังไปช่วยเหลือ"){
            document.querySelector("#div_data_officer_help").classList.remove('d-none');
            getDataOfficerGoToHelp();
        }else{
            document.querySelector("#div_officer_to_the_scene").classList.remove('d-none');
        }

    });


    function getDataOfficerGoToHelp() {

        fetch("{{ url('/') }}/api/sos_map/data_officer" + "/" + '{{ $data_sos->id }}')
            .then(response => response.json())
            .then(result => {
                console.log(result);


            });

    }
</script>

<script>
    const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";
    const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
    const image_empty = "{{ url('/img/icon/flag_empty.png') }}";

    var officer_marker;
    var sos_marker;

    var service;
    var directionsDisplay;

    var sos_lat = '{{ $data_sos->lat }}';
    var sos_lng = '{{ $data_sos->lng }}';

    var time_to_the_scene;

    function initMap() {

        document.querySelector("#open_location_pls").classList.add('d-none');

        map_show_user = new google.maps.Map(document.getElementById("map_show_user"), {
            center: {
                lat: parseFloat(sos_lat),
                lng: parseFloat(sos_lng)
            },
            zoom: 15
        });

        // หมุดเจ้าหน้าที่
        if (officer_marker) {
            officer_marker.setMap(null);
        }

        officer_marker = new google.maps.Marker({
            position: {
                lat: parseFloat(officer_lat),
                lng: parseFloat(officer_lng)
            },
            map: map_show_user,
            icon: image_operating_unit_general,
        });

        // หมุด SOS
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {
                lat: parseFloat(sos_lat),
                lng: parseFloat(sos_lng)
            },
            map: map_show_user,
            icon: image_sos,
        });

        // loop_check_status_officer();

    }

    var check_status_officer;

    function loop_check_status_officer() {
        check_status_officer = setInterval(function() {
            let sos_id = '{{ $data_sos->id }}';
            // console.log('loop_check_status_officer');
            func_check_status_officer(sos_id);
        }, 6000);
    }

    function Stop_loop_check_status_officer() {
        clearInterval(check_status_officer);
    }

    function func_check_status_officer(sos_id) {
        fetch("{{ url('/') }}/api/check_status_officer" + "/" + sos_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result.helper_id);
                if (result.helper_id) {
                    Stop_loop_check_status_officer();
                    document.querySelector('.carousalOfficerSOS').innerHTML = '';

                    window.location.reload();
                }
            });
    }
</script>

<script>
    function get_Directions_API(markerA, markerB, officer_id) {

        if (directionsDisplay) {
            directionsDisplay.setMap(null);
        }

        service = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map_show_user,
            suppressMarkers: true, // suppress the default markers
        });

        service.route({
            origin: markerA.getPosition(),
            destination: markerB.getPosition(),
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                // console.log(response);


                // ระยะทาง
                let text_distance = response.routes[0].legs[0].distance.text;
                // console.log(text_distance);
                let text_distance_sp = text_distance.split(' ');

                document.querySelector("#text_distance").innerHTML = text_distance_sp[0];

                document.querySelector("#text_distance_km").innerHTML = text_distance_sp[1];


                // เวลา
                let text_duration = response.routes[0].legs[0].duration.text;
                // console.log(text_duration);

                document.querySelector("#text_duration").innerHTML = text_duration;

                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value);
                document.querySelector("#time_duration").innerHTML = "ถึงเวลา " + text_arrivalTime;

                loop_check_location_officer();

                // document.querySelector('#div_distance_and_duration').classList.remove('d-none');
            } else {
                console.log('Directions request failed due to ' + status);

            }
        });

    }

    function loop_check_location_officer() {

        loop_check_officer = setInterval(function() {
            // console.log(loop_officer_id);
            // console.log('loop_check_location_officer');
            check_location_officer(loop_officer_id);
        }, 8000);
    }

    function Stop_loop_check_officer() {
        clearInterval(loop_check_officer);
    }

    function check_location_officer(officer_id) {

        fetch("{{ url('/') }}/api/check_location_officer" + "/" + officer_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result['officer_lat']);
                // console.log(result['officer_lng']);

                if (result['status'] != "ถึงที่เกิดเหตุ") {

                    const newPosition = new google.maps.LatLng(parseFloat(result['officer_lat']), parseFloat(result['officer_lng']));
                    officer_marker.setPosition(newPosition);

                    let bounds = new google.maps.LatLngBounds();
                    bounds.extend(new google.maps.LatLng(parseFloat(sos_lat), parseFloat(sos_lng)));
                    bounds.extend(new google.maps.LatLng(parseFloat(result['officer_lat']), parseFloat(result['officer_lng'])));

                    map_show_user.fitBounds(bounds);

                } else {
                    Stop_loop_check_officer();
                    // document.querySelector('#btn_modal_officer_to_the_scene').click();
                    document.querySelector('.box-data-helper-' + officer_id).innerHTML =
                        `<div class="container bg-white officer-arrive w-100" style="bottom: -4.5%;">
						<div class="w-100 text-center">
							<img src="{{ asset('/img/stickerline/PNG/34.png') }}" style="object-fit: contain;" width="80" height="80" alt="">
							<br>
							<h5 class="font-weight-bold mb-0 notranslate mt-2" style="color: #808080;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">สวัสดีคุณ </h5>
							<h6 class="mb-0 notranslate mt-1" style="color: #808080;">เจ้าหน้าที่` + result['name_officer'] + `มาถึงแล้ว</h6>
							<a href="https://lin.ee/y3gA8A3" class="btn-outline-success btn btn-block w-100 p-2 mt-3" style="border-radius: 10px;">เสร็จสิ้น</a>
						</div>
					</div>`;


                    // document.querySelector('.officer-arrive').classList.remove('d-none');
                    // document.querySelector('.officer-arrive').classList.add('show-data');
                }
            });

    }
</script>

@endsection