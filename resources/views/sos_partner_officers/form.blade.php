<div class="form-group {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="control-label">{{ 'ชื่อ' }}</label>
    <input required class="form-control" name="full_name" type="text" id="full_name" value="{{ isset($sos_partner_officer->full_name) ? $sos_partner_officer->full_name : ''}}" >
    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'เบอร์' }}</label>
    <input required class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_partner_officer->phone) ? $sos_partner_officer->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    <label for="department" class="control-label">{{ 'แผนก' }}</label>
    <input required class="form-control" name="department" type="text" id="department" value="{{ isset($sos_partner_officer->department) ? $sos_partner_officer->department : ''}}" >
    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'ตำแหน่ง' }}</label>
    <input required class="form-control" name="position" type="text" id="position" value="{{ isset($sos_partner_officer->position) ? $sos_partner_officer->position : ''}}" >
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="d-none form-group {{ $errors->has('sos_partner_id') ? 'has-error' : ''}}">
    <label for="sos_partner_id" class="control-label">{{ 'Sos Partner Id' }}</label>
    <input required class="form-control" name="sos_partner_id" type="text" id="sos_partner_id" value="{{ isset($sos_partner_id) ? $sos_partner_id : $sos_partner_id}}" readonly>
    {!! $errors->first('sos_partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input required class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($user_id) ? $user_id : Auth::user()->id}}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <input class="form-control" name="role" type="text" id="role" value="{{ isset($sos_partner_officer->role) ? $sos_partner_officer->role : ''}}" >
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <input class="form-control" name="active" type="text" id="active" value="{{ isset($sos_partner_officer->active) ? $sos_partner_officer->active : ''}}" >
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_officer') ? 'has-error' : ''}}">
    <label for="status_officer" class="control-label">{{ 'Status Officer' }}</label>
    <input class="form-control" name="status_officer" type="text" id="status_officer" value="{{ isset($sos_partner_officer->status_officer) ? $sos_partner_officer->status_officer : ''}}" >
    {!! $errors->first('status_officer', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary px-5" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'ยืนยัน' }}">
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
                    <a style="width:35%;" href="https://page.line.me/702ytkls?openQrModal=true" class="btn btn-secondary" >ปิด</a>
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

        check_old_sos_partner_officer();

    });

    function check_old_sos_partner_officer(){

        let user_id = "{{ $user_id }}";
        let sos_partner_id = "{{ $sos_partner_id }}";
        fetch("{{ url('/') }}/api/check_old_sos_partner_officer"+ "?sos_partner_id=" + sos_partner_id +"&user_id=" + user_id)
            .then(response => response.json())
            .then(result => {
                // console.log("result check_old_sos_partner_officer");
                // console.log(result);
                // console.log(result['data']);
                if(result['data'] != 'ไม่มีข้อมูล'){

                    let html = `
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ url('/img/stickerline/Flex/9.png') }}" style="width:50%;">
                                    <div class="mt-3">
                                        <h3>คุณ `+result['data']['full_name']+`</h3>
                                        <h5 class="text-danger">คุณมีข้อมูลในองค์กรอยู่แล้ว</h5>
                                        <p class="text-secondary mb-1" style="font-size:20px;">
                                            เมื่อคุณกด <b>"ดำเนินการต่อ"</b>
                                            <br>
                                            ระบบจะทำการอัพเดทข้อมูลในองค์กรของคุณ
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h5>
                                    <center>
                                        ข้อมูลในองค์กรเดิม
                                    </center>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-user"></i>
                                            ชื่อ
                                        </h6>
                                        <span class="text-secondary">`+result['data']['full_name']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-sitemap"></i>
                                            แผนก
                                        </h6>
                                        <span class="text-secondary">`+result['data']['department']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-duotone fa-solid fa-users"></i>
                                            ตำแหน่ง
                                        </h6>
                                        <span class="text-secondary">`+result['data']['position']+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="fa-solid fa-phone"></i>
                                            เบอร์
                                        </h6>
                                        <span class="text-secondary">`+result['data']['phone']+`</span>
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
