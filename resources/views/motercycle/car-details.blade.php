@extends('layouts.main')
@section('content') 


    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                                @if($data->img == "" )
                                        <img class="car-big-img" src="{{ asset('/img/more/img_more.jpg') }}" alt="" style ="width: 100%;">
                                    @else
                                        <img src="{{ $data->img }}" alt="" style ="width: 100%;"> 
                                    @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                        <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <ul>
                                <li>Brand <span>{{ $data->brand  }}</span></li>
                                <li>Model <span>{{ $data->model  }}  {{ $data->submodel  }}</span></li>
                            </ul>
                            <ul>
                                <li>ระบบเกียร์ <span>{{ $data->gear  }}</span></li>
                                <li>สี <span>{{ $data->color  }}</span></li>
                                <li>เครื่องยนต์ <span>{{ $data->motor  }}</span></li>
                                
                            </ul>
                            <ul>
                                <li>สถานที่ <span>{{ $data->location  }}</span></li>
                            </ul>
                           
                            <input class="d-none" name="producmoter_id" type="number" id="producmoter_id" value="{{ $data->id}}" >
                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                            <input class="d-none" name="car_type" type="text" id="car_type" value="motorcycle" >
                        </div>
                        <div class="car__details__sidebar__payment">
                            <ul>
                            @if ( $data->price == 'ติดต่อผู้ขาย')
                                    <li>Price <span>{{ $data->price}}</span> </li>
                                    @else
                                    <li>Price <span>{{ number_format(intval($data->price))}} บาท</span> </li>
                                        
                                    @endif
                                
                            </ul>
                            <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $data->id}}" >
                                <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                <input class="d-none" name="car_type" type="text" id="car_type" value="car" >

                                <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="primary-btn sidebar-btn"><i class="fa fa-heart"></i> เพิ่มเป็นรายการโปรด</a>
                                <a href="{{ $data->link}}" class="primary-btn"><i class="fa fa-credit-card"></i> สนใจติดต่อ</a>
                            </form>
                        </div>
                        
                            
                        </form>            
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <h4>Brand</h4>
                        </div>
                        <div class="col-2">
                            <h4>Model</h4>
                        </div>
                        <div class="col-3">
                            <h4>Submodel</h4>
                        </div>
                        <div class="col-2">
                            <h4>Year</h4>                        
                        </div>
                        <div class="col-3">
                            <h4>Price</h4>
                        </div>
                    </div>
                    <hr>
                    @foreach($middle_price as $item)
                    <div class="row">
                        <div class="col-2">
                            <span>{{ $item->brand }}</span>
                        </div>
                        <div class="col-2">
                            <span>{{ $item->model }}</span>
                        </div>
                        <div class="col-3">
                            <span>{{ $item->submodel }}</span>
                        </div>
                        <div class="col-2">
                            <span>{{ $item->year }}</span>                        
                        </div>
                        <div class="col-3">
                            <span>{{ $item->price }} บาท</span>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Car Details Section End -->


    @endsection