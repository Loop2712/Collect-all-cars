@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="row row-cols-1 row-cols-lg-1">
	<!-- Free Tier -->
	<div class="col mt-3 mb-3">
		<div class="card mb-5 mb-lg-0">
			<div class="card-header bg-danger py-3">
				<h5 class="card-title text-white text-uppercase text-center">Free</h5>
				<h6 class="card-price text-white text-center">$0<span class="term">/month</span></h6>
			</div>
			<div class="card-body">
				
				<div class="d-grid">
					<a href="#" class="btn btn-danger my-2 radius-30">ดูวิดีโอ</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Plus Tier -->
	<div class="col mt-3 mb-3">
		<div class="card mb-5 mb-lg-0">
			<div class="card-header bg-primary py-3">
				<h5 class="card-title text-white text-uppercase text-center">Plus</h5>
				<h6 class="card-price text-white text-center">$9<span class="term">/month</span></h6>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Single User</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>5GB Storage</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Unlimited Public Projects</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Community Access</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Unlimited Private Projects</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Dedicated Phone Support</li>
					<li class="list-group-item"><i class="bx bx-check me-2 font-18"></i>Free Subdomain</li>
					<li class="list-group-item text-secondary"><i class="bx bx-x me-2 font-18"></i>Monthly Status Reports</li>
				</ul>
				<div class="d-grid"> <a href="#" class="btn btn-primary my-2 radius-30">Order Now</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection