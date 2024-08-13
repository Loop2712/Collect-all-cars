@extends('layouts.partners.theme_partner_new')

<style>
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
