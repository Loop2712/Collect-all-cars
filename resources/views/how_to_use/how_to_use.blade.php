@extends('layouts.viicheck')

@section('content')
<!-- <div class="card col-12" style="width: 18rem;top:150px;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->

<center>
    <div class="card-deck col-11" style="margin-top:150px;" >
        <div class="card" style="font-family: 'Prompt', sans-serif;">
            <br>
            <center><img src="{{ asset('/img/stickerline/Flex/9.png') }}" style="background-color: #F9E79F ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">ขั้นตอนลงทะเบียน Viicheck</h5>
            <p class="card-text">detail</p>
            <a href="#" data-toggle="modal" data-target="#Viicheck">
                รายละเอียดเพิ่มเติม »
            </a>
            </div>
        </div>
        <div class="card">
            <br>
            <center><img src="{{ asset('/img/stickerline/Flex/6.png') }}" style="background-color: #E59866 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">วิธีใช้งาน VMove</h5>
            <p class="card-text">detail</p>
            <a href="#" class="card-link">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
        <div class="card">
            <br>
            <center><img src="{{ asset('/img/stickerline/Flex/1.png') }}" style="background-color: #76D7C4 ;border-radius: 50%;" width="35%" alt="Card image cap"></center>
            <div class="card-body">
            <h5 class="card-title" style="font-family: 'Prompt', sans-serif;">วิธีใช้งาน SOS</h5>
            <p class="card-text">detail</p>
            <a href="#" class="card-link">รายละเอียดเพิ่มเติม »</a>
            </div>
        </div>
    </div>
    <div class="card col-11 d-block d-md-none" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;top:150px;">                 
        <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
            <div class="col-10" style="margin-bottom:0px">
                    <h5 style="margin-bottom:0px">ขั้นตอนลงทะเบียน Viicheck</h5>
            </div> 
            <div class="col-2 align-self-center" style="vertical-align: middle;">
                <i class="fas fa-angle-down" data-toggle="collapse" data-target="#howtouse1" aria-expanded="false" aria-controls="howtouse1" ></i>
                </div>
            <div class="col-12 collapse" id="howtouse1">
                <hr>asdad
            </div>
        </div>
    </div>
</center> 


<!------------------------------------------- Modal ลงทะเบียน Viicheck ------------------------------------------->
<div class="modal fade" id="Viicheck" tabindex="-1" role="dialog" aria-labelledby="ViicheckTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ViicheckTitle">ขั้นตอนลงทะเบียน Viicheck</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><img src="{{ asset('/img/วิธีใช้งาน/2.jpg') }}" width="100%" alt="Card image cap"></center><br>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px">
                        <h5 style="margin-bottom:0px">1.เข้าสู่ระบบ</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;">
                    <i class="fas fa-angle-down" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" ></i>
                    </div>
                <div class="col-12 collapse" id="login">
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px">
                        <h5 style="margin-bottom:0px">2.เข้าสู่ระบบด้วย Social</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;">
                    <i class="fas fa-angle-down" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" ></i>
                    </div>
                <div class="col-12 collapse" id="Social_login">
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
            <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                <div class="col-10" style="margin-bottom:0px">
                        <h5 style="margin-bottom:0px">3.เข้าสู่ระบบด้วย Social</h5>
                </div> 
                <div class="col-2 align-self-center text-center" style="vertical-align: middle;">
                    <i class="fas fa-angle-down" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" ></i>
                    </div>
                <div class="col-12 collapse" id="Social_login">
                    <hr>
                    
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------- Modal ลงทะเบียน Viicheck ------------------------------------------->

<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
