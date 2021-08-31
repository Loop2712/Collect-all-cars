@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="latlng" name="latlng" readonly>

                        @foreach($register_car as $item)
                            <div class="col-12 card shadow">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-4">
                                                <center>
                                                    <img style="margin-top:18px;" src="{{ url('/img/logo_brand/logo-') }}{{ strtolower($item->brand) }}.png">
                                                </center>
                                            </div>
                                            <div class="col-8 text-center">
                                                <div style="margin-top:10px;">
                                                    <h5><b>{{ $item->registration_number }}</b></h5>
                                                    <span>{{ $item->province }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr class="center">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <span class="text-success"><b>{{ $item->name_insurance }}</b></span>
                                            </div>
                                            <div class="col-4">
                                                <a href="tel:{{ $item->phone_insurance }}" class="btn btn-sm btn-primary main-shadow main-radius"><i class="fas fa-phone-alt"></i> ติดต่อ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <br>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG1_Wtq39qpBpTSaSne1jNv4GtMqIB920&language=th" ></script>
    <script src="{{ asset('js/sos_map.js')}}"></script>
@endsection
