@extends('layouts.partners.theme_partner_new')


@section('content')
<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="row col-12">
                <div class="col-9">
                    <h5 style="margin-top: 8px;" class="font-weight-bold mb-0">
                    รถที่ถูกรายงานล่าสุด
                    </h5>
                </div>
                <div class="col-3">
                    <a style="float: right;" type="button" data-toggle="modal" data-target="#Partner_reportnew">
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>วิธีใช้
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>คันที่</th>
                            <th>ยี่ห้อ/รุ่น</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>เหตุผล</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guest_latest as $item)
                            <tr class="text-center">
                                <!-- <td>{{ $item->id }}</td> -->
                                <td>{{ $loop->iteration }}</td>
                                <td> 
                                    @if(!empty($item->register_cars->brand))
                                    <span> <b>{{ $item->register_cars->brand }}</b> </span><br>
                                    @endif
                                    @if(!empty($item->register_cars->generation))
                                    <span style="font-size: 15px;color: #708090">{{ $item->register_cars->generation }} </span>
                                    @endif
                                </td>
                                <td>
                                    <span> <b>{{ $item->registration }}</b> </span><br>
                                    <span style="font-size: 15px;color: #708090">{{ $item->county }}</span>
                                </td>
                                <td>
                                    @switch($item->massengbox)
                                        @case('1')
                                            กรุณาเลื่อนรถด้วยค่ะ
                                        @break
                                        @case('2')
                                            รถคุณเปิดไฟค้างไว้ค่ะ
                                        @break
                                        @case('3')
                                            มีเด็กอยู่ในรถค่ะ
                                        @break
                                        @case('4')
                                            รถคุณเกิดอุบัติเหตุค่ะ
                                        @break
                                        @case('5')
                                            แจ้งปัญหาการขับขี่
                                        @break
                                        @case('6')
                                            {{ $item->masseng }}
                                        @break
                                    @endswitch
                                    <br>
                                    @if(!empty($item->report_drivingd_detail))
                                        <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                    @endif
                                </td>
                                <td>
                                    <b>
                                        {{ $item->created_at->format('l d F Y') }} <br>
                                        {{ $item->created_at->format('H:i') }}
                                    </b>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
<br>
    
                    
                    <!--------------------------------------------- end pc --------------------------------------------->
                    <!--------------------------------------------- Mobile --------------------------------------------->
                    <div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                        <div class="row">
                            <div class="card-header border-bottom-0 bg-transparent">
                                <div class="col-12"  style="margin-top:10px">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">รถที่ถูกรายงานล่าสุด</h5>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="card-body" style="padding: 0px 10px 0px 10px;">
                            @foreach($guest_latest as $item)
                                    @foreach($data_partners as $data_partner)
                                    @endforeach
                                    <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                                        <center>
                                        <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                                <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                
                                                </div>
                                                <div class="col-8" style="margin-bottom:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                        <h5 style="margin-bottom:0px; margin-top:10px; ">{{ $item->registration }} <br> {{ $item->county }}</h5>

                                                </div> 
                                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                                    <i class="fas fa-angle-down" ></i>
                                                </div>
                                                <div class="col-12 collapse" id="Line_{{ $item->id }}"> 
                                                    <hr>
                                                    @if(!empty($item->register_cars->brand))
                                                    <p style="font-size:18px;padding:0px"> ยี่ห้อ <br>  {{ $item->register_cars->brand }}  </p> <hr>
                                                    @endif
                                                    @if(!empty($item->register_cars->generation))
                                                    <p style="font-size:18px;padding:0px">รุ่น <br> {{ $item->register_cars->generation }}  </p> <hr>
                                                    @endif
                                                    <p style="font-size:18px;padding:0px">รายงาน <br> 
                                                        @switch($item->massengbox)
                                                            @case('1')
                                                                กรุณาเลื่อนรถด้วยค่ะ
                                                            @break
                                                            @case('2')
                                                                รถคุณเปิดไฟค้างไว้ค่ะ
                                                            @break
                                                            @case('3')
                                                                มีเด็กอยู่ในรถค่ะ
                                                            @break
                                                            @case('4')
                                                                รถคุณเกิดอุบัติเหตุค่ะ
                                                            @break
                                                            @case('5')
                                                                แจ้งปัญหาการขับขี่
                                                            @break
                                                            @case('6')
                                                                {{ $item->masseng }}
                                                            @break
                                                        @endswitch
                                                        <br>
                                                        @if(!empty($item->report_drivingd_detail))
                                                            <span class="text-danger">{{ $item->report_drivingd_detail }}</span>
                                                        @endif
                                                    </p> <hr>
                                                    <p style="font-size:18px;padding:0px">วันที่ <br> 
                                                        {{ $item->created_at->format('l d F Y') }}
                                                        <br>
                                                        เวลา
                                                        <br>
                                                        {{ $item->created_at->format('H:i') }}
                                                    </p> 
                                                </div>
                                            </div>
                                        </center>   
                                    </div>  
                                @endforeach
                                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $guest_latest->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                    </div>
                    
                     
                    <!--------------------------------------------- end Mobile --------------------------------------------->
                    
                    
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------- Modal รถที่ถูกรายงานล่าสุด------------------------------------------->
  <div class="modal fade"  id="Partner_reportnew" tabindex="-1" role="dialog" aria-labelledby="Partner_reportnewTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_reportnewTitle">รถที่ถูกรายงานล่าสุด</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- <br>
          <section id="about2" class="about2" style="padding:0px;">
              <div style="border: 1px solid red; border-radius: 10px;" class="video-box d-flex justify-content-center align-items-stretch position-relative">
                  <a href="{{ asset('Medilab/video/VII Video v4.mp4') }}" class="glightbox play-btn mb-12"></a>
              </div>
          </section>
          <br>
          <hr>
          <br> -->
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos1" aria-expanded="false" aria-controls="sos1">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.รถที่ถูกรายงานล่าสุด</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"data-toggle="collapse" data-target="#sos1" aria-expanded="false" aria-controls="sos1">
                      <i class="fas fa-angle-down"  ></i>
                  </div>
                  <div class="col-12 collapse" id="sos1">
                      <br>
                      <center><img src="{{ asset('/img/วิธีใช้งาน_p/6.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.คันที่ : แสดงลำดับที่อ้างอิงของรถที่ถูกรายงาน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ยี่ห้อ/รุ่น : แสดงยี่ห้อรถและรุ่นรถที่ถูกรายงาน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.หมายเลขทะเบียน : แสดงหมายเลขทะเบียนรถและจังหวัดของทะเบียนรถ</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.เหตุผล : แสดงเหตุผลที่ถูกรายงาน</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.วันที่ : แสดงวันที่ถูกรายงาน</h5>
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
  <!------------------------------------------- Modal รถที่ถูกรายงานล่าสุด ------------------------------------------->
@endsection
