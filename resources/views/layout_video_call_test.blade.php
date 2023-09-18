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
</style>
<button id="addButton" style="position: absolute;top:10%;right: 0;">เพิ่ม div</button>
<div class="row full-height">
	<div class="Scenary"></div>
	<div class="col-12 col-lg-2">
		<div class="data-sos text-center p-3 d-flex row">
			<h4 class="mt-3 col-12 ">รหัสเคส:123</h4>
			<div class="d-flex">
				<div class="align-self-end w-100">
					<button class="btn btn-success">asd</button>
					<button class="btn btn-success">asd</button>
					<button class="btn btn-success">asd</button>
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
