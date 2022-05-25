@extends('layouts.partners.theme_partner_new')

@section('content')
<style>
    .lightbox {
        /* Default to hidden */
        display: none;

        /* Overlay entire screen */
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        /* A bit of padding around image */
        padding: 1em;

        /* Translucent background */
        background: rgba(0, 0, 0, 0.8);
    }

    /* Unhide the lightbox when it's the target */
    .lightbox:target {
        display: block;
    }

    .lightbox span {
        /* Full width and height */
        display: block;
        width: 100%;
        height: 100%;

        /* Size and position background image */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
    @foreach($all_areas as $all_area)
    @php
    $img_name_area = str_replace(" ","_" ,$all_area->name_area) ;
    @endphp
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-1">พื้นที่ : <b>{{ $all_area->name_area }}</b></h5>

                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                        
                       <!-- link to light box -->
                       <a href="#artwork_{{ $loop->iteration }}">
                            <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 100%;">
                        </a>

                        <!-- light box -->
                        <a href="##" class="lightbox" id="artwork_{{ $loop->iteration }}">
                            <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png')"></span>
                        </a>
                        <br>
                        <!-- download btn -->
                        <a class="btn btn-outline-danger px-5 radius-30" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                        
                    </div>
                    <div class="col-6 ">
                        <!-- link to light box -->
                        <a href="#flag{{ $loop->iteration }}">
                            <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 30%;">
                        </a>

                        <!-- light box -->
                        <a href="##" class="lightbox" id="flag{{ $loop->iteration }}">
                            <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png')"></span>
                        </a>
                        <br>
                        <!-- download btn -->
                        <a class="btn btn-outline-danger px-5 radius-30" href="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

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
                                <a class="btn-sm btn-danger" href="{{ url('storage') }}/check_in/check_in_{{ $all_area->name }}_{{ $img_name_area }}.png" download>
                                    ดาวน์โหด
                                </a>
                            </center>
                        </div>
                        <div class="col-8">
                            <!-- art_work -->
                            <center>
                                <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 100%;">
                                <br><br>
                                <a class="btn-sm btn-danger" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" download>
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