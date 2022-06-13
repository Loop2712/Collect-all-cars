@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Mylog_condo {{ $mylog_condo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/mylog_condo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/mylog_condo/' . $mylog_condo->id . '/edit') }}" title="Edit Mylog_condo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('mylog_condo' . '/' . $mylog_condo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Mylog_condo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $mylog_condo->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $mylog_condo->title }} </td></tr><tr><th> Content </th><td> {{ $mylog_condo->content }} </td></tr><tr><th> Condo Id </th><td> {{ $mylog_condo->condo_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
