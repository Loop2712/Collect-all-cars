


@extends('layouts.main')

@section('add')
<link rel="stylesheet" href="{{ asset('css/wishlist.css')}}" type="text/css">
@endsection
@section('content')

        <div class="container mt-2 mb-2">
    <div class="d-flex justify-content-center row" style="padding-bottom: 30px;">
        <div class="col-md-10">
            <div class="p-2">
                <h2><b>รายการโปรด</b><br><br></h2>
                
            
            @foreach($wishlist as $item)
            @if($item->car_type == 'car')
            <div class="container">
            <div class="row align-items-center event-block no-gutters margin-40px-bottom">
                <div class="col-lg-5 col-sm-12">
                    <div class="position-relative">
                    @if($item->products->image == "" )
                    <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" style="max-width: 100%; height: auto;">
                                        <!-- <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" > -->
                    @else
                    <img src="{{ url('/image/'.$item->products->id ) }}" alt="" style="max-width: 100%; height: auto;">
                                        <!-- <img src="{{ url('/image/'.$item->id ) }}" alt="" >  -->
                                        <!-- <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="" >  -->
                    @endif
                        
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                        <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500"><a href="{{ url('/car/'.$item->products->id ) }}" class="text-theme-color" style="color: black;">
                        {{ $item->products->brand }} {{ $item->products->model }} {{ $item->products->submodel }}
                        </a></h5>
                        <h5> 
                            @if ( $item->products->price == 'ติดต่อผู้ขาย')
                                <h6>{{ $item->products->price}}<span></span></h6>
                            @else
                                <h6 style="font-size:20px;color: red;">{{ number_format(intval($item->products->price))}} บาท<span></span></h6>
                                        
                            @endif
                        </h5>
                       
                        <!-- <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                            <li><br><i class="fas fa-user margin-5px-right"></i> ชื่อผู้ขาย : John Sminth</li>
                        </ul> -->
                        <p style="font-size:12px"> สถานที่ {{$item->products->location}}</p>
                        <a class="butn small margin-10px-top md-no-margin-top" href="{{ url('/car/'.$item->products->id ) }}" style="color:#000">ดูข้อมูลเพิ่มเติม<i class="fas fa-long-arrow-alt-right margin-10px-left"></i><br><br> </a>
                            <form method="POST" action="{{ url('/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sell" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                    </div><br><br>
                </div>
            </div>
            </div>
            @else
            <div class="container">
            <div class="row align-items-center event-block no-gutters margin-40px-bottom">
                <div class="col-lg-5 col-sm-12">
                    <div class="position-relative">
                    @if(!empty($item->productM->img))
                        @if($item->productM->img == "" )
                            <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" style="max-width: 100%; height: auto;">
                                            <!-- <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" > -->
                        @else
                            <img src="{{ $item->productM->img }}" alt="" style="max-width: 100%; height: auto;">
                                            <!-- <img src="{{ $item->productM->img }}" alt="" >  -->
                        @endif
                    @endif
                        <!-- <img src="https://via.placeholder.com/450x280/FFB6C1/000000" alt="" style="max-width: 100%; height: auto;"> -->
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="padding-60px-lr md-padding-50px-lr sm-padding-30px-all xs-padding-25px-all">
                        @if(!empty($item->productM->id))
                        <h5 class="margin-15px-bottom md-margin-10px-bottom font-size22 md-font-size20 xs-font-size18 font-weight-500"><a href="{{ url('/motercycle/'.$item->productM->id ) }}" class="text-theme-color" style="color: black;">
                        {{ $item->productM->brand }} {{ $item->productM->model }} {{ $item->productM->submodel }}
                        </a></h5>
                        @endif
                        <h5> 
                        @if(!empty($item->productM->price))
                            @if ( $item->productM->price == 'ติดต่อผู้ขาย')
                                <h6>{{ $item->productM->price}}<span></span></h6>
                            @else
                                <h6 style="font-size:20px;color: red;">{{ number_format(intval($item->productM->price))}} บาท<span></span></h6>
                                        
                            @endif
                        @endif
                        </h5>
                        <!-- <ul class="event-time margin-10px-bottom md-margin-5px-bottom">
                            <li><br><i class="fas fa-user margin-5px-right"></i> ชื่อผู้ขาย : John Sminth</li>
                        </ul> -->
                        @if(!empty($item->productM->location))
                            <p style="font-size:12px">สถานที่ {{$item->productM->location}}</p>
                        @endif
                        @if(!empty($item->productM->id))
                        <a class="butn small margin-10px-top md-no-margin-top" href="{{ url('/motercycle/'.$item->productM->id ) }}" style="color:#000">ดูข้อมูลเพิ่มเติม <i class="fas fa-long-arrow-alt-right margin-10px-left"></i><br><br></a>
                            <form method="POST" action="{{ url('/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sell" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        @endif
                    </div><br><br>
                </div>
            </div>
            </div>
            @endif
            @endforeach
            
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div> -->
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div> -->
        </div>
    </div>
</div>


    

@endsection
