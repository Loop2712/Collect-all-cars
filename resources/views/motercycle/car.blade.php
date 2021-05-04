@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
            <div class="col-md-3 car__filter d-none d-lg-block" > 
                    <form id="1"  action="{{URL::to('/car')}}" method="get">
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
                            <option value="" selected>รุ่นทั้งหมด</option>     
                            <br> 
                            {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
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
                <!-- แสดงเฉพาะคอม -->
                <div class="col-12">  
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
                            <br> </div>
                                <div class="col-md-3 car__filter ">
                                    <input class="form-control" type="text" name="distancemin" id="milemin" placeholder="ระยะทางต่ำสุด (km.)" value="{{ request('distancemin') }}">  
                                </div>
                                <div class="col-md-3 car__filter ">
                                    <input class="form-control" type="text" name="distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)" value="{{ request('distancemax') }}">
                                </div>
                                <div class="col-md-3 car__filter ">  
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
                            <div class="col-lg-3 col-md-3">
                                <div class="car__item" style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);">
                                    <div class="car__item__pic__slider owl-carousel">
                                        @if($item->img == "" )
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
                                                <p style="position: absolute;right: 66%;top: 80%;z-index: 2; font-size:12px; border-radius: 15px; background-color: #DCDCDC; color:black;" 
                                                    class="col-2 col-md-3 border border-dark">
                                                    &nbsp;<b>{{ $item->year  }}</b> 
                                                </p>
                                            <h4 style="position: absolute;right: 5%;top: 80%;z-index: 2;">
                                                <i class="fa fa-heart text-white" ></i>
                                            </h4>
                                    </div>
                                    <img src="{{ $item->img }}" alt="" > </a>
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
                        </div>
                        @endforeach 
                
                    <div class="row">
                        {{ $data->links('pagination.default',['paginator' => $data,'link_limit' => $data->perPage()]) }} 
                    </div>
                </div>  
            </div>
        </div>
    </section>
 

    @endsection
    <script>
    function showMotor_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/motor_brand")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
                let input_motor_brand = document.querySelector("#input_motor_brand");
                    input_motor_brand.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.brand;
                    option.value = item.brand;
                    input_motor_brand.add(option);
                }
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_brand.add(option); 

                //QUERY model
                showMotor_model();
            });
            return input_motor_brand.value;
    }
    function showMotor_model(){
        let input_motor_brand = document.querySelector("#input_motor_brand");
        fetch("{{ url('/') }}/api/motor_brand/"+input_motor_brand.value+"/motor_model")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                // //UPDATE SELECT OPTION
                let input_motor_model = document.querySelector("#input_motor_model");
                    input_motor_model.innerHTML = "";
                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.model;
                    option.value = item.model;
                    input_motor_model.add(option);                
                } 
                let option = document.createElement("option");
                    option.text = "อื่นๆ";
                    option.value = "อื่นๆ";
                    input_motor_model.add(option);  
            });
    }
    </script>