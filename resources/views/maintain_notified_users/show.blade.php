@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Maintain_notified_user {{ $maintain_notified_user->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/maintain_notified_users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/maintain_notified_users/' . $maintain_notified_user->id . '/edit') }}" title="Edit Maintain_notified_user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('maintain_notified_users' . '/' . $maintain_notified_user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Maintain_notified_user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $maintain_notified_user->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $maintain_notified_user->name }} </td></tr><tr><th> Department </th><td> {{ $maintain_notified_user->department }} </td></tr><tr><th> Position </th><td> {{ $maintain_notified_user->position }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
