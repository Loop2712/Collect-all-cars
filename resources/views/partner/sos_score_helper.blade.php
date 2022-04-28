@extends('layouts.partners.theme_partner')


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
                                @for ($i=0; $i < count($data_score); $i++)

                                    @foreach($data_score[$i] as $item)
                                        @php
                                            $sum_impression = 0 ;
                                            $sum_period = 0 ;
                                            $sum_total = 0 ;
                                            $count_sum = 0 ;

                                            $count_sum = $count_sum + 1 ;
                                            $sum_impression = ($sum_impression + $item->score_impression) /  $count_sum;
                                            $sum_period = ($sum_period + $item->score_period) /  $count_sum;
                                            $sum_total = ($sum_total + $item->score_total) /  $count_sum;
                                        @endphp
                                        <h3>{{ $item->helper }}</h3>
                                        <div class="row">
                                            <div class="col-2">
                                                ช่วยเหลือ : <b></b> ครั้ง
                                            </div>
                                            <div class="col-2">
                                                ให้คะแนน : <b></b> ครั้ง
                                            </div>
                                            <div class="col-3">
                                                คะแนนความประทับใจเฉลี่ย : <b>{{ $sum_impression }}</b>
                                            </div>
                                            <div class="col-3">
                                                คะแนนระยะเวลาเฉลี่ย : <b>{{ $sum_period }}</b>
                                            </div>
                                            <div class="col-2">
                                                คะแนนภาพรวมเฉลี่ย : <b>{{ $sum_total }}</b>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                    <hr>
                                @endfor
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
