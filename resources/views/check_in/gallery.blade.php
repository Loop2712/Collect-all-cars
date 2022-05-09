@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="row col-12">
                <div class="col-12">
                    <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                        คลังภาพ Check in
                    </h3>
                    <br>
                </div>
                <hr>
                <br>
                @foreach($all_areas as $all_area)
                @php
                    $img_name_area = str_replace(" ","_" ,$all_area->name_area) ;
                @endphp
                <div class="col-6" style="border-style: solid;border-width: 1px;padding: 20px;border-radius: 10px;">
                    <div class="row">
                        <div class="col-12">
                            <h4>พื้นที่ : <b>{{ $all_area->name_area }}</b></h4>
                            <br>
                            <br>
                        </div>
                        <div class="col-4">
                            <!-- QR-Code -->
                            <center>
                                <img src="{{ url('storage') }}/check_in/check_in_{{ $all_area->name }}_{{ $img_name_area }}.png" style="background-color: red;width: 90%;">
                                <a class="btn-sm btn-danger" href="{{ url('storage') }}/check_in/check_in_{{ $all_area->name }}_{{ $img_name_area }}.png" download >
                                    ดาวน์โหด
                                </a>
                            </center>
                        </div>
                        <div class="col-8">
                            <!-- art_work -->
                            <center>
                                <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 100%;">
                                <br><br>
                                <a class="btn-sm btn-danger" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" download >
                                    ดาวน์โหด
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection