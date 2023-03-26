@extends('layouts.partners.theme_partner_new')

@section('content')


<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">

            <div class="col-12 mt-3">
                <span class="font-weight-bold h4 mb-0">
                    ข้อมูลหน่วยแพทย์ {{ $data_1669_operating_unit->name }}
                </span>
                <button class="btn btn-success btn-sm float-end float-right mb-0" onclick="gen_qr_code_add_officer();">
                    <i class="fa fa-plus" aria-hidden="true"></i>  เพิ่มสมาชิก
                </button>

                <button id="btn_modal_confirm_create" class="btn btn-success btn-sm float-end float-right mb-0 d-none" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus" aria-hidden="true"></i>  เพิ่มสมาชิก (ปุ่มเปิด modal)
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header d-none">
            <h5 class="modal-title" id="exampleModalLabel">เชิญสมาชิก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div id="content_load" class="modal-body text-center">
                <img class="mt-3" width="60%" src="{{ url('/img/icon/cars.gif') }}">
                <br>
                <center style="margin-top:15px;">
                  <div class="bouncing-loader">
                    <span style="font-family: 'Kanit', sans-serif;"> <b>กำลังโหลด โปรดรอสักครู่</b> </span>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                </center>
          </div>

          <div id="content_qr_code" class="modal-body d-none">
            <center>
                <img id="img_qr_code" width="50%" src="">
                <br><br>
                <a id="img_qr_code_downloada"  href="" download >
                    <span class="btn btn-success"><i class="fa-solid fa-download"></i> ดาวน์โหลด QR-CODE</span>
                </a>
                <br>
                <br>
                <div class="input-group">
                    <input type="text" class="form-control" name="copy_link_add_officer" id="copy_link_add_officer" value="{{ url('/add_new_officers' . '/' .  $data_1669_operating_unit->id  ) }}" aria-label="Dollar amount (with dot and two decimal places)">
                    <!-- <span class="input-group-text"></span> -->
                    <span class="input-group-text btn" onclick="CopyToClipboard('copy_link_add_officer')">Copy</span>
                </div>
            </center>
          </div>

        </div>
      </div>
    </div>

    <div class="card-body">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2555" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ชื่อเจ้าหน้าที่</th>
                                        <th>พื้นที่ที่พร้อมช่วยเหลือ</th>
                                        <th>ระดับ</th>
                                        <th>ประเภท</th>
                                        <th>สถานะ</th>
                                        <th>ไปช่วยเหลือแล้ว(ครั้ง)</th>
                                        <th>ปฏิเสธการช่วยเหลือ(ครั้ง)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_officer as $item)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                {{ $item->name_officer }}
                                            </td>
                                            <td>
                                                @if( $item->status == "Standby")
                                                    <style>
                                                        #map_standby_{{ $item->id }} {
                                                            height: calc(15vh);
                                                        }
                                                    </style>
                                                    <div id="map_standby_{{ $item->id }}"></div>
                                                    <!-- {{ $item->lat }},{{ $item->lng }} -->
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $color_level = "" ;
                                                    switch($item->level) {
                                                        case 'FR':
                                                            $color_level = "success";
                                                        break;
                                                        case 'BLS':
                                                            $color_level = "warning";
                                                        break;
                                                        case 'ILS':
                                                            $color_level = "danger";
                                                        break;
                                                        case 'ALS':
                                                            $color_level = "danger";
                                                        break;
                                                    }
                                                @endphp
                                                <center>
                                                    <span class="btn btn-sm btn-{{ $color_level }} main-shadow main-radius" style="width: 100%;">
                                                        {{ $item->level }}
                                                    </span>
                                                </center>
                                            </td>
                                            <td>
                                                @php
                                                    $class_vehicle_type = "" ;

                                                    if( $item->vehicle_type == 'รถ' ){
                                                        $class_vehicle_type = "fa-solid fa-truck-medical" ;
                                                    }else if ( $item->vehicle_type == 'อากาศยาน' ){
                                                        $class_vehicle_type = "fa-sharp fa-solid fa-plane" ;
                                                    }else if ( $item->vehicle_type == 'เรือ ป.1' ){
                                                        $class_vehicle_type = "fa-duotone fa-ship" ;
                                                    }else if ( $item->vehicle_type == 'เรือ ป.2' ){
                                                        $class_vehicle_type = "fa-duotone fa-ship" ;
                                                    }else if ( $item->vehicle_type == 'เรือ ป.3' ){
                                                        $class_vehicle_type = "fa-duotone fa-ship" ;
                                                    }else if ( $item->vehicle_type == 'เรือประเภทอื่นๆ' ){
                                                        $class_vehicle_type = "fa-duotone fa-ship" ;
                                                    }
                                                @endphp
                                                <center>
                                                    <span class="btn btn-sm btn-info main-shadow main-radius text-white" style="width: 100%;">
                                                        <i id="tag_i_vehicle_type" class="{{ $class_vehicle_type }}"></i> {{ $item->vehicle_type }}
                                                    </span>
                                                </center>
                                            </td>
                                            <td>
                                                @php
                                                    $text_status = "" ;
                                                    $text_status = "" ;
                                                    switch($item->status) {
                                                        case 'Standby':
                                                            $color_status = "success";
                                                            $text_status = "พร้อมช่วยเหลือ" ;
                                                        break;
                                                        case 'Not_ready':
                                                            $color_status = "danger";
                                                            $text_status = "ยังไม่พร้อม" ;
                                                        break;
                                                        case 'Helping':
                                                            $color_status = "warning";
                                                            $text_status = "กำลังช่วยเหลือ" ;
                                                        break;
                                                    }
                                                @endphp
                                                <center>
                                                    <span class="text-{{ $color_status }}" style="font-size: 18px;">
                                                        <b>{{ $text_status }}</b>
                                                    </span>
                                                </center>
                                            </td>
                                            <td>
                                                @if( !empty($item->go_to_help) )
                                                    {{ $item->go_to_help }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $count_refuse = 0 ;
                                                    if(!empty($item->refuse)){
                                                        $refuse_exp = explode(",",$item->refuse) ;
                                                        $count_refuse = count($refuse_exp);
                                                    }
                                                @endphp

                                                {{ $count_refuse }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






                <!-- <div class="table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group"> 
                                    <button class="btn btn-outline-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>Copy</span></button> 
                                    <button class="btn btn-outline-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>Excel</span></button> 
                                    <button class="btn btn-outline-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example2" type="button"><span>PDF</span></button> 
                                    <button class="btn btn-outline-secondary buttons-print" tabindex="0" aria-controls="example2" type="button"><span>Print</span></button> </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example2"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 269.406px;">ชื่อเจ้าหน้าที่</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 430.078px;">พื้นที่ที่พร้อมช่วยเหลือ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">ระดับ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">ประเภท</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">สถานะ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">ไปช่วยเหลือแล้วทั้งหมด(ครั้ง)</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 198.453px;">ปฏิเสธการช่วยเหลือทั้งหมด(ครั้ง)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_officer as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    {{ $item->name_officer }}
                                                </td>
                                                <td>
                                                    {{ $item->lat }},{{ $item->lng }}
                                                </td>
                                                <td>
                                                    {{ $item->level }}
                                                </td>
                                                <td>
                                                    {{ $item->vehicle_type }}
                                                </td>
                                                <td>
                                                    {{ $item->status }}
                                                </td>
                                                <td>
                                                    {{ $item->go_to_help }}
                                                </td>
                                                <td>
                                                    {{ $item->refuse }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing ... to ... of ... entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


    </div>
</div>

<script>
        
    document.addEventListener('DOMContentLoaded', (event) => {

        open_map_standby_all();
        
        var table = $('#example2555').DataTable( {
            
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );

  });
</script>

<!-- VIICHECK MAP ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<script>
    var map_standby = [] ;
    var marker = [] ;
    const image_operating_unit_red = "{{ url('/img/icon/operating_unit/แดง.png') }}";
    const image_operating_unit_yellow = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
    const image_operating_unit_green = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
    const image_operating_unit_general = "{{ url('/img/icon/operating_unit/ทั่วไป.png') }}";

    function open_map_standby_all(){

        @foreach($data_officer as $item)
            map_standby['{{ $item->id }}'] = new google.maps.Map(document.getElementById("map_standby_{{ $item->id }}"), {
                center: { lat: parseFloat("{{ $item->lat }}"),lng: parseFloat("{{ $item->lng }}") },
                zoom: 14 ,
            });

            switch("{{ $item->level }}") {
                case 'FR':
                    icon_marker = image_operating_unit_green;
                break;
                case 'BLS':
                    icon_marker = image_operating_unit_yellow;
                break;
                case 'ILS':
                    icon_marker = image_operating_unit_red;
                break;
                case 'ALS':
                    icon_marker = image_operating_unit_red;
                break;
            }

            marker['{{ $item->id }}'] = new google.maps.Marker({
                position: {lat: parseFloat("{{ $item->lat }}") , lng: parseFloat("{{ $item->lng }}") },
                map: map_standby['{{ $item->id }}'],
                icon: icon_marker,
            });
        @endforeach
    }
</script>

 <script>
        function gen_qr_code_add_officer(){

            document.querySelector('#btn_modal_confirm_create').click();

            let url = "" ;

            url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.viicheck.com/add_new_officers" + "/" + "{{ $data_1669_operating_unit->id }}" + "&chs=500x500&choe=UTF-8" ;
            // console.log(url);

            let data = {
                'url' : url,
                'name_unit' : "{{ $data_1669_operating_unit->name }}",
            };

            fetch("{{ url('/') }}/api/save_qr_code_add_officer", {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response){
                return response.text();
            }).then(function(text){
                // console.log(text);
                let url_img = "{{ url('storage') }}/" + text;
                // console.log(url_img);

                document.querySelector('#img_qr_code').setAttribute('src' , url_img);
                document.querySelector('#img_qr_code_downloada').setAttribute('href' , url_img);

                document.querySelector('#content_qr_code').classList.remove('d-none');
                document.querySelector('#content_load').classList.add('d-none');

            }).catch(function(error){
                // console.error(error);
            });

            


        }

        function CopyToClipboard(containerid) {
          if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");
          } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            alert("คัดลอก ข้อความแล้ว");
            window.location.replace("{{url('/view_new_user')}}");
          }
        }

    </script>

@endsection
