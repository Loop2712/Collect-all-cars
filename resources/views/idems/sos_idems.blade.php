<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
    <!--favicon-->
    <!-- <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" /> -->
    <!-- loader-->
    <link href="{{ asset('partner_new/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('partner_new/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('partner_new/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('partner_new/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('partner_new/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Synadmin – Bootstrap5 Admin Template</title>
</head>
<style>
    *:not(i) {
        font-family: 'Kanit', sans-serif;

    }

    .authentication-lock-screen {
        height: 100vh !important;
        padding: 0 1rem !important;
    }

    .btn-calling-officer {
        width: 70px !important;
        height: 70px !important;
        margin-top: 15px;
        border-radius: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        bottom: 5%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body class="">
    <!-- wrapper -->
    <div class="wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-12 px-2 ">
            <div class="card h-100" style="border-radius: 15px;">
                <div class="row g-0">
                    <div class="col-12 border-end">
                        <div class="card-body">
                            <div class="p-3">
                                <div class="text-start">
                                    <!-- <img src="assets/images/logo-img.png" width="180" alt=""> -->
                                </div>
                                <h4 class="mt-2 font-weight-bold"><b>ข้อมูลการช่วยเหลือ</b></h4>
                                <div class="d-flex align-items-center">
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>หน่วยงาน</b></h6>
                                    <div>อบต.เวียงท่ากาน อ.สันป่าตอง</div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>เจ้าหน้าที่</b></h6>
                                    <p class="mb-0">1.สมศักดิ์ รักดี</p>
                                    <p class="mb-0">2.สมศรี รักษา</p>
                                    <p class="mb-0">3.สมบูรณ์ รักษา</p>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>ป้ายทะเบียนรถ</b></h6>
                                    <p class="mb-0">งข7292ชม</p>
                                </div>

                                <div class="mt-4">
                                    <h6 class="mb-0 text-primary "><b>เวลา</b></h6>
                                    <p class="mb-0">2024-06-01 07:06:00</p>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="" class="btn btn-primary">ติดตามรถ</a>
                            </div>
                            <!-- Button trigger modal -->
                            <button id="btn_first_call" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModalCenter">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content bg-lock-screen">
                <div class="modal-body p-0">
                    <div class="authentication-lock-screen d-flex align-items-center justify-content-center ">
                        <div class="card shadow-none bg-transparent">
                            <div class="card-body p-md-5 text-center">
                                <h2 class="text-white">ติดต่อเจ้าหน้าที่</h2>
                                <h5 class="text-white">กรุณาติดต่อเจ้าหน้าที่เพื่อสอบ-ถามข้อมูลเพิ่มเติมและติดตามสถานะ</h5>
                                <div class="">
                                    <img src="{{ url('/img/stickerline/PNG/27.png') }}" class="mt-5" width="120" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 justify-content-center d-flex">
                        <a href="tel:1669" class="btn btn-success btn-calling-officer mt-3">
                            <i class="fa-sharp fa-solid fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="{{ asset('partner_new/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('partner_new/js/jquery.min.js') }}"></script>
    <!-- end wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            check_status_case_1669();
        });

        let clickCounter = 0;
        let clickTimer = null;

        // ฟังก์ชันสำหรับตรวจจับการคลิกบนหน้าจอ
        document.addEventListener('click', () => {
            clickCounter++; // เพิ่มจำนวนคลิก

            // หากตัวจับเวลาไม่มีค่า ให้เริ่มตัวจับเวลา
            if (!clickTimer) {
                clickTimer = setTimeout(() => {
                    clickCounter = 0; // รีเซ็ตจำนวนคลิก
                    clickTimer = null; // รีเซ็ตตัวจับเวลา
                }, 1000); // ตั้งค่าเวลาเป็น 1 วินาที
            }

            // ตรวจสอบว่าคลิกครบ 4 ครั้งภายใน 1 วินาทีหรือไม่
            if (clickCounter === 4) {
                document.getElementById('btn_first_call').click(); // คลิกปุ่ม
                clickCounter = 0; // รีเซ็ตจำนวนคลิก
                clearTimeout(clickTimer); // ยกเลิกตัวจับเวลา
                clickTimer = null; // รีเซ็ตตัวจับเวลา
            }
        });

        function check_status_case_1669() {
            console.log("check_status_case_1669");

            let pre_operation_id = "{{ $pre_operation_id }}" ;
            // console.log(pre_operation_id);

            let myHeaders = new Headers();
                myHeaders.append("x-token", "04ecba8fa6243acbdf0d1e6ca12e769127f20f93f72a15cd46de6f9b6431e5f3");
                myHeaders.append("Authorization", "Basic aWRlbXMtZ2F0ZXdheS1hcGk6WVhCcExXOXdaWEk2WVhCcExXOXdaWEpBY0dWeWJXbHphVzl1");

            let requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            // เรียก Fetch ใหม่ด้วย pre_operation_id
            fetch(`https://api-data-integration-gateway.fm-sp.com/api/v1/form/v1_pre_opreration?pre_operation_id=${pre_operation_id}`, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(result => {
                    console.log(result);
                })
                .catch(error => console.error('Error in loop fetch:', error));

        }
    </script>

</body>

</html>