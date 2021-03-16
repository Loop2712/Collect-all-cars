@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รถลงทะเบียน Vmove / <span style="font-size: 18px;">Vmove register</span> </h3>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>คันที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-2">
                                            <b>ยี่ห้อ</b><br>
                                            Brand
                                        </div>
                                        <div class="col-2">
                                            <b>รุ่น</b><br>
                                            Model
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>หมายเลขทะเบียน</b><br>
                                                Registration number
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ประเภท</b><br>
                                                Car type
                                            </center>
                                        </div>
                                        <div class="col-3">
                                            <center>
                                                <b>เจ้าของรถ</b><br>
                                                Car owner
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
                                        <div class="col-2">
                                            <p style="color: #FF0000; font-size: 20px;"><b>{{ $item->title }}</b></p>
                                        </div>
                                        <div class="col-2">
                                            <p style="color: #ff6363; font-size: 20px;"><b>{{ $item->title }}</b></p>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <span> {{ $item->created_at }}</span><br>
                                            </center>
                                        </div>
                                        <div class="col-2">
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
