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
                                    <span class="button-text">ViiCHECK พระนครศรีอยุธยา</span>
                                </button>
                                <div id="item_dropdown" class="dropdown-menu radius-10"
                                    aria-labelledby="btn_dropdown_health_type" style="cursor: pointer;">
                                    <a class="dropdown-item" onclick="change_select_area('นครนายก')">ViiCHECK
                                        นครนายก</a>
                                </div>
                            </div>
                        </div>

                        <script>
                            function adjustDropdownWidth() {
                                let button = document.getElementById('btn_dropdown_health_type');
                                let dropdownMenu = document.getElementById('item_dropdown');
                                dropdownMenu.style.width = button.offsetWidth + 'px';
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
        cateChart();
        subcateChart();
        areaAmountChart();
    })

    const cateChart = () => {
        // fetch("{{ url('/') }}/api/API_dashboard_count_treatment?user_id=" + user_id)
        // .then(response => response.json())
        // .then(result => {
        // console.log(result);

        const data = [{
                label: 'อุปกรณ์สำนักงาน',
                value: 93,
                color: '#FF5733',
                subcate: [{
                        label: 'คอมพิวเตอร์',
                        value: 40
                    },
                    {
                        label: 'เครื่องพิมพ์',
                        value: 13
                    },
                    {
                        label: 'เครื่องสำรองไฟ',
                        value: 40
                    },
                ],
            },
            {
                label: 'ระบบไฟฟ้า',
                value: 15,
                color: '#33FF57',
                subcate: [{
                        label: 'subCate 1',
                        value: 7
                    },
                    {
                        label: 'subCate 2',
                        value: 8
                    },
                ],
            },
            {
                label: 'ระบบประปา',
                value: 44,
                color: '#3357FF',
                subcate: [{
                        label: 'subCate 1',
                        value: 22
                    },
                    {
                        label: 'subCate 2',
                        value: 22
                    },
                ],
            },
            {
                label: 'เฟอร์นิเจอร์',
                value: 55,
                color: '#F333FF',
                subcate: [{
                        label: 'subCate 1',
                        value: 30
                    },
                    {
                        label: 'subCate 2',
                        value: 25
                    },
                ],
            },
            {
                label: 'ระบบปรับอากาศ',
                value: 41,
                color: '#33FFF3',
                subcate: [{
                        label: 'subCate 1',
                        value: 21
                    },
                    {
                        label: 'subCate 2',
                        value: 20
                    },
                ],
            },
            {
                label: 'อื่นๆ',
                value: 17,
                color: '#FF33A1',
                subcate: [{
                        label: 'subCate 1',
                        value: 9
                    },
                    {
                        label: 'subCate 2',
                        value: 8
                    },
                ],
            },
        ];
        const labels = data.map(item => item.label);
        const series = data.map(item => item.value);
        const colors = data.map(item => item.color);

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
                            let selectedData = data[dataIndex];
                            // ดึงหัวข้อของ index เช่น "cate 1"
                            let categoryTitle = selectedData.label;

                            // เรียกฟังก์ชัน subCate พร้อมส่งข้อมูล subcate ไปด้วย
                            subcateChart(selectedData.subcate, categoryTitle);
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

        //     })
    }

    const subcateChart = (data, title) => {
        document.querySelector('#chartSubCate').innerHTML = "";
        document.querySelector('#cardBodySubCate').innerHTML = "";
        // console.log(data);
        if (!data) {
            document.querySelector('#chartSubCate').classList.add('d-none');
            document.querySelector('#cardBodySubCate').classList.remove('d-none');

            document.querySelector('#cardBodySubCate').innerHTML = `
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <span class="textWarning blink">
                            คลิ๊กที่แท่งกราฟหมวดหมู่เพื่อแสดงข้อมูล
                        </span>
                    </div>`;
        } else {
            document.querySelector('#cardBodySubCate').classList.add('d-none');
            document.querySelector('#chartSubCate').classList.remove('d-none');

            const labels = data.map(item => item.label);
            const series = data.map(item => item.value);
            // const colors = data.map(item => item.color);
            const colors = data.map(() => getRandomColor());

            document.querySelector('#titleSubCate').innerHTML =
            `<h6 class="mb-0 font-weight-bold">หมวดหมู่ : <a class="text-danger">` + title + `</a></h6>`;

            let options = {
                series: series,
                chart: {
                    type: 'pie',
                    // background: '#fff', // #f0f0f0 เปลี่ยนสีพื้นหลังที่นี่
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

            var chartSubCate = new ApexCharts(document.querySelector("#chartSubCate"), options);
            chartSubCate.render();
        }
    };

    const areaAmountChart = () => {
        var options = {
            series: [{
                name: 'ViiCHECK พระนครศรีอยุธยา',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'ViiCHECK นครนายก',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }],
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
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
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
    }


</script>
