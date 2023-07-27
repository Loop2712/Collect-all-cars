@extends('layouts.partners.theme_partner_new')

@section('content')
 <button id="pdfButton" class="btn btn-success mb-4">PRINT PDF</button>

<div id="generatePdf">
    <h3 class="text-dark" style="font-weight: bold;">ข้อมูลเจ้าหน้าที่</h3>
    <div id="command_center_info" class="mb-3 bg_section" >
        @include ('dashboard_1669.dashboard_1669_officer.command_center_info_index')
    </div>

    <div id="operating_unit_info" class="mb-3 bg_section" >
        @include ('dashboard_1669.dashboard_1669_officer.operating_unit_info_index')
    </div>

    <div id="dashboard_boardcast" style="margin: 70px 0 70px 0;">
        <hr>
    </div>

    <h3 class="text-dark" style="font-weight: bold;">ข้อมูลการขอความช่วยเหลือ</h3>
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
</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}

<script src= "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

{{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script> --}}

<script>"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.0/html2canvas.min.js"</script>
<script>"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.0/html2canvas.js"</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
        let btn = document.getElementById('pdfButton');
        let page = document.getElementById('generatePdf');

        btn.addEventListener('click', function(){
            html2PDF(page, {
                html2canvas: {
                    scrollX: 0,
                    scrollY: -window.scrollY,
                },
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
