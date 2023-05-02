@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nationalitie_officer {{ $nationalitie_officer->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/nationalitie_officers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/nationalitie_officers/' . $nationalitie_officer->id . '/edit') }}" title="Edit Nationalitie_officer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('nationalitie_officers' . '/' . $nationalitie_officer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Nationalitie_officer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $nationalitie_officer->id }}</td>
                                    </tr>
                                    <tr><th> Name Officer </th><td> {{ $nationalitie_officer->name_officer }} </td></tr><tr><th> Phone Officer </th><td> {{ $nationalitie_officer->phone_officer }} </td></tr><tr><th> Photo Officer </th><td> {{ $nationalitie_officer->photo_officer }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
