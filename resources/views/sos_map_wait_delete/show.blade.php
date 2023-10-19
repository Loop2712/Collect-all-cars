@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_map_wait_delete {{ $sos_map_wait_delete->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_map_wait_delete') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_map_wait_delete/' . $sos_map_wait_delete->id . '/edit') }}" title="Edit Sos_map_wait_delete"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_map_wait_delete' . '/' . $sos_map_wait_delete->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_map_wait_delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_map_wait_delete->id }}</td>
                                    </tr>
                                    <tr><th> Sos Map Id </th><td> {{ $sos_map_wait_delete->sos_map_id }} </td></tr><tr><th> Officer Id </th><td> {{ $sos_map_wait_delete->officer_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
