@extends('layouts.partners.theme_partner_new')

<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        /* เพิ่มระยะห่างระหว่างการ์ดกับตาราง */
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
        text-align: left;
        /* เพิ่มการจัดเรียงข้อความไปทางซ้าย */
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

 
.toggle-button-cover {
  display: table-cell;
  position: relative;
  width: 74px;
  height: 36px;
  box-sizing: border-box;
}

.button-cover {
  height: 100px;
  margin: 20px;
  background-color: #fff;
  box-shadow: 0 10px 20px -8px #c5d6d6;
  border-radius: 4px;
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
  top: 50%;
  width: 74px;
  height: 36px;
  margin: -20px auto 0 auto;
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

#button-3 .checkbox:active + .knobs:before {
  width: 46px;
  border-radius: 100px;
}

#button-3 .checkbox:checked:active + .knobs:before {
  margin-left: -26px;
}

#button-3 .checkbox:checked + .knobs:before {
  content: "เปิด";
  left: 42px;
  background-color: #56de57;

}

#button-3 .checkbox:checked ~ .layer {
  background-color: #e2f1e1;
}.btn-add-categorie {
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

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title d-flex justify-content-between">
            <h5 class="mb-0 "><b>รายชื่อพื้นที่ทั้งหมด</b></h5>
            <a class="btn-add-categorie" href="{{ url('/demo_categorie_repair_create') }}" data-bs-toggle="modal" data-bs-target="#modalAddArea" id="btn_select_active_repair">
                <i class="bx bx-plus"></i>
                <p class="text-btn">เพิ่มพื้นที่</p>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อพื้นที่</th>
                        <th>การกำหนดพื้นที่</th>
                        <th>สถานะการเปิดใช้งาน</th>
                        <th>
                            เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p><b>ViiCHECK พระนครศรีอยุธยา</b></p>
                        </td>
                        <td>
                            <p class="text-danger" style="font-weight:bold">ยังไม่มีการกำหนดพื้นที่</p>

                        </td>
                        <td>
                            <div class="toggle-button-cover">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" class="checkbox">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a id="" href="{{ url('/demo_management_view') }}" type="button" class="btn btn-warning active radius-15">
                                <i class="fa-solid fa-plus"></i>ดูข้อมูล / แก้ไข
                            </a>
                            <button id="" type="button" class="btn btn-danger active radius-15">
                                <i class="fa-solid fa-trash"></i>ลบ
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>ViiCheck นครนายก</b></p>
                        </td>
                        <td>
                            <p class="text-success" style="font-weight:bold">กำหนดพื้นที่แล้ว</p>
                        </td>
                        <td>
                            <div class="toggle-button-cover">
                                <div class="button r" id="button-3">
                                    <input type="checkbox" class="checkbox" checked>
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a id="" href="{{ url('/demo_management_view') }}" type="button" class="btn btn-warning active radius-15">
                                <i class="fa-solid fa-plus"></i>ดูข้อมูล / แก้ไข
                            </a>
                            <button id="" type="button" class="btn btn-danger active radius-15">
                                <i class="fa-solid fa-trash"></i>ลบ
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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

<!-- <div class="p-4 d-none d-lg-block">
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
        ข้อมูลจะถูกเพิ่มโดยใช้ JavaScript
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
                    <button id="" type="button" class="btn btn-danger active radius-15">
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
                    <button id="" type="button" class="btn btn-danger active radius-15">
                        <i class="fa-solid fa-trash"></i>ลบ
                    </button>
                </div>
            </div>
        </div>
    </div>

</div> -->


@endsection