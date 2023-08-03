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

    <button id="pdfButton" class="btn btn-success mb-4">PRINT PDF</button>

    <div id="generatePdf">
        <h3 id="command_center_info" class="text-dark" style="font-weight: bold;">ข้อมูลเจ้าหน้าที่</h3>
        <div class="mb-3 bg_section1">
            @include ('dashboard_1669.dashboard_1669_officer.command_center_info_index')
        </div>

        <div id="operating_unit_info" class="mb-3 bg_section1">
            @include ('dashboard_1669.dashboard_1669_officer.operating_unit_info_index')
        </div>

        <!-- เพิ่มระยะห่าง -->
        <div id="dashboard_boardcast" style="margin: 70px 0 70px 0;"></div>



        <h3 id="sos_help" class="text-dark" style="font-weight: bold;">ข้อมูลการขอความช่วยเหลือ</h3>
        <div class="mb-3 bg_section2">
            @include ('dashboard_1669.dashboard_1669_sos.sos_help_index')
        </div>
        <div id="sos_service_area" class="mb-3 bg_section2">
            @include ('dashboard_1669.dashboard_1669_sos.sos_service_area_index')
        </div>
        @if (Auth::user()->id == '1' || Auth::user()->id == '64' || Auth::user()->id == '11003429')
            <div id="video_call" class="mb-3 bg_section">
                @include ('dashboard_1669.dashboard_1669_sos.video_call_index')
            </div>
        @endif
        <hr>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

    <script>
        "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"
    </script>
    <script>
        "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"
    </script>

    <script>
        let btn = document.getElementById('pdfButton');
        let page = document.getElementById('generatePdf');

        btn.addEventListener('click', function() {
            html2PDF(page, {
                jsPDF: {
                    format: 'a4',
                    // orientation: 'landscape' // Add this line to set the orientation to landscape
                },
                imageType: 'image/jpeg',
                output: './pdf/generate.pdf'
            });
        });
    </script>

@endsection
