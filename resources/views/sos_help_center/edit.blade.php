@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row">
                            @include ('sos_help_center.form', ['formMode' => 'edit'])
                        </div>

                        <!-- <form method="POST" action="{{ url('/sos_help_center/' . $sos_help_center->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            
                        </form> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
