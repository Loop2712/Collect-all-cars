@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
            <div class="col-md-3 car__filter d-none d-lg-block" > 
                    <form id="1"  action="{{URL::to('/car')}}" method="get">
                        <select class="form-control"  name="brand" id="brand"  >
                        
                            <option value="" data-display="เลือกยี่ห้อ">ยี่ห้อทั้งหมด</option>
                                @foreach($motorbrand as $br)
                             <option 
                                value="{{ $br->brand }}" 
                                {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                {{ $br->brand }} 
                             </option>
                                 @endforeach 
                        </select>
                </div>
                <div class="col-md-3 car__filter d-none d-lg-block" > 
                    <select class="form-control"  name="model" id="model"   >
                        <option value="" data-display="เลือกยี่ห้อ">รุ่นรถทั้งหมด</option>
                            @foreach($motormodel as $mo)
                        <option 
                            value="{{ $mo->model }}" 
                            {{ request('model') == $mo->model ? 'selected' : ''   }}  >
                            {{ $mo->model }} 
                        </option>
                            @endforeach 
                    </select>
                </div>
                <div class="col-md-2 car__filter d-none d-lg-block">
                    <select  class="form-control"  name="typecar" id="typecar" >
                        <option value="" data-display="ประเภทรถ">ประเภทรถทั้งหมด</option>
                            @foreach($motortype as $ty)
                        <option 
                            value="{{ $ty->type }}" 
                            {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                            {{ $ty->type }} 
                        </option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-2 car__filter d-none d-lg-block">  
                    <select class="form-control" name="year" id="year" >
                        <option value="" data-display="ปี">ปีทั้งหมด</option>
                            @foreach($motoryear as $ye)
                        <option 
                            alue="{{ $ye->year }}" 
                            {{ request('year') == $ye->year ? 'selected' : ''   }} >
                            {{ $ye->year }} 
                        </option>
                            @endforeach 
                    </select><br>
                </div>
                <div class="col-md-2 car__filter d-none d-lg-block">  
                    <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                </div> 
                </form>
            
                <div class="col-12">
                        <!-- แสดงเฉพาะคอม -->
                        <button  class="btn btn-sm d-none d-lg-block"
                            onclick="if(document.getElementById('search_m') .style.display=='none') 
                            {document.getElementById('search_m') .style.display=''}else{document.getElementById('search_m')
                             .style.display='none'}"> 
                            <h5 style="color:#7D7D7D" class="fa fa-filter">&nbsp;ตัวกรองค้นหา&nbsp;&nbsp;<i class="fas fa-angle-double-down"></i></h5><br>
                        </button><br>
                        <form id="1"  action="{{URL::to('/car')}}" method="get">
                        <div id="search_m" class="row" style="display:none">
                        
                            <div class="col-md-3 car__filter ">                     
                                   <select class="form-control"  name="location" id="location">
                                      <option value="" data-display="สถานที่">สถานที่ทั้งหมด</option>
                                          @foreach($motorlocation as $lo)
                                              <option 
                                                  value="{{ $lo->province }}" 
                                                 {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                                 {{ $lo->province }} 
                                             </option>
                                         @endforeach 
                                 </select>
                            </div>
                             
                             <div class="col-md-3 car__filter ">  
                                 <input class="form-control" type="text" name="pricemin" id="pricemin" placeholder="ราคาต่ำสุด" value="{{ request('pricemin') }}">
                              </div>  
                             <div class="col-md-3 car__filter ">  
                                 <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด" value="{{ request('pricemax') }}">
                             </div>
                                <div class="col-md-3 car__filter ">  
                                 <select class="form-control"  name="color" id="color" >
                                     <option value="" data-display="สีรถ">สีรถทั้งหมด</option>
                                            @foreach($motorcolor  as $co)
                                     <option 
                                         value="{{ $co->color  }}" 
                                            {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                         {{ $co->color  }} 
                                     </option>
                                          @endforeach 
                                 </select><br>
                            </div>
                                <div class="col-md-3 car__filter ">
                                    <input class="form-control" type="text" name="distancemin" id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }}">  
                                </div>
                                <div class="col-md-3 car__filter ">
                                    <input class="form-control" type="text" name="distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }}">
                                </div>
                                <div class="col-md-3 car__filter ">  
                                    <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                                 <a class="btn btn-danger" href="{{URL::to('/car')}}" ><h6 style="color:#fff;font-size:15px">ล้างการค้นหา</h6>  </a>
                                </div><br>
                              </form>                                 
                </div>
                
                <div class="col-md-12">      
                    <!-- แสดงเฉพาะมือถือ -->
                    <button  class="btn btn-sm d-block d-md-none"
                            onclick="if(document.getElementById('search_mo') .style.display=='none') 
                            {document.getElementById('search_mo') .style.display=''}else{document.getElementById('search_mo')
                             .style.display='none'}"> 
                            <h5 style="color:#7D7D7D">ตัวกรองค้นหา</h5>
                        </button>
                        <div id="search_mo" class="row" style="display:none">
                            <div class="col-12 car__filter d-block d-md-none" >
                                <br>
                                <form  action="{{URL::to('/car')}}" method="get">
                                    <select class="form-control"  name="brand" id="brand"  onchange="this.form.submit()" >
                                        <option value="" data-display="เลือกยี่ห้อ">ยี่ห้อทั้งหมด</option>
                                        @foreach($motorbrand as $br)
                                            <option 
                                                value="{{ $br->brand }}" 
                                                {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                                {{ $br->brand }} 
                                            </option>
                                        @endforeach 
                                    </select><br>
                                    <select class="form-control"  name="model" id="model"   >
                                        <option value="" data-display="เลือกยี่ห้อ">รุ่นรถทั้งหมด</option>
                                            @foreach($motormodel as $mo)
                                        <option 
                                            value="{{ $mo->model }}" 
                                            {{ request('model') == $mo->model ? 'selected' : ''   }}  >
                                            {{ $mo->model }} 
                                        </option>
                                            @endforeach 
                                    </select><br>
                                    <select  class="form-control"  name="typecar" id="typecar"  onchange="this.form.submit()">
                                        <option value="" data-display="ประเภทรถ">ประเภทรถทั้งหมด</option>
                                        @foreach($motortype as $ty)
                                            <option 
                                                    value="{{ $ty->type }}" 
                                                    {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                            {{ $ty->type }} 
                                            </option>
                                        @endforeach
                                    </select><br>
                                    <select class="form-control" name="year" id="year" >
                                        <option value="" data-display="ปี">ปีทั้งหมด</option>
                                            @foreach($motoryear as $ye)
                                        <option 
                                            alue="{{ $ye->year }}" 
                                            {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                            {{ $ye->year }} 
                                        </option>
                                            @endforeach 
                                    </select><br>
                                    
                                    
                                    <select class="form-control"  name="location" id="location" onchange="this.form.submit()" >
                                        <option value="" data-display="สถานที่">สถานที่ทั้งหมด</option>
                                        @foreach($motorlocation as $lo)
                                            <option 
                                                value="{{ $lo->province }}" 
                                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                                {{ $lo->province }} 
                                            </option>
                                        @endforeach 
                                    </select><br>
                                    <select class="form-control"  name="color" id="color" >
                                        <option value="" data-display="สีรถ">สีรถทั้งหมด</option>
                                                @foreach($motorcolor  as $co)
                                        <option 
                                            value="{{ $co->color  }}" 
                                            {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                          @endforeach 
                                    </select><br>
                                    <input class="form-control" type="text" name="distancemin" id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }}">  
                                        <br>
                                    <input class="form-control" type="text" name="distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }}">
                                    
                                    <div class="filter-price">
                                        <p>ราคา:</p>
                                        <input class="form-control" type="text" name="pricemin"  id="pricemin" placeholder="ราคาต่ำสุด" value="{{ request('pricemin') }}"><br>
                                        <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด" value="{{ request('pricemax') }}"><br>
                                        <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>&nbsp;
                                        <a class="btn btn-danger" href="{{URL::to('/car')}}" ><h6 style="color:#fff;font-size:15px">ล้างการค้นหา</h6>  </a>
                                </form>
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
                                        <div class="col" >
                                            <div class="row">
                                                <div class="col-10">
                                                    <h4 ><a href="{{ url('/motercycle/'.$item->id ) }}" style="color:#000">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h4>
                                                </div>
                                                <div class="col-2">
                                                    <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                                            {{ csrf_field() }}
                                                        <input class="d-none" name="producmoter_id" type="number" id="producmoter_id" value="{{ $item->id}}" >
                                                        <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                        <input class="d-none" name="car_type" type="text" id="car_type" value="motorcycle" >
                                                        <p class="mb-0 "> 
                                                            <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"style="color:#000"><i class="far fa-heart"></i></a>  
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                            <p style = "font-size:12px; margin-top: 5px;">{{ $item->location  }}</p>
                                        </div>
                                        <div class="col">
                                            
                                            @if ( $item->price == 'ติดต่อผู้ขาย')
                                                <h4 style="color:#db2d2e;margin-top: -12px;">{{ $item->price}}<span></span></h4>
                                            @else
                                                <h4 style="color:#db2d2e;margin-left:-12px;margin-top: -12px;"> <img src="{{ asset('/img/icon/thailand-baht.png') }}" style="width:25px"> {{ number_format(intval($item->price))}}<span></span></h4>
                                            @endif
                                            <br>
                                        </div>
                                        <!-- <div class="col">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p style="color:#000;font-size:12px;margin-top: 10px;"><img src="{{ asset('/img/icon/calendar.png') }}" style="width:13px"> &nbsp;{{ $item->year  }}</p>
                                                </div>
                                                <div class="col-7">
                                                    <p style="color:#000;font-size:12px;margin-top: 10px;"><img src="{{ asset('/img/icon/settings.png') }}" style="width:15px"> &nbsp;{{ $item->gear  }}</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    <!-- <div class="car__item__price">
                                        <div class="row px-3" style="padding-bottom: 3px;">
                                            <div class="detel">
                                                <p class="mb-0 "> <a href="{{ url('/motercycle/'.$item->id ) }}" style="color:#fff;"> <b>&nbsp;ดูข้อมูลเพิ่มเติม</b>  </a></p>
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
                                    </div> -->
                                </div>
                            </div>
                            
                        </div>
                        @endforeach 
                        
                    </div>
                    <div class="row">
                        {{ $data->links('pagination.default',['paginator' => $data,'link_limit' => $data->perPage()]) }} 
                    </div>

                </div>
                
            </div>
        </div>
    </section>
 

    @endsection
