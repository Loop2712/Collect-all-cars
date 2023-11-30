
@if(Auth::user()->id == '1' || Auth::user()->id == '4')
<div style="display:none;">
@else
<div style="display:none;">
@endif
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <label for="content" class="control-label">{{ 'Content' }}</label>
        <input class="form-control" name="content" type="text" id="content" value="{{ isset($sos_map->content) ? $sos_map->content : ''}}" >
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="control-label">{{ 'Name' }}</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ isset($sos_map->name) ? $sos_map->name : Auth::user()->name}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
        <label for="phone" class="control-label">{{ 'Phone' }}</label>
        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($sos_map->phone) ? $sos_map->phone : Auth::user()->phone}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
        <label for="lat" class="control-label">{{ 'Lat' }}</label>
        <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($sos_map->lat) ? $sos_map->lat : ''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
        <label for="lng" class="control-label">{{ 'Lng' }}</label>
        <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($sos_map->lng) ? $sos_map->lng : ''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('area') ? 'has-error' : ''}}">
        <label for="area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="area" type="text" id="area" value="{{ isset($sos_map->area) ? $sos_map->area : ''}}" >
        {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name_area') ? 'has-error' : ''}}">
        <label for="name_area" class="control-label">{{ 'Area' }}</label>
        <input class="form-control" name="name_area" type="text" id="name_area" value="{{ isset($sos_map->name_area) ? $sos_map->name_area : ''}}" >
        {!! $errors->first('name_area', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_map->user_id) ? $sos_map->user_id : Auth::user()->id}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>

    <input type="text" id="condo_id" name="condo_id" value="{{ $condo_id }}">

    <div class="form-group"> 
        <input class="btn btn-primary" id="btn_submit" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>
</div>

<input class="d-none" type="text" id="latlng" name="latlng" readonly> 

<div class="container d-block d-lg-none"> <!-- d-block d-md-none -->
        <div class="row">
            <center>
            <div class="col-12 main-shadow main-radius p-0" style="margin-top:25px; margin-bottom:10px;border-radius:20px;"  id="map">
                    <!-- <img style="  width: 100%;height: 100%;object-fit: contain; " src="{{ asset('/img/more/sorry.png') }}" class="card-img-top center" style="padding: 10px;"> -->
                    <img style=" object-fit: cover; border-radius:15px" width="280 px" src="{{ asset('/img/more/sorry-no-text.png') }}" class="card-img-top center" style="padding: 10px;">
                    <!-- <img style="" width="230" src="{{ asset('/img/more/sorry-no-text.png') }}"> -->
                    <div style="position: relative; z-index: 5">
                        <div class="translate">
                            <h4 style="top:-330px;left: 100px;;position: absolute;font-family: 'Sarabun', sans-serif;">ขออภัยค่ะ</h4>
                            <h6 style="top:-290px;left:50px;width: 200px;position: absolute;font-family: 'Sarabun', sans-serif;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งค่ะ</h6>
                        </div>
                    </div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4989368.068715823!2d100.32470292487557!3d14.23861745451566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1625474458473!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
            </div></center>
            <div id="location_users">

            </div>

            <div class="col-12 p-3 mb-5 rounded " >
                <div class="row">
                    <div class="col-12 mt-2" id="location_user">
                        <br>
                        <p  style=" color:#B3B6B7;font-family: 'Kanit', sans-serif;" >
                            <span class="text-danger">กรุณาเปิดตำแหน่งที่ตั้ง</span>
                            <span class="text-danger float-right notranslate" onclick="window.location.href = window.location.href;"><i class="fas fa-sync-alt"></i> refresh</span>
                        </p>
                    </div>

                    <div class="col-12  order-1">
                        <!-- a_help click modal -->
                        <a id="a_help_modal" class="order-1 shadow btn btn-warning btn-block shadow-box  d-none text-center" data-toggle="modal" data-target="#staticBackdrop" onclick="search_title_sos();"></a>

                        <a id="a_help_modal_for_charlie" class="order-1 shadow btn btn-warning btn-block shadow-box  d-none text-center" data-toggle="modal" data-target="#staticBackdrop" onclick="search_title_sos_charlie();"></a>

                        <!-- <a id="a_help" style="font-family: 'Kanit', sans-serif;border-radius:15px" class="order-1 shadow btn btn-warning btn-block shadow-box  d-none text-center" onclick="area_help_general();">
                            <i class="fas fa-bullhorn"></i> <b>Ask for HELP </b>
                            <br>
                            <b><span class="notranslate" id="area_help"></span></b>
                        </a> -->
                        <div id="div_text_Area_supervisor" class="d-none">
                            <span class="notranslate">Area supervisor</span>
                        </div>

                        <a id="a_help" class="d-none mail-shadow btn btn-md btn-block btn-warning text-dark mt-2"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;"  onclick="area_help_general();">
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img id="logo_help" src="" width="70%" style="border:white solid 3px;border-radius:50%;background-color: #ffffff;"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block" >
                                                <i class="fas fa-bullhorn"></i> Ask for HELP
                                            </span>
                                            <span class="d-block notranslate" id="area_help"></span>
                                        </b>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <hr>
                    </div>
                    
                    <div class="col-12 order-3">
                        <a style="font-family: 'Kanit', sans-serif;border-radius:15px" href="tel:112" id="btn_quick_help" class="shadow btn btn-warning btn-block shadow-box " onclick="save_sos_content('police' , '112');">
                                <i class="fas fa-bullhorn"></i> <b>Ask for HELP (police)</b>
                        </a>
                    </div>
                        
                    <div class="col-12 d-none order-2 mt-3 mb-3" id="btn_emergency_volunteer">
                        <!-- <button class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#08361d;" onclick="call_sos_of_js100();">
                            <b><i class="fa-regular fa-light-emergency-on"></i> &nbsp;Call Emergency  JS 100</b>
                        </button> -->

                        <!-- <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <b><i class="fa-regular fa-light-emergency-on"></i> &nbsp; ขอความช่วยเหลือ ชาลีกรุงเทพ</b>
                        </span> -->

                        <!-- <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <img src="https://www.viicheck.com/Medilab/img/icon.png" width="40%"> 
                            <b class="text-center">ช่วยเหลือทั่วไป<br>ชาลีกรุงเทพ</b>
                        </span> -->
<!-- 
                        <span class="shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                            <div class="flex">
                                <div class="col-3">
                                    <img src="{{ asset('/img/logo-partner/logo 250x250/chalie-2.2.png') }}" width="100%"> 
                                </div>
                                <div class="col-9 d-flex align-items-center">
                                    <div>
                                        asd
                                    </div>
                                </div>
                            </div>
                            
                        </span> -->


                        @if(Auth::user()->nationalitie == 'Thai' || empty(Auth::user()->nationalitie))
                                <!-- /////// BTN SOS 1669 /////// -->
                            <span id="btn_ask_1669" class="main-shadow btn btn-md btn-block d-none"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" data-toggle="modal" data-target="#modal_sos_1669">
                                <div class="d-flex">
                                    <div class="col-3 p-0 d-flex align-items-center">
                                        <div class="justify-content-center col-12 p-0">
                                            <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center col-9 text-center">
                                        <div class="justify-content-center col-12">
                                            <b>
                                                <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
                                                <span id="name_area_1669" class="d-block" style="color: #ffffff;"></span>
                                            </b>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </span>
                            <!-- /////// END BTN SOS 1669 /////// -->

                            <span  class="main-shadow btn btn-md btn-block"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0006ff;" onclick="sos_of_Charlie_Bangkok();">
                                <div class="d-flex">
                                    <div class="col-3 p-0 d-flex align-items-center">
                                        <div class="justify-content-center col-12 p-0">
                                            <img src="{{ asset('/img/logo-partner/logo 250x250/chalie-2.2.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center col-9 text-center">
                                        <div class="justify-content-center col-12">
                                            <b>
                                                <span class="d-block">ช่วยเหลือทั่วไป</span>
                                                <span class="d-block">(ชาลีกรุงเทพ)</span>
                                            </b>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </span>
                        @else
                            <!-- ////////////////////////////////// BTN nationalitie /////////////////////////////////////// -->
                            @if(!empty(Auth::user()->nationalitie) )
                                @php
                                    $user_nationalitie = App\Models\Nationality::where('nationality' , Auth::user()->nationalitie)->first();
                                @endphp
                            @endif
                            <span id="btn_ask_1669" class="main-shadow btn btn-md btn-block d-none"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#0e4242;" >
                                <div class="d-flex">
                                    <div class="col-3 p-0 d-flex align-items-center">
                                        <div class="justify-content-center col-12 p-0">
                                            <img src="{{ url('/img/national-flag/flag_full_name' . '/' . $user_nationalitie->country ) . '.png'}}" width="70%" style="border-radius:.2rem"> 
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center col-9 text-center">
                                        <div class="justify-content-center col-12">
                                            <b>
                                                <span class="d-block" style="color: #ffffff;text-transform: capitalize;">request for help</span>
                                                <span class="d-block" style="color: #ffffff;text-transform: capitalize;"> {{$user_nationalitie->country}} Embassy</span>
                                            </b>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </span>
                            <!-- ////////////////////////////////// BTN nationalitie /////////////////////////////////////// -->
                        @endif                        
                        <a id="btn_tel_1669" class="mail-shadow btn btn-md btn-block d-none"  onclick="save_sos_content('1669','1669');"  style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;" >
                            <div class="d-flex">
                                <div class="col-3 p-0 d-flex align-items-center">
                                    <div class="justify-content-center col-12 p-0">
                                        <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-9 text-center">
                                    <div class="justify-content-center col-12">
                                        <b>
                                            <span class="d-block" style="color: #ffffff;">Emergency Medical Services</span>
                                            <span class="d-block" style="color: #ffffff;">📞 1669</span>
                                        </b>
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <div class="col-12 card shadow" style="margin-top:-35px;">
            <div class="row d-none">
                <div id="div_goto" class="col-12 d-none">
                    <br>
                    <a id="btn_contact_insurance" class="btn btn-info btn-block shadow-box text-white" onclick="contact_insurance();">
                        <i class="fas fa-hands-helping"></i> ติดต่อประกัน
                    </a>
                    <hr>
                </div>
            </div>
            <!-- เบอร์ SOS ประเทศต่างๆ -->
            @include ('sos_map.phone_sos_country')
            <br>
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height: calc(100%);overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="border-radius: 1rem;">
                    @if(!empty($user))
                        <div class="modal-body text-center" >
                            <a class="close btn-close-modal-sos-1669"  type="button"  data-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                            <div class="col-12">
                                <div class="text-center h4 user-name">
                                    สวัสดีคุณ {{ $user->name }}
                                </div>
                                <div class="text-center h6 mt-3">
                                    โปรดตรวจสอบเบอร์โทรของท่านให้ถูกต้อง 
                                </div>
                                <div id="div_data_phone" class="mt-3">
                                    <div class="phone-user">
                                        @if(!empty($user->phone))
                                            <span id="phone_user">{{ substr_replace(substr_replace($user->phone, '-', 3, 0), '-', 7, 0) }}</span>
                                            <input style="width: 60%;" class="text-center d-none"  type="phone" id="input_phone" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="edit_phone();">
                                            <a class="btn-phone btn ml-3" onclick="
                                                    document.querySelector('#input_phone').classList.remove('d-none');
                                                    document.querySelector('#phone_user').classList.add('d-none'); 
                                                    document.querySelector('#input_phone').focus();">
                                                แก้ไข
                                            </a>
                                        @else
                                            <input style="width: 60%;"  class="form-control text-center"  type="phone" id="input_not_phone" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone();">
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div id="div_data_tag_sos" class="row">
                                    <div class="col-6 text-center">
                                        <input class="d-none" id="tag_sos" type="radio" name="tag_sos" checked>
                                        <span id="btn_tag_sos" class="btn btn-sm btn-warning notranslate" style="width:100%;" onclick="change_tag_sos('SOS');">
                                            SOS
                                        </span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <input class="d-none" id="tag_repair" type="radio" name="tag_sos">
                                        <span id="btn_tag_repair" class="btn btn-sm btn-outline-info" style="width:100%;" onclick="change_tag_sos('repair');">
                                            แจ้งซ่อม
                                        </span>
                                    </div>
                                    <input class="d-none" id="tag_sos_or_repair" type="text" name="tag_sos_or_repair" value="tag_sos">
                                </div>
                                <script>
                                    function change_tag_sos(type){
                                        if(type == 'SOS'){
                                            document.querySelector('#tag_sos').click();
                                            document.querySelector('#btn_tag_sos').classList.remove('btn-outline-warning');
                                            document.querySelector('#btn_tag_sos').classList.add('btn-warning');

                                            document.querySelector('#btn_tag_repair').classList.remove('btn-info');
                                            document.querySelector('#btn_tag_repair').classList.add('btn-outline-info');
                                            document.querySelector('#tag_sos_or_repair').value = 'tag_sos';
                                        }else{
                                            document.querySelector('#tag_repair').click();
                                            document.querySelector('#btn_tag_sos').classList.add('btn-outline-warning');
                                            document.querySelector('#btn_tag_sos').classList.remove('btn-warning');

                                            document.querySelector('#btn_tag_repair').classList.add('btn-info');
                                            document.querySelector('#btn_tag_repair').classList.remove('btn-outline-info');
                                            document.querySelector('#tag_sos_or_repair').value = 'tag_repair';

                                        }
                                    }
                                </script>
                                <div class="text-center h6 mt-3">
                                    <b>โปรดเลือกหัวข้อการขอความช่วยเหลือ</b>
                                </div>
                                <div id="div_data_title_sos" class="form-group mt-3">
                                    <select name="title_sos" id="title_sos" class="form-control" >
                                        <!-- onchange="
                                            if(this.value=='อื่นๆ'){ 
                                                document.querySelector('#title_sos_other').classList.remove('d-none');
                                                document.querySelector('#title_sos_other').focus();
                                            }else{ 
                                                document.querySelector('#title_sos_other').classList.add('d-none');
                                                document.querySelector('#title_sos_other').value = null;
                                            }" -->
                                        <!-- แทรกหัวข้อของ องค์กรนั้นๆที่เพิ่มเข้ามา -->

                                    </select>
                                    <textarea class="form-control mt-2" id="title_sos_other" name="title_sos_other" rows="3" placeholder="เพิ่มรายละเอียด"></textarea>
                                </div>
                            </div>


                            <style>
                                
                                .img-car-parking{
                                    width: 100%;
                                    object-fit: cover;
                                    border-radius: 15px;
                                    height: 20rem;
                                    position: relative;
                                }.text-camera{
                                    position: absolute;
                                    top:.5rem;
                                    background-color: #fff;
                                    padding: 2px 10px;
                                    border-radius: 15px;

                                }.add-img{
                                    border-radius: 15px !important;
                                    background-color: #fff;
                                    border: 1px solid #07375D;

                                    width: 100%;
                                    height: 20rem;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }.add-img img{
                                    width: 12rem;
                                    object-fit: contain;
                                }.alt-image{
                                    top:-2.5rem !important;
                                }.slide-top{
                                    animation: slide-top 1s ease 0s 1 normal forwards;
                                }
                                @keyframes slide-top {
                                0% {
                                    transform: translateY(0);
                                }

                                100% {
                                    transform: translateY(-2rem);
                                }
                                
                            }
                            .take-photo{
                                width: 100%;
                                object-fit: cover;
                                border-radius: 15px;
                                height: 20rem;
                                position: relative;
                                outline: #db2d2e 1px solid;
                            }.btn-cancel-take-photo{
                                padding: .5rem;
                                border-radius: .5rem;
                                width: 4rem;
                                position: absolute; 
                                margin-bottom:13px;
                                left:2rem;
                            }
                            </style>

                            <label class="col-12 mt-3" style="padding:0px;" for="photo_sos_area" >
                                <div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
                                    <div class="form-group p-3"id="add_select_img_area">
                                        <input class="form-control d-none" name="photo_area" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_area" value="" accept="image/*" onchange="document.getElementById('show_photo_sos_area').src = window.URL.createObjectURL(this.files[0]);check_add_img_area();document.querySelector('#btn_help_area').disabled = false;">
                                        <div  class="text-center">
                                            <center>
                                                <img id="img_sos_area" style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                            </center>
                                            <br>
                                            <h3 class="text-center m-0">
                                                <b>เพิ่มภาพถ่าย "คลิก"</b> 
                                            </h3>
                                        </div>
                                        
                                    </div>
                                    <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_area" />
                                    <div class="child">
                                        <span>เลือกรูป</span>
                                    </div>
                                </div>
                            </label>
                            <!-- <div class="col-12 mt-3 d-flex justify-content-center" style="position: relative;"> -->
                                <!-- <img class="collapse" style="filter: backscale(50%);margin-top:15px;" width="100%" src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}"> -->
                                <!-- <img id="ex_img"src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}" class="img-car-parking d-none" alt="" >
                                <video style="outline: #db2d2e 1px solid;" class="d-none" width="100%" height="100%" autoplay="true" id="videoElement"></video>
                                
                                <input class="d-none" type="text" name="text_img" id="text_img" value="">
                                <canvas class="d-none"  id="canvas" width="266" height="400" ></canvas>
                                <img class="d-none take-photo"  src=""  id="photo2"> -->

                                <!-- <div class="add-img" id="add_img">
                                    <img src="{{ asset('/img/icon/image.png') }}" class="img-car-parking" alt="" >
                                </div> -->
<!--                                 
                                <div class="add-img d-none" >
                                    <img src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}" class="img-car-parking" alt="" >
                                </div> -->

                                <!-- <span class="text-camera text-gps">
                                    ถ่ายภาพเพื่อระบุตำแหน่งที่ชัดเจน 
                                </span>
                                <span class="text-camera btn btn-show-ex-img" style="background-color: #780908;color: #fff; padding:.5rem;top:2.5rem" onclick="show_ex_img()">
                                    <i class="fa-solid fa-image"></i> <i class="fa-solid fa-image-slash d-none"></i> &nbsp; ดูภาพตัวอย่าง
                                </span> -->
                                
                                <!-- เปิดกล้อง -->
                                <!-- <a class="align-self-end text-white btn btn-primary btn-show-camera main-radius main-shadow" style="position: absolute; margin-bottom:10px" onclick="capture_registration();">
                                    <i class="fas fa-camera"></i> เพิ่มภาพถ่าย
                                </a> -->

                                <!-- ถ่าย -->
                                <!-- <a class="align-self-end text-white btn-primary btn-circle d-none btn-take-photo" style="position: absolute; margin-bottom:10px" onclick="capture();">
                                    <i class="fas fa-camera"></i>
                                </a>

                                <a class="align-self-end text-white btn-danger d-none btn-cancel-take-photo" onclick=" stop();">
                                    <i class="fa-duotone fa-camera-slash"></i>
                                </a> -->


                                <!-- ถ่ายใหม่ -->
                                <!-- <a class="align-self-end text-white btn-primary btn-circle d-none btn-retake-photo" style="position: absolute; margin-bottom:10px" onclick="document.querySelector('.btn-retake-photo').classList.add('d-none'),capture_registration();">
                                    <i class="fa-regular fa-arrow-rotate-right"></i>
                                </a> -->
                                <script>
                                    // function show_ex_img() {
                                    //     document.querySelector('#add_img').classList.toggle('d-none');
                                    //     document.querySelector('#ex_img').classList.toggle('d-none');
                                    //     document.querySelector('.fa-image').classList.toggle('d-none');
                                    //     document.querySelector('.fa-image-slash').classList.toggle('d-none');
                                    //     document.querySelector('.btn-show-ex-img').classList.toggle('slide-top');
                                    //     document.querySelector('.text-gps').classList.toggle('d-none');
                                    // }

                                    function check_add_img_area() {
                                        document.querySelector('#show_photo_sos_area').classList.remove('d-none');
                                        document.querySelector('#add_select_img_area').classList.add('d-none');
                                    }
                                </script>
                                
                            <!-- </div> -->
                            <span id="text_add_img" class="text-danger dnone">กรุณาเพิ่มภาพถ่าย</span>
                            <div class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                <input class="form-control" name="photo" type="text" id="photo" value="{{ isset($sos_map->photo) ? $sos_map->photo : '' }}" >
                                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="text-center">
                                <label class="col-12 mt-2 mb-2" style="width: 90%;">
                                    ผู้แจ้งเหตุ
                                </label>

                                <center>

                                <button id="private_type_user_sos_me" type="button" class="btn btn-primary" onclick="private_show_input_type_user_sos('me');">
                                    ตัวฉัน
                                </button>
                                <button id="private_type_user_sos_relative" type="button" class="btn btn-outline-primary" onclick="private_show_input_type_user_sos('relative');">
                                    ญาติ
                                </button>
                                <button id="private_type_user_sos_good_citizen" type="button" class="btn btn-outline-primary" onclick="private_show_input_type_user_sos('good_citizen');">
                                    พลเมืองดี
                                </button>
                                <button id="private_type_user_sos_other" type="button" class="btn btn-outline-secondary" onclick="private_show_input_type_user_sos('other');">
                                    อื่นๆ
                                </button>

                                <input type="text" name="private_type_reporter" id="private_type_reporter" class="form-control d-none" value="ผู้ขอความช่วยเหลือ">

                                <input type="text" name="private_type_reporter_other" id="private_type_reporter_other" class="form-control mt-3 mb-3 d-none" name="" placeholder="ประเภทผู้แจ้งเหตุ" style="width: 90%;" onchange="private_change_type_reporter_other();">

                                <script>

                                    function private_change_type_reporter_other(){

                                        let private_type_reporter_other = document.querySelector('#private_type_reporter_other');

                                        document.querySelector('#private_type_reporter').value = private_type_reporter_other.value ;
                                    }
                                    
                                    function private_show_input_type_user_sos(type){

                                        let private_type_reporter_other = document.querySelector('#private_type_reporter_other');

                                        document.querySelector('#private_type_user_sos_me').classList.remove('btn-primary');
                                        document.querySelector('#private_type_user_sos_relative').classList.remove('btn-primary');
                                        document.querySelector('#private_type_user_sos_good_citizen').classList.remove('btn-primary');
                                        document.querySelector('#private_type_user_sos_other').classList.remove('btn-secondary');

                                        document.querySelector('#private_type_user_sos_me').classList.add('btn-outline-primary');
                                        document.querySelector('#private_type_user_sos_relative').classList.add('btn-outline-primary');
                                        document.querySelector('#private_type_user_sos_good_citizen').classList.add('btn-outline-primary');
                                        document.querySelector('#private_type_user_sos_other').classList.add('btn-outline-secondary');
                                        

                                        if(type == 'other'){

                                            document.querySelector('#private_type_reporter').value = 'อื่นๆ' ;

                                            private_type_reporter_other.classList.remove('d-none');

                                            document.querySelector('#private_type_user_sos_other').classList.add('btn-secondary');
                                            document.querySelector('#private_type_user_sos_other').classList.remove('btn-outline-secondary');
                                        }else{

                                            if(type == "me"){
                                                document.querySelector('#private_type_reporter').value = 'ผู้ขอความช่วยเหลือ' ;
                                            }else if(type == "relative"){
                                                document.querySelector('#private_type_reporter').value = 'ญาติ' ;
                                            }
                                            else if(type == "good_citizen"){
                                                document.querySelector('#private_type_reporter').value = 'พลเมืองดี' ;
                                            }

                                            private_type_reporter_other.value = '' ;

                                            private_type_reporter_other.classList.add('d-none');

                                            document.querySelector('#private_type_user_sos_' + type).classList.add('btn-primary');
                                            document.querySelector('#private_type_user_sos_' + type).classList.remove('btn-outline-primary');
                                        }

                                    }

                                </script>
                            </div>

                            <div class="px-2">
                                <button id="btn_help_area" type="button" style="border-radius: 1rem; padding:.7rem; margin-top: .8rem;" class="btn btn-primary btn-block" onclick="confirm_phone();">
                                    ยืนยัน
                                </button>
                            </div>
                            
                            <!-- <div class="row">
                                <div class="col-12">
                                    <h6 style="margin-top:4px;" class="control-label " data-toggle="collapse" data-target="#div_photo" aria-expanded="false" aria-controls="div_photo" 
                                        onclick="if(document.getElementById('div_cam').style.display=='none'){
                                            document.getElementById('div_cam').style.display='',
                                            document.querySelector('#i_down').classList.add('d-none'),
                                            document.querySelector('#i_up').classList.remove('d-none'),
                                            document.querySelector('#div_data_phone').classList.add('d-none'),
                                            capture_registration();
                                        }else{
                                            document.querySelector('#i_down').classList.remove('d-none'),
                                            document.querySelector('#i_up').classList.add('d-none'),
                                            document.querySelector('#div_data_phone').classList.remove('d-none'),
                                            stop();
                                        }"> -->
<!-- 
                                        ถ่ายภาพเพื่อระบุตำแหน่งที่ชัดเจน &nbsp;
                                        <br><br>
                                        <a class="align-self-end text-white btn-primary btn-circle">
                                            <i id="i_down" class="fas fa-camera"></i>
                                            <i id="i_up" class="fas fa-chevron-up d-none"></i>
                                        </a>
                                        <br>
                                        <br> -->
                                        <!-- <span id="text_add_img" class="text-danger d-none">กรุณาเพิ่มภาพถ่าย</span> -->
                                        <!-- <i id="i_down" style="font-size: 20px;" class="fas fa-camera text-info"></i>
                                        <i id="i_up" style="font-size: 20px" class="fas fa-arrow-alt-circle-up text-info d-none"></i> -->
                                    <!-- </h6> -->
                                    <!-- <div class="collapse" id="div_photo">
                                        <div style="margin-top:15px;" class="control-label" data-toggle="collapse" data-target="#img_ex" aria-expanded="false" aria-controls="img_ex" >
                                            ตัวอย่างการถ่ายภาพ <i class="fas fa-angle-down"></i>
                                        </div>
                                        <img id="img_ex" class="collapse" style="filter: backscale(50%);margin-top:15px;" width="100%" src="{{ asset('/img/more/ป้ายอาคารจอดรถ.jpg') }}">
                                        <div class="col-12" id="div_cam" style="display:none;margin-top:17px;">
                                            <div class="d-flex justify-content-center bg-light"> 
                                            
                                                <video width="100%" height="150%" autoplay="true" id="videoElement"></video>
                                                <a class="align-self-end text-white btn-primary btn-circle" style="position: absolute; margin-bottom:10px" onclick="capture();">
                                                    <i class="fas fa-camera"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <input class="d-none" type="text" name="text_img" id="text_img" value="">

                                        <div style="margin-top:15px;" id="show_img" class="">
                                            <canvas class="d-none"  id="canvas" width="266" height="400" ></canvas>
                                            <img class="d-none" src="" width="266" height="400"  id="photo2">

                                            <div id="btn_check_time" class="row d-none" style="margin-top:15px;">
                                                <div class="col-12">
                                                    <p class="btn btn-sm btn-danger" onclick="document.querySelector('#btn_check_time').classList.add('d-none'),capture_registration();">
                                                        <i class="fas fa-undo"></i> ถ่ายใหม่
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                <!-- </div>
                            </div> -->

                        </div>
                        <!-- <div class="modal-footer"> -->
                            <!-- @if(!empty($user->phone))
                                <button type="button" class="btn btn-secondary" onclick="
                                    document.querySelector('#input_phone').classList.remove('d-none');">
                                    แก้ไข
                                </button>
                            @endif

                            @if(empty($user->phone))
                                <button type="button" class="btn btn-secondary" onclick="
                                    document.querySelector('#input_not_phone').classList.remove('d-none');">
                                    แก้ไข
                                </button>
                            @endif -->
                            

                        <!-- </div> -->
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- <span id="btn_modal_sos_1669" class="btn btn-primary d-noดne" data-toggle="modal" data-target="#modal_sos_1669">
    ทดสอบ 1669
</span> -->

<style>
    .modal-dialog {
        border-radius: 10px;
    }.b-radius-10{
        border-radius: 15px !important;
    }body,div , span ,body,h1,h2,h3,h4,h5 ,h6{
		font-family: 'Kanit', sans-serif !important;
	}.user-name{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        font-weight: bold;
    }#div_data_phone_1669{
        display: flex;
        justify-content: center;
       
    }.phone-user{
        border-radius: 15px;
         background-color: #07375D !important;
         padding: 5px 18px;
        color: #fff;
    }.btn-phone{
        background-color: #fff;
        color: #07375D !important;
        padding: 0 10px ;
        font-weight: bold;
    }.add-img{
		border: 1px solid darkgray;
		border-radius: 0 20px 0 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}.fill {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }

    .full_img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .parent {
        position: relative;
        /* define context for absolutly positioned children */
        /* size set by image in this case */
        background-size: cover;
        background-position: center center;
    }

    .parent img {
        display: block;
    }

    .parent:after {
        content: '';
        /* :after has to have a content... but you don't want one */

        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;

        background: rgba(0, 0, 0, 0);

        transition: 1s;
    }

    .parent:hover:after {
        background: rgba(0, 0, 0, .5);
    }

    .parent:hover .child {
        opacity: 1;
    }

    .child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        z-index: 5;
        /* only works when position is defined */
        /* think of a stack of paper... this element is now 5 higher than the bottom */

        color: white;
        opacity: 0;
        transition: .5s;
    }#input_phone_1669{
        border-radius: 10px;
    }
.div_alert{
    position: fixed;
    /* position: absolute; */
    top: -500px;
    /* top: 55%; */
    left: 0;
    width: 100%;
    text-align: center;
    font-family: 'Kanit', sans-serif;
    z-index: 9999;
    display: flex;
    justify-content: center;
}
.div_alert i{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    max-width: 70px;
    height: 50px;
    background-color: #ffddde;
    border-radius: 50%;
    color: #ff5757;
    font-size: 1.5rem;
    margin-left: 1.5rem;

}

.up-down {
  animation-name: slideDownAndUp;
  animation-duration: 2s;
}

@keyframes slideDownAndUp {
  0% {
    transform: translateY(0);
  }
  /* Change the percentage here to make it faster */
  10% {
    transform: translateY(520px);
  }
  /* Change the percentage here to make it stay down for longer */
  90% {
    transform: translateY(520px);
  }
  /* Keep this at the end */
 100% {
    transform: translateY(0);
 }
}
.alert-child{
    background-color: #db2d2e;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 15px;
    height: 5rem;
    width: 90%;
    padding:20px 10px;
}.text-alert{
    color: #fff;
    float: left;
}.modal-content{
    position: relative !important;
}.btn-close-modal-sos-1669{
    position: absolute !important;
    top:1rem;
    right: 1rem;
    z-index: 99999;
}
@media (min-width: 993px) {
  .mobile-only {
   width: 98vw;
   height: 70vh;
   display: flex;
   justify-content: center;
   align-items: center;
  }.img-mobile-only{
    width: 100%;
    }.header-mobile-only{
        /* margin-top: 15px; */
        font-size: 4.5rem;
        font-weight: bolder;
        color: #db2d2e;
        margin: 30px 0;
    }.detail-mobile-only{
        font-size: 1.5rem;
    }
}
@media (max-width: 1200px) {
    .mobile-only {
        margin: 400px auto;

    }
}
@media (max-width: 992px) {
  .mobile-only {
   display: none;
  }
}

</style>


<div class="mobile-only">
<div class="container">
    <div class="card py-5">
        <div class="row g-0">
            <div class="col col-xl-7">
                <div class="card-body p-4">
                    <h2><span class="text-danger">ขออภัยในความไม่สะดวก</span></h2>
                    <h3 class="font-weight-bold display-4">ใช้บนมือถือเท่านั้น</h3>
                    <p>ระบบนี้ถูกออกแบบมาสำหรับการใช้งานบนสมาร์ทโฟนและแท็บเล็ต <br>เพื่อประสบการณ์ใช้งานที่ดีคุณสามารถลองใหม่อีกครั้งผ่านอุปกรณ์ดังกล่าว
                    <div class="mt-5"> <a href="{{url('/')}}" class="btn btn-danger btn-lg px-md-5 radius-30 notranslate">Go Home</a>
                        <a href="javascript:;" onclick="history.back()" class="notranslate btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <img  src="{{ url('/img/stickerline/PNG/52.png') }}" class="img-fluid" alt="">
            </div>
        </div>
        <!--end row-->
    </div>
</div>





    <!-- <div class="text-center">
        <img class="img-mobile-only" src="{{ url('/img/stickerline/PNG/51.png') }}" class="img-fluid" > 
        <h1 class="d-block header-mobile-only">ขออภัย</h1>
        <p class="detail-mobile-only">ระบบนี้ถูกออกแบบมาสำหรับการใช้งานบนสมาร์ทโฟนและแท็บเล็ต <br> คุณสามารถลองใหม่อีกครั้งผ่านอุปกรณ์เหล่านี้เพื่อให้ใช้งานอย่างมีประสิทธิภาพสูงสุด</p>
    </div> -->

</div>
<div id="alert_phone" class=" div_alert " role="alert">
    <div class="alert-child">
        <div >
            <span class="d-block  text-alert font-weight-bold">มีข้อผิดพลาด</span>
            <span class="d-block  text-alert">โปรดตรวจสอบเบอร์โทรให้ถูกต้อง</span>
        </div>
        <i class="fa-solid fa-xmark"></i>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_sos_1669" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel_modal_sos_1669" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered b-radius-10">
        <div class="modal-content b-radius-10">
            <a class="close btn-close-modal-sos-1669"  type="button"  data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </a>
            
            <a id="go_to_show_user" class="d-none" href="">
                Go To SHOW USER
            </a>

            <div id="div_wait_unit" class="d-none">
                <div class="modal-body">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <div id="wait_unit_spinner" class="spinner-border" role="status"> 
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div id="wait_unit_img_success" class="d-none"> 
                            <img src="{{ url('/img/stickerline/PNG/27.png') }}" class="img-fluid" >
                        </div>
                    </div>
                    <h3 id="text_h3_wait_unit" class="text-center text-info mt-5">
                        <b>กำลังรอเจ้าหน้าที่</b>
                    </h3>
                    <!-- <h4 class="text-center mt-2">
                        กำลังค้นหาหน่วยปฏิบัติการ
                    </h4> -->
                    <h5 id="text_h5_wait_unit" class="text-center mt-">
                        โปรดรอสักครู่...
                    </h5>
                </div>
            </div>

            <div id="div_data_ask_for_help" class="">
                <div class="modal-body text-center">
                    <div class="col-12">
                        <div class="text-center h4 user-name">
                            สวัสดีคุณ {{ $user->name }}
                        </div>
                        <div class="text-center h6 mt-3">
                            โปรดตรวจสอบเบอร์โทรของท่านให้ถูกต้อง 
                        </div>
                        <div id="div_data_phone_1669" class="mt-3">
                            <div class="phone-user">
                                @if(!empty($user->phone))
                                <span id="phone_user_1669">{{ $user->phone }}</span>
                                <input style="width: 60%;" class="text-center d-none"  type="phone" id="input_phone_1669" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="edit_phone_1669();">
                                <a class="btn-phone btn ml-3" onclick="
                                document.querySelector('#input_phone_1669').classList.remove('d-none');
                                document.querySelector('#phone_user_1669').classList.add('d-none'); 
                                document.querySelector('#input_phone_1669').focus();
                                ">แก้ไข</a>
                                @else
                                 <input style="width: 60%;"  class="form-control text-center"  type="phone" id="input_not_phone_1669" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone_1669();">
                                @endif
                            </div>
                            <!-- <div style="margin-top:10px;">
                                <b>
                                    <span style="font-size:22px;color: blue;" id="text_phone_1669">
                                        @if(!empty($user->phone))
                                            {{ $user->phone }}
                                        @endif
                                    </span>
                                        @if(!empty($user->phone))
                                            <i style="font-size:25px;" class="fas fa-edit" onclick="document.querySelector('#input_phone_1669').classList.remove('d-none');"></i>
                                        @endif
                                </b>
                            </div>
                            
                            @if(!empty($user->phone))
                                <input style="margin-top:15px;" class="form-control d-none text-center"  type="phone" id="input_phone_1669" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="edit_phone_1669();">
                            @endif

                            @if(empty($user->phone))
                                <input style="margin-top:15px;" class="form-control text-center"  type="phone" id="input_not_phone_1669" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone_1669();">
                            @endif
                            <hr> -->
                        </div>
                        <label class="col-12 mt-3" style="padding:0px;" for="photo_sos_1669" >
                            <div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
                                <div class="form-group p-3"id="add_select_img">
                                    <input class="form-control d-none" name="photo_sos_1669" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_1669" value="" accept="image/*" onchange="document.getElementById('show_photo_sos_1669').src = window.URL.createObjectURL(this.files[0]);check_add_img_1669();">
                                    <div  class="text-center">
                                        <center>
                                            <img id="img_sos_1669" style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                        </center>
                                        <br>
                                        <h3 class="text-center m-0">
                                            <b>เพิ่มภาพถ่าย "คลิก"</b> 
                                        </h3>
                                    </div>
                                    
                                </div>
                                <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_1669" />
                                <div class="child">
                                    <span>เลือกรูป</span>
                                </div>
                            </div>
                        </label>
                    </div>

                </div>
                <script>
                    function check_add_img_1669() {
                        document.querySelector('#show_photo_sos_1669').classList.remove('d-none');
                        document.querySelector('#add_select_img').classList.add('d-none');
                    }
                </script>
                <div class="text-center">
                    <label class="col-12 mt-2 mb-2" style="width: 90%;">
                        ผู้แจ้งเหตุ
                    </label>

                    <center>

                    <button id="btn_type_user_sos_me" type="button" class="btn btn-primary" onclick="show_input_type_user_sos('me');">
                        ตัวฉัน
                    </button>
                    <button id="btn_type_user_sos_relative" type="button" class="btn btn-outline-primary" onclick="show_input_type_user_sos('relative');">
                        ญาติ
                    </button>
                    <button id="btn_type_user_sos_good_citizen" type="button" class="btn btn-outline-primary" onclick="show_input_type_user_sos('good_citizen');">
                        พลเมืองดี
                    </button>
                    <button id="btn_type_user_sos_other" type="button" class="btn btn-outline-secondary" onclick="show_input_type_user_sos('other');">
                        อื่นๆ
                    </button>

                    <input type="text" name="type_reporter" id="type_reporter" class="form-control d-none" value="ผู้ขอความช่วยเหลือ">

                    <input type="text" name="type_reporter_other" id="type_reporter_other" class="form-control mt-3 mb-3 d-none" name="" placeholder="ประเภทผู้แจ้งเหตุ" style="width: 90%;" onchange="change_type_reporter_other();">

                    <script>

                        function change_type_reporter_other(){

                            let type_reporter_other = document.querySelector('#type_reporter_other');

                            document.querySelector('#type_reporter').value = type_reporter_other.value ;
                        }
                        
                        function show_input_type_user_sos(type){

                            let type_reporter_other = document.querySelector('#type_reporter_other');

                            document.querySelector('#btn_type_user_sos_me').classList.remove('btn-primary');
                            document.querySelector('#btn_type_user_sos_relative').classList.remove('btn-primary');
                            document.querySelector('#btn_type_user_sos_good_citizen').classList.remove('btn-primary');
                            document.querySelector('#btn_type_user_sos_other').classList.remove('btn-secondary');

                            document.querySelector('#btn_type_user_sos_me').classList.add('btn-outline-primary');
                            document.querySelector('#btn_type_user_sos_relative').classList.add('btn-outline-primary');
                            document.querySelector('#btn_type_user_sos_good_citizen').classList.add('btn-outline-primary');
                            document.querySelector('#btn_type_user_sos_other').classList.add('btn-outline-secondary');
                            

                            if(type == 'other'){

                                document.querySelector('#type_reporter').value = 'อื่นๆ' ;

                                type_reporter_other.classList.remove('d-none');

                                document.querySelector('#btn_type_user_sos_other').classList.add('btn-secondary');
                                document.querySelector('#btn_type_user_sos_other').classList.remove('btn-outline-secondary');
                            }else{

                                if(type == "me"){
                                    document.querySelector('#type_reporter').value = 'ผู้ขอความช่วยเหลือ' ;
                                }else if(type == "relative"){
                                    document.querySelector('#type_reporter').value = 'ญาติ' ;
                                }
                                else if(type == "good_citizen"){
                                    document.querySelector('#type_reporter').value = 'พลเมืองดี' ;
                                }

                                type_reporter_other.value = '' ;

                                type_reporter_other.classList.add('d-none');

                                document.querySelector('#btn_type_user_sos_' + type).classList.add('btn-primary');
                                document.querySelector('#btn_type_user_sos_' + type).classList.remove('btn-outline-primary');
                            }

                        }

                    </script>

                    <span class="mail-shadow btn btn-md btn-block mt-2" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;width: 90%;" onclick="send_ask_for_help_1669();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block" style="color: #ffffff;">ขอความช่วยเหลือ</span>
                                        <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </span>
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="modal_sos_1669" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel_modal_sos_1669" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <a id="go_to_show_user" class="d-none" href="">
                Go To SHOW USER
            </a>

            <div id="div_wait_unit" class="d-none">
                <div class="modal-body">
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <div class="spinner-border" role="status"> 
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <h3 class="text-center text-info mt-5">
                        <b>เจ้าหน้าที่ได้รับข้อมูลแล้ว</b>
                    </h3>
                    <h4 class="text-center mt-2">
                        กำลังค้นหาหน่วยปฏิบัติการ
                    </h4>
                    <h5 class="text-center mt-">
                        โปรดรอสักครู่...
                    </h5>
                </div>
            </div>

            <div id="div_data_ask_for_help" class="">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="BackdropLabel_modal_sos_1669">
                        สวัสดีคุณ<br>
                        <b style="color:blue;">{{ $user->name }}</b>
                    </h4>
                    <span class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark-large"></i></span>
                    </span>
                </div>

                <div class="modal-body text-center">
                    <div class="col-12">
                        <div id="div_data_phone_1669">
                            <img width="50%" src="{{ asset('/img/stickerline/PNG/7.png') }}">
                            <br>
                            <h3>โปรดยืนยันหมายเลขโทรศัพท์</h3>

                            <div style="margin-top:10px;">
                                <b>
                                    <span style="font-size:22px;color: blue;" id="text_phone_1669">
                                        @if(!empty($user->phone)){{ $user->phone }}@endif
                                    </span>
                                    @if(!empty($user->phone))
                                        <i style="font-size:25px;" class="fas fa-edit" onclick="document.querySelector('#input_phone_1669').classList.remove('d-none');"></i>
                                    @endif
                                </b>
                            </div>
                            
                            @if(!empty($user->phone))
                                <input style="margin-top:15px;" class="form-control d-none text-center"  type="phone" id="input_phone_1669" value="{{ $user->phone }}" placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="edit_phone_1669();">
                            @endif

                            @if(empty($user->phone))
                                <input style="margin-top:15px;" class="form-control text-center"  type="phone" id="input_not_phone_1669" value="" required placeholder="กรุณากรอกหมายเลขโทรศัพท์" oninput="add_phone_1669();">
                            @endif
                            <hr>
                        </div>
                        <label class="col-12" style="padding:0px;" for="photo_sos_1669" >
                            <div class="fill parent" style="border:dotted #db2d2e;border-radius:25px;padding:0px;object-fit: cover;">
                                <div class="form-group p-3"id="add_select_img">
                                    <input class="form-control d-none" name="photo_sos_1669" style="margin:20px 0px 10px 0px;" type="file" id="photo_sos_1669" value="" accept="image/*" onchange="document.getElementById('show_photo_sos_1669').src = window.URL.createObjectURL(this.files[0]);check_add_img();">
                                    <div  class="text-center">
                                        <center>
                                            <img style=" object-fit: cover; border-radius:15px;max-width: 50%;" src="{{ asset('/img/stickerline/PNG/37.2.png') }}" class="card-img-top center" style="padding: 10px;">
                                        </center>
                                        <br>
                                        <h3 class="text-center m-0">
                                            <b>เพิ่มภาพถ่าย "คลิก"</b> 
                                        </h3>
                                    </div>
                                    
                                </div>
                                <img class="full_img d-none" style="padding:0px ;" width="100%" alt="your image" id="show_photo_sos_1669" />
                                <div class="child">
                                    <span>เลือกรูป</span>
                                </div>
                            </div>
                        </label>
                    </div>

                </div>
                <div class="text-center">
                    <center>
                    <span class="mail-shadow btn btn-md btn-block" style="font-family: 'Kanit', sans-serif;border-radius:10px;color:white;background-color:#780908;width: 90%;" onclick="send_ask_for_help_1669();">
                        <div class="d-flex">
                            <div class="col-3 p-0 d-flex align-items-center">
                                <div class="justify-content-center col-12 p-0">
                                    <img src="{{ asset('/img/logo-partner/niemslogo.png') }}" width="70%" style="border:white solid 3px;border-radius:50%"> 
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-9 text-center">
                                <div class="justify-content-center col-12">
                                    <b>
                                        <span class="d-block" style="color: #ffffff;">ขอความช่วยเหลือ</span>
                                        <span class="d-block" style="color: #ffffff;">แพทย์ฉุกเฉิน (1669)</span>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </span>
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div> -->



<br><br>


@include ('layouts.modal_loading')


<input type="hidden" id="text_sos" name="" value="{{ $text_sos }}">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    #map {
      height: calc(45vh);
    }
    
</style>
<script src="{{ asset('js/sos_map.js')}}"></script>

<script>
    var result_area ;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        let condo_id = document.querySelector('#condo_id').value ;

        if (condo_id) {
            // console.log( "condo_id == " +  condo_id  );

            fetch("{{ url('/') }}/api/sos_map/area_condo_id" + "/" + condo_id)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    result_area = result ;

                    if (typeof result_area !== "undefined") {
                        // console.log(result_area)
                        getLocation();
                    }
            });
        }else{
            // console.log( "NOT condo_id");
            fetch("{{ url('/') }}/api/sos_map/all_area")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    result_area = result ;

                    if (typeof result_area !== "undefined") {
                        // console.log(result_area)
                        getLocation();
                    }
            });
        }

        let phone = document.querySelector('#phone').value ;
            
        if (phone === "") {

            // click modal pls input phone
            document.querySelector('#btn_open_pls_input_phone').click();
            // end click modal pls input phone

            let input_phone_url = document.querySelector('#input_phone_url').value ;
            let phone_url_sp = input_phone_url.split("=");

                if (phone_url_sp[1]) {
                    document.querySelector('#phone').value = phone_url_sp[1] ;
                    document.querySelector('#text_phone').innerHTML = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').value = phone_url_sp[1] ;
                    document.querySelector('#input_not_phone').classList.add('d-none') ;
                } 
        }

    });

    function contact_insurance(){

        let latlng = document.querySelector("#latlng").value;
        let div_goto = document.querySelector("#div_goto");
        
        let a = document.createElement("a");
        let href = document.createAttribute("href");
            href.value = "{{ url('/sos_insurance_blade') }}?latlng="+latlng;

        let id = document.createAttribute("id");
            id.value = "goto_sos_insurance";

        a.setAttributeNode(href); 
        a.setAttributeNode(id); 

        div_goto.appendChild(a);  

        document.querySelector("#goto_sos_insurance").click();
    }    

    function capture_registration(){

        var video = document.querySelector("#videoElement");
        var photo2 = document.querySelector("#photo2");
        var canvas = document.querySelector("#canvas");
        var text_img = document.querySelector("#text_img");
        var context = canvas.getContext('2d');

        document.querySelector('.btn-cancel-take-photo').classList.remove('d-none');

        document.querySelector('.btn-show-ex-img').classList.add('d-none');
        document.querySelector('.text-gps').classList.add('d-none');
        document.querySelector('#add_img').classList.add('d-none');
        document.querySelector('#ex_img').classList.add('d-none');
        document.querySelector('#videoElement').classList.remove('d-none');

        document.querySelector('.btn-show-camera').classList.add('d-none');
        document.querySelector('.btn-take-photo').classList.remove('d-none');
        photo2.classList.add('d-none');

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: { facingMode: { exact: "environment" } } }) 
            .then(function (stream) {
              if (typeof video.srcObject == "object") {
                  video.srcObject = stream;
                } else {
                  video.src = URL.createObjectURL(stream);
                }
            })
            .catch(function (err0r) {
              console.log("Something went wrong!");
            });
        }

        document.querySelector('#btn_help_area').disabled = true;

    }

    function stop(e) {

        document.querySelector('.text-gps').classList.remove('d-none');
        document.querySelector('.btn-show-ex-img').classList.remove('d-none');
        document.querySelector('.btn-show-ex-img').classList.remove('slide-top');
        document.querySelector('.btn-show-camera').classList.remove('d-none');
        document.querySelector('#add_img').classList.remove('d-none');
        document.querySelector('#videoElement').classList.add('d-none');
        document.querySelector('.btn-cancel-take-photo').classList.add('d-none');

        // document.querySelector('.btn-take-photo').classList.add('d-none');
        document.querySelector('.btn-show-camera').classList.remove('d-none');  
    
        if (document.querySelector('.btn-take-photo').classList.contains('d-none')) {
            document.querySelector('.btn-retake-photo').classList.add('d-none');
            document.querySelector('#photo2').classList.add('d-none');
        } else{
            document.querySelector('.btn-take-photo').classList.add('d-none');
            
        }

        if (document.querySelector('#text_add_img').classList.contains('d-none')) {
            document.querySelector('#btn_help_area').disabled = false;
        } else{
            document.querySelector('#btn_help_area').disabled = true;
        }

        var video = document.querySelector("#videoElement");
        var photo2 = document.querySelector("#photo2");
        var canvas = document.querySelector("#canvas");
        var text_img = document.querySelector("#text_img");
        var context = canvas.getContext('2d');
          
          var stream = video.srcObject;
          var tracks = stream.getTracks();

          for (var i = 0; i < tracks.length; i++) {
            var track = tracks[i];
            track.stop();
          }

          video.srcObject = null;

          
    }

    function capture() {

        var video = document.querySelector("#videoElement");
        var text_img = document.querySelector("#text_img");

        var photo2 = document.querySelector("#photo2");
        var canvas = document.querySelector("#canvas");

        document.querySelector('#videoElement').classList.add('d-none');
        document.querySelector('.btn-take-photo').classList.add('d-none');
        document.querySelector('.btn-retake-photo').classList.remove('d-none');
        // var div_cam = document.querySelector("#div_cam");
        //     div_cam.classList.add('d-none');

            photo2.classList.remove('d-none');

            let context = canvas.getContext('2d');
                context.drawImage(video, 0, 0,300,400);
                // context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);

            photo2.setAttribute('src',canvas.toDataURL('image/png'));
            text_img.value = canvas.toDataURL('image/png');


        // document.querySelector('#btn_check_time').classList.remove('d-none');
        document.querySelector('#btn_help_area').disabled = false;

        
        
        
    }

    function call_sos_of_js100() {
        let text_phone = document.querySelector("#text_phone");
        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");

        let content = document.querySelector("#content");
        content.value = 'emergency_js100';

        let btn_tel = document.querySelector('#btn_tel');

        let tag_a = document.createElement("a");

        let tag_a_href = document.createAttribute("href");
        tag_a_href.value = 'tel:1137';
        tag_a.setAttributeNode(tag_a_href);

        let tag_a_id = document.createAttribute("id");
        tag_a_id.value = 'btn_js_1137';
        tag_a.setAttributeNode(tag_a_id);

        btn_tel.appendChild(tag_a);

        document.querySelector("#btn_js_1137").click();
        document.querySelector("#btn_submit").click();


    }

    function area_help_general(){
        let content = document.querySelector("#content");
            content.value = 'help_area';

        document.querySelector('#text_add_img').classList.add('d-none');
        document.querySelector('#btn_help_area').disabled = false;

        document.querySelector("#a_help_modal").click();
    }

    function sos_of_Charlie_Bangkok() {

        let content = document.querySelector("#content");
            content.value = 'emergency_Charlie_Bangkok';

        document.querySelector('#text_add_img').classList.remove('d-none');
        document.querySelector('#btn_help_area').disabled = true;

        document.querySelector('#div_data_tag_sos').classList.add('d-none');

        document.querySelector("#a_help_modal_for_charlie").click();

    }

    function check_input_pls_input_phone(){

        let input_pls_input_phone = document.querySelector('#input_pls_input_phone').value;

        if (input_pls_input_phone) {
            document.querySelector('#cf_input_pls_input_phone').classList.remove('d-none');
        }else{
            document.querySelector('#cf_input_pls_input_phone').classList.add('d-none');
        }
    }

    function click_cf_input_pls_input_phone(){
        let input_pls_input_phone = document.querySelector('#input_pls_input_phone');
        let user_id = document.querySelector('#user_id');

        fetch("{{ url('/') }}/api/input_pls_input_phone/" + input_pls_input_phone.value + "/" + user_id.value)
            .then(response => response.text())
            .then(result => {
                console.log(result);
            });

        window.location.href = window.location.href;
        // document.querySelector('#btn_close_pls_input_phone').click();
    }

    function search_title_sos_charlie(){

        let title_sos = document.querySelector('#title_sos');
            title_sos.innerHTML = '' ;

        let name_partner = "ชาลีกรุงเทพ" ;

        fetch("{{ url('/') }}/api/search_title_sos/" + name_partner)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result['check_data'] == "Yes data"){
                    for(let item of result['sos_map_title']){
                        let option = document.createElement("option");
                        option.text = item.title;
                        option.value = item.title;
                        title_sos.add(option);

                        let option_class = document.createAttribute("class");
                            option_class.value = "translate";
                         
                        option.setAttributeNode(option_class);

                    }
                }

                if(name_partner != "กลุ่มดิจิทัล สพฉ"){

                    let option_other = document.createElement("option");
                        option_other.text = "อื่นๆ";
                        option_other.value = "อื่นๆ";
                        title_sos.add(option_other); 

                        let option_other_class = document.createAttribute("class");
                            option_other_class.value = "translate";
                         
                        option_other.setAttributeNode(option_other_class); 
                }

                let html_option = `
                        <option class="translate" value="การขอความช่วยเหลือ" selected > - เลือกหัวข้อการขอความช่วยเหลือ - </option>
                        <option class="translate" value="เหตุด่วนเหตุร้าย">เหตุด่วนเหตุร้าย</option>
                        <option class="translate" value="อุบัติเหตุ">อุบัติเหตุ</option>
                        <option class="translate" value="ไฟไหม้">ไฟไหม้</option>
                    `;

                title_sos.insertAdjacentHTML('afterbegin', html_option); // แทรกบนสุด


            });

    }

    function search_title_sos(){

        let title_sos = document.querySelector('#title_sos');
            title_sos.innerHTML = '' ;
        let name_partner = document.querySelector('#area_help').innerText ;
            // console.log(name_partner);

        if(!name_partner){
            name_partner = "all_area" ;
        }

        fetch("{{ url('/') }}/api/search_title_sos/" + name_partner)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result['check_data'] == "Yes data"){
                    for(let item of result['sos_map_title']){
                        let option = document.createElement("option");
                        option.text = item.title;
                        option.value = item.title;
                        title_sos.add(option);

                        let option_class = document.createAttribute("class");
                            option_class.value = "translate";
                         
                        option.setAttributeNode(option_class);

                    }
                }

                if(name_partner != "กลุ่มดิจิทัล สพฉ"){

                    let option_other = document.createElement("option");
                        option_other.text = "อื่นๆ";
                        option_other.value = "อื่นๆ";
                        title_sos.add(option_other); 

                        let option_other_class = document.createAttribute("class");
                            option_other_class.value = "translate";
                         
                        option_other.setAttributeNode(option_other_class); 
                }

                let html_option = `
                        <option class="translate" value="การขอความช่วยเหลือ" selected > - เลือกหัวข้อการขอความช่วยเหลือ - </option>
                        <option class="translate" value="เหตุด่วนเหตุร้าย">เหตุด่วนเหตุร้าย</option>
                        <option class="translate" value="อุบัติเหตุ">อุบัติเหตุ</option>
                        <option class="translate" value="ไฟไหม้">ไฟไหม้</option>
                    `;

                title_sos.insertAdjacentHTML('afterbegin', html_option); // แทรกบนสุด


            });

    }

</script>


<script>
    // Add an event listener for when the user presses a key
    document.addEventListener("keydown", function(event) {
        // If the key pressed was Enter
        if (event.key === "Enter") {
            // Prevent the default form submission behavior
            event.preventDefault();
        }
    });
</script>

<!-- //// SOS 1669 //// -->
<script>

    function check_user_in_area(position) {
        let btn_ask_1669 = document.querySelector('#btn_ask_1669');

        let lat = position.coords.latitude ;
        let lng = position.coords.longitude ;
        let latlng = position.coords.latitude+","+position.coords.longitude ;

            // console.log(lat);
            // console.log(lng);
            // console.log(latlng);
            // alert('>> ไม่ต้องเข้าอันนั้นอ่ะ <<');

        fetch("{{ url('/') }}/api/draw_area_help_center/" + "ศูนย์ใหญ่")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                // alert('>> นอก for <<');

                for (let ii = 0; ii < result.length; ii++) {

                    // console.log('>>> ' + result[ii]['province_name']);
                    // console.log(result[ii]['sos_1669_show']);

                    if (result[ii]['sos_1669_show'] == 'show') {

                        // alert('>> if 749 ' + result[ii]['sos_1669_show'] + " <<");

                        let arr_lat_lng = JSON.parse(result[ii]['polygon']);
                    
                        if (arr_lat_lng !== null) {
                            let area_arr = [] ;

                            let arr_length = JSON.parse(result[ii]['polygon']).length;

                            for(z = 0; z < arr_length; z++){
                                let text_latlng = parseFloat(arr_lat_lng[z]['lat']) + "," + parseFloat(arr_lat_lng[z]['lng']) ;
                                    text_latlng = JSON.parse("[" + text_latlng + "]");

                                area_arr.push(text_latlng);
                            }
                            
                            if ( inside_1669([ lat, lng ], area_arr) ) {
                                // console.log('You inside area 1669!!');
                                document.querySelector('#name_area_1669').innerHTML = result[ii]['province_name'];
                                btn_ask_1669.classList.remove('d-none');
                                document.querySelector('#btn_tel_1669').classList.add('d-none');
                                break;
                            }else{
                                // console.log('You NO inside ');
                                btn_ask_1669.classList.add('d-none');
                            }
                            
                        }
                    }else{

                        // alert('>> else 775 ' + result[ii]['sos_1669_show'] + " <<");
                        // document.querySelector('#btn_tel_1669').classList.remove('d-none');

                        let check_user_id = '{{ Auth::user()->id }}' ;
                        let check_role = '{{ Auth::user()->role }}' ;
                        let check_organization = '{{ Auth::user()->organization }}' ;

                        if ( check_user_id == '1' || check_user_id == '64' || check_user_id == '2' || check_user_id == '11003429') {
                            btn_ask_1669.classList.remove('d-none');
                            break;
                        }else{
                            btn_ask_1669.classList.add('d-none');
                        }

                        if (  check_organization == 'สพฉ' && check_role == 'admin-partner' || check_role == 'partner' ) {
                            btn_ask_1669.classList.remove('d-none');
                            break;
                        }else{
                            btn_ask_1669.classList.add('d-none');
                        }

                    }
                }
        });

        
    }

    function inside_1669(point, vs) {
        // console.log(vs);

        let x = point[0], y = point[1];
        
        let inside = false;

        for (let i = 0, j = vs.length - 1; i < vs.length; j = i++) {
            let xi = vs[i][0], yi = vs[i][1];
            let xj = vs[j][0], yj = vs[j][1];
            
            let intersect = ((yi > y) != (yj > y))
                && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
            if (intersect) inside = !inside;
        }
        // console.log(inside);
        return inside;

    }

    function send_ask_for_help_1669(){
        // console.log('send_ask_for_help_1669');

        let phone_1669 = document.querySelector("#input_phone_1669");
        var phoneno = /^\d{10}$/;
        if (phone_1669.value.match(phoneno)) {
            let name = document.querySelector("#name");
            let phone = document.querySelector("#phone");
            let user_id = document.querySelector("#user_id");
            let lat = document.querySelector("#lat");
            let lng = document.querySelector("#lng");
            let type_reporter = document.querySelector("#type_reporter");
            // let photo_sos_1669 = document.querySelector("#photo_sos_1669");

            // --------------- get district ---------------------- //
            const geocoder = new google.maps.Geocoder();

            const latlng = {
                lat: parseFloat(lat.value),
                lng: parseFloat(lng.value),
            };
            geocoder
                .geocode({ location: latlng })
                .then((response) => {
                    // console.log(response);
                    let district_P ;
                    let district_A ;
                    let district_T ;

                    //// ถ้าอยากรับอย่างอื่นเข้าไปดูที่ results[0]['address_components']['types'] ////
                    
                    const resultType_P = "administrative_area_level_1";
                    const resultType_A = "administrative_area_level_2";

                    const resultType_T_1 = "locality";
                    const resultType_T_2 = "sublocality";
                    const resultType_T_3 = "sublocality_level_1";

                    //// รับ จังหวัด อย่างเดียว ////
                    for (const component_p of response.results[0].address_components) {
                        if (component_p.types.includes(resultType_P)) {
                            district_P = component_p.long_name;
                            // console.log(district_P);
                            break;
                        }
                    }
                    //// รับ อำเภอ อย่างเดียว ////
                    for (const component_a of response.results[0].address_components) {
                        if (component_a.types.includes(resultType_A)) {
                            district_A = component_a.long_name;
                            // console.log(district_A);
                            break;
                        }
                    }
                    //// รับ ตำบล อย่างเดียว ////
                    for (const component_t of response.results[0].address_components) {
                        if (component_t.types.includes(resultType_T_1)) {
                            district_T = component_t.long_name;
                            // console.log(district_T);
                            break;
                        }
                    }
                    // // เช็คว่ามีข้อมูลตำบลหรือไม่ // //
                    if (!district_T) {
                        for (const component_t of response.results[0].address_components) {
                            if (component_t.types.includes(resultType_T_2)) {
                                district_T = component_t.long_name;
                                // console.log(district_T);
                                break;
                            }
                        }
                    }
                    if (!district_T) {
                        for (const component_t of response.results[0].address_components) {
                            if (component_t.types.includes(resultType_T_3)) {
                                district_T = component_t.long_name;
                                // console.log(district_T);
                                break;
                            }
                        }
                    }

                    // API UPLOAD IMG //
                    let formData = new FormData();
                    let imageFile = document.getElementById('photo_sos_1669').files[0];
                        formData.append('image', imageFile);

                    let data_sos_1669 = {
                        "name_user" : name.value,
                        "phone_user" : phone.value,
                        "user_id" : user_id.value,
                        "type_reporter" : type_reporter.value,
                        "lat" : lat.value,
                        "lng" : lng.value,
                        "changwat" : district_P,
                        "amphoe" : district_A,
                        "tambon" : district_T,
                        "all_address" : response.results[0].formatted_address,
                    }
                    // console.log(data_sos_1669);

                    formData.append('name_user', data_sos_1669.name_user);
                    formData.append('phone_user', data_sos_1669.phone_user);
                    formData.append('user_id', data_sos_1669.user_id);
                    formData.append('type_reporter', data_sos_1669.type_reporter);
                    formData.append('lat', data_sos_1669.lat);
                    formData.append('lng', data_sos_1669.lng);
                    formData.append('changwat', data_sos_1669.changwat);
                    formData.append('amphoe', data_sos_1669.amphoe);
                    formData.append('tambon', data_sos_1669.tambon);
                    formData.append('all_address', data_sos_1669.all_address);

                    fetch("{{ url('/') }}/api/create_new_sos_by_user", {
                        method: 'POST',
                        body: formData
                    }).then(function (response){
                        return response.text();
                    }).then(function(data){
                        // console.log(data);
                        document.querySelector('#div_data_ask_for_help').classList.add('d-none');
                        document.querySelector('#div_wait_unit').classList.remove('d-none');

                        check_unit_cf_sos(data);

                    }).catch(function(error){
                        // console.error(error);
                    });

                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
            // --------------- end get district ---------------------- //
        } else {

            document.querySelector('#alert_phone').classList.add('up-down');

            const animated = document.querySelector('.up-down');
            animated.onanimationend = () => {
                document.querySelector('#alert_phone').classList.remove('up-down');
            };
            
        }
        

    }

    function edit_phone_1669() {
        let phone = document.querySelector("#phone");
        let text_phone_1669 = document.querySelector("#text_phone_1669");
        let input_phone_1669 = document.querySelector("#input_phone_1669");
            text_phone_1669.innerHTML = input_phone_1669.value ;
            phone.value = input_phone_1669.value ;
            // console.log(text_phone_1669.innerHTML);
    }

    function add_phone_1669() {
        let phone = document.querySelector("#phone");
        let text_phone_1669 = document.querySelector("#text_phone_1669");
        let input_not_phone_1669 = document.querySelector("#input_not_phone_1669");
            text_phone_1669.innerHTML = input_not_phone_1669.value ;
            phone.value = input_not_phone_1669.value ;
            // console.log(text_phone.innerHTML);
    }

    function edit_phone() {
        let phone = document.querySelector("#input_phone");
        let text_phone = document.querySelector("#text_phone");
        let input_phone = document.querySelector("#input_phone");
            text_phone.innerHTML = input_phone.value ;
            phone.value = input_phone.value ;
            // console.log(text_phone_1669.innerHTML);
    }

  

    function check_unit_cf_sos(sos_id){
        reface_check_unit_cf_sos = setInterval(function() {
            send_api_check_unit_cf_sos(sos_id);
        }, 5000);
    }

    function myStop_reface_check_unit_cf_sos() {
        clearInterval(reface_check_unit_cf_sos);
    }

    function send_api_check_unit_cf_sos(sos_id){

        fetch("{{ url('/') }}/api/check_unit_cf_sos_form_user" + "/" + sos_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                
                if (result['command_by']){

                    myStop_reface_check_unit_cf_sos();
                    loop_check_officer_command_in_call(sos_id , result['name_officer_command']);

                    document.querySelector('#text_h3_wait_unit').innerHTML = "เจ้าหน้าที่รับเรื่องแล้ว"
                    document.querySelector('#text_h5_wait_unit').innerHTML = "เจ้าหน้าที่ : "+result['name_officer_command'];

                    let btn_html_video_call = `
                        <br>
                        <a id="btn_join_video_call" href="{{ url('/') }}/user_video_call/sos_help_center?sos_id=`+result['id']+`" class="btn btn-info main-radius main-shadow mt-3">
                            Video Call
                        </a>
                    `;
                    document.querySelector('#text_h5_wait_unit').insertAdjacentHTML('beforeend', btn_html_video_call); // แทรกล่างสุด

                    document.querySelector('#wait_unit_spinner').classList.add('d-none');
                    document.querySelector('#wait_unit_img_success').classList.remove('d-none');
                }

                // if (result['status'] === "ออกจากฐาน") {
                    
                //     myStop_reface_check_unit_cf_sos();

                //     let go_to_show_user = document.querySelector('#go_to_show_user');
                //     let go_to_show_user_href = document.createAttribute("href");
                //         go_to_show_user_href.value = '{{ url("/") }}/sos_help_center/'+sos_id+'/show_user' ;
                //         go_to_show_user.setAttributeNode(go_to_show_user_href);

                //     setTimeout(function() {
                //         // document.querySelector('#go_to_show_user').click();
                //         document.querySelector('#go_to_show_user').classList.remove('d-none');
                //     }, 1000);
                // }
        });
    }

    function loop_check_officer_command_in_call(sos_id , name_officer_command) {
        check_officer_command = setInterval(function() {
            check_officer_command_in_call(sos_id , name_officer_command);
        }, 4000);
    }

    function myStop_check_officer_command_in_call() {
        clearInterval(check_officer_command);
    }

    var audio_ringtone = new Audio("{{ asset('sound/ringtone-126505.mp3') }}");
    var isPlaying_ringtone = false;
    var check_create_btn_join_video_call_1 = true ;
    var check_create_btn_join_video_call_2 = true ;
    var mute_check = 'เปิด' ;

    function check_officer_command_in_call(sos_id , name_officer_command){

        fetch("{{ url('/') }}/api/check_officer_command_in_call" + "/" + sos_id)
            .then(response => response.json())
            .then(result => {
                // console.log("check_officer_command_in_call");
                
                // มี เจ้าหน้าที่อยู่ในสาย
                if (result['member_in_room']){

                    // console.log("มี เจ้าหน้าที่ในสาย");
                    // console.log(result);

                    // ตรวจสอบสร้างการแจ้งเตือนสายเรียกเข้า
                    if (check_create_btn_join_video_call_1){
                        let html_btn_join_video_call = `
                            <br><br>
                            <span class="text-danger mt-3">เจ้าหน้าที่อยู่ในสายแล้ว</span>
                            <br><br>
                            <span class="btn btn-sm btn-secondary" style="width:60;" onclick="func_mute_audio();">
                                <i class="fa-solid fa-volume-slash"></i>
                            </span>
                        `;

                        document.querySelector('#btn_join_video_call').innerHTML = 
                        `<i class="fa-solid fa-phone-volume fa-bounce"></i> &nbsp;&nbsp; Video Call`;
                        document.querySelector('#text_h5_wait_unit').insertAdjacentHTML('beforeend', html_btn_join_video_call); // แทรกล่างสุด

                        check_create_btn_join_video_call_1 = false ;
                        check_create_btn_join_video_call_2 = true ;
                    }

                    if(mute_check == 'เปิด'){
                        play_ringtone();
                    }
                    
                }else{
                    // ไม่มี เจ้าหน้าที่ในสาย
                    // console.log("ไม่มี เจ้าหน้าที่ในสาย");
                    // console.log(result);

                    if(check_create_btn_join_video_call_2){
                        document.querySelector('#text_h5_wait_unit').innerHTML = "เจ้าหน้าที่ : "+name_officer_command;
                        let btn_html_video_call = `
                            <br>
                            <a id="btn_join_video_call" href="{{ url('/') }}/user_video_call/sos_help_center?sos_id=`+sos_id+`" class="btn btn-info main-radius main-shadow mt-3">
                                Video Call
                            </a>
                        `;
                        document.querySelector('#text_h5_wait_unit').insertAdjacentHTML('beforeend', btn_html_video_call); // แทรกล่างสุด

                        check_create_btn_join_video_call_1 = true ;
                        check_create_btn_join_video_call_2 = false ;
                    }
                    stop_ringtone();
                    mute_check = 'เปิด' ;

                }

                // console.log("==========================");


            });

    }

    function play_ringtone() {
      if (!isPlaying_ringtone) {
        audio_ringtone.loop = true;
        audio_ringtone.play();
        isPlaying_ringtone = true;
        mute_check = 'ปิด' ;
      }
    }

    function stop_ringtone() {
      audio_ringtone.pause();
      audio_ringtone.currentTime = 0;
      isPlaying_ringtone = false;
    }

    function func_mute_audio(){
        mute_check = 'ปิด' ;
        stop_ringtone();
    }

    
</script>
<!-- //// SOS 1669 //// -->

