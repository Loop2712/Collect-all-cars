@extends('layouts.admin')

@section('content')

<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-12" style="margin-bottom:10px;">
                <div class="row">
                    <div class="col-md-3 col-sm-12 text-center" >
                        <h2><i class="fas fa-globe"></i> หัวข้อต่างประเทศ</h2>
                    </div>
                    <div class="col-md-3 col-sm-0"></div>
                    
                    <div class="col-md-3 col-sm-12 text-center d-flex justify-content-end" style="top:5px;">
                        <form action="{{ url('/text_topic') }}">
                            <div class="input-group">
                                <input class="form-control" type="text" name="text_th" id="text_th" placeholder="เพิ่มหัวข้อใหม่">
                                <span class="input-group-append">
                                    <button class="btn btn-success" onclick="add_text_topic();">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center d-flex justify-content-end">
                        <form method="GET" action="{{ url('/text_topic') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา" value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------- pc --------------------------------------------------->
                    <!-- <div class="card d-none d-lg-block"> -->
                        <!-- <div class="card-header">Text_topic</div>
                        <div class="card-body" style="padding:0px; ">
                            <a href="{{ url('/text_topic/create') }}" class="btn btn-success btn-sm" title="Add New Text_topic">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <form action="{{ url('/text_topic') }}">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="text_th" id="text_th" placeholder="เพิ่ม text topic">
                                                <span class="input-group-append">
                                                    <button class="btn btn-success" onclick="add_text_topic();">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>เพิ่ม
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="text_th" id="text_th" placeholder="เพิ่ม text topic">
                                    </div>
                                    <div class="col-1">
                                        <a class="btn btn-success text-white" onclick="add_text_topic();">
                                            <i class="fa fa-plus" aria-hidden="true"></i>เพิ่ม
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <form method="GET" action="{{ url('/text_topic') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            </div>

                            <br/> -->

                            @foreach($text_topic as $item)
                                <div class="card d-none d-lg-block" >
                                    <div class="card-header text-center " > 
                                        <h5 style="vertical-align: middle"> <b>{{ $item->th }}</b> 
                                            <div style="float: right;">
                                                    <form style="float: right;" method="POST" action="{{ url('/text_topic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    <a style="float: right;" href="{{ url('/text_topic/' . $item->id . '/edit') }}" title="Edit Text_topic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                </div>
                                        </h5>                                       
                                    </div>
                                    <div class="col-md-12 d-none d-lg-block">
                                        <div class="row" style="padding:0px">
                                            <div class="col-md-4 card-body text-center " style="padding:5px">
                                                อังกฤษ : {{ $item->en }}
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                จีน : {{ $item->zh_TW }}
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                ญี่ปุ่น : {{ $item->ja }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                เกาหลี : {{ $item->ko }}
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                สเปน : {{ $item->es }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                ลาว : {{ $item->lo }}
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                พม่า : {{ $item->my }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                เยอรมัน : {{ $item->de }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                ฮินดี : {{ $item->hi }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                อาหรับ : {{ $item->ar }} 
                                            </div>
                                            <div class="col-md-4 card-body text-center "style="padding:5px">
                                                รัสเซีย : {{ $item->ru }} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="pagination-wrapper d-none d-lg-block"> {!! $text_topic->appends(['search' => Request::get('search')])->render() !!} </div>
                        
                        <!-- <div class="table-responsive">
                            <table class="table">
                                <div class="card" style="margin-top:-32px;">
                                    <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                        <tr class="text-center" >
                                            <th style="font-size:15px">ID</th>
                                            <th style="font-size:15px">ไทย</th>
                                            <th style="font-size:15px">อังกฤษ</th>
                                            <th style="font-size:15px">จีน</th>
                                            <th style="font-size:15px">ญี่ปุ่น</th>
                                            <th style="font-size:15px">เกาหลี</th>
                                            <th style="font-size:15px">สเปน</th>
                                            <th style="font-size:15px"></th>
                                        </tr>
                                    </thead>
                                </div>
                                <tbody>
                                    @foreach($text_topic as $item)
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;">{{ $item->id }}</td>
                                            <div class="collapse" id="form_delete_{{ $item->id }}">
                                                <br>
                                                <a href="{{ url('/partner_viicheck/' . $item->id . '/edit') }}"><button class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>
                                            </div>
                                            <td style="vertical-align: middle;">{{ $item->th }}</td>
                                            <td style="vertical-align: middle;">{{ $item->en }}</td>
                                            <td style="vertical-align: middle;">{{ $item->zh_TW }}</td>
                                            <td style="vertical-align: middle;">{{ $item->ja }}</td>
                                            <td style="vertical-align: middle;">{{ $item->ko }}</td>
                                            <td style="vertical-align: middle;">{{ $item->es }}</td>
                                            <td>
                                                <a href="{{ url('/text_topic/' . $item->id) }}" title="View Text_topic"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/text_topic/' . $item->id . '/edit') }}" title="Edit Text_topic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/text_topic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $text_topic->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div> -->
                    </div>
                    <!-------------------------------------------------------------------- end pc -------------------------------------------------------------------->
                    <!-------------------------------------------------------------------- mobile -------------------------------------------------------------------->
                     @foreach($text_topic as $item)
                     <div class="card col-12 d-block d-md-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#89CFF0;border-bottom-width: 4px; margin-bottom: 10px;">
                        <center>
                            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                                <div class="col-10"  data-toggle="collapse" data-target="#language_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                        <h5>{{ $item->th }}</h5>
                                </div> 
                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#language_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <i class="fas fa-angle-down" ></i>
                                    </div>
                                <div class="col-12 collapse" id="language_{{ $item->id }}">
                                    <p style="font-size:18px;padding:0px">อังกฤษ : {{ $item->en }} </p> 
                                    <p style="font-size:18px;padding:0px">จีน : {{ $item->zh_TW }} </p>
                                    <p style="font-size:18px;padding:0px">ญี่ปุ่น : {{ $item->ja }} </p>
                                    <p style="font-size:18px;padding:0px">เกาหลี : {{ $item->ko }} </p>
                                    <p style="font-size:18px;padding:0px">สเปน : {{ $item->es }} </p>
                                    <hr>
                                    <form method="POST" action="{{ url('/text_topic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" style="border-radius: 25px;" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                    <a href="{{ url('/text_topic/' . $item->id . '/edit') }}" title="Edit Text_topic"><button style="border-radius: 25px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> 
                                </div>
                            </div>
                            
                        </center>   
                        
                    </div>
                    @endforeach
                    <div class="pagination-wrapper d-block d-md-none"> {!! $text_topic->appends(['search' => Request::get('search')])->render() !!} </div>
                    <!------------------------------------------------------------------ end mobile ------------------------------------------------------------------>
                </div>
            </div>
        </div>
    </div>
    <script>
        function add_text_topic(){

            let text_th = document.querySelector('#text_th');
                console.log(text_th.value);

            fetch("{{ url('/') }}/api/add_text_topic/"+text_th.value);
        }
    </script>
@endsection

