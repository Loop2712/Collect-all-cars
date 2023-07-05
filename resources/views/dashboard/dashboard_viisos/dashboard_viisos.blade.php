



<!--========================= เลือกพื้นที่ - ข้อมูลการช่วยเหลือ && คะแนนผู้ใช้เหลือ  =============================-->
<div class="row">

    <div class="col-12 col-xl-4 d-flex">
        <div class="card radius-10 w-100 overflow-hidden">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">ข้อมูลการช่วยเหลือ</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
            </div>

            <div class="store-metrics p-3 mb-3 ps ps--active-y">
                <div class="card mt-3 radius-10 border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">จำนวนขอความช่วยเหลือ </p>
                                <h4 class="mb-0">35</h4>
                            </div>
                            <div class="widgets-icons bg-light-primary text-primary ms-auto"><i class="bx bxs-shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">ระยะเวลาช่วยเหลือเฉลี่ย</p>
                                <h4 class="mb-0">3.52 นาที</h4>
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class="bx bxs-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">ช่วงเวลาขอความช่วยเหลือสูงสุด</p>
                                <h4 class="mb-0">13.00 - 14.00</h4>
                            </div>
                            <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-category"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">ช่วงเวลาขอความช่วยเหลือต่ำสุด</p>
                                <h4 class="mb-0">01.00 - 02.00</h4>
                            </div>
                            <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bxs-cart-add"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 border shadow-none mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Vendors</p>
                                <h4 class="mb-0">55</h4>
                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class="bx bxs-user-account"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div></div>
        </div>
    </div>

    <div class="col-12 col-xl-8 d-flex">
      <div class="card radius-10 w-100">
        <div class="card">
            <div class="card-header border-bottom-0 bg-transparent ">
                <div class="d-flex align-items-center col-12" style="margin-top:10px;">
                      <div class="col-6">
                        <h5 class="font-weight-bold mb-0">เลือกช่วงเวลา</h5>
                      </div>
                      <div class="col-6 ">
                          <a style="float: right;">ขอความช่วยเหลือทั้งหมด : <span id="sos_all">35</span> ครั้ง</a>
                      </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                <div class="row justify-content-center" style="margin-top:-30px">
                        <div class="col-md-2">
                            <label class="control-label"></label>
                            <select class="form-control" id="select_area" onchange="select_area();">
                                <option value="">พื้นที่ : ทั้งหมด</option>
                                <option value="ViiCHECK พระนครศรีอยุธยา">ViiCHECK พระนครศรีอยุธยา</option>
                                <option value="ViiCHECK พระนครศรีอยุธยา&amp;viicheck">ViiCHECK พระนครศรีอยุธยา&amp;viicheck</option>
                                <option value="viicheck">viicheck</option>
                                <option value="วีเช็ค สำหรับนำเสนอ">วีเช็ค สำหรับนำเสนอ</option>
                                <option value="ทดสอบ กรมการท่องเที่ยว">ทดสอบ กรมการท่องเที่ยว</option>
                                <option value="ViiCHECK นครนายก">ViiCHECK นครนายก</option>
                                <option value="ViiCHECK จตุจักร">ViiCHECK จตุจักร</option>
                                <option value="ทดสอบ กรุงเทพ">ทดสอบ กรุงเทพ</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label"></label>
                            <select class="form-control" id="select_year" onchange="select_year();">
                              <option value="">เลือกปี</option>
                              <option value="2020">2563</option>
                              <option value="2021">2564</option>
                              <option value="2022">2565</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label"></label>
                            <select class="form-control" id="select_month" onchange="select_month();">
                              <option value="">เลือกเดือน</option>
                              <option value="01">มกราคม</option>
                              <option value="02">กุมภาพันธ์</option>
                              <option value="03">มีนาคม</option>
                              <option value="04">เมษายน</option>
                              <option value="05">พฤษภาคม</option>
                              <option value="06">มิถุนายน</option>
                              <option value="07">กรกฎาคม</option>
                              <option value="08">สิงหาคม</option>
                              <option value="09">กันยายน</option>
                              <option value="10">ตุลาคม</option>
                              <option value="11">พฤศจิกายน</option>
                              <option value="12">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-md-1 col-6">
                            <br>
                            <form style="float: right;" method="GET" action="https://www.viicheck.com/sos_detail_partner" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 " role="search">
                                <div class="input-group ">
                                  <input type="hidden" class="form-control" id="input_area" name="area" value="">

                                  <input type="hidden" class="form-control" id="input_year" name="year" value="">
                                  <input type="hidden" class="form-control" id="input_month" name="month" value="">
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    ค้นหา
                                </button>
                            </form>
                        </div>
                        <div class="col-md-2 col-6 d-none d-lg-block ">
                            <br>
                            <a href="https://www.viicheck.com/sos_detail_partner">
                                <button class="btn btn-danger">
                                    ล้างการค้นหา
                                </button>
                            </a>
                        </div>
                        <div class="col-md-2 col-6 d-block d-md-none " style="margin-top:8px;">
                            <br>
                            <a href="https://www.viicheck.com/sos_detail_partner">
                                <button class="btn btn-danger">
                                    ล้างการค้นหา
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="card radius-10 " style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                    <div class="card-header border-bottom-0 bg-transparent">
                        <div class="d-flex align-items-center" style="margin-top:10px;">
                            <div class="col-6">
                                <h5 class="font-weight-bold mb-0">
                                  @if(!empty($name_area))
                                  ขอความช่วยเหลือในพื้นที่ {{$name_area}}
                                  @else
                                  ขอความช่วยเหลือ
                                  @endif
                                </h5>
                            </div>
                            <div class="col-6">
                                <div style="float: right;">ขอความช่วยเหลือในเดือนที่ค้นหา : <b>{{ $total }}</b> ครั้ง</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-11 text-center d-block d-md-none" style="margin-top:20px;">
                          <ul class="nav nav-pills nav-pills-danger mt-4 d-flex justify-content-center"   role="tablist" >
                              <li class="nav-item" >
                              <a id="chartam" class="active btn btn-outline-danger" href="#" role="tab" data-toggle="tab" style=" width: 115px;" onclick="
                                      document.querySelector('#chart2222').classList.remove('d-none'),
                                      document.querySelector('#chart1111').classList.add('d-none');">
                                      <b style="font-size: 15px;">AM</b>
                                  </a>
                              </li>
                          &nbsp;
                              <li class="nav-item" >
                              <a id="chartpm" class="btn btn-outline-danger" href="#" role="tab" data-toggle="tab" onclick="
                                          document.querySelector('#chart2222').classList.add('d-none'),
                                          document.querySelector('#chart1111').classList.remove('d-none');">
                                  <b style="font-size: 15px;">PM</b>
                                  </a>
                              </li>

                          </ul>
                        </div>
                    </div>
                    <div class="d-none d-lg-block " id="chartpc"></div>
                    <div class="d-block d-md-none"id="chart1111"><div  id="chartmobileam"></div></div>
                    <div class="d-block d-md-none" id="chart2222"><div id="chartmobilepm"></div></div>


                    <!-- <div class="card-body">
                      <div class="row main-shadow main-radius" id="img_bg_3">
                          <div class="col-md-6" style="z-index: 10; ">
                            <center>
                              <canvas id="canvas_1" width="185px" height="185" style="margin-top:140px"></canvas>

                            </center>
                          </div>
                          <div class="col-md-6" style="z-index: 10;">
                            <center>
                              <canvas id="canvas_2"  width="185px" height="185" style="margin-top:140px"></canvas>
                            </center>
                          </div>
                          <div id="" class="col-md-6" style="margin-top:-360px;">
                            <img style="position:absolute;right: 50px; margin-top:-20px;"  width="80px" src="{{ asset('/img/more/sun.png') }}" >
                            <center>
                              <img  width="400px" src="{{ asset('/img/more/clock-am.png') }}" >
                              <h2 class="text-danger" style="margin-top: -330px;margin-left: 60px;">
                                <b> {{ $sos_time_00 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -45px;margin-left: -60px;">
                                <b> {{ $sos_time_11 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -15px;margin-left: -160px;">
                                <b> {{ $sos_time_10 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -50px;margin-left: 155px;">
                                <b> {{ $sos_time_01 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: 12px;margin-left: 220px;">
                                <b> {{ $sos_time_02 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -42px;margin-left: -220px;">
                                <b> {{ $sos_time_09 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top:20px;margin-left: -210px;">
                                <b> {{ $sos_time_08 }}</b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -55px;margin-left: 225px;">
                                <b> {{ $sos_time_03 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: 15px;margin-left: 165px;">
                                <b> {{ $sos_time_04 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -40px;margin-left: -155px;">
                                <b> {{ $sos_time_07 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -15px;margin-left: -50px;">
                                <b> {{ $sos_time_06 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -50px;margin-left: 70px;">
                                <b> {{ $sos_time_05 }} </b>
                              </h2>
                            </center>
                          </div>
                          <div id="" class="col-md-6" style="margin-top:-360px;">
                            <img style="position:absolute;left: 20px; margin-top:-20px;" width="70px" src="{{ asset('/img/more/moon.png') }}" >
                            <center>
                              <img width="400px" src="{{ asset('/img/more/clock-pm.png') }} ">
                              <h2 class="text-danger" style="margin-top: -330px;margin-left: 60px;">
                                <b> {{ $sos_time_12 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -45px;margin-left: -60px;">
                                <b> {{ $sos_time_23 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -15px;margin-left: -160px;">
                                <b> {{ $sos_time_22 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -50px;margin-left: 155px;">
                                <b> {{ $sos_time_13 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: 12px;margin-left: 220px;">
                                <b> {{ $sos_time_14 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -42px;margin-left: -220px;">
                                <b> {{ $sos_time_21 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top:20px;margin-left: -210px;">
                                <b> {{ $sos_time_20 }}</b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -55px;margin-left: 225px;">
                                <b> {{ $sos_time_15 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: 15px;margin-left: 165px;">
                                <b> {{ $sos_time_16 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -40px;margin-left: -155px;">
                                <b> {{ $sos_time_19 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -15px;margin-left: -50px;">
                                <b> {{ $sos_time_18 }} </b>
                              </h2>
                              <h2 class="text-danger" style="margin-top: -50px;margin-left: 70px;">
                                <b> {{ $sos_time_17 }} </b>
                              </h2>
                              <h2 style="margin-bottom:70px"></h2>
                            </center>
                          </div>
                        </div>
                      </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>

<!--========================= คะแนนผู้ช่วยเหลือ  =============================-->
<div class="row row-cols-1 row-cols-lg-3">
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0" >เคสที่ช่วยเหลือเร็วที่สุด</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="best-selling-products p-3 mb-3 ps ps--active-y">
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://i.pinimg.com/originals/a7/cb/a1/a7cba17b0fa86d624e64383e8f883907.jpg" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเดียร์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">3.55 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://i.pinimg.com/originals/a7/cb/a1/a7cba17b0fa86d624e64383e8f883907.jpg" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเดียร์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">3.55 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://i.pinimg.com/originals/a7/cb/a1/a7cba17b0fa86d624e64383e8f883907.jpg" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเดียร์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">3.55 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://i.pinimg.com/originals/a7/cb/a1/a7cba17b0fa86d624e64383e8f883907.jpg" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเดียร์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">3.55 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://i.pinimg.com/originals/a7/cb/a1/a7cba17b0fa86d624e64383e8f883907.jpg" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเดียร์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">3.55 น.</p>
                    </div>
                    <hr>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 288px;"></div></div></div>
        </div>
    </div>
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0">เคสที่ช่วยเหลือช้าที่สุด</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="best-selling-products p-3 mb-3 ps ps--active-y">
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/349009746_672703511284411_5341648996528743787_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeF8vuIxNDYOjX2fLqW4DR40tzsM1Kkn9Aq3OwzUqSf0Cvh0zQyuHhExDqmXIAeZLtrh1IGGd11ihi7u9V8FAYRm&_nc_ohc=TrMWUtp3Jc0AX8kyfjv&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfAec0V0VN-rvbrQvEpGnWnomTkX5hljbuzccl-4k-KnAg&oe=64A91A31" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเบ้นซ์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">59.20 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/349009746_672703511284411_5341648996528743787_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeF8vuIxNDYOjX2fLqW4DR40tzsM1Kkn9Aq3OwzUqSf0Cvh0zQyuHhExDqmXIAeZLtrh1IGGd11ihi7u9V8FAYRm&_nc_ohc=TrMWUtp3Jc0AX8kyfjv&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfAec0V0VN-rvbrQvEpGnWnomTkX5hljbuzccl-4k-KnAg&oe=64A91A31" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเบ้นซ์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">59.20 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/349009746_672703511284411_5341648996528743787_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeF8vuIxNDYOjX2fLqW4DR40tzsM1Kkn9Aq3OwzUqSf0Cvh0zQyuHhExDqmXIAeZLtrh1IGGd11ihi7u9V8FAYRm&_nc_ohc=TrMWUtp3Jc0AX8kyfjv&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfAec0V0VN-rvbrQvEpGnWnomTkX5hljbuzccl-4k-KnAg&oe=64A91A31" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเบ้นซ์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">59.20 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/349009746_672703511284411_5341648996528743787_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeF8vuIxNDYOjX2fLqW4DR40tzsM1Kkn9Aq3OwzUqSf0Cvh0zQyuHhExDqmXIAeZLtrh1IGGd11ihi7u9V8FAYRm&_nc_ohc=TrMWUtp3Jc0AX8kyfjv&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfAec0V0VN-rvbrQvEpGnWnomTkX5hljbuzccl-4k-KnAg&oe=64A91A31" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเบ้นซ์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">59.20 น.</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/349009746_672703511284411_5341648996528743787_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeF8vuIxNDYOjX2fLqW4DR40tzsM1Kkn9Aq3OwzUqSf0Cvh0zQyuHhExDqmXIAeZLtrh1IGGd11ihi7u9V8FAYRm&_nc_ohc=TrMWUtp3Jc0AX8kyfjv&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfAec0V0VN-rvbrQvEpGnWnomTkX5hljbuzccl-4k-KnAg&oe=64A91A31" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณเบ้นซ์</h6>
                            <p class="mb-0 text-secondary">------------</p>
                        </div>
                        <p class="ms-auto mb-0 text-purple">59.20 น.</p>
                    </div>
                    <hr>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 288px;"></div></div></div>
        </div>
    </div>
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0">คะแนนผู้ช่วยเหลือสูงสุด</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
              </div>
                <div class="recent-reviews p-3 mb-3 ps ps--active-y">
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/280078255_7454475791290928_8405856078378449812_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHCbTykQgLS4cb8CDFVUNFx_p4-PoCyMD3-nj4-gLIwPbkKa5-7U6mPIv6j1J0exOoTwDj5-Gr8RX3m-bx1gR11&_nc_ohc=vAK1I2dNaNcAX9M2F_D&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfDBfGTtg9gtKxXSiRP32ywuj9cKRQ7B7TTPnGuOd_P9pw&oe=64AAB763" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณลัคกี้</h6>
                        </div>
                        <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/280078255_7454475791290928_8405856078378449812_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHCbTykQgLS4cb8CDFVUNFx_p4-PoCyMD3-nj4-gLIwPbkKa5-7U6mPIv6j1J0exOoTwDj5-Gr8RX3m-bx1gR11&_nc_ohc=vAK1I2dNaNcAX9M2F_D&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfDBfGTtg9gtKxXSiRP32ywuj9cKRQ7B7TTPnGuOd_P9pw&oe=64AAB763" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณลัคกี้</h6>
                        </div>
                        <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/280078255_7454475791290928_8405856078378449812_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHCbTykQgLS4cb8CDFVUNFx_p4-PoCyMD3-nj4-gLIwPbkKa5-7U6mPIv6j1J0exOoTwDj5-Gr8RX3m-bx1gR11&_nc_ohc=vAK1I2dNaNcAX9M2F_D&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfDBfGTtg9gtKxXSiRP32ywuj9cKRQ7B7TTPnGuOd_P9pw&oe=64AAB763" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณลัคกี้</h6>
                        </div>
                        <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/280078255_7454475791290928_8405856078378449812_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHCbTykQgLS4cb8CDFVUNFx_p4-PoCyMD3-nj4-gLIwPbkKa5-7U6mPIv6j1J0exOoTwDj5-Gr8RX3m-bx1gR11&_nc_ohc=vAK1I2dNaNcAX9M2F_D&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfDBfGTtg9gtKxXSiRP32ywuj9cKRQ7B7TTPnGuOd_P9pw&oe=64AAB763" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณลัคกี้</h6>
                        </div>
                        <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="product-img">
                            <img src="https://scontent.fbkk24-1.fna.fbcdn.net/v/t39.30808-6/280078255_7454475791290928_8405856078378449812_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHCbTykQgLS4cb8CDFVUNFx_p4-PoCyMD3-nj4-gLIwPbkKa5-7U6mPIv6j1J0exOoTwDj5-Gr8RX3m-bx1gR11&_nc_ohc=vAK1I2dNaNcAX9M2F_D&_nc_ht=scontent.fbkk24-1.fna&oh=00_AfDBfGTtg9gtKxXSiRP32ywuj9cKRQ7B7TTPnGuOd_P9pw&oe=64AAB763" class="p-1" alt="">
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-0 font-weight-bold">คุณลัคกี้</h6>
                        </div>
                        <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p>
                    </div>
                    <hr>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 450px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 325px;"></div></div></div>

        </div>
       </div>
</div>
