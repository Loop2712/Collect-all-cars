@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <!-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:">Action</a></li>
                    <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                    <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                        <a href="javascript:" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <span class="input-group-append search-btn btn btn-primary">
                            <i class="feather icon-search input-group-text"></i>
                        </span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    <!-------------------------------------------------- pc --------------------------------------------------->
    <div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center" style="margin-top:10px;">
                <div>
                    <h5 class="font-weight-bold mb-0" > รถลงทะเบียน <b>{{ $neme_partner }}</b> </h5>
                </div>
                <form method="GET" action="{{ url('/register_cars_partner') }}" accept-charset="UTF-8" class="ms-auto form-inline my-2 my-lg-0 float-right ms-auto" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="ค้นหา..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn radius-30" type="submit" style="border-color:#D2D7DC;border-style: solid;border-width: 1px 1px 1px 1px;border-radius: 0px 30px 30px 0px">
                                <i class="bx bx-search"></i>
                            </button>
                        </span>
                    </div>
                </form> &nbsp;
                <a style="float: right;" type="button" data-toggle="modal" data-target="#Partner_register_p">
                        <button class="btn btn-primary btn-sm">
                                <i class="fas fa-info-circle"></i>วิธีใช้
                        </button>
                    </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>คันที่</th>
                            <th>ยี่ห้อ</th>
                            <th>รุ่น</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>ประเภท</th>
                            <th>ผู้ลงทะเบียน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report_register_cars as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->brand }}</td>
                                <td>{{ $item->generation }}</td>
                                <td>
                                    <span> {{ $item->registration_number }}</span><br>
                                    <span style="font-size: 15px;color: #708090">{{ $item->province }}</span>
                                </td>
                                <td>
                                    @if( $item->car_type == "car")
                                        <img width="35px" src="https://www.viicheck.com/img/icon/car.png">
                                    @endif
                                    @if( $item->car_type == "motorcycle")
                                        <img width="35px" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                    @endif
                                </td>
                                <td>
                                    <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i>{{ $item->name }}</a>
                                    <br>
                                    @if(!empty($item->user->branch))
                                        <b>สาขา</b> {{ $item->user->branch }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
    
    <div class="container d-block d-lg-none">
            <div class="row">
                <div class="col-xl-12 ">
                    <div class="card">
                        <div class="card-block table-border-style d-none d-lg-block" style="margin-top:-30px;font-size: 16px;">
                            <div class="table-responsive" >
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>คันที่</th>
                                            <th>ยี่ห้อ</th>
                                            <th>รุ่น</th>
                                            <th>หมายเลขทะเบียน</th>
                                            <th>ประเภท</th>
                                            <th>ผู้ลงทะเบียน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report_register_cars as $item)
                                            <center>  
                                                <tr class="text-center">
                                                    <td scope="row">  {{ $item->id }}</th>
                                                    <td>{{ $item->brand }}</td>
                                                    <td>{{ $item->generation }}</td>
                                                    <td>
                                                        <span> {{ $item->registration_number }}</span><br>
                                                        <span style="font-size: 15px;color: #708090">{{ $item->province }}</span>
                                                    </td>
                                                    <td class="col-md-2">
                                                        @if( $item->car_type == "car")
                                                            <img width="25%" src="https://www.viicheck.com/img/icon/car.png">
                                                        @endif
                                                        @if( $item->car_type == "motorcycle")
                                                            <img width="25%" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <center>
                                                        <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}"><i class="far fa-eye text-info"></i>{{ $item->name }}</a>
                                                        <br>
                                                        @if(!empty($item->user->branch))
                                                            <b>สาขา</b> {{ $item->user->branch }}
                                                        @endif
                                                    </center>
                                                    </td>
                                                </tr>  
                                            </center>
                                        @endforeach
                                        
                                        <div class="pagination-wrapper"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               <!--------------------------------------------- end pc --------------------------------------------->

               <!-- ----------------------------------------------mobile ------------------------------------------------>
            <div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="row">
                    <div class="card-header border-bottom-0 bg-transparent">
                        <div class="col-12"  style="margin-top:10px">
                            <div>
                                <h5 class="font-weight-bold mb-0">รถลงทะเบียน <b>{{ $neme_partner }}</h5>
                            </div>
                            <form method="GET" action="{{ url('/manage_user_partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right ms-auto" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="ค้นหา..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn " type="submit" style="border-color:#D2D7DC;border-style: solid;border-width: 1px 1px 1px 1px;border-radius: 0px 30px 30px 0px">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-white radius-10" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-user-plus'></i>สร้างบัญชีผู่ใช้ใหม่</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0px 10px 0px 10px;">
                        @foreach($report_register_cars as $item)
                            @foreach($data_partners as $data_partner)
                            @endforeach
                            <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                                <center>
                                    <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                        <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                        <span> No.{{ $item->id }}</span>
                                            <br>
                                            @if( $item->car_type == "car")
                                                <img width="80%" src="https://www.viicheck.com/img/icon/car.png">
                                            @endif
                                            @if( $item->car_type == "motorcycle")
                                                <img width="80%" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                            @endif
                                        </div>
                                        <div class="col-8" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                <h5 style="margin-bottom:0px; margin-top:10px; ">{{ $item->registration_number }} <br> {{ $item->province }}</h5>

                                        </div> 
                                        <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                            <i class="fas fa-angle-down" ></i>
                                        </div>
                                        <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                            <hr>
                                            <p style="font-size:18px;padding:0px"> ยี่ห้อ <br>  {{ $item->brand }}  </p> <hr>
                                            <p style="font-size:18px;padding:0px">รุ่น <br> {{ $item->generation }}  </p> <hr>
                                            <p style="font-size:18px;padding:0px">ผู้ลงทะเบียน <br> 
                                                <a target="bank" class="btn btn-sm" href="{{ url('/profile') . '/' . $item->user_id }}">
                                                    <i class="far fa-eye text-info"></i><span style="font-size:18px;padding:0px"> {{ $item->name }}  </span>
                                                </a>
                                                <br>
                                                @if(!empty($item->user->branch))
                                                    <b>สาขา</b> {{ $item->user->branch }}
                                                @endif
                                            </p> 
                                        </div>
                                    </div>
                                </center>   
                            </div>  
                        @endforeach
                        <div class="pagination-wrapper"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
               
               <!-- ----------------------------------------------end mobile---------------------------------------------- -->


                <!-- <div class="card">
                    <h3 class="card-header">
                        รถลงทะเบียน องค์กร <b>2บี กรีน จำกัด</b></span> 
                        <form method="GET" action="{{ url('/report_register_cars') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    </h3>
                        <br>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row alert alert-secondary">
                                        <div class="col-1">
                                            <b>คันที่</b><br>
                                            Number
                                        </div>
                                        <div class="col-2">
                                            <b>ยี่ห้อ</b><br>
                                            Brand
                                        </div>
                                        <div class="col-3">
                                            <b>รุ่น</b><br>
                                            Model
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>หมายเลขทะเบียน</b><br>
                                                Registration number
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ประเภท</b><br>
                                                Car type
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <b>ผู้ลงทะเบียน</b><br>
                                                Registrant
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($report_register_cars as $item)
                                    <div class="row">
                                        <div class="col-1">
                                            <center>
                                                {{ $item->id }}
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <p style="color: #FF0000; font-size: 20px;"><b>{{ $item->brand }}</b></p>
                                        </div>
                                        <div class="col-3">
                                            <p style="color: #ff6363; font-size: 20px;"><b>{{ $item->generation }}</b></p>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <span> {{ $item->registration_number }}</span><br>
                                                <span style="font-size: 15px;color: #708090">{{ $item->province }}</span>
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                @if( $item->car_type == "car")
                                                    <img width="25%" src="https://www.viicheck.com/img/icon/car.png">
                                                @endif
                                                @if( $item->car_type == "motorcycle")
                                                    <img width="25%" src="https://www.viicheck.com/img/icon/motorcycle.png">
                                                @endif
                                            </center>
                                        </div>
                                        <div class="col-2">
                                            <center>
                                                <p class="text-success">
                                                    <span style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                        <b>{{ $item->name }}</b>
                                                    </span>
                                                </p>
                                            </center>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    <div class="pagination-wrapper"> {!! $report_register_cars->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!------------------------------------------- Modal ลงทะเบียน ------------------------------------------->
  <div class="modal fade"  id="Partner_register_p" tabindex="-1" role="dialog" aria-labelledby="registerTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="registerTitle">รถลงทะเบียน</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/1.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ตารางรายการ รถลงทะเบียน</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/2.png') }}"  width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.คันที่ : แสดงลำดับที่อ้างอิงของรถที่ลงทะเบียน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ยี่ห้อ : ชื่อยี่ห้อรถที่ลงทะเบียน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.รุ่น : ชื่อรุ่นรถที่ลงทะเบียน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ประเภท : ประเภทรถมีรูปแบบ ดังต่อไปนี้ <br>
                          <h5 style="text-indent:35px;font-family: 'Prompt', sans-serif;">-" <img width="5%" src="https://www.viicheck.com/img/icon/motorcycle.png"> " หมายถึง รถจักรยานยนต์ </h5> 
                          <h5 style="text-indent:35px;font-family: 'Prompt', sans-serif;">-" <img width="5%" src="https://www.viicheck.com/img/icon/car.png"> " หมายถึง รถยนต์</h5>
                      </h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.ผู้ลงทะเบียน : คลิกที่ "<i class="far fa-eye text-info"></i> " เพื่อแสดงรายละเอียนผู้ลงทะเบียนรถ</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.การค้นหา</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                              <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">ค้นหารายการจากหมายเลขทะเบียนรถตามคำระบุ</h5>
                      
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!------------------------------------------- Modal ลงทะเบียน  ------------------------------------------->
@endsection
