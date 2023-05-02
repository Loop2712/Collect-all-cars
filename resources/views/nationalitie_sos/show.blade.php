@extends('layouts.admin')

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nationalitie_so {{ $nationalitie_so->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/nationalitie_sos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/nationalitie_sos/' . $nationalitie_so->id . '/edit') }}" title="Edit Nationalitie_so"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('nationalitie_sos' . '/' . $nationalitie_so->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Nationalitie_so" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $nationalitie_so->id }}</td>
                                    </tr>
                                    <tr><th> Lat </th><td> {{ $nationalitie_so->lat }} </td></tr><tr><th> Lng </th><td> {{ $nationalitie_so->lng }} </td></tr><tr><th> Name User </th><td> {{ $nationalitie_so->name_user }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
