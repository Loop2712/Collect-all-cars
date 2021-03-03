<div class="container">
    <div class="row">
        <div class="col-12">

            <div class=" row" id="div_data">
                <div class="col-12 col-md-2">
                    <label for="brand" id="brand_label" class="control-label">{{ 'ยี่ห้อรถ / Brand' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div id="div_car_brand" class=" form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                        <!-- car -->
                        <select name="brand" class=" form-control" id="input_car_brand" value="{{ isset($sell->brand) ? $sell->brand : ''}}" required onchange="showCar_model();
                            if(this.value=='อื่นๆ'){ 
                                document.querySelector('#brand').classList.remove('d-none'),
                                document.querySelector('#model').classList.remove('d-none'),
                                document.querySelector('#brand').focus();
                            }else{ 
                                document.querySelector('#brand').classList.add('d-none'),
                                document.querySelector('#generation').classList.add('d-none');}">
                            @if(!empty($xx))
                                @foreach($xx as $item)
                                    <option value="{{ $item->brand }}" selected>{{ $item->brand }}</option>
                                @endforeach
                            @else
                                <option value="" selected> - เลือกรุ่น / Select Model - </option> 
                            @endif
                            <br>
                            {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="brand" type="text" id="brand" value="{{ isset($Sell->brand) ? $Sell->brand : ''}}" placeholder="ยี่ห้อรถของคุณ / Your brand">
                        {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                    </div>

                </div>
                <div class="col-12 col-md-2">
                    <label for="generation" class="control-label">{{ 'รุ่นรถ / Model' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
                       
                        <select name="model" id="input_car_model" class=" form-control" value="{{ isset($sell->model) ? $sell->model : ''}}" required onchange="if(this.value=='อื่นๆ'){ 
                                document.querySelector('#model').classList.remove('d-none'),
                                document.querySelector('#model').focus();
                            }else{ 
                                document.querySelector('#model').classList.add('d-none');}">
                            @if(!empty($xx))
                            @foreach($xx as $item)
                                    <option value="{{ $item->model }}" selected>{{ $item->brand }}</option>
                                @endforeach
                            @else
                                <option value="" selected> - เลือกรุ่น / Select Model - </option> 
                            @endif
                               
                                <br> 
                                {!! $errors->first('model', '<p class="help-block">:message</p>') !!}             
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="model" type="text" id="model" value="{{ isset($sell->model) ? $sell->model : ''}}" placeholder="รุ่นรถของคุณ / Your model" >
                        {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
                    </div>

                </div>
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'ระบบเกียร์ / Gear ' }}<br><br></label>
                </div>
                <div class="col-12 col-md-4">
                    <select name="gear" id="gear" class="form-control" value="{{ isset($sell->gear) ? $sell->gear : ''}}" >
                            <option value="" data-display="">เกียร์ทั้งหมด</option>
                        @foreach ($gear_array as $optionKey)
                            <option ption value="{{ $optionKey->gear }}"  {{ (isset($sell->gear) && $sell->gear == $optionKey) ? 'selected' : ''}}>{{ $optionKey->gear}}</option>
                        @endforeach
                        {!! $errors->first('gear', '<p class="help-block">:message</p>') !!} 
                    </select>
                </div>
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'น้ำมันที่ใช้ / Fuel Type ' }}<br><br></label></div>
                <div class="col-12 col-md-4">
                    <select class="form-control" name="fuel" id="fuel" value="{{ isset($sell->fuel) ? $sell->fuel : ''}}" >
                        @if(!empty($xx))
                            @foreach($xx as $item)
                                    <option value="{{ $item->fuel }}" selected>{{ $item->fuel }}</option>
                            @endforeach
                        @else
                                <option value="" selected> เชื้อเพลิงทั้งหมด </option> 
                        @endif
                        @foreach (json_decode('{"ดีเซล":"ดีเซล","เบนซิน":"เบนซิน","ไฟฟ้า":"ไฟฟ้า","ไฮบริด":"ไฮบริด","NGV":"NGV"}', true) as $optionKey => $optionValue)
                            <option  ption value="{{ $optionKey }}"  {{ (isset($sell->fuel) && $sell->fuel == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'สี / Colour ' }}<br><br></label>
                </div>
                <div class="col-12 col-md-4">
                <select class="form-control"  name="color" id="color" value="{{ isset($sell->color) ? $sell->color : ''}}" >
                                    <option value="" data-display="สีรถ">สีรถทั้งหมด</option>
                                    @foreach($color_array  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select>
                </div>
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'สถานที่ / Location ' }}<br><br></label></div>
                <div class="col-12 col-md-4">
                <select class="form-control"  name="location" id="location" value="{{ isset($sell->location) ? $sell->location : ''}}" >
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

                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'จำนวนที่นั่ง / Seat Capacity ' }}<br><br></label></div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('seats') ? 'has-error' : ''}}">
                        <input class="form-control" name="seats" type="number" id="seats" value="{{ isset($sell->seats) ? $sell->seats : ''}}" >
                        {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ 'เลขไมล์(กม.) / Mileage ' }}<br><br></label></div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('distance') ? 'has-error' : ''}}">
                        <input class="form-control" name="distance" type="number" id="distance" value="{{ isset($sell->distance) ? $sell->distance : ''}} " >
                        {!! $errors->first('distance', '<p class="help-block">:message</p>') !!}
                    </div>
                </div> 
                <div class="col-12 col-md-2">
                <label  class="control-label">{{ ' ราคา / Price ' }}<br><br></label></div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <input class="form-control" name="price" type="number" id="price" value="{{ isset($sell->price) ? $sell->price : ''}} " >
                        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>   
                <div class="col-12 col-md-2">
                <label for="image" class="control-label">{{ 'รูปภาพ / Photo' }}</label><span style="color: #FF0033;"> *</span></div>
                <div class="col-12 col-md-4">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                        <input class="form-control" name="image" type="file" id="image" value="{{ isset($sell->image) ? $sell->image : ''}}" required accept="image/*" multiple="multiple">
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                 </div>
                </div>
                
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($sell->active) ? $data_cars->active : 'Yes'}}" >
                    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                </div>

        </div> 
    </div>
</div>
<div class="form-group">
    <br>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand(); 
        
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
            // return input_car_brand.value;
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
