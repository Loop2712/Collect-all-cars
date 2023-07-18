<h4 class="text-dark">ข้อมูลหน่วยปฏิบัติการ</h4>
<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!--คะแนนเฉลี่ยของหน่วย 5 อันดับ -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold">คะแนนเฉลี่ยของหน่วย 5 อันดับ</h5>
                    <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                    </p>
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div><i class='bx bxs-checkbox me-2 font-24 text-primary'></i>
                                        </div>
                                        <div>Medication "Aripiprazole"</div>
                                    </div>
                                </td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 5.00</p></td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div><i class='bx bxs-checkbox me-2 font-24 text-danger'></i>
                                        </div>
                                        <div>Medication "Risperidone"</div>
                                    </div>
                                </td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.80</p></td>

                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div><i class='bx bxs-checkbox me-2 font-24 text-success'></i>
                                        </div>
                                        <div>Medication "Aripiprazole+Risperidone"</div>
                                    </div>
                                </td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>

                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div><i class='bx bxs-checkbox me-2 font-24 text-warning'></i>
                                        </div>
                                        <div>No Medication</div>
                                    </div>
                                </td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.60</p></td>
                            </tr>
                            <tr>
                                <td class="px-0">
                                    <div class="d-flex align-items-center">
                                        <div><i class='bx bxs-checkbox me-2 font-24 text-info'></i>
                                        </div>
                                        <div>Other</div>
                                    </div>
                                </td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.50</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <!--ระดับหน่วยปฏิบัติการทั้งหมด-->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="d-flex align-items-center m-3">
                <div>
                    <h5 class="mb-1">ระดับหน่วยปฏิบัติการทั้งหมด</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div id="chartVehicleTop5"></div>
                </div>
            </div>
        </div>
    </div>
      <!--จำนวนยานพาหนะทั้งหมด  -->
    <div class="col-12 col-lg-4 mb-2">
        <div class="card radius-10 h-100">
            <div class="card-body ">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">จำนวนยานพาหนะทั้งหมด </h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
            </div>
            <div class="mb-3 p-3">
                <div class="row mb-4">
                    <div class="col-2 mt-2 text-center">
                        <i class="fa-solid fa-motorcycle" style="font-size: 2rem"></i>
                    </div>
                    <div class="col">
                        <p class="mb-2" style="font-weight: bold;">จักรยานยนต์<strong class="float-end">852,35</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-lush" role="progressbar" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2 mt-2 text-center">
                        <i class="fa-solid fa-car" style="font-size: 2rem"></i>
                    </div>
                    <div class="col">
                        <p class="mb-2" style="font-weight: bold;">รถยนต์<strong class="float-end">785,24</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-kyoto" role="progressbar" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2">
                        <img src="{{ asset('/img/ranking/gold.png') }}" width="42" alt="">
                    </div>
                    <div class="col">
                        <p class="mb-2">รถยนต์<strong class="float-end">387,56</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-moonlit" role="progressbar" style="width: 66%"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2">
                        <img src="{{ asset('/img/ranking/gold.png') }}" width="42" alt="">
                    </div>
                    <div class="col">
                        <p class="mb-2">รถยนต์<strong class="float-end">982,43</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-burning" role="progressbar" style="width: 56%"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2">
                        <img src="{{ asset('/img/ranking/gold.png') }}" width="42" alt="">
                    </div>
                    <div class="col">
                        <p class="mb-2">รถยนต์<strong class="float-end">982,43</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-burning" role="progressbar" style="width: 56%"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-2">
                        <img src="{{ asset('/img/ranking/gold.png') }}" width="42" alt="">
                    </div>
                    <div class="col">
                        <p class="mb-2 ">รถยนต์<strong class="float-end">982,43</strong></p>
                        <div class="progress radius-10" style="height:6px;">
                            <div class="progress-bar bg-gradient-burning" role="progressbar" style="width: 56%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--============= 2 card -- 5-7  ================-->

<div class="row mb-4">
    <!--======= คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ ============-->
    <div class="col-12 col-lg-5">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>ชื่อหน่วย</th>
                                <th>คะแนนเฉลี่ยต่อเคส</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>หน่วย A</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>หน่วย A</td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>หน่วย A</td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>หน่วย A</td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>หน่วย A</td>
                                <td><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!--======= ลำดับการรับแจ้งเตือน 5 อันดับ ============-->
    <div class="col-12 col-lg-7">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0" >รายชื่อหน่วยปฏิบัติการ</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>ชื่อหน่วย</th>
                                <th>จำนวนสมาชิก</th>
                                <th>จำนวนออกปฎิบัติการ</th>
                                <th>ลงทะเบียนมาแล้วกี่วัน</th>
                                <th>คะแนนเฉลี่ย</th>
                                <th>ลำดับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                            <tr>
                                {{-- <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                                <img src="https://www.viicheck.com/Medilab/img/icon.png">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mt-3 font-14">{ชื่อ}</h6>
                                        </div>
                                    </div>
                                </td> --}}
                                <td>หน่วย A</td>
                                <td>3,565</td>
                                <td>432</td>
                                <td>12 day ago</td>
                                <td ><p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i> 4.70</p></td>
                                <td>12</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
        width: 450,
        type: 'donut',
    },
    plotOptions: {
        pie: {
        startAngle: -90,
        endAngle: 270
        }
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: 'gradient',
    },
    legend: {
        position: 'bottom',
        formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
        }
    },
    responsive: [{
        breakpoint: 480,
        options: {
        chart: {
            width: 400
        },
        legend: {
            position: 'bottom'
        }
        }
    }]
    };

    var chart = new ApexCharts(document.querySelector("#chartVehicleTop5"), options);
    chart.render();

</script>
