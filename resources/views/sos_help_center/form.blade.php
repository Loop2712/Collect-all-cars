<style>
    .center-block {
  display: flex;
  align-items: center;
  height: 35px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}

.btn-center-block {
  align-items: center;
  height: 70px;  /* Set the height of the containing element */
  text-align: center;  /* Center the text horizontally */
}#loading_success{
    animation: success 500ms ease 0s 1 normal forwards;
}
@keyframes success {
	0% {
		transform: scale(0);
	}

	100% {
		transform: scale(1);
	}
}
/*.iziToast > .iziToast-body .iziToast-texts {
  margin: 100px 0 0 0;
  padding-right: 2px;
  display: contents !important;
  float: left;
}
.iziToast-texts p{
    margin-top: 5px !important;
    white-space: nowrap;
    overflow: hidden;
  text-overflow: ellipsis;
}
.iziToast {
    width:30% !important;
    max-height: 100% !important;
}
.iziToast-texts{
    min-width: 10% !important;
    max-width: 40% !important;
}

.iziToast > .iziToast-body .iziToast-message {
  margin-top: 5px;
  white-space: normal !important;
}*/
.masonry:after {
  content: "";
  display: table;
  clear: both;
}

.masonry .grid-sizer,
.masonry_block {
  width: 100%;
}

.masonry_block {
  float: left;
  padding: 20px 20px;
  border-radius: 25px;
}

.masonry-folio {
  position: relative;
  overflow: hidden;
  box-shadow: 1px 4px 15px 1px rgba(0, 0, 0, 0.2);
  border-radius: 1rem;
}

.masonry_thum img {
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  border-radius: 1rem;
  height: 15rem;
  width: 100%;
  object-fit: cover;

}

.masonry_thum a {
  display: block;
}

.masonry_thum a::before {
  display: block;
  background-color: rgba(0, 0, 0, 0.8);
  content: "";
  opacity: 0;
  visibility: hidden;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  z-index: 1;
  border-radius: 1rem;
}

.masonry_thum a::after {
  display: block;
  height: 30px;
  width: 30px;
  line-height: 30px;
  margin-left: -15px;
  margin-top: -15px;
  position: absolute;
  left: 50%;
  top: 50%;
  text-align: center;
  color: rgba(255, 255, 255, 0.5);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-transform: scale(0.5);
  transform: scale(0.5);
  z-index: 1;
  border-radius: 1rem;
  border-top: 1px solid #d7dce1;
    border-left: 3px solid #d7dce1;
}

.masonry_text {
  position: absolute;
  left: 0;
  bottom: 8rem;
  padding: 0 1.5rem;
  z-index: 2;
  opacity: 0;
  visibility: hidden;
  -webkit-transform: translate3d(0, 100%, 0);
  -ms-transform: translate3d(0, 100%, 0);
  transform: translate3d(0, 100%, 0);
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.masonry_title {
  font-size: 1.4rem;
  font-weight: 400;
  line-height: 1;
  color: #ffffff;
  text-transform: uppercase;
  letter-spacing: 0.2rem;
  margin: 0 0 0.3rem 0;
}

.masonry_cat {
  color: rgba(255, 255, 255, 0.5);
  font-size: 1rem;
  font-weight: 200;
  line-height: 1.714;
  margin-bottom: 0;
}

.masonry_caption {
  display: none;
}

.masonry_project-link {
  display: block;
  color: #ffffff;
  text-align: center;
  z-index: 500;
  top: 3rem;
  left: 2rem;
  opacity: 0;
  visibility: hidden;
  -webkit-transform: translate3d(0, -100%, 0);
  -ms-transform: translate3d(0, -100%, 0);
  transform: translate3d(0, -100%, 0);
}

.masonry_project-link::before {
  display: in-line;
  position: relative;
  top: -2.5rem;
  left: 50%;
}

.masonry_project-link:hover,
.masonry_project-link:focus,
.masonry_project-link:active {
  font-size: 1.1rem;
  color: #ffffff;
  -webkit-transform: translate3d(0, 100%, 0);
  -ms-transform: translate3d(0, 100%, 0);
  transform: translate3d(0, 100%, 0);
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  display: block;
  background-color: transparent;
}

/* on hover 
 * ----------------------------------------------- */
.masonry-folio:hover .masonry_thum a::before {
  opacity: 1;
  visibility: visible;
}

.masonry-folio:hover .masonry_thum a::after {
  opacity: 1;
  visibility: visible;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.masonry-folio:hover .masonry_thum img {
  -webkit-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
}

.masonry-folio:hover .masonry_project-link,
.masonry-folio:hover .masonry_text {
  opacity: 1;
  visibility: visible;
  -webkit-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.masonry_project-link:hover a {
  text-decoration: underline;
}

@media only screen and (max-width: 992px) {
  .s-works {
    padding-top: 15rem;
    padding-bottom: 15rem;
  }
}

@media only screen and (max-width: 768px) {
  .masonry_title,
  .masonry_cat {
    font-size: 1.3rem;
  }
}

@media only screen and (max-width: 576px) {
  .s-works {
    padding-top: 12rem;
  }

  .masonry-wrap {
    padding: 0 35px;
  }

  .masonry_block {
    float: none;
    width: 100%;
  }

  .masonry_title,
  .masonry_cat {
    font-size: 1.4rem;
  }
}

</style> 

<style>
    
    #description {
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
    }

    #infowindow-content .title {
      font-weight: bold;
    }

    #infowindow-content {
      display: none;
    }

    #map #infowindow-content {
      display: inline;
    }

    .pac-card {
      background-color: #fff;
      border: 0;
      border-radius: 2px;
      box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
      margin: 10px;
      padding: 0 0.5em;
      font: 400 18px Roboto, Arial, sans-serif;
      overflow: hidden;
      font-family: Roboto;
      padding: 0;
    }

    #pac-container {
      padding-bottom: 12px;
      margin-right: 12px;
    }

    .pac-container{
      position: fixed; !important;
      z-index: 99999999 !important;
    }

    .pac-controls {
      display: inline-block;
      padding: 5px 11px;
    }

    .pac-controls label {
      font-family: Roboto;
      font-size: 13px;
      font-weight: 300;
    }

    #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      text-overflow: ellipsis;
      width: 100%;
    }

    #pac-input:focus {
      border-color: #4d90fe;
    }

    #title {
      color: #fff;
      background-color: #4d90fe;
      font-size: 25px;
      font-weight: 500;
      padding: 6px 12px;
    }

    #target {
      width: 345px;
    }

  </style>

<!-- TEST alet_new_data -->
<!-- <div class="container">
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'TNK' , 'B')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'b' , 'Bdd')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
  <button class="btn btn-default" onclick="alet_new_data('เหลือง' , 'name_user' ,'Bdd' , 'B451')">ทดสอบแจ้งเตือนบันทึกข้อมูล</button>
</div> -->

<!-- Modal -->
<div class="modal fade" id="modal_mapMarkLocation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">เลือกจุดเกิดเหตุ <i class="fa-sharp fa-solid fa-location-crosshairs"></i></h4>
                <span id="btn_close_modal_mapMarkLocation" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">

                        <div class="col-9">
                          <div class="row">
                            <div class="col-4">
                              <center>
                                <button id="btn_search_by_place" type="button" class="btn btn-success" style="width: 100%;" onclick="click_select_search_by('place');">
                                    <!-- fa-beat-fade -->
                                    <i id="tag_i_search_by_place" class="fa-solid fa-house-building fa-beat-fade"></i> ค้นหาด้วยชื่อสถานที่
                                </button>
                              </center>
                            </div>
                            <div class="col-4">
                              <center>
                                <button id="btn_search_by_district" type="button" class="btn btn-outline-success" style="width: 100%;" onclick="click_select_search_by('district');">
                                    <!-- fa-beat-fade -->
                                    <i id="tag_i_search_by_district" class="fa-sharp fa-solid fa-map-location-dot"></i> ค้นหาด้วยตำบล
                                </button>
                              </center>
                            </div>
                            <div class="col-4">
                              <center>
                                <button id="btn_search_by_LatLong" type="button" class="btn btn-outline-success" style="width: 100%;" onclick="click_select_search_by('LatLong');">
                                    <!-- fa-beat-fade -->
                                    <i id="tag_i_search_by_LatLong" class="fa-sharp fa-regular fa-location-dot"></i> ค้นหาด้วย Lat,Long
                                </button>
                              </center>
                            </div>
                          </div>
                        </div>

                        <div class="col-3">
                          <center>
                              <button type="button" class="btn btn-warning text-white" style="width: 100%;" onclick="re_mapMarkLocation();">
                                  <i class="fa-solid fa-repeat"></i> คืนค่าการค้นหา
                              </button>
                          </center>
                        </div>

                        <div class="col-9 mt-3">
                            <!-- จังหวัด อำเภอ ตำบล -->
                            <div class="row d-none" id="div_search_by_district">
                                <div class="col-4">
                                    <select name="location_P" id="location_P" class="form-control" onchange="show_amphoe();">
                                        <option class="location_P_start" value="" selected > - เลือกจังหวัด - </option>
                                        @foreach($all_provinces as $item)
                                            <option value="{{ $item->province }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_A" id="location_A" class="form-control" onchange="show_tambon();">
                                        <option value="" selected > - เลือกอำเภอ - </option> 
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="location_T" id="location_T" class="form-control" onchange="select_T();">
                                        <option value="" selected > - เลือกตำบล - </option> 
                                    </select>
                                </div>
                            </div>
                            <!-- จบ จังหวัด อำเภอ ตำบล -->

                            <!-- ค้นหาด้วย Lat,Long -->
                            <div class="row d-none" id="div_search_by_LatLong">
                              <div class="col-12">
                                <input class="form-control" id="input_search_by_latlong" placeholder="ค้นหาด้วย Lat,Long เช่น 13.7248936,100.4930264" value="" oninput="search_by_latlong();">
                                <span id="span_show_errorLatLong" class="text-danger mt-2 d-none"></span>
                              </div>
                            </div>
                            <!-- จบ ค้นหาด้วย Lat,Long -->

                            <!-- ค้นหาด้วยชื่อสถานที่ -->
                            <div class="row" id="div_search_by_place">
                              <div class="col-12" id="id_tee_ja_sai">
                                <!-- <input class="form-control" id="input_search_by_place" placeholder="ค้นหาด้วยชื่อสถานที่ เช่น ศูนย์ราชการ" value=""> -->
                                <input id="pac-input" class="controls form-control  "  type="text"placeholder="ค้นหาด้วยชื่อสถานที่ เช่น ศูนย์ราชการ" >
                              </div>
                            </div>
                            <!-- จบ ค้นหาด้วยชื่อสถานที่ -->
                        </div>

                        <div class="col-3 mt-3">
                          <center>
                              <button id="span_submit_locations_sos" type="button" class="btn btn-info text-white" style="width: 100%;">
                                  <i class="fa-solid fa-circle-check"></i> ยืนยัน
                              </button>
                          </center>
                        </div>
                        
                    </div>
                </div>
                <hr>
                <div style="padding-right:15px;margin-top: 5px;">
                    <div class="card">
                        <div id="mapMarkLocation" class="d-none"></div>
                        <div id="map_places" class=""></div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&callback=initAutocomplete&libraries=places&v=weekly&language=th" defer></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

<!-- Modal View Image -->
<div class="modal fade" id="see_img_sos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รูปภาพการขอความช่วยเหลือ</h5>
                <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div class="row mt-1">
                    <div class="col-lg-6">

                        <div class="masonry_block">
                            <div class="masonry-folio">
                                <div class="masonry_thum">

                                    @if( !empty($sos_help_center->photo_sos))
                                        <img src="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos }}" class="img-fluid" alt="image" / >
                                        <a href="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos }}" class="glightbox" data-gallery="edu-gallery"></a>
                                    @else
                                        <img src="https://www.viicheck.com/img/stickerline/PNG/17.png" class="img-fluid" alt="image" / >

                                        <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery"></a>
                                    @endif

                                    @if( !empty($sos_help_center->photo_sos_by_officers))
                                        <a href="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos_by_officers }}" class="glightbox" data-gallery="edu-gallery"></a>
                                    @else
                                        <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery"></a>
                                    @endif
                                    
                                </div>

                                <div class="masonry_text">
                                    @if( !empty($sos_help_center->photo_sos))
                                        <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                        <p class="masonry_cat">เพิ่มโดย {{ $sos_help_center->name_user }}</p>
                                    @else
                                        <h3 class="masonry_title">รูปภาพจากผู้ใช้</h3>
                                        <p class="masonry_cat">ผู้ใช้ไม่ได้เพิ่มรูปภาพ</p>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end masonry_block -->

                    <div class="col-lg-6">
                        <div class="masonry_block">
                            <div class="masonry-folio">
                                <div class="masonry_thum">

                                    @if( !empty($sos_help_center->photo_sos_by_officers))
                                        <img src="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos_by_officers }}" class="img-fluid" alt="image" />
                                        
                                        <a href="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos_by_officers }}" class="glightbox" data-gallery="edu-gallery2"></a>
                                    @else
                                        <img src="https://www.viicheck.com/img/stickerline/PNG/49.png" class="img-fluid" alt="image" / >

                                        <a href="https://www.viicheck.com/img/stickerline/PNG/49.png" class="glightbox" data-gallery="edu-gallery2"></a>
                                    @endif

                                    @if( !empty($sos_help_center->photo_sos))
                                        <a href="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos }}" class="glightbox" data-gallery="edu-gallery2"></a>
                                    @else
                                        <a href="https://www.viicheck.com/img/stickerline/PNG/17.png" class="glightbox" data-gallery="edu-gallery2"></a>
                                    @endif
                                    
                                </div>

                                <div class="masonry_text">
                                    @if( !empty($sos_help_center->photo_sos_by_officers) )
                                        <h3 class="masonry_title">รูปภาพจากเจ้าหน้าที่</h3>
                                        <p class="masonry_cat">เพิ่มโดย {{ $sos_help_center->name_helper }}</p>
                                    @else
                                        <h3 class="masonry_title">รูปภาพจากเจ้าหน้าที่</h3>
                                        <p class="masonry_cat">เจ้าหน้าที่ไม่ได้เพิ่มรูปภาพ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end masonry_block -->
                    </div>
                    @if(!empty($sos_help_center->commemt_help))
                        <div class="col-12">
                            <h4>ข้อเสนอแนะจากเจ้าหน้าที่</h4>
                            <p style="text-indent: 2rem;">
                                {{$sos_help_center->commemt_help}}
                            </p>
                        </div>
                    @endif
                </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6 text-center">
                        @if( !empty($sos_help_center->photo_sos) )
                            <img src="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos }}" class="img-fluid rounded shadow-lg hover-zoom" style="width: 80%; cursor: pointer;" alt="Picture from Users">
                        @else
                            <img src="https://www.viicheck.com/img/stickerline/PNG/17.png" class="img-fluid rounded shadow-lg hover-zoom" style="width: 80%; cursor: pointer;" alt="Picture from Users">
                        @endif

                        <p style="margin-top: 20px;">รูปภาพจากผู้ใช้</p>
                    </div>
                    <div class="col-md-6 text-center">
                        @if( !empty($sos_help_center->photo_sos_by_officers) )
                            <img src="https://www.viicheck.com/storage/{{ $sos_help_center->photo_sos_by_officers }}" class="img-fluid rounded shadow-lg hover-zoom" style="width: 80%; cursor: pointer;" alt="Staff Photo">
                        @else
                            <img src="https://www.viicheck.com/img/stickerline/PNG/49.png" class="img-fluid rounded shadow-lg hover-zoom" style="width: 80%; cursor: pointer;" alt="Staff Photo">
                        @endif
                        
                        <p style="margin-top: 20px;">รูปภาพจากเจ้าหน้าที่</p>
                   </div>
                </div> -->
            </div>
            <div class="modal-footer d-none">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js'></script>
<script src='https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js'></script>
<script src='https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js'></script>
<script>
    var masonryFolio = function () {
  var containerBricks = $(".masonry");

  containerBricks.imagesLoaded(function () {
    containerBricks.masonry({
      itemSelector: ".masonry_block",
      resize: true
    });
  });
};

/* glightbox
 */
var glightbox = GLightbox({
  loop: true,
  selector: ".glightbox",
  openEffect: "zoom",
  closeEffect: "fade",
  startAt: 0,
  closeOnOutsideClick: false,
  zoomable: true,
  height: "auto",
  width: "100vw",
  height: "100vh"
  
});

feather.replace();
</script>
<style>
    .gg-travel-guide{
        display: flex;
        flex-wrap: wrap;
    }.gg-travel-guide-img{
        width: 10%;
    }.gg-travel-guide-text{
        width: 90%;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        padding: 0 0 0 2rem;
    }.gg-travel-guide-bottom {
        width:88%;  
        border-bottom: 1px solid #000; 
        line-height:0.1em; 
        margin:10px 0 20px; 

    } 
    .gg-travel-guide-bottom span { 
        background:#fff; 
        padding:0 10px; 
    }
</style>
<!-- Modal steps_travel -->
<div class="modal fade" id="modal_steps_travel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แนะนำการเดินทาง</h5>
                <i class="fa-sharp fa-solid fa-circle-xmark btn" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body">
                <!-- <div class="row gg-travel-guide">
                    <div class=" gg-travel-guide-img">
                        <img src="{{ url('/img/traffic sign/33.png') }}" width="70" height="70" >
                    </div>

                    <div class="gg-travel-guide-text">asd</div>

                    <div class="d-flex justify-content-end">
                        <div class="gg-travel-guide-bottom">
                            <span></span>
                        </div>
                    </div>
                </div> -->
                <div class="row" id="div_steps_travel" style="font-size: 20px !important;">
                    <!-- ข้อมูลแนะนำการเดินทาง -->
                </div>
            </div>
        </div>
    </div>
</div>




























<style>
    div{
        font-family: 'Kanit', sans-serif;
    }
    .menu-header{
        background-color: transparent;
        padding: 20px 25px;
        position: relative;
    }#map{
        border-radius: 10px;
    } .div-map{
        position: relative;
    }.btn_go_to_map{
        position: absolute;
        bottom: 5%;
        left: 5%;
    }.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 4rem;
    }.yellow-form{
        background-color:#FAE693;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }
    .blue-form{
        background-color:#89acff;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }.pink-form{
        background-color:#ea91c6;
        height: auto;
        border: 0px solid black;
        padding: 25px;
    }
    .hover-zoom {
      transition: transform 0.5s;
    }

    .hover-zoom:hover {
      transform: scale(2.5);
    }

</style>
<div>
    <div class="card radius-10">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 col-lg-6 col-12 menu-header bg-transparent d-inline">
                <h6 class=" font-weight-bold m-0 p-0">รหัสปฏิบัติการ</h6>
                <h3><b><u id="text_u_operating_code">{{ $sos_help_center->operating_code }}</u></b></h3>
            </div>
            <div class="col-md-6 col-lg-6 col-12  d-flex justify-content-end">
                <div class="d-flex align-items-center">
                    <!-- <button type="button" class="btn btn-warning m-2" onclick="click_select_btn('form_yellow');">
                        <i class="fa-solid fa-files-medical"></i> <br> แบบฟอร์มเหลือง
                    </button>
                    <button type="button" class="btn btn-info m-2" onclick="click_select_btn('operating_unit');">
                        <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มฟ้า
                    </button>
                    <button type="button" class="btn btn-success m-2" onclick="click_select_btn('operating_unit');">
                    <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มเขียว
                    </button>
                    <button type="button" class="btn m-2 " style="background-color:#fa93f0;" onclick="click_select_btn('operating_unit');">
                    <i class="fa-solid fa-hospital-user"></i> <br> แบบฟอร์มชมพู
                    </button>
                    <button id="btn_select_operating_unit" disabled  type="button" class="btn btn-secondary m-2" onclick="click_select_btn('operating_unit');">
                        <i class="fa-solid fa-truck-medical"></i> <br> เลือกหน่วยแพทย์
                    </button> -->
                    <style>
                        .nav-pills-success.nav-pills .nav-link{
                        color: #29cc39;
                        }
                        .nav-pills-success.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-warning.nav-pills .nav-link{
                        color: #ffc107;
                        }
                        .nav-pills-warning.nav-pills .nav-link:hover{
                        color: #000;
                        }

                        .nav-pills-info.nav-pills .nav-link{
                        color: #0dcaf0;
                        }
                        .nav-pills-info.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-pink.nav-pills .nav-link{
                        color: #fa93f0;
                        }
                        .nav-pills-pink.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-secondary.nav-pills .nav-link{
                        color: #fff;
                        }
                        .nav-pills-secondary.nav-pills .nav-link:hover{
                        color: #fff;
                        }

                        .nav-pills-purple.nav-pills .nav-link{
                        color: #7b2bec;
                        border: 1px solid #7b2bec;
                        }
                        .nav-pills-purple.nav-pills .nav-link:hover{
                            background-color: #7b2bec;
                        color: #fff;
                        }

                        .nav-pills-danger.nav-pills .nav-link{
                        color: #db2d2e;
                        }
                        .nav-pills-danger.nav-pills .nav-link:hover{
                        color: #fff;
                        }
                        .box-idc-rc{
                            border-radius: 15px 15px 0 0 ;
                            padding: 5px;
                            font-weight: bolder;
                            margin: 15 0;
                        }.idc-rc-green{
                            background-color: #dff7e1;
                            color: #4ccc39;
                        }.idc-rc-yellow{
                            background-color: #fff8e4;
                            color: #ffc207;
                        }.idc-rc-normal{
                            background-color: #c9d3ff;
                            color: #0d3aff;
                        }.idc-rc-black{
                            background-color: #c5c6c8;
                            color: #000000;
                        }.idc-rc-red{
                            background-color: #fbe0e0;
                            color: #e62e2e;
                        }
                    </style>
                    <ul class="nav nav-pills m-3" role="tablist">
                        <li id="btn_operation" class="nav-item nav-pills nav-pills-purple m-2 d-none" role="presentation">
                            <a id="tag_a_operation" class="nav-link btn-outline-purple btn" data-bs-toggle="pill" href="#operation" role="tab" aria-selected="true" onclick="check_go_to(null);reface_map_go_to_help();Stop_reface_check_form_yellow();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">การดำเนินการ</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_yellow" class="nav-item nav-pills nav-pills-warning m-2" role="presentation">
                            <!-- <a class="nav-link btn-outline-warning btn active" data-bs-toggle="pill" href="#form_yellow" role="tab" aria-selected="true" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#form_data_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเหลือง</div>
                                </div>
                            </a> -->
                            <a class="nav-link btn-outline-warning btn active" href="{{ url('/sos_help_center') . '/' . $sos_help_center->id . '/edit' }}" >
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-files-medical"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเหลือง</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_blue" class="nav-item nav-pills nav-pills-info m-2 d-none" role="presentation">
                            <a class="nav-link  btn-outline-info btn" data-bs-toggle="pill" href="#form-blue" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_blue_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มฟ้า</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_green" class="nav-item  nav-pills nav-pills-success m-2 d-none" role="presentation">
                            <a class="nav-link btn-outline-success btn" data-bs-toggle="pill" href="#form-green" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_green_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มเขียว</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_form_pink" class="nav-item nav-pills nav-pills-pink m-2 d-none" role="presentation">
                            <a class="nav-link btn-outline-pink btn" data-bs-toggle="pill" href="#form-pink" role="tab" aria-selected="false" onclick="show_div_sos_or_unit('show_sos');document.querySelector('#step_pink_1').click();">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">แบบฟอร์มชมพู</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_select_operating_unit" class="nav-item nav-pills nav-pills-danger m-2 " role="presentation">
                            <a id="tag_a_open_map_operating_unit" class="nav-link btn-outline-danger btn" data-bs-toggle="pill" href="#operating_unit" role="tab" aria-selected="false" onclick="open_map_operating_unit();"> <!-- select_level(); -->
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">เลือกหน่วยแพทย์</div>
                                </div>
                            </a>
                        </li>
                        <li id="btn_open_meet" class="nav-item nav-pills nav-pills-danger m-2 d-" role="presentation">
                            <a class="nav-link btn-outline-danger btn" data-bs-toggle="pill" href="#meet_sos" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon">
                                        <i class="fa-solid fa-hospital-user"></i>
                                    </div>
                                    <div class="tab-title">Meet (soon)</div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<style>
   .forword-card-danger{
    background-color: #db2d2e;
   }
   .forword-card-info{
    background-color: #0dcaf0;
   }

.forword-header {
  display: flex;
  align-items: center;
  grid-gap: 1rem;
  gap: 1rem;
}

.forword-icon {
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 9999px;
  background-color: #fff;
  padding: 0.5rem;
  color: #db2d2e;
}

.forword-icon i {
  height: 1rem;
  width: 1rem;
}

.forword-alert {
  font-weight: 600;
  font-family: 'Mitr', sans-serif;
    font-size: 1rem;
  color: #fff;
  margin: 0;
}

.forword-message {
  margin-top: 1rem;
  color: #fff;
}

.forword-actions {
  margin-top: 1rem;
}

.forword-actions a {
  text-decoration: none;
}

.read-forword {
  display: inline-block;
  border-radius: 0.5rem;
  width: 100%;
  padding: 0.75rem 1.25rem;
  text-align: center;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 600;
}

.read-forword {
  background-color: #fff;
  color: #db2d2e;
}
.read-forword:hover {
  background-color: #e6e7e9;
  color: #db2d2e;
}
</style>
<div class="row">
    
    <div class="col-12 col-md-3 col-lg-3">
        <div class="sticky">
            @if(!empty($sos_help_center->forward_operation_from) or ($sos_help_center->forward_operation_to))
            @php
              if( !empty($sos_help_center->forward_operation_from) ){
                $card_color = "danger";
              }else{
                $card_color = "info";
              }
            @endphp
            <div class="card forword-card-{{ $card_color }} radius-10 p-3">
                <div class="forword-header">
                    <span class="forword-icon">
                        <i class="fa-solid fa-bullhorn fa-beat text-{{ $card_color }}"></i>
                    </span>
                    <p class="forword-alert">ปฏิบัติการนี้มีการส่งต่อ!</p>
                </div>

                <p class="forword-message">
                    @if(!empty($sos_help_center->forward_operation_from))
                        รหัสปฏิบัติการนี้ถูกส่งต่อมาจาก <br><b>{{$data_forword_form->operating_code }}</b>
                    @endif
                    
                    @if(!empty($sos_help_center->forward_operation_to))
                        รหัสปฏิบัติการนี้ถูกส่งต่อไปยัง <br><b>{{$data_forword_to->operating_code }}</b>
                    @endif
                </p>

                <div class="forword-actions">
                    @if(!empty($sos_help_center->forward_operation_from))
                        <a class="read-forword text-{{ $card_color }}" onmouseover="add_animation_icon()" onmouseout="add_animation_icon()" href="{{ url('/sos_help_center/' . $data_forword_form->id . '/edit') }}">
                            <i class="fa-regular fa-message-arrow-up-right text-{{ $card_color }}"></i> ดูปฏิบัติการที่ส่งมา
                        </a>
                    @endif
                    
                    @if(!empty($sos_help_center->forward_operation_to))
                        <a class="read-forword text-{{ $card_color }}" onmouseover="add_animation_icon()" onmouseout="add_animation_icon()" href="{{ url('/sos_help_center/' . $data_forword_to->id . '/edit') }}">
                            <i class="fa-regular fa-message-arrow-up-right text-{{ $card_color }}"></i> ดูปฏิบัติการที่ส่งต่อ
                        </a>
                    @endif
                </div>
            </div>
                
            <script>
                    function add_animation_icon(){
                        document.querySelector('.fa-message-arrow-up-right').classList.toggle('fa-bounce')
                    }
            </script>
            @endif
            <div class="card radius-10 p-3">
                <h3><b>ข้อมูลผู้แจ้งเหตุ</b></h3>
                <span>
                    ชื่อ/รหัสผู้แจ้งเหตุ
                </span>
                <h4>
                    <u id="u_name_user">{{ isset($sos_help_center->name_user) ? $sos_help_center->name_user : ''}}</u>
                </h4>
                <hr>
                <span class="mt-2">
                    โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ
                </span>
                <h4>
                    <u id="u_phone_user">{{ isset($sos_help_center->phone_user) ? $sos_help_center->phone_user : ''}}</u>
                </h4>
            </div>
            <div class="card radius-10 p-3" id="div_detail_sos">
                <div class="row d-flex justify-content-between">
                    <div class="col h6 d-flex align-items-center">
                        <b>จุดเกิดเหตุ</b>
                    </div>
                    <div class="col w-100 p-0 m-0">
                        <span class="btn btn-sm btn-danger" style="font-size:15px;width: 100%;" data-toggle="modal" data-target="#see_img_sos">
                        <i class="fa-duotone fa-images"></i>รูปภาพ 
                        </span>
                    </div>
                </div>
                <div class="div-map">
                    <div id="map" class="mt-2"></div>
                    <span class="btn btn-warning btn_go_to_map" onclick="go_to_maps();">
                        นำทาง <i class="fa-solid fa-location-arrow"></i>
                    </span>
                    <a id="go_to_maps" href="" target="bank"></a>
                </div>
            </div>
            <div class="card radius-10 p-3 d-none" id="div_data_operating">
                <!-- div_data_operating -->
                <h3>
                    <b>ข้อมูลหน่วยแพทย์</b>
                </h3>
                <span>
                    ชื่อหน่วย
                </span>
                <h5>
                    <u id="data_name_operating_unit">{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}</u>
                </h5>
                <span class="mt-2">
                    พื้นที่ (สังกัด)
                </span>
                <h5>
                    <u id="data_area_operating_unit">{{ isset($sos_help_center->operating_unit->area) ? $sos_help_center->operating_unit->area : ''}}</u>
                </h5>
                <hr>
                <h5><b>ข้อมูลเจ้าหน้าที่</b></h5>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">

                            <!-- //// PHP //// -->
                            <div id="data_officers_by_php" class="p-4 border radius-15 row">
                                @php
                                    $data_officer = App\Models\Data_1669_operating_officer::where('operating_unit_id' , $sos_help_center->operating_unit_id)->where('user_id',$sos_help_center->helper_id)->first();

                                    $color_btn_level = 'info' ;

                                    if(!empty($data_officer->level)){
                                        switch($data_officer->level){
                                            case 'FR':
                                                $color_btn_level = 'success' ;
                                            break;
                                            case 'BLS':
                                                $color_btn_level = 'warning' ;
                                            break;
                                            case 'ILS':
                                                $color_btn_level = 'danger' ;
                                            break;
                                            case 'ALS':
                                                $color_btn_level = 'danger' ;
                                            break;
                                        }
                                    }

                                @endphp
                                <div class="col-12">
                                    <br>
                                    <span style="position:absolute;top: 6%;left: 1%;border-radius: 0px 10px 10px 0px; width:45%;" class="btn-sm btn-info main-shadow main-radius float-start">
                                        @if(!empty($data_officer->vehicle_type))
                                            <b>{{ $data_officer->vehicle_type }}</b>
                                        @else
                                            ...
                                        @endif
                                    </span>
                                    <span style="position:absolute;top: 6%;right: 1%;border-radius: 10px 0px 0px 10px; width:45%;" class="btn-sm btn-{{ $color_btn_level }} main-shadow main-radius float-end">
                                        @if(!empty($data_officer->level))
                                            <b>{{ $data_officer->level }}</b>
                                        @else
                                            ...
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    @if(!empty($sos_help_center->officers_user->photo))
                                        <img src="{{ url('storage')}}/{{ $sos_help_center->officers_user->photo }}" width="80" height="80" class="rounded-circle shadow">
                                    @else
                                        <img src="{{ url('/img/stickerline/Flex/12.png') }}" width="80" height="80"  class="rounded-circle shadow">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    @if(!empty($sos_help_center->officers_user->name))
                                        <h5 class="m-0">{{ $sos_help_center->officers_user->name }}</h5>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    @if(!empty($sos_help_center->officers_user->sub_organization))
                                        <p>{{ str_replace("_"," ",$sos_help_center->officers_user->sub_organization) }}</p>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center col-12 p-0">
                                    @if(!empty($sos_help_center->officers_user->phone))
                                        <a href="tel:{{ $sos_help_center->officers_user->phone }}" style="width:90%;" class="btn btn-outline-success radius-15">
                                            <i class="fa-solid fa-phone"></i> {{ $sos_help_center->officers_user->phone }}
                                        </a>
                                    @else
                                        <br>ไม่ได้ระบุ
                                    @endif
                                </div>

                                <!-- <div class="col-12 col-md-3 mt-2">
                                    @if(!empty($sos_help_center->officers_user->photo))
                                        <img src="{{ url('storage')}}/{{ $sos_help_center->officers_user->photo }}" width="80" height="80" class="rounded-circle shadow">
                                    @else
                                        <img src="{{ url('/img/stickerline/Flex/12.png') }}" width="80" height="80"  class="rounded-circle shadow">
                                    @endif
                                </div>
                                <div class="col-12 col-md-9 mt-3">
                                    @if(!empty($sos_help_center->officers_user->name))
                                        <h5>{{ $sos_help_center->officers_user->name }}</h5>
                                    @endif

                                    @if(!empty($sos_help_center->officers_user->sub_organization))
                                        <p>{{ str_replace("_"," ",$sos_help_center->officers_user->sub_organization) }}</p>
                                    @endif
                                </div>
                                <div class="col-12 col-md-12 mt-3">
                                    เบอร์เจ้าหน้าที่
                                    @if(!empty($sos_help_center->officers_user->phone))
                                        <a href="tel:{{ $sos_help_center->officers_user->phone }}" style="width:90%;" class="btn btn-outline-success radius-15">
                                            <i class="fa-solid fa-phone"></i> {{ $sos_help_center->officers_user->phone }}
                                        </a>
                                    @else
                                        <br>ไม่ได้ระบุ
                                    @endif
                                    
                                </div> -->
                            </div>
                            <!-- //// END PHP //// -->

                            <!-- //// JAVA SCRIPT //// -->
                            <div id="data_officers_by_js" class="p-4 border radius-15 row d-none">

                                <div class="col-12">
                                    <br>
                                    <span id="data_vehicle_type_operating_unit" style="position:absolute;top: 6%;left: 1%;border-radius: 0px 10px 10px 0px; width:45%;" class="btn-sm btn-info main-shadow main-radius float-start font-weight-bold">
                                        <!--  -->
                                    </span>
                                    <span id="data_level_operating_unit" style="position:absolute;top: 6%;right: 1%;border-radius: 10px 0px 0px 10px; width:45%;" class="btn-sm main-shadow main-radius float-end font-weight-bold">
                                        <!--  -->
                                    </span>
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    <img id="data_img_officers" src="{{ url('/img/stickerline/Flex/12.png') }}" width="80" height="80" class="rounded-circle shadow">
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    <h5 class="m-0" id="data_name_officers"></h5>
                                </div>
                                <div class="d-flex justify-content-center col-12">
                                    <p id="data_sub_organization_officers"></p>
                                </div>
                                <div class="d-flex justify-content-center col-12 p-0">
                                    <a id="data_phone_officers" href="" style="width:90%;" class="btn btn-outline-success radius-15">
                                        <i class="fa-solid fa-phone"></i>
                                    </a>
                                </div>

                            </div>
                            <!-- //// END JAVA SCRIPT //// -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .box-status{
            background: rgba(255, 255, 255, .5);
            padding: 5px 15px 5px 15px;
            border-radius: 15px;
            margin-bottom: 25px;
            /* border: #000000 solid 1px; */
        }
    </style>
    
    <div class="col-12 col-md-9 col-lg-9  "  >
        <div class="tab-content" id="pills-tabContent">

            <!--------------------------------- operation --------------------------------->
            <div class="tab-pane fade" id="operation" role="tabpanel">
                <div class="card radius-10 p-3">
                    <div class="row">
                        <div class="col-12">
                            @php
                                if($sos_help_center->status != 'เสร็จสิ้น'){
                                    $class_span_status = 'float-end' ;
                                }else{
                                    $class_span_status = 'float-start' ;
                                }
                            @endphp
                            <div class="row">
                                <h4>
                                    <span class="{{ $class_span_status }}">
                                        สถานะ :  <b><span id="show_status" class=""></span></b>
                                        <span id="show_remark_status" class="d-none text-secondary">(<span id="text_remark_status"></span>)</span>
                                    </span>

                                    @if($sos_help_center->status != 'เสร็จสิ้น')
                                    <span id="text_duration" class="text-warning"></span> (<span id="show_distance" ></span>) ● <span id="text_arrivalTime"></span>
                                        <!-- <span id="h4_show_distance" class="">
                                            <i class="fa-duotone fa-road"></i> ระยะทาง :  <b><span id="show_distance" class="text-warning"></span></b>
                                        </span>
                                        &nbsp;&nbsp;
                                        <span>
                                            <i class="fa-solid fa-timer"></i> ระยะเวลา :  <b><span id="text_duration" class="text-warning"></span></b>
                                        </span>
                                        &nbsp;&nbsp;
                                        <span>
                                            <i class="fa-solid fa-circle-check"></i> เวลาถึงโดยประมาณ :  <b><span id="text_arrivalTime" class="text-warning"></span></b>
                                        </span> -->
                                    @endif
                                </h4>
                            </div>
                            <hr>
                            <!-- <div class="row text-center">
                                <div class="col-6">
                                    <p>การให้รหัสความรุนแรง (IDC) : <span id="show_idc" class="btn btn-sm px-5 radius-30 d-none"></span></p>
                                </div>
                                <div class="col-6">
                                    <p>รหัสความรุนแรง ณ จุดเกิดเหตุ (RC): <span id="show_rc" class="btn btn-sm px-5 radius-30 d-none"></span></p>
                                </div>
                            </div> -->

                            <div class="row text-center">
                                <div class="col-6 " >
                                    <div class="box-idc-rc"  id="show_idc">
                                        <!-- การให้รหัสความรุนแรง (IDC) <br> ดำ -->
                                    </div>
                                </div>
                                <div class="col-6" >
                                    <div class=" box-idc-rc" id="show_rc">
                                        <!-- รหัสความรุนแรง ณ จุดเกิดเหตุ (RC) <br> แดง(วิกฤติ) -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12" style="position: relative;">
                            <span id="span_btn_steps_travel" class="btn btn-danger main-shadow main-radius d-none" style="position: absolute;top: 0.5rem;right: 5rem;z-index: 2;height: 2.8rem;display: flex; align-items: center;" data-toggle="modal" data-target="#modal_steps_travel">
                                แนะนำการเดินทาง
                            </span>
                            <div id="map_go_to_help"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- form yellow --------------------------------->
            <div class="tab-pane fade show active" id="form_yellow" role="tabpanel">
                <div class="card radius-10 p-3 yellow-form">
                    <div class="row">
                        <div class="col-3">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-status">
                                <span class="m-0">เลขที่ปฏิบัติการ(ON)</span>
                                <h5 class="m-0 h5">
                                    <b id="text_in_formyellow_operating_code">
                                        {{ $sos_help_center->operating_code }}
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        .............
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 float-end">
                            <button style="width: 100%;" id="btn_save" class=" btn btn-success d-flex justify-content-center btn-block" type="button" onclick="btn_save_data();send_save_data();"> 
                                <div id="icon_save_data" class="d-none">
                                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                    </svg>
                                </div>
                                    &nbsp;
                                <span id="text_btn_save">
                                    บันทึก
                                </span>
                                
                            </button>

                        </div>
                        <div class="col-12">
                            @include ('sos_help_center.form_sos_yellow')
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- form blue --------------------------------->
            <div class="tab-pane fade" id="form-blue" role="tabpanel">
                <div class="card radius-10 p-3 blue-form">
                    <div class="row">
                        <div class="col">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">เลขที่ผู้ป่วย</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient Number
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient sequence
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            @include ('sos_help_center.form_sos_blue')
                        </div>
                    </div>
                </div>
            </div>


            <!--------------------------------- form green --------------------------------->
            <div class="tab-pane fade" id="form-green" role="tabpanel">
                <p>@include ('sos_help_center.form_sos_green')</p>
            </div>

            <!--------------------------------- form pink --------------------------------->
            <div class="tab-pane fade" id="form-pink" role="tabpanel">
                <div class="card radius-10 p-3 pink-form">
                    <div class="row">
                        <div class="col">
                            <div class="box-status">
                                @php
                                    $date = $sos_help_center->created_at ;
                                    $result = $date->format('d/m/Y');
                                @endphp
                                <span class="m-0">วันที่ </span>
                                <h5 class="m-0 h5">
                                    <b> {{ $result }}</b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">เลขที่ผู้ป่วย</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient Number
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-status">
                                <span class="m-0">ลำดับผู้ป่วย(CN)</span>
                                <h5 class="m-0 h5">
                                    <b>
                                        Patient sequence
                                    </b>
                                </h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------------- operating_unit --------------------------------->
            <div class="tab-pane fade" id="operating_unit" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @include ('sos_help_center.form_operating_unit_map')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<style>
    .div_alert{
  position: fixed;
  /* position: absolute; */
  top: -30%;
  /* top: 55%; */
  width: 100%;
  left: 0;
  text-align: center;
  font-family: 'Kanit', sans-serif;
  z-index: 9999;
  display: flex;
  justify-content: center;
}
@media only screen and (max-width: 600px) {
    .alert-child{
        width: 90%;
        font-size: 1.2rem;
    }
}
@media only screen and (min-width: 600px) {
    .alert-child{
        width: 90%;
        font-size: 1.4rem;
    }
}

@media only screen and (min-width: 768px) {
    .alert-child{
        width: 40%;
        font-size: 1.4rem;
    }
}

.up-down {
  animation-name: slideDownAndUp;
  animation-duration: 5s;
}

@keyframes slideDownAndUp {
  0% {
    transform: translateY(0);
  }
  /* Change the percentage here to make it faster */
  10% {
    transform: translateY(230px);
  }
  /* Change the percentage here to make it stay down for longer */
  90% {
    transform: translateY(230px);
  }
  /* Keep this at the end */
 100% {
    transform: translateY(0);
 }
}
.alert-child{
    background-color: #DB2D2E;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 15px;
    height: 5rem;
    padding:20px 10px;
}.text-alert{
    color: #fff;
   float: left;
   padding: 0;
   margin: 0;
}.alert-icon{
    width: 100%;
    height: 100%;
    background-color: #ffddde;
    border-radius: 50%;
    color: #ff5757;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    max-width: 70px;
    height: 60px;
   
    font-size: 1.5rem;
    margin-left: 1rem;

}
</style>


<div id="alert_phone" class=" div_alert " role="alert">
    <div class="alert-child">
        <div >
            <p class="d-block  text-alert">ขออภัยค่ะ ตำแหน่งที่ท่านเลือก ไม่อยู่ในพื้นที่ของท่านค่ะ</p>
        </div>
        <div class="alert-icon">
            <i class="fa-solid fa-xmark"></i>
        </div>
        
    </div>
</div>
<!-- ⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇ - ห้ามลบ - ⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇⬇ -->
<div class="item sos-map bg-white d-none">

    <div class="form-group {{ $errors->has('photo_sos') ? 'has-error' : ''}}">
        <label for="photo_sos" class="control-label">{{ 'Photo Sos' }}</label>
        <input class="form-control" name="photo_sos" type="file" id="photo_sos" value="{{ isset($sos_help_center->photo_sos) ? $sos_help_center->photo_sos : ''}}" >
        {!! $errors->first('photo_sos', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($sos_help_center->user_id) ? $sos_help_center->user_id : ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('organization_helper') ? 'has-error' : ''}}">
        <label for="organization_helper" class="control-label">{{ 'Organization Helper' }}</label>
        <input class="form-control" name="organization_helper" type="text" id="organization_helper" value="{{ isset($sos_help_center->organization_helper) ? $sos_help_center->organization_helper : ''}}" >
        {!! $errors->first('organization_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('name_helper') ? 'has-error' : ''}}">
        <label for="name_helper" class="control-label">{{ 'Name Helper' }}</label>
        <input class="form-control" name="name_helper" type="text" id="name_helper" value="{{ isset($sos_help_center->name_helper) ? $sos_help_center->name_helper : ''}}" >
        {!! $errors->first('name_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('operating_unit_id') ? 'has-error' : ''}}">
        <label for="operating_unit_id" class="control-label">{{ 'Partner Id' }}</label>
        <input class="form-control" name="operating_unit_id" type="number" id="operating_unit_id" value="{{ isset($sos_help_center->operating_unit_id) ? $sos_help_center->operating_unit_id : ''}}" >
        {!! $errors->first('operating_unit_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('helper_id') ? 'has-error' : ''}}">
        <label for="helper_id" class="control-label">{{ 'Helper Id' }}</label>
        <input class="form-control" name="helper_id" type="number" id="helper_id" value="{{ isset($sos_help_center->helper_id) ? $sos_help_center->helper_id : ''}}" >
        {!! $errors->first('helper_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_impression') ? 'has-error' : ''}}">
        <label for="score_impression" class="control-label">{{ 'Score Impression' }}</label>
        <input class="form-control" name="score_impression" type="number" id="score_impression" value="{{ isset($sos_help_center->score_impression) ? $sos_help_center->score_impression : ''}}" >
        {!! $errors->first('score_impression', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_period') ? 'has-error' : ''}}">
        <label for="score_period" class="control-label">{{ 'Score Period' }}</label>
        <input class="form-control" name="score_period" type="number" id="score_period" value="{{ isset($sos_help_center->score_period) ? $sos_help_center->score_period : ''}}" >
        {!! $errors->first('score_period', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('score_total') ? 'has-error' : ''}}">
        <label for="score_total" class="control-label">{{ 'Score Total' }}</label>
        <input class="form-control" name="score_total" type="number" id="score_total" value="{{ isset($sos_help_center->score_total) ? $sos_help_center->score_total : ''}}" >
        {!! $errors->first('score_total', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('commemt_help') ? 'has-error' : ''}}">
        <label for="commemt_help" class="control-label">{{ 'Commemt Help' }}</label>
        <input class="form-control" name="commemt_help" type="text" id="commemt_help" value="{{ isset($sos_help_center->commemt_help) ? $sos_help_center->commemt_help : ''}}" >
        {!! $errors->first('commemt_help', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed') ? 'has-error' : ''}}">
        <label for="photo_succeed" class="control-label">{{ 'Photo Succeed' }}</label>
        <input class="form-control" name="photo_succeed" type="file" id="photo_succeed" value="{{ isset($sos_help_center->photo_succeed) ? $sos_help_center->photo_succeed : ''}}" >
        {!! $errors->first('photo_succeed', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('photo_succeed_by') ? 'has-error' : ''}}">
        <label for="photo_succeed_by" class="control-label">{{ 'Photo Succeed By' }}</label>
        <input class="form-control" name="photo_succeed_by" type="text" id="photo_succeed_by" value="{{ isset($sos_help_center->photo_succeed_by) ? $sos_help_center->photo_succeed_by : ''}}" >
        {!! $errors->first('photo_succeed_by', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('remark_helper') ? 'has-error' : ''}}">
        <label for="remark_helper" class="control-label">{{ 'Remark Helper' }}</label>
        <input class="form-control" name="remark_helper" type="text" id="remark_helper" value="{{ isset($sos_help_center->remark_helper) ? $sos_help_center->remark_helper : ''}}" >
        {!! $errors->first('remark_helper', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('notify') ? 'has-error' : ''}}">
        <label for="notify" class="control-label">{{ 'Notify' }}</label>
        <input class="form-control" name="notify" type="text" id="notify" value="{{ isset($sos_help_center->notify) ? $sos_help_center->notify : ''}}" >
        {!! $errors->first('notify', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <label for="status" class="control-label">{{ 'Status' }}</label>
        <input class="form-control" name="status" type="text" id="status" value="{{ isset($sos_help_center->status) ? $sos_help_center->status : ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>

</div>
<!-- ⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆ - ห้ามลบ - ⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆⬆ -->

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<!-- VIICHECK ใช้จริงใช้อันนี้ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<style type="text/css">
    #map {
      height: calc(40vh);
    }

    #mapMarkLocation {
      height: calc(65vh);
    }

    #map_places {
      height: calc(65vh);
    }

    #map_operating_unit {
      height: calc(80vh);
    }

    #map_go_to_help {
      height: calc(65vh);
    }

    #mapTest {
      height: calc(80vh);
    }
</style>

<!-- MAP GO TO HELP -->
<script>
    var Active_reface_map_go_to ;
    var status_old ;
    var rc_old ;

    function reface_map_go_to_help(){
        show_div_sos_or_unit('show_unit');

        open_map_go_to_help();
        let sos_id =  '{{ $sos_help_center->id }}' ;

        let sos_lat = document.querySelector('#lat'); 
        let sos_lng = document.querySelector('#lng'); 
        let m_lat = parseFloat(sos_lat.value);
        let m_lng = parseFloat(sos_lng.value);

        fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id )
            .then(response => response.json())
            .then(start_result => {
                // console.log("start_result");

                status_old = start_result['status_sos'] ;
                rc_old = start_result['rc'] ;

                if (rc_old) {
                    
                    let start_class_text_show_rc ;
                    let rc_black_text_old = "" ;

                    switch(start_result['rc']) {
                        case 'ดำ':
                            start_class_text_show_rc = "idc-rc-black";
                            rc_black_text_old = " : " + start_result['rc_black_text'] ;
                            rc_old =  rc_old + rc_black_text_old ;
                        break;
                        case 'ขาว(ทั่วไป)':
                            start_class_text_show_rc = "idc-rc-normal";
                        break;
                        case 'เขียว(ไม่รุนแรง)':
                            start_class_text_show_rc = "idc-rc-green";
                        break;
                        case 'เหลือง(เร่งด่วน)':
                            start_class_text_show_rc = "idc-rc-yellow";
                        break;
                        case 'แดง(วิกฤติ)':
                            start_class_text_show_rc = "idc-rc-red";
                        break;
                    }

                    document.querySelector('#show_rc').classList.remove('d-none');
                    document.querySelector('#show_rc').innerHTML = "รหัสความรุนแรง ณ จุดเกิดเหตุ (RC) <br>" + rc_old + rc_black_text_old ;

                    document.querySelector('#show_rc').classList.add(start_class_text_show_rc);
                }

                if (start_result['idc']) {
                    document.querySelector('#show_idc').classList.remove('d-none');
                    document.querySelector('#show_idc').innerHTML = "การให้รหัสความรุนแรง (IDC) <br>" + start_result['idc'] ;

                    let start_class_text_show_idc ;
                    switch(start_result['idc']) {
                        case 'ดำ':
                            start_class_text_show_idc = "idc-rc-black";
                        break;
                        case 'ขาว(ทั่วไป)':
                            start_class_text_show_idc = "idc-rc-normal";
                        break;
                        case 'เขียว(ไม่รุนแรง)':
                            start_class_text_show_idc = "idc-rc-green";
                        break;
                        case 'เหลือง(เร่งด่วน)':
                            start_class_text_show_idc = "idc-rc-yellow";
                        break;
                        case 'แดง(วิกฤติ)':
                            start_class_text_show_idc = "idc-rc-red";
                        break;
                    }
                    document.querySelector('#show_idc').classList.add(start_class_text_show_idc);
                }



                document.querySelector('#show_status').innerHTML = start_result['status_sos'] ;
                switch(start_result['status_sos']) {
                    case 'เสร็จสิ้น':
                        start_class_text_show_status = "text-success";
                    break;
                    default:
                        start_class_text_show_status = "text-warning";
                    break;
                }
                let start_class_show_status = document.querySelector('#show_status').classList ;
                    document.querySelector('#show_status').classList.remove(start_class_show_status[0]);
                    document.querySelector('#show_status').classList.add(start_class_text_show_status);

                if (start_result['remark_status']) {
                    document.querySelector('#show_remark_status').classList.remove('d-none');
                    document.querySelector('#text_remark_status').innerHTML = start_result['remark_status'];
                }else{
                    document.querySelector('#show_remark_status').classList.add('d-none');
                    document.querySelector('#text_remark_status').innerHTML = "";
                }

                // document.querySelector('#h4_show_distance').classList.add('d-none');

                if (start_result['status_sos'] != 'เสร็จสิ้น') {

                    // document.querySelector('#show_distance').innerHTML = start_result['distance'].toFixed(2) ;
                    // document.querySelector('#h4_show_distance').classList.remove('d-none');

                    set_marker_go_to_help(start_result['officer_lat'] , start_result['officer_lng'] , start_result['officer_level']);
                    
                    // เส้นทาง
                    get_Directions_map_go_to_help(officer_go_to_help_marker,sos_go_to_help_marker);

                    let start_Item_1 = new google.maps.LatLng(m_lat, m_lng);
                    let start_myPlace = new google.maps.LatLng(start_result['officer_lat'], start_result['officer_lng']);

                    let start_bounds = new google.maps.LatLngBounds();
                        start_bounds.extend(start_myPlace);
                        start_bounds.extend(start_Item_1);
                    map_go_to_help.fitBounds(start_bounds);

                    document.querySelector('#span_btn_steps_travel').classList.remove('d-none');

                }


            });

        // LOOP ---------------------------------------------------------------------------------------

        reface_map_go_to = setInterval(function() {
            Active_reface_map_go_to = "Yes" ;
            fetch("{{ url('/') }}/api/get_current_officer_location" + "/" + sos_id )
                .then(response => response.json())
                .then(result => {
                    // console.log("LOOP get_current_officer");
                    // console.log(result);

                    if (result['status_sos'] != status_old) {

                        let img_stk = '{{ url("/") }}/img/stickerline/PNG/37.2.png' ;
                        alerts_status(img_stk , result['status_sos'] , 'status');
                        
                        status_old = result['status_sos'] ;
                    }

                    if (result['rc'] != rc_old) {

                        let class_text_show_rc ;
                        let rc_black_text_old = "" ;
                        switch(result['rc']) {
                            case 'ดำ':
                                class_text_show_rc = "btn-dark";
                                rc_black_text_old = " : " + result['rc_black_text'] ;
                            break;
                            case 'ขาว(ทั่วไป)':
                                class_text_show_rc = "btn-light";
                            break;
                            case 'เขียว(ไม่รุนแรง)':
                                class_text_show_rc = "btn-success";
                            break;
                            case 'เหลือง(เร่งด่วน)':
                                class_text_show_rc = "btn-warning";
                            break;
                            case 'แดง(วิกฤติ)':
                                class_text_show_rc = "btn-danger";
                            break;
                        }

                        if ( document.querySelector('#show_rc').classList[1] ) {
                            document.querySelector('#show_rc').classList.remove( document.querySelector('#show_rc').classList[1] );
                        }

                        document.querySelector('#show_rc').classList.remove('d-none');
                        document.querySelector('#show_rc').innerHTML = "รหัสความรุนแรง ณ จุดเกิดเหตุ (RC) <br>" + result['rc'] + rc_black_text_old ;
                        document.querySelector('#show_rc').classList.add(class_text_show_rc);

                        // let img_stk = '{{ url("/") }}/img/stickerline/PNG/37.2.png' ;
                        // alerts_status(img_stk , , 'rc');
                        
                        rc_old = result['rc'] + rc_black_text_old ;
                    }

                    document.querySelector('#show_status').innerHTML = result['status_sos'] ;
                    switch(result['status_sos']) {
                        case 'เสร็จสิ้น':
                            class_text_show_status = "text-success";
                        break;
                        default:
                            class_text_show_status = "text-warning";
                        break;
                    }
                    let class_show_status = document.querySelector('#show_status').classList ;
                        document.querySelector('#show_status').classList.remove(class_show_status[0]);
                        document.querySelector('#show_status').classList.add(class_text_show_status);

                    if (result['remark_status']) {
                        document.querySelector('#show_remark_status').classList.remove('d-none');
                        document.querySelector('#text_remark_status').innerHTML = result['remark_status'];
                    }else{
                        document.querySelector('#show_remark_status').classList.add('d-none');
                        document.querySelector('#text_remark_status').innerHTML = "";
                    }

                    

                    if (result['status_sos'] === 'เสร็จสิ้น') {
                        // document.querySelector('#h4_show_distance').classList.add('d-none');
                        document.querySelector('#span_btn_steps_travel').classList.add('d-none');
                        myStop_reface_map_go_to();
                    }else{
                        // document.querySelector('#show_distance').innerHTML = result['distance'].toFixed(2) ;
                        set_marker_go_to_help(result['officer_lat'] , result['officer_lng'] , result['officer_level']);

                        let Item_1 = new google.maps.LatLng(m_lat, m_lng);
                        let myPlace = new google.maps.LatLng(result['officer_lat'], result['officer_lng']);

                        let bounds = new google.maps.LatLngBounds();
                            bounds.extend(myPlace);
                            bounds.extend(Item_1);
                        // map_go_to_help.fitBounds(bounds);

                        // if ( map_go_to_help.getZoom() ){   // or set a minimum
                        //     map_go_to_help.setZoom(map_go_to_help.getZoom() - 2);  // set zoom here
                        //     console.log(map_go_to_help.getZoom());
                        //     console.log(map_go_to_help.getZoom() -2 );
                        //     console.log("-----------");
                        // }
                    }

            });

        }, 10000);

    }

    function myStop_reface_map_go_to() {
        clearInterval(reface_map_go_to);
        // console.log("STOP LOOP");
    }

    function open_map_go_to_help(){

        let sos_lat = document.querySelector('#lat'); 
        let sos_lng = document.querySelector('#lng'); 
        // console.log(parseFloat(sos_lat.value));
        // console.log(parseFloat(sos_lng.value));

        let m_lat = parseFloat(sos_lat.value);
        let m_lng = parseFloat(sos_lng.value);
        let m_numZoom = parseFloat('17');

        map_go_to_help = new google.maps.Map(document.getElementById("map_go_to_help"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (sos_lat.value && sos_lng.value) {
            if (sos_go_to_help_marker) {
                sos_go_to_help_marker.setMap(null);
            }

            sos_go_to_help_marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map_go_to_help,
                icon: image_sos,
            });
        }
    }


    function set_marker_go_to_help(officer_lat , officer_lng , officer_level){
        let icon_level ;

        switch(officer_level) {
            case 'FR':
                icon_level = "{{ url('/img/icon/operating_unit/เขียว.png') }}";
            break;
            case 'BLS':
                icon_level = "{{ url('/img/icon/operating_unit/เหลือง.png') }}";
            break;
            default:
                icon_level = "{{ url('/img/icon/operating_unit/แดง.png') }}";
        }

        if (officer_go_to_help_marker) {
            officer_go_to_help_marker.setMap(null);
        }
        officer_go_to_help_marker = new google.maps.Marker({
            position: {lat: parseFloat(officer_lat) , lng: parseFloat(officer_lng) },
            map: map_go_to_help,
            icon: icon_level,
        });

    }

    function get_Directions_map_go_to_help(markerA, markerB) {

        // console.log('get_Directions');

        if (directionsDisplay_go_to_help) {
            directionsDisplay_go_to_help.setMap(null);
        }

        service_go_to_help = new google.maps.DirectionsService();
        directionsDisplay_go_to_help = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map_go_to_help,
            suppressMarkers: true, // suppress the default markers
        });

        service_go_to_help.route({
            origin: markerA.getPosition(),
            destination: markerB.getPosition(),
            travelMode: 'DRIVING',
        }, function(response, status) {
            // console.log(response);
            if (status === 'OK') {
                directionsDisplay_go_to_help.setDirections(response);
                // ระยะทาง
                let text_distance = response.routes[0].legs[0].distance.text;
                document.querySelector('#show_distance').innerHTML = text_distance;
                // เวลา
                let text_duration = response.routes[0].legs[0].duration.text ;
                document.querySelector('#text_duration').innerHTML = text_duration ;
                // เวลาถึงโดยประมาณ func_arrivalTime ==> อยู่หน้า theme ทั้ง viicheck และ partner
                let text_arrivalTime = func_arrivalTime(response.routes[0].legs[0].duration.value) ;
                document.querySelector('#text_arrivalTime').innerHTML = text_arrivalTime ;

                // แนะนำการเดินทาง
                let div_steps_travel = document.querySelector('#div_steps_travel');
                    div_steps_travel.innerHTML = '' ;

                var steps_travel = response.routes[0].legs[0].steps;
                for (var i = 0; i < steps_travel.length; i++) {

                    let No_step = i + 1 ; // ข้อที่
                    let distance_step = steps_travel[i].distance.text ; // ระยะทางก่อนเปลี่ยน
                    let instructions_step = steps_travel[i].instructions ; // คำอธิบาย
                    let maneuver = steps_travel[i].maneuver;
                    
                    
                    // console.log(i + "-" + steps_travel[i].maneuver);
                    
                    if (maneuver) {
                        maneuver = steps_travel[i].maneuver ; // วิธีเปลี่ยนเส้นทาง
                    }else{
                        if (instructions_step.includes("มุ่งหน้าทาง") || instructions_step.includes("ขับต่อไป")){
                            maneuver = "straight" ;
                        }
                        if (instructions_step.includes("ขวาหักศอก")){
                            maneuver = "sharp-right-turn" ;
                        }

                        if (instructions_step.includes("หักศอก")){
                            if (instructions_step.includes("ซ้าย")){
                                maneuver = "sharp-left-turn" ;
                            }
                            if (instructions_step.includes("ขวา")){
                                maneuver = "sharp-right-turn" ;
                            }
                        }

                        if (instructions_step.includes("เบี่ยง")){
                            
                            if (instructions_step.includes("ซ้าย")){
                                maneuver = "deviate-left" ;
                            }
                            if (instructions_step.includes("ขวา")){
                                maneuver = "deviate-right" ;
                            }
                        }

                        if (instructions_step.includes("ตัดเข้าไปยัง")){
                            maneuver = "merge" ;
                        }
                       
                    }

                    
                    
                    let steps_travel_html = 
                    '<div class="row gg-travel-guide">'+
                        '<div class=" gg-travel-guide-img">'+
                            '<img src="{{ url("/") }}/img/traffic sign/' + maneuver + '.png" width="70" height="70" >'+
                        '</div>'+
                        '<div class="gg-travel-guide-text">' + 
                        '<div>' + instructions_step + '</div>' +
                        '</div>'+
                        '<div class="d-flex justify-content-end py-3">'+
                        '    <div class="gg-travel-guide-bottom">'+
                        '        <span>' + distance_step + '</span>'+
                        '    </div>'+
                        '</div>'+
                    '</div>';
                    // let steps_travel_html = 
                    //     '<div class="col-2">'+
                    //         maneuver +
                    //     '</div>'+
                    //     '<div class="col-8">'+
                    //         instructions_step +
                    //     '</div>'+
                    //     '<div class="col-2">'+
                    //         instructions_step +
                    //     '</div>'+
                    //     '<hr>'
                    // ;

                    div_steps_travel.insertAdjacentHTML('beforeend', steps_travel_html); // แทรกล่างสุด
                }
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });

    }

</script>
<!-- END MAP GO TO HELP -->


<script>
    function alerts_status(img , status , type){
        // console.log(status);

        // notifications.js
        // notifications.min.js
        // notification-custom-script.js
        if (type === 'status') {
            img_info_noti(img , status);
        }

        let audio_update_status = new Audio("{{ asset('sound/เปลี่ยนสถานะ.mp3') }}");
            audio_update_status.play();
    }
</script>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
        check_show_btn_form_color(null);
        check_show_btn_select_unit();
        // click_select_btn('operating_unit');
        setTimeout(function() {
            document.querySelector('#form_data_1').click();
        }, 1000);

    });


    const image = "{{ url('/img/icon/operating_unit/sos.png') }}";
    var markers = [] ;
    let marker  ;
    let new_marker_places ;
    var sos_markers = [] ;
    let sos_marker  ;
    var sos_operating_markers = [] ;
    let sos_operating_marker  ;

    let sos_go_to_help_marker  ;
    let officer_go_to_help_marker  ;
    let directionsDisplay_go_to_help ;
    let service_go_to_help ;

    function initMap() {

        let lat = document.querySelector('#lat'); 
        let lng = document.querySelector('#lng'); 
            // console.log(parseFloat(lat.value));
            // console.log(parseFloat(lng.value));

        let m_lat = "";
        let m_lng = "";
        let m_numZoom = "";

        if (lat.value && lng.value) {
            m_lat = parseFloat(lat.value);
            m_lng = parseFloat(lng.value);
            m_numZoom = parseFloat('13');

            document.querySelector('#location_user').innerHTML = "(Lat: "+ parseFloat(lat.value).toFixed(5) + " , Long: " + parseFloat(lng.value).toFixed(5) + ")";
        }else{
            m_lat = parseFloat('12.870032');
            m_lng = parseFloat('100.992541');
            m_numZoom = parseFloat('6');
        }
        
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: m_lat, lng: m_lng },
            zoom: m_numZoom,
        });

        if (lat.value && lng.value) {
            if (marker) {
                marker.setMap(null);
            }

            if (new_marker_places){
              new_marker_places.setMap(null);
            }

            marker = new google.maps.Marker({
                position: {lat: parseFloat(m_lat) , lng: parseFloat(m_lng) },
                map: map,
                icon: image,
            });
            markers.push(marker);
        }

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        document.getElementById("span_submit_locations_sos").addEventListener("click", () => {
            
            geocodeLatLng(geocoder, map, infowindow);
        });
    }

    function mapMarkLocation(lat , lng , numZoom) {

        let m_lat ;
        let m_lng ;
        let m_numZoom ;

        if ('{{ Auth::user()->sub_organization }}' != 'ศูนย์ใหญ่') {

            document.querySelector('#location_P').value = '{{ Auth::user()->sub_organization }}';
            document.querySelector('#location_P').setAttribute('readonly', 'true');
            document.querySelector('#location_P').setAttribute('disabled', 'true');
            show_amphoe();
            
        }else{
            m_lat = parseFloat(lat);
            m_lng = parseFloat(lng);
            m_numZoom = parseFloat(numZoom);

            mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                center: {lat: m_lat, lng: m_lng },
                zoom: m_numZoom,
            });
        }


        

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });

    }

    function add_marker(marker_lat , marker_lng){
        if (marker) {
            marker.setMap(null);
        }

        if (new_marker_places){
          new_marker_places.setMap(null);
        }

        marker = new google.maps.Marker({
            position: {lat: parseFloat(marker_lat) , lng: parseFloat(marker_lng) },
            map: mapMarkLocation,
            icon: image,
        });
        markers.push(marker);

        document.querySelector('#lat').value = marker_lat ;
        document.querySelector('#lng').value = marker_lng ;
    }

    function show_amphoe(){

        let location_P = document.querySelector("#location_P");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/show_location_A")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_A = document.querySelector("#location_A");
                    location_A.innerHTML = "";
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start_A = document.createElement("option");
                    option_start_A.text = " - เลือกอำเภอ - ";
                    option_start_A.value = "";
                    location_A.add(option_start_A);

                let option_start_T = document.createElement("option");
                    option_start_T.text = " - เลือกตำบล - ";
                    option_start_T.value = "";
                    location_T.add(option_start_T);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.amphoe;
                    option.value = item.amphoe;
                    location_A.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_A.value;
    }

    function show_tambon(){

        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");

        fetch("{{ url('/') }}/api/location/"+location_P.value+"/"+location_A.value+"/show_location_T")
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                //UPDATE SELECT OPTION
                let location_T = document.querySelector("#location_T");
                    location_T.innerHTML = "";

                let option_start = document.createElement("option");
                    option_start.text = " - เลือกตำบล - ";
                    option_start.value = "";
                    location_T.add(option_start);

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.district;
                    option.value = item.district;
                    location_T.add(option);
                }
            });

            zoom_map(location_P.value , location_A.value , location_T.value) ;
            return location_T.value;
    }

    function select_T(){
        let location_P = document.querySelector("#location_P");
        let location_A = document.querySelector("#location_A");
        let location_T = document.querySelector("#location_T");
        zoom_map(location_P.value , location_A.value , location_T.value) ;
    }

    let delayTimer;

    function search_by_latlong(){
        // Clear any pending delay timer
        clearTimeout(delayTimer);
        
        // Start a new delay timer of 2 seconds before executing data_help_center()
        delayTimer = setTimeout(search_by_latlong_2sec, 2000);
    }

    function search_by_latlong_2sec(){

        document.querySelector('#span_show_errorLatLong').classList.add('d-none');

        let all_lat_lng = [];
        let text_lat ;
        let text_lng ;

        let input_search_by_latlong = document.querySelector("#input_search_by_latlong");
        let latlong = input_search_by_latlong.value.split(',');

        if (latlong[0] && latlong[1]){

          text_lat = latlong[0];
          text_lng = latlong[1];
          // console.log("text_lat >> " + text_lat);
          // console.log("text_lng >> " + text_lng);

          all_lat_lng.push( JSON.parse('{"lat":'+parseFloat(text_lat)+',"lng":'+parseFloat(text_lng)+'}') ) ;

          let bounds = new google.maps.LatLngBounds();

          for (let vc = 0; vc < all_lat_lng.length; vc++) {
              bounds.extend(all_lat_lng[vc]);
          }

          mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
              center: all_lat_lng[0],
              zoom: 13,
          });

          // Create the initial InfoWindow.
          let infoWindow = new google.maps.InfoWindow({
              // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
              // position: myLatlng,
          });

          infoWindow.open(mapMarkLocation);
          // Configure the click listener.
          mapMarkLocation.addListener("click", (mapsMouseEvent) => {
              // Close the current InfoWindow.
              infoWindow.close();
              // Create a new InfoWindow.
              infoWindow = new google.maps.InfoWindow({
                  // position: mapsMouseEvent.latLng,
              });

              infoWindow.setContent(
                  JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
              );

              let text_content = infoWindow.content ;
                  // console.log(text_content)

              const contentArr = text_content.split(",");
              const lat_Arr = contentArr[0].split(":");
                  let marker_lat = lat_Arr[1];
              const lng_Arr = contentArr[1].split(":");
                  let marker_lng = lng_Arr[1].replace("\n}", "");

              // console.log(marker_lat)
              // console.log(marker_lng)
              add_marker(marker_lat , marker_lng);
              
              infoWindow.open(mapMarkLocation);

          });

        }else{
          // console.log('ค้นหา ' + input_search_by_latlong.value + ' ไม่พบ');
          document.querySelector('#span_show_errorLatLong').classList.remove('d-none');
          document.querySelector('#span_show_errorLatLong').innerHTML = 'ค้นหา ' + input_search_by_latlong.value + ' ไม่พบ' ;

        } 
        
    }

    function zoom_map(province , amphoe , district){

        if (!province) {
            province = "null" ;
        }
        if (!amphoe) {
            amphoe = "null" ;
        }
        if (!district) {
            district = "null" ;
        }

        let all_lat_lng = [];

        // console.log(province);
        // console.log(amphoe);
        // console.log(district);

        fetch("{{ url('/') }}/api/zoom_map/" + province + "/" + amphoe + "/" + district)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for(let item of result){
                    all_lat_lng.push( JSON.parse('{"lat":'+parseFloat(item.lat)+',"lng":'+parseFloat(item.lng)+'}') ) ;
                }

                let bounds = new google.maps.LatLngBounds();

                for (let vc = 0; vc < all_lat_lng.length; vc++) {
                    bounds.extend(all_lat_lng[vc]);
                }

                if (district != "null" || result.length === 1) {
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        center: all_lat_lng[0],
                        zoom: 13,
                    });
                }else{
                    mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
                        // zoom: num_zoom,
                        center: bounds.getCenter(),
                    });
                    mapMarkLocation.fitBounds(bounds);
                }

                // Create the initial InfoWindow.
                let infoWindow = new google.maps.InfoWindow({
                    // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
                    // position: myLatlng,
                });

                infoWindow.open(mapMarkLocation);
                // Configure the click listener.
                mapMarkLocation.addListener("click", (mapsMouseEvent) => {
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        // position: mapsMouseEvent.latLng,
                    });

                    infoWindow.setContent(
                        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                    );

                    let text_content = infoWindow.content ;
                        // console.log(text_content)

                    const contentArr = text_content.split(",");
                    const lat_Arr = contentArr[0].split(":");
                        let marker_lat = lat_Arr[1];
                    const lng_Arr = contentArr[1].split(":");
                        let marker_lng = lng_Arr[1].replace("\n}", "");

                    // console.log(marker_lat)
                    // console.log(marker_lng)
                    add_marker(marker_lat , marker_lng);
                    
                    infoWindow.open(mapMarkLocation);

                });
                    
            });
        
    }

    function re_mapMarkLocation(){

        let input_search_by_latlong = document.querySelector('#input_search_by_latlong');
            input_search_by_latlong.value = "" ;
        let input_search_by_place = document.querySelector('#input_search_by_place');
            input_search_by_place.value = "" ;

        click_select_search_by('district');

        let location_P = document.querySelector("#location_P");
        let location_P_start = document.querySelector(".location_P_start");
            // console.log(location_P_start);
            location_P_start.selected =  true;

        let location_A = document.querySelector("#location_A");
            location_A.innerHTML = "" ;
        let location_T = document.querySelector("#location_T");
            location_T.innerHTML = "" ;

        let option_start_A = document.createElement("option");
            option_start_A.text = " - เลือกอำเภอ - ";
            option_start_A.value = "";
            location_A.add(option_start_A);

        let option_start_T = document.createElement("option");
            option_start_T.text = " - เลือกตำบล - ";
            option_start_T.value = "";
            location_T.add(option_start_T);

        mapMarkLocation = new google.maps.Map(document.getElementById("mapMarkLocation"), {
            center: {lat: 12.870032, lng: 100.992541 },
            zoom: 6,
        });

        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            // content: "คลิกที่แผนที่เพื่อรับโลเคชั่น",
            // position: myLatlng,
        });

        infoWindow.open(mapMarkLocation);
        // Configure the click listener.
        mapMarkLocation.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                // position: mapsMouseEvent.latLng,
            });

            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );

            let text_content = infoWindow.content ;
                // console.log(text_content)

            const contentArr = text_content.split(",");
            const lat_Arr = contentArr[0].split(":");
                let marker_lat = lat_Arr[1];
            const lng_Arr = contentArr[1].split(":");
                let marker_lng = lng_Arr[1].replace("\n}", "");

            // console.log(marker_lat)
            // console.log(marker_lng)
            add_marker(marker_lat , marker_lng);
            
            infoWindow.open(mapMarkLocation);

        });
    }

    function submit_locations_sos(){
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        if (sos_marker) {
            sos_marker.setMap(null);
        }

        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: parseFloat(input_lat.value), lng:  parseFloat(input_lng.value) },
            zoom: 14,
        });

        sos_marker = new google.maps.Marker({
            position: {lat: parseFloat(input_lat.value) , lng: parseFloat(input_lng.value) },
            map: map,
            icon: image,
        });
        sos_markers.push(sos_marker);

        document.querySelector('#location_user').innerHTML = "(Lat: "+ parseFloat(input_lat.value).toFixed(5) + " , Long: " + parseFloat(input_lng.value).toFixed(5) + ")";

        let detail_location_sos = document.querySelector("#detail_location_sos");
            detail_location_sos.innerHTML = "";

        document.querySelector('#btn_close_modal_mapMarkLocation').click();
        check_lat_lng();
        check_go_to(null);
    }

    function go_to_maps(){
        let tag_a = document.querySelector('#go_to_maps');
        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        tag_a.href = "https://www.google.co.th/maps/dir//"+input_lat.value+ ","+input_lng.value+"/@"+input_lat.value+","+input_lng.value+",17z";
        document.querySelector('#go_to_maps').click();
    }

    function geocodeLatLng(geocoder, map, infowindow) {

        let input_lat = document.querySelector('#lat');
        let input_lng = document.querySelector('#lng');

        const latlng = {
            lat: parseFloat(input_lat.value),
            lng: parseFloat(input_lng.value),
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

                ////// เช็คว่าเป็นพื้นที่จังหวัดรับผิดชอบหรือไม่ //////
                let sub_organization = "{{ Auth::user()->sub_organization }}" ;
                let name_district_P = district_P.replaceAll(' ','');
                    name_district_P = name_district_P.replaceAll('จังหวัด','');
                // console.log(sub_organization);
                // console.log(name_district_P);

                if ( sub_organization != 'ศูนย์ใหญ่' && sub_organization != name_district_P ) { // ไม่อยู่ในพื้นที่
                    
                    document.querySelector('#alert_phone').classList.add('up-down');
                    const animated = document.querySelector('.up-down');
                    animated.onanimationend = () => {
                        document.querySelector('#alert_phone').classList.remove('up-down');
                    };

                }else{ // อยู่ในพื้นที่

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

                    let formData = new FormData();

                    let data_sos_1669 = {
                        "id" : "{{ $sos_help_center->id }}",
                        "changwat" : district_P,
                        "amphoe" : district_A,
                        "tambon" : district_T,
                    }
                    // console.log(data_sos_1669);

                    formData.append('id', data_sos_1669.id);
                    formData.append('changwat', data_sos_1669.changwat);
                    formData.append('amphoe', data_sos_1669.amphoe);
                    formData.append('tambon', data_sos_1669.tambon);

                    fetch("{{ url('/') }}/api/update_code_sos_1669", {
                        method: 'POST',
                        body: formData
                    }).then(function (response){
                        return response.text();
                    }).then(function(data){
                        // console.log(data);
                        document.querySelector('#text_u_operating_code').innerHTML = data ;
                        document.querySelector('#text_in_formyellow_operating_code').innerHTML = data ;
                    }).catch(function(error){
                        // console.error(error);
                    });


                    if (response.results[0]) {
                        map.setZoom(15);

                        let detail_location_sos = document.querySelector("#detail_location_sos");
                            detail_location_sos.value = response.results[0].formatted_address;

                            check_lat_lng();
                            check_go_to(null);

                    } else {
                        window.alert("No results found");
                    }

                    submit_locations_sos();
                    open_map_operating_unit();
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function show_div_sos_or_unit(type){
        // console.log("type >>> " + type);

        if (type === 'show_sos') {
            document.querySelector('#div_detail_sos').classList.remove('d-none');
            document.querySelector('#div_data_operating').classList.add('d-none');
            if (Active_reface_map_go_to === "Yes") {
                myStop_reface_map_go_to();
            }
        }else if(type === 'show_unit'){
            document.querySelector('#div_detail_sos').classList.add('d-none');
            document.querySelector('#div_data_operating').classList.remove('d-none');
        }

    }

    function check_show_btn_form_color(suit){

        let type = "" ;

        if (suit != null) {
           type = suit ;
        }else{
            let operating_suit_type = document.querySelectorAll('input[name="operating_suit_type"]');
            let operating_suit_type_value = "" ;
                operating_suit_type.forEach(operating_suit_type => {
                    if(operating_suit_type.checked){
                        operating_suit_type_value = operating_suit_type.value;
                    }
                })
           type = operating_suit_type_value ;
        }

        switch(type) {
            case 'FR':
                document.querySelector('#btn_form_blue').classList.remove('d-none');
                document.querySelector('#btn_form_green').classList.add('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
            case 'BLS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.add('d-none');
                document.querySelector('#btn_form_pink').classList.remove('d-none');
            break;
            case 'ILS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.remove('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
            case 'ALS':
                document.querySelector('#btn_form_blue').classList.add('d-none');
                document.querySelector('#btn_form_green').classList.remove('d-none');
                document.querySelector('#btn_form_pink').classList.add('d-none');
            break;
        }

    }

    function check_show_btn_select_unit(){

        let status = '{{ $sos_help_center->status }}' ;

        if (status === 'รอการยืนยัน' || status === 'ปฏิเสธ' || status === 'รับแจ้งเหตุ' || !status) {
            document.querySelector('#btn_operation').classList.add('d-none');
            document.querySelector('#btn_select_operating_unit').classList.remove('d-none');
            document.querySelector('#btn_open_meet').classList.add('d-none');
        }else{
            document.querySelector('#btn_operation').classList.remove('d-none');
            document.querySelector('#btn_select_operating_unit').classList.add('d-none');
            document.querySelector('#btn_open_meet').classList.remove('d-none');
        }

    }

    function click_select_search_by(search_by){

      // map_places
      // mapMarkLocation

      if (search_by === "place"){
          document.querySelector('#map_places').classList.remove('d-none');
          document.querySelector('#mapMarkLocation').classList.add('d-none');
      }else{
          document.querySelector('#map_places').classList.add('d-none');
          document.querySelector('#mapMarkLocation').classList.remove('d-none');
      }
      
      // div ค้นหา
      document.querySelector('#div_search_by_district').classList.add('d-none');
      document.querySelector('#div_search_by_LatLong').classList.add('d-none');
      document.querySelector('#div_search_by_place').classList.add('d-none');

      document.querySelector('#div_search_by_' + search_by).classList.remove('d-none');
      // จบ div ค้นหา

      // btn เลือก
      document.querySelector('#btn_search_by_district').classList.remove('btn-success');
      document.querySelector('#btn_search_by_LatLong').classList.remove('btn-success');
      document.querySelector('#btn_search_by_place').classList.remove('btn-success');
      document.querySelector('#btn_search_by_district').classList.add('btn-outline-success');
      document.querySelector('#btn_search_by_LatLong').classList.add('btn-outline-success');
      document.querySelector('#btn_search_by_place').classList.add('btn-outline-success');

      document.querySelector('#btn_search_by_' + search_by).classList.remove('btn-outline-success');
      document.querySelector('#btn_search_by_' + search_by).classList.add('btn-success');
      // จบ btn เลือก

      // tag_i
      document.querySelector('#tag_i_search_by_district').classList.remove('fa-beat-fade');
      document.querySelector('#tag_i_search_by_LatLong').classList.remove('fa-beat-fade');
      document.querySelector('#tag_i_search_by_place').classList.remove('fa-beat-fade');

      document.querySelector('#tag_i_search_by_' + search_by).classList.add('fa-beat-fade');
      // จบ tag_i

    }

</script>

<script>
    function btn_save_data() {
        document.querySelector('#icon_save_data').classList.remove('d-none');
        document.querySelector('#text_btn_save').innerHTML = "บันทึก..";
        const animated = document.querySelector('.checkmark__check');
        animated.onanimationend = () => {
            setTimeout(() => {
                document.querySelector('#icon_save_data').classList.add('d-none');
                document.querySelector('#text_btn_save').innerHTML = "บันทึก";

            }, 1000);

        };

    }
</script>

<script>

  function initAutocomplete() {

    let map_places = new google.maps.Map(document.getElementById("map_places"), {
      center: {lat: 12.870032, lng: 100.992541 },
      zoom: 6,
      mapTypeId: "roadmap",
    });
    
    // Create the search box and link it to the UI element.
    
    const searchBox = new google.maps.places.SearchBox(input);
    
    // Bias the SearchBox results towards current map's viewport.
    map_places.addListener("bounds_changed", () => {
      searchBox.setBounds(map_places.getBounds());
    });

    let markers_places = [];

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
      const places = searchBox.getPlaces();
        
      if (places.length == 0) {
        // console.log('start1');
        return;
      }

      // Clear out the old markers_places.
      markers_places.forEach((marker) => {
        markers_places.setMap(null);
      });
      markers_places = [];

      // For each place, get the icon, name and location.
      const bounds = new google.maps.LatLngBounds();

      places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
          console.log("Returned place contains no geometry");
          return;
        }

        const icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };

        // Create a marker for each place.
        // markers_places.push(
        //   new google.maps.Marker({
        //     map: map_places,
        //     icon: image,
        //     title: place.name,
        //     position: place.geometry.location,
        //   })
        // );

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        const search_place_lat = place.geometry.location.lat();
        const search_place_lng = place.geometry.location.lng();

        geocodeLatLng_places(geocoder, map_places, infowindow , search_place_lat , search_place_lng);

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });

      map_places.fitBounds(bounds);
       
    });

    // Add a listener for click event on the map_places
    google.maps.event.addListener(map_places, 'click', function(event) {
      // Get the clicked location
      const clickedLocation = event.latLng;

      if (marker){
        marker.setMap(null);
      }

      if (new_marker_places){
        new_marker_places.setMap(null);
      }

      // Create a marker_places at the clicked location
      new_marker_places = new google.maps.Marker({
        position: clickedLocation,
        map: map_places,
        icon: image,
      });
      
      // Set the lat and lng of the clicked location to the input fields
      let place_lat = clickedLocation.lat();
      let place_lng = clickedLocation.lng();

      // console.log(place_lat);
      // console.log(place_lng);

      document.querySelector('#lat').value = place_lat ;
      document.querySelector('#lng').value = place_lng ;

    });

  }

  window.initAutocomplete = initAutocomplete;

  var input = document.getElementById("pac-input");
  var container = document.getElementById('id_tee_ja_sai');
        
  container.appendChild(input);
  map_places.controls[google.maps.ControlPosition.TOP_LEFT].push(container);

  function geocodeLatLng_places(geocoder, map, infowindow , place_lat , place_lng) {

    const latlng = {
        lat: parseFloat(place_lat),
        lng: parseFloat(place_lng),
    };
    geocoder
        .geocode({ location: latlng })
        .then((response) => {
            if (response.results[0]) {
                map.setZoom(15);
                const marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                });
                infowindow.setContent(response.results[0].formatted_address);
                infowindow.open(map, marker);

            } else {
                window.alert("No results found");
            }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
  }
 
</script>


<!-- alet_new_data -->
<script>

    function alet_new_data(form_color , key , value , old) {

        // เช็คว่ามีอันเดิมที่แสดงอยู่หรือไม่
        let elms_check = document.querySelectorAll('div[class~="iziToast"]')
        let check_alet_new_data = "No" ;

        let text_check = key + "_" + value + "_" + old ;

        for(let i_check = 0; i_check < elms_check.length; i_check++){

            // console.log(elms_check[i_check]['attributes']['data-change']['value']);

            if(elms_check[i_check]['attributes']['data-change']['value'] && elms_check[i_check]['attributes']['data-change']['value'] === text_check) {
                check_alet_new_data = "Yes" ;
                // console.log(i_check);
                break;
            }else{
                check_alet_new_data = "No" ;
            }
        }
        // จบ เช็คว่ามีอันเดิมที่แสดงอยู่หรือไม่

        if (check_alet_new_data === "No") {

            // console.log("SHOW alet_new_data");

            let pass = Math.floor(1000 + Math.random() * 9000);
            let text_form_yellow ;

            switch(form_color) {
                case 'form_yellow':
                    text_form_yellow = 'สีเหลือง' ;
                break;
            }

            let text_key = change_key_to_text_key(key);

            iziToast.show({
                color: 'dark',
                icon: 'fa-duotone fa-file-import',
                close: false,
                timeout: 8000,
                resetOnHover: true,
                title: 'ฟอร์ม "' +text_form_yellow+ '" มีข้อมูลใหม่!!',
                message: 'การเปลี่ยนแปลง ข้อ : ' +text_key+ '<br>ข้อมูลที่เปลี่ยนแปลง : จาก <b>' +old+ '</b> เป็น <b>' +value+ '</b>',
                position: 'bottomLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(0, 255, 184)',
                buttons: [
                  [
                    '<button>บันทึก (<span id="nub_vi_'+pass+'">8</span>)</button>',
                    function (instance, toast) {
                        save_data(key , value , old)
                      instance.hide({
                        transitionOut: 'fadeOutUp'
                      }, toast);
                    }
                  ],
                  [
                    '<button class="btn btn-danger">ไม่บันทึก</button>',
                    function (instance, toast) {
                        dont_save_data(key , value , old);
                        instance.hide({
                        transitionOut: 'fadeOutUp'
                      }, toast);
                    }
                  ]
                ],onClosed: function asdfa(instance, toast, closedBy){
                    if (closedBy === 'timeout') {
                        save_data(key , value , old);
                    }
                   
                },onOpening: function () {
                    // console.log(pass);
                    startTimer_nub_vi(pass);
                    let audio_alet_new_data = new Audio("{{ asset('sound/เตือน.mp3') }}");
                        audio_alet_new_data.play();
                }
            
            });

            // ----------------------------
            let tag_iziToast = [] ;

            // check data-id
            let elms = document.querySelectorAll('div[class~="iziToast"]')

            for(let i=0; i < elms.length; i++){
                // var test = elms[i].getAttribute("data-izitoast-ref")

                if (!elms[i]['attributes']['data-id']) {
                    // console.log("NO data-id");
                    let data_id = document.createAttribute("data-id");
                        data_id.value = pass ;
                        elms[i].setAttributeNode(data_id);
                }

                if (!elms[i]['attributes']['data-change']) {
                    let data_change = document.createAttribute("data-change");
                        data_change.value = key + "_" + value + "_" + old ;
                        elms[i].setAttributeNode(data_change);
                }
            }

            // กำหนด Tag ให้ tag_iziToast
            for(let xi =0; xi < elms.length; xi++){
                tag_iziToast[pass] = elms[xi] ;
            }

            // เมาส์วาง
            tag_iziToast[pass].addEventListener("mouseout", (event) => {
                // นับวิใหม่
                startTimer_nub_vi(pass);
            }, false);

            tag_iziToast[pass].addEventListener("mouseover", (event) => {
                // หยุดนับ
                myStop_startTimer_nub_vi(pass);
            }, false);
            // จบ เมาส์วาง
        }
        
    }

    var timer_nub_vi = [] ;

    function startTimer(duration, display,pass) {
        let timer = duration, seconds;
        
        timer_nub_vi[pass] = setInterval(function () {

            seconds = parseInt(timer % 60, 10);
            display.textContent =  seconds;

            if (--timer < 0) {
                timer = duration;
            }

        }, 1000);
    }

    function startTimer_nub_vi(pass) {
        let fiveMinutes = 7,
            display = document.querySelector('#nub_vi_'+pass);
        startTimer(fiveMinutes, display,pass);
    };

    function myStop_startTimer_nub_vi(pass) {
        clearInterval(timer_nub_vi[pass]);
        // alert("STOP");
    }

    function save_data(key , value , old){

        let text_key = change_key_to_text_key(key);

        iziToast.success({
            timeout: 4000,
            position: "bottomLeft",
            icon: 'fa-solid fa-file-check',
            title: 'บันทึกข้อมูลเรียบร้อย',
            message: 'บันทึกข้อมูล ข้อ : ' + text_key + ' เรียบร้อย ข้อมูลที่เปลี่ยนแปลง : ' + value
        });
        // บันทึกข้อมูลใหม่
        edit_form_yellow(key , value , old);
        let audio_save_data = new Audio("{{ asset('sound/ยืนยัน.mp3') }}");
            audio_save_data.play();

    }
    function dont_save_data(key , value , old){

        let text_key = change_key_to_text_key(key);

        iziToast.warning({
            timeout: 4000,
            position: "bottomLeft",
            icon: 'fa-solid fa-file-excel',
            title: 'บันทึกข้อมูลไม่สำเร็จ',
            message: 'ปฏิเสธการบันทึกข้อมูล ข้อ : ' + text_key + ' เรียบร้อย'
        });

        // เปลี่ยนข้อมูลกลับเหมือนเดิม
        check_go_to(null);
        let audio_dont_save_data = new Audio("{{ asset('sound/ปฏิเสธ.mp3') }}");
            audio_dont_save_data.play();
    }

    function change_key_to_text_key(key){

        let text_key ;

        switch(key) {

            case 'be_notified':
                text_key = "รับแจ้งเหตุทาง" ;
            break;
            case 'name_user':
                text_key = "ชื่อ/รหัสผู้แจ้งเหตุ" ;
            break;
            case 'phone_user':
                text_key = "โทรศัพท์ผู้แจ้ง/ความถี่วิทยุ" ;
            break;
            case 'lat':
                text_key = "ละติจูด" ;
            break;
            case 'lng':
                text_key = "ลองติจูด" ;
            break;
            case 'location_sos':
                text_key = "รายละเอียดสถานที่เกิดเหตุ" ;
            break;
            case 'symptom':
                text_key = "อาการนำสำคัญ" ;
            break;
            case 'symptom_other':
                text_key = "อาการนำสำคัญ รายละเอียดอื่นๆ" ;
            break;
            case 'idc':
                text_key = "การให้รหัสความรุนแรง" ;
            break;
            case 'vehicle_type':
                text_key = "ชนิดยานพาหนะ" ;
            break;
            case 'operating_suit_type':
                text_key = "ประเภทชุดปฏิบัติการ" ;
            break;
            case 'operation_unit_name':
                text_key = "ชื่อหน่วยปฏิบัติการ" ;
            break;
            case 'action_set_name':
                text_key = "ชื่อชุดปฏิบัติการ" ;
            break;
            case 'time_create_sos':
                text_key = "เวลารับแจ้งเหตุ" ;
            break;
            case 'time_command':
                text_key = "เวลาสั่งการ" ;
            break;
            case 'time_go_to_help':
                text_key = "เวลาออกจากฐาน" ;
            break;
            case 'time_to_the_scene':
                text_key = "เวลาถึงที่เกิดเหตุ" ;
            break;
            case 'time_leave_the_scene':
                text_key = "เวลาออกจากที่เกิดเหตุ" ;
            break;
            case 'time_hospital':
                text_key = "เวลาถึง รพ." ;
            break;
            case 'time_to_the_operating_base':
                text_key = "เวลากลับถึงฐาน" ;
            break;
            case 'km_create_sos_to_go_to_help':
                text_key = "เลขไมค์ก่อนออกจากฐาน" ;
            break;
            case 'km_to_the_scene_to_leave_the_scene':
                text_key = "เลขไมค์ถึงที่เกิดเหตุ" ;
            break;
            case 'km_hospital':
                text_key = "เลขไมค์ถึง รพ." ;
            break;
            case 'km_operating_base':
                text_key = "เลขไมค์กลับถึงฐาน" ;
            break;
            case 'rc':
                text_key = "การให้รหัสความรุนแรง ณ จุดเกิดเหตุ" ;
            break;
            case 'rc_black_text':
                text_key = "รหัส สีดำ" ;
            break;
            case 'treatment':
                text_key = "การปฏิบัติการ" ;
            break;
            case 'sub_treatment':
                text_key = "การปฏิบัติการ เพิ่มเติม" ;
            break;
            case 'patient_name_1':
                text_key = "ผู้ป่วย ๑. ชื่อ-สกุล" ;
            break;
            case 'patient_age_1':
                text_key = "ผู้ป่วย ๑. อายุ (ปี)" ;
            break;
            case 'patient_hn_1':
                text_key = "ผู้ป่วย ๑. รหัสผู้ป่วย" ;
            break;
            case 'patient_vn_1':
                text_key = "ผู้ป่วย ๑. เลขประจำตัวประชาชน" ;
            break;
            case 'delivered_province_1':
                text_key = "ผู้ป่วย ๑. จังหวัดที่นำส่ง" ;
            break;
            case 'delivered_hospital_1':
                text_key = "ผู้ป่วย ๑. โรงพยาบาลที่นำส่ง" ;
            break;
            case 'patient_name_2':
                text_key = "ผู้ป่วย ๒. ชื่อ-สกุล" ;
            break;
            case 'patient_age_2':
                text_key = "ผู้ป่วย ๒. อายุ (ปี)" ;
            break;
            case 'patient_hn_2':
                text_key = "ผู้ป่วย ๒. รหัสผู้ป่วย" ;
            break;
            case 'patient_vn_2':
                text_key = "ผู้ป่วย ๒. เลขประจำตัวประชาชน" ;
            break;
            case 'delivered_province_2':
                text_key = "ผู้ป่วย ๒. จังหวัดที่นำส่ง" ;
            break;
            case 'delivered_hospital_2':
                text_key = "ผู้ป่วย ๒. โรงพยาบาลที่นำส่ง" ;
            break;
            case 'submission_criteria':
                text_key = "เกณฑ์การนำส่ง" ;
            break;
            case 'communication_hospital':
                text_key = "การติดต่อสื่อสารกับ รพ.ที่นำส่ง" ;
            break;
            case 'registration_category':
                text_key = "เพิ่มเติม ทะเบียนรถหมวด" ;
            break;
            case 'registration_number':
                text_key = "เพิ่มเติม เลขทะเบียน" ;
            break;
            case 'registration_province':
                text_key = "เพิ่มเติม จังหวัด" ;
            break;
            case 'owner_registration':
                text_key = "เพิ่มเติม เจ้าของ" ;
            break;
            
            default:
                text_key = "..." ;
        }

        return text_key ;
    }

</script>
<!-- END alet_new_data -->