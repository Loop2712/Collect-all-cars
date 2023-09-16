@php
$data_station = App\Models\Vote_kan_station::where('user_id' , Auth::user()->id)->first();
@endphp

<div class="col-md-6">
    <label for="number_1" class="form-label">คะแนนเบอร์ <b>1</b></label>
    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
        <input class="form-control border-start-0" name="number_1" placeholder="โปรดกรอกคะแนนเบอร์ 1" type="number" id="number_1" value="{{ isset($vote_kan_score->number_1) ? $vote_kan_score->number_1 : ''}}" required>
    </div>
</div>
<div class="col-md-6">
    <label for="number_2" class="form-label">คะแนนเบอร์ <b>2</b></label>
    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
        <input class="form-control border-start-0" name="number_2" placeholder="โปรดกรอกคะแนนเบอร์ 2" type="number" id="number_2" value="{{ isset($vote_kan_score->number_2) ? $vote_kan_score->number_2 : ''}}" required>
    </div>
</div>

<div class="col-12 text-center">
    <h6 class="mt-2 ">เจ้าหน้าที่ผู้กรอกคะแนน  <span class="text-primary d-block">{{  $data_station->name }}</span></h6>
    <a class="btn btn-success w-100 px-5 btn-block " onclick="submit_vote_kan()">ยืนยัน</a>
    <div class="text-muted mt-2">
        <span>เวลาปัจจุบัน</span>
        <span id="current-time"></span>
    </div>
</div>




