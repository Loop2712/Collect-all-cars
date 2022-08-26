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
                                    <h3>
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
                                    </h3>
                                    @php
                                        $total_impression = 0 ;
                                        $total_period = 0 ;
                                        $total_total = 0 ;

                                        $name_helper = $item->name ; 

                                        $all_help_of_helper = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->where('help_complete' , 'Yes')->get();
                                        $count_of_helper = count($all_help_of_helper) ;

                                        $rate_help_of_helper = \App\Models\Sos_map::where('helper' , 'LIKE' , "%$name_helper%")->where('help_complete' , 'Yes')->where('score_total' , '!=' , null)->get();
                                        $count_rate_of_helper = count($rate_help_of_helper) ;

                                        foreach($rate_help_of_helper as $score){
                                            $total_impression = number_format($score->score_impression + $total_impression , 2, '.', '') ;
                                            $total_period = number_format($score->score_period + $total_period , 2, '.', '') ;
                                            $total_total = number_format($score->score_total + $total_total , 2, '.', '') ;

                                            $x_impression = number_format($total_impression / $count_rate_of_helper , 2, '.', '') ;
                                            $x_period = number_format($total_period / $count_rate_of_helper , 2, '.', '') ;
                                            $x_total = number_format($total_total / $count_rate_of_helper , 2, '.', '') ;
                                        }

                                    @endphp

                                    <div class="row">
                                        <div class="col-2">
                                            ช่วยเหลือทั้งหมด : <b>{{ $count_of_helper }}</b> ครั้ง
                                        </div>
                                        <div class="col-2">
                                            มีการให้คะแนน : <b>{{ $count_rate_of_helper }}</b> ครั้ง
                                        </div>
                                        <div class="col-3">
                                            คะแนนความประทับใจเฉลี่ย : <b>{{ $x_impression }}</b>
                                        </div>
                                        <div class="col-3">
                                            คะแนนระยะเวลาเฉลี่ย : <b>{{ $x_period }}</b>
                                        </div>
                                        <div class="col-2">
                                            คะแนนภาพรวมเฉลี่ย : <b>{{ $x_total }}</b>
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
