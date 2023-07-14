@extends('layouts.partners.theme_partner_new')

{{-- <style>
    div.dataTables_wrapper div.dataTables_filter {
        display: none;
    }
</style> --}}

@section('content')

    <div class="card">
        <div id="card_table_user" class="card-body">
             <!-- เพิ่มตัวกรอง -->
            <div id="advanced_filter_user" class="row row-cols-1 row-cols-lg-6 collapse" >
                <div class="col mb-3">
                    <label for="gender_filter" class="form-label">เพศ:</label>
                    <select class="form-select filter-select" id="gender_filter">
                        <option value="">--</option>
                        <option value="ผู้ชาย">ผู้ชาย</option>
                        <option value="ผู้หญิง">ผู้หญิง</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="age_filter" class="form-label">อายุ:</label>
                    <select class="form-select filter-select" id="age_filter">
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
                    <select class="form-select filter-select" id="province_filter">
                        <option value="">--</option>
                        <!-- เพิ่มตัวเลือกจังหวัดที่ต้องการ -->
                        @foreach ($filter_location_P as $item)
                            <option value="{{$item->location_P}}">{{$item->location_P}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="province_filter" class="form-label">อำเภอ:</label>
                    <select class="form-select filter-select" id="province_filter">
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
                    <select class="form-select filter-select" id="nationality_filter">
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
                    <select class="form-select filter-select" id="membership_filter">
                        <option value="">--</option>
                        <option value="less_than_1_month">น้อยกว่า 1 เดือน</option>
                        <option value="1_6_months">1 - 6 เดือน</option>
                        <option value="6_12_months">6 - 12 เดือน</option>
                        <option value="more_than_1_year">มากกว่า 1 ปี</option>
                    </select>
                </div>
            </div>
            <!-- จบส่วนตัวกรอง -->
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
                                <td class="sorting_1">{{$user->name ? $user->name : '-'}}</td>
                                <td>{{$user->name_staff ? $user->name_staff : '-'}}</td>
                                <td>ผู้ชาย</td>
                                <td>{{$user->brith ? $user->brith : '-'}}</td>
                                <td>{{$user->location_P ? $user->location_P : '-'}}</td>
                                <td>{{$user->location_A ? $user->location_A : '-'}}</td>
                                <td>{{$user->nationalitie ? $user->nationalitie : '-'}}</td>
                                <td>{{$user->language ? $user->language : '-'}}</td>
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

            // เมื่อมีการเลือกค่าในตัวกรอง dropdown
        $('.filter-select').on('change', function() {
            var genderFilter = $('#gender_filter').val();
            var ageFilter = $('#age_filter').val();
            var provinceFilter = $('#province_filter').val();
            var districtFilter = $('#district_filter').val();
            var nationalityFilter = $('#nationality_filter').val();
            var membershipFilter = $('#membership_filter').val();

            let filter_url = "{{ url('/') }}/api/filter_user?genderFilter=" + genderFilter + "&ageFilter=" + ageFilter + "&provinceFilter=" + provinceFilter +"&districtFilter=" + districtFilter + "&nationalityFilter=" + nationalityFilter + "&membershipFilter=" + membershipFilter;
            fetch(url).then(response => response.json())
            .then(result => {

            }).catch((error) => {
                console.log("ERROR HERE");
                console.log(error);
            });

            console.log(genderFilter);
            // console.log(typeof(provinceFilter));

            // นำค่าตัวกรองไปใช้ในการกรองข้อมูลตาราง
            table
            .columns([2, 3, 4, 5, 6, 8])
            .search([genderFilter, ageFilter, provinceFilter, districtFilter, nationalityFilter, membershipFilter])
            .draw();
        });

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>

    <script>
        var card_body = document.querySelector('#card_table_user');

        var advanced_search = document.createElement('div');
            advanced_search.id = 'advanced_search';
            advanced_search.innerHTML = "การค้นหาขั้นสูง";
            advanced_search.classList.add('collapse');

            card_body.insertBefore(advanced_search, card_body.firstChild);

            // สร้างปุ่มที่จะใช้ในการเปิด-ปิดการ collapse
            var button = document.createElement('button');
            button.classList.add('btn', 'btn-outline-primary' ,'mb-2');
            button.setAttribute('type', 'button');
            button.setAttribute('data-toggle', 'collapse');
            button.setAttribute('data-target', '#advanced_filter_user');
            button.innerHTML = 'การค้นหาขั้นสูง';

            // เพิ่มปุ่มไปยัง div card_body
            card_body.insertBefore(button, card_body.firstChild);
    </script>


@endsection
