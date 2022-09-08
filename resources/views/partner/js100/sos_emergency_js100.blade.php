@extends('layouts.partners.theme_partner_new')

@section('content')
<!-- ALERT -->
<style>
    .alert_js100{
        position: absolute;
        right: 1.2%;
        top: 11%;
        z-index: 9999;
        margin-top: 5px;
        width: 24%;
    }
</style>
<!-- div_alert_js100 -->
<div id="div_alert_js100" class="alert_js100">
    <!-- ออกแบบ -->
    <div style="margin-top: -5px;" class="alert alert-danger" role="alert">
        <span>
            มีการขอความช่วยเหลือใหม่ จากคุณ 
            <b class="text-dark">BENZE THANAKORN</b> 
            <a href="#" class="alert-link">
                <i style="float:right;" class="fas fa-window-close"></i>
            </a>
        </span>
    </div>
</div>

<div class="container-partner-sos">
  <div class="item sos-map col-md-12 col-12 col-lg-4">
        <div class="row">
            <div class="col-6">
                <a  style="float: left; background-color: green;" type="button" class="btn text-white"onclick="initMap('12.870032' , '100.992541','6');">
                    <i class="fas fa-sync-alt"></i> คืนค่าแผนที่
                </a>c
                <br><br>
            </div>
            <div class="col-6">
                <a  style="float: right;margin-right: 20px;" type="button" class="btn btn-info text-white"onclick="initMap('13.7558541' , '100.5038224','10.7');">
                    <i class="fas fa-city"></i> กรุงเทพฯ
                </a>
            </div>
            <div class="col-12">
                <input class="d-none" type="text" id="va_zoom" name="" value="6">
                <input class="d-none" type="text" id="center_lat" name="" value="13.7248936">
                <input class="d-none" type="text" id="center_lng" name="" value="100.4930264">
                <input class="d-none" type="text" id="name_area" name="" value="">
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
  <div class="col-8 d-none d-lg-block">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-dark">
                            <b>การขอความช่วยเหลือ</b>
                            <span style="font-size:14px;">( จำนวนทั้งหมด <b>{{ $count_data }}</b> ครั้ง )</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div style="float: right;">
                            <a href="{{ url('/sos_detail_js100') }}" type="button" class="btn btn-primary text-white">
                                ดูช่วงเวลา <i class="fas fa-chart-line"></i>
                            </a>
                            <a type="button" data-toggle="modal" data-target="#Partner_gsos">
                                <button class="btn btn-success">
                                    <i class="fas fa-info-circle"></i>วิธีใช้
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="card radius-10 d-none d-lg-block col-12" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="margin-top: 10px;">
                    <div class="d-flex align-items-center">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" type="text" name="search_by_name" id="search_by_name" value="" placeholder="ค้นหาจากชื่อ" oninput="search_js100_by_name_or_phone();">
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" type="text" name="search_by_phone" id="search_by_phone" value="" placeholder="ค้นหาจากเบอร์" oninput="search_js100_by_name_or_phone();">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <h5 class="font-weight-bold mb-0" style="margin-top:10px;">
                                        <span style="font-size: 15px; float: right; margin-top:5px;">
                                            ผลการค้นหา <b id="count_search">{{ $count_data }}</b> ครั้ง
                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="color:black;background-color:black;height:2px;">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <b>ชื่อ</b>
                        </div>
                        <div class="col-3">
                            <b>เบอร์</b>
                        </div>
                        <div class="col-3">
                            <b>เวลาแจ้งเหตุ</b>
                        </div>
                        <div class="col-3">
                            <b>ตำแหน่ง</b>
                        </div>

                        <br><br>
                        <hr style="color:black;background-color:black;height:2px;">
                    </div>
                </div>

                <div id="data_by_con" class="card-body">
                    @foreach($view_maps_all as $item)
                    <div class="row text-center"> 
                        <div class="col-3">
                            <div style="margin-top: -10px;" >
                                <h5 class="text-success float-left">
                                    <span style="font-size: 15px;">
                                        <i id="sos_js100_id_{{ $item->id }}" class="fas fa-exclamation-circle notify_alert d-none" style="float:left;"></i>
                                        <a target="break" href="{{ url('/').'/profile/'.$item->user_id }}">
                                        <i class="far fa-eye text-primary"></i>
                                        </a>
                                    </span>&nbsp;{{ $item->name }}<br> 
                                </h5>
                            </div>
                        </div>
                        <div class="col-3">
                            {{ $item->phone }}
                        </div>
                        <div class="col-3">
                            <b>{{ $item->created_at}} </b>
                        </div>
                        <div class="col-3">
                            <div style="margin-top: -10px;">
                                <a id="tag_a_view_marker" class="link text-danger" href="#map" onclick="view_marker('{{ $item->lat }}' , '{{ $item->lng }}', '{{ $item->id }}', '{{ $item->name }}');">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <br>
                                    ดูหมุด
                                </a>
                            </div>
                        </div>
                        <br><br>
                        <hr>
                        <br><br>
                    </div>
                    @endforeach
                    <!-- เลื่อนหน้า -->
                </div>

                <!-- div_content_sos_js100 -->
                <div id="div_body_content_sos_js100" class="card-body d-none">
                    <div id="div_content_sos_js100" class="row text-center">
                        
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

        initMap('12.870032' , '100.992541','6');
        check_notified_js100();

        setInterval(function() {
            check_new_sos_js100();
        }, 5000);
        // search_data_sos_js100("all" , "all");

    });

    var draw_area ;
    var map ;
    var marker ;

    function initMap(lat , lng , numZoom) {

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

    function search_js100_by_name_or_phone(){
        let js100_name = document.querySelector('#search_by_name').value;
        let js100_phone = document.querySelector('#search_by_phone').value;

        if (!js100_name && !js100_phone) {
            document.querySelector('#div_body_content_sos_js100').classList.add('d-none');
            document.querySelector('#data_by_con').classList.remove('d-none');
            document.querySelector('#count_search').innerHTML = {{ $count_data }};

        }else{
            if (!js100_name) {
                js100_name = "all" ;
            }
            if (!js100_phone) {
                js100_phone = "all" ;
            }
            search_data_sos_js100(js100_name , js100_phone); 
        }

        document.querySelector('#div_alert_js100').innerHTML = "" ;

        admin_click("all");

    }

    function search_data_sos_js100(search_by_name , search_by_phone){

        document.querySelector('#div_body_content_sos_js100').classList.remove('d-none');

        let div_content_sos_js100 = document.querySelector('#div_content_sos_js100');
            div_content_sos_js100.innerHTML = "" ;

        document.querySelector('#data_by_con').classList.add('d-none');

        fetch("{{ url('/') }}/api/search_data_sos_js100/" + search_by_name + "/" + search_by_phone)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            document.querySelector('#count_search').innerHTML = result['length'];

            for(let item of result){ 

                // DIV NAME USER
                let div_name_user = document.createElement("div");
                let class_div_name_user = document.createAttribute("class");
                    class_div_name_user.value = "col-3";
                    div_name_user.setAttributeNode(class_div_name_user);

                let div_margin_name_user = document.createElement("div");
                let style_div_margin_name_user = document.createAttribute("style");
                    style_div_margin_name_user.value = "margin-top: -10px;";
                    div_margin_name_user.setAttributeNode(style_div_margin_name_user);
                div_name_user.appendChild(div_margin_name_user);

                let h5_name_user = document.createElement("h5");
                let class_h5_name_user = document.createAttribute("class");
                    class_h5_name_user.value = "text-success float-left";
                    h5_name_user.setAttributeNode(class_h5_name_user);
                div_margin_name_user.appendChild(h5_name_user);

                let span_1_name_user = document.createElement("span");
                let style_span_1_name_user = document.createAttribute("style");
                    style_span_1_name_user.value = "font-size: 15px;";
                    span_1_name_user.setAttributeNode(style_span_1_name_user);
                h5_name_user.appendChild(span_1_name_user);

                if (item.notify != "admin_click") {
                    let alert_name_user = document.createElement("i");
                    let class_alert_name_user = document.createAttribute("class");
                        class_alert_name_user.value = "fas fa-exclamation-circle notify_alert";
                        alert_name_user.setAttributeNode(class_alert_name_user);
                    let style_alert_name_user = document.createAttribute("style");
                        style_alert_name_user.value = "float:left;";
                        alert_name_user.setAttributeNode(style_alert_name_user);
                    span_1_name_user.appendChild(alert_name_user);
                }

                let a_name_user = document.createElement("a");
                let target_a_name_user = document.createAttribute("target");
                    target_a_name_user.value = "break";
                    a_name_user.setAttributeNode(target_a_name_user);
                let href_a_name_user = document.createAttribute("href");
                    href_a_name_user.value = "{{ url('/').'/profile/' }}" + item.user_id;
                    a_name_user.setAttributeNode(href_a_name_user);
                span_1_name_user.appendChild(a_name_user);

                let i_name_user = document.createElement("i");
                let class_i_name_user = document.createAttribute("class");
                    class_i_name_user.value = "far fa-eye text-primary";
                    i_name_user.setAttributeNode(class_i_name_user);
                a_name_user.appendChild(i_name_user);

                let span_2_name_user = document.createElement("span");
                    span_2_name_user.innerHTML = "&nbsp;" + item.name ;
                    let br_span_2_name_user = document.createElement("br");
                    span_2_name_user.appendChild(br_span_2_name_user);
                h5_name_user.appendChild(span_2_name_user);
                // END DIV NAME USER

                // DIV PHONE USER
                let div_phone_user = document.createElement("div");
                let class_div_phone_user = document.createAttribute("class");
                    class_div_phone_user.value = "col-3";
                    div_phone_user.setAttributeNode(class_div_phone_user);
                div_phone_user.innerHTML = item.phone ;
                // END DIV PHONE USER

                // DIV TIME USER
                let div_time_user = document.createElement("div");
                let class_div_time_user = document.createAttribute("class");
                    class_div_time_user.value = "col-3";
                    div_time_user.setAttributeNode(class_div_time_user);
                div_time_user.innerHTML = item.created_at ;
                // END DIV TIME USER

                // DIV TIME USER
                let div_location_user = document.createElement("div");
                let class_div_location_user = document.createAttribute("class");
                    class_div_location_user.value = "col-3";
                    div_location_user.setAttributeNode(class_div_location_user);

                let div_margin_location_user = document.createElement("div");
                let style_div_margin_location_user = document.createAttribute("style");
                    style_div_margin_location_user.value = "margin-top: -10px;";
                    div_margin_location_user.setAttributeNode(style_div_margin_location_user);
                div_location_user.appendChild(div_margin_location_user);

                let a_location_user = document.createElement("a");
                let id_a_location_user = document.createAttribute("id");
                    id_a_location_user.value = "tag_a_view_marker" + item.id;
                    a_location_user.setAttributeNode(id_a_location_user);
                let class_a_location_user = document.createAttribute("class");
                    class_a_location_user.value = "link text-danger";
                    a_location_user.setAttributeNode(class_a_location_user);
                let href_a_location_user = document.createAttribute("href");
                    href_a_location_user.value = "#map";
                    a_location_user.setAttributeNode(href_a_location_user);
                let onclick_a_location_user = document.createAttribute("onclick");
                    onclick_a_location_user.value = "view_marker('"+item.lat+"' , '"+item.lng+"', '"+item.id+"', '"+item.name+"');";
                    a_location_user.setAttributeNode(onclick_a_location_user);
                div_margin_location_user.appendChild(a_location_user);

                let i_a_location_user = document.createElement("i");
                let class_i_a_location_user = document.createAttribute("class");
                    class_i_a_location_user.value = "fas fa-map-marker-alt";
                    i_a_location_user.setAttributeNode(class_i_a_location_user);
                a_location_user.appendChild(i_a_location_user);

                let br_a_location_user = document.createElement("br");
                a_location_user.appendChild(br_a_location_user);

                let span_location_user = document.createElement("span");
                    span_location_user.innerHTML = "ดูหมุด" ;
                a_location_user.appendChild(span_location_user);
                // END DIV TIME USER

                let br_1_sos_js100 = document.createElement("br");
                let br_2_sos_js100 = document.createElement("br");
                let hr_1_sos_js100 = document.createElement("hr");
                let br_3_sos_js100 = document.createElement("br");
                let br_4_sos_js100 = document.createElement("br");

                // เพิ่มทั้งหมดเข้า div_content_sos_js100
                div_content_sos_js100.appendChild(div_name_user);
                div_content_sos_js100.appendChild(div_phone_user);
                div_content_sos_js100.appendChild(div_time_user);
                div_content_sos_js100.appendChild(div_location_user);
                div_content_sos_js100.appendChild(br_1_sos_js100);
                div_content_sos_js100.appendChild(br_2_sos_js100);
                div_content_sos_js100.appendChild(hr_1_sos_js100);
                div_content_sos_js100.appendChild(br_3_sos_js100);
                div_content_sos_js100.appendChild(br_4_sos_js100);
            }

        });

    }

    function view_marker(lat , lng , sos_id , name_user){

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
            '<h4 id="firstHeading" class="firstHeading">'+ name_user +'</h4>' +
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

    function check_new_sos_js100(){
        // console.log("CHECK");
        fetch("{{ url('/') }}/api/check_new_sos_js100" )
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result['length'] > 0) {
                    // console.log(result);

                    for(let item of result){
                        fetch("{{ url('/') }}/api/update_new_sos_js100/" + item.id );
                    }

                    window.location.reload(true);
                }
        });
    }

    function check_notified_js100(){
        fetch("{{ url('/') }}/api/check_notified_js100" )
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                if (result['length'] > 0) {
                    // console.log(result);

                    for(let item of result){
                        document.querySelector('#sos_js100_id_' + item.id).classList.remove('d-none');
                    }

                    show_div_alert(result);
                }
        });
    }

    function show_div_alert(result){

        let div_alert_js100 = document.querySelector('#div_alert_js100');
            div_alert_js100.innerHTML = "" ;

        for(let item of result){

            let sos_alert_js100 = document.createElement("div");
            let id_sos_alert_js100 = document.createAttribute("id");
                id_sos_alert_js100.value = "sos_alert_js100_" + item.id ;
                sos_alert_js100.setAttributeNode(id_sos_alert_js100);
            let style_sos_alert_js100 = document.createAttribute("style");
                style_sos_alert_js100.value = "margin-top: -5px;";
                sos_alert_js100.setAttributeNode(style_sos_alert_js100);
            let class_sos_alert_js100 = document.createAttribute("class");
                class_sos_alert_js100.value = "alert alert-danger";
                sos_alert_js100.setAttributeNode(class_sos_alert_js100);
            let row_sos_alert_js100 = document.createAttribute("row");
                row_sos_alert_js100.value = "alert";
                sos_alert_js100.setAttributeNode(row_sos_alert_js100);
            let onclicl_sos_alert_js100 = document.createAttribute("onclick");
                onclicl_sos_alert_js100.value = "admin_click(" + item.id + ")";
                sos_alert_js100.setAttributeNode(onclicl_sos_alert_js100);

            let span_sos_alert_js100 = document.createElement("span");
                span_sos_alert_js100.innerText = "มีการขอความช่วยเหลือใหม่ จากคุณ" ;
                sos_alert_js100.appendChild(span_sos_alert_js100);

            let b_span_sos_alert_js100 = document.createElement("b");
            let class_b_span_sos_alert_js100 = document.createAttribute("class");
                class_b_span_sos_alert_js100.value = "text-dark";
                b_span_sos_alert_js100.setAttributeNode(class_b_span_sos_alert_js100);
                
                b_span_sos_alert_js100.innerText = " " + item.name ;

                span_sos_alert_js100.appendChild(b_span_sos_alert_js100);

            let a_span_sos_alert_js100 = document.createElement("a");
            let href_a_span_sos_alert_js100 = document.createAttribute("href");
                href_a_span_sos_alert_js100.value = "#";
                a_span_sos_alert_js100.setAttributeNode(href_a_span_sos_alert_js100);
            let class_a_span_sos_alert_js100 = document.createAttribute("class");
                class_a_span_sos_alert_js100.value = "alert-link";
                a_span_sos_alert_js100.setAttributeNode(class_a_span_sos_alert_js100);

                span_sos_alert_js100.appendChild(a_span_sos_alert_js100);

            let i_a_span_sos_alert_js100 = document.createElement("i");
            let style_i_a_span_sos_alert_js100 = document.createAttribute("style");
                style_i_a_span_sos_alert_js100.value = "float:right;";
                i_a_span_sos_alert_js100.setAttributeNode(style_i_a_span_sos_alert_js100);
            let class_i_a_span_sos_alert_js100 = document.createAttribute("class");
                class_i_a_span_sos_alert_js100.value = "fas fa-window-close";
                i_a_span_sos_alert_js100.setAttributeNode(class_i_a_span_sos_alert_js100);

                a_span_sos_alert_js100.appendChild(i_a_span_sos_alert_js100);

            div_alert_js100.appendChild(sos_alert_js100);
        }
        

    }


    function admin_click(all_or_id){
        // console.log(all_or_id);

        if (all_or_id === "all") {
            fetch("{{ url('/') }}/api/admin_click/" + all_or_id )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    for(let item of result){
                        document.querySelector('#sos_js100_id_' + item.id).classList.add('d-none');

                    }
            });
        }else{
            fetch("{{ url('/') }}/api/admin_click/" + all_or_id )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    for(let item of result){
                        document.querySelector('#sos_js100_id_' + item.id).classList.add('d-none');
                        document.querySelector('#sos_alert_js100_' + item.id).classList.add('d-none');
                    }
            });
        }

        
    }

</script>
@endsection
