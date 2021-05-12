<div class="col col-md-3 order-2 order-lg-1 d-none d-lg-block" >
    <div class="card">
        <div class="card-body" style="padding: 2rem;">
        <div class="call__text">
            <a href="{{ url('/profile' ) }}">
            <i class="fas fa-user-edit"></i> &nbsp;&nbsp;ข้อมูลส่วนบุคคล </a>
        </div><br>
        <div class="call__text">
            <a href="{{ url('/register_car' ) }}">
            <i class="fas fa-motorcycle"></i>&nbsp;&nbsp;รถของฉัน </a>
        </div><br>
        <!-- <div class="call__text">
            <a href="{{ url('/wishlist' ) }}">
            <i class="fa fa-heart" ></i>&nbsp;&nbsp;รายการโปรด </a>
        </div><br> -->
        <div class="call__text">
            <a href="{{ url('/sell' ) }}">
            <i class="fas fa-car"></i>&nbsp;&nbsp;ขายรถยนต์ </a>
        </div><br>
        <div class="call__text">
            <a href="{{ url('/motercycles' ) }}">
            <i class="fas fa-motorcycle"></i>&nbsp;&nbsp;ขายรถจักรยานยนต์ </a>
        </div><br>
        
        
        </div>
    </div>
</div>

<div class="row d-block d-md-none" style="padding:10px;">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
            <ul class="nav nav-pills nav-pills-danger" role="tablist">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;margin-left: -5px;">
                    <li class="col-12 nav-item" >
                        <a   href="{{ url('/profile' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_user.png' ) }}">
                                </div>
                                <div class=" col-9">
                                    <span style="font-size: 16px;"><b>ข้อมูลส่วนบุคคล</b></span>
                                </div>
                                
                            </div>

                        </a>
                        </li>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;margin-left: -5px;">
                        <a href="{{ url('/sell' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_car.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>ขาย<br>รถยนต์</b></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </ui>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-10 btn btn-outline-danger  main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;">
                        <a href="{{ url('/register_car' ) }}">
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
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-danger main-shadow" style="border-width: 2px; border-radius: 10px;font-size: 13px;margin: 5px;">
                        <a href="{{ url('/motercycles' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img width="40" src="{{ url('/img/icon/menu_motorcycle.png' ) }}">
                                </div>
                                <div class="col-9">
                                    <span style="font-size: 16px;"><b>ขาย<br>จักรยานยนต์</b></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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