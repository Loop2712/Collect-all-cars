@extends('layouts.partners.theme_partner_new')

@section('content')

<!-- MODAL DELETE CASE -->
<!-- Modal -->
<div class="modal fade" id="modal_delete_case" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_delete_case" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_modal_delete_case">
                    ยืนยันการลบ ?
                </h5>
                <button id="close_modal_delete_case" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="div_content_modal_delete_case_1" class="">
                    <center>
                        <img src="{{ url('/img/stickerline/PNG/7.png') }}" style="width:60%;">
                        <h3 class="mt-3 mb-2">
                            คุณยืนยันการลบหรือไม่ ?
                        </h3>
                    </center>
                </div>
                <div id="div_content_modal_delete_case_2" class="d-none">
                    <center>
                        <img src="{{ url('/img/stickerline/PNG/22.png') }}" style="width:60%;">
                        <h3 class="mt-3 mb-2 text-success">
                            ส่งคำขอลบเรียบร้อยแล้ว
                        </h3>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                @if(Auth::user()->role == "admin-partner")
                    <a id="a_delete_case" type="button" class="btn btn-danger mr-2 ml-2 float-end">
                        <i class="fa-solid fa-delete-right mr-1"></i> ลบ
                    </a>
                @else
                    <a id="a_request_delete_case" type="button" class="btn btn-danger mr-2 ml-2 float-end">
                        <i class="fa-solid fa-delete-right mr-1"></i> ส่งคำขอลบ
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container-partner-sos">
  <div class="item sos-map col-md-12 col-12 col-lg-3">
        <div class="row">
            <div class="col-6">
                <a href="{{ url('/sos_partner') }}" style="float: left; background-color: green;" type="button" class="btn text-white" > <!-- onclick="initMap();" -->
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>
                <br><br>
            </div>
            <div class="col-6">
                <h4 style="float: right;color: #007bff;"><b>{{ $name_area }}</b></h4>
            </div>
            <div class="col-12">
                <input class="d-none" type="text" id="va_zoom" name="" value="6">
                <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                <input class="d-none" type="text" id="name_area" name="" value="{{ $name_area }}">
                <input class="d-none" type="text" id="type_partner" name="" value="{{ $type_partner }}">
                @foreach($data_partners as $data_partner)
                    <input class="d-none" type="text" id="name_partner" name="" value="{{ $data_partner->name }}">
                @endforeach
                <div style="padding-right:15px ;">
                    <div class="card">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="col-9 d-none d-lg-block">
        <div class="row">
            <div class="col-3">
                @if( $type_partner != 'volunteer')
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            เลือกพื้นที่
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/sos_partner') }}">ทั้งหมด</a>
                            @foreach($select_name_areas as $select_name_area)
                                <a id="select_name_area_{{ $select_name_area->name_area }}" class="dropdown-item" href="{{ url('/sos_partner?name_area=') . $select_name_area->name_area }}">
                                    {{ $select_name_area->name_area }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-9">
                <div style="float: right;">
                    <a href="{{ url('/sos_detail_partner') }}" type="button" class="btn btn-primary text-white">ดูช่วงเวลา <i class="fas fa-chart-line"></i></a>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'admin-partner')
                            <a href="{{ url('/sos_score_helper') }}" type="button" class="btn btn-primary text-white d-">
                                คะแนนการช่วยเหลือ
                            </a>
                        @endif
                    @endif
                    <a type="button" data-toggle="modal" data-target="#Partner_gsos">
                        <button class="btn btn-success">
                            <i class="fas fa-info-circle"></i>วิธีใช้
                        </button>
                    </a>
                </div>
            </div>

            <br><br>
            <!-- หัวข้อ -->
            <div class="card card border-top border-0 border-4 border-dark d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="row card-header border-bottom-0 bg-transparent my-3">
                    <div class="col-12">
                        <h5 class="font-weight-bold mb-0" >
                            การขอความช่วยเหลือ
                            <span style="font-size: 15px; float: right; margin-top:5px;">
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
                        </h5>
                    </div>
                </div>
            </div>

            @foreach($view_maps as $item)
            <!-- เนื้อหา -->
            @php
                $class_border_card = '';
                $card_background_color = '';
                $btn_background_color = '';

                if($item->tag_sos_or_repair != "tag_repair"){
                    $class_border_card = 'border-warning' ;
                    $card_background_color = 'bg-light-warning' ;
                    $btn_background_color = 'bg-warning' ;
                }else{
                    $class_border_card = 'border-info' ;
                    $card_background_color = 'bg-light-info' ;
                    $btn_background_color = 'bg-info' ;
                }
            @endphp
            
            <div class="card card_sos_map radius-10 d-none d-lg-block border-top border-0 border-4 {{ $class_border_card }}" >
                <div class="card-body">
                    <div class="p-2">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-8">
                                    @if($item->tag_sos_or_repair != "tag_repair")
                                        <h2 class="text-warning">
                                            <i class="fa-solid fa-truck-medical me-1 font-22 text-warning"></i> ขอความช่วยเหลือ
                                            <span style="font-size:15px;color: black;">
                                                เมื่อเวลา : <b>{{ $item->created_at }}</b>
                                            </span>
                                        </h2>
                                    @else
                                        <h2 class="text-info">
                                            <i class="fa-regular fa-hammer me-1 font-22 text-info"></i> แจ้งซ่อม
                                            <span style="font-size:15px;color: black;">
                                                เมื่อเวลา : <b>{{ $item->created_at }}</b>
                                            </span>
                                        </h2>
                                    @endif

                                    @php
                                        $time_created_at = strtotime($item->created_at);

                                        // ----- ใช้เวลาถึงที่เกิดเหตุ (หน่วยเป็นวินาที) -----
                                        $time_start_to_scene = '';
                                        if(empty($item->time_to_the_scene)){
                                            $time_start_to_scene = '-' ;
                                        }else{
                                            $time_to_the_scene = strtotime($item->time_to_the_scene);
                                            $to_scene = $time_to_the_scene - $time_created_at ;

                                            // แปลงเวลาให้อยู่ในรูปแบบ วัน, ชั่วโมง, นาที
                                            $days_to_scene = floor($to_scene / (60 * 60 * 24));
                                            $hours_to_scene = floor(($to_scene % (60 * 60 * 24)) / (60 * 60));
                                            $minutes_to_scene = floor(($to_scene % (60 * 60)) / 60);

                                            if($days_to_scene != 0){
                                                $time_start_to_scene = "$days_to_scene วัน $hours_to_scene ชั่วโมง $minutes_to_scene นาที";
                                            }else if($days_to_scene == 0 && $hours_to_scene != 0 && $minutes_to_scene != 0){
                                                $time_start_to_scene = "$hours_to_scene ชั่วโมง $minutes_to_scene นาที";
                                            }else if($days_to_scene == 0 && $hours_to_scene == 0 && $minutes_to_scene != 0){
                                                $time_start_to_scene = "$minutes_to_scene นาที";
                                            }
                                        }

                                        // ----- ใช้เวลาในการช่วยเหลือ (หน่วยเป็นวินาที) -----
                                        $time_sos_all = '';
                                        if($item->status != "เสร็จสิ้น"){
                                            $time_sos_all = '-' ;
                                        }else{
                                            $help_complete_time = strtotime($item->help_complete_time);
                                            $sos_all = $help_complete_time - $time_created_at ;

                                            // แปลงเวลาให้อยู่ในรูปแบบ วัน, ชั่วโมง, นาที
                                            $days_sos_all = floor($sos_all / (60 * 60 * 24));
                                            $hours_sos_all = floor(($sos_all % (60 * 60 * 24)) / (60 * 60));
                                            $minutes_sos_all = floor(($sos_all % (60 * 60)) / 60);

                                            if($days_sos_all != 0){
                                                $time_sos_all = "$days_sos_all วัน $hours_sos_all ชั่วโมง $minutes_sos_all นาที";
                                            }else if($days_sos_all == 0 && $hours_sos_all != 0 && $minutes_sos_all != 0){
                                                $time_sos_all = "$hours_sos_all ชั่วโมง $minutes_sos_all นาที";
                                            }else if($days_sos_all == 0 && $hours_sos_all == 0 && $minutes_sos_all != 0){
                                                $time_sos_all = "$minutes_sos_all นาที";
                                            }
                                        }

                                    @endphp

                                    <span><b>ใช้เวลาถึงที่เกิดเหตุ</b></span>
                                    <span style="font-size:18px;">{{ $time_start_to_scene }}</span>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <span><b>ใช้เวลาในการช่วยเหลือ</b></span>
                                    <span style="font-size:18px;">{{ $time_sos_all }}</span>
                                </div>
                                <div class="col-4">
                                    @php
                                        $class_div_status = '';
                                        $text_div_status = '';
                                        $class_tga_i_status = '';
                                        $time_of_status = '';

                                        if($item->status == "รับแจ้งเหตุ"){
                                            $class_div_status = 'btn-danger' ;
                                            $text_div_status = 'text-white' ;
                                            $class_tga_i_status = 'fa-solid fa-light-emergency-on' ;
                                            $time_of_status = $item->created_at ;
                                        }else if($item->status == "กำลังไปช่วยเหลือ"){
                                            $class_div_status = 'bg-warning' ;
                                            $class_tga_i_status = 'fa-solid fa-truck-medical' ;
                                            $time_of_status = $item->time_go_to_help ;
                                        }else if($item->status == "ถึงที่เกิดเหตุ"){
                                            $class_div_status = 'btn-warning' ;
                                            $class_tga_i_status = 'fa-solid fa-location-dot' ;
                                            $time_of_status = $item->time_to_the_scene ;
                                        }else if($item->status == "ออกจากที่เกิดเหตุ"){
                                            $class_div_status = 'bg-warning' ;
                                            $class_tga_i_status = 'fa-duotone fa-person-walking-arrow-right' ;
                                            $time_of_status = $item->time_leave_the_scene ;
                                        }else if($item->status == "เสร็จสิ้น"){
                                            $class_div_status = 'btn-success' ;
                                            $text_div_status = 'text-white' ;
                                            $class_tga_i_status = 'fa-solid fa-shield-check' ;
                                            $time_of_status = $item->help_complete_time ;
                                        }
                                    @endphp
                                    <div class="float-end btn btn-sm {{ $class_div_status }} radius-10 px-5 py-2">
                                        <h6 class="{{ $text_div_status }}" >
                                            @if($item->tag_sos_or_repair == "tag_repair" && $item->status == "กำลังไปช่วยเหลือ")
                                                <i class="fa-regular fa-screwdriver-wrench"></i> อยู่ระหว่างดำเนินการ
                                            @elseif($item->tag_sos_or_repair == "tag_repair" && $item->status == "รับแจ้งเหตุ")
                                                <i class="fa-sharp fa-solid fa-timer"></i> รอดำเนินการ
                                            @else
                                                <i class="{{ $class_tga_i_status }}"></i> {{ $item->status }}
                                            @endif
                                            <br>
                                        </h6>
                                        <b style="font-size:12px;">{{ $time_of_status }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-7">
                                <!-- ข้อมูลผู้ขอความช่วยเหลือ -->
                                <h4>{{ $item->name }}</h4>
                                <span style="font-size:18px;">
                                    <i class="fa-solid fa-circle-phone text-success"></i> {{ $item->phone }}
                                </span>
                                <!-- หัวข้อขอความช่วยเหลือ -->
                                <h4 class="mt-3">{{ $item->title_sos }}</h4>
                                <span>
                                   {{ $item->title_sos_other }}
                                </span>
                                <label><b>หมายเหตุจากศูนย์ฯ</b></label>
                                <p class="mt-1">
                                    @if(!empty($item->remark_command))
                                        {{ $item->remark_command }}
                                    @else
                                        ไม่มีข้อมูล
                                    @endif
                                </p>
                            </div>
                            <div class="col-5 row">
                                <div class="col-6 text-center" >
                                    <span style="font-size:16px;">
                                        ภาพจากผู้ใช้
                                    </span>
                                    <div class="card mt-2" style="position:relative;">
                                        <center>
                                            @if(!empty($item->photo))
                                            <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                                <img src="{{ url('storage')}}/{{ $item->photo }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                                            </a>
                                            <a href="{{ url('storage')}}/{{ $item->photo }}" download>
                                                <i class="fa-solid fa-download btn {{ $btn_background_color }}" style="color: #fff;border-radius: 20%;position: absolute;z-index: 9999;bottom:5%;right: 15%;"></i>
                                            </a>
                                            @else
                                                <img src="{{ url('/img/stickerline/PNG/17.png') }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                                            @endif
                                        </center>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <span style="font-size:16px;">
                                        ภาพจากเจ้าหน้าที่
                                    </span>
                                    <div class="card mt-2" style="position:relative;">
                                        <center>
                                            @if(!empty($item->photo_succeed))
                                            <a href="{{ url('storage')}}/{{ $item->photo_succeed }}" target="bank">
                                                <img src="{{ url('storage')}}/{{ $item->photo_succeed }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                                            </a>
                                            <a href="{{ url('storage')}}/{{ $item->photo_succeed }}" download>
                                                <i class="fa-solid fa-download btn {{ $btn_background_color }}" style="color: #fff;border-radius: 20%;position: absolute;z-index: 9999;bottom:5%;right: 15%;"></i>
                                            </a>
                                            @else
                                                <img src="{{ url('/img/stickerline/PNG/17.png') }}" class="main-shadow" style="border-radius: 10%; object-fit:cover;" width="150px" height="150px">
                                            @endif
                                        </center>
                                    </div>
                                    @if(!empty($item->photo_succeed))
                                    <span class="mt-2">
                                        {{ $item->remark }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- เคสที่เสร็จสิ้น แสดง div ด้านล่าง -->
                        @if($item->status == "เสร็จสิ้น")
                        <div class="row mt-2">
                            <div class="col-4">
                                <h5 class="mt-3"><b>การช่วยเหลือเสร็จสิ้น</b></h5>
                                @php
                                    $remark_status = '';
                                    if (stripos($item->remark_status, 'หมายเหตุ') !== false) {
                                        $remark_status = $item->remark_status ;
                                    } else {
                                        $remark_status = 'หมายเหตุ : ' . $item->remark_status;
                                    }
                                @endphp

                                <span>
                                    {{ $remark_status }}
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="btn btn-sm radius-10 px-1 py-2 {{ $card_background_color }}" style="width:100%;">
                                    <div class="row mt-2 mb-2">
                                        <div class="col-5" style="border-right: white solid 2px;">
                                            <span>เจ้าหน้าที่</span>
                                            <br>
                                            <span style="font-size:18px;">
                                                {{ $item->helper }}
                                            </span>
                                        </div>
                                        @if(!empty($item->score_total))
                                        <div class="col-3" style="border-right: white solid 2px;">
                                            <span>ความประทับใจ</span>
                                            <br>
                                            <span style="font-size:18px;">
                                                {{ $item->score_impression }} คะแนน
                                            </span>
                                        </div>
                                        <div class="col-2" style="border-right: white solid 2px;">
                                            <span>ระยะเวลา</span>
                                            <br>
                                            <span style="font-size:18px;">
                                                {{ $item->score_period }} คะแนน
                                            </span>
                                        </div>
                                        <div class="col-2" style="border-right: white solid 2px;">
                                            <span>ภาพรวม</span>
                                            <br>
                                            <span style="font-size:18px;">
                                                {{ $item->score_total }} คะแนน
                                            </span>
                                        </div>
                                        @else
                                            <div class="col-6">
                                                <center>
                                                    <span>ไม่มีการประเมิน</span>
                                                </center>
                                            </div>
                                        @endif
                                    </div>
                                    @if(!empty($item->comment_help))
                                    <div class="col-12">
                                        <div class="px-3 py-2">
                                            <span style="float: left!important;">คำติชม</span>
                                            <br>
                                            <span style="font-size:18px;float: left!important;">
                                                {{ $item->comment_help }}
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($item->tag_sos_or_repair != "tag_repair")
                        <div class="col mt-2">
                            <a href="{{ url('/sos_map/command') . '/' . $item->id }}" type="button" class="btn {{ $btn_background_color }} px-5">
                                <i class="fa-duotone fa-bars-progress mr-1"></i> ดำเนินการ
                            </a>
                            @if( empty($item->wait_delete) )
                            <span id="span_btn_delete_case_{{ $item->id }}">
                                <span class="btn btn-danger mr-2 ml-2 float-end" data-toggle="modal" data-target="#modal_delete_case" onclick="open_modal_delete_case('{{ $item->id }}');">
                                    <i class="fa-solid fa-delete-right mr-1"></i> ลบ
                                </span>
                            </span>
                            @elseif($item->wait_delete == "Yes")
                            <span class="btn btn-danger mr-2 ml-2 float-end" >
                                <i class="fa-solid fa-delete-right mr-1"></i> ส่งคำขอลบแล้ว
                            </span>
                            @endif
                        </div>
                        @else

                        <div class="col mt-2">
                            <a href="{{ url('/sos_map/report_repair') . '/' . $item->id }}" type="button" class="btn {{ $btn_background_color }} px-5">
                                <i class="fa-duotone fa-bars-progress mr-1"></i> ดำเนินการ
                            </a>
                            @if( empty($item->wait_delete) )
                            <span id="span_btn_delete_case_{{ $item->id }}">
                                <span class="btn btn-danger mr-2 ml-2 float-end" data-toggle="modal" data-target="#modal_delete_case" onclick="open_modal_delete_case('{{ $item->id }}');">
                                    <i class="fa-solid fa-delete-right mr-1"></i> ลบ
                                </span>
                            </span>
                            @elseif($item->wait_delete == "Yes")
                            <span class="btn btn-danger mr-2 ml-2 float-end" >
                                <i class="fa-solid fa-delete-right mr-1"></i> ส่งคำขอลบแล้ว
                            </span>
                            @endif
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
  </div>
</div>

<script>
    
    function open_modal_delete_case(sos_map_id){

        document.querySelector('#div_content_modal_delete_case_1').classList.remove('d-none');
        document.querySelector('#div_content_modal_delete_case_2').classList.add('d-none');
        
        
        // console.log(sos_map_id);
        let a_delete_case = document.querySelector('#a_delete_case');
        let a_request_delete_case = document.querySelector('#a_request_delete_case');

        if(a_request_delete_case){
            document.querySelector('#a_request_delete_case').classList.remove('d-none');
        }

        if(a_delete_case){
            a_delete_case.setAttribute('href' , "{{ url('/sos_map/delete_case') }}" + "/" + sos_map_id);
        }

        if(a_request_delete_case){
            a_request_delete_case.setAttribute('onclick' , 'request_delete_case('+sos_map_id+');');
        }
    }

    function request_delete_case(sos_map_id){

        let officer_id = "{{ Auth::user()->id }}";

        fetch("{{ url('/') }}/api/sos_map/request_delete_case" + '/' + sos_map_id + "/" + officer_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result == "ok"){
                    document.querySelector('#a_request_delete_case').classList.add('d-none');
                    document.querySelector('#div_content_modal_delete_case_1').classList.add('d-none');
                    document.querySelector('#div_content_modal_delete_case_2').classList.remove('d-none');

                    document.querySelector('#span_btn_delete_case_'+sos_map_id).innerHTML = `
                        <span class="btn btn-danger mr-2 ml-2 float-end" >
                            <i class="fa-solid fa-delete-right mr-1"></i> ส่งคำขอลบแล้ว
                        </span>
                    `;
                }
        });

    }

</script>



<!----------------------------- mobile-------------------------------- -->

<div class="container-fluid card radius-10 d-block d-lg-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="row">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="col-12"  style="margin-top:10px">
                <div>
                    <h5 class="font-weight-bold mb-0">รถที่ถูกรายงานล่าสุด</h5> 
                </div>
                <span style="font-size: 15px; float: right; margin-top:-40px;">จำนวนทั้งหมด {{ $count_data }}</span>
                <div class="d-flex justify-content-end" style="margin-top:10px">
                    <a href="{{ url('/sos_score_helper') }}" type="button" class="btn btn-white radius-10" ><i class="fas fa-chart-line"></i>ดูช่วงเวลา</a>
                </div>
                <br>
            </div>
        </div>
        <div class="card-body" style="padding: 0px 10px 0px 10px;">
       
        @foreach($view_maps as $item)
                @foreach($data_partners as $data_partner)
                @endforeach
                <div class="card col-12 d-block d-lg-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:{{ $data_partner->color }};margin-bottom: 10px;border-style: solid;border-width: 0px 0px 4px 0px;">
                    <center>
                    <div class="row col-12 card-body border border-bottom-0" style="padding:15px 0px 15px 0px ;border-radius: 25px;margin-bottom: -2px;">
                                <div class="col-2 align-self-center" style="vertical-align: middle;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <a class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}' , '{{ $item->id }}');">
                                        <i class="fas fa-map-marker-alt"></i> 
                                        <br>
                                        ดูหมุด
                                    </a> 
                                    <br>
                                    <a class="link text-info" href="https://www.google.co.th/maps/search/{{$item->lat}},{{$item->lng}}/{{ $text_at }}{{$item->lat}},{{$item->lng}},16z" target="bank">
                                        <i class="fas fa-location-arrow"></i> 
                                        <br>
                                        นำทาง
                                    </a>
                                </div>
                                <div class="col-8 d-flex align-items-center" style="margin-bottom:0px;padding:0px" data-toggle="collapse" data-target="#Line_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <center class="col-12">
                                        <h5 style="margin-bottom:0px; margin-top:0px; ">
                                        <a target="break" href="{{ url('/').'/profile/'.$item->id }}"><i class="far fa-eye text-primary"></i></a></span>
                                            {{ $item->name }}
                                        </h5>
                                    </center>
                                </div> 
                                <div class="col-2 align-self-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" >
                                    <i class="fas fa-angle-down" ></i>
                                </div>
                                <div class="col-12 collapse" id="sos_{{ $item->id }}"> 
                                    <hr>
                                    <p style="font-size:18px;padding:0px"> เบอร์ :  {{ $item->phone }}  </p> <hr>
                                    <p style="font-size:18px;padding:0px">วันที่แจ้ง <br> 
                                        
                                        {{ date("l d F Y" , strtotime($item->created_at)) }}
                                        <br>
                                    </p>  <hr>
                                    <p style="font-size:18px;padding:0px"> เวลา:  {{ date("H:i" , strtotime($item->created_at)) }}
                                        
                                    </p>
                                     <hr>
                                    <p style="font-size:18px;padding:0px">รูปภาพ <br> 
                                        <a href="{{ url('storage')}}/{{ $item->photo }}" target="bank">
                                            <img width="100%" src="{{ url('storage')}}/{{ $item->photo }}">
                                        </a>
                                    </p>  
                                </div>
                            </div>
                        </center>   
                    </div>  
                @endforeach
                <div class="pagination-wrapper"> {!! $view_maps->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>
<!----------------------- end mobile-------------------------- -->

<!------------------------------------------- Modal ให้ความช่วยเหลือ ------------------------->
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script>
<style type="text/css">
    #map {
      height: calc(80vh);
    }
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        let name_area = document.querySelector('#name_area').value;
        let type_partner = document.querySelector('#type_partner').value;

        if (name_area) {
            select_name_area(name_area);
        }else{
            if (type_partner != 'volunteer') {
                initMap();
            }else{
                initMap_not_Polygon('12.870032' , '100.992541','6');
            }
        }

    });

    var draw_area ;
    var map ;
    var marker ;

    function initMap() {
        // 13.7248936,100.4930264 lat lng ประเทศไทย
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: 13.7248936, lng: 100.4930264 },
            zoom: 14,
        });

        let all_lat = [];
        let all_lng = [];
        let all_lat_lng = [];

        let lat_average ;
        let lng_average ;

        let lat_sum = 0 ;
        let lng_sum = 0 ;

        let name_partner = document.querySelector('#name_partner');

        fetch("{{ url('/') }}/api/all_area_partner/" + name_partner.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {

                    for (let xx = 0; xx < JSON.parse(result[ii]['sos_area']).length; xx++) {
                        // console.log(JSON.parse(result[ii]['sos_area'])[xx]);
                        
                        all_lat_lng.push(JSON.parse(result[ii]['sos_area'])[xx]);

                        // all_lat.push(JSON.parse(result[ii]['sos_area'])[xx]['lat']);
                        // all_lng.push(JSON.parse(result[ii]['sos_area'])[xx]['lng']);
                        
                    }

                }

                // หาจุดกลาง polygons ทั้งหมด
                // for (let zz = 0; zz < all_lat.length; zz++) {

                //     lat_sum = lat_sum + all_lat[zz] ; 
                //     lng_sum = lng_sum + all_lng[zz] ; 

                //     lat_average = lat_sum / all_lat.length ;
                //     lng_average = lng_sum / all_lng.length ;
                // }

                // map = new google.maps.Map(document.getElementById("map"), {
                //     center: {lat: lat_average, lng: lng_average },
                //     zoom: 14,
                // });

                // console.log(JSON.parse('{"lng": 101.43383789062517,"lat": 14.388422012329102}'));

                let bounds = new google.maps.LatLngBounds();

                    for (let vc = 0; vc < all_lat_lng.length; vc++) {
                        bounds.extend(all_lat_lng[vc]);
                    }

                    map = new google.maps.Map(document.getElementById("map"), {
                        // zoom: num_zoom,
                        // center: bounds.getCenter(),
                    });
                    map.fitBounds(bounds);

                for (let xi = 0; xi < result.length; xi++) {

                    // วาดพื้นที่รวมทั้งหมด
                    let draw_sum_area = new google.maps.Polygon({
                        paths: all_lat_lng,
                        strokeColor: "red",
                        strokeOpacity: 0,
                        strokeWeight: 0,
                        fillColor: "red",
                        fillOpacity: 0,
                    });
                    draw_sum_area.setMap(map);

                    // วาดแยกแต่ละพื้นที่
                    let draw_area_other = new google.maps.Polygon({
                        paths: JSON.parse(result[xi]['sos_area']),
                        strokeColor: "#008450",
                        strokeOpacity: 0.8,
                        strokeWeight: 1,
                        fillColor: "#008450",
                        fillOpacity: 0.25,
                        zIndex:10,
                    });
                    draw_area_other.setMap(map);

                    // mouseover on polygon
                    google.maps.event.addListener(draw_area_other, 'mouseover', function (event) {
                        this.setOptions({
                            strokeColor: '#00ff00',
                            fillColor: '#00ff00'
                        });

                        let image_empty = "https://www.viicheck.com/img/icon/flag_empty.png";

                        for (let mm = 0; mm < JSON.parse(result[xi]['sos_area']).length; mm++) {

                            all_lat.push(JSON.parse(result[xi]['sos_area'])[mm]['lat']);
                            all_lng.push(JSON.parse(result[xi]['sos_area'])[mm]['lng']);
                            
                        }

                        for (let zz = 0; zz < all_lat.length; zz++) {

                            lat_sum = lat_sum + all_lat[zz] ; 
                            lng_sum = lng_sum + all_lng[zz] ; 

                            lat_average = lat_sum / all_lat.length ;
                            lng_average = lng_sum / all_lng.length ;
                        }

                        marker_mouseover = new google.maps.Marker({
                            // position: JSON.parse(result[xi]['sos_area'])[0],
                            position: {lat: lat_average, lng: lng_average },
                            map: map,
                            icon: image_empty,
                            label: {
                                text: result[xi]['name_area'],
                                color: 'black',
                                fontSize: "18px",
                                fontWeight: 'bold',
                            },
                            zIndex:10,
                        }); 

                    });

                    // mouseout polygon
                    google.maps.event.addListener(draw_area_other, 'mouseout', function (event) {
                        this.setOptions({
                            strokeColor: '#008450',
                            fillColor: '#008450'
                        });
                        marker_mouseover.setMap(null);

                        lat_sum = 0 ;
                        lng_sum = 0 ;
                        lat_average = 0 ;
                        lng_average = 0 ;
                        all_lat = [] ;
                        all_lng = [] ;
                    });

                    draw_area_other.addListener("click", () => {
                        // select_name_area(result[xi]['name_area']);
                        try {
                            document.querySelector('#select_name_area_' + result[xi]['name_area']).click();
                        }
                        catch(err) {
                            alert('ไม่มีข้อมูลการขอความช่วยเหลือ');
                        }
                        
                    });
                }


                //ปักหมุด
                let image = "https://www.viicheck.com/img/icon/flag_2.png";
                @foreach($view_maps_all as $view_map)
                @if(!empty($item->lat))
                    marker = new google.maps.Marker({
                        position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                        map: map,
                        icon: image,
                        zIndex:5,
                    });  
                @endif   
                @endforeach


            });

    }

    function initMap_not_Polygon(lat , lng , numZoom) {

        let m_lat = parseFloat(lat);
        let m_lng = parseFloat(lng);
        let m_numZoom = parseFloat(numZoom);
        // 13.7248936,100.4930264 lat lng ประเทศไทย
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        let all_lat = [];
        let all_lng = [];
        let all_lat_lng = [];

        let lat_average ;
        let lng_average ;

        let lat_sum = 0 ;
        let lng_sum = 0 ;

        //ปักหมุด
        let image = "https://www.viicheck.com/img/icon/flag_2.png";
        @foreach($view_maps_all as $view_map)
        @if(!empty($item->lat))
            marker = new google.maps.Marker({
                position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                map: map,
                icon: image,
                zIndex:5,
            });  
        @endif   
        @endforeach

    }

    function select_name_area(name_area){

        let name_partner = document.querySelector('#name_partner').value;

        fetch("{{ url('/') }}/api/area_current/"+name_partner  + '/' + name_area)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                var bounds = new google.maps.LatLngBounds();

                for (let ix = 0; ix < result.length; ix++) {
                    bounds.extend(result[ix]);
                }

            map = new google.maps.Map(document.getElementById("map"), {
                // zoom: 18,
            });
            map.fitBounds(bounds);

            // Construct the polygon.
            draw_area = new google.maps.Polygon({
                paths: result,
                strokeColor: "#008450",
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: "#008450",
                fillOpacity: 0.25,
            });
            draw_area.setMap(map);

            //ปักหมุด
            let image = "https://www.viicheck.com/img/icon/flag_2.png";
            @foreach($view_maps_all as $view_map)
            @if(!empty($item->lat))
                marker = new google.maps.Marker({
                    position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                    map: map,
                    icon: image,
                    zIndex:5,
                });  
            @endif   
            @endforeach
        });
        
    }


    function view_marker(lat , lng , sos_id , name_area){

        let name_partner = document.querySelector('#name_partner').value;
        // let name_area = 'คอนโด' ;

        fetch("{{ url('/') }}/api/area_current/"+name_partner  + '/' + name_area)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                var bounds = new google.maps.LatLngBounds();

                for (let ix = 0; ix < result.length; ix++) {
                    bounds.extend(result[ix]);
                }

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 18,
                center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            });

            // Construct the polygon.
            draw_area = new google.maps.Polygon({
                paths: result,
                strokeColor: "#008450",
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: "#008450",
                fillOpacity: 0.25,
            });
            draw_area.setMap(map);

            let image = "https://www.viicheck.com/img/icon/flag_2.png";
            let image2 = "https://www.viicheck.com/img/icon/flag_3.png";
            marker = new google.maps.Marker({
                position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
                map: map,
                icon: image,
            });  

            @foreach($view_maps as $view_map)
                if ( {{ $view_map->id }} !== parseFloat(sos_id) ) {
                    marker = new google.maps.Marker({
                        position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                        map: map,
                        icon: image2,
                    });
                }
            @endforeach

            const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };

            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h4 id="firstHeading" class="firstHeading">'+name_area +'</h4>' +
                '<div id="bodyContent">' +
                "<p>lat : "+ lat + "<br>" +
                "lng : "+ lng + "</p>" +
                "</div>" +
                "</div>";

            let infoWindow = new google.maps.InfoWindow({
                // content: "<p>ชื่อพื้นที่ : <b>" + name_area  + "</b></p>" + "Lat :" + lat + "<br>" + "Lat :" + lng,
                content: contentString,
                position: myLatlng,
            });

            infoWindow.open(map);
        });

    }

    function view_marker_volunteer(lat , lng , sos_id , name_user){

        let lat_mail = '@' + lat ;

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: { lat: parseFloat(lat), lng: parseFloat(lng) },
        });

        let image = "https://www.viicheck.com/img/icon/flag_2.png";
        let image2 = "https://www.viicheck.com/img/icon/flag_3.png";

        marker = new google.maps.Marker({
            position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
            map: map,
            icon: image,
        });  

        @foreach($view_maps_all as $view_map)
            if ( {{ $view_map->id }} !== parseFloat(sos_id) ) {
                marker = new google.maps.Marker({
                    position: {lat: {{ $view_map->lat }} , lng: {{ $view_map->lng }} },
                    map: map,
                    icon: image2,
                });
            }
        @endforeach

        const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };

        const contentString =
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h4 id="firstHeading" class="firstHeading"> คุณ: '+ name_user +'</h4>' +
            '<div id="bodyContent">' +
            "<p>lat : "+ lat + "<br>" +
            "lng : "+ lng + "</p>" +
            "</div>" +
            '<a href="https://www.google.co.th/maps/search/'+lat+','+lng+'/'+lat_mail+','+lng+',16z" target="bank" type="button" class="btn btn-sm btn-info text-white" style="width:100%;"><i class="fas fa-location-arrow"></i> นำทาง</a>' +
            "</div>";

        let infoWindow = new google.maps.InfoWindow({
            // content: "<p>ชื่อพื้นที่ : <b>" + name_area  + "</b></p>" + "Lat :" + lat + "<br>" + "Lat :" + lng,
            content: contentString,
            position: myLatlng,
        });

        infoWindow.open(map);

    }

</script>

@endsection
