@extends('layouts.car')
@section('content')  
<section class="section products">
    <div class="products-layout container">
        <div class="col-1-of-4">
            
            <form action="{{URL::to('/car')}}" method="get" >
                <div class="block-title">
                    <div class="form-inline waves-light" > 
                        <div class="md-form mt-0">
                            <input class="form-control" type="text" placeholder="Search" name="search" > 
                            
                    </div>
                </div>
                <div class="col">
                <label>ยี่ห้อรถ</label>
                    <select name="brand" id="brand" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>ยี่ห้อทั้งหมด</option> 
                            @foreach($brand_array as $br)
                                <option 
                                    value="{{ $br->brand }}" 
                                    {{ request('brand') == $br->brand ? 'selected' : ''   }}  >
                                    {{ $br->brand }} 
                                </option>
                            @endforeach                                     
                    </select>
                </div>
                <div class="col">
                    <label>ประเภท</label>
                    <select name="typecar" id="typecar" class="form-control" onchange="this.form.submit()">
                            <option value="" selected>ทุกประเภท</option> 
                            @foreach($type_array as $ty)
                            <option 
                                    value="{{ $ty->type }}" 
                                    {{ request('type') == $ty->type ? 'selected' : ''   }} >
                            {{ $ty->type }} 
                            </option>
                            @endforeach                                     
                    </select>
                </div>
                <div class="col">
                    <label>เกียร์</label>
                    <select name="gear" id="gear" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>ระบบเกียร์ทั้งหมด</option> 
                        @foreach($gear_array as $ge)
                        <option 
                                value="{{ $ge->gear }}" 
                                {{ request('gear') == $ge->gear ? 'selected' : ''   }} >
                        {{ $ge->gear }} 
                        </option>
                        @endforeach                                     
                    </select>
                </div>
                <div class="col">
                    <label>ปี</label>
                    <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>ทุกปี</option> 
                        @foreach($year_array as $ye)
                        <option 
                                value="{{ $ye->year }}" 
                                {{ request('year') == $ye->year ? 'selected' : ''   }} >
                        {{ $ye->year }} 
                        </option>
                        @endforeach                                     
                    </select>
                </div>
                <div class="col">
                    <label>สี</label>
                    <select name="color" id="color" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>ทุกสี</option> 
                        @foreach($color_array  as $co)
                        <option 
                                value="{{ $co->color  }}" 
                                {{ request('color ') == $co->color  ? 'selected' : ''   }} >
                        {{ $co->color  }} 
                        </option>
                        @endforeach                                     
                    </select>
                </div>
                <div class="col">
                    <label>เชื้อเพลิง</label>
                    <select name="fuel" id="fuel" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>ทุกเชื้อเพลิง</option> 
                        @foreach($fuel_array as $pe)
                        <option 
                                value="{{ $pe->fuel  }}" 
                                {{ request('fuel ') == $pe->fuel  ? 'selected' : ''   }} >
                        {{ $pe->fuel  }} 
                        </option>
                        @endforeach                                  
                    </select>
                </div>
                <div class="col">
                    <label>สถานที่</label>
                    <select name="location" id="location" class="form-control" onchange="this.form.submit()">
                        <option value="" selected >ทุกสถานที่</option> 
                        <!-- @foreach($location_array as $lo)
                        <option 
                        value="{{ $lo->province }}" 
                        {{ request('province') == $ye->province ? 'selected' : ''   }} >
                        {{ $lo->province }} 
                        </option>
                        @endforeach                                      -->
                    </select>
                </div>
                <div class="col">
                    <label>เลขไมค์</label>
                    <!-- <input class="form-control" type="text" name=" milemin "  id="distance" placeholder="น้อยสุด (km.)">
                    <input class="form-control" type="text" name=" milemax " id="distance" placeholder="มากสุด (km.)"> -->
                    <button type="submit" class="btn btn-danger btn-lg ">  ค้นหา </button>
                </div>
                <div class="col">
                    <label>ราคา</label>
                    <!-- <input class="form-control" type="text" name=" pricemin "  id="price" placeholder="น้อยสุด">
                    <input class="form-control" type="text" name="pricemax " id="price" placeholder="มากสุด"> -->
                    <button type="submit" class="btn btn-danger btn-lg ">  ค้นหา </button>
                </div>
            </form>
        </div>
    </div>

                    <!-- ///////      เนื้อหา       ///// -->

        <div class="col-3-of-4">
            <div class="product-layout">
                @foreach($data as $item)
                <div class="product">
                    <div class="img-container">
                                @if($item->image == "" )
                                    <img src="{{ asset('/img/more/img_more.jpg') }}" alt="" >
                                @else
                                    <img src="{{ url('/image/'.$item->id ) }}" alt="" > 
                                @endif
                            <div class="addCart">
                                <i class="far fa-heart"></i>
                            </div>
                        
                    </div>
                    <div class="bottom">
                            <a href="{{ url('/car/'.$item->id ) }}">
                                <h2>{{ $item->brand  }}  {{ $item->model  }} {{ $item->submodel  }}</h2>
                            </a>     
                    </div>
                    <div class="lest" >
                            <a >
                                <h5>
                                <i class="far fa-calendar-alt"></i>  {{ $item->year  }} &nbsp;&nbsp;&nbsp;   
                                <i class="fas fa-tachometer-alt"></i>   {{ $item->distance  }} k.m. <br>
                                <i class="fas fa-tachometer-alt"></i>   {{ $item->fuel  }}  <br>
                                <i class="fas fa-map-marker"></i>   {{ $item->location  }}
                                </h5>
                            </a>
                            <div class="bottom">
                        <div class="price">
                            <span>{{ number_format($item->price)}}   บาท </span>
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

<!-- <script>
  import { mdbSelect } from 'mdbvue';

  export default {
    name:'mdbSearchEcample',
    components: {
      mdbSelect
    }
  }
</script> -->
@endsection
