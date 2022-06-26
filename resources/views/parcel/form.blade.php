
<div class="row">
    <div class="col-12">
        เจ้าหน้าที่ : <b class="text-dark">{{ $user->name }}</b>
    </div>
    <br><br>
    @foreach($all_user_condos as $item)
    <div style="font-size:20px;" class="col-12">
        <input type="checkbox" name="user_condo_id_{{ $item->id }}" id="user_condo_id_{{ $item->id }}" onclick="if(this.checked){
                click_check_box('{{ $item->id }}');
            }else{
                not_click_check_box('{{ $item->id }}');
            }"> 
        อาคาร : <span class="text-danger">{{ $item->building }}</span> ห้อง : <span class="text-danger">{{ $item->room_number }}</span> 

        <div id="div_photo_user_condo_id_{{ $item->id }}" class="d-none">
            <label style="font-size:14px;"  class="control-label">{{ 'เพิ่มรูปภาพ' }}</label>
            <input class="form-control d-none" name="photo_user_condo_id_{{ $item->id }}" type="file" id="photo_user_condo_id_{{ $item->id }}" accept="image/*" multiple="multiple">
            {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            <br>
        </div>
    </div>
    <br><br>
    <hr>
    @endforeach

    <input class="form-control d-none" type="text" name="text_arr_user_con_id" id="text_arr_user_con_id" value="0">
</div>

<div class="form-group d-none {{ $errors->has('name_staff') ? 'has-error' : ''}}">
    <label for="name_staff" class="control-label">{{ 'Name Staff' }}</label>
    <input class="form-control" name="name_staff" type="text" id="name_staff" value="{{ $user->name }}" readonly>
    {!! $errors->first('name_staff', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ $user->id }}" readonly>
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('time_in') ? 'has-error' : ''}}">
    <label for="time_in" class="control-label">{{ 'Time In' }}</label>
    <input class="form-control" name="time_in" type="datetime-local" id="time_in" value="{{ date('d/m/Y h:i:sa') }}" >
    {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group d-none {{ $errors->has('time_out') ? 'has-error' : ''}}">
    <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
    <input class="form-control" name="time_out" type="datetime-local" id="time_out" value="{{ isset($parcel->time_out) ? $parcel->time_out : ''}}" >
    {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group d-none {{ $errors->has('condo_id') ? 'has-error' : ''}}">
    <label for="condo_id" class="control-label">{{ 'Condo Id' }}</label>
    <input class="form-control" name="condo_id" type="number" id="condo_id" value="{{ $condo_id }}"readonly >
    {!! $errors->first('condo_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input style="width: 100%;" class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'ยืนยัน' : 'ยืนยัน' }}">
</div>

<script>
    function click_check_box(id){

        document.querySelector('#photo_user_condo_id_' + id).classList.remove('d-none');
        document.querySelector('#div_photo_user_condo_id_' + id).classList.remove('d-none');
        document.querySelector('#photo_user_condo_id_' + id).required = true ;

        let text_arr_user_con_id = document.querySelector('#text_arr_user_con_id');
            // console.log(text_arr_user_con_id.value);

        if (text_arr_user_con_id.value != "null") {
            // console.log("add");
            text_arr_user_con_id.value = text_arr_user_con_id.value + "," + id ;
            // add arr 
        }else{
            // console.log("create");
            text_arr_user_con_id.value = "" ;
            text_arr_user_con_id.value = id ;
            // create arr
        }

    }

    function not_click_check_box(id){
        
        document.querySelector('#photo_user_condo_id_' + id).classList.add('d-none');
        document.querySelector('#div_photo_user_condo_id_' + id).classList.add('d-none');
        document.querySelector('#photo_user_condo_id_' + id).required = false ;

        let text_arr_user_con_id = document.querySelector('#text_arr_user_con_id');
            // console.log(text_arr_user_con_id.value);

        if (text_arr_user_con_id.value != "0") {
            // console.log("add");
            let count_text_arr = text_arr_user_con_id.value.split(",") ;

            // console.log(count_text_arr.length);

            if (count_text_arr.length === 1) {
                text_arr_user_con_id.value = "0" ;
            }else{
                text_arr_user_con_id.value = text_arr_user_con_id.value.replace("," + id , "");
            }
        }

    }
</script>
