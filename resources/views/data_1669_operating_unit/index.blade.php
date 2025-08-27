@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="col-12 mt-3">
                <span class="font-weight-bold h4 mb-0">
                    การจัดการหน่วยปฏิบัติการ ในพื้นที่ {{ Auth::user()->sub_organization }}
                </span>

                <a href="{{ url('/data_1669_operating_unit/create') }}" class="btn btn-success btn-sm float-end float-right mb-0" title="Add New Data_1669_operating_unit">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มหน่วยปฏิบัติการ
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <div style="position: absolute; top: 15px;">
                        <button class="btn btn-primary btn-sm  mb-0 ms-2" onclick="selectAllCheckboxes()">
                            เลือกทั้งหมด
                        </button>
                        <button class="btn btn-danger d-none btn-sm mb-0 ms-2" id="btn_multi_delete" onclick="cofirmMultiDelete()">
                            ลบ ที่เลือก (<span id="count_delete"></span>)
                        </button>
                    </div>
                    <table id="example2555" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ชื่อ</th>
                                <th>พื้นที่</th>
                                <th>จำนวนสมาชิก</th>
                                <th>จำนวนออกปฏิบัติการรวม</th>
                                <th>คะแนนเฉลี่ยสมาชิก</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_1669_operating_unit as $item)
                                @php
                                    $data_officer = App\Models\Data_1669_operating_officer::where('operating_unit_id' ,$item->id)->get();

                                    $count_data_officer = count($data_officer);
                                    $count_all_go_to_help = 0 ;

                                    foreach($data_officer as $iii){
                                    $count_all_go_to_help = $count_all_go_to_help + (int)$iii->go_to_help ;
                                    }
                                @endphp
                            <tr data-id="tr_operating_unit_id_{{$item->id}}">
                                <td>
                                    <input name_operating_unit="{{ $item->name }}" count_operating_unit="{{ $count_data_officer}}" type="checkbox" name="check_delete" class="ms-2" id="{{$item->id}}" onclick="multi_delete(this)">
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>{{ $item->area }}</td>
                                <td>
                                    {{ $count_data_officer }}
                                </td>
                                <td>{{ $count_all_go_to_help }}</td>
                                <td>...</td>
                                <td>
                                    <a href="{{ url('/data_1669_operating_unit/' . $item->id) }}" title="View Data_1669_operating_unit">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                    </a>
                                    <a href="{{ url('/data_1669_operating_unit/' . $item->id . '/edit') }}" title="Edit Data_1669_operating_unit"><button class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-user-pen"></i> แก้ไข</button>
                                    </a>
                                    <form id="form_delete_operating_unit_{{$item->id}}" method="POST" action="{{ url('/data_1669_operating_unit' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <div class="btn btn-danger p-0">
                                            <div class="d-flex">
                                                <a  class="btn text-white btn-sm ps-0" id="{{$item->id}}" title="Delete Deliver" onclick="delete_operating_unit(this)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'> -->
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>

        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

        <script>
            let multi_delete_id = ''; // กำหนด multi_delete_id เป็นตัวแปร global หรือนอกฟังก์ชัน

            function multi_delete(params) {
                const id = params.id.toString();
                const idArray = multi_delete_id.split(',').map(id => id.trim());
                const index = idArray.indexOf(id);

                if (params.checked && index === -1) {
                    if (multi_delete_id !== '') {
                        multi_delete_id += ',';
                    }
                    multi_delete_id += id;
                } else if (!params.checked && index !== -1) {
                    idArray.splice(index, 1);
                    multi_delete_id = idArray.join(',');
                }

                console.log(multi_delete_id);

                if (multi_delete_id !== '') {
                    let count_select_delete = countIds(multi_delete_id);
                    document.querySelector('#btn_multi_delete').classList.remove('d-none');
                    document.querySelector('#count_delete').innerHTML = count_select_delete;
                } else {
                    document.querySelector('#btn_multi_delete').classList.add('d-none');
                    
                }
            }

            function selectAllCheckboxes() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="check_delete"]');
                let allChecked = true;

                checkboxes.forEach((checkbox) => {
                    if (!checkbox.checked) {
                        allChecked = false;
                        return;
                    }
                });

                checkboxes.forEach((checkbox) => {
                    checkbox.checked = !allChecked;
                    multi_delete(checkbox);
                });
            }

            function toggleSelectAll() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="check_delete"]');
                let allChecked = true;

                checkboxes.forEach((checkbox) => {
                    if (!checkbox.checked) {
                        allChecked = false;
                        return;
                    }
                });

                checkboxes.forEach((checkbox) => {
                    checkbox.checked = !allChecked;
                    multi_delete(checkbox);
                });

                if (!allChecked) {
                    // ล้าง multi_delete_id เมื่อ checkbox ถูก unchecked ใน toggleSelectAll
                    multi_delete_id = '';
                }
            }


            function countIds(id_delete) {
                // ใช้ split เพื่อแยกสตริงด้วย comma และ trim เพื่อลบช่องว่างที่อาจจะมี
                const idsArray = id_delete.split(',').map(id => id.trim());
                // ใช้ filter และ length เพื่อนับจำนวน id ที่ไม่ใช่ช่องว่าง
                const numberOfIds = idsArray.filter(id => id !== '').length;
                return numberOfIds;
            }

            function cofirmMultiDelete(params) {
                const checkboxes = document.querySelectorAll('input[type="checkbox"][name="check_delete"]:checked');
                let deleteConfirmationMessage = '';
                let number = 1;

                checkboxes.forEach((checkbox) => {
                    let name_operating_unitValue = checkbox.getAttribute('name_operating_unit');
                    let count_operating_unitValue = checkbox.getAttribute('count_operating_unit');
                    console.log(count_operating_unitValue)
                    if (count_operating_unitValue === '') {
                        count_operating_unitValue = 0;
                    }
                    deleteConfirmationMessage += `${number}. ${name_operating_unitValue}. (สมาชิก : ${count_operating_unitValue}),`;
                    number++;
                });

                swal.fire({
                    title: 'ต้องการลบหน่วยปฏิบัติการใช่หรือไม่?',
                    html: "หน่วยที่เลือก:<br>" + deleteConfirmationMessage.replaceAll(',', '<br>'),
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'ยืนยัน'
                }).then((result) => {
                    if (result.value) {
                        let arr = {
                            "id_multi_delete": multi_delete_id,
                            "multi_delete":true,
                        };
                        
                        fetch("{{ url('/') }}/api/mutiple_delete_unit", {
                            method: 'post',
                            body: JSON.stringify(arr),
                            headers: {
                                "Content-Type": "application/json"
                            }
                        }).then(function (response) {
                            return response.json(); // เรียก .json() บน response
                        }).then(function(data) {
                            // นับจำนวนคุณสมบัติที่ไม่ใช่ null หรือ undefined

                            let deletedIds = data.deleted_ids; // สมมติว่า deleted_ids เป็นอาร์เรย์ของ ids ที่ถูกลบออก

                            // ค้นหาและลบ elements ที่มี id ตรงกัน
                            deletedIds.forEach(function(deletedId) {
                                let elementToDelete = document.querySelector(`[data-id="tr_operating_unit_id_${deletedId}"]`);
                                if (elementToDelete) {
                                    elementToDelete.remove();
                                }
                            });

                            Swal.fire({
                                html: '<h3 class="text-success">ลบเสร็จสิ้น</h3>',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                            })    
                            // console.log(data)

                        });
                        // swal.fire({
                        //     position: 'center',
                        //     icon: 'success',
                        //     title: 'ลบเรียบร้อย',
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                        // document.querySelector('#btn_multi_delete').classList.add('d-none');

                    }
                })
            }

            function delete_operating_unit(data) {
                Swal.fire({
                    title: 'ต้องการลบหน่วยปฏิบัติการนี้ใช่หรือไม่?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                            document.getElementById("form_delete_operating_unit_" + data.id).submit();
                        Swal.fire({
                            html: '<h3 class="text-success">ลบเสร็จสิ้น</h3>',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                        })    
                    }
                })
            }
        </script>






















    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {


        var table = $('#example2555').DataTable({

            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection