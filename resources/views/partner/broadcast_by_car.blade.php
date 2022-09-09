@extends('layouts.partners.theme_partner_new')

@section('content')

<div class="radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
	<!-- การค้นหา -->
    <div class="card">
	    <div class="col-12" style="padding:20px;">
	        <div class="row">
	        	<div class="col-12">
    				<h3 class="text-dark"><b>กรองข้อมูล</b></h3>
    				<br>
    			</div>
    			<div class="col-3">
    				<div class="form-group {{ $errors->has('location_user') ? 'has-error' : ''}}">
                        <label for="location_user" class="control-label">{{ 'พื้นที่ผู้ลงทะเบียนรถ' }}</label>
                        <input class="form-control" type="text" name="location_user" id="location_user" value="">
                    </div>
    			</div>
    			<div class="col-3">
    				<div class="form-group {{ $errors->has('car_type') ? 'has-error' : ''}}">
                        <label for="car_type" class="control-label">{{ 'ประเภทรถ' }}</label>
                        <br>
                        <div style="margin-top:12px;">
    						<input type="radio" name="select_car_type" id="select_type_car">&nbsp;&nbsp;&nbsp; รถยนต์ 
    						&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
    						<input type="radio" name="select_car_type" id="select_type_motor">&nbsp;&nbsp;&nbsp; รถจักรยานยนต์
                        </div>

                        <input class="form-control d-none" type="text" name="car_type" id="car_type" value="">
                    </div>
    			</div>
    			<div class="col-3">
    				<!--  -->
    			</div>
    			<div class="col-3">
    				<!--  -->
    			</div>
    			<br><br>
            	<br><br>
    			<hr>
    			<div class="col-12">
					<button style="width:10%;float: right;margin-right: 10px;" type="button" class="btn btn-secondary">ล้างการค้นหา</button>
    				<button style="width:10%;float: right;margin-right: 10px;" type="button" class="btn btn-success">ค้นหา</button>
    			</div>
            </div>
        </div>
    </div>
    <!-- ผลการค้นหา -->
    <div id="div_data_car_search" class="card d-none">
	    <div class="col-12" style="padding:20px;">
	        <div class="row">
	        	<div class="col-12">
    				<h3 class="text-dark"><b>ผลการค้นหา</b></h3>
    				<br>
    			</div>
            </div>
        </div>
    </div>

</div>

@endsection
