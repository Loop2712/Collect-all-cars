<!-- Button trigger modal -->
<button id="btn_check_in_or_out" type="button" class="d-none" data-toggle="modal" data-target="#modal_check_in_or_out">
</button>

<!-- Modal -->
<div class="modal fade" id="modal_check_in_or_out" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">สวัสดีคุณ {{ Auth::user()->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <p class="btn btn-success notranslate" class="close" data-dismiss="modal" aria-label="Close" onclick="check_in_or_out('check_in');">Check in</p>
                <p class="btn btn-danger notranslate" class="close" data-dismiss="modal" aria-label="Close" onclick="check_in_or_out('check_out');">Check out</p>
            </div>
        </div>
    </div>
  </div>
</div>

<div id="main_content" class="">
    <div class="form-group" >
        <canvas class="" height="350" id="mycanvas"></canvas>
        <!-- <video width="100%" height="100%" autoplay="true" id="videoElement"></video> -->
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <input class="form-control d-none" name="user_id" type="number" id="user_id" value="{{ isset($check_in->user_id) ? $check_in->user_id : Auth::user()->id }}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_in" class="d-none form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
        <label for="time_in" class="control-label">{{ 'Time In' }}</label>
        <input class="form-control" name="time_in" type="date" id="time_in" value="{{ isset($check_in->time_in) ? $check_in->time_in : ''}}" >
        {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_out" class="d-none form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
        <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
        <input class="form-control" name="time_out" type="date" id="time_out" value="{{ isset($check_in->time_out) ? $check_in->time_out : ''}}" >
        {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
        <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
        <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : ''}}" >
        {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
    </div>

    <div id="for_std" class="d-none">
    <hr>
        <div class="form-group {{ $errors->has('select_University') ? 'has-error' : ''}}">
            <label for="" class="control-label">{{ 'กรุณาเลือกมหาวิทยาลัย' }}</label>
            <select name="select_University" id="select_University" class="form-control notranslate" onchange="">
                <option class="translate" value="" selected > - เลือกมหาวิทยาลัย - </option>
                <option class="notranslate" value="KMUTNB" >มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>
            </select>
        </div>

        <div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
            <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
            <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($check_in->student_id) ? $check_in->student_id : Auth::user()->student_id}}" >
            {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    

    <div class="form-group">
        <input class="btn btn-primary float-right" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
    </div>
</div>

<script src="{{ asset('js/jsQR.js')}}"></script>
<script src="{{ asset('js/dw-qrscan.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        DWTQR("mycanvas");
        dwStartScan();
    });

    function dwQRReader(data){
        // alert(data);
        // console.log(data);
        // ปิดกล้อง
        document.querySelector("#btn_check_in_or_out").click();

        const myArray = data.split("Location:");
        let location = myArray[1];

        let result = location.includes("University");
        if (result) {
            const myArray_2 = myArray[1].split("=");
            location = myArray_2[1];

            document.querySelector("#for_std").classList.remove("d-none");
            // ใส่ required ใน student_id และ select_University
        }else{
            document.querySelector("#for_std").classList.add("d-none");
        }

        document.querySelector("#mycanvas").classList.add('d-none');
        let check_in_at = document.querySelector("#check_in_at");
            check_in_at.value = location ;
    };

    function check_in_or_out(data){
        console.log({{ $date_time }});
        if (data === "check_in") {
            document.querySelector("#div_time_in").classList.remove("d-none");
            let time_in = document.querySelector("#time_in");
                time_in.value = {{ $date_time }} ;
        }else if(data === "check_out"){
            document.querySelector("#div_time_out").classList.remove("d-none");
            let time_out = document.querySelector("#time_out");
                time_out.value = {{ $date_time }} ;
        }

    };
    
    
</script>
