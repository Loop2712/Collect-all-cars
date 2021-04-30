
@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-md-3 car__filter d-none d-lg-block" > 
                    <form action="{{URL::to('/car')}}" method="get">
                        <select name="brand" class=" form-control" id="input_car_brand"  onchange="showCar_model();
                            if(this.value=='อื่นๆ'){ 
                                document.querySelector('#brand_input').classList.remove('d-none'),
                                document.querySelector('#generation_input').classList.remove('d-none'),
                                document.querySelector('#brand_input').focus();
                            }else{ 
                                document.querySelector('#brand_input').classList.add('d-none'),
                                document.querySelector('#generation_input').classList.add('d-none');}">
                            @if(!empty($xx))
                                @foreach($xx as $item)
                                <option value="{{ $item->brand }}" selected>{{ $item->brand }}</option>
                                @endforeach
                            @else
                                <option value="" selected>ยี่ห้อทั้งหมด</option> 
                            @endif
                            <br>
                            {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                        </select>
                </div>
                <div class="col-md-3 car__filter d-none d-lg-block" > 
                    <select name="generation" id="input_car_model" class=" form-control"  onchange="if(this.value=='อื่นๆ'){ 
                            document.querySelector('#generation_input').classList.remove('d-none'),
                            document.querySelector('#generation_input').focus();
                        }else{ 
                            document.querySelector('#generation_input').classList.add('d-none');}">
                        <option value="" selected>รุ่นรถทั้งหมด</option>     
                            <br> 
                            {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
                    </select>
                </div>
                <div class="col-md-2 car__filter d-none d-lg-block">
                    <select  class="form-control"  name="typecar" id="typecar" >
                        <option value="" data-display="ประเภทรถ">ประเภทรถทั้งหมด</option>
                            @foreach($type_array as $ty)
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
                            @foreach($year_array as $ye)
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
                
            
                <div class="col-12">
                        <!-- แสดงเฉพาะคอม -->
                        <button  class="btn btn-sm d-none d-lg-block" type="button"
                            onclick="if(document.getElementById('search_m') .style.display=='none') 
                            {document.getElementById('search_m') .style.display=''}else{document.getElementById('search_m')
                             .style.display='none'}"> 
                            <h5 style="color:#7D7D7D" class="fa fa-filter">&nbsp;ตัวกรองค้นหา&nbsp;&nbsp;<i class="fas fa-angle-double-down"></i></h5><br>
                        </button><br>
                       
                        <div id="search_m" class="row" style="display:none">
                        
                            <div class="col-md-3 car__filter ">                     
                                   <select class="form-control"  name="location" id="location">
                                      <option value="" data-display="สถานที่">สถานที่ทั้งหมด</option>
                                          @foreach($location_array as $lo)
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
                                    <input class="form-control" type="text" name="distancemin" id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }}">  
                                </div><br><br>
                                <div class="col-md-3 car__filter ">
                                    <input class="form-control" type="text" name="distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }}">
                                </div>
                                <div class="col-md-3 car__filter ">  
                                 <a class="btn btn-danger" href="{{URL::to('/car')}}" ><h6 style="color:#fff;font-size:15px">ล้างการค้นหา</h6>  </a>
                                </div><br>
                              </form>                                 
                </div><br>
                
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
                                        @foreach($brand_array as $br)
                                            <option 
                                                value="{{ $br->brand }}" 
                                                {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                                {{ $br->brand }} 
                                            </option>
                                        @endforeach 
                                    </select><br>
                                    <select class="form-control"  name="model" id="model"   >
                                        <option value="" data-display="เลือกยี่ห้อ">รุ่นรถทั้งหมด</option>
                                            @foreach($model_array as $mo)
                                        <option 
                                            value="{{ $mo->model }}" 
                                            {{ request('model') == $mo->model ? 'selected' : ''   }}  >
                                            {{ $mo->model }} 
                                        </option>
                                            @endforeach 
                                    </select><br>
                                    <select class="form-control" name="year" id="year" >
                                        <option value="" data-display="ปี">ปีทั้งหมด</option>
                                            @foreach($year_array as $ye)
                                        <option 
                                            alue="{{ $ye->year }}" 
                                            {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                            {{ $ye->year }} 
                                        </option>
                                            @endforeach 
                                    </select><br>
                                    
                                    
                                    <select class="form-control"  name="location" id="location" onchange="this.form.submit()" >
                                        <option value="" data-display="สถานที่">จังหวัดทั้งหมด</option>
                                        @foreach($location_array as $lo)
                                            <option 
                                                value="{{ $lo->province }}" 
                                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                                {{ $lo->province }} 
                                            </option>
                                        @endforeach 
                                    </select><br>
                                    <div class="filter-price">
                                        <p>ระยะทาง:</p>
                                        <input class="form-control" type="text" name="distancemin" id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }}">  
                                        <br>
                                        <input class="form-control" type="text" name="distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }}">
                                    </div>
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
                <div class="col-lg-12">
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
                    <style>
                        .car_wish .fa
                        {
                        color:#cbcbcb;
                        }
                        .car_wish .fa:hover
                        {
                        color:#FF0000;
                        }
                        .fill-heart{
                            color:#FF0000 !important;

                        }

                    </style>            
                    <div class="row">
                        @foreach($data as $item)
                        <div class="col-lg-3 col-md-4">
                                <!--คอม-->
                            <div class="car__item d-none d-lg-block" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
                                <div class="car__item__pic__slider owl-carousel">
                                
                                    @if($item->image == "" )  
                                    <a href="{{ url('/car/'.$item->id ) }}">
                                    <div class="row d-none d-md-block">
                                    <div class="row d-none d-md-block">
                                        <p style="position: absolute;right: 73%;top: 80%;z-index: 2; font-size:12px; border-radius: 15px; background-color: #DCDCDC; color:black;" 
                                            class="col-2 col-md-3 border border-primary">
                                            &nbsp;{{ $item->year  }} 
                                        </p>
                                        <h4 style="position: absolute;right: 5%;top: 80%;z-index: 2;">
                                            <i class="fa fa-heart text-white" ></i>
                                        </h4>
                                    </div>
                                    <img"  src="{{ asset('/img/more/img_more.jpg') }}" alt="" ></a>
                                    @else
                                   
                                    <a href="{{ url('/car/'.$item->id ) }}">
                                     <div class="row d-none d-md-block">
                                        <p style="position: absolute;right: 73%;top: 80%;z-index: 2; font-size:12px; border-radius: 15px; background-color: #DCDCDC; color:black;" 
                                            class="col-2 col-md-3 border border-dark">
                                            &nbsp;<b>{{ $item->year  }}</b> 
                                        </p>
                                        <h4 style="position: absolute;right: 5%;top: 80%;z-index: 2;">
                                            <i class="fa fa-heart text-white" ></i>
                                        </h4>
                                </div>
                                    
                                    <img src="{{ url('/image/'.$item->id ) }}" alt="" > </a>
                                        <!-- <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="" >  -->
                                    @endif
                                </div>  
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <!-- <div class="label-date" style="float: left;"><h6>{{ $item->year  }}</h6></div><br> -->
                                        <div class="col" >
                                            <div class="row">
                                                <div class="col-12 ">
                                                            <!-- <div class="col-3 car_wish" >
                                                                <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal text-center" enctype="multipart/form-data">
                                                                {{ csrf_field() }}           
                                                                
                                                                    <input name="product_id" type="hidden" id="product_id" value="{{ $item->id }}" >
                                                                    <input name="user_id" type="hidden" id="user_id" value="" >
                                                                    <input name="car_type" type="hidden" id="car_type" value="car" >
                                                                    <button type="submit" style="border:none; background-color: transparent;">
                                                                        <div class="car_wish">
                                                                            
                                                                        </div>
                                                                    </button>      
                                                                </form> 
                                                            </div> -->
                                                      
                                                    

                                                    <div class="row " >
                                                        <div class="col-3 col-sm-3 ">
                                                            <a href="{{ url('/car/'.$item->id ) }}">  
                                                                <img width="50"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-9 col-sm-9">
                                                            <a href="{{ url('/car/'.$item->id ) }}">
                                                                <h4 style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;font-size: 20px;">{{ $item->model }}</h4>
                                                                <p style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">{{ $item->submodel }}</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-3">
                                                    <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                                                        {{ csrf_field() }}
                                                        <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >
                                                        <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                                                        <input class="d-none" name="car_type" type="text" id="car_type" value="car" >
                                                            
                                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" style="color:#000"><i class="far fa-heart"></i></a>  
                                                        
                                                    </form>
                                                </div> -->

                                            </div>
                                           
                                            
                                            <p style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">{{ $item->location }}</p>
                                        </div>
                                        <div class="col">
                                            <hr style="margin-bottom: 25px;">
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
                            <!--มือถือ-->
     <style>
    .myimg{
    width:150px;
    height:150px;
    object-fit:cover;
}
</style>                       
                            <div class="car__item d-block d-md-none" ><br>
                                <div class="car__item__text" style="border:none;">
                                    <div class="car__item__text__inner">
                                        <!-- <div class="label-date" style="float: left;"><h6>{{ $item->year  }}</h6></div><br> -->
                                        <div class="col " >
                                            <div class="row ">
                                                <div class="col-12 ">
                                                    <div class="col-3 car_wish  d-none" >
                                                        <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal text-center" enctype="multipart/form-data">
                                                            {{ csrf_field() }}           
                                                            <input name="product_id" type="hidden" id="product_id" value="{{ $item->id }}" >
                                                            <input name="user_id" type="hidden" id="user_id" value="" >
                                                            <input name="car_type" type="hidden" id="car_type" value="car" >
                                                            <button type="submit" style="border:none; background-color: transparent;">
                                                            </button>      
                                                        </form> 
                                                    </div>
                                                    <div class="row " >
                                                        <div class="col-8 ">
                                                            @if($item->image == "" )  
                                                                <a href="{{ url('/car/'.$item->id ) }}">
                                                                    <div class="row d-none d-md-block">
                                                                        <div class="row d-none d-md-block">
                                                                            <p style="position: absolute;right: 73 %;top: 78%;z-index: 2; font-size:12px; border-radius: 15px; background-color: #DCDCDC; color:black; margin:0px 0px 0px 0px;" 
                                                                                class="col-2 col-md-3 border border-primary">
                                                                                 &nbsp;{{ $item->year  }} 
                                                                            </p>
                                                                        </div>
                                                                        <img" style="margin:-30px 0px 0px -60px" src="{{ asset('/img/more/img_more.jpg') }}" alt="" class="myimg">
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/car/'.$item->id ) }}">
                                                                    <div class="row d-none d-md-block">
                                                                        <p style="position: absolute;right: 73%;top: 78%;z-index: 2; font-size:12px; border-radius: 15px; background-color: #DCDCDC; color:black; margin:0px 0px 0px 0px;" 
                                                                        class="col-2 col-md-3 border border-dark">
                                                                        &nbsp;<b>{{ $item->year  }}</b> </p>
                                                                    </div>
                                                                        <img style="margin:-30px 0px 0px -60px" src="{{ url('/image/'.$item->id ) }}" alt="" class="myimg"> 
                                                                </a>  
                                                            @endif
                                                        </div>
                                                        <div class="col-9 " style="margin: -135px 0px 0px 105px">
                                                            <a href="{{ url('/car/'.$item->id ) }}" >
                                                                    <h4 style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;font-size: 18px;">{{ $item->brand }}&nbsp;{{ $item->model }}</h4>
                                                                    <p style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;font-size: 15px;">{{ $item->submodel }}</p>
                                                                <div class="col"style="margin: -20px 0px 0px -15px">
                                                                    <p style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;font-size: 12px;">{{ $item->location }}</p>
                                                                </div>
                                                                <div class="col"style="margin: -18px 0px 0px -13px ">
                                                                    <i class="fas fa-calendar"style="color:#BEBEBE; font-size: 15px;"> </i>
                                                                    <span style="color:#363636; font-size: 13px;">&nbsp;{{ $item->year  }}</span>&nbsp;
                                                                    <i class="fas fa-tachometer-alt" style="color:#BEBEBE; font-size: 15px;"></i>
                                                                    <span style="color:#363636; font-size: 13px;">&nbsp;{{ $item->distance  }}</span>  
                                                                </div>
                                                                <div class="col"style="margin: 25px 0px 0px 0px">
                                                                    @if ( $item->price == 'ติดต่อผู้ขาย')
                                                                        <h4 style="color:#db2d2e;margin-top: -12px;">{{ $item->price}}</h4>
                                                                    @else
                                                                        <h4 style="color:#db2d2e;margin-left:-18px;margin-top: -19px;"> <img src="{{ asset('/img/icon/thailand-baht.png') }}" style="width:25px"> {{ number_format(intval($item->price))}}</h4>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>  
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand();
        showMotor_brand();   
    });
    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/car_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                // let input_car_brand = document.querySelector("#input_car_brand");
                    // input_car_brand.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_car_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_car_brand.add(option); 

                //QUERY model
                showCar_model();
            });
            return input_car_brand.value;
    }
    function showCar_model(){
        let input_car_brand = document.querySelector("#input_car_brand");
        fetch("{{ url('/') }}/api/car_brand/"+input_car_brand.value+"/car_model")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // //UPDATE SELECT OPTION
                let input_car_model = document.querySelector("#input_car_model");
                    input_car_model.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_car_model.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_car_model.add(option);  
            });
    }

</script>