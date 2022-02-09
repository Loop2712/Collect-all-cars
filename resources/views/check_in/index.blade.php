@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
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
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #fff;
    stroke-miterlimit: 10;
    margin: 10% auto;
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
        box-shadow: inset 0px 0px 0px 60px #7ac142
    }
}
</style>

<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="row col-12">
                <div class="col-12">
                    <div class="row col-12">
                        <div class="col-9">
                            <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                                รายชื่อ Check in / out
                            </h3>
                        </div>
                        <div class="col-3">
                            <a style="float: right;margin-top: 15px;" type="button" data-toggle="modal" data-target="#covid">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-head-side-virus"></i> แจ้งติดโควิด!
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row col-12">
                        <center>
                            <form style="float: left;" method="GET" action="{{ url('/check_in/view') }}" accept-charset="UTF-8" class="col-12 form-inline float-right" role="search">
                                <div class="row col-12">
                                    <div class="col-md-3">
                                        <label  class="control-label">{{ 'วันที่' }}</label>
                                        <input class="form-control" type="date" name="select_date" id="select_date" value="{{ request('select_date') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label  class="control-label">{{ 'เวลา' }}</label>
                                        <input class="form-control" type="time" name="select_time_1" id="select_time_1" value="{{ request('select_time_1') }}" onchange="document.querySelector('#select_time_2').required = true,document.querySelector('#select_date').required = true;">
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <br>
                                            <label style="margin-top:7px;" class="control-label">{{ 'ถึง' }}</label>
                                        </center>
                                    </div>
                                    <div class="col-md-2">
                                        <label  class="control-label">{{ 'เวลา' }}</label>
                                        <input class="form-control" type="time" name="select_time_2" id="select_time_2" value="{{ request('select_time_2') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label  class="control-label">{{ 'รหัสนักศึกษา' }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="select_student_id" placeholder="ค้นหารหัสนักศึกษา..." value="{{ request('select_student_id') }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <span class="input-group-append">
                                            <button class="btn btn-info text-white" type="submit">
                                                <i class="fa fa-search"></i>ค้นหา
                                            </button>
                                        </span>
                                        <a class="btn btn-danger "href="{{ url('/check_in/view') }}" >
                                            ล้างการค้นหา
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<br>
<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อ</th>
                        <th>เวลาเข้า - ออก</th>
                        <th>เบอร์</th>
                        <th>สถานที่</th>
                        <th>รหัสนักศึกษา</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($check_in as $item)
                        <tr>
                            <td>
                                @if(!empty($item->user->name_staff))
                                    {{ $item->user->name_staff }}
                                @else
                                    {{ $item->user->name }}
                                @endif
                            </td>

                            <td>
                                @if(!empty($item->time_in))
                                    <b class="text-success">เข้า : {{ date("d/m/Y H:i" , strtotime($item->time_in)) }}</b>
                                @endif


                                @if(!empty($item->time_out))
                                    <b class="text-danger">ออก : {{ date("d/m/Y H:i" , strtotime($item->time_out)) }}</b>
                                @endif

                            </td>

                            <td>
                                @if(!empty($item->user->phone))
                                    <b>{{ $item->user->phone}}</b>
                                @endif
                            </td>

                            <td>
                                @if(!empty($item->check_in_at))
                                    <b>{{ $item->check_in_at}}</b>
                                @else
                                    -
                                @endif
                            </td>


                            <td>
                                @if(!empty($item->student_id) )
                                    <b>{{ $item->student_id}}</b>
                                @else
                                    บุคคลทั่วไป
                                @endif
                            </td>

                            <!-- <td class="d-none">
                                <a href="{{ url('/check_in/' . $item->id) }}" title="View Check_in"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/check_in/' . $item->id . '/edit') }}" title="Edit Check_in"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/check_in' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination round-pagination " style="margin-top:10px;"> {!! $check_in->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="covid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือนกลุ่มเสี่ยง</h5>
                    </div>
                    <div class="modal-body">
                        <div class=" radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                                <div class="d-flex align-items-center" >
                                    <div class="row col-12" style="background:none;">
                                        <input type="text" name="text_array"  id="text_array" class="form-control d-none">
                                        <div class="col-9">
                                            <h5>ค้นหาชื่อหรือรหัสนักศึกษา</h5>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" id="student_id_covid" name="student_id_covid" placeholder="ค้นหาชื่อหรือรหัสนักศึกษา..." oninput="search_std('{{ $check_in_at }}');">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row col-12">
                                <div id="div_content_search_std">
                                    
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close_madal_main" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <!-- <button type="button" class="btn btn-primary">ยืนยัน</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal send_finish -->
        <!-- Button trigger modal -->
        <button id="btn_modal_send_finish" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#madal_send_finish">
        </button>
        <!-- Modal -->
        <div class="modal fade" id="madal_send_finish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="wrapper">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <h3 style="color: #7ac142;">แจ้งเตือนกลุ่มเสี่ยงเรียบร้อยแล้ว</h3>
                    </div>
                </div>
                <div class="modal-footer d-none">
                    <button id="close_madal_send_finish" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>


    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รายชื่อ Check in / out</h3>
                    <div class="card-body">

                        <form method="GET" action="{{ url('/check_in') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Time In</th><th>Time Out</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($check_in as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td><td>{{ $item->time_in }}</td><td>{{ $item->time_out }}</td>
                                        <td>
                                            <a href="{{ url('/check_in/' . $item->id) }}" title="View Check_in"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/check_in/' . $item->id . '/edit') }}" title="Edit Check_in"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/check_in' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    </div> -->

    <script>
        
        function search_std(check_in_at){

            let student_id_covid = document.querySelector('#student_id_covid');

            fetch("{{ url('/') }}/api/search_std/"+student_id_covid.value+"/"+check_in_at)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_content_search_std = document.querySelector('#div_content_search_std');
                    div_content_search_std.textContent = "" ;

                    let div_header = document.createElement("div");
                    let class_div_header = document.createAttribute("class");
                        class_div_header.value = "row col-12";
                        div_header.setAttributeNode(class_div_header); 

                        // titel name
                        let div_header_name = document.createElement("div");
                        let class_div_header_name = document.createAttribute("class");
                            class_div_header_name.value = "col-3 text-center";
                            div_header_name.setAttributeNode(class_div_header_name);
                            let para_name = document.createElement("P");
                                para_name.innerHTML = "ชื่อ";
                                div_header_name.appendChild(para_name);
                        div_header.appendChild(div_header_name);

                        // titel phone
                        let div_header_phone = document.createElement("div");
                        let class_div_header_phone = document.createAttribute("class");
                            class_div_header_phone.value = "col-3 text-center";
                            div_header_phone.setAttributeNode(class_div_header_phone);
                            let para_phone = document.createElement("P");
                                para_phone.innerHTML = "เบอร์โทร";
                                div_header_phone.appendChild(para_phone);
                        div_header.appendChild(div_header_phone);

                        // titel std_id
                        let div_header_std_id = document.createElement("div");
                        let class_div_header_std_id = document.createAttribute("class");
                            class_div_header_std_id.value = "col-3 text-center";
                            div_header_std_id.setAttributeNode(class_div_header_std_id);
                            let para_std_id = document.createElement("P");
                                para_std_id.innerHTML = "รหัสนักศึกษา";
                                div_header_std_id.appendChild(para_std_id);
                        div_header.appendChild(div_header_std_id);

                        // titel btn
                        let div_header_btn = document.createElement("div");
                        let class_div_header_btn = document.createAttribute("class");
                            class_div_header_btn.value = "col-3 text-center";
                            div_header_btn.setAttributeNode(class_div_header_btn);
                        div_header.appendChild(div_header_btn);

                    let hr = document.createElement("hr");
                        div_header.appendChild(hr);

                    div_content_search_std.appendChild(div_header);

                    // div_data
                    let div_data = document.createElement("div");
                    let class_div_data = document.createAttribute("class");
                        class_div_data.value = "row col-12";
                        div_data.setAttributeNode(class_div_data);

                for(let item of result){

                    // data name
                        let div_data_name = document.createElement("div");
                        let class_div_data_name = document.createAttribute("class");
                            class_div_data_name.value = "col-3";
                            div_data_name.setAttributeNode(class_div_data_name);
                            let para_data_name = document.createElement("P");
                            let style_para_name = document.createAttribute("style");
                                style_para_name.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                para_data_name.setAttributeNode(style_para_name); 

                                if (item.name_staff) {
                                    para_data_name.innerHTML = item.name_staff
                                }else{
                                    para_data_name.innerHTML = item.name
                                }

                                div_data_name.appendChild(para_data_name);
                                div_data.appendChild(div_data_name);

                    // data phone
                        let div_data_phone = document.createElement("div");
                        let class_div_data_phone = document.createAttribute("class");
                            class_div_data_phone.value = "col-3 text-center";
                            div_data_phone.setAttributeNode(class_div_data_phone);
                            let para_data_phone = document.createElement("P");
                            let style_para_phone = document.createAttribute("style");
                                style_para_phone.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                para_data_phone.setAttributeNode(style_para_phone); 
                                para_data_phone.innerHTML = item.phone

                                div_data_phone.appendChild(para_data_phone);
                                div_data.appendChild(div_data_phone);

                    // data std_id
                        let div_data_std_id = document.createElement("div");
                        let class_div_data_std_id = document.createAttribute("class");
                            class_div_data_std_id.value = "col-3 text-center";
                            div_data_std_id.setAttributeNode(class_div_data_std_id);
                            let para_data_std_id = document.createElement("P");
                            let style_para_std_id = document.createAttribute("style");
                                style_para_std_id.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                para_data_std_id.setAttributeNode(style_para_std_id); 
                                para_data_std_id.innerHTML = item.student_id

                                div_data_std_id.appendChild(para_data_std_id);
                                div_data.appendChild(div_data_std_id);

                    // data btn
                        let div_data_btn = document.createElement("div");
                        let class_div_data_btn = document.createAttribute("class");
                            class_div_data_btn.value = "col-3 text-center";
                            div_data_btn.setAttributeNode(class_div_data_btn);

                            let btn_data = document.createElement("button");
                            btn_data.innerHTML = '<i class="fas fa-viruses"></i> ติดโควิด !'
                            let class_btn_data = document.createAttribute("class");
                                class_btn_data.value = "btn btn-danger";
                                btn_data.setAttributeNode(class_btn_data); 
                            let style_btn_data = document.createAttribute("style");
                                style_btn_data.value = "margin-top: 20px;";
                                btn_data.setAttributeNode(style_btn_data);

                            let btn_data_onclick = document.createAttribute("onclick");
                                btn_data_onclick.value = "show_group_risk("+ item.id +",'" + check_in_at + "');";
                                btn_data.setAttributeNode(btn_data_onclick);  
                                
                                div_data_btn.appendChild(btn_data);
                                div_data.appendChild(div_data_btn);

                    let div_data_hr = document.createElement("hr");
                        div_data.appendChild(div_data_hr);



                    div_content_search_std.appendChild(div_data);

                }

            });
        }

        function show_group_risk(id , check_in_at){
            let div_content_search_std = document.querySelector('#div_content_search_std');
                div_content_search_std.textContent = "" ;

                fetch("{{ url('/') }}/api/show_group_risk/"+id+"/"+check_in_at)
                    .then(response => response.json())
                    .then(result => {
                    // console.log(result);

                    let text_array = document.querySelector('#text_array');
                        text_array.value = JSON.stringify(result);

                    let div_btn_send = document.createElement("div");

                    let class_div_btn_send = document.createAttribute("class");
                            class_div_btn_send.value = "row col-12";
                            div_btn_send.setAttributeNode(class_div_btn_send);

                    // data col-9
                        let div_btn_col_9 = document.createElement("div");
                        let class_div_btn_col_9 = document.createAttribute("class");
                            class_div_btn_col_9.value = "col-9 text-center";
                            div_btn_col_9.setAttributeNode(class_div_btn_col_9);

                            div_btn_send.appendChild(div_btn_col_9);

                    // data col-3 btn
                        let div_btn_col_3 = document.createElement("div");
                        let class_div_btn_col_3 = document.createAttribute("class");
                            class_div_btn_col_3.value = "col-3 text-center";
                            div_btn_col_3.setAttributeNode(class_div_btn_col_3);

                            let btn_send = document.createElement("button");
                                btn_send.innerHTML = '<i class="fas fa-share-square"></i> ส่งข้อความเตือน !'
                            let class_btn_send = document.createAttribute("class");
                                class_btn_send.value = "btn btn-info text-white";
                                btn_send.setAttributeNode(class_btn_send); 
                            let style_btn_send = document.createAttribute("style");
                                style_btn_send.value = "margin-top: 15px;";
                                btn_send.setAttributeNode(style_btn_send);

                            let btn_send_onclick = document.createAttribute("onclick");
                                btn_send_onclick.value = "send_risk_group();";
                                btn_send.setAttributeNode(btn_send_onclick);  
                                
                                div_btn_col_3.appendChild(btn_send);
                                div_btn_send.appendChild(div_btn_col_3);

                        div_content_search_std.appendChild(div_btn_send);

                    // ----------------------------------------

                        let div_header = document.createElement("div");
                        let class_div_header = document.createAttribute("class");
                            class_div_header.value = "row col-12";
                            div_header.setAttributeNode(class_div_header); 

                            // titel name
                            let div_header_name = document.createElement("div");
                            let class_div_header_name = document.createAttribute("class");
                                class_div_header_name.value = "col-3 text-center";
                                div_header_name.setAttributeNode(class_div_header_name);
                                let para_name = document.createElement("P");
                                    para_name.innerHTML = "ชื่อ";
                                    div_header_name.appendChild(para_name);
                            div_header.appendChild(div_header_name);

                            // titel phone
                            let div_header_phone = document.createElement("div");
                            let class_div_header_phone = document.createAttribute("class");
                                class_div_header_phone.value = "col-3 text-center";
                                div_header_phone.setAttributeNode(class_div_header_phone);
                                let para_phone = document.createElement("P");
                                    para_phone.innerHTML = "เบอร์โทร";
                                    div_header_phone.appendChild(para_phone);
                            div_header.appendChild(div_header_phone);

                            // titel std_id
                            let div_header_std_id = document.createElement("div");
                            let class_div_header_std_id = document.createAttribute("class");
                                class_div_header_std_id.value = "col-3 text-center";
                                div_header_std_id.setAttributeNode(class_div_header_std_id);
                                let para_std_id = document.createElement("P");
                                    para_std_id.innerHTML = "รหัสนักศึกษา";
                                    div_header_std_id.appendChild(para_std_id);
                            div_header.appendChild(div_header_std_id);

                            // titel btn
                            let div_header_btn = document.createElement("div");
                            let class_div_header_btn = document.createAttribute("class");
                                class_div_header_btn.value = "col-3 text-center";
                                div_header_btn.setAttributeNode(class_div_header_btn);
                            div_header.appendChild(div_header_btn);

                        let hr = document.createElement("hr");
                            div_header.appendChild(hr);

                        div_content_search_std.appendChild(div_header);

                        // div_data
                        let show_div_data = document.createElement("div");
                        let class_div_data = document.createAttribute("class");
                            class_div_data.value = "row col-12";
                            show_div_data.setAttributeNode(class_div_data);

                    for(let item of result){
                        // data name
                            let show_div_data_name = document.createElement("div");
                            let show_class_div_data_name = document.createAttribute("class");
                                show_class_div_data_name.value = "col-3";
                                show_div_data_name.setAttributeNode(show_class_div_data_name);
                                let show_para_data_name = document.createElement("P");
                                let show_style_para_name = document.createAttribute("style");
                                    show_style_para_name.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                    show_para_data_name.setAttributeNode(show_style_para_name); 
                                    show_para_data_name.innerHTML = item.name

                                    show_div_data_name.appendChild(show_para_data_name);
                                    show_div_data.appendChild(show_div_data_name);

                        // data phone
                            let show_div_data_phone = document.createElement("div");
                            let show_class_div_data_phone = document.createAttribute("class");
                                show_class_div_data_phone.value = "col-3 text-center";
                                show_div_data_phone.setAttributeNode(show_class_div_data_phone);
                                let show_para_data_phone = document.createElement("P");
                                let show_style_para_phone = document.createAttribute("style");
                                    show_style_para_phone.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                    show_para_data_phone.setAttributeNode(show_style_para_phone); 
                                    show_para_data_phone.innerHTML = item.phone

                                    show_div_data_phone.appendChild(show_para_data_phone);
                                    show_div_data.appendChild(show_div_data_phone);

                        // data std_id
                            let show_div_data_std_id = document.createElement("div");
                            let show_class_div_data_std_id = document.createAttribute("class");
                                show_class_div_data_std_id.value = "col-3 text-center";
                                show_div_data_std_id.setAttributeNode(show_class_div_data_std_id);
                                let show_para_data_std_id = document.createElement("P");
                                let show_style_para_std_id = document.createAttribute("style");
                                    show_style_para_std_id.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                    show_para_data_std_id.setAttributeNode(show_style_para_std_id); 
                                    show_para_data_std_id.innerHTML = item.student_id

                                    show_div_data_std_id.appendChild(show_para_data_std_id);
                                    show_div_data.appendChild(show_div_data_std_id);

                        // data text
                            let show_div_data_text = document.createElement("div");
                            let show_class_div_data_text = document.createAttribute("class");
                                show_class_div_data_text.value = "col-3 text-center";
                                show_div_data_text.setAttributeNode(show_class_div_data_text);
                                let show_para_data_text = document.createElement("P");
                                let show_style_para_text = document.createAttribute("style");
                                    show_style_para_text.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;color:red;";
                                    show_para_data_text.setAttributeNode(show_style_para_text); 
                                    show_para_data_text.innerHTML = "กลุ่มเสี่ยง"

                                    show_div_data_text.appendChild(show_para_data_text);
                                    show_div_data.appendChild(show_div_data_text);

                        let show_hr = document.createElement("hr");
                            show_div_data.appendChild(show_hr);

                        div_content_search_std.appendChild(show_div_data);

                    }

                });
        }


        function send_risk_group(){
            let text_array = document.querySelector('#text_array');

            // console.log(text_array.value);

            fetch("{{ url('/') }}/api/send_risk_group", {
                method: 'post',
                body: text_array.value,
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response){
                return response.text();
            }).then(function(text){
                // console.log(text);
                document.querySelector('#close_madal_main').click();
                let div_content_search_std = document.querySelector('#div_content_search_std');
                    div_content_search_std.textContent = "" ;

                document.querySelector('#btn_modal_send_finish').click();
                
                    var delayInMilliseconds = 3000; 
                        setTimeout(function() {
                          document.querySelector('#close_madal_send_finish').click();
                        }, delayInMilliseconds);

            }).catch(function(error){
                // console.error(error);
            });
        }

    </script>
@endsection
