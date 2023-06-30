@extends('layouts.partners.theme_partner_new')

@section('content')
    <div id="dashboard_boardcast" class="mb-3" >
        @include ('dashboard.dashboard_boardcast.dashboard_boardcast')
    </div>
    <hr>
    <div id="dashboard_user" class="mb-3" >
        @include ('dashboard.dashboard_user.dashboard_user')
    </div>
    <hr>
    <h3>ViiCare</h3>
    <div id="dashboard_viicare" class="mb-3" >
        @include ('dashboard.dashboard_viicare.dashboard_viicare')
    </div>
    <hr>
    <h3>ViiMove</h3>
    <div id="dashboard_viimove" class="mb-3" >
        @include ('dashboard.dashboard_viimove.dashboard_viimove')
    </div>
    <hr>
    <h3>ViiSOS</h3>
    <div id="dashboard_viisos" class="mb-3" >
        @include ('dashboard.dashboard_viisos.dashboard_viisos')
    </div>
@endsection
