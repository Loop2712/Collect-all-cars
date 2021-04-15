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
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-primary" style="border-radius: 10px;font-size: 13px;">
                        <a class="text-primary" href="{{ url('/profile' ) }}">
                            <div class="row">
                                <div class="col-3">
                                    <img style="margin-left: -6px;" width="40" src="{{ url('/img/icon/user.png' ) }}">
                                </div>
                                <div class="col-9">
                                    ข้อมูลส่วนบุคคล
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-danger" style="border-radius: 10px;font-size: 13px;">
                        <a class="text-danger" href="{{ url('/sell' ) }}">
                            <center><i class="fas fa-car"></i>
                                <br>
                                ขายรถยนต์
                            </center>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-10 btn btn-outline-success" style="border-radius: 10px;font-size: 13px;">
                        <a class="text-success" href="{{ url('/register_car' ) }}">
                            <center>
                                <i class="fas fa-motorcycle"></i>
                                <br>
                                รถของฉัน
                            </center>
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 btn btn-outline-warning" style="border-radius: 10px;font-size: 13px;">
                        <a class="text-warning" href="{{ url('/motercycles' ) }}">
                            <center>
                                <i class="fas fa-motorcycle"></i>
                                <br>
                                ขายรถจักรยานยนต์ 
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
