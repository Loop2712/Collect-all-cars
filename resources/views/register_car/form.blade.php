<div class="container">
    <div class="row">
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลของท่าน / Your Information'}}</span>
            <br><br>
            <!-- ข้อมูลเจ้าของรถ -->
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="name" class="control-label">{{ 'ชื่อ / Name' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($register_car->name) ? $register_car->name : Auth::user()->name}}" required >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <label for="phone" class="control-label">{{ 'เบอร์โทร / Phone number' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="form-control" name="phone" type="tel" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone : ''}}" required placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}">
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <br>
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถ / Vehicle Information' }}</span><span style="color: #FF0033;"> *</span>
            <br><br>
            <!-- ข้อมูลรถ -->
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="brand" class="control-label">{{ 'ยี่ห้อรถยนต์ / Car Brand' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                        <!-- <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($register_car->brand) ? $register_car->brand : ''}}" required placeholder="ยี่ห้อรถยนต์ของคุณ / Your car brand">
                        {!! $errors->first('brand', '<p class="help-block">:message</p>') !!} -->

                        <select name="brand" id="brand" class="form-control">
                                <option value="" selected > - เลือกยี่ห้อรถยนต์ / Select Car Brand - </option> 
                                @foreach($car_brand as $item)
                                <option 
                                value="{{ $item->brand }}" 
                                {{ request('brand') == $item->brand ? 'selected' : ''   }} >
                                {{ $item->brand }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="generation" class="control-label">{{ 'รุ่นรถยนต์ / Car Model' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('generation') ? 'has-error' : ''}}">
                        <input class="form-control" name="generation" type="text" id="generation" value="{{ isset($register_car->generation) ? $register_car->generation : ''}}" placeholder="รุ่นรถยนต์ของคุณ / Your car model" required>
                        {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <br><br><br>
                <div class="col-12 col-md-2">
                    <label for="registration_number" class="control-label">{{ 'ทะเบียนรถ / Car registration number' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                        <input class="form-control" name="registration_number" type="text" id="registration_number" value="{{ isset($register_car->registration_number) ? $register_car->registration_number : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required>
                        {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="province" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                        <select name="province" id="province" class="form-control">
                                <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            
            
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($register_car->provider_id) ? $register_car->provider_id : Auth::user()->provider_id}}" required readonly>
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="d-none form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                <label for="year" class="control-label">{{ 'ปี่ที่ผลิตรถยนต์' }}</label>
                <input class="form-control" name="year" type="text" id="year" value="{{ isset($register_car->year) ? $register_car->year : ''}}" placeholder="ปี่ที่ผลิตรถยนต์ของคุณ">
                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
            </div>

        </div> 
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}">
</div>

