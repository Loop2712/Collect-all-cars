@extends('layouts.viicheck_for_officer')

@section('content')
@include ('sos_help_officer.officer_form_yellow')

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
	*:not(i){
		font-family: 'Kanit', sans-serif !important;
	}
	/* #topbar{
		display: none !important;
	} */
	 #header{
		margin-top: -10% !important;
	}
	/* #map_show_case {
      	height: calc(40vh);
      	background-color: grey;
      	border-radius: 0 0 20px 20px;
      	border: 1px solid darkgray;
      	width: 100%;
    } */
	label {
		width: 100%;
		font-size: 1rem;
	}

	.btn_route_guide{
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.status-remark{
		border: 1px solid darkgray;
		border-radius: 20px 0 0 0;
	}.add-img{
		border: 1px solid darkgray;
		border-radius: 0 20px 0 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}.fill {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }

    .full_img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .parent {
        position: relative;
        /* define context for absolutly positioned children */
        /* size set by image in this case */
        background-size: cover;
        background-position: center center;
    }

    .parent img {
        display: block;
    }

    .parent:after {
        content: '';
        /* :after has to have a content... but you don't want one */

        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;

        background: rgba(0, 0, 0, 0);

        transition: 1s;
    }

    .parent:hover:after {
        background: rgba(0, 0, 0, .5);
    }

    .parent:hover .child {
        opacity: 1;
    }

    .child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        z-index: 5;
        /* only works when position is defined */
        /* think of a stack of paper... this element is now 5 higher than the bottom */

        color: white;
        opacity: 0;
        transition: .5s;
    }.sry-open-location {
  position: relative;
  }

.sry-open-location-text{
  position: absolute;
  left: 50%;
  transform: translate(-50%,-50%);
  margin: 0;
  padding: 0;
  color: black;
  width: 80%;
}


.situation-none{
	color:black;
	background-color: white;
}
.situation-red{
	color: white !important;
	background-color: #dc3545 !important;
}
.situation-yellow{
	color: black !important;
	background-color: #ffc107 !important;
}
.situation-normal{
	color: white !important;
	background-color: #007bff !important;
}.situation-black{
	color: white !important;
	background-color: #000000 !important;
}.situation-green{
	color: white !important;
	background-color: #28a745 !important;
}.card-input-element+.card {
height: calc(36px + 2*1rem);
color: #0d6efd;
-webkit-box-shadow: none;
box-shadow: none;
border-radius: 10px;
}
.card-input-primary +.card{
	border: 2px solid #0d6efd !important;
	display: none;
}
.card-input-red +.card{
	border: 2px solid #db2d2e !important;
	display: none;
}.card-input-success +.card{
	border: 2px solid #29cc39 !important;
	display: none;
}.card-input-warning +.card{
	border: 2px solid #ffc30e !important;
	display: none;
}.card-input-dark +.card{
	border: 2px solid #000 !important;
	display: none;
}

.card-input-element+.card:hover {
cursor: pointer;
}

.card-input-element:checked+.card {
border: 2px solid #0d6efd;
color: #fff !important;
background-color: #0d6efd !important;
-webkit-transition: border .3s;
-o-transition: border .3s;
transition: border .3s;
}

.card-input-element:checked+.card::after {
content: '\e5ca';
color: #AFB8EA;
font-family: 'Material Icons';
font-size: 24px;
-webkit-animation-name: fadeInCheckbox;
animation-name: fadeInCheckbox;
-webkit-animation-duration: .5s;
animation-duration: .5s;
-webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

@-webkit-keyframes fadeInCheckbox {
	from {
		opacity: 0;
		-webkit-transform: rotateZ(-20deg);
	}
	to {
		opacity: 1;
		-webkit-transform: rotateZ(0deg);
	}
}

@keyframes fadeInCheckbox {
	from {
		opacity: 0;
		transform: rotateZ(-20deg);
	}
	to {
		opacity: 1;
		transform: rotateZ(0deg);
	}
}


.card-input-red:checked+.card {
	border: 2px solid #db2d2e !important;
	background-color: #db2d2e !important;
	color: #fff !important;
	-webkit-transition: border .3s;
	-o-transition: border .3s;
	transition: border .3s;
} .card-input-success:checked+.card {
	border: 2px solid #29cc39 !important;
	background-color: #29cc39 !important;
	color: #fff !important;
	-webkit-transition: border .3s;
	-o-transition: border .3s;
	transition: border .3s;
}

.card-input-warning:checked+.card {
	border: 2px solid #ffc30e !important;
	background-color: #ffc30e !important;
	color: #fff !important;
	-webkit-transition: border .3s;
	-o-transition: border .3s;
	transition: border .3s;
}

.card-input-dark:checked+.card {
	border: 2px solid #000 !important;
	background-color: #000 !important;
	color: #fff !important;
	-webkit-transition: border .3s;
	-o-transition: border .3s;
	transition: border .3s;
}

.show-data{
	animation: myAnim 1s ease 0s 1 normal forwards;
}
@keyframes myAnim {
	0% {
		opacity: 0;
	}

	100% {
		opacity: 1;
	}
}.btn-update-status{
	width:100%;
	border-width:2px;
	padding:10px;
	border-radius: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
}.text-of-status{
	font-size: clamp(17px, 5vw, 20px) !important;

}.div-text-status{
	width: 100% !important;
	white-space: nowrap !important;
	overflow: hidden !important;
	text-overflow: ellipsis !important;
}

.sry-open-location img{
	margin-top: 30%;
	width: 100%;
  object-fit: cover;
  height: 100%;
}.sry-open-location p{
	font-size: clamp(12px, 5vw, 20px) !important;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
	body, html {
		height: 100% !important;
		width: 100% !important;
	}
	.header{
		display: none;
	}
	footer{
		display: none	;
	}
	header{
		display: none;
	}
	#map_show_case {
		width: 100%!important;
		height: 100% !important;
	}
	.gmnoprint{
		display: none;
	}
	.gm-fullscreen-control{
		display: none;
	}
	.gm-svpc{
		display: none;
	}
	.menubar{
		position: absolute;
		padding: 5px;
		bottom: 1%;
		background-color: #000000;
		/* opacity: 0.5; */
		border-radius: 25px;
		width: 80%;
		transform: translate(10%, 50%);
		display: flex;
		justify-content: space-around;
		animation: show-menubar 0.31s ease 0s 1 normal forwards;
		left: 10%;

	}
	@keyframes show-menubar {
		0% {
			transform: translateY(100px);
		}

		100% {
			transform: translateY(0);
		}
	}
	.menubar button{
		color: #fff;
		border-radius: 25px;
		height: 40px;
		width: 40px;
	}
	.menubar button i{
		font-size: 18px;
		display: flex;
		justify-content: center;
	}
	.menubar button:hover{
		color: #fff;
		border-radius: 25px;
	}
	.status-bar{
		position: absolute;
		top: 5%;
		/* opacity: 0.5; */
		border-radius: 25px;
		width: 95%;
		transform: translate(2.5%, -50%);
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 8px;
	}
	.img-profile{
		border-radius: 50%;
		width: 46px;
		height: 46px;
		object-fit: cover;
		outline: #000 1px solid;
	}
	.show-status{
		background-color: #000000;
		width: 85%;
		padding: 5px;
		border-radius: 25px;
		color: #fff;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.show-status button{
		color: #fff;
		border-radius: 50%;
	}
	.show-status button:hover{
		color: #fff;
		background-color: #db2d2e;
	}
	.data-menu{
		/* display: none; */
		position: absolute !important;
		border-radius: 25px;
		width: 99%;
		transform: translate(2.5%, -50%);
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 8px;
		left: 2%;

	}

	.test{
		top:50% !important;
	}

	.data-menu.show-data-menu menu{
		opacity: 0;
		animation: show-data-menu 0.5s ease 0s 1 normal forwards;
		top:calc(100% - 10px);
	}
	.close-data-menu{
		opacity: 0;
		animation: close-data-menu 1s ease 0s 1 normal forwards;
	}


  .data-menu.show-data-menu menu:nth-of-type(1){ animation-delay: 0.0s; }
  .data-menu.show-data-menu menu:nth-of-type(2){ animation-delay: 0.1s; }
  .data-menu.show-data-menu menu:nth-of-type(3){ animation-delay: 0.2s; }
  .data-menu.show-data-menu menu:nth-of-type(4){ animation-delay: 0.3s; }
  .data-menu.show-data-menu menu:nth-of-type(5){ animation-delay: 0.4s; }


	@keyframes show-data-menu {
		0% {
			transform: translateY(50px);
			opacity: 0;
		}

		100% {
			transform: translateY(0);
			opacity: 1;

		}
	}

	@keyframes close-data-menu {
		0% {
		opacity: 1;
		}

		100% {
			opacity: 0;
		}
	}.card-body{
		background-color: #fff;
	}

}

</style>

<style>
    .song_rem{
        bottom: -12rem;
    }
</style>

<style>
  .div_alert{
  position: fixed;
  /* position: absolute; */
  top: -30%;
  /* top: 55%; */
  width: 100%;
  left: 0;
  text-align: center;
  font-family: 'Kanit', sans-serif;
  z-index: 9999;
  display: flex;
  justify-content: center;
}
@media only screen and (max-width: 600px) {
    .alert-child{
        width: 90%;
        font-size: 1.2rem;
    }
}
@media only screen and (min-width: 600px) {
    .alert-child{
        width: 90%;
        font-size: 1.4rem;
    }
}

@media only screen and (min-width: 768px) {
    .alert-child{
        width: 40%;
        font-size: 1.4rem;
    }
}

.up-down {
  animation-name: slideDownAndUp;
  animation-duration: 5s;
}

@keyframes slideDownAndUp {
  0% {
    transform: translateY(0);
  }
  /* Change the percentage here to make it faster */
  10% {
    transform: translateY(225px);
  }
  /* Change the percentage here to make it stay down for longer */
  90% {
    transform: translateY(255px);
  }
  /* Keep this at the end */
 100% {
    transform: translateY(0);
 }
}
.alert-child{
    background-color: #DB2D2E;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 15px;
    height: 5rem;
    padding:20px 10px;
}.text-alert{
    color: #fff;
   float: left;
   padding: 0;
   margin: 0;
}.alert-icon{
    width: 100%;
    height: 100%;
    background-color: #ffddde;
    border-radius: 50%;
    color: #ff5757;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    max-width: 70px;
    height: 60px;

    font-size: 1.5rem;
    margin-left: 1rem;

}
.card-car-mileage{
			border-radius: 15px;
			padding: 20px;
			background-color: #000;
		}/* From uiverse.io by @satyamchaudharydev */
/* removing default style of button */

.btn-car-mileage{
 border-radius: 50% !important;
}
/* styling of whole input container */
.form-car-mileage {
	margin-top:15px ;
  --timing: 0.3s;
  --width-of-input: 100%;
  --height-of-input: 40px;
  --border-height: 2px;
  --input-bg: #fff;
  --border-color: #2f2ee9;
  --border-radius: 30px;
  --after-border-radius: 1px;
  position: relative;
  width: var(--width-of-input);
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#fff);
}

/* styling of Input */
.input-car-mileage {
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
}
/* styling of animated border */
.form-car-mileage:before {
  content: "";
  position: absolute;
  background: var(--border-color);
  transform: scaleX(0);
  transform-origin: center;
  width: 100%;
  height: var(--border-height);
  left: 0;
  bottom: 0;
  border-radius: 1px;
  transition: transform var(--timing) ease;
}

.form-car-mileage:before .btn-car-mileage{
  border-radius: 1px;
  transition: transform var(--timing) ease;
}
/* Hover on Input */
.form-car-mileage:focus-within {
  border-radius: var(--after-border-radius);
}

input:focus {
  outline: none;
}
/* here is code of animated border */
.form-car-mileage:focus-within:before {
  transform: scale(1);
}

/*==========   for call div   =============== */

.card_data{
    background-color: white;
    max-width: 40%;
    width: auto;
    min-width: 20%;
    padding: 10px ;
    border-radius: 5px;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
}

.btn_call {
    border-radius: 50%;
    width: 42px;
    height: 42px; /* เพิ่ม height เพื่อให้มีรูปร่างเป็นวงกลม */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #29cc39;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
}

.btn_mute {
    border-radius: 50%;
    width: 42px;
    height: 42px; /* เพิ่ม height เพื่อให้มีรูปร่างเป็นวงกลม */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #6c757d;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
}

.btn_call i {
    margin: 0;
    color: #fff;
}

.btn_mute i {
    margin: 0;
    color: #fff;
}

.btn_call_pulse {
    border-radius: 50%;
    width: 42px;
    height: 42px; /* เพิ่ม height เพื่อให้มีรูปร่างเป็นวงกลม */
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #29cc39;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    animation: pulse 1.5s infinite; /* เพิ่ม animation property */
}

@keyframes pulse {
    0% {
        transform: scale(1); /* ขนาดปกติ */
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }
    50% {
        transform: scale(1.1); /* ขยาย */
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.3), 0 8px 20px 0 rgba(0, 0, 0, 0.3);
    }
    100% {
        transform: scale(1); /* ขนาดปกติ */
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
    }
}

.btn_call_pulse i {
    margin: 0;
    color: #fff;
}


.card_btn_div{
    height: 15%;
    position:absolute;
    z-index: 8000;
}

#div_data_right{
    position: absolute;
    z-index: 99999;
    bottom: 50%;
    right: 0.1%;
    width: auto;

}


.body_hidden{
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden !important;
}

.active_div_data_right{
    animation: show_div_data_right 1s ease 0s 1 normal forwards;
}

.Inactive_div_data_right{
    animation: hide_div_data_right 1s ease 0s 1 normal forwards;
}

@keyframes show_div_data_right {
    0% {
        transform: translateX(100%);
    }

    100% {
        transform: translateX(0%);
    }
}

@keyframes hide_div_data_right {
    0% {
        transform: translateX(0%);
    }

    100% {
        transform: translateX(100%);
    }
}

/*==========  end for call div   ============ */

</style>


<div class="body_hidden">
    <div id="alert_send_update" class=" div_alert " role="alert">
        <div class="alert-child">
            <div >
                <h4 class="d-block  text-alert">Send update location officer</h4>
            </div>
            <i class="fa-solid fa-xmark"></i>
        </div>

    </div>
    <div id="alert_phone" class=" div_alert " role="alert">
        <div class="alert-child">
            <div >
                <p class="d-block  text-alert">กรุณากรอกข้อมูล </p>
                <span class="d-block  text-alert">
                    <span>
                        เลข กม.รถ
                    </span>
                    <span id="text-alert"></span>
                </span>

            </div>
            <div class="alert-icon">
                <i class="fa-solid fa-xmark"></i>
            </div>

        </div>
    </div>

        <div id="map_show_case" >
            <div class="sry-open-location">
                <img src="{{ asset('/img/more/sorry-no-text.png') }}" />
                <center>
                    <p class="sry-open-location-text h4" style="top: 35%;">ขออภัยค่ะ</p>
                    <p class="sry-open-location-text h5" style="top: 45%;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</p>
                    <span style="top: 60%;" class="sry-open-location-text btn btn-md btn-warning main-shadow main-radius" onclick="window.location.reload(true);">
                        <i class="fa-solid fa-arrows-rotate"></i> โหลดใหม่
                    </span>
                </center>
            </div>
        </div>
        <div class="status-bar">
            <div class="show-status" id="situation_of_status">
                <div class="ml-3" >
                    <i class="fa-solid fa-truck-medical"></i>
                    &nbsp;
                    <small class="h6 text-bold p-0 m-0" id="show_status"></small>
                    <small class="p-0 m-0" id="show_remark_status"></small>
                </div>
                <div class="ml-3 d-none">
                    <p class="mt-2">
                        LAT : <span id="text_show_lat"></span>
                        <br>
                        LONG : <span id="text_show_lng"></span>
                    </p>
                </div>
                <button class="btn btn-danger" style="padding: 12px;" onclick="document.querySelector('#btn_modal_add_photo_sos').click();"> <i class="fa-duotone fa-camera-retro" ></i></button>
            </div>
            <div class="btn p-0 m-0">
                @if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
                    <img class="mobile-nav-toggle main-shadow main-radius" style="margin-right: 15px;" width="35" src="{{ Auth::user()->avatar }}">
                @endif
                @if(!empty(Auth::user()->photo))
                    <img class="img-profile" width="45" src="{{ url('storage')}}/{{ Auth::user()->photo }}">
                @endif
            </div>
        </div>

        <div class="menubar show-menubar">
            <button class="btn w-25 btn_menu" id="btn_menu_1" onclick="show_data_menu(1);"><i class="fa-solid fa-file-pen"></i></button>
            <button class="btn w-25 btn_menu" id="btn_menu_2" onclick="show_data_menu(2);"><i class="fa-solid fa-messages-question"></i></button>
            <button class="btn w-25 btn_menu btn-danger" id="btn_menu_3" onclick="show_data_menu(3);"><i class="fa-regular fa-truck-medical"></i></button>
            <button class="btn w-25 btn_menu" id="btn_menu_4" onclick="show_data_menu(4);"><i class="fa-duotone fa-map"></i></button>
        </div>


        <!-- ////////////////////////////////////////// MENU 1 EDIT FORM ////////////////////////////////////////// -->
        <div class="row data-menu show-data-menu d-none" id="menu_1" style="bottom: -1rem">
            <menu class="col-12 " >
                <button  class="btn btn-update-status btn-primary main-shadow main-radius" style="width:100%;" data-toggle="modal" data-target="#modalDataDetailFormYellow" onclick="check_data_form_yellow_show_case('detail')">
                    รายละเอียดเคส
                </button>
            </menu>

            <menu class="col-12 " >
                <button  class="btn btn-update-status btn-warning main-shadow main-radius" style="width:100%;" data-toggle="modal" data-target="#modalOfficerFormYellow" onclick="check_data_form_yellow_show_case('edit')">
                    แก้ไขข้อมูลเคส
                </button>
            </menu>

            <menu class="col-12 " >
                <button class="btn btn-secondary main-shadow main-radius btn-update-status" style="width:100%;" data-toggle="modal" data-target="#modalAskMore">
                    ปฎิบัติการร่วม / หมู่
                </button>
            </menu>
        </div>
        <!-- ////////////////////////////////////////// END MENU 1 EDIT FORM ////////////////////////////////////////// -->



        <!-- ////////////////////////////////////////// MENU 2 SHOW LEVEL EVENT ////////////////////////////////////////// -->
        <div class="row data-menu show-data-menu d-none" id="menu_2" style="bottom: -2rem">
            <menu class="col-12 "  >
                <div id="show_level_by_control_center" class="card-body p-3 main-shadow" style="border-radius: 15px; ">
                    <div class="d-flex align-items-center div-text-status">
                        <div  class="">
                            <p class="mb-0">ศูนย์สั่งการ</p>
                            <h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_control_center">ไม่ได้ระบุ</h5>
                        </div>
                    </div>
                </div>
            </menu>
            <menu class="col-12">
                <div>
                    <span style="position: absolute;top: 5%;right: 5%;" onclick="click_edit_level_officer();">
                        <i id="tag_i_edit_level_officer" class="fa-solid fa-pen-to-square btn text-warning"></i>
                    </span>
                </div>
                <div id="show_level_by_officers" class="card-body p-3 main-shadow" style="border-radius: 15px;">
                    <div class="d-flex align-items-center div-text-status">
                        <div>
                            <p class="mb-0">เจ้าหน้าที่</p>
                            <h5 class="mb-0 font-weight-bold text-of-status" id="text_level_by_officers">ไม่ได้ระบุ</h5>
                        </div>
                    </div>
                </div>
            </menu>
        </div>
        <!-- ////////////////////////////////////////// END MENU 2 SHOW LEVEL EVENT ////////////////////////////////////////// -->



        <!-- ////////////////////////////////////////// MENU 3 OFFICER ACTION ////////////////////////////////////////// -->
        <div class="row data-menu show-data-menu p-0" id="menu_3" style="top:calc(100% - 140px);">

            <!-- ----------------------------------------- ช่องกรอกเลข กม. ทั้งหมด ------------------------------------------- -->
            <div id="div_mileage" class=d-none  >
                <menu class="col-12 " >
                    <div class="card card-car-mileage">
                        <div class="h5 text-white font-weight-bold">
                            <i class="fa-duotone fa-tire"></i> เลข กม. รถ : <u><span id="title_div_mileage"></span></u>
                        </div>

                        <div class="form-car-mileage pr-1 d-none" id="div_km_create_sos_to_go_to_help">
                            <input class="input-car-mileage" placeholder="เลข กม. รถ ออกจากฐาน" id="km_create_sos_to_go_to_help" name="km_create_sos_to_go_to_help" required="" type="text" value="{{ isset( $data_sos->form_yellow->km_create_sos_to_go_to_help ) ? $data_sos->form_yellow->km_create_sos_to_go_to_help : ''}}">
                            <a class="btn btn-primary btn-sm btn-car-mileage" href="#" role="button" onclick="update_mileage_officer('{{ $data_sos->id }}' , 'km_create_sos_to_go_to_help' ,'ออกจากฐาน')"><i class="fa-solid fa-paper-plane-top"></i></a>
                        </div>

                        <div class="form-car-mileage pr-1 d-none" id="div_km_to_the_scene_to_leave_the_scene">
                            <input class="input-car-mileage  bg-transparent" placeholder="เลข กม. รถ ถึงที่เกิดเหตุ" id="km_to_the_scene_to_leave_the_scene" name="km_to_the_scene_to_leave_the_scene" required="" type="text" value="{{ isset( $data_sos->form_yellow->km_to_the_scene_to_leave_the_scene ) ? $data_sos->form_yellow->km_to_the_scene_to_leave_the_scene : ''}}">
                            <!-- <a class="btn btn-primary btn-sm btn-car-mileage" href="#" role="button">
                                <i class="fa-solid fa-paper-plane-top"></i>
                            </a> -->
                        </div>

                        <div class="form-car-mileage pr-1 d-none" id="div_km_hospital">
                            <input class="input-car-mileage  bg-transparent" placeholder="เลข กม. รถ ถึงโรงพยาบาล" id="km_hospital" name="km_hospital" required="" type="text" value="{{ isset( $data_sos->form_yellow->km_hospital ) ? $data_sos->form_yellow->km_hospital : ''}}">
                            <!-- <a class="btn btn-primary btn-sm btn-car-mileage" href="#" role="button">
                                <i class="fa-solid fa-paper-plane-top"></i>
                            </a> -->
                        </div>

                        <div class="form-car-mileage pr-1 d-none" id="div_km_operating_base">
                            <input class="input-car-mileage  bg-transparent" placeholder="เลข กม. รถ ถึงฐาน" id="km_operating_base" name="km_operating_base" required="" type="text" value="{{ isset( $data_sos->form_yellow->km_operating_base ) ? $data_sos->form_yellow->km_operating_base : ''}}">
                            <!-- <a class="btn btn-primary btn-sm btn-car-mileage" href="#" role="button" >
                                <i class="fa-solid fa-paper-plane-top"></i>
                            </a> -->
                        </div>

                    </div>
                </menu>
            </div>
            <!-- ----------------------------------------- จบ ช่องกรอกเลข กม. ทั้งหมด ------------------------------------------- -->


            <!-- -------------------------------------------  เลือกสถานะการณ์  ---------------------------------------------------- -->
            <div id="div_event_level" class="d-none row data-menu show-data-menu" style="top:calc(100% - 70px) !important;">
                <menu class="col-6">
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-black" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ดำ','{{ $data_sos->id }}');">
                            ดำ
                    </button>
                </menu>
                <menu class="col-6">
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-normal" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('ขาว(ทั่วไป)','{{ $data_sos->id }}');">
                            ขาว(ทั่วไป)
                    </button>
                </menu>
                <menu class="col-6 mt-3">
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-green" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เขียว(ไม่รุนแรง)','{{ $data_sos->id }}');">
                            เขียว(ไม่รุนแรง)
                    </button>
                </menu>
                <menu class="col-6 mt-3">
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('เหลือง(เร่งด่วน)','{{ $data_sos->id }}');">
                            เหลือง(เร่งด่วน)
                    </button>
                </menu>
                <menu class="col-12 mt-3">
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-red" style="border-radius: 15px;width:100%" onclick="update_event_level_rc('แดง(วิกฤติ)','{{ $data_sos->id }}');">
                            แดง(วิกฤติ)
                    </button>
                </menu>
            </div>
            <!-- -------------------------------------------  จบ เลือกสถานะการณ์  ---------------------------------------------------- -->

            <!-- -------------------------------------------  เพิ่มเติมสถานะการสีดำ  ---------------------------------------------------- -->
            <label for="rc_black_text" id="div_add_rc_black_text" class="d-none row  data-menu show-data-menu"  style="top:calc(100% - -20px)">
                <div class="card-body p-3 main-shadow" style="border-radius: 15px;">
                    <div class="d-flex align-items-center div-text-status" >
                        <p class="mb-0">สถานะการณ์ : ดำ</p>
                        <input class="input-car-mileage" style="border-radius: 5px; border:#000 1px solid; padding: 10px;margin: 0 10px;" placeholder="โปรดระบุรหัส" id="rc_black_text"  name="rc_black_text" required="" type="text" value="{{ isset( $data_sos->form_yellow->rc_black_text ) ? $data_sos->form_yellow->rc_black_text : ''}}">
                        <a class="btn btn-primary btn-sm btn-car-mileage" href="#" role="button" onclick="update_event_level_rc('rc_black_text','{{ $data_sos->id }}');">
                            <i class="fa-solid fa-paper-plane-top"></i>
                        </a>
                    </div>
                </div>
            </label>
            <!-- ------------------------------------------- จบ เพิ่มเติมสถานะการสีดำ  ---------------------------------------------------- -->


            <!-- --------------------------------------- เลือกการปฏิบัติการ -------------------------------------------------- -->
            <div class="d-none row data-menu show-data-menu" id="div_select_treatment" style="top:calc(100% - -40px); margin: auto;">
                <div class="row w-100 d-flex justify-content-center">
                    <!-- ---  เลือก รักษา / ไม่รักษา  --- -->
                    <menu class="col-6  p-0 m-0" >
                        <label >
                            <input type="radio"name="treatment" value="มีการรักษา"  class="card-input-red card-input-element d-none"  onchange="check_btn_select_treatment();">
                            <div class="card card-body d-flex flex-row justify-content-between align-items-center text-danger border-danger w-100" style="border-radius: 10px 0 0 10px;">
                                <b>
                                    มีการรักษา
                                </b>
                            </div>
                        </label>

                    </menu>

                    <menu class="col-6 p-0 m-0" >
                        <label >
                            <input type="radio" name="treatment" value="ไม่มีการรักษา"  class="card-input-element d-none"  onchange="check_btn_select_treatment();">
                            <div class="card card-body d-flex flex-row-reverse  justify-content-between align-items-center border-primary"style="border-radius: 0 10px 10px 0;">
                                <b>
                                    ไม่มีการรักษา
                                </b>
                            </div>
                        </label>
                    </menu>

                    <div class="col-12" >

                        <!-- ---  เคสมีการรักษา  --- -->
                        <div class="row d-none mt-3" id="treatment_yes">
                            <div class="col-12 col-md-4 col-lg-4">
                                <span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('ออกจากที่เกิดเหตุ' , '{{ $data_sos->id }}' , null);">
                                        นำส่ง
                                </span>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4 mt-3">
                                <span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า');">
                                    ส่งต่อชุดปฏิบัติการ
                                </span>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4 mt-3">
                                <span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่นำส่ง');">
                                        ไม่นำส่ง
                                </span>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4 mt-3">
                                <span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิตระหว่างนำส่ง');">
                                        เสียชีวิตระหว่างนำส่ง
                                </span>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4 mt-3">
                                <span class="btn btn-danger w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ณ_จุดเกิดเหตุ');">
                                    เสียชีวิต ณ จุดเกิดเหตุ
                                </span>
                            </div>
                        </div>

                        <!-- ---   เคส ไม่มี การรักษา  --- -->
                        <div class="row d-none mt-3" id="treatment_no">
                            <div class="col-6  col-md-4 col-lg-4">
                                <span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ผู้ป่วยปฎิเสธการรักษา');">
                                    ผู้ป่วยปฎิเสธการรักษา
                                </span>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'เสียชีวิต_ก่อนชุดปฏิบัติการไปถึง');">
                                    เสียชีวิต ก่อนชุดปฏิบัติการไปถึง
                                </span>
                            </div>
                            <div class="col-6 mt-3 col-md-4 col-lg-4">
                                <span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ยกเลิก');" >
                                    ยกเลิก
                                </span>
                            </div>
                            <div class="col-6 mt-3 col-md-4 col-lg-4">
                                <span class="btn btn-primary w-100 h-100  py-3 main-shadow main-radius font-weight-bold btn-update-status"
                                    onclick="update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ไม่พบเหตุ');" >
                                        ไม่พบเหตุ
                                </span>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
            <!-- --------------------------------------- จบ เลือกการปฏิบัติการ -------------------------------------------------- -->

            <!-- ----------------------------------------- ปุ่ม ถึงที่เกิดเหตุ ------------------------------------------- -->
            <div id="div_btn_to_the_scene" class="d-none" div_name="btn_update_status" style="margin-bottom:1%">
                <menu class="col-12 " >
                    <button class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 situation-yellow" style="border-radius: 15px;width:100%"
                        onclick="update_mileage_officer('{{ $data_sos->id }}' , 'km_to_the_scene_to_leave_the_scene' ,'ถึงที่เกิดเหตุ')">
                            <i class="fa-sharp fa-solid fa-location-crosshairs"></i> ถึงที่เกิดเหตุ
                    </button>
                </menu>
            </div>

            <!-- --------------------------------------- ปุ่ม ถึงโรงพยาบาล -------------------------------------------------- -->
            <div id="div_to_hospital" class="d-none" div_name="btn_update_status"  style="margin-bottom:2%">
                <menu class="col-12 " >
                    <button class="btn btn-primary main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
                    onclick="update_mileage_officer('{{ $data_sos->id }}' , 'km_hospital' ,'ถึงโรงพยาบาล')">
                        ถึงโรงพยาบาล
                    </button>
                </menu>
            </div>

            <!-- --------------------------------------- ปุ่ม กลับถึงฐาน -------------------------------------------------- -->
            <div id="div_operating_base" class="d-none" div_name="btn_update_status"  style="margin-bottom: 2%">
                <menu class="col-12 " >
                    <button id="btn_operating_base" class="btn btn-success main-shadow main-radius w-100 h-100  py-3 font-weight-bold btn-update-status" style="width:95%;"
                    onclick="update_mileage_officer('{{ $data_sos->id }}' , 'km_operating_base' ,'กลับถึงฐาน'); ">
                        กลับถึงฐาน
                    </button>
                </menu>
            </div>


        </div>
        <!-- ////////////////////////////////////////// END MENU 3 OFFICER ACTION ////////////////////////////////////////// -->

        <!-- DIV ขวา -->
        <div id="div_data_right" class="card_data Inactive_div_data_right">
            <div id="btn_hide_or_show_Div_right" class="card card_btn_div card-body btn " style="right: 100%;top: 2%; border-radius: 15px 0px 0px 15px ;" onclick="hide_or_show_Div('show');">
                <i id="icon_hide_or_show_Div_right" style="margin-top: -7px;" class="fa-solid fa-phone"></i>
            </div>

            <div class="d-flex justify-content-around">

                    <a id="btn_call" class="btn_call mx-2" href="{{ url('/video_call_4/before_video_call_4') }}?type=sos_1669&sos_id={{ $data_sos->id }}" target="_blank">
                        <i class="fa-regular fa-phone m-0"></i>
                    </a>
                    <a id="btn_mute" class="btn_mute mx-2 d-none" onclick="mute_ringtone_operation();">
                        <i class="fa-solid fa-volume-slash"></i>
                    </a>


            </div>

        </div>

        <!-- ////////////////////////////////////////// MENU 4 MAP ////////////////////////////////////////// -->
        <div id="menu_4" class="row data-menu show-data-menu d-none " style="bottom: -0rem">
            @php
                $gg_lat_mail = '@' . $data_sos->lat ;
                $gg_lat = $data_sos->lat ;
                $lng = $data_sos->lng ;
            @endphp

            <menu class="col-12 d-none" id="show_travel_guide">
                <span id="btn_open_or_close_viicheck_speak" class="float-right btn"
                onclick="check_click_btn_open_or_close_viicheck_speak();"
                style="position: absolute;top: -60%;right: 5%;border-radius: 25px 25px 25px 25px;background-color: white;">
                    <i class="fa-solid fa-volume-high"></i>
                </span>

                <button id="reset-button">reset-button</button>
                <span id="set_heading"></span>

                <button class="btn_route_guide card-body p-3 main-shadow btn btn-sm text-center font-weight-bold mb-0 h5 btn-light" style="width:100%;border-radius: 25px 25px 25px 25px;background-color: white;">
                    <img id="img_maneuver" class="float-left" src="{{ asset('/img/traffic sign/34.png') }}" width="40" alt="">
                    <span id="text_instructions" class="text-center"></span>
                    <span id="text_distance_step" class="float-right"></span>
                    <span class="d-none" id="speak_to_user"></span>
                </button>
            </menu>
            <menu class="col-12">
                <button class="card-body p-3 main-shadow btn btn-sm text-start font-weight-bold mb-0 h5 btn-light" style="width:100%;border-radius: 20px 20px 20px 20px;background-color: white;font-size: 15px;">
                    <div class="row">
                        <div class="col-4">
                            ระยะทาง <br>
                            <span id="text_distance"></span>
                        </div>
                        <div class="col-5">
                            ถึงเวลาประมาณ <br>
                            <span id="text_duration"></span>
                        </div>
                        <div class="col-3 notranslate text-center" > <!-- onclick="watchPosition_officer();" -->
                            <i class="fa-solid fa-location-dot-slash"></i><br>
                            <span id="span_show_text_get_dir">soon</span>
                            <!-- <a href="https://www.google.co.th/maps/dir//{{$gg_lat}},{{$lng}}/{{$gg_lat_mail}},{{$lng}},16z" target="bank">
                                <img src="{{ asset('/img/icon/icon-google-map.png') }}" width="20" alt=""><br>MAP
                            </a> -->
                        </div>
                    </div>
                </button>
            </menu>
            <!-- GOOGLE MAP LINK -->
            <menu class="col-4 pl-0 d-none">
                <a href="https://www.google.co.th/maps/dir//{{$gg_lat}},{{$lng}}/{{$gg_lat_mail}},{{$lng}},16z" class="card-body p-3 main-shadow btn text-center font-weight-bold mb-0 h5 notranslate" style="width:100%;border-radius: 25px 25px 25px 25px;font-size: 15px;"  target="bank">
                    <img src="{{ asset('/img/icon/icon-google-map.png') }}" width="20" alt=""><br>Google
                </a>
            </menu>

        </div>
        <!-- ////////////////////////////////////////// END MENU 4 MAP ////////////////////////////////////////// -->


        <script>
            function show_data_menu(id){
                var element = document.getElementById('btn_menu_'+id);
                var test = element.classList.contains('btn-danger');

                if(id == 1 && text_level_for_rc_vehicle){
                    document.querySelector('#text_h5_show_level_rc').innerHTML = text_level_for_rc_vehicle ;
                    let rcColor ;
                    switch(text_level_for_rc_vehicle) {
                          case "แดง(วิกฤติ)":
                            rcColor =  "text-danger";
                        break;
                        case "เขียว(ไม่รุนแรง)":
                            rcColor =  "text-success";
                        break;
                        case "ดำ(รับบริการสาธารณสุขอื่น)":
                            rcColor =  "text-dark";
                        break;
                        case "เหลือง(เร่งด่วน)":
                            rcColor =  "text-warning";
                        break;
                        case "ขาว(ทั่วไป)":
                            rcColor =  "text-primary";
                        break;
                        default:
                            rcColor =  "";
                    }
                    document.querySelector('#text_h5_show_level_rc').classList.add(rcColor);
                }

                for (let i = 1; i <= 4; i++) {
                    document.querySelector('#menu_'+ [i]).classList.add('d-none');
                    document.querySelector('#btn_menu_'+ [i]).classList.remove('btn-danger');
                }

                if (test === true) {
                    document.querySelector('#menu_'+ id).classList.add('d-none');
                } else {
                    document.querySelector('#btn_menu_'+ id).classList.toggle('btn-danger');
                    document.querySelector('#menu_'+ id).classList.toggle('d-none');

                }

                start_page();
            }
        </script>


    <a id="tag_a_switch_standby" href="{{ url('/officers/switch_standby') }}" class="d-none"></a>

    <style>
        .active-li1 {
          background-color: red !important;
          color: white !important;
          outline: solid 2px red;
          border-radius: 5px;
        }

        .active-li2 {
          background-color: green !important;
          color: white !important;
          outline: solid 2px green;
          border-radius: 5px;
        }

        .inactive-li1 {
          background-color: white !important;
          color: red !important;
          outline: solid 2px red;
          border-radius: 5px;
        }

        .inactive-li2 {
          background-color: white !important;
          color: green !important;
          outline: solid 2px green;
          border-radius: 5px;
        }
    </style>

    <!-- Button trigger modal -->
    <button id="btn_modal_add_photo_sos" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_add_photo_sos">
      Launch static backdrop modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modal_add_photo_sos" style="z-index: 99999 !important;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                  <div class="modal-header d-flex align-items-center">
                    <h3 class="m-0"> <b>เพิ่มภาพถ่าย</b> </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa-solid fa-xmark-large"></i></span>
                    </button>
                  </div>

                  <form method="POST" action="{{ url('/sos_help_center/' . $data_sos->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                       {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                      <div class="modal-body text-center">
                        <div class="col-12">

                            <div class="row text-center">
                                <ul class="nav mb-3" role="tablist">
                                      <li class="nav-item col-6" role="presentation" >
                                        <a class="nav-link active" id="li1" data-bs-toggle="pill" href="#danger-pills-photo_sos" role="tab" aria-selected="true">
                                              <div class="">
                                                <div class="tab-icon d-block"><i class="fa-solid fa-car-burst font-18 me-1"></i></div>
                                                <div class="tab-title d-block">สถานที่เกิดเหตุ</div>
                                              </div>
                                        </a>
                                      </li>
                                      <li class="nav-item col-6" role="presentation" >
                                        <a class="nav-link" id="li2" data-bs-toggle="pill" href="#danger-pills-success" role="tab" aria-selected="false">
                                              <div class="">
                                                <div class="tab-icon d-block"><i class="fa-regular fa-house-medical-circle-check font-18 me-1"></i></div>
                                                <div class="tab-title d-block">เสร็จสิ้น</div>
                                              </div>
                                        </a>
                                      </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="danger-pills-tabContent" style="border-color: red;">
                                <!-- สถานที่เกิดเหตุ -->
                                <div class="tab-pane fade active show" id="danger-pills-photo_sos" role="tabpanel" style="border:solid #db2d2e ;border-radius:25px;padding: 15px;">
                                    <label class="col-12" style="padding:0px;" for="photo_sos_by_officers" >
                                        <div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
                                            @if(empty($data_sos->photo_sos_by_officers))
                                                <div class="form-group p-3"id="add_select_img">
                                                    <input class="form-control d-none" name="photo_sos_by_officers" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_by_officers" value="{{ isset($data_sos->photo_sos_by_officers) ? $data_sos->photo_sos_by_officers : ''}}" accept="image/*" onchange="document.getElementById('show_photo_sos_by_officers').src = window.URL.createObjectURL(this.files[0]);check_add_img() ">
                                                    <div  class="text-center">
                                                        <center>
                                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                                        </center>
                                                        <br>
                                                        <h4 class="text-center m-0">
                                                            <b>เลือก<u>รูปสถานที่เกิดเหตุ</u> "คลิก"</b>
                                                        </h4>
                                                    </div>

                                                </div>
                                                <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_by_officers" />
                                            @else
                                                <div class="form-group p-3 d-none" id="add_select_img">
                                                    <input class="form-control d-none" name="photo_sos_by_officers" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_by_officers" value="{{ isset($data_sos->photo_sos_by_officers) ? $data_sos->photo_sos_by_officers : ''}}" accept="image/*" onchange="document.getElementById('show_photo_sos_by_officers').src = window.URL.createObjectURL(this.files[0]);check_add_img() ">
                                                    <div  class="text-center">
                                                        <center>
                                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                                        </center>
                                                        <br>
                                                        <h3 class="text-center m-0">
                                                            <b>กรุณาเลือกรูป "คลิก"</b>
                                                        </h3>
                                                    </div>

                                                </div>
                                                <img class="full_img" style="padding:0px ;" width="100%" alt="your image" src="{{ url('storage')}}/{{ $data_sos->photo_sos_by_officers }}" id="show_photo_sos_by_officers" />

                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                        <textarea class="form-control mt-3" id="remark_photo_sos" name="remark_photo_sos" rows="3" placeholder="หมายเหตุ">{{ isset( $data_sos->remark_photo_sos ) ? $data_sos->remark_photo_sos : ''}}</textarea>
                                    </label>
                                </div>
                                <!-- ภาพถ่ายเสร็จสิ้น -->
                                <div class="tab-pane fade" id="danger-pills-success" role="tabpanel" style="border:solid green ;border-radius:25px;padding: 15px;">
                                    <label class="col-12" style="padding:0px;" for="photo_succeed" >
                                        <div class="fill parent" style="border:dotted green ;border-radius:25px;padding:0px;object-fit: cover;">
                                            @if(empty($data_sos->photo_succeed))
                                                <div class="form-group p-3"id="add_select_img_photo_succeed">
                                                    <input class="form-control d-none" name="photo_succeed" style="margin:20px 0px 10px 0px;" type="file" id="photo_succeed" value="{{ isset($data_sos->photo_succeed) ? $data_sos->photo_succeed : ''}}" accept="image/*" onchange="document.getElementById('show_photo_succeed').src = window.URL.createObjectURL(this.files[0]);check_add_img_succeed();">
                                                    <div  class="text-center">
                                                        <center>
                                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/20.png') }}" class="card-img-top center" style="padding: 10px;">
                                                        </center>
                                                        <br>
                                                        <h4 class="text-center m-0">
                                                            <b>เลือก<u>รูปภาพเสร็จสิ้น</u> "คลิก"</b>
                                                        </h4>
                                                    </div>

                                                </div>
                                                <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_succeed" />
                                            @else
                                                <div class="form-group p-3 d-none" id="add_select_img_photo_succeed">
                                                    <input class="form-control d-none" name="photo_succeed" style="margin:20px 0px 10px 0px;" type="file" id="photo_succeed" value="{{ isset($data_sos->photo_succeed) ? $data_sos->photo_succeed : ''}}" accept="image/*" onchange="document.getElementById('show_photo_succeed').src = window.URL.createObjectURL(this.files[0]);check_add_img_succeed();">
                                                    <div  class="text-center">
                                                        <center>
                                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/20.png') }}" class="card-img-top center" style="padding: 10px;">
                                                        </center>
                                                        <br>
                                                        <h3 class="text-center m-0">
                                                            <b>กรุณาเลือกรูป "คลิก"</b>
                                                        </h3>
                                                    </div>

                                                </div>
                                                <img class="full_img" style="padding:0px ;" width="100%" alt="your image" src="{{ url('storage')}}/{{ $data_sos->photo_succeed }}" id="show_photo_succeed" />

                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                        <textarea class="form-control mt-3" id="remark_helper" name="remark_helper" rows="3" placeholder="หมายเหตุ">{{ isset( $data_sos->remark_helper ) ? $data_sos->remark_helper : ''}}</textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input name="form_blade" class="d-none" value="form_modal_photo_sos">
                        <div class="form-group d-none">
                            <input id="btn_submit_form_photo" class="btn btn-primary" type="submit">
                        </div>
                      </div>
                  </form>
                  <div class="modal-footer">
                    <button id="btn_help_area" style="width:40%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" onclick="document.querySelector('#btn_submit_form_photo').click();">
                           ยืนยัน
                    </button>
                  </div>
            </div>
          </div>
    </div>

    @include ('layouts.modal_loading')

    <script>
        const li1 = document.getElementById("li1");
        const li2 = document.getElementById("li2");

        // Set initial active state
        li1.classList.add("active-li1");
        li2.classList.add("inactive-li2");

        // Add click listeners to LI elements
        li1.addEventListener("click", () => {
          li1.classList.add("active-li1");
          li1.classList.add("text-white");
          li1.classList.remove("inactive-li1");
          li2.classList.add("inactive-li2");
          li2.classList.remove("active-li2");
          li2.classList.remove("text-white");
        });

        li2.addEventListener("click", () => {
          li2.classList.add("text-white");
          li2.classList.add("active-li2");
          li2.classList.remove("inactive-li2");
          li1.classList.add("inactive-li1");
          li1.classList.remove("active-li1");
          li1.classList.remove("text-white");
        });

    </script>

    <style>
        .menu-profile-header{
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .data-menu-profile{
            width: 100% !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            display: flex;
            justify-content: baseline;
        }
    </style>
    @php
        $greetings = "";

        $time = date("H");
        $timezone = date("e");

        if ($time < "12") {
            $greetings = "สวัสดีตอนเช้า";
        } else

        if ($time >= "12" && $time < "17") {
            $greetings = "สวัสดีตอนบ่าย";
        } else

        if ($time >= "17" && $time < "19") {
            $greetings = "สวัสดีตอนเย็น";
        } else

        if ($time >= "19") {
            $greetings = "ราตรีสวัสดิ์";
        }
    @endphp

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content w-100" style="border-radius: 25px; margin-top: -7%;">
            <div class="modal-body w-100 mt-1">
                <div class="text-center col-12 mt-2 mb-2">
                    <img width="80" src="{{ url('/img/logo/VII-check-LOGO-W-v3.png') }}">
                </div>

                <div class="menu-profile-header">
                    <div class="data-menu-profile" >
                        @if(!empty(Auth::user()->avatar) and empty(Auth::user()->photo))
                            <img class="mobile-nav-toggle main-shadow" style="margin-right: 15px;border-radius: 25px;" width="35" src="{{ Auth::user()->avatar }}">
                        @endif
                        @if(!empty(Auth::user()->photo))
                            <img style="border-radius: 10px !important;" width="45" src="{{ url('storage')}}/{{ Auth::user()->photo }}">
                        @endif

                        <div class="ml-3">
                            <small>{{$greetings}}</small><br>
                            <h4 class="m-0 p-0 notranslate">{{Auth::user()->name}}</h4>
                        </div>

                    </div>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button> -->
                </div>
                <div class="row mt-3">
                    <div class="col-12 mb-2">
                        <h6 class="m-0 p-0" style="color: darkgray;">
                            ข้อมูล
                        </h6>
                    </div>
                    <a class="col-12 ml-3" href="{{ url('/profile') }}">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <img width="30" src="{{ url('/img/stickerline/PNG/12.png') }}">
                            </div>
                            <div class="col-10 pl-0 d-flex align-items-center">
                                <h6 class="m-0">
                                โปรไฟล์
                                </h6>
                            </div>
                        </div>
                    </a>

                    <div class="col-12 mb-2 mt-3">
                        <h6 class="m-0 p-0" style="color: darkgray;">
                            ระบบ
                        </h6>
                    </div>
                    <a class="col-12 ml-3" href="{{ url('/register_car/create') }}">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <img width="30" src="{{ url('/img/stickerline/PNG/44.png') }}">
                            </div>
                            <div class="col-10 pl-0 d-flex align-items-center">
                                <h6 class="m-0">
                                ลงทะเบียนรถ
                                </h6>
                            </div>
                        </div>
                    </a>
                    <a class="col-12 ml-3 mt-1" href="{{ url('/guest/create') }}">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <img width="30" src="{{ url('/img/stickerline/PNG/24.png') }}">
                            </div>
                            <div class="col-10 pl-0 d-flex align-items-center">
                                <h6 class="m-0">
                                แจ้งเลื่อนรถ
                                </h6>
                            </div>
                        </div>
                    </a>



                    <div class="col-12 mb-2 mt-3">
                        <h6 class="m-0 p-0" style="color: darkgray;">
                            บัญชี
                        </h6>
                    </div>
                    <a class="col-12 ml-3 mt-1" href="{{ route('password.request') }}">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <img width="30" src="{{ url('/img/stickerline/PNG/20.png') }}">
                            </div>
                            <div class="col-10 pl-0 d-flex align-items-center">
                                <h6 class="m-0">
                                เปลี่ยนรหัสผ่าน
                                </h6>
                            </div>
                        </div>
                    </a>
                    <a class="col-12 ml-3 mt-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <img width="30" src="{{ url('/img/stickerline/PNG/5.png') }}">
                            </div>
                            <div class="col-10 pl-0 d-flex align-items-center">
                                <h6 class="m-0">
                                    {{ __('Logout') }}
                                </h6>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>

                </div>
            </div>
        </div>
      </div>
    </div>
</div>


<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>

	var lat ;
	var lng ;
	var officer_marker ;
	var sos_marker ;
	var service;
	var directionsDisplay;

	var steps_travel ;
	var steps_travel_arr = [] ;

	var check_send_update_location_officer ;
    var seconds_officer ;

    var check_get_dir = "No" ;
    var open_viicheck_speak = "Yes" ;
	var seconds_speak ;
	var message_speech ;

	var element_text_instructions ;
	var textContent_text_instructions ;

    var sos_lo_lat = "{{ $data_sos->lat }}" ;
    var sos_lo_lng = "{{ $data_sos->lng }}" ;

	const image_sos = "{{ url('/img/icon/operating_unit/sos.png') }}";
	const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

	var watchId_start_market_officer ;

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        start_page();
        show_event_level();

        if (status_sos != "เสร็จสิ้น") {
        	getLocation();
        	timer_check_send_update_officer();
        	// watchPosition_officer();
        }else{
        	open_map_status_success();
        }

        setTimeout(() => {
            loop_check_user_operation_meet();
        }, 1000);

    });

	function getLocation() {
	  	if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(open_map_show_case);
	  	} else {
	    	// x.innerHTML = "Geolocation is not supported by this browser.";
	  	}
	}

    function open_map_show_case(position) {
		// console.log("open_map_show_case");

    	start_officer_lat = position.coords.latitude ;
		start_officer_lng = position.coords.longitude ;

        let m_numZoom = parseFloat('15');

        map_show_case = new google.maps.Map(document.getElementById("map_show_case"), {
            center: {lat: parseFloat(sos_lo_lat), lng: parseFloat(sos_lo_lng) },
        });

        // หมุดที่เกิดเหตุ
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(sos_lo_lat) , lng: parseFloat(sos_lo_lng) },
            map: map_show_case,
            icon: image_sos,
        });

        // หมุดเจ้าหน้าที่
        if (officer_marker) {
            officer_marker.setMap(null);
        }
        officer_marker = new google.maps.Marker({
            position: {lat: parseFloat(start_officer_lat) , lng: parseFloat(start_officer_lng) },
            map: map_show_case,
            icon: image_operating_unit_general,
        });

        const resetButton = document.getElementById("reset-button");
		resetButton.addEventListener("click", function() {
		    map_show_case.setCenter(officer_marker.getPosition());
		    map_show_case.setZoom(17);
		});

		// สร้างเส้นทาง
		get_Directions_API(officer_marker, sos_marker);
		// SET หมุดเจ้าหน้าที่
		set_watchPosition_officer_marker();

    }

    function set_watchPosition_officer_marker(){
    	if (navigator.geolocation) {

		  	watchId_start_market_officer = navigator.geolocation.watchPosition(

			    function(position) {
			    	latitude_officer_marker = position.coords.latitude ;
					longitude_officer_marker = position.coords.longitude ;
			    	// หมุดเจ้าหน้าที่
			        const newPosition = new google.maps.LatLng(parseFloat(latitude_officer_marker), parseFloat(longitude_officer_marker));
    				officer_marker.setPosition(newPosition);
					// console.log("SET หมุดเจ้าหน้าที่");

					// รอ 1 วินาที (1000 มิลลิวินาที) ก่อนคำนวณขนาดแผนที่และ fitBounds
			      	setTimeout(function() {
			            let bounds = new google.maps.LatLngBounds();

			                bounds.extend(officer_marker.getPosition());
			                bounds.extend(sos_marker.getPosition());

			            let mapHeight = document.getElementById("map_show_case").clientHeight;
			            let topPadding = mapHeight * 0.15;
			            let bottomPadding = mapHeight * 0.25;
			            let verticalPadding = topPadding + bottomPadding;

			            map_show_case.fitBounds(bounds, { top: topPadding, bottom: bottomPadding });
			   			// console.log('fitBounds in watchPosition_officer');
			        }, 1000);

			        setTimeout(function() {
			        	map_show_case.setZoom(map_show_case.getZoom() - 0.5 );
			        }, 1000);

			        if (check_send_update_location_officer == 'send_update_location_officer') {
			      		func_send_update_location_officer(latitude_officer_marker , longitude_officer_marker);
			      	}

			    }

			);

		}
    }

    // <!-- --------------- ระยะทาง(เสียเงิน) --------------- -->
	function get_Directions_API(markerA, markerB) {
		// console.log( "get_Directions_API" );

		// document.querySelector('#show_travel_guide').classList.remove('d-none');

		if (directionsDisplay) {
	        directionsDisplay.setMap(null);
		}

		service = new google.maps.DirectionsService();
		directionsDisplay = new google.maps.DirectionsRenderer({
		    draggable: false,
		    map: map_show_case,
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

	            setTimeout(function() {
		        	map_show_case.setZoom(map_show_case.getZoom() - 0.5 );
		        }, 1000);

	            // ระยะทาง
	            let text_distance = response.routes[0].legs[0].distance.text ;
	            document.querySelector('#text_distance').innerHTML = text_distance ;
	            // เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner
                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value) ;
                document.querySelector('#text_duration').innerHTML = text_arrivalTime ;

                steps_travel = response.routes[0].legs[0].steps;

                // let distance_step = steps_travel[0].distance.text ; // ระยะทางก่อนเปลี่ยน
                // let instructions_step = steps_travel[0].instructions ; // คำอธิบาย
                // let maneuver = steps_travel[0].maneuver ; // วิธีเปลี่ยนเส้นทาง

                // // document.querySelector('#img_maneuver').src = "{{ asset('/img/traffic sign/new-image.png') }}" ;
                // document.querySelector('#text_instructions').innerHTML = instructions_step ;
                // document.querySelector('#text_distance_step').innerHTML = distance_step ;

                // element_text_instructions = document.querySelector('#text_instructions');
				// textContent_text_instructions = element_text_instructions.textContent.trim();



				// setTimeout(function() {
				// 	message_speech = "อีก " + distance_step + " " + textContent_text_instructions ;
				// 	viicheck_speech(message_speech);
		        // }, 2000);

				// // ลบ array ตัวแรกออก
                // steps_travel_arr = steps_travel ;
                // drop_arr_start = steps_travel_arr.shift();

                check_get_dir = "Yes" ;

	        } else {
	            window.alert('Directions request failed due to ' + status);
	        }
	    });

	}

    function timer_check_send_update_officer(){
    	// Start the timer
        	startTime_wait_officer = Date.now();

		  	test_timer = setInterval(function() {
	            // Calculate the elapsed time
	            var elapsedTime = Date.now() - startTime_wait_officer;

	            // Convert the elapsed time to minutes and seconds
	            seconds_officer = Math.floor((elapsedTime % 60000) / 1000);

	            if (seconds_officer === 10) {
	            	check_send_update_location_officer = "send_update_location_officer" ;

	            	restart_timer_check_send_update_officer();

	            }

	            // Update the timer element
	            // timerElem.innerText = seconds_officer;
	        }, 1000);
    }

    function restart_timer_check_send_update_officer(){
    	// If the timer is already running, stop it and reset the start time
        if (test_timer) {
            clearInterval(test_timer);
            startTime_wait_officer = null;
        }

        timer_check_send_update_officer();
    }

    function watchPosition_officer(){

		// STOP watchId_start_market_officer
		// console.log("STOP watchId_start_market_officer");
		navigator.geolocation.clearWatch(watchId_start_market_officer);

		// ----------------------------------------------------------------------------

    	if (navigator.geolocation) {
		  	var watchId_officer = navigator.geolocation.watchPosition(
			    function(position) {

			    	// --------------------------------- กำหนดค่า MAP --------------------------------- //

			      	let latitude = position.coords.latitude;
			      	let longitude = position.coords.longitude;

			      	// หมุดเจ้าหน้าที่
			        const newPosition = new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude));
    				officer_marker.setPosition(newPosition);
    				// console.log("SET officer_marker ใน watchPosition_officer");

    				// setHeading
    				if (position.coords.heading) {
    					// console.log(position.coords.heading);
    					document.querySelector('#set_heading').innerHTML = position.coords.heading ;
					    map_show_case.setHeading(parseFloat(position.coords.heading));
					    map_show_case.setTilt(45); // Set a 45 degree tilt to show 3D view

					    // let map_show_case_rotate = document.querySelector('#map_show_case');
  						// 	map_show_case_rotate.style.transform = "rotate("+parseFloat(position.coords.heading)+"deg) translate(50px, 50px) scale(1.5)";
					}else{
    					document.querySelector('#set_heading').innerHTML = " ไม่มี heading " ;
					}

					map_show_case.setZoom(17);
					map_show_case.setCenter(officer_marker.getPosition())

			        // --------------------------------- จบ กำหนดค่า MAP --------------------------------- //

			      	if (check_send_update_location_officer == 'send_update_location_officer') {
			      		func_send_update_location_officer(latitude , longitude);
			      	}

			        if (check_get_dir == "Yes") {
			        	distance_check(latitude,longitude);
			        }

			    },
			    function(error) {
			      // console.log(`Error: ${error.message}`);
			    }
		  	);

		} else {
		  // console.log("Geolocation is not supported by this browser");
		}

    }

    function func_send_update_location_officer(lat_officer , lng_officer) {

		document.querySelector('#text_show_lat').innerHTML = lat_officer ;
		document.querySelector('#text_show_lng').innerHTML = lng_officer ;


        fetch("{{ url('/') }}/api/update_location_officer" + "/" + '{{ $data_sos->id }}' + "/" + lat_officer + "/" + lng_officer)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result['status']);

                // console.log("send_update_location_officer");

                let sos_lat = result['lat'] ;
                let sos_lng = result['lng'] ;

                status_sos = result['status'] ;
                document.querySelector('#show_status').innerHTML = status_sos ;
                if (result['remark_status']) {
                	result['remark_status'] = result['remark_status'].replaceAll("_" , " ");
            		document.querySelector('#show_remark_status').innerHTML = '(' + result['remark_status'] +')';
				}

				check_send_update_location_officer = 'no' ;

        });

	}

	function distance_check(latitude,longitude){
        // console.log("distance_check");

		const currentLatitude = latitude ; // User's current latitude
		const currentLongitude = longitude ; // User's current longitude

		// console.log(steps_travel);

      	let stepLatitude = steps_travel[0].end_location.lat();
      	let stepLongitude = steps_travel[0].end_location.lng();
      	// console.log("End Lat: " + stepLatitude);
      	// console.log("End Lng: " + stepLongitude);

	  	// Calculate the distance between the user's location and the step
	  	const distance = getDistanceFromLatLonInKm(
	    	currentLatitude, currentLongitude, stepLatitude, stepLongitude
	  	);

	  	document.querySelector('#text_distance_step').innerHTML = distance.toFixed(2) ;

	  	// runLoop(distance);

	}

	var worked_100 = false;
	var worked_300 = false;
	var worked_500 = false;

	function runLoop(distance) {

		// console.log("ระยะทางที่เหลือ => " + distance);

	  	if (distance <= 0.05) {
		    // console.log(">>>>>>>>> --------------------------- <<<<<<<<<");

		    document.querySelector('#speak_to_user').innerHTML = steps_travel[0].instructions ;
		    let span_speak_to_user = document.querySelector('#speak_to_user') ;
		    let text_speak_to_user = span_speak_to_user.textContent.trim();

		    viicheck_speech(text_speak_to_user);

		    // console.log(">>>>>>>>>  แจ้งผู้ใช้ให้เปลี่ยนเส้นทาง " + text_speak_to_user + "  <<<<<<<<<");
		    // console.log(">>>>>>>>> --------------------------- <<<<<<<<<");

		    // ลบตัวแรกออก
		    drop_steps_travel_arr = steps_travel.shift();

		    // เพิ่มไปยัง div แนะนำเส้นทาง
		    let distance_step = steps_travel[0].distance.text ; // ระยะทางก่อนเปลี่ยน
            let instructions_step = steps_travel[0].instructions ; // คำอธิบาย
            let maneuver = steps_travel[0].maneuver ; // วิธีเปลี่ยนเส้นทาง

            // document.querySelector('#img_maneuver').src = "{{ asset('/img/traffic sign/new-image.png') }}" ;
            document.querySelector('#text_instructions').innerHTML = instructions_step ;
            document.querySelector('#text_distance_step').innerHTML = distance_step ;

            element_text_instructions = document.querySelector('#text_instructions'); // เลือก element_text_instructions ที่ต้องการดึงข้อความ
			textContent_text_instructions = element_text_instructions.textContent.trim(); // ดึงข้อความและตัดช่องว่างด้านหน้าและด้านหลังด้วย method trim()


		    if (steps_travel[0].instructions && distance > 1) {

		      	// console.log("หัวข้อการนำทางต่อไป = " + textContent_text_instructions + "  ระยะใหม่ : " + distance);
		      	viicheck_speech("ขับต่อไปอีก " + distance + "เมตร จากนั้น " + textContent_text_instructions);

		    }else {

	      		// console.log("ถึงปลายทางของท่านแล้ว");
		      	viicheck_speech("ถึงปลายทางของท่านแล้ว");

		    }

	    	worked_100 = false;
	    	worked_300 = false;
	    	worked_500 = false;
	  	} else {
		    if (distance <= 0.1 && !worked_100) {
		      	// console.log("------------- >>>>> Speak อีก " + distance + " " + textContent_text_instructions);
		      	viicheck_speech(" อีก 100 เมตร " + textContent_text_instructions);

		     	worked_100 = true;
		      	worked_300 = true;
		      	worked_500 = true;
		    }
		    if (distance <= 0.3 && !worked_300) {
		      	// console.log("------------- >>>>> Speak อีก " + distance + " " + textContent_text_instructions);
		      	viicheck_speech(" อีก 300 เมตร " + textContent_text_instructions);

		      	worked_300 = true;
		      	worked_500 = true;
		    }
		    if (distance <= 0.5 && !worked_500) {
		      	// console.log("------------- >>>>> Speak อีก " + distance + " " + textContent_text_instructions);
		      	viicheck_speech(" อีก 500 เมตร " + textContent_text_instructions);
		      	worked_500 = true;
		    }

	  	}

	}

	function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
	  	const earthRadius = 6371; // Radius of the earth in km
	  	const dLat = deg2rad(lat2-lat1);
	  	const dLon = deg2rad(lon2-lon1);
	  	const a =
	    	Math.sin(dLat/2) * Math.sin(dLat/2) +
	    	Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
	    	Math.sin(dLon/2) * Math.sin(dLon/2);
	  	const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	  	const distance = earthRadius * c; // Distance in km

	  	return distance;
	}

	function deg2rad(deg) {

	  	return deg * (Math.PI/180)

	}


    //////// -------- START PAGE CHECK OF STATUS -------- ////////

    // แสดงข้อมูลเริ่มต้น ---------------------------------------------
	var event_level_by_control_center = '{{ $data_sos->form_yellow->idc }}';
    var event_level_by_officers = '{{ $data_sos->form_yellow->rc }}';
    var event_level_rc_black_text = '{{ $data_sos->form_yellow->rc_black_text }}';

	var status_sos = '{{ $data_sos->status }}';
    var show_remark_status_sos = '{{ $data_sos->remark_status }}';

    var km_go_to_help = '{{ $data_sos->form_yellow->km_create_sos_to_go_to_help }}';
    var km_to_the_scene = '{{ $data_sos->form_yellow->km_to_the_scene_to_leave_the_scene }}';
    var km_hospital = '{{ $data_sos->form_yellow->km_hospital }}';
    var km_operating_base = '{{ $data_sos->form_yellow->km_operating_base }}';
    var time_to_the_operating_base = '{{ $data_sos->form_yellow->time_to_the_operating_base }}';

    var treatment = '{{ $data_sos->form_yellow->treatment }}';

	// จบ แสดงข้อมูลเริ่มต้น ---------------------------------------------


    function start_page(){

    	// console.log(status_sos);

    	document.querySelector('#show_status').innerHTML = status_sos ;

		if (show_remark_status_sos) {
			show_remark_status_sos = show_remark_status_sos.replaceAll("_" , " ");
			document.querySelector('#show_remark_status').innerHTML =  '(' + show_remark_status_sos +')';
		}

	    switch(status_sos){
			case 'ออกจากฐาน':

				document.querySelector('#situation_of_status').classList.add('situation-yellow');

				if (!km_go_to_help) {
					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ออกจากฐาน' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_create_sos_to_go_to_help').classList.remove('d-none') ; // input เลข
				}else{
					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงที่เกิดเหตุ' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_to_the_scene_to_leave_the_scene').classList.remove('d-none') ; // input เลข

					document.querySelector('#div_btn_to_the_scene').classList.remove('d-none');
					document.querySelector('#menu_3').style = "bottom: -4.5rem" ;
				}

				document.querySelector('#div_add_rc_black_text').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
				document.querySelector('#div_to_hospital').classList.add('d-none');
				document.querySelector('#div_operating_base').classList.add('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');

			break;
			case 'ถึงที่เกิดเหตุ':

				document.querySelector('#situation_of_status').classList.add('situation-yellow');

				if (!km_to_the_scene) {
					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงที่เกิดเหตุ' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_to_the_scene_to_leave_the_scene').classList.remove('d-none') ; // input เลข
				}else{

					document.querySelector('#div_mileage').classList.add('d-none');

					if (!event_level_by_officers) {
						document.querySelector('#div_event_level').classList.remove('d-none');
                        document.querySelector('#div_event_level').setAttribute('style','top:calc(100% - 70px) !important;');
					}else{
						document.querySelector('#div_event_level').classList.add('d-none');
                        document.querySelector('#div_event_level').setAttribute('style','top:calc(100% - 70px) !important;');

						if (event_level_by_officers === "ดำ" && !event_level_rc_black_text) {

							document.querySelector('#div_add_rc_black_text').classList.remove('d-none');
							document.querySelector('#div_select_treatment').classList.add('d-none');
						}else{
							document.querySelector('#div_add_rc_black_text').classList.add('d-none');
							document.querySelector('#div_select_treatment').classList.remove('d-none');

							if (treatment) {

								let check_treatment = document.getElementsByName('treatment');

								for (let i = 0, length = check_treatment.length; i < length; i++) {

									if(check_treatment[i].value == treatment){
										check_treatment[i].checked = true ;
									}
								}

								if(treatment == "มีการรักษา"){
									document.querySelector('#treatment_no').classList.add('d-none');
									document.querySelector('#treatment_yes').classList.remove('d-none');
									document.querySelector('#treatment_yes').classList.add('show-data');
                                    document.querySelector('#div_select_treatment').setAttribute('style','top:calc(100% - 120px); margin: auto;');
								}else{
									document.querySelector('#treatment_yes').classList.add('d-none');
									document.querySelector('#treatment_no').classList.remove('d-none');
									document.querySelector('#treatment_no').classList.add('show-data');
                                    document.querySelector('#div_select_treatment').setAttribute('style','top:calc(100% - 70px); margin: auto;');
								}

							}
			          	}
					}
				}

				document.querySelector('#div_btn_to_the_scene').classList.add('d-none');
				document.querySelector('#div_to_hospital').classList.add('d-none');
				document.querySelector('#div_operating_base').classList.add('d-none');

			break;
			case 'ออกจากที่เกิดเหตุ':
				document.querySelector('#situation_of_status').classList.add('situation-yellow');

				document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
				document.querySelector('#title_div_mileage').innerHTML = 'ถึงโรงพยาบาล' ; // หัวข้อเลข กม. รถ
				document.querySelector('#div_km_hospital').classList.remove('d-none') ; // input เลข ถึงที่เกิดเหตุ

				document.querySelector('#div_to_hospital').classList.remove('d-none');
				document.querySelector('#menu_3').style = "bottom: -4.5rem" ;

				document.querySelector('#div_add_rc_black_text').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
				document.querySelector('#div_btn_to_the_scene').classList.add('d-none');
				document.querySelector('#div_operating_base').classList.add('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');


			break;
			case 'เสร็จสิ้น':
				document.querySelector('#situation_of_status').classList.add('situation-green');

				if (!km_operating_base || !time_to_the_operating_base) {

	          		document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงฐาน' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_operating_base').classList.remove('d-none') ; // input เลข ถึงที่เกิดเหตุ

					document.querySelector('#div_operating_base').classList.remove('d-none');
					document.querySelector('#menu_3').style = "bottom: -4.5rem" ;

				}else{
					document.querySelector('#div_operating_base').classList.add('d-none');
					document.querySelector('#div_mileage').classList.add('d-none');
					document.querySelector('#tag_i_edit_level_officer').classList.add('d-none');
					document.querySelector('#btn_menu_3').classList.add('d-none');
					document.querySelector('#btn_menu_4').classList.add('d-none');
				}

				document.querySelector('#div_add_rc_black_text').classList.add('d-none');
				document.querySelector('#div_select_treatment').classList.add('d-none');
				document.querySelector('#div_btn_to_the_scene').classList.add('d-none');
				document.querySelector('#div_to_hospital').classList.add('d-none');
				document.querySelector('#div_event_level').classList.add('d-none');

	        break;

		}
	}

	function show_event_level(){
	    // แสดงระดับเหตุการณ์
		if (event_level_by_control_center) {
			// document.querySelector('#show_level_by_control_center').classList.remove('d-none') ;
			let class_color_center ;
			let class_color_officers ;
			switch(event_level_by_control_center){
				case 'แดง(วิกฤติ)':
					class_color_center = "situation-red";
				break;
				case 'เหลือง(เร่งด่วน)':
					class_color_center = 'situation-yellow';
				break;
				case 'เขียว(ไม่รุนแรง)':
					class_color_center = 'situation-green';
				break;
				case 'ขาว(ทั่วไป)':
					class_color_center = 'situation-normal';
				break;
				case 'ดำ(รับบริการสาธารณสุขอื่น)':
					class_color_center = 'situation-black';
				break;
			}
			document.querySelector('#show_level_by_control_center').classList.add(class_color_center) ;
	    	document.querySelector('#text_level_by_control_center').innerHTML = event_level_by_control_center ;
		}
		if (event_level_by_officers) {
			// document.querySelector('#show_level_by_officers').classList.remove('d-none') ;
			switch(event_level_by_officers){
				case 'แดง(วิกฤติ)':
					class_color_officers = 'situation-red';
				break;
				case 'เหลือง(เร่งด่วน)':
					class_color_officers = 'situation-yellow';
				break;
				case 'เขียว(ไม่รุนแรง)':
					class_color_officers = 'situation-green';
				break;
				case 'ขาว(ทั่วไป)':
					class_color_officers = 'situation-normal';
				break;
				case 'ดำ':
					class_color_officers = 'situation-black';
				break;
			}
			document.querySelector('#show_level_by_officers').classList.add(class_color_officers) ;

			if (event_level_by_officers != "ดำ") {
	    		document.querySelector('#text_level_by_officers').innerHTML = event_level_by_officers ;
			}else{
	    		document.querySelector('#text_level_by_officers').innerHTML = event_level_by_officers + " : " + event_level_rc_black_text ;
			}

		    document.querySelector('#tag_i_edit_level_officer').classList.remove('text-warning');
		    document.querySelector('#tag_i_edit_level_officer').classList.add('text-white');

		}
	}

	// ------------------------------------------------------------------------------------------

	function update_status(status , sos_id , reason){

        status_sos = status ;
        document.querySelector('#show_status').innerHTML = status_sos ;
		fetch("{{ url('/') }}/api/update_status_officer" + "/" + status + "/" + sos_id + "/" + reason)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (status_sos === "ถึงที่เกิดเหตุ") {

                	document.querySelector('#div_btn_to_the_scene').classList.add('d-none');
                	document.querySelector('#div_km_create_sos_to_go_to_help').classList.add('d-none');
                	document.querySelector('#div_event_level').setAttribute('style','top:calc(100% - 70px) !important;');

                }else if(status_sos === "เสร็จสิ้น"){

                	document.querySelector('#situation_of_status').classList.add('situation-green');

                	if (reason != 'null') {
                		reason = reason.replaceAll("_" , " ");
			    		document.querySelector('#show_remark_status').innerHTML = '(' + reason +')';
					}

                	document.querySelector('#div_select_treatment').classList.add('d-none');
                	document.querySelector('#div_km_to_the_scene_to_leave_the_scene').classList.add('d-none');

					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงฐาน' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_operating_base').classList.remove('d-none') ; // input เลข

                	document.querySelector('#div_operating_base').classList.remove('d-none');
					document.querySelector('#menu_3').style = "bottom: -4.5rem" ;

                	document.querySelector('#div_to_hospital').classList.add('d-none');

                	if ( reason == "ส่งต่อชุดปฏิบัติการระดับสูงกว่า" ){
                		fetch("{{ url('/') }}/api/forward_operation" + "/" + sos_id )
				            .then(response => response.text())
				            .then(result => {
				                console.log(result);
				        });
                	}else{
	                	fetch("{{ url('/') }}/api/send_flex_help_complete" + "/" + sos_id )
				            .then(response => response.text())
				            .then(result => {
				                // console.log(result);
				        });
				    }

                }else if(status_sos === "ออกจากที่เกิดเหตุ"){

                	document.querySelector('#show_remark_status').innerHTML = '' ;
                	document.querySelector('#show_remark_status').classList.add('d-none') ;

                	document.querySelector('#div_select_treatment').classList.add('d-none');
                	document.querySelector('#div_km_to_the_scene_to_leave_the_scene').classList.add('d-none');

					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงโรงพยาบาล' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_hospital').classList.remove('d-none') ; // input เลข

					document.querySelector('#menu_3').style = "bottom: -4.5rem" ;
                	document.querySelector('#div_to_hospital').classList.remove('d-none');

                }

        });
	}

	function update_event_level_rc(level , sos_id){

        text_event_level = level ;
        event_level_by_officers = level ;

        let class_color_old = document.querySelector('#text_level_by_officers').classList[4] ;
        document.querySelector('#text_level_by_officers').classList.remove(class_color_old);

        let input_rc_black_text = 'null' ;

        switch(text_event_level){
			case 'แดง(วิกฤติ)':
				class_color_officers = 'situation-red';
				text_level_for_rc_vehicle = text_event_level ;
			break;
			case 'เหลือง(เร่งด่วน)':
				class_color_officers = 'situation-yellow';
				text_level_for_rc_vehicle = text_event_level ;
			break;
			case 'เขียว(ไม่รุนแรง)':
				class_color_officers = 'situation-green';
				text_level_for_rc_vehicle = text_event_level ;
			break;
			case 'ขาว(ทั่วไป)':
				class_color_officers = 'situation-normal';
				text_level_for_rc_vehicle = text_event_level ;
			break;
			case 'ดำ':
				class_color_officers = 'situation-black';
				text_level_for_rc_vehicle = text_event_level ;
			break;
			case 'rc_black_text':
				class_color_officers = 'situation-black';
				input_rc_black_text = document.querySelector('#rc_black_text').value;
			break;
		}

		let class_drop = document.querySelector('#show_level_by_officers').classList[3] ;
        // console.log(class_drop);

		document.querySelector('#show_level_by_officers').classList.remove(class_drop) ;
		document.querySelector('#show_level_by_officers').classList.add(class_color_officers) ;

		if (text_event_level != "rc_black_text") {
    		document.querySelector('#text_level_by_officers').innerHTML = text_event_level ;
		}else{
    		document.querySelector('#text_level_by_officers').innerHTML = "ดำ : " + input_rc_black_text ;
		}

		fetch("{{ url('/') }}/api/update_event_level_rc" + "/" + level + "/" + sos_id + "/" + input_rc_black_text)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (level === 'ดำ') {
                	document.querySelector('#div_event_level').classList.add('d-none');
                	document.querySelector('#div_add_rc_black_text').classList.remove('d-none');
                }else{
                	document.querySelector('#div_event_level').classList.add('d-none');
                	document.querySelector('#div_select_treatment').classList.remove('d-none');
                    document.querySelector('#div_select_treatment').setAttribute('style','top:calc(100% - 70px); margin: auto;');
                	document.querySelector('#div_add_rc_black_text').classList.add('d-none');
        			start_page();
                }

		    	document.querySelector('#tag_i_edit_level_officer').classList.remove('text-warning');
		    	document.querySelector('#tag_i_edit_level_officer').classList.add('text-white');

        });

	}

	function update_data_form_yellows(column , data){

		let sos_id = '{{ $data_sos->id }}' ;

		fetch("{{ url('/') }}/api/update_data_form_yellows" + "/" + sos_id + "/" + column + "/" + data)
            .then(response => response.text())
            .then(result => {
                // console.log(result);


        });

	}

	// UPDATE เจ้าหน้าที่กลับถึงฐาน
	function officer_to_the_operating_base(sos_id){

		fetch("{{ url('/') }}/api/update_officer_to_the_operating_base" + "/" + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === 'Updated successfully') {
                	document.querySelector('#tag_a_switch_standby').click();
                }

        });
	}

	function check_btn_select_treatment(){

		var check_treatment = document.getElementsByName('treatment');
		// เช็คช่อง input ว่าเลือกมีการรักษาหรือไม่
		for (var i = 0, length = check_treatment.length; i < length; i++) {
			if (check_treatment[i].checked) {
				if(check_treatment[i].value == "มีการรักษา"){
					update_data_form_yellows('treatment','มีการรักษา');
					document.querySelector('#treatment_no').classList.add('d-none');
					document.querySelector('#treatment_yes').classList.remove('d-none');
					document.querySelector('#treatment_yes').classList.add('show-data');
                    document.querySelector('#div_select_treatment').setAttribute('style','top:calc(100% - 120px); margin: auto;');
				}else{
					update_data_form_yellows('treatment','ไม่มีการรักษา');
					document.querySelector('#treatment_yes').classList.add('d-none');
					document.querySelector('#treatment_no').classList.remove('d-none');
					document.querySelector('#treatment_no').classList.add('show-data');
                    document.querySelector('#div_select_treatment').setAttribute('style','top:calc(100% - 70px); margin: auto;');
				}
				break;
			}
		}
	}

	function update_mileage_officer(sos_id , location ,title){

		mileage_location = location ;

		switch(mileage_location){
			case 'km_create_sos_to_go_to_help':
				mileage = document.getElementById("km_create_sos_to_go_to_help").value;
				div_id_next = "div_btn_to_the_scene" ;
				km_go_to_help = mileage ;
			break;
			case 'km_to_the_scene_to_leave_the_scene':
				mileage = document.getElementById("km_to_the_scene_to_leave_the_scene").value;
				div_id_next = "div_event_level" ;
				km_to_the_scene = mileage ;
			break;
			case 'km_hospital':
				mileage = document.getElementById("km_hospital").value;
				div_id_next = "div_operating_base" ;
				km_hospital = mileage ;
			break;
			case 'km_operating_base':
				mileage = document.getElementById("km_operating_base").value;
				div_id_next = "" ;
				km_operating_base = mileage ;
			break;
		}


		if (!mileage) {
			document.querySelector('#text-alert').innerHTML = title ;
			document.querySelector('#alert_phone').classList.add('up-down');
			const animated = document.querySelector('.up-down');
			animated.onanimationend = () => {
				document.querySelector('#alert_phone').classList.remove('up-down');
			};


		}else{

			fetch("{{ url('/') }}/api/update_mileage_officer" + "/" + sos_id + "/" + mileage + "/" + location)
				.then(response => response.json())
				.then(result => {
					// console.log(result);

					// if (result === 'Updated successfully') {
					// 	document.querySelector('#tag_a_switch_standby').click();
					// }
				});

			switch(mileage_location){
				case 'km_create_sos_to_go_to_help':
					document.querySelector('#div_km_create_sos_to_go_to_help').classList.add('d-none') ;
					document.querySelector('#' + div_id_next).classList.remove('d-none');

					// เปิดปุ่มถัดไป
					document.querySelector('#div_mileage').classList.remove('d-none'); // div เลข กม.
					document.querySelector('#title_div_mileage').innerHTML = 'ถึงที่เกิดเหตุ' ; // หัวข้อเลข กม. รถ
					document.querySelector('#div_km_to_the_scene_to_leave_the_scene').classList.remove('d-none') ; // input เลข

					document.querySelector('#menu_3').style = "bottom: -4.5rem" ;
				break;
				case 'km_to_the_scene_to_leave_the_scene':
					update_status('ถึงที่เกิดเหตุ' , '{{ $data_sos->id }}' , 'null');

					setTimeout(function() {
			        	// เปิดปุ่มถัดไป
						document.querySelector('#div_mileage').classList.add('d-none');
						document.querySelector('#' + div_id_next).classList.remove('d-none');

						document.querySelector('#menu_3').style = "bottom: 7.5rem" ;
			        }, 1000);

				break;
				case 'km_hospital':
					update_status('เสร็จสิ้น' , '{{ $data_sos->id }}' , 'ถึงโรงพยาบาล');

					setTimeout(function() {
			        	// เปิดปุ่มถัดไป
						document.querySelector('#' + div_id_next).classList.remove('d-none');
						document.querySelector('#div_km_operating_base').classList.remove('d-none');

						document.querySelector('#div_km_hospital').classList.add('d-none');
			        }, 1000);

				break;
				case 'km_operating_base':
					// เปิดปุ่มถัดไป
					document.querySelector('#div_operating_base').classList.add('d-none');
					document.querySelector('#div_mileage').classList.add('d-none');

					officer_to_the_operating_base('{{ $data_sos->id }}');
				break;
			}
		}
	}

	function click_edit_level_officer(){

		show_data_menu(3);
		// document.querySelector('#menu_3').style = "bottom: -2rem" ;

		let btn_update_status = document.querySelectorAll('div[div_name="btn_update_status"]');
		let check_btn_update_status = "No" ;
			btn_update_status.forEach(btn_update_status => {
			    // console.log(btn_update_status.classList);
			    if(!btn_update_status.classList[0]){
			    	check_btn_update_status = 'Yes';
			    }else{
			    	check_btn_update_status = check_btn_update_status ;
			    }
			}) 

		// console.log(check_btn_update_status);

		if(check_btn_update_status == 'Yes'){
        	document.querySelector('#div_event_level').setAttribute('style','top:calc(100% - 270px) !important;');
		}else{
        	document.querySelector('#div_event_level').setAttribute('style','top:calc(100% - 70px) !important;');
		}

		document.querySelector('#div_mileage').classList.add('d-none');
		document.querySelector('#div_add_rc_black_text').classList.add('d-none');
		document.querySelector('#div_select_treatment').classList.add('d-none');
		document.querySelector('#div_btn_to_the_scene').classList.add('d-none');
		document.querySelector('#div_to_hospital').classList.add('d-none');
		document.querySelector('#div_operating_base').classList.add('d-none');

		setTimeout(() => {
			// document.querySelector('#div_event_level').classList.add('song_rem');
			document.querySelector('#div_event_level').classList.remove('d-none');
		}, 200);

	}

</script>

<!-- MAP SUCCESS -->
<script>
	function open_map_status_success() {

        let m_numZoom = parseFloat('17');

        map_show_case = new google.maps.Map(document.getElementById("map_show_case"), {
            center: {lat: parseFloat(sos_lo_lat), lng: parseFloat(sos_lo_lng) },
            zoom: m_numZoom,
        });

        // หมุดที่เกิดเหตุ
        if (sos_marker) {
            sos_marker.setMap(null);
        }
        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(sos_lo_lat) , lng: parseFloat(sos_lo_lng) },
            map: map_show_case,
            icon: image_sos,
        });
    }
</script>



<script>
	function check_add_img(){
		document.getElementById('add_select_img').classList.add('d-none')
		document.getElementById('photo_sos_by_officers').classList.add('d-none');
		document.getElementById('show_photo_sos_by_officers').classList.remove('d-none');

	}

	function check_add_img_succeed(){
		document.getElementById('add_select_img_photo_succeed').classList.add('d-none')
		document.getElementById('photo_succeed').classList.add('d-none');
		document.getElementById('show_photo_succeed').classList.remove('d-none');
	}
</script>

<!-- เสียงพูด -->
<script>

	function viicheck_speech(message_speech){

		// console.log("viicheck_speech >> " + message_speech)

		if(open_viicheck_speak == "Yes"){
			// check if the browser supports the Web Speech API
			if ('speechSynthesis' in window) {

			  	// create a new SpeechSynthesisUtterance object
			  	const message = new SpeechSynthesisUtterance();

			  	// set the text that you want to convert to audio in Thai
			  	message.text = message_speech;

			  	// set the language to use (in this case, Thai)
			  	message.lang = 'th-TH';

			  	// get the Thai voice from the available voices
			 	 const voices = window.speechSynthesis.getVoices();
			  	// filter for a female voice
			  	const femaleVoice = voices.find(voice => voice.lang === 'th-TH');
			  	message.voice = femaleVoice;

			  	// set the volume, pitch, and rate
			  	message.volume = 1;
			 	message.pitch = 0.75;
			  	message.rate = 0.75;

			  	// play the audio
			  	window.speechSynthesis.speak(message);

			}
		}

	}

    // Listen for a click event on the button
    function check_click_btn_open_or_close_viicheck_speak(){

    	let btn = document.querySelector('#btn_open_or_close_viicheck_speak');
	  // Toggle the icon and update the variable
	  if (open_viicheck_speak === "No") {
	    btn.innerHTML = '<i class="fa-solid fa-volume-high"></i>';
	    open_viicheck_speak = "Yes";
	  } else {
	    btn.innerHTML = '<i class="fa-solid fa-volume-slash"></i>';
	    open_viicheck_speak = "No";
	  }

	  // console.log('open_viicheck_speak >> ' + open_viicheck_speak );
	}

    //================ for call div ===================
    var status_show_div_right = "hide";
    var user_click_div = "no";
    var check_status_room = "no";

    function hide_or_show_Div(type) {

	    let divDataRight = document.getElementById('div_data_right');

	    let btn_right = document.querySelector('#btn_hide_or_show_Div_right');
	    let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

	    status_show_div_right = type ;

        if(check_status_room == "no"){
            if(type == "show"){
                btn_right.setAttribute('onclick' , "hide_or_show_Div('hide');");
                // divDataRight.style.right = '5px';
                divDataRight.classList.add('active_div_data_right');
                divDataRight.classList.remove('Inactive_div_data_right');
                icon_right.setAttribute('class' , "fa-solid fa-chevrons-right");
            }else{
                btn_right.setAttribute('onclick' , "hide_or_show_Div('show');");
                // divDataRight.style.right = '-310px';
                divDataRight.classList.remove('active_div_data_right');
                divDataRight.classList.add('Inactive_div_data_right');
                icon_right.setAttribute('class' , "fa-solid fa-phone");
            }
        }else{
            if(type == "show"){
                btn_right.setAttribute('onclick' , "hide_or_show_Div('hide');");
                // divDataRight.style.right = '5px';
                divDataRight.classList.add('active_div_data_right');
                divDataRight.classList.remove('Inactive_div_data_right');
                icon_right.setAttribute('class' , "fa-solid fa-chevrons-right");
            }else{
                btn_right.setAttribute('onclick' , "hide_or_show_Div('show');");
                // divDataRight.style.right = '-310px';
                divDataRight.classList.remove('active_div_data_right');
                divDataRight.classList.add('Inactive_div_data_right');
                icon_right.setAttribute('class' , "fa-solid fa-phone fa-shake text-success");
            }
        }

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
        let sos_id = '{{ $data_sos->id }}' ;
        let user_id = '{{Auth::user()->id}}';
        // console.log("เช็คผู้ใช้ใน operation meet");

        check_user_in_operation_meet = setInterval(function() {
            fetch("{{ url('/') }}/api/check_user_for_operation_meet" + "?sos_id=" + sos_id + "&type_check=" + "show_case" + "&user_id=" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log("result check_user_for_operation_meet");
                // console.log(result);
                // console.log("first_operation_meeting :" + first_operation_meeting);

                if(result == "เจ้าหน้าที่ปฎิบัติการอยู่กับหน่วยอื่น"){
                    first_operation_meeting = true;
                }

                if(result == "ไม่มีใครอยู่ในห้องสนทนา"){
                    first_operation_meeting  = false;
                }

                if (result == "do") {  // มี not_command อยู่ในห้องสนทนา
                    if (first_operation_meeting == false) {
                        // console.log("เล่น เสียงแจ้งเตือน result == do --> if");
                        check_status_room = "yes";
                        status_pause_ringtone = true; // true = กดปุ่มปิดเสียงได้

                        let btn_hide_or_show = document.getElementById('btn_hide_or_show_Div_right');
                        let btn_mute = document.querySelector('#btn_mute');
                        let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

                        let btn_call = document.querySelector('#btn_call');
                            btn_call.setAttribute('class','btn_call_pulse');

                        if(status_show_div_right == "show"){

                            icon_right.setAttribute('class','fa-solid fa-chevrons-right');

                            btn_mute.classList.remove('d-none');
                        }else{
                            if(user_click_div == "no"){ // ถ้าผู้ใช้ยังไม่เคยกดซ่อนแท็บ ให้ เด้งแท็บโทรออกมา
                                // console.log("user_click_div no");
                                btn_hide_or_show.click();

                                btn_mute.classList.remove('d-none');

                                user_click_div = "yes";
                            }else{
                                // console.log("user_click_div yes");
                                icon_right.setAttribute('class','fa-solid fa-phone fa-shake text-success');

                                btn_mute.classList.remove('d-none');
                            }
                        }

                        if(ringtone_first_play_check == 0){
                            play_ringtone_operation();
                        }
                    } else {
                        // console.log("เล่น เสียงแจ้งเตือน result == do --> else");
                        check_status_room = "no";
                        let btn_hide_or_show = document.getElementById('btn_hide_or_show_Div_right');
                        let btn_mute = document.querySelector('#btn_mute');
                        let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

                        let btn_call = document.querySelector('#btn_call');
                            btn_call.setAttribute('class','btn_call');

                        if(status_show_div_right == "show"){
                            icon_right.setAttribute('class','fa-solid fa-chevrons-right');
                            btn_mute.classList.add('d-none'); //ซ่อนปุ่ม mute เสียง
                        }else{
                            icon_right.setAttribute('class','fa-solid fa-phone');
                            btn_mute.classList.add('d-none');//ซ่อนปุ่ม mute เสียง
                        }

                        stop_ringtone_operation();
                    }

                }else{
                    // console.log("เล่น เสียงแจ้งเตือน result != do ");
                    check_status_room = "no";
                    let btn_hide_or_show = document.getElementById('btn_hide_or_show_Div_right');
                    let btn_mute = document.querySelector('#btn_mute');
                    let icon_right = document.querySelector('#icon_hide_or_show_Div_right');

                    let btn_call = document.querySelector('#btn_call');
                        btn_call.setAttribute('class','btn_call');

                    if(status_show_div_right == "show"){
                        icon_right.setAttribute('class','fa-solid fa-chevrons-right');
                        btn_mute.classList.add('d-none'); //ซ่อนปุ่ม mute เสียง
                    }else{
                        icon_right.setAttribute('class','fa-solid fa-phone');
                        btn_mute.classList.add('d-none');//ซ่อนปุ่ม mute เสียง
                    }

                    stop_ringtone_operation();
                }

            });

        }, 5000);
    }





    //=============== end for call div ===================

</script>
<!-- จบ เสียงพูด -->

@endsection
