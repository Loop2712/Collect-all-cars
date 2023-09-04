@extends('layouts.viicheck_for_officer')

@section('content')

<h1 class="text-center mt-3">
	{{ $text_hello_world }} -- {{ count($files) }}
</h1>

<div class="row" style="padding-left:30px;padding-right:30px;">
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
	    <div class="col-2 card" style="padding:10px;">
	    	<!-- <span> {{ $url }} </span> -->
	    	<span> {{ $name_file }} </span>
	    	<br>
	    	<span> {{ $address_img ? $address_img : "--" }} </span>
	    	<hr>
	    	<center>
	    		<span class="btn btn-sm btn-danger mb-3" style="width:80%;" onclick="delete_photo('{{ $name_file }}');">
		    		ลบ
		    	</span>
		    	<img src="{{ url('/').$url }}" style="width:100%;">
	    	</center>
	    </div>	
	@endforeach
</div>

<script>
	
	function delete_photo(name_file){

		// alert(name_file);

		fetch("{{ url('/') }}/api/delete_uploaded_photos" + "/" + name_file)
			.then(response => response.text())
			.then(result => {
				alert(result);
				let text_success = result.split(" - ")[1];
				if(text_success == "ไฟล์ถูกลบออกแล้ว"){
					window.location.reload();
				}
			});

	}

</script>

@endsection