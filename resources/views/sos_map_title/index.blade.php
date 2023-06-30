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

        <div class="form-row mt-3">
            <div class="col-12">
                <div class="row row-cols-1 row-cols-lg-4">
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">รวมทั้งหมด</p>
                                        <h5 class="mb-0 text-white">867</h5>
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
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-burning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">หัวข้อแอดมินเพิ่ม</p>
                                        <h5 class="mb-0 text-white">52,945</h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-user-tie font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 72%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">หัวข้อผู้ขอความช่วยเหลือเพิ่ม</p>
                                        <h5 class="mb-0 text-white">52,945</h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-users font-30"></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
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
                                            <span>8</span> / 10
                                        </h5>
                                    </div>
                                    <div class="ms-auto text-white">
                                        <i class="fa-solid fa-check font-30"></i>
                                    </div>
                                </div>
                                <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <input id="input_new_title_sos" type="text" class="form-control" value="" placeholder="เพิ่มหัวข้อใหม่ที่นี่..">
            </div>
            <div class="col-2 text-end d-grid">
                <button type="button" onclick="Create_new_title_sos();" class="btn btn-info main-shadow main-radius">
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
    </div>
</div>

<div class="row row-cols-1 row-cols-2">
    <div class="col">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5" id="content_title_sos">
                <div class="card-title row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="mb-0 text-primary">
                            <i class="fa-solid fa-user-tie"></i>&nbsp;&nbsp;หัวข้อแอดมินเพิ่ม
                        </h3>
                    </div>
                    <div class="col-3">
                        <div class="float-end">
                            แสดงผล <span>3</span> / 10
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
                                        <input type="checkbox" id="checkbox_id_{{ $item->id }}" class="checkbox" {{ $status_checked }}>
                                        <label for="checkbox_id_{{ $item->id }}" class="switch">
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
                        <i class="fa-solid fa-users"></i>&nbsp;&nbsp;หัวข้อผู้ขอความช่วยเหลือเพิ่ม
                    </h3>

                </div>
                <hr>

                <div class="row" style="margin-top: 25px;">
                    <div class="col-9">
                        <h5>
                            <b>รถชน</b>
                        </h5>
                    </div>
                    <div class="col-3">
                        <div class="float-end">
                            <span class="btn btn-info main-radius main-shadow">
                                เพิ่มหัวข้อนี้
                            </span>
                        </div>
                    </div>
                    <center>
                        <hr style="border: 1px solid ;width: 100%;">
                    </center>
                </div>

            </div>
        </div>
    </div>

</div>


<script>
    
    var name_partner = '{{ $name_partner }}';
        // console.log('name_partner => ' + name_partner);

    function Create_new_title_sos(){

        let input_new_title_sos = document.querySelector('#input_new_title_sos').value;
            // console.log(input_new_title_sos);
        document.querySelector('#create_now_loading').classList.remove('d-none');

        fetch("{{ url('/') }}/create_new_title_sos?title=" + input_new_title_sos + '&name_partner=' + name_partner)
            .then(response => response.json())
            .then(result => {
                console.log(result);

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
                                            <input type="checkbox" id="checkbox_id_`+result['data']['id']+`" class="checkbox">
                                            <label for="checkbox_id_`+result['data']['id']+`" class="switch">
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

                }

        });

    }

    function delete_title_sos(text_title , title_id){

        fetch("{{ url('/') }}/delete_title_sos?title=" + text_title + '&name_partner=' + name_partner)
            .then(response => response.text())
            .then(result => {
                console.log(result);

                if(result == 'OK'){
                    document.querySelector('#data_title_id_'+title_id).remove();
                }

        });

    }

</script>


@endsection
