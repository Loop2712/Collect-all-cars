@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_partner_area {{ $sos_partner_area->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_partner_areas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_partner_areas/' . $sos_partner_area->id . '/edit') }}" title="Edit Sos_partner_area"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_partner_areas' . '/' . $sos_partner_area->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_partner_area" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_partner_area->id }}</td>
                                    </tr>
                                    <tr><th> Sos Partner Id </th><td> {{ $sos_partner_area->sos_partner_id }} </td></tr><tr><th> Creator </th><td> {{ $sos_partner_area->creator }} </td></tr><tr><th> Name Area </th><td> {{ $sos_partner_area->name_area }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
