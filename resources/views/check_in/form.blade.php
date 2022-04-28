<input class="d-none" type="text" name="std_of" id="std_of" value="{{ Auth::user()->std_of }}">
<input class="d-none" type="text" name="Uni" id="Uni" value="{{ $Uni }}">

<div id="div_information" class="">
    <center>
        <img class="wow fadeInLeft" width="70%" src="{{ asset('/img/stickerline/PNG/1.png') }}">
        <br><br>
        <h3 class="notranslate wow fadeInUp">
            @if(!empty(Auth::user()->name_staff))
                <b><span class="translate">คุณ</span> : {{ Auth::user()->name_staff }}</b>
            @else
                <b><span class="translate">คุณ</span> : {{ Auth::user()->name }}</b>
            @endif
            <br>
            <a href="{{ url('/profile/' . Auth::user()->id . '/edit') }}">
                <span class="text-danger translate" style="font-size:15px;"><i>แก้ไขข้อมูล</i></span>
            </a>
        </h3>

        @if(!empty(Auth::user()->std_of and Auth::user()->std_of != "guest"))
            <p class="notranslate wow fadeInUp">
                {{ Auth::user()->std_of }} <br>
                {{ Auth::user()->student_id }}
            </p>
        @endif

        @if(!empty(Auth::user()->std_of and Auth::user()->std_of == "guest"))
            <p class="notranslate wow fadeInUp">
                {{ Auth::user()->name_staff }} <br>
                บุคคลทั่วไป
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
    <div id="div_time_in" class="d-none form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
        <label for="time_in" class="control-label">{{ 'Time In' }}</label>
        <input class="form-control" name="time_in" type="datetime" id="time_in" value="{{ $date_now }}" >
        {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
    </div>
    <div id="div_time_out" class="d-none form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
        <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
        <input class="form-control" name="time_out" type="datetime" id="time_out" value="{{ $date_now }}" >
        {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
        <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
        <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : $location}}" >
        {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
    </div>

    <input class="form-control d-none" name="phone_user" type="tel" id="phone_user" value="{{ Auth::user()->phone }}" pattern="[0-9]{10}">

    @if(!empty($real_name) and empty( Auth::user()->phone ))
        <div class="d- form-group {{ $errors->has('tow_time_input_phone') ? 'has-error' : ''}}">
            <label for="tow_time_input_phone" class="control-label translate">{{ 'Mobile number' }}</label>
            <input class="form-control" name="tow_time_input_phone" type="tel" id="tow_time_input_phone" value="{{ Auth::user()->phone }}" oninput="document.querySelector('#phone_user').value = document.querySelector('#tow_time_input_phone').value ;" placeholder="กรุณาใส่เบอร์มือถือ" pattern="[0-9]{10}"> 
            {!! $errors->first('tow_time_input_phone', '<p class="help-block">:message</p>') !!}
        </div>
    @endif

    @if(empty($real_name))
        <div id="div_name_guest" class="form-group {{ $errors->has('name_staff') ? 'has-error' : ''}}">
            <label for="name_staff" class="control-label translate">{{ 'First name - Surname' }}</label>
            <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ $real_name }}" required >
            {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="d- form-group {{ $errors->has('first_input_phone') ? 'has-error' : ''}}">
            <label for="first_input_phone" class="control-label translate">{{ 'Mobile number' }}</label>
            <input class="form-control" name="first_input_phone" type="tel" id="first_input_phone" value="{{ Auth::user()->phone }}" oninput="document.querySelector('#phone_user').value = document.querySelector('#first_input_phone').value ;"  placeholder="กรุณาใส่เบอร์มือถือ" pattern="[0-9]{10}">
            {!! $errors->first('first_input_phone', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="d-none" id="div_for_Uni">

            <div id="div_std_check_in">
                <input type="radio" name="guest_check_in" id="std_check_in" checked 
                    onclick="if(this.checked){
                        fu_std_check_in();
                    }else{
                        fu_guest_check_in();
                    }"> 
                <span class="text-danger">&nbsp;&nbsp;Student</span>
            </div>

            <input type="radio" name="guest_check_in" id="staff_kmutnb" 
                onclick="if(this.checked){
                    fu_personnel_check_in();
                }else{
                    fu_std_check_in();
                }"> 
            <span class="text-danger">&nbsp;&nbsp;Personnel</span>
            <br>

            <input type="radio" name="guest_check_in" id="guest_check_in" 
                onclick="if(this.checked){
                    fu_guest_check_in();
                }else{
                    fu_std_check_in();
                }"> 
            <span class="text-danger">&nbsp;&nbsp;Guest</span>
            
            <br><br>
            
            <div id="div_select_University" class="form-group {{ $errors->has('select_University') ? 'has-error' : ''}}">
                <label for="" class="control-label">{{ 'Please select a university' }}</label>
                <select name="select_University" id="select_University" class="form-control notranslate">
                    <option class="translate" value="" selected > - Please select a university - </option>
                    @foreach($name_university as $item)
                        <option class="notranslate" value="{{ $item->initials_en }}" >
                            <b>{{ $item->initials_th }} : </b>{{ $item->full_name_th }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="div_student_id" class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
                <label for="student_id" class="control-label">{{ 'Student Id' }}</label>
                <input class="form-control" name="student_id" type="text" id="student_id" value="{{ isset($check_in->student_id) ? $check_in->student_id : Auth::user()->student_id }}" >
                {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
    @endif
        
    @if(!empty(Auth::user()->student_id))
        <input class="form-control d-none" name="student_id_2" type="text" id="student_id_2" value="{{ isset($check_in->student_id) ? $check_in->student_id : Auth::user()->student_id }}" >
    @endif


    <input class="form-control d-none" name="check_in_out" type="text" id="check_in_out" value="" >
    <input class="form-control d-none" name="type" type="text" id="type" value="" >

    <div class="text-center">
        <a id="btn_click_check_in" class="wow fadeInLeft btn button-checkin shadow-btn-checkin notranslate " onclick="check_in_or_out('check_in');">Check in</a>
        <h3 id="text_check_in" class="text-success d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;"><b>Check in</b></h3>

        <a id="btn_click_check_out" class="wow fadeInRight btn button-checkout shadow-btn notranslate " onclick="check_in_or_out('check_out');">Check out</a>
        <h3 id="text_check_out" class="text-danger d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;"><b>Check out</b></h3>

        <h5 id="text_time" class="d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">{{ date("d/m/Y H:i" , strtotime($date_now)) }}</h5>
    </div>
    <br>
      <div id="div_submit_form" class="form-group d-none btn-block">
        <input id="btn_submit_form" style="border-radius: 25px;"class="btn btn-primary btn-lg btn-block" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
    </div>
    
</div>
      
</div>
<script src="{{ asset('js/jsQR.js')}}"></script>
<script src="{{ asset('js/dw-qrscan.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let check_in_at = document.querySelector('#check_in_at').value;

        let std_of = document.querySelector("#std_of");
        let uni = document.querySelector("#Uni");

        if (uni.value === "Yes") {

            document.querySelector("#div_for_Uni").classList.remove("d-none");

            if (std_of.value) {
                document.querySelector("#div_std_check_in").classList.remove("d-none");

                // เอา required ออกจาก student_id และ select_University
                document.querySelector("#select_University").required = "";
                document.querySelector("#student_id").required = "";

            }else{
                document.querySelector("#div_std_check_in").classList.remove("d-none");

                // ใส่ required ใน student_id และ select_University
                document.querySelector("#select_University").required = "true";
                document.querySelector("#student_id").required = "true";


            }
            document.querySelector("#type").value = "std";
        }else{
            // เอา required ออกจาก student_id และ select_University
            document.querySelector("#select_University").required = "";
            document.querySelector("#student_id").required = "";

            document.querySelector("#type").value = "guest";

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
        document.querySelector("#div_submit_form").classList.remove('d-none');

    };

    function fu_guest_check_in(){
        document.querySelector("#div_select_University").classList.add("d-none");
        document.querySelector("#div_student_id").classList.add("d-none");

        document.querySelector("#div_std_check_in").classList.remove("d-none");

        // เอา required ออกจาก student_id และ select_University
        document.querySelector("#select_University").required = "";
        document.querySelector("#student_id").required = "";
        document.querySelector("#select_University").value = "";
        document.querySelector("#student_id").value = "";

        document.querySelector("#type").value = "guest";

    };

    function fu_std_check_in(){
        document.querySelector("#div_select_University").classList.remove("d-none");
        document.querySelector("#div_student_id").classList.remove("d-none");
        document.querySelector("#div_select_University").classList.remove("d-none");

        // ใส่ required ใน student_id และ select_University
        document.querySelector("#select_University").required = "true";
        document.querySelector("#student_id").required = "true";

        document.querySelector("#type").value = "std";


    };

    function fu_personnel_check_in(){
        document.querySelector("#div_select_University").classList.add("d-none");
        document.querySelector("#div_student_id").classList.add("d-none");
        document.querySelector("#div_select_University").classList.remove("d-none");

        // เอา required ออกจาก student_id และ select_University
        document.querySelector("#select_University").required = "true";
        document.querySelector("#student_id").required = "";
        document.querySelector("#select_University").value = "";
        document.querySelector("#student_id").value = "";

        document.querySelector("#type").value = "บุคลากร";

        
    };
    
    
</script>
