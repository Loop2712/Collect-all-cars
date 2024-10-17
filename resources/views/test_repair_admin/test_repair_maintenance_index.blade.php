@extends('layouts.partners.theme_partner_new')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }



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

    /* .btn-add-categorie:hover {
        background-color: #1fb52e;
        color: #fff;
        width: 150px;

    } */
    .btn-add-categorie.success:hover {
        background-color: #1fb52e;
        color: #fff;
        width: 150px;

    }

    .btn-add-categorie.primary:hover {
        background-color: #8733fe;
        color: #fff;
        width: 200px;

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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between w-100 align-items-center flex-wrap">
                    <div class="col-lg-3 col-xl-2">
                        <span class="h3 px-0" style="font-weight: bold;">การซ่อมบำรุง</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="d-flex  align-items-center ms-2">
                            <div class="position-relative">
                                <input type="text" id="searchInput" class="form-control ps-5" placeholder="ค้นหารายการแจ้งซ่อม"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </div>
                        </div>
                        <div>
                            <a class="btn-add-categorie ms-2 success " href="#" data-bs-toggle="modal" data-bs-target="#modalAddID">
                                <i class="bx bx-plus"></i>
                                <p class="text-btn">เพิ่มหัวข้อ</p>
                            </a>
                        </div>
                        <div>
                            <a class="btn-add-categorie ms-2 primary" href="{{ url('/demo_repair_maintenance_view') }}">
                                <i class="bx bx-plus"></i>
                                <p class="text-btn">ประวัติการซ่อมบำรุง</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive card">
    <table class="table" id="repairTable">
        <thead>
            <tr class="bg-dark text-white">
                <th class="text-center" style="min-width: 85px;">หัวข้อ</th>
                <th class="text-center" style="min-width: 85px;">รหัส</th>
                <th class="text-center" style="min-width: 132px;">จำนวนซ่อมบำรุง</th>
                <th class="text-center" style="min-width: 85px;">Action</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <tr>
                <td class="text-center">ตู้เย็น ชั้น 1</td>
                <td class="text-center">ABC-115151</td>
                <td class="text-center">5</td>
                <td class="text-center"><a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger" style="max-width: 85px;">ดูข้อมูล</a></td>
            </tr>
            <tr>
                <td class="text-center">ตู้เย็น ชั้น 2</td>
                <td class="text-center">ABC-115152</td>
                <td class="text-center">5</td>
                <td class="text-center"><a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger" style="max-width: 85px;">ดูข้อมูล</a></td>
            </tr>
            <tr>
                <td class="text-center">ตู้เย็น ชั้น 3</td>
                <td class="text-center">ABC-115153</td>
                <td class="text-center">5</td>
                <td class="text-center"><a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger" style="max-width: 85px;">ดูข้อมูล</a></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
      const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('repairTable');
    const rows = table.getElementsByTagName('tr');

    // ฟังก์ชันค้นหา
    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase(); // แปลงเป็นตัวพิมพ์เล็กเพื่อให้ค้นหาได้ง่ายขึ้น
        for (let i = 1; i < rows.length; i++) { // เริ่มที่ 1 เพราะ 0 คือหัวตาราง
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let match = false;
            
            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();
                if (cellText.includes(filter)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = ''; // แสดงแถวที่ค้นพบ
            } else {
                row.style.display = 'none'; // ซ่อนแถวที่ไม่ตรงกับคำค้นหา
            }
        }
    });
</script>
{{-- เพิ่มหัวข้อ --}}
<div class="modal fade h-100 " id="modalAddID" tabindex="-2" aria-labelledby="modalAddID" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-12 text-center">
                    <span style="font-weight: bold; font-size: 25px;">เพิ่มหัวข้อ</span>
                </div>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 my-2">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">หัวข้อ</label>
                        <input class="form-control radius-15" list="" name="" value="" placeholder="กรอกหัวข้อ">
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 my-2">
                        <label style="font-weight: bold; font-size: 20px;" for="department" class="form-label">รหัส</label>
                        <input class="form-control radius-15" list="" name="" value="" placeholder="กรอกรหัส">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly ">
                <button type="button" class="btn btn-secondary radius-10 h-100" id="btnCancelLinkGroupLine" data-bs-dismiss="modal" aria-label="Close" style="width: 150px;">
                    ปิด
                </button>
                <button type="button" class="btn btn-success radius-10 h-100" id="" style="width: 150px;">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="p-4">
    <div class="row">
        <div class="col-12 col-md-7 ">
            <span class="h3 px-0" style="font-weight: bold;">การซ่อมบำรุง</span>
        </div>
        <div class="col-12 col-md-5 d-flex justify-content-evenly">
            <a class="btn btn-primary radius-30 align-content-center" style="width: 45%;" data-bs-toggle="modal" data-bs-target="#modalAddID">เพิ่มหัวข้อ</a>
            <a href="{{ url('/demo_repair_maintenance_view') }}" class="btn btn-danger radius-30 align-content-center" style="width: 45%;">ประวัติการซ่อมบำรุง</a>
        </div>
    </div>
</div>

<div class="p-4">
    <div class="row">
        <div class="col-12 col-md-6 ">
            <form method="GET" action="" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            ค้นหา
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div> -->



@endsection