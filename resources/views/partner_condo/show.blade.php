@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Partner_condo {{ $partner_condo->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/partner_condo') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/partner_condo/' . $partner_condo->id . '/edit') }}" title="Edit Partner_condo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('partner_condo' . '/' . $partner_condo->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Partner_condo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $partner_condo->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $partner_condo->name }} </td></tr><tr><th> Name Line Oa </th><td> {{ $partner_condo->name_line_oa }} </td></tr><tr><th> Link Line Oa </th><td> {{ $partner_condo->link_line_oa }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
