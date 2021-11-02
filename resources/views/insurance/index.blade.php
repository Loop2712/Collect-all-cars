@extends('layouts.admin')

@section('content')
    <br>
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">บริษัทประกันภัย</h3>
                    <div class="card-body">
                        <a href="{{ url('/insurance/create') }}" class="btn btn-success btn-sm" title="Add New Insurance">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มบริษัท
                        </a>

                        <form method="GET" action="{{ url('/insurance') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <br/> -->
                    
                        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 text-center" >
                                <h2><i class="fad fa-hands-helping" style="color:#21618C;"></i>บริษัทประกันภัย</h2>
                            </div>
                            <div class="col-md-3 col-sm-0 "></div>
                            <div class="col-md-3 col-sm-4 text-center main" style="margin-left: auto;top:8px">
                                <a href="{{ url('/insurance/create') }}" title="Add New Insurance" style="text-decoration: none;">
                                    <button type="button" class="d-flex btn btn-secondary btn btn-success btn-sm" style="margin-left: auto;">
                                        <i class="fa fa-plus" style="margin-top:5px" ></i>  เพิ่มบริษัท
                                    </button>
                                </a>
                            </div><br>
                            <br style="d-block d-md-none">
                            <div class="col-md-3 col-sm-8 text-center d-flex justify-content-end">
                                <form method="GET" action="{{ url('/insurance') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    <!-------------------------------------------------------------- PC -------------------------------------------------------------->
                    <div class="card d-none d-lg-block">
                        <div class="table-responsive">
                            <table class="table">
                                <div class="card" style="margin-top:-32px;">
                                    <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                        <tr class="text-center">
                                            <th style="font-size:15px">ชื่อบริษัทประกันภัย</th>
                                            <th style="font-size:15px">เบอร์โทรศัพท์</th>
                                            <th style="font-size:15px">สถานะพาร์ทเนอร์</th>
                                            <th style="font-size:15px">Line Group</th>
                                            <th style="font-size:15px">Mail</th>
                                            <th style="font-size:15px">เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                </div>
                                <tbody>
                                @foreach($insurance as $item)
                                    <tr class="text-center" style="font-size:15px">
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td style="vertical-align: middle;font-size:15px;"> <b>{{ $item->company }}</b> </td>
                                        <td style="vertical-align: middle;font-size:15px;">{{ $item->phone }}</td>
                                        <td style="vertical-align: middle;font-size:15px;">{{ $item->status_partner }}</td>
                                        <td>
                                            @if(!empty($item->line_group))
                                                {{ $item->line_group }}
                                            @elseif(empty($item->line_group) and $item->status_partner == "Yes")
                                                <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->company }}');">
                                                    <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                    @foreach($group_line as $item)
                                                        <option value="{{ $item->groupName }}" 
                                                        {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                        {{ $item->groupName }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            @else
                                            -
                                            @endif
                                        </td>


                                        <!-- @if(!empty($item->line_group))
                                            <td>{{ $item->line_group }}</td>
                                        @elseif(empty($item->line_group) and $item->status_partner == "Yes")
                                            <td>
                                                <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->company }}');">
                                                    <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                    @foreach($group_line as $item)
                                                        <option value="{{ $item->groupName }}" 
                                                        {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                        {{ $item->groupName }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </td>
                                        @else
                                            <th> </th>
                                        @endif -->

                                        <td>{{ $item->mail }}</td>
                                        <td>
                                            <!-- <a href="{{ url('/insurance/' . $item->id) }}" title="View Insurance"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/insurance/' . $item->id . '/edit') }}" title="Edit Insurance"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/insurance' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Insurance" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $insurance->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------End PC -------------------------------------------------------------->
                    <!-------------------------------------------------------------- Mobile -------------------------------------------------------------->
                    <div class="col-12  d-block d-md-none" >
                                <div class="d-flex justify-content-between">
                                    <div class="p-3"><span style="color:#00FF00;">&#11044;</span> &nbsp;เป็นพาร์ทเนอร์ </div>
                                    <div class="p-3"><span style="color:#FF0000;">&#11044;</span> &nbsp;ไม่เป็นพาร์ทเนอร์ </div>
                                </div>
                            </div>
                    @foreach($insurance as $item)
                            <div class="card col-12 d-block d-md-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#21618C;border-bottom-width: 4px; margin-bottom: 10px;">
                                <center>
                                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#Insurance_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                <h6 style="margin-bottom:0px">
                                                    <b> 
                                                        @if(($item->status_partner == 'Yes' ))
                                                            <span style="color:#00FF00">&#11044;</span> 
                                                        @elseif(($item->status_partner == 'No' ))
                                                            <span style="color:#FF0000">&#11044;</span>
                                                        @endif
                                                        {{ $item->company }}
                                                    </b>
                                                </h6>
                                        </div> 
                                        <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Insurance_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                            <i class="fas fa-angle-down" ></i>
                                        </div>
                                        <div class="col-4 collapse" id="Insurance_{{ $item->id }}">
                                            
                                            <img style="margin-left: 7px;margin-top:70px;overflow" width="100%" src="{{ url('/img/logo_insuraance/') }}/{{ $item->company }}.png">
                                        </div>
                                        <div class="col-8 collapse" id="Insurance_{{ $item->id }}"><br>
                                            <p style="font-size:18px;padding:0px">เบอร์ : {{ $item->phone }} </p> 
                                                @switch($item->status_partner)
                                                    @case("Yes") 
                                                        <form method="POST" action="{{ url('/insurance/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                            {{ method_field('PATCH') }}
                                                            {{ csrf_field() }}                      
                                                            <input class="d-none form-control" name="status_partner" type="text" id="status_partner" value="No" >
                                                            <p style="font-size:18px;padding:0px">สถานะ : 
                                                                <button id="noButton" onClick="alert('ยกเลิกบริษัทนี้เป็นพาร์ทเนอร์ใช่หรือไม่')" type="submit" class="btn btn-sm btn-success " href="">
                                                                    <i class="fas fa-check"></i> Yes
                                                                </button> 
                                                            </p>
                                                        </form>
                                                    @break
                                                    @case("No") 
                                                        <form method="POST" action="{{ url('/insurance/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                            {{ method_field('PATCH') }}
                                                            {{ csrf_field() }}  
                                                            <input class="d-none form-control" name="status_partner" type="text" id="status_partner" value="Yes" >
                                                            <p style="font-size:18px;padding:0px">สถานะ :
                                                                <button id="yesButton" onClick="alert('ยืนยันเปลี่ยนบริษัทนี้เข้าร่วมเป็นพาร์ทเนอร์ใช่หรือไม่')" type="submit" class="btn btn-sm btn-danger " href="">
                                                                    <i class="fas fa-times"></i> No
                                                                </button>
                                                            </p>
                                                        </form>
                                                    @break
                                                @endswitch
                                            </p>
                                            <!-- <p>
                                                <form method="POST" action="{{ url('/insurance/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}                      
                                                    <input id="YesButton" onClick="alert('ยืนยันเปลี่ยนบริษัทนี้เข้าร่วมเป็นพาร์ทเนอร์ใช่หรือไม่')"  name="status_partner" checked data-toggle="toggle" type="submit" id="status_partner" value="Yes" >           
                                                    <input id="noButton" onClick="alert('ยกเลิกบริษัทนี้เป็นพาร์ทเนอร์ใช่หรือไม่')" type="submit" checked data-toggle="toggle" name="status_partner" id="status_partner" value="No">     
                                                </form>
                                            </p>  -->
                                            <p>
                                                @if(!empty($item->line_group))
                                                    {{ $item->line_group }}
                                                @elseif(empty($item->line_group) and $item->status_partner == "Yes")
                                                    <select style="padding:0px" id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->company }}');">
                                                        <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                        @foreach($group_line as $item)
                                                            <option value="{{ $item->groupName }}" 
                                                            {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                            {{ $item->groupName }} 
                                                            </option>
                                                        @endforeach 
                                                    </select><br>  
                                                @else
                                                    <p style="font-size:18px;padding:0px">ไม่มีกลุ่มไลน์</p>   
                                                @endif
                                            </p>
                                            <p style="font-size:18px;padding:0px">อีเมล : {{ $item->mail }} </p> 
                                        </div>
                                        <div class="col-12 collapse" id="Insurance_{{ $item->id }}">
                                            <hr>
                                            <form method="POST" action="{{ url('/insurance' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" style="border-radius: 25px;" class="btn btn-danger btn-sm" title="Delete Insurance" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/insurance/' . $item->id . '/edit') }}" title="Edit Insurance"><button style="border-radius: 25px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        </div>
                                    </div>
                                </center>   
                            </div>
                        @endforeach
                        <div class="pagination-wrapper"> {!! $insurance->appends(['search' => Request::get('search')])->render() !!} </div>
                    <!--------------------------------------------------------------End Mobile -------------------------------------------------------------->

                </div>
            </div>
        </div>
    </div>
    <script>
        
        function change_line_group(loop, company){
            let select_line_group = document.querySelector("#select_line_group_" + loop).value;
            console.log(select_line_group);
            console.log(company);

            fetch("{{ url('/') }}/api/insurance_select_line_group/" + select_line_group + "/" + company);

            var delayInMilliseconds = 1500;

                setTimeout(function() {
                    window.location.reload(true);
                }, delayInMilliseconds);
        }

    </script>
@endsection
