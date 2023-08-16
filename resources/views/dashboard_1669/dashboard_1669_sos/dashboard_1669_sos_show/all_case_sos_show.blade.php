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
                    <tbody id="data_command_user_tbody">
                        @foreach( $data_sos as $item_sos )
                        <tr>
                            <td>{{ $item_sos->operating_code ? $item_sos->operating_code : "--" }}</td>
                            <td>{{ $item_sos->status ? $item_sos->status : "--" }}</td>
                            <td>{{ $item_sos->remark_status ? $item_sos->remark_status : "--" }}</td>
                            <td>{{ thaidate("j F Y" , strtotime($item_sos->created_at)) ? thaidate("j F Y" , strtotime($item_sos->created_at)) : "--" }}</td>
                            <td>{{ $item_sos->lat ? $item_sos->lat : "--" }}</td>
                            <td>{{ $item_sos->lng ? $item_sos->lng : "--" }}</td>
                            <td>{{ $item_sos->address ? $item_sos->address : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->location_sos ? $item_sos->form_yellow->location_sos : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->be_notified ? $item_sos->form_yellow->be_notified : "--" }}</td>
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
                            <td>{{ $item_sos->phone_user ? $item_sos->phone_user : "--" }}</td>
                            <td>{{ $item_sos->officers_command_by->name_officer_command ? $item_sos->officers_command_by->name_officer_command : "--" }}</td>
                            <td>{{ $item_sos->organization_helper ? $item_sos->organization_helper : "--" }}</td>
                            <td>{{ $item_sos->name_helper ? $item_sos->name_helper : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->vehicle_type ? $item_sos->form_yellow->vehicle_type : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->operating_suit_type ? $item_sos->form_yellow->operating_suit_type : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->symptom ? $item_sos->form_yellow->symptom : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->symptom_other ? $item_sos->form_yellow->symptom_other : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->idc ? $item_sos->form_yellow->idc : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->rc ? $item_sos->form_yellow->rc : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->rc_black_text ? $item_sos->form_yellow->rc_black_text : "--" }}</td>
                            <td>{{ $item_sos->remark_photo_sos ? $item_sos->remark_photo_sos : "--" }}</td>
                            <td>{{ $item_sos->time_command ? $item_sos->time_command : "--" }}</td>
                            <td>{{ $item_sos->time_go_to_help ? $item_sos->time_go_to_help : "--" }}</td>
                            <td>{{ $item_sos->time_to_the_scene ? $item_sos->time_to_the_scene : "--" }}</td>
                            <td>{{ $item_sos->time_leave_the_scene ? $item_sos->time_leave_the_scene : "--" }}</td>
                            <td>{{ $item_sos->time_hospital ? $item_sos->time_hospital : "--" }}</td>
                            <td>{{ $item_sos->time_to_the_operating_base ? $item_sos->time_to_the_operating_base : "--" }}</td>

                            @php
                                if (!empty($item_sos->time_sos_success)) {
                                    $s_time_sos_success = strtotime($item_sos->time_sos_success);
                                    $s_time_command = strtotime($item_sos->time_command);

                                    $s_timeDifference = abs($s_time_sos_success - $s_time_command);

                                    if ($s_timeDifference >= 3600) {
                                        $s_hours = floor($s_timeDifference / 3600);
                                        $s_remainingMinutes = floor(($s_timeDifference % 3600) / 60);
                                        $s_remainingSeconds = $s_timeDifference % 60;

                                        $s_time_unit = $s_hours . ' ชั่วโมง ' . $s_remainingMinutes . ' นาที ' . $s_remainingSeconds . ' วินาที';
                                    } elseif ($s_timeDifference >= 60) {
                                        $s_minutes = floor($s_timeDifference / 60);
                                        $s_seconds = $s_timeDifference % 60;

                                        $s_time_unit = $s_minutes . ' นาที ' . $s_seconds . ' วินาที';
                                    } else {
                                        $s_time_unit = $s_timeDifference . ' วินาที';
                                    }
                                }else{
                                    $s_time_unit = '--';
                                }

                            @endphp
                            <td>{{ $s_time_unit }}</td>

                            <td>{{ $item_sos->form_yellow->km_create_sos_to_go_to_help ? $item_sos->form_yellow->km_create_sos_to_go_to_help : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->km_to_the_scene_to_leave_the_scene ? $item_sos->form_yellow->km_to_the_scene_to_leave_the_scene : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->km_hospital ? $item_sos->form_yellow->km_hospital : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->km_operating_base ? $item_sos->form_yellow->km_operating_base : "--" }}</td>

                            @php
                                $total_km = $item_sos->form_yellow->km_create_sos_to_go_to_help + $item_sos->form_yellow->km_to_the_scene_to_leave_the_scene
                                + $item_sos->form_yellow->km_hospital + $item_sos->form_yellow->km_operating_base;
                            @endphp
                            @if ($total_km != 0)
                                <td>{{ $total_km }}</td>
                            @else
                                <td> -- </td>
                            @endif


                            <td>{{ $item_sos->form_yellow->treatment ? $item_sos->form_yellow->treatment : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->sub_treatment ? $item_sos->form_yellow->sub_treatment : "--" }}</td>

                            <td>{{ $item_sos->score_impression ? $item_sos->score_impression : "--" }}</td>
                            <td>{{ $item_sos->score_period ? $item_sos->score_period : "--" }}</td>
                            <td>{{ $item_sos->score_total ? $item_sos->score_total : "--" }}</td>
                            <td>{{ $item_sos->comment_help ? $item_sos->comment_help : "--" }}</td>

                            <td>{{ $item_sos->remark_helper ? $item_sos->remark_helper : "--" }}</td>

                            @php
                                $forward_sos_from = App\Models\Sos_help_center::where('id',$item_sos->forward_operation_from)->select('operating_code','forward_operation_from')->first();
                            @endphp

                            @if (!empty($item_sos->forward_operation_from))
                                <td>{{ $forward_sos_from->operating_code }}</td>
                            @else
                                <td>--</td>
                            @endif

                            @php
                                $forward_sos_to = App\Models\Sos_help_center::where('id',$item_sos->forward_operation_to)->select('operating_code','forward_operation_to')->first();
                            @endphp

                            @if (!empty($item_sos->forward_operation_to))
                                <td>{{ $forward_sos_to->operating_code }}</td>
                            @else
                                <td>--</td>
                            @endif

                            @php
                                $joincase_array = array();
                                if(!empty($item_sos->joint_case)){
                                    $explode_joincase = json_decode($item_sos->joint_case);

                                    for ($i = 0; $i < count($explode_joincase); $i++) {
                                        $find_operationg_code = App\Models\Sos_help_center::where('id', $explode_joincase[$i])->select('operating_code')->first();

                                        if ($find_operationg_code) {
                                            $joincase_array[] = $find_operationg_code->operating_code;
                                        }
                                    }
                                }
                                $joined_codes = implode(',', $joincase_array);
                            @endphp
                            <td>{{ $joined_codes ? $joined_codes : "--" }}</td>

                            <td>{{ $item_sos->form_yellow->patient_name_1 ? $item_sos->form_yellow->patient_name_1 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_age_1 ? $item_sos->form_yellow->patient_age_1 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_hn_1 ? $item_sos->form_yellow->patient_hn_1 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_vn_1 ? $item_sos->form_yellow->patient_vn_1 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_province_1 ? $item_sos->form_yellow->delivered_province_1 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_hospital_1 ? $item_sos->form_yellow->delivered_hospital_1 : "--" }}</td>

                            <td>{{ $item_sos->form_yellow->patient_name_2 ? $item_sos->form_yellow->patient_name_2 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_age_2 ? $item_sos->form_yellow->patient_age_2 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_hn_2 ? $item_sos->form_yellow->patient_hn_2 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_vn_2 ? $item_sos->form_yellow->patient_vn_2 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_province_2 ? $item_sos->form_yellow->delivered_province_2 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_hospital_2 ? $item_sos->form_yellow->delivered_hospital_2 : "--" }}</td>

                            <td>{{ $item_sos->form_yellow->patient_name_3 ? $item_sos->form_yellow->patient_name_3 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_age_3 ? $item_sos->form_yellow->patient_age_3 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_hn_3 ? $item_sos->form_yellow->patient_hn_3 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->patient_vn_3 ? $item_sos->form_yellow->patient_vn_3 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_province_3 ? $item_sos->form_yellow->delivered_province_3 : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->delivered_hospital_3 ? $item_sos->form_yellow->delivered_hospital_3 : "--" }}</td>


                            <td>{{ $item_sos->form_yellow->submission_criteria ? $item_sos->form_yellow->submission_criteria : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->communication_hospital ? $item_sos->form_yellow->communication_hospital : "--" }}</td>

                            <td>{{ $item_sos->form_yellow->registration_category ? $item_sos->form_yellow->registration_category : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->registration_number ? $item_sos->form_yellow->registration_number : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->registration_province ? $item_sos->form_yellow->registration_province : "--" }}</td>
                            <td>{{ $item_sos->form_yellow->owner_registration ? $item_sos->form_yellow->owner_registration : "--" }}</td>
                            @php
                                $refuse_array = array();
                                if(!empty($item_sos->refuse)){
                                    $explode_refuse = explode(',',$item_sos->refuse);

                                    for ($i = 0; $i < count($explode_refuse); $i++) {
                                        $find_name = App\User::where('id', $explode_refuse[$i])->select('name')->first();

                                        if ($find_name) {
                                            $refuse_array[] = $find_name->name;
                                        }
                                    }
                                }
                                $name_refuse_arr = implode(',', $refuse_array);
                            @endphp
                            <td>{{ $name_refuse_arr ? $name_refuse_arr : "--"}}</td>

                        </tr>
                        @endforeach
                    </tbody>
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


    $(document).ready(function () {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = "ข้อมูลการขอความช่วยเหลือ";
        // Create search inputs in footer
        $("#all_data_sos_1669_table tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        // DataTable initialisation
        var table = $("#all_data_sos_1669_table").DataTable({
            dom: '<"dt-buttons"Bf><"clear">lirtp',
            paging: true,
            autoWidth: true,
            lengthChange: false,
            buttons: [
                {
                    extend: "excelHtml5",
                    text: "Export Excel"  // เปลี่ยนข้อความในปุ่มที่นี่
                },
            ],
            initComplete: function (settings, json) {
                var footer = $("#all_data_sos_1669_table tfoot tr");
                $("#all_data_sos_1669_table thead").append(footer);
            }
        });

        // Apply the search
        $("#all_data_sos_1669_table thead").on("keyup", "input", function () {
                table.column($(this).parent().index())
                .search(this.value)
                .draw();
            });
    });

    </script>
{{--
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let pagination_class = document.querySelector('.pagination');
            pagination_class.classList.add('float-start');
        });

    </script> --}}

@endsection
