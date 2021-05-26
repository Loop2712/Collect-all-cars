
<!-- หน้าลงทะเบียนทั่วไป -->
<div id="div_general" class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- รถซ้ำ -->
                <!-- Button trigger modal -->
                <button id="btn_repeatedly" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#not_system">
                  Launch static backdrop modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="not_system" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <center>
                            <img width="50%" src="{{ asset('/img/stickerline/PNG/17.png') }}">
                            <br><br>
                            <h5 class="text-danger">รถหมายเลขทะเบียนนี้ท่านลงทะเบียนแล้วค่ะ</h5>
                            <p style="line-height: 2;">กรุณาตรวจสอบใหม่อีกครั้งค่ะ</p>
                            <h5 class="text-danger">This car registration number has been registered.</h5>
                            <p style="line-height: 2;">Please check and try again.</p>
                            <br>
                        </center>
                      </div>
                      <div class="modal-footer d-none">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- ยืนยันการลงทะเบียน -->
                <!-- Button trigger modal -->
                <button id="btn_confirm" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#confirm">
                  Launch static backdrop modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Warning <i class="fas fa-exclamation-triangle text-danger"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- แสดงเฉพาะคอม -->
                      <div class="modal-body d-none d-lg-block">
                        <center>
                    
                            <h5 class="text-danger">คุณยืนยันที่จะลงทะเบียนหมายเลขทะเบียนนี้ใช่มั้ยค่ะ</h5>
                            <p style="line-height: 2;">You confirm to register this registration number ?</p>
                            <br>
                            <div style="position: relative; z-index: 5">
                                <div style="padding-top: 8px;">
                                    <h4 style="margin-top: 70px;"><b id="reg_num"></b></h4>
                                    <p id="reg_province" style="font-size: 17px;" class="text-dark"></p>
                                </div>
                            </div>
                            <img style="position: absolute;margin: -180px -50px;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/18.png') }}">
                            <img style="position: absolute;margin: -100px -140px;z-index: 2;" width="280" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">

                        </center>

                      </div>
                      <!-- แสดงเฉพาะมือถือ -->
                      <div class="modal-body d-block d-md-none">
                        <center>
                            <h5 class="text-danger">คุณยืนยันที่จะลงทะเบียนหมายเลขทะเบียนนี้ใช่มั้ยค่ะ</h5>
                            <p style="line-height: 1;">You confirm to register this registration number ?</p>
                            <br>
                            <div style="position: relative; z-index: 5">
                                <div style="padding-top: 8px;">
                                    <h4 style="margin-top: 65px;"><b id="reg_num_mo"></b></h4>
                                    <p id="reg_province_mo" style="font-size: 17px;" class="text-dark"></p>
                                </div>
                            </div>
                            <img style="position: absolute;margin: -180px -50px;z-index: 1;transform:rotate(360deg);" width="100" src="{{ asset('/img/stickerline/PNG/18.png') }}">
                            <img style="position: absolute;margin: -100px -140px;z-index: 2;" width="280" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">

                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">แก้ไข</button>
                        <div class="form-group">
                            <input id="submit_form" class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'บันทึก' : 'บันทึก' }}" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @if(empty(Auth::user()->phone) or empty(Auth::user()->location_P) or empty(Auth::user()->location_A))
                    <div id="input_information">
                        <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลของท่าน / Your Information' }}</span><span style="color: #FF0033;"> *<br><br></span>
                        <div class="row">
                            <div class="col-12 col-md-4 d-none d-lg-block">
                                <label  class="control-label">{{ 'จังหวัดที่ท่านอยู่ปัจจุบัน / Province of your current address.' }}</label><span style="color: #FF0033;"> *</span>
                            </div>
                            <div class="col-12 col-md-4 d-none d-lg-block">
                                <label  class="control-label">{{ 'อำเภอที่ท่านอยู่ปัจจุบัน / District of your current address.' }}</label><span style="color: #FF0033;"> *</span>
                            </div>
                            <div class="col-12 col-md-4 d-none d-lg-block">
                                <label  class="control-label">{{ 'เบอร์โทรศัพท์ / Phone number' }}</label><span style="color: #FF0033;"> *</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group {{ $errors->has('location_P') ? 'has-error' : ''}}">
                                    <select name="location_P" id="location_P" class="form-control" required onchange="show_location_A();change_location();">
                                            <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                    </select>
                                    {!! $errors->first('location_P', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group {{ $errors->has('location_A') ? 'has-error' : ''}}">
                                    <select name="location_A" id="location_A" class="form-control" required>
                                            <option value="" selected > - กรุณาเลือกอำเภอ / Please select district - </option> 
                                                                               
                                    </select>
                                    {!! $errors->first('location_A', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                    <input class="form-control" name="phone" type="phone" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone :  Auth::user()->phone }}" required placeholder="กรุณาใส่เบอร์ของคุณ" pattern="[0-9]{10}">
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @else
                    <input class="form-control" name="location_P" type="hidden" id="location_P" value="{{ isset($register_car->location_P) ? $register_car->location_P :  Auth::user()->location_P }}" readonly>

                    <input class="form-control" name="location_A" type="hidden" id="location_A" value="{{ isset($register_car->location_A) ? $register_car->location_A :  Auth::user()->location_A }}" readonly>

                    <input class="form-control" name="phone" type="hidden" id="phone" value="{{ isset($register_car->phone) ? $register_car->phone :  Auth::user()->phone }}" readonly>
                @endif
                    <input class="form-control" name="location" type="hidden" id="location" value="{{ isset($register_car->location) ? $register_car->location :  Auth::user()->location_P }}" readonly>
                
                <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถ / Vehicle Information' }}</span><span style="color: #FF0033;"> *</span>
                <br><br>
                <h4>
                    <input type="radio" name="car_type" checked value="{{ isset($register_car->car_type) ? $register_car->car_type : 'car'}}" required onclick="
                        document.querySelector('#div_data').classList.remove('d-none'),

                        document.querySelector('#div_motor_brand').classList.add('d-none'),
                        document.querySelector('#brand_input').classList.add('d-none'),
                        document.querySelector('#generation_input').classList.add('d-none'),
                        document.querySelector('#input_motor_brand').classList.add('d-none'),
                        document.querySelector('#input_motor_model').classList.add('d-none'),

                        document.querySelector('#div_car_brand').classList.remove('d-none'),
                        document.querySelector('#input_car_model').classList.remove('d-none'),
                        document.querySelector('#input_car_brand').classList.remove('d-none');">
                    &nbsp;<i class="fas fa-car-side text-danger"></i>&nbsp; รถยนต์ / Car &nbsp;&nbsp;&nbsp;
                  
                    <!-- แสดงเฉพาะมือถือ -->
                    <div class="d-block d-md-none">
                        <input type="radio" name="car_type" value="{{ isset($register_car->car_type) ? $register_car->car_type : 'motorcycle'}}" required onclick="
                            document.querySelector('#div_data').classList.remove('d-none'),

                            document.querySelector('#brand_input').classList.add('d-none'),
                            document.querySelector('#generation_input').classList.add('d-none'),
                            document.querySelector('#input_car_model').classList.add('d-none'),
                            document.querySelector('#input_car_brand').classList.add('d-none'),
                            document.querySelector('#div_car_brand').classList.add('d-none'),

                            document.querySelector('#div_motor_brand').classList.remove('d-none'),
                            document.querySelector('#input_motor_brand').classList.remove('d-none'),
                            document.querySelector('#input_motor_model').classList.remove('d-none');">
                        &nbsp;<i class="fas fa-motorcycle text-success " ></i >&nbsp;&nbsp;มอเตอร์ไซต์ / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motorcycle
                    </div>
                    <!-- แสดงเฉพาะคอม -->
                    <div class="d-none d-lg-block">
                        <input type="radio" name="car_type" value="{{ isset($register_car->car_type) ? $register_car->car_type : 'motorcycle'}}" required onclick="
                            document.querySelector('#div_data').classList.remove('d-none'),

                            document.querySelector('#brand_input').classList.add('d-none'),
                            document.querySelector('#generation_input').classList.add('d-none'),
                            document.querySelector('#input_car_model').classList.add('d-none'),
                            document.querySelector('#input_car_brand').classList.add('d-none'),
                            document.querySelector('#div_car_brand').classList.add('d-none'),

                            document.querySelector('#div_motor_brand').classList.remove('d-none'),
                            document.querySelector('#input_motor_brand').classList.remove('d-none'),
                            document.querySelector('#input_motor_model').classList.remove('d-none');">
                        &nbsp;<i class="fas fa-motorcycle text-success " ></i >&nbsp;&nbsp;มอเตอร์ไซต์ / Motorcycle
                    </div>
                </h4>
                <br>
                <!-- ข้อมูลรถ -->
                <div class=" row" id="div_data">
                    <div class="col-12 col-md-2">
                        <label for="brand" id="brand_label" class="control-label">{{ 'ยี่ห้อรถ / Brand' }}</label><span style="color: #FF0033;"> *</span>
                    </div>
                    <div class="col-12 col-md-4">
                        <div id="div_car_brand" class=" form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                            <!-- car -->
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
                                    <option value="" selected> - เลือกยี่ห้อ / Select Brand - </option> 
                                @endif
                                <br>
                                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
                            </select>
                        </div>
                        <div id="div_motor_brand" class="d-none form-group {{ $errors->has('motor_brand') ? 'has-error' : ''}}">
                            <!-- motorcycles -->
                            <select name="motor_brand" class="d-none form-control" id="input_motor_brand"  onchange="showMotor_model();
                                    if(this.value=='อื่นๆ'){ 
                                    document.querySelector('#brand_input').classList.remove('d-none'),
                                    document.querySelector('#generation_input').classList.remove('d-none'),
                                    document.querySelector('#brand_input').focus();
                                }else{ 
                                    document.querySelector('#brand_input').classList.add('d-none'),
                                    document.querySelector('#generation_input').classList.add('d-none');}">
                                <option value="" selected> - เลือกยี่ห้อ / Select Brand - </option>
                                <br>
                                {!! $errors->first('motor_brand', '<p class="help-block">:message</p>') !!}
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('brand_other') ? 'has-error' : ''}}">
                            <input class="d-none form-control" name="brand_other" type="text" id="brand_input" value="{{ isset($register_car->brand_other) ? $register_car->brand_other : ''}}" placeholder="ยี่ห้อรถของคุณ / Your brand">
                            {!! $errors->first('brand_other', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="generation" class="control-label">{{ 'รุ่นรถ / Model' }}</label><span style="color: #FF0033;"> *</span>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group {{ $errors->has('generation') ? 'has-error' : ''}}">
                            <!-- car -->
                            <select name="generation" id="input_car_model" class=" form-control"  onchange="if(this.value=='อื่นๆ'){ 
                                    document.querySelector('#generation_input').classList.remove('d-none'),
                                    document.querySelector('#generation_input').focus();
                                }else{ 
                                    document.querySelector('#generation_input').classList.add('d-none');}">
                                    <option value="" selected> - เลือกรุ่น / Select Model - </option>     
                                    <br> 
                                    {!! $errors->first('generation', '<p class="help-block">:message</p>') !!}             
                            </select>
                            <!-- motorcycles -->
                            <select name="motor_generation" id="input_motor_model" class="d-none form-control"  onchange="if(this.value=='อื่นๆ'){ 
                                    document.querySelector('#generation_input').classList.remove('d-none'),
                                    document.querySelector('#generation_input').focus();
                                }else{ 
                                    document.querySelector('#generation_input').classList.add('d-none');}">
                                    <option value="" selected> - เลือกรุ่น / Select Model - </option>     
                                    <br>  
                                    {!! $errors->first('motor_generation', '<p class="help-block">:message</p>') !!}            
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('generation_other') ? 'has-error' : ''}}">
                            <input class="d-none form-control" name="generation_other" type="text" id="generation_input" value="{{ isset($register_car->generation_other) ? $register_car->generation_other : ''}}" placeholder="รุ่นรถของคุณ / Your model" >
                            {!! $errors->first('generation_other', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="registration_number" class="control-label">{{ 'ทะเบียนรถ / Registration numbers' }}<span style="color: #FF0033;"> *</span></label>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                            <input class="form-control" name="registration_number" type="text" id="registration_number" value="{{ isset($register_car->registration_number) ? $register_car->registration_number : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required onchange="check_register_car();">
                            {!! $errors->first('registration_number', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="province" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}<span style="color: #FF0033;"> *</span></label>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                            <select name="province" id="province" class="form-control" required onchange="check_register_car();">
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
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="province" class="control-label">{{ 'วันหมดอายุ พรบ.' }}</span></label>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group {{ $errors->has('act') ? 'has-error' : ''}}">
                            <input class="form-control" name="act" type="date" id="act" value="{{ isset($register_car->act) ? $register_car->act : '' }}" >
                            {!! $errors->first('act', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="province" class="control-label">{{ 'วันหมดอายุ ประกัน' }}</span></label>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group {{ $errors->has('insurance') ? 'has-error' : ''}}">
                            <input class="form-control" name="insurance" type="date" id="insurance" value="{{ isset($register_car->insurance) ? $register_car->insurance : '' }}" >
                            {!! $errors->first('insurance', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    

                </div>
                
                <div>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('btn_confirm').click();re_check();">บันทึก</button>
                </div>
                <!-- <button type="button" class="btn btn-primary" onclick="alert('hello')">Primary</button> -->
                <hr>
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 col-md-2">
                            <p style="font-size: 22px;" class="control-label"><b>ข้อมูลของท่าน</b></p>
                            <p style="font-size: 16px;line-height: 5pt;" class="control-label">Your Information</p>
                        </div>
                        <div class="col-3">
                            <br>
                            <button title="Click to show/hide content" type="button"  class="btn btn-sm"
                                onclick="if(document.getElementById('information') .style.display=='none') 
                                {document.getElementById('information') .style.display=''}else{document.getElementById('information')
                                .style.display='none'}"> 
                                <h6 style="color:#7D7D7D">
                                    <i class="fas fa-angle-double-down"></i>
                                </h6>
                            </button>
                        </div>
                    </div>
                </div>

                <br><br>
                <div id="information" class="row" style="display:none;">
                    <!-- ซ้าย -->
                    <div class="col-12 col-md-5">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <center>
                                    <!-- <label for="name" class="control-label">{{ 'ชื่อ / Name' }}</label> -->
                                    <img width="80%" src="{{ Auth::user()->avatar }}" class="rounded-circle">
                                    <br><br>
                                </center>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <h3 class="text-info"><b>{{ Auth::user()->name }}</b></h3><p></p>
                                    <h5><i class="fas fa-mail-bulk" style="color: #B22222"></i></i>&nbsp; {{ Auth::user()->email }}</h5>
                                    <p></p>
                                    <h5><i class="fas fa-phone text-success"></i>&nbsp; {{ Auth::user()->phone }}</h5>
                                    <p></p>
                                    <h5><i class="fas fa-venus-mars" style="color: #6600FF"></i></i>&nbsp; {{ Auth::user()->sex }}</h5>
                                    <h5><i class="fas fa-map-marked-alt" style="color: #FF0033"></i></i>&nbsp; {{ Auth::user()->location_A }}&nbsp; {{ Auth::user()->location_P }}</h5>
                                    <input class="d-none form-control" name="name" type="text" id="name" value="{{ isset($register_car->name) ? $register_car->name : Auth::user()->name}}" required readonly>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ขวา -->
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <h5 style="padding-top: 7px;" class="text-info">รถที่คุณลงทะเบียนแล้ว</h5>
                            <br><br>
                            <div class="col-12 col-md-6">
                                <h1><i class="fas fa-car-side text-danger"></i><span style="font-size: 25px;">&nbsp;&nbsp;รถยนต์</span></h1>
                               
                                @foreach($car as $item)
                                <!-- แสดงเฉพาะคอม -->
                                <div class="row d-none d-lg-block">
                                    <div class="col-10 col-md-10 border border-primary" style= "border-radius: 15px;padding: 8px;">
                                        <div class="row" style="margin-top: 8px; margin-bottom: 8px;">
                                            <div class="col-md-12 " style="margin: 5px 20px 15px 5px;"> 
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="margin-top: -10px;" width="60"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b style="font-size: 18px;">{{ $item->brand }}</b>
                                                        <br>
                                                        <span>{{ $item->generation }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <center>
                                                            <div style="position: relative; z-index: 5">
                                                                <hr style="margin-top: 8px; margin-bottom: 8px;">
                                                                <br>
                                                                <div style="padding-top: 8px;">
                                                                    <span style="font-size: 16px;" class="text-dark"><b>{{ $item->registration_number }}</b> </span>
                                                                    <p style="font-size: 12px;" class="text-secondary">{{ $item->province }}</p>
                                                                </div>
                                                            </div>

                                                            <div style="z-index: 2">
                                                                <img style="position: absolute;right: 8%;top: 28%;" width="240" height="80" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <!-- แสดงเฉพาะมือถือ -->
                                <div class="row d-block d-md-none">
                                    <div class="col-11 border border-primary" style= "border-radius: 15px;padding: 8px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <br>
                                                    <div class="col-5">
                                                        <img class="float-right" width="60"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div>
                                                    <div class="col-7" style="padding-top: 5px;">
                                                        <h5><b>{{ $item->brand }}</b></h5>
                                                        <span style="font-size: 14px;">{{ $item->generation }}</span>
                                                    </div>
                                                </div>
                                                <hr style="margin-top: 8px; margin-bottom: 15px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <center>
                                                            <div style="position: relative; z-index: 5">
                                                                <div style="padding-top: 8px;">
                                                                    <span style="font-size: 16px;" class="text-dark"><b>{{ $item->registration_number }}</b> </span>
                                                                    <p style="font-size: 12px;" class="text-secondary">{{ $item->province }}</p>
                                                                </div>
                                                            </div>
                                                            <div style="z-index: 2">
                                                                <img style="position: absolute;right: 15%;bottom: 10%;" width="200" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <br>
                                @endforeach
                            </div>
                            <div class="col-12 col-md-6">
                                <h1><i class="fas fa-motorcycle text-success"></i><span style="font-size: 25px;">&nbsp;&nbsp;รถจักรยานยนต์</span></h1>
                                @foreach($motorcycle as $item)
                                <!-- แสดงเฉพาะคอม -->
                                <div class="row d-none d-lg-block">
                                    <div class="col-10 col-md-10 border border-primary" style= "border-radius: 15px;padding: 8px;">
                                        <div class="row" style="margin-top: 8px; margin-bottom: 8px;">
                                            <div class=" col-md-12 " style="margin: 5px 20px 15px 5px;"> 
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="margin-top: -10px;" width="60"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <b style="font-size: 18px;">{{ $item->brand }}</b>
                                                        <br>
                                                        <span>{{ $item->generation }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <center>
                                                            <div style="position: relative; z-index: 5">
                                                                <hr style="margin-top: 8px; margin-bottom: 8px;">
                                                                <br>
                                                                <div style="padding-top: 8px;">
                                                                    <span style="font-size: 16px;" class="text-dark"><b>{{ $item->registration_number }}</b> </span>
                                                                    <p style="font-size: 12px;" class="text-secondary">{{ $item->province }}</p>
                                                                </div>
                                                            </div>

                                                            <div style="z-index: 2">
                                                                <img style="position: absolute;right: 8%;top: 28%;" width="240" height="80" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <!-- แสดงเฉพาะมือถือ -->
                                <div class="row d-block d-md-none">
                                    <div class="col-11 border border-primary" style= "border-radius: 15px;padding: 8px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <br>
                                                    <div class="col-5">
                                                        <img class="float-right" width="60"src="{{ asset('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                    </div>
                                                    <div class="col-7" style="padding-top: 5px;">
                                                        <h5><b>{{ $item->brand }}</b></h5>
                                                        <span style="font-size: 14px;">{{ $item->generation }}</span>
                                                    </div>
                                                </div>
                                                <hr style="margin-top: 8px; margin-bottom: 15px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <center>
                                                            <div style="position: relative; z-index: 5">
                                                                <div style="padding-top: 8px;">
                                                                    <span style="font-size: 16px;" class="text-dark"><b>{{ $item->registration_number }}</b> </span>
                                                                    <p style="font-size: 12px;" class="text-secondary">{{ $item->province }}</p>
                                                                </div>
                                                            </div>
                                                            <div style="z-index: 2">
                                                                <img style="position: absolute;right: 15%;bottom: 10%;" width="200" src="{{ asset('/img/icon/ป้ายทะเบียน.png') }}">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <br><br>
                        <div class="row">
                            <div class="col-12 offset-7 offset-md-10">
                                <button type="button" class="btn btn-warning " onclick="document.getElementById('edit_information').click(); ">
                                    แก้ไขข้อมูล
                                </button>
                                <br>
                                <a id="edit_information" class="d-none" href="{{ url('/profile/' . $user->id . '/edit') }}" title="Edit Wishlist">แก้ไขข้อมูล </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                    <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}"  readonly>
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                    <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($register_car->provider_id) ? $register_car->provider_id : Auth::user()->provider_id}}"  readonly>
                    {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <input class="form-control" name="active" type="hidden" id="active" value="{{ isset($register_car->active) ? $register_car->active : 'Yes'}}"  readonly>
                    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                </div>

            </div> 
        </div>
    </div>
</div>

<!-- หน้าลงทะเบียนสำหรับองค์กร -->




<!-- <p class="btn btn-sm btn-primary" onclick="juristic();">เลขทะเบียนนิติบุคคล</p> -->


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        showCar_brand();
        showMotor_brand();
        show_location_P();
    });
    function juristic(){
        //PARAMETERS
        console.log("เลขทะเบียนนิติบุคคล");
        fetch("https://dataapi.moc.go.th/juristic?juristic_id=0235553000163")
            .then(response => response.json())
            .then(result => {
                console.log(result);
                //UPDATE SELECT OPTION
            });
    }
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
    function check_register_car(){
        let registration_number = document.querySelector("#registration_number");
        let province = document.querySelector("#province");

        fetch("{{ url('/') }}/api/check_register_car/"+registration_number.value+"/"+province.value+"/check_register_car")
            .then(response => response.json())
            .then(result => {

            if (result.length == 1 ) {
                document.querySelector('#submit_form').classList.add('d-none');

                document.getElementById("btn_repeatedly").click();

                let registration_reset = document.querySelector("#registration_number");
                let province_reset = document.querySelector("#province");
                    registration_reset.value = "";
                    province_reset.value = "";
                document.querySelector('#registration_number').focus();
            }else{ 
                document.querySelector('#submit_form').classList.remove('d-none');
            }

            });
            return registration_number.value;
    }

    function re_check(){
        let registration_number = document.querySelector("#registration_number");
        let province = document.querySelector("#province");

        // console.log(registration_number);
        // console.log(province);

        let reg_num = document.querySelector("#reg_num");
            reg_num.innerHTML = registration_number.value;
        let reg_province = document.querySelector("#reg_province");
            reg_province.innerHTML = province.value;

        let reg_num_mo = document.querySelector("#reg_num_mo");
            reg_num_mo.innerHTML = registration_number.value;
        let reg_province_mo = document.querySelector("#reg_province_mo");
            reg_province_mo.innerHTML = province.value;
    }

    function show_location_P(){
        fetch("{{ url('/') }}/api/location/show_location_P")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_P = document.querySelector("#location_P");
                    // location_P.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.province;
                    option.value = item.province;
                    location_P.add(option);
                }
                
            });
            
            return location_P.value;
    }

    function show_location_A(){
        let location_P = document.querySelector("#location_P");
        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#location_A");
                    location_A.innerHTML = "";

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });
            return location_A.value;
    }

    function change_location(){
        let location = document.querySelector("#location");
        let location_P = document.querySelector("#location_P");

        location.value = location_P.value;
        
    }
</script>
