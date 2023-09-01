@extends('layouts.partners.theme_partner_new')
    <style>
        #all_dashboard{
            text-align: justify;
            font-family: 'Mitr', sans-serif !important;
            /* font-family: 'Taviraj', serif; */
        }

        table{
            font-family: 'Taviraj', serif !important;
            /* font-family: 'Prompt', sans-serif !important; */
            /* font-family: 'Mitr', sans-serif !important; */
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

<div class="row row-cols-1 row-cols-lg-1 m-2">
    <div class="col">
        <a class="btn btn-primary float-end m-1" onclick="SaveImageGlobal('all_dashboard')">บันทึกภาพทั้งหมด</a>
        <a class="btn btn-success float-end m-1" onclick="SaveImageGlobal('dashboard_boardcast')">บันทึกภาพการประชาสัมพันธ์ข่าวสาร</a>
        <a class="btn btn-info float-end m-1" onclick="SaveImageGlobal('dashboard_viimove')">บันทึกภาพ ViiMove</a>
        <a class="btn btn-danger float-end m-1" onclick="SaveImageGlobal('dashboard_viinews')">บันทึกภาพ ViiNews</a>
        <a class="btn btn-warning float-end m-1" onclick="SaveImageGlobal('dashboard_viisos')">บันทึกภาพ ViiSOS</a>
        <a class="btn btn-primary float-end m-1" onclick="SaveImageGlobal('dashboard_user')">บันทึกภาพ User</a>
    </div>
</div>

<div id="all_dashboard" class="p-2">
    <h3 class="text-dark font-weight-bold">User</h3>
    <div id="dashboard_user" class="mb-3 bg_section1" >
        @include ('dashboard.dashboard_user.dashboard_user')
    </div>
    <div style="margin: 70px 0 70px 0;">
        <hr>
    </div>

    <h3 class="text-dark font-weight-bold">ViiSOS</h3>
    <div id="dashboard_viisos" class="mb-3 bg_section1" >
        @include ('dashboard.dashboard_viisos.dashboard_viisos')
    </div>
    <div style="margin: 70px 0 70px 0;">
        <hr>
    </div>

    <h3 class="text-dark font-weight-bold">ViiNews</h3>
    <div id="dashboard_viinews" class="mb-3 bg_section1" >
        @include ('dashboard.dashboard_viinews.dashboard_viinews')
    </div>
    <div style="margin: 70px 0 70px 0;">
        <hr>
    </div>

    <h3 class="text-dark font-weight-bold">ViiMove</h3>
    <div id="dashboard_viimove" class="mb-3 bg_section1" >

    </div>
    <div style="margin: 70px 0 70px 0;">
        <hr>
    </div>

    <h3 class="text-dark font-weight-bold">การประชาสัมพันธ์ข่าวสาร</h3>
    <div id="dashboard_boardcast" class="mb-3 bg_section1" >

    </div>
</div>

    <script src="https://unpkg.com/modern-screenshot"></script>

    <script>
        function SaveImageGlobal(id_div) {
            setTimeout(() => {
                const targetElement = document.querySelector('#'+id_div);
                targetElement.style.backgroundColor = 'white';

                modernScreenshot.domToPng(targetElement).then(dataUrl => {
                    const link = document.createElement('a')
                    link.download = 'screenshot.png'
                    link.href = dataUrl
                    link.click()
                })
            }, 500);
        }
    </script>

@endsection
