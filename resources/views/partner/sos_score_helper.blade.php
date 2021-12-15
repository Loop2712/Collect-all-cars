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
                                @for ($i=0; $i < count($name_of_partner); $i++)
                                    <h4>{{ $name_of_partner[$i] }}</h4>
                            
                                    @foreach($data_sos_maps[$i] as $item)
                                        <div class="row">
                                            <div class="col-2">
                                                ให้คะแนน : <b>{{ count($data_sos_maps[$i]) }}</b>
                                            </div>
                                            <div class="col-3">
                                                ความประทับใจ : <b>{{ $item->score_impression }}</b>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
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
