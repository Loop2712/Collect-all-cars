@extends('layouts.main')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div style="border : none;" class="card">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-12 col-md-6">
                        <div class="btn-group float-right " role="group" aria-label="Basic example">
                            <button style="background-color: #e26a6c;color: #fff" type="button" class="btn"><i class="fas fa-map-pin"></i> &nbsp;ใกล้ฉัน</button>
                            <button style="background-color: #db474a;color: #fff" type="button" class="btn"><i class="fas fa-city"></i> &nbsp;กรุงเทพฯ</button>
                            <button style="background-color: #d62e31;color: #fff" type="button" class="btn"><i class="far fa-newspaper"></i> &nbsp;ทั้งหมด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ข่าวทั้งหมด -->
<br>
<div id="all_news" class="container">
    <div class="row">
        @foreach($news as $item)
        <div class="col-12 col-md-4">
            <div class="card" style="width: 22rem;">
                <img src="{{ $item->cover_photo }}" class="card-img-top" >
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;" class="card-text">{{ $item->content }}</p>
                    <hr>
                    <p><b>REPORTER :</b> {{ $item->name }}</p>
                    <!-- <a href="#" class="btn btn-primary float-right">อ่านเพิ่มเติม..</a> -->
                    <a href="{{ url('/news/' . $item->id) }}" title="อ่านเพิ่มเติม.."><button class="float-right btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> อ่านเพิ่มเติม..</button></a>
                </div>
            </div>
            <br>
        </div>
        @endforeach
    </div>
    <hr>
</div>

<!-- ใกล้ฉัน -->



<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">News</div>
                <div class="card-body">
                    <a href="{{ url('/news/create') }}" class="btn btn-success btn-sm" title="Add New News">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/news') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Location</th>
                                    <th>Photo</th>
                                    <th>Cover photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td><img width="150" src="{{ url('storage')}}/{{ $item->photo }}" ></td>
                                    <td><img width="150" src="{{ $item->cover_photo }}" ></td>
                                    <td>
                                        <a href="{{ url('/news/' . $item->id) }}" title="View News"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/news/' . $item->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/news' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
