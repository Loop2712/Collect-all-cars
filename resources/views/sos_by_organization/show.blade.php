@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_by_organization {{ $sos_by_organization->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_by_organization') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_by_organization/' . $sos_by_organization->id . '/edit') }}" title="Edit Sos_by_organization"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_by_organization' . '/' . $sos_by_organization->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_by_organization" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_by_organization->id }}</td>
                                    </tr>
                                    <tr><th> Name Partner </th><td> {{ $sos_by_organization->name_partner }} </td></tr><tr><th> Partner Id </th><td> {{ $sos_by_organization->partner_id }} </td></tr><tr><th> Name Sub Organization </th><td> {{ $sos_by_organization->name_sub_organization }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
