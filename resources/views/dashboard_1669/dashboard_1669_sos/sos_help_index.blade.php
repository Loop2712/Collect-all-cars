<!--================== 4 row card ======================-->

<div class="row row-cols-1 row-cols-md-4 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ขอความช่วยเหลือทั้งหมด</h5>
                        <h4 class="my-1 font-weight-bold" id="count_sos_all"></h4>
                    </div>
                    <div class="text-primary ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/21.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/21.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ช่วยเหลือเสร็จสิ้น</h5>
                        <h4 class="my-1 font-weight-bold" id="count_sos_success"></h4>
                    </div>
                    <div class="text-danger ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/18.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/18.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">กำลังดำเนินการ</h5>
                        <h4 class="my-1 font-weight-bold" id="count_sos_helping"></h4>
                    </div>
                    <div class="text-warning ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/Flex/2.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/Flex/2.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark font-weight-bold">ยังไม่ได้ดำเนินการ</h5>
                        <h4 class="my-1 font-weight-bold" id="count_sos_not_helping"></h4>
                    </div>
                    <div class="text-success ms-auto font-30">
                        <img class="d-none d-lg-block" src="{{ asset('/img/stickerline/PNG/5.png') }}" width="120em">
                        <img class="d-block d-md-none" src="{{ asset('/img/stickerline/PNG/5.png') }}" width="60em">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======= ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด ============-->

<div class="row mb-4">
    <div class="col-12 col-lg-12">
        <div class="card radius-10 w-100 h-100">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="font-weight-bold mb-0 ">ข้อมูลการขอความช่วยเหลือ <span id="count_case_sos"></span> ลำดับล่าสุด </h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('/dashboard_1669_all_case_sos_show') }}" target="_blank">ข้อมูลการช่วยเหลือเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>รหัสเคส</th>
                                <th>ชื่อผู้ขอความช่วยเหลือ</th>
                                <th>ชื่อเจ้าหน้าที่สั่งการ</th>
                                <th>ชื่อเจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                <th>ชื่อหน่วยปฏิบัติการ</th>
                                <th>ระยะเวลาในการช่วยเหลือ</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_case_sos">
                           
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

<!--======= คะแนนการช่วยเหลือต่อเคส 5 อันดับ ============-->
<div class="row mb-4">
    <div class="col-7 d-flex align-items-stretch">
        <div class="row w-100">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">เวลาในการช่วยเหลือ ไว ที่สุด <span id="count_data_sos_fastest_5"></span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>รหัสเคส</th>
                                        <th>สถานที่</th>
                                        <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                        <th>ชื่อหน่วยปฏบัติการ</th>
                                        <th>ระยะเวลารวม</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_data_sos_fastest">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-danger">เวลาในการช่วยเหลือ ช้า ที่สุด <span id="count_data_sos_slowest_5"></span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>รหัสเคส</th>
                                        <th>สถานที่</th>
                                        <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                        <th>ชื่อหน่วยปฏบัติการ</th>
                                        <th>ระยะเวลารวม</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_data_sos_slowest">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5 d-flex align-items-stretch">
        <!-- การปฏิบัติการ -->
        <div class="card radius-10 w-100">
            <div class="card-body w-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-12  ">
                        <h5 class="mb-0 font-weight-bold"> การปฏิบัติการ</h5>
                    </div>
                </div>
                <div class="p-2 h-100">
                    <div id="operation"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-5 d-flex align-items-stretch">
        <!--พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
        <div class="card radius-10 w-100">
            <div class="d-flex align-items-center m-3">
                <div class="col-10">
                    <h5 class="mb-1 font-weight-bold">พื้นที่การขอความช่วยเหลือมากที่สุด <span id="count_area_sos"></span> อันดับ</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="w-100 h-100">
                    <div id="Top5_Area_SOS"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7 d-flex align-items-stretch">
        <div class="row w-100">
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-success">คะแนนการช่วยเหลือต่อเคส มาก ที่สุด <span id="count_sos_score_best_5"></span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>รหัสเคส</th>
                                        <th>สถานที่</th>
                                        <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                        <th>ชื่อหน่วยปฏบัติการ</th>
                                        <th>คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_sos_score_best_5">
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-stretch">
                <div class="card radius-10 w-100">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-0 text-danger">คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด <span id="count_sos_score_worst_5"></span> อันดับ</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ url('/dashboard_1669_all_sos_show') }}">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body p-3 pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 ">
                                <thead>
                                    <tr>
                                        <th>รหัสเคส</th>
                                        <th>สถานที่</th>
                                        <th>เจ้าหน้าที่หน่วยปฏิบัติการ</th>
                                        <th>ชื่อหน่วยปฏบัติการ</th>
                                        <th>คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_sos_score_worst_5">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Column CHART พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
<script>
     var user_id = '{{Auth::user()->id}}';

        document.addEventListener('DOMContentLoaded', (event) => {
            count_data_sos();
            getdata_ask_to_help();
            getdata_sos_fastest();
            getdata_sos_slowest();
            count_treatment();
            count_area_sos();
            sos_score_best_5();
            sos_score_worst_5();
        })

    function count_data_sos() {
        fetch("{{ url('/') }}/api/API_dashboard_count_data_sos?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            document.querySelector('#count_sos_all').innerHTML = result.length;
            document.querySelector('#count_sos_success').innerHTML = result.filter(item => item.status === "เสร็จสิ้น").length;
            document.querySelector('#count_sos_helping').innerHTML = result.filter(item => item.status === "ออกจากฐาน").length;
            document.querySelector('#count_sos_not_helping').innerHTML = result.filter(item => item.status === "รับแจ้งเหตุ").length;
        })
    }
    function getdata_ask_to_help() {
        fetch("{{ url('/') }}/api/API_dashboard_data_ask_to_help?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let tbody_case_sos = document.getElementById('tbody_case_sos');
            document.getElementById('count_case_sos').innerHTML = result.length;
            tbody_case_sos.innerHTML = "";

            result.forEach(item => {
                
                if (item.time_sos_success && item.time_command) {
                    sum_time(item.time_sos_success , item.time_command)
                }else{
                    sTimeUnit = '--';
                }
            
                data_table = `
                    <tr>
                        <td>${item.operating_code ? item.operating_code : '--'}</td>
                        <td>${item.name_user ? item.name_user : item.name_officer_command + '(เจ้าหน้าที่)'}</td>
                        <td>${item.name_officer_command ? item.name_officer_command : '--'}</td>
                        <td>${item.name_officer ? item.name_officer : '--'}</td>
                        <td>${item.operating_unit_name ? item.operating_unit_name : '--'}</td>
                        <td>${sTimeUnit}</td>
                        <td>${item.status ? item.status : '--'}</td>
                        
                    </tr>
                `;

                tbody_case_sos.insertAdjacentHTML('beforeend', data_table); // แทรกบนสุด
            })

        })
    }

    function getdata_sos_fastest() {
        fetch("{{ url('/') }}/api/API_dashboard_data_sos_fastest?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let tbody_data_sos_fastest = document.getElementById('tbody_data_sos_fastest');
            document.getElementById('count_data_sos_fastest_5').innerHTML = result.length;
            tbody_data_sos_fastest.innerHTML = "";

            
            result.forEach(item => {
                sum_time(item.time_sos_success , item.time_command)
                data_table = `
                    <tr>
                        <td>${item.operating_code ? item.operating_code : '--'}</td>
                        <td>${item.address ? item.address : '--'}</td>
                        <td>${item.name_helper ? item.name_helper : '--'}</td>
                        <td>${item.organization_helper ? item.organization_helper : '--'}</td>
                        <td>${sTimeUnit}</td>
                    </tr>
                `;
                tbody_data_sos_fastest.insertAdjacentHTML('beforeend', data_table); // แทรกบนสุด
            })
        })
    }
    function getdata_sos_slowest() {
        fetch("{{ url('/') }}/api/API_dashboard_data_sos_slowest?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let tbody_data_sos_slowest = document.getElementById('tbody_data_sos_slowest');
            document.getElementById('count_data_sos_slowest_5').innerHTML = result.length;
            tbody_data_sos_slowest.innerHTML = "";

            
            result.forEach(item => {
                sum_time(item.time_sos_success , item.time_command)
                data_table = `
                    <tr>
                        <td>${item.operating_code ? item.operating_code : '--'}</td>
                        <td>${item.address ? item.address : '--'}</td>
                        <td>${item.name_helper ? item.name_helper : '--'}</td>
                        <td>${item.organization_helper ? item.organization_helper : '--'}</td>
                        <td>${sTimeUnit}</td>
                    </tr>
                `;
                tbody_data_sos_slowest.insertAdjacentHTML('beforeend', data_table); // แทรกบนสุด
            })
            
        })
    }

    function sos_score_best_5() {
        fetch("{{ url('/') }}/api/API_dashboard_sos_score_worst_5?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let tbody_sos_score_worst_5 = document.getElementById('tbody_sos_score_worst_5');
            document.getElementById('count_sos_score_best_5').innerHTML = result.length;
            tbody_sos_score_worst_5.innerHTML = "";

            result.forEach(item => {
                
                data_table = `
                    <tr>
                        <td>${ item.operating_code ? item.operating_code : "--"}</td>
                        <td>${ item.address ? item.address : "--"}</td>
                        <td>${ item.name_helper ? item.name_helper : "--"}</td>
                        <td>${ item.organization_helper ? item.organization_helper : "--"}</td>
                        <td>
                            <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>${ item.score_total ? item.score_total : "--"}</p>
                        </td>
                    </tr>
                `;

                tbody_sos_score_worst_5.insertAdjacentHTML('afterbegin', data_table); // แทรกบนสุด
            })

        })
    }

    function sos_score_worst_5() {
        fetch("{{ url('/') }}/api/API_dashboard_sos_score_best_5?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let tbody_sos_score_best_5 = document.getElementById('tbody_sos_score_best_5');
            document.getElementById('count_sos_score_worst_5').innerHTML = result.length;
            tbody_sos_score_best_5.innerHTML = "";

            result.forEach(item => {
                
                data_table = `
                    <tr>
                        <td>${ item.operating_code ? item.operating_code : "--"}</td>
                        <td>${ item.address ? item.address : "--"}</td>
                        <td>${ item.name_helper ? item.name_helper : "--"}</td>
                        <td>${ item.organization_helper ? item.organization_helper : "--"}</td>
                        <td>
                            <p class="ms-auto mb-0"><i class="bx bxs-star text-warning mr-1"></i>${ item.score_total ? item.score_total : "--"}</p>
                        </td>
                    </tr>
                `;

                tbody_sos_score_best_5.insertAdjacentHTML('afterbegin', data_table); // แทรกบนสุด
            })

        })
    }
</script>


<script>

    function sum_time(time1 , time2) {

        const sTimeSOSuccess = new Date(time1).getTime();
        const sTimeCommand = new Date(time2).getTime();

        const sTimeDifference = Math.abs(sTimeSOSuccess - sTimeCommand) / 1000;

        if (sTimeDifference >= 3600) {
            const sHours = Math.floor(sTimeDifference / 3600);
            const sRemainingMinutes = Math.floor((sTimeDifference % 3600) / 60);
            const sRemainingSeconds = sTimeDifference % 60;

            sTimeUnit = `${sHours} ชั่วโมง ${sRemainingMinutes} นาที ${sRemainingSeconds} วินาที`;
        } else if (sTimeDifference >= 60) {
            const sMinutes = Math.floor(sTimeDifference / 60);
            const sSeconds = sTimeDifference % 60;

            sTimeUnit = `${sMinutes} นาที ${sSeconds} วินาที`;
        } else {
            sTimeUnit = `${sTimeDifference} วินาที`;
        }

        return sTimeUnit
    }
    




    
    function count_area_sos() {
        fetch("{{ url('/') }}/api/API_dashboard_count_area_sos?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result)

           
            document.querySelector('#count_area_sos').innerHTML = result.length;
            let options = {
                    series: [{
                    data: result.map(item => item.count_address)
                }],
                    chart: {
                    type: 'bar',
                    height: '100%',
                    width: '100%'
                },
                plotOptions: {
                    bar: {
                        barHeight: '100%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'bottom'
                        },
                    }
                },
                colors: ['#33b2df',  '#d4526e',  '#f48024',  '#f9a3a4', '#90ee7e',],
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        fontSize: '16px',
                        colors: ['#000']
                    },
                    formatter: function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    },
                    offsetX: 0,
                    dropShadow: {
                    enabled: true
                    }
                },
                stroke: {
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: result.map(item => item.address),
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                    },
                },
                yaxis: {
                    labels: {
                    show: false
                    }
                },
                legend: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function () {
                            return ''
                            }
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#Top5_Area_SOS"), options);
            chart.render();
        })
    }




</script>


<!-- Bar CHART การปฏิบัติการ -->
<script>

    function count_treatment() {
        fetch("{{ url('/') }}/api/API_dashboard_count_treatment?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            var options = {
        series: [{
            data: result.map(item => item.count_treatment)
        }],
        chart: {
            height: '100%',
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                //   console.log(chart, w, e)
                }
            }
        },
        colors: ['#0d6efd','#e62e2e'],
        plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
        },
        dataLabels: {
            enabled: true,
            distributed: false,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            },
            background: {
                borderRadius: 10,
            }
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: result.map(item => item.treatment),
            labels: {
                style: {
                    colors: '#000000',
                    fontSize: '16px',
                    fontWeight: 'bold',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                }
            }
        }
    };

        var chart = new ApexCharts(document.querySelector("#operation"), options);
        chart.render();

        })
    }


    
</script>
