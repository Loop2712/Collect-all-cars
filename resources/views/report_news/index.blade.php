@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">รายงานความไม่เหมาะสม / <span style="font-size: 18px;">Report news</span> </h3>
                    <div class="card-body">
                        <a href="{{ url('/report_news/create') }}" class="btn btn-success btn-sm d-none" title="Add New Report_news">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/report_news') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right d-none" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4">
                                <b>หัวข้อข่าว</b>
                                <br>
                                Title news
                            </div>
                            <div class="col-5">
                                <b>เหตุผลการรายงาน</b>
                                <br>
                                Title reports
                            </div>
                            <div class="col-2">
                                <b>วันที่รายงาน</b>
                                <br>
                                Report date 
                            </div>
                        </div>
                        <hr>
                        @foreach($report_news as $item)
                        <div class="row">
                            <div class="col-1">
                                <center>
                                    {{ $item->id }}
                                </center>
                            </div>
                            <div class="col-4">
                                <a target="bank" class="btn btn-sm" href="{{ url('/news') . '/' . $item->news_id }} "><i class="far fa-eye text-info"></i></a>
                                <span style="font-size: 18px;" class="text-danger"><b>{{ $item->title_news }}</b></span>
                            </div>
                            <div class="col-5">
                                {{ $item->content }}
                            </div>
                            <div class="col-2">
                                <span class="text-danger">{{ $item->created_at }}</span>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        <div class="pagination-wrapper"> {!! $report_news->appends(['search' => Request::get('search')])->render() !!} </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
