@extends('layouts.partners.theme_partner_new')

<style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }

    div.dataTables_filter {
        margin-top: 1rem;
    }
    button#advancedBtn {
        margin-top: 10px;
    }
    .col-1.mb-3 .btn {
        width: 50px;
        height: 100%;
    }
    #all_data_sos_1669_table_paginate ul.pagination{
        float: left !important;
    }

</style>

@section('content')

    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลการขอความช่วยเหลือ
                </h3>
            </div>
        </div>

        <div id="" class="card-body">

            <!-- เพิ่มตัวกรอง -->
            <form method="GET" action="{{ url('/dashboard_1669_show') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">

            </form>
            <!-- จบส่วนตัวกรอง -->
            <style>
                #all_data_sos_1669_table tr th{
                    min-width: 200px;
                }
            </style>
            <div class="table-responsive">
                <table id="all_data_sos_1669_table" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>รหัสเคส</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุสถานะ</th>
                            <th>วันที่ / เวลา</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>สถานที่</th>
                            <th>รายละเอียดสถานที่</th>
                            <th>รับแจ้งเหตุทาง</th>
                            <th>ผู้ขอความช่วยเหลือ</th>
                            <th>เบอร์ติดต่อผู้ขอความช่วยเหลือ</th>
                            <th>สั่งการโดย</th>
                            <th>ชื่อหน่วยปฏบัติการ</th>
                            <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                            <th>ยานพาหนะ</th>
                            <th>ระดับเจ้าหน้าที่หน่วยปฏิบัติการ</th>
                            <th>อาการ</th>
                            <th>รายละเอียดอาการ</th>
                            <th>การให้รหัสความรุนแรง (IDC)</th>
                            <th>รหัสความรุนแรง ณ จุดเกิดเหตุ (RC)</th>
                            <th>รายละเอียดรหัสความรุนแรง ณ จุดเกิดเหตุ</th>
                            <th>รายละเอียดสถานที่เกิดเหตุจากเจ้าหน้าที่</th>
                            <th>เวลาสั่งการ</th>
                            <th>เวลาออกจากฐาน</th>
                            <th>เวลาถึงที่เกิดเหตุ</th>
                            <th>เวลาออกจากที่เกิดเหตุ</th>
                            <th>เวลาถึง รพ.</th>
                            <th>เวลากลับถึงฐาน</th>
                            <th>รวมเวลาในการช่วยเหลือ</th>

                            <th>เลข กม. ออกจากฐาน</th>
                            <th>เลข กม. ถึงที่เกิดเหตุ</th>
                            <th>เลข กม. ถึง รพ.</th>
                            <th>เลข กม. กลับถึงฐาน</th>
                            <th>รวมเลข กม.</th>

                            <th>การรักษา</th>
                            <th>รายละเอียดการรักษา</th>

                            <th>คะแนนความประทับใจ</th>
                            <th>คะแนนความรวดเร็ว</th>
                            <th>รวมคะแนนการช่วยเหลือ</th>
                            <th>ข้อความการประเมิน</th>

                            <th>หมายเหตุจากเจ้าหน้าที่</th>

                            <th>เคสนี้รับมาจาก</th>
                            <th>ส่งต่อเคสนี้ไปยัง</th>
                            <th>อุบัติเหตุร่วม/อุบัติเหตุหมู่</th>

                            <th>ชื่อ-สกุล (ผู้ป่วย 1)</th>
                            <th>อายุ (ผู้ป่วย 1)</th>
                            <th>HN (ผู้ป่วย 1)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 1)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 1)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 1)</th>

                            <th>ชื่อ-สกุล (ผู้ป่วย 2)</th>
                            <th>อายุ (ผู้ป่วย 2)</th>
                            <th>HN (ผู้ป่วย 2)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 2)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 2)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 2)</th>

                            <th>ชื่อ-สกุล (ผู้ป่วย 3)</th>
                            <th>อายุ (ผู้ป่วย 3)</th>
                            <th>HN (ผู้ป่วย 3)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 3)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 3)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 3)</th>

                            <th>เกณฑ์การนำส่ง</th>
                            <th>การติดต่อสื่อสารกับเจ้าหน้าที่ รพ.</th>

                            <th>ทะเบียนรถหมวด</th>
                            <th>เลขทะเบียน</th>
                            <th>จังหวัด</th>
                            <th>เจ้าของ</th>

                            <th>เจ้าหน้าที่หน่วยปฏิบัติการที่ปฏิเสธเคสนี้</th>

                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th>รหัสเคส</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุสถานะ</th>
                            <th>วันที่ / เวลา</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>สถานที่</th>
                            <th>รายละเอียดสถานที่</th>
                            <th>รับแจ้งเหตุทาง</th>
                            <th>ผู้ขอความช่วยเหลือ</th>
                            <th>เบอร์ติดต่อผู้ขอความช่วยเหลือ</th>
                            <th>สั่งการโดย</th>
                            <th>ชื่อหน่วยปฏบัติการ</th>
                            <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                            <th>ยานพาหนะ</th>
                            <th>ระดับเจ้าหน้าที่หน่วยปฏิบัติการ</th>
                            <th>อาการ</th>
                            <th>รายละเอียดอาการ</th>
                            <th>การให้รหัสความรุนแรง (IDC)</th>
                            <th>รหัสความรุนแรง ณ จุดเกิดเหตุ (RC)</th>
                            <th>รายละเอียดรหัสความรุนแรง ณ จุดเกิดเหตุ</th>
                            <th>รายละเอียดสถานที่เกิดเหตุจากเจ้าหน้าที่</th>
                            <th>เวลาสั่งการ</th>
                            <th>เวลาออกจากฐาน</th>
                            <th>เวลาถึงที่เกิดเหตุ</th>
                            <th>เวลาออกจากที่เกิดเหตุ</th>
                            <th>เวลาถึง รพ.</th>
                            <th>เวลากลับถึงฐาน</th>
                            <th>รวมเวลาในการช่วยเหลือ</th>
                            <th>เลข กม. ออกจากฐาน</th>
                            <th>เลข กม. ถึงที่เกิดเหตุ</th>
                            <th>เลข กม. ถึง รพ.</th>
                            <th>เลข กม. กลับถึงฐาน</th>
                            <th>รวมเลข กม.</th>
                            <th>การรักษา</th>
                            <th>รายละเอียดการรักษา</th>
                            <th>คะแนนความประทับใจ</th>
                            <th>คะแนนความรวดเร็ว</th>
                            <th>รวมคะแนนการช่วยเหลือ</th>
                            <th>ข้อความการประเมิน</th>
                            <th>หมายเหตุจากเจ้าหน้าที่</th>
                            <th>เคสนี้รับมาจาก</th>
                            <th>ส่งต่อเคสนี้ไปยัง</th>
                            <th>อุบัติเหตุร่วม/อุบัติเหตุหมู่</th>
                            <th>ชื่อ-สกุล (ผู้ป่วย 1)</th>
                            <th>อายุ (ผู้ป่วย 1)</th>
                            <th>HN (ผู้ป่วย 1)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 1)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 1)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 1)</th>
                            <th>ชื่อ-สกุล (ผู้ป่วย 2)</th>
                            <th>อายุ (ผู้ป่วย 2)</th>
                            <th>HN (ผู้ป่วย 2)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 2)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 2)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 2)</th>
                            <th>ชื่อ-สกุล (ผู้ป่วย 3)</th>
                            <th>อายุ (ผู้ป่วย 3)</th>
                            <th>HN (ผู้ป่วย 3)</th>
                            <th>เลขประจำตัวประชาชน (ผู้ป่วย 3)</th>
                            <th>นำส่งที่จังหวัด (ผู้ป่วย 3)</th>
                            <th>นำส่ง รพ. (ผู้ป่วย 3)</th>
                            <th>เกณฑ์การนำส่ง</th>
                            <th>การติดต่อสื่อสารกับเจ้าหน้าที่ รพ.</th>
                            <th>ทะเบียนรถหมวด</th>
                            <th>เลขทะเบียน</th>
                            <th>จังหวัด</th>
                            <th>เจ้าของ</th>
                            <th>เจ้าหน้าที่หน่วยปฏิบัติการที่ปฏิเสธเคสนี้</th>

                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>
    </div>

	<!-- Bootstrap JS -->
	<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

    <script>
        // $(document).ready(function() {

        //     let title_theme = document.querySelector('#title_theme');
        //         title_theme.innerHTML = "ข้อมูลการขอความช่วยเหลือ" ;

        //     // เพิ่มโค้ดสำหรับการกรองข้อมูล
        //     var table = $('#all_data_sos_1669_table').DataTable(
        //         {
        //             lengthChange: true,
        //             buttons: ['excel']
        //         }
        //     );

        //     table.buttons().container()
        //         .appendTo( '#all_data_sos_1669_table_wrapper .col-md-6:eq(0) ' );
        // } );


    // $(document).ready(function () {
    //     //Only needed for the filename of export files.
    //     //Normally set in the title tag of your page.
    //     document.title = "ข้อมูลการขอความช่วยเหลือ";
    //     // Create search inputs in footer
    //     $("#all_data_sos_1669_table tfoot th").each(function () {
    //         var title = $(this).text();
    //         $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    //     });
    //     // DataTable initialisation
    //     var table = $("#all_data_sos_1669_table").DataTable({
    //         dom: '<"dt-buttons"Bf><"clear">lirtp',
    //         paging: true,
    //         autoWidth: true,
    //         lengthChange: true,
    //         deferRender: true,
    //         buttons: [
    //             {
    //                 extend: "excelHtml5",
    //                 text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
    //             },
    //         ],
    //         initComplete: function (settings, json) {
    //             var footer = $("#all_data_sos_1669_table tfoot tr");
    //             $("#all_data_sos_1669_table thead").append(footer);
    //         }
    //     });

    //     document.querySelector('.dt-buttons').classList.add('mb-3');

    //     // Apply the search
    //     $("#all_data_sos_1669_table thead").on("keyup", "input", function () {
    //             table.column($(this).parent().index())
    //             .search(this.value)
    //             .draw();
    //         });
    // });

    </script>

<script>
     document.addEventListener('DOMContentLoaded', (event) => {
        
        get_data_sos();
    });

    $(document).ready(function() {
        $('#your_table_id').DataTable();
    });
    // สมาชิกในทีมของทุกทีม
    function get_data_sos() {

        document.title = "ข้อมูลการขอความช่วยเหลือ";
// Create search inputs in footer
$("#all_data_sos_1669_table tfoot th").each(function() {
    var title = $(this).text();
    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
});

// DataTable initialisation
var table = $("#all_data_sos_1669_table").DataTable({
    dom: '<"dt-buttons"Bf><"clear">lirtp',
    paging: true,
    autoWidth: true,
    lengthChange: false,
    bDestroy: true,
    buttons: [{
        extend: "excelHtml5",
        text: "Export Excel" // เปลี่ยนข้อความในปุ่มที่นี่
    }],
    initComplete: function(settings, json) {
        var footer = $("#all_data_sos_1669_table tfoot tr");
        $("#all_data_sos_1669_table thead").append(footer);
    }
});

// Apply the search
$("#all_data_sos_1669_table thead").on("keyup", "input", function() {
    table.column($(this).parent().index())
        .search(this.value)
        .draw();
});

let sub_organization = '{{Auth::user()->sub_organization}}';
// console.log(sub_organization);
fetch("{{ url('/') }}/api/dashboard_1669_all_case_sos_show?user_sub_organization=" + sub_organization)
    .then(response => response.json())
    .then(result => {
        // เริ่มต้นการแสดงผลข้อมูลแบบไม่รวมรายการทั้งหมดในตารางและเพิ่มข้อมูลไปทีละรายการ
        result.forEach(data => {

            let createdAtDate = new Date(data.created_at);
            let created_at = createdAtDate.toLocaleDateString('th-TH', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            });

            const sTimeSOSuccess = new Date(data.time_sos_success).getTime();
            const sTimeCommand = new Date(data.time_command).getTime();

            const sTimeDifference = Math.abs(sTimeSOSuccess - sTimeCommand) / 1000;

            if(data.time_sos_success)
                if (sTimeDifference >= 3600) {
                    const sHours = Math.floor(sTimeDifference / 3600);
                    const sRemainingMinutes = Math.floor((sTimeDifference % 3600) / 60);
                    const sRemainingSeconds = sTimeDifference % 60;

                    sTimeUnit = `${sHours} ชั่วโมง ${sRemainingMinutes} นาที ${sRemainingSeconds} วินาที`;
                } else if (sTimeDifference >= 60) {
                    const sMinutes = Math.floor(sTimeDifference / 60);
                    const sSeconds = sTimeDifference % 60;

                    sTimeUnit = `${sMinutes} นาที ${sSeconds} วินาที`;
                } else {
                    sTimeUnit = `${sTimeDifference} วินาที`;
                }
            else{
                sTimeUnit =  "--"
            }

            let total_km = data.km_create_sos_to_go_to_help + data.km_to_the_scene_to_leave_the_scene + data.km_hospital + data.km_operating_base;


            let row = [];
            row.push(data.operating_code ? data.operating_code : "--");
            row.push(data.status ? data.status : "--");
            row.push(data.remark_status ? data.remark_status : "--");
            row.push(data.created_at ? data.created_at : "--");
            row.push(data.lat ? data.lat : "--");
            row.push(data.lng ? data.lng : "--");
            row.push(data.address ? data.address : "--");
            row.push(data.location_sos ? data.location_sos : "--");
            row.push(data.be_notified ? data.be_notified : "--");
            row.push(data.name_user ?data.name_user : (result[i].name_officer_command ?data.name_officer_command + ' (เจ้าหน้าที่)' : "--"));
            row.push(data.phone_user ? data.phone_user.substring(0, 3) + '-' + data.phone_user.substring(3, 6) + '-' + data.phone_user.substring(6) : "--");
            row.push(data.name_officer_command ? data.name_officer_command : "--");
            row.push(data.organization_helper ? data.organization_helper : "--");
            row.push(data.name_helper ? data.name_helper : "--");
            row.push(data.vehicle_type ? data.vehicle_type : "--");
            row.push(data.operating_suit_type ? data.operating_suit_type : "--");
            row.push(data.symptom ? data.symptom : "--");
            row.push(data.symptom_other ? data.symptom_other : "--");
            row.push(data.idc ? data.idc : "--");
            row.push(data.rc ? data.rc : "--");
            row.push(data.rc_black_text ? data.rc_black_text : "--");
            row.push(data.remark_photo_sos ? data.remark_photo_sos : "--");
            row.push(data.time_command ? data.time_command : "--");
            row.push(data.time_go_to_help ? data.time_go_to_help : "--");
            row.push(data.time_to_the_scene ? data.time_to_the_scene : "--");
            row.push(data.time_leave_the_scene ? data.time_leave_the_scene : "--");
            row.push(data.time_hospital ? data.time_hospital : "--");
            row.push(data.time_to_the_operating_base ? data.time_to_the_operating_base : "--");
            row.push(sTimeUnit);
            row.push(data.km_create_sos_to_go_to_help ? data.km_create_sos_to_go_to_help : "--");
            row.push(data.km_to_the_scene_to_leave_the_scene ? data.km_to_the_scene_to_leave_the_scene : "--");
            row.push(data.km_hospital ? data.km_hospital : "--");
            row.push(data.km_operating_base ? data.km_operating_base : "--");
            row.push(total_km ? total_km : "--");
            row.push(data.treatment ? data.treatment : "--");
            row.push(data.sub_treatment ? data.sub_treatment : "--");
            row.push(data.score_impression ? data.score_impression : "--");
            row.push(data.score_period ? data.score_period : "--");
            row.push(data.score_total ? data.score_total : "--");
            row.push(data.comment_help ? data.comment_help : "--");
            row.push(data.remark_helper ? data.remark_helper : "--");
            row.push(data.forward_operating_form ? data.forward_operating_form : "--");
            row.push(data.forward_operating_to ? data.forward_operating_to : "--");
            row.push(data.joint_case ? data.joint_case : "--");
            row.push(data.patient_name_1 ? data.patient_name_1 : "--");
            row.push(data.patient_age_1 ? data.patient_age_1 : "--");
            row.push(data.patient_hn_1 ? data.patient_hn_1 : "--");
            row.push(data.patient_vn_1 ? data.patient_vn_1 : "--");
            row.push(data.delivered_province_1 ? data.delivered_province_1 : "--");
            row.push(data.delivered_hospital_1 ? data.delivered_hospital_1 : "--");
            row.push(data.patient_name_2 ? data.patient_name_2 : "--");
            row.push(data.patient_age_2 ? data.patient_age_2 : "--");
            row.push(data.patient_hn_2 ? data.patient_hn_2 : "--");
            row.push(data.patient_vn_2 ? data.patient_vn_2 : "--");
            row.push(data.delivered_province_2 ? data.delivered_province_2 : "--");
            row.push(data.delivered_hospital_2 ? data.delivered_hospital_2 : "--");
            row.push(data.patient_name_3 ? data.patient_name_3 : "--");
            row.push(data.patient_age_3 ? data.patient_age_3 : "--");
            row.push(data.patient_hn_3 ? data.patient_hn_3 : "--");
            row.push(data.patient_vn_3 ? data.patient_vn_3 : "--");
            row.push(data.delivered_province_3 ? data.delivered_province_3 : "--");
            row.push(data.delivered_hospital_3 ? data.delivered_hospital_3 : "--");
            row.push(data.submission_criteria ? data.submission_criteria : "--");
            row.push(data.communication_hospital ? data.communication_hospital : "--");
            row.push(data.registration_category ? data.registration_category : "--");
            row.push(data.registration_number ? data.registration_number : "--");
            row.push(data.registration_province ? data.registration_province : "--");
            row.push(data.owner_registration ? data.owner_registration : "--");
            row.push(data.refuse ? data.refuse : "--");
            
            table.row.add(row).draw(false); // เพิ่มแถวใหม่และแสดงผลบนตารางโดยไม่รีเรียกการวาดตาราง
        });
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
       

    }
</script>



{{--
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let pagination_class = document.querySelector('.pagination');
            pagination_class.classList.add('float-start');
        });

    </script> --}}

@endsection



