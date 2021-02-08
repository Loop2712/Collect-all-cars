@extends('layouts.main')
@section('content') 

    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar">
                        <div class="car__search">
                            <h5>ค้นหา</h5>
                            <form action="{{URL::to('/car')}}" method="get">
                                <input type="text" placeholder="Search..." name="search" id="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="car__filter">
                            <h5>ตัวกรองค้นหา</h5>
                            <form  action="{{URL::to('/car')}}" method="get">
                                <select class="js-example-disabled-results" name="brand" id="brand"  onchange="this.form.submit()">
                                    <option value="" data-display="เลือกยี่ห้อ">ยี่ห้อทั้งหมด</option>
                                    @foreach($brand_array as $br)
                                        <option 
                                            value="{{ $br->brand }}" 
                                            {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                            {{ $br->brand }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select class="js-example-basic-multiple-limit" name="typecar" id="typecar"  onchange="this.form.submit()">
                                    <option value="" data-display="ประเภทรถ">ประเภทรถทั้งหมด</option>
                                    @foreach($type_array as $ty)
                                        <option 
                                                value="{{ $ty->type }}" 
                                                {{ request('typecar') == $ty->type ? 'selected' : ''   }} >
                                        {{ $ty->type }} 
                                        </option>
                                    @endforeach
                                </select>
                                <select name="gear" id="gear" onchange="this.form.submit()" >
                                    <option value="" data-display="ระบบเกียร์">ระบบเกียร์ทั้งหมด</option>
                                    @foreach($gear_array as $ge)
                                        <option 
                                                value="{{ $ge->gear }}" 
                                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                                        {{ $ge->gear }} 
                                        </option>
                                    @endforeach 
                                </select>
                                
                                <select name="color" id="color" onchange="this.form.submit()" >
                                    <option value="" data-display="สีรถ">สีรถทั้งหมด</option>
                                    @foreach($color_array  as $co)
                                        <option 
                                                value="{{ $co->color  }}" 
                                                {{ request('color') == $co->color  ? 'selected' : ''   }} >
                                            {{ $co->color  }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="location" id="location" onchange="this.form.submit()" >
                                    <option value="" data-display="สถานที่">สถานที่ทั้งหมด</option>
                                    @foreach($location_array as $lo)
                                        <option 
                                            value="{{ $lo->province }}" 
                                            {{ request('location') == $lo->province ? 'selected' : ''   }} >
                                            {{ $lo->province }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <div class="filter-price">
                                    <p>ราคา:</p>
                                    <input class="form-control" type="text" name="pricemin"  id="pricemin" placeholder="ราคาต่ำสุด">
                                    <input class="form-control" type="text" name="pricemax" id="pricemax" placeholder="ราคาสูงสุด">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>

                                <!-- ซ่อน  กดเปิด  -->
                                <div id="spoiler" style="display:none"> 

                                <select name="year" id="year" onchange="this.form.submit()" >
                                    <option value="" data-display="ปี">ปีทั้งหมด</option>
                                    @foreach($year_array as $ye)
                                        <option 
                                                value="{{ $ye->year }}" 
                                                {{ request('year') == $ye->year ? 'selected' : ''   }} >
                                        {{ $ye->year }} 
                                        </option>
                                    @endforeach 
                                </select>
                                <select name="fuel" id="fuel" onchange="this.form.submit()" >
                                    <option value="" data-display="เชื้อเพลิง">เชื้อเพลิงทั้งหมด</option>
                                    @foreach($fuel_array as $pe)
                                        <option 
                                                value="{{$pe->fuel}}" 
                                                {{ request('fuel') == $pe->fuel  ? 'selected' : ''   }} >
                                            {{ $pe->fuel  }} 
                                        </option>
                                    @endforeach 
                                </select>


                                
                                
                                <div class="filter-price">
                                    <p>ระยะทาง:</p>
                                    <input class="form-control" type="text" name=" distancemin"  id="milemin" placeholder="ระยะทางต่ำสุด (km.)">
                                    <input class="form-control" type="text" name=" distancemax" id="milemax" placeholder="ระยะทางสูงสุด (km.)">
                                    <button type="submit" class="btn btn-danger btn-sm ">  ค้นหา </button>
                                </div>
                                </div> 
                            <button title="Click to show/hide content" type="button"  class="btn btn-sm "
                            onclick="if(document.getElementById('spoiler') .style.display=='none') 
                            {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler')
                             .style.display='none'}">การค้นหาขั้นสูง</button>
                                
                            </form>
                            <br>
                            <div class="car__filter__btn">
                                    <a class="btn btn-danger" href="{{URL::to('/car')}}" >reset</a>
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
                                    @if($item->image == "" )
                                        <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                    @else
                                        <img src="{{ url('/image/'.$item->id ) }}" alt="" > 
                                        <!-- <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="" >  -->
                                    @endif
                                </div>
                                <div class="car__item__text">
                                    <div class="car__item__text__inner">
                                        <div class="label-date">{{ $item->year  }}</div>
                                        <h5><a href="{{ url('/car/'.$item->id ) }}">{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</a></h5>
                                        <ul>
                                            <li><span>{{ $item->distance  }} </span>km</li>
                                            
                                            @switch($item->gear)
                                                @case("เกียร์ธรรมดา")
                                                    <li>Manual </li>
                                                    @break

                                                @case("เกียร์อัตโนมัติ")
                                                    <li>Auto </li>
                                                    @break

                                                @default
                                                    <li> - </li>
                                            @endswitch
                                            
                                            
                                            @switch($item->fuel)
                                                @case("Diesel")
                                                    <li><span>ดีเซล</span></li>
                                                    @break
                                                @case("Petrol - Unleaded (ULP)")
                                                    <li><span>เบนซิน</span></li>
                                                    @break
                                                @case("Petrol - Leaded")
                                                    <li><span>เบนซิน</span></li>
                                                    @break
                                                @case("Electric")
                                                    <li><span>ไฟฟ้า</span></li>
                                                    @break
                                                @case("Hybrid")
                                                    <li><span>ไฮบริด</span></li>
                                                    @break
                                                @case("Natural Gas Vehicle")
                                                    <li><span>NGV</span></li>
                                                    @break
                                                @case("pito")
                                                    <li><span>เบนซิน</span></li>
                                                    @break
                                                @default
                                                    <li><span> - </span></li>
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
