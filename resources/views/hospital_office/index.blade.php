@extends('layouts.app')

@section('content')

<style>
    
    .loading-container {
    display: flex;
}

.loading-spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #000;
    animation: spin 1s linear infinite;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-right: 20px;
    margin-top: 50px;
    margin-bottom: 50px;
}


@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

@keyframes drawCheck {
    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}

.checkmark {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #29cc39;
    stroke-miterlimit: 10;
    margin: 10% auto;
    box-shadow: inset 0px 0px 0px #ffffff;
    animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
}

.checkmark__check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0
    }
}

@keyframes scale {

    0%,
    100% {
        transform: none
    }

    50% {
        transform: scale3d(1.1, 1.1, 1)
    }
}

@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 60px #fff
    }
}

</style>


<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hospital_office</div>
                <div class="card-body">
                    <a href="{{ url('/hospital_office/create') }}" class="btn btn-success btn-sm" title="Add New Hospital_office">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/hospital_office') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>

                    <div class="tab-pane fade show active" id="primaryExcel" role="tabpanel">

                        <div class="card border-top border-0 border-4 border-success">
                            <div class="card-body p-5">
                                <div class="card-title text-center">
                                    <i class="fa-solid fa-file-excel text-success font-50"></i>
                                    <h5 class="mb-5 mt-2 text-success">เพิ่มข้อมูล</h5>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <label for="inputLastEnterUsername" class="form-label">Excel file</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-transparent">
                                            <i class="fa-solid fa-file-excel"></i>
                                        </span>
                                        <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls">
                                    </div>
                                </div>
                                <div class="col-12 mt-4 mb-2">
                                    <button class="btn btn-primary px-5" onclick="readExcel()">
                                        Read Excel
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div id="div_loader_Excel" class="col-12 mt-5 d-none">
                        <section class="loader">
                            <div class="slider" style="--i:0"></div>
                            <div class="slider" style="--i:1"></div>
                            <div class="slider" style="--i:2"></div>
                            <div class="slider" style="--i:3"></div>
                            <div class="slider" style="--i:4"></div>
                            <span id="text_load" class="text-success" style="margin-top: 25px;">กำลังประมวลผล..</span>
                        </section>
                    </div>
                    <div  class="loading-container" class="col-12 mt-5">
                        <div id="div_success_Excel" class="contrainerCheckmark d-none">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <center>
                                <h5 class="mt-3">เสร็จสิ้น</h5>
                            </center>
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
        console.log('readExcel');
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
                // console.log(jsonData);

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

                }).catch(function(error){
                    // console.error(error);
                });

            };

            reader.readAsBinaryString(file);

        } else {
            document.querySelector('#div_loader_Excel').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

@endsection
