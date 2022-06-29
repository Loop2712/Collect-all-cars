
@extends('layouts.partners.theme_partner_new')


@section('content')
@if($user->role == "admin-condo")

<div class="row" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="font-weight-bold mb-0">
                                    <b>รายการแจ้งซ่อมบำรุง</b>
                                </h4>
                            </div>
                            <div class="col-6">
                                <a style="float: right;" href="{{ url('/notify_repair/create') }}" class="btn btn-success btn-sm" title="Add New Parcel">
                                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรายการ
                                </a>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-12">
                                @foreach($all_building as $item)
                                    @if($building == $item->building)
                                        <a href="{{ url('/notify_repair') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-info text-white" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @else
                                        <a href="{{ url('/notify_repair') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-outline-info" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-12">
                        <h5>รายการแจ้งซ่อมอาคาร : <b style="font-size:25px;" class="text-danger" id="span_building">{{ $building }}</b></h5>
                    </div>
                    <br><br>
                    <hr>
                    @foreach($notify_repair as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <span style="line-height: 25px;"><i class="fas fa-address-card"></i> อาคาร : {{ $item->user_condo->building }} ห้อง : {{ $item->user_condo->room_number }}</span>
                                <br>
                                <span style="line-height: 25px;"><i class="far fa-clock"></i> {{ $item->created_at }}</span>
                                <br>
                                <span style="line-height: 25px;"><i class="fas fa-user-shield"></i> {{ $item->name_staff }}</span>
                            </div>
                            <div class="col-4">
                                <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                    <img style="width:100%;margin-top: 8px;" src="{{ url('storage')}}/{{ $item->photo }}">
                                </a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br><br>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
