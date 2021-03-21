@extends('layouts.app')

@section('content')
<center>
    <div class="row">
        <div class="col-12">
			<a href="https://lin.ee/xnFKMfc">
				<img style="margin-top: -40px;" width="100%" src="{{ asset('/img/more/success.jpg') }}">
			</a>
			<br><br>
			<div class="row">
				<div class="col-6">
					<center>
						<a href="https://lin.ee/xnFKMfc">
							<img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" width="100%" border="0">
						</a>
					</center>
				</div>
				<div class="col-6">
					<center>
						<img src="{{ asset('/img/more/completed.png') }}" width="100%" border="0" onclick="document.getElementById('btn_completed').click();">
					</center>
				</div>
			</div>
		</div>
	</div>
</center>

<!-- Button trigger modal -->
<button id="btn_completed" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#completed">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="completed" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-none">
        <h5 class="modal-title" id="staticBackdropLabel">Please </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
            <img width="50%" src="{{ asset('/img/icon/please.PNG') }}">
            <br><br>
            <h5 class="text-danger">ท่านสนใจดูบริการอื่นๆจาก ViiCHECK หรือไม่</h5>
            <p class="text-danger">Are you interested in seeing other services from ViiCHECK?</p>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
        <a href="https://lin.ee/xnFKMfc">
        	<button type="button" class="btn btn-primary" >ดูบริการอื่นๆ</button>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection