@extends('layouts.main')

@section('content')
<div class="container">
<div class="row flex-lg-nowrap">

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <img src="{{$data->avatar}}" width="200" />
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $data->username }}</h4>
                    <div class="text-muted"><small>เป็นสมาชิกมา  วันแล้ว</small></div>
                    <div class="mt-2">
                        

                      <!-- <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i> 
                        <span><input class="form-control" name="avatar " type="file" id="avatar " value="{{ isset($data->avatar ) ? $data->avatar  : ''}}" accept="image/*" multiple="multiple">
                        {!! $errors->first('avatar ', '<p class="help-block">:message</p>') !!} </span>
                      </button> -->
                    </div>
                  </div>
                  <!-- <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                    <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                  </div> -->
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">ข้อมูลพื้นฐาน / Basic information </a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'ชื่อ / Name' }}<br></h4>
                              <!-- <input class="form-control" type="text" name="name" placeholder="John Smith" value="John Smith"> -->
                              <h5><br>{{ $data->name }}</h5> 
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'ชื่อผู้ใช้  / Username' }}<br></h4>
                              <!-- <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s"> -->
                              <h5><br>{{ $data->username }}</h5> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'วันเกิด / Birthday ' }}<br></h4>
                              <!-- <input class="form-control" type="text" name="name" placeholder="John Smith" value="John Smith"> -->
                              <h5><br> {{ $data->brith }}</h5> 
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'เพศ / Sex ' }}<br></h4>
                              <!-- <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s"> -->
                              <h5><br>{{ $data->sex }}</h5> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'อีเมล  / E-mail' }}</h4>
                              <!-- <input class="form-control" type="text" placeholder="user@example.com"> -->
                              <h5><br>{{ $data->email }}</h5> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <h4>{{ 'โทรศัพท์ / Phone ' }}</h4>
                              <!-- <input class="form-control" type="text" placeholder="user@example.com"> -->
                              <h5><br>{{ $data->phone }}</h5> 
                            </div>
                          </div>
                        </div>
                        
                        @if(Auth::check())
                                    @if(Auth::user()->id == $data->id || Auth::user()->role == "admin")
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="massengbox" class="control-label">
                                                    <b>{{ 'ใบอนุญาตขับรถ / Driver license ' }}</b><br>
                                                    <span style="font-size: 13px;" class="text-danger">ใบอนุญาตขับรถจะไม่แสดงให้ผู้อื่นเห็น</span>
                                                </label>
                                            </div><br><br>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <label for="massengbox" class="control-label">&nbsp;&nbsp;&nbsp;รถยนต์</label>
                                                    <br>
                                                    <img src="{{ url('storage')}}/{{ $data->driver_license }}" width="170" /><br/><br/> 
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="massengbox" class="control-label">&nbsp;&nbsp;&nbsp;รถจักรยานยนต์</label>
                                                    <br>
                                                    <img src="{{ url('storage')}}/{{ $data->driver_license2 }}" width="170" /><br/><br/> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif 
                                @endif
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <!-- <button class="btn btn-primary" type="submit">Save Changes</button> -->
                        <a href="{{ url('/profile/' . $data->id . '/edit') }}" title="Edit Wishlist"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div> -->

  </div>
</div>
</div>
@endsection