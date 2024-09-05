
@extends('layouts.partners.theme_partner_sos')

@section('content')

<div class="card border-top border-0 border-4 border-success">
	<div class="card-body">
		<div class="border p-4 rounded">
			<div class="card-title d-flex align-items-center">
				<div>
					<i class="fa-brands fa-line me-1 font-22 text-success"></i>
				</div>
				<h5 class="mb-0 text-success">การจัดการกลุ่มไลน์</h5>
			</div>
			<hr>

			<div class="row">
				<div class="col">

                   	<div class="table-responsive mt-3">
					   	<table class="table align-middle mb-0">
						   	<thead class="table-light">
							   	<tr>
								   	<th>ชื่อ</th>
								   	<th>พื้นที่</th>
								   	<th>ประเภท</th>
								   	<th>หมวดหมู่ (สำหรับระบบแจ้งซ่อม)</th>
								   	<th>สถานะ</th>
							   	</tr>
						   	</thead>
						   	<tbody>
							   	<tr>
								   	<td>name</td>
								   	<td>area</td>
								   	<td class="">
								   		<span class="badge bg-light-danger text-danger">Vii SOS</span>
								   		<span class="badge bg-light-warning text-warning">Vii FIX</span>
								   	</td>
								   	<td>อุปกรณ์สำนักงาน</td>
								   	<td><span class="badge bg-light-success text-success">Active</span></td>
							   	</tr>
						   	</tbody>
					   	</table>
				   	</div>
							
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
