@extends('layouts.partners.theme_partner_new')
<style>
    .active {
        border: 2px solid transparent;
        border-color: #f00;
        box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
    }

    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }
</style>
@section('content')

<div class="container-fluid">
    <div class="card radius-10 p-4">
        <div class="mb-4">
            <span class="h2" style="font-weight: bold;">เพิ่มหมวดหมู่รับเรื่องแจ้งซ่อม</span>
        </div>
        <div class="mb-2">
            <span class="h4" style="font-weight: bold;">พื้นที่ : <b class="text-primary">ViiCHECK พระนครศรีอยุธยา</b></span>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">ชื่อหมวดหมู่</label>
                <input type="text" class="form-control" id="validationCustom01" value="">
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">เลือกกลุ่มไลน์</label>
                <select name="" class="form-control" id="">
                    <option value="">เลือก</option>
                    <option value="">กลุ่มไลน์ 1</option>
                    <option value="">กลุ่มไลน์ 2</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">เลือกสีของหมวดหมู่นี้ </label>
                <label for="validationCustom01" class="form-label text-danger">(สำหรับแสดงในปฏิทิน)</label>

                <input type="color" class="w-100" style="height: 36px !important;">
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-end">

            <button class="btn btn-success px-3" data-toggle="modal" data-target="#modal_secret_token">ยืนยัน</button>
        </div>

        <div class="modal fade" id="modal_secret_token" tabindex="-1" role="dialog" aria-labelledby="modal_secret_token" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="p-4 rounded">
                            <div class="text-center">
                                <i class="fa-regular fa-key text-primary" style="font-size: 110px;"></i>
                            </div>
                            <h4 class="mt-5 font-weight-bold">กรอก Secret Token</h4>
                            <p class="text-muted">กรุณากรอก Secret Token ขององค์กรณ์คุณเพื่อความปลอดภัย</p>

                            <style>
                                .otp-input-fields {
                                    margin: auto;
                                    background-color: white;
                                    /* box-shadow: 0px 0px 8px 0px #02025044; */
                                    /* max-width: 400px; */
                                    width: 100%;
                                    display: flex;
                                    justify-content: space-evenly;
                                    gap: 10px;
                                    padding: 20px 0;
                                }

                                .otp-input-fields input {
                                    height: 40px;
                                    width: 40px;
                                    background-color: transparent;
                                    border-radius: 4px;
                                    border: 1px solid #2f8f1f;
                                    text-align: center;
                                    outline: none;
                                    font-size: 16px;

                                    &::-webkit-outer-spin-button,
                                    &::-webkit-inner-spin-button {
                                        -webkit-appearance: none;
                                        margin: 0;
                                    }

                                    /* Firefox */
                                    &[type=number] {
                                        -moz-appearance: textfield;
                                    }

                                    &:focus {
                                        border-width: 2px;
                                        border-color: darken(#2f8f1f, 5%);
                                        font-size: 20px;
                                    }
                                }


                                .result {
                                    max-width: 400px;
                                    margin: auto;
                                    padding: 24px;
                                    text-align: center;

                                    p {
                                        font-size: 24px;
                                        font-family: 'Antonio', sans-serif;
                                        opacity: 1;
                                        transition: color 0.5s ease;

                                        &._ok {
                                            color: green;
                                        }

                                        &._notok {
                                            color: red;
                                            border-radius: 3px;
                                        }
                                    }
                                }
                            </style>
                            <form action="javascript: void(0)" class="otp-form" name="otp-form">
                                <div class="otp-input-fields">
                                    <input type="number" class="otp__digit otp__field__1" disabled>
                                    <input type="number" class="otp__digit otp__field__2" disabled>
                                    <input type="number" class="otp__digit otp__field__3" disabled>
                                    <input type="number" class="otp__digit otp__field__4" disabled>
                                    <input type="number" class="otp__digit otp__field__5" disabled>
                                    <input type="number" class="otp__digit otp__field__6" disabled>
                                </div>
                                <div id="timer-message" class="text-danger"></div>
                            </form>
                            <div class="d-grid gap-2">
                                <a class="btn btn-white btn-lg" id="btn_close_modal_secret_token" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-arrow-back me-1"></i>ย้อนกลับ
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const inputs = document.querySelectorAll('.otp-input-fields input');
            const errorMessage = document.getElementById('error-message');
            const timerMessage = document.getElementById('timer-message');
            let attempts = 0;
            const maxAttempts = 5; // จำกัดจำนวนครั้งที่ผิดพลาดได้
            let isLocked = false;
            let lockDuration = 300; //300 ระยะเวลาในการล็อกเป็นวินาที (5 นาที)

            // ฟังก์ชันตรวจสอบว่าทุกช่องกรอกครบหรือยัง
            function checkAllFieldsFilled() {
                return Array.from(inputs).every(input => input.value.length === 1);
            }

            // ฟังก์ชันที่ดึงค่าจาก input ทุกช่อง
            function getOtpValue() {
                return Array.from(inputs).map(input => input.value).join('');
            }

            // ฟังก์ชันนับถอยหลังเมื่อถูกล็อก
            function startLockTimer() {
                let remainingTime = lockDuration;

                const interval = setInterval(() => {
                    if (remainingTime <= 0) {
                        clearInterval(interval);
                        unlockForm();
                    } else {
                        timerMessage.textContent = `กรุณารออีก ${remainingTime} วินาทีก่อนที่จะกรอกใหม่`;
                        remainingTime--;
                    }
                }, 1000);
            }

            // ฟังก์ชันล็อกการกรอกฟอร์ม
            function lockForm() {
                isLocked = true;
                inputs.forEach(input => input.disabled = true);
                // errorMessage.textContent = `คุณกรอกผิดมากเกินไป! กรุณารอ 5 นาที`;

                // บันทึกสถานะการล็อกและเวลาที่ล็อกลงใน localStorage
                const lockTime = new Date().getTime();
                localStorage.setItem('isLocked', 'true');
                localStorage.setItem('lockTime', lockTime);

                startLockTimer(lockDuration); // เริ่มล็อกเป็นเวลา 5 นาที (300 วินาที)
            }

            // ฟังก์ชันปลดล็อกการกรอกฟอร์ม
            function unlockForm() {
                isLocked = false;
                attempts = 0;
                inputs.forEach(input => input.disabled = false);
                // errorMessage.textContent = '';
                timerMessage.textContent = '';

                // ลบสถานะการล็อกจาก localStorage
                localStorage.removeItem('isLocked');
                localStorage.removeItem('lockTime');
            }

            // ฟังก์ชันนับถอยหลังเมื่อถูกล็อก
            function startLockTimer(remainingTime) {
                const interval = setInterval(() => {
                    remainingTime = Math.floor(remainingTime); // ปัดเศษเวลาให้เป็นจำนวนเต็ม
                    if (remainingTime <= 0) {
                        clearInterval(interval);
                        unlockForm();
                    } else {
                        timerMessage.textContent = `กรุณารออีก ${remainingTime} วินาทีก่อนที่จะกรอกใหม่`;
                        remainingTime--;
                    }
                }, 1000);
            }

            // ตรวจสอบสถานะการล็อกเมื่อโหลดหน้า
            function checkLockStatus() {
                const isLocked = localStorage.getItem('isLocked');
                const lockTime = localStorage.getItem('lockTime');

                if (isLocked === 'true' && lockTime) {
                    const currentTime = new Date().getTime();
                    const elapsedTime = (currentTime - lockTime) / 1000; // เวลาที่ผ่านไปในวินาที
                    const remainingTime = lockDuration - elapsedTime; // คำนวณเวลาที่เหลือ

                    if (remainingTime > 0) {
                        lockForm();
                        startLockTimer(remainingTime); // เริ่มนับถอยหลังจากเวลาที่เหลือ
                    } else {
                        unlockForm(); // ปลดล็อกถ้าหมดเวลาล็อกแล้ว
                    }
                } else {
                    unlockForm();
                }
            }

            // เรียก checkLockStatus เมื่อหน้าโหลดเสร็จ
            window.onload = checkLockStatus;

            // ฟังก์ชันที่ทำงานเมื่อกรอก OTP ครบ
            function onComplete() {
                const otpValue = getOtpValue();
                if (otpValue == '123456') {
                    // $('#modal_secret_token').modal('hide')
                    document.querySelector('#btn_close_modal_secret_token').click();

                    for (let i = 1; i <= 6; i++) {
                        document.querySelector(`.otp__field__${i}`).value = '';
                    }

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "บันทึกเรียบร้อย",
                        showConfirmButton: false,
                        timer: 1500
                    });


                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Secret Token ไม่ถูกต้อง",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    attempts++;
                    if (attempts >= maxAttempts) {
                        lockForm();
                    }
                }

            }

            // ฟังก์ชันจัดการการวาง (paste) ตัวเลขลงในช่องใดก็ได้ แต่กระจายตั้งแต่ช่องแรก
            function handlePaste(event) {
                if (isLocked) {
                    event.preventDefault();
                    return;
                }

                const pasteData = event.clipboardData.getData('text').trim();

                if (/^\d+$/.test(pasteData)) {
                    // กระจายตัวเลขตั้งแต่ช่องแรก
                    Array.from(inputs).forEach((input, index) => {
                        input.value = pasteData[index] || '';
                    });

                    // หลังจากกระจายเสร็จ ให้โฟกัสที่ช่องสุดท้าย
                    inputs[inputs.length - 1].focus();

                    // ตรวจสอบว่าทุกช่องถูกกรอกครบแล้วหรือยัง
                    if (checkAllFieldsFilled()) {
                        onComplete();
                    }
                }
                event.preventDefault(); // ป้องกันการวางข้อมูลลงใน input ที่โดนคลิก
            }

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (isLocked) {
                        e.preventDefault();
                        return;
                    }

                    if (e.target.value.length > 1) {
                        e.target.value = e.target.value.slice(0, 1);
                    }
                    if (e.target.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    // ตรวจสอบว่าทุกช่องถูกกรอกครบแล้วหรือยัง
                    if (checkAllFieldsFilled()) {
                        onComplete();
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (isLocked) {
                        e.preventDefault();
                        return;
                    }

                    if (e.key === 'Backspace' && !e.target.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                    if (e.key === 'e') {
                        e.preventDefault();
                    }
                });

                // เพิ่มการตรวจจับเหตุการณ์ paste ในทุกช่อง
                input.addEventListener('paste', handlePaste);
            });

            // // ปลดล็อกฟอร์มเมื่อโหลดหน้า
            // unlockForm();
        </script>
        <!-- <script>
            var otp_inputs = document.querySelectorAll(".otp__digit")
                var mykey = "0123456789".split("")
                otp_inputs.forEach((_)=>{
                _.addEventListener("keyup", handle_next_input)
                })
                function handle_next_input(event){
                let current = event.target
                let index = parseInt(current.classList[1].split("__")[2])
                current.value = event.key
                
                if(event.keyCode == 8 && index > 1){
                    current.previousElementSibling.focus()
                }
                if(index < 6 && mykey.indexOf(""+event.key+"") != -1){
                    var next = current.nextElementSibling;
                    next.focus()
                }
                var _finalKey = ""
                for(let {value} of otp_inputs){
                    _finalKey += value
                }
                if(_finalKey.length == 6){
                    
                    // ดึงค่า secret token มาเช็คตรงนี้นาจา
                    if (_finalKey == '123456') {
                        // $('#modal_secret_token').modal('hide')
                        document.querySelector('#btn_close_modal_secret_token').click();
                        
                        for (let i = 1; i <= 6; i++) {
                            document.querySelector(`.otp__field__${i}`).value = '';
                        }

                        Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "บันทึกเรียบร้อย",
                        showConfirmButton: false,
                        timer: 1500
                        });


                    } else {
                        Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Secret Token ไม่ถูกต้อง",
                        showConfirmButton: false,
                        timer: 1500
                        });
                    }
                }
                }
        </script> -->
        <!-- <div class="row mt-4">
            {{-- <div class="col-12 col-md-6 col-lg-6">
                    <label class="h4" style="font-weight: bold;">ชื่อหมวดหมู่</label>
                    <input class="form-control radius-15" type="text" placeholder="พิมพ์ชื่อหมวดหมู่">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <label class="h4" style="font-weight: bold;">เลือกกลุ่มไลน์</label>
                    <input class="form-control radius-15 dropdown" type="text" placeholder="เลือกกลุ่มไลน์">
                </div> --}}
            <div class="col-12 col-md-6 col-lg-6">
                <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">ชื่อหมวดหมู่</label>
                <input class="form-control radius-15" list="nameCategorie" name="nameCategorie" value="">
                <datalist id="nameCategorie">

                </datalist>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกกลุ่มไลน์</label>

                <input class="form-control radius-15" list="selectGroupLine" name="selectGroupLine" value="">
                <datalist id="selectGroupLine">

                </datalist>
            </div>

            <div class="d-flex col-12 col-md-6 col-lg-6 mt-2 d-none">
                <input id="colorCodeCategorie" class="form-control radius-15" type="text" value="">
                <div class="header-colors-indigators">
                    <div class="indigator" id="colorExample"></div>
                </div>
            </div>

        </div>

        <div class="row my-4">
            <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกสีหมวดหมู่
                <small class="text-danger" style="font-size: 16px;">(สำหรับแสดงในปฏิทิน)</small>
            </label>
            <div class="header-colors-indigators">
                <div class="row col-6 g-3">
                    <div class="col-1">
                        <div class="indigator" id="colorItem_1"></div>
                    </div>
                    <div class="col-1">
                        <div class="indigator" id="colorItem_2"></div>
                    </div>
                    <div class="col-1">
                        <div class="indigator" id="colorItem_3"></div>
                    </div>
                    <div class="col-1">
                        <div class="indigator" id="colorItem_4"></div>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center h-100 ">
                        <i class="fas fa-sync-alt d-flex justify-content-center align-items-center bg-white cursor-pointer"
                            style="width:45px; height: 45px; font-size:35px;" onclick="random_colorCategories();"></i>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1">
                                <div class="indigator" id="color_item_Code_Ex"></div>
                            </div>
                            <div class="col-11">
                                <input style="margin-top:5px;" type="text" class="form-control w-25" id="code_colorCategorie" name="code_colorCategorie" placeholder="color code" oninput="add_color_item_Code_Categorie();">
                            </div>
                            <div id="" class="col-12 mt-2 " style="height: 20px;">
                                <span class="text-danger" id="textAlertInvalidCC"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-6 g-3">

                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-md-5">
                <input class="form-control radius-15" list="passwordGroupLine" name="passwordGroupLine" value="" placeholder="กรอก secret token">
            </div>
            <div class="col-12 col-md-7">
                <button class="btn btn-success disabled w-100 radius-15">ยืนยัน</button>
            </div>

        </div> -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        random_colorCategories();
    });

    function random_colorCategories() {
        //ลบสีที่เลือก
        let indigator = document.querySelectorAll('.indigator');
        indigator.forEach(function(items) {
            items.classList.remove('active');
        });
        let colorCodeCategorie = document.querySelector('#colorCodeCategorie');
        colorCodeCategorie.value = "";

        let letters = '0123456789ABCDEF'.split('');
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        // console.log(color);
        add_color_to_itemCategories(color)
    }

    function add_color_to_itemCategories(color) {
        let text_color = color.split('');

        let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" + "CC";
        let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" + "CC";
        let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" + "CC";
        let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" + "CC";
        let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" + "CC";
        // let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
        // let color_7 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "11" ;
        // let color_8 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

        // 1
        let color_item_1 = document.querySelector('#colorItem_1');
        let color_item_1_style = document.createAttribute("style");
        color_item_1_style.value = "background-color:" + color_1 + " ;";
        color_item_1.setAttributeNode(color_item_1_style);
        let click_color_item_1 = document.createAttribute("onclick");
        click_color_item_1.value = `selectColorCategories('${color_1}', '${color_item_1.id}')`;
        color_item_1.setAttributeNode(click_color_item_1);

        // 2
        let color_item_2 = document.querySelector('#colorItem_2');
        let color_item_2_style = document.createAttribute("style");
        color_item_2_style.value = "background-color:" + color_2 + " ;";
        color_item_2.setAttributeNode(color_item_2_style);
        let click_color_item_2 = document.createAttribute("onclick");
        click_color_item_2.value = `selectColorCategories('${color_2}', '${color_item_2.id}')`;
        color_item_2.setAttributeNode(click_color_item_2);

        // 3
        let color_item_3 = document.querySelector('#colorItem_3');
        let color_item_3_style = document.createAttribute("style");
        color_item_3_style.value = "background-color:" + color_3 + " ;";
        color_item_3.setAttributeNode(color_item_3_style);
        let click_color_item_3 = document.createAttribute("onclick");
        click_color_item_3.value = `selectColorCategories('${color_3}', '${color_item_3.id}')`;
        color_item_3.setAttributeNode(click_color_item_3);

        // 4
        let color_item_4 = document.querySelector('#colorItem_4');
        let color_item_4_style = document.createAttribute("style");
        color_item_4_style.value = "background-color:" + color_4 + " ;";
        color_item_4.setAttributeNode(color_item_4_style);
        let click_color_item_4 = document.createAttribute("onclick");
        click_color_item_4.value = `selectColorCategories('${color_4}', '${color_item_4.id}')`;
        color_item_4.setAttributeNode(click_color_item_4);

    }

    function add_color_item_Code_Categorie() {
        let code_colorCategorie = document.querySelector('#code_colorCategorie').value;
        if (code_colorCategorie.length === 5 || code_colorCategorie.length === 7) {
            code_colorCategorie += "cc"; // เพิ่ม "cc" ต่อท้ายโค้ดสี
        }

        let color_item_Ex_menu = document.querySelector('#color_item_Code_Ex');
        color_item_Ex_menu.style = "";
        color_item_Ex_menu.onclick = "";

        // ตรวจสอบว่ามีคลาส 'active' หรือไม่
        let colorCodeCategorie = document.querySelector('#colorCodeCategorie');
        if (color_item_Ex_menu.classList.contains('active')) {
            color_item_Ex_menu.classList.remove('active');
            colorCodeCategorie.value = "";
        }

        let color_item_Ex_style_menu = document.createAttribute("style");
        color_item_Ex_style_menu.value = "background-color:" + code_colorCategorie + " ;";
        color_item_Ex_menu.setAttributeNode(color_item_Ex_style_menu);
        let click_color_item_Ex_menu = document.createAttribute("onclick");
        click_color_item_Ex_menu.value = `selectColorCategories('${code_colorCategorie}', '${color_item_Ex_menu.id}')`;
        color_item_Ex_menu.setAttributeNode(click_color_item_Ex_menu);
    }

    function selectColorCategories(color, element) {
        let indigator = document.querySelectorAll('.indigator');
        let selectedElement = document.querySelector('#' + element);
        let colorCodeCategorie = document.querySelector('#colorCodeCategorie');

        // ตรวจสอบว่าเป็นโค้ดสีที่ถูกต้องหรือไม่
        if (!isValidColorCode(color)) {
            let alertText = document.querySelector('#textAlertInvalidCC');

            // แสดง div โดยการลบคลาส d-none
            alertText.innerHTML = "โค้ดสีไม่ถูกต้อง กรุณาป้อนโค้ดสีที่ถูกต้องในรูปแบบ #RRGGBB หรือ #RRGGBBAA";

            // หลังจาก 3 วินาที ให้ค่อยๆ fade-out
            setTimeout(() => {
                alertText.innerHTML = "";
            }, 5000);
            return;
        } else {
            colorCodeCategorie.value = color;

            let colorExample = document.querySelector('#colorExample');
            let colorExample_style = document.createAttribute("style");
            colorExample_style.value = "background-color:" + color + " ;";
            colorExample.setAttributeNode(colorExample_style);
        }

        // console.log("color "+color);
        // console.log("element "+element);

        // Remove 'active' class from all thumbnails
        indigator.forEach(function(items) {
            items.classList.remove('active');
        });

        selectedElement.classList.add('active');
    }

    function isValidColorCode(code) {
        // ตรวจสอบว่าโค้ดสีอยู่ในรูปแบบที่ถูกต้อง
        const regex = /^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{8})$/;
        return regex.test(code);
    }
</script>


@endsection