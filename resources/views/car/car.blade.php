@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar">
                        <div class="car__search">
                            <h5>Car Search</h5>
                            <form action="{{URL::to('/car')}}" method="get">
                                <input type="text" placeholder="Search..." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="car__filter">
                            <h5>Car Filter</h5>
                            <form action="{{URL::to('/car')}}" method="get">
                                <select name="brand" id="brand" onchange="this.form.submit()">
                                    <option value="" data-display="Brand">Select Brand</option>
                                    @foreach($brand_array as $br)
                                        <option 
                                            value="{{ $br->brand }}" 
                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                            {{ $br->brand }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="typecar" id="typecar"  onchange="this.form.submit()">
                                    <option value="" data-display="Type">Select Type</option>
                                    @foreach($type_array as $ty)
                                        <option 
                                                value="{{ $ty->type }}" 
                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                        {{ $ty->type }} 
                                        </option>
                                    @endforeach
                                </select>
                                <select name="gear" id="gear" onchange="this.form.submit()" >
                                    <option value="" data-display="Gear">Select Gear</option>
                                    @foreach($gear_array as $ge)
                                        <option 
                                                value="{{ $ge->gear }}" 
                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                        {{ $ge->gear }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="year" id="year" onchange="this.form.submit()" >
                                    <option value="" data-display="Year">Select Year</option>
                                    @foreach($year_array as $ye)
                                        <option 
                                                value="{{ $ye->year }}" 
                                                {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                        {{ $ye->year }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="color" id="color" onchange="this.form.submit()" >
                                    <option value="" data-display="Color">Select Color</option>
                                    @foreach($color_array  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="fuel" id="fuel" onchange="this.form.submit()" >
                                    <option value="" data-display="Fuel">Select Fuel</option>
                                    @foreach($fuel_array as $pe)
                                        <option 
                                                value="{{$pe->fuel}}" 
                                                {{ request('fuel') == $pe->fuel  ? 'selected' : ''   }} >
                                            {{ $pe->fuel  }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="location" id="location" onchange="this.form.submit()" >
                                    <option value="" data-display="Location">Select Location</option>
                                    @foreach($location_array as $lo)
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
                                <div class="filter-price">
                                    <p>Distance:</p>
                                    <input class="form-control" type="text" name=" distancemin"  id="milemin" placeholder="Min (km.)">
                                    <input class="form-control" type="text" name=" distancemax" id="milemax" placeholder="Max (km.)">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>
                                <div class="car__filter__btn">
                                    <button type="submit" class="site-btn">Reset FIlter</button>
                                </div>
                            </form>
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
                    <div class="car__filter__option">
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
                    </div>

                    <div class="row">
                    @foreach($data as $item)
                        <div class="col-lg-4 col-md-4">
                        
                            <div class="car__item">
                                <div class="car__item__pic__slider owl-carousel">
                                    @if($item->image == "" )
                                        <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img src="{{ url('/image/'.$item->id ) }}" alt="" > 
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div class="label-date">{{ $item->year  }}</div>
                                        <h5><a href="{{ url('/car/'.$item->id ) }}">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h5>
                                        <ul>
                                            <li><span><i class="fas fa-road"></i>     {{ $item->distance  }}   km</span></li>
                                            <li><span><i class="fas fa-palette"></i>  {{ $item->color  }}</span></li>
                                        </ul>
                                        <ul>
                                            <li><span> <i class="fas fa-cogs"></i>   {{ $item->gear  }}</span></li>
                                        </ul>
                                        <ul>
                                            <li><span><i class="fas fa-gas-pump"></i> {{ $item->fuel  }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="car__item__price">
                                        <span class="car-option">view</span>
                                        <h6>{{ $item->price}}<span>บาท</span></h6>
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
