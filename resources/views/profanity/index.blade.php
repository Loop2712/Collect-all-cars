@extends('layouts.admin')

@section('content')
<br>
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 text-center" >
                                <h2><i class="fas fa-ban" style="color:#E74C3C;"></i> แบนคำหยาบ</h2>
                            </div>
                            <div class="col-md-3 col-sm-0 "></div>
                            <div class="col-md-3 col-sm-12 text-center d-flex justify-content-end" style="top:5px;">
                                <form method="POST" action="{{ url('/profanity') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input class="form-control" name="content" type="text" id="content" placeholder="เพิ่มคำแบน" value="{{ isset($profanity->content) ? $profanity->content : ''}}" required >
                                        
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button> 
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <br style="d-block d-md-none">
                            <div class="col-md-3 col-sm-8 text-center d-flex justify-content-end">
                                <form method="GET" action="{{ url('/profanity') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">แบนคำหยาบ</div>
                    <div class="card-body">
                        <a href="{{ url('/profanity/create') }}" class="btn btn-success btn-sm" title="Add New Profanity">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม
                        </a>

                        <form method="GET" action="{{ url('/profanity') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <!------------------------------------------------------ PC ------------------------------------------------------>
                        <div class="card d-none d-lg-block">
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                        <tr class="text-center">
                                            <th style="font-size: 15px;">No.</th>
                                            <th style="font-size: 15px;">คำที่แบน</th>
                                            <th style="font-size: 15px;">เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profanity as $item)
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;font-size:15px;">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle;font-size:15px;">{{ $item->content }}</td>
                                            <td>
                                                <a href="{{ url('/profanity/' . $item->id) }}" title="View Profanity"><button class="d-none btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/profanity/' . $item->id . '/edit') }}" title="Edit Profanity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                                <form method="POST" action="{{ url('/profanity' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Profanity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> ลบ</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> {!! $profanity->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                        <!------------------------------------------------------ End PC ------------------------------------------------------>
                        <!------------------------------------------------------ Mobile ------------------------------------------------------>
                        @foreach($profanity as $item)
                            <div class="card col-12 d-block d-md-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#E74C3C;border-bottom-width: 4px; margin-bottom: 10px;">
                                <center>
                                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                                        <div class="col-10" style="margin-bottom:0px">
                                                <h5 style="margin-bottom:0px">{{ $item->content }}</h5>
                                        </div> 
                                        <div class="col-2 align-self-center" style="vertical-align: middle;">
                                            <i class="fas fa-angle-down" data-toggle="collapse" data-target="#Ban_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" ></i>
                                            </div>
                                        <div class="col-12 collapse" id="Ban_{{ $item->id }}">
                                            <hr>
                                            <form method="POST" action="{{ url('/profanity' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" style="border-radius: 25px;" class="btn btn-danger btn-sm" title="Delete Profanity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/profanity/' . $item->id . '/edit') }}" title="Edit Profanity"><button style="border-radius: 25px;" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        </div>
                                    </div>
                                </center>   
                            </div>
                        @endforeach
                        <div class="pagination-wrapper"> {!! $profanity->appends(['search' => Request::get('search')])->render() !!} </div>
                        <!------------------------------------------------------ End Mobile ------------------------------------------------------>
                    </div>
                </div>
            </div>
        </div>
    @endsection
