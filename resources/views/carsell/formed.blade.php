<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- ข้อมูลรถ -->
            <div class=" row">
                <div class="col-12 col-md-2">
                    <label for="brand" id="brand_label" class="control-label">{{ 'ยี่ห้อรถ / Brand' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4"> 
                    <div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                        <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($Sell->brand) ? $Sell->brand : ''}}"  readonly/>
                        {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                
                <div class="col-12 col-md-2">
                    <label for="generation" class="control-label">{{ 'รุ่นรถ / Model' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
                        <input class="form-control" name="model" type="text" id="model" value="{{ isset($Sell->model) ? $Sell->model : ''}}"  readonly/>
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
                                <option value="" selected> เชื้อเพลิงทั้งหมด </option> 
                      
                        @foreach (json_decode('{"ดีเซล":"ดีเซล","เบนซิน":"เบนซิน","ไฟฟ้า":"ไฟฟ้า","ไฮบริด":"ไฮบริด","NGV":"NGV"}', true) as $optionKey => $optionValue)
                            <option  ption value="{{ $optionKey }}"  {{ (isset($sell->fuel) && $sell->fuel == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($sell->active) ? $sell->active : 'Yes'}}" >
                    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                </div>

        </div> 
    </div>
</div>
<div class="form-group">
    <br>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>