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
                <br>
                <div class="row text-center">
                    <div class="col-6">
                        
                       <!-- link to light box -->
                       <a href="#artwork_{{ $loop->iteration }}" class="btn-outline-dark">
                            <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 90%;">
                        </a>

                        <!-- light box -->
                        <a href="##" class="lightbox" id="artwork_{{ $loop->iteration }}">
                            <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png')"></span>
                        </a>
                        <br>
                        <!-- download btn -->
                        <a class="btn btn-outline-danger px-3 radius-30 mt-3" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $all_area->name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                        <a class="btn btn-outline-warning px-3 radius-30 mt-3" href="#flag{{ $loop->iteration }}" ><img  src="{{ asset('/img/icon/zoom-in.png') }}" width="18px" alt=""></a>
                        
                    </div>
                    <div class="col-6 ">
                        <!-- link to light box -->
                        <a href="#flag{{ $loop->iteration }}">
                            <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png" style="background-color: red;width: 33%;">
                        </a>

                        <!-- light box -->
                        <a href="##" class="lightbox" id="flag{{ $loop->iteration }}">
                            <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png')"></span>
                        </a>
                        <br>
                        <!-- download btn -->
                        <a class="btn btn-outline-danger px-3 radius-30 mt-3" href="{{ url('storage') }}/check_in/artwork_flag{{ $all_area->name }}_{{ $all_area->name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                        <a class="btn btn-outline-warning px-3 radius-30 mt-3" href="#flag{{ $loop->iteration }}" ><img  src="{{ asset('/img/icon/zoom-in.png') }}" width="18px" alt=""></a>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection