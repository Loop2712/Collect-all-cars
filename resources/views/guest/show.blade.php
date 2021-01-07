@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">Guest {{ $guest->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/guest') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/guest/' . $guest->id . '/edit') }}" title="Edit Guest"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('guest' . '/' . $guest->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Guest" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $guest->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $guest->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $guest->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Masseng </th>
                                        <td> {{ $guest->masseng }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
