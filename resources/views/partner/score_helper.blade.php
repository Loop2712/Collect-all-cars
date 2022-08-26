@extends('layouts.partners.theme_partner_new')

@section('content')
<div class="container-partner-sos">
  <div class="col-12 d-none d-lg-block">
        <div class="row">
            <br><br>
            <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="margin-top: 10px;">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
                            <h5 class="font-weight-bold mb-0" style="margin-top:5px;">
                                การให้การช่วยเหลือจากเจ้าหน้าที่ 
                            </h5>
                            <h3 style="margin-top:10px;">
                                <b>คุณ : {{ $data_user->name }}</b>
                                <span style="font-size: 15px; float: right; margin-top:-5px;">
                                จำนวนทั้งหมด <b>{{ $count_data }}</b> ครั้ง
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                @if(!empty($average_per_minute))

                                    @if($average_per_minute['day'] != "0" && $average_per_minute['hr'] != "0" && $average_per_minute['min'] != "0")
                                        ระยะเวลาโดยเฉลี่ย <b> {{ $average_per_minute['day'] }} วัน {{ $average_per_minute['hr'] }} ชม. {{ $average_per_minute['min'] }} นาที </b> / เคส ({{ $average_per_minute['count_case'] }})
                                    @endif

                                    @if($average_per_minute['day'] == "0" && $average_per_minute['hr'] != "0" && $average_per_minute['min'] != "0")
                                        ระยะเวลาโดยเฉลี่ย <b> {{ $average_per_minute['hr'] }} ชม. {{ $average_per_minute['min'] }} นาที </b> / เคส ({{ $average_per_minute['count_case'] }})
                                    @endif

                                    @if($average_per_minute['day'] == "0" && $average_per_minute['hr'] == "0" && $average_per_minute['min'] != "0")
                                        ระยะเวลาโดยเฉลี่ย <b>{{ $average_per_minute['min'] }} นาที </b> / เคส ({{ $average_per_minute['count_case'] }})
                                    @endif

                                    @if($average_per_minute['day'] == "0" && $average_per_minute['hr'] == "0" && $average_per_minute['min'] == "0")
                                        ระยะเวลาโดยเฉลี่ย <b>น้อยกว่า 1 นาที</b> / เคส ({{ $average_per_minute['count_case'] }})
                                    @endif
                                @endif
                            </span>
                            </h3>
                        </div>
                    </div>
                </div>
                <hr style="color:black;background-color:black;height:2px;">
                <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <b>ผู้ขอความช่วยเหลือ</b>
                    </div>
                    <div class="col-3">
                        <b>เวลาแจ้งเหตุ</b>
                    </div>
                    <div class="col-3">
                        <b>สถานะ</b>
                    </div>
                    <div class="col-2">
                        <b>ระยะเวลา</b>
                    </div>

                    <br><br>
                    <hr style="color:black;background-color:black;height:2px;">
                </div>
                </div>
                <div class="card-body">
                    @php
                    $Number = 1 ;
                    @endphp

                    @foreach($view_maps as $item)

                    @php
                    $color_row = "" ;

                    if( $Number%2 == 0 ){
                        $color_row = "#FFEFD5" ;
                    }
                    @endphp
                    <div class="row text-center"> 
                        <div class="col-4">
                        <div style="margin-top: -10px;" >
                            <h5 class="text-success float-left">
                                <span style="font-size: 15px;">
                                    <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                    <i class="far fa-eye text-primary"></i>
                                    </a>
                                </span>&nbsp;{{ $item->name }}<br> 
                            </h5>
                            {{ $item->phone }}
                        </div>
                        </div>
                        <div class="col-3">
                        <div style="margin-top: -10px;">
                            <p><b>
                            {{ date("d/m/Y" , strtotime($item->created_at)) }} <br>
                            {{ date("H:i" , strtotime($item->created_at)) }}
                            </b></p>
                            @if(!empty($item->photo))
                            <br>
                            <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                <img class="main-shadow" style="border-radius: 50%; object-fit:cover;" width="150px" height="150px" src="{{ url('storage')}}/{{ $item->photo }}">
                            </a>
                            <br><br>
                            @endif
                        </div>
                        </div>
                        <div class="col-3">
                        <div style="margin-top: -10px;">
                            @if( !empty($item->helper) and empty($item->help_complete) )
                                <a href="#" class="btn btn-sm btn-warning radius-30" ><i class="fadeIn animated bx bx-message-rounded-error"></i>ระหว่างดำเนินการ</a>
                            @elseif($item->helper == null)
                                <a href="#" class="btn btn-sm btn-danger radius-30" ><i class="fadeIn animated bx bx-x"></i>ยังไม่ได้ดำเนินการ</a>
                            @elseif($item->help_complete == "Yes" && $item->helper != null)
                                <a href="#" class="btn btn-sm btn-success radius-30" ><i class="bx bx-check-double"></i>ช่วยเหลือเสร็จสิ้น</a>
                                @if(!empty($item->help_complete_time))
                                    <p style="margin-top:8px;"><b>
                                    {{ date("d/m/Y" , strtotime($item->help_complete_time)) }} {{ date("H:i" , strtotime($item->help_complete_time)) }}
                                    </b></p> 
                                @endif 
                                @if(!empty($item->photo_succeed))
                                <a href="{{ url('storage')}}/{{ $item->photo_succeed }}" target="bank">
                                    <img class="main-shadow" style="border-radius: 50%; object-fit:cover;" width="150px" height="150px" src="{{ url('storage')}}/{{ $item->photo_succeed }}">
                                </a>
                                <br><br>
                                @endif
                            @endif              
                        </div>
                        </div>
                        <div class="col-2">
                        @if( !empty($item->created_at) && !empty($item->help_complete_time) )
                            <!-- ปี -->
                            @if(\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%y') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%y')}} ปี <br>
                            @endif
                            <!-- เดือน -->
                            @if(\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%m') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%m')}} เดือน <br>
                            @endif
                            <!-- วัน -->
                            @if( \Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%d') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%d')}} วัน <br>
                            @endif
                            <!-- ชัวโมง -->
                            @if(\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%h') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%h')}} ชั่วโมง <br>
                            @endif
                            <!-- นาที -->
                            @if(\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%i') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%i')}} นาที <br>
                            @endif
                            <!-- วินาที -->
                            @if( \Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%s') != 0 )
                                {{\Carbon\Carbon::parse($item->help_complete_time)->diff(\Carbon\Carbon::parse($item->created_at))->format('%s')}} วินาที <br>
                            @endif
                            
                        @else
                            <span>-</span>
                        @endif
                        </div>
                        <br>
                        <div class="col-12">
                        @if(Auth::check())
                            @if(Auth::user()->role == 'admin-partner' or Auth::user()->id == $item->helper_id)
                                @if($item->help_complete == "Yes" and $item->score_total != null)
                                    <div class="col-12 text-left" style="margin-top:5px;">
                                        <h5>คะแนนการช่วยเหลือ</h5>
                                        <div class="row">
                                            <div class="col-3" style="padding:0px">
                                                @if($item->score_impression < 3)
                                                    <b>ความประทับใจ : </b><br>
                                                    <span class="text-danger">{{$item->score_impression}}</span>
                                                @elseif($item->score_impression == 3)
                                                    <b>ความประทับใจ : </b><br>
                                                    <span class="text-warning">{{$item->score_impression}}</span>
                                                @elseif($item->score_impression > 3)
                                                    <b>ความประทับใจ : </b><br>
                                                    <span class="text-success">{{$item->score_impression}}</span>
                                                @endif
                                            </div>
                                            <div class="col-3" style="padding:0px">
                                                @if($item->score_period < 3)
                                                    <b>ระยะเวลา : </b><br>
                                                    <span class="text-danger">{{$item->score_period}}</span>
                                                @elseif($item->score_period == 3)
                                                    <b>ระยะเวลา : </b><br>
                                                    <span class="text-warning">{{$item->score_period}}</span>
                                                @elseif($item->score_period > 3)
                                                    <b>ระยะเวลา : </b><br>
                                                    <span class="text-success">{{$item->score_period}}</span>
                                                @endif
                                            </div>
                                            <div class="col-3" style="padding:0px">
                                                @if($item->score_total < 3)
                                                    <b>ภาพรวม : </b><br>
                                                    <span class="text-danger">{{$item->score_total}}</span>
                                                @elseif($item->score_total == 3)
                                                    <b>ภาพรวม : </b><br>
                                                    <span class="text-warning">{{$item->score_total}}</span>
                                                @elseif($item->score_total > 3)
                                                    <b>ภาพรวม : </b><br>
                                                    <span class="text-success">{{$item->score_total}}</span>
                                                @endif
                                            </div>
                                            <div class="col-3" style="padding:0px">
                                                <b>คำแนะนำ/ติชม : </b><br>{{$item->comment_help}}
                                            </div> 
                                        </div>
                                    </div>
                                @elseif($item->help_complete == "Yes" and $item->score_total == null)
                                    <h5>คะแนนการช่วยเหลือ</h5>
                                    <div class="row">
                                        <div class="col-12" style="padding:0px">
                                            <b>ไม่ได้ทำแบบประเมิน</b>
                                        </div> 
                                    </div>
                                @elseif(!empty($item->helper) and empty($item->help_complete))
                                    
                                @endif      
                            @endif
                            @endif
                            <br>
                        </div>
                        @if(!empty($item->remark))
                        <div class="col-12">
                            <b>หมายเหตุจากเจ้าหน้าที่ : </b> {{ $item->remark }}
                            <br><br>
                        </div>
                        @endif
                        <hr>
                        <br><br>
                    </div>
                    @php
                        $Number = $Number + 1  ;
                    @endphp
                    @endforeach
                    <div style="float: right;">
                    </div>
                    <div class="table-responsive">
                        <div class="pagination round-pagination " style="margin-top:10px;"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

<!------------------------------------------- Modal ให้ความช่วยเหลือ ------------------------------------------->
<div class="modal fade"  id="Partner_gsos" tabindex="-1" role="dialog" aria-labelledby="Partner_gsosTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_gsosTitle">ให้ความช่วยเหลือ</h5>
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
          <center><img src="{{ asset('/img/วิธีใช้งาน_p/7.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.แผนที่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">สำหรับแสดงตำแหน่งของผู้ขอความช่วยเหลือ</h5>
                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางขอความช่วยเหลือ</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/8.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อและเบอร์ผู้ขอความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เวลา : แสดงแวลาที่ขอความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.สถานะ : แสดงสถานะการช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.รูปภาพ : แสดงรูปภาพ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ตำแหน่ง : แสดงตำแหน่งผู้ขอความช่วยเหลือบนแผนที่ด้านข้าง</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.คะแนนความช่วยเหลือ : แสดงคะแนนที่ผู้ขอความช่วยเหลือประเมิน ผู้ให้ความช่วยเหลือ</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.จำนวนทั้งหมด : แสดงจำนวนผู้ขอความช่วยเหลือบนพื้นที่บริการของท่านทั้งหมด</h5>

                  </div>
              </div>
          </div>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.ดูช่วงเวลา</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <center><img src="{{ asset('/img/วิธีใช้งาน_p/9.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.การค้นหา
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1.เลือกปี : เลือกปีที่ต้องการค้นหารายการขอความช่วยเหลือ</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2.เลือกเดือน : เลือกเดือนที่ต้องการค้นหารายการขอความช่วยเหลือ</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.3.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มค้นหา</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.4.ล้างการค้นหา : เมื่อต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา</h5>
                    </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ตารางขอความช่วยเหลือสำหรับกลางวัน : แสดงจำนวนจำนวนที่ถูกขอความช่วยเหลือ ตั้งแต่เวลา 1 A.M. - 12 A.M.</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.ตารางขอความช่วยเหลือสำหรับกลางคืน : แสดงจำนวนจำนวนที่ถูกขอความช่วยเหลือ ตั้งแต่เวลา 1 P.M. - 12 P.M.</h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.ขอความช่วยเหลือที่ค้นหาทั้งหมด : แสดงจำนวนการขอความช่วยเหลือตามช่วงเวลาที่ค้นหา </h5>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.ขอความช่วยเหลือทั้งหมด : แสดงจำนวนการขอความช่วยเหลือทั้งหมด</h5>
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
  <!------------------------------------------- Modal ให้ความช่วยเหลือ------------------------------------------->

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

    });
</script>

@endsection
