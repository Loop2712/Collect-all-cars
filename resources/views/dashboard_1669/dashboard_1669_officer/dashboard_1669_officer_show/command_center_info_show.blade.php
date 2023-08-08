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
</style>

@section('content')

    <div class="card p-2">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold float-start mb-0">
                    ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ &nbsp;
                </h3>
                {{-- <button id="advancedBtn" class="btn btn-success">ค้นหาขั้นสูง</button> --}}
            </div>
        </div>

        <div id="card_table_user" class="card-body">
            <!-- เพิ่มตัวกรอง -->
            <div id="advancedFilters" class="row row-cols-1 row-cols-lg-6 ">
                <div class="col mb-3">
                    <label for="name_filter" class="form-label">ชื่อ:</label>
                    <input class="form-control" type="text" id="name_filter" value="" onchange="searchData()" placeholder="ค้นหาด้วยชื่อ">
                </div>
                <div class="col mb-3">
                    <label for="gender_filter" class="form-label">เพศ:</label>
                    <select class="form-select filter-select" onchange="searchData()" id="gender_filter">
                        <option value="">--</option>
                        <option value="ผู้ชาย">ผู้ชาย</option>
                        <option value="ผู้หญิง">ผู้หญิง</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="status_filter" class="form-label">สถานะ:</label>
                    <select class="form-select filter-select" onchange="searchData()" id="status_filter">
                        <option value="">--</option>
                        <option value="Standby">Standby</option>
                        <option value="Helping">Helping</option>
                        <option value="">Unready</option>
                    </select>
                </div>
            </div>
            <!-- จบส่วนตัวกรอง -->
            <div class="table-responsive">
                <table id="all_data_command_user_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>เพศ</th>
                            <th>สถานะ</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                            <th>ผู้สร้าง</th>
                        </tr>
                    </thead>
                    <tbody id="data_command_user_tbody">
                        @foreach ($data_command_user as $user)
                        <tr>
                            <td>
                                @php
                                    $data_command_2 = App\User::where('id',$user->user_id)->first();
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        @if(!empty($data_command_2->avatar) && empty($data_command_2->photo))
                                            <img src="{{ $data_command_2->avatar }}">
                                        @endif
                                        @if(!empty($data_command_2->photo))
                                            <img src="{{ url('storage') }}/{{ $data_command_2->photo }}">
                                        @endif
                                        @if(empty($data_command_2->avatar) && empty($data_command_2->photo))
                                            <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mt-3 font-14">{{$user->name_officer_command}}</h6>
                                    </div>
                                </div>
                            </td>
                            @if (!empty($user->user->sex))
                                <td>{{$user->user->sex}}</td>
                            @else
                                <td> -- </td>
                            @endif

                            @switch($user->status)
                                @case('Standby')
                                    <td>
                                        <span class="badge badge-pill bg-success">{{$user->status}}</span>
                                    </td>
                                    @break
                                @case('Helping')
                                    <td>
                                        <span class="badge badge-pill bg-warning">{{$user->status}}</span>
                                    </td>
                                    @break
                                @default
                                    <td>
                                        <span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>
                                    </td>
                            @endswitch

                            @if (!empty($user->created_at))
                                <td> {{ \Carbon\Carbon::parse($user->created_at)->locale('th')->diffForHumans() }}</td>
                            @else
                                <td> -- </td>
                            @endif


                            @if (!empty($user->creator))
                                <td>{{ $user->user_creator->name }}</td>
                            @else
                                <td> ViiCheck </td>
                            @endif

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
            var table = $('#all_data_command_user_table').DataTable( {
                lengthChange: false,
                buttons: ['excel','print']
            } );

            table.buttons().container()
                .appendTo( '#all_data_command_user_table_wrapper .col-md-6:eq(0) ' );
        } );
    </script>

    <script>
        function searchData() {
            const name = document.getElementById("name_filter").value;
            const gender = document.getElementById("gender_filter").value;
            const status = document.getElementById("status_filter").value;
            console.log(name);
            console.log(gender);
            console.log(status);
            get_filter_data_command_unit(name, gender, status);
        }
    </script>

    <script>

        function get_filter_data_command_unit(name, gender, status) {

            let user_login = '{{Auth::user()->sub_organization}}';
            let tbody = document.getElementById('data_command_user_tbody');

            // ดึงข้อมูลผ่าน Fetch API จากหลังบ้าน
            fetch("{{ url('/') }}/api/filter_data_command_unit" + '?name=' + name + '&gender='  + gender + '&status='  + status + '&user_login=' + user_login)
                .then(response => response.json()) // แปลงข้อมูลเป็น JSON
                .then(data => {
                    console.log(data);
                    // หาตารางที่มี id เท่ากับ 'top5_score_unit_table'
                    const table = document.getElementById('all_data_command_user_table').getElementsByTagName('tbody')[0];
                    // ล้างข้อมูลในตาราง
                    table.innerHTML = '';

                    let data_table;
                    // สร้างแถวและเพิ่มข้อมูลในตาราง
                    data.forEach(data_command_user => {

                        // เช็ครูปโปรไฟล์
                        let htmlProfile = '';
                        if(data_command_user.photo){
                            htmlProfile = `<img src="{{ url('storage') }}/`+data_command_user.photo +`" width="35" height="35" class="rounded-circle" alt="">`;
                        }
                        else if(!data_command_user.photo && data_command_user.avatar){
                            htmlProfile = `<img src="`+data_command_user.avatar +`" width="35" height="35" class="rounded-circle" alt="">`;
                        }
                        else if(!data_command_user.photo && !data_command_user.avatar){
                            htmlProfile = `<img src="https://www.viicheck.com/Medilab/img/icon.png" width="35" height="35" class="rounded-circle" alt="">`;
                        }

                        // เช็ครูปเพศ
                        let htmlGender = '';
                        if(data_command_user.sex){
                            htmlGender = `<td>`+ data_command_user.sex +`</td>`;
                        }else{
                            htmlGender = `<td> -- </td>`;
                        }

                        // เช็คสถานะ
                        let htmlStatus = '';
                        switch (data_command_user.status) {
                            case 'Standby':
                            htmlStatus = `<td>
                                            <span class="badge badge-pill bg-success">`+ data_command_user.status+`</span>
                                          </td>`;
                            break;
                            case 'Helping':
                            htmlStatus = `<td>
                                            <span class="badge badge-pill bg-warning">`+ data_command_user.status+`</span>
                                          </td>`;
                            break;
                            default:
                            htmlStatus = `<td>
                                            <span class="badge badge-pill bg-secondary"> ไม่อยู่ </span>
                                          </td>`;
                            break;
                        }

                        // เช็ควันที่สร้าง
                        let htmldiffForHumans = '';
                        if(data_command_user.created_at){
                            htmldiffForHumans = `<td> {{ \Carbon\Carbon::parse(`+ data_command_user.created_at +`)->locale('th')->diffForHumans() }}</td>`;
                        }else{
                            htmldiffForHumans = `<td> -- </td>`;
                        }

                        // เช็ควันที่สร้าง
                        let htmlCreator = '';
                        if(data_command_user.name_creator){
                            htmlCreator = `<td>`+ data_command_user.name_creator +`</td>`;
                        }else{
                            htmlCreator = `<td> ViiCheck </td>`;
                        }

                        data_table = `
                        <tr>
                            <td>
                                @php
                                    $data_command_2 = App\User::where('id',$user->user_id)->first();
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        `+ htmlProfile +`
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mt-3 font-14">`+ data_command_user.name +`</h6>
                                    </div>
                                </div>
                            </td>
                            `+ htmlGender +`
                            `+ htmlStatus +`
                            `+ htmldiffForHumans +`
                            `+ htmlCreator +`
                        </tr>
                        `;

                        tbody.insertAdjacentHTML('afterbegin', data_table); // แทรกบนสุด
                    });

                })
                .catch(error => {
                    console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error);
                });
        };
    </script>


    {{-- <script>
        function toggleAdvancedFilters() {
        const advancedFilters = document.getElementById("advancedFilters");
            advancedFilters.classList.toggle('d-none');
        const nameInput = document.getElementById("nameInput");
            nameInput.classList.toggle('d-none');
        }

        document.getElementById("advancedBtn").addEventListener("click", toggleAdvancedFilters);
    </script> --}}


@endsection
