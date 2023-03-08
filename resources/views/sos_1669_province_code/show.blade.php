@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_1669_province_code {{ $sos_1669_province_code->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_1669_province_code') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_1669_province_code/' . $sos_1669_province_code->id . '/edit') }}" title="Edit Sos_1669_province_code"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_1669_province_code' . '/' . $sos_1669_province_code->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_1669_province_code" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_1669_province_code->id }}</td>
                                    </tr>
                                    <tr><th> Area Code </th><td> {{ $sos_1669_province_code->area_code }} </td></tr><tr><th> Province Code </th><td> {{ $sos_1669_province_code->province_code }} </td></tr><tr><th> Province Name </th><td> {{ $sos_1669_province_code->province_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
