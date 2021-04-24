@extends('layouts.main')
@section('content') 


    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                                @if($data->image == "" )
                                        <img class="car-big-img" src="{{ asset('/img/more/img_more.jpg') }}" alt="" style ="width: 100%;">
                                    @else
                                        <img class="car-big-img" src="{{ url('/image/'.$data->id ) }}" alt="" style ="width: 100%;"> 
                                    @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                        <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <ul>
                                <li>Brand <span>{{ $data->brand  }}</span></li>
                                <li>Model <span>{{ $data->model  }}  {{ $data->submodel  }}</span></li>
                            </ul>
                            <ul>
                                <li>จำนวนที่นั่ง <span>{{ $data->seats  }}</span></li>
                                <li>ระบบเกียร์ <span>{{ $data->gear  }}</span></li>
                                <li>ระยะทาง <span>{{ $data->distance  }} km</span></li>
                            </ul>
                            <ul>
                                <li>น้ำมัน <span>{{ $data->fuel  }}</span></li>
                                <li>สถานที่ <span>{{ $data->location  }}</span></li>
                            </ul>
                           
                            <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $data->id}}" >
                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                            <input class="d-none" name="car_type" type="text" id="car_type" value="car" >
                        </div>
                        <div class="car__details__sidebar__payment">
                            <ul>
                            @if ( $data->price == 'ติดต่อผู้ขาย')
                                    <li>Price <span style="color:#db2d2e">{{ $data->price}}</span> </li>
                                    @else
                                    <li>Price <span style="color:#db2d2e">{{ number_format(intval($data->price))}} บาท</span> </li>
                                        
                                    @endif
                                
                            </ul>

                            <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="primary-btn sidebar-btn"><i class="fa fa-heart"></i> เพิ่มเป็นรายการโปรด</a>
                            <a target="bank" href="{{ $data->link}}" class="primary-btn"><i class="fa fa-credit-card"></i> สนใจติดต่อ</a>

                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->


    @endsection