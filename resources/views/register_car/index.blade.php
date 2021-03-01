@extends('layouts.main')
@section('add')
<style>
.order-card {
    color: #fff;
}

.bg-c-monte-carlo {
    background: linear-gradient(45deg,#CC95C0,#DBD4B4,#7AA1D2);
}

.bg-c-paradise {
    background: linear-gradient(30deg,#7AA1D2,#F8CDDA);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 17px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
@endsection
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
                        <h4>รถยนต์</h4>
                        <br/>
                        <br/>
                        <div class="row">
                        @foreach($register_car as $item)
                            <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                        <h4>{{ $item->brand }} {{ $item->generation }} </h4><br>
                                            @if(!empty($item->act))
                                                @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>    
                                                        <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>
                                                            <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                    <!-- <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                        <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif

                                            @if(!empty($item->insurance))
                                                @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                     <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                 @else
                                                 <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                    <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                            <h6 class="text-right"><span class="f-left">insurance</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif
                                        <!-- <h6 class="text-right"><span class="f-left">insurance</span><span>2021-02-12</span></h6><br> -->
                                        <a class="btn btn-success btn-sm f-left" style="border-radius: 15px;" href="{{ url('/register_car/' . $item->id ) }}"><i class="fas fa-hand-holding-usd"></i> Sell </a>
                                        <a class="btn btn-primary btn-sm f-right" style="border-radius: 15px;" href="#"><i class="fas fa-donate"></i> Promise</a>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        </div>
                        <br/>
                        <br/>
                        <h4>รถจักรยานยนต์</h4>
                        <br/>
                        <br/>
                        <div class="row">
                        @foreach($register_motorcycles as $item)
                        <div class="col-lg-6 col-md-4 ">
                                <div class="card  order-card">
                                    <div class="card-block">
                                        <h4>{{ $item->brand }} {{ $item->generation }} </h4><br>
                                            @if(!empty($item->act))
                                                @if((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>    
                                                        <!-- <td><b><a class=" text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->act) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                    <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></span></h6><br>
                                                            <!-- <td><b><a class=" text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;</a></b></td> -->
                                                @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                    <!-- <td><b><a class=" text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->act }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                                <h6 class="text-right"><span class="f-left">Vehicle Act</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                        <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif

                                            @if(!empty($item->insurance))
                                                @if((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 30 && (strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) >= 1)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                <!-- <td><b><a class="text-warning" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @elseif((strtotime($item->insurance) - strtotime($date_now))/  ( 60 * 60 * 24 ) <= 0)
                                                <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                     <!-- <td><b><a class="text-danger" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                 @else
                                                 <h6 class="text-right"><span class="f-left">insurance</span><span><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;</a></span></h6><br>
                                                    <!-- <td><b><a class="text-success" href="{{ url('/register_car/' . $item->id . '/edit_act') }}">{{ $item->insurance }}&nbsp;<i class="fas fa-pencil-alt"></i></a></b></td> -->
                                                @endif
                                            @else
                                            <h6 class="text-right"><span class="f-left">insurance</span><span><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></span></h6><br>
                                                <!-- <td><a class="btn btn-warning btn-sm" href="{{ url('/register_car/' . $item->id . '/edit_act') }}"><i class="fas fa-pencil-alt"></i></a></td> -->
                                            @endif
                                        <!-- <h6 class="text-right"><span class="f-left">insurance</span><span>2021-02-12</span></h6><br> -->
                                        <a class="btn btn-success btn-sm f-left" style="border-radius: 15px;" href="{{ url('/register_car/' . $item->id ) }}"><i class="fas fa-hand-holding-usd"></i> Sell </a>
                                        <a class="btn btn-primary btn-sm f-right" style="border-radius: 15px;" href="#"><i class="fas fa-donate"></i> Promise</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
