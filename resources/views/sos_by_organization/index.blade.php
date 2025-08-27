@extends('layouts.partners.theme_partner_new')

@section('content')

@php
    $userOrganizationName = Auth::user()->organization; 
    $partner = \App\Models\Partner::where('name', $userOrganizationName)->whereNull('name_area')->first();
    $count_partner = \App\Models\Sos_by_organization::where('partner_id', $partner->id)->count();
@endphp
<!-- <h1>
{{$count_partner}}

<br>

{{ $partner->id}}
</h1> -->
<style>
    .smartphone-portrait {
        padding: 55px 2%;
        border-radius: 30px;
        border: .5px solid #E0E0E0;
        background-color: #FFF;
        width: 100%;
        float: left;
        box-shadow: inset 0px 0px 0px -4px rgba(255, 255, 255, 0.1), 1px 1px 6px rgba(0, 0, 0, 0.05), 1px 1px 8px rgba(0, 0, 0, 0.07);
        
    }
    .btnEdit-Delete{
        transition: all .15s ease-in-out;
        position: absolute;
        right: -18px;
        top:3px;
    }

    .btn-organization:hover .btnEdit-Delete{
        transition: all .15s ease-in-out;
        position: absolute;
        right: 5px;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-3" style="width: 291px !important;">
            <div class="p-2">
                <h5>ตัวอย่าง</h5>
                <div class="smartphone-portrait">
                    <div style="overflow: auto;height:400px;-ms-overflow-style: none;scrollbar-width: none;">
                        <div class="w-100 d-flex justify-content-start">
                            <div style="font-size: 9px;color: #000;">
                                <i class="fa-regular fa-envelope"></i> <a style="color: #000;" href="mailto:contact.viicheck@gmail.com">contact.viicheck@gmail.com</a>
                                <i class="fa-regular fa-phone"></i> <a style="color: #000;" href="tel:020277856">02-0277856</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3 pb-1" style="border-bottom: 1px solid #db2d2e;">
                            <div >
                                <a href="http://localhost/Collect-all-cars/public">
                                    <img width="50px" src="{{ asset('img/logo/VII-check-LOGO-W-v1.png') }}">
                                </a>
                            </div>
                            <div class="d-flex align-items-center ">
                                <div class="me-2" style="width: 25px; height: 25px; background-color: #bfcddc;">
                                    <img style="width: 25px; height: 25px;object-fit: cover;border-radius: 5px;" src="{{ url('storage') . '/' . (Auth::user()->photo ? Auth::user()->photo : Auth::user()->avatar) }}" alt="">
                                </div>
                                <i style="font-size: 10px;" class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                        <div style="width: 100%; height: 200px; background-color: #bfcddc;margin-top: 10px;border-radius: 10px;background-image: url('img/logo/VII-check-LOGO-W-v1.png');">
                        <img style="border-radius: 10px;" width="100%" src="{{ asset('img/icon/map.png') }}">
                        </div>
                        <p class="mb-0 mt-3">
                            {{Auth::user()->organization}}
                        </p>
                        @foreach($sos_by_organization as $item)  
                            <div id="a_help" class="btn-organization mail-shadow btn btn-md btn-block btn-warning text-dark mb-2 w-100" style="background-color: #81EDF1 !important;position: relative;;font-family: 'Kanit', sans-serif;border-radius:10px;color:white;overflow: hidden;">
                                <div class="d-flex">
                                    <div class="col-3 p-0 d-flex align-items-center">
                                        <div class="justify-content-center col-12 p-0">
                                            <img src="https://www.viicheck.com/storage/uploads/siDWuqz5ffPyK20ASQnHttFfg0pgk4Vcc33xl010.png" width="37.5px" height="37.5px" style="border:white solid 3px;border-radius:50%;background-color: #ffffff;">
                                        </div>
                                    </div>

                                    
                                    <div class="d-flex align-items-center col-9 text-center" >
                                        <div class="justify-content-center col-12">
                                            <b>
                                                <span style="font-size: 12px;" class="d-block">
                                                    ขอความช่วยเหลือ
                                                </span>
                                                <span style="font-size: 12px;" class="d-block notranslat" id="name_sub_organization_{{$item->id}}">{{$item->name_sub_organization}}</span>
                                                <div class="px-3 d-none"id="edit_name_sub_organization_{{$item->id}}">
                                                    <form style="position: relative;" method="POST" action="{{ url('/sos_by_organization/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                        {{ method_field('PATCH') }}
                                                        {{ csrf_field() }}
                                                        @php 
                                                            $formMode = 'edit';
                                                        @endphp
                                                        <input style="font-size: 12px;"  class="form-control" name="name_sub_organization" type="text" id="name_sub_organization" value="{{ isset($item->name_sub_organization) ? $item->name_sub_organization : ''}}" >
                                                        <!-- <input   type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> -->
                                                        <!-- <button class="btn btn-success p-1 text-center" type="submit" style="position: absolute;top: 0;right: 0; font-size: 11.3px;">
                                                        <i class="fa-solid fa-check"></i>
                                                        </button> -->

                                                        <button class="btn btn-success" style="position: absolute;top: 2px  ;right: 5px;font-size: 10px;display: block;padding: 2px;margin-top: 3px;" type="submit"><i class="fa-solid fa-check"style="font-size: 10px;margin:auto"></i></button>
                                                    </form>
                                                </div> 

                                            </b>
                                        </div>
                                        <div class="btnEdit-Delete">
                                            <!-- <a href="{{ url('/sos_by_organization/' . $item->id . '/edit') }}" class="btn btn-warning" style="font-size: 10px;display: block;padding: 2px;"><i class="fa-solid fa-pen-to-square"style="font-size: 10px;margin:auto"></i></a> -->
                                            <button onclick="document.querySelector('#name_sub_organization_{{$item->id}}').classList.toggle('d-none');  document.querySelector('#edit_name_sub_organization_{{$item->id}}').classList.toggle('d-none');" class="btn btn-warning" style="font-size: 10px;display: block;padding: 2px;"><i class="fa-solid fa-pen-to-square"style="font-size: 10px;margin:auto"></i></button>

                                            <form method="POST" action="{{ url('/sos_by_organization' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger" style="font-size: 10px;display: block;padding: 2px;margin-top: 3px;" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash"style="font-size: 10px;margin:auto"></i></button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-danger">เพิ่มหน่วยงานการช่วยเหลือ</h5>
                        </div>
                        <!-- <a href="{{ url('/sos_by_organization') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/sos_by_organization') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @php 
                             $formMode = 'create';
                            @endphp
                            <div class="form-group d-none {{ $errors->has('name_partner') ? 'has-error' : ''}}">
                                <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
                                <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ Auth::user()->organization}}" >
                                {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group d-none {{ $errors->has('partner_id') ? 'has-error' : ''}}">
                                <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
                                <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ $partner->id}}" >
                                {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="my-3 form-group {{ $errors->has('name_sub_organization') ? 'has-error' : ''}}">
                                <label for="name_sub_organization" class="control-label">{{ 'พื้นที่' }}</label>
                                <input class="form-control" placeholder="กรอกชื่อพื้นที่" name="name_sub_organization" type="text" id="name_sub_organization" value="{{ isset($sos_by_organization->name_sub_organization) ? $sos_by_organization->name_sub_organization : ''}}" >
                                {!! $errors->first('name_sub_organization', '<p class="help-block">:message</p>') !!}
                            </div>

                            <!-- <div class="mydict mb-3">
                                <label class="label_toggle_type" onclick="">
                                    <input class="radio_toggle_type" type="radio" name="radio" checked="" onchange="document.querySelector('#div_phone_number').classList.toggle('d-none');document.querySelector('#div_group_line').classList.toggle('d-none');">
                                    <span>phone</span>
                                </label>
                                <label class="label_toggle_type" onclick="">
                                    <input class="radio_toggle_type" type="radio" name="radio" onchange="document.querySelector('#div_phone_number').classList.toggle('d-none');document.querySelector('#div_group_line').classList.toggle('d-none');">
                                    <span>Group Line Id</span>
                                </label>
                            </div>

                            <style>
                                .radio_toggle_type:focus {
                                    outline: 0;
                                    border-color: #2260ff;
                                    box-shadow: 0 0 0 4px #b5c9fc;
                                }

                                .mydict div {
                                    display: flex;
                                    flex-wrap: wrap;
                                    margin-top: 0.5rem;
                                    justify-content: center;
                                }

                                .mydict input[type="radio"] {
                                    clip: rect(0 0 0 0);
                                    clip-path: inset(100%);
                                    height: 1px;
                                    overflow: hidden;
                                    position: absolute;
                                    white-space: nowrap;
                                    width: 1px;
                                }

                                .mydict input[type="radio"]:checked + span {
                                box-shadow: 0 0 0 0.0625em #0043ed;
                                background-color: #dee7ff;
                                z-index: 1;
                                color: #0043ed;
                                }

                                .label_toggle_type span {
                                    display: block;
                                    cursor: pointer;
                                    background-color: #fff;
                                    padding: 0.375em .75em;
                                    position: relative;
                                    margin-left: .0625em;
                                    box-shadow: 0 0 0 0.0625em #b5bfd9;
                                    letter-spacing: .05em;
                                    color: #3e4963;
                                    text-align: center;
                                    transition: background-color .5s ease;
                                }

                                .label_toggle_type:first-child span {
                                    border-radius: .375em 0 0 .375em;
                                }

                                .label_toggle_type:last-child span {
                                    border-radius: 0 .375em .375em 0;
                                    margin-left: -5px;
                                }
                            </style> -->
                            <!-- <div id="div_phone_number" class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}"> -->
                                <!-- <label for="phone" class="control-label">{{ 'Phone' }}</label> -->
                                <!-- <input class="form-control" name="phone" type="text" id="phone" placeholder="กรอกหมายเลขโทรศัพท์" value="{{ isset($sos_by_organization->phone) ? $sos_by_organization->phone : ''}}" > -->
                                <!-- //{!! $errors->first('phone', '<p class="help-block">:message</p>') !!} -->
                            <!-- </div> -->
                            <!-- <div id="div_group_line" class="form-group {{ $errors->has('group_line_id') ? 'has-error' : ''}} d-none"> -->
                                <!-- <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label> -->
                                <!-- <select class="form-select" id="" aria-label="Example select with button addon">
                                    <option value="" selected>กรุณาเลือกกลุ่มไลน์</option>
                                    <option value="">กลุ่มไลน์ทิพย์ 1</option>
                                    <option value="">กลุ่มไลน์ทิพย์ 2</option>
                                </select> -->
                              <!-- // <input class="form-control" name="group_line_id" type="number" id="group_line_id" value="{{ isset($sos_by_organization->group_line_id) ? $sos_by_organization->group_line_id : ''}}" >
                                //{!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!} -->
                            <!-- </div> -->
                            

                            @if($count_partner <= 2)
                            <div class="form-group mt-3">
                                <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                            </div>
                            @else
                            <div class="form-group mt-3">
                                <a href="" class="btn btn-primary" onclick="alert('ขออภัยเพิ่มพื้นที่ได้สูงสุด 3 พื้นที่');">Create</a>
                            </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        <!-- <div class="col-md-9">
            <div class="card">
                <div class="card-header">Sos_by_organization</div>
                <div class="card-body">
                    <a href="{{ url('/sos_by_organization/create') }}" class="btn btn-success btn-sm" title="Add New Sos_by_organization">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/sos_by_organization') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name Partner</th>
                                    <th>Partner Id</th>
                                    <th>Name Sub Organization</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sos_by_organization as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name_partner }}</td>
                                    <td>{{ $item->partner_id }}</td>
                                    <td>{{ $item->name_sub_organization }}</td>
                                    <td>
                                        <a href="{{ url('/sos_by_organization/' . $item->id) }}" title="View Sos_by_organization"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/sos_by_organization/' . $item->id . '/edit') }}" title="Edit Sos_by_organization"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/sos_by_organization' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_by_organization" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $sos_by_organization->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
</div>

           
@endsection