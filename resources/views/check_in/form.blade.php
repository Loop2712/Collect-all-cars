<input class="d-none" type="text" name="std_of" id="std_of" value="{{ Auth::user()->std_of }}">
<input class="d-none" type="text" name="Uni" id="Uni" value="{{ $Uni }}">

<div id="div_information" class="">
    <center>
        <img width="60%" src="{{ asset('/img/stickerline/PNG/1.png') }}">
        <br><br>
        <h3 class="notranslate"><b>คุณ : {{ Auth::user()->name }}</b></h3>
        @if(!empty(Auth::user()->std_of and Auth::user()->std_of != "guest"))
            <p class="notranslate">
                {{ Auth::user()->std_of }} <br>
                {{ Auth::user()->student_id }}
            </p>
        @endif
        <br>
    </center>
    
</div>

<div id="main_content" class="">
    <div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <input class="form-control " name="user_id" type="number" id="user_id" value="{{ isset($check_in->user_id) ? $check_in->user_id : Auth::user()->id }}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_in" class="d- form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
        <label for="time_in" class="control-label">{{ 'Time In' }}</label>
        <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ $date_now }}" >
        {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_out" class="d- form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
        <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
        <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ $date_now }}" >
        {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
        <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
        <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : $location}}" >
        {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
    </div>

    <div id="for_std" class="d-none">
        <div id="div_select_University" class="form-group {{ $errors->has('select_University') ? 'has-error' : ''}}">
            <label for="" class="control-label">{{ 'กรุณาเลือกมหาวิทยาลัย' }}</label>
            <select name="select_University" id="select_University" class="form-control notranslate">
                <option class="translate" value="" selected > - เลือกมหาวิทยาลัย - </option>
                <option class="notranslate" value="KMUTNB" >มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>
            </select>
        </div>

        <div id="div_student_id" class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
            <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
            <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($check_in->student_id) ? $check_in->student_id : Auth::user()->student_id }}" >
            {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
        </div>

        <input type="checkbox" name="guest_check_in" id="guest_check_in" 
            onclick="if(this.checked){
                fu_guest_check_in();
            }else{
                fu_std_check_in();
            }"> 
        <span class="text-danger">บุคคลทั่วไป</span>
        <br><br>

    </div>

    <input class="form-control d-none" name="check_in_out" type="text" id="check_in_out" value="" >

    <div class="text-center">
        <a id="btn_click_check_in" class="btn btn-success notranslate text-white" onclick="check_in_or_out('check_in');">Check in</a>
        <h3 id="text_check_in" class="text-success d-none"><b>Check in</b></h3>

        <a id="btn_click_check_out" class="btn btn-danger notranslate text-white" onclick="check_in_or_out('check_out');">Check out</a>
        <h3 id="text_check_out" class="text-success d-none"><b>Check out</b></h3>

        <h5 id="text_time" class="d-none">{{ $date_now }}</h5>
    </div>
    
    <div class="form-group ">
        <input id="btn_submit_form" class="btn btn-primary d-none" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
    </div>
</div>

<script src="{{ asset('js/jsQR.js')}}"></script>
<script src="{{ asset('js/dw-qrscan.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let std_of = document.querySelector("#std_of");
        let uni = document.querySelector("#Uni");

        if (uni.value === "Yes") {
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
            document.querySelector("#for_std").classList.add('d-none');
            // เอา required ออกจาก student_id และ select_University
            document.querySelector("#select_University").required = "";
            document.querySelector("#student_id").required = "";
        }

    });

    function check_in_or_out(data){

        if (data === "check_in") {
            document.querySelector("#btn_click_check_out").classList.add('d-none');
            document.querySelector("#btn_click_check_in").classList.add('d-none');

            document.querySelector("#text_check_in").classList.remove('d-none');
            document.querySelector("#text_time").classList.remove('d-none');

            let check_in_out = document.querySelector("#check_in_out");
                check_in_out.value = "check_in";

            // let time_out = document.querySelector("#time_out");
            //     time_out.value = "";
        }else if(data === "check_out"){
            document.querySelector("#btn_click_check_out").classList.add('d-none');
            document.querySelector("#btn_click_check_in").classList.add('d-none');

            document.querySelector("#text_check_out").classList.remove('d-none');
            document.querySelector("#text_time").classList.remove('d-none');

            let check_in_out = document.querySelector("#check_in_out");
                check_in_out.value = "check_out";

            // let time_in = document.querySelector("#time_in");
            //     time_in.value = "";
        }

        // document.querySelector("#btn_submit_form").click();
        document.querySelector("#btn_submit_form").classList.remove('d-none');

    };

    function fu_guest_check_in(){
        document.querySelector("#div_select_University").classList.add("d-none");
        document.querySelector("#div_student_id").classList.add("d-none");
        // เอา required ออกจาก student_id และ select_University
        document.querySelector("#select_University").required = "";
        document.querySelector("#student_id").required = "";
        document.querySelector("#select_University").value = "";
        document.querySelector("#student_id").value = "";
    };

    function fu_std_check_in(){
        document.querySelector("#div_select_University").classList.remove("d-none");
        document.querySelector("#div_student_id").classList.remove("d-none");
        // ใส่ required ใน student_id และ select_University
        document.querySelector("#select_University").required = "true";
        document.querySelector("#student_id").required = "true";
    };
    
    
</script>
