@extends('layouts.partners.theme_partner_new')
<style>
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
                        <span  style="font-weight: bold; font-size: 25px;">เปลี่ยนกลุ่มไลน์</span>
                    </div>
                    <div class="col-1">
                        <button id="close_modalChangeGroupLine" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center" >
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" >
                            <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">เลือกกลุ่มไลน์</label>
                            <input class="form-control radius-15" list="nameCategorie" name="nameCategorie" value="">
                            <datalist id="nameCategorie">
                            </datalist>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12" >
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
                        <span  style="font-weight: bold; font-size: 25px;">ยืนยันการยกเลิก ?</span>
                    </div>
                    <button id="close_modalChangeGroupLineConfirm" type="button" class="btn-close d-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center" >
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12" >
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
            <div class="row mb-4">
                <div class="col-12 col-md-5">
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
                <div class="col-12 col-md-7 ">
                    <div class="header-colors-indigators">
                        <div class="row col-12 g-3">
                            <div class="col-4 d-flex justify-content-evenly">
                                <div class="indigator" id="color_item_1"></div>
                                <div class="indigator" id="color_item_2"></div>
                                <div class="indigator" id="color_item_3"></div>
                                <div class="indigator" id="color_item_4"></div>
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center h-100 ">
                                <i class="fas fa-sync-alt d-flex justify-content-center align-items-center bg-white cursor-pointer"
                                    style="width:45px; height: 45px; font-size:35px; " onclick="random_color();"></i>
                            </div>
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="indigator" id="color_item_Ex"></div>
                                    </div>
                                    <div class="col-9">
                                        <input style="margin-top:5px;" type="text" class="form-control w-100"
                                            id="code_color" name="code_color" placeholder="color code"
                                            oninput="add_color_item_Ex();">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-center">
                                <i class="fa-solid fa-circle-info d-flex justify-content-center align-items-center cursor-pointer"
                                    style="width:45px; height: 45px; font-size:35px; " onclick=""></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-8">
                    <input class="form-control radius-15" list="passwordGroupLine" name="passwordGroupLine" value=""
                        placeholder="เพิ่มหัวข้อของหมวดหมู่">
                </div>
                <div class="col-12 col-md-2">
                    <button class="btn btn-success disabled w-100 radius-10">เพิ่มหัวข้อใหม่</button>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4 p-3  w-100">
                <div class="col-12 col-md-6 mx-2 pb-4 radius-10 " style="background-color: #e8f6ff;">
                    <div class="row d-flex justify-content-between p-4">
                        <div class="col-9">
                            <span class="h2" style="font-weight: bold;">สถานะการแสดงผล</span>
                        </div>
                        <div class="col-3 align-content-end" >
                            <span class="h5 " style="float: right;">แสดงผล 1</span>
                        </div>
                    </div>
                    {{-- #1 --}}
                    <div class="row d-flex justify-content-between px-4 py-2 my-3">
                        <div class="col-9 d-flex align-content-center">
                            <span  style="font-size: 24px; color:#000000;" >คอมพิวเตอร์</span>
                        </div>
                        <div class="col-3 align-content-center justify-content-center">
                            <label class="switch-button" for="switch">
                                <div class="switch-outer">
                                    <input id="switch" type="checkbox">
                                    <div class="button">
                                    <span class="button-toggle"></span>
                                    <span class="button-indicator"></span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- #2 --}}
                    <div class="row d-flex justify-content-between px-4 py-2 my-3">
                        <div class="col-9 d-flex align-content-center">
                            <span  style="font-size: 24px; color:#000000;" >เครื่องพิมพ์</span>
                        </div>
                        <div class="col-3 align-content-center justify-content-center">
                            <label class="switch-button" for="switch2">
                                <div class="switch-outer">
                                    <input id="switch2" type="checkbox">
                                    <div class="button">
                                    <span class="button-toggle"></span>
                                    <span class="button-indicator"></span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- #3 --}}
                    <div class="row d-flex justify-content-between px-4 py-2 my-3">
                        <div class="col-9 d-flex align-content-center">
                            <span  style="font-size: 24px; color:#000000;" >เครื่องพิมพ์</span>
                        </div>
                        <div class="col-3 align-content-center justify-content-center">
                            <label class="switch-button" for="switch3">
                                <div class="switch-outer">
                                    <input id="switch3" type="checkbox">
                                    <div class="button">
                                    <span class="button-toggle"></span>
                                    <span class="button-indicator"></span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mx-2 radius-10 " style="background-color: #fa797a;">
                    <div class="row d-flex justify-content-between p-4">
                        <div class="col-12">
                            <span class="h2" style="font-weight: bold;">หัวข้ออื่นๆ ที่ได้รับแจ้ง</span>
                        </div>
                    </div>

                    {{-- #1 --}}
                    <div class="row d-flex align-items-center px-4 py-2 my-3">
                        <div class="col-10 d-flex align-items-center">
                            <span style="font-size: 24px; color:#000000;">ชั้นวางของ</span>
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <span style="font-size: 24px; color:#000000;">2</span>
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <i class="fa-duotone fa-solid fa-circle-plus" style="--fa-primary-color: #ffffff; --fa-secondary-color: #57dd46; --fa-secondary-opacity: 1; font-size: 28px; cursor: pointer;"></i>
                        </div>
                    </div>

                    {{-- #2 --}}
                    <div class="row d-flex align-items-center px-4 py-2 my-3">
                        <div class="col-10 d-flex align-items-center">
                            <span style="font-size: 24px; color:#000000;">ชั้นวางของ2</span>
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <span style="font-size: 24px; color:#000000;">1</span>
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <i class="fa-duotone fa-solid fa-circle-plus" style="--fa-primary-color: #ffffff; --fa-secondary-color: #57dd46; --fa-secondary-opacity: 1; font-size: 28px; cursor: pointer;"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Add this script to your HTML file -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
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
                    <div class="row px-2 ">หมวดหมู่ :
                        <div class="col-12 col-md-6">
                            <input class="form-control radius-10" list="" name="" value=""
                                placeholder="แก้ไขหัวข้อของหมวดหมู่">
                        </div>
                        <div class="col-12 col-md-3">
                            <button class="btn btn-success w-100 radius-10" onclick="confirmCategorie()">ยืนยัน</button>
                        </div>
                    </div>`;

                changeCategorieDiv.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด
    }

    const confirmCategorie = () => {
        let changeCategorieDiv = document.querySelector('#changeCategorie');
            changeCategorieDiv.innerHTML = "";
        let html = `หมวดหมู่ :
                    <b>อุปกรณ์สำนักงาน</b>
                    <i class="fa-solid fa-pen-to-square cursor-pointer" style="width:45px; height: 45px; font-size:35px;" onclick="changeCategorie();"></i>`;

                changeCategorieDiv.insertAdjacentHTML('afterbegin', html); // แทรกบนสุด
    }
  </script>

@endsection
