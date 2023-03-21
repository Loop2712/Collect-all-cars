@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="card radius-10 d-none d-lg-block">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div class="col-12 mt-3">
                <span class="font-weight-bold h4 mb-0">
                    การจัดการหน่วยแพทย์ ในพื้นที่ {{ Auth::user()->sub_organization }}
                </span>
                <a href="{{ url('/data_1669_operating_unit/create') }}" class="btn btn-success btn-sm float-end float-right mb-0" title="Add New Data_1669_operating_unit">
                    <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มหน่วยแพทย์
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
							<table id="example2555" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>ชื่อ</th>
										<th>พื้นที่</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($data_1669_operating_unit as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->area }}</td>
                                            <td>
                                                <a href="{{ url('/data_1669_operating_unit/' . $item->id) }}" title="View Data_1669_operating_unit">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                                </a>
                                                <a href="{{ url('/data_1669_operating_unit/' . $item->id . '/edit') }}" title="Edit Data_1669_operating_unit"><button class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-user-pen"></i> แก้ไข</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

								</tbody>
								<tfoot>
									<tr>
										<th>ชื่อ</th>
										<th>พื้นที่</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
            </div>
        </div>





















        
    </div>
</div>
	<script>
        
        document.addEventListener('DOMContentLoaded', (event) => {

            
            var table = $('#example2555').DataTable( {
                
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
	  });
	</script>
@endsection