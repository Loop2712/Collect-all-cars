@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ราคากลางกรมขนส่งทางบก
                                            

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
                        
                    <a href="{{ url('/middle_price_car/create') }}" class="float-right btn btn-success btn-sm" title="Add New Middle_price_car">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    
                    </div><br>
                    <div class="row" style="margin: 0px -5px 0px 10px">
                            <div class="col-sm-3"> 
                            <form action="{{URL::to('/middle_price_car')}}" method="get">
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
                            <div class="col-sm-3"> 
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
                            
                            <div class="col-sm-3"> 
                                <input class="form-control" type="text" name="submodel" id="submodel" placeholder="รุ่นย่อย" value="{{ request('sub_model') }}">
                            </div>
                            <div class="col-sm-3" > 
                            <button type="submit" class="btn btn-danger btn-sm "> <h6 style="color:#fff">ค้นหา</h6>  </button>
                            <a class="btn btn-danger" href="{{URL::to('/middle_price_car')}}" ><h6 style="color:#fff;font-size:15px">ล้างการค้นหา</h6>  </a>
                            </div>
                        </form>
                    </div>
                    <div class="table-wrapper">
                            <table class="fl-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ยี่ห้อ/Brand</th>
                                        <th>รุ่น/Model</th>
                                        <th>รุ่นย่อย/Submodel</th>
                                        <th>ราคา/Price</th>
                                        <th class="d-none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Middle_price_car as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->brand }}</td><td>{{ $item->model }}</td><td>{{ $item->submodel }}</td><td>{{ $item->price }} บาท</td>
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
                            <div class="pagination-wrapper"> {!! $Middle_price_car->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    </style>
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