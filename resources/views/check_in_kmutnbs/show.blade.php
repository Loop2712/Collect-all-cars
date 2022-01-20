@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Check_in_kmutnb {{ $check_in_kmutnb->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/check_in_kmutnbs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/check_in_kmutnbs/' . $check_in_kmutnb->id . '/edit') }}" title="Edit Check_in_kmutnb"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('check_in_kmutnbs' . '/' . $check_in_kmutnb->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in_kmutnb" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $check_in_kmutnb->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $check_in_kmutnb->user_id }} </td></tr><tr><th> Time In </th><td> {{ $check_in_kmutnb->time_in }} </td></tr><tr><th> Time Out </th><td> {{ $check_in_kmutnb->time_out }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
