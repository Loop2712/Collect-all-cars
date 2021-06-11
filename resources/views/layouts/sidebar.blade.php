<div class="col col-md-3 order-2 order-lg-1 d-none d-lg-block" >
    <div class="card">
        <div class="card-body" style="padding: 2rem;">
        <div class="call__text">
            <a href="{{ url('/profile' ) }}">
            <img width="34" style="margin-left: -8px;" src="{{ url('/img/stickerline/PNG/tab.png') }}"> ข้อมูลส่วนบุคคล </a>
        </div><br>
        <div class="call__text">
            <a href="{{ url('/register_car' ) }}">
            <img width="28" style="margin-left: -5px;" src="{{ url('/img/icon/menu_car.png') }}">&nbsp;&nbsp;รถของฉัน </a>
        </div>
        <!-- <br>
        <div class="call__text">
            <a href="{{ url('/wishlist' ) }}">
            <i class="fa fa-heart" ></i>&nbsp;&nbsp;รายการโปรด </a>
        </div><br> 
        <div class="call__text">
            <a href="{{ url('/sell' ) }}">
            <i class="fas fa-car"></i>&nbsp;&nbsp;ขายรถยนต์ </a>
        </div><br>
        <div class="call__text">
            <a href="{{ url('/motercycles' ) }}">
            <i class="fas fa-motorcycle"></i>&nbsp;&nbsp;ขายรถจักรยานยนต์ </a>
        </div><br> -->
        </div>
    </div>
</div>

<div class="row d-block d-md-none" style="padding:10px; margin: -50px 15px">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
            <ul class="nav nav-pills nav-pills-danger" role="tablist">
                <div class="row">
                    <div class="col-1"></div>
                    <div id="btn_profile" class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;margin-left: -5px;">
                        <a id="btn_a_profile" class="text-danger"  href="{{ url('/profile' ) }}">
                            <div class="row">
                                <div class="col-3" style="margin-top:3px;">
                                    <img style="margin-left: -9px;" width="55" src="{{ url('/img/stickerline/PNG/tab.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>ข้อมูลส่วนบุคคล</b></span>
                                </div>
                                
                            </div>

                        </a>
                        
                    </div>
                    <!--<div class="col-1"></div>
                    <div id="btn_sellcar" class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;margin-left: -5px;">
                        <a id="btn_a_sellcar" class="text-danger" href="{{ url('/sell' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_car.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>ขาย<br>รถยนต์</b></span>
                                </div>
                            </div>
                        </a>
                    </div>-->
                </div>
            </ui>
            </div>
            <div class="col-6">
                <div class="row">
                    <div id="btn_registercar" class="col-10 btn btn-outline-danger  main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;">
                        <a id="btn_a_registercar" class="text-danger" href="{{ url('/register_car' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_car-key2.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>รถ<br>ของฉัน</b></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--<div class="col-1"></div>
                    <div id="btn_sellmotorcycle" class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;">
                        <a id="btn_a_sellmotorcycle" class="text-danger" href="{{ url('/motercycles' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_motorcycle.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>ขาย<br>จักรยานยนต์</b></span>
                                </div>
                            </div>
                        </a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
<style>
    .nav-pills .nav-item .nav-link {
    font-size: 12px;
    color: #DC3545;
    text-align: center;
    border-radius: 4px;
    border: 1px solid #DC3545;
    padding: 5px 9px 5px 9px;
}
.nav-pills.nav-pills-danger .nav-item .nav-link.active, .nav-pills.nav-pills-danger .nav-item .nav-link.active:focus, .nav-pills.nav-pills-danger .nav-item .nav-link.active:hover {
    background-color: #DC3545;
    box-shadow: 0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgba(244,67,54,.6);
    color: #fff;
}
.call__text{

    color: #DC3545;
}
</style>