@extends('layouts.viicheck_for_vote_kan')

@section('content')
<!-- <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Vote_kan_score</div>
                    <div class="card-body">
                        <a href="{{ url('/vote_kan_scores') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/vote_kan_scores') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('vote_kan_scores.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
<style>
    .record-score {
        height: 200px;
        overflow: auto;
    }

    .name-user-score {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 60%;
    }
</style>
<div class="card border-top border-0 border-4 border-danger m-2">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
            </div>
            <h5 class="mb-0 text-danger">กรอกผลคะแนน</h5>
        </div>
        <hr>
        @php
        $data_station = App\Models\Vote_kan_station::where('user_id' , Auth::user()->id)->first();
        $data_score = App\Models\Vote_kan_score::where('user_id' , Auth::user()->id)->orderBy('id', 'desc')->get();
        $count_data_score = count($data_score);
        @endphp
        @if($data_score != "[]")
        <h4>คะแนนที่ลงไว้ล่าสุด</h4>
        <ul class="list-group list-group-flush record-score">
            @foreach($data_score as $item)
            <li class="list-group-item d-flex align-items-center flex-wrap">
                <div class="d-flex justify-content-center w-100">
                    <h4 class="mb-0">ครั้งที่ {{$count_data_score}}</h4>
                    @php
                    $count_data_score = $count_data_score - 1;
                    @endphp
                </div>
                <div class="d-flex justify-content-between w-100">
                    <h6 class="mb-0">เบอร์ที่ 1</h6>
                    <span class="text-secondary">{{$item->number_1}} คะแนน</span>
                </div>
                <div class="d-flex mt-2 justify-content-between w-100">
                    <h6 class="mb-0">เบอร์ที่ 2</h6>
                    <span class="text-secondary">{{$item->number_2}} คะแนน</span>
                </div>
                <div class="d-flex mt-2 justify-content-between w-100">
                    <h6 class="mb-0">เบอร์ที่ 3</h6>
                    <span class="text-secondary">{{$item->number_3}} คะแนน</span>
                </div>
                <div class="d-flex mt-2 justify-content-between w-100 align-items-center ">
                    <h6 class="mb-0 name-user-score">โดย {{Auth::user()->name}}</h6>
                    <span class="text-secondary">เวลา {{ (\Carbon\Carbon::parse($item->created_at))->format('H:i น.') }}</span>
                </div>
            </li>
            @endforeach
        </ul>
        <br><br>
        @endif
        <h6 class="mt-2">หน่วย {{$data_station->name}}</h6>
        <h6 class="mt-2">เวลาปัจจุบัน <span id="current-time"></span></h6>

        <form id="vote_kan_scores" method="POST" action="{{ url('/vote_kan_scores') }}" accept-charset="UTF-8" class="form-horizontal row g-3 needs-validation" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include ('vote_kan_scores.form', ['formMode' => 'create'])

        </form>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function submit_vote_kan() {

        if ($("#vote_kan_scores")[0].checkValidity()) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'ส่งคะแนนเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            })

            setTimeout(() => {
                document.getElementById("vote_kan_scores").submit();
            }, 5000);
        } else {
            // Validate Form
            $("#vote_kan_scores")[0].reportValidity();
            event.preventDefault();
        }
    }

    function updateCurrentTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    // แปลงชั่วโมงและวินาทีให้เป็นสตริง 2 หลัก
    var hoursString = hours.toString().padStart(2, '0');
    var minutesString = minutes.toString().padStart(2, '0');
    var secondsString = seconds.toString().padStart(2, '0');

    // แสดงข้อมูลเวลาในรูปแบบ "ชั่วโมง:นาที:วินาที"
    var timeString = hoursString + ":" + minutesString + ":" + secondsString;
    
    // อัปเดตข้อมูลเวลาบนหน้า HTML
    document.getElementById("current-time").textContent = timeString;
}

// เรียก updateCurrentTime เพื่อแสดงเวลาเริ่มต้น
updateCurrentTime();

// ใช้ setInterval เพื่ออัปเดตเวลาทุก 1 วินาที (1000 มิลลิวินาที)
setInterval(updateCurrentTime, 1000);

</script>
@endsection