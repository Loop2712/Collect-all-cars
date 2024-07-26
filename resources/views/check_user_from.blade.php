@extends('layouts.admin')
<link href="{{ asset('/partner_new/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

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

    #table_user_from_paginate ul.pagination {
        float: left !important;
    }
</style>

@section('content')

<div class="card p-2">
    <div class="row">
        <div class="col-12">
            <h3 class="font-weight-bold float-start mb-0">
                รายชื่อ Uesr from {{ $name_partner }}
            </h3>
        </div>
        <div id="div_content" class="col-12">
        	<!-- div_content -->
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        get_data();
    });

    function get_data() {
	    fetch("{{ url('/') }}/api/get_data_check_user_from" + "/" + '{{ $name_partner }}')
	        .then(response => response.json())
	        .then(result => {
	            console.log(result);
	            // แปลงวันที่ในข้อมูลที่ได้มา
	            result = result.map(item => ({
	                ...item,
	                created_at: formatDate(item.created_at)
	            }));
	            exportToExcel(result);
	        });
	}

	function formatDate(dateString) {
	    const date = new Date(dateString);
	    const options = {
	        day: '2-digit',
	        month: '2-digit',
	        year: 'numeric',
	        hour: '2-digit',
	        minute: '2-digit'
	    };
	    return date.toLocaleString('th-TH', options).replace(',', '');
	}

	function exportToExcel(data) {
	    // สร้างเวิร์กบุ๊กใหม่
	    const wb = XLSX.utils.book_new();

	    // สร้างชีทจากข้อมูลที่ได้มา
	    const ws = XLSX.utils.json_to_sheet(data);

	    // เพิ่มชีทลงในเวิร์กบุ๊ก
	    XLSX.utils.book_append_sheet(wb, ws, "Users");

	    // สร้างชื่อไฟล์พร้อมวันที่และเวลา
	    const date = new Date();
	    const formattedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
	    const formattedTime = `${String(date.getHours()).padStart(2, '0')}-${String(date.getMinutes()).padStart(2, '0')}-${String(date.getSeconds()).padStart(2, '0')}`;
	    const fileName = `Users_{{ $name_partner }}_${formattedDate}_${formattedTime}.xlsx`;

	    // ส่งออกเวิร์กบุ๊กเป็นไฟล์ Excel
	    XLSX.writeFile(wb, fileName);
	}




</script>
@endsection