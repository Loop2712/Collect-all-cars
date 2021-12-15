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
                                    <h1>{{ $name_of_partner[$i] }}</h1>
                                @endfor
                                
                                @foreach($data_sos_maps as $item)
                                    <div class="row">
                                        <!-- <div class="col-1">
                                            <center><b>{{ $item->id }}</b></center>
                                        </div> -->
                                        <div class="col-3">
                                            {{ $item->name }}
                                        </div>
                                    </div>
                                    <br>
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
