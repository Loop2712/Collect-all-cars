@extends('layouts.partners.theme_partner_new')
    <style>
        .active {
            border: 2px solid transparent;
            border-color: #f00;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
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

            <div class="row mt-4">
                {{-- <div class="col-12 col-md-6 col-lg-6">
                    <label class="h4" style="font-weight: bold;">ชื่อหมวดหมู่</label>
                    <input class="form-control radius-15" type="text" placeholder="พิมพ์ชื่อหมวดหมู่">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <label class="h4" style="font-weight: bold;">เลือกกลุ่มไลน์</label>
                    <input class="form-control radius-15 dropdown" type="text" placeholder="เลือกกลุ่มไลน์">
                </div> --}}
                <div class="col-12 col-md-6 col-lg-6" >
                    <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">ชื่อหมวดหมู่</label>
                    <input class="form-control radius-15" list="nameCategorie" name="nameCategorie" value="">
                    <datalist id="nameCategorie">

                    </datalist>
                </div>
                <div class="col-12 col-md-6 col-lg-6" >
                    <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกกลุ่มไลน์</label>
                    <input class="form-control radius-15" list="selectGroupLine" name="selectGroupLine" value="">
                    <datalist id="selectGroupLine">

                    </datalist>
                </div>

                <div class="d-flex col-12 col-md-6 col-lg-6 mt-2 d-non" >
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

            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            random_colorCategories();
        });

        function random_colorCategories(){
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

        function add_color_to_itemCategories(color){
            let text_color = color.split('');

            let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" + "CC" ;
            let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" + "CC" ;
            let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" + "CC" ;
            let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" + "CC" ;
            let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" + "CC" ;
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

        function add_color_item_Code_Categorie(){
            let code_colorCategorie = document.querySelector('#code_colorCategorie').value ;
            if (code_colorCategorie.length === 5 || code_colorCategorie.length === 7) {
                code_colorCategorie += "cc";// เพิ่ม "cc" ต่อท้ายโค้ดสี
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

        function selectColorCategories(color,element){
            let indigator = document.querySelectorAll('.indigator');
            let selectedElement = document.querySelector('#'+element);
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
            }else{
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
