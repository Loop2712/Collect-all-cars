@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Maintain_noti {{ $maintain_noti->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/maintain_notis') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/maintain_notis/' . $maintain_noti->id . '/edit') }}" title="Edit Maintain_noti"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('maintain_notis' . '/' . $maintain_noti->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Maintain_noti" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $maintain_noti->id }}</td>
                                    </tr>
                                    <tr><th> Name User </th><td> {{ $maintain_noti->name_user }} </td></tr><tr><th> Maintain Notified User Id </th><td> {{ $maintain_noti->maintain_notified_user_id }} </td></tr><tr><th> User Id </th><td> {{ $maintain_noti->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
