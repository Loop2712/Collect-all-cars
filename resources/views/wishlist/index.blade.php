@extends('layouts.main')

@section('content')

        <div class="container mt-2 mb-2">
    <div class="d-flex justify-content-center row" style="padding-bottom: 30px;">
        <div class="col-md-10">
            <div class="p-2">
                <h4><b>รายการโปรด</b></h4>
                <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Favorites</span></div>
            </div>
            
            @foreach($wishlist as $item)
           @switch($item->car_type)
                @case("car")
                    <span> {{ $item->brand }} </span><br>
                    @break

                @case("motorcycle")
                    <span>{{ $item->brand }} </span><br>
                    @break

                @default
                    <span>Something went wrong, please try again</span>
            @endswitch
            
            @endforeach
            
                       
            
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div> -->
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div> -->
        </div>
    </div>
</div>


    

@endsection
