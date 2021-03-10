
@extends('layouts.main')
@section('add')
<style>
    .product-card {
  position: relative;
  max-width: 380px;
  padding-top: 12px;
  padding-bottom: 43px;
  transition: all 0.35s;
  border: 1px solid #e7e7e7;
  background:#fff;
}
.product-card .product-head {
  padding: 0 15px 8px;
}
.product-card .product-head .badge {
  margin: 0;
}
.product-card .product-thumb {
  display: block;
}
.product-card .product-thumb > img {
  display: block;
  width: 100%;
}
.product-card .product-card-body {
  padding: 0 20px;
  text-align: center;
}
.product-card .product-meta {
  display: block;
  padding: 12px 0 2px;
  transition: color 0.25s;
  color: rgba(140, 140, 140, .75);
  font-size: 12px;
  font-weight: 600;
  text-decoration: none;
}
.product-card .product-meta:hover {
  color: #8c8c8c;
}
.product-card .product-title {
  margin-bottom: 8px;
  font-size: 16px;
  font-weight: bold;
}
.product-card .product-title > a {
  transition: color 0.3s;
  color: #343b43;
  text-decoration: none;
}
.product-card .product-title > a:hover {
  color: #e43232;
}
.product-card .product-price {
  display: block;
  color: #404040;
  font-family: 'Montserrat', sans-serif;
  font-weight: normal;
}
.product-card .product-price > del {
  margin-right: 6px;
  color: rgba(140, 140, 140, .75);
}
.product-card .product-buttons-wrap {
  position: absolute;
  bottom: -20px;
  left: 0;
  width: 100%;
}
.product-card .product-buttons {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.product-card .product-button {
  display: table-cell;
  position: relative;
  width: 50px;
  height: 40px;
  border-right: 1px solid rgba(231, 231, 231, .6);
}
.product-card .product-button:last-child {
  border-right: 0;
}
.product-card .product-button > a {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: all 0.3s;
  color: #404040;
  font-size: 16px;
  line-height: 40px;
  text-align: center;
  text-decoration: none;
}
.product-card .product-button > a:hover {
  background-color: #ac32e4;
  color: #fff;
}
.product-card:hover {
  border-color: transparent;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}


.product-meta {
  padding-bottom: 10px;
}
.product-meta > a, .product-meta > i {
  display: inline-block;
  margin-right: 5px;
  color: rgba(140, 140, 140, .75);
  vertical-align: middle;
}
.product-meta > i {
  margin-top: 2px;
}
.product-meta > a {
  transition: color 0.25s;
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
}
.product-meta > a:hover {
  color: #8c8c8c;
}

</style>
@endsection
@section('content')
    <div class="container">
    <br><br>
        <div class="row">
        @include('layouts.sidebar')

            <div class="col-md-9 order-lg-1 order-2">
                <div class="card">
                    <div class="card-header">Sell</div>
                    <div class="card-body">
                        <a href="{{ url('/motercycles/create') }}" class="btn btn-success btn-sm" title="Add New Sell">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มรถเลย!
                        </a>

                        <!-- ระบบ ค้นหา -->
                        <!-- <form method="GET" action="{{ url('/sell') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->

                        <br/>
                        <br/>

                        <div class="container">
                            <div class="row">
                                @foreach($motercycles as $item)
                                    <div class="col-lg-4  mb-30">
                                        <div class="product-card mx-auto mb-3">
                                            <a class="product-thumb" href="{{ url('/motercycle/'.$item->id ) }}">
                                            <img src="{{ url('storage/'.$item->img )}}" alt="Product"></a>
                                            <div class="product-card-body"><a class="product-meta" href="#"> {{ $item->id }}</a>
                                                <h5 class="product-title"><a href="{{ url('/motercycle/'.$item->id ) }}">{{ $item->brand }} {{ $item->model }} </a></h5><span class="product-price">
                                                
                                                <a href="{{ url('/motercycle/' . $item->id) }}" title="View Motercycle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/motercycles/' . $item->id . '/edit') }}" title="Edit Motercycle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/motercycles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Motercycle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
