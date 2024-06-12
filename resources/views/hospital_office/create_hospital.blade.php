@extends('layouts.partners.theme_partner_new')
<style>
    /* =================ตัว loading animation==================== */
    .loader {
        width: 35px;
        aspect-ratio: 1;
        border-radius: 50%;
        border: 8px solid #45dcf0;
        animation:
            l20-1 0.8s infinite linear alternate,
            l20-2 1.6s infinite linear;
    }
    @keyframes l20-1{
        0%    {clip-path: polygon(50% 50%,0       0,  50%   0%,  50%    0%, 50%    0%, 50%    0%, 50%    0% )}
        12.5% {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100%   0%, 100%   0%, 100%   0% )}
        25%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 100% 100%, 100% 100% )}
        50%   {clip-path: polygon(50% 50%,0       0,  50%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
        62.5% {clip-path: polygon(50% 50%,100%    0, 100%   0%,  100%   0%, 100% 100%, 50%  100%, 0%   100% )}
        75%   {clip-path: polygon(50% 50%,100% 100%, 100% 100%,  100% 100%, 100% 100%, 50%  100%, 0%   100% )}
        100%  {clip-path: polygon(50% 50%,50%  100%,  50% 100%,   50% 100%,  50% 100%, 50%  100%, 0%   100% )}
    }
    @keyframes l20-2{
        0%    {transform:scaleY(1)  rotate(0deg)}
        49.99%{transform:scaleY(1)  rotate(135deg)}
        50%   {transform:scaleY(-1) rotate(0deg)}
        100%  {transform:scaleY(-1) rotate(-135deg)}
    }
    /* =================จบตัว loading animation==================== */

    .fade-out {
        opacity: 1;
        transition: opacity 1s ease-out;
    }

    .fade-out.hide {
        opacity: 0;
    }

</style>

@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="{{ url('/view_hospital_offices') }}" title="ย้อนกลับ"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> ย้อนกลับ</button></a>
        <br />
        <br />
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active text-center" style="width:130px; font-weight: bold; border:1px rgb(146, 146, 146) solid;" id="pills-input-tab" data-bs-toggle="pill" data-bs-target="#pills-input" type="button" role="tab" aria-controls="pills-input" aria-selected="true">
                        กรอกข้อมูล
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-center" style="width:130px; font-weight: bold; border:1px rgb(146, 146, 146) solid;" id="pills-excel-tab" data-bs-toggle="pill" data-bs-target="#pills-excel" type="button" role="tab" aria-controls="pills-excel" aria-selected="false">
                        Excel
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-input" role="tabpanel" aria-labelledby="pills-input-tab" tabindex="0">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <form class="row g-3" method="POST" action="{{ url('/hospital_office') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include ('hospital_office.form', ['formMode' => 'create'])
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-excel" role="tabpanel" aria-labelledby="pills-excel-tab" tabindex="0">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <a href="{{ url('/') }}/storage/templates/hospital_offices_template.xlsx" download id="excel_template_download" class="btn btn-info float-end" >ดาวน์โหลด Template <i style="font-size: 14px;" class="fa-regular fa-file"></i></a>
                            <br><br>
                            <h6>excel file</h6>
                            <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_div_success();">
                        </div>
                        <div class="mt-4 mb-2 px-3 d-flex">
                            <div class="">
                                <button class="btn btn-success px-5 me-3 " onclick="readExcel()">
                                    อ่านไฟล์ excel
                                </button>
                            </div>
                            <div  id="div_loader_Excel" class="d-flex justify-content-center align-items-center d-none">
                                <div id="lds-ring" class="loader"></div>
                            </div>
                            <div  id="div_success_Excel" class="d-flex justify-content-center align-items-center d-none">

                            </div>

                        </div>
                    </div>
                </div>

            </div>

    </div>
</div>

<script>
    // EXCEL
    function readExcel() {

        document.querySelector('#div_loader_Excel').classList.remove('d-none');

        let input = document.getElementById('excelInput');
        let file = input.files[0];

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let data = e.target.result;
                let workbook = XLSX.read(data, { type: 'binary' });

                // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                let sheetName = workbook.SheetNames[0];
                let sheet = workbook.Sheets[sheetName];

                // แปลงข้อมูลในชีทเป็น JSON
                let jsonData = XLSX.utils.sheet_to_json(sheet);

                // ตรวจสอบข้อมูลในคอนโซล
                console.log(jsonData);

                fetch("{{ url('/') }}/api/create_hospital_office/excel", {
                    method: 'post',
                    body: JSON.stringify(jsonData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (response){
                    return response.text();
                }).then(function(data){
                    console.log(data);

                    if(data){
                        // เคลียร์ input
                        // clearFileInput('excel');
                        setTimeout(() => {
                            document.querySelector('#div_loader_Excel').classList.add('d-none');
                            document.querySelector("#div_success_Excel").classList.add('fade-out');

                            let html_success = `<i class="fa-solid fa-check" style="color: #11ff00; font-size:33px;"></i>`;
                            document.querySelector("#div_success_Excel").insertAdjacentHTML('beforeend',html_success); // แทรกล่างสุด
                            show_div_success();
                        }, 1000);

                    }

                }).catch(function(error){
                    console.error("error :"+error);

                });

            };

            reader.readAsBinaryString(file);

        } else {
            document.querySelector('#div_loader_Excel').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

    // เคลียไฟล์ออกจาก input หลัง reader เรียบร้อย
    function clearFileInput(type){
        let input = document.getElementById(type+'Input');

        // กำหนดค่า input ให้เป็น null หรือเปลี่ยนเป็นไฟล์ว่าง
        input.value = null; // หรือ input.value = '';
    }

    function clear_div_success(){
        // console.log('clear_div_success');
        document.querySelector('#div_success_Excel').classList.add('d-none');
        document.querySelector('#div_success_Excel').classList.remove('fade-out');
        document.querySelector('#div_success_Excel').classList.remove('hide');
        document.querySelector('#div_success_Excel').innerHTML = "";
    }

    function show_div_success(){
        document.querySelector('#div_success_Excel').classList.remove('d-none');
        setTimeout(() => {
            document.querySelector('#div_success_Excel').classList.add('hide');
            clearFileInput('excel');
        }, 2000);
    }



</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection
