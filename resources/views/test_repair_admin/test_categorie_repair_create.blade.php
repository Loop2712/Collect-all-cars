@extends('layouts.partners.theme_partner_new')

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
            </div>

            <div class="row my-4">
                <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกสีหมวดหมู่
                    <small class="text-danger" style="font-size: 16px;">(สำหรับแสดงในปฏิทิน)</small>
                </label>
                <div class="header-colors-indigators">
                    <div class="row col-6 g-3">
                        <div class="col-1">
                            <div class="indigator" id="color_item_1"></div>
                        </div>
                        <div class="col-1">
                            <div class="indigator" id="color_item_2"></div>
                        </div>
                        <div class="col-1">
                            <div class="indigator" id="color_item_3"></div>
                        </div>
                        <div class="col-1">
                            <div class="indigator" id="color_item_4"></div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">
                                    <div class="indigator" id="color_item_Ex"></div>
                                </div>
                                <div class="col-11">
                                    <input style="margin-top:5px;" type="text" class="form-control w-25" id="code_color" name="code_color" placeholder="color code" oninput="add_color_item_Ex();">
                                </div>
                            </div>
                        </div>
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

        });

        function random_color(){
            let letters = '0123456789ABCDEF'.split('');
            let color = '#';

            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            add_color_to_item(color)
        }

        function add_color_to_item(color){
            let text_color = color.split('');

            let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" ;
            let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" ;
            let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" ;
            let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" ;
            // let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" ;
            // let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
            // let color_7 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "11" ;
            // let color_8 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

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

        }

        function add_color_item_Ex_menu(){
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

        // function add_input_color_menu(color){
        //     var header_wrapper_menu = document.querySelector('#header-wrapper_menu');

        //     switch (color) {
        //         case "1":
        //             color = "#null" ;
        //             class_color_menu = "1"
        //                 header_wrapper_menu.style = "" ;
        //         break;
        //         case "2":
        //             color = "#null" ;
        //             class_color_menu = "2"
        //                 header_wrapper_menu.style = "" ;
        //         break;
        //         case "3":
        //             color = "#null" ;
        //             class_color_menu = "3"
        //                 header_wrapper_menu.style = "" ;
        //         break;
        //         case "4":
        //             color = "#null" ;
        //             class_color_menu = "4"
        //                 header_wrapper_menu.style = "" ;
        //         break;
        //         default:
        //             color = color ;
        //             class_color_menu = "other"

        //             let html_class = document.querySelector('#html_class');

        //             let html_class_class_1 = document.createAttribute("class");
        //                 html_class_class_1.value = "";
        //                 html_class.setAttributeNode(html_class_class_1);

        //             let html_class_class_2 = document.createAttribute("class");
        //                 html_class_class_2.value = "";
        //                 html_class.setAttributeNode(html_class_class_2);

        //             let switcher_wrapper_menu = document.querySelector('#switcher-wrapper_menu');
        //                 switcher_wrapper_menu.style = "" ;
        //                 switcher_wrapper_menu.style = "background-color: " + color + ";" ;

        //                 header_wrapper_menu.style = "" ;
        //                 header_wrapper_menu.style = "background-color: " + color + ";" ;


        //     }

        //     // console.log(color);
        //     // console.log(class_color_menu);

        //     color = color.replace("#","_");

        //     let color_of_partner = document.querySelector('#color_of_partner');
        //         color_of_partner = color_of_partner.value.replaceAll(" ","_");

        //     fetch("{{ url('/') }}/api/change_color_menu/"+ color + "/" + color_of_partner + "/" + class_color_menu);
        // }
    </script>


@endsection
