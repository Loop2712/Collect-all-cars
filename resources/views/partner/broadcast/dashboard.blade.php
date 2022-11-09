@extends('layouts.partners.theme_partner_new')

@section('content')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>

@php
    use App\Models\Ads_content;

    function type_content($data){
        switch ($data) {
            case 'BC_by_check_in':
                $data = 'By Check in' ;
                break;

            case 'BC_by_car':
                $data = 'By Cars' ;
                break;
                
            case 'BC_by_user':
                $data = 'By User' ;
                break;
            
        }
        return $data ;
    }

    function percent($data_find , $data_total){

        if($data_find == 0 or $data_total == 0 ){
            $data = 0 ;
        }
        else{
            $data = number_format( ( $data_find * 100 ) / $data_total, 2 ) ;
        }
        
        return $data ;
    }


@endphp

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
        <!-- นับจำนวนแต่ละ Ads -->
        @php
            $ads_contents_all = Ads_content::where('id_partner' , $partners_id)->get();
            $ads_contents_check_in = Ads_content::where('id_partner' , $partners_id)->where('type_content' , 'BC_by_check_in')->get();
            $ads_contents_car = Ads_content::where('id_partner' , $partners_id)->where('type_content' , 'BC_by_car')->get();
            $ads_contents_user = Ads_content::where('id_partner' , $partners_id)->where('type_content' , 'BC_by_user')->get();
        @endphp

        <!--start page wrapper -->
        <div class="page-content">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0">
                            <b>จำนวน Content ที่ส่งแล้ว</b> <span class="text-secondary" style="font-size:15px;"></span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4">
                <div class="col">
                    <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">All Content</p>
                                    <h4 class="mb-0 text-white">
                                        {{ count($ads_contents_all) }}
                                    </h4>
                                </div>
                                <div class="ms-auto text-white">
                                    <i class="fa-solid fa-file-spreadsheet font-30"></i>
                                </div>
                            </div>
                            <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 overflow-hidden bg-gradient-burning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">By Check in</p>
                                    <h4 class="mb-0 text-white">
                                        @if( !empty($partner_premium->BC_by_check_in_max) )
                                            {{ count($ads_contents_check_in) }}
                                        @else
                                            ไม่มีสิทธิ์การใช้งาน
                                        @endif
                                    </h4>
                                </div>
                                <div class="ms-auto text-white">
                                    <i class="fa-solid fa-location-check font-30"></i>
                                </div>
                            </div>
                            <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                <div class="progress-bar bg-white" role="progressbar" 
                                style="width: {{ percent(count($ads_contents_check_in) , count($ads_contents_all)) }}%"></div>
                            </div>
                            <br>
                            @if( !empty($partner_premium->BC_by_check_in_max) )
                                <span class="text-white">คิดเป็น : {{ percent(count($ads_contents_check_in) , count($ads_contents_all)) }} % จากเนื้อหาทั้งหมด</span>
                            @else
                                <br>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">By Cars</p>
                                    <h5 class="mb-0 text-white">
                                        @if( !empty($partner_premium->BC_by_car_max) )
                                            {{ count($ads_contents_car) }}
                                        @else
                                            ไม่มีสิทธิ์การใช้งาน
                                        @endif
                                    </h5>
                                </div>
                                <div class="ms-auto text-white">
                                    <i class="fa-duotone fa-car-bus font-30"></i>
                                </div>
                            </div>
                            <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: {{ percent(count($ads_contents_car) , count($ads_contents_all)) }}%"></div>
                            </div>
                            <br>
                            @if( !empty($partner_premium->BC_by_car_max) )
                                <span class="text-white">คิดเป็น : {{ percent(count($ads_contents_car) , count($ads_contents_all)) }} % จากเนื้อหาทั้งหมด</span>
                            @else
                                <br>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col" style="">
                    <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">By Users</p>
                                    <h5 class="mb-0 text-white">
                                        @if( !empty($partner_premium->BC_by_user_max) )
                                            {{ count($ads_contents_user) }}
                                        @else
                                            ไม่มีสิทธิ์การใช้งาน
                                        @endif
                                    </h5>
                                </div>
                                <div class="ms-auto text-white">
                                    <i class="fa-duotone fa-users font-30"></i>
                                </div>
                            </div>
                            <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: {{ percent(count($ads_contents_user) , count($ads_contents_all)) }}%"></div>
                            </div>
                            <br>
                            @if( !empty($partner_premium->BC_by_user_max) )
                                <span class="text-white">คิดเป็น : {{ percent(count($ads_contents_user) , count($ads_contents_all)) }} % จากเนื้อหาทั้งหมด</span>
                            @else
                                <br>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- โควต้าทั้งหมด -->
            <div class="col-12 col-lg-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="mb-0">
                                    <b>โควต้าทั้งหมด</b> <span class="text-secondary" style="font-size:15px;">(คน)</span>
                                </h3>
                            </div>
                            <div class="font-22 ms-auto">
                                <!-- <i class="bx bx-dots-horizontal-rounded"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 p-3">
                        <div class="row">
                            <div class="col-4">
                                <p class="mb-2">
                                    <i class="fa-solid fa-location-check font-30 text-info "></i> &nbsp;<b style="font-size:20px;">Check in</b>
                                    <br><br>
                                    <strong>
                                        <span>ส่งแล้ว : {{ $partner_premium->BC_by_check_in_sent }}</span>
                                        <span class="float-end">สูงสุด : {{ $partner_premium->BC_by_check_in_max }}</span>
                                    </strong>
                                </p>
                                <br>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-burning" role="progressbar" 
                                    style="width: {{ percent( $partner_premium->BC_by_check_in_sent , $partner_premium->BC_by_check_in_max ) }}%"></div>
                                </div>
                                <br><br>
                            </div>

                            <div class="col-4">
                                <p class="mb-2">
                                    <i class="fa-duotone fa-car-bus font-30 text-info"></i> &nbsp;<b style="font-size:20px;">Cars</b>
                                    <br><br>
                                    <strong>
                                        <span>ส่งแล้ว : {{ $partner_premium->BC_by_car_sent }}</span>
                                        <span class="float-end">สูงสุด : {{ $partner_premium->BC_by_car_max }}</span>
                                    </strong>
                                </p>
                                <br>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-Ohhappiness" role="progressbar" 
                                    style="width: {{ percent( $partner_premium->BC_by_car_sent , $partner_premium->BC_by_car_max )  }}%"></div>
                                </div>
                                <br><br>
                            </div>

                            <div class="col-4">
                                <p class="mb-2">
                                    <i class="fa-duotone fa-users font-30 text-info"></i> &nbsp;<b style="font-size:20px;">Users</b> 
                                    <br><br>
                                    <strong>
                                        <span>ส่งแล้ว : {{ $partner_premium->BC_by_user_sent }}</span>
                                        <span class="float-end">สูงสุด : {{ $partner_premium->BC_by_user_max }}</span>
                                    </strong>
                                </p>
                                <br>
                                <div class="col">
                                    <div class="progress radius-10" style="height:6px;">
                                        <div class="progress-bar bg-gradient-moonlit" role="progressbar" 
                                        style="width: {{ percent( $partner_premium->BC_by_user_sent , $partner_premium->BC_by_user_max )  }}%"></div>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ควต้าทั้งหมด -->

            <!-- เนื้อหาที่โดดเด่น -->
            @php
                $i_click = 0 ;
                $i_click_unique = 0 ;
                $i_show_user = 0 ;
                $i_round = 0 ;

                $id_most_click = "" ;
                $id_most_click_unique = "" ;
                $id_most_show_user = "" ;
                $id_most_round = "" ;

                foreach ($ads_contents_all as $item) {

                    // จำนวนที่ส่งมากที่สุด
                    if($item->send_round > $i_round){
                        $i_round = $item->send_round ;
                        $id_most_round = $item->id ;
                    }

                    if(!empty($item->user_click)){
                        $check_user_click = "Yes" ;
                        // ส่งมากที่สุด
                        $user_click = json_decode($item->user_click) ;
                        $count_user_click = count($user_click) ;

                        if($count_user_click > $i_click){
                            $i_click = $count_user_click ;
                            $id_most_click = $item->id ;
                        }

                        // คลิกแบบไม่ซ้ำคนมากที่สุด
                        $arr_user_click_unique = array_count_values($user_click);
                        $count_user_click_unique = count( $arr_user_click_unique ) ;

                        if($count_user_click_unique > $i_click_unique){
                            $i_click_unique = $count_user_click_unique ;
                            $id_most_click_unique = $item->id ;
                        }
                    }

                    // แสดงผลต่อผู้ใช้มากที่สุด
                    if(!empty($item->show_user)){
                        $check_show_user = "Yes" ;
                        $show_user = json_decode($item->show_user) ;
                        $count_show_user = count($show_user) ;

                        if($count_show_user > $i_show_user){
                            $i_show_user = $count_show_user ;
                            $id_most_show_user = $item->id ;
                        }
                    }

                     
                }

                // คลิกมากที่สุด
                $ads_contents_most_click = Ads_content::where('id' , $id_most_click)->first();

                // คลิกแบบไม่ซ้ำคนมากที่สุด
                $ads_contents_most_click_unique = Ads_content::where('id' , $id_most_click_unique)->first();

                 // แสดงผลต่อผู้ใช้มากที่สุด
                $ads_contents_most_show_user = Ads_content::where('id' , $id_most_show_user)->first();

                // จำนวนที่ส่งมากที่สุด
                $ads_contents_most_round = Ads_content::where('id' , $id_most_round)->first();

            @endphp
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h3 class="mb-0">
                                        <b>เนื้อหาที่โดดเด่น</b>
                                    </h3>
                                </div>
                                <div class="font-22 ms-auto">
                                    <!-- <i class="bx bx-dots-horizontal-rounded"></i> -->
                                    <a href="{{ url('/broadcast/content') }}" class="btn btn-info main-shadow main-radius text-white" style="width:100%;">
                                        ดูเนื้อหาทั้งหมด
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3">
                                    <b>การคลิกมากที่สุด</b>
                                    <br><br>
                                    @if(!empty($check_user_click))
                                        <div class="card" style="width: 18rem;">
                                            <center>
                                                <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $ads_contents_most_click->photo }}" class="main-shadow main-radius">
                                            </center>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $ads_contents_most_click->name_content }}
                                                </h5>
                                                <p class="card-text">
                                                    จำนวนทั้งหมด : {{ $i_click }} ครั้ง
                                                    <br>
                                                    ประเภท : {{ type_content( $ads_contents_most_click->type_content ) }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        ไม่มีข้อมูล
                                    @endif
                                </div>
                                <div class="col-3">
                                    <b>การคลิกแบบไม่ซ้ำคนมากที่สุด</b>
                                    <br><br>
                                    @if(!empty($check_user_click))
                                        <div class="card" style="width: 18rem;">
                                            <center>
                                                <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $ads_contents_most_click_unique->photo }}" class="main-shadow main-radius">
                                            </center>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $ads_contents_most_click_unique->name_content }}
                                                </h5>
                                                <p class="card-text">
                                                    จำนวนทั้งหมด : {{ $i_click_unique }} คน
                                                    <br>
                                                    ประเภท : {{ type_content( $ads_contents_most_click_unique->type_content ) }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        ไม่มีข้อมูล
                                    @endif
                                </div>
                                <div class="col-3">
                                    <b>แสดงผลต่อผู้ใช้มากที่สุด</b>
                                    <br><br>
                                    @if(!empty($check_show_user))
                                        <div class="card" style="width: 18rem;">
                                            <center>
                                                <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $ads_contents_most_show_user->photo }}" class="main-shadow main-radius">
                                            </center>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $ads_contents_most_show_user->name_content }}
                                                </h5>
                                                <p class="card-text">
                                                    จำนวนทั้งหมด : {{ $i_show_user }} ครั้ง
                                                    <br>
                                                    ประเภท : {{ type_content( $ads_contents_most_show_user->type_content ) }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        ไม่มีข้อมูล
                                    @endif
                                </div>
                                <div class="col-3">
                                    <b>ส่งมากที่สุด (รอบ)</b>
                                    <br><br>                                    
                                    @if(!empty($check_show_user))
                                        <div class="card" style="width: 18rem;">
                                            <center>
                                                <img style="margin-top:20px;width: 80%;max-height: 300px;" src="{{ url('storage')}}/{{ $ads_contents_most_round->photo }}" class="main-shadow main-radius">
                                            </center>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $ads_contents_most_round->name_content }}
                                                </h5>
                                                <p class="card-text">
                                                    จำนวนทั้งหมด : {{ $i_round }} รอบ
                                                    <br>
                                                    ประเภท : {{ type_content( $ads_contents_most_round->type_content ) }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        ไม่มีข้อมูล
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- การจัดอันดับ -->
            <div class="card radius-10">
                <!-- Content เรียงลำดับ ทั้งหมด -->
                <div class="card radius-10">
                    <div class="card-header border-bottom-0 bg-transparent">
                        <div class="d-flex align-items-center" style="margin-top:10px;">
                            <div>
                                <h3 class="mb-0">
                                    <b>การจัดอันดับ</b> <span class="text-secondary" style="font-size:15px;">(รวม)</span>
                                </h3>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ url('/broadcast/content') }}" class="btn btn-info main-shadow main-radius text-white" style="width:100%;">
                                    ดูข้อมูลเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>รูป</th>
                                        <th>ชื่อ</th>
                                        <th>จำนวนที่ส่ง</th>
                                        <th>แสดงผลต่อผู้ใช้</th>
                                        <th>การคลิก</th>
                                        <th>การคลิกแบบไม่ซ้ำคน</th>
                                        <th>ประเภท</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ads_contents_all as $item_contents)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <center>
                                                    <div class="product-img bg-transparent border d-flex">
                                                        <img src="{{ url('storage')}}/{{ $item_contents->photo }}" class="p-1" alt="">
                                                    </div>
                                                </center>
                                            </td>
                                            <td>{{ $item_contents->name_content }}</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>4</td>
                                            <td>
                                                @php
                                                    $type_content = type_content( $item_contents->type_content ) 
                                                @endphp
                                                @switch($type_content) 
                                                        @case('By Check in')
                                                            <sapn class="btn btn-sm bg-gradient-burning text-white radius-30">
                                                                By Check in
                                                            </sapn>
                                                            @break

                                                        @case('By Cars')
                                                            <sapn class="btn btn-sm bg-gradient-Ohhappiness text-white radius-30">
                                                                By Cars
                                                            </sapn>
                                                            @break
                                                            
                                                        @case('By User')
                                                            <sapn class="btn btn-sm bg-gradient-moonlit text-white radius-30">
                                                                By User
                                                            </sapn>
                                                            @break
                                                        
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Content เรียงลำดับ ทั้งหมด -->

                <!-- Content เรียงลำดับ -->
                <div class="row row-cols-1 row-cols-lg-3">

                    <!-- CHECK IN  --> 
                    @php
                        $check_in_most_all = Ads_content::where('id_partner',$partners_id)
                            ->where('type_content' , 'BC_by_check_in')
                            ->limit(5)
                            ->get();
                    @endphp
                    <div class="accordion" id="accordion_of_check_in">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">
                                            <b>Check in</b>
                                        </h5>
                                    </div>
                                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{ url('/broadcast/content?By=BC_by_check_in') }}" type="button" class="btn btn-sm btn-info text-white">
                                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                                        </a>

                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                                ตัวเลือก
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="collapse" data-target="#collapse_check_in_1" aria-expanded="true" aria-controls="collapse_check_in_1" href="javaScript:;" class="dropdown-item">
                                                    ส่งมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_check_in_2" aria-expanded="true" aria-controls="collapse_check_in_2" href="javaScript:;" class="dropdown-item" >
                                                    การคลิกมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_check_in_3" aria-expanded="true" aria-controls="collapse_check_in_3" href="javaScript:;" class="dropdown-item">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_check_in_4" aria-expanded="true" aria-controls="collapse_check_in_4" href="javaScript:;" class="dropdown-item">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ส่งมากที่สุด -->
                            @php
                                $check_in_most_round = Ads_content::where('id_partner',$partners_id)
                                    ->where('type_content' , 'BC_by_check_in')
                                    ->orderBy('send_round' , 'desc')
                                    ->limit(5)
                                    ->get();

                            @endphp
                            <div id="collapse_check_in_1" class="collapse show" data-parent="#accordion_of_check_in">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    ส่งมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($check_in_most_round as $item )
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $item->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $item->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $item->send_round }} รอบ</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ ส่งมากที่สุด -->

                            <!-- การคลิกมากที่สุด -->
                            @php
                                $arr_check_in_click = array() ;

                                foreach ($check_in_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $count_user_click = count($user_click) ;
                                    }else{
                                        $count_user_click = 0 ;
                                    }

                                    $arr_check_in_click[$item->id] = $count_user_click;
                                    arsort($arr_check_in_click);
                                }
                            @endphp
                            <div id="collapse_check_in_2" class="collapse" data-parent="#accordion_of_check_in">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_check_in_click as $check_in_key => $check_in_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$check_in_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $check_in_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกมากที่สุด -->

                            <!-- การคลิกแบบไม่ซ้ำคนมากที่สุด -->
                            @php
                                $arr_check_in_click_unique = array() ;

                                foreach ($check_in_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $arr_user_click_unique = array_count_values($user_click);
                                        $count_user_click_unique = count( $arr_user_click_unique ) ;
                                    }else{
                                        $count_user_click_unique = 0 ;
                                    }

                                    $arr_check_in_click_unique[$item->id] = $count_user_click_unique;
                                    arsort($arr_check_in_click_unique);
                                }
                            @endphp
                            <div id="collapse_check_in_3" class="collapse" data-parent="#accordion_of_check_in">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_check_in_click_unique as $check_in_key => $check_in_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$check_in_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $check_in_val }} คน</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกแบบไม่ซ้ำคนมากที่สุด -->

                            <!-- แสดงผลต่อผู้ใช้มากที่สุด -->
                            @php
                                $arr_check_in_show_user = array() ;

                                foreach ($check_in_most_all as $item ) {

                                    if(!empty($item->show_user)){
                                        $show_user = json_decode($item->show_user) ;
                                        $count_show_user = count($show_user) ;
                                    }else{
                                        $count_show_user = 0 ;
                                    }

                                    $arr_check_in_show_user[$item->id] = $count_show_user;
                                    arsort($arr_check_in_show_user);
                                }
                            @endphp
                            <div id="collapse_check_in_4" class="collapse" data-parent="#accordion_of_check_in">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_check_in_show_user as $check_in_key => $check_in_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$check_in_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $check_in_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ แสดงผลต่อผู้ใช้มากที่สุด -->

                        </div>
                    </div>
                    <!-- END CHECK IN  -->

                    <!-- CAR  --> 
                    @php
                        $car_most_all = Ads_content::where('id_partner',$partners_id)
                            ->where('type_content' , 'BC_by_car')
                            ->limit(5)
                            ->get();
                    @endphp
                    <div class="accordion" id="accordion_of_car">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">
                                            <b>Car</b>
                                        </h5>
                                    </div>
                                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{ url('/broadcast/content?By=BC_by_car') }}" type="button" class="btn btn-sm btn-info text-white">
                                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                                        </a>

                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                                ตัวเลือก
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="collapse" data-target="#collapse_car_1" aria-expanded="true" aria-controls="collapse_car_1" href="javaScript:;" class="dropdown-item">
                                                    ส่งมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_car_2" aria-expanded="true" aria-controls="collapse_car_2" href="javaScript:;" class="dropdown-item" >
                                                    การคลิกมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_car_3" aria-expanded="true" aria-controls="collapse_car_3" href="javaScript:;" class="dropdown-item">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_car_4" aria-expanded="true" aria-controls="collapse_car_4" href="javaScript:;" class="dropdown-item">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ส่งมากที่สุด -->
                            @php
                                $car_most_round = Ads_content::where('id_partner',$partners_id)
                                    ->where('type_content' , 'BC_by_car')
                                    ->orderBy('send_round' , 'desc')
                                    ->limit(5)
                                    ->get();

                            @endphp
                            <div id="collapse_car_1" class="collapse show" data-parent="#accordion_of_car">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    ส่งมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($car_most_round as $item )
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $item->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $item->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $item->send_round }} รอบ</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ ส่งมากที่สุด -->

                            <!-- การคลิกมากที่สุด -->
                            @php
                                $arr_car_click = array() ;

                                foreach ($car_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $count_user_click = count($user_click) ;
                                    }else{
                                        $count_user_click = 0 ;
                                    }

                                    $arr_car_click[$item->id] = $count_user_click;
                                    arsort($arr_car_click);
                                }
                            @endphp
                            <div id="collapse_car_2" class="collapse" data-parent="#accordion_of_car">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_car_click as $car_key => $car_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$car_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $car_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกมากที่สุด -->

                            <!-- การคลิกแบบไม่ซ้ำคนมากที่สุด -->
                            @php
                                $arr_car_click_unique = array() ;

                                foreach ($car_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $arr_user_click_unique = array_count_values($user_click);
                                        $count_user_click_unique = count( $arr_user_click_unique ) ;
                                    }else{
                                        $count_user_click_unique = 0 ;
                                    }

                                    $arr_car_click_unique[$item->id] = $count_user_click_unique;
                                    arsort($arr_car_click_unique);
                                }
                            @endphp
                            <div id="collapse_car_3" class="collapse" data-parent="#accordion_of_car">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_car_click_unique as $car_key => $car_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$car_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $car_val }} คน</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกแบบไม่ซ้ำคนมากที่สุด -->

                            <!-- แสดงผลต่อผู้ใช้มากที่สุด -->
                            @php
                                $arr_car_show_user = array() ;

                                foreach ($car_most_all as $item ) {

                                    if(!empty($item->show_user)){
                                        $show_user = json_decode($item->show_user) ;
                                        $count_show_user = count($show_user) ;
                                    }else{
                                        $count_show_user = 0 ;
                                    }

                                    $arr_car_show_user[$item->id] = $count_show_user;
                                    arsort($arr_car_show_user);
                                }
                            @endphp
                            <div id="collapse_car_4" class="collapse" data-parent="#accordion_of_car">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_car_show_user as $car_key => $car_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$car_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $car_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ แสดงผลต่อผู้ใช้มากที่สุด -->

                        </div>
                    </div>
                    <!-- END CAR  -->

                    <!-- User  --> 
                    @php
                        $user_most_all = Ads_content::where('id_partner',$partners_id)
                            ->where('type_content' , 'BC_by_user')
                            ->limit(5)
                            ->get();
                    @endphp
                    <div class="accordion" id="accordion_of_user">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">
                                            <b>User</b>
                                        </h5>
                                    </div>
                                    <div class="btn-group ms-auto" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{ url('/broadcast/content?By=BC_by_user') }}" type="button" class="btn btn-sm btn-info text-white">
                                            <i class="fa-sharp fa-solid fa-eye"></i> ดูเพิ่มเติม
                                        </a>

                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                                ตัวเลือก
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="collapse" data-target="#collapse_user_1" aria-expanded="true" aria-controls="collapse_user_1" href="javaScript:;" class="dropdown-item">
                                                    ส่งมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_user_2" aria-expanded="true" aria-controls="collapse_user_2" href="javaScript:;" class="dropdown-item" >
                                                    การคลิกมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_user_3" aria-expanded="true" aria-controls="collapse_user_3" href="javaScript:;" class="dropdown-item">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </a>
                                                <a data-toggle="collapse" data-target="#collapse_user_4" aria-expanded="true" aria-controls="collapse_user_4" href="javaScript:;" class="dropdown-item">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ส่งมากที่สุด -->
                            @php
                                $user_most_round = Ads_content::where('id_partner',$partners_id)
                                    ->where('type_content' , 'BC_by_user')
                                    ->orderBy('send_round' , 'desc')
                                    ->limit(5)
                                    ->get();

                            @endphp
                            <div id="collapse_user_1" class="collapse show" data-parent="#accordion_of_user">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    ส่งมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($user_most_round as $item )
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $item->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $item->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $item->send_round }} รอบ</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ ส่งมากที่สุด -->

                            <!-- การคลิกมากที่สุด -->
                            @php
                                $arr_user_click = array() ;

                                foreach ($user_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $count_user_click = count($user_click) ;
                                    }else{
                                        $count_user_click = 0 ;
                                    }

                                    $arr_user_click[$item->id] = $count_user_click;
                                    arsort($arr_user_click);
                                }
                            @endphp
                            <div id="collapse_user_2" class="collapse" data-parent="#accordion_of_user">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_user_click as $user_key => $user_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$user_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $user_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกมากที่สุด -->

                            <!-- การคลิกแบบไม่ซ้ำคนมากที่สุด -->
                            @php
                                $arr_user_click_unique = array() ;

                                foreach ($user_most_all as $item ) {

                                    if(!empty($item->user_click)){
                                        $user_click = json_decode($item->user_click) ;
                                        $arr_user_click_unique = array_count_values($user_click);
                                        $count_user_click_unique = count( $arr_user_click_unique ) ;
                                    }else{
                                        $count_user_click_unique = 0 ;
                                    }

                                    $arr_user_click_unique[$item->id] = $count_user_click_unique;
                                    arsort($arr_user_click_unique);
                                }
                            @endphp
                            <div id="collapse_user_3" class="collapse" data-parent="#accordion_of_user">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    การคลิกแบบไม่ซ้ำคนมากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_user_click_unique as $user_key => $user_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$user_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $user_val }} คน</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ การคลิกแบบไม่ซ้ำคนมากที่สุด -->

                            <!-- แสดงผลต่อผู้ใช้มากที่สุด -->
                            @php
                                $arr_user_show_user = array() ;

                                foreach ($user_most_all as $item ) {

                                    if(!empty($item->show_user)){
                                        $show_user = json_decode($item->show_user) ;
                                        $count_show_user = count($show_user) ;
                                    }else{
                                        $count_show_user = 0 ;
                                    }

                                    $arr_user_show_user[$item->id] = $count_show_user;
                                    arsort($arr_user_show_user);
                                }
                            @endphp
                            <div id="collapse_user_4" class="collapse" data-parent="#accordion_of_user">
                                <div class="card-body">
                                    <div class="col d-flex">
                                        <div class="card radius-10 w-100">
                                            <div class="best-selling-products p-3 mb-3">
                                                <span id="text_topic_check_in" class="text-secondary" style="font-size:16px;">
                                                    แสดงผลต่อผู้ใช้มากที่สุด
                                                </span>
                                                <hr>
                                                @foreach($arr_user_show_user as $user_key => $user_val)
                                                    @php
                                                        $data_of_id = Ads_content::where('id',$user_key)->first();
                                                    @endphp
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <p class="ms-auto mb-0 text-purple">{{ $loop->iteration }} &nbsp;&nbsp;</p>
                                                            </div>
                                                            <div class="product-img">
                                                                <img src="{{ url('storage')}}/{{ $data_of_id->photo }}" class="p-1" alt="" />
                                                            </div>
                                                            <div class="ps-3">
                                                                <h5 class="mb-0 font-weight-bold">{{ $data_of_id->name_content }}</h5>
                                                            </div>
                                                            <p class="ms-auto mb-0 text-purple">{{ $user_val }} ครั้ง</p>
                                                        </div>
                                                        <hr/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- จบ แสดงผลต่อผู้ใช้มากที่สุด -->

                        </div>
                    </div>
                    <!-- END User  -->
                </div>
                <!-- END Content เรียงลำดับ -->
            </div>
            <!-- END การจัดอันดับ -->





            <!-- ------------------------------------------------------------------------------------- -->


          <div class="row row-cols-1 row-cols-xl-2">
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Sales Overview</h6>
                            </div>
                              <div class="dropdown ms-auto">
                                    <button class="btn btn-white btn-sm radius-10 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Month
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">This Week</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                        </div>
                      <div id="chart6"></div>
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Visitor Status</h6>
                            </div>
                            <div class="d-flex align-items-center ms-auto font-13 gap-2">
                                <span class="border px-1 rounded cursor-pointer"><i class='bx bxs-circle text-primary me-1'></i>New Visitor</span>
                                <span class="border px-1 rounded cursor-pointer"><i class='bx bxs-circle text-sky-light me-1'></i>Old Visitor</span>
                            </div>
                        </div>
                      <div id="chart7"></div>
                    </div>
                </div>
            </div>
          </div><!--end row-->

          <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col d-flex">
              <div class="card radius-10 p-0 w-100 bg-transparent shadow-none">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">New Sessions</p>
                                <h5 class="mb-0">54.6%</h5>
                            </div>
                            <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class="bx bxs-cookie"></i></div>
                        </div>
                        <div id="chart8"></div>
                    </div>
                </div>
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Average Pages</p>
                                <h5 class="mb-0">38.5%</h5>
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-bookmark-alt-plus"></i></div>
                        </div>
                        <div id="chart9"></div>
                    </div>
                </div>
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Cloud Download</p>
                                <h5 class="mb-0">24.5K</h5>
                            </div>
                            <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-cloud-download"></i></div>
                        </div>
                        <div id="chart10"></div>
                    </div>
                </div>
             </div>
            </div>
             <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Goal Statistics</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <div id="chart11"></div>
                         <div class="row align-items-center py-2">
                             <div class="col-auto">
                                <p class="mb-0">Sales</p>
                             </div>
                             <div class="col-auto">
                                <p class="mb-0">1580</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">875</p>
                            </div>
                            <div class="col">
                                <div class="progress radius-10 mb-0" style="height:6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                                </div>
                            </div>
                         </div><!--end row-->

                         <div class="row align-items-center py-2">
                            <div class="col-auto">
                               <p class="mb-0">Users</p>
                            </div>
                            <div class="col-auto">
                               <p class="mb-0">1852</p>
                           </div>
                           <div class="col-auto">
                               <p class="mb-0">356</p>
                           </div>
                           <div class="col">
                               <div class="progress radius-10 mb-0" style="height:6px;">
                                   <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                               </div>
                           </div>
                        </div><!--end row-->
                        
                        <div class="row align-items-center py-2">
                            <div class="col-auto">
                               <p class="mb-0">Visits</p>
                            </div>
                            <div class="col-auto">
                               <p class="mb-0">1280</p>
                           </div>
                           <div class="col-auto">
                               <p class="mb-0">867</p>
                           </div>
                           <div class="col">
                               <div class="progress radius-10 mb-0" style="height:6px;">
                                   <div class="progress-bar bg-success" role="progressbar" style="width: 45%"></div>
                               </div>
                           </div>
                        </div><!--end row-->
                    </div>
                </div>
              </div>
              <div class="col col-lg-12 d-flex">
                <div class="card radius-10 p-0 w-100 p-3">
                 <div class="card radius-10 shadow-none bg-transparent border">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <div id="chart12"></div>
                            <div class="">
                                <p class="mb-0 d-flex align-items-center"><i class='bx bx-male text-danger fs-4'></i><span class="mx-2">Male</span><span>65%</span></p>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bx-female text-primary fs-4'></i><span class="mx-2">Male</span><span>35%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 mb-0 shadow-none bg-transparent mb-0 border">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h6 class="mb-0">Device Type</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                <div class="d-flex gap-2">
                                    <h4 class="mb-1 d-flex">61 <span class="align-self-start fs-6">%</span></h4>
                                    <p class="mb-0 align-self-center text-success">(+8.4%)</p>
                                </div>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-info fs-6'></i><span class="mx-2">Android</span></p>
                            </div>
                            <div class="col">
                                <div class="d-flex gap-2">
                                    <h4 class="mb-1 d-flex">28 <span class="align-self-start fs-6">%</span></h4>
                                    <p class="mb-0 align-self-center text-danger">(-1.9%)</p>
                                </div>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-success fs-6'></i><span class="mx-2">iOS</span></p>
                            </div>
                            <div class="col">
                                <div class="d-flex gap-2">
                                    <h4 class="mb-1 d-flex">11 <span class="align-self-start fs-6">%</span></h4>
                                    <p class="mb-0 align-self-center text-success">(+6.8%)</p>
                                </div>
                                <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-warning fs-6'></i><span class="mx-2">Other</span></p>
                            </div>
                        </div>

                        <div class="progress radius-10 mt-4" style="height: 10px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                    </div>
                </div>
               </div>
              </div>
          </div><!--end row-->

          <div class="row">
              <div class="col-12 col-lg-6">
                  <div class="card radius-10">
                      <div class="card-body">
                        <div id="chart13"></div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="chart14"></div>
                      </div>
                </div>
            </div>
          </div><!--end row-->
        </div>
        <!--end page wrapper -->

        <!--start page wrapper -->
        <div class="page-content">
            
            <div class="card radius-10">
                <div class="card-header border-bottom-0 bg-transparent">
                    <div class="d-lg-flex align-items-center">
                        <div>
                            <h6 class="font-weight-bold mb-2 mb-lg-0">Monthly Revenue</h6>
                        </div>
                        <div class="ms-lg-auto mb-2 mb-lg-0">
                            <div class="btn-group-round">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white">Day</button>
                                    <button type="button" class="btn btn-white">Week</button>
                                    <button type="button" class="btn btn-white">Month</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary radius-10 ms-lg-3">Download CSV</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart1"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card radius-10">
                        <div class="card-header border-bottom-0 bg-transparent">
                            <div class="d-lg-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-bold mb-2 mb-lg-0">Historical Analytics</h6>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center ms-auto font-13 gap-2">
                                <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle text-danger me-1"></i>Visitors</span>
                                <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle text-success me-1"></i>Chats</span>
                                <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle text-info me-1"></i>Page Views</span>
                            </div>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10 bg-primary">
                        <div class="card-body">
                            <h6 class="text-white">Active Visitors</h6>
                            <h4 class="font-weight-bold text-white">3467</h4>
                            <p class="font-13 text-white">Page view per minute</p>
                            <div id="chart3"></div>
                        </div>
                    </div>
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="revenue-by-channel">
                                <h6 class="mb-4 font-weight-bold">Revenue by Channel</h6>
                                <div class="progress-wrapper">
                                    <div class="d-flex align-items-center">
                                        <div class="text-secondary">Direct</div>
                                        <div class="ms-auto pe-4">$1,24,685</div>
                                        <div class="text-success">65.6%</div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="progress-wrapper mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="text-secondary">Referral</div>
                                        <div class="ms-auto pe-4">$1,22,863</div>
                                        <div class="text-success">45.6%</div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"></div>
                                    </div>
                                </div>
                                <div class="progress-wrapper mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="text-secondary">Social</div>
                                        <div class="ms-auto pe-4">$1,24,685</div>
                                        <div class="text-danger">25.2%</div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 35%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-bold mb-0">Order Status</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javaScript:;">Action</a>
                                        <a class="dropdown-item" href="javaScript:;">Another action</a>
                                        <div class="dropdown-divider"></div>    
                                        <a class="dropdown-item" href="javaScript:;">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div id="chart4"></div>
                            <div class="d-flex align-items-center justify-content-between text-center">
                                <div>
                                    <h5 class="mb-1 font-weight-bold">289</h5>
                                    <p class="mb-0 text-secondary">Booked</p>
                                </div>
                                <div class="mb-1">
                                    <h5 class="mb-1 font-weight-bold">348</h5>
                                    <p class="mb-0 text-secondary">In Progress</p>
                                </div>
                                <div>
                                    <h5 class="mb-1 font-weight-bold">152</h5>
                                    <p class="mb-0 text-secondary">Canceled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex">
                    <div class="card w-100 radius-10 shadow-none bg-transparent">
                        <div class="card-body p-0">
                            <div class="card radius-10 bg-primary">
                                <div class="card-body">
                                    <div id="chart5"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="mb-0 font-weight-bold text-white">$534.8</h4>
                                            <p class="mb-0 text-white">Average Weekly Sales</p>
                                        </div>
                                        <div><i class='bx bx-diamond font-24 text-white'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-sm-2">
                                <div class="col">
                                    <div class="card radius-10 mb-sm-0">
                                        <div class="card-body">
                                            <div id="chart6"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 mb-0">
                                        <div class="card-body">
                                            <div id="chart7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

            
            <!--end row-->

            
        </div>
        <!--end page wrapper -->

    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myTable").DataTable();
        document.querySelector('#myTable_filter').classList.add('d-none');
    });
</script>
<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("start");
    });

</script>


@endsection
