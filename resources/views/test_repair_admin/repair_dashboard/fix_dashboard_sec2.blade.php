<style>
    #chartCate {
        height: 100%;
        min-height: 420px;
    }

    /* ======== เพิ่ม CSS สำหรับ tooltip-custom ======== */
    .tooltip-custom {
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
        border-radius: 5px;
        background: #fff;
        /* สีพื้นหลัง */
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        /* เงา */
    }

    /* ======== End of เพิ่ม CSS สำหรับ tooltip-custom ======== */

    /* ======== CSS สำหรับ Dropdown ======== */
    .dropdownToggleDB {
        border: #e7e7e7 1px solid;
    }

    #btn_dropdown_health_type {
        width: 200px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        overflow: hidden;
    }

    #item_dropdown {
        width: 100%;
    }

    #btn_dropdown_health_type .button-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        flex-grow: 1;
    }

    #btn_dropdown_health_type .dropdown-toggle::after {
        margin-left: 10px;
        /* สามารถปรับเพื่อเว้นระยะจากอักษร */
    }

    /* ======== END of CSS สำหรับ Dropdown ==========*/

    /* ======== ตัวอักษรไม่เกินขอบบรรทัดและซ่อนไว้ ==========*/
    .overflow-dot {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    /* ======== ตัวอักษรกระพริบ ==========*/
    .textWarning{
        font-size:1rem;
        font-weight:bold;
        color: rgb(250, 22, 22);
    }
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    .blink {
        animation: blink 2s infinite;
    }

</style>

{{-- <div class="p-4">
    <div class="row">
        <div class="col-12 col-md-12 text-end">
            <div class="dropdown px-4 ">
                <button style="width: 150px;" id="btn_dropdown_health_type"
                    class="btn btn-outline-secondary text-dark dropdown-toggle radius-10" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    เลือกพื้นที่
                </button>
                <div id="item_dropdown" class="dropdown-menu " aria-labelledby="btn_dropdown_health_type"
                    style="cursor: pointer;">
                    <a class="dropdown-item" onclick="change_select_area('พระนครศรีอยุธยา')">ViiCHECK
                        พระนครศรีอยุธยา</a>
                    <a class="dropdown-item" onclick="change_select_area('นครนายก')">ViiCHECK นครนายก</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- จำนวนแจ้งซ่อมแยกตามหมวดหมู่ -->
<div class="row">
    <div class="col-12 col-md-8 col-lg-8 mb-3">
        <div class="card radius-10 h-100 ">
            <div class="card-body">


                <div class="row d-flex align-items-start mb-3">
                    <div class="col-12 col-md-9">
                        <h5 class="mb-0 font-weight-bold">จำนวนแจ้งซ่อมแยกตามหมวดหมู่</h5>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="col-12 col-md-12 d-flex justify-content-end align-items-center">
                            <div class="dropdown px-4">
                                <button id="btn_dropdown_health_type" class="btn dropdownToggleDB dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    onclick="adjustDropdownWidth()">
                                    <span class="button-text">{{ $data_partner_area->first()->name_area ?? 'เลือกพื้นที่' }}</span>
                                </button>
                                <div id="item_dropdown" class="dropdown-menu radius-10"
                                    aria-labelledby="btn_dropdown_health_type" style="cursor: pointer;">
                                    @foreach($data_partner_area as $area)
                                        <a class="dropdown-item" onclick="change_select_area('{{ $area->name_area }}'); cateChart('{{ $area->id }}','selected');">
                                            {{ $area->name_area }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <script>
                            function adjustDropdownWidth() {
                                let button = document.getElementById('btn_dropdown_health_type');
                                let dropdownMenu = document.getElementById('item_dropdown');
                                dropdownMenu.style.width = button.offsetWidth + 'px';
                            }

                            function change_select_area(selectedArea) {
                                // เปลี่ยนข้อความในปุ่ม dropdown
                                let buttonText = document.querySelector('.button-text');
                                buttonText.innerText = selectedArea; // เปลี่ยนข้อความให้ตรงกับพื้นที่ที่เลือก
                            }
                        </script>
                    </div>
                </div>

                <div class=" w-100 ">
                    <div id="chartCate"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-4 mb-3">
        <div class="card radius-10 h-100 ">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-12 ">
                        <h5 class="mb-0 font-weight-bold">จำนวนแจ้งซ่อมแยกตามหมวดหมู่ย่อย</h5>
                        <span id="titleSubCate" style="margin-top: 10px; display: block;"></span>
                    </div>
                </div>
                <div id="chartSubCate">
                </div>
                <div id="cardBodySubCate" class="h-75">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- จำนวนการแจ้งซ่อมแต่ละพื้นที่ -->
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 mb-3">
        <div class="card radius-10 h-100 ">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="col-12 ">
                        <h5 class="mb-0 font-weight-bold">จำนวนการแจ้งซ่อมแต่ละพื้นที่</h5>
                        <span id="titleSubCate" style="margin-top: 10px; display: block;"></span>
                    </div>
                </div>
                <div class="h-100 w-100" >
                    <div id="areaAmountChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ใช้ CDN APEX CHART-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/th.js"></script>

<script>


    document.addEventListener('DOMContentLoaded', (event) => {
        cateChart(null,"DOM");
        subcateChart(null, null, "DOM");
        areaAmountChart();
    })

    const cateChart = (selected_area_id,form) => {
        let area_id = "";
        if (form === "DOM") {
            area_id = String('{{ $data_partner_area->first()->id ?? 1 }}'); // ใช้ String() แปลงเป็น string
            console.log("areaId: " + area_id);
        } else {
            area_id = String(selected_area_id); // แปลง selected_area_id เป็น string
        }

        // ล้างข้อมูลใน div ก่อน
        document.querySelector("#chartCate").innerHTML = ""; // clear กราฟ cateChart
        document.querySelector('#chartSubCate').innerHTML = ""; // clear กราฟ subcateChart
        document.querySelector('#cardBodySubCate').innerHTML = ""; // clear กราฟ subcateChart
        document.querySelector('#titleSubCate').innerHTML = ""; // clear หัวข้อ กราฟ subcateChart

        subcateChart(null, null, "DOM"); //ทำฟังก์ชันใหม่เพื่อไม่ให้ text บางจุดหายไป

        fetch("{{ url('/') }}/api/get_cateChartMaintains?area_id=" + area_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน chartCate เมื่อเกิดข้อผิดพลาด
                let chartCate_body = document.getElementById("chartCate");
                chartCate_body.innerHTML = `
                    <div class="text-center text-danger font-20" onclick="cateChart(null,'DOM');">
                        <i class="fa-solid fa-rotate-right"></i>
                    </div>
                `;
            }
            return response.json();
        })
        .then(result => {
            console.log("result cateChareData");
            console.log(result);

            const labels = result.map(item => item.name ?? ""); // ใช้ค่าเป็น string ว่างหาก name เป็น null
            const series = result.map(item => item.count ? parseInt(item.count) : 0); // แปลง count เป็น 0 หากเป็น null
            const colors = result.map(item => item.color ? `#${item.color}` : "#000000"); // ใช้สีดำเป็นค่าเริ่มต้นหาก color เป็น null หรือค่าว่าง

            let options = {
                series: [{
                    data: series
                }],
                chart: {
                    height: '100%',
                    type: 'bar',
                    background: '#fff', // #e6eefa เปลี่ยนสีพื้นหลังที่นี่
                    toolbar: {
                        tools: {
                            download: false // ปิดปุ่ม download SVG, PNG, CSV
                        }
                    },
                    events: {
                        click: function(event, chartContext, config) {
                            // ดึงข้อมูล index ของแท่งกราฟที่ถูกคลิก
                            let dataIndex = config.dataPointIndex;

                            // ถ้า index เป็น valid (ไม่ใช่ -1)
                            if (dataIndex !== -1) {
                                // ดึงข้อมูลจาก data ตาม index ที่ถูกคลิก
                                let selectedData = result[dataIndex];
                                // ดึงหัวข้อของ index เช่น "cate 1"
                                let categoryTitle = selectedData.name;

                                // เรียกฟังก์ชัน subCate พร้อมส่งข้อมูล subcate ไปด้วย
                                subcateChart(selectedData.subcate, categoryTitle , "event");
                            }
                        }

                    }
                },
                colors: colors,
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                        borderRadius: 3,
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
                    categories: labels,
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
                },
                tooltip: {
                    custom: function({
                        series,
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        const label = labels[dataPointIndex];
                        const value = series[seriesIndex][dataPointIndex];
                        return `
                            <div class="tooltip-custom">
                                ${label}: ${value}
                            </div>
                        `;
                    }
                }
            };

            var chartCate = new ApexCharts(document.querySelector("#chartCate"), options);
            chartCate.render();

        }).catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน chartCate เมื่อเกิดข้อผิดพลาด
            let chartCate_body = document.getElementById("chartCate");
            chartCate_body.innerHTML = `
                <div class="text-center text-danger font-20">
                    <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                </div>
            `;
        });
    }

    const subcateChart = (data, title, form) => {
        // ล้างข้อมูลใน div ก่อน
        document.querySelector('#chartSubCate').innerHTML = "";
        document.querySelector('#cardBodySubCate').innerHTML = "";

        if(form === "DOM"){
            // แสดงข้อความเตือนให้เลือกกราฟ
            document.querySelector('#chartSubCate').classList.add('d-none');
            document.querySelector('#cardBodySubCate').classList.remove('d-none');

            document.querySelector('#cardBodySubCate').innerHTML = `
                <div class="h-100 d-flex justify-content-center align-items-center">
                    <span class="textWarning blink" >
                        คลิกที่แท่งกราฟหมวดหมู่เพื่อแสดงข้อมูล
                    </span>
                </div>`;
        }else{
            if (!data || data.length === 0) {  // เช็คทั้งกรณีที่ data เป็น null หรือกรณีที่ data ไม่มีข้อมูล
                // ตั้งค่า title ของกราฟ
                document.querySelector('#titleSubCate').innerHTML =
                    `<h6 class="mb-0 font-weight-bold">หมวดหมู่ : <a class="text-danger">${title}</a></h6>`;

                // แสดงข้อความเตือนให้เลือกกราฟ
                document.querySelector('#chartSubCate').classList.add('d-none');
                document.querySelector('#cardBodySubCate').classList.remove('d-none');

                document.querySelector('#cardBodySubCate').innerHTML = `
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <span class="text-primary" style="font-weight:bold;">
                            ไม่มีข้อมูลหมวดหมู่ย่อย
                        </span>
                    </div>`;
            } else {
                // แสดงกราฟถ้ามีข้อมูล
                document.querySelector('#cardBodySubCate').classList.add('d-none');
                document.querySelector('#chartSubCate').classList.remove('d-none');

                // ตรวจสอบค่าของ labels และ series
                const labels = data.map(item => item.name ?? "ไม่มีชื่อ"); // กรณีไม่มีชื่อให้ใส่ "ไม่มีชื่อ"
                const series = data.map(item => item.count ? parseInt(item.count) : 0); // แปลง count เป็น 0 ถ้าเป็น null
                const colors = data.map(() => getRandomColor()); // กำหนดสีแบบสุ่ม

                // ตั้งค่า title ของกราฟ
                document.querySelector('#titleSubCate').innerHTML =
                    `<h6 class="mb-0 font-weight-bold">หมวดหมู่ : <a class="text-danger">${title}</a></h6>`;

                let options = {
                    series: series,
                    chart: {
                        type: 'pie',
                    },
                    labels: labels,
                    colors: colors,
                    theme: {
                        monochrome: {
                            enabled: false,
                        },
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                offset: -5,
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            left: 0,
                            right: 0,
                        },
                    },
                    dataLabels: {
                        formatter(val, opts) {
                            const name = opts.w.globals.labels[opts.seriesIndex];
                            const value = series[opts.seriesIndex];
                            return [name, `${val.toFixed(1)}% (${value})`];
                        },
                    },
                    legend: {
                        show: false,
                    },
                };

                // สร้างกราฟ pie chart
                var chartSubCate = new ApexCharts(document.querySelector("#chartSubCate"), options);
                chartSubCate.render();
            }
        }
    };


    const areaAmountChart = () => {
        fetch("{{ url('/') }}/api/get_areaAmountChartMaintains?partner_id=" + partner_id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network ตอบสนองไม่ OK " + response.statusText);
                // แสดงไอคอนตกใจใน chartCate เมื่อเกิดข้อผิดพลาด
                let chartCate_body = document.getElementById("chartCate");
                chartCate_body.innerHTML = `
                    <div class="text-center text-danger font-20" onclick="areaAmountChart()">
                        <i class="fa-solid fa-rotate-right"></i>
                    </div>
                `;
            }
            return response.json();
        })
        .then(result => {
            // console.log("result areaAmountChart");
            // console.log(result);

            var options = {
            series: result,
            chart: {
                type: 'bar',
                height: 350,
                background: '#fff', // #e6eefa เปลี่ยนสีพื้นหลังที่นี่
                toolbar: {
                    tools: {
                        download: false // ปิดปุ่ม download SVG, PNG, CSV
                    }
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    borderRadius: 3,
                },
            },
            dataLabels: {
                enabled: true, // เปิดใช้งาน dataLabels
                style: {
                    colors: ['#000'] // กำหนดสีของตัวอักษร
                },
                formatter: function(val) {
                    return val; // แสดงจำนวนพร้อมหน่วย
                },
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
                title: {
                    text: 'จำนวน(ครั้ง)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " ครั้ง"
                    }
                }
            }
        };

        let areaAmountChart = new ApexCharts(document.querySelector("#areaAmountChart"), options);
        areaAmountChart.render();

        }).catch(error => {
            console.error("เกิดข้อผิดพลาดในการดึงข้อมูล :", error);

            // แสดงไอคอนตกใจใน chartCate เมื่อเกิดข้อผิดพลาด
            let chartCate_body = document.getElementById("chartCate");
            chartCate_body.innerHTML = `
                <div class="text-center text-danger font-20">
                    <i class="fas fa-exclamation-triangle"></i> เกิดข้อผิดพลาดในการดึงข้อมูล
                </div>
            `;
        });


    }


</script>
