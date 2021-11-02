@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <br> 
            <div class="col-md-12" style="margin-bottom:10px;">
                <div class="row">
                    <div class="col-md-2 text-center" >
                        <h2><i class="fab fa-line" style="color:#00c300;"></i> กลุ่มไลน์</h2>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-3 text-center d-flex justify-content-end">
                        <form method="GET" action="{{ url('/group_line') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
            <!-- <div class="card">
                <div class="content"style="border-radius: 50%">
                    <table class="table">
                        <thead  style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                            <tr class="text-center">
                                <th class="col-md-3" style="font-size:15px" >ชื่อกลุ่มไลน์</th>
                                <th class="col-md-3" style="font-size:15px">เจ้าของกลุ่ม</th>
                                <th class="col-md-1" style="font-size:15px">เขตเวลา</th>
                                <th class="col-md-1" style="font-size:15px">ภาษา</th>
                                <th class="col-md-4" style="font-size:15px">GroupId</th>
                            </tr>
                        </thead>
                        <tbody  style="font-family: 'Prompt', sans-serif;">
                            @foreach($group_line as $item)
                                    <tr class="text-center" >
                                        <td class="col-md-3 text-left" style="font-size:15px;">
                                            <img style="width:50px; hight: 50px;border-radius: 50% 50%;" src="{{ $item->pictureUrl }}" alt="image of client" title="client" class="img-fluid customer">
                                            <b>{{ $item->groupName }}</b> 
                                        </td>
                                        <td class="col-md-3" style="font-size:15px;top:15px"> {{ $item->owner }}</td>
                                        <td class="col-md-1" style="font-size:15px;top:15px">{{ $item->time_zone }}</td>
                                        <td class="col-md-1" style="font-size:15px;top:15px">{{ $item->language }}</td>
                                        <td class="col-md-4" style="font-size:15px;top:15px">{{ $item->groupId }}</td>
                                        <td>{{ $item->pictureUrl }}</td>
                                        <td>
                                            <a href="{{ url('/group_line/' . $item->id) }}" title="View Group_line"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/group_line/' . $item->id . '/edit') }}" title="Edit Group_line"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/group_line' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Group_line" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div> -->
            <!--------------------------------------------------------------Pc -------------------------------------------------------------->
            <div class="card d-none d-lg-block">
                <div class="table-responsive">
                    <table class="table">
                        <div class="card" style="margin-top:-32px;">
                            <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                <tr class="text-center" >
                                    <th style="font-size:15px">ชื่อกลุ่มไลน์</th>
                                    <th style="font-size:15px">เจ้าของกลุ่ม</th>
                                    <th style="font-size:15px">เขตเวลา</th>
                                    <th style="font-size:15px">ภาษา</th>
                                    <th style="font-size:15px">GroupId</th>
                                </tr>
                            </thead>
                        </div>
                        <tbody>
                            @foreach($group_line as $item)
                                <tr class="text-center">
                                    <td class="text-left" style="font-size:15px;">
                                        <img style="width:50px; hight: 50px;border-radius: 50% 50%;" src="{{ $item->pictureUrl }}" alt="image of client" title="client" class="img-fluid customer">
                                        <b style="vertical-align: middle;">&nbsp;&nbsp;{{ $item->groupName }}</b> 
                                    </td>
                                    <td style="font-size:15px;vertical-align: middle;"> {{ $item->owner }}</td>
                                    <td style="font-size:15px;vertical-align: middle;">{{ $item->time_zone }}</td>
                                    <td style="font-size:15px;vertical-align: middle;">{{ $item->language }}</td>
                                    <td style="font-size:15px;vertical-align: middle;">{{ $item->groupId }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $group_line->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
            <!--------------------------------------------------------------End PC -------------------------------------------------------------->
            <!--------------------------------------------------------------Mobile -------------------------------------------------------------->
            @foreach($group_line as $item)
                <div class="card col-12 d-block d-md-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#00c300;border-bottom-width: 4px; margin-bottom: 10px;">
                    <center>
                        <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                            <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <img style="width:50px; hight: 50px;border-radius: 50% 50%;" src="{{ $item->pictureUrl }}" alt="image of client" title="client" class="img-fluid customer">
                                    <h5 style="margin-bottom:0px; margin-top:10px; ">{{ $item->groupName }}</h5>
                            </div> 
                            <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                <i class="fas fa-angle-down" ></i>
                                </div>
                            <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                <hr>
                                <p style="font-size:18px;padding:0px"> เจ้าของกลุ่ม <br>  {{ $item->owner }}  </p> <hr>
                                <p style="font-size:18px;padding:0px">เขตเวลา : {{ $item->time_zone }} </p> 
                                <p style="font-size:18px;padding:0px">ภาษา : {{ $item->language }} </p> 
                                <hr>
                                    <p style="font-size:18px;padding:0px">Group Id </p> 
                                    <p style="font-size:13px;padding:0px">{{ $item->groupId }} </p> 
                            </div>
                        </div>
                    </center>   
                </div>
            @endforeach
            <div class="pagination-wrapper"> {!! $group_line->appends(['search' => Request::get('search')])->render() !!} </div>
            <!--------------------------------------------------------------End Mobile -------------------------------------------------------------->

        </div>
    </div>
</div>

    <!-- <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header"><i class="fab fa-line" style="color:#00c300;"></i> กลุ่มไลน์</h3>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/group_line') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <tr class="text-center">
                                        <th>ชื่อกลุ่มไลน์</th>
                                        <th>เจ้าของกลุ่ม</th>
                                        <th>เขตเวลา</th>
                                        <th>ภาษา</th>
                                        <th>GroupId</th>
                                        <th>PictureUrl</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center ">
                                        
                                @foreach($group_line as $item)
                                    <tr>
                                        <td>
                                            <img style="width:50px; hight: 50px;border-radius: 50% 50%;" src="{{ $item->pictureUrl }}" alt="image of client" title="client" class="img-fluid customer">
                                            <b>{{ $item->groupName }}</b> 
                                        </td>
                                        <td> <br> {{ $item->owner }}</td>
                                        <td><br>{{ $item->time_zone }}</td>
                                        <td><br>{{ $item->language }}</td>
                                        <td><br>{{ $item->groupId }}</td>
                                        <td>{{ $item->pictureUrl }}</td>
                                        <td>
                                            <a href="{{ url('/group_line/' . $item->id) }}" title="View Group_line"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/group_line/' . $item->id . '/edit') }}" title="Edit Group_line"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/group_line' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Group_line" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $group_line->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
