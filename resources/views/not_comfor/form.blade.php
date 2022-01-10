
 <div class="modal-body d-block d-md-none">
    <center>
        <div style="position: relative; z-index: 5">
            <div style="padding-top: 8px;">
                <span style="font-size: 20px;" class="text-dark"><b style=" margin: top -10px;0px;">{{ $registration_number }}</b> </span>
                <p style="font-size: 14px;" class="text-dark">{{ $province }}</p>
            </div>
        </div>
        <img style="position: absolute;margin: -90px -140px;z-index: 2;" width="280" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
    </center>
</div>

<div class="modal-body d-none d-lg-block">
        <div style="position: relative; z-index: 5">
            <div style="padding-top: 8px;">
                <span style="font-size: 20px;" class="text-dark"><b style=" margin:0px 120px;">{{ $registration_number }}</b> </span>
                <p style="font-size: 14px; margin:0px 120px;" class="text-dark">{{ $province }}</p>
            </div>
        </div>
        <img style="position: absolute;margin: -75px 0px;z-index: 2;" width="280" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
    <br style="d-none d-lg-block">
</div>

<input class="form-control" name="registration_number" type="hidden" id="registration_number" value="{{ isset($not_comfor->registration_number) ? $not_comfor->registration_number : $registration_number}}" readonly>
    {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}

<input class="form-control" name="province" type="hidden" id="province" value="{{ isset($not_comfor->province) ? $not_comfor->province : $province}}" readonly>
    {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
<span style="font-size: 22px;" class="control-label">{{ 'เหตุผลของท่าน'}}</span>
<br>
<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
    <!-- <label for="provider_id" class="control-label">{{ 'Provider Id' }}</label> -->
    <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($not_comfor->provider_id) ? $not_comfor->provider_id : Auth::user()->provider_id}}" readonly>
    {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reply_provider_id') ? 'has-error' : ''}}">
    <!-- <label for="reply_provider_id" class="control-label">{{ 'Reply Provider Id' }}</label> -->
    <input class="form-control" name="reply_provider_id" type="hidden" id="reply_provider_id" value="{{ isset($not_comfor->reply_provider_id) ? $not_comfor->reply_provider_id : ''}}" readonly>
    {!! $errors->first('reply_provider_id', '<p class="help-block">:message</p>') !!}
</div>

<!-- (<span class="text-secondary" id="str_title">0</span>/22)</span> -->
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'เหตุผล' }}</label><span style="color: #FF0033;"> *</span>
    <!-- <input class="form-control" name="content" type="text" id="content" value="{{ isset($not_comfor->content) ? $not_comfor->content : ''}}" required onkeydown="str_title();"> -->
    <select name="content" class="form-control"  id="content" required >
        <option value="" selected >- เลือกเหตุผล - </option>  
        @foreach (json_decode('{
            "ฉันอยู่นอกพื้นที่":"ฉันอยู่นอกพื้นที่",
            "ฉันกำลังประชุมอยู่":"ฉันกำลังประชุมอยู่",
            "ฉันยุ่งมากๆ":"ฉันยุ่งมากๆ"}',
             true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}"  {{ (isset($not_comfor->content) && $not_comfor->content == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('want_phone') ? 'has-error' : ''}}">
    <label for="want_phone" class="control-label">{{ 'เบอร์โทรศัพท์ของท่าน' }}</label><span style="color: #FF0033;"> *</span>
    <br>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        <!-- <label for="phone" class="control-label">{{ 'เบอร์ของคุณ / Your phone number' }}</label> -->
        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($not_comfor->phone) ? $not_comfor->phone : Auth::user()->phone }}" required>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>

    <!-- <input class="want_phone" name="want_phone" type="radio" id="want_phone" value="{{ isset($not_comfor->want_phone) ? $not_comfor->want_phone : 'Yes'}}" > 
        &nbsp;&nbsp;&nbsp;แสดง / Show  -->
    <input  name="want_phone" type="hidden" id="want_phone" value="{{ isset($not_comfor->want_phone) ? $not_comfor->want_phone : 'Yes'}}" >
    {!! $errors->first('want_phone', '<p class="help-block">:message</p>') !!}

    <input type="checkbox" name="checkbox" onchange="if(this.checked){
        check(); 
    }else{
        not_check();
    }">&nbsp;&nbsp;&nbsp;ไม่แสดง
</div>


<div class="form-group">
    <input id="submit" class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>

<script>
    function check(){
        var phone = document.querySelector('#phone');
            phone.classList.add('d-none');
            phone.removeAttribute("required");

        var want_phone = document.querySelector('#want_phone');
            want_phone.value = "No";

    }

    function not_check(){
        var phone = document.querySelector('#phone');
            phone.classList.remove('d-none');

        var att = document.createAttribute('required'); 
            phone.setAttributeNode(att);

        var want_phone = document.querySelector('#want_phone');
            want_phone.value = "Yes";
    }

    function str_title() {
    var content = document.querySelector("#content");
    var str_title = document.querySelector("#str_title");
        console.log(content.value);

    let str = content.value
        console.log(str.length);

        str_title.innerHTML = (str.length + 1) ;

        if (str.length >= 22 ) {
            // alert("ขออภัย คุณใช้ตัวอักษรเกินกำหนด");
            document.querySelector('#str_title').classList.remove('text-secondary');
            document.querySelector('#str_title').classList.add('text-danger');
            document.querySelector('#submit').classList.add('d-none');
            document.querySelector('#content').focus();
        }else{
            document.querySelector('#str_title').classList.add('text-secondary');
            document.querySelector('#str_title').classList.remove('text-danger');
            document.querySelector('#submit').classList.remove('d-none');
        }

}
</script>