@extends('layouts.main')

@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header">รถของฉัน</div>
                    <div class="card-body">
                        <a href="{{ url('/register_car/create') }}" class="btn btn-info btn-sm" title="Add New Register_car">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรถคันใหม่
                        </a>

                        <form method="GET" action="{{ url('/register_car') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <div class="card">
                            <div class="card-header">รถยนต์</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Car Type</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Vehicle Act</th>
                                                    <th>insurance</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($register_car as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    @if($item->car_type == "car")
                                                        <td><h4><i class="fas fa-car-side text-danger"></i></h4></td>
                                                    @elseif($item->car_type == "motorcycle")
                                                        <td><h4><i class="fas fa-motorcycle text-success"></i></h4></td>
                                                    @endif
                                                    <td><img width="40"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png"></td>

                                                    <td>{{ $item->generation }}</td>
                                                    <!-- act -->
                                                    @if(!empty($item->act))
                                                        @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @else
                                                            <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @endif
                                                    @else
                                                        <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td>
                                                    @endif
                                                    <!-- end act -->

                                                    <!-- insurance -->
                                                    @if(!empty($item->insurance))
                                                        @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @else
                                                            <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @endif
                                                    @else
                                                        <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td>
                                                    @endif
                                                    <!-- end insurance -->

                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="{{ url('/register_car/' . $item->id ) }}"><i class="fas fa-hand-holding-usd"></i> Sell</a>
                                                        <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-donate"></i> Promise</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div class="card">
                            <div class="card-header">รถจักรยานยนต์</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Car Type</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Vehicle Act</th>
                                                    <th>insurance</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($register_motorcycles as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    @if($item->car_type == "car")
                                                        <td><h4><i class="fas fa-car-side text-danger"></i></h4></td>
                                                    @elseif($item->car_type == "motorcycle")
                                                        <td><h4><i class="fas fa-motorcycle text-success"></i></h4></td>
                                                    @endif
                                                    <td><img width="40"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png"></td>

                                                    <td>{{ $item->generation }}</td>
                                                    <!-- act -->
                                                    @if(!empty($item->act))
                                                        @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @else
                                                            <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @endif
                                                    @else
                                                        <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td>
                                                    @endif
                                                    <!-- end act -->

                                                    <!-- insurance -->
                                                    @if(!empty($item->insurance))
                                                        @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                            <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                            <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @else
                                                            <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td>
                                                        @endif
                                                    @else
                                                        <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td>
                                                    @endif
                                                    <!-- end insurance -->

                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="{{ url('/register_car/' . $item->id ) }}"><i class="fas fa-hand-holding-usd"></i> Sell</a>
                                                        <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-donate"></i> Promise</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
