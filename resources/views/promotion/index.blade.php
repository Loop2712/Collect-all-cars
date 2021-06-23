@extends('layouts.viicheck')
@section('content')
    <div class="container" style="margin-top:168px;">
        @if(Request::get('pomo_type') == "car")
            <a class="d-none" id="btn_click_pomo" onclick="document.getElementById('pomo_car').click();">btn_click_pomo_car</a>
        @endif
        @if(Request::get('pomo_type') == "motorcycle")
            <a class="d-none" id="btn_click_pomo" onclick="document.getElementById('pomo_mortor').click();">btn_click_pomo_mortor</a>
        @endif
        <div class="row">
            <div class="col-md-12"> 
            <!------------------------------------------------pc--------------------------------------------------->
                <div class="card d-none d-lg-block" >
                    <div class="card-header">
                        <span style="font-size: 25px;" class="text-dark"><b>โปรโมชั่น</b></span>
                    </div>
                    <br>
                    <div class="col-9 col-md-11" style="margin-top:-20px;">
                        <ul class="nav nav-pills nav-pills-danger mt-4"   role="tablist" >
                            <li class="nav-item" >
                            <a id="pomo_car" class="active btn btn-outline-danger" href="#" role="tab" data-toggle="tab" style=" width: 115px;" onclick="
                                    document.querySelector('#show_car').classList.remove('d-none'),
                                    document.querySelector('#show_mortor').classList.add('d-none');">
                                    <b style="font-size: 15px; text-center;">รถยนต์</b>
                                </a>
                            </li>&nbsp;
                            <li class="nav-item d-none d-lg-block">
                            <a id="pomo_mortor" class="btn btn-outline-danger" href="#" role="tab" data-toggle="tab" onclick="                                        
                                        document.querySelector('#show_car').classList.add('d-none'),
                                        document.querySelector('#show_mortor').classList.remove('d-none');">
                                <b style="font-size: 15px;">รถจักรยานยนต์</b>
                                </a>
                            </li>
                        </ul>
                    </div>

                    
                            
                    <div  id="show_car" class="card-body">
                        <div class="row">
                            @foreach($promotion as $item)
                                <div class="col-12 col-md-3" style="padding: 15px;">
                                    <a href="{{ $item->link }}" class="text-dark">
                                        <div class="card main-shadow">
                                            <img style="  width: 100%;height: 300px;object-fit: contain; " src="{{ $item->photo }}" class="card-img-top center" style="padding: 10px;">
                                            <div class="card-body">
                                                <div>
                                                    <h4 class="card-title">{{ $item->company }}</h4>
                                                    <p style="font-size: 15px;white-space: nowrap;width: 210px;overflow: hidden;text-overflow: ellipsis;"class="card-title"><b>{{ $item->titel }}</b></p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="card-text"><i class="far fa-clock"></i>&nbsp;{{ $item->time_period }}</p>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <a href="{{ $item->link }}" class="btn btn-sm btn-primary float-right main-shadow main-radius">ดูเพิ่มเติม</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div> 
                                    </a>
                                </div>
                           
                            @endforeach
                        </div>
                    </div>

                    <div  id="show_mortor" class="card-body d-none">
                        <div class="row">
                            @foreach($promotion_motor as $item)
                                <div class="col-12 col-md-3" style="padding: 15px;">
                                    <a href="{{ $item->link }}" class="text-dark">
                                        <div class="card main-shadow">
                                            <img style="  width: 100%;height: 300px;object-fit: contain; " src="{{ $item->photo }}" class="card-img-top center" style="padding: 10px;">
                                            <div class="card-body">
                                                <div>
                                                    <h4 class="card-title">{{ $item->company }}</h4>
                                                    <p style="font-size: 15px;white-space: nowrap;width: 210px;overflow: hidden;text-overflow: ellipsis;"class="card-title"><b>{{ $item->titel }}</b></p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="card-text"><i class="far fa-clock"></i>&nbsp;{{ $item->time_period }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </a>
                                </div>
                           
                            @endforeach
                        </div>
                    </div>
                    <!------------------------------------------------mobile--------------------------------------------------->
                    

                    <!-- <div class="card-body">
                        <a href="{{ url('/promotion/create') }}" class="btn btn-success btn-sm" title="Add New Promotion">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/promotion') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Company</th><th>Titel</th><th>Detail</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($promotion as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->company }}</td><td>{{ $item->titel }}</td><td>{{ $item->detail }}</td>
                                        <td>
                                            <a href="{{ url('/promotion/' . $item->id) }}" title="View Promotion"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/promotion/' . $item->id . '/edit') }}" title="Edit Promotion"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/promotion' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Promotion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $promotion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div> -->
                </div>
                
                <!------------------------------------------------mobile--------------------------------------------------->
                <div class="card d-block d-md-none" style="margin-top:-50px">
                    <div class="card-header">
                        <span style="font-size: 25px;" class="text-dark"><b>โปรโมชั่น</b></span>
                    </div>
                    <div class="col-12 col-md-11" style="margin-top:20px;">
                        <ul class="nav nav-pills nav-pills-danger mt-4"   role="tablist" >
                            <li class="nav-item" >
                            <a class="active btn btn-outline-danger" href="#" role="tab" data-toggle="tab" style=" width: 115px;" onclick="
                                    document.querySelector('#show_car_m').classList.remove('d-none'),
                                    document.querySelector('#show_mortor_m').classList.add('d-none');">
                                    <b style="font-size: 15px; text-center;">รถยนต์</b>
                                </a>
                            </li>
                          &nbsp;
                            <li class="nav-item d-block d-md-none" >
                            <a class="btn btn-outline-danger" href="#" role="tab" data-toggle="tab" onclick="
                                        document.querySelector('#show_car_m').classList.add('d-none'),
                                        document.querySelector('#show_mortor_m').classList.remove('d-none');">
                                <b style="font-size: 15px;">รถจักรยานยนต์</b>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                    <div id="show_car_m" class="card-body"  style="margin-top:-20px">
                        <div class="row">
                            @foreach($promotion as $item)
                            <a href="{{ $item->link }}">
                                <div class="col-12 card main-shadow" style=" border-radius: 20px; margin-top:10px"> 
                                    <div class="row">
                                        <div class="col-5" style="bgcolor:Black"> 
                                            <img style="margin:2px 0px 0px -5px; width:100px;height:100px;object-fit:contain ;" src="{{ $item->photo }}" alt="" >
                                        </div>
                                        <div class="col-7" style="color:black;padding:7px;">
                                            <h5 class="card-title" style=" margin:0px 0px; font-family: K2D, sans-serif;"><strong>{{ $item->company }}</strong></h5>
                                            <p style="font-size: 15px; font-family: K2D, sans-serif;"class="card-title">{{ $item->titel }}</p>
                                            <p class="card-text" style=" margin-top:-10px; font-size: 13px; font-family: K2D, sans-serif;"><i class="far fa-clock"></i> {{ $item->time_period }}</p>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                                
                                <!-- <div class="card main-shadow" style="margin-top:10px;">
                                    <div class="row">
                                        <div class="col-4"> <img style="margin:5px 0px 0px -5px; width:100px;height:150px;object-fit:contain ;" src="{{ $item->photo }}" alt="" > </div>
                                        <div class="col-8" style="font-family: K2D, sans-serif;">  
                                            <h5 class="card-title" style=" margin:10px 0px;"><b>{{ $item->company }}</b></h5>
                                            <p style="font-size: 15px;white-space: nowrap;width: 190px;overflow: hidden;text-overflow: ellipsis;"class="card-title"><b>{{ $item->titel }}</b></p>
                                            <p class="card-text"><i class="far fa-clock"></i> {{ $item->time_period }}</p>
                                            <a href="{{ $item->link }}" class="btn btn-sm btn-primary main-shadow main-radius" >ดูเพิ่มเติม</a>
                                        </div>
                                    </div>                           
                                </div> -->
                            
                            @endforeach
                        </div>
                    </div>

                    <div id="show_mortor_m" class="card-body d-none"  style="margin-top:-20px">
                        <div class="row">
                            @foreach($promotion_motor as $item)
                            <a href="{{ $item->link }}">
                                <div class="col-12 card main-shadow" style=" border-radius: 20px; margin-top:10px"> 
                                    <div class="row">
                                        <div class="col-5" style="bgcolor:Black"> 
                                            <img style="margin:2px 0px 0px -5px; width:100px;height:100px;object-fit:contain ;" src="{{ $item->photo }}" alt="" >
                                        </div>
                                        <div class="col-7" style="color:black;padding:7px;">
                                            <h5 class="card-title" style=" margin:0px 0px; font-family: K2D, sans-serif;"><strong>{{ $item->company }}</strong></h5>
                                            <p style="font-size: 15px; font-family: K2D, sans-serif;"class="card-title">{{ $item->titel }}</p>
                                            <p class="card-text" style=" margin-top:-10px; font-size: 13px; font-family: K2D, sans-serif;"><i class="far fa-clock"></i> {{ $item->time_period }}</p>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>




            </div>



            

        </div>
    </div>
   
    <style>
        .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        }

    </style>  
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log("START");
            document.getElementById("btn_click_pomo").click();
        });
    </script>
@endsection
