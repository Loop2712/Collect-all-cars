@extends('layouts.partners.theme_partner_new')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sos_help_center {{ $sos_help_center->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sos_help_center') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sos_help_center/' . $sos_help_center->id . '/edit') }}" title="Edit Sos_help_center"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sos_help_center' . '/' . $sos_help_center->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sos_help_center" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $sos_help_center->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Lat </th>
                                        <td> {{ $sos_help_center->lat }} </td>
                                    </tr>
                                    <tr>
                                        <th> Lng </th>
                                        <td> {{ $sos_help_center->lng }} </td>
                                    </tr>
                                    <tr>
                                        <th> Photo Sos </th>
                                        <td> {{ $sos_help_center->photo_sos }} </td>
                                    </tr>
                                    <tr>
                                        <th> สร้างโดย </th>
                                        <td> USER_ID : {{ $sos_help_center->create_by }} </td>
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
