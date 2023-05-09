@extends('layouts.viicheck')

@section('content')

<style>
.container-photo {
  height: 300px;
  width: 300px;
  border-radius: 10px;
  box-shadow: 4px 4px 30px rgba(0, 0, 0, .2);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  gap: 5px;
  background-color: rgba(0, 110, 255, 0.041);
}

.header-photo {
  flex: 1;
  width: 100%;
  border: 2px dashed royalblue;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.header-photo svg {
  height: 100px;
}

.header-photo p {
  text-align: center;
  color: black;
}

.footer-photo {
  background-color: rgba(0, 110, 255, 0.075);
  width: 100%;
  height: 40px;
  padding: 8px;
  border-radius: 10px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  color: black;
  border: none;
}

.footer-photo svg {
  height: 130%;
  fill: royalblue;
  background-color: rgba(70, 66, 66, 0.103);
  border-radius: 50%;
  padding: 2px;
  cursor: pointer;
  box-shadow: 0 2px 30px rgba(0, 0, 0, 0.205);
}

.footer-photo p {
  flex: 1;
  text-align: center;
}

#photo_officer {
  display: none;
}
</style>

<br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">
                        ลงทะเบียนสมาชิกกลุ่มไลน์ : {{ $data_groupline->groupName }}
                    </h3>
                    <div class="card-body">
                        <!-- <a href="{{ url('/nationalitie_officers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> -->

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/nationalitie_officers') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            @if($check_officer_old != "Yes")
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="container-photo"> 
                                        <div class="header-photo"> 
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
                                                <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
                                                <p>Browse File to upload!</p>
                                        </div> 
                                        <label for="photo_officer" class="footer-photo"> 
                                            <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path><path d="M18.153 6h-.009v5.342H23.5v-.002z"></path></g></svg> 
                                            <p>Not selected file</p>
                                        </label> 

                                        <input id="photo_officer" name="photo_officer" type="file" onchange="change_photo_user()">

                                        <script>
                                            function change_photo_user(){
                                                document.querySelector('.header-photo').innerHTML = "" ;
                                            }
                                        </script>

                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">

                                        <div class="col-12 col-md-6 form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
                                            <label for="user_id" class="control-label">{{ 'User Id' }}</label>
                                            <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $user_id }}" readonly>
                                            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-12 col-md-6 form-group d-none {{ $errors->has('group_line_id') ? 'has-error' : ''}}">
                                            <label for="group_line_id" class="control-label">{{ 'Group Line Id' }}</label>
                                            <input class="form-control" name="group_line_id" type="number" id="group_line_id" value="{{ $group_line_id }}" readonly>
                                            {!! $errors->first('group_line_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-12">
                                            <h4>ข้อมูลกลุ่มไลน์</h4>
                                            <p class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span><b>ชื่อกลุ่มไลน์ :</b> {{ $data_groupline->groupName }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span><b>ใช้กับภาษา :</b> {{ $data_groupline->language }}</span>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <center>
                                            <hr style="width: 80%;">
                                        </center>
                                        <div class="col-12 col-md-6 mt-3 form-group {{ $errors->has('name_officer') ? 'has-error' : ''}}">
                                            <label for="name_officer" class="control-label">ชื่อ</label>
                                            <input class="form-control" name="name_officer" type="text" id="name_officer" value="{{ isset($nationalitie_officer->name_officer) ? $nationalitie_officer->name_officer : ''}}" placeholder="ชื่อที่ใช้แสดงในการช่วยเหลือ">
                                            {!! $errors->first('name_officer', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-12 col-md-6 mt-3 form-group {{ $errors->has('phone_officer') ? 'has-error' : ''}}">
                                            <label for="phone_officer" class="control-label">เบอร์ติดต่อ</label>
                                            <input class="form-control" name="phone_officer" type="text" id="phone_officer" value="{{ isset($nationalitie_officer->phone_officer) ? $nationalitie_officer->phone_officer : ''}}"  placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้">
                                            {!! $errors->first('phone_officer', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="col-12 mt-4">
                                            <center>
                                                <span class="btn btn-success main-shadow main-radius" style="width: 40%;"
                                                onclick="document.querySelector('#btn_submit_reg_officer').click();">
                                                    ยืนยัน
                                                </span>
                                            </center>
                                            <input id="btn_submit_reg_officer" class="btn btn-primary d-none" type="submit" value="{{ 'Create' }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <p>มีข้อมูลสมาชิกกลุ่มไลน์นี้ของคุณแล้ว</p>
                                </div>
                            </div>
                            @endif

                            


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
