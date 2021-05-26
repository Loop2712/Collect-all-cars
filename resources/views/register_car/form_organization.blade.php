<div id="div_organization" class="d-none">
    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลองค์กร / Organization information' }}</span><span style="color: #FF0033;"> *<br><br></span>
    @if(!empty($juristicID))
        <div id="not_empty_juristicID">
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เลขทะเบียนนิติบุคคล / Juristic ID   .' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'ชื่อองค์กร / Organization name.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อีเมล / E-Mail' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicID') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($register_car->juristicID) ? $register_car->juristicID :  $juristicID }}"  pattern="[0-9]{13}" readonly>
                        {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($not_comfor->juristicNameTH) ? $not_comfor->juristicNameTH : $juristicNameTH}}"  readonly>
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('organization_mail') ? 'has-error' : ''}}">
                        <input class="form-control" name="organization_mail" type="email" id="organization_mail" value="{{ isset($register_car->organization_mail) ? $register_car->organization_mail :  $juristicMail }}"  readonly>
                        {!! $errors->first('organization_mail', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'จังหวัด / Province.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อำเภอ / District.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เบอร์โทรศัพท์ / Phone number' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('location_P_2') ? 'has-error' : ''}}">
                         <input class="form-control" name="location_P_2" type="text" id="location_P_2" value="{{ isset($register_car->location_P_2) ? $register_car->location_P_2 :  $juristicProvince }}"  onchange="change_location_2();" readonly>
                        {!! $errors->first('location_P_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('location_A_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="location_A_2" type="text" id="location_A_2" value="{{ isset($register_car->location_A_2) ? $register_car->location_A_2 :  $juristicDistrict }}" readonly>
                        {!! $errors->first('location_A_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value="{{ isset($register_car->phone) ? $register_car->phone :  $juristicPhone }}"  placeholder="กรุณาใส่เบอร์ติดต่อ" readonly>
                        {!! $errors->first('phone_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(empty($juristicID))
        <div id="empty_juristicID">
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เลขทะเบียนนิติบุคคล / Juristic ID   .' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'ชื่อองค์กร / Organization name.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อีเมล / E-Mail' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicID') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($register_car->juristicID) ? $register_car->juristicID :  '' }}"  pattern="[0-9]{13}" onchange="juristic();">
                        {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($not_comfor->juristicNameTH) ? $not_comfor->juristicNameTH : ''}}"  >
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('organization_mail') ? 'has-error' : ''}}">
                        <input class="form-control" name="organization_mail" type="email" id="organization_mail" value="{{ isset($register_car->organization_mail) ? $register_car->organization_mail :  '' }}"  >
                        {!! $errors->first('organization_mail', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'จังหวัด / Province.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'อำเภอ / District.' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4 d-none d-lg-block">
                    <label  class="control-label">{{ 'เบอร์โทรศัพท์ / Phone number' }}</label><span style="color: #FF0033;"> *</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('location_P_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="location_P_2" type="text" id="location_P_2" value="{{ isset($register_car->location_P_2) ? $register_car->location_P_2 :  '' }}" >
                        {!! $errors->first('location_P_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('location_A_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="location_A_2" type="text" id="location_A_2" value="{{ isset($register_car->location_A_2) ? $register_car->location_A_2 :  '' }}">
                        {!! $errors->first('location_A_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value="{{ isset($register_car->phone) ? $register_car->phone :  $juristicPhone }}"  placeholder="กรุณาใส่เบอร์ติดต่อ" >
                        {!! $errors->first('phone_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<script>
    
    function juristic(){
        //PARAMETERS
        let juristicID = document.querySelector("#juristicID");
        let juristicNameTH = document.querySelector("#juristicNameTH");
        let location_P_2 = document.querySelector("#location_P_2");
        let location_A_2 = document.querySelector("#location_A_2");

        fetch("https://dataapi.moc.go.th/juristic?juristic_id="+juristicID.value)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                juristicNameTH.value = result['juristicNameTH'];
                location_P_2.value = result['addressDetail']['province'];
                location_A_2.value = result['addressDetail']['district'];
                //UPDATE SELECT OPTION
                fetch("{{ url('/') }}/api/juristic/"+result)
            });

    }

    // องค์กร

    function show_location_P_2(){
        fetch("{{ url('/') }}/api/location/show_location_P")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_P_2 = document.querySelector("#location_P_2");
                    // location_P.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    location_P_2.add(option);
                }
                
            });
            
            return location_P_2.value;
    }

    function show_location_A_2(){
        let location_P_2 = document.querySelector("#location_P_2");
        fetch("{{ url('/') }}/api/location/"+location_P_2.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A_2 = document.querySelector("#location_A_2");
                    location_A_2.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A_2.add(option);
                }
            });
            return location_A_2.value;
    }

</script>