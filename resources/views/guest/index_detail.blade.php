@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owner alert report</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/guest/create') }}" class="btn btn-success btn-sm" title="Add New Guest">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->

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

                        <br/>
                        <br/>
                        <div class="container">
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-7"><b>เลขทะเบียน</b></div>
                                        <div class="col-2"><b>All reports</b></div>
                                        <div class="col-2"></div>
                                    </div>
                                    <hr>
                                    @foreach($guest as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            &nbsp;&nbsp;&nbsp;{{ $loop->iteration }}
                                        </div>
                                        <div class="col-7">
                                            {{ $item->name }}
                                        </div>
                                        <div class="col-2">
                                            {{ $item->registration }}
                                        </div>
                                        <div class="col-2">
                                            <a class="btn btn-sm btn-outline-info " href="">--</a>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
