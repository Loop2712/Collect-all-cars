@extends('layouts.admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 " style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-2 text-center" >
                                <h2><i class="fad fa-handshake"></i> Partner</h2>
                            </div>
                            <div class="col-md-3 col-sm-4 text-center main" style="margin-left: auto;top:8px">
                                <a href="{{ url('/partner_viicheck/create') }}" title="Add New Insurance" style="text-decoration: none;">
                                    <button type="button" class="d-flex btn btn-secondary btn btn-success btn-sm" style="margin-left: auto;">
                                        <i class="fa fa-plus" style="margin-top:5px" ></i>  เพิ่ม Partner
                                    </button>
                                </a>
                            </div><br>
                            <br style="d-block d-md-none">
                            <div class="col-md-3 col-sm-8 text-center d-flex justify-content-end">
                                <form method="GET" action="{{ url('/partner_viicheck') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <h3 class="card-header"> <i class="fad fa-handshake"></i> Partner</h3> -->
                    <!----------------------------------------------- pc ----------------------------------------------->
                <div class="d-none d-lg-block">
                    <table class="table" style="margin-bottom:0px">
                            <thead style="font-family: 'Prompt', sans-serif; background-color:#E3E5E8;">
                                <tr class="text-center" >
                                    <th class="col-md-5" style="font-size:15px">ชื่อพาร์ทเนอร์</th>
                                    <th class="col-md-2" style="font-size:15px">พื้นที่ดูแลทั้งหมด</th>
                                    <th class="col-md-3" style="font-size:15px">Admin</th>
                                    <th class="col-md-2" style="font-size:15px"></th>
                                </tr>
                            </thead>
                    </table>  
                </div>
                <div class="card d-none d-lg-block">
                    <div class="card-body">
                        <!-- <a href="{{ url('/partner_viicheck/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                            <i class="fa fa-plus" aria-hidden="true"></i>  เพิ่ม Partner
                        </a>

                        <form method="GET" action="{{ url('/partner_viicheck') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/> -->
                        <div class="row">
                            <div class="col-12">
                                <!-- <hr> -->
                                @foreach($partner as $item)
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <h4 id="tag_h_name_{{ $item->id }}" class="text-center">
                                                <a href="{{ url('/detail_area/'.$item->name) }}">
                                                    <span class="text-success ">{{ $item->name }}</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div style="margin-top:20px;" class="text-center">
                                            <b>Phone : </b>{{ $item->phone }} &nbsp;&nbsp;&nbsp;
                                            <b>Mail : </b>{{ $item->mail }}&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <!-- พื้นที่ดูแลทั้งหมด -->
                                        </center>
                                    </div>
                                    <div class="col-3">
                                        <center>
                                            <h6>Admin</h6>
                                            @if(!empty($item->user_id_admin))
                                            <a href="{{ url('/profile/' . $item->user_id_admin) }}" target="bank">
                                                <i class="far fa-eye text-primary"></i>
                                            </a>
                                            @endif
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <div style="float: right;">
                                            <a href="{{ url('/detail_area/'.$item->name) }}" class="btn btn-sm btn-primary">
                                                ดูข้อมูล
                                            </a>
                                            <form method="POST" action="{{ url('/partner_viicheck' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Not_comfor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt"></i> ลบ</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <!-- Button trigger modal -->
                            <button id="btn_confirm_change" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#confirm_change">
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="confirm_change" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">กรุณายืนยันการเปลี่ยนแปลง</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div>
                                        <center id="div_content">
                                            
                                        </center>
                                        <br>
                                        <div id="input_disapproved" class="d-none">
                                            <input type="radio" name="reason" id="reason_1" value="1" onclick="document.querySelector('#reason_other').classList.add('d-none'),document.querySelector('#answer_reason').value = '1',document.querySelector('#btn_submit_change').classList.remove('d-none')"> มีพื้นที่บางส่วนทับซ้อนหรือมีผู้ให้บริการพื้นที่นี้อยู่แล้ว <br>
                                            <input type="radio" name="reason" id="reason_2" value="2" onclick="document.querySelector('#reason_other').classList.add('d-none'),document.querySelector('#answer_reason').value = '2',document.querySelector('#btn_submit_change').classList.remove('d-none')"> 
                                            พื้นที่บริการไม่สมเหตุสมผลกับองค์กรของท่าน <br>
                                            <input type="radio" name="reason" id="reason_3" value="3" onclick="document.querySelector('#reason_other').classList.remove('d-none'),document.querySelector('#reason_other').focus(),document.querySelector('#answer_reason').value = '3',document.querySelector('#btn_submit_change').classList.remove('d-none')"> 
                                            อื่นๆ
                                            <br><br>
                                            <input class="form-control d-none" type="text" name="reason_other" id="reason_other" value="">
                                            <input type="hidden" id="answer_reason" value="">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button id="btn_submit_change" type="button" class="btn btn-primary" >ตกลง</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!----------------------------------------------- end pc ----------------------------------------------->
                    <!----------------------------------------------- mobile ----------------------------------------------->
                    <div class="card col-12 d-block d-md-none" style="font-family: 'Prompt', sans-serif;border-radius: 25px;border-bottom-color:#00c300;border-bottom-width: 4px; margin-bottom: 10px;">
                        <h1>ฟังก์ชั่นนี้ใช้ได้เฉพาะ PC เท่านั้น</h1>
                    </div>
                    
                    
                    <!-----------------------------------------------end mobile ----------------------------------------------->

            </div>
        </div>
    </div>
    <a id="btn_f5" href="{{ url('/partner_viicheck') }}" class="d-none"></a>


    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initMap&v=weekly"async></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            check_new_sos_area_2();
        });

        var draw_area ;
        var map ;
        var area  = [] ;
        var bounds ;

        function initMap(result,bounds,id,name_map,color) {

            map = new google.maps.Map(document.getElementById(name_map+id), {
                // zoom: num_zoom,
                // center: bounds.getCenter(),
            });
            map.fitBounds(bounds);

            func_draw_area(map,id);

            // Construct the polygon.
            draw_area = new google.maps.Polygon({
                paths: result,
                strokeColor: color,
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: color,
                fillOpacity: 0.25,
            });
            draw_area.setMap(map);
            
        }

        function func_draw_area(map,id) {


        fetch("{{ url('/') }}/api/service_area/check_area_other/" + id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {

                    // console.log(JSON.parse(result[ii]['sos_area']));

                    let draw_area_other = new google.maps.Polygon({
                        paths: JSON.parse(result[ii]['sos_area']),
                        strokeColor: "#FD8433",
                        strokeOpacity: 0.8,
                        strokeWeight: 1,
                        fillColor: "#FD8433",
                        fillOpacity: 0.25,
                    });
                    draw_area_other.setMap(map);

                }
        });

    }
        
        function change_line_group(loop, name_partner){
            let select_line_group = document.querySelector("#select_line_group_" + loop).value;
            // console.log(select_line_group);
            // console.log(name_partner);

            fetch("{{ url('/') }}/api/partner_viicheck_select_line_group/" + select_line_group + "/" + name_partner);

            var delayInMilliseconds = 1500;

                setTimeout(function() {
                    window.location.reload(true);
                }, delayInMilliseconds);
        }

        function check_area_pending_partner(name_partner , id){

            fetch("{{ url('/') }}/api/area_pending/"+name_partner)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    document.querySelector('#input_new_area_' + id).value = JSON.stringify(result) ;

                    document.querySelector('#btn_disapproved_' + id).classList.remove('d-none');
                    document.querySelector('#btn_approved_' + id).classList.remove('d-none');
                    bounds = new google.maps.LatLngBounds();

                    for (let ix = 0; ix < result.length; ix++) {
                        bounds.extend(result[ix]);
                    }

                    initMap(result,bounds,id , 'new_map_','#173066');
                });

            fetch("{{ url('/') }}/api/area_current/"+name_partner)
                .then(response => response.text())
                .then(result => {
                    if (result) {
                        // console.log(result);
                    }else {
                        document.querySelector('#text_err_' + id).innerText = "ไม่มีพื้นที่บริการปัจจุบัน";
                    }
                    
                });

            view_area_current_partner(name_partner , id);

        }

        function view_area_current_partner(name_partner , id){

            fetch("{{ url('/') }}/api/area_current/"+name_partner)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    document.querySelector('#input_current_area_' + id).value = JSON.stringify(result) ;
                    bounds = new google.maps.LatLngBounds();

                    for (let ix = 0; ix < result.length; ix++) {
                        bounds.extend(result[ix]);
                    }

                    initMap(result,bounds,id,'current_map_','#008450');
                });

            fetch("{{ url('/') }}/api/area_pending/"+name_partner)
                .then(response => response.text())
                .then(result => {
                    if (result) {
                        // console.log(result);
                    }else {
                        document.querySelector('#btn_disapproved_'+ id).classList.add('d-none');
                        document.querySelector('#btn_approved_'+ id).classList.add('d-none');
                        document.querySelector('#text_2_err_' + id).innerText = "ไม่มีพื้นที่รอการตรวจสอบ";
                        document.querySelector('#span_explain_' + id).classList.add('d-none');
                    }
                    
                });
        }

        function approve(id) {
            let input_new_area = document.querySelector('#input_new_area_' + id);
            
                document.querySelector('#btn_f5').click();
                fetch("{{ url('/') }}/api/approve_area/"+input_new_area.value+"/"+id);
        }

        function disapproved(id) {

            let answer_reason = document.querySelector('#answer_reason').value;
            let reason_other = document.querySelector('#reason_other').value;

            if (reason_other === "") {
                reason_other = "อื่นๆ";
            }

                document.querySelector('#btn_f5').click();
                fetch("{{ url('/') }}/api/disapproved_area/"+ id + "/"+ answer_reason +"/"+ reason_other);
        }

        function confirm_change(text, id){

            document.querySelector('#btn_confirm_change').click();

            let btn_submit_change =  document.querySelector('#btn_submit_change');
            let div_content =  document.querySelector('#div_content');
                div_content.innerHTML = "";

            if (text === "approve") {

                let onclick = document.createAttribute("onclick");
                    onclick.value = "approve("+id+");";

                    btn_submit_change.setAttributeNode(onclick);

                    // ---------------------------- //
                    // img
                    let img = document.createElement("img");

                    let img_width = document.createAttribute("width");
                        img_width.value = "50%";
                    let img_src = document.createAttribute("src");
                        img_src.value = "{{ asset('/img/stickerline/PNG/7.png') }}";

                        img.setAttributeNode(img_width); 
                        img.setAttributeNode(img_src); 

                    //h5
                    let h5 = document.createElement("h5");

                    let h5_class = document.createAttribute("class");
                        h5_class.value = "text-danger";
                        h5.innerHTML = "คุณยืนยันการอนุมัติใช่หรือไม่";
                        h5.setAttributeNode(h5_class); 

                    let br = document.createElement("br");
                    let br2 = document.createElement("br");

                    div_content.appendChild(img);
                    div_content.appendChild(br);
                    div_content.appendChild(br2);
                    div_content.appendChild(h5);
            }

            if (text === "disapproved") {

                let onclick = document.createAttribute("onclick");
                    onclick.value = "disapproved("+id+");";

                    btn_submit_change.setAttributeNode(onclick);

                    // ---------------------------- //
                    // img
                    let img = document.createElement("img");

                    let img_width = document.createAttribute("width");
                        img_width.value = "50%";
                    let img_src = document.createAttribute("src");
                        img_src.value = "{{ asset('/img/stickerline/PNG/7.png') }}";

                        img.setAttributeNode(img_width); 
                        img.setAttributeNode(img_src); 

                    //h5
                    let h5 = document.createElement("h5");

                    let h5_class = document.createAttribute("class");
                        h5_class.value = "text-danger";
                        h5.innerHTML = "เหตุผลที่พื้นที่บริการไม่ผ่านการอนุมัติ";
                        h5.setAttributeNode(h5_class); 

                    let br = document.createElement("br");
                    let br2 = document.createElement("br");

                    div_content.appendChild(img);
                    div_content.appendChild(br);
                    div_content.appendChild(br2);
                    div_content.appendChild(h5);

                    document.querySelector('#input_disapproved').classList.remove('d-none');
                    document.querySelector('#btn_submit_change').classList.add('d-none');
            }

        }

        function check_new_sos_area_2() {

            fetch("{{ url('/') }}/api/check_new_sos_area")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    let check = "no" ;
                    let id_partner = null ;
                    for (var i = 0; i < result.length; i++) {

                        if (result[i]['name_area'] === null) {
                            id_partner = result[i]['id'];
                        }

                        if (result[i]['new_sos_area']) {
                            check = "yes";
                        }

                    }

                    if (id_partner) {
                        console.log(id_partner);
                        let tag_h_name = document.querySelector('#tag_h_name_' + id_partner);

                        let tag_i = document.createElement("i");
                        let tag_i_class = document.createAttribute("class");
                            tag_i_class.value = "fas fa-exclamation-circle notify_alert";

                        tag_i.setAttributeNode(tag_i_class); 

                        tag_h_name.appendChild(tag_i);
                    }
            });
        }


    </script>
@endsection
