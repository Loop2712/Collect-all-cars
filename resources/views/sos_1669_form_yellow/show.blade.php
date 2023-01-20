@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sos_1669_form_yellow {{ $sos_1669_form_yellow->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_1669_form_yellow') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_1669_form_yellow/' . $sos_1669_form_yellow->id . '/edit') }}" title="Edit Sos_1669_form_yellow"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_1669_form_yellow' . '/' . $sos_1669_form_yellow->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_1669_form_yellow" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sos_1669_form_yellow->id }}</td>
                                    </tr>
                                    <tr><th> Be Notified </th><td> {{ $sos_1669_form_yellow->be_notified }} </td></tr><tr><th> Name User </th><td> {{ $sos_1669_form_yellow->name_user }} </td></tr><tr><th> Phone User </th><td> {{ $sos_1669_form_yellow->phone_user }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
