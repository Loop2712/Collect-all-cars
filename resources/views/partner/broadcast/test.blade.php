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
                        <b>Car</b>
                    </h5>
                </div>
                <div class="dropdown ms-auto">
                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
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