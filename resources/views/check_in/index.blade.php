@extends('layouts.partners.theme_partner_new')

@section('content')

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
                            <td>{{ $item->user->name }}</td>

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
                                @if(!empty($item->student_id))
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
                        <div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="row col-12">
                                        <div class="col-9"></div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" id="student_id_covid" name="student_id_covid" placeholder="ค้นหารหัสนักศึกษา..." oninput="search_std('{{ $check_in_at }}');">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div id="div_content_search_std">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary">ยืนยัน</button>
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
                console.log(result);

                let div_content_search_std = document.querySelector('#div_content_search_std');
                    div_content_search_std.textContent = "" ;

                for(let item of result){
                    // <div>
                    let div = document.createElement("div");
                    // <p>
                    let para = document.createElement("P");
                    let style_para = document.createAttribute("style");
                        style_para.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                        para.setAttributeNode(style_para); 
                        para.innerHTML = item.student_id;

                        div.appendChild(para);
                        div_content_search_std.appendChild(div);
                }

            });
        }

    </script>
@endsection
