@extends('layouts.main')
@section('content') 


    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                                @if($data->image == "" )
                                        <img class="car-big-img" src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img class="car-big-img" src="{{ url('/image/'.$data->id ) }}" alt="" > 
                                    @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                        <form method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <ul>
                                <li>Brand <span>{{ $data->brand  }}</span></li>
                                <li>Model <span>{{ $data->model  }}  {{ $data->submodel  }}</span></li>
                            </ul>
                            <ul>
                                <li>จำนวนที่นั่ง <span>{{ $data->seats  }}</span></li>
                                <li>ระบบเกียร์ <span>{{ $data->gear  }}</span></li>
                                <li>ระยะทาง <span>{{ $data->distance  }} km</span></li>
                                <li>สี <span>{{ $data->color  }}</span></li>
                            </ul>
                            <ul>
                                <li>น้ำมัน <span>{{ $data->fuel  }}</span></li>
                                <li>สถานที่ <span>{{ $data->location  }}</span></li>
                            </ul>
                           
                            <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $data->id}}" >
                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                            <input class="d-none" name="price" type="number" id="price" value="{{$data->price}}" >
                        </div>
                        <div class="car__details__sidebar__payment">
                            <ul>
                                <li>Price <span>{{ $data->price}} บาท</span> </li>
                            </ul>
                            <a href="{{ $data->link}}" class="primary-btn"><i class="fa fa-credit-card"></i> Buy at ...</a>
                        </div>
                            <button type="submit" class="btn btn-sm btn-warning" >
                                <i class="fa fa-shopping-cart"></i> เพิ่มเป็นรายการโปรด
                            </button> 
                        </form>
                        <li>
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
                                </li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->

    @endsection