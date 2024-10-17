@extends('layouts.viicheck')

@section('content')


    <form id="form_create_notis" method="POST" action="{{ url('/maintain_notis') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include ('maintain_notis.form', ['formMode' => 'create'])
    </form>

@endsection
