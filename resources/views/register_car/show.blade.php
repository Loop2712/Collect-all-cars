@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">รหัสรถหมายเลข {{ $register_car->id }}</div>
                    <div class="card-body"> 
                        <form method="POST" action="{{ url('/sell') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                         

                        <!-- <a href="{{ url('/register_car') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/register_car/' . $register_car->id . '/edit') }}" title="Edit Register_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('register_car' . '/' . $register_car->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Register_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/> -->
                        @if($register_car->car_type == "car")
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    
                                    <tr>
                                        <th> ยี่ห้อรถ / Brand  </th>
                                        <td> 
                                        <div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                                            <input class="form-control" name="brand" type="text" id="brand" value="{{ $register_car->brand }}"  readonly/>
                                            {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                                        </div>
                                         </td>
                                    </tr>
                                    <tr>
                                        <th> รุ่นรถ / Model  </th>
                                        <td> 
                                        <div class="form-group {{ $errors->has('model') ? 'has-error' : ''}}">
                                            <input class="form-control" name="model" type="text" id="model" value="{{ $register_car->generation }}"  readonly/>
                                            {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
                                        </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> ระบบเกียร์ </th>
                                        <td>
                                            <select name="gear" id="gear" class="form-control" value="{{ isset($sell->gear) ? $sell->gear : ''}}" >
                                                <option value="" data-display="">- กรุณาเลือกระบบเกียร์ / Please select Gear -</option>
                                                @foreach (json_decode('{"เกียร์อัตโนมัติ":"เกียร์อัตโนมัติ","เกียร์ธรรมดา":"เกียร์ธรรมดา"}', true) as $optionKey => $optionValue)
                                            <option  ption value="{{ $optionKey }}"  {{ (isset($sell->fuel) && $sell->fuel == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                        @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> น้ำมันที่ใช้ </th>
                                        <td>
                                    <select class="form-control" name="fuel" id="fuel" value="{{ isset($sell->fuel) ? $sell->fuel : ''}}" >
                                            <option value="" selected> - กรุณาเลือกเชื้อเพลิง / Please select fuel - </option> 
                                        @foreach (json_decode('{"ดีเซล":"ดีเซล","เบนซิน":"เบนซิน","ไฟฟ้า":"ไฟฟ้า","ไฮบริด":"ไฮบริด","NGV":"NGV"}', true) as $optionKey => $optionValue)
                                            <option  ption value="{{ $optionKey }}"  {{ (isset($sell->fuel) && $sell->fuel == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                        @endforeach
                                    </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> สถานที่ </th>
                                        <td> 
                                            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                                                <select name="location" id="location" class="form-control" required>
                                                        <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                                        @foreach($location_array as $lo)
                                                        <option 
                                                        value="{{ $lo->province }}" 
                                                        {{ request('province') == $lo->province ? 'selected' : ''   }} >
                                                        {{ $lo->province }} 
                                                        </option>
                                                        @endforeach                                     
                                                </select>
                                                {!! $errors->first('province', '<p class="help-block">:message</p>') !!}
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> จำนวนที่นั่ง </th>
                                        <td>
                                        <div class="form-group {{ $errors->has('seats') ? 'has-error' : ''}}">
                                            <input class="form-control" name="seats" type="number" id="seats" value="{{ isset($sell->seats) ? $sell->seats : ''}}"  >
                                            {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> ระยะทาง (เลขไมล์)</th>
                                        <td>  
                                        <div class="form-group {{ $errors->has('distance') ? 'has-error' : ''}}">
                                            <input class="form-control" name="distance" type="number" id="distance" value="{{ isset($sell->distance) ? $sell->distance : ''}}"  >
                                            {!! $errors->first('distance', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>อัพโหลดรูปเพิ่มเติม</th>
                                        <td>
                                        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                            <label for="image" class="control-label">{{ 'รูปภาพ / Photo' }}</label><span style="color: #FF0033;"> *</span>
                                            <input class="form-control" name="image" type="file" id="image" value="{{ isset($sell->image) ? $sell->image : ''}}" required accept="image/*" multiple="multiple">
                                            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                            <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($sell->active) ? $sell->active : 'Yes'}}" >
                            {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                        </div>

                        <form method="POST" action="{{ url('/register_car') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                            <input class="d-none form-control" name="active" type="text" id="active" value="{{ isset($register_car->active) ? $register_car->active : 'No'}}" >
                            {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="{{ 'บันทึก' }}">
                        </div>
                        </form>
                    </form>
                        @elseif($register_car->car_type == "motorcycle")
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><img width="40"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($register_car->brand) }}.png"></td>
                                    </tr>
                                    <tr><th> ยี่ห้อรถ / Brand  </th><td> {{ $register_car->brand }} </td></tr>
                                    <tr><th> รุ่นรถ / Model  </th><td> {{ $register_car->generation }} </td></tr>
                                    <tr><th> ระบบเกียร์ </th><td> {{ $register_car->year }} </td></tr>
                                    <tr><th> สี </th><td>  </td></tr>
                                    <tr><th> เครื่องยนต์ (cc) </th><td>  </td></tr>
                                    <tr><th> สถานที่ </th><td>  </td></tr>
                                </tbody>
                            </table>
                        </div>
                        @endif

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
