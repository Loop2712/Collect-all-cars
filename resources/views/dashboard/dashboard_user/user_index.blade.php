@extends('layouts.partners.theme_partner_new')

<style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }
</style>

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-6">
                <!-- เพิ่มตัวกรอง -->
                <div class="col mb-3">
                    <label for="gender_filter" class="form-label">เพศ:</label>
                    <select class="form-select" id="gender_filter">
                        <option value="">--</option>
                        <option value="male">ผู้ชาย</option>
                        <option value="female">ผู้หญิง</option>

                    </select>
                </div>
                <div class="col mb-3">
                    <label for="age_filter" class="form-label">อายุ:</label>
                    <select class="form-select" id="age_filter">
                        <option value="">--</option>
                        <option value="below_12">ต่ำกว่า 12</option>
                        <option value="13_19">13 - 19</option>
                        <option value="20_39">20 - 39</option>
                        <option value="40_59">40 - 59</option>
                        <option value="above_60">60 ขึ้นไป</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="province_filter" class="form-label">จังหวัด:</label>
                    <select class="form-select" id="province_filter">
                        <option value="">--</option>
                        <!-- เพิ่มตัวเลือกจังหวัดที่ต้องการ -->
                        <option value="bangkok">กรุงเทพมหานคร</option>
                        <option value="chiang_mai">เชียงใหม่</option>
                        <option value="phuket">ภูเก็ต</option>
                        <!-- เพิ่มตัวเลือกจังหวัดอื่น ๆ ตามต้องการ -->
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="province_filter" class="form-label">อำเภอ:</label>
                    <select class="form-select" id="province_filter">
                        <option value="">--</option>
                        <!-- เพิ่มตัวเลือกจังหวัดที่ต้องการ -->
                        <option value="bangkok">กรุงเทพมหานคร</option>
                        <option value="chiang_mai">เชียงใหม่</option>
                        <option value="phuket">ภูเก็ต</option>
                        <!-- เพิ่มตัวเลือกจังหวัดอื่น ๆ ตามต้องการ -->
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="nationality_filter" class="form-label">สัญชาติ:</label>
                    <select class="form-select" id="nationality_filter">
                        <option value="">--</option>
                        <!-- เพิ่มตัวเลือกสัญชาติที่ต้องการ -->
                        <option value="thai">ไทย</option>
                        <option value="american">อเมริกัน</option>
                        <option value="british">บริติช</option>
                        <!-- เพิ่มตัวเลือกสัญชาติอื่น ๆ ตามต้องการ -->
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="membership_filter" class="form-label">เป็นสมาชิกมาแล้ว:</label>
                    <select class="form-select" id="membership_filter">
                        <option value="">--</option>
                        <option value="less_than_1_month">น้อยกว่า 1 เดือน</option>
                        <option value="1_6_months">1 - 6 เดือน</option>
                        <option value="6_12_months">6 - 12 เดือน</option>
                        <option value="more_than_1_year">มากกว่า 1 ปี</option>
                    </select>
                </div>
                <!-- จบส่วนตัวกรอง -->
            </div>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>จังหวัด</th>
                            <th>อำเภอ</th>
                            <th>สัญชาติ</th>
                            <th>ภาษาที่ใช้</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_data as $user)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$user->name}}</td>
                                <td>{{$user->name_staff}}</td>
                                <td>{{$user->sex}}</td>
                                <td>{{$user->brith}}</td>
                                <td>{{$user->location_P}}</td>
                                <td>{{$user->location_A}}</td>
                                <td>{{$user->nationalitie}}</td>
                                <td>{{$user->language}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
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
            // เพิ่มโค้ดสำหรับการกรองข้อมูล
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: ['excel', 'pdf', 'print']
            } );

            // เรียกใช้ฟังก์ชันเมื่อมีการเปลี่ยนค่าในตัวกรอง
            $('#gender_filter, #age_filter, #membership_filter, #province_filter, #nationality_filter').change(function() {
                table.draw();
            });

            // กำหนดฟังก์ชันสำหรับการกรองข้อมูล
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var genderFilter = $('#gender_filter').val();
                    var ageFilter = $('#age_filter').val();
                    var membershipFilter = $('#membership_filter').val();
                    var provinceFilter = $('#province_filter').val();
                    var nationalityFilter = $('#nationality_filter').val();

                    var gender = data[2]; // คอลัมน์เพศ
                    var age = parseInt(data[3]); // คอลัมน์อายุ
                    var membership = data[8]; // คอลัมน์เป็นสมาชิกมาแล้ว
                    var province = data[5]; // คอลัมน์จังหวัด
                    var nationality = data[6]; // คอลัมน์สัญชาติ

                    // กรองตามเพศ
                    if (genderFilter && genderFilter !== gender) {
                        return false;
                    }

                    // กรองตามอายุ
                    if (ageFilter) {
                        var ageRange = ageFilter.split('_');
                        var minAge = parseInt(ageRange[0]);
                        var maxAge = parseInt(ageRange[1]);
                        if (age < minAge || age > maxAge) {
                            return false;
                        }
                    }

                    // กรองตามการเป็นสมาชิกมาแล้ว
                    if (membershipFilter) {
                        var membershipRange = membershipFilter.split('_');
                        var minMonths = parseInt(membershipRange[0]);
                        var maxMonths = parseInt(membershipRange[1]);
                        var months = membership.match(/\d+/g); // สกัดเอาเฉพาะตัวเลขในสตริง
                        if (months) {
                            var numMonths = parseInt(months[0]);
                            if (numMonths < minMonths || numMonths > maxMonths) {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    }

                    // กรองตามจังหวัด
                    if (provinceFilter && provinceFilter !== province) {
                        return false;
                    }

                    // กรองตามสัญชาติ
                    if (nationalityFilter && nationalityFilter !== nationality) {
                        return false;
                    }

                    return true; // รักษาข้อมูลที่ผ่านการกรอง
                }
            );

            // กำหนดให้ทำการกรองข้อมูลเมื่อมีการค้นหาหรือเปลี่ยนหน้า
            table.on('search.dt page.dt', function() {
                table.draw();
            });

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>


@endsection
