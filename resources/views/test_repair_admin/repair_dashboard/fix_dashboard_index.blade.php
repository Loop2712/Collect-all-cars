@extends('layouts.partners.theme_partner_new')

@section('content')
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
    <div class="col-12 col-md-12 col-lg-12 mb-4">
        <a href="#sos_help_pdf" class="btn btn-primary float-end me-1" onclick="SaveImageGlobal('generatePdf')">บันทึกภาพทั้งหมด</a>
        <a class="btn btn-danger float-end me-1" onclick="SaveImageGlobal('section1')">บันทึกภาพ section 1</a>
        <a class="btn btn-success float-end me-1" onclick="SaveImageGlobal('section2')">บันทึกภาพ section 2</a>
    </div>

    <div id="generatePdf" class="container-fluid p-2">

        <div id="section1" class="my-3">
            @include ('test_repair_admin.repair_dashboard.fix_dashboard_sec1')
        </div>
        <!-- เพิ่มระยะห่าง -->
        <div id="dashboard_fix" style="margin: 70px 0 70px 0;"></div>

        <div id="section2" class="my-3 ">
            @include ('test_repair_admin.repair_dashboard.fix_dashboard_sec2')
        </div>

        {{-- <div id="sos_help_pdf">
            <h3 id="sos_help" class="text-dark mb-0" style="font-weight: bold;">ข้อมูลการขอความช่วยเหลือ</h3>
            <hr>
            <div class="mb-3">
                @include ('dashboard_1669.dashboard_1669_sos.sos_help_index')
            </div>
            <div id="sos_service_area" class="mb-3">
                @include ('dashboard_1669.dashboard_1669_sos.sos_service_area_index')
            </div>
        </div>

        @if (Auth::user()->id == '1' || Auth::user()->id == '64' || Auth::user()->id == '11003429')
            <div id="video_call" class="mb-3 bg_section">
                @include ('dashboard_1669.dashboard_1669_sos.video_call_index')
            </div>
        @endif --}}
        <hr>
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
