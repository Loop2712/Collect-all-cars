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
		min-height: calc(100%) !important;
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
		padding: .5rem 1rem;
		border-radius: 10px;
		margin: 1rem;
		color: #fff !important;
	}

	.infomation-user .role-user-video-call,
	.infomation-user .name-user-video-call {
		display: block;
	}

	.status-input-output .mic,
	.status-input-output .camera {
		margin: 5px;
		background-color: rgb(0, 0, 0, 0.4);
		padding: .5rem 1rem;
		border-radius: 10px;
		color: #fff;
	}

	.user-video-call-bar .custom-div .infomation-user {
		transform: scale(0.5);
		margin: 0;
		bottom: -10px;
		right: -10px;
	}

	.user-video-call-bar .custom-div .status-input-output {
		transform: scale(0.7);
		margin: 0;
		top: -3px;
		right: -10px;
	}

	.status-case-bar {
		padding: .9rem;
		height: 100%;
		display: flex;
		align-items: center;
	}

	.status-case-bar p {
		width: calc(100% - 10%);
		background-color: #f5b905;
		font-size: 22px;
		border-radius: 50px;
		height: 100%;
		display: flex;
		align-items: center;
		margin: 1rem;
		padding: 1rem;
	}

	.status-case-bar button {
		width: calc(100% - 90%);
		height: 100%;
		margin: 1rem;

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
	}
</style>
<button id="addButton" style="position: absolute;top:10%;right: 0;">เพิ่ม div</button>
<div class="row full-height">
	<div class="Scenary"></div>
	<div class="col-12" style="height: calc(100% - 90%);">
		<div class="status-case-bar">
			<p>ออกจากฐาน</p>
			<button class="btn btn-success" id="fadeButton"><i class="fa-solid fa-file-invoice"></i></button>
		</div>
	</div>
	<div class="col-12" style="height: calc(100% - 20%);">
		<div class="d-flex h-100 row">
			<div class="video-call">
				<div class=" d-flex align-item-center justify-content-center h-100 row">
					<div class="d-flex align-self-center">
						<div class="row" id="container_user_video_call">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-2 pt-2" style="height: calc(100% - 90%);">
		<div class="w-100 user-video-call-contrainer d-none">
			<div class="d-flex justify-content-center align-self-end d-non user-video-call-bar">
			</div>
		</div>
		<div class="btn-video-call-container mt-5">
			<div class="row g-3">
				<button style="font-size: 50px;padding:2rem" class="m-2 btn btn-success col"><i class="fa-solid fa-microphone"></i></button>
				<button style="font-size: 50px;padding:2rem" class="m-2 btn btn-success col"><i class="fa-solid fa-video"></i></button>
				<button style="font-size: 50px;padding:2rem" class="m-2 btn btn-danger col"><i class="fa-solid fa-phone-slash"></i></button>
			</div>
		</div>
	</div>
</div>

<div class="fadeDiv" id="dataDiv" style="display: none;">
	<div class="card m-4">
		<div class="card-body">
			<h1>2308-1406-0014</h1>
			<h1>สถานะ : เสร็จสิ้น</h1>
			<p class="text-muted font-size-md">การช่วยเหลือผ่านไปแล้ว</p>
			<h3 class="text-danger">25 นาที</h3>
		</div>
	</div>

	<div class="card m-4">
		<div class="card-body">
			<h1 class="d-flex align-items-center mb-3">ข้อมูลผู้ขอความช่วยเหลือ</h1>
			<h3 class="text-muted font-size-xl">name user</h3>
			<h3 class="text-muted font-size-xl">081-234-5678</h3>
		</div>
	</div>

	<div class="card m-4">
		<div class="card-body">
			<div class="row mb-3">
				<div class="col ">
					<div class="bg-danger p-2 text-center" style="border-radius: 15px;">
						<h1 class="text-white">IDC : แดง</h1>
					</div>
				</div>
				<div class="col ">
					<div class="bg-danger p-2 text-center" style="border-radius: 15px;">
						<h1 class="text-white">IDC : แดง</h1>
					</div>
				</div>
			</div>
			<div class="mb-5">
				<h1 class="d-flex align-items-center mb-3 ">รายละเอียดสถานที่</h1>
				<h3 class="text-muted font-size-xl">80 หมู่ที่ 2 ศูนย์การค้า Big C อยุธยา ตำบล บ้านกรด อำเภอบางปะอิน จังหวัดพระนครศรีอยุธยา 13160 ประเทศไทย</h3>
			</div>
			<div class="mb-5">
				<h1 class="d-flex align-items-center mb-3 ">อาการ</h1>
				<h3 class="text-muted font-size-xl">๒๕.อุบัติเหตุยานยนต์ ๑๙.หมดสติ ไม่ตอบสนอง หมดสติชั่ววูบ </h3>
			</div>
			<div class="mb-5">
				<h1 class="d-flex align-items-center mb-3 ">รายละเอียดอาการ</h1>
				<h3 class="text-muted font-size-xl">รถชนขาซ้ายหัก ขาขวาขาด</h3>
			</div>
		</div>
	</div>
</div>


<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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
		document.querySelector(".btn-video-call-container").classList.add("d-none");


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

	}


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
		if (childCount === 2) {
			var t = document.createTextNode("#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(100% - 40px);aspect-ratio: 16/9;}");
		} else if (childCount === 3) {
			var t = document.createTextNode("#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(100% - 40px);aspect-ratio: 16/9;}#container_user_video_call .custom-div:not(:only-child):first-child {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;}#container_user_video_call .custom-div:not(:only-child):nth-child(2) {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;}");
		} else if (childCount === 4) {
			var t = document.createTextNode("#container_user_video_call .custom-div:not(:only-child) {flex: 0 0 calc(50% - 40px);aspect-ratio: 3/4;}");
		}

		x.appendChild(t);
		document.head.appendChild(x);
	}
</script>
