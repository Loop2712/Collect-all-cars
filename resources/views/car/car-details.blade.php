@extends('layouts.main')
@section('content') 


    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                                @if($data->image == "" )
                                        <img class="car-big-img" src="{{ asset('/img/more/img_more.jpg') }}" alt="" style ="width: 100%;">
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60882ef938080f44"></script>

                                    @else
                                        <img class="car-big-img" src="{{ url('/image/'.$data->id ) }}" alt="" style ="width: 100%;">
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60882ef938080f44"></script>
 
                                    @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                        <form id="my_form" method="POST" action="{{ url('/wishlist') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <ul>
                                <li>Brand <span>{{ $data->brand  }}</span></li>
                                <li>Model <span>{{ $data->model  }}  {{ $data->submodel  }}</span></li>
                            </ul>
                            <ul>
                                <li>จำนวนที่นั่ง <span>{{ $data->seats  }}</span></li>
                                <li>ระบบเกียร์ <span>{{ $data->gear  }}</span></li>
                                <li>ระยะทาง <span>{{ $data->distance  }} km</span></li>
                            </ul>
                            <div>
                            <ul>
                                <li>น้ำมัน <span>{{ $data->fuel  }}</span></li>
                                <li >สถานที่ <span style="text-align: right;">{{ $data->location  }}</span></li>
                            </ul>
                           </div>
                            <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $data->id}}" >
                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >
                            <input class="d-none" name="car_type" type="text" id="car_type" value="car" >
                        </div>
                        <div class="car__details__sidebar__payment">
                            <ul>
                            @if ( $data->price == 'ติดต่อผู้ขาย')
                                    <li>Price <span style="color:#db2d2e">{{ $data->price}}</span> </li>
                                    @else
                                    <li>Price <span style="color:#db2d2e">{{ number_format(intval($data->price))}} บาท</span> </li>
                                        
                                    @endif
                                
                            </ul>

                            <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="primary-btn sidebar-btn"><i class="fa fa-heart"></i> เพิ่มเป็นรายการโปรด</a>
                            <a target="bank" href="{{ $data->link}}" class="primary-btn"><i class="fa fa-credit-card"></i> สนใจติดต่อ</a>

                        </div>
                            
                        </form>
                    </div>
                </div>

                <table class="fl-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ยี่ห้อ/Brand</th>
                                        <th>รุ่น/Model</th>
                                        <th>รุ่นย่อย/Submodel</th>
                                        <th>ปี/Year</th>
                                        <th>ราคา/Price</th>
                                        <th class="d-none">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($middle_price as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->brand }}</td><td>{{ $item->model }}</td><td>{{ $item->submodel }}</td><td>{{ $item->price }} บาท</td>
                                        <td class="d-none">
                                            <a href="{{ url('/middle_price_car/' . $item->id) }}" title="View Middle_price_car"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/middle_price_car/' . $item->id . '/edit') }}" title="Edit Middle_price_car"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/middle_price_car' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Middle_price_car" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
            </div>
        </div>
    </section>
    @endsection

    <style>
{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}


/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
    
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
    font-size: 18px;
    
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 18px;
}

.fl-table thead th {
    color: #ffffff;
    background: #324960;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
</style>