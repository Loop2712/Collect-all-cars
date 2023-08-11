@extends('layouts.partners.theme_partner_new')
    <style>
        #generatePdf{
            text-align: justify ,
        }

        .bg_section1{
            /* background-color: rgb(228, 221, 213); */
            background: linear-gradient(to right, rgb(236, 228, 228), rgb(206, 209, 211))!important;
            padding: 0.5rem;
            border-radius: 10px;
        }
        .bg_section2{
            /* background-color: rgb(228, 221, 213); */
            background: linear-gradient(to right, rgb(236, 228, 228), rgb(206, 209, 211))!important;
            padding: 0.5rem;
            border-radius: 10px;
        }

        .fz_header {
            font-size: 18px;
        }
        .fz_body {
            font-size: 16px;
        }
        .font-weight-bold{
            font-weight: bold !important;
        }
    </style>
@section('content')

<h3 class="text-dark">User</h3>
<div id="dashboard_user" class="mb-3 bg_section1" >
    @include ('dashboard.dashboard_user.dashboard_user')
</div>
<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>

<h3 class="text-dark">ViiSOS</h3>
<div id="dashboard_viisos" class="mb-3 bg_section1" >
    @include ('dashboard.dashboard_viisos.dashboard_viisos')
</div>
<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>

<h3 class="text-dark">ViiNews</h3>
<div id="dashboard_viinews" class="mb-3 bg_section1" >
    @include ('dashboard.dashboard_viinews.dashboard_viinews')
</div>
<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>

<h3 class="text-dark">ViiMove</h3>
<div id="dashboard_viimove" class="mb-3 bg_section1" >
    @include ('dashboard.dashboard_viimove.dashboard_viimove')
</div>
<div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
    <hr>
</div>

<h3 class="text-dark">การประชาสัมพันธ์ข่าวสาร</h3>
<div class="mb-3 bg_section1" >
    @include ('dashboard.dashboard_boardcast.dashboard_boardcast')
</div>
@endsection
