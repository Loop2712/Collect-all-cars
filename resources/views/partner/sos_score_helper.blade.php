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
                                @for ($i=0; $i < count($name_of_partner); $i++)
                                    <h3>{{ $name_of_partner[$i] }}</h3>
                            
                                    @foreach($data_sos_maps[$i] as $item)
                                        <div class="row">
                                            <div class="col-2">
                                                ช่วยเหลือ : <b>{{ count($data_sos_maps[$i]) }}</b> ครั้ง
                                            </div>
                                            <div class="col-2">
                                                ให้คะแนน : <b>{{ count($data_sos_maps[$i]) }}</b> ครั้ง
                                            </div>
                                            <div class="col-3">
                                                คะแนนความประทับใจเฉลี่ย : <b>{{ $item->score_impression }}</b>
                                            </div>
                                            <div class="col-3">
                                                คะแนนระยะเวลาเฉลี่ย : <b>{{ $item->score_impression }}</b>
                                            </div>
                                            <div class="col-2">
                                                คะแนนภาพรวมเฉลี่ย : <b>{{ $item->score_impression }}</b>
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
