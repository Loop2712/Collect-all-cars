@extends('layouts.partners.theme_partner_new')

<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .dropdown-menu {
        will-change: transform;
    }

    /* ปุ่ม switch */
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        --hue: 220deg;
        --width: 5rem;
        --accent-hue: 22deg;
        --duration: 0.6s;
        --easing: cubic-bezier(1, 0, 1, 1);
    }

    .togglesw {
        display: none;
    }

    .switch {     
        --shadow-offset: calc(var(--width) / 20);
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        width: var(--width);
        height: calc(var(--width) / 2.5);
        border-radius: var(--width);
        box-shadow: inset 10px 10px 10px hsl(var(--hue) 20% 80%),
            inset -10px -10px 10px hsl(var(--hue) 20% 93%);
    }

    .indicator {
        content: '';
        position: absolute;
        width: 40%;
        height: 60%;
        transition: all var(--duration) var(--easing);
        box-shadow: inset 0 0 2px hsl(var(--hue) 20% 15% / 60%),
            inset 0 0 3px 2px hsl(var(--hue) 20% 15% / 60%),
            inset 0 0 5px 2px hsl(var(--hue) 20% 45% / 60%);
    }

    .indicator.left {
        --hue: var(--accent-hue);
        overflow: hidden;
        left: 10%;
        border-radius: 100px 0 0 100px;
        background: linear-gradient(180deg, hsl(calc(var(--accent-hue) + 20deg) 95% 80%) 10%, hsl(calc(var(--accent-hue) + 20deg) 100% 60%) 30%, hsl(var(--accent-hue) 90% 50%) 60%, hsl(var(--accent-hue) 90% 60%) 75%, hsl(var(--accent-hue) 90% 50%));
    }

    .indicator.left::after {
        content: '';
        position: absolute;
        opacity: 0.6;
        width: 100%;
        height: 100%;
    }

    .indicator.right {
        right: 10%;
        border-radius: 0 100px 100px 0;
        background-image: linear-gradient(180deg, hsl(var(--hue) 20% 95%), hsl(var(--hue) 20% 65%) 60%, hsl(var(--hue) 20% 70%) 70%, hsl(var(--hue) 20% 65%));
    }

    .button {
        position: absolute;
        z-index: 1;
        width: 55%;
        height: 80%;
        left: 5%;
        border-radius: 100px;
        background-image: linear-gradient(160deg, hsl(var(--hue) 20% 95%) 40%, hsl(var(--hue) 20% 65%) 70%);
        transition: all var(--duration) var(--easing);
        box-shadow: 2px 2px 3px hsl(var(--hue) 18% 50% / 80%),
            2px 2px 6px hsl(var(--hue) 18% 50% / 40%),
            10px 20px 10px hsl(var(--hue) 18% 50% / 40%),
            20px 30px 30px hsl(var(--hue) 18% 50% / 60%);
    }

    .button::before,
    .button::after {
        content: '';
        position: absolute;
        top: 10%;
        width: 41%;
        height: 80%;
        border-radius: 100%;
    }

    .button::before {
        left: 5%;
        box-shadow: inset 1px 1px 2px hsl(var(--hue) 20% 85%);
        background-image: linear-gradient(-50deg, hsl(var(--hue) 20% 95%) 20%, hsl(var(--hue) 20% 85%) 80%);
    }

    .button::after {
        right: 5%;
        box-shadow: inset 1px 1px 3px hsl(var(--hue) 20% 70%);
        background-image: linear-gradient(-50deg, hsl(var(--hue) 20% 95%) 20%, hsl(var(--hue) 20% 75%) 80%);
    }

    .togglesw:checked~.button {
        left: 40%;
    }

    .togglesw:not(:checked)~.indicator.left,
    .togglesw:checked~.indicator.right {
        box-shadow: inset 0 0 5px hsl(var(--hue) 20% 15% / 100%),
            inset 20px 20px 10px hsl(var(--hue) 20% 15% / 100%),
            inset 20px 20px 15px hsl(var(--hue) 20% 45% / 100%);
    }

    /*จบ ปุ่ม switch */

    .custom-dropdown-menu {
        position: absolute;
        right: 0;
        left: auto;
    }
</style>

@section('content')
<div class="card">
    <div class="d-flex align-items-center p-4">

        <div>
            <h4 class="mb-1 font-weight-bold"><b>การจัดการหมวดหมู่และกลุ่มไลน์</b></h4>
            <div class="list-inline d-sm-flex mb-0 d-none"> <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">
                    พื้นที่

                    <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary">|</a>
                    <!-- <a href="javascript:;" class="list-inline-item d-flex align-items-center text-primary">ViiCHECK พระนครศรีอยุธยา</a> -->

                    <style>
                        .select-area {
                            padding: 0;
                            background-color: transparent;
                            border: none;
                            color: #8833ff !important;
                            font-size: 14px;
                            cursor: pointer;
                        }

                        .select-area:hover,
                        .select-area:focus {
                            background-color: transparent !important;
                            box-shadow: none;
                        }

                        .select-area option {
                            background: white !important;
                            color: #212925 !important;

                        }
                    </style>

                    <select class="form-select btn-secondary select-area" id="select_status_repair" onchange="select_status_repair(this)">
                        <option value="แจ้งซ่อม" class="text-danger">ทั้งหมด</option>
                        <option value="แจ้งซ่อม" class="text-danger">ViiCHECK พระนครศรีอยุธยา</option>
                        <option value="รอดำเนินการ" class="text-warning">ViiCHECK นครนายก</option>
                    </select>

            </div>
        </div>
        <style>
            .btn-add-categorie {
                transition: all .15s ease-in-out;
                display: flex;
                justify-content: center;
                width: 40px;
                height: 40px;
                line-height: 40px;
                font-size: 18px;
                color: #6c757d;
                text-align: center;
                border-radius: 50px;
                margin: 3px;
                background-color: white;
                border: 1px solid rgb(0 0 0 / 15%);
            }

            .btn-add-categorie:hover {
                background-color: #1fb52e;
                color: #fff;
                width: 150px;

            }

            .btn-add-categorie:not(:hover) .text-btn {
                display: none;
                color: #fff !important;
            }

            .btn-add-categorie:hover .text-btn {
                display: block;
                color: #fff !important;

            }
        </style>
        <!-- HEADER -->
        <div class=" ms-auto">
            <!-- <a href="javascript:;"><i class="bx bx-video"></i></a>
            <a href="javascript:;"><i class="bx bx-phone"></i></a> -->
            <a class="btn-add-categorie" href="{{ url('/demo_categorie_repair_create') }}">
                <i class="bx bx-plus"></i>
                <p class="text-btn">เพิ่มหมวดหมู่</p>
            </a>
        </div>


    </div>

    <style>
        /* .toggle-button-cover {
            display: table-cell;
            position: relative;
            width: 74px;
            height: 36px;
            box-sizing: border-box;
        } */

        /* .button-cover {
            height: 100px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 10px 20px -8px #c5d6d6;
            border-radius: 4px;
        } */

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
        .btn-edit-categorie{

        }
        .btn-edit-categorie {
                transition: all .15s ease-in-out;
                display: flex;
                justify-content: center;
                width: 40px;
                height: 40px;
                line-height: 40px;
                font-size: 18px;
                color: #6c757d;
                text-align: center;
                border-radius: 50px;
                margin: 3px;
                background-color: white;
                border: 1px solid rgb(0 0 0 / 15%);
                overflow: hidden;
            }

            .btn-edit-categorie:hover {
                background-color: #ffca2c;
                color: #000;
                width: 40px;

            }

            .btn-edit-categorie:not(:hover) .text-btn {
                display: none;
                color: transparent !important;
                opacity: 0;
            }

            .btn-edit-categorie:hover .text-btn {
                display: block;
                color: #000 !important;
                align-items: center;
                opacity: 1;
                margin-left: 5px;

            }
    </style>
    <!-- CONTENT -->
    <div class="row mt-3 px-3 py-0">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-none border radius-15">
                <div class="card-body">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <div>
                            <div class="font-30 text-primary">
                                <i class="bx bxs-folder"></i>
                                <span>อุปกรณ์สำนักงาน</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn-edit-categorie" href="{{ url('/demo_categorie_repair_view') }}">
                                <i class="bx bx-wrench "></i>
                                <!-- <p class="text-btn">แก้ไข</p> -->
                            </a>
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-primary">กลุ่มไลน์ : ช่างคอมซ่อมได้</h6>

                    <!-- <small>15 files</small> -->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-none border radius-15">
                <div class="card-body">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <div>
                            <div class="font-30 text-primary">
                                <i class="bx bxs-folder"></i>
                                <span>อุปกรณ์สำนักงาน</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn-edit-categorie" href="{{ url('/demo_categorie_repair_view') }}">
                                <i class="bx bx-wrench "></i>
                                <!-- <p class="text-btn">แก้ไข</p> -->
                            </a>
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-primary">กลุ่มไลน์ : ช่างคอมซ่อมได้</h6>

                    <!-- <small>15 files</small> -->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-none border radius-15">
                <div class="card-body">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <div>
                            <div class="font-30 text-primary">
                                <i class="bx bxs-folder"></i>
                                <span>อุปกรณ์สำนักงาน</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn-edit-categorie" href="{{ url('/demo_categorie_repair_view') }}">
                                <i class="bx bx-wrench "></i>
                                <!-- <p class="text-btn">แก้ไข</p> -->
                            </a>
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-primary">กลุ่มไลน์ : ช่างคอมซ่อมได้</h6>

                    <!-- <small>15 files</small> -->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-none border radius-15">
                <div class="card-body">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <div>
                            <div class="font-30 text-primary">
                                <i class="bx bxs-folder"></i>
                                <span>อุปกรณ์สำนักงาน</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn-edit-categorie" href="{{ url('/demo_categorie_repair_view') }}">
                                <i class="bx bx-wrench "></i>
                                <!-- <p class="text-btn">แก้ไข</p> -->
                            </a>
                            <div class="button r mx-2" id="button-3">
                                <input type="checkbox" class="checkbox">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-0 text-primary">กลุ่มไลน์ : ช่างคอมซ่อมได้</h6>

                    <!-- <small>15 files</small> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ปรับความยาว select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.select-area').change(function() {
        var text = $(this).find('option:selected').text()
        var $aux = $('<select/>').append($('<option/>').text(text))
        $(this).after($aux)
        $(this).width($aux.width() + 10)
        $aux.remove()
    }).change()
</script>
<div class="p-4">
    <div class="row">
        <div class="col-12 col-md-10 ">
            <span class="h3 px-0" style="font-weight: bold;">การจัดการหมวดหมู่และกลุ่มไลน์</span>
        </div>
        <div class="col-12 col-md-2 text-center">
            <div class="dropdown px-4 ">
                <button style="width: 150px;" id="btn_dropdown_health_type"
                    class="btn btn-outline-secondary text-dark dropdown-toggle radius-10" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    เลือกพื้นที่
                </button>
                <div id="item_dropdown" class="dropdown-menu " aria-labelledby="btn_dropdown_health_type"
                    style="cursor: pointer;">
                    <a class="dropdown-item" onclick="change_select_area('พระนครศรีอยุธยา')">ViiCHECK
                        พระนครศรีอยุธยา</a>
                    <a class="dropdown-item" onclick="change_select_area('นครนายก')">ViiCHECK นครนายก</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            {{-- card --}}
            <div class="card p-3">
                <div class="row mb-4 p-2">
                    <div class="col-12 col-md-10 mt-2">
                        <span class="h4" style="font-weight: bold;">พื้นที่ : <b class="text-primary">ViiCHECK
                                พระนครศรีอยุธยา</b></span>
                    </div>
                    <div class="col-12 col-md-2 text-center mt-2">
                        <a href="{{ url('/demo_categorie_repair_create') }}" id="" type="button"
                            class="btn btn-success active radius-15" style="width: 175px;">
                            <i class="fa-solid fa-plus"></i>เพิ่มหมวดหมู่
                        </a>
                    </div>
                </div>
                {{-- item #1 --}}
                <div class="row mx-2 py-2 radius-10 mb-3" style="background-color: #cfeeef;">
                    <div class="col-12 col-md-10 d-flex flex-wrap  flex-column">
                        <div class="m-2">
                            <span class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</span>
                        </div>
                        <div class="m-2">
                            <span class="h5 ">กลุ่มไลน์ : ช่างคอมซ่อมได้</span>
                        </div>

                    </div>
                    <div
                        class="col-12 col-md-2 d-flex flex-wrap  flex-column justify-content-center align-items-center">
                        <div class="container mb-2">
                            <label class="switch">
                                <input class="togglesw" type="checkbox" checked="">
                                <div class="indicator left"></div>
                                <div class="indicator right"></div>
                                <div class="button"></div>
                            </label>
                        </div>
                        <a href="{{ url('/demo_categorie_repair_view') }}" class="btn btn-warning " style="width: 150px;">ดูข้อมูล / แก้ไข</a>
                    </div>
                </div>

                {{-- item #2 --}}
                <div class="row mx-2 py-2 radius-10" style="background-color: #cfeeef;">
                    <div class="col-12 col-md-10 d-flex flex-wrap  flex-column">
                        <div class="m-2">
                            <span class="h4" style="font-weight: bold;">หมวดหมู่ : อุปกรณ์สำนักงาน</span>
                        </div>
                        <div class="m-2">
                            <span class="h5 ">กลุ่มไลน์ : ช่างได้ซ่อมคอม</span>
                        </div>

                    </div>
                    <div class="col-12 col-md-2 d-flex flex-wrap  flex-column justify-content-center align-items-center">
                        <div class="container mb-2">
                            <label class="switch">
                                <input class="togglesw" type="checkbox" checked="">
                                <div class="indicator left"></div>
                                <div class="indicator right"></div>
                                <div class="button"></div>
                            </label>
                        </div>
                        <a href="{{ url('/demo_categorie_repair_view') }}" class="btn btn-warning " style="width: 150px;">ดูข้อมูล / แก้ไข</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function adjustDropdownPosition() {
        const dropdown = document.getElementById('item_dropdown');
        const button = document.getElementById('btn_dropdown_health_type');

        // ตรวจสอบขอบเขตของหน้าจอ
        const rectDropdown = dropdown.getBoundingClientRect();
        const rectButton = button.getBoundingClientRect();
        const windowWidth = window.innerWidth;

        // ถ้า dropdown เกินขอบขวาของหน้าจอ
        if (rectDropdown.right > windowWidth) {
            dropdown.style.left = 'auto';
            dropdown.style.right = '0';
        } else {
            dropdown.style.left = '0';
            dropdown.style.right = 'auto';
        }
    }

    // เรียกฟังก์ชันเมื่อคลิกปุ่ม dropdown
    document.getElementById('btn_dropdown_health_type').addEventListener('click', adjustDropdownPosition);
</script>
@endsection