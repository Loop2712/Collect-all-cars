@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                            <!-- <a href="{{ url('/nationalitie_group_lines/create') }}" class="btn btn-success btn-sm" title="Add New Nationalitie_group_line">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a> -->
                            <a id="btn_add_group_line" class="btn text-white" style="background-color: #008450;" data-toggle="collapse" data-target="#div_data_add_group_line" aria-expanded="false" aria-controls="div_data_add_group_line" onclick="change_btn_add_group_line();">
                                <i class="fa-solid fa-plus"></i> เพิ่มกลุ่มไลน์ใหม่  
                                <i id="i_add_group_down_up" class="fa-solid fa-caret-down"></i>
                            </a>

                            <script>
                                function change_btn_add_group_line(){
                                    // หา DOM element จาก id
                                    const btnAddGroupLine = document.getElementById("btn_add_group_line");
                                    const iAddGroupDownUp = document.getElementById("i_add_group_down_up");

                                    // ถ้า element มี class fa-caret-down ให้เปลี่ยนเป็น fa-caret-up
                                    if (iAddGroupDownUp.classList.contains("fa-caret-down")) {
                                        iAddGroupDownUp.classList.remove("fa-caret-down");
                                        iAddGroupDownUp.classList.add("fa-caret-up");
                                    }
                                    // ถ้า element มี class fa-caret-up ให้เปลี่ยนเป็น fa-caret-down
                                    else if (iAddGroupDownUp.classList.contains("fa-caret-up")) {
                                        iAddGroupDownUp.classList.remove("fa-caret-up");
                                        iAddGroupDownUp.classList.add("fa-caret-down");
                                    }

                                }
                            </script>
                        </div>
                        <hr>
                        <div id="div_data_add_group_line" class="collapse col-12">
                            <div class="row">
                                <div class="col">
                                    <label class="input-group-text" for="select_language">
                                        <i class="fa-solid fa-language" style="color: #ee4455;"></i>
                                        &nbsp;&nbsp;เลือกภาษา
                                    </label>
                                    <select class="form-control" name="select_language" id="select_language" onchange="show_send_pass_code();">
                                        <option selected="" value="">เลือกภาษา</option>
                                        @foreach($group_nationality as $item_n)
                                            <option value="{{ $item_n->language }}">
                                                {{ $item_n->language }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="input-group-text" for="select_guoup_line_on_db">
                                        <i class="fa-brands fa-line" style="color: #00ad14;"></i>
                                        &nbsp;&nbsp;เลือกกลุ่มไลน์
                                    </label>
                                    <select class="form-control" name="select_guoup_line_on_db" id="select_guoup_line_on_db" onchange="show_send_pass_code();">
                                        <option selected="" value="">เลือกกลุ่มไลน์</option>
                                        @foreach($group_line as $item_group)
                                            <option value="{{ $item_group->id }}">
                                                {{ $item_group->groupName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="div_send_pass_code" class="col d-none">
                                    <label class="input-group-text" for="btn_send_pass_code">
                                        <i class="fa-solid fa-paper-plane fa-bounce" style="color: #1dedb9;"></i>
                                        &nbsp;&nbsp;ส่งรหัสไปยังกลุ่มไลน์
                                    </label>
                                    <button id="btn_send_pass_code" class="btn btn-warning main-shadow main-radius" style="width: 100%;"
                                    onclick="send_pass_code_to_line();">
                                        ส่งรหัส
                                    </button>
                                </div>
                                <div id="div_input_pass_code" class="col d-none">
                                    <label class="input-group-text" for="pass_code">
                                        <i class="fa-duotone fa-key fa-bounce" style="--fa-primary-color: #ff584d; --fa-secondary-color: #e99595;"></i>
                                        &nbsp;&nbsp;กรอกรหัส
                                    </label>
                                    <input type="text" class="form-control" name="pass_code" id="pass_code" placeholder="กรอกรหัส" oninput="check_pass_code();">
                                </div>
                                <div id="cf_new_sos_group_line" class="col d-none">
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>

                    var num_pass_code;

                    function show_send_pass_code(){
                        let select_language = document.querySelector('#select_language').value ;
                        let select_guoup_line_on_db = document.querySelector('#select_guoup_line_on_db').value ;

                        if( select_language && select_guoup_line_on_db)
                        {
                            document.querySelector('#div_send_pass_code').classList.remove('d-none');
                        }
                    }

                    function send_pass_code_to_line() {
                        
                        document.querySelector('#div_input_pass_code').classList.remove('d-none');
                        // เปลี่ยนข้อความปุ่มเป็น "ส่งรหัสอีกครั้ง"
                        let btnSendPassCode = document.getElementById("btn_send_pass_code");
                        btnSendPassCode.textContent = "ส่งรหัสอีกครั้ง";

                        // นับถอยหลัง 30 วินาที
                        let countDown = 30;
                        const countDownInterval = setInterval(function() {
                            countDown--;
                            if (countDown >= 0) {
                                btnSendPassCode.textContent = "ส่งรหัสอีกครั้ง (" + countDown + ")";
                            }
                            else {
                                clearInterval(countDownInterval);
                                btnSendPassCode.textContent = "ส่งรหัสอีกครั้ง";
                                btnSendPassCode.disabled = false;
                            }
                        }, 1000);

                        // disabled ปุ่ม
                        btnSendPassCode.disabled = true;

                        // ส่ง code ไปยังกลุ่มไลน์
                        let select_language = document.querySelector('#select_language').value ;
                        let id_guoup_line = document.querySelector('#select_guoup_line_on_db').value ;

                        // console.log(select_language);
                        // console.log(id_guoup_line);
                        fetch("{{ url('/') }}/api/nationalities/send_pass_code_to_line" + "/" + select_language + "/" + id_guoup_line)
                            .then(response => response.text())
                            .then(data => {
                                // console.log(data);
                                num_pass_code = data ;
                            });

                        document.querySelector('#pass_code').focus();
                    }

                    function check_pass_code(){
                        let pass_code = document.querySelector('#pass_code').value ;

                        if(pass_code == num_pass_code){
                            document.querySelector('#div_send_pass_code').classList.add('d-none');
                            document.querySelector('#div_input_pass_code').classList.add('d-none');
                            document.querySelector('#cf_new_sos_group_line').classList.remove('d-none');

                            let text_btn_html = '<button id="btn_cf_new_sos_group_line" class="btn btn-success main-shadow main-radius" style="width: 100%;" onclick="create_new_sos_group_line();">'+
                                        'ยืนยันการเพิ่มกลุ่มไลน์'+
                                    '</button>';

                             document.querySelector('#cf_new_sos_group_line').insertAdjacentHTML('beforeend', text_btn_html); // แทรกล่างสุด

                        }

                    }

                    function create_new_sos_group_line(){
                        console.log('cf_new_sos_group_line');

                        let select_language = document.querySelector('#select_language').value ;
                        let id_guoup_line = document.querySelector('#select_guoup_line_on_db').value ;

                        // console.log(select_language);
                        // console.log(id_guoup_line);
                        fetch("{{ url('/') }}/api/nationalities/create_new_sos_group_line" + "/" + select_language + "/" + id_guoup_line)
                            .then(response => response.text())
                            .then(data => {
                                // console.log(data);
                                if (data == "success"){
                                    window.location.reload();
                                }
                            });
                    }


                </script>

                <div class="card">
                    <h3 class="card-header">ข้อมูลกลุ่มไลน์</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <form method="GET" action="{{ url('/nationalitie_group_lines') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                                <span class="input-group-append">
                                                    <button class="btn btn-secondary" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 111.5px;font-size: 18px;">
                                                        ชื่อกลุ่มไลน์
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156.469px;font-size: 18px;">
                                                        ภาษา
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258.312px;font-size: 18px;">
                                                        ประเทศที่ดูแล (จำนวน)
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258.312px;font-size: 18px;">
                                                        สมาชิก (คน)
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258.312px;font-size: 18px;">
                                                        ช่วยเหลือแล้ว (เคส)
                                                    </th>
                                                    <th><!-- // --></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nationalitie_group_lines as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $item->groupName }}</td>
                                                        <td>{{ $item->language }}</td>
                                                        @php
                                                            $arr = explode(',' , $item->id_nationalitie);
                                                            $count_id_nationalitie = count($arr);
                                                        @endphp
                                                        <td>{{ $count_id_nationalitie }} ประเทศ</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="{{ url('/nationalitie_group_lines/' . $item->id) }}" title="View Nationalitie_group_line"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                            <a href="{{ url('/nationalitie_group_lines/' . $item->id . '/edit') }}" title="Edit Nationalitie_group_line"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                            <form method="POST" action="{{ url('/nationalitie_group_lines' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Nationalitie_group_line" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
