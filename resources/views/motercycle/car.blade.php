@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
                        <div class="car__search">
                            <h5>ค้นหา</h5>
                            <form method="GET" action="{{URL::to('/motercycle')}}" accept-charset="UTF-8" role="search">
                                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="car__filter">
                            <h5>ตัวกรองค้นหา</h5>
                            <form  action="{{URL::to('/motercycle')}}" method="get">
                                <select class="form-control"  class="js-example-basic-single" name="brand" id="brand"  onchange="this.form.submit()">
                                    <option value="" data-display="Brand">ยี่ห้อทั้งหมด</option>
                                    @foreach($motorbrand as $br)
                                        <option 
                                            value="{{ $br->brand }}" 
                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                            {{ $br->brand }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <select class="form-control" name="gear" id="gear" onchange="this.form.submit()" >
                                    <option value="" data-display="Gear">ระบบเกียร์ทั้งหมด</option>
                                    @foreach($motorgear as $ge)
                                        <option 
                                                value="{{ $ge->gear }}" 
                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                        {{ $ge->gear }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <!-- <select class="form-control" name="color" id="color" onchange="this.form.submit()" >
                                    <option value="" data-display="Color">Select Color</option>
                                    @foreach($motorcolor  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select><br> -->
                                <select class="form-control" name="motor" id="motor" onchange="this.form.submit()" >
                                    <option value="" data-display="Color">เครื่องยนต์(cc.)ทั้งหมด</option>
                                    @foreach($motor  as $mo)
                                        <option 
                                                value="{{ $mo->motor  }}" 
                                                {{ request('motor') == $mo->motor  ? 'selected' : ''   }} >
                                            {{ $mo->motor  }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <select class="form-control" name="location" id="location" onchange="this.form.submit()" >
                                    <option value="" data-display="Location">สถานที่ทั้งหมด</option>
                                    @foreach($motorlocation as $lo)
                                        <option 
                                            value="{{ $lo->province }}" 
                                            {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                            {{ $lo->province }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <div class="filter-price">
                                    <p>Price:</p>
                                    <input class="form-control" type="text" name="pricemin"  id="pricemin" placeholder="ราคาต่ำสุด">
                                    <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>
                                <!-- <div class="filter-price">
                                    <p>Distance:</p>
                                    <input class="form-control" type="text" name=" distancemin"  id="milemin" placeholder="Min (km.)">
                                    <input class="form-control" type="text" name=" distancemax" id="milemax" placeholder="Max (km.)">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div> -->
                            </form>
                            <div class="car__filter__btn">
                                <a class="btn btn-danger" href="{{URL::to('/motercycle')}}" > <h6 style="color:#fff"></h6> reset</a>
                             
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <img width="100%" src="{{ asset('/img/more/line_oa.png') }}">
                            </div>
                        </div>
                    </div>
                </div>








                <div class="col-lg-9">
                    <!-- <div class="car__filter__option">
                        <div class="row">
                            <div class="col">
                                <div class="car__filter__option__item car__filter__option__item--right">
                                    <h6>Sort By</h6>
                                    <select>
                                        <option value="">Price: Highest Fist</option>
                                        <option value="">Price: Lowest Fist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="row">
                    @foreach($data as $item)
                        <div class="col-lg-4 col-md-4">
                        
                            <div class="car__item" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
                                <div class="car__item__pic__slider owl-carousel">
                                    @if($item->img == "" )
                                        <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" style ="width: 100%;" >
                                    @else
                                        <img src="{{ $item->img }}" alt=""  style ="width: 100%;"> 
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div >
                                            <h4 ><a href="{{ url('/motercycle/'.$item->id ) }}" style="color:#000">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h4>
                                            <p style = "font-size:12px; margin-top: 5px;">{{ $item->location  }}</p>
                                        </div>
                                        <div class="col">
                                            
                                            @if ( $item->price == 'ติดต่อผู้ขาย')
                                                <h4 style="color:#db2d2e">{{ $item->price}}<span></span></h4>
                                            @else
                                                <h4 style="color:#db2d2e;margin-left:-12px"> <img src="{{ asset('/img/icon/thailand-baht.png') }}" style="width:25px"> {{ number_format(intval($item->price))}}<span></span></h4>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="car__item__price">
                                        <div class="row px-3">
                                            <div class="detel">
                                                <p class="mb-0 "> <a href="{{ url('/motercycle/'.$item->id ) }}" style="color:#fff;"> <b>ดูข้อมูลเพิ่มเติม</b>  </a></p>
                                            </div>
                                            <div class="whislist">
                                                <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                                        {{ csrf_field() }}
                                                    <input class="d-none" name="producmoter_id" type="number" id="producmoter_id" value="{{ $item->id}}" >
                                                    <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                    <input class="d-none" name="car_type" type="text" id="car_type" value="motorcycle" >
                                                    <p class="mb-0 "> 
                                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"><b>&emsp;ถูกใจ</b></a>  
                                                    </p>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach 
                    </div>
                    <div class="row">
                    {{ $data->links('pagination.default',['paginator' => $data,
           'link_limit' => $data->perPage()]) }}  
                    </div>

                </div>
                
            </div>
        </div>
    </section>
 

    @endsection
