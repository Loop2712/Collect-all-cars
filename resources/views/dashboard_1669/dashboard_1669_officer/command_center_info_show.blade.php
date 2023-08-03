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
            <!-- <div id="advanced_filter_user" class="row row-cols-1 row-cols-lg-6 collapse" >
                <div class="col mb-3">
                    <label for="gender_filter" class="form-label">เพศ:</label>
                    <select class="form-select filter-select" id="gender_filter">
                        <option value="">--</option>
                        <option value="ผู้ชาย">ผู้ชาย</option>
                        <option value="ผู้หญิง">ผู้หญิง</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="age_filter" class="form-label">สถานะ:</label>
                    <select class="form-select filter-select" id="age_filter">
                        <option value="">--</option>
                        <option value="below_12">Standby</option>
                        <option value="13_19">Helping</option>
                    </select>
                </div>
            </div> -->
            <!-- จบส่วนตัวกรอง -->
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>เพศ</th>
                            <th>สถานะ</th>
                            <th>เป็นสมาชิกมาแล้ว</th>
                            <th>ผู้สร้าง</th>
                        </tr>
                    </thead>
                    <tbody>
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
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: ['excel', 'print']
            } );

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0) .mb-2' );
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
