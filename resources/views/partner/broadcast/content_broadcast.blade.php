@extends('layouts.partners.theme_partner_new')

@section('content')
<!-- MODAL LOADING -->
<div class="modal fade" id="btn-loading" tabindex="-1" role="dialog" aria-labelledby="btn-loading" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"style="border-radius: 25px;">
          <div class="modal-body text-center" >
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
      </div>
    </div>
</div>

<div class="container-data-car">
    <div class="card filter" style="padding:20px;">
        
        <div class="col-12 filter text-center">
            <div class="row">
                <div class="col-12 col-md-3">
                    <a id="btn_BC_all" href="{{ url('/broadcast/content') }}" class="btn btn-info text-white" style="width:80%;">
                        All
                    </a>
                </div>
                @if( !empty($partner_premium->BC_by_check_in_max) )
                    <div class="col-12 col-md-3">
                        <a id="btn_BC_by_check_in" href="{{ url('/broadcast/content') }}?By=BC_by_check_in" class="btn btn-outline-info" style="width:80%;">
                            By check in
                        </a>
                    </div>
                @endif

                @if( !empty($partner_premium->BC_by_car_max))
                <div class="col-12 col-md-3">
                    <a id="btn_BC_by_car" href="{{ url('/broadcast/content') }}?By=BC_by_car" class="btn btn-outline-info" style="width:80%;">
                        By cars
                    </a>
                </div>
                @endif

                @if( !empty($partner_premium->BC_by_user_max))
                <div class="col-12 col-md-3">
                    <a id="btn_BC_by_user" href="{{ url('/broadcast/content') }}?By=BC_by_user" class="btn btn-outline-info" style="width:80%;">
                        By user
                    </a>
                </div>
                @endif
            </div>
        </div>

        <hr>

        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h5 style="margin-left: 20px;margin-top: 10px;">
                        <!-- <b>จำนวนโควต้า :</b> 

                        @if( !empty($partner_premium->BC_by_check_in_max) )
                            <i class="fas fa-map-marker-check"></i>
                            &nbsp;  By check in {{ $BC_by_check_in_sent }} / {{ $BC_by_check_in_max }} &nbsp;&nbsp; 
                        @endif

                        @if( !empty($partner_premium->BC_by_car_max) )
                            <i class="fad fa-car-bus"></i>
                            &nbsp;  By cars {{ $BC_by_car_sent }} / {{ $BC_by_car_max }} &nbsp;&nbsp; 
                        @endif

                        @if( !empty($partner_premium->BC_by_user_max) )
                            <i class="fad fa-users"></i>
                            &nbsp;  By user {{ $BC_by_user_sent }} / {{ $BC_by_user_max }}
                        @endif -->

                    </h5>
                </div>

                @if( $BC_By )

                    @php
                        if($BC_By){
                            $check_permission = $BC_By . "_max";
                        }else{
                            $check_permission = "";
                        }
                    @endphp

                    @if( $partner_premium->$check_permission == 0 or $partner_premium->$check_permission == null or $partner_premium->$check_permission == "")
                        <div class="col-4">
                            <span style="float: right;margin-top: 5px;">
                                <b>ไม่มีสิทธิ์การใช้งาน</b>
                            </span>
                        </div>
                    @else
                        @php
                            $url_link = str_replace("BC", "broadcast" , $BC_By);
                        @endphp
                        <div class="col-2">
                            <a href="{{ url('/broadcast') . '/' . $url_link }}" class="btn btn-sm btn-success" style="width:80%;float: right;margin-top: 5px;">
                               <i class="fas fa-plus-circle"></i>  เพิ่มเนื้อหาใหม่
                            </a>
                        </div>

                        <div class="col-2">
                            <button class="btn btn-sm btn-secondary" style="width:80%;float: right;margin-top: 5px;">
                                <i class="fas fa-file-pdf"></i> Export PDF
                            </button>
                        </div>
                    @endif

                @else
                    <div class="col-2"></div>

                    <div class="col-2">
                        <button class="btn btn-sm btn-secondary" style="width:80%;float: right;margin-top: 5px;">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </button>
                    </div>

                @endif

            </div>
        </div>

        <hr>

        <div class="col-12">
            <div class="row">
                @foreach($ads_contents as $item)
                    @php
                        $count_show_user_unique = 0 ;
                        $count_user_click_unique = 0 ;
                        $count_Repeated_users = 0 ;
                        $click_max = 0 ;

                        if(!empty($item->show_user)){
                            $show_user = json_decode($item->show_user) ;
                            $count_show_user = count($show_user) ;
                            $count_show_user_unique = count( array_count_values($show_user) ) ;

                        }else{
                            $count_show_user = '0' ;
                        }

                        if(!empty($item->user_click)){
                            $user_click = json_decode($item->user_click) ;
                            $count_user_click = count($user_click) ;
                            $arr_user_click_unique = array_count_values($user_click);
                            $count_user_click_unique = count( $arr_user_click_unique ) ;

                            $count_Repeated_users = 0 ;
                            $click_max = 0 ;
                            foreach ($arr_user_click_unique as $key => $value) {

                                if ($value > 1) {
                                    $count_Repeated_users = $count_Repeated_users + 1 ;
                                }
                                if ($value > $click_max) {
                                    $click_max = $value ;
                                }
                                 
                            }

                        }else{
                            $count_user_click = '0' ;
                        }

                    @endphp
                    <div class="col-3">
                        <div class="card">
                            <center>
                                <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $item->photo }}" class="main-shadow main-radius">
                            </center>
                            <div class="card-body">
                                <h4 style="margin-top:10px;" class="card-title text-center">
                                    {{ $item->name_content }}
                                </h4>
                                <hr>
                                <span><b>วันที่สร้าง :</b> {{ $item->created_at }}</span> <br>
                                <span><b>อัพเดทล่าสุด :</b> {{ $item->updated_at }}</span> <br>
                                <span><b>ประเภท :</b> {{ $item->type_content }}</span> <br>
                                <span><b>ส่งแล้ว :</b> {{ $item->send_round }} รอบ</span> <br>
                                <hr>
                                <span><b>แสดงผลต่อผู้ใช้ทั้งหมด</b> &nbsp;{{ $count_show_user }}&nbsp; ครั้ง</span><br>
                                <span><b>แสดงผลต่อผู้ใช้แบบไม่ซ้ำคน</b> &nbsp;{{ $count_show_user_unique }}&nbsp; คน</span><br>
                                <br>
                                <span><b>การคลิกทั้งหมด</b> &nbsp; {{ $count_user_click }} &nbsp; ครั้ง</span><br>
                                <span><b>การคลิกแบบไม่ซ้ำคน</b> &nbsp; {{ $count_user_click_unique }} &nbsp; คน</span><br>
                                <span><b>ผู้ที่คลิกซ้ำ</b> &nbsp; {{ $count_Repeated_users }} &nbsp; คน</span><br>
                                <span><b>จำนวนที่คลิกซ้ำมากที่สุดต่อ 1 คน</b> &nbsp; {{ $click_max }} &nbsp; ครั้ง</span><br>
                            </div>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("start");
        let full_url = window.location.href ;
        const url_sp = full_url.split("=");
        
        if (url_sp.length > 1) {
            document.querySelector('#btn_BC_all').classList.remove('btn-info','text-white');
            document.querySelector('#btn_BC_all').classList.add('btn-outline-info');

            let bc_by = url_sp[1];
            add_color(bc_by);
        }

    });

    function add_color(bc_by){
        // console.log(bc_by);

        switch(bc_by) {
            case 'BC_by_car':
                document.querySelector('#btn_BC_by_car').classList.remove('btn-outline-info');
                document.querySelector('#btn_BC_by_car').classList.add('btn-info','text-white');
                break;
            case 'BC_by_check_in':
                document.querySelector('#btn_BC_by_check_in').classList.remove('btn-outline-info');
                document.querySelector('#btn_BC_by_check_in').classList.add('btn-info','text-white');
                break;
            case 'BC_by_user':
                document.querySelector('#btn_BC_by_user').classList.remove('btn-outline-info');
                document.querySelector('#btn_BC_by_user').classList.add('btn-info','text-white');
                break;
        }
    }

</script>


@endsection
