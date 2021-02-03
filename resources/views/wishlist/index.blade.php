@extends('layouts.main')

@section('content')
    <div class="container">
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
    </div>
@endsection
