<div class="container">
	<div class="row">

		<div id="carousel_form_yellow" class="carousel slide" data-interval="false" data-ride="carousel"  style="height: 100%;padding: 25px;border-radius: 25px;">
		  	<div class="carousel-inner">
		    	<div id="form_data_1" class="form_yellow carousel-item active">
		      		<div class="col-12">
						<h1>Hello 1</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 1</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 1</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 1</h1>
					</div>
					<hr>
		    	</div>
		    	<div id="form_data_2" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h1>Hello 2</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 2</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 2</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 2</h1>
					</div>
					<hr>
		    	</div>
		    	<div id="form_data_3" class="form_yellow carousel-item">
		      		<div class="col-12">
						<h1>Hello 3</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 3</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 3</h1>
					</div>
					<hr>
					<div class="col-12">
						<h1>Hello 3</h1>
					</div>
					<hr>
		    	</div>
			</div>
		</div>
		<div class="col-12">
			<h4 class="text-primary text-end" onclick="check_active();">
				<i class="fa-solid fa-caret-left" style="font-size:35px;" href="#carousel_form_yellow" role="button" data-slide="prev"></i> 
				&nbsp;&nbsp; <span id="span_form_data">1</span>  &nbsp;&nbsp;
				<i class="fa-solid fa-caret-right" style="font-size:35px;" href="#carousel_form_yellow" role="button" data-slide="next"></i>
			</h4>
		</div>

	</div>
</div>

<script>

	function check_active(){

		let max = document.querySelectorAll('.form_yellow').length ;
		// console.log("max >> " + max);
		
		let active = document.querySelector('.active').id;
		let active_sp = active.split("_");

		// console.log(active_sp);

		if (parseInt(active_sp[2]) === max) {
			document.querySelector('#span_form_data').innerHTML = '1' ;
		}else{
			document.querySelector('#span_form_data').innerHTML = parseInt(active_sp[2]) + 1 ;
		}

	}

</script>

