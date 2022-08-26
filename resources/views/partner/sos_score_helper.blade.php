@extends('layouts.partners.theme_partner_new')

@section('content')
<br>
<!-- --------------------------------- แสดงเฉพาะคอม ------------------------------- -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">คะแนนการช่วยเหลือ</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <br>
                                @foreach($user_of_partners as $item)
                                    <h3 class="text-center">
                                        คุณ : {{ $item->name }}
                                        @if($item->role == "admin-partner")
                                            <span class="text-secondary" style="font-size:15px;">
                                                (แอดมิน)
                                            </span>
                                        @elseif($item->role == "partner")
                                            <span class="text-secondary" style="font-size:15px;">
                                                (เจ้าหน้าที่)
                                            </span>
                                        @endif
                                        <hr style="width:50%;color: red;margin-left: 25%;">
                                    </h3>

                                    @php
                                        $total_impression = 0 ;
                                        $total_period = 0 ;
                                        $total_total = 0 ;

                                        $name_helper = $item->name ; 
                                        $id_helper = $item->id ; 

                                        $all_go_to_help = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->where('help_complete' , null)->get();
                                        $count_all_go_to_help = count($all_go_to_help) ;

                                        $all_help_of_helper = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->where('help_complete' , 'Yes')->get();
                                        $count_of_helper = count($all_help_of_helper) ;

                                        $rate_help_of_helper = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->where('help_complete' , 'Yes')->where('score_total' , '!=' , null)->get();
                                        $count_rate_of_helper = count($rate_help_of_helper) ;

                                        if($count_rate_of_helper == 0){
                                            $x_impression = "-" ;
                                            $x_period = "-" ;
                                            $x_total = "-" ;
                                        }

                                        foreach($rate_help_of_helper as $score){
                                            $total_impression = number_format($score->score_impression + $total_impression , 2, '.', '') ;
                                            $total_period = number_format($score->score_period + $total_period , 2, '.', '') ;
                                            $total_total = number_format($score->score_total + $total_total , 2, '.', '') ;

                                            $x_impression = number_format($total_impression / $count_rate_of_helper , 2, '.', '') ;
                                            $x_period = number_format($total_period / $count_rate_of_helper , 2, '.', '') ;
                                            $x_total = number_format($total_total / $count_rate_of_helper , 2, '.', '') ;
                                        }

                                        if($x_impression >= 4){
                                            $x_impression_class = "text-success" ;
                                        }elseif($x_impression >= 2.5){
                                            $x_impression_class = "text-warning" ;
                                        }elseif($x_impression == "-"){
                                            $x_impression_class = "text-secondary" ;
                                        }else{
                                            $x_impression_class = "text-danger" ;
                                        }

                                        if($x_period >= 4){
                                            $x_period_class = "text-success" ;
                                        }elseif($x_period >= 2.5){
                                            $x_period_class = "text-warning" ;
                                        }elseif($x_period == "-"){
                                            $x_period_class = "text-secondary" ;
                                        }else{
                                            $x_period_class = "text-danger" ;
                                        }

                                        if($x_total >= 4){
                                            $x_total_class = "text-success" ;
                                        }elseif($x_total >= 2.5){
                                            $x_total_class = "text-warning" ;
                                        }elseif($x_total == "-"){
                                            $x_total_class = "text-secondary" ;
                                        }else{
                                            $x_total_class = "text-danger" ;
                                        }

                                        $view_maps_all = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->get();

                                        $minute_all = 0 ;
                                        $count_case = 0 ;
                                        $data_average = [] ;

                                        foreach ($view_maps_all as $item) {
                                            
                                            if(!empty($item->created_at) && !empty($item->help_complete_time)){
                                                $minute_row = \Carbon\Carbon::parse($item->help_complete_time)->diffinMinutes(\Carbon\Carbon::parse($item->created_at)) ;

                                                $count_case = $count_case + 1 ;

                                            }else{
                                                $minute_row = 0 ;
                                            }

                                            $minute_all = $minute_all + (int)$minute_row ; 

                                            if($count_case != 0){
                                              $minute_per_case = $minute_all / $count_case ;
                                            }else{
                                              $minute_per_case = 0 ;
                                            }

                                        }

                                        if (!empty($minute_per_case)) {

                                            $data_day = (int)$minute_per_case / 1440 ; 
                                            $data_day_sp = explode("." , $data_day) ;
                                            $data_average['day'] = $data_day_sp[0] ;

                                            $data_hr = (int)$minute_per_case / 60 - ($data_average['day'] * 24) ; 
                                            $data_hr_sp = explode("." , $data_hr) ;
                                            $data_average['hr'] = $data_hr_sp[0] ;

                                            if (!empty($data_hr_sp[1])) {
                                                $data_min_1 = "0." . $data_hr_sp[1] ; 
                                                $data_min_2 = (float)$data_min_1 * 60 ; 
                                                $data_average['min'] = (int)$data_min_2 ;
                                            }else{
                                                $data_average['min'] = 0 ;
                                            }

                                            $data_average['count_case'] = $count_case ;
                                        }

                                        if($count_rate_of_helper == 0){
                                            $data_average['day'] = "-" ;
                                            $data_average['hr'] = "-" ;
                                            $data_average['min'] = "-" ;
                                        }

                                        $average_per_minute = $data_average ;



                                    @endphp

                                    <div class="row text-center" style="font-size: 17px;">
                                        <div class="col-2">
                                            ช่วยเหลือทั้งหมด 
                                            <br>
                                            <span style="font-size:12px;">(เสร็จสิ้น / ดำเนินการ)</span>
                                            <br>
                                            <b style="color: green;">
                                                {{ $count_of_helper }}
                                            </b> 
                                            / 
                                            @if($count_all_go_to_help == 0)
                                                <span style="font-size:14px;">
                                                    {{ $count_all_go_to_help }}
                                                </span> 
                                            @else
                                                <span style="font-size:14px;color: red;">
                                                    {{ $count_all_go_to_help }}
                                                </span> 
                                            @endif
                                                
                                            ครั้ง
                                        </div>
                                        <div class="col-2">
                                            มีการให้คะแนน 
                                            <br>
                                            <b>{{ $count_rate_of_helper }}</b> ครั้ง
                                        </div>
                                        <div class="col-3">
                                            คะแนนความประทับใจเฉลี่ย 
                                            <br>
                                            <b class="{{ $x_impression_class }}">{{ $x_impression }}</b>
                                        </div>
                                        <div class="col-2">
                                            คะแนนระยะเวลาเฉลี่ย 
                                            <br>
                                            <b class="{{ $x_period_class }}">{{ $x_period }}</b>
                                        </div>
                                        <div class="col-2">
                                            คะแนนภาพรวมเฉลี่ย 
                                            <br>
                                            <b class="{{ $x_total_class }}">{{ $x_total }}</b>
                                        </div>
                                        <div class="col-1">
                                            <a href="{{ url('/score_helper') . '/' . $id_helper }}" target="bank">
                                                <i class="fas fa-eye"></i>
                                                <br>
                                                เพิ่มเติม
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <br>
                                            @if($average_per_minute['day'] == "-" && $average_per_minute['hr'] == "-" && $average_per_minute['min'] == "-")
                                                ระยะเวลาโดยเฉลี่ย <b>-</b>

                                            @elseif($average_per_minute['day'] != "0" && $average_per_minute['hr'] != "0" && $average_per_minute['min'] != "0")
                                                ระยะเวลาโดยเฉลี่ย <b> {{ $average_per_minute['day'] }} วัน {{ $average_per_minute['hr'] }} ชม. {{ $average_per_minute['min'] }} นาที </b> / เคส

                                            @elseif($average_per_minute['day'] == "0" && $average_per_minute['hr'] != "0" && $average_per_minute['min'] != "0")
                                                ระยะเวลาโดยเฉลี่ย <b> {{ $average_per_minute['hr'] }} ชม. {{ $average_per_minute['min'] }} นาที </b> / เคส

                                            @elseif($average_per_minute['day'] == "0" && $average_per_minute['hr'] == "0" && $average_per_minute['min'] != "0")
                                                ระยะเวลาโดยเฉลี่ย <b>{{ $average_per_minute['min'] }} นาที </b> / เคส
                                            
                                            @elseif($average_per_minute['day'] == "0" && $average_per_minute['hr'] == "0" && $average_per_minute['min'] == "0")
                                                ระยะเวลาโดยเฉลี่ย <b>น้อยกว่า 1 นาที</b> / เคส
                                            @endif

                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- --------------------------------- สิ้นสุดแสดงเฉพาะคอม ------------------------------- -->


<!------------------------------------------------ mobile---------------------------------------------- -->

<!------------------------------------------------ end mobile---------------------------------------------- -->


@endsection
