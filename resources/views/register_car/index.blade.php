@extends('layouts.main')

@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9">
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Car Type</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>act</th>
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

                                        @if(!empty($item->act))
                                            <td>{{ $item->act }}</td>
                                        @else
                                            <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit') }}" data-toggle="modal" data-target="#Modal_act"><i class="fas fa-edit"></i></a></td>
                                        @endif

                                        <!-- Modal act -->
                                        <div class="modal fade" id="Modal_act" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div>
                                                            <div class="form-group {{ $errors->has('act') ? 'has-error' : ''}}">
                                                                <input class="form-control" name="act" type="date" id="act" value="{{ isset($register_car->act) ? $register_car->act : '' }}"  >
                                                                {!! $errors->first('act', '<p class="help-block">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>

                                        @if(!empty($item->insurance))
                                            <td>{{ $item->insurance }}</td>
                                        @else
                                            <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit') }}"><i class="fas fa-edit"></i></a></td>
                                        @endif

                                        <td>
                                            
                                            <a class="btn btn-success btn-sm" href="#"><i class="fas fa-hand-holding-usd"></i> Sell</a>
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
@endsection
