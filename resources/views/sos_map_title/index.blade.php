@extends('layouts.partners.theme_partner_new')

@section('content')

<style>
.checkbox {
  display: none;
}

.switch {
  position: relative;
  width: 45px;
  height: 45px;
  background-color: rgb(99, 99, 99);
  border-radius: 50%;
  z-index: 1;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid rgb(126, 126, 126);
  box-shadow: 0px 0px 3px rgb(2, 2, 2) inset;
  margin-top: -8px;
}

.powersign {
  position: relative;
  width: 45%;
  height: 45%;
  border: 4px solid rgb(48, 48, 48);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.powersign::before {
  content: "";
  width: 8px;
  height: 90%;
  background-color: rgb(99, 99, 99);
  position: absolute;
  top: -60%;
  z-index: 2;
}

.powersign::after {
  content: "";
  width: 4px;
  height: 90%;
  background-color: rgb(48, 48, 48);
  position: absolute;
  top: -60%;
  z-index: 3;
}

.checkbox:checked + .switch .powersign {
  border: 4px solid rgb(255, 255, 255);
  box-shadow: 0px 0px 10px rgb(66, 255, 135),
    0px 0px 5px rgb(66, 255, 135) inset;
}

.checkbox:checked + .switch .powersign::after {
  background-color: rgb(255, 255, 255);
  box-shadow: 0px 0px 5px rgb(66, 255, 135);
}

.checkbox:checked + .switch {
  box-shadow: 0px 0px 1px rgb(66, 255, 135) inset,
    0px 0px 2px rgb(66, 255, 135) inset,
    0px 0px 10px rgb(66, 255, 135) inset,
    0px 0px 40px rgb(66, 255, 135),
    0px 0px 100px rgb(66, 255, 135),
    0px 0px 5px rgb(66, 255, 135);
  border: 2px solid rgb(255, 255, 255);
  background-color: rgb(94, 204, 134);
}

.checkbox:checked + .switch .powersign::before {
  background-color: rgb(94, 204, 134);
}


</style>

<!-- <input type="checkbox" id="checkbox_test" class="checkbox">
<label for="checkbox_test" class="switch">
    <div class="powersign"></div>
</label> -->


<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-12">
                <h3 class="mb-0 text-dark">
                    <b>หัวข้อการขอความช่วยเหลือ</b>
                </h3>
            </div>
        </div>

        <hr>

        <div class="row mt-3">
            <div class="col-6">
                <input id="input_new_title_sos" type="text" class="form-control" value="" placeholder="เพิ่มหัวข้อใหม่ที่นี่..">
            </div>
            <div class="col-2 text-end d-grid">
                <button type="button" id="btn_Create_new_title_sos" onclick="Create_new_title_sos();" class="btn btn-info main-shadow main-radius">
                    เพิ่มหัวข้อใหม่
                </button>
            </div>
            <div class="col-4" style="position: relative;">
                <p id="create_now_loading" class="text-success d-none" style="font-size: 23px;position: absolute;top: 5px;">
                    <span class="spinner-border" role="status" aria-hidden="true"></span>
                    &nbsp;กำลังโหลด...
                </p>
            </div>
        </div>

        <div class="form-row mt-4">
            <div class="col-12">
                <div class="row row-cols-1 row-cols-lg-4">
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">รวมทั้งหมด</p>
                                        <h5 class="mb-0 text-white" id="h5_count_all_title">
                                            {{ count($sos_map_title_by_user) + count($sos_map_title) + 3 }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-bars font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $count_all = count($sos_map_title_by_user) + count($sos_map_title) + 3 ;
                        $count_admin = count($sos_map_title) + 3 ;
                        $count_user = count($sos_map_title_by_user) ;

                        // ADMIN
                        $percent_card_admin = ($count_admin / $count_all) * 100 ;
                        $percent_card_admin = number_format($percent_card_admin, 2, '.', '');

                        // USER
                        $percent_card_user = ($count_user / $count_all) * 100 ;
                        $percent_card_user = number_format($percent_card_user, 2, '.', '');

                    @endphp

                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-burning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เพิ่มโดยแอดมิน</p>
                                        <h5 class="mb-0 text-white" id="h5_count_title_by_admin">
                                            {{ count($sos_map_title) + 3 }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-user-tie font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div id="div_percent_card_admin" class="progress-bar bg-white" role="progressbar" style="width: {{ $percent_card_admin  }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เพิ่มโดยผู้ขอความช่วยเหลือ</</p>
                                        <h5 class="mb-0 text-white" id="h5_count_title_by_user">
                                            {{ count($sos_map_title_by_user) }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-users font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: {{ $percent_card_user  }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">เปิดใช้งาน</p>
                                        <h5 class="mb-0 text-white">
                                            <span id="card_count_title_active"></span> / 10
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-check font-30"></i>
                                    </div>
                                </div>
                                <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div id="div_percent_card_active" class="progress-bar bg-white" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row row-cols-1 row-cols-2">
    <div class="col">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5" id="content_title_sos">
                <div class="card-title row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="mb-0 text-primary">
                            <i class="fa-duotone fa-memo-circle-check"></i>&nbsp;&nbsp;หัวข้อที่พร้อมใช้งาน
                        </h3>
                    </div>
                    <div class="col-3">
                        <div class="float-end">
                            แสดงผล <span id="text_count_title_active"></span> / 10
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row" style="margin-top: 25px;">
                    <div class="col-10">
                        <h5>
                            <b>เหตุด่วนเหตุร้าย</b>
                        </h5>
                    </div>
                    <div class="col-2">
                        <div class="float-end">
                            <input type="checkbox" class="checkbox" checked disabled>
                            <label for="" class="switch">
                                <div class="powersign"></div>
                            </label>
                        </div>
                    </div>
                    <center>
                        <hr style="border: 1px solid ;width: 100%;">
                    </center>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-10">
                        <h5>
                            <b>อุบัติเหตุ</b>
                        </h5>
                    </div>
                    <div class="col-2">
                        <div class="float-end">
                            <input type="checkbox" class="checkbox" checked disabled>
                            <label for="" class="switch">
                                <div class="powersign"></div>
                            </label>
                        </div>
                    </div>
                    <center>
                        <hr style="border: 1px solid ;width: 100%;">
                    </center>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-10">
                        <h5>
                            <b>ไฟไหม้</b>
                        </h5>
                    </div>
                    <div class="col-2">
                        <div class="float-end">
                            <input type="checkbox" class="checkbox" checked disabled>
                            <label for="" class="switch">
                                <div class="powersign"></div>
                            </label>
                        </div>
                    </div>
                    <center>
                        <hr style="border: 1px solid ;width: 100%;">
                    </center>
                </div>

                @foreach($sos_map_title as $item)
                    @php
                        if($item->status == 'active'){
                            $status_checked = 'checked';
                        }else{
                            $status_checked = '';
                        }
                    @endphp
                    <div class="row" style="margin-top: 20px;" id="data_title_id_{{ $item->id }}">
                        <div class="col-8">
                            <h5><b>{{ $item->title }}</b></h5>
                        </div>
                        <div class="col-4">
                            <div class="float-end">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="checkbox" id="checkbox_id_{{ $item->id }}" name="input_checkbox" class="checkbox" {{ $status_checked }}>
                                        <label for="checkbox_id_{{ $item->id }}" class="switch" onclick="change_status_title('{{ $item->id }}');">
                                            <div class="powersign"></div>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <span class="btn btn-danger main-shadow main-radius" onclick="delete_title_sos('{{ $item->title }}','{{ $item->id }}');">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <hr style="border: 1px solid ;width: 100%;">
                        </center>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-top border-0 border-4 border-danger">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <h3 class="mb-0 text-danger">
                        <i class="fa-regular fa-circle-ellipsis-vertical"></i>&nbsp;&nbsp;หัวข้ออื่นๆ
                    </h3>

                </div>
                <hr>

                @foreach($sos_map_title_by_user as $item_user)
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-8">
                            <h5>
                                <b>{{ $item_user->title }}</b>
                            </h5>
                        </div>
                        @php
                            if( empty($item_user->name_partner) ){
                                $class_div_count = '' ;
                            }else{
                                $class_div_count = 'd-none' ;
                            }
                        @endphp
                        <div class="col-1">
                            <div class="{{ $class_div_count }}" id="div_count_title_by_user_{{ $item_user->id }}">
                                {{ $item_user->count }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="float-end" id="div_btn_add_title_by_user_{{ $item_user->id }}">

                                @if( empty($item_user->name_partner) )
                                    <span class="btn btn-info main-radius main-shadow" style="width: 90%;" title="เพิ่มหัวข้อนี้" onclick="add_title_by_user('{{ $item_user->id }}');">
                                        <center><i class="fa-sharp fa-solid fa-plus"></i></center>
                                    </span>
                                @else
                                    <span class="btn btn-outline-success main-radius main-shadow" style="width: 90%;" title="เพิ่มหัวข้อนี้เรียบร้อยแล้ว">
                                        <center><i class="fa-duotone fa-check"></i></center>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <center>
                            <hr style="border: 1px solid ;width: 100%;">
                        </center>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>


<script>

    var count_active ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        check_count_title_active();
    });

    // --------------------------------------------------------------
    
    var name_partner = '{{ $name_partner }}';
        // console.log('name_partner => ' + name_partner);

    function Create_new_title_sos(){

        let input_new_title_sos = document.querySelector('#input_new_title_sos').value;
            // console.log(input_new_title_sos);

        if( input_new_title_sos ){

            document.querySelector('#create_now_loading').classList.remove('d-none');

            fetch("{{ url('/') }}/create_new_title_sos?title=" + input_new_title_sos + '&name_partner=' + name_partner)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    if(result.check == 'OK'){
                        let content_title_sos = document.querySelector('#content_title_sos');

                        let html = `
                            <div class="row" style="margin-top: 20px;" id="data_title_id_`+result['data']['id']+`">
                                <div class="col-8">
                                    <h5><b>`+input_new_title_sos+`</b></h5>
                                </div>
                                <div class="col-4">
                                    <div class="float-end">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="checkbox" id="checkbox_id_`+result['data']['id']+`" name="input_checkbox" class="checkbox">
                                                <label for="checkbox_id_`+result['data']['id']+`" class="switch" onclick="change_status_title(`+result['data']['id']+`);">
                                                    <div class="powersign"></div>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <span class="btn btn-danger main-shadow main-radius" onclick="delete_title_sos('`+input_new_title_sos+`','`+result['data']['id']+`');">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <hr style="border: 1px solid ;width: 100%;">
                                </center>
                            </div>
                        `;

                        content_title_sos.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                        document.querySelector('#create_now_loading').classList.add('d-none');
                        document.querySelector('#input_new_title_sos').value = '';

                        let h5_count_all_title = document.querySelector('#h5_count_all_title').innerText;
                        document.querySelector('#h5_count_all_title').innerHTML = parseInt(h5_count_all_title) + 1 ;

                        let h5_count_title_by_admin = document.querySelector('#h5_count_title_by_admin').innerText;
                        document.querySelector('#h5_count_title_by_admin').innerHTML = parseInt(h5_count_title_by_admin) + 1 ;

                        // div_percent_card_admin
                        let count_all = parseInt(h5_count_all_title) + 1 ;
                        let count_admin = parseInt(h5_count_title_by_admin) + 1 ;
                        let percent_card_admin = (count_admin / count_all) * 100 ;
                            percent_card_admin = percent_card_admin.toFixed(2);
                        document.querySelector('#div_percent_card_admin').setAttribute('style' , 'width:' + percent_card_admin + '%;');

                        if(result.by_user == 'Yes'){
                            let html_btn = `
                                <span class="btn btn-outline-success main-radius main-shadow" style="width: 90%;" title="เพิ่มหัวข้อนี้เรียบร้อยแล้ว">
                                    <center><i class="fa-duotone fa-check"></i></center>
                                </span>
                            `;
                            document.querySelector('#div_btn_add_title_by_user_'+result['data']['id']).innerHTML = html_btn; // แทรกล่างสุด
                            document.querySelector('#div_count_title_by_user_'+result['data']['id']).classList.add('d-none');
                        }

                    }else{
                        alert('มีหัวข้อนี้อยู่แล้ว');
                        document.querySelector('#create_now_loading').classList.add('d-none');
                        document.querySelector('#input_new_title_sos').value = '';
                    }
            });

        }else{
            document.querySelector('#input_new_title_sos').focus();
        }

        check_count_title_active();

    }

    function delete_title_sos(text_title , title_id){

        fetch("{{ url('/') }}/delete_title_sos?title=" + text_title + '&name_partner=' + name_partner)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result['delete'] == 'Yes'){
                    document.querySelector('#data_title_id_'+title_id).remove();
                }

                if(result['remove'] == 'Yes'){
                    // console.log(result);
                    document.querySelector('#data_title_id_'+title_id).remove();
                    let html = `
                            <span class="btn btn-info main-radius main-shadow" style="width: 90%;" title="เพิ่มหัวข้อนี้" onclick="add_title_by_user('`+result['data']['id']+`');">
                                <center><i class="fa-sharp fa-solid fa-plus"></i></center>
                            </span>
                        `;
                    document.querySelector('#div_btn_add_title_by_user_'+result['data']['id']).innerHTML = html; // แทรกล่างสุด
                    document.querySelector('#div_count_title_by_user_'+result['data']['id']).classList.remove('d-none');
                }

                let h5_count_all_title = document.querySelector('#h5_count_all_title').innerText;
                document.querySelector('#h5_count_all_title').innerHTML = parseInt(h5_count_all_title) - 1 ;

                let h5_count_title_by_admin = document.querySelector('#h5_count_title_by_admin').innerText;
                document.querySelector('#h5_count_title_by_admin').innerHTML = parseInt(h5_count_title_by_admin) - 1 ;

                // div_percent_card_admin
                let count_all = parseInt(h5_count_all_title) - 1 ;
                let count_admin = parseInt(h5_count_title_by_admin) - 1 ;
                let percent_card_admin = (count_admin / count_all) * 100 ;
                    percent_card_admin = percent_card_admin.toFixed(2);
                document.querySelector('#div_percent_card_admin').setAttribute('style' , 'width:' + percent_card_admin + '%;');

        });

        check_count_title_active();

    }

    function change_status_title(id){

        let check_checkbox ;
        let checkbox = document.querySelector('#checkbox_id_'+id);
        // console.log(checkbox.checked);

        if(checkbox.checked){
            check_checkbox = 'no'; // เดิม เปิด ==> สั่งให้ ปิด
        }else{
            check_checkbox = 'active'; // เดิม ปิด ==> สั่งให้ เปิด
        }

        if(check_checkbox == 'active'){

            if(count_active >= 10){
                alert('จำนวนเกินกว่าที่กำหนด');
                document.querySelector('#checkbox_id_'+id).click();
            }else{
                fetch("{{ url('/') }}/change_status_title?check_checkbox=" + check_checkbox + '&id=' + id)
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);
                });
            }

        }else{

            fetch("{{ url('/') }}/change_status_title?check_checkbox=" + check_checkbox + '&id=' + id)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
            });
        }

        

        check_count_title_active();

    }
    
    function add_title_by_user(id){

        fetch("{{ url('/') }}/add_title_by_user?id=" + id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let html_btn = `
                        <span class="btn btn-outline-success main-radius main-shadow" style="width: 90%;" title="เพิ่มหัวข้อนี้เรียบร้อยแล้ว">
                            <center><i class="fa-duotone fa-check"></i></center>
                        </span>
                    `;
                document.querySelector('#div_btn_add_title_by_user_'+id).innerHTML = html_btn; // แทรกล่างสุด
                document.querySelector('#div_count_title_by_user_'+id).classList.add('d-none');

                // //////////////////////////////////////////////////////////////

                let html_div_new_title = `
                        <div class="row" style="margin-top: 20px;" id="data_title_id_`+result['data']['id']+`">
                            <div class="col-8">
                                <h5><b>`+result['data']['title']+`</b></h5>
                            </div>
                            <div class="col-4">
                                <div class="float-end">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="checkbox" id="checkbox_id_`+result['data']['id']+`" name="input_checkbox" class="checkbox">
                                            <label for="checkbox_id_`+result['data']['id']+`" class="switch" onclick="change_status_title(`+result['data']['id']+`);">
                                                <div class="powersign"></div>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <span class="btn btn-danger main-shadow main-radius" onclick="delete_title_sos('`+result['data']['title']+`','`+result['data']['id']+`');">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <hr style="border: 1px solid ;width: 100%;">
                            </center>
                        </div>
                    `;

                    content_title_sos.insertAdjacentHTML('beforeend', html_div_new_title); // แทรกล่างสุด


        });

        check_count_title_active();

    }

    function check_count_title_active(){

        count_active = 3 ;

        setTimeout(function() {
            
            let input_checkbox = document.querySelectorAll('[name="input_checkbox"]');
            // console.log(input_checkbox);

            input_checkbox.forEach(input_checkbox => {
                if(input_checkbox.checked){
                    count_active = count_active + 1 ;
                }
            })

            document.querySelector('#text_count_title_active').innerHTML = count_active ;
            document.querySelector('#card_count_title_active').innerHTML = count_active ;

            // div_percent_card_active
            let percent_card_active = (count_active / 10) * 100 ;
                percent_card_active = percent_card_active.toFixed(2);
            document.querySelector('#div_percent_card_active').setAttribute('style' , 'width:' + percent_card_active + '%;');

        }, 500);

    }

</script>


@endsection
