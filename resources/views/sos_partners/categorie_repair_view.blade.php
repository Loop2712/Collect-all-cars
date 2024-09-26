@extends('layouts.partners.theme_partner_sos')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .button-cover:before {
        counter-increment: button-counter;
        content: counter(button-counter);
        position: absolute;
        right: 0;
        bottom: 0;
        color: #d7e3e3;
        font-size: 12px;
        line-height: 1;
        padding: 5px;
    }

    .button-cover,
    .knobs,
    .layer {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .button {
        position: relative;
        /* top: 50%; */
        width: 74px;
        height: 36px;
        /* margin: -20px auto 0 auto; */
        overflow: hidden;
    }

    .checkbox {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 3;
    }

    .knobs {
        z-index: 2;
    }

    .layer {
        width: 100%;
        transition: 0.3s ease all;
        background-color: #fcebeb;
        z-index: 1;
    }

    .button.r,
    .button.r .layer {
        border-radius: 100px;
    }

    #button-3 .knobs:before {
        content: "ปิด";
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        color: #fff;
        font-size: 10px;
        font-weight: bold;
        text-align: center;
        line-height: 1;
        padding: 9px 4px;
        background-color: #f44336;

        border-radius: 50%;
        transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
    }

    #button-3 .checkbox:active+.knobs:before {
        width: 46px;
        border-radius: 100px;
    }

    #button-3 .checkbox:checked:active+.knobs:before {
        margin-left: -26px;
    }

    #button-3 .checkbox:checked+.knobs:before {
        content: "เปิด";
        left: 42px;
        background-color: #56de57;

    }

    #button-3 .checkbox:checked~.layer {
        background-color: #e2f1e1;
    }

    /* From Uiverse.io by Admin12121 */
    .switch-button {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        justify-content: center;
        margin: auto;
        height: 35px;
    }

    .switch-button .switch-outer {
        height: 100%;
        background: #252532;
        width: 90px;
        border-radius: 165px;
        -webkit-box-shadow: inset 0px 5px 10px 0px #16151c, 0px 3px 6px -2px #403f4e;
        box-shadow: inset 0px 5px 10px 0px #16151c, 0px 3px 6px -2px #403f4e;
        border: 1px solid #32303e;
        padding: 6px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }

    .switch-button .switch-outer input[type="checkbox"] {
        opacity: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        position: absolute;
    }

    .switch-button .switch-outer .button-toggle {
        height: 22px;
        width: 22px;
        background: -webkit-gradient(linear,
                left top,
                left bottom,
                from(#3b3a4e),
                to(#272733));
        background: -o-linear-gradient(#3b3a4e, #272733);
        background: linear-gradient(#3b3a4e, #272733);
        border-radius: 100%;
        -webkit-box-shadow: inset 0px 5px 4px 0px #424151, 0px 4px 15px 0px #0f0e17;
        box-shadow: inset 0px 5px 4px 0px #424151, 0px 4px 15px 0px #0f0e17;
        position: relative;
        z-index: 2;
        -webkit-transition: left 0.3s ease-in;
        -o-transition: left 0.3s ease-in;
        transition: left 0.3s ease-in;
        left: 0;
    }

    .switch-button .switch-outer input[type="checkbox"]:checked+.button .button-toggle {
        left: 58%;
    }

    .switch-button .switch-outer input[type="checkbox"]:checked+.button .button-indicator {
        -webkit-animation: indicator 1s forwards;
        animation: indicator 1s forwards;
    }

    .switch-button .switch-outer .button {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }

    .switch-button .switch-outer .button-indicator {
        height: 25px;
        width: 25px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        border-radius: 50%;
        border: 3px solid #ef565f;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        right: 10px;
        position: relative;
    }

    @-webkit-keyframes indicator {
        30% {
            opacity: 0;
        }

        0% {
            opacity: 1;
        }

        100% {
            opacity: 1;
            border: 3px solid #60d480;
            left: -68%;
        }
    }

    @keyframes indicator {
        30% {
            opacity: 0;
        }

        0% {
            opacity: 1;
        }

        100% {
            opacity: 1;
            border: 3px solid #60d480;
            left: -68%;
        }
    }

    /* From Uiverse.io by varoonrao */
</style>
@section('content')

<div class="modal fade h-100 " id="modalChangeGroupLine" tabindex="-2" aria-labelledby="modalChangeGroupLine" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-11 text-center">
                    <span style="font-weight: bold; font-size: 25px;">เปลี่ยนกลุ่มไลน์</span>
                </div>
                <div class="col-1">
                    <button id="close_modalChangeGroupLine" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกกลุ่มไลน์</label>
                        <input class="form-control radius-15" list="nameCategorie" name="nameCategorie" value="">
                        <datalist id="nameCategorie">
                        </datalist>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">กรอก Secret Token</label>
                        <input class="form-control radius-15" list="cfPassWordGroupLind" name="cfPassWordGroupLind" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-around ">
                <button type="button" class="btn btn-danger radius-10 h-100" id="btnCancelLinkGroupLine" data-bs-toggle="modal" data-bs-target="#modalChangeGroupLineConfirm">
                    ยกเลิกการผูกกลุ่มไลน์
                </button>
                <button type="button" class="btn btn-success radius-10 h-100" id="" style="width: 150px;">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade h-100 " id="modalChangeGroupLineConfirm" tabindex="-1" aria-labelledby="modalChangeGroupLine" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12 text-center">
                    <span style="font-weight: bold; font-size: 25px;">ยืนยันการยกเลิก ?</span>
                </div>
                <button id="close_modalChangeGroupLineConfirm" type="button" class="btn-close d-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label text-danger">เมื่อกดยืนยัน
                            หมวดหมู่นี้จะอยู่ในสถานะปิดใช้งาน</label>
                        <input class="form-control radius-15" list="cfPassWordGroupLind" placeholder="กรอก Secret Token" name="cfPassWordGroupLind" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-around ">
                <button type="button" class="btn btn-secondary radius-10 h-100" id="" style="width: 150px;">
                    ยืนยัน
                </button>
                <button type="button" class="btn btn-primary radius-10 h-100" id="Cancel_modalChangeGroupLineConfirm" style="width: 150px;">
                    ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card radius-10 p-4">
        <div class="d-flex justify-content-between flex-wrap">
            <div>
                <div class="d-flex w-100">

                    <span id="changeCategorie" class="h2 d-block" style="font-weight: bold; ">หมวดหมู่ :
                        <b>{{ $maintain_categorys->name }}</b>
                        <i class="fa-solid fa-pen-to-square cursor-pointer"
                            style="width:45px; height: 45px; font-size:35px;" onclick="changeCategorie();"></i>
                    </span>
                </div>
                <span class="h4">กลุ่มไลน์ :
                    <span>{{ $maintain_categorys->groupName }}</span>
                    <i id="iconModalChangeGroupLine" class="fa-solid fa-pen-to-square cursor-pointer"
                        style="width:35px; height: 35px; font-size:25px;" data-bs-toggle="modal" data-bs-target="#modalChangeGroupLine"></i>
                </span>

            </div>
            <div class="d-flex align-items-start">
                <!-- <label for="" style="font-weight: bold; font-size: 16px; border-right: #000000 1px solid;" class="me-3">สีที่เลือกใช้</label> -->
                <div class="d-flex justify-content-evenly align-items-center d-non" style="border-right: #6c757d solid 2px;">
                    <div class="header-colors-indigators">
                    </div>
                    <label for="" style="font-weight: bold; font-size: 16px; padding-right: 15px;">เลือกสี</label>
                </div>
                <input class="ms-3" type="color" name="" id="" style="width: 60px;height: 27px;border: none;border-radius: 10px;">
            </div>
        </div>
        <!-- <div class="row mb-4">
                <div class="col-12 col-md-4">
                    <span id="changeCategorie" class="h2 d-block" style="font-weight: bold; ">หมวดหมู่ :
                        <b>อุปกรณ์สำนักงาน</b>
                        <i class="fa-solid fa-pen-to-square cursor-pointer"
                            style="width:45px; height: 45px; font-size:35px;" onclick="changeCategorie();"></i>
                    </span>
                    <span class="h4">กลุ่มไลน์ :
                        <span>ช่างคอมซ่อมได้</span>
                        <i id="iconModalChangeGroupLine" class="fa-solid fa-pen-to-square cursor-pointer"
                            style="width:35px; height: 35px; font-size:25px;" data-bs-toggle="modal" data-bs-target="#modalChangeGroupLine"></i>
                    </span>
                </div>
                <div class="col-12 col-md-8 ">
                    <div class="header-colors-indigators">
                        <div class="row col-12 g-3">
                            <div class="col-12 col-md-2 col-lg-2 d-flex justify-content-evenly align-items-center d-non" style="border-right: #6c757d solid 2px;">
                                <input id="colorCodeCategorie" class="form-control radius-15 d-none" type="text" value="">
                                <div class="header-colors-indigators">
                                    <div class="indigator" id="colorExample"></div>
                                </div>
                                <label for="" style="font-weight: bold; font-size: 16px; ">สีที่เลือกใช้</label>
                            </div>
                            <div class="col-3 d-flex justify-content-evenly">
                                <div class="indigator" id="colorItem_1"></div>
                                <div class="indigator" id="colorItem_2"></div>
                                <div class="indigator" id="colorItem_3"></div>
                                <div class="indigator" id="colorItem_4"></div>
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center h-100 ">
                                <i class="fas fa-sync-alt d-flex justify-content-center align-items-center bg-white cursor-pointer"
                                style="width:45px; height: 45px; font-size:35px;" onclick="random_colorCategories();"></i>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="indigator" id="color_item_Code_Ex"></div>
                                    </div>
                                    <div class="col-9">
                                        <input style="margin-top:5px;" type="text" class="form-control w-100"
                                            id="code_colorCategorie" name="code_colorCategorie" placeholder="color code" oninput="add_color_item_Code_Categorie();">
                                    </div>
                                    {{-- <div id="" class="col-12 mt-2 " style="height: 20px;">
                                        <span class="text-danger" id="textAlertInvalidCC"></span>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-center">
                                <i class="fa-solid fa-circle-info d-flex justify-content-center align-items-center cursor-pointer"
                                    style="width:45px; height: 45px; font-size:35px; " onclick=""></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

<style>
    #content_title_category{
        overflow: auto;
    }
    @media (max-width: 1200px)
{
    legend
    {
        font-size: calc(1.275rem + .3vw) ;
    }
}
</style>
        <div class="row mt-3">
            <div class="col-12 col-md-6 mt-3">
                <div class="mx-2 pb-4 radius-10 w-100" style="background-color: #e8f6ff;">
                    <div class="row d-flex justify-content-between p-4">
                        <div class="col-9">
                            <span class="h2" style="font-weight: bold;">สถานะการแสดงผล</span>
                        </div>
                        <div class="col-3 align-content-end">
                            <span class="h5 " style="float: right;">แสดงผล 1</span>
                        </div>
                    </div>
                    <div class="  w-100 d-flex px-3">
                        <div class="w-100 pe-3">
                            <input class="form-control radius-15" style="height: 45px;border-radius: 10px !important;" list="titlecat" id="titlecat" name="titlecat" value=""
                                placeholder="เพิ่มหัวข้อของหมวดหมู่" oninput="checkTitlecatinput()">
                        </div>
                        <div>
                            <button id="btn_add_title_cat" class="btn btn-success  w-100" style="height: 45px;border-radius: 10px !important;width: 105px !important;" onclick="add_title_category()" disabled>เพิ่มหัวข้อ</button>
                        </div>
                    </div>
                    <script>
                        function checkTitlecatinput() {
                            let titlecat = document.querySelector('#titlecat').value;

                            if (titlecat) {
                                document.querySelector('#btn_add_title_cat').disabled = false;
                            } else {
                                document.querySelector('#btn_add_title_cat').disabled = true;


                            }
                        }
                    </script>
                    <div id="content_title_category">
                        {{-- #1 --}}
                        <div class="w-100 d-flex align-items-center px-4  py-2 my-3 ">
                            <div class=" d-flex w-100">
                                <div class="d-flex align-content-center">
                                    <span style="font-size: 24px; color:#000000;">คอมพิวเตอร์</span>
                                </div>

                            </div>
                            <div class="align-content-center justify-content-center float-right">
                                <div class="button r mx-2" id="button-3">
                                    <input type="checkbox" class="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                            <button style="float: right;" class="float-right btn btn-danger" href="#" onclick="this.parentElement.remove();">ลบ</button>
                        </div>

                        {{-- #2 --}}
                        <div class="w-100 d-flex align-items-center px-4  py-2 my-3 ">
                            <div class=" d-flex w-100">
                                <div class="d-flex align-content-center">
                                    <span style="font-size: 24px; color:#000000;">เครื่องพิมพ์</span>
                                </div>

                            </div>
                            <div class="align-content-center justify-content-center float-right">
                                <div class="button r mx-2" id="button-3">
                                    <input type="checkbox" class="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                            <button style="float: right;" class="float-right btn btn-danger" href="#" onclick="this.parentElement.remove();">ลบ</button>
                        </div>

                        {{-- #3 --}}
                        <div class="w-100 d-flex align-items-center px-4  py-2 my-3 ">
                            <div class=" d-flex w-100">
                                <div class="d-flex align-content-center">
                                    <span style="font-size: 24px; color:#000000;">เครื่องพิมพ์</span>
                                </div>

                            </div>
                            <div class="align-content-center justify-content-center float-right">
                                <div class="button r mx-2" id="button-3">
                                    <input type="checkbox" class="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                            <button style="float: right;" class="float-right btn btn-danger" href="#" onclick="this.parentElement.remove();">ลบ</button>
                        </div>

                    </div>

                </div>
            </div>
            
            <div class="col-12 col-md-6 mt-3">
                <div class="col-12 col-md-6 mx-2 radius-10 w-100 overflow" style="background-color: #fa797a;overflow: auto;">
                    <div class="row d-flex justify-content-between p-4">
                        <div class="col-12">
                            <span class="h2" style="font-weight: bold;">หัวข้ออื่นๆ ที่ได้รับแจ้ง</span>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between px-4 py-2 my-3 align-items-center">
                        <span style="font-size: 24px; color:#000000;">ชั้นวางของ</span>

                        <div>
                            <span style="font-size: 24px; color:#000000;">2</span>
                            <i onclick="add_to_use_title(this);" class="fa-duotone fa-solid fa-circle-plus ms-3" style="--fa-primary-color: #ffffff; --fa-secondary-color: #57dd46; --fa-secondary-opacity: 1; font-size: 28px; cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between px-4 py-2 my-3 align-items-center">
                        <span style="font-size: 24px; color:#000000;">ตู้หนังสือ</span>

                        <div>
                            <span style="font-size: 24px; color:#000000;">2</span>
                            <i onclick="add_to_use_title(this);" class="fa-duotone fa-solid fa-circle-plus ms-3" style="--fa-primary-color: #ffffff; --fa-secondary-color: #57dd46; --fa-secondary-opacity: 1; font-size: 28px; cursor: pointer;"></i>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between px-4 py-2 my-3 align-items-center">
                        <span style="font-size: 24px; color:#000000;">เก้าอี้สำนักงาน</span>

                        <div>
                            <span style="font-size: 24px; color:#000000;">2</span>
                            <i onclick="add_to_use_title(this);" class="fa-duotone fa-solid fa-circle-plus ms-3" style="--fa-primary-color: #ffffff; --fa-secondary-color: #57dd46; --fa-secondary-opacity: 1; font-size: 28px; cursor: pointer;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Add this script to your HTML file -->
<script>
    function add_to_use_title(element) {
        // หาดูว่า span ที่ใกล้เคียงที่สุดอยู่ตรงไหน (parent node)
        var title = element.closest('.d-flex').querySelector('span').textContent;
        // console.log(title); // แสดงชื่อหัวข้อใน console

        let content_title_category = document.querySelector('#content_title_category');
        let html_titlecat = `
                    <div class="w-100 d-flex align-items-center px-4  py-2 my-3 ">
                    <div class=" d-flex w-100">
                        <div class="d-flex align-content-center">
                            <span style="font-size: 24px; color:#000000;">${title}</span>
                        </div>
                        
                    </div>
                    <div class="align-content-center justify-content-center float-right">
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    <button  style="float: right;" class="float-right btn btn-danger" href="#" onclick="this.parentElement.remove();">ลบ</button>
                </div>`;
        content_title_category.insertAdjacentHTML('beforeend', html_titlecat); // แทรกบนสุด

        // ลบ div ที่เกี่ยวข้องกับปุ่มนั้น
        var divToRemove = element.closest('.d-flex');
        divToRemove.remove();
    }



    function add_title_category(params) {
        let titlecat = document.querySelector('#titlecat').value;

        let content_title_category = document.querySelector('#content_title_category');
        let html_titlecat = `
                    <div class="w-100 d-flex align-items-center px-4  py-2 my-3 ">
                    <div class=" d-flex w-100">
                        <div class="d-flex align-content-center">
                            <span style="font-size: 24px; color:#000000;">${titlecat}</span>
                        </div>
                        
                    </div>
                    <div class="align-content-center justify-content-center float-right">
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    <button  style="float: right;" class="float-right btn btn-danger" href="#" onclick="this.parentElement.remove();">ลบ</button>
                </div>`;
        content_title_category.insertAdjacentHTML('beforeend', html_titlecat); // แทรกบนสุด

        document.querySelector('#titlecat').value = "";
        document.querySelector('#btn_add_title_cat').disabled = true;

    }
    document.addEventListener('DOMContentLoaded', (event) => {
        random_colorCategories(); //สุ่มสี ในหมวดเลือกสีแสดงในปฎิทิน

        // Get the cancel button in modalChangeGroupLineConfirm
        const Cancel_modalChangeGroupLineConfirm = document.querySelector('#Cancel_modalChangeGroupLineConfirm');
        const btnCancelLinkGroupLine = document.querySelector('#btnCancelLinkGroupLine');

        Cancel_modalChangeGroupLineConfirm.addEventListener('click', () => {
            // Hide modalChangeGroupLineConfirm
            close_modalChangeGroupLineConfirm.click();

            // Show modalChangeGroupLine
            document.getElementById('iconModalChangeGroupLine').click();
        });

        btnCancelLinkGroupLine.addEventListener('click', () => {
            // Hide modalChangeGroupLineConfirm
            close_modalChangeGroupLine.click();

            // Show modalChangeGroupLine
            // const modalChangeGroupLine = new bootstrap.Modal(document.getElementById('modalChangeGroupLine'));
            // modalChangeGroupLine.show();
        });

    });

    const changeCategorie = () => {

        let changeCategorieDiv = document.querySelector('#changeCategorie');
        changeCategorieDiv.innerHTML = "";
        let html = `
                        <div class="d-flex me-2 w-100">หมวดหมู่ :
                            <div >
                                <input class="form-control radius-10" list="" name="namecat" id="namecat" value=""
                                    placeholder="แก้ไขหัวข้อของหมวดหมู่">
                            </div>
                            <div class="mx-2">
                                <button class="btn btn-success w-100 radius-10" onclick="confirmCategorie()">ยืนยัน</button>
                            </div>
                        </div>`;

        changeCategorieDiv.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด
    }

    const confirmCategorie = () => {
        let changeCategorieDiv = document.querySelector('#changeCategorie');
        // changeCategorieDiv.innerHTML = "";

        let namecat = document.querySelector('#namecat').value;
        console.log(namecat);
        let html = `หมวดหมู่ :
                        <b>${namecat}</b>
                        <i class="fa-solid fa-pen-to-square cursor-pointer" style="width:45px; height: 45px; font-size:35px;" onclick="changeCategorie();"></i>`;

        changeCategorieDiv.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

        let lastItem = document.querySelector('#changeCategorie div:last-child');
        if (lastItem) {
            lastItem.remove();
        }
    }
</script>

<script>
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