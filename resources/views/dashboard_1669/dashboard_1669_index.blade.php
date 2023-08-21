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
       *:not(i){
		font-family: 'Kanit', sans-serif !important;
	}#Top5_Area_SOS{
        min-height: 00px !important;
    }.list-group-sos-province{
        height: calc(27vh);
        overflow: auto;
    }
    </style>

    <a href="#sos_help_pdf" class="btn btn-primary float-end me-1" onclick="SaveImageGlobal('generatePdf')">บันทึกภาพทั้งหมด</a>
    <a href="#sos_help_pdf" class="btn btn-warning float-end me-1" onclick="SaveImageGlobal('sos_help_pdf')">บันทึกข้อมูลการขอความช่วยเหลือ</a>
    <a class="btn btn-danger float-end me-1" onclick="SaveImageGlobal('operating_unit_info')">บันทึกภาพหน่วยปฏิบัติการ</a>
    <a class="btn btn-success float-end me-1" onclick="SaveImageGlobal('command_center_pdf')">บันทึกภาพเจ้าหน้าที่ศูนย์สั่งการ</a>

    <div id="generatePdf" class="p-2">
        <!-- <h3 id="command_center_info" class="text-dark mb-0" style="font-weight: bold;">ข้อมูลเจ้าหน้าที่</h3> -->
        <!-- <hr class="mt-5"> -->
        <div id="command_center_pdf" class="mb-3 ">
            @include ('dashboard_1669.dashboard_1669_officer.command_center_info_index')
        </div>

        <div id="operating_unit_info" class="mb-3 ">
            @include ('dashboard_1669.dashboard_1669_officer.operating_unit_info_index')
        </div>
            
        <!-- เพิ่มระยะห่าง -->
        <div id="dashboard_boardcast" style="margin: 70px 0 70px 0;"></div>


        <div id="sos_help_pdf">
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
        @endif
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
