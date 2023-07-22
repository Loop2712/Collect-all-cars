@extends('layouts.viicheck')

@section('content')
<style>
    *:not(i){
        font-family: 'Kanit', sans-serif !important;
    }
</style>
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <!-- @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Problem_report</div>
                    <div class="card-body">
                        <a href="{{ url('/problem_report') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif -->

                        <form method="POST" action="{{ url('/problem_report') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('problem_report.form', ['formMode' => 'create'])

                        </form>
<!-- 
                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection
