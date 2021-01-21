@extends('layouts.main')

@section('content')
<section class="car spad">
        <div class="container">

<form method="POST" action="{{ url('/car') }}">
    {{ method_field('POST') }}
    {{ csrf_field() }}

    @include ('car.form')
</div>
</section>
    
@endsection


