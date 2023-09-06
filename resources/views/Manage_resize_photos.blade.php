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
		<h3>
			<br>
			รูปภาพลำดับที่ : {{ $start }} ถึง {{ $end }}
		</h3>
	</div>
	<div class="col-6">
		<form action="{{ url('/Manage_resize_photos') }}" method="get">
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

	    	$full_patr_file = "public/".$type_part."/" ;
	    	//$name_file = str_replace(" " , "" , $file);

	    	$part_file = url('/') . $url ;

	    	$img_size = '' ;
	    	$img_width = '' ;
	    	$img_height = '' ;

	    	// ใช้ฟังก์ชัน getimagesize() เพื่อรับขนาดของรูปภาพ
			$imageInfo = getimagesize($part_file);

			if ($imageInfo !== false) {
			    $width = $imageInfo[0];  // ความกว้างของรูปภาพ
			    $height = $imageInfo[1]; // ความสูงของรูปภาพ
			    $mime = $imageInfo['mime']; // ประเภทของรูปภาพ (MIME Type)

			    $url_part = $part_file;

				$headers = get_headers($url_part, 1);

				if ($headers && isset($headers['Content-Length'])) {
				    $contentLength = $headers['Content-Length'];
				    $imageSizeInBytes = is_array($contentLength) ? end($contentLength) : $contentLength;
				    $imageSizeInMB = round($imageSizeInBytes / (1024 * 1024), 2);

				    $img_size = "{$imageSizeInMB} MB";
				} else {
				    $img_size = "ไม่สามารถอ่านขนาดของรูปภาพได้";
				}

    			$img_width = $width ;
	    		$img_height = $height ;
			} else {
			    $img_width = '-' ;
	    		$img_height = '-' ;
			}

			$class_img_size = '';
			$text_img_size = '';

			if($imageSizeInMB > 0.5){
				$class_img_size = "text-danger" ;
				$text_img_size = '***';
			}

	   	@endphp
	    <div class="col-2 card my-3" style="padding:10px;">
	    	<h6> รูปที่ <b>{{ $iii }}</b> </h6>
	    	<br>
	    	<span> {{ $name_file }} </span>
	    	<br>
	    	<span class="{{ $class_img_size }}">
	    		{{ $text_img_size }} ขนาด : {{ $img_size ? $img_size : "--" }} {{ $text_img_size }}<br>
    			{{ $img_width ? $img_width : "--" }} * {{ $img_height ? $img_height : "--" }}
	    	</span>
	    	<hr>
	    	<center>
	    		<span class="btn btn-sm btn-danger mb-3" style="width:80%;" onclick="resize_img('{{ $name_file }}','{{ $iii }}','{{ $type_part }}');">
		    		ปรับลดขนาดภาพ
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
	
	function resize_img(name_file,iii,type_part){

		// alert(name_file);

		fetch("{{ url('/') }}/api/resize_img" + "/" + name_file + "/" + type_part)
			.then(response => response.text())
			.then(result_1 => {
				// console.log(result_1);
				let imageSizeInBytes_1 = result_1; // ตัวอย่างค่าขนาดรูปภาพในไบต์
				let old_size = (imageSizeInBytes_1 / (1024 * 1024)).toFixed(2);
				if(result_1){
					fetch("{{ url('/') }}/api/get_new_size_img" + "/" + name_file + "/" + type_part)
						.then(response => response.text())
						.then(result_2 => {
							// console.log(result_2);
							let imageSizeInBytes = result_2; // ตัวอย่างค่าขนาดรูปภาพในไบต์
							let imageSizeInMB = (imageSizeInBytes / (1024 * 1024)).toFixed(2);
							console.log("ปรับขนาดจาก : "+ old_size +" เป็น : "+imageSizeInMB+" MB");

						});
				}

			});

	}

</script>

@endsection