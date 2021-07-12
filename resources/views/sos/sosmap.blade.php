@extends('layouts.sos')
@section('content')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-NoP20OejFNd_gxMizvmRCDHwRPg0gJI" ></script>
<style type="text/css">
    #map {
      height: calc(30vh);
    }
    
</style>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    document.getElementById("btn_getLocation").click();
    
});

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    navigator.geolocation.getCurrentPosition(initMap);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    let lat = document.querySelector("#lat");
    let lng = document.querySelector("#lng");

        lat.value = position.coords.latitude ;
        lng.value = position.coords.longitude ;

        // console.log(position.coords.latitude);
        // console.log(position.coords.longitude);

        // console.log(lat.value);
    

    fetch("{{ url('/') }}/api/location/" + lat.value +"/"+lng.value+"/province")
            .then(response => response.json())
            .then(result => {
                // console.log(result[0]);

                let location_user = document.querySelector("#location_user");
                    location_user.innerHTML = 
                        "&nbsp;&nbsp;&nbsp;" + 
                        result[0]['tambon_th'] +
                        " "+ 
                        result[0]['amphoe_th'] +
                        " "+ 
                        result[0]['changwat_th'];
                           
                
            });
}

function initMap(position) {

    var lat = position.coords.latitude;
    var lng = position.coords.longitude ;

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat , lng: lng}, 
        zoom: 15,
        });

    var marker = new google.maps.Marker({
        position: {lat: lat , lng: lng }, 
        map: map,
    });

    const infowindow = new google.maps.InfoWindow({
        content: "<p>Marker Location:" + marker.getPosition() + "</p>",
      });

      google.maps.event.addListener(marker, "click", () => {
        infowindow.open(map, marker);
      });
    }

</script>
<input type="hidden" id="lat" name="lat" readonly>
<input type="hidden" id="lng" name="lng" readonly> 
<p style="display:none;" onclick="getLocation();" id="btn_getLocation"></p>
<div class="container d-block d-md-none" >
        <div class="row">
            <div class="col-12 main-shadow main-radius" style="margin-top:15px; margin-bottom:10px" id="map">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4989368.068715823!2d100.32470292487557!3d14.23861745451566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1625474458473!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
            <div class="col-12 card shadow p-3 mb-5 bg-body rounded" >
                <div class="row">
                    <div class="col-2">
                        <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #E8F0FE;">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                        </button>
                    </div>
                    <div class="col-10" style="margin-bottom:-100px">
                        <p style="color:#4B4B4B ">&nbsp;&nbsp;&nbsp;ใกล้กับ</p>
                        <p style="margin-top:-15px; color:#B3B6B7" id="location_user"></p>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br>
                        <a class="btn btn-danger btn-block shadow-box" href="">
                            <i class="fas fa-bullhorn"></i> ขอความช่วยเหลือ
                        </a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        
        <div class="card shadow p-3 mb-5 bg-body rounded" style="margin-top:-35px">
            <div class="row" >
                <div class="col-3" >
                    <center>
                        <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #188038;">
                        <i class="fas fa-gas-pump" style="color:white"></i>
                        </button>
                        <p style="font-size:11px; text-align: center; margin-top:10px;color:#B3B6B7; ">ปั๊มน้ำมัน</p>
                    </center>
                </div>
                <div class="col-3" >
                    <center>    
                        <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #129EAF;">
                        <i class="fad fa-garage-open" style="color:white"></i>
                        </button>
                        <p style="font-size:11px; text-align: center; margin-top:10px;color:#B3B6B7; ">ศูนย์บริการรถยนต์</p>
                    </center>
                </div>
                <div class="col-3" >
                    <center>
                        <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #C5221F;">
                        <i class="far fa-hospital" style="color:white"></i>
                        </button>
                        <p style="font-size:11px; text-align: center; margin-top:10px;color:#B3B6B7; ">โรงพยาบาล</p>
                    </center>
                </div>
                <div class="col-3" >
                    <center>
                        <button class="btn-sos btn d-flex justify-content-center align-items-center" style="background-color: #E37400;">
                        <i class="fad fa-siren-on" style="color:white"></i>
                        </button>
                        <p style="font-size:11px; text-align: center; margin-top:10px;color:#B3B6B7; ">สถานีตำรวจ</p>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-12 card shadow" style="margin-top:-35px;">
            <div class="row">
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">เหตุด่วนเหตุร้าย</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:191" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 191</a>
                </div>
                <div class="col-6 ">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ไฟไหม้รถ</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:199" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 199</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">หน่วยแพทย์กู้ชีวิต</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:1669" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1669</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">จ.ส.100</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:1137" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1137</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">สายด่วนทางหลวง</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:1193" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1193</a>
                </div>
                <div class="col-6">
                    <p style="font-size:15px; text-align: center; margin-top:10px; ">ทนายอาสา</p>
                    <a class="btn btn-danger btn-block shadow-box" href="tel:1167" style="margin-top:-10px; background-color: #DB2D2E;"><i class="fas fa-phone-alt"></i> 1167</a>
                </div>
               
            </div> <br>
        </div>

    </div>
</div>
<br><br>
@endsection