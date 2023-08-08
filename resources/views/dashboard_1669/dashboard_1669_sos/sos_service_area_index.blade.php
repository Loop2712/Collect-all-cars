<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!-- MAP ปักหมุดการขอความช่วยเหลือในจังหวัด -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold">MAP ปักหมุดการขอความช่วยเหลือในจังหวัด</h5>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>

                <div class="mt-4 mb-4">
                   <div id="sos_map_organization"></div>
                </div>
            </div>
        </div>
    </div>

     <!--พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="d-flex align-items-center m-3">
                <div>
                    <h5 class="mb-1 font-weight-bold">พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ</h5>
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
            <div class="card-body">
                <div class="w-100">
                    <div id="Top5_Area_SOS"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- หัวข้อการขอความช่วยเหลือมากที่สุด sos_1669_form_yellows->symptom -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0 font-weight-bold">หัวข้อการขอความช่วยเหลือมากที่สุด</h5>
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
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold">รับแจ้งเตือนทาง</h5>
                    <!-- <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div> -->
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody class="fz_body font-weight-bold">
                            @foreach ($notify_data as $notify_data)

                                @php
                                    $color_benotified;
                                    switch ($notify_data->be_notified) {
                                        case 'แพลตฟอร์มวีเช็ค':
                                            $color_benotified = "#dc3545";
                                            break;
                                        case 'โทรศัพท์หมายเลข ๑๖๖๙':
                                            $color_benotified = "#0d6efd";
                                            break;
                                        case 'โทรศัพท์หมายเลข ๑๖๖๙ (second call)':
                                            $color_benotified = "#198754";
                                            break;
                                        case 'โทรศัพท์หมายเลขอื่นๆ':
                                            $color_benotified = "#0dcaf0";
                                            break;
                                        case 'วิทยุสื่อสาร':
                                            $color_benotified = "#ffc107";
                                            break;
                                        case 'วิธีอื่นๆ':
                                            $color_benotified = "#f48024";
                                            break;
                                        case 'ส่งต่อชุดปฏิบัติการระดับสูงกว่า':
                                            $color_benotified = "#f9a3a4";
                                            break;
                                        default:
                                            $color_benotified = "#212529";
                                            break;
                                    }
                                @endphp
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <div><i class='bx bxs-checkbox me-2 font-24' style="color:{{$color_benotified}};"></i>
                                            </div>
                                            <div>{{$notify_data->be_notified}}</div>
                                        </div>
                                    </td>
                                    <td>{{$notify_data->count_be_notified}} ครั้ง</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0 font-weight-bold">ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ</h5>
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
                    <h5 class="mb-0 font-weight-bold"> ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ</h5>
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
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0 font-weight-bold"> การปฏิบัติการ</h5>
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
                    <div id="operation"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- การปฏิบัติการ มีการรักษา -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0 font-weight-bold">การปฏิบัติการที่มีการรักษา</h5>
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
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0 font-weight-bold">การปฏิบัติการที่ไม่มีการรักษา</h5>
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
      height: calc(40vh);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        initMap();
    });
</script>
<!-- MAP พื้นที่การขอความช่วยเหลือในจังหวัด -->
<script>
    function initMap() {

        var map_sos_organization ;
        var marker_sos_organization ;

        let user_login_organization = '{{Auth::user()->sub_organization}}';

        let all_lat_lng = [];

        fetch("{{ url('/') }}/api/sos_data_map/" + user_login_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                for (let ii = 0; ii < result.length; ii++) {
                    let lat = parseFloat(result[ii].lat);
                    let lng = parseFloat(result[ii].lng);

                    all_lat_lng.push({"lat": lat, "lng": lng});
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
                    let image_marker_sos = "https://www.viicheck.com/img/icon/flag_2.png";
                    @foreach($sos_map_data as $sos_map_data)
                        @if(!empty($sos_map_data->lat))
                            marker_sos_organization = new google.maps.Marker({
                                position: { lat: {{ $sos_map_data->lat }} , lng: {{ $sos_map_data->lng }}  },
                                map: map_sos_organization,
                                icon: image_marker_sos,
                                zIndex:5,
                            });
                        @endif
                    @endforeach

        });


    }
</script>

<!-- Column CHART พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ -->
<script>
    let series_arr = [];
    let categories_arr = [];
    let i_count = 0;
    let i_name = 0;

    @foreach ($count_area as $item)
        if(i_count < 5){
            series_arr.push(Number('{{ $item }}'));
        }
        i_count++;
    @endforeach

    @foreach ($name_area as $item)
        if(i_name < 5){
            categories_arr.push('{{ $item }}');
        }
        i_name++;
    @endforeach

    var options = {
            series: [{
            data: series_arr
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
            categories: categories_arr,
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

</script>

<!-- Column CHART หัวข้อการขอความช่วยเหลือมากที่สุด -->
<script>

    let symptom_count_arr = [];
    let symptom_categories_arr = [];

    // ฟังก์ชันสุ่มสี HEX
    function randomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    }

    @foreach ($most_symptom_data as $item)
        // นับจำนวน หัวข้อ
        symptom_count_arr.push(Number('{{ $item->count_sympton }}'));

        // นับประเภท หัวข้อ
        symptom_categories_arr.push('{{ $item->symptom }}');
    @endforeach

    // เก็บสีที่สุ่ม ไว้ใน array โดยอิงจาก array ประเภทหัวข้อ
    const symptom_colors = symptom_categories_arr.map(() => randomColor());

    var options = {
            series: [{
                data: symptom_count_arr
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
        colors: symptom_colors,
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
            categories: symptom_categories_arr,
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

    var chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows"), options);
    chart.render();

</script>

<!-- Bar CHART ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ -->
<script>
    let idc_count_arr = [];
    let idc_categories_arr = [];
    let idc_color_arr = [];
    @foreach ($idc_data as $item)
        // นับจำนวน หัวข้อ
        idc_count_arr.push(Number('{{ $item->count_idc }}'));

        switch ('{{ $item->idc }}') {
            case 'แดง(วิกฤติ)':
                idc_color_arr.push("#dc3545");
                idc_categories_arr.push('วิกฤติ');
                break;
            case 'เหลือง(เร่งด่วน)':
                idc_color_arr.push("#ffc107");
                idc_categories_arr.push('เร่งด่วน');
                break;
            case 'เขียว(ไม่รุนแรง)':
                idc_color_arr.push("#28a745");
                idc_categories_arr.push('ไม่รุนแรง');
                break;
            case 'ขาว(ทั่วไป)':
                idc_color_arr.push("#cbd3da");
                idc_categories_arr.push('ทั่วไป');
                break;
            case 'ดำ(รับบริการสาธารณสุขอื่น)':
                idc_color_arr.push("#121416");
                idc_categories_arr.push('อื่นๆ');
                break;
            default:
                idc_color_arr.push("#121416");
                idc_categories_arr.push('ไม่พบข้อมูล');
                break;
        }

    @endforeach

    var options = {
        series: [{
            data: idc_count_arr
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
        colors: idc_color_arr,
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
            categories: idc_categories_arr,
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

        var chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_idc"), options);
        chart.render();

</script>

<!-- Bar CHART ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ -->
<script>

    let rc_count_arr = [];
    let rc_categories_arr = [];
    let rc_color_arr = [];
    @foreach ($rc_data as $item)
        // นับจำนวน หัวข้อ
        rc_count_arr.push(Number('{{ $item->count_rc }}'));

        switch ('{{ $item->rc }}') {
            case 'แดง(วิกฤติ)':
                rc_color_arr.push("#dc3545");
                rc_categories_arr.push('วิกฤติ');
                break;
            case 'เหลือง(เร่งด่วน)':
                rc_color_arr.push("#ffc107");
                rc_categories_arr.push('เร่งด่วน');
                break;
            case 'เขียว(ไม่รุนแรง)':
                rc_color_arr.push("#28a745");
                rc_categories_arr.push('ไม่รุนแรง');
                break;
            case 'ขาว(ทั่วไป)':
                rc_color_arr.push("#cbd3da");
                rc_categories_arr.push('ทั่วไป');
                break;
            case 'ดำ':
                rc_color_arr.push("#121416");
                rc_categories_arr.push('อื่นๆ');
                break;
            default:
                rc_color_arr.push("#121416");
                rc_categories_arr.push('ไม่พบข้อมูล');
                break;
        }

    @endforeach

    var options = {
        series: [{
            data: rc_count_arr
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
        colors: rc_color_arr,
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
            categories: rc_categories_arr,
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

        var chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_rc"), options);
        chart.render();

</script>

<!-- Bar CHART การปฏิบัติการ -->
<script>
    let treatment_count_arr = [];
    let treatment_categories_arr = [];

    @foreach ($treatment_data as $item)
        // นับจำนวน หัวข้อ
        treatment_count_arr.push(Number('{{ $item->count_treatment }}'));

        // นับประเภท หัวข้อ
        treatment_categories_arr.push('{{ $item->treatment }}');

    @endforeach

    var options = {
        series: [{
            data: treatment_count_arr
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
            categories: treatment_categories_arr,
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

</script>

<!-- Column CHART การปฏิบัติการ CURE -->
<script>

    let have_cure_count_arr = [];
    let have_cure_categories_arr = [];

    // ฟังก์ชันสุ่มสี HEX
    function randomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    }

    @foreach ($treatment_have_cure_data as $item)
        // นับจำนวน หัวข้อ
        have_cure_count_arr.push(Number('{{ $item->count_sub_treatment }}'));

        // นับประเภท หัวข้อ
        have_cure_categories_arr.push('{{ $item->sub_treatment }}');
    @endforeach

    // เก็บสีที่สุ่ม ไว้ใน array โดยอิงจาก array ประเภทหัวข้อ
    const have_cure_color_arr = have_cure_categories_arr.map(() => randomColor());

    var options = {
        series: [{
            data: have_cure_count_arr,
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
        colors: have_cure_color_arr,
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
            categories: have_cure_categories_arr,
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

       var chart = new ApexCharts(document.querySelector("#operation_cure"), options);
       chart.render();

</script>

<!-- Column CHART การปฏิบัติการ NO CURE -->
<script>
    let have_no_cure_count_arr = [];
    let have_no_cure_categories_arr = [];

    // ฟังก์ชันสุ่มสี HEX
    function randomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
    }

    @foreach ($treatment_have_no_cure_data as $item)
        // นับจำนวน หัวข้อ
        have_no_cure_count_arr.push(Number('{{ $item->count_sub_treatment }}'));

        // นับประเภท หัวข้อ
        have_no_cure_categories_arr.push('{{ $item->sub_treatment }}');
    @endforeach

    // เก็บสีที่สุ่ม ไว้ใน array โดยอิงจาก array ประเภทหัวข้อ
    const have_no_cure_color_arr = have_no_cure_categories_arr.map(() => randomColor());

    var options = {
            series: [{
            data: have_no_cure_count_arr,
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
        colors: have_no_cure_color_arr,
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
            categories: have_no_cure_categories_arr,

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

       var chart = new ApexCharts(document.querySelector("#operation_no_cure"), options);
       chart.render();

</script>






