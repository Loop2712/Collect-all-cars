@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="btn_register" class="row">
                    <div class="col-12">
                        <div class="main-shadow main-radius float-right " style="padding-bottom: 5px">
                            <a class="btn btn-danger btn_register" href="{{ url('/guest/create') }}" role="button">ลงทะเบียนรถใหม่ <span >คลิก</span></a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">ใส่ข้อมูลรถที่ต้องการติดต่อ</div>
                    <div class="card-body">
                        <a href="{{ url('/guest') }}" title="Back"><button class="d-none btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/guest') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('guest.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START"); 
        setTimeout(function(){ 
          document.getElementById("btn_register").classList.add('d-none');; 
        }, 6500);
    });
</script>
@endsection
