@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">DP_tu_student {{ $dp_tu_student->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/d-p_tu_student') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/d-p_tu_student/' . $dp_tu_student->id . '/edit') }}" title="Edit DP_tu_student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('dp_tu_student' . '/' . $dp_tu_student->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete DP_tu_student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $dp_tu_student->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $dp_tu_student->name }} </td></tr><tr><th> Last Name </th><td> {{ $dp_tu_student->last_name }} </td></tr><tr><th> Faculty </th><td> {{ $dp_tu_student->faculty }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
