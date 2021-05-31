<div id="div_organization" class="d-none">
    <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลองค์กร' }}</span><br>
    <span style="font-size: 18px;" class="control-label">{{ 'Company info.' }}</span><span style="color: #FF0033;"> *<br><br></span>
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
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value="{{ $juristicPhone }}"  placeholder="กรุณาใส่เบอร์ติดต่อ" readonly>
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
                        <input class="form-control" name="juristicID" type="text" id="juristicID" value="{{ isset($register_car->juristicID) ? $register_car->juristicID :  '' }}"  pattern="[0-9]{13}" onchange="juristic();" placeholder="เลขทะเบียนนิติบุคคล">
                        {!! $errors->first('juristicID', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('juristicNameTH') ? 'has-error' : ''}}">
                        <input class="form-control" name="juristicNameTH" type="text" id="juristicNameTH" value="{{ isset($not_comfor->juristicNameTH) ? $not_comfor->juristicNameTH : ''}}"  placeholder="ชื่อองค์กร" >
                        {!! $errors->first('juristicNameTH', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('organization_mail') ? 'has-error' : ''}}">
                        <input class="form-control" name="organization_mail" type="email" id="organization_mail" value="{{ isset($register_car->organization_mail) ? $register_car->organization_mail :  '' }}"   placeholder="อีเมล">
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
                        <input class="form-control" name="location_P_2" type="text" id="location_P_2" value="{{ isset($register_car->location_P_2) ? $register_car->location_P_2 :  '' }}"  placeholder="จังหวัด" onchange="change_location_2();">
                        {!! $errors->first('location_P_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('location_A_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="location_A_2" type="text" id="location_A_2" value="{{ isset($register_car->location_A_2) ? $register_car->location_A_2 :  '' }}"  placeholder="อำเภอ">
                        {!! $errors->first('location_A_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone_2" type="phone_2" id="phone_2" value="{{ $juristicPhone }}"  placeholder="กรุณาใส่เบอร์ติดต่อ" >
                        {!! $errors->first('phone_2', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(empty(Auth::user()->branch))
        <input type="checkbox" name="checkbox" onchange="if(this.checked){
                    document.querySelector('#show_branch_empty').classList.remove('d-none');
                    show_location_P_branch();
                }else{
                    document.querySelector('#show_branch_empty').classList.add('d-none'); 
                    select_location();
                    clear_input();
                }">&nbsp;&nbsp;&nbsp;ไม่ใช่สำนักงานใหญ่ / Not the headquarters
        <br><br>

        <div id="show_branch_empty" class="row d-none">
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
                    <input class="form-control" name="branch" type="text" id="branch" value="{{ isset($register_car->branch) ? $register_car->branch :  '' }}"  placeholder="สาขา">
                    {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch_province') ? 'has-error' : ''}}">
                    <select name="branch_province" id="branch_province" class="form-control"  onchange="show_location_A_branch();change_location_branch();">
                            <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                    </select>
                    {!! $errors->first('branch_province', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch_district') ? 'has-error' : ''}}">
                    <select name="branch_district" id="branch_district" class="form-control" >
                            <option value="" selected > - กรุณาเลือกอำเภอ / Please select district - </option> 
                                                               
                    </select>
                    {!! $errors->first('branch_district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    @endif

    @if(!empty(Auth::user()->branch))

        <input id="check_branch_not_empty" type="checkbox" name="checkbox" onchange="if(this.checked){
                    document.querySelector('#show_branch_notempty').classList.remove('d-none');
                    change_location_branch();
                }else{
                    document.querySelector('#show_branch_notempty').classList.add('d-none'); 
                    select_location();
                    clear_input();
                }">&nbsp;&nbsp;&nbsp;ไม่ใช่สำนักงานใหญ่ / Not the headquarters
        <br><br>

        <div id="show_branch_notempty" class="row d-none">
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
                    <input class="form-control" name="branch" type="text" id="branch" value="{{ isset($register_car->branch) ? $register_car->branch :  Auth::user()->branch }}"  placeholder="สาขา" >
                    {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch_province') ? 'has-error' : ''}}">
                    <input class="form-control" name="branch_province" type="text" id="branch_province" value="{{ isset($register_car->branch_province) ? $register_car->branch_province :  Auth::user()->branch_province }}"  placeholder="จังหวัด" >
                    {!! $errors->first('branch_province', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('branch_district') ? 'has-error' : ''}}">
                    <input class="form-control" name="branch_district" type="text" id="branch_district" value="{{ isset($register_car->branch_district) ? $register_car->branch_district :  Auth::user()->branch_district }}"  placeholder="อำเภอ" >
                    {!! $errors->first('branch_district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    @endif

    <!-- <div class="row">
        <div class="col-12 col-md-4 d-none d-lg-block">
            <label  class="control-label">{{ 'เบอร์โทรศัพท์ผู้ประสานงาน / Coordinator phone number.' }}</label><span style="color: #FF0033;"> *</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                <input class="form-control" name="phone" type="phone" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone :  Auth::user()->phone }}" required placeholder="กรุณาใส่เบอร์ของคุณ" pattern="[0-9]{10}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div> -->
<hr>
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

                let location = document.querySelector("#location");
                    location.value = result['addressDetail']['province'];
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


    // สาขา
    function show_location_P_branch(){
        fetch("{{ url('/') }}/api/location/show_location_P")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let branch_province = document.querySelector("#branch_province");
                    // location_P.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    branch_province.add(option);
                }
                
            });
            
            return branch_province.value;
    }

    function show_location_A_branch(){
        let branch_province = document.querySelector("#branch_province");
        fetch("{{ url('/') }}/api/location/"+branch_province.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let branch_district = document.querySelector("#branch_district");
                    branch_district.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    branch_district.add(option);
                }
            });
            return branch_district.value;
    }

    function change_location_2(){
        let location = document.querySelector("#location");
        let location_P_2 = document.querySelector("#location_P_2");

        location.value = location_P_2.value;
        
    }

    function change_location_branch(){
        let location = document.querySelector("#location");
        let branch_province = document.querySelector("#branch_province");

        location.value = branch_province.value;
        
    }

    function clear_input(){
        let branch = document.querySelector("#branch");
        let branch_province = document.querySelector("#branch_province");
        let branch_district = document.querySelector("#branch_district");

        branch.value = "";
        branch_province.value = "";
        branch_district.value = "";
        
    }

</script>