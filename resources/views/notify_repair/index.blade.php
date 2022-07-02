@extends('layouts.partners.theme_partner_new')

@section('content')
@if($user->role == "admin-condo")
<style>
/* .wrapper {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #eee
} */

.checkmark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke-miterlimit: 10;
    stroke: #7ac142;
    fill: none;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
}

.checkmark {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #fff;
    stroke-miterlimit: 10;
    margin-left: 20px;
    margin-top: 20px;
    box-shadow: inset 0px 0px 0px #7ac142;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
}

.checkmark__check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0
    }
}

@keyframes scale {

    0%,
    100% {
        transform: none
    }

    50% {
        transform: scale3d(1.1, 1.1, 1)
    }
}

@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 30px #7ac142
    }
}

</style>

<div class="row" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9">
                                <h4 class="font-weight-bold mb-0">
                                    <b>รายการแจ้งซ่อมบำรุง</b>
                                </h4>
                            </div>
                            <div class="col-3">
                                <a style="float: right;" href="{{ url('/notify_repair/create?condo_id=' . $condo_id) }}" class="btn btn-success btn-sm" title="Add New Parcel">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-12">
                                @foreach($all_building as $item)
                                    @if($building == $item->building)
                                        <a href="{{ url('/notify_repair') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-info text-white" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @else
                                        <a href="{{ url('/notify_repair') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-outline-info" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @endif
                                @endforeach
                                @if($building == "ส่วนกลาง")
                                    <a href="{{ url('/notify_repair') }}?building=ส่วนกลาง" type="button" class="btn btn-sm btn-secondary">
                                    &nbsp;&nbsp;ส่วนกลาง&nbsp;&nbsp;
                                @else
                                    <a href="{{ url('/notify_repair') }}?building=ส่วนกลาง" type="button" class="btn btn-sm btn-outline-secondary">
                                    &nbsp;&nbsp;ส่วนกลาง&nbsp;&nbsp;
                                @endif
                                </a>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-12">
                                @if(!empty($naem_group_line))
                                    <h4>กลุ่มไลน์ : <span class="text-success">{{ $naem_group_line->groupName }}</span></h4>
                                @else
                                    <span class="btn btn-outline-success btn-sm" data-toggle="collapse" data-target="#div_select_line_group" aria-expanded="false" aria-controls="div_select_line_group">
                                        <i class="fab fa-line text-outline-success"></i> เพิ่มกลุ่มไลน์ช่างซ่อมบำรุง
                                    </span>
                                @endif
                            </div>
                            <br><br>
                            <div id="div_select_line_group" class="collapse col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <select id="line_group" name="line_group" class="btn btn-sm text-white" style="background-color: #27CF00;width: 100%;" onchange="document.querySelector('#btn_send_pass_area').classList.remove('d-none');">
                                            <option value="" selected>เลือกกลุ่มไลน์</option>
                                            @foreach($all_group_line as $item_gl)
                                                <option value="{{ $item_gl->groupName }}" 
                                                {{ request('groupName') == $item_gl->groupName ? 'selected' : ''   }} >
                                                {{ $item_gl->groupName }} 
                                                </option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div id="btn_send_pass_area" class="d-none text-center">
                                            <a class="btn btn-sm text-white" style="background-color: #FA9E33;width: 100%;" onclick="send_pass_condo();">
                                                ส่งรหัสยืนยัน
                                            </a>
                                        </div>
                                        <div id="spinner_send_pass" class="d-none text-center">
                                            <div style="margin-top: 9px;" class="spinner-border text-success"></div> &nbsp;&nbsp;กำลังส่งรหัส..
                                        </div>
                                        <div id="text_send_pass_done" class="d-none text-center">
                                            <div class="row">
                                                <div class="col-3">
                                                    <svg style="margin-top: 5px;" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                    </svg>
                                                </div>
                                                <div class="col-9">
                                                    <p style="margin-top: 8px;margin-left: 5px;">ส่งรหัสแล้ว</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="div_cf_pass_condo" class="col-12 d-none">
                                        <label for="cf_pass_condo" class="control-label">{{ 'กรุณายืนยันรหัส' }}</label>
                                        <input class="form-control" type="text" name="cf_pass_condo" id="cf_pass_condo" oninput="check_pass_condo();">
                                    </div>
                                    <div id="div_btn_submit_add_area" class="col-12 d-none">
                                        <a style="margin-top: 9px;" id="btn_submit_add_area" class="btn btn-primary float-right">
                                            ยืนยันการเพิ่มไลน์กลุ่ม
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-12">
                        <h5>รายการแจ้งซ่อมอาคาร : <b style="font-size:25px;" class="text-danger" id="span_building">{{ $building }}</b></h5>
                    </div>
                    <br><br>
                    <hr>
                    @foreach($notify_repair as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-10" style="font-size:15px;">
                                <div class="row">
                                    <div class="col-3">
                                        <span style="line-height: 25px;">
                                           {{ $item->building }}
                                        </span>
                                        @if(!empty($item->user_condo->room_number))
                                            <span style="line-height: 25px;">
                                               {{ $item->user_condo->room_number }}
                                            </span>
                                        @endif
                                   </div> 
                                   <div class="col-3">
                                        <span style="line-height: 25px;">
                                           {{ $item->title }}
                                        </span>
                                        <br>
                                        <span style="line-height: 25px;">
                                           {{ $item->content }}
                                        </span>
                                   </div> 
                                   <div class="col-3">
                                        <span style="line-height: 25px;">
                                           {{ $item->status }}
                                        </span>
                                        <br>
                                        <span style="line-height: 25px;">
                                           เวลา
                                        </span>
                                   </div> 
                                   <div class="col-3">
                                        <span style="line-height: 25px;">
                                           วันเวลานัดหมาย
                                        </span>
                                        <br>
                                        <span style="line-height: 25px;">
                                           เวลา
                                        </span>
                                   </div> 
                                </div>
                            </div>
                            <div class="col-2">
                                <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                    <img style="width:50%;margin-top: 8px;" src="{{ url('storage')}}/{{ $item->photo }}">
                                </a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br><br>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<input class="form-control d-none" name="group_line_id" type="group_line_id" id="group_line_id" value="" >

<script>
    
    var num_pass_condo ;

    function send_pass_condo(){
        document.querySelector('#btn_send_pass_area').classList.add('d-none');
        document.querySelector('#spinner_send_pass').classList.remove('d-none');
        
        let line_group = document.querySelector('#line_group').value;

        num_pass_condo = Math.floor(Math.random() * 10000);
        num_pass_condo = num_pass_condo.toString();

        fetch("{{ url('/') }}/api/send_pass_condo/"+line_group+'/'+num_pass_condo)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // console.log(num_pass_condo);
                
                let group_line_id = document.querySelector('#group_line_id');
                    group_line_id.value = result[0]['id'];
                document.querySelector('#spinner_send_pass').classList.add('d-none');
                document.querySelector('#text_send_pass_done').classList.remove('d-none');
                document.querySelector('#div_cf_pass_condo').classList.remove('d-none');

                let btn_submit_add_area = document.querySelector('#btn_submit_add_area');
                let onclick = document.createAttribute("onclick");
                    onclick.value =  "update_data_groupline(" + result[0]['id'] +")" ;
                btn_submit_add_area.setAttributeNode(onclick);

        });
    }

    function check_pass_condo(){
        let cf_pass_condo = document.querySelector('#cf_pass_condo').value ;
            cf_pass_condo = cf_pass_condo.toString();

        if (cf_pass_condo === num_pass_condo) {
            document.querySelector('#div_btn_submit_add_area').classList.remove('d-none');
        }else{
            document.querySelector('#div_btn_submit_add_area').classList.add('d-none');
        }
    }

    function update_data_groupline(id_groupline)
    {
        // console.log(id_groupline);
        let system = "notify_repair" ;

        fetch("{{ url('/') }}/api/update_data_groupline/" + id_groupline + "/" + system)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                window.location.reload(true);
        });
    }

</script>

@endif
@endsection
