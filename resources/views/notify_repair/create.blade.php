@extends('layouts.viicheck')

@section('content')
<br><br><br><br><br>

<div class="row" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent">
                <div class="d-flex align-items-center" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9">
                                <h4 class="font-weight-bold mb-0">
                                    <b>เพิ่มรายการพัสดุ</b>
                                </h4>
                            </div>
                            <div class="col-3">
                                <center>
                                    <div style="margin-top:-12px;">
                                        อาคาร <br>
                                        <b class="text-danger" id="span_building">{{ $building }}</b>
                                    </div>
                                </center>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-12">
                                @foreach($all_building as $item)
                                    @if($building == $item->building)
                                        <a href="{{ url('/parcel/create') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-info text-white notranslate" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @else
                                        <a href="{{ url('/parcel/create') }}?building={{ $item->building }}" type="button" class="btn btn-sm btn-outline-info notranslate" >
                                            &nbsp;&nbsp;{{ $item->building }}&nbsp;&nbsp;
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/notify_repair') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('notify_repair.form', ['formMode' => 'create'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
