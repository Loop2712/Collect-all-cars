@extends('layouts.partners.theme_partner_new')

@section('content')
<h3 class="text-dark">User</h3>
<div id="dashboard_user" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_user.dashboard_user')
</div>
<hr>
<h3 class="text-dark">ViiSOS</h3>
<div id="dashboard_viisos" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_viisos.dashboard_viisos')
</div>
<hr>
<h3 class="text-dark">ViiNews</h3>
<div id="dashboard_viicare" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_viicare.dashboard_viicare')
</div>
<hr>
<h3 class="text-dark">ViiMove</h3>
<div id="dashboard_viimove" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_viimove.dashboard_viimove')
</div>
<hr>
<h3 class="text-dark">Boardcast</h3>
<div id="dashboard_boardcast" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_boardcast.dashboard_boardcast')
</div>
@endsection
