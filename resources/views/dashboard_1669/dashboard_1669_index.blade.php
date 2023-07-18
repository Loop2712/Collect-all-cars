@extends('layouts.partners.theme_partner_new')

@section('content')

<h3 class="text-dark">ข้อมูลเจ้าหน้าที่</h3>
<div id="command_center_info" class="mb-3 bg_section" >
    @include ('dashboard_1669.dashboard_1669_officer.command_center_info_index')
</div>

<div id="operating_unit_info" class="mb-3 bg_section" >
    @include ('dashboard_1669.dashboard_1669_officer.operating_unit_info_index')
</div>

<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>

<h3 class="text-dark">ข้อมูลการขอความช่วยเหลือ</h3>
<div id="sos_help" class="mb-3 bg_section" >
    @include ('dashboard_1669.dashboard_1669_sos.sos_help_index')
</div>
<div id="sos_service_area" class="mb-3 bg_section" >
    @include ('dashboard_1669.dashboard_1669_sos.sos_service_area_index')
</div>
<div id="video_call" class="mb-3 bg_section" >
    @include ('dashboard_1669.dashboard_1669_sos.video_call_index')
</div>
<hr>

@endsection
