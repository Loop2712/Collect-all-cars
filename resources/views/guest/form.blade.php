<div class="container">
    <div class="row">
        <!-- ข้อมูลรถที่ต้องการติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถที่ต้องการติดต่อ / Vehicle information to contact'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'ข้อความ / Message' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('massengbox') ? 'has-error' : ''}}">
                        <select name="massengbox" class="form-control"  id="massengbox" required onchange="if(this.value=='6'){ 
                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                document.querySelector('#masseng').focus();
                            }else{ 
                                document.querySelector('#masseng_label').classList.add('d-none'),
                                document.querySelector('#masseng_input').classList.add('d-none')
                            }
                            if (this.value=='4') {
                                document.querySelector('#photo_label').classList.remove('d-none'),
                                document.querySelector('#photo_input').classList.remove('d-none'),
                                document.querySelector('#photo').focus();
                            }else{ 
                                document.querySelector('#photo_label').classList.add('d-none'),
                                document.querySelector('#photo_input').classList.add('d-none')
                            }">
                             <option value="" selected >
                                 - เลือกข้อความ / Select text - 
                             </option>  
                        @foreach (json_decode('{"1":"กรุณาเลื่อนรถด้วยค่ะ","2":"รถคุณเปิดไฟค้างไว้ค่ะ","3":"มีเด็กอยู่ในรถค่ะ","4":"รถคุณเกิดอุบัติเหตุค่ะ","5":"แจ้งปัญหาการขับขี่","6":"อื่นๆ"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"  {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>
                    <br>
                </div>
                
                <div class="col-12 col-md-2">
                    <!-- ข้อความอื่นๆ -->
                    <label id="masseng_label" for="masseng" class="d-none control-label">{{ 'ข้อความอื่นๆ / Other messages' }}</label>
                    <!-- รูปภาพ -->
                    <label id="photo_label" for="photo" class="d-none control-label">{{ 'รูปภาพ / Photo' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <!-- ข้อความอื่นๆ -->
                    <div id="masseng_input" class="d-none form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
                        <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}">
                        {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
                    </div>
                    <!-- รูปภาพ -->
                    <div id="photo_input" class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($guest->photo) ? $guest->photo : ''}}" accept="image/*" multiple="multiple">
                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>


                <div class="col-12 col-md-2">
                    <label for="registration" class="control-label">{{ 'ทะเบียนรถ / Car number' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
                        <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required onchange="check_registration()">
                        {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="county" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('county') ? 'has-error' : ''}}">
                        <select name="county" id="county" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกจังหวัด / Select province - </option> 
                                <!-- @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach    -->                                  
                        </select>
                        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="d-none form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                <label for="brand" class="control-label">{{ 'brand' }}</label>
                <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($guest->brand) ? $guest->brand : ''}}" >
                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลผู้ติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ท่านต้องการที่จะแสดงเบอร์ของท่านหรือไม่'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <input type="radio" name="show_phone" onclick="document.querySelector('#name').classList.remove('d-none'),
            document.querySelector('#name_input').classList.remove('d-none'),
            document.querySelector('#phone').classList.remove('d-none'),
            document.querySelector('#phone_input').classList.remove('d-none')">
            &nbsp;&nbsp;&nbsp;แสดง / Show&nbsp;&nbsp;&nbsp;
            <input type="radio" name="show_phone" onclick="document.querySelector('#name').classList.add('d-none'),
            document.querySelector('#name_input').classList.add('d-none'),
            document.querySelector('#phone').classList.add('d-none'),
            document.querySelector('#phone_input').classList.add('d-none')">&nbsp;&nbsp;&nbsp;ไม่แสดง / Not showing
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="phone" id="phone" class="d-none control-label">{{ 'เบอร์โทร / Phone number' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="phone" type="tel" id="phone_input" value="{{ isset($guest->phone) ? $guest->phone : ''}}" placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}">
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="d-none col-12 col-md-2">
                    <label for="name" id="name" class="d-none control-label">{{ 'ชื่อ / Name' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="name" type="hidden" id="name_input" value="{{ isset($guest->name) ? $guest->name : Auth::user()->name}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : Auth::user()->provider_id}}" readonly>
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
    </div>
</div>

<div class="form-group">
    <input class="d-none btn btn-primary" id="submit_form" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START"); 
    });
    function check_registration(){
        let registration = document.querySelector("#registration");
        //PARAMETERS
        fetch("{{ url('/') }}/api/check_registration/"+registration.value)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
            for(let item of result){
                var registration_car = item.registration_number;
                console.log(registration_car);
            }

            if (registration_car == null ) {
                console.log("null");
                document.querySelector('#submit_form').classList.add('d-none');
                alert("รถหมายเลขทะเบียนนี้ไม่มีในระบบ");
                let registration_reset = document.querySelector("#registration");
                    registration_reset.value = "";
                document.querySelector('#registration').focus();
            }else{ 
                console.log("Yess");
                document.querySelector('#submit_form').classList.remove('d-none');
                document.querySelector('#county').focus();
            }

                check_province();
            });
            return registration.value;
    }

    function check_province(){
        let registration = document.querySelector("#registration");
        //PARAMETERS
        fetch("{{ url('/') }}/api/check_registration/"+registration.value+"/province")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let county = document.querySelector("#county");
                    county.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    county.add(option);                
                }

            });
    }
</script>