@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
                        <div class="car__search">
                            <h5>ค้นหา</h5>
                            <form  action="{{URL::to('/car')}}" method="get">
                                <input type="text" name="q" id="q" placeholder="Search..." value="{{ request('search') }}"/>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="car__filter">
                            <h5>ตัวกรองค้นหา</h5>
                            <form  action="{{URL::to('/car')}}" method="get">
                                <select class="form-control"  name="brand" id="brand"  onchange="this.form.submit()" >
                                    <option value="" data-display="เลือกยี่ห้อ">ยี่ห้อทั้งหมด</option>
                                    @foreach($brand_array as $br)
                                        <option 
                                            value="{{ $br->brand }}" 
                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                            {{ $br->brand }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <select  class="form-control"  name="typecar" id="typecar"  onchange="this.form.submit()">
                                    <option value="" data-display="ประเภทรถ">ประเภทรถทั้งหมด</option>
                                    @foreach($type_array as $ty)
                                        <option 
                                                value="{{ $ty->type }}" 
                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                        {{ $ty->type }} 
                                        </option>
                                    @endforeach
                                </select><br>
                                <select class="form-control"  name="gear" id="gear" onchange="this.form.submit()" >
                                    <option value="" data-display="ระบบเกียร์">ระบบเกียร์ทั้งหมด</option>
                                    @foreach($gear_array as $ge)
                                        <option 
                                                value="{{ $ge->gear }}" 
                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                        {{ $ge->gear }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                
                                
                                <select class="form-control"  name="location" id="location" onchange="this.form.submit()" >
                                    <option value="" data-display="สถานที่">สถานที่ทั้งหมด</option>
                                    @foreach($location_array as $lo)
                                        <option 
                                            value="{{ $lo->province }}" 
                                            {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                            {{ $lo->province }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                
                                <div class="filter-price">
                                    <p>ราคา:</p>
                                    <input class="form-control" type="text" name="pricemin"  id="pricemin" placeholder="ราคาต่ำสุด" value="{{ request('pricemin') }}"><br>
                                    <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด" value="{{ request('pricemax') }}"><br>
                                    <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                                </div>

                                <!-- ซ่อน  กดเปิด  -->
                                <div id="spoiler" style="display:none"> 

                                <select class="form-control" name="year" id="year" onchange="this.form.submit()" >
                                    <option value="" data-display="ปี">ปีทั้งหมด</option>
                                    @foreach($year_array as $ye)
                                        <option 
                                                value="{{ $ye->year }}" 
                                                {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                        {{ $ye->year }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <select class="form-control"  name="color" id="color" onchange="this.form.submit()" >
                                    <option value="" data-display="สีรถ">สีรถทั้งหมด</option>
                                    @foreach($color_array  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select><br>
                                <select class="form-control" name="fuel" id="fuel" onchange="this.form.submit()" >
                                    <option value="" data-display="เชื้อเพลิง">เชื้อเพลิงทั้งหมด</option>
                                    @foreach($fuel_array as $pe)
                                        <option 
                                                value="{{$pe->fuel}}" 
                                                {{ request('fuel') == $pe->fuel  ? 'selected' : ''   }} >
                                            {{ $pe->fuel  }} 
                                        </option>
                                    @endforeach 
                                </select><br>


                                
                                
                                <div class="filter-price">
                                    <p>ระยะทาง:</p>
                                    <input class="form-control" type="text" name=" distancemin"  id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }} ">
                                    <input class="form-control" type="text" name=" distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }} ">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>
                                </div> 
                            <button title="Click to show/hide content" type="button"  class="btn btn-sm "
                            onclick="if(document.getElementById('spoiler') .style.display=='none') 
                            {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler')
                             .style.display='none'}"> <h6 style="color:#7D7D7D">การค้นหาขั้นสูง</h6></button>
                                
                            </form>
                            <br>
                            <div class="car__filter__btn">
                                    <a class="btn btn-danger" href="{{URL::to('/car')}}" ><h6 style="color:#fff;font-size:15px">ล้างการค้นหา</h6>  </a>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <img type="button" width="100%" src="{{ asset('/img/more/line_oa.png') }}" onclick="document.getElementById('btn_img').click();">
                            </div>
                        </div>
                    </div>
                </div>

                <button id="btn_img" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#completed">
                  Launch static backdrop modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="completed" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header d-none">
                        <h5 class="modal-title" id="staticBackdropLabel">LINE OFFICIAL ACCOUT </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <center>
                            <img width="100%" src="{{ asset('/img/more/line_oa.png') }}">
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        
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
                                    @if($item->image == "" )
                                    <a href="{{ url('/car/'.$item->id ) }}"><img src="{{ asset('/img/more/img_more.jpg') }}" alt="" ></a>
                                    @else
                                    <a href="{{ url('/car/'.$item->id ) }}"><img src="{{ url('/image/'.$item->id ) }}" alt="" > </a>
                                        <!-- <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="" >  -->
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <!-- <div class="label-date" style="float: left;"><h6>{{ $item->year  }}</h6></div><br> -->
                                        <div class="col" >
                                            <div class="row">
                                                <div class="col-10">
                                                <div style="font-size:12px; border-radius: 15px;" class="col-lg-4 col-md-5 border border-primary radius: 15px;">{{ $item->year  }} </div>

                                                
                                                    <h6 ><a href="{{ url('/car/'.$item->id ) }}" style="color:#000">{{ $item->brand  }}   {{ $item->model  }} <br>{{ $item->submodel  }}</a></h5>
                                                </div>
                                                <div class="col-2">
                                               
                                                <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal text-center" enctype="multipart/form-data">
                                                        {{ csrf_field() }}           
        
                                                        <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >
                                                        <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                        <input class="d-none" name="car_type" type="text" id="car_type" value="car" >

                                                    <button type="submit" style="border:none; background-color: transparent;">
                                                       <i class="far fa-heart" ></i> 
                                                    </button>      
                                                </form>

                                              
                                                    <!--<form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                                        {{ csrf_field() }}
                                                        <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >
                                                        <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                        <input class="d-none" name="car_type" type="text" id="car_type" value="car" >
                                                            
                                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" style="color:#000"><i class="far fa-heart"></i></a>  
                                                        
                                                    </form>-->
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
                                                <div class="col-4">
                                                    <p style="color:#000;font-size:12px;margin-top: 10px;"><img src="{{ asset('/img/icon/calendar.png') }}" style="width:13px"> &nbsp;{{ $item->year  }}</p>
                                                </div>
                                                <div class="col-7">
                                                    <p style="color:#000;font-size:12px;margin-top: 10px;"><img src="{{ asset('/img/icon/settings.png') }}" style="width:15px"> &nbsp;{{ $item->gear  }}</p>
                                                </div>
                                            </div>
                                        </div>    -->
                                    </div>

                                    <!-- <div class="car__item__price">
                                        
                                        
                                        <div class="row px-3" style="padding-bottom: 3px;">
                                            <div class="detel">
                                                <p class="mb-0 "> <a href="{{ url('/car/'.$item->id ) }}" style="color:#fff;"> <b>&nbsp;ดูข้อมูลเพิ่มเติม</b>  </a></p>
                                            </div>
                                            <div class="whislist">
                                                <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                                    {{ csrf_field() }}
                                                    <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id}}" >
                                                    <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                    <input class="d-none" name="car_type" type="text" id="car_type" value="car" >
                                                        
                                                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"><b>&emsp;ถูกใจ</b></a>    
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div>
                                
                            </div>
                            
                        
                        </div>
                        @endforeach 
                    </div>
                    <ul class="row">

                    {{ $data->links('pagination.default',['paginator' => $data,'link_limit' => $data->perPage()]) }} 
                    </ul>
                </div>
            </div>
        </div>
    </section>
 

    @endsection
