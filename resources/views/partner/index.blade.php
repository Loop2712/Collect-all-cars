@extends('layouts.admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Partner</h3>
                    <div class="card-body">
                        <a href="{{ url('/partner_viicheck/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่ม Partner
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
                        <br/>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                @foreach($partner as $item)
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <h4>
                                                <b>Partner : </b><span class="text-success">{{ $item->name }}</span>
                                            </h4>
                                            <div style="margin-top:20px;">
                                                <b>Phone : </b>{{ $item->phone }} &nbsp;&nbsp;&nbsp;
                                                <b>Mail : </b>{{ $item->mail }}&nbsp;&nbsp;&nbsp;
                                                <i class="fas fa-angle-down" data-toggle="collapse" data-target="#form_delete_{{ $item->id }}" aria-expanded="false" aria-controls="form_delete_{{ $item->id }}" ></i>
                                            </div>
                                        </div>
                                        <div class="collapse" id="form_delete_{{ $item->id }}">
                                            <br>
                                            <form method="POST" action="{{ url('/partner_viicheck' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Not_comfor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt"></i> ลบ</button>
                                            </form>
                                            <!-- <a href="{{ url('/partner_viicheck/' . $item->id . '/edit') }}"><button class="btn btn-warning btn-sm text-white"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a> -->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <h6>Group line</h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->line_group))
                                                    {{ $item->line_group }}
                                                @elseif(empty($item->line_group))
                                                    <select id="select_line_group_{{ $loop->iteration }}" class="btn btn-sm btn-outline-success" onchange="change_line_group('{{ $loop->iteration }}','{{ $item->name }}');">
                                                        <option value="" selected>- เลือกกลุ่มไลน์ -</option>
                                                        @foreach($group_line as $item)
                                                            <option value="{{ $item->groupName }}" 
                                                            {{ request('groupName') == $item->groupName ? 'selected' : ''   }} >
                                                            {{ $item->groupName }} 
                                                            </option>
                                                        @endforeach 
                                                    </select>
                                                @else
                                                    <!-- // -->
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <h6>Area current</h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->sos_area))
                                                    <i style="font-size:25px;" type="button" class="fas fa-check text-success" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}" onclick="view_area_current_partner('{{ $item->name }}' , '{{ $item->id }}');"></i>
                                                @else
                                                    <i class="fas fa-times text-danger"></i>
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-2">
                                        <center>
                                            <h6>
                                                Area pending
                                                @if(!empty($item->new_sos_area))
                                                    <span class="notify_alert" style="position: absolute; font-size:12px;color: red;top: -8px;left: 190px;">
                                                        <b>new</b>
                                                    </span>
                                                @endif
                                            </h6>
                                            <div style="margin-top:20px;">
                                                @if(!empty($item->new_sos_area))
                                                    <a href="" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}" onclick="check_area_pending_partner('{{ $item->name }}' , '{{ $item->id }}');">
                                                        ตรวจสอบ 
                                                    </a>
                                                @else
                                                    <i class="fas fa-times text-danger"></i>
                                                @endif
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-1">
                                        <center>
                                            <h6>Admin</h6>
                                            <a href="{{ url('/profile/' . $item->user_id_admin) }}" target="bank">
                                                <i class="far fa-eye text-primary"></i>
                                            </a>
                                        </center>
                                    </div>
                                </div>
                                <hr>
                                <div class="collapse container-fluid" id="collapseExample_{{ $item->id }}">
                                    <i class="far fa-times-circle float-right btn" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}"></i>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <b class="text-primary">พื้นที่บริการปัจจุบัน</b>
                                                </div>
                                                <div class="col-6">
                                                    <b class="text-danger">พื้นที่รอการตรวจสอบ</b>
                                                    <div class="float-right">
                                                        <button id="btn_approved_{{ $item->id }}" type="button" class="btn btn-sm btn-success" onclick="confirm_change('approve','{{ $item->id }}');">
                                                            &nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;
                                                        </button>
                                                        <button id="btn_disapproved_{{ $item->id }}" type="button" class="btn btn-sm btn-danger" onclick="confirm_change('disapproved','{{ $item->id }}');">
                                                            ไม่อนุมัติ
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="text-secondary" id="text_err_{{ $item->id }}"></span>
                                                    <div id="current_map_{{ $item->id }}" style="height: calc(40vh);"></div>
                                                    <input class="d-none" type="text" id="input_current_area_{{ $item->id }}" name=""  value="">
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-secondary" id="text_2_err_{{ $item->id }}"></span>
                                                    <div id="new_map_{{ $item->id }}" style="height: calc(40vh);"></div>
                                                    <input class="d-none" type="text" id="input_new_area_{{ $item->id }}" name=""  value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-style: solid;border-color: red;">
                                </div>
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

                    initMap(result,bounds,id , 'new_map_','#FF0000');
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

                fetch("{{ url('/') }}/api/approve_area/"+input_new_area.value+"/"+id);
                document.querySelector('#btn_f5').click();
        }

        function disapproved(id) {

                fetch("{{ url('/') }}/api/disapproved_area/"+id);
                document.querySelector('#btn_f5').click();
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
                        h5.innerHTML = "คุณยืนยันที่จะไม่อนุมัติใช่หรือไม่";
                        h5.setAttributeNode(h5_class); 

                    let br = document.createElement("br");
                    let br2 = document.createElement("br");

                    div_content.appendChild(img);
                    div_content.appendChild(br);
                    div_content.appendChild(br2);
                    div_content.appendChild(h5);
            }

        }


    </script>
@endsection
