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
<div id="dashboard_viinews" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_viinews.dashboard_viinews')
</div>
<hr>
<h3 class="text-dark">ViiMove</h3>
<div id="dashboard_viimove" class="mb-3 bg_section" >
    @include ('dashboard.dashboard_viimove.dashboard_viimove')
</div>
<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>
<h3 class="text-dark">การประชาสัมพันธ์ข่าวสาร</h3>
<div class="mb-3 bg_section" >
    @include ('dashboard.dashboard_boardcast.dashboard_boardcast')
</div>
@endsection
