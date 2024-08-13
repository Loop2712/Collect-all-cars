@extends('layouts.partners.theme_partner_new')

<style>
    .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0; /* เพิ่มระยะห่างระหว่างการ์ดกับตาราง */
    }
    .row {
        display: flex;
        border-bottom: 1px solid #ddd;
    }
    .row.header {
        font-weight: bold;
        background-color: #f1f1f1;
    }
    .cell {
        flex: 1;
        padding: 10px;
        font-size: 16px;
        text-align: left; /* เพิ่มการจัดเรียงข้อความไปทางซ้าย */
    }
    .row:last-child .cell {
        border-bottom: none;
    }
    .cell:last-child {
        border-right: none;
    }
    @media (max-width: 600px) {
        .row {
            flex-direction: column;
        }
        .cell {
            border-right: none;
            border-bottom: 1px solid #ddd;
        }
        .cell:last-child {
            border-bottom: none;
        }
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


</style>

@section('content')

    <div class="modal fade " id="modalAddArea" tabindex="-2" aria-labelledby="modalAddAreaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h4" style="font-weight: bold;">เพิ่มพื้นที่</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center" style="height: 350px;">
                    <div id="" class="w-100">
                        <div class="col-12 d-none">
                            <input class="form-control" type="text" name="name_area" id="name_area" readonly="">
                        </div>
                        <div class="col-12" style="margin-top:15px;">
                            <label class="control-label" style="font-size:17px;"><b>ชื่อพื้นที่</b> </label>
                            <div class="form-group d-block">
                                <input class="form-control " type="text" name="name_officer" id="name_officer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" style="float: right;" class="btn btn-success" id="saveAreaBtn">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4 d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div>
                <span class="h3" style="font-weight: bold;">รายชื่อพื้นที่ทั้งหมด</span>
            </div>
            <div>
                <button data-bs-toggle="modal" data-bs-target="#modalAddArea" id="btn_select_active_repair" type="button" class="btn btn-success active radius-15" style="width: 175px;">
                    <i class="fa-solid fa-plus"></i>เพิ่มพื้นที่
                </button>
            </div>

        </div>

        <div class="table radius-10" id="itemTable">
            <div class="row header">
                <div class="cell">ชื่อพื้นที่</div>
                <div class="cell">การกำหนดพื้นที่</div>
                <div class="cell text-center">สถานะการเปิดใช้งาน</div>
                <div class="cell ">เครื่องมือ</div>
            </div>
            <!-- ข้อมูลจะถูกเพิ่มโดยใช้ JavaScript -->
            <div class="d-flex align-items-center div_of_data" row_attribute="free">
                <div class="cell" style="font-weight:bold">ViiCheck นครนายก</div>
                <div class="cell text-success" style="font-weight:bold">กำหนดพื้นที่แล้ว</div>
                <div class="cell " amount_sos_attribute="1">
                    <div class="container mb-2">
                        <label class="switch">
                            <input class="togglesw" type="checkbox" checked="">
                            <div class="indicator left"></div>
                            <div class="indicator right"></div>
                            <div class="button"></div>
                        </label>
                    </div>
                </div>
                <div id="" class="cell d-flex justify-content-around">
                    <div class="col-6">
                        <a id="" href="{{ url('/demo_management_view') }}" type="button" class="btn btn-warning active radius-15" style="width: 175px;">
                            <i class="fa-solid fa-plus"></i>ดูข้อมูล / แก้ไข
                        </a>
                    </div>
                    <div class="col-6">
                        <button id="" type="button" class="btn btn-danger active radius-15" >
                            <i class="fa-solid fa-trash"></i>ลบ
                        </button>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center div_of_data" row_attribute="free">
                <div class="cell" style="font-weight:bold">ViiCHECK พระนครศรีอยุธยา</div>
                <div class="cell text-danger" style="font-weight:bold">ยังไม่มีการกำหนดพื้นที่</div>
                <div class="cell " amount_sos_attribute="1">
                    <div class="container mb-2">
                        <label class="switch">
                            <input class="togglesw" type="checkbox" checked="">
                            <div class="indicator left"></div>
                            <div class="indicator right"></div>
                            <div class="button"></div>
                        </label>
                    </div>
                </div>
                <div id="" class="cell d-flex justify-content-around">
                    <div class="col-6">
                        <a id="" href="{{ url('/demo_management_view') }}" type="button" class="btn btn-warning active radius-15" style="width: 175px;">
                            <i class="fa-solid fa-plus"></i>ดูข้อมูล / แก้ไข
                        </a>
                    </div>
                    <div class="col-6">
                        <button id="" type="button" class="btn btn-danger active radius-15" >
                            <i class="fa-solid fa-trash"></i>ลบ
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
