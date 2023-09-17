@extends('layouts.viicheck_for_vote_kan')

@section('content')
    <div class="container">

        @if(empty($check_user))
        <form id="vote_kan_stations" method="POST" action="{{ url('/vote_kan_stations') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="fa-duotone fa-building-flag  me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 text-danger">ลงทะเบียนหน่วยเลือกตั้ง</h5>
                    </div>

                    <input type="text" class="form-control d-none" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
                    <input type="text" class="form-control d-none" name="name_user" id="name_user" value="{{ Auth::user()->name }}" readonly>

                    <hr>
                    <div class="col-12 mb-2">
                        <label for="name" class="form-label">ชื่อ - นามสกุล</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                            <input type="text" class="form-control border-start-0" name="name" id="name" placeholder="ชื่อ - นามสกุล" required>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-phone-volume"></i></span>
                            <input type="text" class="form-control border-start-0" name="phone" id="phone" placeholder="เบอร์โทร" required>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="phone_2" class="form-label">เบอร์โทร 2</label>
                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-phone-volume"></i></span>
                            <input type="text" class="form-control border-start-0" name="phone_2" id="phone_2" placeholder="เบอร์โทร 2">
                        </div>
                    </div>
                    <div class="col-12 mb-2 d-none">
                        <label for="province" class="form-label">จังหวัด</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <input type="text" class="form-control border-start-0" name="province" id="province" placeholder="จังหวัด" value="กาญจนบุรี" readonly>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="amphoe" class="form-label">อำเภอ</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <select name="amphoe" id="amphoe" class="form-control" required onchange="show_area();">
                                <option value="" selected > - กรุณาเลือกอำเภอ  - </option>
                                @foreach($data as $item)
                                    <option value="{{ $item->amphoe }}" >{{ $item->amphoe }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="area" class="form-label">เขตเลือกตั้ง</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <select name="area" id="area" class="form-control" required onchange="show_tambon();">
                                <option value="" selected > - กรุณาเลือกเขตเลือกตั้ง  - </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="tambon" class="form-label">ตำบล</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <select name="tambon" id="tambon" class="form-control" required onchange="show_polling_station_at();">
                                <option value="" selected > - กรุณาเลือกตำบล - </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="polling_station_at" class="form-label">หน่วยเลือกตั้ง</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <select name="polling_station_at" id="polling_station_at" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกหน่วยเลือกตั้ง - </option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="col-12 mb-2 text-center">
                        <span class="btn btn-success px-5" style="width:80%;" onclick="submit_vote_kan_stations()">
                            ยืนยันข้อมูล
                        </span>

                        <button id="btn_submit_submit_vote_kan_stations" type="submit" class="btn btn-success px-5 d-none" >
                            <!-- ยืนยันข้อมูล ปุ่มจริงซ่อนอยู่-->
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @else
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                        <h4>คุณลงทะเบียนหน่วยเลือกตั้งแล้ว</h4>
                    </div>
                </div>

                <hr class="my-4">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">
                            อำเภอ
                        </h6>
                        <span class="text-secondary">{{ $check_user->amphoe }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">
                            เขตเลือกตั้ง
                        </h6>
                        <span class="text-secondary">{{ $check_user->area }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">
                            ตำบล
                        </h6>
                        <span class="text-secondary">{{ $check_user->tambon }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">
                            หน่วยเลือกตั้ง
                        </h6>
                        <span class="text-secondary">{{ $check_user->polling_station_at }}</span>
                    </li>
                </ul>

                <hr class="my-4">

                <center>
                    <a href="{{ url('/vote_kan_scores/create') }}" class="btn btn-success px-5" style="width:80%;">
                        เพิ่มผลคะแนน
                    </a>
                </center>

            </div>
        </div>
        @endif

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
        });

        function show_area(){

            let amphoe = document.querySelector("#amphoe");

            fetch("{{ url('/') }}/api/get_location_kan/"+amphoe.value+"/show_area")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    //UPDATE SELECT OPTION
                    let area = document.querySelector("#area");
                        area.innerHTML = "";

                    let option_2 = document.createElement("option");
                        option_2.text = " - กรุณาเลือกเขตเลือกตั้ง  - ";
                        option_2.value = null;
                        option_2.selected = true;
                        area.add(option_2);

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.area;
                        option.value = item.area;
                        area.add(option);
                    }

                    
                });

            return "OK";
        }

        function show_tambon(){

            let amphoe = document.querySelector("#amphoe");
            let area = document.querySelector("#area");

            fetch("{{ url('/') }}/api/get_location_kan/"+amphoe.value+"/"+area.value+"/show_tambon")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    //UPDATE SELECT OPTION
                    let tambon = document.querySelector("#tambon");
                        tambon.innerHTML = "";

                    let option_2 = document.createElement("option");
                        option_2.text = " - กรุณาเลือกตำบล - ";
                        option_2.value = null;
                        option_2.selected = true;
                        tambon.add(option_2);

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.tambon;
                        option.value = item.tambon;
                        tambon.add(option);
                    }

                    
                });

            return "OK";
        }

        function show_polling_station_at(){

            let amphoe = document.querySelector("#amphoe");
            let area = document.querySelector("#area");
            let tambon = document.querySelector("#tambon");

            fetch("{{ url('/') }}/api/get_location_kan/"+amphoe.value+"/"+area.value+"/"+tambon.value+"/show_polling_station_at")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    // console.log(result[0]['not_registered']);

                    let not_registered = result[0]['not_registered'].split(',');
                    //UPDATE SELECT OPTION
                    let polling_station_at = document.querySelector("#polling_station_at");
                        polling_station_at.innerHTML = "";

                    let option_2 = document.createElement("option");
                        option_2.text = " - กรุณาเลือกหน่วยเลือกตั้ง - ";
                        option_2.value = null;
                        option_2.selected = true;
                        polling_station_at.add(option_2);

                    for (let i = 0; i < not_registered.length; i++) {
                        let option = document.createElement("option");
                            option.text = not_registered[i];
                            option.value = not_registered[i];
                            polling_station_at.add(option);
                    }
                    
                });

            return "OK";
        }

        function submit_vote_kan_stations() {

            if ($("#vote_kan_stations")[0].checkValidity()) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'ลงทะเบียนเรียบร้อยแล้ว',
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(() => {
                    document.querySelector('#btn_submit_submit_vote_kan_stations').click();
                }, 1000);
            } else {
                // Validate Form
                $("#vote_kan_stations")[0].reportValidity();
                event.preventDefault();
            }
        }

    </script>
@endsection
