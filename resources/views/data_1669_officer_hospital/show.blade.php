@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Data_1669_officer_hospital {{ $data_1669_officer_hospital->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/data_1669_officer_hospital') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/data_1669_officer_hospital/' . $data_1669_officer_hospital->id . '/edit') }}" title="Edit Data_1669_officer_hospital"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('data_1669_officer_hospital' . '/' . $data_1669_officer_hospital->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Data_1669_officer_hospital" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $data_1669_officer_hospital->id }}</td>
                                    </tr>
                                    <tr><th> Name Officer Hospital </th><td> {{ $data_1669_officer_hospital->name_officer_hospital }} </td></tr><tr><th> User Id </th><td> {{ $data_1669_officer_hospital->user_id }} </td></tr><tr><th> Hospital Offices Id </th><td> {{ $data_1669_officer_hospital->hospital_offices_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
