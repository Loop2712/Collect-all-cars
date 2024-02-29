<div class="row">
    <div class="col-12 col-xl-4 col-xxl-4 d-flex align-items-stretch">
        <div class="card radius-10 w-100    ">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-112">
                        <h5 class="mb-0 font-weight-bold">รับแจ้งเตือนทาง</h5>
                    </div>
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody id="tbody_notify" class="fz_body font-weight-bold">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>

    </style>
    <div class="col-12 col-xl-8 col-xxl-8 d-flex">
        <div class="card w-100 radius-10">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold ">การขอความช่วยเหลือในจังหวัด</h5>
                        <h2 class="mt-4 mb-1 font-weight-bold" ><span id="name_sos_district"></span> <span class="text-danger" id="count_sos_district"></span>  ครั้ง </h2>
                        <p class="mb-0 text-secondary" id="title_sos_district"></p>
                    </div>

                    <ul class="list-group mt-4 list-group-flush list-group-sos-province" id="ul_sos_districts">
                        
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="p-3">
                        <div class="" id="sos_map_organization">

                        </div>
                    </div>
                    <div class="m-2">
                        <div class="row">
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}" width="35" > 
                                เขียว(ไม่รุนแรง)
                            </div>
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}" width="35" > 
                                เหลือง(เร่งด่วน)
                            </div>
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}" width="35" > 
                                แดง(วิกฤติ)
                            </div>
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}" width="35" > 
                                ขาว(ทั่วไป)
                            </div>
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}" width="35" > 
                                ดำ
                            </div>
                            <div class="col-4 mt-2">
                                <img src="{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}" width="35" > 
                                ไม่มีการประเมิน
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!-- MAP ปักหมุดการขอความช่วยเหลือในจังหวัด -->
    <!-- <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">MAP ปักหมุดการขอความช่วยเหลือในจังหวัด</h5>
                    </div> -->
                    <!-- comment -->
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                    <!-- comment -->
                <!-- </div>

                <div class="mt-4 mb-4">
                   <div id="sos_map_organization"></div>
                </div>
            </div>
        </div>
    </div> -->

     <!--พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
    <!-- <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="d-flex align-items-center m-3">
                <div class="col-10">
                    <h5 class="mb-1 font-weight-bold">พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ</h5>
                </div> -->
            <!-- comment -->
                <!-- <div class="dropdown ms-auto">
                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                    </div>
                </div> -->
            <!-- comment -->
            <!-- </div>
            <div class="card-body">
                <div class="w-100">
                    <div id="Top5_Area_SOS"></div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- หัวข้อการขอความช่วยเหลือมากที่สุด sos_1669_form_yellows->symptom -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">หัวข้อการขอความช่วยเหลือมากที่สุด <span id="count_most_symptom"></span> อันดับ</h5>
                    </div>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>
                <div class="p-2">
                    <div id="sos_1669_form_yellows"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- รับแจ้งเตือนทาง -->
    <!-- <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">รับแจ้งเตือนทาง</h5>
                    </div> -->
                    <!-- comment -->
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                    <!-- comment -->
                <!-- </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody class="fz_body font-weight-bold">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

    <!-- ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ</h5>
                    </div>

                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>
                <div class="p-2">
                    <div id="sos_1669_form_yellows_idc"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold"> ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ</h5>
                    </div>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                         <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>
                <div class="p-2">
                    <div id="sos_1669_form_yellows_rc"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- การปฏิบัติการ -->
    <!-- <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold"> การปฏิบัติการ</h5>
                    </div> -->

                    <!-- comment -->
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                    <!-- comment -->

                <!-- </div>
                <div class="p-2">
                    <div id="operation"></div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- การปฏิบัติการ มีการรักษา -->
    <div class="col-12 col-lg-6 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">การปฏิบัติการที่มีการรักษา</h5>
                    </div>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>
                <div class="h-100">
                    <div id="operation_cure"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- การปฏิบัติการ ไม่มีการรักษา -->
    <div class="col-12 col-lg-6 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-10">
                        <h5 class="mb-0 font-weight-bold">การปฏิบัติการที่ไม่มีการรักษา</h5>
                    </div>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>
                <div class="h-100">
                    <div id="operation_no_cure"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- map-googleAPI -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>

<style type="text/css">
    #sos_map_organization {
        min-height: calc(40vh);
        height: calc(100% - 5vh);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        initMap();
        getdata_notify();
        districts_sos();
        most_symptom_data();
        form_yellows_idc();
        form_yellows_rc();
        treatment_have_cure();
        treatment_no_have_cure();
    });
</script>
<!-- MAP พื้นที่การขอความช่วยเหลือในจังหวัด -->
<script>
    function initMap() {

        let map_sos_organization;
        let marker_sos_organization;

        let user_login_organization = '{{Auth::user()->sub_organization}}';

        let all_lat_lng = [];

        fetch("{{ url('/') }}/api/sos_data_map/" + user_login_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {
                    let lat = parseFloat(result[ii].lat);
                    let lng = parseFloat(result[ii].lng);

                    if (lat) {
                        all_lat_lng.push({"lat": lat, "lng": lng});
                    }
                }


                let bounds = new google.maps.LatLngBounds();

                    for (let vc = 0; vc < all_lat_lng.length; vc++) {
                        bounds.extend(all_lat_lng[vc]);
                    }

                    map_sos_organization = new google.maps.Map(document.getElementById("sos_map_organization"), {
                        // zoom: num_zoom,
                        // center: bounds.getCenter(),
                    });
                    map_sos_organization.fitBounds(bounds);

                    //ปักหมุด
                    // let image_marker_sos = "https://www.viicheck.com/img/icon/operating_unit/sos.png";
                    // let image_marker_sos = "{{ asset('/img/icon/operating_unit/sos.png') }}";

                    let image_marker_sos = "";

                    let image_sos_general = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/1.png') }}";
                    let image_sos_green = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/2.png') }}";
                    let image_sos_yellow = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/3.png') }}";
                    let image_sos_red = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/4.png') }}";
                    let image_sos_white = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/5.png') }}";
                    let image_sos_black = "{{ url('/img/icon/operating_unit/หมุดหน่วยปฏิบัติการ/6.png') }}";

                    
                    result.forEach(item => {
                        let latNumber = parseFloat(item.lat);
                        let lngNumber = parseFloat(item.lng);

                        switch(item.rc) {
                            case "แดง(วิกฤติ)":
                                image_marker_sos = image_sos_red ;
                            break;
                            case "เหลือง(เร่งด่วน)":
                                image_marker_sos = image_sos_yellow ;
                            break;
                            case "เขียว(ไม่รุนแรง)":
                                image_marker_sos = image_sos_green ;
                            break;
                            case "ขาว(ทั่วไป)":
                                image_marker_sos = image_sos_white ;
                            break;
                            case "ดำ":
                                image_marker_sos = image_sos_black ;
                            break;
                            default:
                                image_marker_sos = image_sos_general ;
                        }

                        marker_sos_organization = new google.maps.Marker({
                            position: { lat: latNumber , lng:lngNumber },
                            map: map_sos_organization,
                            icon: image_marker_sos,
                            zIndex:5,
                        });

                    })


        });


    }

    function getdata_notify() {
        fetch("{{ url('/') }}/api/API_dashboard_data_notify?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);    
            let tbody_notify = document.getElementById('tbody_notify');
            tbody_notify.innerHTML = "";

            result.forEach(item => {
                    switch (item.be_notified) {
                        case 'แพลตฟอร์มวีเช็ค':
                            color_benotified = "#dc3545";
                            break;
                        case 'โทรศัพท์หมายเลข ๑๖๖๙':
                            color_benotified = "#0d6efd";
                            break;
                        case 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)':
                            color_benotified = "#198754";
                            break;
                        case 'โทรศัพท์หมายเลขอื่นๆ':
                            color_benotified = "#0dcaf0";
                            break;
                        case 'วิทยุสื่อสาร':
                            color_benotified = "#ffc107";
                            break;
                        case 'วิธีอื่นๆ':
                            color_benotified = "#f48024";
                            break;
                        case 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า':
                            color_benotified = "#f9a3a4";
                            break;
                        default:
                            color_benotified = "#212529";
                            break;
                    }
                                
                data_table = `
                    <tr>
                        <td class="px-0">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bxs-checkbox me-2 font-24' style="color:${color_benotified};"></i>
                                </div>
                                <div>${item.be_notified}</div>
                            </div>
                        </td>
                        <td>${item.count_be_notified} ครั้ง</td>
                    </tr>
                `;

                tbody_notify.insertAdjacentHTML('beforeend', data_table); // แทรกบนสุด
            })

        })
    }


    function districts_sos() {
        fetch("{{ url('/') }}/api/API_dashboard_districts_sos?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result);
            let ul_sos_districts = document.getElementById('ul_sos_districts');
                ul_sos_districts.innerHTML = "";
            let i = 0;
            result.forEach(item => {
                // console.log(i)
                if(i == 0){
                    document.getElementById('count_sos_district').innerHTML = item.count_address;
                    document.getElementById('name_sos_district').innerHTML = item.address;
                    document.getElementById('title_sos_district').innerHTML = item.address +' เป็นอำเภอที่ขอความช่วยเหลือมากที่สุด';
                }else{
                    
                    data_table = `
                        <li class="font-18 list-group-item d-flex align-items-center">
                            <span>${item.address}</span>
                            <strong class="ms-auto">${item.count_address}</strong>
                        </li>
                    `;
                    ul_sos_districts.insertAdjacentHTML('beforeend', data_table); // แทรกบนสุด
                }
                i++
            })
        })
    }
</script>


<!-- Column CHART หัวข้อการขอความช่วยเหลือมากที่สุด -->
<script>
function most_symptom_data() {

    fetch("{{ url('/') }}/api/API_dashboard_most_symptom_data?user_id=" + user_id)
    .then(response => response.json())
    .then(result => {
        // console.log(result)
        document.getElementById('count_most_symptom').innerHTML = result.length;

        let options = {
            series: [{
                data: result.map(item => item.count)
            }],
            chart: {
            type: 'bar',
            height: 380,
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
        colors: result.map(() => randomColor()),
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
            categories: result.map(item => item.symptom),
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

        let chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows"), options);
        chart.render();

        })
    }
    // ฟังก์ชันสุ่มสี HEX
    function randomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    }

    
</script>

<!-- Bar CHART ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ -->
<script>

function form_yellows_idc() {

    fetch("{{ url('/') }}/api/API_dashboard_form_yellows_idc?user_id=" + user_id)
    .then(response => response.json())
    .then(result => {
        // console.log(result)
        let options = {
        series: [{
            data: result.map(item => item.count_idc),
        }],
        chart: {
            height: 350,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                //   console.log(chart, w, e)
                }
            }
        },
        colors: result.map(item => item.color),
        plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            }
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: result.map(item => item.idc),
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

        let chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_idc"), options);
        chart.render();
    })
}
 

    

</script>

<!-- Bar CHART ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ -->
<script>
function form_yellows_rc() {
    fetch("{{ url('/') }}/api/API_dashboard_form_yellows_rc?user_id=" + user_id)
    .then(response => response.json())
    .then(result => {
        // console.log(result)
        let options = {
        series: [{
            data: result.map(item => item.count_rc),
        }],
        chart: {
            height: 350,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                //   console.log(chart, w, e)
                }
            }
        },
        colors: result.map(item => item.color),
        plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            }
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: result.map(item => item.rc),
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

        let chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_rc"), options);
        chart.render();
    })
}
 
    

</script>


<!-- Column CHART การปฏิบัติการ CURE -->
<script>
    function treatment_have_cure() {
        fetch("{{ url('/') }}/api/API_dashboard_treatment_have_cure?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result)
            let options = {
        series: [{
            data: result.map(item => item.count_sub_treatment),
        }],
            chart: {
            type: 'bar',
            height: 380,
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
        colors: result.map(() => randomColor()),
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
            categories: result.map(item => item.sub_treatment),
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

       let chart = new ApexCharts(document.querySelector("#operation_cure"), options);
       chart.render();
        })
    }

</script>

<!-- Column CHART การปฏิบัติการ NO CURE -->
<script>

function treatment_no_have_cure() {
        fetch("{{ url('/') }}/api/API_dashboard_treatment_no_have_cure?user_id=" + user_id)
        .then(response => response.json())
        .then(result => {
            // console.log(result)
            let options = {
                series: [{
                    data: result.map(item => item.count_sub_treatment),
                }],
                    chart: {
                    type: 'bar',
                    height: 380,
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
                colors: result.map(() => randomColor()),
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
                    categories: result.map(item => item.sub_treatment),
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
            let chart = new ApexCharts(document.querySelector("#operation_no_cure"), options);
        chart.render();
        })
    }
</script>






