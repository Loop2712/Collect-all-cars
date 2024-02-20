@extends('layouts.partners.theme_hospital')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h3 class="card-header">เคสทั้งหมด</h3>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Date / Time</th>
                                        <th>Area</th>
                                        <th>sos_help_center_id</th>
                                        <th>form_yellow_id</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sos_1669_to_hospital as $item)
                                    <tr>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->area }}</td>
                                        <td>{{ $item->sos_help_center_id }}</td>
                                        <td>{{ $item->form_yellow_id }}</td>
                                        <td>
                                            <a href="javaScript:;" class="btn btn-sm btn-success radius-30">
                                                {{ $item->status }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
