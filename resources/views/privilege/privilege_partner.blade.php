@extends('layouts.viicheck')
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif !important;
    }


    div.image img {
        height: inherit;
        width: inherit;
    }

    .container .item {
        background-color: #000;
        border-radius: 10px;
        margin: 10px;
    }

    .img-logo-partner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .img-cover {
        width: 100%;
        border-radius: 10px;
        aspect-ratio: 16/9;
    }

    .logo_cover {
        position: absolute;
        top: 25px;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: start;
        padding-left: 10px;
        padding-top: 10px;
        width: 100%;
    }

    .logo_cover img {
        height: 40px;
        object-fit: contain;
    }
</style>
@section('content')

<div class="container" style="padding-top: 160px;">

    <h3>
        @if(!empty($name_partner->name))
        {{$name_partner->name}}
        @else
        ทั้งหมด
        @endif
    </h3>
    <div class="row">
        @foreach($privilege as $item)
         <div class=" col-lg-6 mt-2">
            <div class="position-relative">
                <a href="{{url('privilege')}}/{{ $item->id }}">
                    <img src="{{ url('storage')}}/{{ $item->img_cover }}" class="img-cover" alt="" style="opacity: 1;">

                    @if(!empty($item->logo))
                    <div class="logo_cover">
                        <div>
                            <img src="{{ url('storage')}}/{{ $item->logo }}" alt="" style="opacity: 1;">
                        </div>
                    </div>
                    @else
                    <span  class="text-dark logo_cover" style="-webkit-text-stroke-width: 1px;  -webkit-text-stroke-color: #fff;font-size: 20px;">{{$item->name}}</span>
                    @endif
                </a>
            </div>
        </div>
        @endforeach
        <!-- <div class=" col-lg-6 mt-2">
            <div class="position-relative">
                <a href="http://localhost/Collect-all-cars/public/privilege/1">
                    <img src="http://localhost/Collect-all-cars/public/storage/uploads/AnF5f219DksaR6UCPZadqB1ECZRFEtempITs4hC4.jpg" class="img-cover" alt="" style="opacity: 1;">

                    <div class="logo_cover">
                        <div>
                            <img src="http://localhost/Collect-all-cars/public/storage/uploads/IcJ6SgrCj3huNiZ0ngYSYi7beZ53GwJ8djweesuD.png" alt="" style="opacity: 1;">
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class=" col-lg-6 mt-2">
            <div class="position-relative">
                <a href="http://localhost/Collect-all-cars/public/privilege/1">
                    <img src="http://localhost/Collect-all-cars/public/storage/uploads/AnF5f219DksaR6UCPZadqB1ECZRFEtempITs4hC4.jpg" class="img-cover" alt="" style="opacity: 1;">

                    <div class="logo_cover">
                        <div>
                            <img src="http://localhost/Collect-all-cars/public/storage/uploads/IcJ6SgrCj3huNiZ0ngYSYi7beZ53GwJ8djweesuD.png" alt="" style="opacity: 1;">
                        </div>
                    </div>
                </a>
            </div>
        </div> -->
    </div>
</div>
@endsection