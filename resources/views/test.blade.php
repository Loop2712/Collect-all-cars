@extends('layouts.main')
@section('add')
<style>
.order-card {
    color: #fff;
}

.bg-c-monte-carlo {
    background: linear-gradient(45deg,#CC95C0,#DBD4B4,#7AA1D2);
}

.bg-c-paradise {
    background: linear-gradient(30deg,#7AA1D2,#F8CDDA);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 ">
            <div class="card bg-c-monte-carlo order-card">
                <div class="card-block">
                    <h4>ยี่ห้อ</h4><br>
                    <h5 class="text-right"><span class="f-left">Vehicle Act</span><span>2021-02-12</span></h5>
                    <h5 class="text-right"><span class="f-left">Vehicle Act</span><span>2021-02-12</span></h5><br>
                    <a class="btn btn-success btn-sm f-left" style="border-radius: 15px;" href="http://localhost/Collect-all-cars/public/register_car/2"> <i class="fas fa-hand-holding-usd"></i> Sell </a>
                    <a class="btn btn-primary btn-sm f-right" style="border-radius: 15px;" href="#"><i class="fas fa-donate"></i> Promise</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-4 ">
            <div class="card bg-c-paradise order-card">
                <div class="card-block">
                    <h4>ยี่ห้อ</h4><br>
                    <h5 class="text-right"><span class="f-left">Vehicle Act</span><span>2021-02-12</span></h5>
                    <h5 class="text-right"><span class="f-left">Vehicle Act</span><span>2021-02-12</span></h5><br>
                    <a class="btn btn-success btn-sm f-left" style="border-radius: 15px;" href="#"> <i class="fas fa-hand-holding-usd"></i> Sell </a>
                    <a class="btn btn-primary btn-sm f-right" style="border-radius: 15px;" href="#"><i class="fas fa-donate"></i> Promise</a>
                </div>
            </div>
        </div>

	</div>
</div>
@endsection