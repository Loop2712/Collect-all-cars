<!--============= 3 card -- 4-4-4  ================-->
<div class="row mb-4">
    <!--MAP ปักหมุดการขอความช่วยเหลือในจังหวัด -->
    <div class="col-12 col-lg-4 mb-3">
        <div class="card radius-10 h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 font-weight-bold">MAP ปักหมุดการขอความช่วยเหลือในจังหวัด</h5>
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
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
                <div class="dropdown ms-auto">
                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                    </div>
                </div>
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <div class="">
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle mb-0">
                        <tbody>
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
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
                    <div class="dropdown ms-auto">
                        <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javaScript:;">ดูข้อมูลสมาชิกเพิ่มเติม</a>
                        </div>
                    </div>
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
       },
       yaxis: {
         labels: {
           show: false
         }
       },
    //    title: {
    //        text: 'Custom DataLabels',
    //        align: 'center',
    //        floating: true
    //    },
    //    subtitle: {
    //        text: 'Category Names as DataLabels inside bars',
    //        align: 'center',
    //    },
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
    //    title: {
    //        text: 'Custom DataLabels',
    //        align: 'center',
    //        floating: true
    //    },
    //    subtitle: {
    //        text: 'Category Names as DataLabels inside bars',
    //        align: 'center',
    //    },
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

<!-- PIE CHART ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ -->
<script>
    let idc_count_arr = [];
    let idc_categories_arr = [];
    let idc_color_arr = [];
    @foreach ($idc_data as $item)
        // นับจำนวน หัวข้อ
        idc_count_arr.push(Number('{{ $item->count_idc }}'));

        // นับประเภท หัวข้อ
        idc_categories_arr.push('{{ $item->idc }}');

        switch ('{{ $item->idc }}') {
            case 'แดง':
                idc_color_arr.push("#dc3545");
                break;
            case 'เหลือง':
                idc_color_arr.push("#ffc107");
                break;
            case 'เขียว':
                idc_color_arr.push("#28a745");
                break;
            case 'ขาว':
                idc_color_arr.push("#cbd3da");
                break;
            case 'ดำ':
                idc_color_arr.push("#121416");
                break;
            default:
                idc_color_arr.push("#121416");
                break;
        }

    @endforeach

    var options = {
            series: idc_count_arr,
            chart: {
                width: 500,
                type: 'pie',
            },
            legend:{
                formatter: function(val, opts) {
                    return val + " - " + opts.w.globals.series[opts.seriesIndex]
                },
                position: 'bottom',
            },

            labels: idc_categories_arr,
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
                }],
            dataLabels: {
                style: {
                    fontSize: '14px', // ค่า fontSize ที่คุณต้องการ
                },
            },
            colors: idc_color_arr,
        };

    var chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_idc"), options);
    chart.render();

</script>

<!-- PIE CHART ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ -->
<script>

    let rc_count_arr = [];
    let rc_categories_arr = [];
    let rc_color_arr = [];
    @foreach ($rc_data as $item)
        // นับจำนวน หัวข้อ
        rc_count_arr.push(Number('{{ $item->count_rc }}'));

        // นับประเภท หัวข้อ
        rc_categories_arr.push('{{ $item->rc }}');

        switch ('{{ $item->rc }}') {
            case 'แดง':
                rc_color_arr.push("#dc3545");
                break;
            case 'เหลือง':
                rc_color_arr.push("#ffc107");
                break;
            case 'เขียว':
                rc_color_arr.push("#28a745");
                break;
            case 'ขาว':
                rc_color_arr.push("#cbd3da");
                break;
            case 'ดำ':
                rc_color_arr.push("#121416");
                break;
            default:
                rc_color_arr.push("#121416");
                break;
        }

    @endforeach

    var options = {
            series: rc_count_arr,
            chart: {
                width: 500,
                type: 'pie',
            },
            legend:{
                formatter: function(val, opts) {
                    return val + " - " + opts.w.globals.series[opts.seriesIndex]
                },
                position: 'bottom',
            },

            labels: rc_categories_arr,
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
                }],
            dataLabels: {
                style: {
                    fontSize: '14px', // ค่า fontSize ที่คุณต้องการ
                },
            },
            colors: rc_color_arr,
        };

    var chart = new ApexCharts(document.querySelector("#sos_1669_form_yellows_rc"), options);
    chart.render();

</script>

<!-- DONUT CHART การปฏิบัติการ -->
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
        series: treatment_count_arr,
        chart: {
        width: 450,
        type: 'donut',
    },
    labels: treatment_categories_arr,
    colors: ['#2dce89', '#f5365c'], // กำหนดสีที่ต้องการ
    legend: {
        formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
        },
        position: 'bottom',
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
        //    title: {
        //        text: 'Custom DataLabels',
        //        align: 'center',
        //        floating: true
        //    },
        //    subtitle: {
        //        text: 'Category Names as DataLabels inside bars',
        //        align: 'center',
        //    },
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
    //    title: {
    //        text: 'Custom DataLabels',
    //        align: 'center',
    //        floating: true
    //    },
    //    subtitle: {
    //        text: 'Category Names as DataLabels inside bars',
    //        align: 'center',
    //    },
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






