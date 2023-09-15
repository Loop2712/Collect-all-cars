@extends('layouts.viicheck_for_vote_kan')

@section('content')
    <div class="container">

        <form method="POST" action="{{ url('/vote_kan_stations') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
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
                            <select name="amphoe" id="amphoe" class="form-control" required>
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
                            <select name="area" id="area" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกเขตเลือกตั้ง  - </option>
                                <option value="ทดสอบเขตเลือกตั้ง" >ทดสอบเขตเลือกตั้ง</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="tambon" class="form-label">ตำบล</label>
                        <span class="text-danger">*</span>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><i class="fa-solid fa-map"></i></span>
                            <select name="tambon" id="tambon" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกตำบล - </option>
                                <option value="ทดสอบตำบล" >ทดสอบตำบล</option>
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
                                <option value="ทดสอบหน่วยเลือกตั้ง" >ทดสอบหน่วยเลือกตั้ง</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="col-12 mb-2 text-center">
                        <button type="submit" class="btn btn-success px-5" style="width:80%;">
                            ยืนยันข้อมูล
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            show_location_A();
        });

        function show_location_A(){
            let province = document.querySelector("#province");

            fetch("{{ url('/') }}/api/get_location_kan/"+province.value+"/show_location_A")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    //UPDATE SELECT OPTION
                    let amphoe = document.querySelector("#amphoe");
                        amphoe.innerHTML = "";

                    let option_2 = document.createElement("option");
                        option_2.text = "กรุณาเลือกอำเภอ";
                        option_2.value = null;
                        option_2.selected = true;
                        amphoe.add(option_2);

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.amphoe;
                        option.value = item.amphoe;
                        amphoe.add(option);
                    }

                    
                });

            return amphoe.value;
        }

    </script>
@endsection
