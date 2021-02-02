<div class="container">
    <div class="row">
        <!-- ข้อมูลรถที่ต้องการติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ข้อมูลรถที่ต้องการติดต่อ / Vehicle information to contact'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="massengbox" class="control-label">{{ 'ข้อความ / Message' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('massengbox') ? 'has-error' : ''}}">
                        <select name="massengbox" class="form-control"  id="massengbox" required onchange="if(this.value=='6'){ 
                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                document.querySelector('#masseng').focus();
                            }else{ 
                                document.querySelector('#masseng_label').classList.add('d-none'),
                                document.querySelector('#masseng_input').classList.add('d-none')
                            }">
                             <option value="" selected >
                                 - เลือกข้อความ / Select text - 
                             </option>  
                        @foreach (json_decode('{"1":"กรุณาเลื่อนรถด้วยค่ะ","2":"รถคุณเปิดไฟค้างไว้ค่ะ","3":"มีเด็กอยู่ในรถค่ะ","4":"รถคุณเกิดอุบัติเหตุค่ะ","5":"แจ้งปัญหาการขับขี่","6":"อื่นๆ"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}"  {{ (isset($guest->massengbox) && $guest->massengbox == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                    </div>
                    <br>
                </div>

                <div class="col-12 col-md-2">
                    <label id="masseng_label" for="masseng" class="d-none control-label">{{ 'ข้อความอื่นๆ / Other messages' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div id="masseng_input" class="d-none form-group {{ $errors->has('masseng') ? 'has-error' : ''}}">
                        <input class="form-control" name="masseng" type="text" id="masseng" value="{{ isset($guest->masseng) ? $guest->masseng : ''}}">
                        {!! $errors->first('masseng', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="registration" class="control-label">{{ 'ทะเบียนรถ / Car registration' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('registration') ? 'has-error' : ''}}">
                        <input class="form-control" name="registration" type="text" id="registration" value="{{ isset($guest->registration) ? $guest->registration : ''}}" placeholder="เช่น กก9999 / Ex. กก9999" required>
                        {!! $errors->first('registration', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="county" class="control-label">{{ 'จังหวัดของทะเบียนรถ / Province of vehicle registration' }}</label></label><span style="color: #FF0033;"> *</span>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('county') ? 'has-error' : ''}}">
                        <select name="county" id="county" class="form-control" required>
                                <option value="" selected > - กรุณาเลือกจังหวัด / Please select province - </option> 
                                @foreach($location_array as $lo)
                                <option 
                                value="{{ $lo->province }}" 
                                {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                {{ $lo->province }} 
                                </option>
                                @endforeach                                     
                        </select>
                        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            
            <div class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                <label for="photo" class="control-label">{{ 'Photo' }}</label>
                <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($guest->photo) ? $guest->photo : ''}}" >
                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="d-none form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
                <label for="brand" class="control-label">{{ 'brand' }}</label>
                <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($guest->brand) ? $guest->brand : ''}}" >
                {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <!-- ข้อมูลผู้ติดต่อ -->
        <div class="col-12">
            <span style="font-size: 22px;" class="control-label">{{ 'ท่านต้องการที่จะแสดงเบอร์ของท่านหรือไม่'}}</span>
            <!-- <span style="color: #FF0033;"> *</span><span style="color: #FF0033;font-size: 13px;"> (ระบบจะไม่แสดงข้อมูล / The system will not display the information.)</span> -->
            <br><br>
            <input type="radio" name="show_phone" onclick="document.querySelector('#name').classList.remove('d-none'),
            document.querySelector('#name_input').classList.remove('d-none'),
            document.querySelector('#phone').classList.remove('d-none'),
            document.querySelector('#phone_input').classList.remove('d-none')">
            &nbsp;&nbsp;&nbsp;แสดง / Show&nbsp;&nbsp;&nbsp;
            <input type="radio" name="show_phone" onclick="document.querySelector('#name').classList.add('d-none'),
            document.querySelector('#name_input').classList.add('d-none'),
            document.querySelector('#phone').classList.add('d-none'),
            document.querySelector('#phone_input').classList.add('d-none')">&nbsp;&nbsp;&nbsp;ไม่แสดง / Not showing
            <br><br>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="name" id="name" class="d-none control-label">{{ 'ชื่อ / Name' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="name" type="text" id="name_input" value="{{ isset($guest->name) ? $guest->name : ''}}" >
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <label for="phone" id="phone" class="d-none control-label">{{ 'เบอร์โทร / Phone number' }}</label>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <input class="d-none form-control" name="phone" type="tel" id="phone_input" value="{{ isset($guest->phone) ? $guest->phone : ''}}" placeholder="เช่น 0999999999 / Ex. 0999999999" pattern="[0-9]{10}">
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            @if(!empty(Auth::user()->provider_id)
                <div class="form-group {{ $errors->has('provider_id') ? 'has-error' : ''}}">
                <input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($guest->provider_id) ? $guest->provider_id : Auth::user()->provider_id}}" readonly>
                {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ isset($register_car->user_id) ? $register_car->user_id : Auth::user()->id}}" required readonly>
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">
</div>

<!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Launch demo modal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-8 offset-md-2">
                                                        <center>
                                                            <div class="row">
                                                            <!-- ซ้าย -->
                                                                <div class="col-12 col-md-6">
                                                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                                                    <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                                                </div>
                                                                <!-- ขวา -->
                                                                <div class="col-12 col-md-6">
                                                                    <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                                                    <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                                    <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                                                </div>

                                                                <div class="col-12 col-md-12">
                                                                    <br>
                                                                    <a class="btn btn-link text-muted" onclick="document.querySelector('#from_login').classList.remove('d-none')">เข้าสู่ระบบด้วยชื่อผู้ใช้</a>
                                                                </div>
                                                                <div class="col-12 col-md-12">
                                                                    <br>
                                                                    <a class="btn btn-link text-muted" href="{{ route('register') }}">สมัครสมาชิก</a>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <br>
                                                    <form class="d-none" method="POST" id="from_login" action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <!-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label> -->
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ชื่อผู้ใช้" required autocomplete="username">

                                                                @error('username')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label> -->
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="รหัสผ่าน" required autocomplete="current-password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-8 offset-md-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                    <label class="form-check-label" for="remember">
                                                                        {{ __('จดจำฉัน') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-8 offset-md-2">
                                                                <div class="row">
                                                                    <center>
                                                                        <div class="col-md-11">
                                                                            <button style="padding-left: 106px;padding-right: 106px;" type="submit" class="btn btn-primary">
                                                                                {{ __('เข้าสู่ระบบ') }}
                                                                            </button>
                                                                            @if (Route::has('password.request'))
                                                                                <a class="btn btn-link text-muted float-left" href="{{ route('password.request') }}">
                                                                                    {{ __('ลืมรหัสผ่าน ?') }}
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                                <br>
                                                                <!-- <div class="row"> -->
                                                                    <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                                                    <!-- <span style="margin-top: -10px;color: #ccc;text-transform: uppercase;text-align: center;" class="col-md-12">
                                                                        หรือ
                                                                    </span> -->
                                                                    
                                                                    <!-- <div style="height: 1px;width: 100%;background-color: #dbdbdb;" class="col-md-4"></div> -->
                                                                    <!-- <center>
                                                                        <div class="row">
                                                                        
                                                                            <div class="col-12 col-md-6">
                                                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/wa.png') }}"></a><br>
                                                                                <a href="{{ route('login.facebook') }}"><img width="160" height="60" src="{{ asset('/img/icon/fb.png') }}"></a><br>
                                                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/we.png') }}"></a>
                                                                            </div>
                                                                            
                                                                            <div class="col-12 col-md-6">
                                                                                <a href=""><img width="160" height="60" src="{{ asset('/img/icon/qq.png') }}"></a><br>
                                                                                <a href="{{ route('login.line') }}"><img width="160" height="60" src="{{ asset('/img/icon/line.png') }}"></a><br>
                                                                                <a href="{{ route('login.google') }}"><img width="160" height="60" src="{{ asset('/img/icon/gg.png') }}"></a>
                                                                            </div>
                                                                        </div>
                                                                    </center> -->
                                                                <!-- </div> -->
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="col-md-12">
                                                        <center>
                                                            <P><br>การลงชื่อเข้าใช้หมายความว่าคุณยอมรับ<br></P> <a class="btn btn-link" style="font-size: 13px;" target="bank" href="{{ url('/terms_of_service') }}"> <b>ข้อกำหนดในการให้บริการ</b></a>
                                                            <br><br><br>
                                                            <img width="70%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}">
                                                        </center>
                                                    </div>
                                                </div>
                                          </div>
                                          <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div> -->
                                        </div>
                                      </div>
                                    </div>
<!-- 
<script>
function myFunction(val) {
    if(val =='7'){ 
        document.querySelector('#masseng_label').classList.remove('d-none'),
        document.querySelector('#masseng_input').classList.remove('d-none')
    }else{ 
        document.querySelector('#masseng_label').classList.add('d-none'),
        document.querySelector('#masseng_input').classList.add('d-none')
    }
}
</script> -->