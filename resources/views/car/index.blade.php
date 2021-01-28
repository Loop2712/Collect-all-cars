@extends('layouts.main')

@section('content')

<section>
<section class="hero spad set-bg" data-setbg="https://images.pexels.com/photos/57409/ford-mustang-stallion-red-57409.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    
                </div>
                <div class="col-lg-5">
                    <div class="hero__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Car</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Motorcycle</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h2>Find Your Dream Car</h2>
                                    <form action="{{URL::to('/car')}}" method="get">
                                        <div class="select-list">
                                            <div class="select-list-item">
                                                <p>Select Brand</p>
                                                <select name="brand" id="brand" >
                                                    <option value="" data-display="Brand">Select Brand</option>
                                                    @foreach($brand_array as $br)
                                                        <option 
                                                            value="{{ $br->brand }}" 
                                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                                            {{ $br->brand }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select year</p>
                                                <select name="year" id="year"  >
                                                    <option value="" data-display="Year">Select Year</option>
                                                    @foreach($year_array as $ye)
                                                        <option 
                                                                value="{{ $ye->year }}" 
                                                                {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                                        {{ $ye->year }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Color</p>
                                                <select name="color" id="color"  >
                                                    <option value="" data-display="Color">Select Color</option>
                                                    @foreach($color_array  as $co)
                                                        <option 
                                                                value="{{ $co->color  }}" 
                                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                                            {{ $co->color  }} 
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Type</p>
                                                <select name="typecar" id="typecar"  >
                                                    <option value="" data-display="Type">Select Type</option>
                                                    @foreach($type_array as $ty)
                                                        <option 
                                                                value="{{ $ty->type }}" 
                                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                                        {{ $ty->type }} 
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" id="amount">
                                                        <input type="text" id="tt">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="site-btn">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h2>Buy Your Dream Motorcycle</h2>
                                    <form>
                                        <div class="select-list">
                                            <div class="select-list-item">
                                                <p>Select Year</p>
                                                <select>
                                                    <option data-display=" ">Select Year</option>
                                                    <option value="">2020</option>
                                                    <option value="">2019</option>
                                                    <option value="">2018</option>
                                                    <option value="">2017</option>
                                                    <option value="">2016</option>
                                                    <option value="">2015</option>
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Brand</p>
                                                <select>
                                                    <option data-display=" ">Select Brand</option>
                                                    <option value="">Acura</option>
                                                    <option value="">Audi</option>
                                                    <option value="">Bentley</option>
                                                    <<option value="">BMW</option>
                                                    <option value="">Bugatti</option>
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Model</p>
                                                <select>
                                                    <option data-display=" ">Select Model</option>
                                                    <option value="">Q3</option>
                                                    <option value="">A4 </option>
                                                    <option value="">AVENTADOR</option>
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Mileage</p>
                                                <select>
                                                    <option data-display=" ">Select Mileage</option>
                                                    <option value="">27</option>
                                                    <option value="">25</option>
                                                    <option value="">15</option>
                                                    <option value="">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" id="amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="site-btn">Searching</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            
            </div>
        </div>
        </section>
        <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span></span>
                        <h2>รถใหม่ วันนี้</h2>
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
                                        <span class="car-option"><a href="{{ url('/car/'.$item->id ) }}"></a>view</span>
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
    </section>
    </section>
    

@endsection