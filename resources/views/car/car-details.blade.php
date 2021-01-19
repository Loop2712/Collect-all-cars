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
                                        <img class="car-big-img" src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img class="car-big-img" src="{{ url('/image/'.$data->id ) }}" alt="" > 
                                    @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                            <ul>
                                <li>Brand <span>{{ $data->brand  }}</span></li>
                                <li>Model <span>{{ $data->model  }}  {{ $data->submodel  }}</span></li>
                            </ul>
                            <ul>
                                <li>จำนวนที่นั่ง <span>{{ $data->seats  }}</span></li>
                                <li>ระบบเกียร์ <span>{{ $data->gear  }}</span></li>
                                <li>ระยะทาง <span>{{ $data->distance  }} km</span></li>
                                <li>สี <span>{{ $data->color  }}</span></li>
                            </ul>
                            <ul>
                                <li>น้ำมัน <span>{{ $data->fuel  }}</span></li>
                                <li>สถานที่ <span>{{ $data->location  }}</span></li>
                            </ul>
                        
                        </div>
                        <div class="car__details__sidebar__payment">
                            <ul>
                                <li>Price <span>{{ $data->price}} บาท</span> </li>
                            </ul>
                            <a href="{{ $data->link}}" class="primary-btn"><i class="fa fa-credit-card"></i> Buy at ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->

    @endsection