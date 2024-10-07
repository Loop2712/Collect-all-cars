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
    <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-end align-items-center ">
        <a href="#sos_help_pdf" class="btn btn-primary float-end me-1" onclick="SaveImageGlobal('generatePdf')">บันทึกภาพทั้งหมด</a>
        <a class="btn btn-danger float-end me-1" onclick="SaveImageGlobal('section1')">บันทึกภาพ section 1</a>
        <a class="btn btn-success float-end me-1" onclick="SaveImageGlobal('section2')">บันทึกภาพ section 2</a>
    </div>

    <div id="generatePdf" class="container-fluid p-2">

        <div id="section1" class="my-3">
            @include ('test_repair_admin.repair_dashboard.fix_dashboard_sec1')
        </div>
        <!-- เพิ่มระยะห่าง -->
        {{-- <div id="dashboard_fix" style="margin: 70px 0 70px 0;"></div> --}}
        <hr>
        <div id="section2" class="my-3 ">
            @include ('test_repair_admin.repair_dashboard.fix_dashboard_sec2')
        </div>


    </div>

    <script src="https://unpkg.com/modern-screenshot"></script>

    <script>
        // ฟังก์ชัน SaveImage
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

        // ฟังก์ชันสุ่มสีในรูปแบบ HEX
        function getRandomColor() {
            let letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color + 'CC';
        }

    </script>

@endsection
