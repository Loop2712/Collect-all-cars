@extends('layouts.partners.theme_partner_new')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .card {
        width: 100%;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        box-sizing: border-box;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0; /* เพิ่มระยะห่างระหว่างการ์ดกับตาราง */
    }
    .row {
        display: flex;
        border-bottom: 1px solid #ddd;
    }
    .row.header {
        font-weight: bold;
        background-color: #f1f1f1;
    }
    .cell {
        flex: 1;
        padding: 10px;
        font-size: 16px;
        text-align: left; /* เพิ่มการจัดเรียงข้อความไปทางซ้าย */
    }
    .row:last-child .cell {
        border-bottom: none;
    }
    .cell:last-child {
        border-right: none;
    }
    @media (max-width: 600px) {
        .row {
            flex-direction: column;
        }
        .cell {
            border-right: none;
            border-bottom: 1px solid #ddd;
        }
        .cell:last-child {
            border-bottom: none;
        }
    }

    #block_btn {
        display: inline-block;
        width: 140px;
        padding: 10px 15px;
        background-color: #6c757d; /* สีพื้นหลัง */
        color: white; /* สีตัวอักษร */
        text-align: center;
        border: none;
        border-radius: 4px; /* มุมโค้ง */
        cursor: pointer;
        text-decoration: none; /* ลบเส้นใต้ถ้าเป็นลิงก์ */
    }

    #block_btn:hover {
        background-color: #404549; /* สีพื้นหลังเมื่อ hover */
    }

    #free_btn {
        display: inline-block;
        width: 140px;
        padding: 10px 15px;
        background-color: #e62e2e; /* สีพื้นหลัง */
        color: white; /* สีตัวอักษร */
        text-align: center;
        border: none;
        border-radius: 4px; /* มุมโค้ง */
        cursor: pointer;
        text-decoration: none; /* ลบเส้นใต้ถ้าเป็นลิงก์ */
    }

    #free_btn:hover {
        background-color: #a50d0d; /* สีพื้นหลังเมื่อ hover */
    }
</style>

@section('content')

<!-- Button trigger modal -->
<button id="btn_open_modal_cf_block_sos" type="button" class="d-none" data-toggle="modal" data-target="#modal_cf_block_sos"></button>

<!-- Modal -->
<div class="modal fade" id="modal_cf_block_sos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:999999!important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <button id="close_modal_cf_block_sos" type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <!-- <div class="modal-header">
            <h5 class="modal-title" id="Label_cf_block_sos">โปรดยืนยัน</h5>
            </div> -->
            <div id="content_modal_cf_block_sos" class="modal-body">
                <!--  -->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="d-lg-flex align-items-center justify-content-between mb-4 gap-3">
            <h2>ข้อมูลผู้ใช้ที่เคยขอความช่วยเหลือ</h2>
            <div class="position-relative">
                <input id="Search_name" type="text" class="form-control ps-5 radius-30" placeholder="ค้นหาชื่อ" oninput="input_Search_name();"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div id="btn_select_div" >
                <button id="btn_select_active_all" type="button" class="btn btn-info" onclick="change_select_active('all');">
                    ทั้งหมด
                </button>
                <button id="btn_select_active_free" type="button" class="btn btn-outline-info" onclick="change_select_active('free');">
                    ผู้ใช้ทั่วไป
                </button>
                <button id="btn_select_active_block" type="button" class="btn btn-outline-info" onclick="change_select_active('block');">
                    ผู้ใช้ที่ถูกระงับ
                </button>
            </div>
            <div id="count_div" class="text-end pe-5">
                <span class="float-start mt-3">แสดงผล : <span id="count_show"></span></span>
            </div>
        </div>


        <div class="table" id="itemTable">
            <div class="row header">
                <div class="cell">ชื่อผู้ขอความช่วยเหลือ</div>
                <div class="cell">จำนวนขอความช่วยเหลือ</div>
                <div class="cell text-center">ระงับการใช้งาน</div>
            </div>
            <!-- ข้อมูลจะถูกเพิ่มโดยใช้ JavaScript -->
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>

<script>
    var data_type_active = 'all' ;

    document.addEventListener('DOMContentLoaded', (event) => {
        get_data_sos();
    });
</script>

<script>
    const get_data_sos = () => {

        let count = 0;

        let user_login_organization = '{{Auth::user()->organization}}';

        fetch("{{ url('/') }}/api/viisos_used/" + user_login_organization)
            .then(response => response.json())
            .then(data => {
                const itemTable = document.getElementById('itemTable');
                // console.log("data");
                // console.log(data);

                data.forEach(item => {
                    const rowDiv = document.createElement('div');
                    const user_div = document.createElement('div');
                    const amountSos_div = document.createElement('div');
                    const block_btn_div = document.createElement('div');
                    if (item.block_sos == "Yes") {
                        rowDiv.className = 'row div_of_data';
                        rowDiv.setAttribute('row_attribute','block');
                        rowDiv.setAttribute('name_user_attribute', item.name_user.toLowerCase());
                        rowDiv.setAttribute('id_user_attribute', item.user_id);

                        user_div.className = 'cell';
                        user_div.textContent = item.name_user;
                        user_div.setAttribute('style', 'font-weight:bold');
                        // user_div.setAttribute('name_user_attribute', item.name_user);

                        amountSos_div.className = 'cell';
                        amountSos_div.textContent = item.amount_sos;
                        amountSos_div.setAttribute('amount_sos_attribute', item.amount_sos);

                        block_btn_div.id = 'block_btn_div_'+item.user_id;
                        block_btn_div.className = 'cell text-center';
                        block_btn_div.innerHTML = `<span id="block_btn" onclick="confirm_block_sos('block','`+item.user_id+`','`+item.name_user+`')">ถูกระงับแล้ว</span>`;

                        count = count + 1;

                    } else {
                        rowDiv.className = 'row div_of_data';
                        rowDiv.setAttribute('row_attribute','free');
                        rowDiv.setAttribute('name_user_attribute', item.name_user.toLowerCase());
                        rowDiv.setAttribute('id_user_attribute', item.user_id);

                        user_div.className = 'cell';
                        user_div.textContent = item.name_user;
                        user_div.setAttribute('style', 'font-weight:bold');
                        // user_div.setAttribute('name_user_attribute', item.name_user);

                        amountSos_div.className = 'cell';
                        amountSos_div.textContent = item.amount_sos;
                        amountSos_div.setAttribute('amount_sos_attribute', item.amount_sos);

                        block_btn_div.id = 'block_btn_div_'+item.user_id;
                        block_btn_div.className = 'cell text-center';
                        block_btn_div.innerHTML = `<span id="free_btn" onclick="confirm_block_sos('free','`+item.user_id+`','`+item.name_user+`')">ระงับการใช้งาน</span>`;

                        count = count + 1;
                    }

                    rowDiv.appendChild(user_div);
                    rowDiv.appendChild(amountSos_div);
                    rowDiv.appendChild(block_btn_div);

                    itemTable.appendChild(rowDiv);

                    document.querySelector('#count_show').innerHTML = count;
                });
            }).catch(error => console.error('Error fetching data:', error));
    }

</script>

<script>
    const change_select_active = (type_active) =>{

    //console.log(type_active);

    document.querySelector('#btn_select_active_all').classList.remove('btn-info');
    document.querySelector('#btn_select_active_free').classList.remove('btn-info');
    document.querySelector('#btn_select_active_block').classList.remove('btn-info');

    document.querySelector('#btn_select_active_all').classList.add('btn-outline-info');
    document.querySelector('#btn_select_active_free').classList.add('btn-outline-info');
    document.querySelector('#btn_select_active_block').classList.add('btn-outline-info');

    document.querySelector('#btn_select_active_'+type_active).classList.add('btn-info');
    document.querySelector('#btn_select_active_'+type_active).classList.remove('btn-outline-info');

    data_type_active = type_active;
    show_data_selected();
    }

    let delayTimer;
    function input_Search_name(){

        clearTimeout(delayTimer);
        delayTimer = setTimeout(show_data_selected, 1000);
    }

    const show_data_selected = () =>{
        let div_of_data = document.querySelectorAll('.div_of_data');
        div_of_data.forEach(item => {
            item.classList.add('d-none');
        });

        let count = 0;

        let Search_name = document.querySelector('#Search_name').value ;
        Search_name = Search_name.toLowerCase();

        // if (dataName && dataName.includes(Search_name)) {
        //     console.log("Enter Here");
        //     item.classList.remove('d-none');
        //     // count = count + 1;
        // }

        if (data_type_active == "all") {
            if (Search_name) {
                let user_div = document.querySelectorAll('div[name_user_attribute]');

                user_div.forEach(item => {
                    if (item.getAttribute('name_user_attribute').includes(Search_name)) {
                        item.classList.remove('d-none');
                        count = count + 1;
                    }
                });
            } else {
                div_of_data.forEach(item => {
                    item.classList.remove('d-none');
                    count = count + 1;
                });
            }
        } else {
            if (Search_name) {
                let row_attribute = document.querySelectorAll('div[row_attribute="'+data_type_active+'"]');

                row_attribute.forEach(item => {
                    if (item.getAttribute('name_user_attribute').includes(Search_name)) {
                        item.classList.remove('d-none');
                        count = count + 1;
                    }
                });
            }else{
                let row_attribute = document.querySelectorAll('div[row_attribute="'+data_type_active+'"]');

                row_attribute.forEach(item => {
                    item.classList.remove('d-none');
                    count = count + 1;
                });
            }
        }

        document.querySelector('#count_show').innerHTML = count;
    }


    function confirm_block_sos(type,user_id,name_user){

        // console.log("confirm_block_sos");

        let content_modal_cf_block_sos = document.querySelector('#content_modal_cf_block_sos')
            content_modal_cf_block_sos.innerHTML = '';
        let html_cf_user;
        if (type == "block") {
            html_cf_user = '<h5 class="text-success">ยืนยันการยกเลิกระงับผู้ใช้</h5>';
        } else {
            html_cf_user = '<h5 class="text-danger">ยืนยันการระงับผู้ใช้</h5>';
        }

        let html = `
        <div class="text-center p-3">
            <center>
            <img src="{{ url('/img/stickerline/PNG/7.png') }}" width="150">
            </center>
            <br>
            `+html_cf_user+`
            <h3 class="mt-2 mb-2"><b>`+name_user+`</b></h3>
        </div>
        <div class="float-end mt-3">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            <button type="button" class="btn btn-primary" onclick="update_block_sos('`+type+`','`+user_id+`','`+name_user+`')">ยืนยัน</button>
        </div>
        `;

        content_modal_cf_block_sos.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

        document.querySelector('#btn_open_modal_cf_block_sos').click();
    }

    function update_block_sos(type,user_id,name_user){
        // console.log("update_block_sos");
        document.querySelector('#close_modal_cf_block_sos').click();

        fetch("{{ url('/') }}/api/update_status_block_user/" + "?user_id=" + user_id + "&type=" + type)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (result == "block") {
                    document.querySelector('#block_btn_div_'+user_id).innerHTML = `<span id="block_btn" onclick="confirm_block_sos('block','`+user_id+`','`+name_user+`')">ถูกระงับแล้ว</span>`;
                    document.querySelector('div[id_user_attribute="'+user_id+'"]').setAttribute('row_attribute','block');
                    document.querySelector('#btn_select_active_'+data_type_active).click();
                } else {
                    document.querySelector('#block_btn_div_'+user_id).innerHTML = `<span id="free_btn"onclick="confirm_block_sos('free','`+user_id+`','`+name_user+`')">ระงับการใช้งาน</span>`;
                    document.querySelector('div[id_user_attribute="'+user_id+'"]').setAttribute('row_attribute','free');
                    document.querySelector('#btn_select_active_'+data_type_active).click();
                }

        });
    }


</script>




@endsection
