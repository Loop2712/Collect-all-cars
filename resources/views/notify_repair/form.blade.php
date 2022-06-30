<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'หัวข้อ' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($notify_repair->title) ? $notify_repair->title : ''}}" required placeholder="กรุณากรอกหัวข้อ">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'หมวดหมู่' }}</label><span style="color: #FF0033;"> *</span>
    <select class="form-control" name="category" id="category" required>
        <option value="" selected>กรุณาเลือกหมวดหมู่</option>
        @foreach($data_category_condo as $category)
            <option value="{{ $category->name_category }}">{{ $category->name_category }}</option>
        @endforeach
        <option value="อื่นๆ">อื่นๆ</option>
    </select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'คำอธิบายสั้นๆ' }}</label>
    <textarea class="form-control" id="content" name="content" rows="4" placeholder="อธิบายถึงปัญหาคร่าวๆ"></textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'รูปภาพ' }}</label><span style="color: #FF0033;"> *</span>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($notify_repair->photo) ? $notify_repair->photo : ''}}" required accept="image/*" onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0]),document.getElementById('show_photo').classList.remove('d-none');">
    <center>
        <img class="d-none full_img" style="padding:0px ;object-fit: cover;margin-top: 15px;" width="90%" id="show_photo" />
    </center>
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>

<!-- วัน-เวลา นัดหมาย -->
<div class="form-group {{ $errors->has('appointment_date') ? 'has-error' : ''}}">
    <label for="appointment_date" class="control-label">{{ 'วันที่ต้องการนัด' }}</label>
    <input class="form-control" name="appointment_date" type="date" id="appointment_date" value="{{ isset($notify_repair->appointment_date) ? $notify_repair->appointment_date : ''}}" required onchange="check_date();">
    {!! $errors->first('appointment_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('appointment_time') ? 'has-error' : ''}}">
    <label for="appointment_time" class="control-label">{{ 'เวลาที่ต้องการนัด' }}</label>
    <!-- <input class="form-control" name="appointment_time" type="time" id="appointment_time" value="{{ isset($notify_repair->appointment_time) ? $notify_repair->appointment_time : ''}}" > -->
    <select class="form-control notranslate" name="appointment_time" id="appointment_time" required>
        <option value="" selected>กรุณาเลือกเวลาที่ต้องการนัด</option>
        <option id="option_time_8" value="08">08:00</option>
        <option id="option_time_9" value="09">09:00</option>
        <option id="option_time_10" value="10">10:00</option>
        <option id="option_time_11" value="11">11:00</option>
        <option id="option_time_12" value="" disabled>----- พักเที่ยง -----</option>
        <option id="option_time_13" value="13">13:00</option>
        <option id="option_time_14" value="14">14:00</option>
        <option id="option_time_15" value="15">15:00</option>
        <option id="option_time_16" value="16">16:00</option>
    </select>
    {!! $errors->first('appointment_time', '<p class="help-block">:message</p>') !!}
</div>

<!-- ข้อมูลผู้ใช้และคอนโด -->
<div class="form-group d-none {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ $condo_id }}" readonly>
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('user_condo_id') ? 'has-error' : ''}}">
    <label for="user_condo_id" class="control-label">{{ 'User Condo Id' }}</label>
    <input class="form-control" name="user_condo_id" type="number" id="user_condo_id" value="{{ $data_user_condo->id }}" readonly>
    {!! $errors->first('user_condo_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('building') ? 'has-error' : ''}}">
    <label for="building" class="control-label">{{ 'Building' }}</label>
    <input class="form-control" name="building" type="text" id="building" value="{{ $data_user_condo->building }}" readonly>
    {!! $errors->first('building', '<p class="help-block">:message</p>') !!}
</div>

<!-- STATUS -->
<div class="form-group d-none {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($notify_repair->status) ? $notify_repair->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('time_wait_cf') ? 'has-error' : ''}}">
    <label for="time_wait_cf" class="control-label">{{ 'Time Wait Cf' }}</label>
    <input class="form-control" name="time_wait_cf" type="datetime-local" id="time_wait_cf" value="{{ isset($notify_repair->time_wait_cf) ? $notify_repair->time_wait_cf : ''}}" >
    {!! $errors->first('time_wait_cf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('time_pending') ? 'has-error' : ''}}">
    <label for="time_pending" class="control-label">{{ 'Time Pending' }}</label>
    <input class="form-control" name="time_pending" type="datetime-local" id="time_pending" value="{{ isset($notify_repair->time_pending) ? $notify_repair->time_pending : ''}}" >
    {!! $errors->first('time_pending', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('time_finished') ? 'has-error' : ''}}">
    <label for="time_finished" class="control-label">{{ 'Time Finished' }}</label>
    <input class="form-control" name="time_finished" type="datetime-local" id="time_finished" value="{{ isset($notify_repair->time_finished) ? $notify_repair->time_finished : ''}}" >
    {!! $errors->first('time_finished', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('name_staff') ? 'has-error' : ''}}">
    <label for="name_staff" class="control-label">{{ 'Name Staff' }}</label>
    <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ isset($notify_repair->name_staff) ? $notify_repair->name_staff : ''}}" >
    {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($notify_repair->staff_id) ? $notify_repair->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>
<input class="d-none" type="datetime" name="date_now" id="date_now" value="{{ $date_now }}">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>


<script>

    function check_date(){
        let appointment_date = document.querySelector('#appointment_date');
        let date_now = document.querySelector('#date_now');

        if (appointment_date.value < date_now.value) {
            alert("ไม่สามารถเลือกวันนี้ได้");
            appointment_date.value = "";
        }else{
            select_appointment_time();
        }
        
    }

    function select_appointment_time(){
        let appointment_date = document.querySelector('#appointment_date');
        let condo_id = document.querySelector('#condo_id');

        document.querySelector('#option_time_8').disabled = false ;
        document.querySelector('#option_time_9').disabled = false ;
        document.querySelector('#option_time_10').disabled = false ;
        document.querySelector('#option_time_11').disabled = false ;
        document.querySelector('#option_time_13').disabled = false ;
        document.querySelector('#option_time_14').disabled = false ;
        document.querySelector('#option_time_15').disabled = false ;
        document.querySelector('#option_time_16').disabled = false ;

        document.querySelector('#option_time_8').innerHTML = "08:00" ;
        document.querySelector('#option_time_9').innerHTML = "09:00" ;
        document.querySelector('#option_time_10').innerHTML = "10:00" ;
        document.querySelector('#option_time_11').innerHTML = "11:00" ;
        document.querySelector('#option_time_13').innerHTML = "13:00" ;
        document.querySelector('#option_time_14').innerHTML = "14:00" ;
        document.querySelector('#option_time_15').innerHTML = "15:00" ;
        document.querySelector('#option_time_16').innerHTML = "16:00" ;


        fetch("{{ url('/') }}/api/select_appointment_time" + "/" + appointment_date.value + "/" + condo_id.value)
                .then(response => response.json())
                .then(result => {
                    console.log(result); 

                    for(let item of result){

                        let sum = parseInt(item.appointment_time) ;
                        let finished = parseInt(item.appointment_time_finished) ;

                        while  (sum < finished) {
                            text_sum = sum.toString();
                            document.querySelector('#option_time_' + text_sum).disabled = true ;
                            document.querySelector('#option_time_' + text_sum).innerHTML = text_sum+":00 (ไม่ว่าง)";
                            sum = sum + 1 ;
                        }
                        document.querySelector('#option_time_' + finished.toString()).disabled = true ;
                        document.querySelector('#option_time_' + finished.toString()).innerHTML = finished.toString()+":00 (ไม่ว่าง)";
                    }

            });
    }

</script>