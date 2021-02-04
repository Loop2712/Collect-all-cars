@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar">
                        <div class="car__search">
                            <h5>Car Search</h5>
                            <form action="{{URL::to('/motercycle')}}" method="get">
                                <input type="text" placeholder="Search..." name="search" id="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="car__filter">
                            <h5>Car Filter</h5>
                            <form  action="{{URL::to('/motercycle')}}" method="get">
                                <select name="brand" id="brand"  onchange="this.form.submit()">
                                    <option value="" data-display="Brand">Select Brand</option>
                                    @foreach($motorbrand as $br)
                                        <option 
                                            value="{{ $br->brand }}" 
                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                            {{ $br->brand }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="gear" id="gear" onchange="this.form.submit()" >
                                    <option value="" data-display="Gear">Select Gear</option>
                                    @foreach($motorgear as $ge)
                                        <option 
                                                value="{{ $ge->gear }}" 
                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                        {{ $ge->gear }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="color" id="color" onchange="this.form.submit()" >
                                    <option value="" data-display="Color">Select Color</option>
                                    @foreach($motorcolor  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="motor" id="motor" onchange="this.form.submit()" >
                                    <option value="" data-display="Color">Select motor</option>
                                    @foreach($motor  as $mo)
                                        <option 
                                                value="{{ $mo->motor  }}" 
                                                {{ request('motor') == $mo->motor  ? 'selected' : ''   }} >
                                            {{ $mo->motor  }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="location" id="location" onchange="this.form.submit()" >
                                    <option value="" data-display="Location">Select Location</option>
                                    @foreach($motorlocation as $lo)
                                        <option 
                                            value="{{ $lo->province }}" 
                                            {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                            {{ $lo->province }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <div class="filter-price">
                                    <p>Price:</p>
                                    <input class="form-control" type="text" name="pricemin"  id="pricemin" placeholder="Min">
                                    <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="Max">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>
                                <!-- <div class="filter-price">
                                    <p>Distance:</p>
                                    <input class="form-control" type="text" name=" distancemin"  id="milemin" placeholder="Min (km.)">
                                    <input class="form-control" type="text" name=" distancemax" id="milemax" placeholder="Max (km.)">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div> -->
                            </form>
                            <div class="car__filter__btn">
                                <a class="btn btn-danger" href="{{URL::to('/motercycle')}}" >reset</a>
                             
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <img width="100%" src="{{ asset('/img/more/line_oa.png') }}">
                            </div>
                        </div>
                    </div>
                </div>








                <div class="col-lg-9">
                    <!-- <div class="car__filter__option">
                        <div class="row">
                            <div class="col">
                                <div class="car__filter__option__item car__filter__option__item--right">
                                    <h6>Sort By</h6>
                                    <select>
                                        <option value="">Price: Highest Fist</option>
                                        <option value="">Price: Lowest Fist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="row">
                    @foreach($data as $item)
                        <div class="col-lg-4 col-md-4">
                        
                            <div class="car__item">
                                <div class="car__item__pic__slider owl-carousel">
                                    @if($item->img == "" )
                                        <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img src="{{ $item->img }}" alt="" > 
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div class="label-date">{{ $item->year  }}</div>
                                        <h5><a href="{{ url('/car/'.$item->id ) }}">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h5>
                                        <ul>
                                            <li><span>{{ $item->motor  }} </span></li>
                                            
                                            @switch($item->gear)
                                                @case("ธรรมดา/manual")
                                                    <li>manual </li>
                                                    @break

                                                @case("ออโต้/Automatic")
                                                    <li>Auto </li>
                                                    @break

                                                @case("ไม่ระบุเกียร์")
                                                    <li> - </li>
                                                    @break

                                                @default
                                                    <li> - </li>
                                            @endswitch
                                            
                                            @switch($item->color)
                                                @case("ทุกสี")
                                                    <li> - </li>
                                                @break
                                                @default
                                                <li><span>{{ $item->color  }} </span></li>
                                            @endswitch
                                            
                                            
                                            
                                        </ul>
                                    </div>

                                    <div class="car__item__price">
                                        <span class="car-option sale"><a href="{{ url('/car/'.$item->id ) }}"></a>ราคา</span>
                                        @if ( $item->price == 'ติดต่อผู้ขาย')
                                        <h6>{{ $item->price}}<span></span></h6>
                                        @else
                                            <h6 style="font-size:20px">{{ number_format(intval($item->price))}} บาท<span></span></h6>
                                        
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach 
                    </div>
                    <ul class="pagination">
                    <span>
                    {{ $data->links() }}
                    </span> 
                    </ul>
                </div>
            </div>
        </div>
    </section>
 

    @endsection
