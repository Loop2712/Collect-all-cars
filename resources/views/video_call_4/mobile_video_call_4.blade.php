<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<style>
	html,
	body,
	.full-height,
	.page-content,
	.wrapper {
		height: 100%;
		min-height: calc(100%) !important;
        max-height: calc(100%) !important;
        padding-bottom: 0;
		/* padding-top: 0; */
		/* margin-top: 0; */
		margin-bottom: 0;

        overscroll-behavior: none;/* ปิด การขยับเมื่อเกินขอบของ ios */
	}

	.data-sos {
		outline: 1px solid #000;
		border-radius: 5px;
		min-height: 100%;
		background-color: #2b2d31;
		color: #fff !important;
	}

	.data-sos * {
		color: #fff;
	}

	.video-call-contrainer {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
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
		width: 300px;
		margin: 0 5px;
		aspect-ratio: 16/9;
		height: 100% !important;
		background: red;
		/* padding-top: calc(9 / 16 * 100%); */
		outline: #000 1px solid;
		position: relative;
	}

	.btn-show-hide-user-video-call {
		position: absolute;
		color: #fff;
		background-color: rgb(0, 0, 0, 0.4);
		border-radius: 50px;
		opacity: 0;
		top: 10%;
		left: 50%;
		transform: translate(-50%, -10%);
		padding: 5px 25px;
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
		background-color: #2b2d31;
        outline: black;
	}

	.user-video-call-contrainer {
		/* display: flex;
  		justify-content: center; */
		position: relative;

	}

	.grid-template {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	#container_user_video_call {
		width: 100%;
		height: 100%;
		overflow: auto;
		padding: 1px 3rem;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	#container_user_video_call .custom-div {
		/* aspect-ratio: 16/9; */
		width: 100%;
		outline: #000 1px solid;
		border-radius: 5px;
		position: relative;
		margin: 1rem;
	}

	#container_user_video_call .custom-div:only-child {
		flex: 0 0 calc(100% - 40px);
		aspect-ratio: 3/4;
	}

    .head_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: auto;
        padding: 10px;
        border-radius: 7px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
        border-top: red 5px solid;
    }

    .neck_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: auto;
        padding: 10px;
        border-radius: 7px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
        border-top: rgb(81, 255, 0) 5px solid;
    }

    .body_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: auto;
        padding: 10px;
        border-radius: 7px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
        border-top: rgb(0, 99, 247) 5px solid;
    }

	/* #container_user_video_call .custom-div:not(:only-child) {
		flex: 0 0 calc(100% - 40px);
		aspect-ratio: 16/9;
	}
	#container_user_video_call .custom-div:not(:only-child):first-child {
		flex: 0 0 calc(50% - 40px);
		aspect-ratio: 16/9;
	}#container_user_video_call .custom-div:not(:only-child):nth-child(2) {
		flex: 0 0 calc(50% - 40px);
		aspect-ratio: 16/9;
	} */
	/* #container_user_video_call .test-1 {
		flex: 0 0 calc(100% - 40px);
		aspect-ratio: 3/4;
	}

	#container_user_video_call .test-2 {
		flex: 0 0 calc(100% - 40px);
		aspect-ratio: 16/9;
	}
	#container_user_video_call .test-3 {
		flex: 0 0 calc(50% - 40px);
		aspect-ratio: 3/4;
	}

	#container_user_video_call .test-5 {
		flex: 0 0 calc(50% - 40px);
		aspect-ratio: 3/4;

	} */
	.custom-div .status-input-output {
		position: absolute;
		top: 0;
		right: 0;
		display: flex;
	}

    .custom-div .status-sound-output{
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
    }

	.custom-div .infomation-user {
		position: absolute;
		bottom: 0;
		right: 0;
		background-color: rgb(0, 0, 0, 0.4);
		padding: .5rem 1rem .5rem ;
		border-radius: 10px;
		margin: 1rem;
		color: #fff !important;
        font-size: 3em;
        font-weight: bold;
        /* word-wrap: break-word; */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: calc(100% - 10%);
        /* width: 90%; */

	}

	.infomation-user .role-user-video-call,
	.infomation-user .name-user-video-call {
		display: block;
	}

	.status-input-output .mic,
	.status-input-output .camera,
    .status-sound-output .sound {
		margin: 5px;
		background-color: rgb(0, 0, 0, 0.4);
		padding: .5rem 1rem .5rem;
		border-radius: 10px;
		color: #fff;
        font-size: 50px !important;
	}

	.user-video-call-bar .custom-div .infomation-user {
		transform: scale(0.8);
		margin: 0.5;
		bottom: -5px;
		right: -10px;
        font-size: 2em;
        font-weight: bold;
        /* word-wrap: break-word; */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: calc(100% - 5%);
        /* width: 90%; */

	}

	.user-video-call-bar .custom-div .status-input-output {
		transform: scale(0.8);
		margin: 0.5;
		top: -5px;
		right: -10px;
	}

    .user-video-call-bar .custom-div .status-sound-output{
		transform: scale(0.8);
		margin: 0.5;
		top: -5px;
		left: -10px;
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

	.status-case-bar {
		padding: .9rem;
		height: 100%;
		display: flex;
		align-items: center;
	}

	.status-case-bar p {
		width: calc(100% - 15%);
		background-color: #c7c5bf;
		font-size: 40px;
        font-weight: bold;
		border-radius: 20px;
		height: 100%;
		display: flex;
		align-items: center;
        justify-content:  center;
		margin: 1rem;
		padding: 1rem;
        white-space: pre-line;
	}

	.status-case-bar button {
		width: calc(100% - 85%);
		height: 100%;
		margin: 1rem;
        border-radius: 20px;
	}

    .transparent-div {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 3;
        background: rgba(255, 255, 255, 0);
    }

	.btn-video-call-container {
		height: 100%;
		/* background-color: #000; */
	}

	.fadeDiv {
		position: fixed;
		bottom: 0;
		left: 0;
		right: 0;
		max-height: 50%;
        max-width: 100%;
		/* background-color: #f0f0f0; */
		opacity: 0;
		/* text-align: center; */
		overflow: auto;
		transition: opacity 0.5s, max-height 0.5s;
        background-color: #f3f5fa;
        border-radius: 5px;
	}

    .settingDiv {
		position: fixed;
		bottom: 11%;
		right: 9%;
		height: 20%;
        width: 50%;
		background-color: #3f3e3e;
        color: #ffffff;
		opacity: 0;
		/* text-align: center; */
		overflow: auto;
		transition: opacity 0.2s, max-height 0.5s;
        border-radius: 5px;
        overflow-y: auto; /* เพื่อให้มีการเลื่อนลงไปดูได้ */
	}

    .card-settings {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 15px;
        /* align-items: center; */
    }

    .card-settings div {
        flex-basis: calc(33.33% - 8px); /* ให้มีความกว้างเท่ากัน แบ่ง 3 ส่วนและลบระยะห่าง */
        height: 100px;
        width: 100px;
        border-radius: 50%;
        margin: 6px 4px;
    }

    .inMenuDiv {
		position: fixed;
		bottom: 0;
		left: 0;
		right: 0;
		height: 50%;
        max-width: 100%;
		/* background-color: #f0f0f0; */
		opacity: 0;
		transition: opacity 0.5s, max-height 0.5s;
        background-color: #3f3e3e;
        overflow-y: auto; /* เพื่อให้มีการเลื่อนลงไปดูได้ */
	}

    .font-weight-bold{
        font-weight: bold !important;
    }

    /* --------------------------  ฟังก์ชัน เปลี่ยนไมค์และกล้อง -------------------------------------*/

    .dropcontent {
        visibility: hidden;
        width: 142px;
        & a {
            color: rgb(31, 193, 27);
        }
    }

    .open_dropcontent {
        visibility: visible;
    }

    .dropcontent2{
        visibility: hidden;
        width: 142px;
        & a {
            color: rgb(31, 193, 27);
        }
    }

    .open_dropcontent2 {
        visibility: visible;
    }

    .btnSpecial_mute{
        background-color: #f15a5a ; /* Discord's color */
    }
    .btnSpecial_mute:hover{
        background-color: #fa3838 !important; /* Discord's color */
    }

    .btnSpecial_unmute{
        background-color: #3f3e3e ; /* Discord's color */
    }

    .btnSpecial_switch{
        background-color: #3f3e3e ; /* Discord's color */
    }

    .btnSpecial_settings{
        background-color: #3f3e3e ; /* Discord's color */
    }

    .btnSpecial_settings:hover{
        background-color: #616060 ; /* Discord's color */
    }

    .btnSpecial_menu{
        background-color: rgba(82, 82, 82, 0.1) ; /* Discord's color */
    }

    .btnSpecial_menu:hover{
        background-color: #616060 ; /* Discord's color */
    }

    .btn_leave{
        background-color: #ff0000 ; /* Discord's color */
    }

    .btn_leave:hover{
        background-color: #fa3838 !important; /* Discord's color */
    }

    .btnSpecial {
        border: none;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin: 5px;
        top: 0; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 0;
        border:#fff 1px solid;
    }

    .audio_button{
        background: rgba(255, 255, 255, 0);
        position: absolute;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        border:#fff 1px;
    }

    .video_button{
        background: rgba(255, 255, 255, 0);
        position: absolute;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        border:#fff 1px;
    }

    .btnSpecial:hover {
        background-color: #292828; /* Discord's color */
    }


    .btnSpecial i{
        color: #ffffff;
        font-size: 2.5rem;
        transition: transform 0.3s ease; /* เพิ่มการเปลี่ยนแปลงอย่างนุ่มนวล */
    }

    .smallCircle {
        background-color: #3f3e3e; /* เปลี่ยนสีพื้นหลังตามที่คุณต้องการ */
        border: none;
        border-radius: 50%;
        width: 60px; /* ปรับขนาดตามที่คุณต้องการ */
        height: 60px; /* ปรับขนาดตามที่คุณต้องการ */
        position: absolute;
        bottom: 20;
        right: 20;
        transform: translate(50%, 50%);
        display: flex;
        justify-content: center;
        align-items: center;
        border:#fff 1px solid;
        z-index: 1;
    }

    .smallCircle:hover{
        background-color: #292828; /* Discord's color */
    }

    .smallCircle i{
        color: #ffffff;
        font-size: 1em;
    }

    .fa-arrow-up {
        color: #fff; /* เปลี่ยนสีไอคอนตามที่คุณต้องการ */
        font-size: 20px; /* ปรับขนาดตามที่คุณต้องการ */
    }

    .ui-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        position: absolute;
        bottom: 10%; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 10;
        /* right: 0;
        top: 0; */
        background-color: #3f3e3e;
        border-radius: 5px;
        z-index: 9999; /* เพื่อให้แสดงอยู่ข้างบนของปุ่ม */
        min-width: 50%; /* กำหนดความกว้างขั้นต่ำ */

    }

    .ui-list-item {
        color: #ffffff; /* สีข้อความ */
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between; /* จัดตัว radio2 ไปทางขวา */
        align-items: center; /* จัดให้เนื้อหาแนวตั้งกลาง */
        font-size: 2em;
    }

    .top-0 {
        top: 0;
    }

    .top-50 {
        top: 50px;
    }

    .top-100 {
        top: 100px;
    }

    /* เมื่อเมาส์ hover บนรายการ */
    .ui-list-item:hover {
        background-color: #555555; /* เปลี่ยนสีพื้นหลังเมื่อ hover */
        cursor: pointer;
    }

    .overflow_auto_video_call{
        overflow: auto;
    }



    /* -------------------------- จบ ฟังก์ชัน เปลี่ยนไมค์และกล้อง -------------------------------------*/

    /* =================ตัว loading animation==================== */
    #lds-ring {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 1); /* ปรับสีพื้นหลังตามความต้องการ */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* ให้มีค่า z-index สูงกว่าทุกอย่างบนหน้าเว็บ */
    }

    .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid #2f0cf3;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #1a6ce7 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    /* Loadong Animation 2 */

    /* HTML: <div class="loader"></div> */
    .loader {
        --d:22px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        color: #25b09b;
        box-shadow:
            calc(1*var(--d))      calc(0*var(--d))     0 0,
            calc(0.707*var(--d))  calc(0.707*var(--d)) 0 1px,
            calc(0*var(--d))      calc(1*var(--d))     0 2px,
            calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
            calc(-1*var(--d))     calc(0*var(--d))     0 4px,
            calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
            calc(0*var(--d))      calc(-1*var(--d))    0 6px;
        animation: l27 1s infinite steps(8);
    }

    @keyframes l27 {
        100% {transform: rotate(1turn)}
    }


    /* ----------------- End ตัว loading animation ----------------- */

    /* ----------------- ตัว Popup แจ้งเตือน----------------- */
    .div_alert {
	    position: fixed;
	    top: -70px;
	    bottom: 0;
	    left: 0;
	    width: 100%;
	    height: 100px;
	    text-align: center;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 18px;
        display: none; /* เริ่มต้นซ่อน .div_alert */
	}

	.div_alert span {
	    background-color: #2DD284;
	    border-radius: 10px;
	    color: white;
	    padding: 30px;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 3em;
	}

    .up_down {
	    animation-name: slideDownAndUp;
	    animation-duration:10s;
	}

	@keyframes slideDownAndUp {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(180px);
        }
        90% {
            transform: translateY(180px);
        }
        100% {
            transform: translateY(0);
        }
    }
     /* ----------------- End ตัว Popup แจ้งเตือน----------------- */
    .advice_text{
        background-color: rgba(99, 90, 90, 0);
        color: #ffffff;
        font-size: 3rem;
        position: absolute;
        left: 0;
        right: 0;
        bottom: -3%;
        padding: 1rem;
    }

    .profile-picture {
        border: none;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin: 5px;
        top: 0; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 0;
        border:#000000 1px solid;
    }

    .profile-info {
        /* width: 40%; */
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .profile-info span {
        margin: 0;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .vertical-divider {
        border-left: 1px solid black; /* เส้นแบ่งสีดำ */
        height: 100%; /* ปรับให้เส้นแบ่งเต็มความสูงของคอลัมน์ */
    }

    /*============ ตัวปรับเสียง สำหรับมือถือ ============== */

    .wrapper_range_volume {
        background-color: #4d4c4c;
        position: relative;
        width: 100%;
        height: 5rem;
        border-radius: 10px;

    }

    .wrapper_range_volume::before{
        content: "-";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.5rem;
        color: #fff;
    }

    .wrapper_range_volume::after {
        content: "+";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.5rem;
        color: #fff;
    }

    .wrapper_range_volume::before {
        left: 1rem;
    }

    .wrapper_range_volume::after {
        right: 1rem;
    }

    .wrapper_range_volume input[type="range"] {
        -webkit-appearance: none;
        background-color: rgba(255, 255, 255, .2);
        position: relative;
        width: 100%;
        height: 5rem;
        border-radius: 0.5rem;
        overflow: hidden;
        cursor: row-resize;

        &[step]{
            background-color: transparent;
            background-image: repeating-linear-gradient(to right, rgba(255, 255, 255, .2), rgba(255, 255, 255, .2) calc(12.5% - 1px), #4d4c4c 12.5%);
        }

    }

    .wrapper_range_volume input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 0;
        box-shadow: 20rem 0 0 20rem rgba(255, 255, 255, 0.2);
    }

    .wrapper_range_volume input[type="range"]::-moz-range-thumb {
        border: none;
        width: 0;
        box-shadow: 20rem 0 0 20rem rgba(255, 255, 255, 0.2);
    }

    .icon-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
        background-color:#3f3e3e78;
        border-radius: 50%;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }


</style>
<!-- ใช้ในการเปลี่ยนสีสถานะ ของหน้านี้ -->
@php
    switch ($sos_data->status) {
        case 'เสร็จสิ้น':
            $color_text_status = "text-success";
            break;
        case 'รับแจ้งเหตุ':
            $color_text_status = "text-danger";
            break;
        default:
            $color_text_status = "text-warning";
            break;
    }
@endphp

<div id="alert_warning" class="div_alert" role="alert">
    <span id="alert_text">
        <!-- ใช้ javascript กำหนด innerHTML-->
    </span>
</div>

<button id="join" class="btn btn-success d-none" >เข้าร่วม</button>

<div class="row full-height">

    <div class="d-flex justify-content-center align-items-center">
        <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>

    <div class="col-12" style="height: calc(100% - 90%);">
        <div class="status-case-bar d-flex justify-content-center align-items-center">
            <p class="font-30 row text-center">
                @if ($type_brand == "android")
                    @if (!empty($sos_data->status))
                        <span class="m-2" id="status_of_Room">สถานะ : <b class="{{$color_text_status}}">{{ $sos_data->status }}</b></span>
                    @else
                        <span class="m-2" id="status_of_Room">สถานะ : <b class="text-dark">--</b></span>
                    @endif
                    <span id="time_of_room" class="m-2"></span>
                @else
                    @if (!empty($sos_data->status))
                        <span class="m-0" id="status_of_Room">สถานะ : <b class="{{$color_text_status}}">{{ $sos_data->status }}</b></span>
                    @else
                        <span class="m-0" id="status_of_Room">สถานะ : <b class="text-dark">--</b></span>
                    @endif
                    <span id="time_of_room" class="m-0"></span>
                @endif

            </p>

            @if ($role_permission !== 'help_seeker')
                <button class="btn btn-success" id="fadeButton"><i class="fa-solid fa-file-invoice" style="font-size: 45px;"></i></button>
            @endif
        </div>
    </div>
    <div class="col-12" style="height: calc(100% - 30%); border: 0;">
        <div class="d-flex h-100 row">
            <div style="position: relative;"  class="video-call">
                <div class=" d-flex align-item-center justify-content-center h-100 row">
                    <div class="d-flex align-self-center justify-content-center mb-3">
                        <div class="row mb-4" id="container_user_video_call">
                        </div>
                    </div>
                </div>
                <div id="adive_text_video_call" class="advice_text d-block text-center">
                    <!-- ใส่ ข้อความที่มาจาก javascript -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 pt-3" style="height: calc(100% - 89%); background-color: #2b2d31; border: 0;">
        <div class="w-100 user-video-call-contrainer d-none " >
            <div class="d-flex justify-content-center align-self-end d-non user-video-call-bar mb-2" >
            </div>
        </div>
    </div>
    <div class="col-12" style="height: calc(100% - 91%); background-color: #ffffff; ">
        <div class="btn-video-call-container mt-2">
            <div class="row d-flex justify-content-center" >

                <!-- เปลี่ยนไมค์ ให้กดได้แค่ในคอม -->
                <div id="div_for_AudioButton" class="btn btnSpecial">
                    @if (Auth::user()->id == 1 || Auth::user()->id == 2 || Auth::user()->id == 64 || Auth::user()->id == 11003429 || Auth::user()->id == 11003473)
                        {{-- <i id="icon_muteAudio" class="fa-solid fa-microphone-stand"></i> --}}
                            <button class="smallCircle" id="btn_switchMicrophone">
                        <i class="fa-sharp fa-solid fa-angle-up"></i>
                    </button>
                    @endif
                </div>

                <!-- เปลี่ยนกล้อง ให้กดได้แค่ในคอม -->
                <div id="div_for_VideoButton" class="btn btnSpecial">
                    {{-- <i id="icon_muteVideo" class="fa-solid fa-camera-rotate"></i> --}}
                </div>

                <div class="btn btnSpecial btnSpecial_switch" id="btn_switchCamera">
                    <i class="fa-duotone fa-camera-rotate" style="--fa-primary-color: #26076e; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>
                </div>

                {{-- <div class="btn btnSpecial btn_leave d-none" id="addButton">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                </div> --}}

                <button id="settingBtn" class="btn btnSpecial btnSpecial_settings" >
                    <i class="fa-solid fa-ellipsis-vertical" style="color: #ffffff;"></i>
                </button>


                <div class="btn btnSpecial btn_leave" id="leave">
                    <i class="fa-solid fa-phone-xmark" style="color: #ffffff;"></i>
                </div>

            </div>
        </div>
    </div>
</div>

    <div class="settingDiv" id="settingDiv" style="display: none; z-index: 5000;">
        <div class="col-12 col-12 d-flex justify-content-center mt-2 ">
            <span class="h1 font-weight-bold text-white">ตั้งค่า</span>
        </div>
        <div class="card-settings">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="btn btnSpecial_menu row p-1" onclick="menu_setting_toggle('menu_sound')">
                    <i class="fa-sharp fa-solid fa-microphone-lines" style="color: #ffffff; font-size:50px; border-radius:50%; width: 100px;"></i>
                    <span class="h3 font-weight-bold text-white">เสียง</span>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-4">
                <div class="btn btnSpecial_menu row p-1 disabled" onclick="menu_setting_toggle('menu_chat')" >
                    <i class="fa-solid fa-messages" style="color: #ffffff; font-size:50px; border-radius:50%; width: 100px;"></i>
                    <span class="h3 font-weight-bold text-white">แชทสนทนา</span>
                </div>
            </div>

        </div>
    </div>

    <div class="inMenuDiv" id="inMenuDiv" style="display: none; z-index: 5000;" data-backdrop="static" data-keyboard="false" tabindex="-1" >
        <div class="col-12 d-flex justify-content-end mt-2">
               <i class="fa-solid fa-circle-xmark m-2" style="font-size: 60px" onclick="close_menu()"></i>
        </div>

        <div class="col-12 col-12 d-flex justify-content-center mt-2 ">
            <span id="title_menu_in_setting" class="h1 font-weight-bold text-white"></span>
        </div>

        <div id="detail_menu_in_setting" class="m-4"></div>
    </div>

    <!-- Modal -->
    {{-- <div class="inMenuDiv hide" id="inMenuDiv" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_menu_in_setting"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="detail_menu_in_setting" class="card m-4">

                </div>
            </div>
        </div>
    </div> --}}

    <div class="dropcontent">
        <ul id="audio-device-list" class="ui-list">
            <!-- Created list-audio from Javascript Here -->
        </ul>
    </div>
    <div class="dropcontent2">
        <ul id="video-device-list" class="ui-list">
            <!-- Created list-video from Javascript Here -->
        </ul>
    </div>

    @if ($type === 'sos_1669')
        <div class="fadeDiv" id="dataDiv" style="display: none; z-index: 5000;">
            <div class="card m-4 text-dark">
                <div class="head_sidebar_div p-4 text-center">

                    @if (Auth::user()->role == "partner")
                        @if (!empty($sos_data->code_for_officer))
                            <p style="font-size: 45px;" class="h1 text-dark font-weight-bold">{{$sos_data->code_for_officer ? $sos_data->code_for_officer : "--"}}</p>
                        @else
                            <p style="font-size: 45px;" class="h1 text-dark font-weight-bold">{{$sos_data->operating_code ? $sos_data->operating_code : "--"}}</p>
                        @endif
                    @else
                        <p style="font-size: 45px;" class="h1 text-dark font-weight-bold">{{$sos_data->operating_code ? $sos_data->operating_code : "--"}}</p>
                    @endif

                    <p style="font-size: 45px;" class="h1 text-dark ">สถานะ:
                        <a style="font-size: 45px;" class="{{$color_text_status}} font-weight-bold">{{$sos_data->status ? $sos_data->status : "--"}}</a>
                    </p>

                    {{-- <p class="text-muted font-size-md">การช่วยเหลือผ่านไปแล้ว</p>
                    <h3 class="text-danger">25 นาที</h3> --}}
                    @php
                        if( !empty($sos_data->created_sos)){
                            $currentdate = date('H:i:s'); // เวลาปัจจุบันในรูปแบบ "H:i:s"
                            $sos_data_time_command = strtotime($sos_data->created_sos); // แปลง $sos_data->time_create_sos เป็น timestamp
                            $sos_data_timeDifference = abs( $sos_data_time_command - strtotime($currentdate) );

                            if ($sos_data_timeDifference >= 86400) { // ถ้าเกิน 1 วัน (86400 วินาที)
                                $sos_data_days = floor($sos_data_timeDifference / 86400);
                                $sos_data_hours = floor(($sos_data_timeDifference % 86400) / 3600);

                                $sos_data_time_unit = $sos_data_days . ' วัน ' . $sos_data_hours . ' ชั่วโมง ';

                            }elseif ($sos_data_timeDifference >= 3600) {
                                $sos_data_hours = floor($sos_data_timeDifference / 3600);
                                $sos_data_remainingMinutes = floor(($sos_data_timeDifference % 3600) / 60);
                                $sos_data_remainingSeconds = $sos_data_timeDifference % 60;

                                $sos_data_time_unit = $sos_data_hours . ' ชั่วโมง ' . $sos_data_remainingMinutes . ' นาที ' . $sos_data_remainingSeconds . ' วินาที';
                            } elseif ($sos_data_timeDifference >= 60) {
                                $sos_data_minutes = floor($sos_data_timeDifference / 60);
                                $sos_data_seconds = $sos_data_timeDifference % 60;

                                $sos_data_time_unit = $sos_data_minutes . ' นาที ' . $sos_data_seconds . ' วินาที';
                            } else {
                                $sos_data_time_unit = $sos_data_timeDifference . ' วินาที';
                            }
                        }else{
                            $sos_data_time_unit  = "--";
                        }
                    @endphp

                    <p style="font-size: 35px;" class="h2 text-secondary mt-2">การช่วยเหลือผ่านไปแล้ว</p>

                    @if (!empty($sos_data_time_unit))
                        <p style="font-size: 45px;" class="h1 text-dark font-weight-bold">{{$sos_data_time_unit}}</p>
                    @else
                        <p style="font-size: 45px;" class="h1 text-dark font-weight-bold"> -- </p>
                    @endif
                </div>
            </div>

            {{-- <div class="card m-4">
                <div class="neck_sidebar_div p-4 text-center">
                    <p class="h1 mb-1 font-weight-bold text-center">ผู้ขอความช่วยเหลือ</p>
                    <p class="h2 text-dark">{{$sos_data->name_user ? $sos_data->name_user : "--"}}</p>
                    <p class="h2 text-dark">{{$sos_data->phone_user ? $sos_data->phone_user : "--"}}</p>
                </div>
            </div> --}}

            <div class="card m-4">
                <div class="neck_sidebar_div p-4 text-center">
                    <p style="font-size: 45px;" class=" mb-1 font-weight-bold text-center">ผู้ขอความช่วยเหลือ</p>
                    <p style="font-size: 45px;" class="font-weight-bold text-dark">{{$sos_data->name_user ? $sos_data->name_user : "--"}}  {{$sos_data->phone_user ? $sos_data->phone_user : "--"}}</p>
                </div>
            </div>

            <div class="card m-4">
                <div class="body_sidebar_div p-4 text-center text-dark">
                    <div class="row mb-3">
                        @php
                            switch ($sos_data->idc) {
                                case 'แดง(วิกฤติ)':
                                    $bg_idc = "#db2d2e";
                                    $text_idc = "แดง";
                                    break;
                                case 'เหลือง(เร่งด่วน)':
                                    $bg_idc = "#ffc30e";
                                    $text_idc = "เหลือง";
                                    break;
                                case 'เขียว(ไม่รุนแรง)':
                                    $bg_idc = "#29cc39";
                                    $text_idc = "เขียว";
                                    break;
                                case 'ขาว(ทั่วไป)':
                                    $bg_idc = "#0d6efd";
                                    $text_idc = "ขาว";
                                    break;
                                case 'ดำ(รับบริการสาธารณสุขอื่น)':
                                    $bg_idc = "#000000";
                                    $text_idc = "ดำ";
                                    break;
                                default:
                                    $bg_idc = "#000000";
                                    $text_idc = "--";
                                    break;
                            }


                            switch ($sos_data->rc) {
                                case 'แดง(วิกฤติ)':
                                    $bg_rc = "#db2d2e";
                                    $text_rc = "แดง";
                                    break;
                                case 'เหลือง(เร่งด่วน)':
                                    $bg_rc = "#ffc30e";
                                    $text_rc = "เหลือง";
                                    break;
                                case 'เขียว(ไม่รุนแรง)':
                                    $bg_rc = "#29cc39";
                                    $text_rc = "เขียว";
                                    break;
                                case 'ขาว(ทั่วไป)':
                                    $bg_rc = "#0d6efd";
                                    $text_rc = "ขาว";
                                    break;
                                case 'ดำ(รับบริการสาธารณสุขอื่น)':
                                    $bg_rc = "#000000";
                                    $text_rc = "ดำ";
                                    break;
                                default:
                                    $bg_rc = "#000000";
                                    $text_rc = "--";
                                    break;
                            }
                        @endphp
                        <div class="col ">
                            <div style="background-color: {{$bg_idc}}; border-radius: 15px;" class="p-2 text-center">
                                <h1 class="text-white font-weight-bold">IDC : {{$text_idc ? $text_idc : "--"}}</h1>
                            </div>
                        </div>
                        <div class="col ">
                            <div style="background-color: {{$bg_rc}}; border-radius: 15px;" class="p-2 text-center">
                                <h1 class="text-white font-weight-bold">RC : {{$text_rc ? $text_rc : "--"}}</h1>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-5">
                        <p class="h1 d-flex align-items-center mb-2 font-weight-bold">รายละเอียดสถานที่</p>
                        <p class="h2 text-muted font-size-xl">{{$sos_data->location_sos ? $sos_data->location_sos : "--"}}</p>
                    </div>
                    <div class="mb-5">
                        <p class="h1 d-flex align-items-center mb-2 font-weight-bold">อาการ</p>
                        <p class="h2 text-muted font-size-xl">{{$sos_data->symptom ? $sos_data->symptom : "--"}}</p>
                    </div>
                    <div class="mb-5">
                        <p class="h1 d-flex align-items-center mb-2 font-weight-bold">รายละเอียดอาการ</p>
                        <p class="h2 text-muted font-size-xl">{{$sos_data->symptom_other ? $sos_data->symptom_other : "--"}}</p>
                    </div> --}}

                    <div class="mb-5">
                        <p style="font-size: 40px;" class="d-flex align-items-center mb-2 font-weight-bold">รายละเอียดสถานที่</p>
                        <p style="font-size: 40px;" class=" ">{{$sos_data->location_sos ? $sos_data->location_sos : "--"}}</p>
                    </div>
                    <div class="mb-5">
                        <p style="font-size: 40px;" class="d-flex align-items-center mb-2 font-weight-bold">อาการ</p>
                        <p style="font-size: 40px;" class=" ">{{$sos_data->symptom ? $sos_data->symptom : "--"}}</p>
                    </div>
                    <div class="mb-5">
                        <p style="font-size: 40px;" class="d-flex align-items-center mb-2 font-weight-bold">รายละเอียดอาการ</p>
                        <p style="font-size: 40px;" class=" ">{{$sos_data->symptom_other ? $sos_data->symptom_other : "--"}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($type === 'sos_map')
        <div class="fadeDiv" id="dataDiv" style="display: none; z-index: 5000;">
            <div class="card m-4">
                <div class="card-body p-3">
                    <div class="card m-4">
                        <div class="head_sidebar_div p-4 ">
                            <div class="text-center">
                                <h4 style="font-size:45px;" class="mb-0 text-info font-weight-bold">
                                    <i style="font-size: 45px;" class="fa-solid fa-user-injured me-1 text-info"></i>ผู้ขอความช่วยเหลือ
                                </h4>
                            </div>
                            <p style="font-size: 45px;" class="text-dark d-flex justify-content-center align-items-center font-weight-bold">{{$sos_data->name ? $sos_data->name : "--"}} | {{$sos_data->phone ? $sos_data->phone : "--"}}</p>
                        </div>
                    </div>

                    <!-- หัวข้อการขอความช่วยเหลือ -->
                    <div class="card m-4">
                        <div class="neck_sidebar_div p-4 ">
                            <div class="text-center">
                                <div>
                                    <h4 style="font-size:45px;" class="mb-0 text-danger font-weight-bold">
                                        <i style="font-size: 45px;" class="fa-solid fa-subtitles me-1 text-danger"></i>ข้อมูล
                                    </h4>
                                </div>
                            </div>
                            <div style="font-size:35px; " class="text-dark">
                                <div style="overflow: hidden; word-wrap: break-word;" class="d-flex align-items-center">
                                    @if ($sos_data->title_sos)
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">หัวข้อ : {{$sos_data->title_sos ? $sos_data->title_sos : "--"}}</p>
                                    @else
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">หัวข้อ : -- </p>
                                    @endif
                                </div>
                                <div style="overflow: hidden; word-wrap: break-word;" class="d-flex align-items-center">
                                    @if ($sos_data->title_sos_other)
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">รายละเอียด : {{$sos_data->title_sos_other ? $sos_data->title_sos_other : "--"}} </p>
                                    @else
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">รายละเอียด : -- </p>
                                    @endif
                                </div>
                                <div style="overflow: hidden; word-wrap: break-word;" class="d-flex align-items-center">
                                    @if ($sos_data->status)
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">สถานะ : {{$sos_data->status ? $sos_data->status : "--"}}</p>
                                    @else
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">สถานะ : -- </p>
                                    @endif
                                </div>
                                <div style="overflow: hidden; word-wrap: break-word;" class="d-flex align-items-center">
                                    @if ($sos_data->lat)
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">Lat : {{$sos_data->lat ? $sos_data->lat : "--"}}</p>
                                    @else
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">Lat : -- </p>
                                    @endif
                                </div>
                                <div style="overflow: hidden; word-wrap: break-word;" class="d-flex align-items-center">
                                    @if ($sos_data->lng)
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">Long : {{$sos_data->lng ? $sos_data->lng : "--"}}</p>
                                    @else
                                        <p style="font-size: 40px; white-space: pre-line;" class=" mb-2 font-weight-bold">Long : -- </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <center>
                        <div class="accordion" id="accordion_Forward_sos" >
                            <div class="accordion-item">
                                <p class="h2 accordion-header" id="headingOne" >
                                      <button type="button" class="btn btn-info p-2 mt-2" style="width:90%; font-size: 45px;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i  class="fa-sharp fa-solid fa-share mr-1"></i>เลือกการส่งต่อ
                                    </button>
                                </p>
                                <div id="collapseOne" class="accordion-collapse collapse mt-2" aria-labelledby="headingOne" data-bs-parent="#accordion_Forward_sos">
                                    <div class="accordion-body">

                                        <span id="btn_ask_1669" class="main-shadow btn btn-md btn-block d-none"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#modal_sos_1669">
                                            <div class="d-flex">
                                                <div class="col-3 p-0 d-flex align-items-center">
                                                    <div class="justify-content-center col-12 p-2">
                                                        <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center col-9 text-center">
                                                    <div id="content_1669" class="justify-content-center col-12">
                                                        @if(empty($sos_data->sos_1669_id))
                                                        <b>
                                                            <span class="d-block" style="color: #ffffff; font-size: 40px;">แพทย์ฉุกเฉิน (1669)</span>
                                                            <span id="name_1669_area" class="d-block" style="color: #ffffff; font-size: 35px;"></span>
                                                        </b>
                                                        @else
                                                        <b>
                                                            <span class="d-block" style="color: #ffffff; font-size: 40px;">ส่งต่อ 1669 แล้ว</span>
                                                        </b>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </span>

                                        <hr>
                                        <label class="h1 font-weight-bold">หมายเลขโทรศัพท์ <br>ศูนย์รับแจ้งเหตุและสั่งการจังหวัดต่างๆ</label>
                                        <div id="content_phone_niems" class="mt-2"></div>

                                        <div class="d-none">
                                            <input type="text" name="name" id="name" value="{{ $sos_data->name }}">
                                            <input type="text" name="phone" id="phone" value="{{ $sos_data->phone }}">
                                            <input type="text" name="user_id" id="user_id" value="{{ $sos_data->user_id }}">
                                            <input type="text" name="lat" id="lat" value="{{ $sos_data->lat }}">
                                            <input type="text" name="lng" id="lng" value="{{ $sos_data->lng }}">
                                            <input type="text" name="photo_sos_1669" id="photo_sos_1669" value="{{ $sos_data->photo }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>

            @if(!empty($sos_data->helper_id))
            <!-- ข้อมูลเจ้าหน้าที่ -->
            <div class="card m-4">
                <div class="body_sidebar_div p-4 text-center">
                    <div class="text-center">
                        <h4 style="font-size:45px;" class="mb-0 text-success font-weight-bold">
                            <i class="fa-solid fa-user me-1 text-success"></i>ข้อมูลเจ้าหน้าที่
                        </h4>
                    </div>
                    <p style="font-size: 45px;" class="font-weight-bold text-dark">{{$sos_data->user_helper->name ? $sos_data->user_helper->name : "--"}} | {{$sos_data->user_helper->phone ? $sos_data->user_helper->phone : "--"}}</p>
                </div>
            </div>

            @endif
        </div>
    @endif



{{-- <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

{{-- <script src="{{ asset('js/for_video_call_4/resize_div_video_call.js') }}"></script> --}}
{{-- <script src="{{ asset('js/for_video_call_4/video_call_4.js') }}"></script> --}}

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
    var name_local;
    var type_local;
    var profile_local;

    // ใช้สำหรับ เช็ค icon
    var isIconSound = [];

    // ใช้สำหรับ เช็คไม่ให้ฟังก์ชันออกห้องทำงานซ้ำ
    var leaveChannel = "false";
    // เกี่ยวกับเวลาในห้อง
    var people_in_room = 0;
    var check_start_timer_video_call = false;
    var check_user_in_video_call = false;
    // var hours = 0;
    // var minutes = 0;
    // var seconds = 0;
    var meet_2_people = 'No' ;

    //สำหรับกำหนด text advice
    var type_advice = "inc";
    // เรียกสองอันเพราะไม่อยากไปยุ่งกับโค้ดเก่า
    var user_id = '{{ Auth::user()->id }}';
    var user_data = @json(Auth::user());

    var agora_id = '{{ $data_agora->id}}';
    var sos_id = '{{ $sos_id }}';
    var type_video_call = '{{ $type }}';

    var array_remoteVolumeAudio = [];

    var agoraEngine;

    var type_of_microphone_remote_icon_in_setting; //ใช้สำหรับ เปลี่ยน icon microphone ของ remote ใน setting

    var type_user_sos;


    document.addEventListener('DOMContentLoaded', (event) => {

        var appId = sessionStorage.getItem('a');
        var appCertificate = sessionStorage.getItem('b');

        // สลับตำแหน่ง appId และ appCertificate
        function swapValues(value1, value2) {
            return {
                agoraAppId: value1.split('').reverse().join(''),
                agoraAppCertificate: value2.split('').reverse().join('')
            };
        }

        // สลับตำแหน่ง appId และ appCertificate
        const swappedValues = swapValues(appId, appCertificate);

        // กำหนดค่าที่ถูกสลับกลับไปที่ตัวแปรเดิม
        appId = swappedValues.agoraAppId;
        appCertificate = swappedValues.agoraAppCertificate;

        if (!appId || !appCertificate) {
            appId = '{{ env("AGORA_APP_ID") }}';
            appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
        }

        options =
        {
            // Pass your App ID here.
            appId: appId,
            // Set the channel name.
            channel: type_video_call+sos_id,
            // Pass your temp token here.
            token: '',
            // Set the user ID.
            uid: user_id,

            role: '',
        };

        if(user_data.photo){
            profile_local = "{{ url('/storage') }}" + "/" + user_data.photo;
        }else if(!user_data.photo && user_data.avatar){
            profile_local = user_data.avatar;
        }else{
            profile_local = "https://www.viicheck.com/Medilab/img/icon.png";
        }
        //===== สุ่มสีพื้นหลังของ localPlayerContainer=====
        fetch("{{ url('/') }}/api/get_local_data_4" + "?user_id=" + options.uid + "&type=" + type_video_call + "&sos_id=" + sos_id)
            .then(response => response.json())
            .then(result => {

                bg_local = result.hexcolor;
                // bg_local = "#F0D2CC";
                name_local = result.name_user;
                type_local = result.user_type;

                type_user_sos = type_local; //เก็บ ประเภทผู้ใช้ไว้ใน array

                changeBgColor(bg_local);

        })
        .catch(error => {
            console.log("โหลดข้อมูล LocalUser ล้มเหลว ใน get_local_data_4");
        });

        function LoadingVideoCall() {
            const loadingAnime = document.getElementById('lds-ring');

            setTimeout(() => {
                //หลังจากสร้าง localPlayerContainer เสร็จให้เอา animation loading ออก
                if(loadingAnime){
                    loadingAnime.classList.remove('d-none');
                }
                fetch("{{ url('/') }}/api/video_call_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId + '&type=' + type_video_call + '&sos_id=' + sos_id)
                    .then(response => response.json())
                    .then(result => {
                        // console.log("GET Token success");
                        // console.log(result);
                        // console.log("result['channel']");
                        // console.log(result['channel']);

                        // options['channel'] = result['channel'];
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
                        appId = '{{ env("AGORA_APP_ID") }}';
                        appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
                        LoadingVideoCall();
                    }, 2000);
                });

            }, 1000);
        }

        //แสดง animation โหลด
        LoadingVideoCall();
        //เริ่มทำการสร้าง channel Video_call
        startBasicCall();
        //หาตำแหน่งของผู้ใช้ --> แสดงข้อมูล sos_map ตามจังหวัด
        if(type_video_call === "sos_map"){
            find_location();
        }

    });

    var channelParameters =
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
        agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp9" });
            // console.log("agoraEngine");
            // console.log(agoraEngine);
        let rtcStats = agoraEngine.getRTCStats();
            // console.log("rtcStats");
            // console.log(rtcStats);

        agoraEngine.enableAudioVolumeIndicator(); // ฟังก์ชันตรวจจับเสียงพูด

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
        localPlayerContainer.style.transform = "scaleX(-1)";
        localPlayerContainer.classList.add('agora_create_local');

        // Listen for the "user-published" event to retrieve a AgoraRTCRemoteUser object.
        agoraEngine.on("user-published", async (user, mediaType) =>
        {
            await agoraEngine.subscribe(user, mediaType);
            // console.log("subscribe success");
            // console.log("user");
            // console.log(user);

            // setTimeout(() => {
            //     StatsVideoUpdate();
            // }, 2500);

            // Set the remote video container size.
            remotePlayerContainer[user.uid] = document.createElement("div");
            remotePlayerContainer[user.uid].style.backgroundColor = "black";
            remotePlayerContainer[user.uid].style.width = "100%";
            remotePlayerContainer[user.uid].style.height = "100%";
            remotePlayerContainer[user.uid].style.position = "absolute";
            remotePlayerContainer[user.uid].style.left = "0";
            remotePlayerContainer[user.uid].style.top = "0";

            // ตรวจสอบว่า user.uid เป็นไอดีของ remote user ที่คุณเลือก
            // if (mediaType == "video" && user.videoTrack)
            if (mediaType == "video")
            {
                channelParameters.remoteVideoTrack = user.videoTrack;
                channelParameters.remoteAudioTrack = user.audioTrack;

                // console.log("============== channelParameters.remoteVideoTrack ใน published  ==================");
                // console.log(channelParameters.remoteVideoTrack);

                channelParameters.remoteUid = user.uid;
                remotePlayerContainer[user.uid].id = user.uid;

                //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//
                let name_remote;
                let type_remote;
                fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid + "&type=" + type_video_call + "&sos_id=" + sos_id)
                    .then(response => response.json())
                    .then(result => {
                        // console.log("result published ---");
                        // console.log(result);

                        bg_remote = result.hexcolor;
                        // bg_remote = "#F0D2CC";
                        name_remote = result.name_user;
                        type_remote = result.user_type;


                        // สำหรับ สร้าง divVideo ตอนผู้ใช้เปิดกล้อง
                        create_element_remotevideo_call(remotePlayerContainer[user.uid], name_remote, type_remote , bg_remote ,user);

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

                if(user.hasAudio == false){
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

                // channelParameters.remoteVideoTrack.play(remotePlayerContainer);

                // Set a stream fallback option to automatically switch remote video quality when network conditions degrade.
                // agoraEngine.setStreamFallbackOption(channelParameters.remoteUid, 1);

            }

            if (mediaType == "audio")
            {

                channelParameters.remoteAudioTrack = user.audioTrack;
                channelParameters.remoteAudioTrack.play();

                // channelParameters.remoteAudioTrack.setVolume(parseInt(array_remoteVolumeAudio[user.uid]));

                let userVolume;
                if (array_remoteVolumeAudio[user.uid]) {
                    userVolume = parseInt(array_remoteVolumeAudio[user.uid]);
                }else{
                    userVolume = 70; // หรือค่าที่ต้องการ
                }

                let deviceType = checkDeviceType();
                if (deviceType == "Mobile (iOS)") {
                    if (userVolume == 0) {
                        channelParameters.remoteAudioTrack.stop();
                    } else {
                        channelParameters.remoteAudioTrack.play();
                    }
                } else {
                    if (userVolume) {
                        channelParameters.remoteAudioTrack.setVolume(parseInt(userVolume));
                    } else {
                        channelParameters.remoteAudioTrack.setVolume(70);
                    }
                }

                // channelParameters.remoteAudioTrack.setVolume(userVolume);

                // document.querySelector("#remoteAudioVolume_"+user.uid).addEventListener("change", function (evt) {
                //     document.querySelector("#remoteAudioVolume_"+user.uid).value = evt.target.value;
                //     console("ปรับเสียงเป็น : "+evt.target.value);
                //     // Set the local audio volume.
                //     channelParameters.remoteAudioTrack.setVolume(parseInt(evt.target.value));
                //     // บันทึกค่าลงใน localStorage เพื่อให้ค่าเสียงเป็นค่าเริ่มต้นต่อครั้งถัดไป
                // });

                let localVolumeFromStorage = localStorage.getItem('local_sos_1669_rangeValue') ?? 100;
                // ตั้งค่าเสียงในตอนที่เริ่มต้น
                if (localVolumeFromStorage !== null) {
                    // ตั้งค่าเสียง local audio
                    // console.log("Volume of local audio at start :" + localVolumeFromStorage);
                    channelParameters.localAudioTrack.setVolume(parseInt(localVolumeFromStorage));
                }else{
                    channelParameters.localAudioTrack.setVolume(parseInt(100));
                }

                if(user.hasAudio == false){
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                    if (document.querySelector('#mic_remote_' + user.uid)) {
                        document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                    }else{
                        console.log("========================= ");
                        console.log("ไมค์ตาย");
                        console.log("=========================");
                    }
                }else{
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                    if (document.querySelector('#mic_remote_' + user.uid)) {
                        document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                    }else{
                        console.log("========================= ");
                        console.log("ไมค์ตาย");
                        console.log("=========================");
                    }
                }

                type_of_microphone_remote_icon_in_setting = "open"; //เปลี่ยนให้ icon ไมค์ เป็น เปิด เพื่อใช้เปลี่ยนไอคอนใน setting menu
                waitForElement_in_sidebar(type_of_microphone_remote_icon_in_setting , user.uid); // ส่งไปเพื่อเปลี่ยน icon ตาม สถานะของไมค์

                status_remote_volume[user.uid] = "yes";
                if (check_start_volume_indicator[user.uid] == "no") {
                    volume_indicator_remote(user.uid);
                }
            }

        });

        // Listen for the "user-unpublished" event.
        agoraEngine.on("user-unpublished", async (user, mediaType) =>
        {
            // console.log("เข้าสู่ user-unpublished");
            // console.log("agoraEngine");
            // console.log(agoraEngine);

            if(mediaType == "video"){
                if (user.hasVideo == false) {

                    // console.log("สร้าง Div_Dummy ของ" + user.uid);
                    // console.log(user);

                    let name_remote_user_unpublished;
                    let type_remote_user_unpublished;
                    let profile_remote_user_unpublished;
                    let hexcolor;

                    fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid + "&type=" + type_video_call + "&sos_id=" + sos_id)
                        .then(response => response.json())
                        .then(result => {
                            // console.log("result_get_remote_data_4");
                            // console.log(result);

                            // hexcolor = "#F0D2CC";
                            hexcolor = result.hexcolor;
                            name_remote_user_unpublished = result.name_user;
                            type_remote_user_unpublished = result.user_type;



                            if(result.photo){
                                profile_remote_user_unpublished = "{{ url('/storage') }}" + "/" + result.photo;
                            }else if(!result.photo && result.avatar){
                                profile_remote_user_unpublished = result.avatar;
                            }else{
                                profile_remote_user_unpublished = "https://www.viicheck.com/Medilab/img/icon.png";
                            }
                            // สำหรับ สร้าง div_dummy ตอนผู้ใช้ไม่ได้เปิดกล้อง
                            create_dummy_videoTrack(user ,name_remote_user_unpublished ,type_remote_user_unpublished ,profile_remote_user_unpublished, hexcolor);

                            // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                            if(user.hasVideo == false){
                                // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                                document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                            }else{
                                // เปลี่ยน ไอคอนวิดีโอเป็น เปิด
                                document.querySelector('#camera_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-video"></i>';
                            }

                            if(user.hasAudio == false){
                                // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                                document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                            }else{
                                // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                                document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                            }

                    })
                    .catch(error => {
                        console.log("โหลดข้อมูล RemoteUser ล้มเหลว");
                    });

                }
            }

            if(mediaType == "audio"){
                // ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
                // console.log('unpublished AudioTrack:');
                // console.log(channelParameters.localAudioTrack);
                status_remote_volume[user.uid] = "no";

                type_of_microphone_remote_icon_in_setting = "close"; //เปลี่ยนให้ icon ไมค์ เป็น ปิด เพื่อใช้เปลี่ยนไอคอนใน setting menu

                waitForElement_in_sidebar(type_of_microphone_remote_icon_in_setting , user.uid);

                if(user.hasAudio == false){
                    // console.log("if unpublished");
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    // console.log("else unpublished");
                    // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                    document.querySelector('#mic_remote_' + user.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }
            }
        });

        // เมื่อมีคนเข้าห้อง
        agoraEngine.on("user-joined", function (evt)
        {

            // console.log("agoraEngine มีคนเข้าห้องมา");
            // console.log(agoraEngine);

            check_start_volume_indicator[evt.uid] = "no";

            // เสียงแจ้งเตือน เวลาคนเข้า
            let audio_ringtone_join = new Audio("{{ asset('sound/join_room_1.mp3') }}");
                audio_ringtone_join.play();

            // หยุดการเล่นเสียงหลังจาก 1 วินาที
            setTimeout(function() {
                audio_ringtone_join.pause();
                audio_ringtone_join.currentTime = 0; // เริ่มเสียงใหม่เมื่อต้องการเล่นอีกครั้ง
            }, 1000);

            if(agoraEngine['remoteUsers'][0]){
                if( agoraEngine['remoteUsers']['length'] != 0 ){
                    for(let c_uid = 0; c_uid < agoraEngine['remoteUsers']['length']; c_uid++){

                        const dummy_remote = agoraEngine['remoteUsers'][c_uid];
                        // console.log("dummy_remote");
                        // console.log(dummy_remote);

                        if(dummy_remote['hasVideo'] == false){ //ถ้า remote คนนี้ ไม่ได้เปิดกล้องไว้ --> ไปสร้าง div_dummy
                            let name_remote_user_joined;
                            let type_remote_user_joined;
                            let profile_remote_user_joined;
                            let hexcolor;
                            fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + dummy_remote.uid + "&type=" + type_video_call + "&sos_id=" + sos_id)
                                .then(response => response.json())
                                .then(result => {
                                    // console.log("result_get_remote_data_4_user_join");
                                    // console.log(result);
                                    name_remote_user_joined = result.name_user;
                                    type_remote_user_joined = result.user_type
                                    hexcolor = result.hexcolor;
                                    // hexcolor = "#F0D2CC";


                                    if(result.photo){
                                        profile_remote_user_joined = "{{ url('/storage') }}" + "/" + result.photo;
                                    }else if(!result.photo && result.avatar){
                                        profile_remote_user_joined = result.avatar;
                                    }else{
                                        profile_remote_user_joined = "https://www.viicheck.com/Medilab/img/icon.png";
                                    }

                                    create_dummy_videoTrack(dummy_remote ,name_remote_user_joined ,type_remote_user_joined ,profile_remote_user_joined ,hexcolor);
                                    // console.log("Dummy Created !!!");

                                    // เปลี่ยน ไอคอนวิดีโอเป็น ปิด
                                    document.querySelector('#camera_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

                                    //เช็คว่าไมค์ของเขาเปิดหรือไม่
                                    if(dummy_remote['hasAudio'] == false){ //ถ้า remote คนนี้ ไม่ได้เปิดไมไว้ --> ไปสร้าง div_dummy
                                        status_remote_volume[dummy_remote.uid] = "no";
                                        // เปลี่ยน ไอคอนไมโครโฟนเป็น ปิด
                                        document.querySelector('#mic_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                                    }else{
                                        // เปลี่ยน ไอคอนไมโครโฟนเป็น เปิด
                                        document.querySelector('#mic_remote_' + dummy_remote.uid).innerHTML = '<i class="fa-solid fa-microphone"></i>';

                                        status_remote_volume[dummy_remote.uid] = "yes";
                                        if (check_start_volume_indicator[dummy_remote.uid] == "no") {
                                            volume_indicator_remote(dummy_remote.uid);
                                        }

                                        let userVolume;
                                        if (array_remoteVolumeAudio[dummy_remote.uid]) {
                                            userVolume = parseInt(array_remoteVolumeAudio[dummy_remote.uid]);
                                        }else{
                                            userVolume = 70; // หรือค่าที่ต้องการ
                                        }
                                        // agoraEngine['remoteUsers'][c_uid]['audioTrack'].setVolume(userVolume);
                                        let deviceType = checkDeviceType();
                                        if (deviceType == "Mobile (iOS)") {
                                            if (userVolume == 0) {
                                                agoraEngine['remoteUsers'][c_uid]['audioTrack'].stop();
                                            } else {
                                                agoraEngine['remoteUsers'][c_uid]['audioTrack'].play();
                                            }
                                        } else {
                                            if (userVolume) {
                                                agoraEngine['remoteUsers'][c_uid]['audioTrack'].setVolume(parseInt(userVolume));
                                            } else {
                                                agoraEngine['remoteUsers'][c_uid]['audioTrack'].setVolume(70);
                                            }
                                        }
                                    }

                                    if (dummy_remote['hasAudio'] == false) {
                                        type_of_microphone_remote_icon_in_setting = "close"; //เปลี่ยนให้ icon ไมค์ เป็น ปิด เพื่อใช้เปลี่ยนไอคอนใน setting menu
                                    } else {
                                        type_of_microphone_remote_icon_in_setting = "open"; //เปลี่ยนให้ icon ไมค์ เป็น เปิด เพื่อใช้เปลี่ยนไอคอนใน setting menu
                                    }

                                    waitForElement_in_sidebar(type_of_microphone_remote_icon_in_setting , dummy_remote.uid);

                            })
                            .catch(error => {
                                console.log("โหลด เมื่อมีคนเข้าห้อง ล้มเหลว");
                            });

                        }

                    }
                }
            }

            fetch("{{ url('/') }}/api/check_status_room" + "?sos_id="+ sos_id + "&type=" + type_video_call)
                .then(response => response.json())
                .then(result => {

                let member_in_room = JSON.parse(result['member_in_room']);

                if(member_in_room.length >= 2){
                    if(check_start_timer_video_call == false){
                        start_timer_video_call();
                    }else{
                        clearInterval(loop_timer_video_call);
                        document.getElementById("time_of_room").innerHTML = "";
                        start_timer_video_call();
                    }

                    // if (check_user_in_video_call == false) {
                    //     start_user_in_video_call(); // ทำฟังก์ชันเช็คคนที่ออกจากห้องไปแล้ว
                    // }
                }
            });
        });

        // ออกจากห้อง
        agoraEngine.on("user-left", function (evt)
        {

            // console.log("ไอดี : " + evt.uid + " ออกจากห้อง");

            if(document.getElementById('videoDiv_' + evt.uid)) {
                document.getElementById('videoDiv_' + evt.uid).remove();
            }

            // ลบ โปรไฟล์ที่อยู่ใน sidebar เมื่อ ออก
            if(document.getElementById('profile_' + evt.uid)) {
                document.getElementById('profile_' + evt.uid).remove();
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

            setTimeout(() => {
                fetch("{{ url('/') }}/api/check_status_room" + "?sos_id="+ sos_id + "&type=" + type_video_call)
                    .then(response => response.json())
                    .then(result => {
                        // console.log("result check_status_room");
                        // console.log(typeof result['member_in_room']);
                        // console.log(result['member_in_room']);

                    let member_in_room = JSON.parse(result['member_in_room']);
                    // ถ้าผู้ใช้ เหลือ น้อยกว่า 2 คน ให้หยุดนับเวลา
                    if(member_in_room.length < 2){
                        // console.log("member_in_room น้อยกว่า 2 --> user-left");
                        if(check_start_timer_video_call == true){
                            myStop_timer_video_call();
                        }

                        // if (check_user_in_video_call == true) {
                        //     Stop_check_user_in_video_call(); // หยุดทำฟังก์ชันเช็คคนที่ออกจากห้องไปแล้ว
                        // }
                    }
                    // ถ้าผู้ใช้ เหลือ 0 คน ให้ทำลายห้องทิ้ง
                    if(member_in_room.length < 1){
                        setTimeout(() => {
                            agoraEngine.destroy();
                        }, 7000);
                    }
                });
            }, 3000);

        });

        // local_join
        window.onload = function ()
        {

            document.getElementById("join").onclick = async function (user_id)
            {
                try {
                    let response = await fetch("{{ url('/') }}/api/check_user_in_room_4" + "?sos_id=" + sos_id + "&type=" + type_video_call);
                    let result = await response.json();

                    if (result['status'] == "ok") {

                        // document.getElementById("join").click();

                        // Enable dual-stream mode.
                        // agoraEngine.enableDualStream();

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
                            if(useMicrophone){
                                channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                    {
                                        AEC: true, // การยกเลิกเสียงสะท้อน
                                        ANS: true, // การลดเสียงรบกวนอัตโนมัติ
                                        encoderConfig: "high_quality", // ระดับคุณภาพเสียง
                                        microphoneId: useMicrophone
                                    }
                                );
                            }else{
                                // ดึงรายการไมโครโฟนทั้งหมด
                                let microphoneDevices = await navigator.mediaDevices.enumerateDevices();
                                    // เลือกไมโครโฟนที่ active (เช็ค kind เป็น 'audioinput')
                                let activeMicrophones = microphoneDevices.filter(device => device.kind === 'audioinput' && device.deviceId !== 'default');

                                if (activeMicrophones.length > 0) {
                                    // เลือกไมโครโฟนแรกที่ active
                                    let selectedMicrophone = activeMicrophones[0].deviceId;
                                    // ใช้ไมโครโฟนที่ถูกเลือก
                                    channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                        {
                                            AEC: true, // การยกเลิกเสียงสะท้อน
                                            ANS: true, // การลดเสียงรบกวนอัตโนมัติ
                                            encoderConfig: "high_quality", // ระดับคุณภาพเสียง
                                            microphoneId: selectedMicrophone
                                        }
                                    );
                                } else {
                                    // ไม่พบไมโครโฟนที่ active
                                    console.error("ไม่พบไมโครโฟนที่ active");
                                    return;
                                }
                            }

                            console.log('หาไมโครโฟน สำเร็จ');
                        } catch (error) {
                            // ในกรณีที่เกิดข้อผิดพลาดในการสร้างไมโครโฟน
                            console.error('ไม่สามารถสร้างไมโครโฟนหรือไม่พบไมโครโฟน', error);

                            try { // เข้าใหม่ในสถานะปิดไมโครโฟนแทน
                                // ดึงรายการไมโครโฟนทั้งหมด
                                let microphoneDevices = await navigator.mediaDevices.enumerateDevices();
                                // เลือกไมโครโฟนที่ active (เช็ค kind เป็น 'audioinput')
                                let activeMicrophones = microphoneDevices.filter(device => device.kind === 'audioinput' && device.deviceId !== 'default');

                                if (activeMicrophones.length > 0) {
                                    // เลือกไมโครโฟนแรกที่ active
                                    let selectedMicrophone = activeMicrophones[0].deviceId;
                                    // ใช้ไมโครโฟนที่ถูกเลือก
                                    channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                        {
                                            AEC: true, // การยกเลิกเสียงสะท้อน
                                            ANS: true, // การลดเสียงรบกวนอัตโนมัติ
                                            encoderConfig: "high_quality", // ระดับคุณภาพเสียง
                                            microphoneId: selectedMicrophone
                                        }
                                    );
                                } else {
                                    // ไม่พบไมโครโฟนที่ active
                                    // alert("ไมโครโฟน ไม่พร้อมใช้งาน try");
                                    console.error("ไม่พบไมโครโฟนที่ active");
                                }

                                // // ปิดไมโครโฟนใหม่ทันที
                                // await channelParameters.localAudioTrack.setEnabled(false);
                                // //เปลี่ยนสถานะไมโครโฟน เป็น false
                                // isAudio = false;

                            } catch (newError) {
                                // alert("ไมโครโฟน ไม่พร้อมใช้งาน catch");
                                console.error('ไม่สามารถสร้างไมโครโฟนใหม่หรือปิดไมโครโฟนใหม่', newError);
                                // ทำการปิดแบบถาวรหรือจัดการข้อผิดพลาดอื่นๆ ตามที่คุณต้องการ
                            }
                        }

                        // หากล้อง
                        try {
                            if(useCamera){
                                // console.log("if หากล้อง");
                                channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                                    {
                                        cameraId: useCamera,
                                        // optimizationMode: "detail",
                                        // encoderConfig:
                                        // {
                                        //     width: 640,
                                        //     // Specify a value range and an ideal value
                                        //     height: { ideal: 480, min: 400, max: 500 },
                                        //     frameRate: 15,
                                        //     bitrateMin: 500, bitrateMax: 1000,
                                        // },
                                    }
                                );
                            }else{
                                // console.log("else หากล้อง");

                                channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                                    {

                                        // optimizationMode: "detail",
                                        // encoderConfig:
                                        // {
                                        //     width: 640,
                                        //     // Specify a value range and an ideal value
                                        //     height: { ideal: 480, min: 400, max: 500 },
                                        //     frameRate: 15,
                                        //     bitrateMin: 500, bitrateMax: 1000,
                                        // },
                                    }
                                );
                            }

                        } catch (error) {
                            // ในกรณีที่เกิดข้อผิดพลาดในการสร้างกล้อง

                            console.error('ไม่สามารถสร้างกล้องหรือไม่พบกล้อง', error);

                            let cameraDevices = await navigator.mediaDevices.enumerateDevices();
                            let activeCameras = cameraDevices.filter(device => device.kind === 'videoinput');

                            if (activeCameras.length > 0) {
                                let selectedCamera = activeCameras[0].deviceId;
                                channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack({ cameraId: selectedCamera });

                            } else {
                                console.error("ไม่พบกล้องที่ active");
                            }

                            // channelParameters.localVideoTrack = await AgoraRTC.createCustomVideoTrack({
                            //     // mediaStreamTrack: screenTrack,
                            //     // optimizationMode: 'detail',
                            //     // encoderConfig: {
                            //     //     width: 640,
                            //     //     // Specify a value range and an ideal value
                            //     //     height: { ideal: 480, min: 400, max: 500 },
                            //     //     frameRate: 15,
                            //     //     bitrateMin: 500, bitrateMax: 1000,
                            //     // },
                            // });

                            // alert('ไม่สามารถโหลดข้อมูลกล้องได้ catch');

                            // setTimeout(() => {
                            //     window.location.reload(); // รีเฟรชหน้าเว็บ
                            // }, 2000);

                            // channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack({});


                        }

                        await agoraEngine.publish([channelParameters.localVideoTrack ,channelParameters.localAudioTrack]);

                        //=================     สำหรับ Senior Benze  =========================
                        function join_and_update(){
                            // console.log("join_and_update");
                                fetch("{{ url('/') }}/api/join_room_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id)
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log("result join_room_4");
                                        // console.log(result);
                                        // let member_in_room = JSON.parse(result);
                                        setTimeout(() => {
                                            if(result.length >= 2){
                                                if(check_start_timer_video_call == false){
                                                    start_timer_video_call();
                                                }

                                                // if (check_user_in_video_call == false) {
                                                //     start_user_in_video_call(); // ทำฟังก์ชันเช็คคนที่ออกจากห้องไปแล้ว
                                                // }
                                            }else{
                                                if(check_start_timer_video_call == true){
                                                    // console.log("member_in_room น้อยกว่า 2 --> join_and_update");
                                                    myStop_timer_video_call();
                                                }


                                            }
                                        }, 800);

                                        start_user_in_video_call(); // ทำฟังก์ชันเช็คคนที่ออกจากห้องไปแล้ว

                                        sessionStorage.setItem('status_video_call', 'actived'); // set ว่ามีการเข้าใช้วิดีโอคอลแล้ว ใช้สำหรับตัวแจ้งเตือนในหน้าอื่นๆ
                                })
                                .catch(error => {
                                    console.log("บันทึกข้อมูล join_and_update ล้มเหลว :" + error);
                                    // window.location.reload(); // รีเฟรชหน้าเว็บ
                                });
                        }
                        join_and_update();
                        //=================    จบ สำหรับ Senior Benze  =========================

                        //===== จบส่วน สุ่มสีพื้นหลังของ localPlayerContainer =====
                        if(name_local && type_local){
                            name_local = name_local;
                            type_local = type_local;
                        }else{
                            name_local = "--";
                            type_local = "--";
                        }
                        //======= สำหรับสร้าง div ที่ใส่ video tag พร้อม id_tag สำหรับลบแท็ก ========//

                        create_element_localvideo_call(localPlayerContainer,name_local,type_local,profile_local,bg_local);

                        // Play the local video track.
                        channelParameters.localVideoTrack.play(localPlayerContainer);

                        // เอาหน้าโหลดออก
                        document.querySelector('#lds-ring').remove();

                        //======= สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน ==========//
                        btn_toggle_mic_camera(videoTrack,audioTrack,bg_local);

                        //ถ้ากดปุ่ม muteVideo แล้วกล้องอยู่ในสถานะปิด ให้เปลี่ยนสี bg ของ local
                        document.querySelector('#muteVideo').addEventListener("click", function(e) {
                            if (isVideo == false) {
                                // console.log(bg_local);
                                changeBgColor(bg_local);
                            }
                        });

                        //ถ้ากดปุ่ม muteVideo ไมค์อยู่ในสถานะเปิดให้ตรวจสอบ ระดับเสียง
                        document.querySelector('#muteAudio').addEventListener("click", function(e) {
                            if (isAudio == true) {
                                SoundTest();
                            }
                        });

                        // if(isAudio == true){
                        //     agoraEngine.publish([channelParameters.localAudioTrack]);
                        // }

                        try { // เช็คสถานะจากห้องทางเข้า แล้วเลือกกดเปิด-ปิด ตามสถานะ
                            if(videoTrack == "open"){
                                // เข้าห้องด้วย->สถานะเปิดกล้อง
                                isVideo = false;
                                document.querySelector('#muteVideo').click();
                                // console.log("Click open video ===================");
                            }else{
                                // เข้าห้องด้วย->สถานะปิดกล้อง
                                isVideo = true;
                                document.querySelector('#muteVideo').click();
                                // console.log("Click close video ===================");
                            }

                            if(audioTrack == "open"){
                                // เข้าห้องด้วย->สถานะเปิดไมค์
                                isAudio = false;
                                document.querySelector('#muteAudio').click();
                                // console.log("Click open audio ===================");
                            }else{
                                // เข้าห้องด้วย->สถานะปิดไมค์
                                isAudio = true;
                                document.querySelector('#muteAudio').click();
                                // console.log("Click close audio ===================");
                            }
                        }
                        catch (error) {
                            console.log('ส่งตัวแปร videoTrack audioTrack ไม่สำเร็จ');
                        }

                        // console.log('AudioTrack:');
                        // console.log(channelParameters.localAudioTrack);

                    }else{
                        alert("จำนวนผู้ใช้ในห้องสนทนาสูงสุดแล้ว");
                        window.history.back();
                    }

                } catch (error) {
                    console.log("==================== โหลดหน้าล้มเหลว =================== :" + error);
                    // alert("ไม่สามารถเข้าร่วมได้ ");
                    window.location.reload(); // รีเฟรชหน้าเว็บ
                }

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
                // console.log("You left the channel");
                // Refresh the page for reuse
                // window.location.reload();

                if (leaveChannel == "false") {
                    // leaveChannel();
                    fetch("{{ url('/') }}/api/left_room_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id +"&meet_2_people=beforeunload"+"&leave=beforeunload")
                        .then(response => response.text())
                        .then(result => {
                            // console.log(result);
                            // console.log("left_and_update สำเร็จ");
                            leaveChannel = "true";

                            // window.history.back();
                            let type_url;
                            switch (type_video_call) {
                                case 'sos_1669':
                                        // "ศูนย์อำนวยการ" , "หน่วยแพทย์ฉุกเฉิน" , "--"
                                        type_url = "{{ url('/sos_help_center')}}"+ '/' + "{{ $sos_id }}" + '/show_case';
                                        // console.log("type_url");
                                        // console.log(type_url);
                                        if (type_user_sos == "ศูนย์อำนวยการ") {
                                            window.history.back();
                                        } else if(type_user_sos == "หน่วยแพทย์ฉุกเฉิน"){
                                            window.location.href = type_url;
                                        }else if(type_user_sos == "เจ้าหน้าที่ห้อง ER"){
                                            window.history.back();
                                        }else{
                                            window.history.back();
                                        }
                                    break;

                                case 'user_sos_1669':
                                        // "ศูนย์อำนวยการ" , "ผู้ขอความช่วยเหลือ" , "--"
                                        type_url = "{{ url('/sos_help_center')}}"+ '/' + "{{ $sos_id }}" + '/show_user';
                                        if (type_user_sos == "ศูนย์อำนวยการ") {
                                            window.history.back();
                                        } else if(type_user_sos == "ผู้ขอความช่วยเหลือ"){
                                            window.location.href = type_url;
                                        }else{
                                            window.history.back();
                                        }
                                    break;

                                case 'sos_map':
                                        // "ศูนย์ควบคุม" , "เจ้าหน้าที่" , "ผู้ขอความช่วยเหลือ"
                                        if (type_user_sos == "ศูนย์ควบคุม") {
                                            window.history.back();
                                        }else if (type_user_sos == "เจ้าหน้าที่"){
                                            window.history.back();
                                        } else if(type_user_sos == "ผู้ขอความช่วยเหลือ"){
                                            window.location.href = "{{ url('/sos_map/user_view_officer/' . $sos_id ) }}";
                                        }else{
                                            window.history.back();
                                        }
                                    break;

                                case 'sos_personal_assistant':
                                        window.history.back();
                                    break;

                                default:
                                    window.history.back();
                                    break;
                            }

                    })
                    .catch(error => {
                        console.log("บันทึกข้อมูล left_and_update ล้มเหลว :" + error);
                    });
                }

            }
        }

        //=============================================================================//
        //                               สลับอุปกรณ์                                     //
        //=============================================================================//

        var activeVideoDeviceId;
        var activeAudioDeviceId;
        // var activeAudioOutputDeviceId
        window.addEventListener('DOMContentLoaded', async () => {
            try {
                // เรียกดูอุปกรณ์ทั้งหมด
                const devices = await navigator.mediaDevices.enumerateDevices();

                // เรียกดูอุปกรณ์ที่ใช้อยู่
                // const stream = await navigator.mediaDevices.getUserMedia({
                //     audio: true,
                //     video: true
                // });

                const stream = await navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: {
                        facingMode: 'user', // หรือ 'environment' หากต้องการใช้กล้องหลัง
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    }
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

                // if(useSpeaker){
                //     activeAudioOutputDeviceId = useSpeaker;
                // }else{
                //     activeAudioOutputDeviceId = devices.find(device => device.kind === 'audiooutput' && device.deviceId === 'default').deviceId;
                // }

            } catch (error) {
                console.error('เกิดข้อผิดพลาดในการเรียกดูอุปกรณ์:', error);
            }

        });
        // ไมโครโฟน -- Microphone
        var old_activeAudioDeviceId ;

        // เรียกใช้งานเมื่อต้องการเปลี่ยนอุปกรณ์เสียง
        function onChangeAudioDevice() {

            old_activeAudioDeviceId = activeAudioDeviceId;
            // old_activeAudioOutputDeviceId = activeAudioOutputDeviceId;

            const selectedAudioDeviceId = getCurrentAudioDeviceId();
            // const selectedAudioOutputDeviceId = getCurrentAudiooutputDeviceId();
            // console.log('อุปกรณ์เสียงเดิม:', activeAudioDeviceId);
            // console.log('เปลี่ยนอุปกรณ์เสียงเป็น:', selectedAudioDeviceId);

            activeAudioDeviceId = selectedAudioDeviceId ;

            // สร้าง local audio track ใหม่โดยใช้อุปกรณ์ที่คุณต้องการ
            AgoraRTC.createMicrophoneAudioTrack({
                AEC: true, // การยกเลิกเสียงสะท้อน
                ANS: true, // การลดเสียงรบกวนอัตโนมัติ
                encoderConfig: "high_quality", // ระดับคุณภาพเสียง
                microphoneId: selectedAudioDeviceId
            })
            .then(newAudioTrack => {
                // console.log('newAudioTrack');
                // console.log(newAudioTrack);
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
                    // console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
                    // console.log('เข้า if => isAudio == true');
                    // console.log(channelParameters.localAudioTrack);
                }
                else {
                    channelParameters.localAudioTrack.setEnabled(false);
                    // channelParameters.localAudioTrack.play();
                    // isAudio = false;

                    // console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
                    // console.log('เข้า else => isAudio == false');
                    // console.log(channelParameters.localAudioTrack);
                }

            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการสร้าง local audio track:', error);

                selectedAudioDeviceId = old_activeAudioDeviceId;
                selectedAudioOutputDeviceId = old_activeAudioOutputDeviceId;
            });
        }

        // ลำโพง -- Speaker -- ยังหาฟังก์ชันเปลี่ยนไม่ได้
        // var old_activeAudioOutputDeviceId ;
        // function onChangeAudioOutputDevice() {
        //     old_activeAudioOutputDeviceId = activeAudioOutputDeviceId;

        //     const selectedAudioOutputDeviceId = getCurrentAudiooutputDeviceId();
        //     // console.log('อุปกรณ์เสียงเดิม:', activeAudioDeviceId);
        //     // console.log('เปลี่ยนอุปกรณ์เสียงเป็น:', selectedAudioDeviceId);

        //     activeAudioOutputDeviceId = selectedAudioOutputDeviceId;
        //     // สร้าง local audio track ใหม่โดยใช้อุปกรณ์ที่คุณต้องการ
        //     AgoraRTC.createSpeakerAudioTrack({
        //         deviceId: selectedAudioOutputDeviceId,
        //     })
        //     .then(newAudioTrack => {
        //         console.log('newAudioTrack');
        //         console.log(newAudioTrack);
        //         // หยุดการส่งเสียงจากอุปกรณ์ปัจจุบัน
        //         // channelParameters.localAudioTrack.setEnabled(false);

        //         // agoraEngine.unpublish([channelParameters.localAudioTrack]);

        //         // // ปิดการเล่นเสียงเดิม
        //         // // channelParameters.localAudioTrack.stop();
        //         // // channelParameters.localAudioTrack.close();

        //         // // เปลี่ยน local audio track เป็นอุปกรณ์ใหม่
        //         // channelParameters.localAudioTrack = newAudioTrack;

        //         // channelParameters.localAudioTrack.play();

        //         // if(isAudio == true){
        //         //     // เริ่มส่งเสียงจากอุปกรณ์ใหม่
        //         //     channelParameters.localAudioTrack.setEnabled(true);
        //         //     channelParameters.localAudioTrack.play();

        //         //     agoraEngine.publish([channelParameters.localAudioTrack]);

        //         //     // isAudio = true;
        //         //     console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
        //         //     console.log('เข้า if => isAudio == true');
        //         //     console.log(channelParameters.localAudioTrack);
        //         // }
        //         // else {
        //         //     channelParameters.localAudioTrack.setEnabled(false);
        //         //     // channelParameters.localAudioTrack.play();
        //         //     // isAudio = false;
        //         //     console.log('เปลี่ยนอุปกรณ์เสียงสำเร็จ');
        //         //     console.log('เข้า else => isAudio == false');
        //         //     console.log(channelParameters.localAudioTrack);
        //         // }

        //     })
        //     .catch(error => {
        //         console.error('เกิดข้อผิดพลาดในการสร้าง local audio track:', error);

        //         selectedAudioDeviceId = old_activeAudioDeviceId;
        //         selectedAudioOutputDeviceId = old_activeAudioOutputDeviceId;
        //     });
        // }

        var old_activeVideoDeviceId ;

        function onChangeVideoDevice() {

            old_activeVideoDeviceId = activeVideoDeviceId ;

            let selectedVideoDeviceId = getCurrentVideoDeviceId();
            console.log('เปลี่ยนอุปกรณ์กล้องเป็น:', selectedVideoDeviceId);

            activeVideoDeviceId = selectedVideoDeviceId ;

            // หยุดการส่งภาพจากอุปกรณ์ปัจจุบัน
            channelParameters.localVideoTrack.setEnabled(false);

            agoraEngine.unpublish([channelParameters.localVideoTrack]);

            // ปิดการเล่นภาพวิดีโอกล้องเดิม
            channelParameters.localVideoTrack.stop();
            channelParameters.localVideoTrack.close();

            // สร้าง local video track ใหม่โดยใช้กล้องที่คุณต้องการ
            AgoraRTC.createCameraVideoTrack({ cameraId: selectedVideoDeviceId })
            .then(newVideoTrack => {

                if (document.querySelector('#loader')) {
                    document.querySelector('#loader').remove();
                }

                // เปลี่ยน local video track เป็นอุปกรณ์ใหม่
                channelParameters.localVideoTrack = newVideoTrack;

                // console.log('------------ newVideoTrack ------------');
                // console.log(newVideoTrack);
                // console.log('------------ channelParameters.localVideoTrack ------------');
                // console.log(channelParameters.localVideoTrack);
                // console.log('------------ localPlayerContainer ------------');
                // console.log(localPlayerContainer);

                agoraEngine.publish([channelParameters.localVideoTrack ]);
                // channelParameters.localVideoTrack.play(localPlayerContainer);

                if (isVideo == true) {
                    // console.log("เข้าpublishในonchange_if");
                    // เริ่มส่งภาพจากอุปกรณ์ใหม่
                    channelParameters.localVideoTrack.setEnabled(true);

                    channelParameters.localVideoTrack.play(localPlayerContainer);

                    // enable ปุ่มเปิด-ปิดกล้อง
                    document.querySelector('#div_for_VideoButton').classList.remove('disabled');

                    // agoraEngine.publish([channelParameters.localVideoTrack]);
                    // console.log('เปลี่ยนอุปกรณ์กล้องสำเร็จ');
                }
                else {
                    console.log("เข้าpublishในonchange_else");
                    // alert('ปิด');
                    channelParameters.localVideoTrack.setEnabled(false);

                    channelParameters.localVideoTrack.play(localPlayerContainer);
                    // agoraEngine.publish([channelParameters.localVideoTrack]);

                    // enable ปุ่มเปิด-ปิดกล้อง
                    document.querySelector('#div_for_VideoButton').classList.remove('disabled');
                }

                if (isVideo == false) {
                    setTimeout(() => {
                        // console.log("bg_local onChange");
                        changeBgColor(bg_local);
                    }, 50);
                }

            })
            .catch(error => {
                // alert('ไม่สามารถเปลี่ยนกล้องได้');
                // alertNoti('<i class="fa-solid fa-triangle-exclamation fa-shake"></i>', 'ไม่สามารถเปลี่ยนกล้องได้');
                // console.log('ไม่สามารถเปลี่ยนกล้องได้');

                if (now_Mobile_Devices == 1){
                    now_Mobile_Devices = 2 ;
                }else{
                    now_Mobile_Devices = 1 ;
                }

                activeVideoDeviceId = old_activeVideoDeviceId ;

                let loading_html = `<div style="z-index: 7; position: absolute; top: 50%; left: 50%;" id="loader" class="loader"></div>`;
                localPlayerContainer.insertAdjacentHTML('afterbegin',loading_html); // แทรกบนสุด

                setTimeout(function() {
                    document.querySelector('#btn_switchCamera').click();
                }, 2000);

                console.error('เกิดข้อผิดพลาดในการสร้าง local video track:', error);
            });


            // document.querySelector('#ปุ่มนี้สำหรับปิด_modal').click();
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

        // function getCurrentAudiooutputDeviceId() {
        //     const audiooutputDevices = document.getElementsByName('audio-device-output');
        //     for (let i = 0; i < audiooutputDevices.length; i++) {
        //         if (audiooutputDevices[i].checked) {
        //             return audiooutputDevices[i].value;
        //         }
        //     }
        //     return null;
        // }

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
        var cachedVideoDevices = null; // สร้างตัวแปร global เพื่อเก็บข้อมูล camera
        btn_switchCamera.onclick = async function()
        {
            // console.log('btn_switchCamera');
            // console.log('activeVideoDeviceId');
            // console.log(activeVideoDeviceId);



            // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
            let deviceType = checkDeviceType();
            // console.log("Device Type:", deviceType);

            // ถ้ายังไม่มีข้อมูลอุปกรณ์ที่เก็บไว้
            if (!cachedVideoDevices) {
                // เรียกดูอุปกรณ์ทั้งหมด
                let getDevices = await navigator.mediaDevices.enumerateDevices();

                // แยกอุปกรณ์ตามประเภท
                let getVideoDevices = getDevices.filter(device => device.kind === 'videoinput');

                // กำหนดค่าให้กับตัวแปร global เพื่อเก็บไว้
                cachedVideoDevices = getVideoDevices;
            }

            let videoDevices = cachedVideoDevices; // สามารถใช้ cachedVideoDevices ได้ทุกครั้งที่ต้องการ

            if (videoDevices.length > 1) {
                // disable ปุ่มเปิด-ปิดกล้อง
                document.querySelector('#div_for_VideoButton').classList.add('disabled');
            }

            // console.log('------- videoDevices -------');
            // console.log(videoDevices);
            // console.log('length ==>> ' + videoDevices.length);
            // console.log('------- ------- -------');

            // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
            let videoDeviceList = document.getElementById('video-device-list');
                videoDeviceList.innerHTML = '';
            let deviceText = document.createElement('li');
                deviceText.classList.add('text-center','p-1','text-white');
                deviceText.appendChild(document.createTextNode("กล้อง"));

                videoDeviceList.appendChild(deviceText);

            let count_i = 1 ;

            videoDevices.forEach(device => {
                let radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.classList.add('radio_style');
                    radio.id = 'video-device-' + count_i;
                    radio.name = 'video-device';
                    radio.value = device.deviceId;

                if (deviceType == 'PC'){
                    radio.checked = device.deviceId === activeVideoDeviceId;
                }

                let label = document.createElement('li');
                    label.classList.add('ui-list-item');
                    label.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${videoDeviceList.children.length + 1}`));
                    label.appendChild(document.createTextNode("\u00A0")); // เพิ่ม non-breaking space
                    label.appendChild(radio);

                if (deviceType == 'PC'){
                    // สร้างเหตุการณ์คลิกที่ label เพื่อตรวจสอบ radio2
                    label.addEventListener('click', () => {
                        radio.checked = true;
                        onChangeVideoDevice();
                    });
                }

                videoDeviceList.appendChild(label);

                radio.addEventListener('change', onChangeVideoDevice);

                count_i = count_i + 1 ;
            });

            if(deviceType !== 'PC') {
                // console.log("switch_mobile");
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

            // ---------------------------

            // if (isVideo == false) {
            //     setTimeout(() => {
            //         console.log("bg_local ddddddddddddddddddddddd");
            //         changeBgColor(bg_local);
            //     }, 50);
            // }
        }

        var cachedAudioDevices = null; // สร้างตัวแปร global เพื่อเก็บข้อมูล microphone
        btn_switchMicrophone.onclick = async function()
        {
            // console.log('btn_switchMicrophone');
            // console.log('activeAudioDeviceId');
            // console.log(activeAudioDeviceId);

            // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
            let deviceType = checkDeviceType();
            // console.log("Device Type:", deviceType);

          // ถ้ายังไม่มีข้อมูลอุปกรณ์ที่เก็บไว้
          if (!cachedAudioDevices) {
                // เรียกดูอุปกรณ์ทั้งหมด
                let getDevices = await navigator.mediaDevices.enumerateDevices();
                // แยกอุปกรณ์ตามประเภท
                let getAudioDevices = getDevices.filter(device => device.kind === 'audioinput');

                // กำหนดค่าให้กับตัวแปร global เพื่อเก็บไว้
                cachedAudioDevices = getAudioDevices;
            }

            let audioDevices = cachedAudioDevices; // สามารถใช้ cachedAudioDevices ได้ทุกครั้งที่ต้องการ
            // แยกอุปกรณ์ตามประเภท --> ลำโพง
            // let audioOutputDevices = devices.filter(device => device.kind === 'audiooutput');

            // console.log('------- audioDevices -------');
            // console.log(audioDevices);
            // console.log('length ==>> ' + audioDevices.length);
            // console.log('------- ------- -------');

            // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
            let audioDeviceList = document.getElementById('audio-device-list');
                audioDeviceList.innerHTML = '';
            let deviceText = document.createElement('li');
                deviceText.classList.add('text-center','p-1','text-white');
                deviceText.appendChild(document.createTextNode("อุปกรณ์รับข้อมูล"));

                audioDeviceList.appendChild(deviceText);
            // let audiooutputDeviceList = document.getElementById('audio-device-output-list');
            //     audiooutputDeviceList.innerHTML = '';

            let count_i = 1 ;
            let count_i_output = 1 ;
            // ----------- Input ----------------
            audioDevices.forEach(device => {
                const radio2 = document.createElement('input');
                    radio2.type = 'radio';
                    radio2.classList.add('radio_style');
                    radio2.id = 'audio-device-' + count_i;
                    radio2.name = 'audio-device';
                    radio2.value = device.deviceId;

                if (deviceType == 'PC'){
                    radio2.checked = device.deviceId === activeAudioDeviceId;
                }

                let label = document.createElement('li');
                    label.classList.add('ui-list-item');
                    label.appendChild(document.createTextNode(device.label || `อุปกรณ์รับข้อมูล ${audioDeviceList.children.length + 1}`));
                    label.appendChild(document.createTextNode("\u00A0")); // เพิ่ม non-breaking space
                    label.appendChild(radio2);

                    // สร้างเหตุการณ์คลิกที่ label เพื่อตรวจสอบ radio2
                    label.addEventListener('click', () => {
                        radio2.checked = true;
                        onChangeAudioDevice();
                    });


                audioDeviceList.appendChild(label);
                radio2.addEventListener('change', onChangeAudioDevice);

                count_i = count_i + 1 ;
            });

            // let hr = document.createElement('hr');
            // audioDeviceList.appendChild(hr);

            // ----------- Output ----------------
            // audioOutputDevices.forEach(device => {
            // const radio3 = document.createElement('input');
            //     radio3.type = 'radio';
            //     radio3.id = 'audio-device-output-' + count_i_output;
            //     radio3.name = 'audio-device-output';
            //     radio3.value = device.deviceId;

            // if (deviceType == 'PC'){
            //     radio3.checked = device.deviceId === activeAudioOutputDeviceId;
            // }

            // let label_output = document.createElement('label');
            //     label_output.classList.add('dropdown-item');
            //     label_output.appendChild(radio3);
            //     label_output.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${audioDeviceList.children.length + 1}`));

            // audiooutputDeviceList.appendChild(label_output);
            // radio3.addEventListener('change', onChangeAudioOutputDevice);

            // count_i_output = count_i_output + 1 ;
            // });

            // ---------------------------7

            // เพิ่มเหตุการณ์คลิกที่หน้าจอที่ไม่ใช่ตัว audio-device-list ให้ปิด audio-device-list
            // document.addEventListener('click', (event) => {
            //     const target = event.target;

            //     if (!target.closest('#audio-device-list')) {
            //        document.querySelector('.dropcontent').classList.toggle('open');
            //     }
            // });

        }

        // เปิด-ปิด list ของไมค์
        $(document).ready(function() {
            $("#btn_switchMicrophone").click(function(event) {
                event.stopPropagation(); // หยุดการกระจายเหตุการณ์คลิกไปยัง document

                var targetId = $(this).attr("id"); // รับ id ของปุ่มที่ถูกคลิก

                if(document.querySelector('.open_dropcontent2')){
                    $(".dropcontent2").removeClass("open_dropcontent2");
                }

                $(".dropcontent").toggleClass("open_dropcontent");

                // เพิ่มเหตุการณ์คลิกที่ document เพื่อปิด .dropcontent ถ้าคลิกที่นอกเหตุการณ์
                $(document).click(function(event) {
                    if (!$(event.target).closest(".dropcontent").length) {
                        $(".dropcontent").removeClass("open_dropcontent");
                    }
                });
            });
        });

        //=============================================================================//
        //                              จบ -- สลับอุปกรณ์                                //
        //=============================================================================//



    }

</script>

<script>
	let fadeButton = document.getElementById("fadeButton");
	let dataDiv = document.getElementById("dataDiv");

    @if ($role_permission !== 'help_seeker')
        fadeButton.addEventListener("click", () => {
            if (dataDiv.style.display === "none") {
                dataDiv.style.display = "block";
                setTimeout(() => {
                    dataDiv.style.opacity = "1";
                    dataDiv.style.maxHeight = "50%";
                }, 10);
            } else {
                dataDiv.style.opacity = "0";
                dataDiv.style.maxHeight = "0";
                setTimeout(() => {
                    dataDiv.style.display = "none";
                }, 500);
            }
        });
    @endif

    let settingButton = document.getElementById("settingBtn");
    let settingDiv = document.getElementById("settingDiv");
    // เปิด modal setting
    settingButton.addEventListener("click", () => {
        if (settingDiv.style.display === "none") {
            settingDiv.style.display = "block";
            setTimeout(() => {
                settingDiv.style.opacity = "1";
                settingDiv.style.maxHeight = "25%";
            }, 10);
        } else {
            settingDiv.style.opacity = "0";
            settingDiv.style.maxHeight = "0";
            setTimeout(() => {
                settingDiv.style.display = "none";
            }, 500);
        }
    });

    function menu_setting_toggle(title_menu) {
        let title_html;
        switch (title_menu) {
            case "menu_sound":
                title_html = "ตั้งค่าเสียง";
                break;
            case "menu_chat":
                title_html = "แชทสนทนา";
                break;
            default:
                title_html = "อื่นๆ";
                break;
        }
        let inMenuDiv = document.getElementById("inMenuDiv");
        let settingDiv = document.getElementById("settingDiv");
            settingDiv.style.display = "none";

            // เปิด modal setting
        if (inMenuDiv.style.display === "none") {
            inMenuDiv.style.display = "block";
            setTimeout(() => {
                inMenuDiv.style.opacity = "1";
                inMenuDiv.style.maxHeight = "50%";

                document.querySelector('#title_menu_in_setting').innerHTML = title_html;

                createDetailsInMenu(title_menu);
            }, 10);
        } else {
            inMenuDiv.style.opacity = "0";
            inMenuDiv.style.maxHeight = "0";
            setTimeout(() => {
                inMenuDiv.style.display = "none";

                document.querySelector('#title_menu_in_setting').innerHTML = "";
            }, 500);
        }

    }

    // function menu_setting_toggle(title_menu) {

    //     $('#inMenuDiv').modal('show');

    //     document.querySelector('#title_menu_in_setting').innerHTML = "";
    //     document.querySelector('#detail_menu_in_setting').innerHTML = "";

    //     let title_html;
    //     switch (title_menu) {
    //         case "menu_sound":
    //             title_html = "ตั้งค่าเสียง";
    //             break;
    //         case "menu_chat":
    //             title_html = "แชทสนทนา";
    //             break;
    //         default:
    //             title_html = "อื่นๆ";
    //             break;
    //     }
    //     let inMenuDiv = document.getElementById("inMenuDiv");

    //     //ปิด div เมนู ก่อนหน้า
    //     let settingDiv = document.getElementById("settingDiv");
    //         settingDiv.style.display = "none";

    //         // เปิด modal setting
    //     document.querySelector('#title_menu_in_setting').innerHTML = title_html;
    //     createDetailsInMenu(title_menu);

    // }

    function close_menu(){
        inMenuDiv.style.opacity = "0";
        inMenuDiv.style.maxHeight = "0";
        setTimeout(() => {
            inMenuDiv.style.display = "none";
            document.querySelector('#title_menu_in_setting').innerHTML = "";
        }, 500);
    }

    async function createDetailsInMenu(title_menu){
        try {
            let response = await fetch("{{ url('/') }}/api/check_user_in_room_4" + "?sos_id=" + sos_id + "&type=" + type_video_call);
            let result = await response.json();

            // console.log("result createDetailsInMenu");
            // console.log(result);

            let parentDiv = document.querySelector('#detail_menu_in_setting');
            let deviceType = checkDeviceType();

            // console.log("Device Type:", deviceType);

            switch (title_menu) {
                case "menu_sound":
                    let user_data = result['data'];

                    user_data.forEach(element => {
                        // console.log("element user_data");
                        // console.log(element);
                        // console.log(element.id);
                        let create_profile_remote = document.createElement("div");
                            create_profile_remote.id = "profile_"+element.id;
                            create_profile_remote.setAttribute('class','row mt-2');
                            create_profile_remote.setAttribute('style','background-color:3f3e3e');
                        //รูปโปรไฟล์
                        if(element.photo){
                            profile_user = "{{ url('/storage') }}" + "/" + element.photo;
                        }else if(!element.photo && element.avatar){
                            profile_user = element.avatar;
                        }else{
                            profile_user = "https://www.viicheck.com/Medilab/img/icon.png";
                        }

                        let me_id = '{{ Auth::user()->id }}';
                        let name_profile;  //ตรวจสอบว่าเป็นตัวเอง ? ชื่อฟ้า : ชื่อดำ
                        let icon_microphone_in_sb;
                        // let value_of_icon_microphone;

                        let type_input;
                        let type_input_value;
                        let localVolume;
                        let inputValue_remote;

                        if (element.id == me_id) {
                            name_profile = `<span class="h3 font-weight-bold text-info mx-auto">`+element.name+`</span>`;

                            localVolume = parseInt(localStorage.getItem('local_sos_1669_rangeValue')) ?? 100;

                            type_input = `<input style="z-index: 7;" type="range" id="localAudioVolume"
                                            min="0" max="1000" value="`+localVolume+`" class="w-100" >`;

                            icon_microphone_in_sb = `icon_mic_local_in_sidebar`;
                        } else {
                            // console.log(array_remoteVolumeAudio[element.id]);
                            inputValue_remote = array_remoteVolumeAudio[element.id] ?? 70;
                            // if (array_remoteVolumeAudio[element.id]) {
                            //     inputValue_remote = parseInt(array_remoteVolumeAudio[element.id]);
                            // }else{
                            //     inputValue_remote = 70; // หรือค่าที่ต้องการ
                            // };
                            // console.log(array_remoteVolumeAudio[element.id]);
                            // console.log(inputValue_remote);
                            name_profile = `<span class="h3 font-weight-bold mx-auto">`+element.name+`</span>`;
                            type_input = `<input class="w-100" style="z-index: 7;" type="range" id="remoteAudioVolume_`+element.id+`"
                                            min="0" max="100"  value="`+inputValue_remote+`"  onChange="onChangeVolumeRemote(`+element.id+`, 'handle');">`;

                            icon_microphone_in_sb = `icon_mic_remote_in_sidebar_`+element.id+``;

                        }

                        let detailHTML;
                        if (deviceType == "Mobile (iOS)") {
                            detailHTML =
                                `<div style="background-color:#676565; border-radius:15px;" class="col-12 py-3 mx-auto row">
                                        <div class="col-3">
                                            <img src="`+profile_user+`" alt="Profile Picture" class="profile-picture mx-auto">
                                            <div class="profile-info">
                                                `+name_profile+`
                                            </div>
                                        </div>
                                        <div class="col-9 my-auto vertical-divider row">

                                            <div class="col-3 d-flex justify-content-center align-items-center" id="`+icon_microphone_in_sb+`">

                                            </div>
                                            <div class="col-9 my-auto d-none ">
                                                <div class="wrapper_range_volume">
                                                    `+type_input+`
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                        } else {
                            detailHTML =
                                `<div style="background-color:#676565; border-radius:15px;" class="col-12 py-3 mx-auto row">
                                    <div class="col-3">
                                        <img src="`+profile_user+`" alt="Profile Picture" class="profile-picture mx-auto">
                                        <div class="profile-info">
                                            `+name_profile+`
                                        </div>
                                    </div>
                                    <div class="col-9 my-auto vertical-divider row">

                                        <div class="col-3 d-flex justify-content-center align-items-center" id="`+icon_microphone_in_sb+`">

                                        </div>
                                        <div class="col-9 my-auto ">
                                            <div class="wrapper_range_volume">
                                                `+type_input+`
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                `;
                        }

                            create_profile_remote.innerHTML = detailHTML;

                            // ตรวจสอบว่าเจอ div เดิมหรือไม่
                            let oldDiv = document.getElementById("profile_"+ element.id);
                            if (oldDiv) {
                                // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
                                oldDiv.parentNode.replaceChild(create_profile_remote, oldDiv);
                            } else {
                                if (element.id == me_id) {
                                    parentDiv.insertBefore(create_profile_remote, parentDiv.firstChild);
                                } else {
                                    parentDiv.appendChild(create_profile_remote);
                                }
                            }

                            waitForElement_in_sidebar(type_of_microphone_remote_icon_in_setting , element.id); //สำหรับสร้าง icon ให้ตรงกับสถานะไมค์ของ remote

                            if (element.id == me_id) {

                                // เข้าถึงตัวปรับ input =============== localVolume ==========================
                                let local_rangeInput = document.getElementById('localAudioVolume');
                                    local_rangeInput.addEventListener('input', function() {
                                // บันทึกค่าลงใน localStorage เมื่อมีการเปลี่ยนแปลง
                                    localStorage.setItem('local_sos_1669_rangeValue', local_rangeInput.value);
                                    localVolume = local_rangeInput.value; // เปลี่ยนค่าระดับเสียงของทางเราให้เท่ากับตัวปรับ
                                });

                                check_and_switch_icon_local(local_rangeInput.value);
                                // เช็ค ค่าตัวปรับเสียงก่อนเปลี่ยน icon ใน sidebar


                                // เพิ่ม event listener สำหรับ local audio volume slider
                                document.getElementById("localAudioVolume").addEventListener("change", function (evt) {

                                    check_and_switch_icon_local(evt.target.value);
                                    // Set the local audio volume.
                                    channelParameters.localAudioTrack.setVolume(parseInt(evt.target.value));
                                    // บันทึกค่าลงใน localStorage เพื่อให้ค่าเสียงเป็นค่าเริ่มต้นต่อครั้งถัดไป
                                });

                            }


                        });
                    break;

                default:
                    break;
            }
        } catch (error) {
            console.log("==================== โหลดหน้าล้มเหลว =================== :" + error);
        }
    }

    function onChangeVolumeRemote(div_id , slider){
        let deviceType = checkDeviceType();
        // console.log("Device Type:", deviceType);
        // console.log("onChangeVolumeRemote : " + slider);

        let value_slider;
        if (slider == "handle") {
            value_slider = document.querySelector("#remoteAudioVolume_"+div_id).value;
        } else {
            value_slider = slider;
        }

        array_remoteVolumeAudio[div_id] = parseInt(value_slider);

        // console.log("agoraEngine onChangeVolumeRemote");
        // console.log(agoraEngine);
        // console.log("array_remoteVolumeAudio");
        // console.log(array_remoteVolumeAudio[div_id]);

        let length_remote = agoraEngine['remoteUsers']['length'];

        for (let index = 0; index < length_remote; index++) {
            let uid_remote = agoraEngine['remoteUsers'][index]['uid'];
            // console.log("uid : "+uid_remote);

            if (div_id == uid_remote && agoraEngine['remoteUsers'][index]['audioTrack']) {
                // console.log("ไอดีตรงกัน");
                if (deviceType == "Mobile (iOS)") {
                    if (value_slider == 0) {
                        agoraEngine['remoteUsers'][index]['audioTrack'].stop();
                    } else {
                        agoraEngine['remoteUsers'][index]['audioTrack'].play();
                    }
                } else {
                    agoraEngine['remoteUsers'][index]['audioTrack'].setVolume(parseInt(value_slider));
                }
                // เปิดเสียงไมค์ของ RemoteAudioTrack

                // console.log("UID : "+uid_remote);
                // console.log("div_id : "+div_id);
                // console.log(agoraEngine['remoteUsers'][index]['audioTrack']);
            }

            //เช็คว่าสถานะ remote เปิดหรือปิดไมค์ แล้วส่งไปยังฟังก์ชันเปลี่ยน ไอคอนตามสถานะ
            if (!agoraEngine['remoteUsers'][index]['audioTrack']) {
                let type = "close";
                check_and_switch_icon_remote(div_id,type,value_slider);
            } else {
                let type = "open";
                check_and_switch_icon_remote(div_id,type,value_slider);
            }

        }

    }

	// ฟังก์ชันสุ่มสี
	function getRandomColor() {
		let letters = "0123456789ABCDEF";
		let color = "#";
		for (let i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}

	// ตรวจสอบว่า div อยู่ใน .user-video-call-bar หรือไม่
	function isInUserVideoCallBar(div) {
		return div.parentElement === document.querySelector(".user-video-call-bar");
	}

	// ย้าย div ไปยัง .user-video-call-bar หากไม่อยู่ในนั้นและสลับ div
	function moveDivsToUserVideoCallBar(clickedDiv) {
		let container = document.getElementById("container_user_video_call");
		let customDivs = container.querySelectorAll(".custom-div");
		let userVideoCallBar = document.querySelector(".user-video-call-bar");

        if(customDivs.length > 1){
            document.querySelector(".user-video-call-contrainer").classList.remove("d-none");

            customDivs.forEach(function(div) {
                if (div !== clickedDiv) {

                    // ตรวจสอบว่า div นี้มีคลาส "information-user" หรือไม่
                    let infomationUser = div.querySelector(".infomation-user");
                    if (infomationUser) {
                        // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                        infomationUser.classList.add("d-none");
                    }

                    if (!isInUserVideoCallBar(div)) {
                        userVideoCallBar.appendChild(div);
                    }
                }
            });

            // ย้าย div ที่ถูกคลิกไปยังตำแหน่งที่ถูกคลิก
            if (!isInUserVideoCallBar(clickedDiv)) {

                let infomationUser = clickedDiv.querySelector(".infomation-user");
                if (infomationUser) {
                    // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                    infomationUser.classList.remove("d-none");
                }

                container.appendChild(clickedDiv);
            }
            // document.querySelector(".btn-video-call-container").classList.add("d-none");

            type_advice = "dec";
            showTextAdvice(type_advice);
            // console.log(type_advice);
        }else{
            type_advice = "inc";
            showTextAdvice(type_advice);
            // console.log(type_advice);
        }
	}

	// สลับ div ระหว่าง .user-video-call-bar และ #container_user_video_call
	// function swapDivsInContainerAndUserVideoCallBar(clickedDiv) {
	// 	let container = document.getElementById("container_user_video_call");
	// 	let customDivsInContainer = container.querySelectorAll(".custom-div");
	// 	let userVideoCallBar = document.querySelector(".user-video-call-bar");
	// 	let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

	// 	if (customDivsInContainer.length > 0 && customDivsInUserVideoCallBar.length > 0) {
	// 		let firstDivInContainer = customDivsInContainer[0];

	// 		container.appendChild(clickedDiv);
	// 		userVideoCallBar.appendChild(firstDivInContainer);
	// 	}


	// }

	// ย้ายทุก div ใน .user-video-call-bar ไปยัง #container_user_video_call
	function moveAllDivsToContainer() {
		let container = document.getElementById("container_user_video_call");
		let userVideoCallBar = document.querySelector(".user-video-call-bar");
		let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
		document.querySelector(".user-video-call-contrainer").classList.add("d-none");

		customDivsInUserVideoCallBar.forEach(function(div) {

            let infomationUser = div.querySelector(".infomation-user");
                if (infomationUser) {
                    // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                    infomationUser.classList.remove("d-none");
                }

			container.appendChild(div);
		});

		document.querySelector(".btn-video-call-container").classList.remove("d-none");

        type_advice = "inc";
        showTextAdvice(type_advice);
        // console.log(type_advice);

        checkchild();
	}
    let text_advice;

    function showTextAdvice(type) {

        let div_advice =  document.querySelector('#adive_text_video_call');
		let container = document.getElementById("container_user_video_call");
		let customDivs = container.querySelectorAll(".custom-div");
		let userVideoCallBar = document.querySelector(".user-video-call-bar");
        let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

        div_advice.innerHTML = '';

        // จะเปลี่ยนไปเช็คจากจำนวนคน หลังจากทำหลังบ้านเสร็จ
        if(type == "inc"){
                div_advice.innerHTML = '<p style="font-size: 36px;" class="font-14 text-danger">กดที่จอวิดีโอเพื่อขยาย*</p>';
		} else {
                div_advice.innerHTML = '<p style="font-size: 36px;" class="font-14 text-danger">กดที่จอวิดีโอเพื่อกลับขนาดปกติ*</p>';
		}
	}

    showTextAdvice(type_advice);

	function handleClick(clickedDiv) {
		let userVideoCallBar = document.querySelector(".user-video-call-bar");
		let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

		if (customDivsInUserVideoCallBar.length > 0) {
			moveAllDivsToContainer();
		} else {
			moveDivsToUserVideoCallBar(clickedDiv);
		}
	}


	// เพิ่ม event listener บนปุ่ม "เพิ่ม div"
	// document.getElementById("addButton").addEventListener("click", createAndAttachCustomDiv);

	// เพิ่ม event listener บน .user-video-call-bar สำหรับสลับ div
	document.querySelector(".user-video-call-bar").addEventListener("click", function(e) {
		if (e.target.classList.contains("custom-div")) {
			handleClick(e.target);
		}
	});


	function checkchild() {
		const container = document.querySelector("#container_user_video_call");
		const customDivs = container.querySelectorAll(".custom-div");
		const childCount = container.childElementCount;

		var existingStyle = document.querySelector("#custom-style");

		if (existingStyle) {
			// If the style element already exists, remove it
			existingStyle.remove();
		}

		var x = document.createElement("STYLE");
		x.id = "custom-style"; // Give it an ID for easy reference

        var t = document.createTextNode(""); // Create an empty text node

        if (childCount === 2) {
            t.textContent = "#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(100% - 40px);aspect-ratio: 16/9;}";
        } else if (childCount === 3) {
            t.textContent = "#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(100% - 40px);aspect-ratio: 16/9;} #container_user_video_call .custom-div:not(:only-child):first-child {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;} #container_user_video_call .custom-div:not(:only-child):nth-child(2) {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;}";
        } else if (childCount === 4) {
            t.textContent = "#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;}";
        }

		x.appendChild(t);
		document.head.appendChild(x);
	}

    //============ จบโยกย้าย Div   =================//

    function removeVideoDiv(elementId)
    {
        // console.log("Removing "+ elementId+"Div");
        let Div = document.getElementById(elementId);
        if (Div)
        {
            Div.remove();
        }
    };

    function changeBgColor(bg_local){
        // เซ็ท bg-local เป็นสีที่ดูด
        // console.log("ทำงาน "+bg_local)

        let agoraCreateLocalDiv = document.querySelector("#videoDiv_"+user_id);

        let divsInsideAgoraCreateLocal = agoraCreateLocalDiv.querySelector(".agora_create_local");
            let sub_div = divsInsideAgoraCreateLocal.querySelector("div");
                sub_div.style.backgroundColor = bg_local;

            if(isVideo == false){
                let video_tag = divsInsideAgoraCreateLocal.querySelector("video");
                    video_tag.remove();
            }
    }
</script>


<script>
    function btn_toggle_mic_camera(videoTrack,audioTrack,bg_local){ // สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน

        const div_for_AudioButton = document.querySelector('#div_for_AudioButton');
        const div_for_VideoButton = document.querySelector('#div_for_VideoButton');

        const muteButton = document.createElement('button');
            muteButton.type = "button";
            muteButton.id = "muteAudio";
            muteButton.classList.add('audio_button');
            muteButton.innerHTML = '<i class="fa-solid fa-microphone"></i>';

            div_for_AudioButton.appendChild(muteButton);

        //สร้างปุ่ม เปิด-ปิด วิดีโอ
        const muteVideoButton = document.createElement('button');
            muteVideoButton.type = "button";
            muteVideoButton.id = "muteVideo";
            muteVideoButton.classList.add('video_button');
            muteVideoButton.innerHTML = '<i class="fa-solid fa-video"></i>';

            div_for_VideoButton.appendChild(muteVideoButton);

        muteButton.onclick = async function() {
            if (isAudio == true) {
                // Update the button text.
                document.getElementById(`muteAudio`).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                document.getElementById('div_for_AudioButton').classList.remove('btnSpecial_unmute');
                document.getElementById('div_for_AudioButton').classList.add('btnSpecial_mute');
                // Mute the local video.
                channelParameters.localAudioTrack.setEnabled(false);

                // เปลี่ยน icon microphone ให้เป็นปิด ใน divVideo_
                document.getElementById(`mic_local`).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

                isAudio = false;

            } else {
                // Update the button text.
                document.getElementById(`muteAudio`).innerHTML = '<i class="fa-solid fa-microphone"></i>';
                document.getElementById('div_for_AudioButton').classList.add('btnSpecial_unmute');
                document.getElementById('div_for_AudioButton').classList.remove('btnSpecial_mute');
                // Unmute the local video.
                channelParameters.localAudioTrack.setEnabled(true);

                // เปลี่ยน icon microphone ให้เป็นเปิด ใน divVideo_
                document.getElementById(`mic_local`).innerHTML = '<i class="fa-solid fa-microphone"></i>';

                isAudio = true;

                SoundTest(); //เช็คไมค์
            }
        }

        muteVideoButton.onclick = async function() {
            if (isVideo == true) {
                // Update the button text.
                document.getElementById(`muteVideo`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                document.getElementById('div_for_VideoButton').classList.remove('btnSpecial_unmute');
                document.getElementById('div_for_VideoButton').classList.add('btnSpecial_mute');
                // Mute the local video.
                channelParameters.localVideoTrack.setEnabled(false);
                muteVideoButton.classList.add('btn-disabled');
                // เปลี่ยน icon camera ให้เป็นปิด ใน divVideo_
                document.getElementById(`camera_local`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

                // แสดงโปรไฟล์ ตอนปิดกล้อง
                document.querySelector('.profile-input-output-local').classList.remove('d-none');

                // disable ปุ่มสลับกล้อง
                document.querySelector('#btn_switchCamera').classList.add('disabled');

                changeBgColor(bg_local);

                isVideo = false;

            } else {
                // Update the button text.
                document.getElementById(`muteVideo`).innerHTML = '<i class="fa-solid fa-video"></i>';
                document.getElementById('div_for_VideoButton').classList.add('btnSpecial_unmute');
                document.getElementById('div_for_VideoButton').classList.remove('btnSpecial_mute');
                // Unmute the local video.
                channelParameters.localVideoTrack.setEnabled(true);
                // muteVideoButton.classList.add('btn-success');
                muteVideoButton.classList.remove('btn-disabled');

                // เปลี่ยน icon camera ให้เป็นเปิด ใน divVideo_
                document.getElementById(`camera_local`).innerHTML = '<i class="fa-solid fa-video"></i>';

                // ซ่อนโปรไฟล์ ตอนเปิดกล้อง
                document.querySelector('.profile-input-output-local').classList.add('d-none');

                // enable ปุ่มสลับกล้อง
                document.querySelector('#btn_switchCamera').classList.remove('disabled');

                isVideo = true;

                if(document.querySelector('.imgdivLocal')){
                    document.querySelector('.imgdivLocal').remove();
                }
            }
        }
    }

    // สำหรับ Div ต่างๆของ bLocal
    function create_element_localvideo_call(localPlayerContainer ,name_local ,type_local ,profile_local, bg_local) {
        if(localPlayerContainer.id){
            // console.log("name_local here");
            // console.log(name_local);
            // console.log(type_local);
            // console.log(bg_local);
            // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
            if(document.getElementById('videoDiv_' + localPlayerContainer.id)) {
                var divVideo = document.getElementById('videoDiv_' + localPlayerContainer.id);
            }else{
                var divVideo = document.createElement('div');
                divVideo.setAttribute('id','videoDiv_' + localPlayerContainer.id);
                divVideo.setAttribute('class','custom-div');
                divVideo.setAttribute('style','background-color:'+ bg_local);
            }

            //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

            // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
            let ProfileInputOutputDiv = document.createElement("div");
                ProfileInputOutputDiv.className = "profile-input-output-local";
                ProfileInputOutputDiv.setAttribute('style','z-index: 1; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

            let profileImage = document.createElement('img');
                profileImage.setAttribute('src', profile_local); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
                profileImage.setAttribute('alt', 'โปรไฟล์');
                // profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 30%;');
                profileImage.setAttribute('class', 'profile_image');


            ProfileInputOutputDiv.appendChild(profileImage);

            // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
            let statusMicrophoneOutput = document.createElement("div");
            statusMicrophoneOutput.id = "statusMicrophoneOutput_local";
            statusMicrophoneOutput.className = "status-sound-output d-none";
            statusMicrophoneOutput.setAttribute('style','z-index: 1;');

            let soundDiv = document.createElement("div");
                soundDiv.id = "sound_local";
                soundDiv.className = "sound";
                soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

            statusMicrophoneOutput.appendChild(soundDiv);

            // เพิ่มแท็ก ไมค์และกล้อง

            let statusInputOutputDiv = document.createElement("div");
                statusInputOutputDiv.className = "status-input-output";
                statusInputOutputDiv.setAttribute('style','z-index: 1;');

            let micDiv = document.createElement("div");
                micDiv.id = "mic_local";
                micDiv.className = "mic";
                micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';

            let cameraDiv = document.createElement("div");
                cameraDiv.id = "camera_local";
                cameraDiv.className = "camera";
                cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';

            statusInputOutputDiv.appendChild(micDiv);
            statusInputOutputDiv.appendChild(cameraDiv);

            // เพิ่มแท็ก ชื่อและสถานะ

            let infomationUserDiv = document.createElement("div");
                infomationUserDiv.id = "infomation-user-local";
                infomationUserDiv.className = "infomation-user";
                infomationUserDiv.setAttribute('style','z-index: 1;');

            let nameUserVideoCallDiv = document.createElement("div");
                nameUserVideoCallDiv.id = "name_local_video_call";
                nameUserVideoCallDiv.className = "name-user-video-call";
                nameUserVideoCallDiv.innerHTML = '<p class="m-0 text-white float-end">'+ name_local +'</p>';

            let br = document.createElement('br'); // สร้าง <br> tag

            let roleUserVideoCallDiv = document.createElement("div");
                roleUserVideoCallDiv.id = "role_local_video_call";
                roleUserVideoCallDiv.className = "role-user-video-call";
                roleUserVideoCallDiv.innerHTML = '<small class="d-block float-end">'+type_local+'</small>';

            infomationUserDiv.appendChild(nameUserVideoCallDiv);
            infomationUserDiv.appendChild(br);
            infomationUserDiv.appendChild(roleUserVideoCallDiv);

            // สร้าง div โปร่งใส
            let transparentDiv = document.createElement("div");
            transparentDiv.classList.add("transparent-div"); // เพิ่มคลาส CSS

            // เพิ่ม div ด้านในลงใน div หลัก
            divVideo.appendChild(ProfileInputOutputDiv);
            divVideo.appendChild(statusMicrophoneOutput);
            divVideo.appendChild(statusInputOutputDiv);
            divVideo.appendChild(infomationUserDiv);
            divVideo.appendChild(transparentDiv);
            //======= จบการ สร้างปุ่มสถานะ ==========

            // เพิ่ม div หลักลงใน div รวม
            divVideo.append(localPlayerContainer);


            let container_user_video_call = document.querySelector("#container_user_video_call");
            container_user_video_call.append(divVideo);

            divVideo.addEventListener("click", function() {
                handleClick(divVideo);
            });

            transparentDiv.addEventListener("click", function() {
                let id_agora_create = localPlayerContainer.id;
                // console.log(id_agora_create);
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                let userVideoCallBar = document.querySelector(".user-video-call-bar");
                let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

                if (customDivsInUserVideoCallBar.length > 0) {
                    moveAllDivsToContainer();
                } else {
                    moveDivsToUserVideoCallBar(clickvideoDiv);
                }
            });

            checkchild();
        }

    }

    // สำหรับ Div ต่างๆของ Remote ตอน published
    function create_element_remotevideo_call(remotePlayerContainer, name_remote , type_remote , bg_remote, user) {
        if(remotePlayerContainer.id){
            // console.log("remotePlayerContainer");
            // console.log(remotePlayerContainer);

            let containerId = remotePlayerContainer.id;

            let divVideo_New = document.createElement('div');
            divVideo_New.setAttribute('id','videoDiv_' + containerId);
            divVideo_New.setAttribute('class','custom-div');
            divVideo_New.setAttribute('style', 'background-color:' + bg_remote);

            //======= สร้างปุ่มสถานะ && รูปโปรไฟล์ ==========

            // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
            let statusMicrophoneOutput = document.createElement("div");
            statusMicrophoneOutput.id = "statusMicrophoneOutput_remote_"+containerId;
            statusMicrophoneOutput.className = "status-sound-output d-none";
            statusMicrophoneOutput.setAttribute('style','z-index: 1;');

            let soundDiv = document.createElement("div");
                soundDiv.id = "sound_remote_" + containerId;
                soundDiv.className = "sound";
                soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

            statusMicrophoneOutput.appendChild(soundDiv);

            // เพิ่มแท็ก ไมค์และกล้อง
            let statusInputOutputDiv = document.createElement("div");
                statusInputOutputDiv.className = "status-input-output";
                statusInputOutputDiv.setAttribute('style','z-index: 1;');

            let micDiv = document.createElement("div");
                micDiv.id = "mic_remote_"+containerId;
                micDiv.className = "mic";
                if(user.hasAudio == false){
                    micDiv.innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

            let cameraDiv = document.createElement("div");
                cameraDiv.id = "camera_remote_"+containerId;
                cameraDiv.className = "camera";
                if(user.hasVideo == false){
                    cameraDiv.innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';
                }
            statusInputOutputDiv.appendChild(micDiv);
            statusInputOutputDiv.appendChild(cameraDiv);

            // เพิ่มแท็ก ชื่อและสถานะ
            let infomationUserDiv = document.createElement("div");
                infomationUserDiv.className = "infomation-user";
                infomationUserDiv.setAttribute('style','z-index: 1;');

            let nameUserVideoCallDiv = document.createElement("div");
                nameUserVideoCallDiv.className = "name-user-video-call";
                nameUserVideoCallDiv.innerHTML = '<p class="m-0 text-white float-end">'+name_remote+'</p>';

            let br = document.createElement('br'); // สร้าง <br> tag

            let roleUserVideoCallDiv = document.createElement("div");
                roleUserVideoCallDiv.className = "role-user-video-call";
                roleUserVideoCallDiv.innerHTML = '<small class="d-block float-end">'+type_remote+'</small>';

            infomationUserDiv.appendChild(nameUserVideoCallDiv);
            infomationUserDiv.appendChild(br);
            infomationUserDiv.appendChild(roleUserVideoCallDiv);

            // เพิ่ม div ด้านในลงใน div หลัก
            divVideo_New.appendChild(statusMicrophoneOutput);
            divVideo_New.appendChild(statusInputOutputDiv);
            divVideo_New.appendChild(infomationUserDiv);

            //======= จบการ สร้างปุ่มสถานะ ==========

            divVideo_New.append(remotePlayerContainer);

            // หา div เดิมที่ต้องการแทนที่
            let oldDiv = document.getElementById("videoDiv_"+ containerId);

            // เพิ่ม div ใหม่ลงใน div หลัก หรือ div bar
            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
            let container_user_video_call = document.querySelector("#container_user_video_call");

            //ถ้าใช่คอม ตรวจสอบว่าเจอ div เดิมหรือไม่

            if (oldDiv) {
                // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
                oldDiv.parentNode.replaceChild(divVideo_New, oldDiv);
            } else {
                if (customDivsInUserVideoCallBar.length > 0) {
                    userVideoCallBar.append(divVideo_New);

                    let infomationUser = divVideo_New.querySelector(".infomation-user");
                    if (infomationUser) {
                        // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                        infomationUser.classList.add("d-none");
                    }
                } else {
                    container_user_video_call.append(divVideo_New);
                }
            }

            // คลิ๊ก div ให้เปลี่ยนขนาด
            divVideo_New.addEventListener("click", function() {
                handleClick(divVideo_New);
            });

            remotePlayerContainer.addEventListener("click", function() {
                // console.log("remotePlayerContainer Click ---->");
                let id_agora_create = remotePlayerContainer.id;
                // console.log(id_agora_create);
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                let userVideoCallBar = document.querySelector(".user-video-call-bar");
                let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

                if (customDivsInUserVideoCallBar.length > 0) {
                    moveAllDivsToContainer();
                } else {
                    moveDivsToUserVideoCallBar(clickvideoDiv);
                }
            });

            checkchild();
        }else{
            console.log("================ สร้าง divVideo_New remote ไม่สำเร็จ =================");
        }
    }

    // สำหรับ Div Dummy ต่างๆของ Remote ตอน unpublished
    function create_dummy_videoTrack(user,name_remote,type_remote,profile_remote,bg_remote){
        if(user.uid){

            // ใส่เนื้อหาใน divVideo ที่ถูกใช้โดยผู้ใช้
            let divVideo_New = document.createElement('div');
            divVideo_New.setAttribute('id','videoDiv_' + user.uid);
            divVideo_New.setAttribute('class','custom-div');
            divVideo_New.setAttribute('style','background-color:'+bg_remote);

            //======= สร้างปุ่มสถานะ และรูปโปรไฟล์ ==========

            // สร้างแท็ก <img> สำหรับรูปโปรไฟล์
            let ProfileInputOutputDiv = document.createElement("div");
                ProfileInputOutputDiv.className = "profile-input-output";
                ProfileInputOutputDiv.setAttribute('style','z-index: 1; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);');

            let profileImage = document.createElement('img');
                profileImage.setAttribute('src', profile_remote); // เปลี่ยน 'ลิงก์รูปโปรไฟล์' เป็น URL ของรูปโปรไฟล์ของผู้ใช้
                profileImage.setAttribute('alt', 'โปรไฟล์');
                // profileImage.setAttribute('style', 'border-radius: 50%; width: 100px; height: 100px; max-width: 100%; max-height: 30%;');
                profileImage.setAttribute('class', 'profile_image');
            // เพิ่มแท็ก <img> ลงใน ProfileInputOutputDiv
            ProfileInputOutputDiv.appendChild(profileImage);

            // เพิ่มแท็ก แสดงเสียงไมค์เวลาพูด
            let statusMicrophoneOutput = document.createElement("div");
                statusMicrophoneOutput.id = "statusMicrophoneOutput_remote_" + user.uid;
                statusMicrophoneOutput.className = "status-sound-output d-none";
                statusMicrophoneOutput.setAttribute('style','z-index: 1;');

            let soundDiv = document.createElement("div");
                soundDiv.id = "sound_remote_" + user.uid;
                soundDiv.className = "sound";
                soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

            statusMicrophoneOutput.appendChild(soundDiv);

            // เพิ่มแท็ก ไมค์และกล้อง
            let statusInputOutputDiv = document.createElement("div");
                statusInputOutputDiv.className = "status-input-output";
                statusInputOutputDiv.setAttribute('style','z-index: 1;');

            let micDiv = document.createElement("div");
                micDiv.id = "mic_remote_"+ user.uid;
                micDiv.className = "mic";
                if(user.hasAudio == false){
                    micDiv.innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

            let cameraDiv = document.createElement("div");
                cameraDiv.id = "camera_remote_"+ user.uid;
                cameraDiv.className = "camera";
                if(user.hasVideo == false){
                    cameraDiv.innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';
                }

            statusInputOutputDiv.appendChild(micDiv);
            statusInputOutputDiv.appendChild(cameraDiv);

            // เพิ่มแท็ก ชื่อและสถานะ
            let infomationUserDiv = document.createElement("div");
                infomationUserDiv.className = "infomation-user";
                infomationUserDiv.setAttribute('style','z-index: 1;');

            let nameUserVideoCallDiv = document.createElement("div");
                nameUserVideoCallDiv.className = "name-user-video-call";
                nameUserVideoCallDiv.innerHTML = '<p class="m-0 text-white float-end">'+name_remote+'</p>';

            let br = document.createElement('br'); // สร้าง <br> tag

            let roleUserVideoCallDiv = document.createElement("div");
                roleUserVideoCallDiv.className = "role-user-video-call";
                roleUserVideoCallDiv.innerHTML = '<small class="d-block float-end">'+type_remote+'</small>';

            infomationUserDiv.appendChild(nameUserVideoCallDiv);
            infomationUserDiv.appendChild(br);
            infomationUserDiv.appendChild(roleUserVideoCallDiv);

            // สร้าง div โปร่งใส
            let transparentDiv = document.createElement("div");
            transparentDiv.classList.add("transparent-div"); // เพิ่มคลาส CSS


            // เพิ่ม div ด้านในลงใน div หลัก
            divVideo_New.appendChild(ProfileInputOutputDiv);
            divVideo_New.appendChild(statusMicrophoneOutput);
            divVideo_New.appendChild(statusInputOutputDiv);
            divVideo_New.appendChild(infomationUserDiv);
            divVideo_New.appendChild(transparentDiv);
            //======= จบการ สร้างปุ่มสถานะ ==========

            // ถ้ามี dummy_trackRemoteDiv_ อยู่แล้ว ลบอันเก่าก่อน
            if(document.getElementById('dummy_trackRemoteDiv_' + user.uid)) {
                document.getElementById('dummy_trackRemoteDiv_' + user.uid).remove();
            }

            //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
            // const remote_video_call = document.getElementById(user.uid);
            closeVideoHTML  =
                            ' <div id="dummy_trackRemoteDiv_'+ user.uid +'" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: '+bg_remote+';">' +
                                '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                            '</div>' ;

            divVideo_New.insertAdjacentHTML('beforeend',closeVideoHTML); // แทรกล่างสุด

            // หา div เดิมที่ต้องการแทนที่
            let oldDiv = document.getElementById("videoDiv_"+ user.uid);

            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
            let container_user_video_call = document.querySelector("#container_user_video_call");
            // console.log("customDivsInUserVideoCallBar.length in Dummy = "+ customDivsInUserVideoCallBar.length);

            // ตรวจสอบว่าเจอ div เดิมหรือไม่

            if (oldDiv) {
                // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
                oldDiv.parentNode.replaceChild(divVideo_New, oldDiv);
            } else {
                if (customDivsInUserVideoCallBar.length > 0) {
                    userVideoCallBar.append(divVideo_New);

                    let infomationUser = divVideo_New.querySelector(".infomation-user");
                    if (infomationUser) {
                        // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                        infomationUser.classList.add("d-none");
                    }
                } else {
                    container_user_video_call.append(divVideo_New);
                }
            }

            divVideo_New.addEventListener("click", function() {
                handleClick(divVideo_New);
            });

            transparentDiv.addEventListener("click", function() {

                let id_agora_create = user.uid;
                // console.log(id_agora_create);
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                let userVideoCallBar = document.querySelector(".user-video-call-bar");
                let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

                if (customDivsInUserVideoCallBar.length > 0) {
                    moveAllDivsToContainer();
                } else {
                    moveDivsToUserVideoCallBar(clickvideoDiv);
                }
            });

            checkchild();
        }else{
            console.log("------------------------------------------------------  หา user ไม่เจอ เลยขึ้น undifined ใน create_videoTrack()");
        }
    }

</script>


<script>
    function find_location() {
		const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        // หาชื่อจังหวัด
		geocodeLatLng(geocoder, infowindow);

		// ---------------

		// onload_check_status_sos_map();

	}

    var all_address ;
    var check_status_done = 'yes'; // ไว้เช็คว่าทำตัวอัพเดตสถานะไปหรือยัง
    if ('{{$sos_data->status}}' === "เสร็จสิ้น") {
        check_status_done = 'yes';
    } else {
        check_status_done = 'no';
    }

	function geocodeLatLng(geocoder, map, infowindow) {
		// console.log("geocodeLatLng");
        const input = "{{ $sos_data->lat }}"+","+"{{ $sos_data->lng }}";
        const latlngStr = input.split(",", 2);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        geocoder
            .geocode({ location: latlng })
            .then((response) => {
                if (response.results[0]) {

                	all_address = response.results[0].formatted_address ;

	                // console.log(response.results[0]);

                    // เข้าถึงชื่อจังหวัดจากผลลัพธ์
	                const addressComponents = response.results[0].address_components;

	                let cityName = ""; // ชื่อจังหวัด
	                let districtName = ""; // ชื่ออำเภอ (เขต)
	                let subdistrictName = ""; // ชื่อตำบล (แขวง)

	                for (const component of addressComponents) {
	                    for (const type of component.types) {
	                        if (type === "locality" || type === "administrative_area_level_1") {
	                            cityName = component.long_name;
	                        }
	                        if (type === "administrative_area_level_2") {
	                            districtName = component.long_name;
	                        }
	                        if (type === "administrative_area_level_3" || type === "locality") {
	                            subdistrictName = component.long_name;
	                        }
	                    }
	                }

	                if (cityName) {
	                    cityName = cityName.replaceAll("จังหวัด","");
	                	cityName = cityName.replaceAll("จ.","");
	                	cityName = cityName.replaceAll(" ","");
	                    // console.log("ชื่อจังหวัด: " + cityName);
	                }
	                if (districtName) {
	                    districtName = districtName.replaceAll("อำเภอ","");
	                	districtName = districtName.replaceAll("อ.","");
	                	districtName = districtName.replaceAll(" ","");
	                    // console.log("ชื่ออำเภอ (เขต): " + districtName);
	                }
	                if (subdistrictName) {
	                    subdistrictName = subdistrictName.replaceAll("ตำบล","");
	                	subdistrictName = subdistrictName.replaceAll("ต.","");
	                	subdistrictName = subdistrictName.replaceAll(" ","");
	                    // console.log("ชื่อตำบล (แขวง): " + subdistrictName);
	                }

	                if (cityName) {
	                	search_phone_niems(cityName ,districtName ,subdistrictName);
	                } else {
	                    // console.log("ไม่พบชื่อจังหวัด");
	                }

                } else {
                    // window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function search_phone_niems(cityName ,districtName ,subdistrictName){

        fetch("{{ url('/') }}/api/sos_map/search_phone_niems/"+cityName)
            .then(response => response.json())
            .then(result => {
                // console.log("result phoneniems");
                // console.log(result);


                    if(result['1669'] != "no"){
                        @if(empty($sos_data->sos_1669_id))
                            document.querySelector('#name_1669_area').innerHTML = result['1669'] ;
                            document.querySelector('#btn_ask_1669').setAttribute('onclick' ,
                            "ask_to_1669('"+cityName+"','"+districtName+"','"+subdistrictName+"')");
                        @endif

                        document.querySelector('#btn_ask_1669').classList.remove('d-none');
                    }

                if(result['phone_niems'] != "no"){
                    let html_main ;
                    let html_sub ;
                    let content_phone_niems = document.querySelector('#content_phone_niems');

                    for (let i = 0; i < result['phone_niems'].length; i++) {

                        let phone_sp = result['phone_niems'][i]['phone'].split(",");

                        // console.log(phone_sp);

                        let sum_html = '' ;

                        for (let x = 0; x < phone_sp.length; x++) {
                            html_sub = `
                                <span class="btn btn-outline-primary mt-1 font-weight-bold" style="width:80%; font-size: 40px;">
                                    `+phone_sp[x]+`
                                </span>
                                <br>
                            `;
                            sum_html = sum_html + html_sub ;
                        }

                        html = `
                            <p class="font-weight-bold text-dark" style="font-size: 40px;">จ.`+result['phone_niems'][i]['province']+`</p>
                            `+sum_html+`
                            <hr>
                        `;

                        content_phone_niems.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }
                }
        });
    }

    function ask_to_1669(cityName ,districtName ,subdistrictName){

        // console.log("ask_to_1669 >> " + cityName);

        let name = '{{ $sos_data->name }}';
        let phone = '{{ $sos_data->phone }}';
        let user_id = '{{ $sos_data->user_id }}';
        let lat = '{{ $sos_data->lat }}';
        let lng = '{{ $sos_data->lng }}';
        // let photo_sos_1669 = document.querySelector("#photo_sos_1669");
        let district_P = cityName;
        let district_A = districtName;
        let district_T = subdistrictName;

        // API UPLOAD IMG //
        let formData = new FormData();
        let imageFile = document.getElementById('photo_sos_1669').value;
            formData.append('photo_sos', imageFile);

        let data_sos_1669 = {
            "name_user" : name.value,
            "phone_user" : phone.value,
            "user_id" : user_id.value,
            "lat" : lat.value,
            "lng" : lng.value,
            "changwat" : district_P,
            "amphoe" : district_A,
            "tambon" : district_T,
            "all_address" : all_address,
        }
        // console.log(data_sos_1669);

        formData.append('name_user', data_sos_1669.name_user);
        formData.append('phone_user', data_sos_1669.phone_user);
        formData.append('user_id', data_sos_1669.user_id);
        formData.append('lat', data_sos_1669.lat);
        formData.append('lng', data_sos_1669.lng);
        formData.append('changwat', data_sos_1669.changwat);
        formData.append('amphoe', data_sos_1669.amphoe);
        formData.append('tambon', data_sos_1669.tambon);
        formData.append('all_address', data_sos_1669.all_address);
        formData.append('sos_map_id', "{{ $sos_data->id }}");

        fetch("{{ url('/') }}/api/create_new_sos_by_user", {
            method: 'POST',
            body: formData
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
            let name_admin = "{{ Auth::user()->name }}" ;

            if(data){
                fetch("{{ url('/') }}/api/sos_map/update_sos_1669_id/"+data+"/"+"{{ $sos_data->id }}" +"/"+ district_P +"/"+ name_admin)
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);
                        if(result == "ok"){
                            let html = `
                                <b>
                                    <span class="d-block" style="color: #ffffff; font-size: 40px;">ส่งต่อ 1669 แล้ว</span>
                                </b>
                            `;
                            document.querySelector('#content_1669').innerHTML = html ;
                            document.querySelector('#btn_ask_1669').setAttribute('onclick' ,"");

                            help_complete();

                            document.querySelector('#status_of_Room').innerHTML = 'สถานะ : <b class="text-success">เสร็จสิ้น</b>';
                            document.querySelector('#alert_text').innerHTML = "ส่งต่อ 1669 เรียบร้อยแล้ว";
                            document.querySelector('#alert_copy').classList.add('up_down');

                            const animated = document.querySelector('.up_down');
                            animated.onanimationend = () => {
                                document.querySelector('#alert_copy').classList.remove('up_down');
                            };

                            check_status_done = 'yes';
                        }
                });
            }

        }).catch(function(error){
            // console.error(error);
        });

    }

    function help_complete(){

        let data_arr = [] ;

        let officer_id ;

        @if(!empty($sos_data->helper_id))
            officer_id = "{{ $sos_data->helper_id }}" ;
        @else
            fetch("{{ url('/') }}/api/sos_map/update_helper_id" + "/" + "{{ Auth::user()->id }}" + "/" + "{{ $sos_data->id }}")
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    officer_id = result ;
                });
        @endif

        setTimeout(function() {

            data_arr = {
                "sos_map_id" : "{{ $sos_data->id }}",
                "officer_id" : officer_id,
                "groupId" : "{{ $groupId }}",
                "command_id" : "{{ Auth::user()->id }}",
            };

            fetch("{{ url('/') }}/api/sos_map/help_complete", {
                method: 'post',
                body: JSON.stringify(data_arr),
                headers: {
                    'Content-Type': 'application/json'
                }
                }).then(function (response){
                    return response.text();
                }).then(function(data){
                    // console.log(data);
                }).catch(function(error){
                // console.error(error);
            });

        }, 1500);

    }

    function check_status_sos(){
        fetch("{{ url('/') }}/api/check_status_sos_video_call" + "?sos_id="+'{{ $sos_data->id }}')
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result === "yes"){
                    let html = `
                            <b>
                                <span class="d-block" style="color: #ffffff; font-size: 40px;">ส่งต่อ 1669 แล้ว</span>
                            </b>
                        `;
                        document.querySelector('#content_1669').innerHTML = html ;
                        document.querySelector('#btn_ask_1669').setAttribute('onclick' ,"");

                        document.querySelector('#status_of_Room').innerHTML = 'สถานะ : <b class="text-success">เสร็จสิ้น</b>';
                        document.querySelector('#alert_text').innerHTML = "ส่งต่อ 1669 เรียบร้อยแล้ว";
                        document.querySelector('#alert_copy').classList.add('up_down');

                        const animated = document.querySelector('.up_down');
                        animated.onanimationend = () => {
                            document.querySelector('#alert_copy').classList.remove('up_down');
                        };

                    check_status_done = 'yes';
                }
            });
    }

    if(type_video_call == "sos_map"){
        window.addEventListener('load', () => {
            // เรียกฟังก์ชัน check_status_sos() ทุก 10 วินาที
            setInterval(() => {
                if (check_status_done === 'no') {
                    check_status_sos();
                }
            }, 10000);
        });
    }

    function myStop_timer_video_call() {
        // console.log("เข้ามาหยุด myStop_timer_video_call");
        setTimeout(() => {
            clearInterval(loop_timer_video_call);
            check_start_timer_video_call = false;
            document.getElementById("time_of_room").classList.add('d-none');
        }, 3000);
    }

    function start_timer_video_call(){
        // console.log('start_timer_video_call');
        // console.log(time_start);
        check_start_timer_video_call = true ;

        setTimeout(() => {

            let time_of_room = document.getElementById("time_of_room");
                time_of_room.classList.remove('d-none');

            fetch("{{ url('/') }}/api/check_status_room" + "?sos_id="+ sos_id + "&type=" + type_video_call)
                .then(response => response.json())
                .then(result => {
                    // วันที่และเวลาที่กำหนด

                    let targetDate = '';
                    if (result['than_2_people_time_start']) {
                        targetDate = new Date(result['than_2_people_time_start']);
                    } else {
                        targetDate = new Date();
                    }

                    let targetTime = targetDate.getTime();

                    loop_timer_video_call = setInterval(function() {
                        // วันที่และเวลาปัจจุบัน
                        let currentDate = new Date();
                        let currentTime = currentDate.getTime();
                        // คำนวณเวลาที่ผ่านไปในมิลลิวินาที
                        let elapsedTime = currentTime - targetTime;
                        let elapsedMinutes = Math.floor(elapsedTime / (1000 * 60));
                        // แปลงเวลาที่ผ่านไปให้เป็นรูปแบบชั่วโมง:นาที:วินาที
                        let hours = Math.floor(elapsedMinutes / 60);
                        let minutes = elapsedMinutes % 60;
                        let seconds = Math.floor((elapsedTime / 1000) % 60);

                        let minsec = minutes + '.' + seconds;
                        let showTimeCountVideo;
                        // แสดงผลลัพธ์
                        let max_minute_time = 8;

                        // let remain_time = max_minute_time - 1;
                        // let time_warning = "";
                        // if (max_minute_time > 1) {
                        //     time_warning = (max_minute_time - remain_time);
                        // }else{
                        //     time_warning = "น้อยกว่า 1";
                        // }

                        if (hours > 0) {
                            if (minutes < 10) {  // ใส่ 0 ข้างหน้า นาที กรณีเลขยังไม่ถึง 10
                                showTimeCountVideo = hours + ':' + '0' + minutes + ':' + seconds + `&nbsp;/ `+max_minute_time+` นาที`;
                            }else{
                                showTimeCountVideo = hours + ':' + minutes + ':' + seconds + `&nbsp;/ `+max_minute_time+` นาที`;
                            }
                        } else {
                            if(seconds < 10){  // ใส่ 0 ข้างหน้า วินาที กรณีเลขยังไม่ถึง 10
                                showTimeCountVideo =  minutes + ':' + '0' + seconds + `&nbsp;/ `+max_minute_time+` นาที`;
                            }else{
                                showTimeCountVideo = minutes + ':' + seconds + `&nbsp;/ `+max_minute_time+` นาที`;
                            }
                        }

                        // // อัปเดตข้อความใน div ที่มี id เป็น timeCountVideo
                        time_of_room.innerHTML = '<i class="fa-regular fa-clock fa-fade" style="color: #11b06b; font-size: 35px;"></i>&nbsp;' + ": " + showTimeCountVideo;

                        if (minsec == 5.00) {
                            let alert_warning = document.querySelector('#alert_warning')
                            alert_warning.style.display = 'block'; // แสดง .div_alert

                            document.querySelector('#alert_text').innerHTML = `เหลือเวลา 3 นาที`;
                            alert_warning.classList.add('up_down');

                            const animated = document.querySelector('.up_down');
                            animated.onanimationend = () => {
                                document.querySelector('#alert_warning').classList.remove('up_down');
                                let alert_warning = document.querySelector('#alert_warning')
                                alert_warning.style.display = 'none'; // แสดง .div_alert
                            };

                        }

                        if (minsec == 7.00) {
                            let alert_warning = document.querySelector('#alert_warning')
                            alert_warning.style.display = 'block'; // แสดง .div_alert

                            document.querySelector('#alert_text').innerHTML = `เหลือเวลา 1 นาที`;
                            alert_warning.classList.add('up_down');

                            const animated = document.querySelector('.up_down');
                            animated.onanimationend = () => {
                                document.querySelector('#alert_warning').classList.remove('up_down');
                                let alert_warning = document.querySelector('#alert_warning')
                                alert_warning.style.display = 'none'; // แสดง .div_alert
                            };
                        }

                        if (elapsedMinutes == max_minute_time) {
                            document.querySelector('#leave').click();
                        }
                    }, 1000);
                });
        }, 2000);

    }

    let isIconVisible;
    let volumeIndicatorHandler = volumes => {
        volumes.forEach((volume) => {
            let localAudioTrackCheck = channelParameters.localAudioTrack;
            if (volume.level >= 50) {
                //แสดงชื่ออุปกรณ์ที่ใช้และระดับเสียง
                if (user_id == volume.uid && volume.level > 50) {
                    // console.log('Enabled Device: ' + localAudioTrackCheck['_deviceName']);
                    // console.log(`UID ${volume.uid} Level ${volume.level}`);
                    // แสดงปุ่มเสียงพูด"
                    if (!isIconVisible) {
                        document.querySelector('#statusMicrophoneOutput_local').classList.remove('d-none');
                        isIconVisible = true;
                    }
                }
            } else {
                if (user_id == volume.uid && volume.level <= 50) {
                    // console.log('Enabled Device: ' + localAudioTrackCheck['_deviceName']);
                    // console.log(`UID ${volume.uid} Level ${volume.level}`);
                    // ซ่อนปุ่มเสียงพูด"
                    if (isIconVisible) {
                        document.querySelector('#statusMicrophoneOutput_local').classList.add('d-none');
                        isIconVisible = false;
                    }
                }
            }
        });
    };

    function SoundTest() {
        // ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
        agoraEngine.off("volume-indicator", volumeIndicatorHandler);
        agoraEngine.on("volume-indicator", volumeIndicatorHandler);
    }


    var check_start_volume_indicator = [];
    var status_remote_volume = [];
    function volume_indicator_remote(remote_id){
        // console.log("ทำแล้วน้าาา volume_indicator_remote");
        check_start_volume_indicator[remote_id] = "yes";

        agoraEngine.on("volume-indicator", volumes => {
                volumes.forEach((volume, index) => {
                    // console.log("เข้า foreach");
                    // console.log(volume.uid);
                    if (remote_id == volume.uid && status_remote_volume[remote_id] == "yes") {
                        if (volume.level > 50) {
                            // console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);
                            document.querySelector('#statusMicrophoneOutput_remote_'+remote_id).classList.remove('d-none');
                        } else if (volume.level <= 50) {
                            // console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);
                            document.querySelector('#statusMicrophoneOutput_remote_'+remote_id).classList.add('d-none');
                        }
                    }else if(remote_id == volume.uid && status_remote_volume[remote_id] == "no") {
                        // console.log("else ล่างสุด");
                        document.querySelector('#statusMicrophoneOutput_remote_'+remote_id).classList.add('d-none');
                    }
                });
            })
    }

    function start_user_in_video_call(){

        // check_user_in_video_call = true;

        loop_check_div_user = setInterval(() => {
            // console.log("start_user_in_video_call");
            let customDivAll = document.querySelectorAll(".custom-div");
            // console.log("div count :"+customDivAll.length);

            if (customDivAll.length >= 2) {

                fetch("{{ url('/') }}/api/check_user_in_room_4" + "?sos_id=" + sos_id + "&type=" + type_video_call)
                .then(response => response.json())
                .then(result => {
                    let status_delete = "delete";

                    customDivAll.forEach(element => {
                        let id = element.id;

                        if (id.startsWith("videoDiv_")) {
                            // แยก UID จาก id โดยตัด "videoDiv_" ออก
                            let uid = id.replace("videoDiv_", "");
                            const promises = result['data'].map(data_user => {
                                return new Promise((resolve, reject) => {
                                    // ตรวจสอบว่า UID นี้อยู่ใน remoteUsers หรือไม่
                                    if (uid == data_user.id.toString()) {
                                        // ถ้าไม่มีให้ลบ element ออก
                                        status_delete = "not_delete";
                                    }
                                    // เมื่อเสร็จสิ้นให้เรียก resolve
                                    resolve();
                                });
                            });
                            Promise.all(promises)
                                .then(() => {
                                    if (status_delete == "delete") {
                                        element.remove();
                                        // console.log("ลบ div ที่ค้าง")
                                    }
                                })
                                .catch(error => {
                                    // จัดการกับข้อผิดพลาด (ถ้ามี)
                                    console.error("catch error in promise :"+error);
                                });
                        }
                        else{
                            element.remove();
                        }
                    });
                })
                .catch(error => {
                    // check_user_in_video_call = false;
                    console.log("check_user_in_video_call error : "+error);
                });
            } // endif


        }, 15000);

    }


    async function waitForElement_in_sidebar(type , user_id) {
        while (!document.getElementById('icon_mic_remote_in_sidebar_'+user_id)) {
            // รอให้ <div id="icon_mic_remote_in_sidebar"> ถูกสร้างขึ้น
            await new Promise(resolve => setTimeout(resolve, 100)); // รออีก 100 milliseconds ก่อนที่จะตรวจสอบอีกครั้ง
        }
        switch_icon_mic_remote_in_sidebar(type , user_id);
    }

    function switch_icon_mic_remote_in_sidebar(type , user_id){
        let value_slider = document.querySelector('#remoteAudioVolume_'+user_id).value;
        check_and_switch_icon_remote(user_id , type , value_slider )
    }

    function check_and_switch_icon_local( value ){

        let type_mode;
        if (value == 0) {
            type_mode = "mute";
            document.querySelector("#icon_mic_local_in_sidebar").innerHTML =
            `<div class="icon-wrapper">
                <i title="คุณปิดไมโครโฟนผู้ใช้ท่านนี้ไว้" class="fa-duotone fa-volume-xmark"
                style="--fa-primary-color: #fff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;"
                onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i>
            </div>
            `;

            // document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `<i title="คุณปิดไมโครโฟนผู้ใช้ท่านนี้ไว้" class="fa-duotone fa-microphone-slash"
            // style="--fa-primary-color: #1319b9; --fa-secondary-color: #000000; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;"></i>`;
        } else {
            type_mode = "unmute";

            if (!agoraEngine['localTracks'][1]['enabled']) {
                document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `
                <div class="icon-wrapper">
                    <i class="fa-duotone fa-microphone-slash"
                    style="--fa-primary-color: #e60000; --fa-secondary-color: #fff; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i>
                </div>`;

                } else {
                document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `<div class="icon-wrapper"><i class="fa-solid fa-microphone" style="color: #fff; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i></div>`;
            }
        }
    }

    function check_and_switch_icon_remote(user_id , type , value ){
        let type_user = "remote";
        let type_mode;
        if (value == 0) { // ถ้า value ตัวปรับเสียง ของ remote คนนี้ เป็น 0
            type_mode = "mute";

            document.querySelector('#icon_mic_remote_in_sidebar_'+user_id).innerHTML = `
            <div class="icon-wrapper">
                <i title="คุณปิดไมโครโฟนผู้ใช้ท่านนี้ไว้" class="fa-duotone fa-volume-xmark"
                style="--fa-primary-color: #fff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;"
                onclick="instant_switch_icon('remote', ${user_id}, '${type_mode}')"></i>
            </div>`;

        } else {
            type_mode = "unmute";

            if (type == "open") {
                document.querySelector('#icon_mic_remote_in_sidebar_'+user_id).innerHTML = `<div class="icon-wrapper"><i class="fa-solid fa-microphone" style="color: #fff; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('remote', ${user_id}, '${type_mode}')"></i></div>`;
            } else {
                document.querySelector('#icon_mic_remote_in_sidebar_'+user_id).innerHTML = `<div class="icon-wrapper"><i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #e60000; --fa-secondary-color: #fff; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('remote', ${user_id}, '${type_mode}')"></i></div>`;
            }
        }
    }

    function instant_switch_icon(type_user , user_id , type_mode ){
        if (type_user == "local") {

            if (type_mode == "unmute") {

                document.querySelector('#localAudioVolume').value = 0;
                type_mode = "mute";

                let value_slider = document.querySelector('#localAudioVolume').value;

                if (!agoraEngine['localTracks'][1]['enabled']) {
                    localStorage.setItem('local_sos_1669_rangeValue', value_slider);
                }else{
                    channelParameters.localAudioTrack.setVolume(parseInt(value_slider));
                }

                document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `<div class="icon-wrapper"><i title="คุณปิดไมโครโฟนผู้ใช้ท่านนี้ไว้" class="fa-duotone fa-volume-xmark"
                style="--fa-primary-color: #fff; --fa-secondary-color: #ff0000; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i></div>`;

            } else {
                document.querySelector('#localAudioVolume').value = 100;
                type_mode = "unmute";

                let value_slider = document.querySelector('#localAudioVolume').value;

                if (!agoraEngine['localTracks'][1]['enabled']) {

                    localStorage.setItem('local_sos_1669_rangeValue', value_slider);

                    document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `<div class="icon-wrapper"><i class="fa-duotone fa-microphone-slash"
                    style="--fa-primary-color: #e60000; --fa-secondary-color: #fff; --fa-secondary-opacity: 1; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i></div>`;
                } else {

                    channelParameters.localAudioTrack.setVolume(parseInt(value_slider));

                    document.querySelector("#icon_mic_local_in_sidebar").innerHTML = `<div class="icon-wrapper"><i class="fa-solid fa-microphone" style="color: #fff; display: inline-block; z-index: 6; font-size: 44px;" onclick="instant_switch_icon('local', ${user_id}, '${type_mode}')"></i></div>`;
                }
            }

        } else {

            if (type_mode == "unmute") {
                // console.log("instant_switch_icon remote if");
                // console.log(user_id);

                document.querySelector('#remoteAudioVolume_'+user_id).value = 0;
                type_mode = "mute";

                let value_slider = document.querySelector('#remoteAudioVolume_'+user_id).value;

                onChangeVolumeRemote(user_id , value_slider);
            } else {
                // console.log("instant_switch_icon remote else");
                // console.log(user_id);
                document.querySelector('#remoteAudioVolume_'+user_id).value = 70;
                type_mode = "unmute";

                let value_slider = document.querySelector('#remoteAudioVolume_'+user_id).value;

                onChangeVolumeRemote(user_id , value_slider);
            }
        }
    }

    function createAndAttachCustomDiv() {
		let randomColor = getRandomColor();
		let newDiv = document.createElement("div");
		newDiv.className = "custom-div";
		newDiv.style.backgroundColor = randomColor;

		// เพิ่ม div ด้านใน
		let statusInputOutputDiv = document.createElement("div");
		statusInputOutputDiv.className = "status-input-output";

		let micDiv = document.createElement("div");
		micDiv.className = "mic";
		micDiv.innerHTML = '<i class="fa-duotone fa-microphone"></i>';

		let cameraDiv = document.createElement("div");
		cameraDiv.className = "camera";
		cameraDiv.innerHTML = '<i class="fa-solid fa-video"></i>';

		statusInputOutputDiv.appendChild(micDiv);
		statusInputOutputDiv.appendChild(cameraDiv);

		let infomationUserDiv = document.createElement("div");
		infomationUserDiv.className = "infomation-user";

		let nameUserVideoCallDiv = document.createElement("div");
		nameUserVideoCallDiv.className = "name-user-video-call";
		nameUserVideoCallDiv.innerHTML = '<h5 class="m-0 text-white float-end"><b>lucky</b></h5>';

		let roleUserVideoCallDiv = document.createElement("div");
		roleUserVideoCallDiv.className = "role-user-video-call";
		roleUserVideoCallDiv.innerHTML = '<small class="d-block">ศูนย์สั่งการ</small>';

		infomationUserDiv.appendChild(nameUserVideoCallDiv);
		infomationUserDiv.appendChild(roleUserVideoCallDiv);

		// เพิ่ม div ด้านในลงใน div หลัก
		newDiv.appendChild(statusInputOutputDiv);
		newDiv.appendChild(infomationUserDiv);

		// เพิ่ม event listener สำหรับการคลิก
		newDiv.addEventListener("click", function() {
			handleClick(newDiv);
		});

		let userVideoCallBar = document.querySelector(".user-video-call-bar");
		let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

		if (customDivsInUserVideoCallBar.length > 0) {
			userVideoCallBar.appendChild(newDiv);

            let infomationUser = newDiv.querySelector(".infomation-user");
                    if (infomationUser) {
                        // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
                        infomationUser.classList.add("d-none");
                    }
		} else {
			document.getElementById("container_user_video_call").appendChild(newDiv);
		}

		checkchild();
	}

</script>

<script>
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
</script>

<script>
    window.addEventListener('beforeunload', function(event) {
       if (leaveChannel == "false") {
           // leaveChannel();
           fetch("{{ url('/') }}/api/left_room_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id +"&meet_2_people=beforeunload"+"&leave=beforeunload")
               .then(response => response.text())
               .then(result => {
                   // console.log(result);
                //    console.log("left_and_update สำเร็จ");
                   leaveChannel = "true";
           })
           .catch(error => {
               console.log("บันทึกข้อมูล left_and_update ล้มเหลว :" + error);
           });
       }
   });
</script>






