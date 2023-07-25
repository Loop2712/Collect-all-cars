<div class="form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
    <label for="name_officer" class="control-label">{{ 'ชื่อเจ้าหน้าที่' }}</label>
    <input class="form-control" name="name_officer" type="text" id="name_officer" value="{{ isset($data_1669_operating_officer->name) ? $data_1669_operating_officer->name : ''}}" >
    {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($data_1669_operating_officer->lat) ? $data_1669_operating_officer->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($data_1669_operating_officer->lng) ? $data_1669_operating_officer->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('operating_unit_id') ? 'has-error' : ''}}">
    <label for="operating_unit_id" class="control-label">{{ 'Operating Unit Id' }}</label>
    <input class="form-control" name="operating_unit_id" type="text" id="operating_unit_id" value="{{ isset($data_1669_operating_officer->operating_unit_id) ? $data_1669_operating_officer->operating_unit_id : $operating_unit_id }}" readonly>
    {!! $errors->first('operating_unit_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($data_1669_operating_officer->user_id) ? $data_1669_operating_officer->user_id : Auth::user()->id }}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
    <label for="area" class="control-label">{{ 'พื้นที่' }}</label>
    <input class="form-control" name="name_area" type="text" id="area" value="{{ $name_area }}" readonly>
</div>

<div class="notranslate form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'ระดับ' }}</label>
    <select name="level" class="form-control" >
        <option value="" selected > - กรุณาเลือกระดับ - </option>    
        <option value="FR">FR</option>                                 
        <option value="BLS">BLS</option>                                 
        <option value="ILS">ILS</option>                                 
        <option value="ALS">ALS</option>                                 

    </select>
</div>
<div class="notranslate form-group {{ $errors->has('vehicle_type') ? 'has-error' : ''}}">
    <label for="vehicle_type" class="control-label">{{ 'ยานพาหนะ' }}</label>
    <select name="vehicle_type"  class="form-control" >
        <option value="" selected > - กรุณาเลือกยานพาหนะ - </option>   
        <option value="รถ">รถ</option>        
        <option value="อากาศยาน">อากาศยาน</option>   
        <option value="เรือ ป.1">เรือ ป.1</option>     
        <option value="เรือ ป.2">เรือ ป.2</option>                                 
        <option value="เรือ ป.3">เรือ ป.3</option>                                 
        <option value="เรือประเภทอื่นๆ">เรือประเภทอื่นๆ</option>      
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<!-- Button trigger modal -->
<span id="btn_open_modal_warning" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_warning">
  btn_open_modal_warning
</span>

<!-- Modal -->
<div class="modal fade" id="modal_warning" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_btn_open_modal_warning" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title notranslate" id="Label_btn_open_modal_warning">
                    <i class="fa-solid fa-triangle-exclamation fa-bounce" style="color: #ff8e24;"></i> คำเตือน
                </h5>
                <span type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body notranslate" id="modal_warning_content">
                <!-- CONTENT -->
            </div>
            <hr>
            <div>
                <center>
                    <a style="width:35%;" href="{{ url('/officers/switch_standby_login?openExternalBrowser=1') }}" class="btn btn-secondary" >ปิด</a>
                    <span style="width:35%;" type="button" class="btn btn-primary" data-dismiss="modal">ดำเนินการต่อ</span>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        check_old_officer();

    });

    function check_old_officer(){

        let user_id = "{{ $user_id }}";

        fetch("{{ url('/') }}/api/check_old_officer"+ "/" + user_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(result['data'] != 'ไม่มีข้อมูล'){

                    let html = `
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ url('/img/stickerline/Flex/9.png') }}" style="width:50%;">
                                    <div class="mt-3">
                                        <h3>คุณ `+result['data']['name_officer']+`</h3>
                                        <h5 class="text-danger">คุณมีหน่วยปฏิบัติการเดิมอยู่แล้ว</h5>
                                        <p class="text-secondary mb-1" style="font-size:20px;">
                                            เมื่อคุณกด <b>"ดำเนินการต่อ"</b> 
                                            <br>
                                            ระบบจะทำการอัพเดทหน่วยปฏิบัติการของคุณ
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h5>
                                    <center>
                                        ข้อมูลหน่วยปฏิบัติการเดิม
                                    </center>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-sharp fa-regular fa-input-text"></i>
                                            ชื่อหน่วยปฏิบัติการ
                                        </h6>
                                        <span class="text-secondary">`+result['data']['name_unit']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-regular fa-map-location-dot"></i>
                                            พื้นที่หน่วยปฏิบัติการ
                                        </h6>
                                        <span class="text-secondary">`+result['data']['area_unit']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-ranking-star"></i>
                                            ระดับปฏิบัติการ
                                        </h6>
                                        <span class="text-secondary">`+result['data']['level']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-car"></i>
                                            ยานพาหนะ
                                        </h6>
                                        <span class="text-secondary">`+result['data']['vehicle_type']+`</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        `;

                        document.querySelector('#modal_warning_content').insertAdjacentHTML('afterbegin', html); // แทรกบนสุด

                        document.querySelector('#btn_open_modal_warning').click();
                }

            });

    }

</script>
