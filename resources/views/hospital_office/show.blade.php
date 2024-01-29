@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Hospital_office {{ $hospital_office->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/hospital_office') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/hospital_office/' . $hospital_office->id . '/edit') }}" title="Edit Hospital_office"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('hospital_office' . '/' . $hospital_office->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Hospital_office" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $hospital_office->id }}</td>
                                    </tr>
                                    <tr><th> Code 9 Digit </th><td> {{ $hospital_office->code_9_digit }} </td></tr><tr><th> Code 5 Digit </th><td> {{ $hospital_office->code_5_digit }} </td></tr><tr><th> Code 11 Digit </th><td> {{ $hospital_office->code_11_digit }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
