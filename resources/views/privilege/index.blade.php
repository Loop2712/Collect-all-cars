@extends('layouts.viicheck')

@section('content')

<style>
    @media (max-width: 435px){
        .img-cover{
           max-width: 300px;           
           min-width: 300px;
           border-radius: 10px;
           aspect-ratio: 16/9;
        }
        .logo_cover{
            width: 300px;
        }
    }
    @media (min-width: 435px){
        .img-cover{
           max-width: 400px;           
           min-width: 400px;
           border-radius: 10px;
           aspect-ratio: 16/9;
        }
        .logo_cover{
            width: 400px;
        }
    }
      .owl-carousel-partner .item a{
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #000;
        object-fit: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .owl-carousel-partner .item a img{
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #000;
        object-fit: contain;
    }
    .logo_cover{
        position: absolute;
        top: 25px;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: start;
        padding-left: 10px;
        padding-top: 10px;
    }
    .logo_cover img{
        height: 40px;
        object-fit: contain;
    }
    .card {
        border: none !important;
    }  
</style>
<div class="container " style="padding-top: 150px;">
    <div class="row">

        <div class="col-12">
            <div class="card border-none">
                <div>
                    <h4>Partner</h4>
                    <div class="owl-carousel owl-theme owl-carousel-partner">
                        <div class="item">
                            <a href="{{url('privilege_partner')}}" class="text-white">ทั้งหมด</a>
                        </div>
                        @foreach($privilege_partner as $item)
                        <div class="item">
                            <a href="{{url('privilege_partner?partner_id=')}}{{$item->partner->id}}">
                                @if(!empty($item->partner->logo))
                                <img src="{{ url('storage')}}/{{ $item->partner->logo }}" alt="">
                                @else
                                <p style="color:#fff;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 100%;padding: 4px;font-weight: bolder;text-align: center;margin: 0;">
                                    {{ $item->partner->name }}
                                </p>
                                @endif
                                
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>


                <div class="mt-5">
                    <h4>ดีลยอดฮิต</h4>
                    <div class="owl-carousel owl-theme owl-carousel-hot">
                        @foreach($privilege_hot as $item)
                            <div class="item">
                                <div style="position: relative;">
                                    <a href="{{ url('/privilege/' . $item->id) }}">
                                        <img src="{{ url('storage')}}/{{ $item->img_cover }}" class="img-cover" alt="">
                                        
                                        <div class="logo_cover">
                                            <div>
                                                <img  src="{{ url('storage')}}/{{ $item->partner->logo }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- {{$item->user_click_redeem}} -->
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5">
                    <h4>ใกล้หมดอายุ</h4>
                    <div class="owl-carousel owl-theme owl-carousel-hot">
                    @foreach($privilege_seven_day_expire as $item)
                        <div class="item">
                                <div style="position: relative;">
                                    <a href="{{ url('/privilege/' . $item->id) }}">
                                        <img src="{{ url('storage')}}/{{ $item->img_cover }}" class="img-cover" alt="">
                                        
                                        <div class="logo_cover">
                                            <div>
                                                <img  src="{{ url('storage')}}/{{ $item->partner->logo }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- {{$item->user_click_redeem}} -->
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                    <div class="card-header">Privilege</div>
                    <div class="card-body">
                        <a href="{{ url('/privilege/create') }}" class="btn btn-success btn-sm" title="Add New Privilege">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/privilege') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Partner Id</th><th>Titel</th><th>Detail</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($privilege as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->partner_id }}</td><td>{{ $item->titel }}</td><td>{{ $item->detail }}</td>
                                        <td>
                                            <a href="{{ url('/privilege/' . $item->id) }}" title="View Privilege"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/privilege/' . $item->id . '/edit') }}" title="Edit Privilege"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/privilege' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Privilege" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $privilege->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div> -->
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(function() {
        // Owl Carousel
        var owl = $(".owl-carousel-partner");
        owl.owlCarousel({
            autoWidth:true,
            margin:10,
            loop: false,
            nav: false,
            dots:false
        });
    });

    $(function() {
        // Owl Carousel
        var owl = $(".owl-carousel-hot");
        owl.owlCarousel({
            // items: 1,
            autoWidth:true,
            margin: 10,
            loop: false,
            nav: false,
            dots:false
        });
    });
</script>
@endsection