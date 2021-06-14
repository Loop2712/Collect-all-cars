@extends('layouts.viicheck')

@section('content')

<style>

    body{
        font-family: Helvetica;
        -webkit-font-smoothing: antialiased;
        background: rgba( 71, 147, 227, 1);
    }


    /* Table Styles */

    .table-wrapper{
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
        
    }

    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td, .fl-table th {
        text-align: center;
        padding: 8px;
        font-size: 18px;
        
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 18px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #324960;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */
</style>
<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 style="margin-top:5px;">ราคากลางกรมขนส่งทางบก</h3>
                                                

                        <!--<form method="GET" action="{{ url('/middle_price_car') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>-->
                            
                        <a href="{{ url('/middle_price_car/create') }}" class="d-none float-right btn btn-success btn-sm" title="Add New Middle_price_car">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        
                    </div><br>
                    
                        <!-- <div class="row" style="margin-left: 2px;">
                            <div class="col-sm-3 col-12" > 
                            <form id="1"  action="{{URL::to('/middle_price_motorcycle')}}" method="get">
                        <select name="brand" class=" form-control" id="input_motor_brand"  onchange="showMotor_model();
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
                           
                            <div class="col-sm-3 col-12"> 
                               <br class="d-block d-md-none">  <input class="form-control" type="text" name="submodel" id="submodel" placeholder="รุ่นย่อย" value="{{ request('sub_model') }}">
                            </div>
                            <div class="col-sm-3 col-12" > <br class="d-block d-md-none">
                            <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                            <a class="btn btn-danger" style="padding-top:2px;" href="{{URL::to('/middle_price_car')}}" ><h6 style="color:#fff;font-size:17px ">ล้างการค้นหา</h6>  </a>
                            </div>
                        </form>
                    </div>
                    <br > -->
            

                <!-- ข้อมูลรถ -->
                <div class="col-md-12">
                    <div class=" row"   >
                        <div class="col-12 col-md-3">
                        <form action="{{URL::to('/middle_price_motorcycle')}}" method="get">
                            <div id="div_car_brand" class="d-none form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                            
                                <select name="brand" class="d-none form-control" id="input_car_brand"  onchange="showCar_model();
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
                                        <option value="" selected> - เลือกยี่ห้อ / Select Brand - </option> 
                                    @endif
                                    <br>
                                    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                                </select>
                            </div>
                            <div id="div_motor_brand" class=" form-group {{ $errors->has('motor_brand') ? 'has-error' : ''}}">
                                
                                <select name="motor_brand" class=" form-control" id="input_motor_brand"  onchange="showMotor_model();
                                        if(this.value=='อื่นๆ'){ 
                                        document.querySelector('#brand_input').classList.remove('d-none'),
                                        document.querySelector('#generation_input').classList.remove('d-none'),
                                        document.querySelector('#brand_input').focus();
                                    }else{ 
                                        document.querySelector('#brand_input').classList.add('d-none'),
                                        document.querySelector('#generation_input').classList.add('d-none');}">
                                    <option value="" selected>ยี่ห้อทั้งหมด</option>
                                    <br>
                                    {!! $errors->first('motor_brand', '<p class="help-block">:message</p>') !!}
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('brand_other') ? 'has-error' : ''}}">
                                <input class="d-none form-control" name="brand_other" type="text" id="brand_input" value="{{ isset($register_car->brand_other) ? $register_car->brand_other : ''}}" placeholder="ยี่ห้อรถของคุณ / Your brand">
                                {!! $errors->first('brand_other', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group {{ $errors->has('generation') ? 'has-error' : ''}}">
                                
                                <select name="generation" id="input_car_model" class="d-none form-control"  onchange="if(this.value=='อื่นๆ'){ 
                                        document.querySelector('#generation_input').classList.remove('d-none'),
                                        document.querySelector('#generation_input').focus();
                                    }else{ 
                                        document.querySelector('#generation_input').classList.add('d-none');}">
                                        <option value="" selected> - เลือกรุ่น / Select Model - </option>     
                                        <br> 
                                        {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
                                </select>
                                
                                <select name="motor_generation" id="input_motor_model" class=" form-control"  onchange="if(this.value=='อื่นๆ'){ 
                                        document.querySelector('#generation_input').classList.remove('d-none'),
                                        document.querySelector('#generation_input').focus();
                                    }else{ 
                                        document.querySelector('#generation_input').classList.add('d-none');}">
                                        <option value="" selected>รุ่นทั้งหมด</option>     
                                        <br>  
                                        {!! $errors->first('motor_generation', '<p class="help-block">:message</p>') !!}            
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('generation_other') ? 'has-error' : ''}}">
                                <input class="d-none form-control" name="generation_other" type="text" id="generation_input" value="{{ isset($register_car->generation_other) ? $register_car->generation_other : ''}}" placeholder="รุ่นรถของคุณ / Your model" >
                                {!! $errors->first('generation_other', '<p class="help-block">:message</p>') !!}
                            </div>
                        
                        </div>
                        <div class="col-md-3 col-12"> 
                            <br class="d-block d-md-none">  <input class="form-control" type="text" name="submodel" id="submodel" placeholder="รุ่นย่อย" value="{{ request('sub_model') }}">
                        </div>

                        <div class="col-sm-3 col-12" > <br class="d-block d-md-none">
                            <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                            <a class="btn btn-danger" style="padding-top:2px;" href="{{URL::to('/middle_price_motorcycle')}}" ><h6 style="color:#fff;font-size:17px ">ล้างการค้นหา</h6>  </a>
                        </div>
                        </form>
                    </div>
                </div>

                    

                <div class="col-md-12">
                    <button id="btn_car" class="btn btn-outline-danger" >
                        <a id="btn_a_car" href="{{ url('/middle_price_car' ) }}">รถยนต์</a>
                    </button>
                    <button id="btn_motorcycle" class="btn btn-outline-danger" >
                        <a id="btn_a_motorcycle" href="{{ url('/middle_price_motorcycle' ) }}">รถจักรยานยนต์</a>
                    </button>
                </div>
                

                        <!----------------------------------------------------------mobile--------------------------------------------------------->
                        <div>
                            <div class="d-block d-md-none">
                                @foreach($middleprice_motorcycles as $item)
                                    <div class="row" style="margin-top:10px">
                                        <div class="col-10 card main-shadow" style="margin-left:30px; border-radius: 20px 20px 0px 0px;padding: 7px;">
                                            <div class="row ">    
                                                <div class="col-3 ">
                                                    <img style="margin-top:15px;" width="50"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                </div>
                                                <div class="col-7 ">
                                                    <h4 style="margin-bottom:0px">&nbsp;<b>{{ $item->brand }}</b></h4>
                                                    <p style="margin-bottom:0px; margin-left:5px">{{ $item->model }} , {{ $item->submodel }}</p>
                                                    <p style="margin-bottom:0px">&nbsp;ปี {{ $item->year }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                       
                                        <div class="col-10 card main-shadow" style="margin-left:30px; border-radius: 0px 0px 20px 20px; padding:6.5px">
                                            @php
                                                $price_2 = "";

                                                $price_explode = explode("-",$item->price);
                                                $price_1 = $price_explode[0];

                                                    if (!empty($price_explode[1])) {
                                                        $price_2 = $price_explode[1];
                                                    }
                                            @endphp
                                            @if($price_2 != "")
                                                <center><td style="text-align:"><b style="color: #FF0000;font-size: 17px;">{{ number_format($price_1) }} - {{ number_format($price_2) }} บาท</b></td></center>
                                            @else
                                            <center><td style="text-align: center;"><b style="color: #FF0000;font-size: 17px;">{{ number_format($price_1) }} บาท</b></td></center>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                
                                <!---------------------------------------------pc--------------------------------------------------------->
                                <br>
                                <div class="table-responsive d-none d-lg-block ">
                                    <table class="fl-table">
                                        <thead>
                                            <tr>
                                                <th>ยี่ห้อ/Brand</th>
                                                <th>รุ่น/Model</th>
                                                <th>รุ่นย่อย/SubModel</th>
                                                <th>ปี/Year</th>
                                                <th>ราคา/Price</th>
                                                <th class="d-none">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($middleprice_motorcycles as $item)
                                                <tr>
                                                    <td>{{ $item->brand }}</td>
                                                    <td>{{ $item->model }}</td>
                                                    <td>{{ $item->submodel }}</td>
                                                    <td>{{ $item->year }}</td>
                                                    
                                            @php
                                                $price_2 = "";

                                                $price_explode = explode("-",$item->price);
                                                $price_1 = $price_explode[0];

                                                    if (!empty($price_explode[1])) {
                                                        $price_2 = $price_explode[1];
                                                    }
                                            @endphp
                                                @if($price_2 != "")
                                                    <td style="text-align: right;">{{ number_format($price_1) }} - {{ number_format($price_2) }} บาท</td>
                                                @else
                                                    <td style="text-align: right;">{{ number_format($price_1) }} บาท</td>
                                                @endif
                                                
                                                    <td class="d-none">
                                                        <a href="{{ url('/middle_price_car/' . $item->id) }}" title="View Middle_price_car"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                        <a href="{{ url('/middle_price_car/' . $item->id . '/edit') }}" title="Edit Middle_price_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                        <form method="POST" action="{{ url('/middle_price_car' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Middle_price_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                             
                                    </table>
                                    <div class="colpagination-wrapper"> 
                                        {!! $middleprice_motorcycles->appends([
                                        'brand' => Request::get('brand'),
                                        'model' => Request::get('model'),
                                        'submodel' => Request::get('submodel'),
                                        ])->render() !!} 
                                    </div>
                                </div> 
                        </div> 

                    <br>
                </div><br>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand();
        showMotor_brand();
        show_location_P();
        show_location_P_2();
    });

    function showCar_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/brand_middle_price")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                // let input_car_brand = document.querySelector("#input_car_brand");
                //     input_car_brand.innerHTML = "";

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
        // console.log(input_car_model.options.length);
        while (input_car_model.options.length > 1) {
                input_car_model.remove(1);
            } 
        let input_car_brand = document.querySelector("#input_car_brand");
        // console.log(input_car_brand.value);
        fetch("{{ url('/') }}/api/brand_middle_price/"+input_car_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // //UPDATE SELECT OPTION
                // let input_car_model = document.querySelector("#input_car_model");
                //     input_car_model.innerHTML = "";

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

    // motorcycle
    function showMotor_brand(){
        //PARAMETERS
        fetch("{{ url('/') }}/api/motor_middle_price")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                // let input_motor_brand = document.querySelector("#input_motor_brand");
                //     input_motor_brand.innerHTML = "";

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
        // console.log(input_motor_model.options.length);
        while (input_motor_model.options.length > 1) {
                input_motor_model.remove(1);
            } 
        let input_motor_brand = document.querySelector("#input_motor_brand");
        fetch("{{ url('/') }}/api/motor_middle_price/"+input_motor_brand.value+"/model")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                // //UPDATE SELECT OPTION
                // let input_motor_model = document.querySelector("#input_motor_model");
                //     input_motor_model.innerHTML = "";
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

    

    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_motorcycle').classList.add('btn-danger');
        document.querySelector('#btn_motorcycle').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_motorcycle').classList.add('text-white');
        document.querySelector('#btn_a_motorcycle').classList.remove('text-danger');
    }

</script>
@endsection