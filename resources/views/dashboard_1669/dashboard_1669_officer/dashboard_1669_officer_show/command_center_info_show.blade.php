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
                    ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ &nbsp;
                </h3>
                {{-- <button id="advancedBtn" class="btn btn-success">ค้นหาขั้นสูง</button> --}}
            </div>
        </div>

        <div id="card_table_user" class="card-body">
            <!-- เพิ่มตัวกรอง -->
            <form method="GET" action="{{ url('/dashboard_1669_show') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div id="advancedFilters" class="row">
                    <div class="col-2 mb-3">
                        {{-- <label for="name_filter" class="form-label">ชื่อ:</label> --}}
                        <input class="form-control" type="text" id="name_filter" name="name_filter" value="{{ request('name_filter') }}" placeholder="ค้นหาด้วยชื่อ">
                    </div>
                    <div class="col-2 mb-3">
                        {{-- <label for="gender_filter" class="form-label">เพศ:</label> --}}
                        <select class="form-select filter-select" id="gender_filter" name="gender_filter">
                            <option value="">เพศ</option>
                            <option value="ผู้ชาย" @if(request('gender_filter') == 'ผู้ชาย') selected @endif>ชาย</option>
                            <option value="ผู้หญิง" @if(request('gender_filter') == 'ผู้หญิง') selected @endif>หญิง</option>
                        </select>
                    </div>
                    <div class="col-2 mb-3">
                        {{-- <label for="status_filter" class="form-label">สถานะ:</label> --}}
                        <select class="form-select filter-select" id="status_filter" name="status_filter">
                            <option value="">สถานะ</option>
                            <option value="Standby" @if(request('status_filter') == 'Standby') selected @endif>พร้อม</option>
                            <option value="Helping" @if(request('status_filter') == 'Helping') selected @endif>ช่วยเหลือ</option>
                            <option value="null" @if(request('status_filter') == 'NotReady') selected @endif>ไม่พร้อม</option>
                        </select>
                    </div>
                    <div class="col-1 mb-3">
                        <button class="btn btn-primary " type="submit">
                            <i class="fa-solid fa-magnifying-glass fa-2xs mt-0"></i>
                        </button>
                        <button class="btn btn-danger" type="submit" onclick="resetFilters()">
                            <i class="fa-solid fa-trash fa-2xs mt-0 "></i>
                        </button>
                    </div>
                </div>

                <script>
                    function resetFilters() {
                        document.getElementById("name_filter").value = "";
                        document.getElementById("gender_filter").value = "";
                        document.getElementById("status_filter").value = "";
                    }
                </script>

            </form>
            <!-- จบส่วนตัวกรอง -->
            <div class="table-responsive">
                <table id="all_data_command_user_table" class="table table-striped table-bordered align-middle">
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
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        @if(!empty($user->avatar) && empty($user->photo))
                                            <img src="{{ $user->avatar }}">
                                        @endif
                                        @if(!empty($user->photo))
                                            <img src="{{ url('storage') }}/{{ $user->photo }}">
                                        @endif
                                        @if(empty($user->avatar) && empty($user->photo))
                                            <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        @endif
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mt-3 font-14">{{$user->name_officer_command}}</h6>
                                    </div>
                                </div>
                            </td>
                            @if (!empty($user->sex))
                                <td>{{$user->sex}}</td>
                            @else
                                <td> -- </td>
                            @endif

                            @switch($user->status)
                                @case('Standby')
                                    <td>
                                        <span class="badge badge-pill bg-success"> พร้อม</span>
                                    </td>
                                    @break
                                @case('Helping')
                                    <td>
                                        <span class="badge badge-pill bg-warning"> ช่วยเหลือ </span>
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
                                <td>{{ $user->name }}</td>
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

            // console.log(name);
            // console.log(gender);
            // console.log(status);

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
