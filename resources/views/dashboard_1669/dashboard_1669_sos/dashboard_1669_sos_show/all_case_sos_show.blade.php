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
                    <tbody id="data_command_user_tbody">
                        @foreach( $data_sos as $item_sos )
                        <tr>
                            <td>{{ $item_sos->operating_code }}</td>
                            <td>{{ $item_sos->status }}</td>
                            <td>{{ $item_sos->remark_status }}</td>
                            <td>{{ $item_sos->created_at }}</td>
                            <td>{{ $item_sos->lat }}</td>
                            <td>{{ $item_sos->lng }}</td>
                            <td>{{ $item_sos->address }}</td>
                            <td>y_location_sos</td>
                            <td>y_be_notified</td>
                            <td>
                                @if( !empty($item_sos->name_user) )
                                    {{ $item_sos->name_user }}
                                @else
                                    @php
                                        $create_by_ex = explode( 'admin - ', $item_sos->create_by );
                                        $command_create = App\Models\Data_1669_officer_command::where('user_id',$create_by_ex[1])->first();
                                        $name_command_create = $command_create->name_officer_command ;
                                    @endphp

                                    {{ $name_command_create }}
                                @endif
                            </td>
                            <td>{{ $item_sos->phone_user }}</td>
                            <td>{{ $item_sos->command_by }}</td>
                            <td>organization_helper</td>
                            <td>name_helper</td>
                            <td>y_vehicle_type</td>
                            <td>y_operating_suit_type</td>
                            <td>y_symptom</td>
                            <td>y_symptom_other</td>
                            <td>y_idc</td>
                            <td>y_rc</td>
                            <td>y_rc_black_text</td>
                            <td>s_remark_photo_sos</td>
                            <td>time_command</td>
                            <td>time_go_to_help</td>
                            <td>time_to_the_scene</td>
                            <td>time_leave_the_scene</td>
                            <td>time_hospital</td>
                            <td>time_to_the_operating_base</td>
                            <td>รวมเวลาช่วยเหลือ (s_time_command - s_time_sos_success)</td>

                            <td>km_create_sos_to_go_to_help</td>
                            <td>km_to_the_scene_to_leave_the_scene</td>
                            <td>km_hospital</td>
                            <td>km_operating_base</td>
                            <td>รวมเลข กม.</td>

                            <td>y_treatment</td>
                            <td>y_sub_treatment</td>

                            <td>s_score_impression</td>
                            <td>s_score_period</td>
                            <td>s_score_total</td>
                            <td>s_comment_help</td>

                            <td>s_remark_helper</td>

                            <td>s_forward_operation_from</td>
                            <td>s_forward_operation_to</td>
                            <td>s_joint_case</td>

                            <td>y_patient_name_1</td>
                            <td>y_patient_age_1</td>
                            <td>y_patient_hn_1</td>
                            <td>y_patient_vn_1</td>
                            <td>y_delivered_province_1</td>
                            <td>y_delivered_hospital_1</td>

                            <td>y_patient_name_2</td>
                            <td>y_patient_age_2</td>
                            <td>y_patient_hn_2</td>
                            <td>y_patient_vn_2</td>
                            <td>y_delivered_province_2</td>
                            <td>y_delivered_hospital_2</td>

                            <td>y_patient_name_3</td>
                            <td>y_patient_age_3</td>
                            <td>y_patient_hn_3</td>
                            <td>y_patient_vn_3</td>
                            <td>y_delivered_province_3</td>
                            <td>y_delivered_hospital_3</td>

                            <td>y_submission_criteria</td>
                            <td>y_communication_hospital</td>

                            <td>y_registration_category</td>
                            <td>y_registration_number</td>
                            <td>y_registration_province</td>
                            <td>y_owner_registration</td>

                            <td>s_refuse</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

	<!-- Bootstrap JS -->
	<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            let title_theme = document.querySelector('#title_theme');
                title_theme.innerHTML = "ข้อมูลการขอความช่วยเหลือ" ;

            // เพิ่มโค้ดสำหรับการกรองข้อมูล
            var table = $('#all_data_sos_1669_table').DataTable( {
                lengthChange: true,
                buttons: ['excel','print']
            } );

            table.buttons().container()
                .appendTo( '#all_data_sos_1669_table_wrapper .col-md-6:eq(0) ' );
        } );
    </script>

@endsection
