@extends('layouts.viicheck')

@section('content')

<br><br><br><br><br><br>
<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3>
					<div class="row">
						<div class="col-3">
							<center>
								<img style="width:130%;" src="{{ url('/img/stickerline/PNG/1.png') }}" >
							</center>
						</div>
						<div class="col-9">
							<span class="text-secondary" style="font-size:20px;">สวัสดีค่ะ คุณ</span>
							<br>
							<b class="text-primary">{{ Auth::user()->name }}</b>
						</div>
					</div>
				</h3>
				<p>กรุณากรอกข้อมูลด้านล่างเพื่อเริ่มใช้งาน</p>
				<hr>
				<form>
          <input class="d-none" type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
          <input class="d-none" type="text" name="condo_id" id="condo_id" value="">

					<div class="col-12">
              <label class="control-label">{{ 'เลือกคอนโด' }}</label><span style="color: #FF0033;"> *</span>
              <select id="name_condo" class="form-control" required onchange="document.querySelector('#condo_id').value = document.querySelector('#name_condo').value ;">
									<option value="">กรุณาเลือกคอนโด</option>
									@foreach($all_condo as $item)
										<option class="notranslate" value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
							</select>
          </div>
          <br>
          <div class="col-12">
              <label class="control-label">{{ 'ชื่อ - นามสกลุ' }}</label><span style="color: #FF0033;"> *</span>
              <div class="row">
              		<div class="col-6">
              				<input class="form-control" type="text" name="name" id="name" value="" required placeholder="ชื่อ">
              		</div>
              		<div class="col-6">
              				<input class="form-control" type="text" name="last_name" id="last_name" value="" required placeholder="นามสกุล">
              		</div>
              </div>
          </div>
          <br>
          <div class="col-12">
              <label class="control-label">{{ 'เบอร์ติดต่อ' }}</label><span style="color: #FF0033;"> *</span>
              <input class="form-control" type="text" name="phone" id="phone" value="" required placeholder="เบอร์ติดต่อ">
          </div>
          <br>
          <div class="col-12">
              <label class="control-label">{{ 'อาคาร / ชั้น / ห้อง' }}</label><span style="color: #FF0033;"> *</span><span class="text-secondary"> (หากไม่มีให้ใส่ -)</span>
              <div class="row">
              		<div class="col-4">
              				<input class="form-control" type="text" name="building" id="building" value="" required placeholder="อาคาร">
              		</div>
              		<div class="col-4">
              				<input class="form-control" type="text" name="floor" id="floor" value="" required placeholder="ชั้น">
              		</div>
              		<div class="col-4">
              				<input class="form-control" type="text" name="room_number" id="room_number" value="" required placeholder="ห้อง">
              		</div>
              </div>
          </div>
          <br>
          <div class="col-12">
              <label class="control-label">{{ 'ภาษา' }}</label><span style="color: #FF0033;"> *</span>
              <div class="row">
              		<div class="col-3">
              			<center>
              				<img class="btn" style="filter: grayscale(100%);"  width="100%" src="{{ url('/img/national-flag/flex-en.png') }}" >
                      <span class="notranslate">English</span>
              			</center>
              		</div>
              		<div class="col-3">
              			<center>
              				<img class="btn" style="filter: grayscale(100%);"  width="100%" src="{{ url('/img/national-flag/flex-zh-TW.png') }}" >
                      <span class="notranslate">繁體字</span>
              			</center>
              		</div>
              		<div class="col-3">
              			<center>
              				<img class="btn"style="filter: grayscale(100%);"  width="100%" src="{{ url('/img/national-flag/flex-zh-TW.png') }}">
                      <span class="notranslate">简体字</span>
              			</center>
              		</div>
              		<div class="col-3">
              			<center>
              				<img class="btn" style="filter: grayscale(100%); " width="100%" src="{{ url('/img/national-flag/flex-th.png') }}" >
	                    <span class="notranslate">ไทย</span>
	              		</center>
              		</div>
              </div>
              <input class="form-control" name="rich_menu_language" type="hidden" id="rich_menu_language" value="{{ Auth::user()->language }}" required>
          </div>
          <br>
          <div class="col-12">
          	<center>
          		<input style="width:80%;" class="btn btn-primary main-shadow main-radius" type="submit" value="ยืนยัน">
          	</center>
          </div>
				</form>
			</div>
		</div>
</div>
<br>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {

	 });
	
</script>

@endsection






