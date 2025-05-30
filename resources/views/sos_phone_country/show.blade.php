@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_phone_country {{ $sos_phone_country->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_phone_country') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_phone_country/' . $sos_phone_country->id . '/edit') }}" title="Edit Sos_phone_country"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_phone_country' . '/' . $sos_phone_country->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_phone_country" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_phone_country->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $sos_phone_country->name }} </td></tr><tr><th> Phone </th><td> {{ $sos_phone_country->phone }} </td></tr><tr><th> CountryCode </th><td> {{ $sos_phone_country->countryCode }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
