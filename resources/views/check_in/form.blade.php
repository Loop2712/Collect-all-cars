<input class="d-none" type="text" name="std_of" id="std_of" value="{{ Auth::user()->std_of }}">
<div class="form-group" >
    <canvas class="" height="350" id="mycanvas"></canvas>
    <!-- <video width="100%" height="100%" autoplay="true" id="videoElement"></video> -->
</div>

<div id="div_information" class="d-none">
    <center>
        <img width="65%" src="{{ asset('/img/stickerline/PNG/1.png') }}">
    </center>
    
</div>

<div id="main_content" class="d-none">
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <input class="form-control d-none" name="user_id" type="number" id="user_id" value="{{ isset($check_in->user_id) ? $check_in->user_id : Auth::user()->id }}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_in" class="d-none form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
        <label for="time_in" class="control-label">{{ 'Time In' }}</label>
        <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ date('d-m-Y\TH:i') }}" >
        {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_out" class="d-none form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
        <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
        <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ date('d-m-Y\TH:i') }}" >
        {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
        <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
        <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : ''}}" >
        {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
    </div>

    <div id="for_std" class="d-none">
        <div id="div_select_University" class="form-group {{ $errors->has('select_University') ? 'has-error' : ''}}">
            <label for="" class="control-label">{{ 'กรุณาเลือกมหาวิทยาลัย' }}</label>
            <select name="select_University" id="select_University" class="form-control notranslate" required>
                <option class="translate" value="" selected > - เลือกมหาวิทยาลัย - </option>
                <option class="notranslate" value="KMUTNB" >มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>
            </select>
        </div>

        <div id="div_student_id" class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
            <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
            <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($check_in->student_id) ? $check_in->student_id : Auth::user()->student_id }}" >
            {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
        </div>

        <input type="checkbox" name="guest_check_in" id="guest_check_in" onclick="fu_guest_check_in();"> <span class="text-danger">บุคคลทั่วไป</span>
        <br><br>

    </div>

    <div class="text-center">
        <p class="btn btn-success notranslate" onclick="check_in_or_out('check_in');">Check in</p>
        <p class="btn btn-danger notranslate" onclick="check_in_or_out('check_out');">Check out</p>
    </div>
    
    <div class="form-group d-none">
        <input id="btn_submit_form" class="btn btn-primary float-right" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
    </div>
</div>

<script src="{{ asset('js/jsQR.js')}}"></script>
<script src="{{ asset('js/dw-qrscan.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        DWTQR("mycanvas");
        dwStartScan();

        let std_of = document.querySelector("#std_of");
    });

    function dwQRReader(data){
        // alert(data);
        // console.log(std_of);

        // ปิดกล้อง

        try{
            const myArray = data.split("Location:");
            let location = myArray[1];

            let result = location.includes("University");
            if (result) {
                const myArray_2 = myArray[1].split("=");
                location = myArray_2[1];

                if (std_of.value) {
                    document.querySelector("#for_std").classList.add("d-none");
                    // เอา required ออกจาก student_id และ select_University
                    document.querySelector("#select_University").required = "";
                    document.querySelector("#student_id").required = "";
                }else{
                    document.querySelector("#for_std").classList.remove("d-none");
                    // ใส่ required ใน student_id และ select_University
                    document.querySelector("#select_University").required = "true";
                    document.querySelector("#student_id").required = "true";
                }
            }else{
                document.querySelector("#for_std").classList.add("d-none");
                // เอา required ออกจาก student_id และ select_University
                document.querySelector("#select_University").required = "";
                document.querySelector("#student_id").required = "";
            }

            if (location) {
                document.querySelector("#main_content").classList.remove('d-none');
                document.querySelector("#mycanvas").classList.add('d-none');

                document.querySelector("#div_information").classList.remove('d-none');

                let check_in_at = document.querySelector("#check_in_at");
                    check_in_at.value = location ;

            }
        }catch{
            dwStartScan();
        }

    };

    function check_in_or_out(data){

        if (data === "check_in") {
            let time_out = document.querySelector("#time_out");
                time_out.value = "";
        }else if(data === "check_out"){
            let time_in = document.querySelector("#time_in");
                time_in.value = "";
        }

        document.querySelector("#btn_submit_form").click();

    };

    function fu_guest_check_in(){
        document.querySelector("#div_select_University").classList.add("d-none");
        document.querySelector("#div_student_id").classList.add("d-none");
        // เอา required ออกจาก student_id และ select_University
        document.querySelector("#select_University").required = "";
        document.querySelector("#student_id").required = "";
    };
    
    
</script>
