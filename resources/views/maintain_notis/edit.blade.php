@extends('layouts.viicheck')

@section('content')
                        <form method="POST" action="{{ url('/maintain_notis/' . $maintain_noti->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('maintain_notis.form', ['formMode' => 'edit'])

                        </form>
@endsection
