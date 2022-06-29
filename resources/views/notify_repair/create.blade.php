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
                            <div class="col-12">
                                <h4 class="font-weight-bold mb-0">
                                    <b>การแจ้งซ่อมบำรุง</b>
                                </h4>
                            </div>
                            <br><br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="margin-top:-25px;">
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
