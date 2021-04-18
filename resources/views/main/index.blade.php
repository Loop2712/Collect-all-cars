@extends('layouts.main')

@section('content')
<section>
<section class="hero spad set-bg" data-setbg="img/hero-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    
                </div>
                <div class="col-lg-5">
                    <div class="hero__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">รถยนต์</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">รถจักรยานยนต์</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h3><b>ค้นหารถยนต์ในฝันของคุณ</b></h3>
                                    <h6 style="margin: 0px;">Find Your Dream Car</h6><br>
                                    <form action="{{URL::to('/car')}}" method="get">
                                        <div class="select-list">
                                            <div class="select-list-item">
                                                <p><b>ยี่ห้อ / Brand</b></p>
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
                                                          <option value="" selected>Select Brand</option> 
                                                      @endif
                                                      <br>
                                                      {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                                                </select>
                                                
                                            </div>
                                         
                                            <div class="select-list-item">
                                                <p><b>รุ่นรถ / Model</b></p>
                                                <select name="generation" id="input_car_model" class=" form-control"  onchange="if(this.value=='อื่นๆ'){ 
                                                          document.querySelector('#generation_input').classList.remove('d-none'),
                                                          document.querySelector('#generation_input').focus();
                                                     }else{ 
                                                          document.querySelector('#generation_input').classList.add('d-none');}">
                                                         <option value="" selected>Select Model</option>     
                                                         <br> 
                                                            {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
                                                </select>
                                            </div>

                                            <div class="select-list-item">
                                                <p><b>ปีต่ำสุด / Lowest year</b></p>
                                                <select name="yearmin" id="yearmin" class="form-control"  >
                                                    <option value="" data-display="yearmin">Lowest year</option>
                                                         @foreach($year_array as $yearmin)
                                                                <option 
                                                                     value="{{ $yearmin->year }}" 
                                                                        {{ request('yearmin') == $yearmin->year ? 'selected' : ''   }} >
                                                                {{ $yearmin->year }} 
                                                             </option>
                                                          @endforeach 
                                                </select>
                                            </div>

                                        

                                            <div class="select-list-item">
                                                <p><b>ปีสุงสุด / Highest year</b></p>
                                                <select name="yearmax" id="yearmax" class="form-control"  >
                                                    <option value="" data-display="yearmax">Highest year</option>
                                                         @foreach($year_array as $yearmax)
                                                                <option 
                                                                     value="{{ $yearmax->year }}" 
                                                                        {{ request('yearmax') == $yearmax->year ? 'selected' : ''   }} >
                                                                {{ $yearmax->year }} 
                                                             </option>
                                                          @endforeach 
                                                </select>
                                            </div>

                                            


                                            <!--<div class="select-list-item">
                                                <p><b>ปี / Year</b></p>
                                                <select name="color" id="color" class="form-control"  >
                                                    <option value="" data-display="Color">Select Color</option>
                                                    @foreach($color_array  as $co)
                                                        <option 
                                                                value="{{ $co->color  }}" 
                                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                                            {{ $co->color  }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        
                                            <div class="select-list-item">
                                                <p><b>ปี / Year</b></p>
                                                <select name="typecar" id="typecar" class="form-control"  >
                                                    <option value="" data-display="Type">Select Type</option>
                                                    @foreach($type_array as $ty)
                                                        <option 
                                                                value="{{ $ty->type }}" 
                                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                                        {{ $ty->type }} 
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>-->
                                        </div>

                                         <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" id="amount">
                                                        <input type="text" id="tt">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                      <!--  <input class="select-list-item" type="text" name="yearmin"  id="yearmin" placeholder="ปีต่ำสุด" value="{{ request('yearemin') }}"><br>
                                    <input class="select-list-item" type="text" name="yearmax" id="yearmax" placeholder="ปีสูงสุด" value="{{ request('yearmax') }}"><br>
-->

                                        <button type="submit" class="site-btn">ค้นหา</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h4><b>ค้นหารถจักรยานยนต์ในฝันของคุณ</b></h4>
                                    <h6 style="margin: 0px;">Find Your Dream Motorcycle</h6><br>
                                    <form action="{{URL::to('/motercycle')}}" method="get">
                                        <div class="select-list">
                                        <div class="select-list-item">
                                                <p><b>รุ่นรถ / Brand</b></p>
                                                <select name="brand" id="brand" class="form-control" >
                                                    <option value="" data-display="Brand">Select Brand</option>
                                                    @foreach($motorbrand as $brand)
                                                        <option 
                                                            value="{{ $brand->brand }}" 
                                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                                            {{ $brand->brand }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        <div class="select-list-item">
                                                <p><b>ระบบเกียร์ / Gear</b></p>
                                                <select name="gear" id="gear" class="form-control"  >
                                                    <option value="" data-display="Gear">Select Gear</option>
                                                    @foreach($motorgear as $ge)
                                                        <option 
                                                                value="{{ $ge->gear }}" 
                                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                                        {{ $ge->gear }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p><b>สีรถ / Color</b></p>
                                                <select name="color" id="color" class="form-control"  >
                                                    <option value="" data-display="Color">Select Color</option>
                                                    @foreach($motorcolor  as $co)
                                                        <option 
                                                                value="{{ $co->color  }}" 
                                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                                            {{ $co->color  }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <!-- <p><b>ประเภทรถ / Type</b></p>
                                                <select name="typecar" id="typecar"  >
                                                    <option value="" data-display="Type">Select Type</option>
                                                    @foreach($type_array as $ty)
                                                        <option 
                                                                value="{{ $ty->type }}" 
                                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                                        {{ $ty->type }} 
                                                        </option>
                                                    @endforeach
                                                </select> -->
                                            </div>
                                        <!-- <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" id="amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="site-btn">ค้นหา</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            
            </div>
        </div>
        </section>
        <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span></span>
                        <h2>รถใหม่ วันนี้</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                    @foreach($data as $item)
                        <div class="col-lg-4 col-md-4">
                        
                            <div class="car__item">
                                <div class="car__item__pic__slider owl-carousel">
                                    @if($item->image == "" )
                                        <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img src="{{ url('/image/'.$item->id ) }}" alt="" > 
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div class="label-date">{{ $item->year  }}</div>
                                        <h5><a href="{{ url('/car/'.$item->id ) }}">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h5>
                                        <ul>
                                            <li><span><i class="fas fa-road"></i>     {{ $item->distance  }}   km</span></li>
                                            <li><span><i class="fas fa-palette"></i>  {{ $item->color  }}</span></li>
                                        </ul>
                                        <ul>
                                            <li><span> <i class="fas fa-cogs"></i>   {{ $item->gear  }}</span></li>
                                        </ul>
                                        <ul>
                                            <li><span><i class="fas fa-gas-pump"></i> {{ $item->fuel  }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="car__item__price">
                                        <span class="car-option"><a href="{{ url('/car/'.$item->id ) }}"></a>view</span>
                                        <h6>{{ $item->price}}<span>บาท</span></h6>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach 
                    </div>
                    <ul class="pagination">
                    <span>
                    {{ $data->links() }}
                    </span> 
                    </ul>
                </div>
                
            
            @if(Auth::check())
                <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">

                <!-- Button trigger modal -->
                <button id="btn_check_user_Modal" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#check_user_Modal">
                  Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="check_user_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ยินดีต้อนรับคุณ <span id="name_user" class="text-primary"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><b>คุณต้องการเปลี่ยนชื่อผู้ใช้และรหัสผ่านหรือไม่</b></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่ใช่</button>
                        <button type="button" class="btn btn-primary" onclick="open_put_email();">ใช่ ฉันต้องการเปลี่ยน</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- email -->
                <!-- Button trigger modal -->
                <button id="btn_email_Modal" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#email_Modal">
                  Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="email_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">กรุณากรอกอีเมล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <label for="put_username" class="control-label"><b>{{ 'ชื่อผู้ใช้' }}</b></label> 
                        <span><a id="text_check" href="#" class="text-success" onclick="check_username();">&nbsp;ตรวจสอบ</a></span>
                        <input class="form-control" type="text" name="put_username" id="put_username" value="{{ Auth::user()->username }}">
                        <span id="check" class="d-none text-success"><i class="fas fa-check-circle text-success"></i>&nbsp;ชื่อผู้ใช้นี้ใช้งานได้</span>
                        <span id="times" class="d-none text-danger"><i class="fas fa-times-circle text-danger"></i>&nbsp;ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว</span>
                        <br><br>
                        <div id="div_email" class="d-none">
                            <p><b>คุณจำเป็นต้องกรอกอีเมลเพื่อเปลี่ยนรหัสผ่าน</b></p>
                            <span><a id="text_check" href="#" class="text-success" onclick="check_email();">&nbsp;ตรวจสอบ</a></span>

                            <input class="form-control" type="email" name="put_email" id="put_email" value="{{ Auth::user()->email }}">
                            <span id="email_check" class="d-none text-success"><i class="fas fa-check-circle text-success"></i>&nbsp;อีเมลนี้ใช้งานได้</span>
                            <span id="email_times" class="d-none text-danger"><i class="fas fa-times-circle text-danger"></i>&nbsp;อีเมลนี้ไม่สามารถใช้งานได้</span>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่ใช่</button> -->
                        <button id="btn_ok" type="button" class="btn btn-primary d-none" onclick="put_email();">ยืนยัน</button>
                      </div>
                    </div>
                  </div>
                </div>

                @if (Route::has('password.request'))
                    <a id="reset" class="text-dark d-none" href="{{ route('password.request') }}">
                        <b>{{ __('เปลี่ยนรหัสผ่าน') }}</b>
                    </a>
                @endif
            @endif
        </div>
    </section>
    </section>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("START");
    check_user();
});

function check_user() {
    let id_user = document.querySelector("#id_user");
    console.log(id_user.value);

        fetch("{{ url('/') }}/api/check_user/" + id_user.value)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if (result) {
                    document.getElementById("btn_check_user_Modal").click();

                    for(let item of result){
                        let name_user = document.querySelector("#name_user");
                            name_user.innerHTML = item.name;

                    }
                }
                
                
            });
}

function open_put_email() {
    document.getElementById("btn_email_Modal").click();
}

function put_email() {

    let put_email = document.querySelector("#put_email");
    let put_username = document.querySelector("#put_username");
    let id_user = document.querySelector("#id_user");
    console.log(put_email.value);
    console.log(id_user.value);

        fetch("{{ url('/') }}/api/put_email/" + put_email.value + "/" + id_user.value + "/" + put_username.value )
            .then(response => response.json())
            .then(result => {
                console.log(result);
                document.getElementById("reset").click();
            });
}

function check_username() {

    let put_username = document.querySelector("#put_username");
    let id_user = document.querySelector("#id_user");

        fetch("{{ url('/') }}/api/check_username/"  + put_username.value +"/" + id_user.value )
            .then(response => response.json())
            .then(result => {
                console.log(result.length);
                
                if (result.length == 0){
                    document.querySelector('#check').classList.remove('d-none');
                    document.querySelector('#times').classList.add('d-none');
                    document.querySelector('#div_email').classList.remove('d-none');
                } else{
                    document.querySelector('#check').classList.add('d-none');
                    document.querySelector('#times').classList.remove('d-none');
                    document.querySelector('#div_email').classList.add('d-none');
                }

            });
}

function check_email() {

    let put_email = document.querySelector("#put_email");

        fetch("{{ url('/') }}/api/check_email/"  + put_email.value )
            .then(response => response.json())
            .then(result => {
                console.log(result);
                
                if (result.length == 0){
                    document.querySelector('#email_check').classList.remove('d-none');
                    document.querySelector('#email_times').classList.add('d-none');
                    document.querySelector('#btn_ok').classList.remove('d-none');
                } else{
                    document.querySelector('#email_check').classList.add('d-none');
                    document.querySelector('#email_times').classList.remove('d-none');
                    document.querySelector('#btn_ok').classList.add('d-none');
                }

            });
}

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
    

@endsection