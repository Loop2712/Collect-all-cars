
<!doctype html>
<html lang="en" id="html_class">


<head>

	<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- loader-->
	<link href="{{ asset('partner_new/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('partner_new/js/pace.min.js') }}"></script>



	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('partner_new/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('partner_new/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('partner_new/plugins/notifications/css/lobibox.min.css') }}" />
	<link href="{{ asset('/partner_new/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- izitoast -->
	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>


	<link rel='stylesheet' href='https://unpkg.com/izitoast/dist/css/iziToast.min.css'>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('partner_new/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('partner_new/css/header-colors.css') }}" />
	<!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('/partner/fonts/fontawesome/css/fontawesome-all.min.css') }}">
 	<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

	<!-- carousel -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;400&family=Taviraj&display=swap" rel="stylesheet">
    <!-- datatables -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" /> --}}

	<title id="title_theme">Partner Viicheck</title>

	<style>
		.main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
        .main-radius{
            border-radius: 5px;
        }

        .profile-circle {
            width: 75px; /* ปรับขนาดตามที่คุณต้องการ */
            height: 75px; /* ปรับขนาดตามที่คุณต้องการ */
            object-fit: cover; /* ปรับขนาดภาพให้เต็มพื้นที่องค์ประกอบ */
            border-radius: 50%; /* ทำให้รูปเป็นวงกลม */
            border-style: solid;
            border-width: 3px;
            border-color: lightblue;
        }

		.notify_alert{
          animation-name: notify_alert;
          color: red;
          animation-duration: 4s;
          animation-iteration-count: 99;
        }

        .notify_alert_gotohelp{
          animation-name: notify_alert_gotohelp;
          color: #ffffff;
          background-color: red;
          animation-duration: 4s;
          animation-iteration-count: 99;
        }

        a.disabled {
		  pointer-events: none;
		  cursor: default;
		  opacity: 0.2;
		}

		.main-disabled {
		  pointer-events: none;
		  cursor: default;
		  opacity: 0.4;
		}

        @keyframes notify_alert {
          0%   {color: red;}
          20%  {color: yellow;}
          40%  {color: red;}
          60% {color: yellow;}
          80%   {color: red;}
          100%  {color: yellow;}

        }

        @keyframes notify_alert_gotohelp {
          0%   {background-color: red;
          		color: #ffffff;}
          20%  {background-color: yellow;
          		color: #000000;}
          40%  {background-color: red;
          		color: #ffffff;}
          60% {background-color: yellow;
          		color: #000000;}
          80%   {background-color: red;
          		color: #ffffff;}
          100%  {background-color: yellow;
          		color: #000000;}

        }

		.bg-color-progressbar {
		  animation-name: change-color;
		  animation-duration: 10s;
		  animation-timing-function: linear;
		  animation-iteration-count: infinite;
		  background-color: green;
		  animation-play-state: running;
		}

		@keyframes change-color {
		  0% {background-color: green;}
		  30% {background-color: yellow;}
		  50% {background-color: orange;}
		  100% {background-color: red;}
		}

		.border-color-change-color {
		  animation-name: change-color-border;
		  animation-duration: 10s;
		  animation-timing-function: linear;
		  animation-iteration-count: infinite;
		  border-width: 2px;
		  border-style: solid;
		  border-radius: 20px;
		  border-color: green;
		  animation-play-state: running;
		}

		@keyframes change-color-border {
		  0% {border-color: green;}
		  30% {border-color: yellow;}
		  50% {border-color: orange;}
		  100% {border-color: red;}
		}

		.iziToast_forward {
		  	border: 10px solid yellow;
		  	animation: change-bordercolors;
		  	animation-play-state: running;
		  	animation-duration: 10s;
		  	animation-timing-function: linear;
		  	animation-iteration-count: infinite;
		  	background-image: url("https://www.viicheck.com/img/icon/sos_warning.gif") !important;
		}

		@keyframes change-bordercolors {
		  0% { border-color: yellow; }
		  10% { border-color: red; }
		  20% { border-color: yellow; }
		  30% { border-color: red; }
		  40% { border-color: yellow; }
		  50% { border-color: red; }
		  60% { border-color: yellow; }
		  70% { border-color: red; }
		  80% { border-color: yellow; }
		  90% { border-color: red; }
		  100% { border-color: yellow; }
		}
		.userSosWait {
			-webkit-transition: all 0.2s;
			-o-transition: all 0.2s;
			transition: all 0.2s;
			padding: .5rem;

		}

		.userSosWait:hover {
			background-color: #f8f9fa;
			border-radius: 10px;
			margin-top: -.25rem;
			margin-bottom: .25rem;
			-webkit-box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.2);
			box-shadow: 0 0.25rem 0.5rem 0 rgba(0, 0, 0, 0.2);
		}.btnSosWait{
			outline: 1px solid #dee2e6;
			border-radius: .375rem;
			background-color: #fff;
			padding:  .5rem 1rem;
			color: #2b2a2a;
			font-family: 'Mitr', sans-serif;
			transition: all .15s ease-in-out;


		}
		.btnSosWait:hover{
			border: 1px solid #dee2e6;
			background-color: #2b2a2a;
			color: #fff;
			outline-offset: .1rem;

		}
	</style>
	<!-- for sos -->
	<style>
        .owl-nav {
            display: flex;
            justify-content: space-between;
        }

        .owl-stage {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-box;
            display: box;
            padding-top: 1rem;
        }

        .owl-carousel .owl-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .owlOfficer .owl-nav .owl-prev {
            background-color: #000000;
            border-radius: 50%;
            margin-left: -10px;
            margin-top: -5.5rem;
        }

        .owlOfficer .owl-nav .owl-next {
            background-color: #000000;
            border-radius: 50%;
            margin-right: -30px!important;
            margin-top: -5.5rem;

        }

        .owlItemOfficer {
            -webkit-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
            padding: .5rem;

        }

        .owlItemOfficer:hover {
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-top: -.25rem;
            margin-bottom: .25rem;
            -webkit-box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 0.25rem 0.5rem 0 rgba(0, 0, 0, 0.2);
        }

        .owlItemOfficer {
            display: flex;
            align-items: center;
            padding: .5rem 1rem;
        }

        .owlNameOfficer {
            color: #000000;
            font-family: 'Mitr', sans-serif;
        }

        .owl-next span,
        .owl-prev span {
            font-size: 2rem;
        }

        .badgeImg {
            position: relative;
            display: inline-block;
        }

        .badgeOnImg {
            position: absolute;
            color: #fff;
            background-color: #f5424e;
            font-size: 10px;
            padding: 1px 5px;
            border-radius: 8px;
            top: -5px;
            right: -5px;
        }

        .headerOwl {
            display: block;
            height: 18px;
            border-bottom: solid 1px #000;
            text-align: left;
        }

        .headerOwl span {
            display: inline-block;
            background-color: #fff;
            padding: 0 10px;
            font-family: 'Mitr', sans-serif;
        }

        .headerCardOfficer {
            font-family: 'Mitr', sans-serif;
        }

        .cardAlertOfficer {
            padding: 1rem;
        }

        .iziToast-buttons{
        	width: 100% !important;
        }

        .width-40{
        	width: 40% !important;
        }

        /*.iziToast-texts{
        	width: 100% !important;
        }*/


        /*แจ้งเตือน SOS ยังไม่ได้ดำเนินการ*/


.nav-wait-officer .nav-link.active {
		border-color: red red #fff !important;
        font-family: 'Mitr', sans-serif;
		color: red !important;
	}.nav-wait-data .nav-link.active {
		border-color: blue blue #fff !important;
        font-family: 'Mitr', sans-serif;
		color: blue !important;
	}
	.btnCloseModal{
		position: absolute;
		top: 5px;
		right: 5px;
	}

/*ปุ่ม ค้นหา level เจ้าหน้าที่ใน map */
.level {
    width: 38px !important;
    height: 38px !important;
    padding: 10px;
    border-radius: 50%;
    font-size: 13px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}

.FR {
    background-color: #24b333;
    color: white;
}

.BLS {
    background-color: #fac831;
    color: drak;
}

.ILS {
    background-color: #faa507;
    color: drak;
}

.ALS {
    background-color: #ce1124;
    color: white;

}



.menu-select-one-lv-all ,.menu-select-lv-all{
    background-color: #fff!important;
    color: #8833ff !important;
    border: #8833ff 1px solid !important;
    border-radius: 5px 0 0 5px !important;
}
.all-active {
    background-color: #8833ff !important;;
    color: #ffffff !important;
}

.menu-select-one-lv-fr ,.menu-select-lv-fr{
    background-color: #fff!important;
    color: #24b333 !important;
    border: #24b333 1px solid !important;
    border-radius: 0px !important;
}
.fr-active {
    background-color: #24b333 !important;
    color: #ffffff !important;
}

.menu-select-one-lv-bls ,.menu-select-lv-bls{
   background-color: #fff!important;
    color: #fac831 !important;
    border: #fac831 1px solid !important;
    border-radius: 0px !important;
}
.bls-active {
    background-color: #fac831!important;
    color: #ffffff !important;
}

.menu-select-one-lv-ils ,.menu-select-lv-ils{
    background-color: #fff!important;
    color: #faa507 !important;
    border: #faa507 1px solid !important;
    border-radius: 0px !important;
}
.ils-active {
    background-color: #faa507!important;
    color: #ffffff !important;
}

.menu-select-one-lv-als ,.menu-select-lv-als{
    background-color: #fff!important;
    color: #ce1124 !important;
    border: #ce1124 1px solid !important;
    border-radius:  0 5px 5px  0!important;
}
.als-active {
    background-color: #ce1124!important;
    color: #ffffff !important;
}

.gm-style-iw{
    max-width: 250px !important;
    padding: 500px;
}.btn-select-officer{
    width:50px!important;
    color:white!important;
    background-color:#24b333!important;
    border-radius:25px !important;
}
.btn-select-officer:hover{
    color:#24b333!important;
    background-color:white!important;
    border:1px solid #24b333;
}

.menu-select-vehicle-officer-all{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;

}


.menu-select-vehicle-officer-car{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}


.menu-select-vehicle-officer-aircraft{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius:25px!important;
}



.menu-select-vehicle-officer-boat-1{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}

.menu-select-vehicle-officer-boat-2{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}

.menu-select-vehicle-officer-boat-3{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius:25px !important;
}

.menu-select-vehicle-officer-boat-other{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}




.menu-select-vehicle-all{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;

}


.menu-select-vehicle-car{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}


.menu-select-vehicle-aircraft{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius:25px!important;
}



.menu-select-vehicle-boat-1{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}

.menu-select-vehicle-boat-2{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}

.menu-select-vehicle-boat-3{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius:25px !important;
}

.menu-select-vehicle-boat-other{
    background-color: #fff!important;
    color: #00438c !important;
    border: #00438c 1px solid !important;
    border-radius: 25px !important;
}


.vehicle-one-officer-active {
    background-color: #00438c !important;
    color: #ffffff !important;
}




/*
.countWaiting{
	position: absolute;
	top: -12px;
  left: -12px;
  background-color: blue;
  color: white;
  width: 24px;
  height: 24px;
  font-size: 16px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
} */

@keyframes border-flash-danger {
  0% {
    box-shadow: 0 0 0 2px white;
  }
  50% {
    box-shadow: 0 0 0 2px red;
  }
  100% {
    box-shadow: 0 0 0 2px white;
  }
}

@keyframes border-flash-blue {
  0% {
    box-shadow: 0 0 0 2px white;
  }
  50% {
    box-shadow: 0 0 0 2px blue;
  }
  100% {
    box-shadow: 0 0 0 2px white;
  }
}
        .notification_group{
			position: fixed;
			bottom: 20px;
  			left: 60px;
			float: right;
			z-index: 99999;

		}
		.notification-icon {
			position: relative;
			margin-right: 10px;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			z-index: 99999;
			/* animation: border-flash 1s infinite; */
		}
		.notification-count {
			position: absolute;
			top: -12px;
			right: -12px;
			/* background-color: red; */
			color: white;
			width: 24px;
			height: 24px;
			font-size: 16px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.count-danger{
			background-color: red;
		}

		.count-blue{
			background-color: blue;
		}

		.notification-danger{
			background-color: #fc6d6d;
			animation: border-flash-danger 1s infinite;
		}
		.notification-primary{
			background-color: #4e73ff;
			animation: border-flash-blue 1s infinite;
		}.badge-pill{
			font-size: .8rem;
		}

    </style>
</head>

<body>
	<!-- ///// แจ้งเตือน SOS ยังไม่ได้ดำเนินการ ///// -->
	<div class="notification_group">

		<!-- <button data-toggle="modal" data-target="#modal_show_sos_wait" onclick="click_show_data_sos_hepl_wait('wait');">asdas</button> -->

		<!-- div_noti_wait -->
		<div id="div_noti_wait" class="notification-icon d-none float-end notification-danger" data-toggle="modal" data-target="#modal_show_sos_wait" onclick="click_show_data_sos_hepl_wait('wait');">
		  	<span class="notification-count count-danger">
		  		<span class="text-white" id="show_count_sos_wait">0</span>
		  	</span>
		  	<i class="fa-solid fa-light-emergency-on fa-shake text-white" style="font-size: 18px;"></i>
		</div>
		<!-- div_noti_helping -->
		<div id="div_noti_helping" class="notification-icon d-none float-end notification-primary" data-toggle="modal" data-target="#modal_show_sos_wait" onclick="click_show_data_sos_hepl_wait('helping');">
		  	<span class="notification-count count-blue">
		  		<span class="text-white" id="show_count_sos_helping">0</span>
		  	</span>
		  	<!-- <i class="fa-solid fa-light-emergency-on fa-shake text-white" style="font-size: 18px;"></i> -->
		  	<i class="fa-duotone fa-spinner fa-spin-pulse text-white" style="font-size: 18px;"></i>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="modal_show_sos_wait" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card-body">
					<ul class="nav nav-tabs mb-0" role="tablist">
						<li class="nav-item nav-wait-data col-6" role="presentation">
							<a id="li_show_helping" class="nav-link" data-bs-toggle="tab" href="#wait_data" role="tab" aria-selected="false">
								<div class="d-flex align-items-center">
									<div class="tab-icon">
										<i class="bx bx-bookmark-alt font-18 me-1"></i>
									</div>
									<div class="tab-title">เคสที่ดำเนินการอยู่</div>
								</div>
							</a>
						</li>
						<li class="nav-item nav-wait-officer col-6" role="presentation">
							<a id="li_show_wait" class="nav-link active " data-bs-toggle="tab" href="#modal_show_sos_wait_body" role="tab" aria-selected="true">
								<div class="d-flex align-items-center">
									<div class="tab-icon">
										<i class="bx bx-comment-detail font-18 me-1"></i>
									</div>
									<div class="tab-title"> เคสรอสั่งการ </div>
								</div>
							</a>
						</li>
					</ul>
					<button type="button" class="btnCloseModal btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="tab-content pt-3">
						<div class="tab-pane fade active" id="modal_show_sos_wait_body" role="tabpanel">
							<!-- รอสั่งการ -->

							<!-- Mock up รอสั่งการ -->
							<div class="userSosWait d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
								<div class="mr-5">
									<img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/21.png" class="imgSos" width="70" height="70" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">lucky</h6>
									<p class="mb-0 font-13 text-secondary">081-234-5678</p>
									<span class="badge badge-pill bg-light-danger text-danger " > <span>ผ่านมาแล้ว</span> <span>15 นาที</span></span>
								</div>
								<div class="list-inline d-flex  ms-auto">
									<a onclick="sos_1669_command_by('{{ Auth::user()->id }}' , `+ result[i_wait]['id'] +`);" class="btnSosWait">สั่งการ</a>
								</div>
							</div>
							<!-- END Mock up รอสั่งการ -->

						</div>
						<style>
							.mr{
								margin-right: .5rem	!important;
							}.pl{
								padding-left: .5rem !important;
							}.imgSos{
								border-radius: 5px;
								object-fit: cover;
								margin-right: .7rem;
							}
						</style>

						<div class="tab-pane fade" id="wait_data" role="tabpanel">
							<!-- เคสที่ดำเนินการอยู่ -->


							<!-- Mock up เคสที่ดำเนินการอยู่ -->
							<div class="userSosWait d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
								<div class="mr-5">
									<img src="http://localhost/Collect-all-cars/public/img/stickerline/PNG/21.png" class="imgSos" width="70" height="70" alt="" />
								</div>

								<div class="w-100 pl">
									<div class="d-flex align-items-center">
										<h6	h6 class="d-flex align-items-center mr"> 2050-1553-1551</h6>
										<span class="badge badge-pill bg-light-danger text-danger mr" > IDC <br> เขียว </span>
										<span class="badge badge-pill bg-light-danger text-danger mr" > RC <br> แดง </span>
										<span class="badge badge-pill bg-light-danger text-danger ms-auto" > ออกจากฐาน </span>
									</div>

									<div class="d-flex align-items-center row mt-2">
										<div class="col-6 border-right">
											<h6 class="mb-1 font-14">ข้อมูลผู้ขอความช่วยเหลือ</h6>
											<p class="mb-0 font-13 text-secondary">lucky</p>
											<p class="mb-0 font-13 text-secondary">081-234-5678</p>

										</div>
										<div class="col-6">
											<div class="w-100">
												<span class="mb-1 font-14 h5">ข้อมูลหน่วยปฏิบัติการ</span>
												<div class="float-end">
													<span class="badge badge-pill bg-light-danger text-danger mr" > aa </span>
													<span class="badge badge-pill bg-light-danger text-danger" > aa </span>
												</div>
											</div>
											<p class="mb-0 font-13 text-secondary">ชื่อเจ้าหน้าที่ : Thanakorn</p>
											<p class="mb-0 font-13 text-secondary">หน่วยปฏิบัติการ : วีเช็ค</p>
										</div>
									</div>
								</div>

							</div>
							<!-- END Mock up เคสที่ดำเนินการอยู่ -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- <div class="text-nocopy modal" id="modal_show_sos_wait" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_show_sos_wait" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="Label_show_sos_wait">
	                    ... :
	                </h5>
	                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<div class="row" id="modal_show_sos_wait_body">
	            	</div>
	            </div>
	            <div class="modal-footer d-none">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary">Understood</button>
	            </div>
	        </div>
	    </div>
	</div> -->
	<!-- ///// จบ แจ้งเตือน SOS ยังไม่ได้ดำเนินการ ///// -->


	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div id="switcher-wrapper_menu" class="sidebar-wrapper menu-background" data-simplebar="true">
			<div id="header-wrapper_menu" class="sidebar-header menu-background">
                    <div>
                        <a href="{{ url('/partner_index') }}" >
                            <h4 id="h4_name_partner" class="logo-text" style="font-family: 'Baloo Bhaijaan 2', cursive;
                            font-family: 'Prompt', sans-serif;"></h4>
                        </a>
                        <span class="d-none" id="span_sub_partner" style="margin-left: 5px;"></span>
                    </div>
                <div class="toggle-icon ms-auto">
                    <i class='bx bx-first-page'></i>
                </div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">

				<!-- Admin -->
				@if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
						<li>
							<a href="#" class="has-arrow">
								<div class="parent-icon"><i class="fas fa-user-shield"></i>
								</div>
								<div class="menu-title">การจัดการ</div>
							</a>
							@if(Auth::user()->organization == "สพฉ" )
								<ul>
									<li>
										<a href="{{ url('/all_name_user_partner') }}"><i class='fas fa-users-cog'></i> สมาชิกศูนย์สั่งการ</a>
									</li>
									<li>
										<a href="{{ url('/data_1669_operating_unit') }}"><i class="fa-solid fa-user-plus"></i> หน่วยปฏิบัติการ </a>
									</li>
                                    <li>
                                        <a href="{{ url('/view_map_officer_area') }}" target="blank"><i class="fa-solid fa-map-location-dot"></i> แผนที่ </a>
                                    </li>
								</ul>
							@else
                                <ul class="d-none">
                                    <li>
                                        <a href="#"><i class="fa-duotone fa-sitemap"></i> จัดการข้อมูลองค์กร</a>
                                    </li>
                                </ul>
								<ul>
									<li>
										<a href="{{ url('/manage_user_partner') }}"><i class='fas fa-users-cog'></i> จัดการผู้ใช้</a>
									</li>
								</ul>
                                <ul>
									<li>
										<a href="{{ url('/sos_map_title') }}"><i class="fa-solid fa-list-ol"></i>
										หัวข้อขอความช่วยเหลือ</a>
									</li>
								</ul>
                                <ul>
                                    <li>
                                        <a href="{{ url('/sos_map_wait_delete') }}"><i class="fa-solid fa-trash-clock"></i>
                                        คำขอลบเคส</a>
                                    </li>
                                </ul>
							@endif
						</li>
					@endif
				@endif
				<!-- Admin -->

                <!-- Dashboard Partner -->
                @if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" and Auth::user()->organization != "สพฉ")
                    <li id="div_ll_Dashboard" class="">
                        <a href="#" class="has-arrow">
                            <div class="parent-icon">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/dashboard_index#dashboard_user') }}"><i class='fas fa-users-cog'></i>User</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard_index#dashboard_viisos') }}"><i class='fas fa-siren-on'></i>ViiSOS</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard_index#dashboard_viinews') }}"><i class="fa-solid fa-newspaper"></i>ViiNews</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard_index#dashboard_viimove') }}"><i class="fa-duotone fa-car"></i>ViiMove</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard_index#dashboard_boardcast') }}"><i class='fas fa-bullhorn'></i>Broadcast</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                @endif

				<!-- Broadcast -->
				<!-- ใหม่ -->
				<li id="div_menu_Broadcast" class="d-none">
					<a class="has-arrow" href="javascript:;" >
						<div class="parent-icon"><i class="fas fa-bullhorn"></i>
						</div>
						<div class="menu-title">Broadcast (LINE) </div>
					</a>



					<ul class="mm-collapse " style="">
						<li>
							<a id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}">
								<i class='fas fa-users-cog'></i> Dashboard
							</a>
						</li>

						<!--check in  -->
						<li class="">
							<a class="has-arrow" href="javascript:;">
								<i class="bx bx-right-arrow-alt"></i>by Checkin
							</a>
							<ul class="mm-collapse " style="">
								<li >
									<!-- <li class="div-tooltip">
										<a href="#" class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard Checkin
										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li> -->
									<li class="div-tooltip">
										<a id="li_menu_Check_in" class="" href="{{ url('/broadcast/broadcast_by_check_in') }}">
										<i class="fas fa-map-marker-check"></i> Boardcast Checkin
										</a>
										<span id="tip_check_in" class="tooltip d-none" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
												โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
												<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
										</span>
									</li>
								</li>
							</ul>
						</li>
						<!-- check in -->

						<!-- User -->
						<li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by User</a>
							<ul class="mm-collapse " style="">
								<li class="">
									<!-- <li class="div-tooltip">
										<a  href="#" class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard User
										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li> -->
									<li class="div-tooltip">
										<a id="li_menu_User" class="" href="{{ url('/broadcast/broadcast_by_user') }}">
											<i class='fas fa-users-cog'></i> Boardcast User
										</a>
										<span id="tip_user" class="tooltip d-none" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
												โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
												<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
										</span>
									</li>
								</li>
							</ul>
						</li>
						<!-- User -->

						<!-- Cars -->
						<li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by Cars</a>
							<ul class="mm-collapse " style="">
								<li class="">
									<!-- <li class="div-tooltip">
										<a href="#"class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard Cars

										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li> -->
									<li class="div-tooltip">
										<a id="li_menu_Car" class="" href="{{ url('/broadcast/broadcast_by_car') }}">
											<i class="fa-duotone fa-car"></i> Boardcast Cars
										</a>
										<span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
												โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
												<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
										</span>
									</li>
								</li>
							</ul>
						</li>
						<!-- Cars -->

                        <!-- Sos -->
						<li class=""> <a class="has-arrow" href="javascript:;" ><i class="bx bx-right-arrow-alt"></i>by Sos</a>
							<ul class="mm-collapse " style="">
								<li class="">
									<!-- <li class="div-tooltip">
										<a href="#"class="disabled">
											<i class='fas fa-users-cog'></i> Dashboard Cars

										</a>
										<span class="tooltip" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> ฟีเจอร์ยังไม่พร้อมใช้งานขณะนี้</center>
										</span>
									</li> -->
									<li class="div-tooltip">
										<a id="li_menu_Car" class="" href="{{ url('/broadcast/broadcast_by_sos') }}">
											<i class='fas fa-siren-on'></i> Boardcast Sos
										</a>
										<span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
											<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
												โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
												<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
										</span>
									</li>
								</li>
							</ul>
						</li>
						<!-- Sos -->
					</ul>
				</li>

				<!-- เก่า -->
				<!-- <li id="div_menu_Broadcast" class="d-none">
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="fas fa-bullhorn"></i>
						</div>
						<div class="menu-title">Broadcast <span style="color: green;">LINE</span> </div>
					</a>
					<ul>
						@if(Auth::user()->id == "1")
							<li> <a id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}"><i class='fas fa-users-cog'></i> Dashboard</a>
							</li>
							<li class="div-tooltip">
								<a id="li_menu_Check_in" href="{{ url('/broadcast/broadcast_by_check_in') }}"><i class="fas fa-map-marker-check"></i> by Check In</a>
								<span id="tip_check_in" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
										โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
								</span>
							</li>
							<li class="div-tooltip">
								<a id="li_menu_User"href="{{ url('/broadcast/broadcast_by_user') }}"><i class="fad fa-users"></i> by User</a>
								<span  id="tip_user" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
									โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
								</span>
							</li>
						@endif
							<li class="div-tooltip">
								<a id="li_menu_Cars"href="{{ url('/broadcast/broadcast_by_car') }}"><i class="fad fa-car-bus"></i> by cars</a>
								<span id="tip_car" class="tooltip d-none" style="font-size: 0.95em;">
									<center><i class="fa-regular fa-triangle-exclamation"></i> อัพเกรดเพื่อใช้ฟีเจอร์นี้</center>
									โปรดติดต่อ <a href="tel:020277856" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">02-027-7856</a> หรือ
										<a href="mailto:contact.viicheck@gmail.com" class="p-0" style="display: inline;background-color: transparent;text-decoration: underline;color:red">contact.viicheck@gmail.com</a>
								</span>
							</li>
					</ul>
				</li> -->



				<!-- Broadcast -->

				<!-- สำหรับ องค์กร / คอนโด -->
					@if(Auth::check())
						@if(Auth::user()->role == "admin-condo")
							<li>
								<a href="#" class="has-arrow">
									<div class="parent-icon"><i class="fas fa-building"></i>
									</div>
									<div class="menu-title">For Corporation</div>
								</a>
								<ul>
									<li> <a href="{{ url('/sos_partner') }}"><i class='fas fa-hands-helping'></i> ให้ความช่วยเหลือ</a>
									</li>
									<li> <a href="{{ url('/add_area') }}"><i class='far fa-map'></i> พื้นที่บริการ</a>
									</li>
									<li> <a href="{{ url('/parcel') }}"><i class="fas fa-truck-loading"></i> พัสดุ</a>
									</li>
									<li> <a href="{{ url('/notify_repair') }}"><i class="fas fa-tools"></i> แจ้งซ่อม</a>
									</li>
									<li> <a href="{{ url('/cleaning_appointment') }}"><i class="fas fa-broom"></i> นัดหมายทำความสะอาด</a>
									</li>
									<li> <a href="{{ url('/bill_payment') }}"><i class="fas fa-file-invoice-dollar"></i> บิลเรียกชำระ</a>
									</li>
									<li> <a href="{{ url('/news_condo') }}"><i class="fas fa-newspaper"></i> ข่าวสาร</a>
									</li>
									<li> <a href="{{ url('/report_condo') }}"><i class="fas fa-exclamation-circle"></i> การแจ้งปัญหา</a>
									</li>
									<li> <a href="{{ url('/report_condo') }}"><i class="fas fa-tasks"></i> แบบประเมิน</a>
									</li>
								</ul>
							</li>
						@endif
					@endif
				<!-- สำหรับ องค์กร / คอนโด -->

				<!-- care move sos -->
				@if(Auth::check() && Auth::user()->organization != 'สพฉ')
					@if( Auth::user()->role == "admin-partner" or Auth::user()->role == "partner" )
                        <!-- Vii SOS -->
                            <li class="main-submenu">
                                <a href="#" class="has-arrow">
                                    <div class="parent-icon"><i class="fas fa-siren-on"></i>
                                    </div>
                                    <div class="menu-title">Vii SOS</div>
                                </a>
                                <ul >
                                    <li>
                                        <a href="{{ url('/sos_partner') }}" data-submenu="{{ url('/sos_detail_partner') }}" data-submenu-2="{{ url('/sos_score_helper') }}" data-submenu-have-id="{{ url('/score_helper') }}/"class="d-block sub-menu">
                                            <i class='fas fa-hands-helping'></i>

                                            <span id="div_menu_help_1">
                                                ให้ความช่วยเหลือ
                                            </span>

                                            <span id="div_menu_help" class="d-none">
                                                <i  class="fas fa-exclamation-circle notify_alert float-end mt-1"></i>
                                            </span>
                                        </a>
                                    </li>

                                    @if(Auth::check())
                                        @if(Auth::user()->role == "admin-partner" && Auth::user()->organization != "ชาลีกรุงเทพ")
                                            <li>
                                                <a href="{{ url('/add_area') }}" data-submenu="{{ url('/service_current') }}" data-submenu-2="{{ url('/service_pending') }}" data-submenu-3="{{ url('/service_area') }}" class="sub-menu">
                                                    <i class='far fa-map'></i>

                                                    <span>
                                                        &nbsp;พื้นที่บริการ
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endif

                                    @if(Auth::user()->organization == "JS100 Radio" or Auth::user()->organization == "2บี กรีน จำกัด")
                                        <li>

                                            <a href="{{ url('/sos_emergency_js100') }}" data-submenu="{{ url('/sos_detail_js100') }}" class="d-block sub-menu">
                                                <i class="fal fa-siren-on"></i>

                                                <span id="div_menu_help_js100">
                                                    SOS by calling
                                                </span>

                                                <span id="div_menu_alert_js100" class="d-none">
                                                    <i  class="fas fa-exclamation-circle notify_alert float-end mt-1"></i>
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        <!-- Vii SOS -->

						<!-- ViiCare -->
							<li>
								<a href="#" class="has-arrow">
									<div class="parent-icon"><i class="fas fa-hand-holding-heart"></i>
									</div>
									<div class="menu-title">Vii Care</div>
								</a>
								<ul>
									<li> <a href="{{ url('/check_in/view') }}"><i class="fas fa-map-marker-check"></i> ข้อมูลการเข้าออก</a>
									</li>
									<li> <a href="{{ url('/check_in/add_new_check_in') }}"><i class="fas fa-qrcode"></i> เพิ่มจุด Check in</a>
									</li>
									<li> <a href="{{ url('/check_in/gallery') }}"><i class="far fa-images"></i>คลังภาพ</a>
									</li>
								</ul>
							</li>
						<!-- ViiCare -->

						<!-- ViiMove -->
							<li>
								<a href="#" class="has-arrow">
									<div class="parent-icon"><i class="fas fa-car-crash"></i>
									</div>
									<div class="menu-title">Vii Move</div>
								</a>
								<ul>
									<li> <a href="{{ url('/register_cars_partner') }}"><i class='fas fa-car'></i> รถลงทะเบียน</a>
									</li>
									<li> <a href="{{ url('/guest_partner') }}"><i class="fas fa-file-signature"></i> รถที่ถูกรายงาน</a>
									</li>
									<li> <a href="{{ url('/partner_guest_latest') }}"><i class="fas fa-history"></i> รถที่ถูกรายงานล่าสุด</a>
									</li>
								</ul>
							</li>
						<!-- ViiMove -->

					@endif
				@endif
				<!-- end care move sos -->

				<style>
                    .theme-notification-menu {
                        position: absolute;
                        top: 10px;
                        left: 78% !important;
                        color: #f5950f;
                        width: 30px;
                        height: 30px;
                        font-size: 18px;
                        border-radius: 50%;
                        z-index: 999999!important;
                    }
                    .theme-notification-call {
                        position: absolute;
                        left: 85% !important;
                        color: #ADFF2F;
                        width: 20px;
                        height: 20px;
                        font-size: 18px;
                        z-index: 9999;
                    }
                    .theme-notification-refuse {
                        position: absolute;
                        left: 75% !important;
                        color: red;
                        width: 20px;
                        height: 20px;
                        font-size: 18px;
                        z-index: 9999;
                    }

                </style>

				<!-- SOS HELP CENTER 1669 -->
				@if(Auth::check())
					@if(Auth::user()->id == "1" or Auth::user()->id == "64" or Auth::user()->id == "2" or Auth::user()->organization == 'สพฉ')
						<li>
							<a id="menu_command_sos" href="#" class="has-arrow">
								<div class="parent-icon">
									<i class="fa-solid fa-truck-medical"></i>
								</div>
								<div class="menu-title">ขอความช่วยเหลือ</div>
								<i id="i_noti_menu" class="fa-solid fa-circle-exclamation fa-bounce theme-notification-menu d-none"></i>
							</a>
							<ul>
								<li>
									<a href="{{ url('/help_center_admin') }}">
										<i class="fa-solid fa-user-headset"></i> ควบคุมและสั่งการ
										<i id="i_noti_call" class="fa-solid fa-phone-volume fa-shake theme-notification-call d-none"></i>
										<i id="i_noti_refuse" class="fa-solid fa-triangle-exclamation fa-bounce theme-notification-refuse d-none"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-solid fa-file-pen"></i> ปรับปรุง / ยืนยัน
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-solid fa-money-check-dollar-pen"></i> ตรวจสอบ / ตั้งเบิก
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="has-arrow">
								<div class="parent-icon">
									<i class="fa-solid fa-chart-pie"></i>
								</div>
								<div class="menu-title">วิเคราะห์ข้อมูล</div>
							</a>
							<ul>
								<li> <a href="{{ url('/dashboard_1669_index#command_center_info') }}"><i class='fad fa-book'></i> ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ</a>
                                </li>
                                <li> <a href="{{ url('/dashboard_1669_index#sos_help') }}"><i class="fas fa-photo-video"></i> ข้อมูลการขอความช่วยเหลือ</a>
                                </li>
							</ul>
						</li>
					@endif
				@endif
				<!-- SOS HELP CENTER 1669 -->

				<!-- Other -->
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="fas fa-braille"></i>
						</div>
						<div class="menu-title">อื่นๆ</div>
					</a>
					<ul>
						<li>
                            <a href="{{ url('/how_to_use') }}">
                                <i class='fad fa-book'></i> วิธีใช้งาน
                            </a>
						</li>
                        @if(Auth::user()->id == "1" or Auth::user()->id == "64" or Auth::user()->id == "2" or Auth::user()->organization == 'สพฉ')
                        <li>
                            <a href="{{ url('/video_how_to_use') }}">
                                <i class="fa-solid fa-clapperboard-play"></i> วิดีโอสอนการใช้งาน
                            </a>
                        </li>
                        @endif
						<li>
                            <a href="{{ url('/partner_media?menu=all') }}">
                                <i class="fas fa-photo-video"></i> สื่อประชาสัมพันธ์
                            </a>
						</li>
						<li>
                            <a href="{{ url('/problem_report') }}">
                                <i class="fa-solid fa-message-exclamation"></i> แจ้งปัญหาการใช้งาน
                            </a>
						</li>
					</ul>
				</li>
				<!-- Other -->

				<!-- FOR DEV -->
				@if(Auth::check())
					@if(Auth::user()->id == "1" or Auth::user()->id == "64" or Auth::user()->id == "2" or Auth::user()->id == "3" or Auth::user()->id == "4")
						<li>
							<a href="#" class="has-arrow">
								<div class="parent-icon">
									<i class="fa-solid fa-code text-danger"></i>
								</div>
								<div class="menu-title">FOR DEV ViiCHECK</div>
							</a>
							<ul>
								<li>
									<a href="#" onclick="tetetetfttfg();">
										<i class="fa-solid fa-siren-on"></i> Test new sos 1669
									</a>
								</li>
								<li>
									<a href="#" onclick="reset_count_sos_1669();">
										<i class="fa-solid fa-repeat"></i> reset count 1669
									</a>
								</li>
								<li class="d-none" id="spinner_of_reset_count_sos_1669">
									<div class="spinner-border text-success" role="status" ></div>
									<span class="text-white">Loading...</span>
								</li>
							</ul>
						</li>


					@endif
				@endif
				<!-- END FOR DEV -->

				<br>

				<!------------------------------------------------------------------- menu เก่า ------------------------------------------------------------------->
				<!-- ----------------- Admin -------------------- -->
				<!-- @if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
						<div class="accordion" id="accordion_admin">
					    	<div id="heading_admin">
					    		<a href="#" data-toggle="collapse" data-target="#collapse_admin" aria-expanded="true" aria-controls="collapse_admin">
									<div class="parent-icon">
										<i class="fas fa-user-shield"></i>
									</div>
									<div class="menu-title">
										Admin
										<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
									</div>
								</a>
					    	</div>

					    	<div id="collapse_admin" class="collapse" aria-labelledby="heading_admin" data-parent="#accordion_admin">
					      		<div class="card-body">
					      			<li>
						        		<a href="{{ url('/manage_user_partner') }}#collapse_admin">
											<div class="parent-icon">
												<i class='fas fa-users-cog'></i>
											</div>
											<div class="menu-title">จัดการผู้ใช้</div>
										</a>
									</li>
					      		</div>
					    	</div>
			    			<hr class="text-white">
						</div>
					@endif
				@endif -->
				<!-- ----------------- END Admin -------------------- -->

				<!-- ----------------- Broadcast -------------------- -->
				<!-- <div id="div_menu_Broadcast" class="d-none">
					<div class="accordion" id="accordion_broadcast">
				    	<div id="heading_broadcast">
				    		<a href="#" data-toggle="collapse" data-target="#collapse_broadcast" aria-expanded="true" aria-controls="collapse_broadcast">
								<div class="parent-icon">
									<i class="fas fa-bullhorn"></i>
								</div>
								<div class="menu-title">
									Broadcast Line
									<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
								</div>
							</a>
				    	</div>

				    	<div id="collapse_broadcast" class="collapse" aria-labelledby="heading_broadcast" data-parent="#accordion_broadcast">
				      		<div class="card-body">
				      			@if(Auth::user()->id == "1")
				      			<li>
					      			<a class="" id="li_menu_Dashboard" href="{{ url('/broadcast/dashboard') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fas fa-file-chart-pie"></i>
										</div>
										<div class="menu-title">&nbsp;&nbsp;Dashboard</div>
									</a>
								</li>
								<li>
					      			<a class="" id="li_menu_Check_in" href="{{ url('/broadcast/broadcast_by_check_in') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fas fa-map-marker-check"></i>
										</div>
										<div class="menu-title">&nbsp;&nbsp;By Check in</div>
									</a>
								</li>
								@endif
								<li>
			      					<a class="" id="li_menu_Cars" href="{{ url('/broadcast/broadcast_by_car') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fad fa-car-bus"></i>
										</div>
										<div class="menu-title">By cars</div>
									</a>
								</li>
				      			@if(Auth::user()->id == "1")
								<li>
									<a class="" id="li_menu_User" href="{{ url('/broadcast/broadcast_by_user') }}#collapse_broadcast">
										<div class="parent-icon">
											<i class="fad fa-users"></i>
										</div>
										<div class="menu-title">By user</div>
									</a>
								</li>
								@endif
				      		</div>
				    	</div>
		    			<hr class="text-white">
					</div>
				</div> -->
				<!-- ---------------- END Broadcast ----------------- -->

				<!-- สำหรับ องค์กร / คอนโด -->
					<!-- @if(Auth::check())
						@if(Auth::user()->role == "admin-condo")

							<div class="accordion" id="accordion_condo">
								<div id="heading_condo">
									<a href="#" data-toggle="collapse" data-target="#collapse_condo" aria-expanded="true" aria-controls="collapse_condo">
										<div class="parent-icon">
											<i class="fas fa-building"></i>
										</div>
										<div class="menu-title">
											For Corporation
											<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
										</div>
									</a>
								</div>

								<div id="collapse_condo" class="collapse" aria-labelledby="heading_condo" data-parent="#accordion_condo">
									<div class="card-body">
										<li>
											<a href="{{ url('/sos_partner') }}#collapse_condo">
												<div class="parent-icon"><i class='fas fa-hands-helping'></i>
												</div>
												<div id="div_menu_help_1" class="menu-title">ให้ความช่วยเหลือ</div>
												<div id="div_menu_help" class="d-none">
													&nbsp;
													<i class="fas fa-exclamation-circle notify_alert"></i>
												</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/add_area') }}#collapse_condo">
												<div class="parent-icon"><i class='far fa-map'></i>
												</div>
												<div class="menu-title">พื้นที่บริการ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/parcel') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-truck-loading"></i>
												</div>
												<div class="menu-title">พัสดุ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/notify_repair') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-tools"></i>
												</div>
												<div class="menu-title">แจ้งซ่อม</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/cleaning_appointment') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-broom"></i>
												</div>
												<div class="menu-title">นัดหมายทำความสะอาด</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/bill_payment') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-file-invoice-dollar"></i>
												</div>
												<div class="menu-title">บิลเรียกชำระ</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/news_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-newspaper"></i>
												</div>
												<div class="menu-title">ข่าวสาร</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/report_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-exclamation-circle"></i>
												</div>
												<div class="menu-title">การแจ้งปัญหา</div>
											</a>
										</li>
										<li>
											<a href="{{ url('/report_condo') }}#collapse_condo">
												<div class="parent-icon"><i class="fas fa-tasks"></i>
												</div>
												<div class="menu-title">แบบประเมิน</div>
											</a>
										</li>
									</div>
								</div>
								<hr class="text-white">
							</div>
						@endif
					@endif -->
				<!-- สิ้นสุด สำหรับ องค์กร / คอนโด -->


				<!-- ---------------- Vii CARE ----------------- -->
				<!-- <div class="accordion" id="accordion_Vii_Care">
			    	<div id="heading_Vii_Care">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_Care" aria-expanded="true" aria-controls="collapse_Vii_Care">
							<div class="parent-icon">
								<i class="fas fa-hand-holding-heart"></i>
							</div>
							<div class="menu-title">
								Vii Care
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Vii_Care" class="collapse" aria-labelledby="heading_Vii_Care" data-parent="#accordion_Vii_Care">
			      		<div class="card-body">
			      			<li>
				        		<a href="{{ url('/check_in/view') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="fas fa-map-marker-check"></i>
									</div>
									<div class="menu-title">ข้อมูลการเข้าออก</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/check_in/add_new_check_in') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="fas fa-qrcode"></i>
									</div>
									<div class="menu-title">เพิ่มจุด Check in</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/check_in/gallery') }}#collapse_Vii_Care">
									<div class="parent-icon"><i class="far fa-images"></i>
									</div>
									<div class="menu-title">คลังภาพ</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Vii CARE ----------------- -->

				<!-- ---------------- Vii MOVE ----------------- -->
				<!-- <div class="accordion" id="accordion_Vii_Move">
			    	<div id="heading_Vii_Move">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_Move" aria-expanded="true" aria-controls="collapse_Vii_Move">
							<div class="parent-icon">
								<i class="fas fa-car-crash"></i>
							</div>
							<div class="menu-title">
								Vii Move
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Vii_Move" class="collapse" aria-labelledby="heading_Vii_Move" data-parent="#accordion_Vii_Move">
			      		<div class="card-body">
			      			<li>
				      			<a href="{{ url('/register_cars_partner') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class='fas fa-car'></i>
									</div>
									<div class="menu-title">รถลงทะเบียน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/guest_partner') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class="fas fa-file-signature"></i>
									</div>
									<div class="menu-title">รถที่ถูกรายงาน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/partner_guest_latest') }}#collapse_Vii_Move">
									<div class="parent-icon"><i class="fas fa-history"></i>
									</div>
									<div class="menu-title">รถที่ถูกรายงานล่าสุด</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Vii MOVE ----------------- -->

				<!-- ---------------- Vii SOS ----------------- -->
				<!-- @if(Auth::check())
                    @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "partner")
						<div class="accordion" id="accordion_Vii_SOS">
					    	<div id="heading_Vii_SOS">
					    		<a href="#" data-toggle="collapse" data-target="#collapse_Vii_SOS" aria-expanded="true" aria-controls="collapse_Vii_SOS">
									<div class="parent-icon">
										<i class="fas fa-siren-on"></i>
									</div>
									<div class="menu-title">
										Vii SOS
										<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
									</div>
								</a>
					    	</div>

					    	<div id="collapse_Vii_SOS" class="collapse" aria-labelledby="heading_Vii_SOS" data-parent="#accordion_Vii_SOS">
					      		<div class="card-body">
					      			<li>
						      			<a href="{{ url('/sos_partner') }}#collapse_Vii_SOS">
											<div class="parent-icon"><i class='fas fa-hands-helping'></i>
											</div>
											<div id="div_menu_help_1" class="menu-title">ให้ความช่วยเหลือ</div>
											<div id="div_menu_help" class="d-none">
												&nbsp;
												<i class="fas fa-exclamation-circle notify_alert"></i>
											</div>
										</a>
									</li>
									@if(Auth::check())
					                    @if(Auth::user()->role == "admin-partner")
					                    <li>
											<a href="{{ url('/add_area') }}#collapse_Vii_SOS">
												<div class="parent-icon"><i class='far fa-map'></i>
												</div>
												<div class="menu-title">พื้นที่บริการ</div>
											</a>
										</li>
										@endif
									@endif
									@if(Auth::user()->organization == "JS100 Radio" or Auth::user()->organization == "2บี กรีน จำกัด")
										<li>
											<a href="{{ url('/sos_emergency_js100') }}#collapse_Vii_SOS">
												<div class="parent-icon"><i class="fal fa-siren-on"></i>
												</div>
												<div id="div_menu_help_js100" class="menu-title">SOS by calling</div>
												<div id="div_menu_alert_js100" class="d-none">
													&nbsp;
													<i class="fas fa-exclamation-circle notify_alert"></i>
												</div>
											</a>
										</li>
									@endif
					      		</div>
					    	</div>
			    			<hr class="text-white">
						</div>
					@endif
				@endif -->
				<!-- ---------------- END Vii SOS ----------------- -->

				<!-- ---------------- Other ----------------- -->
				<!-- <div class="accordion" id="accordion_Other">
			    	<div id="heading_Other">
			    		<a href="#" data-toggle="collapse" data-target="#collapse_Other" aria-expanded="true" aria-controls="collapse_Other">
							<div class="parent-icon">
								<i class="fas fa-braille"></i>
							</div>
							<div class="menu-title">
								อื่นๆ
								<i class="fas fa-caret-down float-end" style="font-size: 20px; position: absolute;right: 5%;"></i>
							</div>
						</a>
			    	</div>

			    	<div id="collapse_Other" class="collapse" aria-labelledby="heading_Other" data-parent="#accordion_Other">
			      		<div class="card-body">
			      			<li>
				      			<a href="{{ url('/how_to_use') }}#collapse_Other" target="blank">
									<div class="parent-icon"><i class='fad fa-book'></i>
									</div>
									<div class="menu-title">วิธีใช้งาน</div>
								</a>
							</li>
							<li>
								<a href="{{ url('/partner_media?menu=all') }}#collapse_Other,javascript:;">
									<div class="parent-icon"><i class="fas fa-photo-video"></i>
									</div>
									<div class="menu-title">สื่อประชาสัมพันธ์</div>
								</a>
							</li>
			      		</div>
			    	</div>
	    			<hr class="text-white">
				</div> -->
				<!-- ---------------- END Other ----------------- -->

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->

		<!--start header -->
		<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
			<div id="div_color_navbar" class="topbar d-flex align-items-center header_nav-background" style="">
				<nav class="navbar navbar-expand d-flex">
					<div class="mobile-toggle-menu">
						<i class='bx bx-menu'></i>
					</div>
					<div class="top-menu-left d-none d-lg-block">
						<ul class="nav">
						  	<li class="nav-item">
								<a class="nav-link" href="tel:020277856">
									<i class='bx bx-phone'></i>
                            	</a>
						  	</li>
                          	<li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                            	<a class="nav-link" href="tel:020277856">
                                	<span  style="font-size:15px;margin-top:15px;">02-0277856</span>
                            	</a>
						  	</li>
						  	<li class="nav-item">
								<a class="nav-link" href="mailto:contact.viicheck@gmail.com">
									<i class='bx bx-envelope'></i>
                            	</a>
						  	</li>
                          	<li class="nav-item" style="margin-top:-3px;margin-left:-10px;">
                            	<a class="nav-link" href="mailto:contact.viicheck@gmail.com">
                                	<span style="font-size:15px;">contact.viicheck@gmail.com</span>
                            	</a>
						  	</li>
					  	</ul>
				 	</div>

					@if(Auth::user()->organization == "สพฉ" )
					<style>

					.tabsStatusOfficer {
						display: flex;
						position: relative;
						background-color: #fff;
						box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
						padding: 0.75rem;
						border-radius: .5rem;
						width: 20rem;
					}

					.tabsStatusOfficer * {
						z-index: 2;
						font-family: 'Mitr', sans-serif;
					}

					.containerStatusofficer input[type="radio"] {
						display: none;
					}
					.containerStatusofficer{
						margin-right: 0px;
					}

					/* .containerStatusofficer * {
						outline: #000 1px solid;
					} */
					.tabOfficer {
						position: relative;
						display: flex;
						align-items: center;
						justify-content: center;
						height: 30px;
						width: 30%;
						font-size: .8rem;
						color: black;
						font-weight: 500;
						border-radius: .5rem;
						cursor: pointer;
						transition: color 0.15s ease-in;
					}

					.notiStatusOfficer {
						display: flex;
						align-items: center;
						justify-content: center;
						width:  30%;
						height: .8rem;
						position: absolute;
						top: -5px;
						right: 0;
						font-size: 10px;
						margin-left: 0.75rem;
						border-radius: .5rem;
						margin: 0px;
						background-color: #e6eef9;
						transition: 0.15s ease-in;
					}

					.containerStatusofficer input[type="radio"]:checked+.radio-1 {
						color: blue;
					}

					.containerStatusofficer input[type="radio"]:checked+.radio-2 {
						color: #11c77c;
					}
					.containerStatusofficer input[type="radio"]:checked+.radio-3{
						color: #817e81;
					}


					.containerStatusofficer input[type="radio"]:checked+label>.notiStatusOfficer {
						background-color: #0000ff;
						color: #fff;
						margin: 0px;
					}

					.containerStatusofficer input[id="officerHelping"]:checked~.glider {
						transform: translateX(0);
						background-color: rgb(0, 0, 255 , 0.2);
					}

					.containerStatusofficer input[id="officerStandby"]:checked~.glider {
						transform: translateX(100%);
						background-color: rgb(17, 199, 124 , 0.2);
					}

					.containerStatusofficer input[id="officerNAN"]:checked~.glider {
						transform: translateX(200%);
						background-color: rgb(129, 126, 129 , 0.2);
					}

					.glider {
						position: absolute;
						display: flex;
						height: 30px;
						width:27.5%;
						z-index: 1;
						border-radius: .5rem;
						transition: 0.25s ease-out;
					}

					@media (max-width: 700px) {

						.tabsStatusOfficer {
							transform: scale(0.6);
						}
					}

					/* @media (max-width: 10px) {

					.tabsStatusOfficer {
						display: none;
					}
					} */
					.lds-ring {
						display: inline-block;
						position: relative;
						width: 10px;
						height: 10px;
					}
					.lds-ring div {
					box-sizing: border-box;
					display: block;
					position: absolute;
					width: 8px;
					height: 8px;
					/* margin: 8px; */
					border: .3px solid #fff;
					border-radius: 50%;
					animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
					border-color: #000 transparent transparent transparent;
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
					</style>

					<div class="containerStatusofficer ms-auto">
						<div class="tabsStatusOfficer">
							<!-- ปุ่ม modal -->
							<input type="radio" id="officerHelping" name="tabsStatusOfficer"  onclick="click_switch_officer_1669();">
							<label class="tabOfficer radio-1" for="officerHelping">
								ช่วยเหลือ
								<span id="notiStatusOfficer" class="notiStatusOfficer">
									<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
								</span>
							</label>

							<input type="radio" id="officerStandby" name="tabsStatusOfficer" onclick="click_switch_officer_1669();">
							<label class="tabOfficer radio-2" for="officerStandby">พร้อม</label>

							<input type="radio" id="officerNAN" name="tabsStatusOfficer" onclick="click_switch_officer_1669();">
							<label class="tabOfficer radio-3" for="officerNAN">ไม่พร้อม</label>
							<span class="glider"></span>
						</div>
					</div>
                    @else
                    <div class="containerStatusofficer ms-auto">
                        <div class="tabsStatusOfficer">
                            <!-- ปุ่ม modal -->
                        </div>
                    </div>
					@endif

				 		<!-- switch officer 1669 -->
						@if(Auth::user()->organization == "สพฉ" )
							<style>
								.toggle-switch {
								  position: relative;
								  display: inline-block;
								  width: 80px;
								  height: 40px;
								  cursor: pointer;
								}

								.toggle-switch input[type="checkbox"] {
								  display: none;
								}

								.toggle-switch-background {
								  position: absolute;
								  top: 0;
								  left: 0;
								  width: 100%;
								  height: 100%;
								  background-color: #ddd;
								  border-radius: 20px;
								  box-shadow: inset 0 0 0 2px #ccc;
								  transition: background-color 0.3s ease-in-out;
								}

								.toggle-switch-handle {
								  position: absolute;
								  top: 5px;
								  left: 5px;
								  width: 30px;
								  height: 30px;
								  background-color: #fff;
								  border-radius: 50%;
								  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
								  transition: transform 0.3s ease-in-out;
								}

								.toggle-switch::before {
								  content: "";
								  position: absolute;
								  top: -25px;
								  right: -35px;
								  font-size: 12px;
								  font-weight: bold;
								  color: #aaa;
								  text-shadow: 1px 1px #fff;
								  transition: color 0.3s ease-in-out;
								}

								.toggle-switch input[type="checkbox"]:checked + .toggle-switch-handle {
								  transform: translateX(45px);
								  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 3px #05c46b;
								}

								.toggle-switch input[type="checkbox"]:checked + .toggle-switch-background {
								  background-color: #05c46b;
								  box-shadow: inset 0 0 0 2px #04b360;
								}

								.toggle-switch input[type="checkbox"]:checked + .toggle-switch:before {
								  content: "On";
								  color: #05c46b;
								  right: -15px;
								}

								.toggle-switch input[type="checkbox"]:checked + .toggle-switch-background .toggle-switch-handle {
								  transform: translateX(40px);
								}

							</style>
							<!-- <div class="ms-auto">
								<label class="toggle-switch">
								<input type="checkbox" id="checkbox_switch_officer_1669" onclick="click_switch_officer_1669();">
								<div class="toggle-switch-background">
									<div class="toggle-switch-handle"></div>
								</div>
								</label>
								<span id="show_text_status_officer">
								</span>
							</div> -->
							<script>

								document.addEventListener('DOMContentLoaded', (event) => {
							        // console.log("START");
							        fetch("{{ url('/') }}/api/check_status_officer_1669" + '/' + '{{ Auth::user()->id }}' + '/' + '{{ Auth::user()->sub_organization }}')
							            .then(response => response.json())
							            .then(result => {
							            	// console.log(result)
							            	change_switch_officer_to(result['status']);
							        });

							    });

								function click_switch_officer_1669(){
									let switch_officer = document.querySelector('#officerStandby');
									let officer_helping = document.querySelector('#officerHelping');


									if (switch_officer.checked) {
							            change_switch_officer_to('Standby');

									} else if (officer_helping.checked){
							            change_switch_officer_to('Helping');
									}else{
							            change_switch_officer_to('');
									}
								}

								function change_switch_officer_to(change_to){

									if (change_to == 'Standby'){
										document.querySelector('#officerStandby').checked = true ;
										// document.querySelector('.toggle-switch-background').setAttribute('style' ,
										// 'background-color: #05c46b;box-shadow: inset 0 0 0 2px #04b360;');
										// document.querySelector('#show_text_status_officer').innerHTML = 'พร้อมช่วยเหลือ' ;
									}else if(change_to == 'Helping'){
										document.querySelector('#officerHelping').checked = true ;
										// document.querySelector('.toggle-switch-background').setAttribute('style' ,
										// 'background-color: #fac516;box-shadow: inset 0 0 0 2px #ffde70;');
										// document.querySelector('#show_text_status_officer').innerHTML = 'กำลังช่วยเหลือ' ;
									}else{
										document.querySelector('#officerNAN').setAttribute("checked", "") ;
										// document.querySelector('.toggle-switch-background').setAttribute('style' ,
										// 'background-color: #ddd;box-shadow: inset 0 0 0 2px #ccc;');
										// document.querySelector('#show_text_status_officer').innerHTML = 'ไม่อยู่' ;
										change_to = 'null' ;
									}

									fetch("{{ url('/') }}/api/change_status_officer_to" + '/' + '{{ Auth::user()->id }}' + '/' + '{{ Auth::user()->sub_organization }}' + '/' + change_to)
							            .then(response => response.text())
							            .then(result => {
							            	// console.log(result)
							        });

								}
							</script>

						@endif
						<!-- END switch officer 1669 -->



					<div class="search-bar flex-grow-1 header-notifications-list header-message-list">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<!-- <div class="top-menu ms-auto">
					</div> -->



					 <div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        	@if(!empty(Auth::user()->photo))
                                <img alt="" style="width:60px;" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ Auth::user()->photo }}" data-original-title="Usuario">
                            @else
                                <img src="{{ asset('/partner/images/user/avatar-1.jpg') }}" style="width:60px;" class="img-radius" alt="User-Profile-Image">
                            @endif
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">
									@switch(Auth::user()->role)
                                        @case('partner')
                                            เจ้าหน้าที่
                                        @break
                                        @case('admin-partner')
                                            แอดมิน
                                        @break
                                        @case('admin-condo')
                                            แอดมิน
                                        @break
                                    @endswitch
								</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content" style="margin-top:-25px;">
				<br>
			  	@yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!-- <footer class="page-footer"> -->
			<!-- <p class="mb-0">Copyright © 2021. All right reserved.</p> -->
		<!-- </footer> -->
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		@if(Auth::check())
            @if(Auth::user()->role == "admin-partner" or Auth::user()->role == "admin-condo")
				<div id="div_switcher" class="switcher-btn" onclick="change_color();" style="">
					<i class='bx bx-cog bx-spin'></i>
				</div>
			@endif
		@endif
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">เครื่องมือปรับแต่งธีม</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">
				พื้นหลังส่วนหัว
				<i class="fas fa-sync-alt btn" style="float: right;" onclick="random_color();"></i>
			</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator" id="color_item_1"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_2"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_3"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_4"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_5"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_6"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_7"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_8"></div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-5">
								<div style="float: right;" class="indigator" id="color_item_Ex"></div>
							</div>
							<div class="col-7">
								<input style="margin-top:5px;" type="text" class="form-control" id="code_color" name="code_color" placeholder="color code" oninput="add_color_item_Ex();">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">พื้นหลังแถบเมนู</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1" onclick="add_input_color_menu('1')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2" onclick="add_input_color_menu('2')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3" onclick="add_input_color_menu('3')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4" onclick="add_input_color_menu('4')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5" onclick="add_input_color_menu('5')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6" onclick="add_input_color_menu('6')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7" onclick="add_input_color_menu('7')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8" onclick="add_input_color_menu('8')"></div>
					</div>
				</div>
			</div>
			<hr/>
			<hr/>
			<h6 type="button" class="mb-0" data-toggle="collapse" data-target="#collapse_set_group_line" aria-expanded="false" aria-controls="collapse_set_group_line">
				<i class="fab fa-line text-success" style="font-size: 25px;"></i> ตั้งค่ากลุ่มไลน์
				<a type="button" style="float:right;" data-toggle="collapse" data-target="#collapse_set_group_line" aria-expanded="false" aria-controls="collapse_set_group_line">
                <i class="fas fa-sort-down"></i>
            </a>
			</h6>
            <div class="collapse" id="collapse_set_group_line">
            	<br>
                <ul id="ul_group_line" class="list-group">

				</ul>
            </div>
			<hr/>
		</div>
	</div>
	<!--end switcher-->

	<!-- modal set_group_line -->

	<button id="btn_modal_set_group_line" class="d-none" data-toggle="modal" data-target="#set_group_line">
	</button>

	<div class="modal fade" id="set_group_line" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">
	        	ตั้งค่ากลุ่มไลน์ <b><span id="span_name_line" class="text-info"></span></b>
	        </h5>
	        <button id="btn_close_set_group" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="col-12">
	            <div class="row">
	                <div class="col-12">
	                    <label class="control-label">ชื่อกลุ่มไลน์</label>
	                    <input class="form-control" type="text" name="input_name_group_line" id="input_name_group_line" value="">
	                    <hr>
	                </div>
	                <div class="col-6">
	                    <label id="label_old_language" class="control-label"></label>
	                    <select class="form-control" name="input_language" id="input_language" required>
	                        <option id="old_language" value="" selected>- เลือกภาษา -</option>
	                        <option value="th" >ไทย (th)</option>
	                        <option value="en" >English (en)</option>
	                        <option value="zh-TW" >中國人 (zh-TW)</option>
	                        <option value="ja" >日本 (ja)</option>
	                        <option value="ko" >한국인 (ko)</option>
	                        <option value="es" >Español (es)</option>
	                        <option value="lo" >ພາສາລາວ (lo)</option>
	                        <option value="my" >မြန်မာ (my)</option>
	                        <option value="de" >Deutsch (de)</option>
	                        <option value="hi" >हिन्दी (hi)</option>
	                        <option value="ar" >عربي (ar)</option>
	                        <option value="ru" >русский (ru)</option>
	                        <option value="zh-CN" >中国人 (zh-CN)</option>
	                    </select>
	                </div>
	                <div class="col-6">
	                    <label id="label_old_time_zone" class="control-label"></label>
	                    <select class="form-control" name="input_time_zone" id="input_time_zone" required>
	                        <option id="old_time_zone" value="" selected>- เลือก Time zone -</option>

	                    </select>
	                </div>
	            </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button id="btn_cf_set" type="button" class="btn btn-info text-white" data-dismiss="modal" >ยืนยัน</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end modal set_group_line -->

    <!-- Button trigger modal -->
	<button id="btn_modal_notify" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_notify">
	</button>

	<div class="modal fade" id="asd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	  	<div class="modal-dialog modal-dialog-centered modal-sm " role="document"style="right: -411px;z-index: 10040;">
	    	<div class="modal-content">
	      		<div class="modal-body text-center" style="padding:0px;">
	      			<a id="tag_a_modal_notify_img" href="" target="bank">
		        		<img src="{{ asset('/img/icon/zoom-in.png') }}" style="position:absolute;right: 10px;bottom: 10px;width: 20px;">
		    		</a>
	        		<img src="" alt="" id="modal_notify_img">
	      		</div>
    		</div>
	  	</div>
	</div>

	<!-- Modal -->
	<div class="modal fade " id="modal_notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header " style="background-color:#D85261;">
		        	<h4 class="modal-title text-white text-center"  id="exampleModalLabel">
                        <b>แจ้งเตือน<br>การขอความช่วยเหลือ</b>
                    </h4>
					<img id="img_sos_map" width="180px" height="180px" style="border-radius: 10%; object-fit:cover;" src="{{ asset('/img/stickerline/PNG/21.png') }}">
		      	</div>
      			<div class="modal-body text-center" style="padding:0px;">
			  		<br>
			  		<div class="row">
				  		<div class="col-12">
		                    <h2 class="text-info"><b id="modal_notify_name">คุณ : </b></h2>
						</div>
						<div class="card-body">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">เวลา</h4>
									<span class="text-secondary" style="font-size:25px;" id="modal_notify_time"></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">เบอร์</h4>
									<span class="text-secondary" style="font-size:25px;" id="modal_notify_phone"></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="mb-0">สถานที่</h4>
									<span class="text-secondary" style="font-size:25px;" id="modal_notify_name_area"></span>
								</li>
							</ul>
						</div>
	      			</div>
			     	<div class="modal-footer">
				     	<!-- <button id="btn_go_to_help" type="button" style="border-radius: 25px;" class="btn notify_alert_gotohelp" >
				     		<i class="fa-solid fa-truck-medical"></i> กำลังไปช่วยเหลือ
				     	</button> -->

				        <a id="btn_view_data" type="button" style="border-radius: 25px; background-color:#408AF4" class="btn text-white">
				        	<i class="fal fa-eye"></i> ดำเนินการ
				        </a>
				        <a id="tag_a_link_ggmap" target="bank" class="btn text-white" style="border-radius: 25px; background-color:#26A664">
				        	<i class="far fa-map-marker-alt"></i>ดูแผนที่
				        </a>
			      	</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<!-- //////////////////// -->
	<!-- ///MODAL ASK MORE/// -->
	<!-- //////////////////// -->
	<style>
		.map_select_officer_ask_more {
	      	height: calc(60vh);
	    }
	</style>
	<button id="btn_modal_select_officer_ask_more" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_select_officer_ask_more"></button>

	<!-- Modal -->
	<div class="modal fade" id="modal_select_officer_ask_more" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_select_officer_ask_more" aria-hidden="true" style="z-index:999999;">
	  	<div class="modal-dialog modal-xl" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h3 class="modal-title" id="Label_modal_select_officer_ask_more">
		        		การขอหน่วยปฏิบัติการเพิ่ม รหัสปฏิบัติการ : 000
		        	 </h3>
		        	<button id="btn_close_modal_ask_modal" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
	                    <div class="col-8">
	                    	<div class="card">
								<ul class="list-group mt-1 list-group-flush" id="text_header_ask_more">
									<!-- <h4>
										ต้องการ <b style="font-size:30px;" id="type_vahicle_ask_more">รถ</b>
										รหัสเหตุการณ์ <b style="font-size:30px;" id="rc_ask_more" class="text-warning">เหลือง(เร่งด่วน)</b>
										จำนวน <b  style="font-size:30px;" id="quantity_vahicle_ask_more">1</b>
									</h4> -->
								</ul>
							</div>
	                        <div class="map_select_officer_ask_more" id="map_select_officer_ask_more" class="d-none"></div>
	                    </div>
	                    <div class="col-4" style="display: flex;flex-direction: column;">
	                        <div class="card radius-10 w-100">
	                            <div class="card-body">
	                                <div class="d-flex align-items-center">
	                                    <div>
	                                        <h5 class="mb-0">ข้อมูลเจ้าหน้าที่</h5>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- BTN Select Level -->
	                            <div class="chat-tab-menu ">
	                                <ul class="nav nav-pills nav-justified">
	                                    <li class="nav-item">
	                                        <a class="nav-link  menu-select-lv-all ask_more-select-lv-all" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_level').value = 'all';select_officer_ask_more_btn_menu_select();">
	                                            <div class="font-24">ALL
	                                            </div>
	                                            <div><small>ทั้งหมด</small>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link  menu-select-lv-fr ask_more-select-lv-fr" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_level').value = 'fr';select_officer_ask_more_btn_menu_select();">
	                                            <div class="font-24">FR
	                                            </div>
	                                            <div>
	                                                <small>เบื้องต้น</small>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link menu-select-lv-bls ask_more-select-lv-bls" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_level').value = 'bls';select_officer_ask_more_btn_menu_select();">
	                                            <div class="font-24">BLS
	                                            </div>
	                                            <div><small>ทั่วไป</small>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link menu-select-lv-ils ask_more-select-lv-ils" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_level').value = 'ils';select_officer_ask_more_btn_menu_select();">
	                                            <div class="font-24">ILS
	                                            </div>
	                                            <div><small>กลาง</small>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link menu-select-lv-als ask_more-select-lv-als" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_level').value = 'als';select_officer_ask_more_btn_menu_select();">
	                                            <div class="font-24">ALS
	                                            </div>
	                                            <div><small>สูง</small>
	                                            </div>
	                                        </a>
	                                    </li>
	                                </ul>
	                                <input class="d-none" type="text" name="select_officer_ask_more_level" id="select_officer_ask_more_level" value="all">
	                            </div>

	                            <!-- BTN Select vehicle  -->
	                            <div class="owl-carousel owl-theme owlmenu-vehicle-ask_more p-3">
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-all ask_more-select-vehicle-all" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'all';select_officer_ask_more_btn_menu_select();">
	                                        ทั้งหมด
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-car ask_more-select-vehicle-car" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'รถ';select_officer_ask_more_btn_menu_select();">
	                                        รถ
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-aircraft ask_more-select-vehicle-aircraft" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'อากาศยาน';select_officer_ask_more_btn_menu_select();">
	                                        อากาศยาน
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-boat-1 ask_more-select-vehicle-boat-1" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'เรือ ป.1';select_officer_ask_more_btn_menu_select();">
	                                        เรือ ป.1
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-boat-2 ask_more-select-vehicle-boat-2" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'เรือ ป.2';select_officer_ask_more_btn_menu_select();">
	                                        เรือ ป.2
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn menu-select-vehicle-boat-3 ask_more-select-vehicle-boat-3" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'เรือ ป.3';select_officer_ask_more_btn_menu_select();">
	                                        เรือ ป.3
	                                    </a>
	                                </div>
	                                <div class="item" style="width:100%">
	                                    <a class="btn  menu-select-vehicle-boat-other ask_more-select-vehicle-boat-other" href="javascript:;" onclick="document.querySelector('#select_officer_ask_more_vehicle_type').value = 'เรือประเภทอื่นๆ';select_officer_ask_more_btn_menu_select();">
	                                        เรืออื่นๆ
	                                    </a>
	                                </div>
	                            </div>

	                            <input class="d-none" type="text" name="select_officer_ask_more_vehicle_type" id="select_officer_ask_more_vehicle_type" value="all">

	                            <input class="d-none" type="text" id="ask_more_id">
	                            <input class="d-none" type="text" id="list_select_officer_ask_more">

	                            <div class="data-officer p-3 mb-3" style="overflow: auto;max-height: 450px;" id="select_officer_ask_more_card_data_operating">
	                                <!-- ข้อมูลหน่วยปฏิบัติการในพื้นที่ -->
	                            </div>

                                <!-- div tag a เพื่อไปสู่เคสหลัก -->
                                <div id="div_tag_a_to_case_main" class="d-none"></div>

	                            <!-- <div class="data-officer p-3 mb-3 ps ps--active-y">
	                                <div id="div_operating_id_1" onclick="joint_sos_view_data_marker(1,'กู้ภัยมืดแบบมืดเลยมืดมาก มืดจริงๆนะ ไม่ได้โม้ มืดตืดตื๋อ',2.07,'FR',14.187535,101.164581);">
	                                    <div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
	                                        <div class="d-md-flex align-items-center email-message px-3 py-1">
	                                            <div class="d-flex align-items-center">
	                                                <input class="form-check-input" id="test" type="checkbox" value="">
	                                            </div>
	                                            <div class="ms-auto">
	                                                <div class="d-flex align-items-center p-2 cursor-pointer">
	                                                    <div class="level FR d-flex align-items-center m-2">
	                                                        <center> FR </center>
	                                                    </div>
	                                                    <div style="margin-left: 10px;">
	                                                        <h6 class="mb-1 font-14">กู้ภัยมืดแบบมืดเลยมืดมาก มืดจริงๆนะ ไม่ได้โม้ มืดตืดตื๋อ (เรือ ป.1)</h6>
	                                                        <p class="mb-0 font-14">เจ้าหน้าที่ : TEERASAK3</p>
	                                                        <p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ 2.07 กม. </p>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div> -->
	                            <div class="div_bottom" style="margin-top: auto;">
	                                <center>
	                                    <p id="show_error_noselect_officer_ask_more" class="text-danger d-none">กรุณาเลือกหน่วยปฏิบัติการ</p>
	                                    <span id="btn_send_data_joint_sos_ask_more" class="mt-3 btn btn-primary main-shadow main-radius" style="width: 60%;" >
	                                        เลือก <b><span id="show_count_select_operating_officer_ask_more">0</span></b> หน่วย
	                                    </span>
	                                </center>
	                                <br>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		      	</div>
		    </div>
	  	</div>
	</div>



<input type="text" class="d-none" name="user_organization" id="user_organization" value="{{ Auth::user()->organization }}">
<input id="color_of_partner" type="text" class="d-none" name="" value="">
<input id="class_color_menu" type="text" class="d-none" name="" value="">
<input id="check_name_partner" type="hidden" name="" value="">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://unpkg.com/izitoast/dist/js/iziToast.min.js'></script>
<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('partner_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/highcharts.js') }}"></script>
<script src="{{ asset('partner_new/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/exporting.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/variable-pie.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/export-data.js') }}"></script>
<script src="{{ asset('partner_new/plugins/highcharts/js/accessibility.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script><!-- apexcharts -->
<script src="{{ asset('partner_new/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script>
	new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="{{ asset('partner_new/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('partner_new/js/app.js') }}"></script>
<!-- dataTables -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

<!--notification js -->
<script src="{{ asset('partner_new/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('partner_new/plugins/notifications/js/notification-custom-script.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>



<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        // show_menu_bar();
		check_data_partner();
		check_submenu();

		@if(Auth::check() && Auth::user()->organization != 'สพฉ')
		    setInterval(function() {
		    	//// เช็ค SOS ทั่วไป ////
		       	check_sos_alarm();
		    	//// เช็ค JS100 ////
		       	// check_sos_js100();
		    }, 5000);
		@else
			// ด้านล่างนี้เป็น สพฉ ศูนย์สั่งการต่างๆ
		    @if(Auth::user()->sub_organization != 'ศูนย์ใหญ่')
				setInterval(function() {
					check_ask_for_help_1669();
			    }, 6000);

			    let full_url = '{{ url()->full() }}' ;
			    let text_url_all = full_url.split('/');
			    let last_text = text_url_all.length - 1 ;
			    let link_current = text_url_all[last_text];
			    // console.log(text_url_all);
			    // console.log(link_current);

			    if (link_current != 'help_center_admin'){
			    	// หน้าไหนเมนูบาร์ไม่กางออกส่งไปคลิกได้ที่นี่เลย
			    	open_menu_bar(text_url_all);
			    	// เช็ควิดีโอคอลและการปฏิเสธ
			    	// Theme_check_refuse_and_call(text_url_all);
			    }

			@endif
		@endif

    });

    function Theme_check_refuse_and_call(text_url_all) {

		console.log('Theme_check_refuse_and_call');

		let i_noti_refuse = document.querySelector('#i_noti_refuse');
        let i_noti_call = document.querySelector('#i_noti_call');
		let i_noti_menu = document.querySelector('#i_noti_menu');

	    setInterval(function() {
	    	fetch("{{ url('/') }}/api/real_time_check_refuse_and_call?user_id="+'{{ Auth::user()->id }}')
                .then(response => response.json())
                .then(result => {
                    // console.log("real_time_check_refuse_and_call");
                    // console.log(result);
                    // console.log('--------------------------------');

                    let result_refuse = result['refuse'].split(",");
                    let result_call = result['call'].split(",");
                    let result_meet = result['meet'].split(",");
                        // console.log('result_refuse >> ');
                        // console.log(result_refuse);
                        // console.log('result_call >> ');
                        // console.log(result_call);

                        // console.log('result_refuse[0] >> ' + result_refuse[0]);
                        // console.log('result_call[0] >> ' + result_call[0]);

                    // ตรวจสอบเงื่อนไขการแสดงผลไอคอนแจ้งเตือนหาก url ไม่ใช่ help_center_admin
                    if(result_refuse[0] && result_refuse[0] != 'ไม่มีข้อมูล'){
                    	i_noti_menu.classList.remove('d-none');
                    	i_noti_refuse.classList.remove('d-none');
                    }else{
                    	i_noti_refuse.classList.add('d-none');
                    }

                    if(result_call[0] && result_call[0] != 'ไม่มีข้อมูล'){
                    	i_noti_menu.classList.remove('d-none');
                    	i_noti_call.classList.remove('d-none');
                    }else{
                        
                        if(result_meet[0] && result_meet[0] != 'ไม่มีข้อมูล'){
                            i_noti_menu.classList.remove('d-none');
                            i_noti_call.classList.remove('d-none');
                        }else{
                            i_noti_call.classList.add('d-none');
                        }

                    }


                    if (!result_refuse[0] && result_call[0] == 'ไม่มีข้อมูล' && result_meet[0] == 'ไม่มีข้อมูล'){
                    	i_noti_menu.classList.add('d-none');
                    	i_noti_refuse.classList.add('d-none');
                        i_noti_call.classList.add('d-none');
                    }

                    // ตรวจสอบถ้าอยู่ในหน้า EDIT ของเคสนั้นๆ แล้วไม่มีการโทรหรือปฏิเสธจากเคสอื่นให้ซ่อน icon แจ้งเตือน
                    if (result_refuse.length == 1){
                    	if(result_refuse[0] == text_url_all[6] || result_refuse[0] == ""){
                    		i_noti_refuse.classList.add('d-none');
                    	}
                    }

                    if (result_call.length == 1){
                    	if(result_call[0] == text_url_all[6] || result_call[0] == ""){
                    		i_noti_call.classList.add('d-none');
                    	}
                    }

                    if (result_refuse.length == 1 && result_call.length == 1){
                    	if( (result_refuse[0] == text_url_all[6] || result_refuse[0] == "") && (result_call[0] == text_url_all[6] || result_call[0] == "") ){
                    		i_noti_menu.classList.add('d-none');
                    		i_noti_refuse.classList.add('d-none');
                    		i_noti_call.classList.add('d-none');
                    	}
                    }

                });
	    },  5000);
	}

	function open_menu_bar(text_url_all){

		// sos_help_center/{id}/edit
		if (text_url_all[5] == 'sos_help_center'){
    		setTimeout(function() {
    			document.querySelector('#menu_command_sos').click();
		    }, 2000);
    	}

	}

    function check_data_partner()
    {
    	let user_organization = document.querySelector('#user_organization').value ;
    	// console.log(user_organization);
    	let user_sub_organization = "{{ Auth::user()->sub_organization }}" ;
    	// console.log(user_sub_organization);

    	fetch("{{ url('/') }}/api/check_data_partner/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(result[0]['class_color_menu']);
                let delayInMilliseconds = 200;

		        setTimeout(function() {
		        	if (result[0]['class_color_menu'] !== "other"){
			    		document.querySelector('#sidebarcolor' + result[0]['class_color_menu'] ).click();
                		document.querySelector('#span_sub_partner').classList.add('text-white');
		        	}
		        }, delayInMilliseconds);

                if (result[0]['name'] === "สพฉ"){
                	document.querySelector('#h4_name_partner').innerHTML = "ศูนย์สั่งการ";
                }else{
                	document.querySelector('#h4_name_partner').innerHTML = result[0]['name'];
                }

                document.querySelector('#color_of_partner').value = result[0]['name'];
                document.querySelector('#check_name_partner').value = result[0]['name'];
                document.querySelector('#class_color_menu').value = result[0]['class_color_menu'];
                document.querySelector('#div_color_navbar').style = "background: " + result[0]['color_navbar'] + ";" ;
                if(document.querySelector('#div_switcher')){
                    document.querySelector('#div_switcher').style = "background: " + result[0]['color_navbar'] + ";" ;
                }

                if (user_sub_organization) {
                	document.querySelector('#span_sub_partner').innerHTML = user_sub_organization ;
                	document.querySelector('#span_sub_partner').classList.remove('d-none');
                }

		});

        fetch("{{ url('/') }}/api/all_group_line/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let ul_group_line = document.querySelector('#ul_group_line') ;

                for(let item of result){
                    let tag_li = document.createElement("li");
                    let class_tag_li = document.createAttribute("class");
                    	class_tag_li.value = "list-group-item";
                    	tag_li.setAttributeNode(class_tag_li);

                    tag_li.innerHTML =
                    	"<b>" + item.line_group + "</b>" +
                    	"<br><span class='btn' onclick='set_group_line(" + item.group_line_id + ")' style='float:right;font-style: italic;color: red;font-size: 14px;''>แก้ไข</span> "
                    ;
                    ul_group_line.appendChild(tag_li);
                }
        });

        @if(Auth::check() && Auth::user()->organization != 'สพฉ')
	        fetch("{{ url('/') }}/api/check_data_partner_premium/" + user_organization)
	            .then(response => response.json())
	            .then(result => {
	                // console.log(result);

	                if (result.length >= 1) {
	                	document.querySelector('#div_menu_Broadcast').classList.remove('d-none');
	                }else{
	                	document.querySelector('#div_menu_Broadcast').classList.add('d-none');
	                }

	                if (!result[0]['BC_by_check_in_max'] || result[0]['BC_by_check_in_max'] == '0') {
	                	document.querySelector('#li_menu_Check_in').classList.add('disabled');
	                	document.querySelector('#li_menu_Check_in').href = "";
						document.querySelector('#tip_check_in').classList.remove("d-none");
	                }

	                if (!result[0]['BC_by_car_max'] || result[0]['BC_by_car_max'] == '0') {
	                	document.querySelector('#li_menu_Car').classList.add('disabled');
	                	document.querySelector('#li_menu_Car').href = "";
						document.querySelector('#tip_car').classList.remove("d-none");
	                }

	                if (!result[0]['BC_by_user_max'] || result[0]['BC_by_user_max'] == '0') {
	                	document.querySelector('#li_menu_User').classList.add('disabled');
	                	document.querySelector('#li_menu_User').href = "";
						document.querySelector('#tip_user').classList.remove("d-none");
	                }

	        });
	    @endif

    }

    function check_sos_alarm()
    {
    	let check_name_partner = document.querySelector('#check_name_partner').value;
    	var audio = new Audio("{{ asset('sound/Alarm Clock.mp3') }}");

    	fetch("{{ url('/') }}/api/check_sos_alarm/" + check_name_partner)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                if (result.length != 0) {
                	// console.log(result.length);

                	document.querySelector('#div_menu_help').classList.remove('d-none');

                	fetch("{{ url('/') }}/api/check_sos_alarm/notify/" + check_name_partner)
			            .then(response => response.json())
			            .then(result => {
			                // console.log(result);
			                if (result.length != 0) {

								document.querySelector('#modal_notify_name').innerHTML = result[0]['name'];
								document.querySelector('#modal_notify_phone').innerHTML = result[0]['phone'];

								document.querySelector('#modal_notify_time').innerHTML = result[0]['created_at'];
								document.querySelector('#modal_notify_name_area').innerHTML = result[0]['name_area'];

								if (result[0]['photo']) {
                                    let img_sos_map = document.querySelector('#img_sos_map');
                                    let url_img = "{{ url('storage' )}}"+"/"+ result[0]['photo'];
                                        img_sos_map.setAttribute('src' , url_img);
								}

								let tag_a_link_ggmap = document.querySelector('#tag_a_link_ggmap');

				                let tag_a_class = document.createAttribute("href");
				                  	tag_a_class.value = "https://www.google.co.th/maps/search/"+ result[0]['lat'] +","+ result[0]['lng'] +"/@"+ result[0]['lat'] +","+ result[0]['lng'] +",16z";

				                  	tag_a_link_ggmap.setAttributeNode(tag_a_class);

                                let url_command ;

                                if(result[0]['tag_sos_or_repair'] == "tag_repair"){
                                    url_command = "{{ url('/') }}" + "/sos_map/report_repair" + "/" + result[0]['id'];
                                }else{
                                    url_command = "{{ url('/') }}" + "/sos_map/command" + "/" + result[0]['id'];
                                }

                                document.querySelector('#btn_view_data').setAttribute('href', url_command)

								document.querySelector('#btn_modal_notify').click();

								audio.play();
			                }
			        });
                }else{
                	document.querySelector('#div_menu_help').classList.add('d-none');
                }
        });
    }

    function go_to_help(id_sos , id_user)
    {
    	fetch( "{{ url('/') }}/api/sos_helper_Charlie/"+ id_sos + "/" + id_user )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
        });

        setTimeout(function() {
	    	window.location.reload(true) ;
	    }, 1000);

    }

    function status_help_complete(id_sos , id_user)
    {
    	fetch( "{{ url('/') }}/api/Charlie_help_complete/"+ id_sos + "/" + id_user )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
        });

        setTimeout(function() {
	    	window.location.reload(true) ;
	    }, 1000);

    }

    function change_color()
    {
        let delayInMilliseconds = 500; //0.5 second

        setTimeout(function() {
            random_color();
        }, delayInMilliseconds);

    }

    function add_color_item_Ex()
    {
    	let code_color = document.querySelector('#code_color').value ;

    	let color_item_Ex = document.querySelector('#color_item_Ex');
            let color_item_Ex_style = document.createAttribute("style");
                color_item_Ex_style.value = "background-color:" + code_color + " ;";
                color_item_Ex.setAttributeNode(color_item_Ex_style);
            let click_color_item_Ex = document.createAttribute("onclick");
                click_color_item_Ex.value = "add_input_color('" + code_color + "')";
                 color_item_Ex.setAttributeNode(click_color_item_Ex);
    }

    function add_color_item_Ex_menu()
    {
    	let code_color_menu = document.querySelector('#code_color_menu').value ;

    	let color_item_Ex_menu = document.querySelector('#color_item_Ex_menu');
    		color_item_Ex_menu.style = "";
    		color_item_Ex_menu.onclick = "";

            let color_item_Ex_style_menu = document.createAttribute("style");
                color_item_Ex_style_menu.value = "background-color:" + code_color_menu + " ;";
                color_item_Ex_menu.setAttributeNode(color_item_Ex_style_menu);
            let click_color_item_Ex_menu = document.createAttribute("onclick");
                click_color_item_Ex_menu.value = "add_input_color_menu('" + code_color_menu + "')";
                 color_item_Ex_menu.setAttributeNode(click_color_item_Ex_menu);
    }

    function random_color()
    {
        let letters = '0123456789ABCDEF'.split('');
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        add_color_to_item(color)
    }

    function add_color_to_item(color)
    {
        let text_color = color.split('');

        let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" ;
        let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" ;
        let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" ;
        let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" ;
        let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" ;
        let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
        let color_7 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "11" ;
        let color_8 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

        // 1
        let color_item_1 = document.querySelector('#color_item_1');
            let color_item_1_style = document.createAttribute("style");
                color_item_1_style.value = "background-color:" + color_1 + " ;";
                color_item_1.setAttributeNode(color_item_1_style);
            let click_color_item_1 = document.createAttribute("onclick");
                click_color_item_1.value = "add_input_color('" + color_1 + "')";
                 color_item_1.setAttributeNode(click_color_item_1);

        // 2
        let color_item_2 = document.querySelector('#color_item_2');
            let color_item_2_style = document.createAttribute("style");
                color_item_2_style.value = "background-color:" + color_2 + " ;";
                color_item_2.setAttributeNode(color_item_2_style);
            let click_color_item_2 = document.createAttribute("onclick");
                click_color_item_2.value = "add_input_color('" + color_2 + "')";
                 color_item_2.setAttributeNode(click_color_item_2);

        // 3
        let color_item_3 = document.querySelector('#color_item_3');
            let color_item_3_style = document.createAttribute("style");
                color_item_3_style.value = "background-color:" + color_3 + " ;";
                color_item_3.setAttributeNode(color_item_3_style);
            let click_color_item_3 = document.createAttribute("onclick");
                click_color_item_3.value = "add_input_color('" + color_3 + "')";
                 color_item_3.setAttributeNode(click_color_item_3);

        // 4
        let color_item_4 = document.querySelector('#color_item_4');
            let color_item_4_style = document.createAttribute("style");
                color_item_4_style.value = "background-color:" + color_4 + " ;";
                color_item_4.setAttributeNode(color_item_4_style);
            let click_color_item_4 = document.createAttribute("onclick");
                click_color_item_4.value = "add_input_color('" + color_4 + "')";
                 color_item_4.setAttributeNode(click_color_item_4);

        // 5
        let color_item_5 = document.querySelector('#color_item_5');
            let color_item_5_style = document.createAttribute("style");
                color_item_5_style.value = "background-color:" + color_5 + " ;";
                color_item_5.setAttributeNode(color_item_5_style);
            let click_color_item_5 = document.createAttribute("onclick");
                click_color_item_5.value = "add_input_color('" + color_5 + "')";
                 color_item_5.setAttributeNode(click_color_item_5);

        // 6
        let color_item_6 = document.querySelector('#color_item_6');
            let color_item_6_style = document.createAttribute("style");
                color_item_6_style.value = "background-color:" + color_6 + " ;";
                color_item_6.setAttributeNode(color_item_6_style);
            let click_color_item_6 = document.createAttribute("onclick");
                click_color_item_6.value = "add_input_color('" + color_6 + "')";
                 color_item_6.setAttributeNode(click_color_item_6);

        // 7
        let color_item_7 = document.querySelector('#color_item_7');
            let color_item_7_style = document.createAttribute("style");
                color_item_7_style.value = "background-color:" + color_7 + " ;";
                color_item_7.setAttributeNode(color_item_7_style);
            let click_color_item_7 = document.createAttribute("onclick");
                click_color_item_7.value = "add_input_color('" + color_7 + "')";
                 color_item_7.setAttributeNode(click_color_item_7);

        // 8
        let color_item_8 = document.querySelector('#color_item_8');
            let color_item_8_style = document.createAttribute("style");
                color_item_8_style.value = "background-color:" + color_8 + " ;";
                color_item_8.setAttributeNode(color_item_8_style);
            let click_color_item_8 = document.createAttribute("onclick");
                click_color_item_8.value = "add_input_color('" + color_8 + "')";
                 color_item_8.setAttributeNode(click_color_item_8);

    }

    function add_input_color(color)
    {
    	let div_color_navbar = document.querySelector('#div_color_navbar');
    		div_color_navbar.style = "";
    		div_color_navbar.style = "background-color:" + color + " ;";

    	let div_switcher = document.querySelector('#div_switcher');
    		div_switcher.style = "";
    		div_switcher.style = "background-color:" + color + " ;";

    		div_switcher

            color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_navbar/"+ color + "/" + color_of_partner);
    }

    function add_input_color_menu(color)
    {
    	var header_wrapper_menu = document.querySelector('#header-wrapper_menu');

    	switch (color) {
			case "1":
			    color = "#null" ;
			    class_color_menu = "1"
			    	header_wrapper_menu.style = "" ;
			break;
			case "2":
			    color = "#null" ;
			    class_color_menu = "2"
			    	header_wrapper_menu.style = "" ;
			break;
			case "3":
			    color = "#null" ;
			    class_color_menu = "3"
			    	header_wrapper_menu.style = "" ;
			break;
			case "4":
			    color = "#null" ;
			    class_color_menu = "4"
			    	header_wrapper_menu.style = "" ;
			break;
			case "5":
			    color = "#null" ;
			    class_color_menu = "5"
			    	header_wrapper_menu.style = "" ;
			break;
			case "6":
			    color = "#null" ;
			    class_color_menu = "6"
			    	header_wrapper_menu.style = "" ;
			break;
			case "7":
			    color = "#null" ;
			    class_color_menu = "7"
			    	header_wrapper_menu.style = "" ;
			break;
			case "8":
			    color = "#null" ;
			    class_color_menu = "8"
			    	header_wrapper_menu.style = "" ;
			break;
			default:
			    color = color ;
			    class_color_menu = "other"

			    let html_class = document.querySelector('#html_class');

		    	let html_class_class_1 = document.createAttribute("class");
            		html_class_class_1.value = "";
            		html_class.setAttributeNode(html_class_class_1);

            	let html_class_class_2 = document.createAttribute("class");
            		html_class_class_2.value = "";
            		html_class.setAttributeNode(html_class_class_2);

			    let switcher_wrapper_menu = document.querySelector('#switcher-wrapper_menu');
			    	switcher_wrapper_menu.style = "" ;
			    	switcher_wrapper_menu.style = "background-color: " + color + ";" ;

			    	header_wrapper_menu.style = "" ;
			    	header_wrapper_menu.style = "background-color: " + color + ";" ;


		}

    	// console.log(color);
    	// console.log(class_color_menu);

        color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_menu/"+ color + "/" + color_of_partner + "/" + class_color_menu);
    }


    function set_group_line(group_line_id)
    {
        fetch("{{ url('/') }}/api/check_data_line_group/" + group_line_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                document.querySelector('#span_name_line').innerHTML = result[0]['groupName'] ;
                document.querySelector('#label_old_language').innerHTML = "Language  (" + result[0]['language'] + ")" ;
                document.querySelector('#label_old_time_zone').innerHTML = "Time zone  (" + result[0]['time_zone'] + ")" ;
                document.querySelector('#old_time_zone').value = result[0]['time_zone'];
                document.querySelector('#old_language').value = result[0]['language'];
                document.querySelector('#input_name_group_line').value = result[0]['groupName'];

                let btn_cf_set = document.querySelector('#btn_cf_set') ;
                let onclick = document.createAttribute("onclick");
                	onclick.value = "update_data_group_line('" + result[0]['id']+ "')";
                	btn_cf_set.setAttributeNode(onclick);

        });

        fetch("{{ url('/') }}/api/search_time_zone")
            .then(response => response.json())
            .then(result => {

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.TimeZone;
                    option.value = item.TimeZone;
                    input_time_zone.add(option);
                }

        });

        document.querySelector('#btn_modal_set_group_line').click();
    }

    function update_data_group_line(group_id)
    {
        let input_name_group_line = document.querySelector('#input_name_group_line').value;
        let input_language = document.querySelector('#input_language').value;
        let input_time_zone = document.querySelector('#input_time_zone').value;
            input_time_zone = input_time_zone.replace("/","_");

        fetch("{{ url('/') }}/api/set_group_line/"+ group_id + "/" + input_language + "/" + input_time_zone + "/" + input_name_group_line);

        document.querySelector('#btn_close_set_group').click();

        let delay = 800;

        setTimeout(function() {
            alert("ตั้งค่ากลุ่มไลน์ "+ input_name_group_line + " เรียบร้อยแล้ว");
        }, delay);
    }

    // function check_sos_js100(){
    //     // console.log("CHECK");
    //     fetch("{{ url('/') }}/api/check_new_sos_js100_by_theme" )
    //         .then(response => response.json())
    //         .then(result => {
    //             // console.log(result);

    //             if (result['length'] > 0) {
    //             	document.querySelector('#div_menu_alert_js100').classList.remove('d-none');
    //             }else{
    //             	document.querySelector('#div_menu_alert_js100').classList.add('d-none');
    //             }
    //     });
    // }

	function check_submenu(){
		let menu = $('.sub-menu');
		var winlocation = window.location.href.split('?')[0]
		whole_string = winlocation;
		split_string = whole_string.split(/(\d+)/);


		for (i = 0; i < menu.length; i++) {
			if(winlocation == menu[i].getAttribute("data-submenu")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");

			}if(winlocation == menu[i].getAttribute("data-submenu-2")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-3")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-4")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(winlocation == menu[i].getAttribute("data-submenu-5")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}if(split_string[0] == menu[i].getAttribute("data-submenu-have-id")){
				menu[i].closest(".main-submenu").classList.add("mm-active");
				menu[i].closest("li").classList.add("mm-show");
				menu[i].closest("li").classList.add("mm-active");
			}
		}
	}
</script>

<!-- SOS 1669 -->
<script>

	var count_sos_wait = 0 ;
	var count_sos_Helping = 0 ;

	function check_ask_for_help_1669(){
		// console.log('สพฉ');

		let sub_organization =  '{{ Auth::user()->sub_organization }}' ;
		let user_id =  '{{ Auth::user()->id }}' ;
            // console.log(sub_organization);
            // console.log(user_id);

		fetch("{{ url('/') }}/api/check_ask_for_help_1669/" + sub_organization + '/' + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                result['admin_id'] = user_id ;

                // แสดงผลกระดิ่งล่างขวา
                if ( result['count_sos_Helping'] != 0 || result['count_sos_wait'] != 0 ){
					document.querySelector('.notification-icon').classList.remove('d-none');
                }else if( result['count_sos_Helping'] == 0 && result['count_sos_wait'] == 0 ){
					document.querySelector('.notification-icon').classList.add('d-none');
                }
                // จบ แสดงผลกระดิ่งล่างขวา

				if (result['count_sos_Helping'] == 0){

					count_sos_Helping = result['count_sos_Helping'] ;

					document.querySelector('#div_noti_helping').classList.add('d-none')
					document.querySelector('#notiStatusOfficer').classList.add('d-none');

					document.querySelector('#wait_data').innerHTML = '' ;

				}else{


					if (count_sos_Helping != result['count_sos_Helping']){

						count_sos_Helping = result['count_sos_Helping'] ;

						// เคสที่กำลังดำเนินการ
						document.querySelector('#notiStatusOfficer').innerHTML = result['count_sos_Helping'] ;
						document.querySelector('#show_count_sos_helping').innerHTML = result['count_sos_Helping'] ;

						if (result['count_sos_Helping'] > 0){

                			// console.log(result['data_sos_Helping']);

							document.querySelector('#div_noti_helping').classList.remove('d-none')
							document.querySelector('#notiStatusOfficer').classList.remove('d-none');

							document.querySelector('#wait_data').innerHTML = '' ;

							for (let i_Helping = 0; i_Helping < result['count_sos_Helping']; i_Helping++) {

								let photo_sos_helping ;
								if (result['data_sos_Helping'][i_Helping]['photo_sos']){
									photo_sos_helping = `{{ url('/storage') .'/'. `+ result['data_sos_Helping'][i_Helping]['photo_sos'] +`  }}`;
								} else {
									photo_sos_helping = `{{ url('/img/stickerline/PNG/21.png') }}` ;
								}

								let phone_sos_helping ;
								if (result['data_sos_Helping'][i_Helping]['phone_user']){
									phone_sos_helping = result['data_sos_Helping'][i_Helping]['phone_user'].substr(0, 3) + '-' + result['data_sos_Helping'][i_Helping]['phone_user'].substr(3, 3) + '-' + result['data_sos_Helping'][i_Helping]['phone_user'].substr(6)
								} else {
									phone_sos_helping = `ไม่มีเบอร์ติดต่อ` ;
								}

								let color_idc_helping ;
								switch(result['data_sos_Helping'][i_Helping]['idc']) {
								  	case 'แดง(วิกฤติ)':
								    	color_idc_helping = 'danger' ;
								    break;
								    case 'เหลือง(เร่งด่วน)':
								    	color_idc_helping = 'warning' ;
								    break;
								    case 'เขียว(ไม่รุนแรง)':
								    	color_idc_helping = 'success' ;
								    break;
								    case 'ขาว(ทั่วไป)':
								    	color_idc_helping = 'secondary' ;
								    break;
								    case 'ดำ(รับบริการสาธารณสุขอื่น)':
								    	color_idc_helping = 'black' ;
								    break;
								  	default:
								    	color_idc_helping = 'info' ;
								    	result['data_sos_Helping'][i_Helping]['idc'] = 'ยังไม่ประเมิน' ;
								}

								let color_rc_helping ;
								switch(result['data_sos_Helping'][i_Helping]['rc']) {
								  	case 'แดง(วิกฤติ)':
								    	color_rc_helping = 'danger' ;
								    break;
								    case 'เหลือง(เร่งด่วน)':
								    	color_rc_helping = 'warning' ;
								    break;
								    case 'เขียว(ไม่รุนแรง)':
								    	color_rc_helping = 'success' ;
								    break;
								    case 'ขาว(ทั่วไป)':
								    	color_rc_helping = 'secondary' ;
								    break;
								    case 'ดำ(รับบริการสาธารณสุขอื่น)':
								    	color_rc_helping = 'black' ;
								    break;
								  	default:
								    	color_rc_helping = 'info' ;
								    	result['data_sos_Helping'][i_Helping]['rc'] = 'ยังไม่ประเมิน' ;
								}

								let color_status_helping ;
								switch(result['data_sos_Helping'][i_Helping]['status']) {
								  	case 'รับแจ้งเหตุ':
								    	color_status_helping = 'btn-request' ;
								    break;
								    case 'รอการยืนยัน':
								    	color_status_helping = 'btn-order' ;
								    break;
								    case 'ออกจากฐาน':
								    	color_status_helping = 'btn-leave' ;
								    break;
								    case 'ถึงที่เกิดเหตุ':
								    	color_status_helping = 'btn-to' ;
								    break;
								    case 'ออกจากที่เกิดเหตุ':
								    	color_status_helping = 'btn-leave-the-scene' ;
								    break;
								    case 'เสร็จสิ้น':
								    	color_status_helping = 'btn-hospital' ;
								    break;

								  	default:
								    	color_status_helping = 'secondary' ;
								    	result['data_sos_Helping'][i_Helping]['status'] = 'ไม่ได้ระบุ' ;
								}

								let name_helper_helping ;
								if (result['data_sos_Helping'][i_Helping]['name_helper']){
									name_helper_helping = result['data_sos_Helping'][i_Helping]['name_helper'] ;
								}else{
									name_helper_helping = 'ไม่ได้ระบุ' ;
								}

								let organization_helper_helping ;
								if (result['data_sos_Helping'][i_Helping]['organization_helper']){
									organization_helper_helping = result['data_sos_Helping'][i_Helping]['organization_helper'] ;
								}else{
									organization_helper_helping = 'ไม่ได้ระบุ' ;
								}

								let operating_suit_type_helping ;
								let color_operating_suit_type ;
								switch(result['data_sos_Helping'][i_Helping]['operating_suit_type']) {
								  	case 'FR':
								    	color_operating_suit_type = 'success' ;
								    	operating_suit_type_helping = result['data_sos_Helping'][i_Helping]['operating_suit_type']
								    break;
								    case 'BLS':
								    	color_operating_suit_type = 'warning' ;
								    	operating_suit_type_helping = result['data_sos_Helping'][i_Helping]['operating_suit_type']
								    break;
								    case 'ILS':
								    	color_operating_suit_type = 'danger' ;
								    	operating_suit_type_helping = result['data_sos_Helping'][i_Helping]['operating_suit_type']
								    break;
								    case 'ALS':
								    	color_operating_suit_type = 'danger' ;
								    	operating_suit_type_helping = result['data_sos_Helping'][i_Helping]['operating_suit_type']
								    break;

								  	default:
								    	color_operating_suit_type = 'secondary' ;
								    	operating_suit_type_helping = 'ไม่ได้ระบุ' ;
								}

								let vehicle_type_helping ;
								switch(result['data_sos_Helping'][i_Helping]['vehicle_type']) {
								  	case 'รถ':
								    	vehicle_type_helping = `<i class="fa-solid fa-car"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;
								    case 'อากาศยาน':;
								    	vehicle_type_helping = `<i class="fa-solid fa-helicopter"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;
								    case 'เรือ ป.๑':
								    	vehicle_type_helping = `<i class="fa-duotone fa-ship"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;
								    case 'เรือ ป.๒':
								    	vehicle_type_helping = `<i class="fa-duotone fa-ship"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;
								    case 'เรือ ป.๓':
								    	vehicle_type_helping = `<i class="fa-duotone fa-ship"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;
								    case 'เรืออื่นๆ':
								    	vehicle_type_helping = `<i class="fa-duotone fa-ship"></i> ` + result['data_sos_Helping'][i_Helping]['vehicle_type']
								    break;

								  	default:
								    	vehicle_type_helping = 'ไม่ได้ระบุ' ;
								}


								let text_Helping_html = `
									<div class="userSosWait d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
										<div class="mr-5">
											<img src="`+ photo_sos_helping +`" class="imgSos" width="70" height="70" alt="" />
										</div>

										<div class="w-100 pl">
											<div class="d-flex align-items-center">
												<h5	h6 class="d-flex align-items-center mr">
													<b>`+ result['data_sos_Helping'][i_Helping]['operating_code'] +`</b>
												</h5>
												&nbsp;&nbsp;
												<span class="badge badge-pill bg-light-`+ color_idc_helping +` text-`+ color_idc_helping +` mr" >
													IDC
													<br>
													`+ result['data_sos_Helping'][i_Helping]['idc'] +`
												</span>
												&nbsp;&nbsp;
												<span class="badge badge-pill bg-light-`+ color_rc_helping +` text-`+ color_rc_helping +` mr" >
													RC
													<br>
													`+ result['data_sos_Helping'][i_Helping]['rc'] +`
												</span>
												<span class="badge badge-pill `+ color_status_helping +`  ms-auto" >
													`+ result['data_sos_Helping'][i_Helping]['status'] +`
												</span>
											</div>

											<div class="d-flex align-items-center row mt-2">
												<div class="col-6 border-right">
													<h6 class="mb-1 font-14">ข้อมูลผู้ขอความช่วยเหลือ</h6>
													<p class="mb-0 font-13 text-secondary">
														`+ result['data_sos_Helping'][i_Helping]['name_user'] +`
													</p>
													<p class="mb-0 font-13 text-secondary">`+ phone_sos_helping +`</p>

												</div>
												<div class="col-6">
													<div class="w-100">
														<span class="mb-1 font-14 h5">ข้อมูลหน่วยปฏิบัติการ</span>
														<div class="float-end">
															<span class="badge badge-pill bg-light-`+ color_operating_suit_type +` text-`+ color_operating_suit_type +` mr" >
																`+ operating_suit_type_helping +`
															</span>
															<span class="badge badge-pill bg-light-info text-info" >
																`+ vehicle_type_helping +`
															</span>
														</div>
													</div>
													<p class="mb-0 font-13 text-secondary">
														ชื่อเจ้าหน้าที่ : `+ name_helper_helping +`
													</p>
													<p class="mb-0 font-13 text-secondary">
														หน่วยปฏิบัติการ : `+ organization_helper_helping +`
													</p>
												</div>
											</div>
										</div>

									</div>
								`;

								$('#wait_data').append(text_Helping_html);
							}

						}
					}

				}



				if (result['check_data'] != "ไม่มีข้อมูล") {

					// document.querySelector('.notification-icon').classList.add('d-none');

					if(result['forward_operation_to']){

						console.log('to');

                        fetch("{{ url('/') }}/api/get_forward_operation/" + result['forward_operation_to'] )
                            .then(response => response.json())
                            .then(result_forward => {
                                // console.log("result_forward");
                                // console.log(result_forward);

                                result['forward_operation_to_code'] = result_forward['operating_code'];
                                result['forward_operation_to_status'] = result_forward['status'];
                                result['forward_operation_to_name_helper'] = result_forward['name_helper'];

                                alet_new_sos_1669(result);
                            });

                    }else if(result['forward_operation_from']){

						console.log('from');

                        fetch("{{ url('/') }}/api/get_forward_operation/" + result['forward_operation_from'] )
                            .then(response => response.json())
                            .then(result_forward => {
                                // console.log("result_forward");
                                // console.log(result_forward);

                                result['forward_operation_from_code'] = result_forward['operating_code'];
                                result['forward_operation_from_status'] = result_forward['status'];
                                result['forward_operation_from_name_helper'] = result_forward['name_helper'];

                                alet_new_sos_1669(result);
                            });

                    }else{
						console.log('else');

                        alet_new_sos_1669(result);
                    }

					fetch("{{ url('/') }}/api/update_last_check_ask_for_help_1669/" + result['id'])
			            .then(response => response.text())
			            .then(result => {
			                // console.log(result);
			            });
				}else{

					// การขอหน่วยปฏิบัติการเพิ่มเติม
                	// console.log(result['sos_ask_mores']);
                	create_alert_sos_ask_mores(result['sos_ask_mores']);

					if ( result['count_sos_wait'] == 0 ){
						document.querySelector('#div_noti_wait').classList.add('d-none');
						document.querySelector('#modal_show_sos_wait_body').innerHTML = '';
					}else{
						document.querySelector('#div_noti_wait').classList.remove('d-none');
					}

					if (count_sos_wait != result['count_sos_wait']){

						count_sos_wait = result['count_sos_wait'] ;

						// เคสที่รอการช่วยเหลือ
						document.querySelector('#show_count_sos_wait').innerHTML = result['count_sos_wait'] ;

						document.querySelector('#modal_show_sos_wait_body').innerHTML = '';
						let now = new Date();


						for (let i_wait = 0; i_wait < result['count_sos_wait']; i_wait++) {
							let photo_sos ;
							if (result[i_wait]['photo_sos']){
								photo_sos = `{{ url('/storage') .'/'. `+ result[i_wait]['photo_sos'] +`  }}`;
							} else {
								photo_sos = `{{ url('/img/stickerline/PNG/21.png') }}` ;
							}

							let phone_sos ;
							if (result[i_wait]['phone_user']){
								phone_sos = result[i_wait]['phone_user'].substr(0, 3) + '-' + result[i_wait]['phone_user'].substr(3, 3) + '-' + result[i_wait]['phone_user'].substr(6)
							} else {
								phone_sos = `ไม่มีเบอร์ติดต่อ` ;
							}

							let createdAt = new Date(result[i_wait]['created_at']);

							let timeDiffInMinutes = Math.floor((now - createdAt) / 1000 / 60);
							let hours = Math.floor(timeDiffInMinutes / 60);
							let minutes = timeDiffInMinutes % 60;

							let formattedTimeDiff = hours > 0 ? hours + " ชั่วโมง " + minutes + " นาที" : minutes + " นาที";

							// let text_data_sos_html = `
							// 	<div class="userSosWait d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
							// 	<div class="">
							// 		<img src="`+ photo_sos +`" class="rounded-circle" width="46" height="46" alt="" />
							// 	</div>
							// 	<div class="ms-2">
							// 		<h6 class="mb-1 font-14">`+ result[i_wait]['name_user'] +`
							// 			<span class="badge badge-pill bg-light-danger text-danger" id="time-diff-`+ i_wait +`">
							// 				`+ formattedTimeDiff +`
							// 			</span>
							// 		</h6>
							// 		<p class="mb-0 font-13 text-secondary">`+ phone_sos + result[i_wait]['id'] +`</p>
							// 	</div>
							// 	<div class="list-inline d-flex  ms-auto">
							// 		<a onclick="sos_1669_command_by('{{ Auth::user()->id }}' , `+ result[i_wait]['id'] +`);" class="btnSosWait">สั่งการ</a>
							// 	</div>
							// 	</div>
							// `;

							let text_data_sos_html = `
								<div class="userSosWait d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
									<div class="mr-5">
										<img src="`+ photo_sos +`" class="imgSos" width="70" height="70" alt="" />
									</div>
									<div class="ms-2">
										<h6 class="mb-1 font-14">`+ result[i_wait]['name_user'] +` </h6>
										<p class="mb-0 font-13 text-secondary">`+ phone_sos +`</p>
										<span class="badge badge-pill bg-light-danger text-danger " >
											<span>ผ่านมาแล้ว</span> <span id="time-diff-`+ i_wait +`">`+ formattedTimeDiff +`</span>
										</span>
									</div>
									<div class="list-inline d-flex  ms-auto">
										<a onclick="sos_1669_command_by('{{ Auth::user()->id }}' , `+ result[i_wait]['id'] +`);" class="btnSosWait">สั่งการ</a>
									</div>
								</div>
							`;

							// append the html to the container
							$('#modal_show_sos_wait_body').append(text_data_sos_html);

							// update the time difference every minute
							setInterval(() => {
								let now = new Date();
								let createdAt = new Date(result[i_wait]['created_at']);
								let timeDiffInMinutes = Math.floor((now - createdAt) / 1000 / 60);
								let hours = Math.floor(timeDiffInMinutes / 60);
								let minutes = timeDiffInMinutes % 60;

								let formattedTimeDiff = hours > 0 ? hours + " ชั่วโมง " + minutes + " นาที" : minutes + " นาที";

								// update the text of the time difference element
								$('#time-diff-' + i_wait).text(formattedTimeDiff);
							}, 60000); // update every minute
						}


	        		}

				}
            });

	}


	function click_show_data_sos_hepl_wait(type){

		// console.log(type);

		if (type === 'wait'){
			document.querySelector('#li_show_helping').classList.remove('active');
			document.querySelector('#li_show_wait').classList.add('active');

			document.querySelector('#wait_data').classList.remove('show', 'active');
			document.querySelector('#modal_show_sos_wait_body').classList.add('show', 'active');
		}else{
			document.querySelector('#li_show_helping').classList.add('active');
			document.querySelector('#li_show_wait').classList.remove('active');

			document.querySelector('#modal_show_sos_wait_body').classList.remove('show' , 'active');
			document.querySelector('#wait_data').classList.add('show' , 'active');
		}
	}

	var data_ask_more  ;

	function create_alert_sos_ask_mores(data){

		// console.log('create_alert_sos_ask_mores');
		// console.log(data);

		data_ask_more = data

		let icon_stk = "https://www.viicheck.com/img/stickerline/PNG/21.png" ;
		let html_officer_Standby = '' ;
	    let count_item_Standby = 0 ;

		if(data != 'ไม่มีข้อมูล' || !data.success){

			let admin_id = "{{ Auth::user()->id }}" ;

			fetch("{{ url('/') }}/api/search_officer_Standby" + '/' + admin_id)
	            .then(response => response.json())
	            .then(officer_Standby => {
	                // console.log('officer_Standby');
	                // console.log(officer_Standby);

	                for(let item_Standby of officer_Standby){

	                	count_item_Standby = count_item_Standby + 1 ;

	                	// console.log(item_Standby['name_officer_command']);

	                	let photo_officer ;

	                	if (item_Standby['photo']){
	                		photo_officer = "{{ url('/storage') }}/" + item_Standby['photo'];
	                	}else{
	                		photo_officer = "{{ url('/img/stickerline/Flex/12.png') }}" ;
	                	}

	                	html_officer_Standby = html_officer_Standby +
		                	`<a class="item owlItemOfficer btn a_item_`+count_item_Standby+`">
		                        <div class="badgeImg">
		                            <img style="opacity: 1 !important;" src="`+photo_officer+`" class="" height="50">
		                        </div>
		                        <span class="d-none Standby_user_count_`+count_item_Standby+`">`+item_Standby['user_id']+`</span>
		                        <span class="owlNameOfficer" style="margin-left: 10px;">
		                        	`+item_Standby['name_officer_command']+`
		                        	<br>
		                        	<span style="font-size:15px;color:gray;">ลำดับที่ `+item_Standby['number']+`</span>
		                        </span>
		                    </a>` ;

	                }
	        });

			let btn_command_ask_mores ;

			for(let item of data){

				btn_command_ask_mores = document.querySelector('#btn_command_ask_mores_id_' + item.id);

				if(!btn_command_ask_mores){

					let html_vehicle = '';

					let sum_boat = 0 ;

					let vehicle_car = item.vehicle_car ;
						if (!vehicle_car){
							vehicle_car = 0 ;
						}else{
							html_vehicle = html_vehicle+`<i class="fa-solid fa-car-side"></i> `+vehicle_car+`&nbsp;&nbsp;`;
						}
					let vehicle_aircraft = item.vehicle_aircraft ;
						if (!vehicle_aircraft){
							vehicle_aircraft = 0 ;
						}else{
							html_vehicle = html_vehicle+`<i class="fa-solid fa-helicopter"></i> `+vehicle_aircraft+`&nbsp;&nbsp;`;
						}
					let vehicle_boat_1 = item.vehicle_boat_1 ;
						if (!vehicle_boat_1){
							vehicle_boat_1 = 0 ;
						}else{
							sum_boat = parseInt(sum_boat) + parseInt(vehicle_boat_1) ;
						}
					let vehicle_boat_2 = item.vehicle_boat_2 ;
						if (!vehicle_boat_2){
							vehicle_boat_2 = 0 ;
						}else{
							sum_boat = parseInt(sum_boat) + parseInt(vehicle_boat_2) ;
						}
					let vehicle_boat_3 = item.vehicle_boat_3 ;
						if (!vehicle_boat_3){
							vehicle_boat_3 = 0 ;
						}else{
							sum_boat = parseInt(sum_boat) + parseInt(vehicle_boat_3) ;
						}
					let vehicle_boat_other = item.vehicle_boat_other ;
						if (!vehicle_boat_other){
							vehicle_boat_other = 0 ;
						}else{
							sum_boat = parseInt(sum_boat) + parseInt(vehicle_boat_other) ;
						}

					if (sum_boat != 0){
						html_vehicle = html_vehicle+`<i class="fa-solid fa-ship"></i> `+sum_boat;
					}

					let require_vehicle_all = parseInt(vehicle_car) + parseInt(vehicle_aircraft) + parseInt(vehicle_boat_1) + parseInt(vehicle_boat_2) + parseInt(vehicle_boat_3) + parseInt(vehicle_boat_other) ;

			        setTimeout(function() {
						// let text_message = 'มีการขอหน่วยปฏิบัติการเพิ่ม ID >> ' + item.id ;
						let text_message = `
		                	<div class="row g-0">
								<div class="col-md-2">
									<img src="https://www.viicheck.com/img/stickerline/PNG/21.png" style="width:90%;" class="card-img">
								</div>
								<div class="col-md-10">
					                <h3 class="card-title">
					                 	<i class="fa-duotone fa-light-emergency-on fa-shake" style="--fa-primary-color: #ff3333; --fa-secondary-color: #ff3333;"></i>
					                 	<b>มีการขอหน่วยปฏิบัติการเพิ่ม</b>
					                </h3>
					                <p class="card-text">
					                	<b>รหัสปฏิบัติการ : `+item.operating_code+`</b>
					                	<br>
					                	<b>จำนวนที่ต้องการ : `+require_vehicle_all+`</b> หน่วย | <b>`+html_vehicle+`</b>
					                </p>
				                	<a class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#select_forward_`+item.id+`" aria-expanded="true" aria-controls="select_forward_`+item.id+`" class="">
				                		<i class="fa-solid fa-paper-plane"></i> ส่งต่อการแจ้งเตือน
				                	</a>
				                	<a id="btn_command_ask_mores_id_`+item.id+`" href="javascript:;" class="btn btn-info" onclick="select_officer_ask_more('`+item.id+`')">
				                		<i class="fa-solid fa-radar fa-beat-fade text-danger"></i> เลือกหน่วยปฏิบัติการ
				                	</a>
								</div>
								<div id="select_forward_`+item.id+`" class="col-md-12 accordion-collapse collapse" style="border:none">
									<div class="accordion-body">
										<div class="owl-carousel owlOfficer owlOfficer_`+item.id+` owl-theme">
		                                 	`+html_officer_Standby+`
		                                </div>
		                            </div>
					            </div>
							</div>
						`;

						iziToast.show({

							// image: icon_stk,
				    		// imageWidth: 150,
						    // title: 'Hey',
						    // titleSize: '35',
						    // titleLineHeight: '50',
				            message: text_message,
				            messageSize: '20',
				            messageLineHeight: '35',
				            position: 'topLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
				            timeout: false,
				            close : false ,
				            closeOnEscape : false,
				            closeOnClick: false ,
				            drag: false,
				            onOpening: function () {
				            	$(function() {
							        // Owl Carousel
							        let owl_ask_mores = $(".owlOfficer_"+item.id);
							        owl_ask_mores.owlCarousel({
							            margin: 10,
							            loop: false,
							            nav: true,
							            autoWidth: true,
							            items: 3,
							            dots: false,
							            responsive: {
							                0: {
							                    items: 1,
							                    autoWidth: false
							                },
							                768: {
							                    items: 2
							                }
							            }
							        });
							    });

							    let iziToast = document.querySelector('.iziToast-animateInside');
							    	iziToast.classList.add('width-40');

							    	// console.log("ID ASK MORE >> " + item.id);
							    	// console.log("count_item_Standby >> " + count_item_Standby);

							    let owlOfficer_case = document.querySelector('.owlOfficer_'+item.id);
									// console.log(owlOfficer_case);

								for (let ixz = 1; ixz <= count_item_Standby; ixz++) {

									let Standby_user_id = owlOfficer_case.querySelector('.Standby_user_count_'+ixz).innerHTML;
										Standby_user_id = Standby_user_id.replaceAll(" ","");
										// console.log(Standby_user_id);

									let a_item = owlOfficer_case.querySelector('.a_item_'+ixz);
										a_item.setAttribute("onclick" ,
									"send_noti_ask_mores_to('"+Standby_user_id+"','"+item.ask_mores_id+"')");
										// console.log(a_item);

								}

                                let audio_alert_ask_mores = new Audio("{{ asset('sound/warning-sound-6686.mp3') }}");
                                audio_alert_ask_mores.play();

								// console.log("-------------------------------------");

				            },buttons: [
						        [
						            `<span id="btn_close_iziToast_ask_more_`+item.id+`" class="h3 float-end float-right d-none">
						            	<button class="btn btn-secondary d-none">
						            		<i class="fa-solid fa-xmark"></i> ปิด
						            	</button>
						            </span>`,
						            function (instance, toast) {
						                instance.hide({
						                transitionOut: 'fadeOutUp'
						              }, toast);
						            }
						        ]
					        ]


						});
					}, 1500);

		        }

			}

		}

	}

	function send_noti_ask_mores_to(user_id , ask_mores_id){
		fetch("{{ url('/') }}/api/send_noti_ask_mores_to" + '/' + user_id + '/' + ask_mores_id)
            .then(response => response.text())
            .then(result => {
            	// console.log(result);
            	if (result== 'OK') {
            		document.querySelector('#btn_close_iziToast_ask_more_'+ask_mores_id).click();
            	}
        });
	}

	function select_officer_ask_more(ask_mores_id){

		// console.log('--------------');
		// console.log('select_officer_ask_more');
		// console.log(ask_mores_id);
		// console.log(data_ask_more);

		fetch("{{ url('/') }}/api/update_noti_ask_mores" + '/' + ask_mores_id)
            .then(response => response.text())
            .then(result => {
            	// console.log(result);
            	if (result == 'OK') {
            		document.querySelector('#btn_close_iziToast_ask_more_'+ask_mores_id).click();
            		document.querySelector('#ask_more_id').value= ask_mores_id;
					let btn_modal = document.querySelector('#btn_modal_select_officer_ask_more');
						btn_modal.click();

                    open_map_ask_more(data_ask_more);

                    function getRcColor(rc) {
                    switch (rc) {
                        case "แดง(วิกฤติ)":
                        return "bg-danger";
                        case "เขียว(ไม่รุนแรง)":
                        return "bg-success";
                        case "ดำ(รับบริการสาธารณสุขอื่น)":
                        return "bg-dark";
                        case "เหลือง(เร่งด่วน)":
                        return "bg-warning";
                        case "ขาว(ทั่วไป)":
                        return "bg-primary";
                        default:
                        return "";
                    }
                    }

                    let rc_car = getRcColor(data_ask_more['0']['rc_car']);
					let htmlDatavehicleAskMore = `
                        <span class="badge ${rc_car} font-18">รหัสเหตุการณ์ <b>${data_ask_more['0']['rc_car']}</b> </span>
                    `;


					if (data_ask_more['0']['vehicle_car'] !== null) {

					   htmlDatavehicleAskMore += `
    					   <li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>รถ</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_car']} คัน</b> </strong>
    						</li>`;
    				}

					if (data_ask_more['0']['vehicle_aircraft'] !== null) {

    					htmlDatavehicleAskMore += `
    						<li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>อากาศยาน</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_aircraft']} ลำ</b> </strong>
    						</li>`;
    				}

					if (data_ask_more['0']['vehicle_boat_1'] !== null) {

    					htmlDatavehicleAskMore += `
    						<li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>เรือ ป.1</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_boat_1']} ลำ</b> </strong>
    						</li>`
    						;
    				}

					if (data_ask_more['0']['vehicle_boat_2'] !== null) {

    					htmlDatavehicleAskMore += `
    						<li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>เรือ ป.2</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_boat_2']} ลำ</b> </strong>
    						</li>`
    						;
    				}

					if (data_ask_more['0']['vehicle_boat_3'] !== null) {

    					htmlDatavehicleAskMore += `
    					<li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>เรือ ป.3</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_boat_3']} ลำ</b> </strong>
    						</li>`;
    				}

					if (data_ask_more['0']['vehicle_boat_other'] !== null) {

    					htmlDatavehicleAskMore += `
    						<li class="list-group-item d-flex align-items-center">
    							<div class="card-body">
    								<h2 class="mt-1 mb-1 ">ต้องการ <b>เรือ อื่นๆ</b></h2>
    							</div>
    							<strong class="ms-auto h3 "> <b>${data_ask_more['0']['vehicle_boat_other']} ลำ</b> </strong>
    						</li>`;
    				}



					// แทรก HTML ที่ได้สร้างเข้าไปในตำแหน่งที่ต้องการในเอกสาร
					document.getElementById("text_header_ask_more").innerHTML = htmlDatavehicleAskMore;


					document.querySelector('#Label_modal_select_officer_ask_more').innerHTML= 'การขอหน่วยปฏิบัติการเพิ่ม รหัสปฏิบัติการ : ' + data_ask_more['0']['operating_code'] ;

                    document.querySelector('#btn_send_data_joint_sos_ask_more').setAttribute('onclick', "send_data_joint_sos_ask_more('"+data_ask_more[0]['sos_id']+"','"+data_ask_more[0]['noti_to']+"')");

					select_officer_ask_more_btn_menu_select();

					let owl_vehicle = $(".owlmenu-vehicle-ask_more");
		            owl_vehicle.owlCarousel({
		                margin: 5,
		                loop: false,
		                autoWidth: true,
		                nav: false,

		                dots: false
		            });
            	}
        });

	}

	function select_officer_ask_more_btn_menu_select() {

		let level = document.querySelector('#select_officer_ask_more_level').value ;
		let vehicle_type = document.querySelector('#select_officer_ask_more_vehicle_type').value ;
        //  LEVEL
        document.querySelector('.ask_more-select-lv-all').classList.remove("all-active");
        document.querySelector('.ask_more-select-lv-fr').classList.remove("fr-active");
        document.querySelector('.ask_more-select-lv-bls').classList.remove("bls-active");
        document.querySelector('.ask_more-select-lv-ils').classList.remove("ils-active");
        document.querySelector('.ask_more-select-lv-als').classList.remove("als-active");

        document.querySelector('.ask_more-select-lv-' + level).classList.add(level + "-active");

        // VEHICLE TYPE
        document.querySelector('.ask_more-select-vehicle-all').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-car').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-aircraft').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-boat-1').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-boat-2').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-boat-3').classList.remove("vehicle-one-officer-active");
        document.querySelector('.ask_more-select-vehicle-boat-other').classList.remove("vehicle-one-officer-active");

        let text_vehicle_type;

        switch (vehicle_type) {
            case 'all':
                text_vehicle_type = "all";
                break;
            case 'รถ':
                text_vehicle_type = "car";
                break;
            case 'อากาศยาน':
                text_vehicle_type = "aircraft";
                break;
            case 'เรือ ป.1':
                text_vehicle_type = "boat-1";
                break;
            case 'เรือ ป.2':
                text_vehicle_type = "boat-2";
                break;
            case 'เรือ ป.3':
                text_vehicle_type = "boat-3";
                break;
            case 'เรือประเภทอื่นๆ':
                text_vehicle_type = "boat-other";
                break;
        }
        document.querySelector('.ask_more-select-vehicle-' + text_vehicle_type).classList.add("vehicle-one-officer-active");
		ask_more_sos_opating_unit();
    }

	function ask_more_sos_opating_unit() {
		let select_officer_ask_more_vehicle_type = document.querySelector('#select_officer_ask_more_vehicle_type').value;
		let select_officer_ask_more_level = document.querySelector('#select_officer_ask_more_level').value;

		let upper_ask_more_level = select_officer_ask_more_level.toUpperCase();
		let ask_more_id = document.querySelector('#ask_more_id').value;
		// console.log(select_officer_ask_more_vehicle_type);
		// console.log(select_officer_ask_more_level);

		// console.log(data_ask_more)
		fetch("{{ url('/') }}/api/get_location_ask_more_operating_unit" + "?ask_more_vehicle_type=" + select_officer_ask_more_vehicle_type + "&ask_more_level=" + upper_ask_more_level + "&ask_more_id=" + ask_more_id)
            .then(response => response.json())
            .then(result => {
				let html_ask_more_card_data_operating = "";
				// console.log(result);
				// console.log(result.length);
				if(result.length != 0){

                    let list_select_officer_ask_more = document.querySelector('#list_select_officer_ask_more').value;
                    let list_arr_ask_more = list_select_officer_ask_more.split(',');

					for (let xxi = 0; xxi < result.length; xxi++) {

                        let checked_ask_more;

                        if (list_arr_ask_more.includes(result[xxi]['user_id'].toString() + '-' + result[xxi]['distance'].toFixed(2) + '-' + result[xxi]['operating_unit_id'])) {
                            checked_ask_more = 'checked';
                            // console.log('มีค่า '+result[xxi]['id']+' ในอาร์เรย์');
                        } else {
                            checked_ask_more = '';
                            // console.log('ไม่มีค่า '+result[xxi]['id']+' ในอาร์เรย์');
                        }

						html_ask_more_card_data_operating += `
						<div class="data-officer-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer" onclick="view_data_marker_ask_more(` + result[xxi]['id'] + `,'` + result[xxi]['name'] + `',` + result[xxi]['distance'].toFixed(2) + `,'` + result[xxi]['level'] + `',` + result[xxi]['lat'] + `,` + result[xxi]['lng'] + `);">
                            <div class="d-md-flex align-items-center email-message px-3 py-1">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" ` + checked_ask_more + ` name="select_joint_sos_officer_ask_more" id="select_joint_sos_officer_ask_more_id_` + result[xxi]['id'] + `_user_id_` + result[xxi]['user_id'] + `" onclick="select_joint_sos_officer_ask_more('` + result[xxi]['user_id'] + `','` + result[xxi]['distance'].toFixed(2) + `','` + result[xxi]['operating_unit_id'] + `','` + result[xxi]['id'] + `');">
                                </div>
                                <div class="ms-auto">
                                    <div class="d-flex align-items-center p-2 cursor-pointer">
                                        <div class="level ` + result[xxi]['level'] + ` d-flex align-items-center m-2"">
                                            <center> ` + result[xxi]['level'] + ` </center>
                                        </div>
                                        <div style="margin-left: 10px;">
                                            <h6 class="mb-1 font-14">` + result[xxi]['name'] + ` (` + result[xxi]['vehicle_type'] + `)</h6>
                                            <p class="mb-0 font-14">เจ้าหน้าที่ : ` + result[xxi]['name_officer'] + `</p>
											<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ` + result[xxi]['distance'].toFixed(2) + ` กม. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                        let mark_icon = '' ;
                        if(result[xxi]['level'] == "FR"){
                            mark_icon = image_operating_unit_green_ask_more ;
                        }else if(result[xxi]['level'] == "BLS"){
                            mark_icon = image_operating_unit_yellow_ask_more ;
                        }else{
                            mark_icon = image_operating_unit_red_ask_more ;
                        }

                        marker_operating_ask_more = new google.maps.Marker({
                            position: { lat: parseFloat(result[xxi]['lat']), lng: parseFloat(result[xxi]['lng']) },
                            map: map_select_officer_ask_more,
                            icon: mark_icon,
                        });
					}
				}
				document.getElementById("select_officer_ask_more_card_data_operating").innerHTML = html_ask_more_card_data_operating;
			});

    }

    let image_sos_ask_more = "{{ url('/img/icon/operating_unit/sos.png') }}";
    let image_operating_unit_red_ask_more = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    let image_operating_unit_yellow_ask_more = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    let image_operating_unit_green_ask_more = "{{ url('/img/icon/operating_unit/เขียว.png') }}";

    function open_map_ask_more(data_ask_more){

        // console.log(data_ask_more);

        let sos_ask_more ;

        map_select_officer_ask_more = new google.maps.Map(document.getElementById("map_select_officer_ask_more"), {
            center: { lat: parseFloat(data_ask_more[0]['lat']), lng: parseFloat(data_ask_more[0]['lng']) },
            zoom: 12,
        });

        if (sos_ask_more) {
            sos_ask_more.setMap(null);
        }

        sos_ask_more = new google.maps.Marker({
            position: { lat: parseFloat(data_ask_more[0]['lat']), lng: parseFloat(data_ask_more[0]['lng']) },
            map: map_select_officer_ask_more,
            icon: image_sos_ask_more,
        });

    }

    function select_joint_sos_officer_ask_more(select_id, distance, operating_unit_id,officer_id) {

        // console.log(select_id);
        document.querySelector('#show_error_noselect_officer_ask_more').classList.add('d-none');

        let list_select_officer_ask_more = document.querySelector('#list_select_officer_ask_more');
        let check_checkbox = document.querySelector('#select_joint_sos_officer_ask_more_id_'+ officer_id + '_user_id_' + select_id).checked;

        let arr_id;

        if (check_checkbox) {
            // true
            if (list_select_officer_ask_more.value) {
                list_select_officer_ask_more.value = list_select_officer_ask_more.value + ',' + select_id + '-' + distance + '-' + operating_unit_id;
            } else {
                list_select_officer_ask_more.value = select_id + '-' + distance + '-' + operating_unit_id;
            }

        } else {
            // false
            arr_id = list_select_officer_ask_more.value.split(',');

            let index = arr_id.indexOf(select_id.toString() + '-' + distance + '-' + operating_unit_id);

            if (index !== -1) {
                // ลบค่าออกจากตัวแปร values
                arr_id.splice(index, 1);
                // อัปเดตค่าใหม่ใน input
                list_select_officer_ask_more.value = arr_id.join(',');
            }
        }

        let new_list_select_officer_ask_more = document.querySelector('#list_select_officer_ask_more');
        if (new_list_select_officer_ask_more.value) {
            let count_select = new_list_select_officer_ask_more.value.split(',');
            document.querySelector('#show_count_select_operating_officer_ask_more').innerHTML = count_select.length;
        } else {
            document.querySelector('#show_count_select_operating_officer_ask_more').innerHTML = '0';
        }

    }

    function send_data_joint_sos_ask_more(sos_ask_more_id , command_by) {

        // console.log("sos_ask_more_id >> " + sos_ask_more_id);

        let list_select_officer_ask_more = document.querySelector('#list_select_officer_ask_more');
        // console.log(list_select_officer_ask_more.value);

        if (list_select_officer_ask_more.value) {

            document.querySelector('#show_error_noselect_officer_ask_more').classList.add('d-none');
            document.querySelector('#btn_send_data_joint_sos_ask_more').innerHTML = 'ยืนยัน ' + `<i class="fa-duotone fa-spinner fa-spin-pulse"></i>`;
            let list = list_select_officer_ask_more.value.replaceAll(',', '_');
            // console.log(list);

            fetch("{{ url('/') }}/api/create_ask_more_sos" + "?sos_ask_more_id=" + sos_ask_more_id + "&list=" + list + "&command_by="+command_by)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    if (result == "OK") {
                        document.querySelector('#btn_close_modal_ask_modal').click();
                        // document.querySelector('#btn_open_modal_show_officer_joint').click();
                        document.querySelector('#btn_send_data_joint_sos_ask_more').innerHTML = 'ยืนยัน';
                        document.querySelector('#list_select_officer_ask_more').value = '';

                        let div_tag_a_to_case_main = document.querySelector('#div_tag_a_to_case_main');

                        let html_tag_a = `
                            <a id="tag_a_to_case_main" href="{{ url('/sos_help_center/`+sos_ask_more_id+`/edit') }}">
                            </a>
                        `;

                        div_tag_a_to_case_main.innerHTML = html_tag_a ;
                        document.querySelector('#tag_a_to_case_main').click();
                    }

                });
        } else {
            document.querySelector('#show_error_noselect_officer_ask_more').classList.remove('d-none');

        }
    }

    let view_infoWindow_ask_more ;
    function view_data_marker_ask_more(id, name, distance, level, lat, lng) {

        if (view_infoWindow_ask_more) {
            view_infoWindow_ask_more.setMap(null);
        }
        const myLatlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let contentString =
            '<div id="content data_sos_map">'+
                '<div  class="data-officer-item d-flex align-items-center  p-2 cursor-pointer">' +
                    ' <div class="level  ' + level + ' d-flex align-items-center ">' +
                        ' <center> ' + level + '</center>' +
                    '</div>' +
                    '<div class="ms-2">' +
                        '<h6 class="mb-1 font-14">' + name + '</h6>' +
                        '<p class="mb-0 font-13 text-secondary">ระยะห่าง(รัศมี) ≈ ' + distance + ' กม. </p>' +
                    '</div>' +
                '</div>'+
            '</div>';

        view_infoWindow_ask_more = new google.maps.InfoWindow({
            content: contentString,
            position: myLatlng,
        });

        view_infoWindow_ask_more.open(map_select_officer_ask_more);

    }



	function alet_new_sos_1669(result) {

        // console.log(result);
		// console.log(result['name_user']);
        // console.log(result['phone_user']);
        // console.log(result['photo_sos']);

        // iziToast-body
        // iziToast-texts

        let photo_sos ;
        if (result['photo_sos']) {
        	photo_sos = "https://www.viicheck.com/storage" + "/" + result['photo_sos'];
        }else{
        	photo_sos = "https://www.viicheck.com/img/stickerline/PNG/21.png" ;
        }

        let text_title = '';
        let text_message = '';
        let data_text_sos = '';
        let html_officer_Standby = '';

        fetch("{{ url('/') }}/api/search_officer_Standby" + '/' + result['admin_id'])
            .then(response => response.json())
            .then(officer_Standby => {
                // console.log(officer_Standby);

                for(let item of officer_Standby){

                	let photo_officer ;

                	if (item['photo']){
                		photo_officer = "{{ url('/storage') }}/" + item['photo'];
                	}else{
                		photo_officer = "{{ url('/img/stickerline/Flex/12.png') }}" ;
                	}

                	html_officer_Standby = html_officer_Standby +
	                	`<a class="item owlItemOfficer btn" onclick="Forward_notify('`+item['id']+`','`+result['id']+`')">
	                        <div class="badgeImg">
	                            <img style="opacity: 1 !important;" src="`+photo_officer+`" class="rounded-circle" width="46" height="46">
	                        </div>
	                        <span class="owlNameOfficer" style="margin-left: 10px;">
	                        	`+item['name_officer_command']+`
	                        	<br>
	                        	<span style="font-size:15px;color:gray;">ลำดับที่ `+item['number']+`</span>
	                        </span>
	                    </a>` ;



                }

            });

        // console.log(html_officer_Standby);

        if (result['forward_operation_from']){

            let old_operating_code = '';
	    	let old_rc = '';
	    	let class_old_rc = '';

            old_operating_code = result['old_operating_code'];
			old_rc = result['old_rc'];

			if (old_rc == "แดง(วิกฤติ)"){
				class_old_rc = 'text-danger';
			}
			if (old_rc == "เหลือง(เร่งด่วน)"){
				class_old_rc = 'text-warning';
			}
			if (old_rc == "เขียว(ไม่รุนแรง)"){
				class_old_rc = 'text-success';
			}
			if (old_rc == "ขาว(ทั่วไป)"){
				class_old_rc = 'text-info';
			}
			if (old_rc == "ดำ(รับบริการสาธารณสุขอื่น)"){
				class_old_rc = 'text-dark';
			}

            text_title = 'การส่งต่อหน่วยปฏิบัติการ' ;
            data_text_sos = 	'<br><br><p style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin: 0;padding:0;">'+
	            			'ส่งต่อมาจากรหัสปฏิบัติการ : '+ old_operating_code +
		            		'</p>'+
		            		'<p style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin: 0;padding:0;">'+
		            			'ระดับปฏิบัติการ : <b><span class="'+ class_old_rc + '">' + old_rc + '</span></b>' +
		            		'</p>'+
	    					'<p style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin: 0;padding:0;">'+
		            			'ชื่อผู้ขอความช่วยเหลือ : '+ result['name_user'] +
		            		'</p>'+
		            		'<p style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'+
		            			'เบอร์โทร : '+ result['phone_user'] +
		            		'</p>';

        }else{
        	text_title = "การขอความช่วยเหลือใหม่ !!" ;

        	data_text_sos = '<br><br><p style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin: 0;padding:0;">'+
		            			'ชื่อผู้ขอความช่วยเหลือ : '+ result['name_user'] +
		            		'</p>'+
		            		'<p class="mt-2" style="width:33rem;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'+
		            			'เบอร์โทร : '+ result['phone_user'] +
		            		'</p>';
        }

        setTimeout(function() {

	        text_message = `<div class="cardAlertOfficer" style="width:100%">
	                                <h5 class="headerCardOfficer">
	                                    `+data_text_sos+`
	                                </h5>
	                                <p class="headerOwl">
	                                    <span>ส่งต่อเคสนี้ไปยัง</span>
	                                </p>
	                                <div class="owl-carousel owlOfficer owl-theme">

	                                 	`+html_officer_Standby+`

	                                </div>

	                        </div>`;

	        iziToast.show({
	            image: photo_sos,
			    imageWidth: 200,
			    maxWidth: '50rem',
	            timeout: 10000,
	            // timeout: 5000000,
	            title: text_title,
	            titleColor: 'red',
			    titleSize: '35',
			    titleLineHeight: '50',
	            message: text_message,
	            messageSize: '20',
	            messageLineHeight: '35',
	            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
	            progressBarColor: 'red',
	            // progressBarColor: 'linear-gradient(to right,  rgba(255,5,9,1) 0%,rgba(252,120,5,1) 25%,rgba(255,255,5,1) 50%,rgba(0,255,29,1) 100%)',
			    progressBarEasing: 'linear',
	            backgroundColor: '#ffffff',
			    theme: 'light', // dark
			    drag: false,
			    overlay:true,
			    close:false,
			    closeOnEscape:true,
	            buttons: [
	            [
	                '<span class="h3" style="margin-right:20px;"><button class="btn btn-info text-white"><i class="fa-solid fa-radar fa-beat-fade text-danger"></i> รับเคส</button></span>',
	                function (instance, toast) {
	                	sos_1669_command_by("{{ Auth::user()->id }}" , result['id']);
	                  	instance.hide({
	                    	transitionOut: 'fadeOutUp'
	                  	}, toast);
	                }
	            ],
	          	[
		            '<span class="h3" style="margin-right:20px;"><button class="btn btn-danger"><i class="fa-regular fa-map-location-dot"></i> ดูแผนที่</button></span>',
		            function (instance, toast) {
		            	click_tag_a_go_to_map(result['lat'],result['lng']);
		                instance.hide({
		                transitionOut: 'fadeOutUp'
		              }, toast);
		            }
		        ],
	         //  	[
		        //     '<span class="h3" style="margin-right:20px;"><button class="btn btn-success"><i class="fa-solid fa-phone"></i> โทร</button></span>',
		        //     function (instance, toast) {
		        //     	click_tag_a_tel_user_1669(result['phone_user'])
		        //         instance.hide({
		        //         transitionOut: 'fadeOutUp'
		        //       }, toast);
		        //     }
		        // ],
		        [
		            '<span id="btn_close_iziToast" class="h3 float-end float-right"><button class="btn btn-secondary"><i class="fa-solid fa-xmark"></i> ปิด</button></span>',
		            function (instance, toast) {
		                instance.hide({
		                transitionOut: 'fadeOutUp'
		              }, toast);
		            }
		        ]
	            ],onClosed: function asdfa(instance, toast, closedBy){
	                // if (closedBy === 'timeout') {
	                // 	//
	                // }

	                add_data_new_sos1669_to_div(result);

	            },onOpening: function () {
	                // console.log(pass);
	                let tag_progressbar = document.querySelector('.iziToast-progressbar');
	                let divElements = tag_progressbar.querySelectorAll('div');
						divElements.forEach((div) => {
							// console.log(div)
						  	div.classList.add('bg-color-progressbar');
						});

					let iziToast_opened = document.querySelector('.iziToast');

					if (result['forward_operation_from']){
						// let iziToast_capsule = document.querySelector('.iziToast-body');
						let divElements_opened = document.querySelector('.iziToast-cover');
							divElements_opened.classList.add('iziToast_forward');
			        }

			        document.querySelector('.iziToast-texts').setAttribute('class' , '');
			        document.querySelector('.iziToast-message').setAttribute('class' , 'slideIn');

			        $(function() {
				        // Owl Carousel
				        var owl = $(".owlOfficer");
				        owl.owlCarousel({
				            margin: 10,
				            loop: false,
				            nav: true,
				            autoWidth: true,
				            items: 4,
				            dots: false,
				            responsive: {
				                0: {
				                    items: 1,
				                    autoWidth: false
				                },
				                768: {
				                    items: 2
				                }
				            }
				        });
				    });


					let bg_color = tag_progressbar.querySelector('.bg-color-progressbar');

					iziToast_opened.addEventListener('mouseenter', () => {
					  bg_color.style.animationPlayState = 'paused';
					});

					iziToast_opened.addEventListener('mouseleave', () => {
					  bg_color.style.animationPlayState = 'running';
					});

	                let audio_alet_new_sos_1669 = new Audio("{{ asset('sound/Alarm Clock.mp3') }}");
	                    audio_alet_new_sos_1669.play();
	            }

	        });

		}, 1000);

    }

    function Forward_notify(officer_command_id , sos_id){

    	// console.log("ส่งต่อ notify To >> " + officer_command_id) ;

    	fetch("{{ url('/') }}/api/Forward_notify" + "/" + officer_command_id + '/' + sos_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == "OK") {
    				document.querySelector('#btn_close_iziToast').click();
                }

            });

    }

    function click_tag_a_new_sos1669(id){

    	let tag_a_new_sos1669 = document.querySelector('#tag_a_new_sos1669');
    		tag_a_new_sos1669.setAttribute('href', '{{ url("/") }}' + "/sos_help_center/" + id + "/edit");

    	tag_a_new_sos1669.click();

    }

    function click_tag_a_go_to_map(lat,lng){

    	let lat_text = '@'+lat ;

    	let tag_a_go_to_map = document.querySelector('#tag_a_go_to_map');
    		tag_a_go_to_map.setAttribute('href', 'https://www.google.co.th/maps/search/'+lat+','+lng+'/'+lat_text+',lng,16z');

    	tag_a_go_to_map.click();
    }

    function click_tag_a_tel_user_1669(phone){
    	let tag_a_tel_user_1669 = document.querySelector('#tag_a_tel_user_1669');
    		tag_a_tel_user_1669.setAttribute('href', 'tel:'+phone);

    	tag_a_tel_user_1669.click();
    }

    function add_data_new_sos1669_to_div(result){

        let data_help = document.querySelector('#data_help');

        // let text_html = gen_html_div_data_sos_1669(result);

        let text_html = new_gen_html_div_data_sos_1669(result);

        data_help.insertAdjacentHTML('afterbegin', text_html); // แทรกบนสุด


        // data_help.insertAdjacentHTML('afterbegin', text_html); // แทรกบนสุด
        // data_help.insertAdjacentHTML('beforeend', '<p>1</p>'); // แทรกล่างสุด

        let div_text_html = document.querySelector('#text_html_id_'+result['id']);
			div_text_html.classList.add('border-color-change-color');

	        setTimeout(function() {
	            div_text_html.classList.remove('border-color-change-color');
	        }, 10000);

        // console.log(div_text_html);

	    let span_count_data = document.querySelector('#span_count_data').textContent;
	    // console.log(span_count_data);
	    document.querySelector('#span_count_data').innerHTML = parseFloat(span_count_data) + 1 ;

    }

    function sos_1669_command_by(admin_id , sos_id){
    	// console.log('command_by >> ' + admin_id);
    	// console.log('sos_id >> ' + sos_id);

    	fetch("{{ url('/') }}/api/sos_1669_command_by" + "/" + sos_id + "/" + admin_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == "OK") {

                	fetch("{{ url('/') }}/api/change_status_officer_to" + '/' + '{{ Auth::user()->id }}' + '/' + '{{ Auth::user()->sub_organization }}' + '/' + 'Helping')
				            .then(response => response.text())
				            .then(result => {
				            	// console.log(result)
				        });

    				click_tag_a_new_sos1669(sos_id);
                }

            });

    }

    function tetetetfttfg(){

    	let result = [] ;

    	result['id'] = "2" ;
    	result['lat'] = "13.1515" ;
    	result['lng'] = "100.15153" ;
    	result['name_user'] = "BBENZ" ;
        result['phone_user'] = "0998877661" ;
        result['photo_sos'] = "" ;
        result['be_notified'] = 'แพลตฟอร์มวีเช็ค' ;
        result['operating_code'] = '1234' ;
        result['created_at'] = '2023-03-12T03:42:05.000000Z' ;
        result['status'] = 'รับแจ้งเหตุ' ;
        result['remark_status'] = 'ถึง รพ.' ;
        result['address'] = 'พระนครศรีอยุธยา/บางปะอิน/บ้านกรด' ;
        result['organization_helper'] = 'วีเช็ค' ;
        result['name_helper'] = 'จิตใจดี ชอบช่วยเหลือ' ;
        result['idc'] = '' ;
        result['rc'] = 'ดำ(รับบริการสาธารณสุขอื่น)' ;
        result['rc_black_text'] = 'เมารถ' ;
        result['forward_operation_to'] = '6' ;
        result['forward_operation_from'] = null ;
        result['admin_id'] = 4 ;

        alet_new_sos_1669(result);
    }

    function reset_count_sos_1669(){

    	document.querySelector('#spinner_of_reset_count_sos_1669').classList.remove('d-none');

    	fetch("{{ url('/') }}/reset_count_sos_1669/")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == "OK") {
    				document.querySelector('#spinner_of_reset_count_sos_1669').classList.add('d-none');
                }

            });
    }

    function new_gen_html_div_data_sos_1669(result){

    	// console.log(result);

    	let div_card_mook_up = document.querySelector('.div_card_mook_up');

		let new_div_data_sos = div_card_mook_up.cloneNode(true);
        	new_div_data_sos.setAttribute('id', 'mook_up_id_'+result['id'] );
        	new_div_data_sos.setAttribute('class', 'col-12' );

    	let card_data_sos = new_div_data_sos.querySelector('.card-data-sos');
        	card_data_sos.setAttribute('id', 'text_html_id_'+result['id'] );


    	// a_data_user
    	card_data_sos.querySelector('[mock_up_mark="link_data_sos"]').setAttribute('id', 'card_data_sos_id_' + result['id'] );
    	card_data_sos.querySelector('[mock_up_mark="link_data_sos"]').setAttribute('href', "{{ url('/sos_help_center') }}/" + result['id'] + "/edit");

    	// operating_code
    	new_div_data_sos.querySelector('[mock_up_mark="operating_code"]').innerHTML = result['operating_code'];

    	// be_notified
    	let color_be_notified ;
    	if (result['be_notified'] == 'แพลตฟอร์มวีเช็ค') {
    		color_be_notified = 'btn-danger' ;
    	}else if(result['be_notified'] == 'โทรศัพท์หมายเลข ๑๖๖๙' || result['be_notified'] == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)'){
    		color_be_notified = 'btn-info' ;
    	}else if (result['be_notified'] == 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า') {
    		color_be_notified = 'btn-warning' ;
    	}else{
    		color_be_notified = 'btn-secondary' ;
    	}
		new_div_data_sos.querySelector('[mock_up_mark="be_notified"]').innerHTML = result['be_notified'];
		new_div_data_sos.querySelector('[mock_up_mark="be_notified"]').classList.add(color_be_notified);

		// status
		let html_status ;
    	switch(result['status']) {
			case 'รับแจ้งเหตุ':
			    html_status = 	'btn-request';
			break;
			case 'รอการยืนยัน':
			    html_status = 	'btn-order';
		    break;
		    case 'ออกจากฐาน':
			    html_status = 	'btn-leave';
		    break;
		    case 'ถึงที่เกิดเหตุ':
			    html_status = 	'btn-to';
		    break;
		    case 'ออกจากที่เกิดเหตุ':
			    html_status = 	'btn-leave-the-scene';
		    break;
		    case 'เสร็จสิ้น':
			    html_status = 	'btn-hospital';
		    break;
		}
		new_div_data_sos.querySelector('[mock_up_mark="status"]').innerHTML = result['status'];
		new_div_data_sos.querySelector('[mock_up_mark="status"]').classList.add(html_status);

		// photo_user
		if (result['photo_user']){
			new_div_data_sos.querySelector('[mock_up_mark="photo_user"]').setAttribute('src', "{{ url('/storage') }}/" + result['photo_user']);
		}

		// name_user
		let name_user ;
    	if (result['name_user']) {
    		name_user = result['name_user'] ;
    	}else{
    		name_user = 'ไม่ทราบชื่อ' ;
    	}
		new_div_data_sos.querySelector('[mock_up_mark="name_user"]').innerHTML = name_user;

		// address
		let html_address ;

		if (result['address']) {
            let address_ex = result['address'].split("/");
            html_address = 	address_ex[0] + ' ' + address_ex[1] + ' ' + address_ex[2] ;
    	}else{
    		html_address = 'ไม่มีข้อมูล' ;
    	}
		new_div_data_sos.querySelector('[mock_up_mark="address"]').innerHTML = html_address;

		// phone_user
		let phone_user ;
    	if (result['phone_user']) {
    		phone_user = result['phone_user'] ;
    	}else{
    		phone_user = 'ไม่ได้ระบุ' ;
    	}
		new_div_data_sos.querySelector('[mock_up_mark="phone_user"]').innerHTML = phone_user;

		// helper
		let name_helper ;
    	if (result['name_helper']) {
    		name_helper = result['name_helper'] ;
    	}else{
    		name_helper = 'ไม่ทราบชื่อ' ;
    	}

		let organization_helper ;
    	if (result['organization_helper']) {
    		organization_helper = result['organization_helper'] ;
    	}else{
    		organization_helper = 'ไม่ทราบหน่วยงาน' ;
    	}
		new_div_data_sos.querySelector('[mock_up_mark="helper"]').innerHTML = 'ช่วยเหลือโดย ' + name_helper + ' ● ' + organization_helper;

		// IDC , RC
		let btn_idc ;
		let text_idc ;
    	switch(result['idc']) {
			case 'แดง(วิกฤติ)':
			    btn_idc = 	'btn-status-crisis';
			    text_idc = '(วิกฤติ)';
			break;
			case 'ขาว(ทั่วไป)':
			    btn_idc = 	'btn-status-normal';
				text_idc = '(ทั่วไป)';
			break;
			case 'เหลือง(เร่งด่วน)':
			    btn_idc = 	'btn-status-hurry';
				text_idc = '(เร่งด่วน)';
			break;
			case 'ดำ(รับบริการสาธารณสุขอื่น)':
			    btn_idc = 	'btn-status-other';
				text_idc = '(รับบริการอื่นๆ)';
			break;
			case 'เขียว(ไม่รุนแรง)':
			    btn_idc = 	'btn-status-weak';
				text_idc = '(ไม่รุนแรง)';
			break;

			default:
				btn_idc =	'btn-status-normal';
				text_idc = '(ไม่ได้ระบุ)';
		}
		new_div_data_sos.querySelector('[mock_up_mark="text_IDC"]').innerHTML = text_idc;
		new_div_data_sos.querySelector('[mock_up_mark="btn_IDC"]').classList.add(btn_idc);

		let btn_rc ;
		let text_rc ;
    	switch(result['rc']) {
			case 'แดง(วิกฤติ)':
			    btn_rc = 	'btn-status-crisis';
			    text_rc = '(วิกฤติ)';
			break;
			case 'ขาว(ทั่วไป)':
			    btn_rc = 	'btn-status-normal';
				text_rc = '(ทั่วไป)';
			break;
			case 'เหลือง(เร่งด่วน)':
			    btn_rc = 	'btn-status-hurry';
				text_rc = '(เร่งด่วน)';
			break;
			case 'ดำ(รับบริการสาธารณสุขอื่น)':
			    btn_rc = 	'btn-status-other';
				text_rc = '(รับบริการอื่นๆ)';
			break;
			case 'เขียว(ไม่รุนแรง)':
			    btn_rc = 	'btn-status-weak';
				text_rc = '(ไม่รุนแรง)';
			break;

			default:
				btn_rc =	'btn-status-normal';
				text_rc = '(ไม่ได้ระบุ)';
		}
		new_div_data_sos.querySelector('[mock_up_mark="text_RC"]').innerHTML = text_rc;
		new_div_data_sos.querySelector('[mock_up_mark="btn_RC"]').classList.add(btn_rc);

		// date_time
    	const date = new Date(result['created_at']);

		const options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' };
		const dateFormatter = new Intl.DateTimeFormat('th-TH', options);
		const date_created = dateFormatter.format(date);

		const timeOptions = { hour: 'numeric', minute: 'numeric', hour12: false };
		const timeFormatter = new Intl.DateTimeFormat('th-TH', timeOptions);
		const time_created = timeFormatter.format(date);

		new_div_data_sos.querySelector('[mock_up_mark="date_time"]').innerHTML = date_created + '  ' + 'เวลา ' + time_created;

        let html_btn_command ;
            html_btn_command = `
                <br>
                <span class="btn btn-success main-shadow main-radius float-end mt-3 mx-2" onclick="sos_1669_command_by('{{ Auth::user()->id }}' , '`+result['id']+`');">
                    <i class="fa-solid fa-location-arrow fa-beat"></i> สั่งการ
                </span>
            `;

        new_div_data_sos.querySelector('[mock_up_mark="date_time"]').insertAdjacentHTML('beforeend', html_btn_command);

		// status == เสร็จสิ้น >> show_min_case / grade
        if(result['status'] == "เสร็จสิ้น"){

        	// grade
			let grade = result['score_total'] ;
			let rounded_grade = Math.ceil(result['score_total']) ;
			let html_star = '' ;

			if (result['score_total']){
				for(let i = 1 ; i <= 5 ; i++){
					if (i <= rounded_grade){
						if (i < rounded_grade){
							html_star = html_star + '<i class="fa-solid fa-star text-warning"></i>' ;
						}else{
							if( grade - i + 1 >= 0.75){
								html_star = html_star + '<i class="fa-solid fa-star text-warning"></i>' ;
							}else if(grade - i + 1 >= 0.25){
								html_star = html_star + '<i class="fa-solid fa-star-half-stroke text-warning"></i>' ;
							}else{
								html_star = html_star + '<i class="fa-regular fa-star text-warning"></i>' ;
							}
						}
					}else{
						html_star = html_star + '<i class="fa-regular fa-star text-warning"></i>' ;
					}
				}
			}else{
				html_star = '<span class="text-secondary">ไม่มีการประเมิน</span>' ;
			}
	        new_div_data_sos.querySelector('[mock_up_mark="grade"]').insertAdjacentHTML('afterbegin', html_star);

        	// show_min_case
        	let total_time = 0;

			let zone1_time1 = "";
			let zone1_time2 = "";

			if (result['time_create_sos']) {
				zone1_time1 = result['time_create_sos'];
			}

			if (result['time_command']) {
				zone1_time2 = result['time_command'];
			}

			if (result['time_go_to_help']) {
			    zone1_time2 = result['time_go_to_help'];
			}

			if (result['time_to_the_scene']) {
			    zone1_time2 = result['time_to_the_scene'];
			}

			if (result['time_leave_the_scene']) {
				zone1_time2 = result['time_leave_the_scene'];
			}

			if (result['time_hospital']) {
			    zone1_time2 = result['time_hospital'];
			}

			zone1_time1 = zone1_time1.split(" ")[1];
            zone1_time2 = zone1_time2.split(" ")[1];

			const [zone1_hours1, zone1_minutes1, zone1_seconds1] = zone1_time1.split(":");
			const [zone1_hours2, zone1_minutes2, zone1_seconds2] = zone1_time2.split(":");

			const zone1_totalSeconds1 =
			    parseInt(zone1_hours1) * 3600 +
			    parseInt(zone1_minutes1) * 60 +
			    parseInt(zone1_seconds1);
			const zone1_totalSeconds2 =
			    parseInt(zone1_hours2) * 3600 +
			    parseInt(zone1_minutes2) * 60 +
			    parseInt(zone1_seconds2);

			const zone1_TotalSeconds = zone1_totalSeconds2 - zone1_totalSeconds1;

			const zone1_Time_min = Math.floor(zone1_TotalSeconds / 60);
			const zone1_Time_Seconds = zone1_TotalSeconds - zone1_Time_min * 60;

			const min_1_to_sec = zone1_Time_min * 60;
			  	total_time = total_time + min_1_to_sec + zone1_Time_Seconds;

			const hours_all_time = Math.floor(total_time / 3600);
			const minutes_all_time = Math.floor((total_time % 3600) / 60);
			const seconds_all_time = Math.floor(total_time % 60);

			let text_total_time = "";
			if (hours_all_time > 0) {
			  text_total_time += `${hours_all_time} ชั่วโมง${hours_all_time > 1 ? "" : ""} `;
			}
			text_total_time += `${minutes_all_time} นาที${
			  minutes_all_time > 1 ? "" : ""
			} `;
			text_total_time += `${seconds_all_time} วินาที${seconds_all_time > 1 ? "" : ""}`;

			let show_min_case = text_total_time;

			// check if it's more than 8 or 12

			let bg_show_min_case;
			if (total_time < 480) {
			  bg_show_min_case = "text-success";
			} else if (total_time >= 480 && total_time < 720) {
			  bg_show_min_case = "text-warning";
			} else if (total_time >= 720) {
			  bg_show_min_case = "text-danger";
			}


        	let html_show_min_case = 'ใช้เวลารวม : <span class="' + bg_show_min_case + '">' + show_min_case + '</span>' ;
        	new_div_data_sos.querySelector('[mock_up_mark="grade"]').insertAdjacentHTML('afterbegin', html_show_min_case);
        }

        // forward_operation_to เคสนี้ส่งต่อ "ไปที่" ใด
        if (result['forward_operation_to']){

		    new_div_data_sos.querySelector('.forward_operation_to').classList.remove('d-none');

	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_to_code"]').innerHTML = result['forward_operation_to_code'];
	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_to_status"]').innerHTML = result['forward_operation_to_status'];

	        let url_window_open = "{{ url('/') }}" + "/sos_help_center/"+result['forward_operation_to']+"/edit" ;
	        	// console.log(url_window_open);
	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_to_link"]').setAttribute('onclick', "event.preventDefault(); window.open('"+url_window_open+"', '_blank', 'width=1600,height=1200');" );
			new_div_data_sos.querySelector('[mock_up_mark="forward_operation_to_tag_i"]').setAttribute('id', "icon_forward_operation_" + result['forward_operation_to']);
			new_div_data_sos.querySelector('[mock_up_mark="forward_operation_to_tag_i"]').setAttribute('onmouseover', "toggleAnimation('icon_forward_operation_"+result['forward_operation_to']+"', 'fa-beat')");

			// console.log(new_div_data_sos);
        }
        // forward_operation_from เคสนี้ส่งต่อ "มาจาก" ที่ใด
		if (result['forward_operation_from']){

        	new_div_data_sos.querySelector('.forward_operation_from').classList.remove('d-none');

	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_from_code"]').innerHTML = result['forward_operation_from_code'];
	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_from_name_helper"]').innerHTML = result['forward_operation_from_name_helper'];

	        let url_window_open = "{{ url('/') }}" + "/sos_help_center/"+result['forward_operation_from']+"/edit" ;
	        	// console.log(url_window_open);
	        new_div_data_sos.querySelector('[mock_up_mark="forward_operation_from_link"]').setAttribute('onclick', "event.preventDefault(); window.open('"+url_window_open+"', '_blank', 'width=1600,height=1200');" );
			new_div_data_sos.querySelector('[mock_up_mark="forward_operation_from_tag_i"]').setAttribute('id', "icon_forward_operation_" + result['forward_operation_from']);
			new_div_data_sos.querySelector('[mock_up_mark="forward_operation_from_tag_i"]').setAttribute('onmouseover', "toggleAnimation('icon_forward_operation_"+result['forward_operation_from']+"', 'fa-beat')");

        }

		return new_div_data_sos.outerHTML ;
    }

  //   function gen_html_div_data_sos_1669(result){

  //   	// console.log(result);

  //   	// วันที่ / เวลา
  //       const date = new Date(result['created_at']);

		// const options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' };
		// const dateFormatter = new Intl.DateTimeFormat('th-TH', options);
		// const date_created = dateFormatter.format(date);

		// const timeOptions = { hour: 'numeric', minute: 'numeric', hour12: false };
		// const timeFormatter = new Intl.DateTimeFormat('th-TH', timeOptions);
		// const time_created = timeFormatter.format(date);

		// // console.log(date_created);
		// // console.log('Time', time_created);

  //       let url_edit = "/sos_help_center/" + result['id'] + "/edit" ;

  //   	let color_be_notified ;
  //   	if (result['be_notified'] == 'แพลตฟอร์มวีเช็ค') {
  //   		color_be_notified = 'danger' ;
  //   	}else if(result['be_notified'] == 'โทรศัพท์หมายเลข ๑๖๖๙' || result['be_notified'] == 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)'){
  //   		color_be_notified = 'info text-white' ;
  //   	}else if (result['be_notified'] == 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า') {
  //   		color_be_notified = 'warning' ;
  //   	}else{
  //   		color_be_notified = 'secondary' ;
  //   	}

  //   	let html_status ;
  //   	switch(result['status']) {
		// 	case 'รับแจ้งเหตุ':
		// 	    html_status = 	'<button class="float-end btn-request btn-status main-shadow main-radius">'+
		// 		                    'รับแจ้งเหตุ'+
		// 		                '</button>';
		// 	break;
		// 	case 'รอการยืนยัน':
		// 	    html_status = 	'<button class="float-end btn-order btn-status main-shadow main-radius">'+
		// 		                    'สั่งการ'+
		// 		                '</button>';
		//     break;
		//     case 'ออกจากฐาน':
		// 	    html_status = 	'<button class="float-end btn-leave btn-status main-shadow main-radius">'+
		// 		                    'ออกจากฐาน'+
		// 		                '</button>';
		//     break;
		//     case 'ถึงที่เกิดเหตุ':
		// 	    html_status = 	'<button class="float-end btn-to btn-status main-shadow main-radius">'+
		// 		                    'ถึงที่เกิดเหตุ'+
		// 		                '</button>';
		//     break;
		//     case 'ออกจากที่เกิดเหตุ':
		// 	    html_status = 	'<button class="float-end btn-leave-the-scene btn-status main-shadow main-radius">'+
		// 		                    'ออกจากที่เกิดเหตุ'+
		// 		                '</button>';
		//     break;
		//     case 'เสร็จสิ้น':
		// 	    html_status = 	'<button class="float-end btn-hospital btn-status main-shadow main-radius">'+
		// 		                    'เสร็จสิ้น ('+result['remark_status']+')'+
		// 		                '</button>';
		//     break;
		// }

		// let html_address ;

		// if (result['address']) {
  //           let address_ex = result['address'].split("/");
  //           html_address = 	'<span class="float-end">'+
		// 		                address_ex[0] +
		// 		                '<br>'+
		// 		                address_ex[1] + ' ' + address_ex[2] +
		// 		            '</span>' ;
  //   	}else{
  //   		html_address = '<span class="float-end">ไม่มีข้อมูล</span>' ;
  //   	}

  //   	let name_user ;
  //   	if (result['name_user']) {
  //   		name_user = result['name_user'] ;
  //   	}else{
  //   		name_user = 'ไม่ทราบชื่อ' ;
  //   	}

  //   	let phone_user ;
  //   	if (result['phone_user']) {
  //   		phone_user = result['phone_user'] ;
  //   	}else{
  //   		phone_user = 'ไม่ได้ระบุ' ;
  //   	}

  //   	let organization_helper ;
  //   	if (result['organization_helper']) {
  //   		organization_helper = result['organization_helper'] ;
  //   	}else{
  //   		organization_helper = 'ไม่ทราบหน่วยงาน' ;
  //   	}

  //   	let name_helper ;
  //   	if (result['name_helper']) {
  //   		name_helper = result['name_helper'] ;
  //   	}else{
  //   		name_helper = 'ไม่ทราบชื่อ' ;
  //   	}

  //   	let html_idc ;
  //   	switch(result['idc']) {
		// 	case 'แดง(วิกฤติ)':
		// 	    html_idc = 	'<button class="btn-status-crisis btn-status col-6" style="border-radius:0 0 0 20px;">'+
		// 	                        '<b>สถานะการณ์  ( IDC )<br>(วิกฤติ)</b>'+
		// 	                    '</button>' ;
		// 	break;
		// 	case 'ขาว(ทั่วไป)':
		// 	    html_idc = 	'<button class="btn-status-normal btn-status col-6" style="border-radius:0 0 0 20px;">'+
		// 	                        '<b>สถานะการณ์  ( IDC )<br>(ทั่วไป)</b>'+
		// 	                    '</button>' ;
		// 	break;
		// 	case 'เหลือง(เร่งด่วน)':
		// 	    html_idc = 	'<button class="btn-status-hurry btn-status col-6" style="border-radius:0 0 0 20px;">'+
		// 	                        '<b>สถานะการณ์  ( IDC )<br>(เร่งด่วน)</b>'+
		// 	                    '</button>' ;
		// 	break;
		// 	case 'ดำ(รับบริการสาธารณสุขอื่น)':
		// 	    html_idc = 	'<button class="btn-status-other btn-status col-6" style="border-radius:0 0 0 20px;">'+
		// 	                        '<b>สถานะการณ์  ( IDC )<br>(รับบริการอื่นๆ)</b>'+
		// 	                    '</button>' ;
		// 	break;
		// 	case 'เขียว(ไม่รุนแรง)':
		// 	    html_idc = 	'<button class="btn-status-weak btn-status col-6" style="border-radius:0 0 0 20px;">'+
		// 	                        '<b>สถานะการณ์  ( IDC )<br>(ไม่รุนแรง)</b>'+
		// 	                    '</button>' ;
		// 	break;

		// 	default:
		// 		html_idc =	'<button class="btn-status-normal btn-status col-6" style="border-width: 0px;border-radius:0 0 0 20px;">'+
		// 		               '<b>สถานะการณ์  ( IDC )<br>ไม่ได้ระบุ</b>'+
		// 		            '</button>' ;
		// }

		// let html_rc ;
  //   	switch(result['rc']) {
		// 	case 'แดง(วิกฤติ)':
		// 	    html_rc = 	'<button class="btn-status-crisis btn-status col-6" style="border-radius:0 0 20px 0;">'+
		//                         '<b>สถานะการณ์ ( RC )<br>(วิกฤติ)</b>'+
		//                     '</button>' ;
		// 	break;
		// 	case 'ขาว(ทั่วไป)':
		// 	    html_rc = 	'<button class="btn-status-normal btn-status col-6" style="border-radius:0 0 20px 0;">'+
		//                         '<b>สถานะการณ์ ( RC )<br>(ทั่วไป)</b>'+
		//                     '</button>' ;
		// 	break;
		// 	case 'เหลือง(เร่งด่วน)':
		// 	    html_rc = 	'<button class="btn-status-hurry btn-status col-6" style="border-radius:0 0 20px 0;">'+
		//                         '<b>สถานะการณ์ ( RC )<br>(เร่งด่วน)</b>'+
		//                     '</button>' ;
		// 	break;
		// 	case 'ดำ(รับบริการสาธารณสุขอื่น)':
		// 	    html_rc = 	'<button class="btn-status-other btn-status col-6" style="border-radius:0 0 20px 0;">'+
		//                         '<b>สถานะการณ์ ( RC )<br>('+result['rc_black_text']+')</b>'+
		//                     '</button>' ;
		// 	break;
		// 	case 'เขียว(ไม่รุนแรง)':
		// 	    html_rc = 	'<button class="btn-status-weak btn-status col-6" style="border-radius:0 0 20px 0;">'+
		//                         '<b>สถานะการณ์ ( RC )<br>(ไม่รุนแรง)</b>'+
		//                     '</button>' ;
		// 	break;

		// 	default:
		// 		html_rc =	'<button class="btn-status-normal btn-status col-6" style="border-width: 0px;border-radius:0 0 20px 0;">'+
		// 		                '<b>สถานะการณ์ ( RC )<br>ไม่ได้ระบุ</b>'+
		// 		            '</button>' ;
		// }

		// let grade = result['score_total'] ;
		// let rounded_grade = Math.ceil(result['score_total']) ;
		// let html_star = '' ;

		// if (result['score_total']){
		// 	for(let i = 1 ; i <= 5 ; i++){
		// 		if (i <= rounded_grade){
		// 			if (i < rounded_grade){
		// 				html_star = html_star + '<i class="fa-solid fa-star text-warning"></i>' ;
		// 			}else{
		// 				if( grade - i + 1 >= 0.5){
		// 					html_star = html_star + '<i class="fa-solid fa-star text-warning"></i>' ;
		// 				}else{
		// 					html_star = html_star + '<i class="fa-solid fa-star-half-stroke text-warning"></i>' ;
		// 				}
		// 			}
		// 		}else{
		// 			html_star = html_star + '<i class="fa-regular fa-star text-warning"></i>' ;
		// 		}
		// 	}
		// }else{
		// 	html_star = '<span class="text-secondary">ไม่มีการประเมิน</span>' ;
		// }


  //   	let text_html =

	 //    	`
	 //    	<a class="data-show col-lg-6 col-md-6 col-12 a_data_user" href="{{url('/') }}`+url_edit+`">
  //               <div >
  //                   <div class="card card-sos shadow"  id="text_html_id_`+result['id']+`">
  //                       <div class="sos-header">
  //                           <div>
  //                           	<div style="position:absolute;top: 0px;left: 0px;">
	 //                                <button style="border-radius: 0px 20px 20px 0px;" class="btn btn-sm btn-`+color_be_notified+` main-shadow main-radius">
	 //                                    <b>`+result['be_notified']+`</b>
	 //                                </button>
	 //                            </div>
  //                               <br>
  //                               <h4 class="mt-2 m-0 p-0 data-overflow">
  //                                   รหัส <b class="text-dark">`+result['operating_code']+`</b>
  //                               </h4>
  //                               <p class="m-0 data-overflow">
  //                                   `+date_created+`
  //                               </p>
  //                               <p class="m-0 data-overflow">
  //                                   `+time_created+`
  //                               </p>
  //                           </div>
  //                           <div>
  //                           	<span class="float-end h6">
	 //                               	`+html_star+`
	 //                            </span>
	 //                            <br>
  //                               `+html_status+`
  //                               <br>
  //                               <p class="mt-3 data-overflow">
  //                                   `+html_address+`
  //                               </p>
  //                           </div>
  //                       </div>

  //                       <hr style="margin-top: -5px;">

  //                       <div class="sos-username">
  //                           <div class="row">
  //                               <div class="col-2 m-0 text-center d-flex align-items-center">
  //                                   <i class="fa-duotone fa-user"></i>
  //                               </div>
  //                               <div class="col-6 m-0 p-0">
  //                                   <p class="p-0 m-0 color-darkgrey data-overflow topic">ผู้ขอความช่วยเหลือ</p>
  //                                   <h5 class="p-0 m-0 color-dark data-overflow">
  //                                       <b>`+name_user+`</b>
  //                                   </h5>
  //                               </div>
  //                               <div class="col-4 m-0 p-0">
  //                                   <p class="p-0 m-0 color-darkgrey data-overflow topic">เบอร์ติดต่อ</p>
  //                                   <h5 class="p-0 m-0 color-dark data-overflow">
  //                                       <b>`+phone_user+`</b>
  //                                   </h5>
  //                               </div>
  //                           </div>
  //                       </div>

  //                       <hr class="p-0 m-0" style="margin-bottom:0 ;">

  //                       <div class="sos-helper">
  //                           <div class="row">
  //                               <div class="col-6 p-0 helper helper-border">
  //                                   <div class="row">
  //                                       <div class="col-4 text-center d-flex align-items-center icon-organization">
  //                                           <i class="fa-duotone fa-sitemap"></i>
  //                                       </div>
  //                                       <div class="col-8 m-0  pt-2 "style="padding-left:5px">
  //                                           <p class="p-0 m-0 color-darkgrey data-overflow topic">หน่วยงาน</p>
  //                                           <h6 class="p-0 m-0 color-dark data-overflow">
  //                                               `+organization_helper+`
  //                                           </h6>
  //                                       </div>
  //                                   </div>
  //                               </div>
  //                               <div class="col-6 p-0 helper">
  //                                   <div class="row">
  //                                       <div class="col-4 text-center d-flex align-items-center icon-organization">
  //                                           <i class="fa-duotone fa-user-police"></i>
  //                                       </div>
  //                                       <div class="col-8 m-0 p-0 pt-2" >
  //                                           <p class="p-0 m-0 color-darkgrey data-overflow topic">เจ้าหน้าที่</p>
  //                                           <h6 class="p-0 m-0 color-dark data-overflow">
  //                                               `+name_helper+`
  //                                           </h6>
  //                                       </div>
  //                                   </div>
  //                               </div>
  //                           </div>
  //                       </div>

  //                       <hr class="p-0 m-0" style="margin-bottom:0 ;">

  //                       <div class="sos-helper m-0 p-0">
  //                           <div class="row m-0 p-0">
  //                               <!-- IDC -->
  //                               `+html_idc+`
  //                               <!-- RC -->
  //                               `+html_rc+`
  //                           </div>
  //                       </div>

  //                   </div>
  //               </div>
  //           </a>

	 //    	`;

	 //    return text_html ;
  //   }

    function func_arrivalTime(duration){
        // assuming you have already obtained the duration from Google Maps API and stored it in a variable called `duration`
        let date_now = new Date(); // get the current time
        let travelTimeInSeconds = duration; // get the travel time in seconds
        let arrivalTime = new Date(date_now.getTime() + (travelTimeInSeconds * 1000)); // add the travel time to the current time and create a new date object
        // let formattedTime = arrivalTime.toLocaleTimeString(); // format the arrival time as a string in a readable format
        let options = { hourCycle: 'h24' };
        let formattedTime = arrivalTime.toLocaleTimeString('th-TH', options);
            let timeWithoutSeconds = formattedTime.slice(0, -3); // ตัดวินาทีออก
            let timeWithSuffix = `${timeWithoutSeconds} น.`; // เติม "น." เข้าไป

        return timeWithSuffix ;
    }


</script>

<script>
    function toggleAnimation(elementId, animationClass) {
        var element = document.getElementById(elementId);
        element.classList.add(animationClass);

        element.addEventListener('mouseout', function() {
            this.classList.remove(animationClass);
        });
    }
</script>

<script>
function toggleAnimation() {
  	var animationClass = this.dataset.animationClass;
  	var iconElement = this.querySelector('i');

  	if (iconElement){
	  	iconElement.classList.add(animationClass);

		this.addEventListener('mouseleave', function() {
		    iconElement.classList.remove(animationClass);
		});

		var parentElement = this.parentElement;

		parentElement.addEventListener('mouseenter', function() {
		    iconElement.classList.remove(animationClass);
		});

		parentElement.addEventListener('mouseleave', function() {
		    iconElement.classList.remove(animationClass);
		});
	}
}

document.querySelectorAll('.btn').forEach(function(button) {
  button.addEventListener('mouseenter', toggleAnimation);
});
</script>
<a id="tag_a_new_sos1669" class="d-none"></a>
<a id="tag_a_go_to_map" class="d-none" target="bank"></a>
<a id="tag_a_tel_user_1669" class="d-none"></a>

<!-- END SOS 1669 -->



</body>

</html>
