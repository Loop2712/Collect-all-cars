@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
.boardcast-content{
    font-family: 'Kanit', sans-serif;
    font-size: 16px;
}
.boardcast-content .header{
    padding: 3rem  0;
    font-size: 1.5rem;
}
.boardcast-content .header .btn-content{
   border-radius: 10px;
   background-color: white;
   border: 1px solid #db2d2e;
   color: #db2d2e;

}
.boardcast-content .header .btn-content:hover{
   border-radius: 10px;
   background-color: #db2d2e;
   border: 1px solid #db2d2e;
   color: white;

}
.boardcast-content .header .btn-content_selected{
   border-radius: 10px;
   background-color: white;
   border: 1px solid #8833ff;
   color: #8833ff;

}
.boardcast-content .header .btn-content_selected:hover{
   border-radius: 10px;
   background-color: #8833ff;
   border: 1px solid #8833ff;
   color: white;

}.boardcast-content .content{
    border-radius: 20px;
    background-color: white;
    padding: 10px;
}.boardcast-content .content .img-content{
   width: 100%;
   height: 250px;
   background-color: #898989;
   object-fit: contain;
   border-radius: 20px 20px 0 0;
}.boardcast-content .content .detail{
    padding: 20px;

}.content .detail h4{
     width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.btn{
    border-radius: 10px;
}
.text-on-line {
    width:100%;
    text-align:center;
    border-bottom: 1px solid #000;
    line-height:0.1em;
    margin:10px 0 10px;
    font-size: 16px;
}
.text-on-line  .line {
    background:#fff;
    padding:0 10px;
}
</style>



 <div class="boardcast-content">
    <div class="header">
        <span>
            Content
        </span>
        <span class="float-end">
            <a id="btn_BC_all" onclick="select_content('All')" class="btn btn-content">
                All
            </a>
            {{-- <a id="btn_BC_all" href="{{ url('/broadcast/content') }}" class="btn btn-content">
                All
            </a> --}}
            @if( !empty($partner_premium->BC_by_check_in_max) )
                <a id="btn_BC_by_check_in"  onclick="select_content('BC_by_check_in')" class="btn btn-content" >
                    <i class="fa-duotone fa-map-location-dot"></i> By check in
                </a>
                {{-- <a id="btn_BC_by_check_in" href="{{ url('/broadcast/content') }}?By=BC_by_check_in" class="btn btn-content" >
                    <i class="fa-duotone fa-map-location-dot"></i> By check in
                </a> --}}
            @endif
            @if( !empty($partner_premium->BC_by_car_max))
                <a id="btn_BC_by_car"  onclick="select_content('BC_by_car')" class="btn btn-content" >
                    <i class="fa-duotone fa-cars"></i> By cars
                </a>
                {{-- <a id="btn_BC_by_car" href="{{ url('/broadcast/content') }}?By=BC_by_car" class="btn btn-content" >
                    <i class="fa-duotone fa-cars"></i> By cars
                </a> --}}
            @endif
            @if( !empty($partner_premium->BC_by_user_max))
                 <a id="btn_BC_by_user" onclick="select_content('BC_by_user')" class="btn btn-content" >
                    <i class="fa-duotone fa-users"></i>By user
                </a>
                {{-- <a id="btn_BC_by_user" href="{{ url('/broadcast/content') }}?By=BC_by_user" class="btn btn-content" >
                    <i class="fa-duotone fa-users"></i>By user
                </a> --}}
            @endif
        </span>

    </div>
    <style>
        .div-tooltip{
            position: relative;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    }
    .div-tooltip:hover{
    overflow: visible;
    }
    .div-tooltip:hover .tooltip{
    display: inline;
    opacity: 80%;
    }

    .div-tooltip .tooltip{
    background-color: #333;
    color: white;
    position: absolute;
    left: 45%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    font-size: 12px;
    min-width: 240px;
    padding: 10px 15px;
    top: 2.5em;
    transition: 0.5s;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
    opacity: 0; /* to hide it but still there*/
    border-radius:10px;
    font-family: 'Kanit', sans-serif;
    }

    .div-tooltip .tooltip::before{
        content: "";
    position: absolute;
    top:-19px ;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    border:10px solid;
    border-color:  transparent transparent #333 transparent;

    }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-12 float-end">
                <!-- <a id="btn_BC_by_user" href="{{ url('/broadcast/content') }}?By=BC_by_user" class="btn btn-outline-success" >
                    <i class="fa-duotone fa-circle-plus"></i> เพิ่มเนื้อหาใหม่
                </a> -->
                <a id="btn_BC_by_user" href="{{ url('/dashboard_boardcast_3_topic?type_page=car_btn') }}" class="btn btn-outline-secondary " >
                    <i class="fa-duotone fa-file-pdf"></i> Export PDF
                </a>
            </div>
            <div id="card_broadcast" class="row">
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
                    $type_content = '';

                    if($item->type_content == "BC_by_car"){
                        $type_content = "ส่งข้อมูลโดยกรองจากรถ";
                    }elseif($item->type_content == "BC_by_user"){
                        $type_content = "ส่งข้อมูลโดยกรองจากผู้ใช้";
                    }elseif($item->type_content == "BC_by_check_in"){
                        $type_content = "ส่งข้อมูลโดยกรองจากสถานที่";
                    }
                    //============= รูปแบบ วันที่สร้าง ==================
                    $date1 = new DateTime($item->created_at);
                    $day = $date1->format('d');
                    $month = $date1->format('m');
                    $year = $date1->format('Y');

                    if (strlen($day) === 1) {
                        $day = '0' . $day;
                    }
                    if (strlen($month) === 1) {
                        $month = '0' . $month;
                    }
                    $year = (int)$year + 543;
                    $date_created = $day . '/' . $month . '/' . $year;
                    //============= รูปแบบ วันที่อัพเดต ==================
                    $date2 = new DateTime($item->updated_at);
                    $day = $date2->format('d');
                    $month = $date2->format('m');
                    $year = $date2->format('Y');

                    if (strlen($day) === 1) {
                        $day = '0' . $day;
                    }
                    if (strlen($month) === 1) {
                        $month = '0' . $month;
                    }
                    $year = (int)$year + 543;
                    $date_updated = $day . '/' . $month . '/' . $year;
                @endphp
                <div id="" class="col-12 col-md-4 col-lg-3 mt-3">
                    <div class="main-shadow" style="border-radius: 20px;">
                        @if (!empty($item->photo))
                            <img src="{{ url('storage')}}/{{ $item->photo }}" class=" main-radius img-content">
                        @else
                            <img src="{{ asset("/img/stickerline/PNG/7.png") }}" class=" main-radius img-content">
                        @endif
                        <div class="detail">
                            <h4>{{ $item->name_content }}</h4>
                            <div class="row">
                                <div class="div-tooltip col-6">
                                    <span><b><i class="fa-solid fa-calendar-lines-pen">
                                    <span class="tooltip">วันที่สร้าง วัน{{ thaidate("lที่ j F Y" , strtotime($item->created_at)) }} <br> เวลา {{ thaidate("H:i:s" , strtotime($item->created_at)) }}</span>
                                    </i></b></span>
                                    <span>{{ $date_created }}</span>
                                </div>
                                <div class="div-tooltip col-6">
                                    <span><b><i class="fa-solid fa-arrow-rotate-right"></i></b></span>
                                    <span class="tooltip">อัพเดตล่าสุด วัน{{ thaidate("lที่ j F Y" , strtotime($item->updated_at)) }} <br> เวลา {{ thaidate("H:i:s" , strtotime($item->updated_at)) }}</span>
                                    <span>{{ $date_updated }}</span>
                                </div>
                                <div class="div-tooltip">
                                    <span><b><i class="fa-solid fa-shapes"></i></b></span>

                                    <span class="tooltip">ประเภท : {{$type_content}} <br> </span>
                                    <span>{{$type_content}}</span>
                                </div>
                                <div class="div-tooltip">
                                    <span><b><i class="fa-solid fa-paper-plane"></i></i></b></span>
                                    <span class="tooltip">ส่งแล้ว : {{ $item->send_round }} ครั้ง </span>
                                    <span>{{ $item->send_round }} ครั้ง</span>
                                </div>
                            </div>


                            <!-- <div class="d-flex justify-content-between">
                                <span><b>วันที่สร้าง</b></span>
                                <span>1/11/2565</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span><b>อัพเดต</b></span>
                                <span>1/11/2565</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span><b>ประเภท</b></span>
                                <span>bc_by_car</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span><b>ส่งแล้ว</b></span>
                                <span>1 ครั้ง</span>
                            </div> -->
                                <p class="text-on-line "><span class="line">การแสดงผล</span></p>
                                <div class="row text-center mt-0 div-tooltip">
                                    <div class="col-6">
                                        <i class="fa-regular fa-screen-users"></i> {{ $count_show_user }} ครั้ง
                                    </div>
                                    <div class="col-6">
                                        <i class="fa-solid fa-users-rectangle"></i> {{ $count_show_user_unique }} ครั้ง
                                    </div>
                                    <div class="tooltip">
                                        <div class="collumn">
                                            <p class="p-0 m-0"><i class="fa-regular fa-screen-users"></i> การแสดงผลทั้งหมด : {{ $count_show_user }} ครั้ง</p>
                                            <p class="p-0 m-0"><i class="fa-solid fa-users-rectangle"></i> การแสดงผลแบบไม่ซ้ำกับผู้ใช้เดิม : {{ $count_show_user_unique }} คน</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-on-line "><span class="line">การเข้าถึง</span></p>
                                <div class="row text-center mt-0 div-tooltip">
                                    <div class="col-6">
                                        <i class="fa-solid fa-bullseye-pointer"></i> {{ $count_user_click }} ครั้ง
                                    </div>
                                    <div class="col-6">
                                        <i class="fa-duotone fa-bullseye-pointer"></i> {{ $count_user_click_unique }} คน
                                    </div>
                                    <div class="col-12 mt-1"></div>
                                    <div class="col-6">
                                        <i class="fa-solid fa-hand-pointer"></i> {{ $count_Repeated_users }} คน
                                    </div>
                                    <div class="col-6">
                                        <i class="fa-duotone fa-hand-pointer"></i> {{ $click_max }} ครั้ง
                                    </div>
                                    <div class="tooltip">
                                        <div class="collumn">
                                            <p class="p-0 m-0"><i class="fa-solid fa-bullseye-pointer"></i> การเข้าถึงทั้งหมด : {{ $count_user_click }}  ครั้ง</p>
                                            <p class="p-0 m-0"><i class="fa-duotone fa-bullseye-pointer"></i> การเข้าถึงแบบไม่ซ้ำผู้ใช้ : {{ $count_user_click_unique }} คน</p>
                                            <p class="p-0 m-0"><i class="fa-solid fa-hand-pointer"></i> การเข้าถึงซ้ำ : {{ $count_Repeated_users }} คน</p>
                                            <p class="p-0 m-0"><i class="fa-duotone fa-hand-pointer"></i> การเข้าถึงซึ้งมากที่สุด : {{ $click_max }} ครั้ง</p>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-3">
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
                </div> -->
            @endforeach
            </div>

        </div>
    </div>
 </div>
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

    function add_color(type){
        // console.log(type);

        switch(type) {
            case 'BC_by_check_in':
                //เปลี่ยนเป็น class ใหม่
                document.querySelector('#btn_BC_by_check_in').classList.remove('btn-content');
                document.querySelector('#btn_BC_by_check_in').classList.add('btn-content_selected');

                //เปลี่ยนกลับ class เดิม
                document.querySelector('#btn_BC_all').classList.add('btn-content');
                document.querySelector('#btn_BC_all').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_car').classList.add('btn-content');
                document.querySelector('#btn_BC_by_car').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_user').classList.add('btn-content');
                document.querySelector('#btn_BC_by_user').classList.remove('btn-content_selected');
                break;

            case 'BC_by_car':
                //เปลี่ยนเป็น class ใหม่
                document.querySelector('#btn_BC_by_car').classList.remove('btn-content');
                document.querySelector('#btn_BC_by_car').classList.add('btn-content_selected');

                //เปลี่ยนกลับ class เดิม
                document.querySelector('#btn_BC_all').classList.add('btn-content');
                document.querySelector('#btn_BC_all').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_check_in').classList.add('btn-content');
                document.querySelector('#btn_BC_by_check_in').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_user').classList.add('btn-content');
                document.querySelector('#btn_BC_by_user').classList.remove('btn-content_selected');
                break;

            case 'BC_by_user':
                //เปลี่ยนเป็น class ใหม่
                document.querySelector('#btn_BC_by_user').classList.remove('btn-content');
                document.querySelector('#btn_BC_by_user').classList.add('btn-content_selected');

                //เปลี่ยนกลับ class เดิม
                document.querySelector('#btn_BC_all').classList.add('btn-content');
                document.querySelector('#btn_BC_all').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_check_in').classList.add('btn-content');
                document.querySelector('#btn_BC_by_check_in').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_car').classList.add('btn-content');
                document.querySelector('#btn_BC_by_car').classList.remove('btn-content_selected');
                break;

            case 'All':
                //เปลี่ยนเป็น class ใหม่
                document.querySelector('#btn_BC_all').classList.remove('btn-content');
                document.querySelector('#btn_BC_all').classList.add('btn-content_selected');

                //เปลี่ยนกลับ class เดิม
                document.querySelector('#btn_BC_by_user').classList.add('btn-content');
                document.querySelector('#btn_BC_by_user').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_check_in').classList.add('btn-content');
                document.querySelector('#btn_BC_by_check_in').classList.remove('btn-content_selected');
                document.querySelector('#btn_BC_by_car').classList.add('btn-content');
                document.querySelector('#btn_BC_by_car').classList.remove('btn-content_selected');
                break;
        }
    }

    function select_content(type){
        name_partner = '{{ $name_partner }}';

        //เปลี่ยนสีปุ่ม
        add_color(type);

        let card_broadcast = document.querySelector('#card_broadcast');

        fetch("{{ url('/') }}/api/select_content_broadcast" + '/' + type + '/' + name_partner)
            .then(response => response.json()) // แปลงข้อมูลเป็น JSON
            .then(data => {
                // console.log(data);

                card_broadcast.innerHTML = '';

                data.forEach(item => {

                    // let count_show_user_unique = 0;
                    // let count_user_click_unique = 0;
                    let count_Repeated_users = 0;
                    let click_max = 0;

                    //รูปภาพ บรอดแคสต์
                    let img_content = '';
                    if (item.photo) {
                        img_content = `<img src="{{ url('storage') }}/`+item.photo +`" class=" main-radius img-content">`;
                    }else{
                        img_content = `<img src="{{ asset("/img/stickerline/PNG/7.png") }}" class=" main-radius img-content">`;
                    }

                    //วันที่สร้าง ===========================
                    let date_created = new Date(item.created_at).toLocaleDateString('th-TH', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                    // $item->created_at มีค่าเป็น timestamp หรือวันที่ที่คุณต้องการ
                    let createdTimestamp = item.created_at;
                    let dateCreatedTooltipElement = '';
                        dateCreatedTooltipElement = formatThaiDate(createdTimestamp);

                    //วันที่อัพเดต ==========================
                    let date_updated = new Date(item.updated_at).toLocaleDateString('th-TH', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                    // $item->updated_at มีค่าเป็น timestamp หรือวันที่ที่คุณต้องการ
                    let updatedTimestamp = item.updated_at;
                    let dateUpdatedTooltipElement = '';
                        dateUpdatedTooltipElement = formatThaiDate(updatedTimestamp);

                    let type_content = '';
                    if(item.type_content == "BC_by_car"){
                        type_content = "ส่งข้อมูลโดยกรองจากรถ";
                    }else if(item.type_content == "BC_by_user"){
                        type_content = "ส่งข้อมูลโดยกรองจากผู้ใช้";
                    }else if(item.type_content == "BC_by_check_in"){
                        type_content = "ส่งข้อมูลโดยกรองจากสถานที่";
                    }

                    html = `<div class="col-12 col-md-4 col-lg-3 mt-3">
                                <div class="main-shadow" style="border-radius: 20px;">
                                    `+ img_content +`
                                    <div class="detail">
                                        <h4>`+item.name_content+`</h4>
                                        <div class="row">
                                            <div class="div-tooltip col-6">
                                                <span><b><i class="fa-solid fa-calendar-lines-pen">
                                                <span class="tooltip">`+dateCreatedTooltipElement+`</span>
                                                </i></b></span>
                                                <span> `+ date_created +`</span>
                                            </div>
                                            <div class="div-tooltip col-6">
                                                <span><b><i class="fa-solid fa-arrow-rotate-right"></i></b></span>
                                                <span class="tooltip">`+dateUpdatedTooltipElement+`</span>
                                                <span> `+ date_updated +`</span>
                                            </div>
                                            <div class="div-tooltip">
                                                <span><b><i class="fa-solid fa-shapes"></i></b></span>

                                                <span class="tooltip">ประเภท : `+ type_content +` <br> </span>
                                                <span>`+ type_content +`</span>
                                            </div>
                                            <div class="div-tooltip">
                                                <span><b><i class="fa-solid fa-paper-plane"></i></i></b></span>
                                                <span class="tooltip">ส่งแล้ว : `+ item.send_round +` ครั้ง </span>
                                                <span>`+ item.send_round +` ครั้ง</span>
                                            </div>
                                        </div>

                                        <p class="text-on-line "><span class="line">การแสดงผล</span></p>
                                        <div class="row text-center mt-0 div-tooltip">
                                            <div class="col-6">
                                                <i class="fa-regular fa-screen-users"></i> `+item.count_amount_show_user+` ครั้ง
                                            </div>
                                            <div class="col-6">
                                                <i class="fa-solid fa-users-rectangle"></i> `+item.count_show_user+` ครั้ง
                                            </div>
                                            <div class="tooltip">
                                                <div class="collumn">
                                                    <p class="p-0 m-0"><i class="fa-regular fa-screen-users"></i> การแสดงผลทั้งหมด : `+item.count_amount_show_user+` ครั้ง</p>
                                                    <p class="p-0 m-0"><i class="fa-solid fa-users-rectangle"></i> การแสดงผลแบบไม่ซ้ำกับผู้ใช้เดิม : `+item.count_show_user+` คน</p>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="text-on-line "><span class="line">การเข้าถึง</span></p>
                                        <div class="row text-center mt-0 div-tooltip">
                                            <div class="col-6">
                                                <i class="fa-solid fa-bullseye-pointer"></i> `+item.count_amount_user_click+` ครั้ง
                                            </div>
                                            <div class="col-6">
                                                <i class="fa-duotone fa-bullseye-pointer"></i> `+item.count_user_click+` คน
                                            </div>
                                            <div class="col-12 mt-1"></div>
                                            <div class="col-6">
                                                <i class="fa-solid fa-hand-pointer"></i> `+item.count_Repeated_users+` คน
                                            </div>
                                            <div class="col-6">
                                                <i class="fa-duotone fa-hand-pointer"></i> `+item.click_max+` ครั้ง
                                            </div>
                                            <div class="tooltip">
                                                <div class="collumn">
                                                    <p class="p-0 m-0"><i class="fa-solid fa-bullseye-pointer"></i> การเข้าถึงทั้งหมด : `+item.count_amount_user_click+` ครั้ง</p>
                                                    <p class="p-0 m-0"><i class="fa-duotone fa-bullseye-pointer"></i> การเข้าถึงแบบไม่ซ้ำผู้ใช้ : `+item.count_user_click+`คน</p>
                                                    <p class="p-0 m-0"><i class="fa-solid fa-hand-pointer"></i> การเข้าถึงซ้ำ : `+item.count_Repeated_users+`คน</p>
                                                    <p class="p-0 m-0"><i class="fa-duotone fa-hand-pointer"></i> การเข้าถึงซึ้งมากที่สุด : `+item.click_max+` ครั้ง</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>`;

                    card_broadcast.insertAdjacentHTML('afterbegin', html);
                });
            });
    }

</script>

<script>
    function formatThaiDate(timestamp) {
        let thaiDate = new Date(timestamp);
        let options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
        };
        let thaiTime = thaiDate.toLocaleTimeString('th-TH', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        return "วัน" + thaiDate.toLocaleDateString('th-TH', options) + "<br> เวลา " + thaiTime;
    }
</script>


@endsection
