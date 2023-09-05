@extends('layouts.viicheck_for_officer')

@section('content')

<h1 class="text-center mt-3">
	<span class="text-primary">{{ $text_hello_world }}</span> -- มีรูปทั้งหมด {{ count($files) }}
</h1>

<div class="row" style="padding-left:30px;padding-right:30px;">

	@php
		$iii = 1 ;

		$start = Request::get('start'); // ลำดับเริ่มต้น
        $end = Request::get('end') ; // ลำดับสิ้นสุด

        if(empty($start)){
        	$start = 1 ;
        }

        if(empty($end)){
        	$end = 12 ;
        }

        // ใช้ array_slice เพื่อดึงเฉพาะลำดับไฟล์ที่คุณต้องการ
        $files = array_slice($files, $start - 1, $end - $start + 1);

	@endphp

	<div class="col-6">
		<a href="{{ url('/Manage_resize_photos') }}" class="btn btn-success mb-2" >
			ปรับขนาดรูปภาพ
		</a>
		<h3>
			รูปภาพลำดับที่ : {{ $start }} ถึง {{ $end }}
		</h3>
	</div>
	<div class="col-6">
		<form action="{{ url('/Manage_uploaded_photos') }}" method="get">
		    @csrf
		    <div class="row">
		    	<div class="col-5">
		    		<div class="form-group">
		    			<label for="start">ลำดับเริ่มต้น:</label>
		    			<input class="form-control" type="number" id="start" name="start" min="1" placeholder="{{ $start }}">
		    		</div>
		    	</div>
		    	<div class="col-5">
		    		<div class="form-group">
			    		<label for="end">ลำดับสิ้นสุด:</label>
			    		<input class="form-control" type="number" id="end" name="end" min="1" placeholder="{{ $end }}">
			    	</div>
		    	</div>
		    	<div class="col-2">
		    		<button class="btn btn-info" type="submit" style="width:80%;margin-top:30px;">
		    			ส่ง
		    		</button>
		    	</div>
		    </div>
		</form>
	</div>

	<hr>

	@foreach ($files as $file) 
		@php

	    	$url = Storage::url($file);
	    	$name_file = str_replace("public/uploads/" , "" , $file);
	    	$name_db_file = 'uploads/' . $name_file;

	    	$address_img = "";

	    	// --- ads_contents ---
	    	$db_ads_contents = App\Models\Ads_content::where('photo',$name_db_file)->first();
	    	if(!empty($db_ads_contents)){
	    		$address_img = $address_img . "/" . 'ads_contents' ;
	    	}

	    	// --- guests ---
	    	$db_guests = App\Models\Guest::where('photo',$name_db_file)->first();
	    	if(!empty($db_guests)){
	    		$address_img = $address_img . "/" . 'guests' ;
	    	}

	    	// --- news ---
	    	$db_news = App\Models\News::where('photo',$name_db_file)->first();
	    	if(!empty($db_news)){
	    		$address_img = $address_img . "/" . 'news' ;
	    	}

	    	// --- parcels ---
	    	$db_parcels = App\Models\Parcel::where('photo',$name_db_file)->first();
	    	if(!empty($db_parcels)){
	    		$address_img = $address_img . "/" . 'parcels' ;
	    	}

	    	// --- partners ---
	    	$db_partners = App\Models\Partner::where('logo',$name_db_file)->first();
	    	if(!empty($db_partners)){
	    		$address_img = $address_img . "/" . 'partners' ;
	    	}

	    	// --- problem_reports ---
	    	$db_problem_reports = App\Models\Problem_report::where('image',$name_db_file)->first();
	    	if(!empty($db_problem_reports)){
	    		$address_img = $address_img . "/" . 'problem_reports' ;
	    	}

	    	// --- promotions ---
	    	$db_promotions = App\Models\Promotion::where('photo',$name_db_file)->first();
	    	if(!empty($db_promotions)){
	    		$address_img = $address_img . "/" . 'promotions' ;
	    	}

	    	// --- sos_help_centers ---
	    	$db_sos_help_centers = App\Models\Sos_help_center::where('photo_sos',$name_db_file)
	    		->orWhere('photo_succeed',$name_db_file)
	    		->orWhere('photo_sos_by_officers',$name_db_file)
	    		->first();
	    	if(!empty($db_sos_help_centers)){
	    		$address_img = $address_img . "/" . 'sos_help_centers' ;
	    	}

	    	// --- sos_maps ---
	    	$db_sos_maps = App\Models\Sos_map::where('photo',$name_db_file)
	    		->orWhere('photo_succeed',$name_db_file)
	    		->first();
	    	if(!empty($db_sos_maps)){
	    		$address_img = $address_img . "/" . 'sos_maps' ;
	    	}

	    	// --- users ---
	    	$db_users = App\User::where('photo',$name_db_file)
	    		->orWhere('driver_license',$name_db_file)
	    		->orWhere('driver_license2',$name_db_file)
	    		->first();
	    	if(!empty($db_users)){
	    		$address_img = $address_img . "/" . 'users' ;
	    	}


	   	@endphp
	    <div class="col-2 card my-3" style="padding:10px;">
	    	<h6> รูปที่ <b>{{ $iii }}</b> </h6>
	    	<br>
	    	<span> {{ $name_file }} </span>
	    	<br>
	    	<span> {{ $address_img ? $address_img : "--" }} </span>
	    	<hr>
	    	<center>
	    		<span class="btn btn-sm btn-danger mb-3" style="width:80%;" onclick="delete_photo('{{ $name_file }}','{{ $iii }}');">
		    		ลบ
		    	</span>
		    	<img src="{{ url('/').$url }}" style="width:100%;">
	    	</center>
	    </div>

	    @php
	    	$iii = $iii + 1 ;
	    @endphp
	@endforeach
</div>

<script>
	
	function delete_photo(name_file,iii){

		// alert(name_file);

		fetch("{{ url('/') }}/api/delete_uploaded_photos" + "/" + name_file)
			.then(response => response.text())
			.then(result => {
				// alert(result);
				let text_success = result.split(" - ")[1];
				if(text_success == "ไฟล์ถูกลบออกแล้ว"){
					// window.location.reload();
					console.log('ไฟล์ที่ ' + iii +' ถูกลบออกแล้ว');
				}
			});

	}

</script>

@endsection