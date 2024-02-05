<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
{{-- <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<style>
	/* html,
	body,
	.full-height,
	.page-content,
	.wrapper {
		height: 100%;
		min-height: calc(100%) !important;
        max-height: calc(100%) !important;
        padding-bottom: 0;

		margin-bottom: 0;
	} */

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
        border-radius: 5px;
		margin: 0;
		background-color: #898f9b;
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

		/* padding: 1px 3rem; */
		/* display: flex;
		flex-wrap: wrap;
		justify-content: center; */
	}

	#container_user_video_call .custom-div {
		/* aspect-ratio: 16/9; */
		width: 100%;
		outline: #000 1px solid;
		border-radius: 5px;
		position: relative;
		/* margin: 1rem; */
	}

	#container_user_video_call .custom-div:first-child {
        /* ครอบคลุมทั้งหน้าจอ */
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
    }

    #container_user_video_call .custom-div:nth-child(2) {
        /* ตั้งอยู่ที่มุมบนซ้ายและมีขนาดเล็กลง */
        position: absolute;
        width: 30%; /* หรือขนาดที่คุณต้องการ */
        height: 30%; /* หรือขนาดที่คุณต้องการ */
        top: 1%;
        left: 1%;
        z-index: 5;
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

    .agora_create_local div {
        border-radius: 5px;
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
		top: 0.2rem;
		right: 0.5rem;
		display: flex;
	}

    .custom-div .status-sound-output{
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
    }

	.custom-div .infomation-user {
        display: none;
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
        font-size: 20px !important;
	}

    /* ปรับขนาดเมื่ออยู่ใน .custom-div:nth-child(2) */
    .custom-div:nth-child(2) .status-input-output .mic,
    .custom-div:nth-child(2) .status-input-output .camera,
    .custom-div:nth-child(2) .status-sound-output .sound{
        font-size: 1em !important; /* หรือ % ของขนาดปกติ */
        padding: .3em .6em .3em !important; /* หรือ % ของขนาดปกติ */
        margin: 3px !important; /* หรือ % ของขนาดปกติ */
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
        width: 10px;
        height: 10px;
        border-radius: 50%; /* คงรูปร่างวงกลม */
        object-fit: cover;
        pointer-events: none;
    }

    #container_user_video_call div div .profile_image{ /* ของ container ใหญ่ */
        width: 80px;
        height: 80px;
        border-radius: 50%; /* คงรูปร่างวงกลม */
        object-fit: cover;
        pointer-events: none;
    }

    #container_user_video_call .custom-div:nth-child(2) div .profile_image{ /* ของ container ใหญ่ */
        width: 40px !important;
        height: 40px !important;
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
        background-color: #ff0000 ; /* Discord's color */
    }
    .btnSpecial_mute:hover{
        background-color: #fa3838 !important; /* Discord's color */
    }

    .btnSpecial_unmute{
        background-color: rgb(31, 193, 27) ; /* Discord's color */
    }

    .btnSpecial_unmute:hover{
        background-color: #28ee49 !important; /* Discord's color */
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
        width: 60px;
        height: 60px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin: 5px;
        top: 0; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 0;
        border:#000000 1px solid;
    }

    .audio_button{
        background: rgba(255, 255, 255, 0);
        position: absolute;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        border:#000000 1px;
    }

    .video_button{
        background: rgba(255, 255, 255, 0);
        position: absolute;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        border:#000000 1px;
    }

    .btnSpecial:hover {
        background-color: #292828; /* Discord's color */
    }


    .btnSpecial i{
        color: #ffffff;
        font-size: 1rem;
        margin: 0;
        transition: transform 0.3s ease; /* เพิ่มการเปลี่ยนแปลงอย่างนุ่มนวล */
    }

    .smallCircle {
        background-color: #3f3e3e; /* เปลี่ยนสีพื้นหลังตามที่คุณต้องการ */
        border: none;
        border-radius: 50%;
        width: 30px; /* ปรับขนาดตามที่คุณต้องการ */
        height: 30px; /* ปรับขนาดตามที่คุณต้องการ */
        position: absolute;
        /* bottom: 20;
        right: 20; */
        transform: translate(70%, 60%);
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
        font-size: 0.7em;
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
        /* left: 10%; */
        /* right: 0;
        top: 0; */
        background-color: #3f3e3e;
        border-radius: 5px;
        z-index: 9999; /* เพื่อให้แสดงอยู่ข้างบนของปุ่ม */
        min-width: 100%; /* กำหนดความกว้างขั้นต่ำ */

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
        font-size: 0.7em;
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
    /* #lds-ring {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
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
    } */
    /* ----------------- End ตัว loading animation ----------------- */

    /* ----------------- ตัว Popup แจ้งเตือน----------------- */
    .div_alert {
	    position: absolute;
	    top: -70px;
	    bottom: 0;
	    left: 10px;
	    width: 100%;
	    height: 100px;
	    text-align: center;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 18px;
        display: none; /* เริ่มต้นซ่อน .div_alert */
	}

	.div_alert span {
	    background-color: #009e6b;
	    border-radius: 10px;
	    color: white;
	    padding: 30px;
	    font-family: 'Kanit', sans-serif;
	    z-index: 9999;
	    font-size: 0.8em;
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

    .shadow_btn_call {
        position: relative;
        overflow: hidden;
        background-color: #29cc39 !important;
        color:#fff !important;
        box-shadow: 0 0 20px rgba(0, 255, 60, 0.5);
        z-index: 1;
    }

    .shadow_btn_call:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: scale(0);
        transform-origin: center;
        transition: transform 0.5s ease;
        z-index: -1;
    }

    .shadow_btn_call:before {
        transform: scale(1);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .shadow_btn_call {
        animation: pulse 1s infinite;
    }

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

    .video-body {
        position: relative;
        width: calc(100%);
    }

    .video-body-local {
        position: relative;
        width: calc(100%);
    }

    .video-call-in-room{
        background-color: #ffffff;
        color: green;
        animation: border-flash-danger 1.5s infinite;
    }

    .span_timer_video_call{
        position: relative;
        font-size: 1rem !important;
        background-color: rgb(206, 206, 206) !important;
        border-radius: 5px !important;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        position: relative;
        margin-bottom: 0; /* หรือใช้ padding-bottom: 0; */
    }

    .div_button_video_call{
        height: 80px;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
    }

    #power_bar {
        margin-top: 5px;
        position: absolute;
        bottom: -3px;
        left: 0;
        width: calc(100%); /* ให้ความกว้างเต็ม viewport width - 85% */
        height: 5px;
        background-color: #fd1e1e;
        border-radius: 2px;
    }

    #progress_indicator {
        height: 100%;
        width: 0;
        background-color: #6e89b4;
    }

</style>

    @php
        $user_in_room = '';

        if(!empty($agora_chat->member_in_room)){

            $data_member_in_room = $agora_chat->member_in_room;

            $data_array = json_decode($data_member_in_room, true);
            $check_user = $data_array;

            if( !empty($check_user) ){
                $user_in_room = App\User::where('id' , $check_user)->first();
            }

        }
    @endphp

    <div id="divVideoCall" class="video-body fade-slide overflow-hidden" style="display: none;">


        <div class="row ">
            <div class="col-12 " style="height: calc(100% - 90%);">
                <div class="row d-flex justify-content-center ">
                    <div class="row d-flex justify-content-around align-items-center mx-auto pt-1" >
                        <button id="command_join" class="btn btn-success d-non" style="width:75%;">
                            <i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; เริ่มต้นการสนทนา
                        </button>

                        <button id="btn_close_audio_ringtone" class="btn btn-secondary d-none" style="width:15%" onclick="mute_ringtone();">
                            <i class="fa-solid fa-volume-slash"></i>
                        </button>
                    </div>

                    <span id="span_timer_video_call" class="d-none span_timer_video_call" style="width:85%">
                        <span id="icon_timer_video_call" class="py-2">
                            <i class="fa-duotone fa-record-vinyl fa-beat-fade" style="--fa-secondary-color: #6e89b4;"></i>
                            &nbsp;&nbsp;เวลาสนทนา : <span id="time_of_room" >เริ่มนับเมื่อมีผู้ใช้ 2 คน</span>
                        </span>

                        <div id="power_bar" class="progress-bar progress-bar-striped progress-bar-animated bg-danger d-none">
                            <div id="progress_indicator"></div>
                        </div> <!-- เพิ่ม div สำหรับ progress bar -->
                    </span>
                </div>
            </div>

            <div class="col-12" style="height: 24rem; border: 0; width: 98%; margin: 1.5rem 0.2rem 0.2rem 0.2rem;">
                <div class="d-flex h-100 row m-1">
                    <div style="position: relative;" class="video-call">

                        <div id="show_when_video_no_active" style="position:absolute;top:50%;left: 50%;transform: translate(-50%, -50%);width:100%;display:flex;justify-content:center;">

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

                        <div style="object-fit: cover;" class="h-100 row">
                            <div class="d-flex align-self-center justify-content-center p-0 m-0">
                                <div class="row mb-4" id="container_user_video_call">
                                </div>
                            </div>
                        </div>
                        <div id="adive_text_video_call" class="advice_text d-block text-center">
                            <!-- ใส่ ข้อความที่มาจาก javascript -->
                        </div>
                    </div>
                </div>

                <div id="alert_warning" class="div_alert" role="alert">
                    <span id="alert_text">
                        <!-- ใช้ javascript กำหนด innerHTML-->
                    </span>
                </div>

            </div>
            <div class="col-12 pt-3 d-none delna" style="height: calc(100% - 89%); background-color: #0bb34b; border: 0;">
                <div class="w-100 user-video-call-contrainer d-none " >
                    <div class="d-flex justify-content-center align-self-end d-non user-video-call-bar mb-2" >
                    </div>
                </div>
            </div>
            <div class="col-12 div_button_video_call">
                <div class="btn-video-call-container mt-2 d-none">
                    <div class="d-flex justify-content-center" >

                        <!-- เปลี่ยนไมค์ ให้กดได้แค่ในคอม -->
                        <div id="div_for_AudioButton" class="btn btnSpecial">
                            {{-- <i id="icon_muteAudio" class="fa-solid fa-microphone-stand"></i> --}}
                            <button class="smallCircle" id="btn_switchMicrophone">
                                <i class="fa-sharp fa-solid fa-angle-up"></i>
                            </button>
                        </div>

                        <!-- เปลี่ยนกล้อง ให้กดได้แค่ในคอม -->
                        <div id="div_for_VideoButton" class="btn btnSpecial " >
                            {{-- <i id="icon_muteVideo" class="fa-solid fa-camera-rotate"></i> --}}
                            <button class="smallCircle" id="btn_switchCamera">
                                <i class="fa-sharp fa-solid fa-angle-up"></i>
                            </button>
                        </div>

                        {{-- @if (Auth::user()->id == 1 || Auth::user()->id == 2 || Auth::user()->id == 64 || Auth::user()->id == 11003429)
                            <div class="btn btnSpecial btnSpecial_switch d-none" id="btn_switchCamera">
                                <i class="fa-duotone fa-camera-rotate" style="--fa-primary-color: #26076e; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>
                            </div>
                        @endif --}}

                        <div class="btn btnSpecial btn_leave d-non" id="addButton">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                        {{-- <button class="btn btnSpecial " onclick="alertText()">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </button>
                        <script>
                            function alertText(){
                                document.querySelector('#alert_copy').classList.add('up_down');

                                const animated = document.querySelector('.up_down');
                                animated.onanimationend = () => {
                                    document.querySelector('#alert_copy').classList.remove('up_down');
                                };
                            }
                        </script> --}}

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

    </div>


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
    var isRemoteIconSound = false;

    // ใช้สำหรับ เช็คไม่ให้ฟังก์ชันออกห้องทำงานซ้ำ
    var leaveChannel;
    var name_dev;
    // เกี่ยวกับเวลาในห้อง
    var people_in_room = 0;
    var check_start_timer_video_call;
    // var hours = 0;
    // var minutes = 0;
    // var seconds = 0;
    var meet_2_people = 'No' ;

    //สำหรับกำหนด text advice
    var type_advice = "inc";
    // เรียกสองอันเพราะไม่อยากไปยุ่งกับโค้ดเก่า
    var user_id = '{{ Auth::user()->id }}';
    var user_data = @json(Auth::user());

    var command_screen_current;  //ใช้สำหรับกดหนดจอ command ถ้าจอใหญ่=1 จอเล็ก=2

    var sos_id = '{{ $sos_id }}';
    var type_video_call = '{{ $type }}';

    var appId = '{{ env("AGORA_APP_ID") }}';
    var appCertificate = '{{ env("AGORA_APP_CERTIFICATE") }}';

    var activeVideoDeviceId = "";
    var activeAudioDeviceId = "";

    document.addEventListener('DOMContentLoaded', (event) => {

        start_page();
    });

    function start_page(){
        console.log("start_page");

        // เรียกใช้ฟังก์ชันและจัดการกับผลลัพธ์
        getFirstCameraAndMic().then(({ cameraDeviceId, micDeviceId }) => {
            if (cameraDeviceId && micDeviceId) {
                activeVideoDeviceId = cameraDeviceId;
                activeAudioDeviceId = micDeviceId;

            } else {
                console.log('Camera or microphone not found');

                setTimeout(() => {
                    console.log('find devices again');
                    getFirstCameraAndMic();
                }, 1000);
            }
        });

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
                    document.querySelector('#command_join').setAttribute('style' , 'width: 75%;');
                    document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');

                    // document.querySelector('#btnVideoCall').click();

                    // play_ringtone();
                    loop_check_user_in_room();

                }else{
                    loop_check_user_in_room();
                }

            }, 1000);
        }
    }

    var audio_in_room = new Audio("{{ asset('sound/แจ้งเตือนก่อนหมดเวลาวิดีโอคอล.mp3') }}");
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
                                document.querySelector('#command_join').setAttribute('style' , 'width: 75%;');
                                document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');

                                // document.querySelector('#btnVideoCall').click();

                                // play_ringtone();
                                loop_check_user_in_room();

                            }else{
                                loop_check_user_in_room();
                            }

                        }, 1000);
                    }
            });

        }, 1000);
    }


//=================================================================================================

    function start_video_call_command(){

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

        function LoadingVideoCall() {
            // const loadingAnime = document.getElementById('lds-ring');

            setTimeout(() => {
                //หลังจากสร้าง localPlayerContainer เสร็จให้เอา animation loading ออก
                // if(loadingAnime){
                //     loadingAnime.classList.remove('d-none');
                // }
                fetch("{{ url('/') }}/api/video_call_4" + "?user_id=" + user_id + '&appCertificate=' + appCertificate  + '&appId=' + appId + '&type=' + type_video_call + '&sos_id=' + sos_id)
                    .then(response => response.json())
                    .then(result => {
                        console.log("GET Token success");
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
                                clearInterval(check_token_expire);
                                document.querySelector('#leave').click();
                            }
                        }

                        check_token_expire = setInterval(() => {
                            checkAndNotifyExpiration(expirationTimestamp);
                        }, 1000);

                        setTimeout(() => {
                            // document.getElementById("command_join").click();
                        }, 1000); // รอเวลา 1 วินาทีก่อนเรียกใช้งาน
                })
                .catch(error => {

                    // if(loadingAnime){
                    //     loadingAnime.classList.remove('d-none');
                    // }

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
    }

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
        let rtcStats = agoraEngine.getRTCStats();

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
        localPlayerContainer.style.borderRadius = "5px";
        localPlayerContainer.classList.add('agora_create_local');

        //======== ทุก 10 วิ ให้เช็คว่า div .custom-div ที่มี id ของคนที่ไม่ได้อยู่ในห้องนี้แล้ว --> ถ้าเจอให้ลบ div ทิ้ง =========
        function check_delele_leaved() {
            setInterval(() => {

                let customDivAll = document.querySelectorAll(".custom-div");
                let remoteUsers = agoraEngine['remoteUsers'];
                // console.log("เช็ค div ที่ไม่อยู่ในห้อง");
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
                                console.log("ลบ Div คนที่ไม่อยู่ในห้องแล้ว");
                            }
                        }
                    }
                });
            }, 10000);
        }
        check_delele_leaved();
        //=====================================================================================================


        function SoundTest() {
            // ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
            agoraEngine.enableAudioVolumeIndicator();

            let isIconVisible = false;
            agoraEngine.on("volume-indicator", volumes => {
                volumes.forEach((volume) => {
                    // console.log("in to SoundCheck Local");
                    let localAudioTrackCheck = channelParameters.localAudioTrack;

                    if (localPlayerContainer.id == volume.uid && volume.level >= 50) {
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
                        // if (!isIconVisible) {
                        //     document.querySelector('#statusMicrophoneOutput_local').classList.remove('d-none');
                        //     isIconVisible = true;
                        // }

                    } else {
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
                        // if (isIconVisible) {
                        //     document.querySelector('#statusMicrophoneOutput_local').classList.add('d-none');
                        //     isIconVisible = false;
                        // }

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

                //ตรวจจับเสียงพูดแล้ว สร้าง animation บนขอบ div
                agoraEngine.on("volume-indicator", volumes => {
                    volumes.forEach((volume, index) => {

                        if (channelParameters.remoteUid == volume.uid && volume.level >= 50) {
                            console.log(`${index} UID ${volume.uid} Level ${volume.level}`);
                            // console.log("Remote พูดแล้ว");
                            // if (!isRemoteIconSound) {
                            //     document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.remove('d-none');
                            //     isRemoteIconSound = true;
                            // }

                        } else if (channelParameters.remoteUid == volume.uid && volume.level < 50) {
                            console.log(`${index} UID ${volume.uid} Level ${volume.level}`);
                            // เลือก element ที่มี ID "statusMicrophoneOutput_remote_"
                            // if (isRemoteIconSound) {
                            //     document.querySelector('#statusMicrophoneOutput_remote_'+ channelParameters.remoteUid).classList.add('d-none');
                            //     isRemoteIconSound = false;
                            // }
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
                console.log('unpublished AudioTrack:');
                // console.log(channelParameters.localAudioTrack);

                // ถ้าไมค์ทำงานใน unpublished จะพบเมื่อผู้ใช้เข้ามาครั้งแรกแล้ว ปิดกล้อง แต่ เปิดไมค์
                if(user.hasAudio == true){
                    agoraEngine.on("volume-indicator", volumes => {
                        volumes.forEach((volume, index) => {
                            if (user['uid'] == volume.uid && volume.level > 50) {
                                console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                // if (!isRemoteIconSound) {
                                //     document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.remove('d-none');
                                //     isRemoteIconSound = true;
                                // }

                            } else if (user['uid'] == volume.uid && volume.level < 50) {
                                console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                // if (isRemoteIconSound) {
                                //     document.querySelector('#statusMicrophoneOutput_remote_'+user.uid.toString()).classList.add('d-none');
                                //     isRemoteIconSound = false;
                                // }


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

                                                    // if (!isRemoteIconSound) {
                                                    //     document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.remove('d-none');
                                                    //     isRemoteIconSound = true;
                                                    // }

                                                } else if (dummy_remote['uid'] == volume.uid && volume.level < 50) {
                                                    console.log(`Dummy_UID ${volume.uid} Level ${volume.level}`);

                                                    // if (isRemoteIconSound) {
                                                    //     document.querySelector('#statusMicrophoneOutput_remote_'+dummy_remote.uid).classList.add('d-none');
                                                    //     isRemoteIconSound = false;
                                                    // }

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

            fetch("{{ url('/') }}/api/check_status_room" + "?sos_id="+ sos_id + "&type=" + type_video_call)
                .then(response => response.json())
                .then(result => {

                let member_in_room = JSON.parse(result['member_in_room']);

                if(member_in_room.length >= 2){
                    if(check_start_timer_video_call == false){
                        start_timer_video_call();
                    }
                }
            });
        });

        // ออกจากห้อง
        agoraEngine.on("user-left", function (evt)
        {

            console.log("ไอดี : " + evt.uid + " ออกจากห้อง");

            command_screen_current = 1; //ถ้าอีกคนออกจากห้องสนทนา ปรับ command ไปเป็นจอใหญ่(divแรก)

            if(document.getElementById('videoDiv_' + evt.uid)) {
                document.getElementById('videoDiv_' + evt.uid).remove();
            }

            // เช็คว่ามี div .custom-div อยู่ใน div container_user_video_call
            let container = document.getElementById("container_user_video_call");
            let customDivs = container.querySelectorAll(".custom-div");
            //ถ้าไม่มีให้ ย้าย div ใน bar ข้างล่าง ขึ้นมาทั้งหมด
            if (customDivs.length == 0) {
                // moveAllDivsToContainer();
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
                        console.log("result check_status_room");
                        console.log(typeof result['member_in_room']);
                        console.log(result['member_in_room']);

                    let member_in_room = JSON.parse(result['member_in_room']);
                    // ถ้าผู้ใช้ เหลือ น้อยกว่า 2 คน ให้หยุดนับเวลา
                    if(member_in_room.length < 2){
                        console.log("member_in_room น้อยกว่า 2 --> user-left");
                        console.log(check_start_timer_video_call);
                        if(check_start_timer_video_call == true){
                            myStop_timer_video_call();
                        }
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

        // window.onload = function ()
        function afterJoin()
        {
            document.getElementById("command_join").onclick = async function (user_id)
            {

                try {
                    let response = await fetch("{{ url('/') }}/api/check_user_in_room_2" + "?sos_id=" + sos_id + "&type=user_sos_1669");
                    let result = await response.json();

                    if (result['status'] == "2_people") {
                        alert("จำนวนผู้ใช้ในห้องสนทนาสูงสุดแล้ว");
                    }else{
                        // Enable dual-stream mode.
                        // agoraEngine.enableDualStream();
                        console.log("channelParameters");
                        console.log(channelParameters);
                        command_screen_current = 1;

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
                                console.log("if หาไมโครโฟน");
                                channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack(
                                    {
                                        AEC: true, ANS: true,
                                        encoderConfig: "high_quality_stereo",
                                        microphoneId: useMicrophone
                                    }
                                );
                            }else{
                                console.log("else หาไมโครโฟน");

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
                                            AEC: true, ANS: true,
                                            encoderConfig: "high_quality_stereo",
                                            microphoneId: selectedMicrophone
                                        }
                                    );
                                } else {
                                    // ไม่พบไมโครโฟนที่ active
                                    console.error("ไม่พบไมโครโฟนที่ active");
                                    return;
                                }
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
                                            AEC: true, ANS: true,
                                            encoderConfig: "high_quality_stereo",
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
                                                AEC: true, ANS: true,
                                                encoderConfig: "high_quality_stereo",
                                                microphoneId: selectedMicrophone
                                            }
                                        );
                                    } else {
                                        // ไม่พบไมโครโฟนที่ active
                                        console.error("ไม่พบไมโครโฟนที่ active");
                                        return;
                                    }
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
                                console.log("if หากล้อง");
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
                                console.log("else หากล้อง");

                                // ดึงรายการกล้องทั้งหมด
                                const cameraDevices = await navigator.mediaDevices.enumerateDevices();
                                // เลือกกล้องที่ active (เช็ค kind เป็น 'videoinput')
                                const activeCameras = cameraDevices.filter(device => device.kind === 'videoinput' && device.deviceId !== 'default');

                                if (activeCameras.length > 0) {
                                    // เลือกกล้องล่าสุดที่ active
                                    const selectedCamera = activeCameras[activeCameras.length - 1].deviceId;

                                    // ใช้กล้องที่ถูกเลือก
                                    channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                                        {
                                            cameraId: selectedCamera,
                                            optimizationMode: "detail",
                                            encoderConfig:
                                            {
                                                width: 640,
                                                height: { ideal: 480, min: 400, max: 500 },
                                                frameRate: 15,
                                                bitrateMin: 600, bitrateMax: 1000,
                                            },
                                        }
                                    );
                                } else {
                                    // ไม่พบกล้องที่ active
                                    console.error("ไม่พบกล้องที่ active");
                                }

                                // console.log("else หากล้อง");
                                // channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack(
                                //     {
                                //         optimizationMode: "detail",
                                //         encoderConfig:
                                //         {
                                //             width: 640,
                                //             // Specify a value range and an ideal value
                                //             height: { ideal: 480, min: 400, max: 500 },
                                //             frameRate: 15,
                                //             bitrateMin: 600, bitrateMax: 1000,
                                //         },
                                //     }
                                // );

                            }

                            // Publish the local audio and video tracks in the channel.
                            await agoraEngine.publish([channelParameters.localVideoTrack]);
                            // StatsVideoUpdate();
                            document.querySelector(".btn-video-call-container").classList.remove("d-none");
                            document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');
                            document.querySelector('#span_timer_video_call').classList.remove('d-none');
                            leaveChannel = "false";
                            check_start_timer_video_call = false;
                            // document.querySelector('#command_join').classList.add('btn-success');
                            document.querySelector('#command_join').classList.add('d-none');
                            // document.querySelector('#command_join').classList.remove('video-call-in-room');

                            stop_ringtone();

                        } catch (error) {
                            // ในกรณีที่เกิดข้อผิดพลาดในการสร้างกล้อง
                            console.error('ไม่สามารถสร้างกล้องหรือไม่พบกล้อง', error);
                             // ใช้ navigator.mediaDevices.getDisplayMedia เพื่อดึง MediaStream จากการแสดงหน้าจอ
                            // const screenStream = await navigator.mediaDevices.getDisplayMedia({ video: true });
                            // const screenTrack = screenStream.getVideoTracks()[0];
                            // // สร้าง custom video track จาก screenTrack
                            // channelParameters.localVideoTrack = await AgoraRTC.createCustomVideoTrack({
                            //     mediaStreamTrack: screenTrack,
                            //     optimizationMode: 'detail',
                            //     encoderConfig: {
                            //         width: 640,
                            //         // Specify a value range and an ideal value
                            //         height: { ideal: 480, min: 400, max: 500 },
                            //         frameRate: 15,
                            //         bitrateMin: 600, bitrateMax: 1000,
                            //     },
                            // });
                            // await agoraEngine.publish([channelParameters.localVideoTrack]);
                            // setTimeout(() => {
                            //     // window.location.reload(); // รีเฟรชหน้าเว็บ
                            //     // afterJoin();
                            //     leave_refresh();
                            // }, 2000);

                            return; // หยุดการทำงานของฟังก์ชันนี้ทันที
                        }
                        setTimeout(() => {
                            console.log("channelParameters_after");
                            console.log(channelParameters);
                        }, 3333);

                        function join_and_update(){
                            console.log("join_and_update");
                                fetch("{{ url('/') }}/api/join_room_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id)
                                    .then(response => response.json())
                                    .then(result => {
                                        console.log("result join_room_4");
                                        console.log(result);
                                        // let member_in_room = JSON.parse(result);
                                        setTimeout(() => {
                                            if(result.length >= 2){
                                                if(check_start_timer_video_call == false){
                                                    start_timer_video_call();
                                                }
                                            }else{
                                                if(check_start_timer_video_call == true){
                                                    console.log("member_in_room น้อยกว่า 2 --> join_and_update");
                                                    myStop_timer_video_call();
                                                }
                                            }
                                        }, 800);

                                })
                                .catch(error => {
                                    console.log("บันทึกข้อมูล join_and_update ล้มเหลว :" + error);
                                    // window.location.reload(); // รีเฟรชหน้าเว็บ
                                });
                        }
                        join_and_update();

                        if(user_data.photo){
                            profile_local = "{{ url('/storage') }}" + "/" + user_data.photo;
                        }else if(!user_data.photo && user_data.avatar){
                            profile_local = user_data.avatar;
                        }else{
                            profile_local = "https://www.viicheck.com/Medilab/img/icon.png";
                        }
                        //===== สุ่มสีพื้นหลังของ localPlayerContainer=====
                        fetch("{{ url('/') }}/api/get_local_data_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id)
                            .then(response => response.json())
                            .then(result => {
                                bg_local = result.hexcolor;
                                // bg_local = "#F0D2CC";
                                name_local = result.name_user;
                                type_local = result.user_type;

                                changeBgColor(bg_local);

                        })
                        .catch(error => {
                            console.log("โหลดข้อมูล LocalUser ล้มเหลว ใน get_local_data_4");
                            // console.log(error);
                        });

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
                        // document.querySelector('#lds-ring').remove();

                        //======= สำหรับ สร้างปุ่มที่ใช้ เปิด-ปิด กล้องและไมโครโฟน ==========//
                        btn_toggle_mic_camera(videoTrack,audioTrack,bg_local);

                        //ถ้ากดปุ่ม muteVideo แล้วกล้องอยู่ในสถานะปิด ให้เปลี่ยนสี bg ของ local
                        document.querySelector('#muteVideo').addEventListener("click", function(e) {
                            if (isVideo == false) {
                                // console.log(bg_local);
                                changeBgColor(bg_local);
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
                } catch (error) {
                    console.log("โหลดหน้าล้มเหลว :" + error);
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
                console.log("You left the channel");
                console.log("leaveChannel : "+ leaveChannel);
                // Refresh the page for reuse
                // window.location.reload();

                if (leaveChannel == "false") {
                    // leaveChannel();
                    fetch("{{ url('/') }}/api/left_room_4" + "?user_id=" + '{{ Auth::user()->id }}' + "&type=" + type_video_call + "&sos_id=" + sos_id +"&meet_2_people=beforeunload"+"&leave=beforeunload")
                        .then(response => response.text())
                        .then(result => {
                            // console.log(result);
                            console.log("left_and_update สำเร็จ");
                            leaveChannel = "true";


                            if (result == "OK") {
                                switch_div_data();
                                document.querySelector(".btn-video-call-container").classList.add("d-none");
                                document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');

                                if (document.querySelector('[div_video="remote"]')) {
                                    document.querySelector('[div_video="remote"]').remove();
                                }

                                if (document.querySelector('#videoDiv_'+'{{ Auth::user()->id }}')) {
                                    document.querySelector('#videoDiv_'+'{{ Auth::user()->id }}').remove();
                                }

                                document.querySelector('#span_timer_video_call').classList.add('d-none');
                                document.querySelector('#command_join').classList.remove('d-none');
                                // if (document.querySelector('#div_for_VideoButton')) {
                                //     document.querySelector('#div_for_VideoButton').remove();
                                // }

                                // if (document.querySelector('#div_for_AudioButton')) {
                                //     document.querySelector('#div_for_AudioButton').remove();
                                // }

                                // if (document.querySelector('#leave')) {
                                //     document.querySelector('#leave').remove();
                                // }

                                setTimeout(() => {
                                    leave_refresh();
                                }, 1000);
                            }
                            // window.history.back();
                    })
                    .catch(error => {
                        console.log("บันทึกข้อมูล left_and_update ล้มเหลว :" + error);
                    });
                }



            }
        }
        setTimeout(() => {
            afterJoin();
        }, 1000);
        //=============================================================================//
        //                               สลับอุปกรณ์                                     //
        //=============================================================================//

        // var activeVideoDeviceId;
        // var activeAudioDeviceId;
        // var activeAudioOutputDeviceId

        // window.addEventListener('DOMContentLoaded', async () => {
        //     try {

        //         // เรียกดูอุปกรณ์ทั้งหมด
        //         let devices = await navigator.mediaDevices.enumerateDevices();

        //         // เรียกดูอุปกรณ์ที่ใช้อยู่
        //         let stream = await navigator.mediaDevices.getUserMedia({
        //             audio: true,
        //             video: true
        //         });

        //         // const stream = await navigator.mediaDevices.getUserMedia({
        //         //     audio: true,
        //         //     video: {
        //         //         facingMode: 'user', // หรือ 'environment' หากต้องการใช้กล้องหลัง
        //         //         width: { ideal: 1280 },
        //         //         height: { ideal: 720 }
        //         //     }
        //         // });
        //         activeAudioDeviceId = stream.getAudioTracks()[0].getSettings().deviceId;
        //         activeVideoDeviceId = stream.getVideoTracks()[0].getSettings().deviceId;

        //         // if(useMicrophone){
        //         //     activeAudioDeviceId = useMicrophone;
        //         //     console.log("เข้า if useMicrophone");
        //         // }else{
        //         //     activeAudioDeviceId = stream.getAudioTracks()[0].getSettings().deviceId;
        //         //     console.log("เข้า else useMicrophone");
        //         // }

        //         // if(useCamera){
        //         //     activeVideoDeviceId = useCamera;
        //         //     console.log("เข้า if useCamera");
        //         // }else{
        //         //     activeVideoDeviceId = stream.getVideoTracks()[0].getSettings().deviceId;
        //         //     console.log("เข้า else useCamera");
        //         // }

        //         // if(useSpeaker){
        //         //     activeAudioOutputDeviceId = useSpeaker;
        //         // }else{
        //         //     activeAudioOutputDeviceId = devices.find(device => device.kind === 'audiooutput' && device.deviceId === 'default').deviceId;
        //         // }

        //     } catch (error) {
        //         console.error('เกิดข้อผิดพลาดในการเรียกดูอุปกรณ์:', error);
        //     }

        // });
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
                AEC: true, ANS: true,
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

            // let stream = await navigator.mediaDevices.getUserMedia({
            //     audio: true,
            //     video: {
            //         width: { ideal: 720 },
            //         height: { ideal: 1280 },
            //         // ตั้งค่าอื่นๆตามความจำเป็น
            //     }
            // });

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
                    // console.log("bg_local ddddddddddddddddddddddd");
                    changeBgColor(bg_local);
                }, 50);
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

            // แยกอุปกรณ์ตามประเภท --> ไมโครโฟน
            let audioDevices = devices.filter(device => device.kind === 'audioinput');
            // แยกอุปกรณ์ตามประเภท --> ลำโพง
            let audioOutputDevices = devices.filter(device => device.kind === 'audiooutput');

            console.log('------- audioDevices -------');
            console.log(audioDevices);
            console.log('length ==>> ' + audioDevices.length);
            console.log('------- ------- -------');

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

        // เปิด-ปิด list ของกล้อง
        $(document).ready(function() {
            $("#btn_switchCamera").click(function(event) {
                event.stopPropagation(); // หยุดการกระจายเหตุการณ์คลิกไปยัง document

                var targetId = $(this).attr("id"); // รับ id ของปุ่มที่ถูกคลิก

                if(document.querySelector('.open_dropcontent')){
                    $(".dropcontent").removeClass("open_dropcontent");
                }

                $(".dropcontent2").toggleClass("open_dropcontent2");

                // เพิ่มเหตุการณ์คลิกที่ document เพื่อปิด .dropcontent2 ถ้าคลิกที่นอกเหตุการณ์
                $(document).click(function(event) {
                    if (!$(event.target).closest(".dropcontent2").length) {
                        $(".dropcontent2").removeClass("open_dropcontent2");
                    }
                });
            });
        });

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

</script>

<script>

	const dataDiv = document.getElementById("dataDiv");


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
        newDiv.setAttribute('div_video','remote');
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
            // swapDivsInContainer(newDiv);
			// moveAllDivsToContainer(newDiv);

		});

		// let userVideoCallBar = document.querySelector(".user-video-call-bar");
		// let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

		// if (customDivsInUserVideoCallBar.length > 0) {
		// 	userVideoCallBar.appendChild(newDiv);

        //     let infomationUser = newDiv.querySelector(".infomation-user");
        //             if (infomationUser) {
        //                 // เพิ่มคลาส "d-none" เข้าไปใน div ที่ไม่ใช่ clickedDiv
        //                 infomationUser.classList.add("d-none");
        //             }
		// } else {
		// 	document.getElementById("container_user_video_call").appendChild(newDiv);
		// }

        document.getElementById("container_user_video_call").appendChild(newDiv);
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


        }
	}

	// สลับ div ระหว่าง .user-video-call-bar และ #container_user_video_call
    function swapDivsInContainer(clickedDiv) {
        const container = document.querySelector("#container_user_video_call");

        const divs = Array.from(container.children);

        if (divs.length < 2) {
            console.error("Not enough divs to swap");
            return;
        }

        const firstDiv = divs[0];
        const clickedDivIndex = divs.indexOf(clickedDiv);
        console.log("swapDivsInContainer :"+command_screen_current);
        if (clickedDivIndex === 1) {
            // สลับตำแหน่งของ div ที่ถูกคลิกกับ div แรก
            container.insertBefore(clickedDiv, firstDiv);
            command_screen_current = 1;
        } else if (clickedDivIndex === 0 && divs.length > 1) {
            // สลับตำแหน่งของ div แรกกับ div ที่สอง
            container.insertBefore(divs[1], firstDiv.nextSibling);
            command_screen_current = 2;
        }

    }

    // // เพิ่ม event listener บน .container_user_video_call สำหรับสลับ div
    // document.querySelector(".container_user_video_call").addEventListener("click", function(e) {
    //     if (e.target.classList.contains("custom-div")) {
    //         swapDivsInContainer(e.target);
    //     }
    // });


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

        checkchild();
	}


	function handleClick(clickedDiv) {
		let userVideoCallBar = document.querySelector(".user-video-call-bar");
		let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

        swapDivsInContainer(clickedDiv);
		// if (customDivsInUserVideoCallBar.length > 0) {
		// 	moveAllDivsToContainer();
		// } else {
		// 	moveDivsToUserVideoCallBar(clickedDiv);
		// }
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
            t.textContent = "#container_user_video_call .custom-div:first-child {position: absolute; width: 100%; height: 100%;} #container_user_video_call .custom-div:nth-child(2) {position: absolute; width: 30%; height: 30%; top: 0; left: 0;}";
            console.log("checkchild :"+command_screen_current);
            let remoteDiv = container.querySelector('.custom-div[div_video="remote"]');
            if (remoteDiv && command_screen_current == 1) {
                command_screen_current = 2;
                container.insertBefore(remoteDiv, container.firstChild); // Move remoteDiv to the beginning
            }

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
                document.getElementById(`muteAudio`).innerHTML = '<i class="fa-duotone fa-microphone-slash" style="--fa-primary-color: #3f3e3e; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
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
                document.getElementById(`muteVideo`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #3f3e3e; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';
                document.getElementById('div_for_VideoButton').classList.remove('btnSpecial_unmute');
                document.getElementById('div_for_VideoButton').classList.add('btnSpecial_mute');
                // Mute the local video.
                channelParameters.localVideoTrack.setEnabled(false);
                muteVideoButton.classList.add('btn-disabled');
                // เปลี่ยน icon camera ให้เป็นปิด ใน divVideo_
                document.getElementById(`camera_local`).innerHTML = '<i class="fa-duotone fa-video-slash" style="--fa-primary-color: #ff0000; --fa-secondary-color: #ffffff; --fa-secondary-opacity: 1;"></i>';

                // แสดงโปรไฟล์ ตอนปิดกล้อง
                document.querySelector('.profile-input-output-local').classList.remove('d-none');

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
                // swapDivsInContainer(divVideo);
            });

            transparentDiv.addEventListener("click", function() {
                let id_agora_create = localPlayerContainer.id;
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                swapDivsInContainer(clickedDiv);

                // let userVideoCallBar = document.querySelector(".user-video-call-bar");
                // let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");
                // if (customDivsInUserVideoCallBar.length > 0) {
                //     moveAllDivsToContainer();
                // } else {
                //     moveDivsToUserVideoCallBar(clickvideoDiv);
                // }
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
            divVideo_New.setAttribute('div_video','remote');

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
                console.log("remotePlayerContainer Click ---->");
                let id_agora_create = remotePlayerContainer.id;
                console.log(id_agora_create);
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                swapDivsInContainer(clickedDiv);

                // let userVideoCallBar = document.querySelector(".user-video-call-bar");
                // let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

                // if (customDivsInUserVideoCallBar.length > 0) {
                //     moveAllDivsToContainer();
                // } else {
                //     moveDivsToUserVideoCallBar(clickvideoDiv);
                // }
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
            divVideo_New.setAttribute('div_video','remote');
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

                let id_agora_create = user.uid.toString();
                console.log(id_agora_create);
                let clickvideoDiv = document.querySelector('#videoDiv_'+id_agora_create);
                clickvideoDiv.click();

                swapDivsInContainer(clickedDiv);

                // let userVideoCallBar = document.querySelector(".user-video-call-bar");
                // let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

                // if (customDivsInUserVideoCallBar.length > 0) {
                //     moveAllDivsToContainer();
                // } else {
                //     moveDivsToUserVideoCallBar(clickvideoDiv);
                // }
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

    function myStop_timer_video_call() {
        console.log("เข้ามาหยุด myStop_timer_video_call");
        setTimeout(() => {
            clearInterval(loop_timer_video_call);
            check_start_timer_video_call = false;
            document.querySelector('#time_of_room').innerHTML = 'เริ่มนับเมื่อมีผู้ใช้ 2 คน';
            document.querySelector('#time_of_room').classList.remove('text-danger');

            document.querySelector('#power_bar').classList.add('d-none');
            clearInterval(timer_progess);

        }, 1000);
    }

    function start_timer_video_call(){
        console.log('start_timer_video_call');
        // console.log(time_start);
        check_start_timer_video_call = true ;

        setTimeout(() => {

            let time_of_room = document.getElementById("time_of_room");
                // time_of_room.classList.remove('d-none');

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

                        let remain_time = max_minute_time - 1;
                        let time_warning = "";
                        if (max_minute_time > 1) {
                            time_warning = (max_minute_time - remain_time);
                        }else{
                            time_warning = "น้อยกว่า 1";
                        }

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
                        time_of_room.innerHTML = showTimeCountVideo;

                        if (minsec == "0.12") {
                            audio_in_room.play();
                            time_of_room.setAttribute('class','text-danger');

                            updateProgressBar(180000); // ตัวอย่างเวลา 60 วินาที (60000 มิลลิวินาที)

                            // let alert_warning = document.querySelector('#alert_warning')
                            // alert_warning.style.display = 'block'; // แสดง .div_alert

                            // document.querySelector('#alert_text').innerHTML = `เหลือเวลา `+ time_warning +` นาที`;
                            // alert_warning.classList.add('up_down');

                            // const animated = document.querySelector('.up_down');
                            // animated.onanimationend = () => {
                            //     document.querySelector('#alert_warning').classList.remove('up_down');
                            //     let alert_warning = document.querySelector('#alert_warning')
                            //     alert_warning.style.display = 'none'; // แสดง .div_alert
                            // };

                        }

                        if (elapsedMinutes == max_minute_time) {
                            clearInterval(loop_timer_video_call);
                            document.querySelector('#leave').click();
                        }

                    }, 1000);
                });
        }, 1000);

    }

    // เพิ่มฟังก์ชันที่คำนวณเวลาและอัพเดท progress bar
    function updateProgressBar(duration) {

        let progressBar = document.querySelector('#power_bar');

        let timeLeft = duration;
        let interval = duration / 100; // แบ่งเวลาออกเป็นส่วนๆ

        let width = 100;

        timer_progess = setInterval(function () {
            progressBar.classList.remove('d-none');

            if (timeLeft <= 0) {
                clearInterval(timer_progess);
            }

            width -= 100 / duration * interval;

            progressBar.style.width = width + '%';

            timeLeft -= interval;
        }, interval);
    }

    async function getFirstCameraAndMic() {
        try {
            // เรียกดูอุปกรณ์ทั้งหมด
            let devices = await navigator.mediaDevices.enumerateDevices();

            let cameraDeviceId, micDeviceId;

            // ค้นหากล้องตัวแรก
            const cameraDevice = devices.find(device => device.kind === 'videoinput');
            if (cameraDevice) {
                cameraDeviceId = cameraDevice.deviceId;
            }

            // ค้นหาไมโครโฟนตัวแรก
            const micDevice = devices.find(device => device.kind === 'audioinput');
            if (micDevice) {
                micDeviceId = micDevice.deviceId;
            }

            return { cameraDeviceId, micDeviceId };
        } catch (error) {
            console.error('Error in getting camera and microphone:', error);
            return {};
        }
    }

</script>

<script>
    function switch_div_data(){

        let btnVideoCall = document.getElementById('btnVideoCall');
        let divSosMap = document.getElementById('div_detail_sos');
        let divVideoCall = document.getElementById('divVideoCall');

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
                   console.log("left_and_update สำเร็จ");
                   leaveChannel = "true";
           })
           .catch(error => {
               console.log("บันทึกข้อมูล left_and_update ล้มเหลว :" + error);
           });
        }
   });
</script>


<script>
    // ตัวแปรสำหรับกำหนดการเล่นเสียง ringtone
    var check_first_play_ringtone = 0 ;
    var check_first_play_audio_in_room = 0 ;

    // ตัวแปรสำหรับกำหนดการแสดงผลวิดีโอ เริ่มแรกเป็นจอใหญ่เสมอ
    var status_click_switch = false;
    function loop_check_user_in_room() {

        check_user_in_room = setInterval(function() {

        // console.log('loop_check_user_in_room');
        // console.log("แจ้งเตือนคนเข้าห้อง >> " + check_command_in_room);

        //  fetch("{{ url('/') }}/api/check_user_in_room" + "?sos_1669_id=" + sos_1669_id)
            fetch("{{ url('/') }}/api/check_user_in_room_2" + "?sos_id=" + sos_id + "&type=user_sos_1669")
                .then(response => response.json())
                .then(result => {
                    console.log('check_user_in_room');
                    console.log(result);
                    console.log(result['status']);
                    console.log('-------------------------------------');

                    if (result['status'] == "2_people") {
                        first_meet_success = true;
                    }

                    if(result['status'] == 'ว่าง'){
                        first_meet_success = false;
                        check_first_play_audio_in_room = 0;
                    }

                    if(result['status'] != 'ว่าง'){

                        if (first_meet_success == false && result['role_check'] == "ไม่พบศูนย์สั่งการ") {

                                document.querySelector('#command_join').innerHTML =
                                `<i class="fa-solid fa-phone-volume fa-beat"></i> &nbsp;&nbsp; สนทนา`;
                                document.querySelector('#command_join').classList.add('video-call-in-room');
                                document.querySelector('#command_join').classList.remove('btn-success');
                                document.querySelector('#command_join').setAttribute('style' , 'width: 75%;');

                                let btnVideoCall_sty = document.querySelector('#divVideoCall').getAttribute('style');

                                // let btnVideoCall_dnone = document.querySelector('#divVideoCall');
                                    // console.log(btnVideoCall_sty);
                                console.log("status_click_switch :"+ status_click_switch);
                                if(btnVideoCall_sty == "display: none;" && status_click_switch == false){
                                    document.querySelector('#btnVideoCall').click();
                                    status_click_switch = true;
                                }

                                // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                                create_html_user_in_room(result['data'] , 'wait');

                                if( check_first_play_audio_in_room == 0 ){
                                    // audio_in_room.play();
                                    play_ringtone();
                                    check_first_play_audio_in_room = 1 ;
                                    document.querySelector('#btn_close_audio_ringtone').classList.remove('d-none');
                                }

                        }else{
                            // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                            create_html_user_in_room(result['data'] , 'end but in_room');

                            stop_ringtone();
                            document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');

                        }


                    // myStop_check_user_in_room();
                    }else{
                        status_click_switch = false;
                        // กำหนดจอของเจ้าหน้าที่ให้แสดงที่จอ ใหญ่
                        command_screen_current = 1 ;

                        stop_ringtone();
                        document.querySelector('#btn_close_audio_ringtone').classList.add('d-none');

                        document.querySelector('#command_join').innerHTML =
                        `<i class="fa-solid fa-phone-volume"></i> เริ่มต้นการสนทนา`;
                        document.querySelector('#command_join').classList.remove('video-call-in-room');
                        document.querySelector('#command_join').classList.add('btn-success');
                        document.querySelector('#command_join').setAttribute('style' , 'width: 75%;');

                        // ส่งไปสร้าง html แสดงชื่อของผู้ใช้
                        create_html_user_in_room(result['data'] , 'out');

                    }

            });

        }, 4000);
    }

//=================================================== เช็ค Operation Meet =======================================================================
var ringtone_operation = new Audio("{{ asset('sound/ringtone-126505.mp3') }}");
var status_playing_ringtone = false;
var ringtone_first_play_check = 0;

var first_operation_meeting = false; // false = ยังไม่ได้คุย

function play_ringtone_operation() {
  if (!status_playing_ringtone) {
    ringtone_operation.loop = true;
    ringtone_operation.play();
    status_playing_ringtone = true;

    ringtone_first_play_check = 1 ;
  }
}

function stop_ringtone_operation() {
  ringtone_operation.pause();
  ringtone_operation.currentTime = 0;
  status_playing_ringtone = false;

  ringtone_first_play_check = 0 ;
}
var status_pause_ringtone = false;
function mute_ringtone_operation(){
    if (status_pause_ringtone == true) {
        ringtone_operation.pause();
        ringtone_operation.currentTime = 0;
    }
}

function loop_check_user_operation_meet(){

  // console.log("เช็คผู้ใช้ใน operation meet");

    check_user_in_operation_meet = setInterval(function() {
        // fetch("{{ url('/') }}/api/check_user_for_operation_meet" + "?sos_id=" + sos_1669_id)
      fetch("{{ url('/') }}/api/check_user_for_operation_meet" + "?sos_id=" + sos_id + "&type_check=" + "from_yellow")
        .then(response => response.text())
        .then(result => {
        //   console.log("result check_user_for_operation_meet");
        //   console.log(result);
        //   console.log("first_operation_meeting :" + first_operation_meeting);

            if(result == "เจ้าหน้าที่ศูนย์สั่งการอยู่กับหน่วยอื่น"){
                first_operation_meeting = true;
            }

            if(result == "ไม่มีใครอยู่ในห้องสนทนา"){
                first_operation_meeting  = false;
            }

            if (result == "do") {  // มี not_command อยู่ในห้องสนทนา

                if(first_operation_meeting == false){ // ยังไม่ได้คุย --> อนุญาต ให้แจ้งเตือน
                  // console.log("เล่น เสียงแจ้งเตือน");
                    status_pause_ringtone = true; // true = กดปุ่มปิดเสียงได้

                    // เลือกอิลิเมนต์ <li> ด้วย ID ของมัน
                    let liElement = document.getElementById('btn_open_meet');
                        liElement.innerHTML = "";

                        let tag_href = "{{ url('/video_call_4/before_video_call_4') }}?type=sos_1669&sos_id={{ $sos_help_center->id }}";

                        let class_btn = "";
                        if(status_pause_ringtone == true){
                            class_btn = "btn-secondary";
                        }else{
                            class_btn = "btn-secondary";
                        }

                        tag_b = `<div class="btnGroupOperating">
                                    <div class="btn-group btnGroupOperating">
                                        <button type="button" class="btn btn-outline-danger d-none">
                                            <i class="fa-solid fa-hospital-user"></i> Meet
                                        </button>
                                        <a id="" type="button" class="btn btn-success shadow_btn_call" href="`+tag_href+`" target=" ">
                                            <i class="fa-regular fa-phone"></i> เข้าร่วมการสนทนา
                                        </a>
                                        <a id="tag_a_mute_ringtone_meet" type="button" class="btn `+class_btn+`" onclick="mute_ringtone_operation();">
                                            <i class="fa-solid fa-volume-slash"></i>
                                        </a>
                                    </div>
                                </div>`;

                    liElement.insertAdjacentHTML('beforeend', tag_b); // แทรกบนสุด

                    if(ringtone_first_play_check == 0){
                        play_ringtone_operation();
                    }

                }else{ // คุยกันไปแล้ว --> ไม่อนุญาต ให้แจ้งเตือน
                  // console.log("ไม่เล่น เสียงแจ้งเตือน else ใน");
                    status_pause_ringtone = false; // false = กดปุ่มปิดเสียงไม่ได้

                    let liElement = document.getElementById('btn_open_meet');
                        liElement.innerHTML = "";

                        let tag_href = "{{ url('/video_call_4/before_video_call_4') }}?type=sos_1669&sos_id={{ $sos_help_center->id }}";

                        let class_btn = "";
                        if(status_pause_ringtone == true){
                            class_btn = "btn-secondary";
                        }else{
                            class_btn = "btn-secondary";
                        }

                        tag_b = `<div class="btnGroupOperating">
                                    <div class="btn-group btnGroupOperating">
                                        <button type="button" class="btn btn-outline-danger d-none">
                                            <i class="fa-solid fa-hospital-user"></i> Meet
                                        </button>
                                        <a type="button" class="btn btn-success" href="`+tag_href+`" target="_blank">
                                            <i class="fa-regular fa-phone"></i> เข้าร่วมการสนทนา
                                        </a>
                                        <a id="tag_a_mute_ringtone_meet" type="button" class="btn `+class_btn+` d-none" onclick="mute_ringtone_operation();">
                                            <i class="fa-solid fa-volume-slash"></i>
                                        </a>
                                    </div>
                                </div>`;


                    liElement.insertAdjacentHTML('beforeend', tag_b); // แทรกบนสุด

                    stop_ringtone_operation();
                }
            }else{
              // console.log("ไม่เล่น เสียงแจ้งเตือน else นอก");
                status_pause_ringtone = false; // false = กดปุ่มปิดเสียงไม่ได้

                let liElement = document.getElementById('btn_open_meet');
                    liElement.innerHTML = "";

                    let tag_href = "{{ url('/video_call_4/before_video_call_4') }}?type=sos_1669&sos_id={{ $sos_help_center->id }}";

                    let class_btn = "";
                    if(status_pause_ringtone == true){
                        class_btn = "btn-secondary";
                    }else{
                        class_btn = "btn-secondary";
                    }

                    tag_b = `<div class="btnGroupOperating">
                                <div class="btn-group btnGroupOperating">
                                    <button type="button" class="btn btn-outline-danger d-none">
                                        <i class="fa-solid fa-hospital-user"></i> Meet
                                    </button>
                                    <a type="button" class="btn btn-success" href="`+tag_href+`" target="_blank">
                                        <i class="fa-regular fa-phone"></i> เข้าร่วมการสนทนา
                                    </a>
                                    <a id="tag_a_mute_ringtone_meet" type="button" class="btn `+class_btn+` d-none" onclick="mute_ringtone_operation();">
                                        <i class="fa-solid fa-volume-slash"></i>
                                    </a>
                                </div>
                            </div>`;



                liElement.insertAdjacentHTML('beforeend', tag_b); // แทรกบนสุด

                stop_ringtone_operation();
            }


        });

    }, 5000);
}


//================================================== จบ เช็ค Operation Meet =====================================================================

    function create_html_user_in_room(data , type){

        // console.log('create_html_user_in_room');
        // console.log(data);
        // console.log('type >> ' + type);

        document.querySelector('#show_when_video_no_active').innerHTML = '';

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

        class_show_status = '' ;
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

        document.querySelector('#show_when_video_no_active').innerHTML = '' ;
        document.querySelector('#show_when_video_no_active').insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

    }
</script>







