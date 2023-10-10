<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
<link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

<style>
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
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
	}
	.data-sos *{
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
		background-color: #000;
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
	}

	#container_user_video_call  .custom-div:only-child{
		flex: 0 0 calc(100% - 40px);
	}
	#container_user_video_call  .custom-div:not(:only-child) {
		flex: 0 0 calc(50% - 40px);
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
		background-color: rgb(0, 0, 0, 0.4);
		padding: .5rem 1rem;
		border-radius: 10px;
		margin: 1rem;
		color: #fff !important;
	}

	.infomation-user .role-user-video-call ,.infomation-user .name-user-video-call{
		display: block;
	}
	.status-input-output .mic ,.status-input-output .camera{
		margin: 5px;
		background-color: rgb(0, 0, 0, 0.4);
		padding: .5rem 1rem;
		border-radius: 10px;
		color: #fff;
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

    /*================================================= */
    .dropcontent {
        visibility: hidden;
        width: 142px;
        & a {
            color: $success;
        }
    }

    .open {
        visibility: visible;
    }

    .btnSpecial {
        background-color: #3f3e3e; /* Discord's color */
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
        border:#fff 1px solid;
    }

    .btnSpecial:hover {
        background-color: #292828; /* Discord's color */
    }


    .btnSpecial i{
        color: #ffffff;
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
        bottom: 90; /* ตำแหน่ง list ขึ้นด้านบนของปุ่ม */
        left: 10;
        background-color: #3f3e3e;
        border-radius: 5px;
        z-index: 1; /* เพื่อให้แสดงอยู่ข้างบนของปุ่ม */
    }

    .ui-list-item {
        color: #ffffff; /* สีข้อความ */
        padding: 10px;
        border-radius: 5px;
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

    .head_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: 170px;
        padding: 10px;
        border-radius: 2px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
    }

    .neck_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: 140px;
        padding: 10px;
        border-radius: 2px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
    }

    .body_sidebar_div {
        background-color: rgb(255, 255, 255);
        height: 500px;
        padding: 10px;
        border-radius: 2px;
        margin-left: 2px; /* เพิ่มระยะห่างจากขอบซ้าย 2px */
    }

    .border-radius{
        border-radius: 10px;
    }

    .nowordwarp{
        word-wrap: break-word;
    }


</style>
<button id="addButton" style="position: absolute;top:10%;right: 0;">เพิ่ม div</button>
<div class="row full-height">
	<div class="Scenary"></div>
	<div class="col-12 col-lg-2">
		<div class="data-sos p-3 d-flex row">
            <div class="head_sidebar_div overflow-auto text-center mb-2">
                <p class="h4 text-dark mt-3">2308-1406-0014</p>
                <p class="h5 text-dark ">สถานะ: เสร็จสิ้น</p>
                <p class="h6 text-dark ">การช่วยเหลือผ่านไปแล้ว</p>
                <p class="h5 text-dark ">25 นาที</p>
            </div>

            <div class="neck_sidebar_div overflow-auto text-center mt-0 mb-2">
                <p class="h5 text-secondary mt-3">ข้อมูลผู้ขอความช่วยเหลือ</p>
                <p class="h5 text-secondary ">ชื่อผู้ขอความช่วยเหลือ</p>
                <p class="h6 text-secondary ">081-2345678</p>
            </div>

            <div class="body_sidebar_div overflow-auto mb-2 ">
                <div class="d-flex justify-content-center text-center">
                    <p class="bg-success p-2 m-1 col-5 border-radius">IDC : เขียว</p>
                    <p class="bg-danger p-2 m-1 col-5 border-radius">RC : แดง</p>
                </div>
                <div class="p-2 nowordwarp text-start">
                    <p class="h5 text-secondary mt-1">รายละเอียดสถานที่</p>
                    <p class="h6 text-secondary ">{รายละเอียดสถานที่}</p>
                    <p class="h5 text-secondary mt-1">อาการ</p>
                    <p class="h6 text-secondary ">1.{อาการ}</p>
                    <p class="h5 text-secondary mt-1">รายละเอียดอาการ</p>
                    <p class="h6 text-secondary ">{รายละเอียดอาการ}</p>
                </div>

            </div>

			<div class="d-flex text-center">
				<div class="align-self-end w-100 " style="position: absolute; bottom: 5;">
                        <div class="btn btnSpecial" >
                            <i class="fa-solid fa-microphone-stand"></i>
                            <div class="smallCircle" id="droptrigger">
                                <i class="fa-sharp fa-solid fa-angle-up"></i>
                            </div>
                        </div>
                        <div class="dropcontent">
                            <ul class="ui-list">
                                <li class="ui-list-item">รายการ 1</li>
                                <li class="ui-list-item">รายการ 2</li>
                                <li class="ui-list-item">รายการ 3</li>
                                <li class="ui-list-item">รายการ 4</li>
                                <li class="ui-list-item">รายการ 5</li>
                                <li class="ui-list-item">รายการ 6</li>
                              </ul>
                        </div>

				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-10 full-height d-flex row">
		<div class="video-call">
			<div class=" d-flex align-item-center justify-content-center h-100 row">
				<div class="d-flex align-self-center">
					<div class="row" id="container_user_video_call">
						<!-- <div class="custom-div"">
							<div class="status-input-output">
								<div class="mic"><i class="fa-duotone fa-microphone"></i></div>
								<div class="camera"><i class="fa-solid fa-video"></i></div>
							</div>

							<div class="infomation-user">
								<div class="name-user-video-call">
									<h5 class="m-0 text-white float-end"><b>lucky</b></h5>
								</div>
								<div class="role-user-video-call">
									<small class="d-block">ศูนย์สั่งการ</small>
								</div>
							</div>
						</div> -->
					</div>
				</div>

				<!-- <div class="bg-success test col">user4</div> -->
				<div class="w-100 user-video-call-contrainer d-none">
					<div class="d-flex justify-content-center align-self-end d-non user-video-call-bar">
						<!-- <div class="parent">
							<div class="child"></div>
						</div>
						<div class="parent">
							<div class="child"></div>
						</div>
						<div class="parent">
							<div class="child"></div>
						</div> -->

					</div>

					<button class="btn-show-hide-user-video-call btn" onclick="document.querySelector('.user-video-call-bar').classList.toggle('d-none');">ลง</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#droptrigger").click(function() {
            $(".dropcontent").toggleClass("open", 1000)
        })

    });
	// สร้าง div ใหม่และเพิ่ม event listener บน div .custom-div ใหม่


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


}


// ย้าย div ไปยัง .user-video-call-bar หากไม่อยู่ในนั้นและสลับ div
function moveDivsToUserVideoCallBar(clickedDiv) {
    let container = document.getElementById("container_user_video_call");
    let customDivs = container.querySelectorAll(".custom-div");
    let userVideoCallBar = document.querySelector(".user-video-call-bar");
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


}

// จัดเรียกใช้งานเมื่อคลิกที่ div
// function handleClick(clickedDiv) {
//     let userVideoCallBar = document.querySelector(".user-video-call-bar");
//     let customDivsInUserVideoCallBar = userVideoCallBar.querySelectorAll(".custom-div");

//     if (customDivsInUserVideoCallBar.length > 0) {
//         moveAllDivsToContainer();
//     } else {
//         moveDivsToUserVideoCallBar(clickedDiv);
//     }
// }

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
</script>
