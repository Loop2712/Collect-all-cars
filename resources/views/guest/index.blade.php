@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Owner alert report</h3>
                    <!-- <div class="card-body">
                        <div>
                            <form method="GET" action="{{ url('/guest') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                    </div> -->
                        <!-- <a href="{{ url('/guest/create') }}" class="btn btn-success btn-sm" title="Add New Guest">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1"></div>
                                        <div class="col-5"><b>Name</b></div>
                                        <div class="col-2"><b>All reports</b></div>
                                        <!-- <div class="col-2"><b>Ranking</b></div> -->
                                        <div class="col-2"></div>
                                    </div>
                                    <hr>
                                    @foreach($guest as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>{{ $loop->iteration }}</center>
                                        </div>
                                        <div class="col-5">
                                            <h5 class="text-success"><b>{{ $item->name }}</b></h5>
                                        </div>
                                        <div class="col-2">
                                            <b>{{ $item->count }}</b>
                                        </div>
                                        <!-- <div class="col-2"> user->ranking
                                                @switch($item->name)
                                                    @case('Senior')
                                                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-crown" style="color: #B8860B"></i> Senior</a>
                                                    @break
                                                    @case('Common')
                                                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-award" style="color: #87CEEB"></i> Common</a>
                                                    @break
                                                    @case('Normal')
                                                        <a class="btn btn-sm btn-light " href=""><i class="fas fa-shield-alt" style="color: #3CB371"></i> Normal</a>
                                                    @break
                                                @endswitch
                                        </div> -->
                                        <div class="col-2">
                                            <a class="btn btn-sm btn-outline-info" href="{{ url('/index_detail/') }}?name={{ $item->name }}"><i class="fas fa-eye"></i> ดูข้อมูล</a>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $guest->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
