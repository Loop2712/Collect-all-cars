@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Agora_chat {{ $agora_chat->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/agora_chat') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/agora_chat/' . $agora_chat->id . '/edit') }}" title="Edit Agora_chat"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('agora_chat' . '/' . $agora_chat->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Agora_chat" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $agora_chat->id }}</td>
                                    </tr>
                                    <tr><th> Room For </th><td> {{ $agora_chat->room_for }} </td></tr><tr><th> Time Start </th><td> {{ $agora_chat->time_start }} </td></tr><tr><th> Member In Room </th><td> {{ $agora_chat->member_in_room }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
