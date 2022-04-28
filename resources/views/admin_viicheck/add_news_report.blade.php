@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">เพิ่มข่าว Vnews / <span style="font-size: 18px;">Vnews add news</span> </h3>
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>ข่าวที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-3">
                                            <b>หัวข้อข่าว</b><br>
                                            Title news
                                        </div>
                                        <div class="col-2">
                                            <b>ตำแหน่ง</b><br>
                                            Location
                                        </div>
                                        <div class="col-2">
                                            <b>วันที่เพิ่มข่าว</b><br>
                                            Report date
                                        </div>
                                        <div class="col-1">
                                            <center>
                                                <b>รายงาน</b><br>
                                                Report
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>ผู้ลงข่าว</b><br>
                                                Reporter
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($add_news_report as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>
                                                {{ $item->id }}
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <p style="color: #FF0000; font-size: 18px;">
                                                <a target="bank" class="btn btn-sm" href="{{ url('/news') . '/' . $item->id }}"><i class="far fa-eye text-info"></i></a>
                                                <b>{{ $item->title }}</b>
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p style="color: #ff6363; font-size: 18px;"><b>{{ $item->province }}</b></p>
                                        </div>
                                        <div class="col-2">
                                            {{ $item->created_at }}
                                        </div>
                                        <div class="col-1">
                                            <center>
                                                {{ $item->report }}
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <p class="float-right text-success">
                                                <span style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                    <b>{{ $item->name }}</b>
                                                    <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i></a>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $add_news_report->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
