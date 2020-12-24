@extends('theme.app')

@section('content')         
                        <div class="card-body">
                            <div class="row" >
                                @foreach($data as $item)
                                    <div class="col-md-6 mb-4 ">
                                        <div class="col aos-init aos-animate" data-aos="fade-up"> 
                                            <a href="{{ $item->link }}" >
                                                <div class="icon"> <img src="{{ url('/image/'.$item->id ) }}" alt="" class="img-fluid card-img-top"> </div>
                                            </a>
                                            <a href="{{ $item->link }}" class="icon-box text-center" data-bg-color="#fff" style="background-color: rgb(255, 255, 255);" data-abc="true">
                                            <div class="content ">
                                            
                                                    <h3 class="title fz-20">{{ $item->brand  }}  {{ $item->model  }}{{ $item->submodel  }}</h3>
                                                
                                                    <table  class="d" >
                                                            <tr>
                                                                <th >
                                                                    <div class="stats mt-2">
                                                                        <div class="d-flex  p-price">
                                                                            <span><p class="link"><i class="fa fa-calendar-alt"></i> </p></span>
                                                                            <span><p >&nbsp; {{ $item->year  }}</p></span>
                                                                        </div>
                                                                        <div class="d-flex  p-price">
                                                <!-- น้ำมันใส่ตรงนี้  -->        <span><p class="link"><i class="fa fa-oil-can"></i></p></span> 
                                                                        <span><p >&nbsp; {{ $item->year  }}</p></span>
                                                                        </div>
                                                                        <div class="d-flex  p-price">
                                                                            <span><p class="link"><i class="fa fa-palette"></i> </p></span>
                                                                            <span><p >&nbsp; {{ $item->color  }}</p></span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th class="text-right">
                                                                    <div class="stats mt-2">
                                                                        <div class="d-flex  p-price">
                                                                            <span><p class="link"><i class="fa fa-tachometer-alt"></i> </p></span>
                                                                            <span><p >&nbsp; {{ $item->distance  }} km </p></span>
                                                                        </div>
                                                                        <div class="d-flex  p-price">
                                                                            <span><p class="link"><i class="fa fa-cogs"></i></p></span> 
                                                                            <span><p >&nbsp; {{ $item->gear  }}</p></span>
                                                                        </div> 
                                                                        <div class="d-flex  p-price">
                                                                            <span><p class="link"><i class="fa fa-map-marker-alt"></i> </p></span>
                                                                            <span><p>&nbsp; {{ $item->location  }}</p></span>
                                                                        </div>                       
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                    </table>
                                                    
                                                </div>
                                                <div class="cards">                                           
                                                    <span ><h5 class="link"><i class="fa fa-tags"></i>&nbsp;{{ number_format($item->price)   }} บาท</h5></span>
                                                </div> 
                                            </a> 
                                            
                                        </div>
                                    </div>
            
                                @endforeach 
                                <div class="pagination-wrapper">
                                    {{ $data->links() }}
                                </div>

                            </div>
                        </div>
                        
               
            

@endsection

