@extends('layouts.main')

@section('content')
    <!-- <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                      
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist as $item)
                                    <tr>
                                       
                                        <td><img src="{{ url('/image/'.$item->product_id  ) }}" alt="" width="100" > </td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/car/' . $item->product_id) }}" title="View Wishlist"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <form method="POST" action="{{ url('/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Wishlist" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

    
<div class="container mt-2 mb-2">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h4><b>รายการโปรด</b></h4>
                <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Favorites</span></div>
            </div>

            @foreach($wishlist as $item)
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="{{ url('/image/'.$item->product_id  ) }}" width="100"></div>
                <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{ $item->brand }} {{ $item->model }} {{ $item->submodel }}  </span>
                    <div class="d-flex flex-row product-desc">
                        <div class="size mr-1"><span class="text-grey">Year:</span><span class="font-weight-bold">&nbsp;{{ $item->year }}</span></div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center qty">
                    <h5 class="text-grey mt-1 mr-1 ml-1">{{ $item->location }}</h5>
                </div>
                <div>
                    <h5 class="text-grey">{{ $item->price }} บาท</h5>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ url('/car/' . $item->product_id) }}" title="View Wishlist"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>&nbsp;</a>
                    <form id="my_form" method="POST" action="{{ url('/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }} {{ csrf_field() }}
                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="btn btn-danger btn-sm" title="Delete Wishlist" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </form>
                    
                </div>
            </div>
            @endforeach
                                
            
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div> -->
            <!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div> -->
        </div>
    </div>
</div>
@endsection
