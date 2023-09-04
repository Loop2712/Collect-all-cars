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
	   	@endphp
	    <div class="col-2 card" style="padding:10px;">
	    	<!-- <span> {{ $url }} </span> -->
	    	<span> {{ $name_file }} </span>
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