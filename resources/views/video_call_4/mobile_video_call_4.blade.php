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
	.status-input-output .camera {
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
		background-color: #f5b905;
		font-size: 40px;
        font-weight: bold;
		border-radius: 20px;
		height: 100%;
		display: flex;
		align-items: center;
        justify-content:  center;
		margin: 1rem;
		padding: 1rem;
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
		/* background-color: #f0f0f0; */
		opacity: 0;
		/* text-align: center; */
		overflow: auto;
		transition: opacity 0.5s, max-height 0.5s;
        background-color: #f3f5fa;
        border-radius: 5px;
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
        width: 25px; /* ปรับขนาดตามที่คุณต้องการ */
        height: 25px; /* ปรับขนาดตามที่คุณต้องการ */
        position: absolute;
        bottom: 10;
        right: 10;
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
        font-size: 10px;
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
        bottom: 100; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 10;
        background-color: #3f3e3e;
        border-radius: 5px;
        z-index: 1000; /* เพื่อให้แสดงอยู่ข้างบนของปุ่ม */
        min-width: 250px; /* กำหนดความกว้างขั้นต่ำ */

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
    /* ----------------- End ตัว loading animation ----------------- */
    /* .advice_text{
        background-color: rgba(99, 90, 90, 0);
        color: #ffffff;
        font-size: 3rem;
        position: absolute;
        bottom: 1;
        padding: 1rem;
    } */
    .advice_text {
        background-color: rgba(99, 90, 90, 0);
        color: #ffffff;
        font-size: 3rem;
        position: absolute;
        bottom: 2;
        left: 0;
        right: 0;
        padding: 1rem;
        text-align: center; /* ตั้งค่าการจัดวางข้อความในกลาง */
    }
</style>

<button id="join" class="btn btn-success d-none" >เข้าร่วม</button>

<div class="row full-height">

    <div class="d-flex justify-content-center align-items-center">
        <div id="lds-ring" class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>

	{{-- <div class="Scenary"></div> --}}
	<div class="col-12" style="height: 10%;">
		<div class="status-case-bar text-center">
			<p class="font-30">สถานะ : {{$sos_data->status ? $sos_data->status : "--"}} <br> เวลาห้องสนทนา : -- </p>
			<button class="btn btn-success" id="fadeButton"><i class="fa-solid fa-file-invoice" style="font-size: 45px;"></i></button>
		</div>
	</div>
	<div class="col-12" style="height: 70%; ">
		<div class="d-flex h-100 row">
			<div style="position: relative;" class="video-call">
				<div class=" d-flex align-item-center justify-content-center h-100 row">
					<div class="d-flex align-self-center justify-content-center mb-3">
						<div class="row mb-4" id="container_user_video_call">
						</div>
					</div>
				</div>
                <div id="adive_text_video_call" class="advice_text d-block text-center mt-1">
                    <!-- ใส่ ข้อความที่มาจาก javascript -->
                </div>
			</div>
		</div>
	</div>
    <div class="col-12 pt-3" style="height: 11%;  background-color: #2b2d31;">
        <div class="w-100 user-video-call-contrainer d-none " >
			<div class="d-flex justify-content-center align-self-end d-non user-video-call-bar mb-2" >
			</div>
		</div>
    </div>
	<div class="col-12" style="height: 9%; background-color: #ffffff; ">
		<div class="btn-video-call-container mt-2">
			<div class="row d-flex justify-content-center" >

                <!-- เปลี่ยนไมค์ ให้กดได้แค่ในคอม -->
                <div id="div_for_AudioButton" class="btn btnSpecial">
                    {{-- <i id="icon_muteAudio" class="fa-solid fa-microphone-stand"></i> --}}
                    {{-- <button class="smallCircle" id="btn_switchMicrophone">
                        <i class="fa-sharp fa-solid fa-angle-up"></i>
                    </button> --}}
                </div>

                <!-- เปลี่ยนกล้อง ให้กดได้แค่ในคอม -->
                <div id="div_for_VideoButton" class="btn btnSpecial">
                    {{-- <i id="icon_muteVideo" class="fa-solid fa-camera-rotate"></i> --}}
                </div>

                <div class="btn btnSpecial btnSpecial_switch" id="btn_switchCamera">
                    <i class="fa-duotone fa-camera-rotate" style="--fa-primary-color: #26076e; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>
                </div>

                <div class="btn btnSpecial btn_leave" id="addButton">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                </div>



                <div class="btn btnSpecial btn_leave" id="leave">
                    <i class="fa-solid fa-phone-xmark" style="color: #ffffff;"></i>
                </div>

			</div>
		</div>
	</div>
</div>

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

<div class="fadeDiv" id="dataDiv" style="display: none; z-index: 5000;">
	<div class="card m-4 text-dark">
		<div class="head_sidebar_div p-4 text-center">
			{{-- <h1>2308-1406-0014</h1>
			<h1>สถานะ : เสร็จสิ้น</h1> --}}
            <p class="h1 text-dark font-weight-bold">{{$sos_data->operating_code ? $sos_data->operating_code : "--"}}</p>
            <p class="h1 text-dark ">สถานะ:
                @php
                    switch ($sos_data->status) {
                        case 'เสร็จสิ้น':
                            $color_text_status = "text-success";
                            break;
                        case 'รับแจ้งเหตุ':
                            $color_text_status = "text-danger";
                            break;
                        case 'กำลังดำเนินการ':
                            $color_text_status = "text-warning";
                            break;
                        case 'รอการยืนยัน':
                            $color_text_status = "text-warning";
                            break;
                        case 'ถึงที่เกิดเหตุ':
                            $color_text_status = "text-warning";
                            break;
                        case 'ออกจากฐาน':
                            $color_text_status = "text-warning";
                            break;
                        default:
                            $color_text_status = "text-secondary";
                            break;
                    }
                @endphp
                <a class="{{$color_text_status}} font-weight-bold">{{$sos_data->status ? $sos_data->status : "--"}}</a>
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

            <p class="h2 text-secondary mt-2">การช่วยเหลือผ่านไปแล้ว</p>

            @if (!empty($sos_data_time_unit))
                <p class="h1 text-dark font-weight-bold">{{$sos_data_time_unit}}</p>
            @else
                <p class="h1 text-dark font-weight-bold"> -- </p>
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
			<p style="font-size: 45px;" class="font-weight-bold text-dark">{{$sos_data->name_user ? $sos_data->name_user : "--"}} {{$sos_data->phone_user ? $sos_data->phone_user : "--"}}</p>
		</div>
	</div>

	<div class="card m-4">
		<div class="body_sidebar_div p-4 text-center">
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


{{-- <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Agora_Web_SDK_FULL/AgoraRTC_N-4.17.0.js') }}"></script>

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
    //สำหรับกำหนด text advice
    var type_advice = "inc";
    // เรียกสองอันเพราะไม่อยากไปยุ่งกับโค้ดเก่า
    var user_id = '{{ Auth::user()->id }}';
    var user_data = @json(Auth::user());

    var appId = sessionStorage.getItem('agora_app_id');
    var appCertificate = sessionStorage.getItem('agora_app_certificate');

    // var encodedData_appId = localStorage.getItem("agora_app_id");
    // var encodedData_appCertificate = localStorage.getItem("agora_app_certificate");

    // console.log("Session HERE");
    // console.log(encodedData_appId);
    // console.log(encodedData_appCertificate);

    // var appId = atob(encodedData_appId);
    // var appCertificate = atob(encodedData_appCertificate);

    // console.log("Session HERE");
    // console.log(appId);
    // console.log(appCertificate);

    var sos_1669_id = '{{ $sos_id }}';

    var remote_in_room = [];

    // while (appId.length === 0 || appCertificate.length === 0) {
    //     appId = '{{ env("AGORA_APP_ID") }}';
    //     appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';
    //     console.log("เข้า while หา appId and appCertificate");
    // }

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

                name_local = result.name_user;
                type_local = result.user_type;

                // changeBgColor(bg_local);

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
        // const btn_switchMicrophone = document.querySelector('#btn_switchMicrophone');

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

        function SoundTest() {
            agoraEngine.on("volume-indicator", volumes => {
                volumes.forEach((volume) => {
                    // console.log("in to SoundCheck Local");
                    let localAudioTrackCheck = channelParameters.localAudioTrack;

                    if (localPlayerContainer.id == volume.uid && volume.level >= 50) {
                        //ถ้า localAudioTrackCheck เป็นค่าเก่า ให้แทนที่ด้วยค่าใหม่
                        // if (localAudioTrackCheck !== channelParameters.localAudioTrack) {
                        //     localAudioTrackCheck = channelParameters.localAudioTrack;
                        // }
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
        }
        SoundTest();

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
                let name_remote;
                let type_remote;
                fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid)
                    .then(response => response.json())
                    .then(result => {
                        // console.log("result published ---");
                        // console.log(result);

                        bg_remote = result.hexcolor;
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
                    let type_remote_user_unpublished;
                    let profile_remote_user_unpublished;
                    let hexcolor;
                    fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + user.uid)
                        .then(response => response.json())
                        .then(result => {
                            // console.log("result");
                            // console.log(result);
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
        agoraEngine.on("user-joined", function (evt)
        {

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
                            let type_remote_user_joined;
                            let profile_remote_user_joined;
                            let hexcolor;
                            fetch("{{ url('/') }}/api/get_remote_data_4" + "?user_id=" + dummy_remote.uid)
                                .then(response => response.json())
                                .then(result => {
                                    // console.log("result");
                                    // console.log(result);
                                    name_remote_user_joined = result.name_user;
                                    type_remote_user_joined = result.user_type
                                    hexcolor = result.hexcolor;
                                    if(result.photo){
                                        profile_remote_user_joined = "{{ url('/storage') }}" + "/" + result.photo;
                                    }else if(!result.photo && result.avatar){
                                        profile_remote_user_joined = result.avatar;
                                    }else{
                                        profile_remote_user_joined = "https://www.viicheck.com/Medilab/img/icon.png";
                                    }

                                    create_dummy_videoTrack(dummy_remote ,name_remote_user_joined ,type_remote_user_joined ,profile_remote_user_joined ,hexcolor);
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
        agoraEngine.on("user-left", function (evt)
        {

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
                    if(useMicrophone){
                        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                            {
                                encoderConfig: "high_quality_stereo",
                                microphoneId: useMicrophone
                            }
                        );
                    }else{
                        channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                            {
                                encoderConfig: "high_quality_stereo",
                            }
                        );
                    }

                    // Publish the local audio tracks in the channel.
                    await agoraEngine.publish([channelParameters.localAudioTrack]);

                    console.log('หาไมโครโฟน สำเร็จ');
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างไมโครโฟน
                    console.error('ไม่สามารถสร้างไมโครโฟนหรือไม่พบไมโครโฟน', error);

                    try { // เข้าใหม่ในสถานะปิดไมโครโฟนแทน
                        if(useMicrophone){
                            channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                {
                                    encoderConfig: "high_quality_stereo",
                                    microphoneId: useMicrophone
                                }
                            );
                        }else{
                            channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                {
                                    encoderConfig: "high_quality_stereo",
                                }
                            );
                        }
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
                    if(useCamera){
                        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                            {
                                cameraId: useCamera,
                                optimizationMode: "detail",
                                encoderConfig:
                                {
                                    width: 640,
                                    // Specify a value range and an ideal value
                                    height: { ideal: 480, min: 400, max: 500 },
                                    frameRate: 15,
                                    bitrateMin: 600, bitrateMax: 1000,
                                },
                            }
                        );
                    }else{
                        channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                            {
                                optimizationMode: "detail",
                                encoderConfig:
                                {
                                    width: 640,
                                    // Specify a value range and an ideal value
                                    height: { ideal: 480, min: 400, max: 500 },
                                    frameRate: 15,
                                    bitrateMin: 600, bitrateMax: 1000,
                                },
                            }
                        );
                    }

                    // Publish the local audio and video tracks in the channel.
                    await agoraEngine.publish([channelParameters.localVideoTrack]);
                } catch (error) {
                    // ในกรณีที่เกิดข้อผิดพลาดในการสร้างกล้อง
                    console.error('ไม่สามารถสร้างกล้องหรือไม่พบกล้อง', error);

                    setTimeout(() => {
                        alert('ไม่สามารถโหลดข้อมูลกล้องได้ กรุณารีเฟรชหน้าจอ');
                    }, 2000);

                }

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
                        console.log(bg_local);
                        // changeBgColor(bg_local);
                    }
                });

                //ถ้ากดปุ่ม muteVideo แล้วกล้องอยู่ในสถานะปิด ให้เปลี่ยนสี bg ของ local
                document.querySelector('#muteAudio').addEventListener("click", function(e) {
                    if (isAudio == true) {
                        SoundTest();
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
        // var activeAudioOutputDeviceId
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
                encoderConfig: "high_quality_stereo",
                microphoneId: selectedAudioDeviceId
            })
            .then(newAudioTrack => {
                console.log('newAudioTrack');
                console.log(newAudioTrack);
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

            // ---------------------------

            if (deviceType !== 'PC'){
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

            if (isVideo == false) {
                setTimeout(() => {
                    console.log("bg_local ddddddddddddddddddddddd");
                    // changeBgColor(bg_local);
                }, 50);
            }
        }

        // btn_switchMicrophone.onclick = async function()
        // {
        //     console.log('btn_switchMicrophone');

        //     console.log('activeAudioDeviceId');
        //     console.log(activeAudioDeviceId);

        //     // เรียกใช้ฟังก์ชันและแสดงผลลัพธ์
        //     let deviceType = checkDeviceType();
        //     console.log("Device Type:", deviceType);

        //     // เรียกดูอุปกรณ์ทั้งหมด
        //     let devices = await navigator.mediaDevices.enumerateDevices();

        //     // เรียกดูอุปกรณ์ที่ใช้อยู่
        //     let stream = await navigator.mediaDevices.getUserMedia({
        //         audio: true,
        //         video: true
        //     });

        //     // แยกอุปกรณ์ตามประเภท --> ไมโครโฟน
        //     let audioDevices = devices.filter(device => device.kind === 'audioinput');
        //     // แยกอุปกรณ์ตามประเภท --> ลำโพง
        //     let audioOutputDevices = devices.filter(device => device.kind === 'audiooutput');

        //     console.log('------- audioDevices -------');
        //     console.log(audioDevices);
        //     console.log('length ==>> ' + audioDevices.length);
        //     console.log('------- ------- -------');

        //     // สร้างรายการอุปกรณ์ส่งข้อมูลและเพิ่มลงในรายการ
        //     let audioDeviceList = document.getElementById('audio-device-list');
        //         audioDeviceList.innerHTML = '';
        //     let deviceText = document.createElement('li');
        //         deviceText.classList.add('text-center','p-1','text-white');
        //         deviceText.appendChild(document.createTextNode("อุปกรณ์รับข้อมูล"));

        //         audioDeviceList.appendChild(deviceText);
        //     // let audiooutputDeviceList = document.getElementById('audio-device-output-list');
        //     //     audiooutputDeviceList.innerHTML = '';

        //     let count_i = 1 ;
        //     let count_i_output = 1 ;
        //     // ----------- Input ----------------
        //     audioDevices.forEach(device => {
        //         const radio2 = document.createElement('input');
        //             radio2.type = 'radio';
        //             radio2.classList.add('radio_style');
        //             radio2.id = 'audio-device-' + count_i;
        //             radio2.name = 'audio-device';
        //             radio2.value = device.deviceId;

        //         if (deviceType == 'PC'){
        //             radio2.checked = device.deviceId === activeAudioDeviceId;
        //         }


        //         let label = document.createElement('li');
        //             label.classList.add('ui-list-item');
        //             label.appendChild(document.createTextNode(device.label || `อุปกรณ์รับข้อมูล ${audioDeviceList.children.length + 1}`));
        //             label.appendChild(document.createTextNode("\u00A0")); // เพิ่ม non-breaking space
        //             label.appendChild(radio2);

        //             // สร้างเหตุการณ์คลิกที่ label เพื่อตรวจสอบ radio2
        //             label.addEventListener('click', () => {
        //                 radio2.checked = true;
        //                 onChangeAudioDevice();
        //             });


        //         audioDeviceList.appendChild(label);
        //         radio2.addEventListener('change', onChangeAudioDevice);

        //         count_i = count_i + 1 ;
        //     });

        //     // let hr = document.createElement('hr');
        //     // audioDeviceList.appendChild(hr);

        //     // ----------- Output ----------------
        //     // audioOutputDevices.forEach(device => {
        //     // const radio3 = document.createElement('input');
        //     //     radio3.type = 'radio';
        //     //     radio3.id = 'audio-device-output-' + count_i_output;
        //     //     radio3.name = 'audio-device-output';
        //     //     radio3.value = device.deviceId;

        //     // if (deviceType == 'PC'){
        //     //     radio3.checked = device.deviceId === activeAudioOutputDeviceId;
        //     // }

        //     // let label_output = document.createElement('label');
        //     //     label_output.classList.add('dropdown-item');
        //     //     label_output.appendChild(radio3);
        //     //     label_output.appendChild(document.createTextNode(device.label || `อุปกรณ์ส่งข้อมูล ${audioDeviceList.children.length + 1}`));

        //     // audiooutputDeviceList.appendChild(label_output);
        //     // radio3.addEventListener('change', onChangeAudioOutputDevice);

        //     // count_i_output = count_i_output + 1 ;
        //     // });

        //     // ---------------------------7

        //     // เพิ่มเหตุการณ์คลิกที่หน้าจอที่ไม่ใช่ตัว audio-device-list ให้ปิด audio-device-list
        //     // document.addEventListener('click', (event) => {
        //     //     const target = event.target;

        //     //     if (!target.closest('#audio-device-list')) {
        //     //        document.querySelector('.dropcontent').classList.toggle('open');
        //     //     }
        //     // });

        // }

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

        // สำหรับเปลี่ยนสีพื้นหลังของ local หลังจากกดเปลี่ยนกล้อง
        // btn_switchCamera.onclick = async function(){
        //     if (isVideo == false) {
        //             console.log("bg_local ddddddddddddddddddddddd");
        //             changeBgColor(bg_local);
        //     }
        // };

    }
</script>

<script>
	const fadeButton = document.getElementById("fadeButton");
	const dataDiv = document.getElementById("dataDiv");

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
		} else {
			document.getElementById("container_user_video_call").appendChild(newDiv);
		}

		checkchild();
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
                    if (!isInUserVideoCallBar(div)) {
                        userVideoCallBar.appendChild(div);
                    }
                }
            });

            // ย้าย div ที่ถูกคลิกไปยังตำแหน่งที่ถูกคลิก
            if (!isInUserVideoCallBar(clickedDiv)) {
                container.appendChild(clickedDiv);
            }
            // document.querySelector(".btn-video-call-container").classList.add("d-none");

            type_advice = "dec";
            showTextAdvice(type_advice);
            console.log(type_advice);
        }else{
            type_advice = "inc";
            showTextAdvice(type_advice);
            console.log(type_advice);
        }
	}

	// สลับ div ระหว่าง .user-video-call-bar และ #container_user_video_call
	function swapDivsInContainerAndUserVideoCallBar(clickedDiv) {
		let container = document.getElementById("container_user_video_call");
		let customDivsInContainer = container.querySelectorAll(".custom-div");
		let userVideoCallBar = document.querySelector(".user-video-call-bar");
		let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

		if (customDivsInContainer.length > 0 && customDivsInUserVideoCallBar.length > 0) {
			let firstDivInContainer = customDivsInContainer[0];

			container.appendChild(clickedDiv);
			userVideoCallBar.appendChild(firstDivInContainer);
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

		document.querySelector(".btn-video-call-container").classList.remove("d-none");

        type_advice = "inc";
        showTextAdvice(type_advice);
        console.log(type_advice);

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
	document.getElementById("addButton").addEventListener("click", createAndAttachCustomDiv);

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

        if(isVideo == false){
            let videoInsideAgoraCreateLocal = agoraCreateLocalDiv.querySelectorAll("video");
                videoInsideAgoraCreateLocal.forEach(function(video) {
                    video.remove();
            });
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
                channelParameters.localAudioTrack.play();
                // เปลี่ยน icon microphone ให้เป็นเปิด ใน divVideo_
                document.getElementById(`mic_local`).innerHTML = '<i class="fa-solid fa-microphone"></i>';

                isAudio = true;
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
                document.querySelector('.profile-input-output').classList.remove('d-none');

                // changeBgColor(bg_local);

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
                document.querySelector('.profile-input-output').classList.add('d-none');

                isVideo = true;

                if(document.querySelector('.imgdivLocal')){
                    document.querySelector('.imgdivLocal').remove();
                }
            }
        }

    }

    // สำหรับ Div ต่างๆของ Local
    function create_element_localvideo_call(localPlayerContainer ,name_local ,type_local ,profile_local, bg_local) {
        if(localPlayerContainer.id){
            console.log("name_local here");
            console.log(name_local);
            console.log(type_local);
            console.log(bg_local);
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
                ProfileInputOutputDiv.className = "profile-input-output";
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
                console.log(id_agora_create);
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
            console.log("remotePlayerContainer");
            console.log(remotePlayerContainer);

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
                } else {
                    container_user_video_call.append(divVideo_New);
                }
            }

            // คลิ๊ก div ให้เปลี่ยนขนาด
            divVideo_New.addEventListener("click", function() {
                handleClick(divVideo_New);
            });

            remotePlayerContainer.addEventListener("click", function() {
                console.log("remotePlayerContainer Click ---->");
                let id_agora_create = remotePlayerContainer.id;
                console.log(id_agora_create);
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
            divVideo_New.setAttribute('id','videoDiv_' + user.uid.toString());
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
                statusMicrophoneOutput.id = "statusMicrophoneOutput_remote_" + user.uid.toString();
                statusMicrophoneOutput.className = "status-sound-output d-none";
                statusMicrophoneOutput.setAttribute('style','z-index: 1;');

            let soundDiv = document.createElement("div");
                soundDiv.id = "sound_remote_" + user.uid.toString();
                soundDiv.className = "sound";
                soundDiv.innerHTML = '<i class="fa-sharp fa-solid fa-volume fa-beat-fade" style="color: #ffffff;"></i>';

            statusMicrophoneOutput.appendChild(soundDiv);

            // เพิ่มแท็ก ไมค์และกล้อง
            let statusInputOutputDiv = document.createElement("div");
                statusInputOutputDiv.className = "status-input-output";
                statusInputOutputDiv.setAttribute('style','z-index: 1;');

            let micDiv = document.createElement("div");
                micDiv.id = "mic_remote_"+ user.uid.toString();
                micDiv.className = "mic";
                if(user.hasAudio == false){
                    micDiv.innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #f00505; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                }else{
                    micDiv.innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }

            let cameraDiv = document.createElement("div");
                cameraDiv.id = "camera_remote_"+ user.uid.toString();
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
            if(document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString())) {
                document.getElementById('dummy_trackRemoteDiv_' + user.uid.toString()).remove();
            }

            //เพิ่มแท็กวิดีโอที่มีพื้นหลังแค่สีดำ
            // const remote_video_call = document.getElementById(user.uid.toString());
            closeVideoHTML  =
                            ' <div id="dummy_trackRemoteDiv_'+ user.uid.toString() +'" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: '+bg_remote+';">' +
                                '<video class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; object-fit: cover;"></video>' +
                            '</div>' ;

            divVideo_New.insertAdjacentHTML('beforeend',closeVideoHTML); // แทรกล่างสุด

            // หา div เดิมที่ต้องการแทนที่
            let oldDiv = document.getElementById("videoDiv_"+ user.uid.toString());

            let userVideoCallBar = document.querySelector(".user-video-call-bar");
            let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
            let container_user_video_call = document.querySelector("#container_user_video_call");
            console.log("customDivsInUserVideoCallBar.length in Dummy = "+ customDivsInUserVideoCallBar.length);

            // ตรวจสอบว่าเจอ div เดิมหรือไม่

            if (oldDiv) {
                // ใช้ parentNode.replaceChild() เพื่อแทนที่ div เดิมด้วย div ใหม่
                oldDiv.parentNode.replaceChild(divVideo_New, oldDiv);
            } else {
                if (customDivsInUserVideoCallBar.length > 0) {
                    userVideoCallBar.append(divVideo_New);
                } else {
                    container_user_video_call.append(divVideo_New);
                }
            }

            divVideo_New.addEventListener("click", function() {
                handleClick(divVideo_New);
            });

            transparentDiv.addEventListener("click", function() {

                let id_agora_create = user.uid.toString();
                console.log(id_agora_create);
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
